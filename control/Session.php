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
        if (version_compare(phpversion(), '5.4.0', '>=')) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
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
            $param['idrol'] = $usuarioLoggueado->getRol();

            $objRol = new AbmRol();

            $rolUser = $objRol->buscar($param);

            $rol = $rolUser[0]->getRoDescripcion();
        }
        return $rol;
    }

    public function cerrar()
    {
        if ($this->activa()) {
            session_destroy();
            header("Location:index.php");
        }
    }
}