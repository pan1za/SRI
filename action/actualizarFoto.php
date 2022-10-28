<?php
    
    session_start();

    $idUsuario = $_SESSION['user_id'];

    include "../config/conexion.php";

    if (isset($_FILES["foto"])){
        
        $file = $_FILES["foto"];
        $nombre = $idUsuario.$file["name"];
        $tipo = $file["type"];
        $ruta_provisional = $file["tmp_name"];
        $size = $file["size"];
        $carpeta = "../dist/img/perfiles/";
        
        if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
        {
          $errors [] = "El archivo no es una imagen"; 
        }
        // else if ($size > 1024*1024)
        // {
        //   echo "Error, el tamaño máximo permitido es un 1MB";
        // }
        else
        {
            $src = $carpeta.$nombre;
           @move_uploaded_file($ruta_provisional, $src);

           $query = "UPDATE usuario set foto=\"$nombre\" where idUsuario=$idUsuario";
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
/*
$origen="img/imagen.jpg";
$destino="img/nuevaimagen.jpg";
$destino_temporal=tempnam("tmp/","tmp");
if(redimensionarImagen($origen, $destino_temporal, 300, 350, 100))
{
    // guardamos la imagen redimensionada
    $fp=fopen($destino,"w");
    fputs($fp,fread(fopen($destino_temporal,"r"),filesize($destino_temporal)));
    fclose($fp);
 
    // mostramos la imagen
    echo "<img src='img/nuevaimagen.jpg'>";
}else{
    // la imagen original es mas pequeña que el tamaño destino
    echo "<img src='img/imagen.jpg'>";
}
 
/**
 * Funcion para redimensionar imagenes
 *
 * @param string $origin Imagen origen en el disco duro ($_FILES["image1"]["tmp_name"])
 * @param string $destino Imagen destino en el disco duro ($destino=tempnam("tmp/","tmp");)
 * @param integer $newWidth Anchura máxima de la nueva imagen
 * @param integer $newHeight Altura máxima de la nueva imagen
 * @param integer $jpgQuality (opcional) Calidad para la imagen jpg
 * @return boolean true = Se ha redimensionada|false = La imagen es mas pequeña que el nuevo tamaño
 
function redimensionarImagen($origin,$destino,$newWidth,$newHeight,$jpgQuality=100)
{
    // getimagesize devuelve un array con: anchura,altura,tipo,cadena de 
    // texto con el valor correcto height="yyy" width="xxx"
    $datos=getimagesize($origin);
 
    // comprobamos que la imagen sea superior a los tamaños de la nueva imagen
    if($datos[0]>$newWidth || $datos[1]>$newHeight)
    {
 
        // creamos una nueva imagen desde el original dependiendo del tipo
        if($datos[2]==1)
            $img=imagecreatefromgif($origin);
        if($datos[2]==2)
            $img=imagecreatefromjpeg($origin);
        if($datos[2]==3)
            $img=imagecreatefrompng($origin);
 
        // Redimensionamos proporcionalmente
        if(rad2deg(atan($datos[0]/$datos[1]))>rad2deg(atan($newWidth/$newHeight)))
        {
            $anchura=$newWidth;
            $altura=round(($datos[1]*$newWidth)/$datos[0]);
        }else{
            $altura=$newHeight;
            $anchura=round(($datos[0]*$newHeight)/$datos[1]);
        }
 
        // creamos la imagen nueva
        $newImage = imagecreatetruecolor($anchura,$altura);
 
        // redimensiona la imagen original copiandola en la imagen
        imagecopyresampled($newImage, $img, 0, 0, 0, 0, $anchura, $altura, $datos[0], $datos[1]);
 
        // guardar la nueva imagen redimensionada donde indicia $destino
        if($datos[2]==1)
            imagegif($newImage,$destino);
        if($datos[2]==2)
            imagejpeg($newImage,$destino,$jpgQuality);
        if($datos[2]==3)
            imagepng($newImage,$destino);
 
        // eliminamos la imagen temporal
        imagedestroy($newImage);
 
        return true;
    }
    return false;

}
*/
?>