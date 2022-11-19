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
    $menuOpenMisRepor1 = "menu-open";
    $activeMiRepHorasE = "active";
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
    $(function() {
      bsCustomFileInput.init()
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
  </script>
</body>

</html>