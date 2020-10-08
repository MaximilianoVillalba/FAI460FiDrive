<?php
include('estructura/head.php');

include_once('../control/control_delete.php');

$objeto = new control_delete();

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
                        <h3 class="card-title">Formulario de Eliminacion de Archivo</h3>
                    </div>
                    <form role="form" id="form-carga" action="accion_delete.php" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre del archivo</label>
                                <input type="text" class="form-control" value="<?php echo $name ?>" readonly>
                                <input type="hidden" value="<?php echo $_GET['carpeta'] ?>" name="carpeta">
                            </div>
                            <div class="form-group">
                                <label for="">Motivo por el cual elimina el archivo</label>
                                <textarea class="form-control" cols="10" rows="4" name="motivo"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Seleccione usuario que lo elimina</label>
                                <select class="form-control" name="usuario_seleccionado">
                                    <option value="" selected>Seleccione usuario</option>
                                    <option value="administrador" selected>Administrador</option>
                                    <option value="visitante">Visitante</option>
                                    <option value="yo">Yo</option>
                                </select>
                            </div>
                        </div>
                        <div class="m-2 d-flex justify-content-center">
                            <button type="submit" class="btn btn-info">Enviar</button>
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