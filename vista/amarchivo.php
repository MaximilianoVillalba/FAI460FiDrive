<?php
include('estructura/head.php');
include_once('../control/control_upload.php');

$objeto = new control_upload();

$url = $objeto->devolverDato($_GET);
$nameFile = $objeto->nameFile($_GET);
$accion = $objeto->action($nameFile);

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
                    <form role="form" id="form-carga" enctype="multipart/form-data" action="accion_upload.php?accion=<?php echo $accion ?>" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="exampleInputEmail1">Nombre del archivo</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $nameFile ?>">
                                    <input type="hidden" value="<?php echo $url ?>" name="ubicacion">
                                </div>
                                <div class="form-group col-6">
                                    <label>Seleccione usuario que lo carga</label>
                                    <select class="form-control" name="usuario_seleccionado">
                                        <option value="" selected>Seleccione usuario</option>
                                        <option value="administrador">Administrador</option>
                                        <option value="visitante">Visitante</option>
                                        <option value="yo">Yo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Descripcion del archivo</label>
                                <textarea class="form-control" id="text-descripcion" cols="10" rows="4" name="observaciones">Esta es una descripción genérica, si lo necesita la puede cambiar</textarea>
                                <script>
                                    CKEDITOR.replace('text-descripcion');
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Archivo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="archivo">
                                        <label class="custom-file-label" for="exampleInputFile"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Seleccion icono que se va a utilizar</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1" id="imagen">
                                    <label class="form-check-label">Imagen</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1" id="zip">
                                    <label class="form-check-label">ZIP</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1" id="doc">
                                    <label class="form-check-label">DOC</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1" id="pdf">
                                    <label class="form-check-label">PDF</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1" id="xls">
                                    <label class="form-check-label">XLS</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Clave del archivo</label>
                                <input type="password" class="form-control" id="input_password">
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