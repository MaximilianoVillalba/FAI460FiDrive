<?php
include('estructura/head.php');
include_once('../control/control_create_folder.php');

$objeto = new control_create_folder();

$respuesta = $objeto->crearCarpeta($_POST);

?>
<div class="wrapper">
    <?php include('estructura/up_menu.php') ?>
    <?php include('estructura/left_menu.php') ?>
    <div class="content-wrapper">
        <section class="content d-flex justify-content-center">
            <div class="col-6 mt-5">
                <div class="row alert alert-info" role="alert">
                    <div class="col-7">
                        <div class=""><?php echo $respuesta ?></div>
                    </div>
                    <div class="col-5 d-flex justify-content-end">
                        <a href="../vista/contenido.php">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
include('estructura/footer.php')
?>