<?php

class AbmArchivoCargadoEstado
{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Tabla
     */
    private function cargarObjeto($param)
    {
        $obj = null;

        if (array_key_exists('idarchivocargadoestado', $param)) {
            $obj = new archivocargadoestado();
            $obj->setear(
                $param['idarchivocargadoestado'],
                $param['idestadotipos'],
                $param['acedescripcion'],
                $param['idusuario'],
                $param['acefechaingreso'],
                $param['acefechafin'],
                $param['idarchivocargado']
            );
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Tabla
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;

        if (isset($param['id'])) {
            $obj = new archivocargadoestado();
            //$obj->setear($param['id'], null);
        }
        return $obj;
    }


    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['idarchivocargado']))
            $resp = true;
        return $resp;
    }

    /**
     * 
     * @param array $param
     */
    public function alta($param)
    {
        $resp = false;
        $time = time();
        $fechaInicio = date("Y-m-d H:i:s", $time);
        $param['idarchivocargadoestado'] = null;
        $param['acefechaingreso'] = $fechaInicio;
        $param['acefechafin'] = 'NULL';

        $elObjtTabla = $this->cargarObjeto($param);
        if ($elObjtTabla != null && $elObjtTabla->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    public function buscar($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['idarchivocargadoestado'])) $where .= " and idarchivocargadoestado='" . $param['idarchivocargadoestado'] . "'";
            if (isset($param['idestadotipos'])) $where .= " and idestadotipos='" . $param['idestadotipos'] . "'";
            if (isset($param['acedescripcion'])) $where .= " and acedescripcion='" . $param['acedescripcion'] . "'";
            if (isset($param['idusuario'])) $where .= " and idusuario ='" . $param['idusuario'] . "'";
            if (isset($param['acefechaingreso'])) $where .= " and acefechaingreso='" . $param['acefechaingreso'] . "'";
            if (isset($param['acefechafin'])) $where .= " and acefechafin='" . $param['acefechafin'] . "'";
            if (isset($param['idarchivocargado'])) $where .= " and idarchivocargado='" . $param['idarchivocargado'] . "'";
        }
        $arreglo = archivocargadoestado::listar($where);
        return $arreglo;
    }

    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtTabla = $this->cargarObjetoConClave($param);
            if ($elObjtTabla != null and $elObjtTabla->eliminar()) {
                $resp = true;
            }
        }

        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($paramForm)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($paramForm)) {
            $estadosViejos = $this->buscar($paramForm['idarchivocargado']);
            foreach ($estadosViejos as $estado) {
                if ($estado->getAcefechafin() == NULL || $estado->getAcefechafin() == '0000-00-00 00:00:00') {
                    $time = time();
                    $fechaFin = date("Y-m-d H:i:s", $time);
                    $datosUpdate['idarchivocargadoestado'] = $estado->getIdarchivocargadoestado();
                    $datosUpdate['idestadotipos'] = $estado->getIdestadotipos();
                    $datosUpdate['acedescripcion'] = $estado->getAcedescripcion();
                    $datosUpdate['idusuario'] = $estado->getIdusuario();
                    $datosUpdate['acefechaingreso'] = $estado->getAcefechaingreso();
                    $datosUpdate['acefechafin'] = $fechaFin;
                    $datosUpdate['idarchivocargado'] = $estado->getIdarchivocargado();
                }
            }
            $objUpdate = $this->cargarObjeto($datosUpdate);
            if ($objUpdate != null && $objUpdate->modificar()) {
                if ($this->alta($paramForm)) {
                    $resp = true;
                }
            }
        }
        return $resp;
    }
}