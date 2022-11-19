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
        $menuOpenListar = "menu-open";
        $activeListEmp = "active";
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
                        <h3 class="card-title">Reporte de Empleados</h3>
                    </div>
                    <div class="card-body">
                        <div class="card card-body">
                            <div class="table-responsive" id="tablaRecargosDia">
                                <h4>Lista de Empleados</h4>
                                <table class="table table-bordered" id="tabla">
                                    <thead class="bg-primary" align="center">
                                        <tr class="sidebar-dark-primary">
                                            <th scope="col">Nombres</th>
                                            <th scope="col">Apellidos</th>
                                            <th scope="col">Restaurante</th>
                                            <th scope="col">Sede</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                        <?php foreach ($conn->query("SELECT u.idUsuario, u.nombres, u.apellidos, r.nombre as restaurante, s.nombre as sede 
                                                                    FROM usuario u 
                                                                    INNER JOIN sede s ON s.idSede = u.idSede
                                                                    INNER JOIN restaurante r ON r.idRestaurante = s.idRestaurante
                                                                    WHERE r.idRestaurante = $idRestaurante;") as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['nombres'] . ' ' . $row['apellidos'] ?></td>
                                                <td><?php echo $row['apellidos'] ?></td>
                                                <td><?php echo $row['restaurante'] ?></td>
                                                <td><?php echo $row['sede'] ?></td>
                                                <td>
                                                    <a href="perfil?idUsuario=<?php echo $row['idUsuario'] ?>" class="btn btn-primary">Ver perfil</a>
                                                    <!-- <a href="reporteHorasExtras?idUsuario=<?php echo $row['idUsuario'] ?>" class="btn btn-primary">Ver horas extras</a>
                                                    <a href="reporteRecargo?idUsuario=<?php echo $row['idUsuario'] ?>" class="btn btn-primary">Ver recargos</a> -->
                                                </td>
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
                            </div>
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
        $(document).ready(function() {
            $('#tabla').DataTable();
        });
    </script>
</body>

</html>