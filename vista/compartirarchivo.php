<?php
include_once('../configuracion.php');
include('estructura/head.php');

$datos = data_submitted();

$objetoUsuario = new AbmUsuario();
$listaUsuarios = $objetoUsuario->buscar(null);

$objeto = new control_share();

$id = $objeto->traerId($datos);

$objArchivo = new AbmArchivoCargado();
$archivoSeleccionado = $objArchivo->buscar($datos);

?>
<div class="wrapper">
    <?php include('estructura/up_menu.php') ?>
    <?php include('estructura/left_menu.php') ?>
    <div class="content-wrapper">
        <section class="content d-flex justify-content-center">
            <div class="col-md-10 mt-5">
                <div class="card card-info">
                    <div class="card-header d-flex justify-content-center">
                        <h3 class="card-title">Formulario de Comparticion</h3>
                    </div>
                    <form role="form" id="form-carga" method="POST" action="abmArchivo.php">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1">Nombre del archivo</label>
                                    <input type="text" class="form-control"
                                        value="<?php echo $archivoSeleccionado[0]->getAcnombre() ?>" id="input_name"
                                        name="acnombre">
                                    <input type="hidden" value="modificar" name="accion">
                                    <input type="hidden" value="<?php echo $id ?>" name="idarchivocargado">
                                    <input type="hidden"
                                        value="<?php echo $archivoSeleccionado[0]->getAcdescripcion() ?>"
                                        name="acdescripcion">
                                    <input type="hidden" value="<?php echo $archivoSeleccionado[0]->getAcicono() ?>"
                                        name="acicono">
                                    <input type="hidden"
                                        value="<?php echo $archivoSeleccionado[0]->getAccantidadusada() ?>"
                                        name="accantidadusada">
                                </div>
                                <div class="form-group col-4">
                                    <label>Cantidad de dias que se comparte</label>
                                    <input type="text" class="form-control" id="input_dias"
                                        name="acefechafincompartirSinSumar">
                                </div>
                                <div class="form-group col-4">
                                    <label>Cantidad de descargas posibles</label>
                                    <input type="text" class="form-control" id="input_descargas"
                                        name="accantidaddescarga">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Seleccione usuario que lo carga</label>
                                <select class="form-control" name="idusuario">
                                    <option value="" selected>Seleccione usuario</option>
                                    <?php foreach ($listaUsuarios as $objUsuario) { ?>
                                    <option value="<?php echo $objUsuario->getIdusuario() ?>">
                                        <?php echo $objUsuario->getUsnombre(); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="">Se debe proteger con contraseña?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="protected">
                                        <label class="form-check-label">SI</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="protected" checked>
                                        <label class="form-check-label">NO</label>
                                    </div>
                                </div>
                                <div class="form-group col-8">
                                    <label for="">Contraseña</label>
                                    <input type="password" class="form-control" id="input_password"
                                        name="acprotegidoclave">
                                    <small id="fortaleza_clave"></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success" id="generarHash">Generar Hash</button>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center ">
                                <div class="alert alert-info d-none" role="alert" id="div_hash">
                                    <input type="hidden" id="link_hash" href="" name="aclinkacceso"></input>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
include('estructura/footer.php')
?>