<?php
class AbmRol
{

    private function cargarObjeto($param)
    {
        $obj = null;

        if (array_key_exists('idrol', $param)) {
            $obj = new rol();
            $obj->setear($param['idrol'], $param['rodescripcion']);
        }
        return $obj;
    }

    public function alta($param)
    {
        $resp = false;
        $param['idrol'] = null;
        $objetoRol = $this->cargarObjeto($param);
        if ($objetoRol != null and $objetoRol->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    public function buscar($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['idrol'])) $where .= " and idrol =" . $param['idrol'];
            if (isset($param['rodescripcion'])) $where .= " and rodescripcion ='" . $param['rodescripcion'] . "'";
        }
        $arreglo = rol::listar($where);
        return $arreglo;
    }
}