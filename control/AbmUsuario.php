<?php
class AbmUsuario
{

    private function cargarObjeto($param)
    {
        $obj = null;

        if (array_key_exists('idusuario', $param)) {
            $obj = new usuario();
            $obj->setear($param['idusuario'], $param['usnombre'], $param['usapellido'], $param['uslogin'], $param['usclave'], $param['usactivo']);
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
        $param['idusuario'] = null;
        $param['usactivo'] = 1;
        $objetoUsuario = $this->cargarObjeto($param);

        if ($objetoUsuario != null and $objetoUsuario->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    public function modificacion($param)
    {
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            if ($param['accion'] == 'eliminar') {
                $usuarioBuscado = $this->buscar($param);
                $param['usnombre'] = $usuarioBuscado[0]->getNombreUsuario();
                $param['uspass'] = $usuarioBuscado[0]->getPasswordUsuario();
                $param['usmail'] = $usuarioBuscado[0]->getEmailUsuario();
                $param['usdeshabilitado'] =  date("Y-m-d H:i:s");
            }

            $objetoUsuario = $this->cargarObjeto($param);
            if ($objetoUsuario != null and $objetoUsuario->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function buscar($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['idusuario'])) $where .= " and idusuario =" . $param['idusuario'];
            if (isset($param['usnombre'])) $where .= " and usnombre ='" . $param['usnombre'] . "'";
            if (isset($param['usapellido'])) $where .= " and usapellido ='" . $param['usapellido'] . "'";
            if (isset($param['uslogin'])) $where .= " and uslogin ='" . $param['uslogin'] . "'";
            if (isset($param['usclave'])) $where .= " and usclave ='" . $param['usclave'] . "'";
            if (isset($param['usactivo'])) $where .= " and usactivo ='" . $param['usactivo'] . "'";
        }
        $arreglo = usuario::listar($where);
        return $arreglo;
    }

    public function definirAccion($param)
    {
    }
}