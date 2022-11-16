<?php

include "../include/head.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistemas de Reportes | Reportes</title>
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
          <a href="home" class="nav-link">Inicio</a>
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
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
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
                  <a href="reporteRecargo" class="nav-link active">
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
              <h1>
                <?php if ($my_user_type == "user") { ?>
                  Mis reportes
                <?php
                } elseif ($my_user_type == "admin") { ?>
                  Reporte de empleados
                <?php
                }
                ?>
              </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Recargo</li>
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
            <h3 class="card-title">Reporte de Recargos</h3>
          </div>
          <div class="card-body">
            <div class="card card-body">
              <div class="form-group">
                <h5>Agrupar recargos extras por:</h5>
                <input type="radio" value="dia" name="grupoRecargos" onchange="mostrar(this.value)">
                <label>Día</label><br>
                <input type="radio" value="rango" name="grupoRecargos" onchange="mostrar(this.value)">
                <label>Rango de fecha</label><br>
                <input type="text" name="rangoFecha" id="rangoFecha" value="" style="display: none">
              </div>
            </div>
            <div class="table-responsive" id="tablaRecargosDia" style="display: none">
              <h4>Recargos por día</h4>
              <table class="table table-bordered" id="tabla">
                <thead class="bg-primary" align="center">
                  <tr class="sidebar-dark-primary">
                    <?php if ($my_user_type == "admin") { ?>
                      <th scope="col">Realizado por</th>
                    <?php
                    }
                    ?>
                    <th scope="col">Tipo recargo</th>
                    <th scope="col">Jornada</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora inicio</th>
                    <th scope="col">Hora fin</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col">Horas</th>
                    <!-- <th scope="col">Acciones</th> -->
                  </tr>
                </thead>
                <tbody align="center">
                  <?php
                  if ($my_user_type == "admin") {
                    foreach ($conn->query("SELECT r.idRecargo, r.tipoRecargo, r.jornada, DATE_FORMAT(r.fecha, '%e %M %Y') as fecha, 
                                TIME_FORMAT(r.inicio, '%r') as inicio, TIME_FORMAT(r.fin, '%r') as fin, 
                                TRUNCATE(TIME_TO_SEC(r.fin-r.inicio) DIV 60/60,1) as horasRecargo, r.observaciones, u.nombres, u.apellidos
                                FROM recargo r
                                INNER JOIN usuario u ON u.idUsuario = r.idUsuario") as $row) {
                  ?>
                      <tr>
                        <td><?php echo $row['tipoRecargo'] ?></td>
                        <td><?php echo $row['jornada'] ?></td>
                        <td><?php echo $row['fecha'] ?></td>
                        <td><?php echo $row['inicio'] ?></td>
                        <td><?php echo $row['fin'] ?></td>
                        <td><?php echo $row['observaciones'] ?></td>
                        <td><?php echo $row['horasRecargo'] ?></td>
                        <!-- <td>
                          <a href="editarHoraExtra.php?idHoraExtra=<?php echo $row['idHoraExtra'] ?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                          <a href="eliminarHoraExtra.php?idHoraExtra=<?php echo $row['idHoraExtra'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td> -->
                      </tr>
                    <?php
                    }
                  } elseif ($my_user_type == "user") {
                    foreach ($conn->query("SELECT idRecargo, tipoRecargo, jornada, DATE_FORMAT(fecha, '%e %M %Y') as fecha, 
                                TIME_FORMAT(inicio, '%r') as inicio, TIME_FORMAT(fin, '%r') as fin, 
                                TRUNCATE(TIME_TO_SEC(fin-inicio) DIV 60/60,1) as horasRecargo, observaciones
                                FROM recargo
                                WHERE idUsuario = '$my_user_id'") as $row) {
                    ?>
                      <tr>
                        <td><?php echo $row['tipoRecargo'] ?></td>
                        <td><?php echo $row['jornada'] ?></td>
                        <td><?php echo $row['fecha'] ?></td>
                        <td><?php echo $row['inicio'] ?></td>
                        <td><?php echo $row['fin'] ?></td>
                        <td><?php echo $row['observaciones'] ?></td>
                        <td><?php echo $row['horasRecargo'] ?></td>
                        <!-- <td>
                          <a href="editarHoraExtra.php?idHoraExtra=<?php echo $row['idHoraExtra'] ?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                          <a href="eliminarHoraExtra.php?idHoraExtra=<?php echo $row['idHoraExtra'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td> -->
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="table-responsive" id="tablaRecargosRango" style="display: none">
              <h4 class="tituloRango">Recargos por rango <span style="font-weight: bold"></span><strong class="rangoTitulo"></strong></h4>
              <div id="recargosRango"></div>
            </div>
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
    function mostrar(dato) {
      if (dato == "dia") {
        document.getElementById("tablaRecargosDia").style.display = "block";
        document.getElementById("tablaRecargosRango").style.display = "none";
        document.getElementById("rangoFecha").style.display = "none";
      }
      if (dato == "rango") {
        document.getElementById("tablaRecargosRango").style.display = "block";
        document.getElementById("rangoFecha").style.display = "block";
        document.getElementById("tablaRecargosDia").style.display = "none";
      }
    };

    $(function() {
      $('input[name="rangoFecha"]').daterangepicker({
        opens: 'left'
      }, function(start, end, label) {
        $(".tituloRango > span").text(' desde ' + start.format('D MMMM YYYY') + ' hasta ' + end.format('D MMMM YYYY'));
        var fechaInicio = start.format('YYYY-MM-DD');
        var fechaFin = end.format('YYYY-MM-DD');

        $.ajax({
          url: 'tablaRangoR.php?inicio=' + fechaInicio + '&fin=' + fechaFin,
          success: function(datos) {
            $("#recargosRango").html(datos);
          }
        });
      });
    });

    $(document).ready(function() {
      $('#tabla').DataTable();
    });
  </script>
</body>

</html>