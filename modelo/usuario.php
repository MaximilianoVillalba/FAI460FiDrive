<?php
class usuario
{
    private $idusuario;
    private $usnombre;
    private $usapellido;
    private $uslogin;
    private $usclave;
    private $usactivo;
    private $mensajeoperacion;

    public function __construct()
    {
        $this->idusuario = "";
        $this->usnombre = "";
        $this->usapellido = "";
        $this->uslogin = "";
        $this->usclave = "";
        $this->usactivo = "";
    }

    public function setear($idusuario, $usnombre, $usapellido, $uslogin, $usclave, $usactivo)
    {
        $this->setIdusuario($idusuario);
        $this->setUsnombre($usnombre);
        $this->setUsapellido($usapellido);
        $this->setUslogin($uslogin);
        $this->setUsclave($usclave);
        $this->setUsactivo($usactivo);
    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuario WHERE idusuario = " . $this->getIdusuario();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idusuario'], $row['usnombre'], $row['usapellido'], $row['uslogin'], $row['usclave'], $row['usactivo']);
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
        $sql = "INSERT INTO usuario(usnombre,usapellido,uslogin,usclave,usactivo) VALUES(
            '" . $this->getUsnombre() . "',
            '" . $this->getUsapellido() . "',
            '" . $this->getUslogin() . "',
            '" . $this->getUsclave() . "',
            '" . $this->getUsactivo() . "');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdusuario($elid);
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
        $sql = "UPDATE usuario SET 
            usnombre='" . $this->getUsnombre() . "',
            usapellido='" . $this->getUsapellido() . "',
            uslogin='" . $this->getUslogin() . "',
            usclave='" . $this->getUsclave() . "',
            idrol='" . $this->getUsactivo() . "' WHERE idusuario =" . $this->getIdusuario();
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
        $sql = "DELETE FROM usuario WHERE idusuario=" . $this->getIdusuario();
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
        $sql = "SELECT * FROM usuario";
        if ($parametro != "") {
            $sql .= ' WHERE' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new usuario();
                    $obj->setear($row['idusuario'], $row['usnombre'], $row['usapellido'], $row['uslogin'], $row['usclave'], $row['usactivo']);
                    array_push($arreglo, $obj);
                }
            }
        }
        return $arreglo;
    }

    public function getIdusuario()
    {
        return $this->idusuario;
    }

    public function getUsnombre()
    {
        return $this->usnombre;
    }

    public function getUsapellido()
    {
        return $this->usapellido;
    }

    public function getUslogin()
    {
        return $this->uslogin;
    }

    public function getUsclave()
    {
        return $this->usclave;
    }

    public function getUsactivo()
    {
        return $this->usactivo;
    }

    public function getmensajeoperacion()
    {
        return $this->mensajeoperacion;
    }

    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    public function setUsnombre($usnombre)
    {
        $this->usnombre = $usnombre;
    }

    public function setUsapellido($usapellido)
    {
        $this->usapellido = $usapellido;
    }

    public function setUslogin($uslogin)
    {
        $this->uslogin = $uslogin;
    }

    public function setUsclave($usclave)
    {
        $this->usclave = $usclave;
    }

    public function setUsactivo($usactivo)
    {
        $this->usactivo = $usactivo;
    }

    public function setmensajeoperacion($valor)
    {
        $this->mensajeoperacion = $valor;
    }
}