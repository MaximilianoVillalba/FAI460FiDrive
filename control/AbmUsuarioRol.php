<?php
class AbmUsuarioRol
{

    private function cargarObjeto($param)
    {
        $obj = null;

        if (array_key_exists('idusuario', $param) && array_key_exists('idrol', $param)) {
            $obj = new usuariorol();
            $obj->setear($param['idusuario'], $param['idrol']);
        }
        return $obj;
    }

    private function cargarObjetoConClave($param)
    {
        $obj = null;

        if (isset($param['idusuario'])) {
            $obj = new usuariorol();
            $obj->setear($param['idusuario'], null);
        }
        return $obj;
    }

    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['idusuario']))
            $resp = true;
        return $resp;
    }

    public function alta($param)
    {
        $resp = false;
        $objetoUsuarioRol = $this->cargarObjeto($param);
        if ($objetoUsuarioRol != null and $objetoUsuarioRol->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    public function buscar($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['idusuario'])) $where .= " and idusuario =" . $param['idusuario'];
            if (isset($param['idrol'])) $where .= " and idrol ='" . $param['idrol'] . "'";
        }
        $arreglo = usuariorol::listar($where);
        return $arreglo;
    }

    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $objetoUsuarioRol = $this->cargarObjetoConClave($param);
            if ($objetoUsuarioRol != null and $objetoUsuarioRol->eliminar()) {
                $resp = true;
            }
        }

        return $resp;
    }
}