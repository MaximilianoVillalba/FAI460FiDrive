<?php
include_once('../configuracion.php');
include('estructura/head.php');

$datos = data_submitted();

$objetoUsuario = new AbmUsuario();
$listaUsuarios = $objetoUsuario->buscar(null);

$objArchivo = new AbmArchivoCargado();
$archivoSeleccionado = $objArchivo->buscar($datos);

//print_r($archivoSeleccionado);

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
                    <form role="form" id="form-carga" action="abmArchivo.php" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre del archivo</label>
                                <input type="text" class="form-control"
                                    value="<?php echo $archivoSeleccionado[0]->getAcnombre() ?>" readonly>
                                <input type="hidden" value="baja" name="accion">
                                <input type="hidden" value="4" name="idestadotipos">
                                <input type="hidden"
                                    value="<?php echo $archivoSeleccionado[0]->getIdarchivocargado() ?>"
                                    name="idarchivocargado">
                            </div>
                            <div class="form-group">
                                <label for="">Motivo por el cual elimina el archivo</label>
                                <textarea class="form-control" cols="10" rows="4" name="acedescripcion"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Seleccione usuario que lo elimina</label>
                                <select class="form-control" name="idusuario">
                                    <option value="" selected>Seleccione usuario</option>
                                    <?php foreach ($listaUsuarios as $objUsuario) { ?>
                                    <option value="<?php echo $objUsuario->getIdusuario() ?>">
                                        <?php echo $objUsuario->getUsnombre(); ?></option>
                                    <?php } ?>
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