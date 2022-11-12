<?php
$user = $_POST['username_input'];
$password = $_POST['password_input'];

include('conexion.php');
$con = conexion();

$consulta = "SELECT * FROM quinielas.usuarios WHERE user_login = '$user' AND password = '$password'";
$resultado = pg_query($con, $consulta);

while($lista = pg_fetch_row($resultado)){
    $admin = $lista['3'];
    echo $admin;
}
if($admin == 'f'){
    $filas = pg_num_rows($resultado);

    if($filas) {
        header("location:home.php");
        session_start();
        $_SESSION['username_input'] = $user;
        $_SESSION['password_input'] = $password;
    }else{
        header("location:alert_error_login.php");
    }
}else if($admin == 't'){
    session_start();
    $_SESSION['username_input'] = $user;
    header("location:admin.php");
}else{
    header("location:alert_error_login.php");
}
?>