<?php
    session_start();
    include "../config/conexion.php";

    $tipoHoraExtra = $_POST["tipoHoraExtra"];
    $jornada = $_POST["jornada"];
    $fecha = $_POST["fechaHoraExtra"];
    $inicio = $_POST["inicioHoraExtra"];
    $fin = $_POST["finalHoraExtra"];
    $idUsuario = $_SESSION["user_id"];

    $query = "INSERT INTO `hora_extra`(`tipoHoraExtra`, `jornada`, `fecha`, `inicio`, `fin`, `idUsuario`) 
            VALUES ('$tipoHoraExtra', '$jornada', '$fecha', '$inicio', '$fin', '$idUsuario')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $messages[] = "Hora extra registrada";
    } else {
        $errors[] = "Algo ha salido mal, intenta nuevamente." . mysqli_error($conn);
    }

    if (isset($errors)){
        ?>
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong>
                <?php
                    foreach ($errors as $error){
                        echo $error;
                    }
                ?>
        </div>
        <?php
    }
    if (isset($messages)){
        ?>
        <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Bien hecho!</strong>
                <?php
                    foreach ($messages as $message){
                        echo $message;
                    }
                ?>
        </div>
    <?php
    }
?>