<?php
include('./estructura/head.php');

?>
<div class="wrapper">
    <?php include('estructura/up_menu.php') ?>
    <?php include('estructura/left_menu.php') ?>
    <div class="content-wrapper d-flex justify-content-center">
        <section class="content col-6 mt-5">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Cargar Rol</h3>
                </div>
                <form class="form" action="abmRol.php" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Descripcion Rol</label>
                            <input type="text" class="form-control" name="rodescripcion">
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-info">Cargar</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <?php include('./estructura/footer.php') ?>
    <script src="javascript.js"></script>