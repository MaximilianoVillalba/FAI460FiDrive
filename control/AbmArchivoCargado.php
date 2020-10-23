<?php
class AbmArchivoCargado
{
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Tabla
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('idarchivocargado', $param)) {
            $obj = new archivocargado();
            $obj->setear(
                $param['idarchivocargado'],
                $param['acnombre'],
                $param['acdescripcion'],
                $param['acicono'],
                $param['idusuario'],
                $param['aclinkacceso'],
                $param['accantidaddescarga'],
                $param['accantidadusada'],
                $param['acfechainiciocompartir'],
                $param['acefechafincompartir'],
                $param['acprotegidoclave']
            );
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
        $param['idarchivocargado'] = null;
        $param['accantidaddescarga'] = 0;
        $param['accantidadusada'] = 0;
        $param['acfechainiciocompartir'] = NULL;
        $param['acefechafincompartir'] = NULL;
        $elObjtTabla = $this->cargarObjeto($param);
        if ($elObjtTabla != null && $elObjtTabla->insertar()) {
            $objArchivoEstado = new AbmArchivoCargadoEstado();
            $datos['idestadotipos'] = 1;
            $datos['acedescripcion'] = $elObjtTabla->getAcdescripcion();
            $datos['idusuario'] = $elObjtTabla->getIdusuario();
            $datos['idarchivocargado'] = $elObjtTabla->getIdarchivocargado();
            if ($objArchivoEstado->alta($datos)) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['idarchivocargado'])) $where .= " and idarchivocargado='" . $param['idarchivocargado'] . "'";
            if (isset($param['acnombre'])) $where .= " and acnombre='" . $param['acnombre'] . "'";
            if (isset($param['acdescripcion'])) $where .= " and acdescripcion='" . $param['acdescripcion'] . "'";
            if (isset($param['idusuario '])) $where .= " and idusuario ='" . $param['idusuario '] . "'";
            if (isset($param['aclinkacceso'])) $where .= " and aclinkacceso='" . $param['aclinkacceso'] . "'";
            if (isset($param['accantidaddescarga'])) $where .= " and accantidaddescarga='" . $param['accantidaddescarga'] . "'";
            if (isset($param['accantidadusada'])) $where .= " and accantidadusada='" . $param['accantidadusada'] . "'";
            if (isset($param['acfechainiciocompartir'])) $where .= " and acfechainiciocompartir='" . $param['acfechainiciocompartir'] . "'";
            if (isset($param['acefechafincompartir	'])) $where .= " and acefechafincompartir	='" . $param['acefechafincompartir	'] . "'";
            if (isset($param['acprotegidoclave'])) $where .= " and acprotegidoclave='" . $param['acprotegidoclave'] . "'";
        }
        $arreglo = archivocargado::listar($where);
        return $arreglo;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param)
    {
        $resp = false;
        $entroACompartir = false;
        if ($this->seteadosCamposClaves($param)) {
            if (isset($param['acefechafincompartirSinSumar'])) {
                $entroACompartir = true; //Bandera para saber si entro al "compartir" y no al simplemente editar
                $diasCompartir = $param['acefechafincompartirSinSumar'];
                $fecha_actual = date("Y-m-d H:i:s");
                $fechaFin = date("Y-m-d H:i:s", strtotime($fecha_actual . "+ " . $diasCompartir . " days"));
                $param['acfechainiciocompartir'] = $fecha_actual;
                $param['acefechafincompartir'] = $fechaFin;

                $datosEstado['idarchivocargado'] = $param['idarchivocargado'];
                $datosEstado['idestadotipos'] = 2;
                $datosEstado['acedescripcion'] = 'Se comparte';
                $datosEstado['idusuario'] = $param['idusuario'];

                $objArchivoEstado = new AbmArchivoCargadoEstado();
                if ($objArchivoEstado->modificacion($datosEstado)) {
                    $nuevoEstado = true;
                }
            }
            $elObjtTabla = $this->cargarObjeto($param);
            if ($elObjtTabla != null and $elObjtTabla->modificar()) {
                if ($entroACompartir) {
                    /* En el caso que haya entrado a "compartir" verifica si se seteo la variable
                        nuevoEstado ya que cambio de estado y si se pudo hacer
                    */
                    if (isset($nuevoEstado) && $nuevoEstado == true) {
                        $resp = true;
                    }
                } else {
                    /* En el caso que no haya entrado a "compartir" y pudo modificarse el archivo sin problemas */
                    $resp = true;
                }
            }
        }
        return $resp;
    }
}