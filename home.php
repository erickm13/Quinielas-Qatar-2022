

<?php
session_start();
$user = $_SESSION['username_input'];
include('conexion.php');
$con = conexion();

$consulta = "SELECT punteo FROM quinielas.usuarios WHERE user_login = '$user'";
$resultado = pg_query($con, $consulta);
while ($row = pg_fetch_row($resultado)) {
    $punteo = $row[0];
}

$consulta2 = "SELECT nombre FROM quinielas.usuarios WHERE user_login = '$user'";
$resultado2 = pg_query($con, $consulta2);
while ($row2 = pg_fetch_row($resultado2)) {
    $nombre = $row2[0];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/banneranimado.gif">
    <link rel="stylesheet" href="styles/style_home.css">
    <title>Home</title>
</head>
<body>

    <div class="landing_container">
        <section class="info_user">
            <div class="title">
                <h1>Quiniela Qatar 2022</h1>
            </div>
            <div class="welcome">
                <p>Bienvenido <?php echo $nombre; ?> </p>
            </div>
            <div class="points">
                <p>Puntos actuales: <?php echo $punteo; ?></p>
            </div>
            <div class="buttons">
                <a href="calendar.php">Calendario</a>
                <a href="tables.php">Tabla</a>
                <a href="points.php">Puntos</a>
                <a href="login.html">Salir</a>
            </div>
        </section>
    </div>
    <div class="nombre_mascota">
        <h1>La'eeb</h1>
    </div>
    <div class="img_mascota">
        <img src="img/mascota.jpg">
    </div>
    <div class="description_mascota">
        <p>La FIFA dio a conocer que la mascota del Mundial de Qatar 2022 es La'eeb,
            que significa en árabe 'jugador habilidoso'. Tal y como explicó la FIFA,
            "La'ebb procede del metaverso de las mascotas, un universo paralelo que
            no se puede describir con palabras y cada uno puede imaginar como quiera.</p>
            <br>
    </div>
</body>
</html>