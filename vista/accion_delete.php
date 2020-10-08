<?php
include('estructura/head.php');
include_once('../control/control_delete.php');

$objeto = new control_delete();

$respuesta = $objeto->borrarArchivo($_POST);

?>
<div class="wrapper">
    <?php include('estructura/up_menu.php') ?>
    <?php include('estructura/left_menu.php') ?>
    <div class="content-wrapper">
        <section class="content d-flex justify-content-center">
            <div class="col-md-8 mt-5">
                    <div class="alert alert-info" role="alert">
                        <?php print_r($respuesta)  ?>
                    </div>
            </div>
        </section>
    </div>
</div>
<?php
include('estructura/footer.php')
?>