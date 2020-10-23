<?php
class estadotipos
{
    private $idestadotipos;
    private $etdescripcion;
    private $etactivo;
    private $mensajeoperacion;

    public function __construct()
    {
        $this->idestadotipos;
        $this->etdescripcion;
        $this->etactivo;
    }

    public function setear($idestadotipos, $etdescripcion, $etactivo)
    {
        $this->setIdestadotipos($idestadotipos);
        $this->setIdestadotipos($etdescripcion);
        $this->setIdestadotipos($etactivo);
    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM estadotipos WHERE idestadotipos= " . $this->getIdestadotipos();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idestadotipos'], $row['etdescripcion'], $row['etactivo']);
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO estadotipos(etdescripcion,etactivo) VALUES(
            '" . $this->getEtdescripcion() . "',
            '" . $this->getEtactivo() . "',);";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdestadotipos($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE estadotipos SET 
            etdescripcion='" . $this->getEtdescripcion() . "',
            etactivo='" . $this->getEtactivo() . "' WHERE idestadotipos=" . $this->getIdestadotipos();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->modificar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM estadotipos WHERE idestadotipos=" . $this->getIdestadotipos();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Tabla->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM estadotipos ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new estadotipos();
                    $obj->setear($row['idestadotipos'], $row['etdescripcion'], $row['etactivo']);
                    array_push($arreglo, $obj);
                }
            }
        }
        return $arreglo;
    }

    public function getIdestadotipos()
    {
        return $this->idestadotipos;
    }

    public function getEtdescripcion()
    {
        return $this->etdescripcion;
    }

    public function getEtactivo()
    {
        return $this->etactivo;
    }

    public function getmensajeoperacion()
    {
        return $this->mensajeoperacion;
    }

    public function setIdestadotipos($idestadotipos)
    {
        $this->idestadotipos = $idestadotipos;
    }

    public function setEtdescripcion($etdescripcion)
    {
        $this->etdescripcion = $etdescripcion;
    }

    public function setEtactivo($etactivo)
    {
        $this->etactivo = $etactivo;
    }

    public function setmensajeoperacion($valor)
    {
        $this->mensajeoperacion = $valor;
    }
}