<?php
include('./estructura/head.php');

$datos = data_submitted();
$objUsuario = new AbmUsuario();

if ($datos['accion'] == 'alta') {
    $resp = $objUsuario->alta($datos);
}
?>
<div class="wrapper">
    <?php include('estructura/up_menu.php') ?>
    <?php include('estructura/left_menu.php') ?>
    <div class="content-wrapper">
        <section class="content d-flex justify-content-center">
            <div class="row mt-4">
                <div class="col-12">
                    <?php if ($resp) { ?>
                    <div class="alert alert-success" role="alert">
                        Accion realizada correctamente
                    </div>
                    <?php } else { ?>
                    <div class="alert alert-danger" role="alert">
                        Error al realizar la accion
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>
    <?php include('./estructura/footer.php') ?>
    <script src="javascript.js"></script>