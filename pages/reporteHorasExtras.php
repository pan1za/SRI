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
  <title>Sistemas de Reportes | Reportes</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- <script type="text/javascript" src="../plugins/jquery/jquery.min.js"></script> -->
  <!-- <script type="text/javascript" src="../plugins/moment/moment.min.js"></script> -->
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />


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
                  <a href="perfil.php" class="nav-link">
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
                <!-- <li class="nav-item">
                <a href="reporteIncapacidad.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Incapacidad</p>
                </a>
              </li> -->
                <li class="nav-item">
                  <a href="reporteHorasExtras.php" class="nav-link active">
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
            <h3 class="card-title">Reporte de Horas Extras</h3>
          </div>
          <div class="card-body">
            <div class="card card-body">
              <div class="form-group">
                <h5>Agrupar horas extras por:</h5>
                <input type="radio" value="dia" name="grupoHorasExtras" onchange="mostrar(this.value)">
                <label>Día</label><br>
                <input type="radio" value="rango" name="grupoHorasExtras" onchange="mostrar(this.value)">
                <label>Rango de fecha</label><br>
                <input type="text" name="rangoFecha" id="rangoFecha" value="" style="display: none">
              </div>
            </div>
            <div class="table-responsive" id="tablaHorasExtrasDia" style="display: none">
              <h4>Horas extras por día</h4>
              <table class="table table-bordered" id="tabla">
                <thead class="bg-primary" align="center">
                  <tr class="sidebar-dark-primary">
                    <?php if ($my_user_type == "admin") { ?>
                      <th scope="col">Realizado por</th>
                    <?php
                    }
                    ?>
                    <th scope="col">Tipo hora extra</th>
                    <th scope="col">Jornada</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora inicio</th>
                    <th scope="col">Hora fin</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col">Horas extras</th>
                    <!-- <th scope="col">Acciones</th> -->
                  </tr>
                </thead>
                <tbody align="center">
                  <?php
                  if ($my_user_type == "admin") {
                    foreach ($conn->query("SELECT he.idHoraExtra, he.tipoHoraExtra, he.jornada, DATE_FORMAT(he.fecha, '%e %M %Y') as fecha, 
                                  TIME_FORMAT(he.inicio, '%r') as inicio, TIME_FORMAT(he.fin, '%r') as fin, 
                                  TRUNCATE(TIME_TO_SEC(he.fin-he.inicio) DIV 60/60,1) as horasExtras, he.observaciones, u.nombres, u.apellidos
                                  FROM hora_extra he
                                  INNER JOIN usuario u ON u.idUsuario = he.idUsuario") as $row) {
                  ?>
                      <tr>
                        <td><?php echo $row['nombres'] . ' ' . $row['apellidos'] ?></td>
                        <td><?php echo $row['tipoHoraExtra'] ?></td>
                        <td><?php echo $row['jornada'] ?></td>
                        <td><?php echo $row['fecha'] ?></td>
                        <td><?php echo $row['inicio'] ?></td>
                        <td><?php echo $row['fin'] ?></td>
                        <td><?php echo $row['observaciones'] ?></td>
                        <td><?php echo $row['horasExtras'] ?></td>
                        <!-- <td>
                        <a href="editarHoraExtra.php?idHoraExtra=<?php echo $row['idHoraExtra'] ?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                        <a href="eliminarHoraExtra.php?idHoraExtra=<?php echo $row['idHoraExtra'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td> -->
                      </tr>
                    <?php
                    }
                  } elseif ($my_user_type == "user") {
                    foreach ($conn->query("SELECT idHoraExtra, tipoHoraExtra, jornada, DATE_FORMAT(fecha, '%e %M %Y') as fecha, 
                                  TIME_FORMAT(inicio, '%r') as inicio, TIME_FORMAT(fin, '%r') as fin, 
                                  TRUNCATE(TIME_TO_SEC(fin-inicio) DIV 60/60,1) as horasExtras, observaciones
                                  FROM hora_extra
                                  WHERE idUsuario = '$my_user_id'") as $row) {
                    ?>
                      <tr>
                        <td><?php echo $row['tipoHoraExtra'] ?></td>
                        <td><?php echo $row['jornada'] ?></td>
                        <td><?php echo $row['fecha'] ?></td>
                        <td><?php echo $row['inicio'] ?></td>
                        <td><?php echo $row['fin'] ?></td>
                        <td><?php echo $row['observaciones'] ?></td>
                        <td><?php echo $row['horasExtras'] ?></td>
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
            <div class="table-responsive" id="tablaHorasExtrasRango" style="display: none">
              <h4 class="tituloRango">Horas extras por rango <span style="font-weight: bold"></span><strong class="rangoTitulo"></strong></h4>
              <div id="horasRango"></div>
            </div>
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
  <!-- Moment -->
  <script type="text/javascript" src="../plugins/moment/moment.min.js"></script>
  <!-- DataTable -->
  <script src="../plugins/datatables/jquery.dataTables.js"></script>
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
      $('#fechapicker').datetimepicker({
        format: 'L'
      })

      //Timepicker
      $('#timepicker1').datetimepicker({
        format: 'LT'
      })
      $('#timepicker2').datetimepicker({
        format: 'LT'
      })
    });


    function mostrar(dato) {
      if (dato == "dia") {
        document.getElementById("tablaHorasExtrasDia").style.display = "block";
        document.getElementById("tablaHorasExtrasRango").style.display = "none";
        document.getElementById("rangoFecha").style.display = "none";
      }
      if (dato == "rango") {
        document.getElementById("tablaHorasExtrasRango").style.display = "block";
        document.getElementById("rangoFecha").style.display = "block";
        document.getElementById("tablaHorasExtrasDia").style.display = "none";
      }
    };

    $(function() {
      $('input[name="rangoFecha"]').daterangepicker({
        opens: 'left'
      }, function(start, end, label) {
        //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        $(".tituloRango > span").text(' desde ' + start.format('D MMMM YYYY') + ' hasta ' + end.format('D MMMM YYYY'));
        var fechaInicio = start.format('YYYY-MM-DD');
        var fechaFin = end.format('YYYY-MM-DD');

        $.ajax({
          url: 'tablaRangoHE.php?inicio=' + fechaInicio + '&fin=' + fechaFin,
          success: function(datos) {
            $("#horasRango").html(datos);
          }
        });
      });
    });

    $(document).ready(function() {
      $('#tabla').DataTable();
    });


    // $( document ).ready(function(){

    //     $("input[type='radio']").change(function(){

    //     $("#tablaHorasExtrasDia").hide();
    //     $("#tablaHorasExtrasSemana").hide();
    //     $("#tablaHorasExtrasMes").hide();

    //     var horasExtras = $("input[name='grupoHorasExtras']:checked").val();

    //     if(horasExtras == "dia")
    //         $("#dia").show()

    //     });
    // });
  </script>
</body>

</html>