<?php
include('conexion.php');
$con = conexion();

$user_login = trim($_GET['usuario']);
echo $user_login;

$query = "DELETE FROM quinielas.quiniela WHERE user_login = '$user_login'";
$consulta = pg_query($con, $query);

if($consulta) {
    $query2 = "DELETE FROM quinielas.usuarios WHERE user_login ='$user_login'";
    $result2 = pg_query($con, $query2);
    if($result2){
        header('location:users_admin.php');
    }else{echo "no elimino usuario";}
}else{echo "no elimino quiniela";}
?>