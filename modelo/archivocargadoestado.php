<?php
class archivocargadoestado
{
    private $idarchivocargadoestado;
    private $idestadotipos;
    private $acedescripcion;
    private $idusuario;
    private $acefechaingreso;
    private $acefechafin;
    private $idarchivocargado;
    private $mensajeoperacion;

    public function __construct()
    {
        $this->idarchivocargadoestado = "";
        $this->idestadotipos = "";
        $this->acedescripcion = "";
        $this->idusuario = "";
        $this->acefechaingreso = "";
        $this->acefechafin = "";
        $this->idarchivocargado = "";
    }

    public function setear($idarchivocargadoestado, $idestadotipos, $acedescripcion, $idusuario, $acefechaingreso, $acefechafin, $idarchivocargado)
    {
        $this->setIdarchivocargadoestado($idarchivocargadoestado);
        $this->setIdestadotipos($idestadotipos);
        $this->setAcedescripcion($acedescripcion);
        $this->setIdusuario($idusuario);
        $this->setAcefechaingreso($acefechaingreso);
        $this->setAcefechafin($acefechafin);
        $this->setIdarchivocargado($idarchivocargado);
    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM archivocargadoestado WHERE idarchivocargadoestado= " . $this->getIdarchivocargadoestado();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idarchivocargadoestado'], $row['idestadotipos'], $row['acedescripcion'], $row['idusuario '], $row['acefechaingreso'], $row['acefechafin'], $row['idarchivocargado']);
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
        $sql = "INSERT INTO archivocargadoestado(idestadotipos,acedescripcion,idusuario,acefechaingreso,acefechafin,idarchivocargado) VALUES(
            '" . $this->getIdestadotipos() . "',
            '" . $this->getAcedescripcion() . "',
            '" . $this->getIdusuario() . "',
            '" . $this->getAcefechaingreso() . "',
            '" . $this->getAcefechafin() . "',
            '" . $this->getIdarchivocargado() . "');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdestadotipos($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("archivocargadoestado1->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("archivocargadoestado2->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE archivocargadoestado SET 
            idestadotipos='" . $this->getIdestadotipos() . "',
            acedescripcion='" . $this->getAcedescripcion() . "',
            idusuario='" . $this->getIdusuario() . "',
            acefechaingreso='" . $this->getAcefechaingreso() . "',
            acefechafin='" . $this->getAcefechafin() . "',
            idarchivocargado='" . $this->getIdarchivocargado() . "' WHERE idarchivocargadoestado=" . $this->getIdarchivocargadoestado();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("EstadoArchivo->modificar1: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("EstadoArchivo->modificar2: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM archivocargadoestado WHERE idarchivocargadoestado=" . $this->getIdarchivocargadoestado();
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
        $sql = "SELECT * FROM archivocargadoestado ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new archivocargadoestado();
                    //$archivo = archivocargado::listar('idarchivocargado='.$row['idarchivocargado']);
                    $obj->setear($row['idarchivocargadoestado'], $row['idestadotipos'], $row['acedescripcion'], $row['idusuario'], $row['acefechaingreso'], $row['acefechafin'], $row['idarchivocargado']);
                    array_push($arreglo, $obj);
                }
            }
        }
        return $arreglo;
    }

    public function getIdarchivocargadoestado()
    {
        return $this->idarchivocargadoestado;
    }

    public function getIdestadotipos()
    {
        return $this->idestadotipos;
    }

    public function getAcedescripcion()
    {
        return $this->acedescripcion;
    }

    public function getIdusuario()
    {
        return $this->idusuario;
    }

    public function getAcefechaingreso()
    {
        return $this->acefechaingreso;
    }

    public function getAcefechafin()
    {
        return $this->acefechafin;
    }

    public function getIdarchivocargado()
    {
        return $this->idarchivocargado;
    }

    public function getmensajeoperacion()
    {
        return $this->mensajeoperacion;
    }

    public function setIdarchivocargadoestado($idarchivocargadoestado)
    {
        $this->idarchivocargadoestado = $idarchivocargadoestado;
    }

    public function setIdestadotipos($idestadotipos)
    {
        $this->idestadotipos = $idestadotipos;
    }

    public function setAcedescripcion($acedescripcion)
    {
        $this->acedescripcion = $acedescripcion;
    }

    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    public function setAcefechaingreso($acefechaingreso)
    {
        $this->acefechaingreso = $acefechaingreso;
    }

    public function setAcefechafin($acefechafin)
    {
        $this->acefechafin = $acefechafin;
    }

    public function setIdarchivocargado($idarchivocargado)
    {
        $this->idarchivocargado = $idarchivocargado;
    }

    public function setmensajeoperacion($valor)
    {
        $this->mensajeoperacion = $valor;
    }
}