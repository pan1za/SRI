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
        $menuOpenMisRepor3 = "menu-open";
        $activeMiRepInc = "active";
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
                        <h3 class="card-title">Reporte de Incapacidad</h3>
                    </div>
                    <div class="card-body">
                        <div class="card card-body">
                            <div class="form-group">
                                <h5>Agrupar incapacidades por:</h5>
                                <input type="radio" value="dia" name="grupoIncapacidad" onchange="mostrar(this.value)">
                                <label>Día</label><br>
                                <input type="radio" value="rango" name="grupoIncapacidad" onchange="mostrar(this.value)">
                                <label>Rango de fecha</label><br>
                                <input type="text" name="rangoFecha" id="rangoFecha" value="" style="display: none">
                            </div>
                        </div>
                        <div class="table-responsive" id="tablaIncapacidadDia" style="display: none">
                            <h4>Lista de Incapacidades</h4>
                            <table class="table table-bordered" id="tabla">
                                <thead class="bg-primary" align="center">
                                    <tr class="sidebar-dark-primary">
                                        <?php if ($my_user_type == "admin") { ?>
                                            <th scope="col">Realizado por</th>
                                        <?php
                                        }
                                        ?>
                                        <th scope="col">Tipo incapacidad</th>
                                        <th scope="col">Día inicio</th>
                                        <th scope="col">Día final</th>
                                        <th scope="col">Observaciones</th>
                                        <th scope="col">Evidencia</th>
                                        <th scope="col">Historia clínica</th>
                                        <th scope="col">Cédula</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                    <?php
                                    if ($my_user_type == "admin") {
                                        foreach ($conn->query("SELECT i.idIncapacidad,  i.tipoIncapacidad, DATE_FORMAT( i.diaInicio, '%e %M %Y') as diaInicio, 
                                                    DATE_FORMAT( i.diaFinal, '%e %M %Y') as diaFinal, i.observaciones, i.evidencia, i.historiaClinica, i.cedula, u.nombres, u.apellidos
                                                    FROM incapacidad i
                                                    INNER JOIN usuario u ON u.idUsuario = i.idUsuario
                                                    ORDER BY idIncapacidad ASC") as $row) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row['nombres'] . ' ' . $row['apellidos'] ?></td>
                                                <td><?php echo $row['tipoIncapacidad'] ?></td>
                                                <td><?php echo $row['diaInicio'] ?></td>
                                                <td><?php echo $row['diaFinal'] ?></td>
                                                <td><?php echo $row['observaciones'] ?></td>
                                                <td><?php echo $row['evidencia'] . ' &nbsp'  ?>
                                                    <a href="../action/descargarInc.php?idIncapacidad=<?php echo $row['idIncapacidad'] ?>">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </td>
                                                <td><?php echo $row['historiaClinica'] . ' &nbsp'  ?>
                                                    <a href="../action/descargarHistC.php?idIncapacidad=<?php echo $row['idIncapacidad'] ?>" <?php if ($row['historiaClinica'] == null) { ?> <?php } else { ?>><i class="fas fa-download"></i>
                                                    <?php } ?>
                                                    </a>
                                                </td>
                                                <td><?php echo $row['cedula'] . ' &nbsp'  ?>
                                                    <a href="../action/descargarCed.php?idIncapacidad=<?php echo $row['idIncapacidad'] ?>" <?php if ($row['cedula'] == null) { ?> <?php } else { ?>><i class="fas fa-download"></i>
                                                    <?php } ?>
                                                    </a>
                                                </td>
                                                <!-- <td>
                                                <a href="editarHoraExtra.php?idHoraExtra=<?php echo $row['idHoraExtra'] ?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                                                <a href="eliminarHoraExtra.php?idHoraExtra=<?php echo $row['idHoraExtra'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                    </td> -->
                                            </tr>
                                        <?php
                                        }
                                    } elseif ($my_user_type == "user") {
                                        foreach ($conn->query("SELECT idIncapacidad, tipoIncapacidad, DATE_FORMAT(diaInicio, '%e %M %Y') as diaInicio, 
                                                    DATE_FORMAT(diaFinal, '%e %M %Y') as diaFinal, observaciones, evidencia, historiaClinica, cedula
                                                    FROM incapacidad
                                                    WHERE idUsuario = '$my_user_id'
                                                    ORDER BY idIncapacidad ASC") as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['tipoIncapacidad'] ?></td>
                                                <td><?php echo $row['diaInicio'] ?></td>
                                                <td><?php echo $row['diaFinal'] ?></td>
                                                <td><?php echo $row['observaciones'] ?></td>
                                                <td><?php echo $row['evidencia'] . ' &nbsp'  ?>
                                                    <a href="descargarIncapacidad.php?idIncapacidad=<?php echo $row['idIncapacidad'] ?>">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </td>
                                                <td><?php echo $row['historiaClinica'] . ' &nbsp'  ?>
                                                    <a href="descargarHistoriaC.php?idIncapacidad=<?php echo $row['idIncapacidad'] ?>" <?php if ($row['historiaClinica'] == null) { ?> <?php } else { ?>><i class="fas fa-download"></i>
                                                    <?php } ?>
                                                    </a>
                                                </td>
                                                <td><?php echo $row['cedula'] . ' &nbsp'  ?>
                                                    <a href="descargarCedula.php?idIncapacidad=<?php echo $row['idIncapacidad'] ?>" <?php if ($row['cedula'] == null) { ?> <?php } else { ?>><i class="fas fa-download"></i>
                                                    <?php } ?>
                                                    </a>
                                                </td>
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
                        <div class="table-responsive" id="tablaIncapacidadRango" style="display: none">
                            <h4 class="tituloRango">Incapacidad por rango <span style="font-weight: bold"></span><strong class="rangoTitulo"></strong></h4>
                            <div id="incapacidadRango"></div>
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
                document.getElementById("tablaIncapacidadDia").style.display = "block";
                document.getElementById("tablaIncapacidadRango").style.display = "none";
                document.getElementById("rangoFecha").style.display = "none";
            }
            if (dato == "rango") {
                document.getElementById("tablaIncapacidadRango").style.display = "block";
                document.getElementById("rangoFecha").style.display = "block";
                document.getElementById("tablaIncapacidadDia").style.display = "none";
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
                    url: 'tablaRangoI.php?inicio=' + fechaInicio + '&fin=' + fechaFin,
                    success: function(datos) {
                        $("#incapacidadRango").html(datos);
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