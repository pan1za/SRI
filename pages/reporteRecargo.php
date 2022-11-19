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
    
    <?php
    $menuOpenMisRepor2 = "menu-open";
    $activeMiRepRec = "active";
    include "../include/navbar.php";
    include "../include/aside.php";
    ?>

    <div class="content-wrapper">
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
        </div>
      </section>

      <section class="content">

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
                        <td><?php echo $row['nombres'] . ' ' . $row['apellidos'] ?></td>
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
    </div>

    <?php
    include "../include/footer.php";
    ?>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>

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