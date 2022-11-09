<?php
    session_start();
    include "../config/conexion.php";

    if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == null) {
        header("location: ../login.php");
    }
    
    $my_user_id = $_SESSION["user_id"];
    $my_user_type = $_SESSION["user_type"];

    if ($my_user_type == "user"){
        $query = mysqli_query($conn,"SELECT u.idUsuario, u.foto, u.nombres, u.apellidos, u.email, u.password, u.username, u.usertype, r.idRestaurante, 
                                    r.nombre as nombreRestaurante, u.idSede, s.nombre as nombreSede, 
                                    iu.cargo, iu.inicioContrato, iu.tipoContrato, iu.sueldo,  iu.pension, iu.salud, iu.arl
                                    from usuario u 
                                    INNER JOIN sede s ON s.idSede = u.idSede
                                    INNER JOIN restaurante r ON r.idRestaurante = s.idRestaurante
                                    INNER JOIN info_usuario iu ON iu.idUsuario = $my_user_id
                                    where u.idUsuario = $my_user_id");
        while($row = mysqli_fetch_array($query)){
            $idUsuario = $row["idUsuario"];
            $foto = $row['foto'];
            $nombres = $row['nombres'];
            $apellidos = $row['apellidos'];
            $email = $row['email'];
            $password = $row['password'];
            $username = $row['username'];
            $usertype = $row['usertype'];
            $idRestaurante = $row['idRestaurante'];
            $nombreRestaurante= $row['nombreRestaurante'];
            $idSede = $row['idSede'];
            $nombreSede = $row['nombreSede'];
            $cargo = $row['cargo'];
            $inicioContrato = $row['inicioContrato'];
            $tipoContrato = $row['tipoContrato'];
            $sueldo = $row['sueldo'];
            $pension = $row['pension'];
            $salud = $row['salud'];
            $arl = $row['arl'];
        }
    }
    
    if ($my_user_type == "admin"){
        $query = mysqli_query($conn,"SELECT u.foto, u.nombres, u.apellidos, u.email, u.username, u.usertype, r.nombre as nombreRestaurante, r.idRestaurante, iu.cargo
                                    from usuario u 
                                    INNER JOIN restaurante r ON r.idRestaurante = u.idRestaurante
                                    INNER JOIN info_usuario iu ON iu.idUsuario = $my_user_id
                                    where u.idUsuario = $my_user_id");
        while($row = mysqli_fetch_array($query)){
            $foto = $row['foto'];
            $nombres = $row['nombres'];
            $apellidos = $row['apellidos'];
            $email = $row['email'];
            $username = $row['username'];
            $usertype = $row['usertype'];
            $cargo = $row['cargo'];
            $idRestaurante = $row['idRestaurante'];
            $nombreRestaurante= $row['nombreRestaurante'];
        }
    }
    
?>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">