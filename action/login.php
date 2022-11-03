<?php
    session_start();
    include "../config/conexion.php";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email=$_POST["email"];
        $password=$_POST["password"];

        $sql="select * from usuario where email = '".$email."' and password = '".$password."'";
        $result=mysqli_query($conn, $sql);

        $row=mysqli_fetch_array($result);

        if(!$row){
            echo "<script>alert(\"Usuario o contraseña incorrecta\"); window.location=\"../login.php\"</script>";
            exit;
        }elseif($row["usertype"]=="user"){
            $_SESSION["user_id"] = $row["idUsuario"];
            $_SESSION["id_sede"] = $row["idSede"];
            session_start();

            // if(isset($_SESSION['email'])){
            //     session_unset();
            // }
            header("location:../index.php");
            die(); 
        }elseif ($row["usertype"]=="admin"){
            $_SESSION["user_id"]=$row["idUsuario"];
            $_SESSION["usertype"] == $row["usertype"];
            session_start();
            header("location:../index.php");
            die();
        }
    }

?>