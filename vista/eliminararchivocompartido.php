<?php
include_once('../configuracion.php');
include('estructura/head.php');

$datos = data_submitted();

$objetoUsuario = new AbmUsuario();
$listaUsuarios = $objetoUsuario->buscar(null);

$objArchivo = new AbmArchivoCargado();
$archivoSeleccionado = $objArchivo->buscar($datos);

print_r($archivoSeleccionado);

?>
<div class="wrapper">
    <?php include('estructura/up_menu.php') ?>
    <?php include('estructura/left_menu.php') ?>
    <div class="content-wrapper">
        <section class="content d-flex justify-content-center">
            <div class="col-md-10 mt-5">
                <div class="card card-info">
                    <div class="card-header d-flex justify-content-center">
                        <h3 class="card-title">Formulario de Eliminacion de Compartido</h3>
                    </div>
                    <form id="form-carga" method="POST" action="abmArchivoEstado.php">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="exampleInputEmail1">Nombre del archivo</label>
                                    <input type="text" class="form-control"
                                        value="<?php echo $archivoSeleccionado[0]->getAcnombre() ?>" readonly>
                                    <input type="hidden" value="noCompartir" name="accion">
                                    <input type="hidden" value="3" name="idestadotipos">
                                    <input type="hidden"
                                        value="<?php echo $archivoSeleccionado[0]->getIdarchivocargado() ?>"
                                        name="idarchivocargado">
                                </div>
                                <div class="form-group col-6">
                                    <label>Seleccione usuario que lo carga</label>
                                    <select class="form-control" name="idusuario">
                                        <option value="" selected disabled>Seleccione usuario</option>
                                        <?php foreach ($listaUsuarios as $objUsuario) { ?>
                                        <option value="<?php echo $objUsuario->getIdusuario() ?>">
                                            <?php echo $objUsuario->getUsnombre(); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Motivo por el cual deja de compartir</label>
                                <textarea class="form-control" cols="10" rows="4" name="acedescripcion"></textarea>
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