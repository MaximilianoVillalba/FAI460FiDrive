<?php
include('estructura/head.php');
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
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre del archivo</label>
                                <input type="text" class="form-control" value="1234.png">
                            </div>
                            <div class="form-group">
                                <label for="">Motivo por el cual deja de compartir</label>
                                <textarea class="form-control" cols="10" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Seleccione usuario que lo carga</label>
                                <select class="form-control">
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