<?php
include_once('../configuracion.php');
include('estructura/head.php');

$objeto = new control_listados();

$listado = $objeto->listFilesPersonalized();
?>
<div class="wrapper">
    <?php include('estructura/up_menu.php') ?>
    <?php include('estructura/left_menu.php') ?>
    <div class="content-wrapper">
        <section class="content d-flex justify-content-center">
            <div class="col-md-8 mt-5">
                <?php
                echo $listado;
                ?>
            </div>
        </section>
    </div>
</div>
<?php
include('estructura/footer.php')
?>