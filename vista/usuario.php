<?php
include('./estructura/head.php');
$datos = data_submitted();

$objSession->paginaAsegurada();

$objetoUsuario = new AbmUsuario();

$objAbmRol = new AbmRol();
$listaRoles = $objAbmRol->buscar(null);

?>
<div class="wrapper">
    <?php include('estructura/up_menu.php') ?>
    <?php include('estructura/left_menu.php') ?>
    <div class="content-wrapper d-flex justify-content-center">
        <section class="content col-7 mt-5">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Cargar Usuario</h3>
                </div>
                <form class="form-horizontal" action="abmUsuario.php" method="POST">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="usnombre">
                                <input type="hidden" class="form-control" name="accion" value="alta">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Apellido</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="usapellido">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre de usuario</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="uslogin">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="usclave">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-info">Cargar</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<?php include('./estructura/footer.php') ?>
<script src="javascript.js"></script>