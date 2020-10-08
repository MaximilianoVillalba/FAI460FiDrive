<?php
include('estructura/head.php');

include_once('../control/control_share.php');

$objeto = new control_share();

$name = $objeto->devolverDato($_GET);

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
                    <form role="form" id="form-carga">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1">Nombre del archivo</label>
                                    <input type="text" class="form-control" value="<?php echo $name ?>" id="input_name">
                                </div>
                                <div class="form-group col-4">
                                    <label>Cantidad de dias que se comparte</label>
                                    <input type="text" class="form-control" id="input_dias">
                                </div>
                                <div class="form-group col-4">
                                    <label>Cantidad de descargas posibles</label>
                                    <input type="text" class="form-control" id="input_descargas">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Seleccione usuario que lo carga</label>
                                <select class="form-control" name="usuario_seleccionado">
                                    <option value="" selected>Seleccione usuario</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="visitante">Visitante</option>
                                    <option value="yo">Yo</option>
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
                                    <input type="password" class="form-control" id="input_password">
                                    <small id="fortaleza_clave"></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 d-flex justify-content-center">
                                    <button type="button" class="btn btn-success" id="generarHash">Generar Hash</button>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center ">
                                <div class="alert alert-info d-none" role="alert" id="div_hash">
                                    <a id="link_hash" href=""></a>
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