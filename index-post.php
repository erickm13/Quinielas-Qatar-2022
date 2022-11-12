<?php

include 'conexion.php';
$con = conexion();
if(isset($_POST['button_submit'])){
    if (strlen($_POST['name_input']) >= 1 && strlen($_POST['password_input']) >= 1 && strlen($_POST['username_input']) >= 1) {
        $name = trim($_POST['name_input'])." ". trim($_POST['lastname_input']);
        $password = trim($_POST['password_input']);
        $username = trim($_POST['username_input']);

        $consulta = "INSERT INTO quinielas.usuarios VALUES('$password', '$username', '$name' , FALSE, 0)";
        $resultado = pg_query($con, $consulta);

        if($resultado) {
            echo "cuenta creada exitosamente";
            header("location:alert_verify.php");
        }else{
            echo "Error al crear la cuenta";
            header("location:alert_error_verify.php");
        }

    }else {
        echo "por favor llena todos los campos";
        header("location:alert_error_verify.php");
    }
}else {
    echo "no se presiono boton";
    header("location:alert_error_verify.php");
}

?>