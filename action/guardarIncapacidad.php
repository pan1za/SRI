<?php

    //seria mejor una tabla diferente para el tipo de incapacidad???

    session_start();
    
    include "../config/conexion.php";

    $tipoIncapacidad = $_POST['tipoIncapacidad'];
    $diaInicio = $_POST['diaInicio'];
    $diaFinal = $_POST['diaFinal'];
    $observaciones = $_POST['observaciones'];
    $idUsuario = $_SESSION['user_id'];

    if ($observaciones == ""){
        $observaciones = "Sin observaciones";
    }

    if (isset($_FILES['fileEvidencia']) != ""){
        
        $nombre = $_FILES["fileEvidencia"]["name"];
        $tipo = $_FILES["fileEvidencia"]["type"];
        $ruta_provisional = $_FILES["fileEvidencia"]["tmp_name"];
        $size = $_FILES["fileEvidencia"]["size"];
        $carpeta = "../dist/docs/incapacidades/";

        if ($tipo !== 'application/pdf')
        {
            $errors[] = "Debe ser un archivo PDF"; 
        }
        else
        {
            $src = $carpeta.$nombre;
           @move_uploaded_file($ruta_provisional, $src);

           $query = "INSERT INTO `incapacidad`(`tipoIncapacidad`, `evidencia`, `diaInicio`, `diaFinal`, `observaciones`, `idUsuario`) 
                    VALUES ('$tipoIncapacidad', '$nombre', '$diaInicio', '$diaFinal', '$observaciones', '$idUsuario')";
           $query_new_insert = mysqli_query($conn,$query);

            if($query_new_insert){
                $messages[] = "Archivo subido con éxito!";
           }else{
                $errors []= "Algo ha salido mal, intenta nuevamente. ".mysqli_error($conn);
           }
        }

        if (isset($errors)){
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
        if (isset($messages)){
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