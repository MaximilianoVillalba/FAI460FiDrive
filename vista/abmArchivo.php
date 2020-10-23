<?php
include_once('../configuracion.php');
include('estructura/head.php');

$datos = data_submitted();

$objArchivo = new AbmArchivoCargado();
$objSubida = new control_upload();

$objArchivoEstado = new AbmArchivoCargadoEstado();

$resp = false;
$mensaje = '';
if (isset($datos['accion'])) {
    if ($datos['accion'] == 'cargar') {
        if ($objArchivo->alta($datos)) {
            if ($objSubida->subirArchivo($datos)) {
                $resp = true;
            }
        }
    }
    if ($datos['accion'] == 'baja') {
        if ($objArchivoEstado->modificacion($datos)) {
            $resp = true;
        }
    }
    if ($datos['accion'] == 'modificar') {
        if ($objArchivo->modificacion($datos)) {
            $resp = true;
        }
    }

    if ($resp) {
        $mensaje = "La accion se realizo correctamente.";
    } else {
        $mensaje = "La accion no pudo concretarse.";
    }
}

?>

<div class="wrapper">
    <?php include('estructura/up_menu.php') ?>
    <?php include('estructura/left_menu.php') ?>
    <div class="content-wrapper">
        <section class="content d-flex justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="alert alert-info" role="alert">
                    <?php echo $mensaje ?>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
include('estructura/footer.php')
?>