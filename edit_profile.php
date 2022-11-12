<?php
session_start();
$user = $_SESSION['username_input'];

include('conexion.php');
$con = conexion();


$query = "SELECT password, nombre FROM quinielas.usuarios WHERE user_login = '$user' AND administrador = true";
$result = pg_query($con, $query);
while($lista = pg_fetch_row($result)){
    $pass = $lista['0'];
    $name = $lista['1'];
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="section_edit_profile">
        <h1>Editar Perfil</h1>
        <a href="admin.php">regresar</a>
        <form method="post">
            <label class="nombre">Nombre: </label>
            <input type="text" class="nombre" name="nombre" placeholder="<?php echo $name ?>"><br>
            <label class="password">Contraseña: </label>
            <input type="password" class="password" name="password"><br>
            <label class="password2">Ingresa contraseña nuevamente: </label>
            <input type="password" class="password2" name="password2">
            <div class="button_submit">
                <button class="button_submit" name="boton_enviar">Enviar</button>
            </div>
        </form>
    </div>
<?php
if(isset($_POST['boton_enviar'])) {
    if(strlen($_POST['nombre']) >=1 && strlen($_POST['password']) >= 1 && strlen($_POST['password2']) >= 1 ){
        if(trim($_POST['password']) == trim($_POST['password2'])) {
            $nombre = trim($_POST['nombre']);
            $contra = trim($_POST['password']);
            $query2 = "UPDATE quinielas.usuarios SET password = '$contra', nombre = '$nombre' WHERE user_login = '$user' AND administrador = 'true'";
            $result2 = pg_query($con, $query2);

            if($result2){
                echo "<br><p>CAMPOS ACTUALIZADOS</p>";
            }else{
                echo "<br><p>Error, revisa los campos y vuelve a intentarlo</p>";
            }
        }else{
            echo "<br><p>Las contraseñas no coinciden</p>";
        }


    }else{
            echo "<br><p>Por favor llena todos los campos</p>";
        }
}
?>
</body>
</html>