

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Koulen&family=Macondo&display=swap" rel="stylesheet">
    <link rel="icon" href="img/banneranimado.gif">
    <link rel="stylesheet" href="styles/style_points.css">
    <title>Puntos</title>
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
                <a href="home.php">Inicio</a>
                <a href="calendar.php">Calendario</a>
                <a href="tables.php">Tabla</a>
                <a href="points.php">Puntos</a>
                <a href="login.html">Salir</a>
            </div>
        </section>
    </div>
    <div class="container_bottom">
        <div class="titlebuttom">
            <h1>PUNTOS</h1>
        </div>
            <div class="table_date">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Puntos</th>
                        </tr>
                    </thead>
                    <?php
                        $consulta3 = "SELECT nombre, punteo FROM quinielas.usuarios WHERE administrador = false";
                        $resultado3 = pg_query($con, $consulta3);
                        $cont = 0;
                        while($mostrar3 = pg_fetch_row($resultado3)) {
                            $nombre = $mostrar3['0'];
                            $puntos = $mostrar3['1'];
                        ?>
                        <tr>
                        <td><?php echo $nombre?></td>
                        <td><?php echo $puntos?></td>
                    </tr>
                    <?php
                    }
                    ?>
            </div>
    </div>
</body>
</html>