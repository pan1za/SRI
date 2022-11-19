<?php

include "../include/head.php";

if (isset($_GET['idIncapacidad'])) {
        $idInc = $_GET['idIncapacidad'];

        $sql = "SELECT * FROM incapacidad WHERE idIncapacidad=$idInc";
        $result = mysqli_query($conn, $sql);

        $file = mysqli_fetch_assoc($result);
        $filepath = '../dist/docs/cedulas/' . $file['cedula'];

        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize('../dist/docs/cedulas/' . $file['cedula']));
            ob_clean();
            flush();
            readfile($filepath);
        }
        else {
            echo "No hay cedula para ese usuario";
        }
    }

?>