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
  <title>Sistemas de Reportes | Perfil</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
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
          <a href="home.php" class="nav-link">Inicio</a>
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
      <a href="home.php" class="brand-link">
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
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fa fa-user"></i>
                <p>
                  Mi cuenta
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="perfil.php" class="nav-link active">
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
            <?php if ($my_user_type == "user") { ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Reportar
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="incapacidad.php" class="nav-link">
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
            <?php
            }
            ?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  <?php
                  if ($my_user_type == "user") { ?>
                    Mis reportes
                  <?php
                  } elseif ($my_user_type == "admin") { ?>
                    Reportes
                  <?php
                  }
                  ?>
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <!-- <li class="nav-item">
                <a href="reporteIncapacidad.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Incapacidad</p>
                </a>
              </li> -->
                <li class="nav-item">
                  <a href="reporteHorasExtras.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Horas extras</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="reporteRecargo.php" class="nav-link">
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
                    <a href="crearEmpleado.php" class="nav-link">
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
              <h1>Perfil</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Perfil</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
              <div class="card card-primary card--outline">
                <div class="card-header">
                  <h3 class="card-title">Mi perfil</h3>
                </div>
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="../dist/img/perfiles/<?php echo $foto ?>" class="img-circle elevation-2" alt="User profile picture">
                  </div>
                  <h3 class="profile-username text-center"><?php echo $nombres . ' ' . $apellidos ?></h3>
                  <?php
                  if ($my_user_type == "user") { ?>
                    <p class="text-muted text-center"><?php echo $cargo . ' <br> ' . $nombreRestaurante ?> sede <?php echo $nombreSede ?></p>
                  <?php
                  } elseif ($my_user_type == "admin") { ?>
                    <p class="text-muted text-center"><?php echo $cargo . ' <br> ' . $nombreRestaurante ?></p>
                  <?php
                  }
                  ?>
                  <!-- <div class="card-body">
                      <form method="POST" id="formFoto" enctype="multipart/form-data"> 
                        <div>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto">
                            <label class="custom-file-label">Nueva foto de perfil</label>
                          </div>
                        </div>
                        <br>
                        <div class="input-group mb-6">
                          <button type="submit" id="cambiarFoto" class="btn btn-primary ml-auto">Cambiar</button>
                        </div>
                      </form>
                      <div id="resultFoto"></div>
                    </div> -->
                </div><!-- /.card-body -->
              </div><!-- /.card -->

              <!-- Cambiar foto de perfil -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Cambiar foto de perfil</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form method="POST" id="formFoto" enctype="multipart/form-data">
                    <div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto">
                        <label class="custom-file-label">Nueva foto de perfil</label>
                      </div>
                    </div>
                    <br>
                    <div class="input-group mb-6">
                      <button type="submit" id="cambiarFoto" class="btn btn-primary ml-auto">Cambiar</button>
                    </div>
                  </form>
                  <div id="resultFoto"></div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <!-- <h3 class="card-title">Datos personales</h3> -->
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#datosPersonales" data-toggle="tab">Datos Personales</a></li>
                    <li class="nav-item"><a class="nav-link" href="#datosLaborales" data-toggle="tab">Datos Laborales</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="datosPersonales">
                      <div class="card-body">
                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">Nombres:</label>
                          <input type="text" class="form-control" value="<?php echo $nombres ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">Apellidos:</label>
                          <input type="text" class="form-control" value="<?php echo $apellidos ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">Correo:</label>
                          <input type="email" class="form-control" value="<?php echo $email ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">Password:</label>
                          <input type="password" id="password" class="form-control" value="<?php echo $password ?>">
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span></button>
                          </div>
                        </div>
                        <br>
                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">Username:</label>
                          <input type="text" id="" class="form-control" value="<?php echo $username ?>">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                          </div>
                        </div>
                        <!-- <div class="input-group mb-3">
                          <input type="password" id="password2" class="form-control" value="<?php echo $password ?>">
                          <div class="input-group-append">
                            <button id="show_password2" class="btn btn-primary" type="button" onclick="mostrarPassword2()"> <span class="fa fa-eye-slash icon"></span></button>
                          </div>
                        </div> -->
                        <!-- <div class="input-group mb-3">
                          <button type="submit" class="btn btn-primary ml-auto">Actualizar datos</button>
                        </div> -->

                      </div><!-- /.card -->
                    </div><!-- datos personales -->

                    <div class="tab-pane" id="datosLaborales">
                      <div class="card-body">
                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">Cargo:</label>
                          <input type="text" class="form-control" value="<?php echo $cargo ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">I.Contrato:</label>
                          <input type="text" class="form-control" value="<?php if ($my_user_type == "user") {
                                                                            echo $inicioContrato ?> <?php } elseif ($my_user_type == "admin") {
                                                                                                  } ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">T.Contrato:</label>
                          <input type="text" class="form-control" value="<?php if ($my_user_type == "user") {
                                                                            echo $tipoContrato ?> <?php } elseif ($my_user_type == "admin") {
                                                                                                } ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">Sueldo:</label>
                          <input type="text" class="form-control" value="<?php if ($my_user_type == "user") {
                                                                            echo $sueldo ?> <?php } elseif ($my_user_type == "admin") {
                                                                                          } ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">Pensión:</label>
                          <input type="text" class="form-control" value="<?php if ($my_user_type == "user") {
                                                                            echo $pension ?> <?php } elseif ($my_user_type == "admin") {
                                                                                            } ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">Salud:</label>
                          <input type="text" class="form-control" value="<?php if ($my_user_type == "user") {
                                                                            echo $salud ?> <?php } elseif ($my_user_type == "admin") {
                                                                                          } ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">ARL:</label>
                          <input type="text" class="form-control" value="<?php if ($my_user_type == "user") {
                                                                            echo $arl ?> <?php } elseif ($my_user_type == "admin") {
                                                                                        } ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.card -->
                    </div> <!-- datos laborales -->
                  </div><!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div><!-- /.card primary-->

              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Hoja de vida</h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="card-body">
                      <form method="POST" id="formHojaDeVida" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="hojaDeVida" required>
                            <label class="custom-file-label">Actualizar hoja de vida</label>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <button type="submit" class="btn btn-primary ml-auto" id="enviarHojaDeVida">Guardar cambios</button>
                        </div>
                      </form>
                      <div class="input-group mt-3">
                        <button type="submit" id="" class="btn btn-success ml-auto">
                          <span>Descargar hoja de vida</span>
                        </button>
                      </div>
                      <div class="mt-3 col-5 ml-auto" id="resultHojaDeVida"></div>
                    </div><!-- /.card -->
                  </div><!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div><!-- /.card primary secundary-->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
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
  <!-- date-range-picker -->
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="../../dist/js/demo.js"></script> -->
  <script>
    $(function() {
      //Input file
      bsCustomFileInput.init()

      //Date picker
      // $('#reservationdate').datetimepicker({
      //   format: 'L'
      // })

      // //Timepicker
      // $('#timepicker').datetimepicker({
      //   format: 'LT'
      // })
    })
  </script>
  <script type="text/javascript">
    function mostrarPassword() {
      var cambio1 = document.getElementById("password");
      if (cambio1.type == "password") {
        cambio1.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
      } else {
        cambio1.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
      }
    }

    function mostrarPassword2() {
      var cambio2 = document.getElementById("password2");
      if (cambio2.type == "password") {
        cambio2.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
      } else {
        cambio2.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
      }
    };

    // $(function(){
    // $("input[name='file']").on("change", function(){
    //   var formData = new FormData($("#formulario")[0]);
    //   var ruta = "../action/actualizarFoto.php";
    //   $.ajax({
    //       url: ruta,
    //       type: "POST",
    //       data: formData,
    //       contentType: false,
    //       processData: false,
    //       success: function(datos)
    //       {
    //           $("#resultFoto").html(datos);
    //       }
    //   });
    // });
    // });

    $("#formFoto").submit(function(event) {
      $('#cambiarFoto').attr("disabled", true);
      var archivo = $("#foto").prop('files')[0];
      var formData = new FormData();
      formData.append("foto", archivo);
      var ruta = "../action/actualizarFoto.php";

      $.ajax({
        type: "POST",
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        url: ruta,
        beforeSend: function(objeto) {
          document.getElementById('formFoto').reset();
          $("#resultFoto").html("Mensaje: Cargando...");
        },
        success: function(datos) {
          $("#resultFoto").html(datos);
          $('#cambiarFoto').attr("disabled", false);
        }
      });
      event.preventDefault();
    });

    $("#formHojaDeVida").submit(function(event) {
      $('#enviarHojaDeVida').attr("disabled", true);
      var archivo = $("#hojaDeVida").prop('files')[0];
      var formData = new FormData();
      formData.append("hojaDeVida", archivo);
      var ruta = "../action/guardarHojaDeVida.php";

      $.ajax({
        type: "POST",
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        url: ruta,
        beforeSend: function(objeto) {
          document.getElementById('formHojaDeVida').reset();
          $("#resultHojaDeVida").html("Mensaje: Cargando...");
        },
        success: function(datos) {
          $("#resultHojaDeVida").html(datos);
          $('#enviarHojaDeVida').attr("disabled", false);
        }
      });
      event.preventDefault();
    });
  </script>
</body>

</html>