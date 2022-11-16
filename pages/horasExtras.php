<?php

include "../include/head.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistemas de Reportes | Horas extras</title>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../index.html" class="nav-link">Inicio</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../pages/examples/contact-us.html" class="nav-link">Contáctenos</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../index" class="brand-link">
        <img src="../dist/img/logo.png" alt="SRI Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistema de Reportes</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../dist/img/perfiles/<?php echo $foto ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="../pages/perfil" class="d-block"><?php echo $nombres . ' ' . $apellidos ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-user"></i>
                <p>
                  Mi cuenta
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="perfil" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Perfil</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../action/cerrarSesion" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cerrar Sesión</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Reportar
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="incapacidad" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Incapacidad</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="horasExtras" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Horas extras</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="recargo" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recargo</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Mis reportes
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="reporteHorasExtras" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Horas extras</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="reporteRecargo" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recargo</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php if ($my_user_type == "admin") { ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-plus-circle"></i>
                  <p>
                    Crear
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="crearEmpleado" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Empleado</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php
            }
            ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Horas extras</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Horas extras</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Reportar horas extras</h3>
          </div>
          <div class="card-body">
            <form id="formHorasExtras" method="POST">
              <div class="card card-body w-50 offset-3">
                <div class="form-group">
                  <label>Horas extras a reconocer <b>*</b></label>
                  <select name="tipoHoraExtra" id="tipoHoraExtra" class="form-control" required>
                    <option value="" selected disabled autofocus>Seleccione una opción</option>
                    <option value="Hora extra día ordinario">Horas extras días ordinarios</option>
                    <option value="Hora extra día domingo">Horas extras días domingos</option>
                    <option value="Hora extra día festivo">Horas extras días festivos</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="jornada">Jornada <b>*</b></label>
                  <select name="jornada" id="jornada" class="form-control" required>
                    <option value="" selected disabled focus>Seleccione una opción</option>
                    <option value="Diurna">Diurna</option>
                    <option value="Nocturna">Nocturna</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Fecha: <b>*</b></label>
                  <div class="input-group date" data-target-input="nearest">
                    <input type="date" name="fechaHoraExtra" class="form-control datetimepicker-input" required />
                  </div>
                </div>

                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>Desde: <b>*</b></label>
                    <div class="input-group date" data-target-input="nearest">
                      <input type="time" name="inicioHoraExtra" class="form-control datetimepicker-input" required />
                    </div>
                    <!-- /.input group -->
                  </div>

                  <div class="form-group">
                    <label>Hasta: <b>*</b></label>
                    <div class="input-group date" data-target-input="nearest">
                      <input type="time" name="finalHoraExtra" class="form-control datetimepicker-input" required />
                    </div>
                  </div>
                  <!-- /.form group -->
                </div>

                <div class="form-group">
                  <label>Observaciones</label>
                  <div class="">
                    <textarea class="form-control" rows="3" name="observaciones" id="observaciones" placeholder="Escriba algo si es necesario"></textarea>
                  </div>
                </div>
                <div class="ml-auto">
                  <p>Obligatorio (<b>*</b>)</p>
                </div>
                <div class="ml-auto">
                  <button type="submit" id="enviarHoraExtra" class="btn btn-primary">Enviar</button>
                  <button type="submit" class="btn btn-danger">Cancelar</button>
                </div>

                <div class="ml-auto" id="result"></div>

              </div>
            </form>
          </div>
        </div>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    <?php
    include "../include/footer.php";
    ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Scripts -->
  <?php
  include "../include/scripts.php";
  ?>

  <script>
    $(function() {
      //Input file
      bsCustomFileInput.init()
    });

    $("#formHorasExtras").submit(function(event) {
      $('#enviarHoraExtra').attr("disabled", true);

      var parametros = $(this).serialize();
      $.ajax({
        type: "POST",
        url: "../action/guardarHoraExtra.php",
        data: parametros,
        beforeSend: function(objeto) {
          document.getElementById('formHorasExtras').reset();
          $("#result").html("Mensaje: Cargando...");
        },
        success: function(datos) {
          $("#result").html(datos);
          $('#enviarHoraExtra').attr("disabled", false);
        }
      });
      event.preventDefault();
    })
  </script>
</body>

</html>