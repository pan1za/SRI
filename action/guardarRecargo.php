<?php
    session_start();
    include "../config/conexion.php";

    $tipoRecargo = $_POST["tipoRecargo"];
    $jornada = $_POST["jornada"];
    $fecha = $_POST["fechaRecargo"];
    $inicio = $_POST["inicioRecargo"];
    $fin = $_POST["finalRecargo"];
    $observaciones = $_POST["observaciones"];
    $idUsuario = $_SESSION["user_id"];

    if ($observaciones == ""){
        $observaciones = "Sin observaciones";
    }

    $query = "INSERT INTO `recargo`(`tipoRecargo`, `jornada`, `fecha`, `inicio`, `fin`, `observaciones`, `idUsuario`) 
            VALUES ('$tipoRecargo', '$jornada', '$fecha', '$inicio', '$fin', '$observaciones', '$idUsuario')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $messages[] = "Recargo registrado";
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