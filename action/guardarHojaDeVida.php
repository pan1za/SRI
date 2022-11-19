<?php

session_start();

include "../config/conexion.php";

$idUsuario = $_SESSION['user_id'];

if (isset($_FILES['hojaDeVida']) != "") {
    $nombre = $_FILES["hojaDeVida"]["name"];
    $tipo = $_FILES["hojaDeVida"]["type"];
    $ruta_provisional = $_FILES["hojaDeVida"]["tmp_name"];
    $size = $_FILES["hojaDeVida"]["size"];
    $carpeta = "../dist/docs/hojasDeVida/";

    if ($tipo !== 'application/pdf') {
        $errors[] = "Debe ser un archivo PDF";
    } else {
        $src = $carpeta . $nombre;
        @move_uploaded_file($ruta_provisional, $src);

        $query = "INSERT INTO `hoja_de_vida`(`nombreArchivo`, `idUsuario`) VALUES ('$nombre', '$idUsuario')";
        $query_new_insert = mysqli_query($conn, $query);

        if ($query_new_insert) {
            $messages[] = "Archivo subido con éxito!";
        } else {
            $errors[] = "Algo ha salido mal, intenta nuevamente. " . mysqli_error($conn);
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