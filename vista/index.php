<?php
include('./estructura/head_login.php');
?>
<div class="container-fluid d-flex justify-content-center align-items-center"
    style="width: 100% !important; height: 100vh !important;">
    <div class="login-box d-flex justify-content-center flex-column">
        <div class="card">
            <div class="card-body login-card-body shadow"
                style="border-radius: 15px !important;background: transparent !important;">
                <div class="row" style="font-family: roboto;">
                    <div class="form-group col-12 d-flex justify-content-center">
                        <h1>FiDrive</h1>
                    </div>
                    <div class="form-group col-12 d-flex justify-content-center">
                        <img src="../archivos/nube.png" alt="" height="150px" width="270px">
                    </div>
                </div>
                <p class="login-box-msg">Iniciar Sesión</p>
                <?php if (isset($_GET['message']) && $_GET['message'] == 0) { ?>
                <div class="alert alert-danger" role="alert">
                    Datos incorrectos. Por favor verifiquelos.
                </div>
                <?php } ?>
                <form class="form text-center" method="POST" action="verificarLogin.php">
                    <div class="form-group mx-sm-3">
                        <label for="inputPass" class="sr-only">Email</label>
                        <input type="text" class="form-control" name="uslogin" placeholder="Username">
                    </div>
                    <div class="form-group mx-sm-3">
                        <label for="inputUser" class="sr-only">Contraseña</label>
                        <input type="password" class="form-control" name="usclave" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-outline-primary rounded-pill">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</div>