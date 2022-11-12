

<?php
$grupo = $_GET['grupo'];
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
    <link rel="stylesheet" href="styles/style_calendar.css">
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
                <a href="home.php">Inicio</a>
                <a href="tables.php">Tabla</a>
                <a href="points.php">Puntos</a>
                <a href="login.html">Salir</a>
            </div>
        </section>
    </div>
    <div class="container_bottom">
        <div class="titlebuttom">
            <h1>CALENDARIO</h1>
        </div>
        <div class="container_links">
            <a href="calendar.php">Todos los partidos</a>
            <a href="print_groups.php?grupo=A">A</a>
            <a href="print_groups.php?grupo=B">B</a>
            <a href="print_groups.php?grupo=C">C</a>
            <a href="print_groups.php?grupo=D">D</a>
            <a href="print_groups.php?grupo=E">E</a>
            <a href="print_groups.php?grupo=F">F</a>
            <a href="print_groups.php?grupo=G">G</a>
            <a href="print_groups.php?grupo=H">H</a>
            <a href="print_groups.php?grupo=Octavos">Octavos</a>
            <a href="print_groups.php?grupo=Cuartos">Cuartos</a>
            <a href="print_groups.php?grupo=Semifinales">Semifinales</a>
            <a href="print_groups.php?grupo=Finales">Finales</a>
        </div>
        <form method="post">

            <div class="table_date">
                <table>
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Estadio</th>
                            <th>Equipo 1</th>
                            <th>Resultado</th>
                            <th>Equipo 2</th>
                        </tr>
                    </thead>
                    <?php
                    if($grupo == "Octavos"){
                        $query = "SELECT P.id_partido, P.fecha_hora, P.estadio, P.id_equipo1, P.id_equipo2, P.goles_equipo1, P.goles_equipo2
                    FROM quinielas.partidos P
                    INNER JOIN quinielas.equipos E ON E.id_equipo = P.id_equipo1
                    WHERE P.fase_de_partido = '$grupo'";
                    $result = pg_query($con, $query);

                    }else if($grupo == "Cuartos"){
                        $query = "SELECT P.id_partido, P.fecha_hora, P.estadio, P.id_equipo1, P.id_equipo2, P.goles_equipo1, P.goles_equipo2
                    FROM quinielas.partidos P
                    INNER JOIN quinielas.equipos E ON E.id_equipo = P.id_equipo1
                    WHERE P.fase_de_partido = '$grupo'";
                    $result = pg_query($con, $query);

                    }else if($grupo == "Semifinales"){
                        $query = "SELECT P.id_partido, P.fecha_hora, P.estadio, P.id_equipo1, P.id_equipo2, P.goles_equipo1, P.goles_equipo2
                    FROM quinielas.partidos P
                    INNER JOIN quinielas.equipos E ON E.id_equipo = P.id_equipo1
                    WHERE P.fase_de_partido = '$grupo'";
                    $result = pg_query($con, $query);

                    }else if($grupo == "Finales"){
                        $query = "SELECT P.id_partido, P.fecha_hora, P.estadio, P.id_equipo1, P.id_equipo2, P.goles_equipo1, P.goles_equipo2
                    FROM quinielas.partidos P
                    INNER JOIN quinielas.equipos E ON E.id_equipo = P.id_equipo1
                    WHERE P.fase_de_partido = '$grupo'";
                    $result = pg_query($con, $query);

                    }else if(!empty($grupo)){
                        $query = "SELECT P.id_partido, P.fecha_hora, P.estadio, P.id_equipo1, P.id_equipo2, P.goles_equipo1, P.goles_equipo2
                        FROM quinielas.partidos P
                        INNER JOIN quinielas.equipos E ON E.id_equipo = P.id_equipo1
                        WHERE P.fase_de_partido = 'Grupos' AND E.id_grupo='$grupo'";
                        $result = pg_query($con, $query);
                    }

                    while($mostrar = pg_fetch_row($result)) {
                        $id_partido = $mostrar['0'];
                        $fecha_partido = $mostrar['1'];
                        $estadio = $mostrar['2'];
                        $id_equipo1 = $mostrar['3'];
                        $id_equipo2 = $mostrar['4'];
                        $query2 = "SELECT nombre FROM quinielas.equipos WHERE id_equipo = '$id_equipo1'  OR id_equipo = '$id_equipo2'";
                        $result2 = pg_query($con, $query2);
                        $cont = 0;
                        $equipo2 = "";
                        while($mostrar2 = pg_fetch_row($result2)) {
                            if($cont == 0) {
                                $equipo1 = $mostrar2[0];
                            }else {
                                $equipo2 = $mostrar2[0];
                            }
                            $cont = $cont + 1;
                        }
                    ?>
                    <tr>
                        <td><?php echo $fecha_partido?></td>
                        <td><?php
                            if ($estadio == "lusail"){
                                $estadio_completo = "Estadio Iconico de Lusail";
                            }
                            else if ($estadio == "al_janoub"){
                                $estadio_completo = "Estadio Al Janoub";
                            }
                            else if ($estadio == "974"){
                                $estadio_completo = "Estadio 974";
                            }
                            else if ($estadio == "al_thumama"){
                                $estadio_completo = "Estadio Al Thumama";
                            }
                            else if ($estadio == "khalifa"){
                                $estadio_completo = "Estadio Internacional Khalifa";
                            }
                            else if ($estadio == "educacion"){
                                $estadio_completo = "Estadio Ciudad de la Educacion";
                            }
                            else if ($estadio == "ahmed_bin_ali"){
                                $estadio_completo = "Estadio Ahmed bin Ali";
                            }
                            else if ($estadio == "al_bayt"){
                                $estadio_completo = "Estadio Al Bayt";
                            }
                        echo $estadio_completo
                        ?></td>
                        <td><?php echo $equipo1?></td>
                        <td>
                            <?php echo $mostrar['5']?><?php echo " - ".$mostrar['6']?></td>
                        <td><?php echo $equipo2?></td>
                        <td>
                            <?php
                            $tiempo_actual = new DateTime();
                            $tiempo_partido = new DateTime($fecha_partido);

                            if($tiempo_actual < $tiempo_partido) {
                                ?>
                                <div class="button">
                                    <a name="botton_submit" href="vaticinio.php?id=<?php echo $mostrar['0'] ?>">Participar</a>
                                </div>
                                <?php
                            }else{
                                ?>
                                <div class="button2">
                                    <a name="botton_submit2" href="vaticinio_result.php?id=<?php echo $mostrar['0'] ?>">Ver mi Respuesta </a>
                                </div>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </form>
    </div>
</body>
</html>