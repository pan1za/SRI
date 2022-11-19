<?php
include "config/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SRI | Login</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="dist/img/favicon.ico">
</head>

<body class="hold-transition login-page">

  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="index" class="h1"><b>SRI</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Inicia sesión para iniciar tu sesión</p>

        <form action="action/login.php" method="POST">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Correo">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Recuérdame
                </label>
              </div>
            </div>
            <div class="col-12 text-center mt-2 mb-3">
              <button type="submit" name="login" value="login" class="btn btn-primary btn-block">Iniciar sesión</button>
            </div>
          </div>
        </form>

        <p class="mb-1">
          <a href="forgot-password.html">Olvidé mi contraseña</a>
        </p>
      </div>
    </div>
  </div>

  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>