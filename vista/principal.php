<?php
include_once('../configuracion.php');
include('./estructura/head.php');

?>
<div class="wrapper">
    <?php include('estructura/up_menu.php') ?>
    <?php include('estructura/left_menu.php') ?>
    <div class="content-wrapper d-flex justify-content-center">
        <section class="content col-6 mt-5">
            <div class="alert alert-success d-flex justify-content-center mt-5" role="alert">
                <h1>¡BIENVENIDO!</h1>
            </div>
            <hr>
            <div class="d-flex justify-content-center">
                <p class="mb-0">
                <h4>Sistema para subir archivos a la nube FiDrive</h4>
                </p>
            </div>
        </section>
    </div>
</div>
<?php include('./estructura/footer.php') ?>
<script src="javascript.js"></script>