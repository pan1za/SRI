<?php

include "../include/head.php";

$fechaInicio = $_GET["inicio"];
$fechaFin = $_GET["fin"];
$idUsuario = $_SESSION["user_id"];

if (isset($_GET["inicio"])) {
?>
    <table class="table table-bordered" id="tabla2">
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
                                        WHERE diaInicio AND diaFinal BETWEEN '$fechaInicio' AND '$fechaFin'
                                        ORDER BY idIncapacidad ASC") as $row) {
            ?>
                    <tr>
                        <td><?php echo $row['nombres'] . ' ' . $row['apellidos'] ?></td>
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
            } elseif ($my_user_type == "user") {
                foreach ($conn->query("SELECT idIncapacidad, tipoIncapacidad, DATE_FORMAT(diaInicio, '%e %M %Y') as diaInicio, 
                                        DATE_FORMAT(diaFinal, '%e %M %Y') as diaFinal, observaciones, evidencia, historiaClinica, cedula
                                        FROM incapacidad
                                        WHERE diaInicio AND diaFinal BETWEEN '$fechaInicio' AND '$fechaFin' AND idUsuario = '$my_user_id'
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
<?php
}
?>

<!-- Scripts -->
<?php
include "../include/scripts.php";
?>

<script>
    $(document).ready(function() {
        $('#tabla2').DataTable();
    });
</script>