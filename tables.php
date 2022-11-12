

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
    <link rel="stylesheet" href="styles/style_tables.css">
    <title>Tabla</title>
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
            <h1>TABLA DE GRUPOS</h1>
        </div>
            <div class="table_date">
                    <?php
                        $consulta3 = "SELECT nombre,partidos_ganados,partidos_empatados,partidos_perdidos,goles_favor,goles_contra,goles_favor-goles_contra AS diferencia,puntos, id_grupo
                        FROM quinielas.equipos ORDER BY id_grupo, puntos DESC;";
                        $resultado3 = pg_query($con, $consulta3);
                        $cont = 0;
                        while($mostrar3 = pg_fetch_row($resultado3)) {
                            $nombre = $mostrar3['0'];
                            $partidos_ganados = $mostrar3['1'];
                            $partidos_empatados = $mostrar3['2'];
                            $partidos_perdidos = $mostrar3['3'];
                            $goles_favor = $mostrar3['4'];
                            $goles_contra = $mostrar3['5'];
                            $diferencia_puntos = $mostrar3['6'];
                            $puntos = $mostrar3['7'];
                            $grupo = $mostrar3['8'];
                            if($cont == 0) {
                                ?>
                                <h1>GRUPO <?php echo $grupo ?></h1>
                                <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>PG</th>
                                        <th>PE</th>
                                        <th>PP</th>
                                        <th>GF</th>
                                        <th>GC</th>
                                        <th>DP</th>
                                        <th>Puntos</th>
                                    </tr>
                                </thead>
                                <tr>
                        <td><?php echo $nombre?></td>
                        <td><?php echo $partidos_ganados?></td>
                        <td><?php echo $partidos_empatados?></td>
                        <td><?php echo $partidos_perdidos?></td>
                        <td><?php echo $goles_favor?></td>
                        <td><?php echo $goles_contra?></td>
                        <td><?php echo $diferencia_puntos?></td>
                        <td><?php echo $puntos?></td>
                    </tr>
                    <?php
                    }else{
                        ?>
                        <tr>
                        <td><?php echo $nombre?></td>
                        <td><?php echo $partidos_ganados?></td>
                        <td><?php echo $partidos_empatados?></td>
                        <td><?php echo $partidos_perdidos?></td>
                        <td><?php echo $goles_favor?></td>
                        <td><?php echo $goles_contra?></td>
                        <td><?php echo $diferencia_puntos?></td>
                        <td><?php echo $puntos?></td>
                    </tr>
                    <?php
                    }
                    $cont = $cont+1;
                    if($cont == 4){
                        ?>
                        </table>
                        <?php
                        $cont = 0;
                    }
                    ?>
                        <?php
                    }
                    ?>
            </div>
    </div>
</body>
</html>