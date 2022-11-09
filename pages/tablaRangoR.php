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
            ?>
        </tbody>
    </table>
    <?php foreach ($conn->query("SELECT SUM(TRUNCATE(TIME_TO_SEC(fin-inicio) DIV 60/60,1)) as totalHorasRecargo
                        FROM recargo
                        WHERE fecha BETWEEN '$fechaInicio' AND '$fechaFin' AND idUsuario = '$idUsuario'") as $row) {
    ?>
    <?php
    }
    ?>
    <p>Total horas recargos <?php echo $row['totalHorasRecargo'] ?></p>
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