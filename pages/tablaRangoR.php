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
                                    INNER JOIN usuario u ON u.idUsuario = r.idUsuario
                                    WHERE fecha BETWEEN '$fechaInicio' AND '$fechaFin'") as $row) {
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
                foreach ($conn->query("SELECT r.idRecargo, r.tipoRecargo, r.jornada, DATE_FORMAT(r.fecha, '%e %M %Y') as fecha, 
                                    TIME_FORMAT(r.inicio, '%r') as inicio, TIME_FORMAT(r.fin, '%r') as fin, 
                                    TRUNCATE(TIME_TO_SEC(r.fin-r.inicio) DIV 60/60,1) as horasRecargo, r.observaciones
                                    FROM recargo r
                                    INNER JOIN usuario u ON u.idUsuario = r.idUsuario
                                    WHERE fecha BETWEEN '$fechaInicio' AND '$fechaFin' AND r.idUsuario = '$idUsuario'") as $row) {
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
    <?php foreach ($conn->query("SELECT SUM(TRUNCATE(TIME_TO_SEC(fin-inicio) DIV 60/60,1)) as totalHorasRecargo
                        FROM recargo
                        WHERE fecha BETWEEN '$fechaInicio' AND '$fechaFin' AND idUsuario = '$idUsuario'") as $row) {
    ?>
    <?php
    }
    if ($my_user_type == "user") { ?>
        <p>Total horas recargos <?php echo $row['totalHorasRecargo'] ?></p>
    <?php
    }
    ?>
<?php
}
?>

<?php
include "../include/scripts.php";
?>

<script>
    $(document).ready(function() {
        $('#tabla2').DataTable();
    });
</script>