<?php

include "../include/head.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistemas de Reportes | Perfil</title>

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
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="home" class="brand-link">
        <img src="../dist/img/logo.png" alt="SRI Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistema de Reportes</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
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
            <li class="nav-item menu-open">
              <a href="#" class="nav-link <?php
                                          if (isset($_GET['idUsuario'])) {
                                          } else { ?>
                                              active
                                            <?php
                                          }
                                            ?>">
                <i class="nav-icon fa fa-user"></i>
                <p>
                  Mi cuenta
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="perfil" class="nav-link <?php
                                                    if (isset($_GET['idUsuario'])) {
                                                    } else { ?>
                                                      active
                                                    <?php
                                                    }
                                                    ?>">
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
                    <a href="incapacidad" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Incapacidad</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="horasExtras" class="nav-link">
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
                <li class="nav-item">
                  <a href="reporteIncapacidad" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Incapacidad</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php if ($my_user_type == "admin") { ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>
                    Listar
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="reporteEmpleados" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Empleados</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php
            }
            ?>
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

      <?php
      if (isset($_GET['idUsuario'])) {
        $idUser = $_GET['idUsuario'];
        $query = mysqli_query($conn, "SELECT u.idUsuario, u.foto, u.nombres, u.apellidos, u.email, u.password, u.username, u.usertype, r.idRestaurante, 
                                    r.nombre as nombreRestaurante, u.idSede, s.nombre as nombreSede, 
                                    iu.cargo, iu.inicioContrato, iu.tipoContrato, iu.sueldo,  iu.pension, iu.salud, iu.arl
                                    from usuario u 
                                    INNER JOIN sede s ON s.idSede = u.idSede
                                    INNER JOIN restaurante r ON r.idRestaurante = s.idRestaurante
                                    INNER JOIN info_usuario iu ON iu.idUsuario = $idUser
                                    where u.idUsuario = $idUser");
        while ($row = mysqli_fetch_array($query)) {
          $idUser = $row["idUsuario"];
          $foto = $row['foto'];
          $nombres = $row['nombres'];
          $apellidos = $row['apellidos'];
          $email = $row['email'];
          $password = $row['password'];
          $username = $row['username'];
          $usertype = $row['usertype'];
          $idRestaurante = $row['idRestaurante'];
          $nombreRestaurante = $row['nombreRestaurante'];
          $idSede = $row['idSede'];
          $nombreSede = $row['nombreSede'];
          $cargo = $row['cargo'];
          $inicioContrato = $row['inicioContrato'];
          $tipoContrato = $row['tipoContrato'];
          $sueldo = $row['sueldo'];
          $pension = $row['pension'];
          $salud = $row['salud'];
          $arl = $row['arl'];
        }
      }
      ?>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
              <div class="card card-primary card--outline">
                <div class="card-header">
                  <h3 class="card-title">
                    <?php
                    if (isset($_GET['idUsuario'])) {
                      $idUser = $_GET['idUsuario'];
                      if ($my_user_id != "$idUser") { ?>
                        Perfil de <?php echo $nombres . ' ' . $apellidos ?>
                      <?php
                      }
                    } else { ?>
                      Mi perfil
                    <?php
                    }
                    ?>
                  </h3>
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
                        <?php
                        if (isset($_GET['idUsuario'])) {
                          $idUser = $_GET['idUsuario'];
                          if ($my_user_id != "$idUser") { ?>
                            <input type="file" class="custom-file-input" id="foto" name="foto" disabled>
                            <label class="custom-file-label">Nueva foto de perfil</label>
                          <?php
                          }
                        } else { ?>
                          <input type="file" class="custom-file-input" id="foto" name="foto">
                          <label class="custom-file-label">Nueva foto de perfil</label>
                        <?php
                        }
                        ?>
                      </div>
                    </div>
                    <br>
                    <div class="input-group mb-6">
                      <?php
                      if (isset($_GET['idUsuario'])) {
                        $idUser = $_GET['idUsuario'];
                        if ($my_user_id != "$idUser") { ?>
                          <button type="submit" id="cambiarFoto" class="btn btn-primary ml-auto" disabled>Cambiar</button>
                        <?php
                        }
                      } else { ?>
                        <button type="submit" id="cambiarFoto" class="btn btn-primary ml-auto">Cambiar</button>
                      <?php
                      }
                      ?>
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
                          <?php
                          if (isset($_GET['idUsuario'])) {
                            $idUser = $_GET['idUsuario'];
                            if ($my_user_id != "$idUser") { ?>
                              <input type="password" id="password" class="form-control" value="<?php echo $password ?>" disabled>
                              <div class="input-group-append">
                                <button class="btn btn-primary" type="button"> <span class="fa fa-eye-slash icon"></span></button>
                              </div>
                            <?php
                            }
                          } else { ?>
                            <input type="password" id="password" class="form-control" value="<?php echo $password ?>">
                            <div class="input-group-append">
                              <button class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span></button>
                            </div>
                          <?php
                          }
                          ?>
                        </div>
                        <br>
                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">Username:</label>
                          <?php
                          if (isset($_GET['idUsuario'])) {
                            $idUser = $_GET['idUsuario'];
                            if ($my_user_id != "$idUser") { ?>
                              <input type="text" id="" class="form-control" value="<?php echo $username ?>" disabled>
                              <div class="input-group-append">
                                <div class="input-group-text">
                                  <span class="fas fa-user"></span>
                                </div>
                              </div>
                            <?php
                            }
                          } else { ?>
                            <input type="text" id="" class="form-control" value="<?php echo $username ?>">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          <?php
                          }
                          ?>
                        </div>
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
                          <input type="text" class="form-control" value="<?php
                                                                          if (isset($_GET['idUsuario'])) {
                                                                            echo $inicioContrato;
                                                                          } else {
                                                                            if ($my_user_type == "user") {
                                                                              echo $inicioContrato;
                                                                            } elseif ($my_user_type == "admin") {
                                                                              echo '';
                                                                            }
                                                                          }
                                                                          ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">T.Contrato:</label>
                          <input type="text" class="form-control" value="<?php
                                                                          if (isset($_GET['idUsuario'])) {
                                                                            echo $tipoContrato;
                                                                          } else {
                                                                            if ($my_user_type == "user") {
                                                                              echo $tipoContrato;
                                                                            } elseif ($my_user_type == "admin") {
                                                                              echo '';
                                                                            }
                                                                          }
                                                                          ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">Sueldo:</label>
                          <input type="text" class="form-control" value="<?php
                                                                          if (isset($_GET['idUsuario'])) {
                                                                            echo $sueldo;
                                                                          } else {
                                                                            if ($my_user_type == "user") {
                                                                              echo $sueldo;
                                                                            } elseif ($my_user_type == "admin") {
                                                                              echo '';
                                                                            }
                                                                          }
                                                                          ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">Pensión:</label>
                          <input type="text" class="form-control" value="<?php
                                                                          if (isset($_GET['idUsuario'])) {
                                                                            echo $pension;
                                                                          } else {
                                                                            if ($my_user_type == "user") {
                                                                              echo $pension;
                                                                            } elseif ($my_user_type == "admin") {
                                                                              echo '';
                                                                            }
                                                                          }
                                                                          ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">Salud:</label>
                          <input type="text" class="form-control" value="<?php
                                                                          if (isset($_GET['idUsuario'])) {
                                                                            echo $salud;
                                                                          } else {
                                                                            if ($my_user_type == "user") {
                                                                              echo $salud;
                                                                            } elseif ($my_user_type == "admin") {
                                                                              echo '';
                                                                            }
                                                                          }
                                                                          ?>" disabled>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <label class="col-sm-1 col-form-label">ARL:</label>
                          <input type="text" class="form-control" value="<?php
                                                                          if (isset($_GET['idUsuario'])) {
                                                                            echo $arl;
                                                                          } else {
                                                                            if ($my_user_type == "user") {
                                                                              echo $arl;
                                                                            } elseif ($my_user_type == "admin") {
                                                                              echo '';
                                                                            }
                                                                          }
                                                                          ?>" disabled>
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
                            <?php
                            if (isset($_GET['idUsuario'])) {
                              $idUser = $_GET['idUsuario'];
                              if ($my_user_id != "$idUser") { ?>
                                <input type="file" class="custom-file-input" id="hojaDeVida" disabled>
                                <label class="custom-file-label">Actualizar hoja de vida</label>
                              <?php
                              }
                            } else { ?>
                              <input type="file" class="custom-file-input" id="hojaDeVida" required>
                              <label class="custom-file-label">Actualizar hoja de vida</label>
                            <?php
                            }
                            ?>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <?php
                          if (isset($_GET['idUsuario'])) {
                            $idUser = $_GET['idUsuario'];
                            if ($my_user_id != "$idUser") { ?>
                              <button type="submit" class="btn btn-primary ml-auto" id="enviarHojaDeVida" disabled>Guardar cambios</button>
                            <?php
                            }
                          } else { ?>
                            <button type="submit" class="btn btn-primary ml-auto" id="enviarHojaDeVida">Guardar cambios</button>
                          <?php
                          }
                          ?>
                        </div>
                      </form>
                      <div class="input-group mt-3">
                        <a href="../action/descargarHV?idUsuario=<?php echo $idUsuario ?>" class="btn btn-success ml-auto">Descargar hoja de vida</a>
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