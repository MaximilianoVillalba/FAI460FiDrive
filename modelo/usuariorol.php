<?php

class Usuariorol
{
    private $idusuario;
    private $idrol;
    private $mensajeoperacion;

    public function __construct()
    {
        $this->idusuario;
        $this->idrol;
    }

    public function setear($idUser, $idRol)
    {
        $this->idusuario = $idUser;
        $this->idrol = $idRol;
    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuariorol WHERE idusuario =" . $this->getIdUsuario() . ' AND idrol=' . $this->getIdRol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idusuario'], $row['idrol']);
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
        $sql = "INSERT INTO usuariorol(idusuario,idrol) VALUES('" . $this->getIdUsuario() . "','" . $this->getIdRol() . "');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
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
        $sql = "UPDATE usuariorol SET idrol='" . $this->getIdRol() . "' WHERE idusuario=" . $this->getIdUsuario();
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
        $sql = "DELETE FROM usuariorol WHERE usuariorol=" . $this->getIdUsuario();
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
        $sql = "SELECT * FROM usuariorol ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Usuariorol();
                    $obj->setear($row['idusuario'], $row['idrol']);
                    array_push($arreglo, $obj);
                }
            }
        }
        return $arreglo;
    }

    /* GETTERS */
    public function getIdUsuario()
    {
        return $this->idusuario;
    }
    public function getIdRol()
    {
        return $this->idrol;
    }
    public function getMensajeOperacion()
    {
        return $this->mensajeoperacion;
    }

    /* SETTERS */
    public function setIdUsuario($idUser)
    {
        $this->idusuario = $idUser;
    }
    public function setIdRol($idRol)
    {
        $this->idrol = $idRol;
    }
    public function setmensajeoperacion($mensaje)
    {
        $this->mensajeoperacion = $mensaje;
    }
}