<?php

include "../include/head.php";

if (isset($_GET['idUsuario'])) {
    $idUser = $_GET['idUsuario'];

    // descarga el archivo pero da error al vizualizarlo
    $sql = "SELECT * FROM hoja_de_vida WHERE idUsuario=$idUser";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../dist/docs/hojasDeVida/' . $file['nombreArchivo'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../dist/docs/hojasDeVida/' . $file['nombreArchivo']));
        readfile($filepath);
    }

}

?>