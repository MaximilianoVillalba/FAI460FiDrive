<?php
include('../control/Session.php');

$objSession = new Session();

include('../configuracion.php');

$datos = data_submitted();

$objSession->iniciar($datos['uslogin'], $datos['usclave']);

if ($objSession->validar($datos)) {
    header("Location:principal.php");
} else {
    header("Location:index.php?message=0");
}