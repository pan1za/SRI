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

<?php
//session_start();
//include "../config/conexion.php";
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
                                    INNER JOIN usuario u ON u.idUsuario = he.idUsuario
                                    WHERE fecha BETWEEN '$fechaInicio' AND '$fechaFin'") as $row) {
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
    $(document).ready(function() {
        $('#tabla2').DataTable();
    });
</script>