<?php
//include "config/conexion.php";
include "../include/head.php";

// if($usertype != "user"){
//     header("location: homeadmin.php");
// }

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistemas de Reportes | Incapacidad</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

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

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- Notifications Dropdown Menu -->
        <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../index.php" class="brand-link">
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
            <a href="../pages/perfil.php" class="d-block"><?php echo $nombres . ' ' . $apellidos ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
                  <a href="perfil.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Perfil</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../action/cerrarSesion.php" class="nav-link">
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
                  <a href="incapacidad.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Incapacidad</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="horasExtras.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Horas extras</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="recargo.php" class="nav-link">
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
                  <a href="../pages/forms/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Incapacidad</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../pages/forms/advanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Horas extras</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/forms/editors.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recargo</p>
                  </a>
                </li>
              </ul>
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
              <h1>Incapacidad</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Incapacidad</li>
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
            <h3 class="card-title">Reportar Incapacidad</h3>
          </div>
          <div class="card-body">
            <form id="formIncapacidad" method="POST" enctype="multipart/form-data">
              <div class="card card-body w-50 offset-3">
                    <div class="form-group">
                      <label>Tipo de incapacidad <b>*</b></label>
                      <select class="form-control" name="tipoIncapacidad" id="tipoIncapacidad" required>
                        <option value="" selected disabled autofocus>Seleccione una opción</option>
                        <option value='Incapacidad por enfermedad laboral'>Incapacidad por enfermedad laboral</option>
                        <option value='Incapacidad por enfermedad general'>Incapacidad por enfermedad general</option>
                        <option value='Incapacidad por maternidad'>Incapacidad por maternidad</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Día inicio incapacidad <b>*</b></label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" name="diaInicio" id="diaInicio" class="form-control datetimepicker-input" data-target="#reservationdate" required/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <!-- <div class="input-group-text"><i class="f fa-calendarr"></i></div> -->
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Día final incapacidad <b>*</b></label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" name="diaFinal" id="diaFinal" class="form-control datetimepicker-input" data-target="#reservationdate" required/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <!-- <div class="input-group-text"><i class="f fa-calendarr"></i></div> -->
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Evidencia <b>*</b></label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="fileEvidencia" required>
                          <label class="custom-file-label">Seleccionar archivo</label>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Historia clínica</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="fileHistClinica" disabled required>
                          <label class="custom-file-label" for="evidencia">Seleccionar archivo</label>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Cédula</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="fileCedula">
                          <label class="custom-file-label" for="evidencia">Seleccionar archivo</label>
                        </div>
                      </div>
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
                      <button type="submit" id="enviarIncapacidad" class="btn btn-primary">Enviar</button>
                      <button type="submit" id="btn" class="btn btn-danger">Cancelar</button>
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

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Versión</b> 1.0.0
      </div>
      <strong>Sistema de Reportes de Innova - <a target="blank" href="http://innovagestion.com.co/">INNOVA Gestión &copy </a></strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="../../dist/js/demo.js"></script> -->
  <script>
    $(function() {
      bsCustomFileInput.init();

      //Date picker
      $('#reservationdate').datetimepicker({
        format: 'L'
      })
    });

    $("#formIncapacidad").submit(function(event) {
        $('#enviarIncapacidad').attr("disabled", true);
        var archivo = $("#fileEvidencia").prop('files')[0];
        var formData = new FormData();
        formData.append("fileEvidencia",archivo);
        formData.append("tipoIncapacidad", $("#tipoIncapacidad").val());
        formData.append("diaInicio", $("#diaInicio").val());
        formData.append("diaFinal", $("#diaFinal").val());
        formData.append("observaciones", $("#observaciones").val());
        var ruta = "../action/guardarIncapacidad.php";

        $.ajax({
          type: "POST",
          cache: false,
          contentType: false,
          processData: false,
          data: formData,
          url: ruta,
            beforeSend: function(objeto) {
                document.getElementById('formIncapacidad').reset();
                $("#result").html("Mensaje: Cargando...");
            },
            success: function(datos) {
                $("#result").html(datos);
                $('#enviarIncapacidad').attr("disabled", false);
            }
        });
        event.preventDefault();
    });

    $("#fileHistClinica").prop('disabled', false);

  </script>
</body>

</html>