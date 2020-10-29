<?php
class archivocargado
{
    private $idarchivocargado;
    private $acnombre;
    private $acdescripcion;
    private $acicono;
    private $idusuario;
    private $aclinkacceso;
    private $accantidaddescarga;
    private $accantidadusada;
    private $acfechainiciocompartir;
    private $acefechafincompartir;
    private $acprotegidoclave;
    private $mensajeoperacion;

    public function __construct()
    {
        $this->idarchivocargado = "";
        $this->acnombre = "";
        $this->acdescripcion = "";
        $this->acicono = "";
        $this->idusuario = "";
        $this->aclinkacceso = "";
        $this->accantidaddescarga = "";
        $this->accantidadusada = "";
        $this->acfechainiciocompartir = "";
        $this->acefechafincompartir = "";
        $this->acprotegidoclave = "";
    }

    public function setear($idarchivocargado, $acnombre, $acdescripcion, $acicono, $idusuario, $aclinkacceso, $accantidaddescarga, $accantidadusada, $acfechainiciocompartir, $acefechafincompartir, $acprotegidoclave)
    {
        $this->setIdarchivocargado($idarchivocargado);
        $this->setAcnombre($acnombre);
        $this->setAcdescripcion($acdescripcion);
        $this->setAcicono($acicono);
        $this->setIdusuario($idusuario);
        $this->setAclinkacceso($aclinkacceso);
        $this->setAccantidaddescarga($accantidaddescarga);
        $this->setAccantidadusada($accantidadusada);
        $this->setAcfechainiciocompartir($acfechainiciocompartir);
        $this->setAcefechafincompartir($acefechafincompartir);
        $this->setAcprotegidoclave($acprotegidoclave);
    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM archivocargado WHERE idarchivocargado= " . $this->getIdarchivocargado();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear(
                        $row['idarchivocargado'],
                        $row['acnombre'],
                        $row['acdescripcion'],
                        $row['acicono'],
                        $row['idusuario '],
                        $row['aclinkacceso'],
                        $row['accantidaddescarga'],
                        $row['accantidadusada'],
                        $row['acfechainiciocompartir'],
                        $row['acefechafincompartir'],
                        $row['acprotegidoclave']
                    );
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
        $sql = "INSERT INTO archivocargado(acnombre,acdescripcion,acicono,idusuario,aclinkacceso,accantidaddescarga,accantidadusada,acfechainiciocompartir,acefechafincompartir,acprotegidoclave) VALUES(
            '" . $this->getAcnombre() . "',
            '" . $this->getAcdescripcion() . "',
            '" . $this->getAcicono() . "',
            '" . $this->getIdusuario() . "',
            '" . $this->getAclinkacceso() . "',
            '" . $this->getAccantidaddescarga() . "',
            '" . $this->getAccantidadusada() . "',
            '" . $this->getAcfechainiciocompartir() . "',
            '" . $this->getAcefechafincompartir() . "',
            '" . $this->getAcprotegidoclave() . "');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdarchivocargado($elid);
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
        $sql = "UPDATE archivocargado SET 
            acnombre='" . $this->getAcnombre() . "',
            acdescripcion='" . $this->getAcdescripcion() . "',
            acicono='" . $this->getAcicono() . "',
            idusuario='" . $this->getIdusuario() . "',
            aclinkacceso='" . $this->getAclinkacceso() . "',
            accantidaddescarga='" . $this->getAccantidaddescarga() . "',
            accantidadusada='" . $this->getAccantidadusada() . "',
            acfechainiciocompartir='" . $this->getAcfechainiciocompartir() . "',
            acefechafincompartir='" . $this->getAcefechafincompartir() . "',
            acprotegidoclave='" . $this->getAcprotegidoclave() . "' WHERE idarchivocargado=" . $this->getIdarchivocargado();
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
        $sql = "DELETE FROM archivocargado WHERE idarchivocargado=" . $this->getIdarchivocargado();
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
        $sql = "SELECT * FROM archivocargado ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
            echo "Consulta" . $sql;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new archivocargado();
                    $usuario = usuario::listar(' idusuario=' . $row['idusuario']);
                    //$estados = archivocargadoestado::listar(' idarchivocargado=' . $row['idarchivocargado']);
                    $obj->setear($row['idarchivocargado'], $row['acnombre'], $row['acdescripcion'], $row['acicono'], $usuario, $row['aclinkacceso'], $row['accantidaddescarga'], $row['accantidadusada'], $row['acfechainiciocompartir'], $row['acefechafincompartir'], $row['acprotegidoclave']);
                    array_push($arreglo, $obj);
                }
            }
        }
        return $arreglo;
    }

    public function getIdarchivocargado()
    {
        return $this->idarchivocargado;
    }

    public function getAcnombre()
    {
        return $this->acnombre;
    }

    public function getAcdescripcion()
    {
        return $this->acdescripcion;
    }

    public function getAcicono()
    {
        return $this->acicono;
    }

    public function getIdusuario()
    {
        return $this->idusuario;
    }

    public function getAclinkacceso()
    {
        return $this->aclinkacceso;
    }

    public function getAccantidaddescarga()
    {
        return $this->accantidaddescarga;
    }

    public function getAccantidadusada()
    {
        return $this->accantidadusada;
    }

    public function getAcfechainiciocompartir()
    {
        return $this->acfechainiciocompartir;
    }

    public function getAcefechafincompartir()
    {
        return $this->acefechafincompartir;
    }

    public function getAcprotegidoclave()
    {
        return $this->acprotegidoclave;
    }
    public function getmensajeoperacion()
    {
        return $this->mensajeoperacion;
    }

    /* SETTERS */

    public function setIdarchivocargado($idarchivocargado)
    {
        $this->idarchivocargado = $idarchivocargado;
    }

    public function setAcnombre($acnombre)
    {
        $this->acnombre = $acnombre;
    }

    public function setAcdescripcion($acdescripcion)
    {
        $this->acdescripcion = $acdescripcion;
    }

    public function setAcicono($acicono)
    {
        $this->acicono = $acicono;
    }

    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    public function setAclinkacceso($aclinkacceso)
    {
        $this->aclinkacceso = $aclinkacceso;
    }

    public function setAccantidaddescarga($accantidaddescarga)
    {
        $this->accantidaddescarga = $accantidaddescarga;
    }

    public function setAccantidadusada($accantidadusada)
    {
        $this->accantidadusada = $accantidadusada;
    }

    public function setAcfechainiciocompartir($acfechainiciocompartir)
    {
        $this->acfechainiciocompartir = $acfechainiciocompartir;
    }

    public function setAcefechafincompartir($acefechafincompartir)
    {
        $this->acefechafincompartir = $acefechafincompartir;
    }

    public function setAcprotegidoclave($acprotegidoclave)
    {
        $this->acprotegidoclave = $acprotegidoclave;
    }

    public function setmensajeoperacion($valor)
    {
        $this->mensajeoperacion = $valor;
    }
}