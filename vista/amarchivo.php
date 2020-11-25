<?php
include_once('../configuracion.php');
include('estructura/head.php');

$datos = data_submitted();

$userLoggueado = $objSession->getUsuario();

$objetoUsuario = new AbmUsuario();
$listaUsuarios = $objetoUsuario->buscar(null);

$objeto = new control_upload();

$objListadoCarpetas = new control_listados();

$url = $objeto->devolverDato($datos);
$nameFile = $objeto->nameFile($datos);

$accion = $objeto->action($datos);

if ($accion == 'modificar') {
    $objArchivo = new AbmArchivoCargado();
    $archivoSeleccionado = $objArchivo->buscar($datos);
}

?>
<div class="wrapper">
    <?php include('estructura/up_menu.php') ?>
    <?php include('estructura/left_menu.php') ?>
    <div class="content-wrapper">
        <section class="content d-flex justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card card-info">
                    <div class="card-header d-flex justify-content-center">
                        <h3 class="card-title">Formulario de Carga de Archivo</h3>
                    </div>
                    <form role="form" id="form-carga" enctype="multipart/form-data" action="abmArchivo.php"
                        method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="exampleInputEmail1">Nombre del archivo</label>
                                    <?php if ($accion == 'modificar') { ?>
                                    <input type="text" class="form-control" name="acnombre"
                                        value="<?php echo $archivoSeleccionado[0]->getAcnombre() ?>">
                                    <?php } else { ?>
                                    <input type="text" class="form-control" name="acnombre">
                                    <?php } ?>
                                    <input type="hidden" value="<?php echo $url ?>" name="aclinkacceso">
                                    <input type="hidden" value="<?php echo $accion ?>" name="accion">
                                    <?php if ($accion == 'modificar') { ?>
                                    <input type="hidden"
                                        value="<?php echo $archivoSeleccionado[0]->getIdarchivocargado() ?>"
                                        name="idarchivocargado">
                                    <input type="hidden"
                                        value="<?php echo $archivoSeleccionado[0]->getAccantidaddescarga() ?>"
                                        name="accantidaddescarga">
                                    <input type="hidden"
                                        value="<?php echo $archivoSeleccionado[0]->getAccantidadusada() ?>"
                                        name="accantidadusada">
                                    <input type="hidden"
                                        value="<?php echo $archivoSeleccionado[0]->getAcfechainiciocompartir() ?>"
                                        name="acfechainiciocompartir">
                                    <input type="hidden"
                                        value="<?php echo $archivoSeleccionado[0]->getAcefechafincompartir() ?>"
                                        name="acefechafincompartir">
                                    <input type="hidden" value="<?php echo $archivoSeleccionado[0]->getAcicono() ?>"
                                        name="acicono">
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Seleccione usuario que lo carga</label>
                                    <select class="form-control" name="idusuario">
                                        <option value="<?php echo $userLoggueado->getIdusuario() ?>" selected>
                                            <?php echo $userLoggueado->getUsnombre() ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Descripcion del archivo</label>
                                <?php if ($accion == 'modificar') { ?>
                                <textarea class="form-control" id="text-descripcion" cols="10" rows="4"
                                    name="acdescripcion"><?php echo $archivoSeleccionado[0]->getAcdescripcion() ?></textarea>
                                <?php } else { ?>
                                <textarea class="form-control" id="text-descripcion" cols="10" rows="4"
                                    name="acdescripcion">Descripcion por defecto</textarea>
                                <?php } ?>

                                <script>
                                CKEDITOR.replace('text-descripcion');
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Archivo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile"
                                            name="archivo">
                                        <label class="custom-file-label" for="exampleInputFile"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Seleccion icono que se va a utilizar</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="acicono" id="imagen" value="jpg">
                                    <label class="form-check-label">Imagen</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="acicono" id="zip" value="zip">
                                    <label class="form-check-label">ZIP</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="acicono" id="doc" value="docx">
                                    <label class="form-check-label">DOC</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="acicono" id="pdf" value="pdf">
                                    <label class="form-check-label">PDF</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="acicono" id="xls" value="xls">
                                    <label class="form-check-label">XLS</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Clave del archivo</label>
                                <?php if ($accion == 'modificar') { ?>
                                <input type="password" class="form-control" id="input_password" name="acprotegidoclave"
                                    value="<?php echo $archivoSeleccionado[0]->getAcprotegidoclave() ?>">
                                <?php } else { ?>
                                <input type="password" class="form-control" id="input_password" name="acprotegidoclave">
                                <?php } ?>

                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="hidden" name="clave" id="clave">
                                <small id="fortaleza_clave"></small>
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