<?php
$userLoggueado = $objSession->getUsuario();
$esAdmin = $objSession->validarPermisos();
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Fi Drive - <?php echo $userLoggueado->getUsnombre() ?></span>
    </a>
    <div class="sidebar">
        <nav class="mt-1">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="far fa-hand-point-up"></i>
                        <p>
                            Menu desplegable
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-2">
                        <li class="nav-item">
                            <a href="../vista/amarchivo.php" class="nav-link">
                                <i class="far fa-arrow-alt-circle-right"></i>
                                <p>Cargar archivo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../vista/contenido.php" class="nav-link">
                                <i class="far fa-arrow-alt-circle-right"></i>
                                <p>Lista archivos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../vista/compartidos.php" class="nav-link">
                                <i class="far fa-arrow-alt-circle-right"></i>
                                <p>Lista archivos compartidos</p>
                            </a>
                        </li>
                        <?php if ($esAdmin) { ?>
                        <li class="nav-item">
                            <a href="../vista/listadoUsuarios.php" class="nav-link">
                                <i class="far fa-arrow-alt-circle-right"></i>
                                <p>Listado usuarios</p>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if ($esAdmin) { ?>
                        <li class="nav-item">
                            <a href="../vista/usuario.php" class="nav-link">
                                <i class="far fa-arrow-alt-circle-right"></i>
                                <p>Cargar usuario</p>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if ($esAdmin) { ?>
                        <li class="nav-item">
                            <a href="../vista/cargarRol.php" class="nav-link">
                                <i class="far fa-arrow-alt-circle-right"></i>
                                <p>Cargar rol</p>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if ($esAdmin) { ?>
                        <li class="nav-item">
                            <a href="../vista/asignarRol.php" class="nav-link">
                                <i class="far fa-arrow-alt-circle-right"></i>
                                <p>Asignar rol</p>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>