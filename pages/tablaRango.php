<?php
session_start();
include "../config/conexion.php";

$fechaInicio = $_GET["inicio"];
$fechaFin = $_GET["fin"];
$idUsuario = $_SESSION["user_id"];
 
if (isset($_GET["inicio"])) {
?>
    <table class="table table-bordered">
        <thead class="bg-primary" align="center">
            <tr class="sidebar-dark-primary">
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
            //$rangoFecha = $_GET["rangoFecha"];
            foreach ($conn->query("SELECT idHoraExtra, tipoHoraExtra, jornada, DATE_FORMAT(fecha, '%e %M %Y') as fecha, inicio, fin, 
                                TRUNCATE(TIME_TO_SEC(fin-inicio) DIV 60/60,1) as horasExtras, observaciones
                                FROM hora_extra
                                WHERE fecha BETWEEN '$fechaInicio' AND '$fechaFin' AND idUsuario = '$idUsuario'") as $row) {
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
            ?>
        </tbody>
    </table>
    <?php foreach ($conn->query("SELECT SUM(TRUNCATE(TIME_TO_SEC(fin-inicio) DIV 60/60,1)) as totalHorasExtras
                        FROM hora_extra
                        WHERE fecha BETWEEN '$fechaInicio' AND '$fechaFin' AND idUsuario = '$idUsuario'") as $row) {
    ?>
    <?php
    }
    ?>
    <p>Total horas extras <?php echo $row['totalHorasExtras'] ?></p>
<?php
}
?>