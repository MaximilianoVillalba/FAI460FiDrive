<?php
class AbmUsuario
{
    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param)
    {
        $where = " true";
        if ($param <> NULL) {
            if (isset($param['idusuario'])) $where .= " and idusuario ='" . $param['idusuario'] . "'";
            if (isset($param['usnombre'])) $where .= " and usnombre ='" . $param['usnombre'] . "'";
            if (isset($param['usapellido'])) $where .= " and usapellido ='" . $param['usapellido'] . "'";
            if (isset($param['uslogin'])) $where .= " and uslogin ='" . $param['uslogin'] . "'";
            if (isset($param['usclave'])) $where .= " and usclave ='" . $param['usclave'] . "'";
            if (isset($param['usactivo'])) $where .= " and usactivo ='" . $param['usactivo'] . "'";
        }
        $arreglo = usuario::listar($where);
        return $arreglo;
    }
}