<?php
include('estructura/head.php');
include_once('../control/control_delete_shared.php');

$objeto = new control_delete_shared();

$nameFile = $objeto->devolverDato($_GET);

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
                    <form id="form-carga" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="exampleInputEmail1">Nombre del archivo</label>
                                    <input type="text" class="form-control" value="<?php echo $nameFile ?>" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label>Seleccione usuario que lo carga</label>
                                    <select class="form-control">
                                        <option value="" selected>Seleccione usuario</option>
                                        <option value="administrador">Administrador</option>
                                        <option value="visitante">Visitante</option>
                                        <option value="yo">Yo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Motivo por el cual deja de compartir</label>
                                <textarea class="form-control" cols="10" rows="4"></textarea>
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