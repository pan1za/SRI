<?php

session_start();

$idUsuario = $_SESSION['user_id'];

include "../config/conexion.php";

if (isset($_FILES["foto"])) {

    $file = $_FILES["foto"];
    $nombre = $idUsuario . $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $carpeta = "../dist/img/perfiles/";

    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif') {
        $errors[] = "El archivo no es una imagen";
    }
    // else if ($size > 1024*1024)
    // {
    //   echo "Error, el tamaño máximo permitido es un 1MB";
    // }
    else {
        $src = $carpeta . $nombre;
        @move_uploaded_file($ruta_provisional, $src);

        $query = "UPDATE usuario set foto=\"$nombre\" where idUsuario=$idUsuario";
        $query_new_insert = mysqli_query($conn, $query);

        if ($query_new_insert) {
            $messages[] = "Perfil Actualizado Correctamente. Recargue la página.";
        } else {
            $errors[] = "Algo ha salido mal, intenta nuevamente." . mysqli_error($conn);
        }
    }
    if (isset($errors)) {
?>
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong>
            <?php
            foreach ($errors as $error) {
                echo $error;
            }
            ?>
        </div>
    <?php
    }
    if (isset($messages)) {
    ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Bien hecho!</strong>
            <?php
            foreach ($messages as $message) {
                echo $message;
            }
            ?>
        </div>
<?php
    }
}

?>