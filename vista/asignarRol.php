<?php
include('./estructura/head.php');

$objSession->paginaAsegurada();

$objAbmRol = new AbmRol();
$listaRoles = $objAbmRol->buscar(null);

if (isset($_GET['idusuario'])) {
    $objUsuario = new AbmUsuario();
    $usuario = $objUsuario->buscar($_GET);
    print_r($usuario);
    $accion = "modificar";
} else {
    $objUsuario = new AbmUsuario();
    $listaUsuarios = $objUsuario->buscar(null);
    $accion = "alta";
}

?>
<div class="wrapper">
    <?php include('estructura/up_menu.php') ?>
    <?php include('estructura/left_menu.php') ?>
    <div class="content-wrapper d-flex justify-content-center">
        <section class="content col-7 mt-5">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Cargar Rol a Usuario</h3>
                </div>
                <form class="form-horizontal" action="abmUsuarioRol.php" method="POST">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">ID Usuario</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="idusuario">
                                    <?php
                                    if ($accion == 'modificar') { ?>
                                    <option selected value="<?php echo $usuario[0]->getIdusuario() ?>">
                                        <?php echo $usuario[0]->getUsnombre() ?></option>
                                    <?php } else {
                                        foreach ($listaUsuarios as $objUser) { ?>
                                    <option value="<?php echo $objUser->getIdusuario() ?>">
                                        <?php echo $objUser->getUsnombre() ?></option>
                                    <?php } //Fin foreach 
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Rol</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="idrol">
                                    <?php
                                    if (count($listaRoles) > 0) {
                                        foreach ($listaRoles as $objRol) { ?>
                                    <option value="<?php echo $objRol->getIdRol() ?>">
                                        <?php echo $objRol->getRoDescripcion() ?></option>
                                    <?php
                                        } //Fin foreach
                                    } else { //Fin if 
                                        ?>
                                    <option value="">No hay roles cargados</option>
                                    <?php } ?>
                                </select>
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
    <?php include('./estructura/footer.php') ?>
    <script src="javascript.js"></script>