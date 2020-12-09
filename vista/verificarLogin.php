<?php
//include('../control/Session.php');
include('../configuracion.php');

$objSession = new Session();

$datos = data_submitted();

$objSession->iniciar($datos['uslogin']);

if ($objSession->validar($datos)) {
    header("Location:principal.php");
} else {
    $objSession->cerrar();
    header("Location:index.php?message=0");
}