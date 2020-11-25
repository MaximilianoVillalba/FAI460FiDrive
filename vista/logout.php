<?php
include('./estructura/head_login.php');

$datos = data_submitted();

if ($datos['accion'] == 'salir') {
    $objSession = new Session();
    $resp = $objSession->cerrar();
}
?>
<div class="content-wrapper">
    <section class="content d-flex justify-content-center">
        <div class="row mt-4">
            <div class="col-12">
                <?php if ($resp) { ?>
                <div class="alert alert-success" role="alert">
                    Sesion cerrada correctamente
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