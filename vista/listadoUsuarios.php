<?php
include('estructura/head.php');

$objSession->paginaAsegurada();

$objeto = new control_listados();

//$listado = $objeto->listUsers();

$objetoUsuarios = new AbmUsuario();
$listUsers = $objetoUsuarios->buscar(null);

?>
<div class="wrapper">
    <?php include('estructura/up_menu.php') ?>
    <?php include('estructura/left_menu.php') ?>
    <div class="content-wrapper">
        <section class="content d-flex justify-content-center">
            <div class="col-md-8 mt-5">
                <!-- <?php echo $listado ?> -->
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <h3><strong>Listado de Archivos Compartidos</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nombre Archivo</th>
                                    <th colspan="2" style="text-align: center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($listUsers as $user) { ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $user->getUsnombre() ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a class="ml-2"
                                                href="./asignarRol.php?idusuario=<?php echo $user->getIdusuario() ?>">
                                                <span title="Dejar de compartir"><button
                                                        class="btn btn-primary">Actualizar Rol</button></span>
                                            </a>
                                            <a class="ml-2" href="#">
                                                <span title="Dejar de compartir"><button
                                                        class="btn btn-danger">Eliminar</button></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                    $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
include('estructura/footer.php')
?>