<?php
class Session
{
    public function __construct()
    {
        session_start();
    }

    public function iniciar($nombreUsuario, $psw)
    {
        $_SESSION['uslogin'] = $nombreUsuario;
        $_SESSION['usclave'] = $psw;
    }

    public function validar()
    {
        $resp = false;
        $objUsuario = new AbmUsuario();
        $lista = $objUsuario->buscar($_SESSION);

        if ($lista != null) {
            $resp = true;
        }

        return $resp;
    }

    public function activa()
    {
        $resp = false;
        if (session_status() == PHP_SESSION_ACTIVE) {
            $resp = true;
        }
        return $resp;
    }

    public function getUsuario()
    {
        if ($this->validar() && $this->activa()) {
            $usuario = new AbmUsuario();
            $lista = $usuario->buscar($_SESSION);
            $usuarioLoggueado = $lista[0];
        }
        return $usuarioLoggueado;
    }

    public function getRol()
    {
        if ($this->getUsuario() != null) {
            /* Obtenemos al usuario loggueado */
            $usuarioLoggueado = $this->getUsuario();
            /* Tomamos el id del usuario */
            $param['idusuario'] = $usuarioLoggueado->getIdusuario();

            $objUserRol = new AbmUsuarioRol();

            $arregloRoles = $objUserRol->buscar($param);

            $objRol = new AbmRol();
            $arregloRolesUser = array();
            foreach ($arregloRoles as $obj) {
                $dato['idrol'] = $obj->getIdRol();
                $rol = $objRol->buscar($dato);
                array_push($arregloRolesUser, $rol[0]);
            }
        }
        return $arregloRolesUser;
    }

    public function validarPermisos()
    {
        $esAdmin = false;
        if ($this->getUsuario() != null) {
            $roles = $this->getRol();
            foreach ($roles as $rol) {
                if ($rol->getRoDescripcion() == 'administrador') {
                    $esAdmin = true;
                }
            }
        }
        return $esAdmin;
    }

    public function paginaAsegurada()
    {
        if (!$this->validarPermisos()) {
            header("Location:principal.php");
        }
    }

    public function cerrar()
    {
        if ($this->activa()) {
            session_destroy();
            header("Location:index.php");
        }
    }
}