<?php
include('estructura/head.php');
include_once('../control/control_upload.php');

$objeto = new control_upload();

$respuesta = $objeto->subirArchivo($_POST);

?>
<div class="wrapper">
    <?php include('estructura/up_menu.php') ?>
    <?php include('estructura/left_menu.php') ?>
    <div class="content-wrapper">
        <section class="content d-flex justify-content-center">
            <div class="col-md-8 mt-5">
                    <div class="alert alert-info" role="alert">
                        <?php echo($respuesta)  ?>
                    </div>
            </div>
        </section>
    </div>
</div>
<?php
include('estructura/footer.php')
?>