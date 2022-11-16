<?php
    session_start();
    include "../config/conexion.php";

    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $username = strstr($email, '@', true);
    $idSede = $_POST["idSede"];

    $query = "INSERT INTO `usuario`(`nombres`, `apellidos`, `email`, `password`, `username`, `idSede`) 
            VALUES ('$nombres', '$apellidos', '$email', '$password', '$username', '$idSede')";
    
    $result = mysqli_query($conn, $query);


    $cargo = $_POST["cargo"];
    $inicioContrato	= $_POST["inicioContrato"];
    $tipoContrato = $_POST["tipoContrato"];
    $sueldo	= $_POST["sueldo"];
    $pension = $_POST["pension"];
    $salud = $_POST["salud"];
    $arl = $_POST["arl"];
    $consulta = "SELECT idUsuario FROM usuario WHERE username = '$username'";
    $resultado = mysqli_query($conn, $consulta);
    $fila = mysqli_fetch_row($resultado);
    $idUsuarioCreado = $fila[0];

    $query2 = "INSERT INTO `info_usuario`(`cargo`, `inicioContrato`, `tipoContrato`, `sueldo`, `pension`, `salud`, `arl`, `idUsuario`) 
            VALUES ('$cargo', '$inicioContrato', '$tipoContrato', '$sueldo', '$pension', '$salud', '$arl', '$idUsuarioCreado')";

    $result2 = mysqli_query($conn, $query2);

    if ($result && $result2) {
        $messages[] = "Empleado registrado";
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