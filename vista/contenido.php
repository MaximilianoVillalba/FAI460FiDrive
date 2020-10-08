<?php
include('estructura/head.php');
include_once('../control/control_listados.php');

$objeto = new control_listados();

$listado = $objeto->listFiles("../archivos/");

?>
<div class="wrapper">
    <?php include('estructura/up_menu.php') ?>
    <?php include('estructura/left_menu.php') ?>
    <div class="content-wrapper">
        <section class="content d-flex justify-content-center">
            <div class="col-md-8 mt-5">
                <form action="accion.php" method="POST">
                <?php echo $listado ?>
                <div class="m-2 d-flex justify-content-center">
                    <button type="submit" class="btn btn-info">Generar Carpeta</button>
                </div>
                </form>
            </div>
        </section>
    </div>
</div>
<?php
include('estructura/footer.php')
?>