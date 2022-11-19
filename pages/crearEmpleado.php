<?php

include "../include/head.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistemas de Reportes | Crear Empleado</title>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        
        <?php
        $menuOpenCrear = "menu-open";
        $activeCrearEmp = "active";
        include "../include/navbar.php";
        include "../include/aside.php";
        ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Crear nuevo usuario</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Crear Empleado</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Empleado</h3>
                    </div>
                    <div class="card-body">
                        <form id="formEmpleado" method="POST">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label>Nombres <b>*</b></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="nombres">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-user"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Apellidos <b>*</b></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="apellidos">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-user"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Email <b>*</b></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="email">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-envelope"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Nombre de la sede del restaurante <?php echo $nombreRestaurante ?> <b>*</b></label>
                                                <div class="input-group">
                                                    <select class="form-control" name="idSede" required>
                                                        <option selected disabled value="">Seleccione un producto</option>
                                                        <?php foreach ($conn->query("SELECT s.nombre, s.idSede from sede s 
                                                                        INNER JOIN restaurante r ON r.idRestaurante = s.idRestaurante 
                                                                        INNER JOIN usuario u ON u.idRestaurante = r.idRestaurante") as $row) {
                                                        ?>
                                                            <option value="<?php echo $idSede = $row["idSede"] ?>"><?php echo $row['nombre'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Contraseña <b>*</b></label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="password" id="password1">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button" onclick="mostrarPassword1()"> <span class="fa fa-eye-slash icon"></span></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Cargo <b>*</b></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="cargo">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-envelope"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md">
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label>Inicio de contrato <b>*</b></label>
                                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                    <input type="date" name="inicioContrato" id="inicioContrato" class="form-control" data-target="#reservationdate" required />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Tipo de contrato <b>*</b></label>
                                                <select class="form-control" name="tipoContrato" id="tipoContrato" required>
                                                    <option value="" selected disabled autofocus>Seleccione una opción</option>
                                                    <option value='Por obra o labor'>Por obra o labor</option>
                                                    <option value='Trabajo a término fijo'>Trabajo a término fijo</option>
                                                    <option value='Trabajo a término indefinido'>Trabajo a término indefinido</option>
                                                    <option value='Temporal'>Temporal</option>
                                                    <option value='Aprendizaje'>Aprendizaje</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Sueldo <b>*</b></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="sueldo">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-dollar-sign"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Pensión <b>*</b></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="pension">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-envelope"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Salud <b>*</b></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="salud">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fa fa-hospital"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>ARL <b>*</b></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="arl">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fa fa-user-md"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ml-auto">
                                    <p>Obligatorio (<b>*</b>)</p>
                                </div>
                                <div class="ml-auto">
                                    <button type="submit" id="crearEmpleado" class="btn btn-primary">Crear Empleado</button>
                                    <button type="submit" id="btn" class="btn btn-danger">Cancelar</button>
                                </div>
                                <div class="ml-auto" id="result"></div>
                            </div>
                        </form>
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
            bsCustomFileInput.init();

            $('#reservationdate').datetimepicker({
                format: 'L'
            })
        });

        function mostrarPassword1() {
            var cambio1 = document.getElementById("password1");
            if (cambio1.type == "password") {
                cambio1.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            } else {
                cambio1.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }

        function mostrarPassword2() {
            var cambio2 = document.getElementById("password2");
            if (cambio2.type == "password") {
                cambio2.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            } else {
                cambio2.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }

        $("#formEmpleado").submit(function(event) {
            $('#crearEmpleado').attr("disabled", true);

            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "../action/guardarEmpleado.php",
                data: parametros,
                beforeSend: function(objeto) {
                    document.getElementById('formEmpleado').reset();
                    $("#result").html("Mensaje: Cargando...");
                },
                success: function(datos) {
                    $("#result").html(datos);
                    $('#crearEmpleado').attr("disabled", false);
                }
            });
            event.preventDefault();
        })
    </script>
</body>

</html>