<?php

    session_start();
    
    $idUsuario = $_SESSION['user_id'];
    
    include "../config/conexion.php";

    if (isset($_POST['submit']) != ""){
        
        $tipoIncapacidad = $_POST["tipoIncapacidad"];

        $nombre = $_FILES["foto"]["name"];
        $tipo = $_FILES["foto"]["type"];
        $ruta_provisional = $_FILES["foto"]["tmp_name"];
        $size = $_FILES["foto"]["size"];
        $carpeta = "../dist/docs/";
        
        if ($tipo == 'image/jpg' && $tipo == 'image/jpeg' && $tipo == 'image/png' && $tipo == 'image/gif')
        {
          echo "Error, el archivo es una imagen"; 
        }
        // else if ($size > 1024*1024)
        // {
        //   echo "Error, el tamaño máximo permitido es un 1MB";
        // }
        else
        {
            $src = $carpeta.$nombre;
           @move_uploaded_file($ruta_provisional, $src);

           $query = "INSERT INTO `incapacidad`(`tipoIncapacidad`, `evidencia`, `idUsuario`) 
                    VALUES ('$tipoIncapacidad', '$nombre', '$idUsuario' where idUsuario=$idUsuario";
           $query_new_insert = mysqli_query($conn,$query);

            if($query_new_insert){
                $messages[] = "Perfil Actualizado Correctamente. Recargue la página.";
                // echo "<br><div class='alert alert-success' role='alert'>
                //     <button type='button' class='close' data-dismiss='alert'>&times;</button>
                //     <strong>¡Bien hecho!</strong> Perfil Actualizado Correctamente. Recargue la página.
                // </div>";
           }else{
                $errors []= "Algo ha salido mal, intenta nuevamente.".mysqli_error($conn);
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


<?php

    session_start();
    
    $idUsuario = $_SESSION['user_id'];
    
    include "../config/conexion.php";

    if (isset($_FILES['file']) != ""){
        
        

        $nombre = $_FILES["file"]["name"];
        
        
        
        $carpeta = "../dist/docs/";
        
        if(move_uploaded_file($_FILES["file"]["tmp_name"],$carpeta.$nombre)){
            echo "Archivo subido con exito";
        }
    }

?>