<?php
session_start();
$user = $_SESSION['username_input'];
$id_partido = $_GET['id'];
include('conexion.php');
$con = conexion();


$query = "SELECT * FROM quinielas.partidos WHERE id_partido= '$id_partido'";
$result = pg_query($con, $query);

while($mostrar = pg_fetch_row($result)){
    $fecha_partido = $mostrar['1'];
    $estadio = $mostrar['2'];
    $id_equipo1 = $mostrar['3'];
    $id_equipo2 = $mostrar['4'];
    $goles_final_equipo1 = $mostrar['5'];
    $goles_final_equipo2 = $mostrar['6'];
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
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Koulen&family=Macondo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style_vaticinio_result.css">
    <title>Vaticinio</title>
</head>
<body>
    <div class="car">
        <div class="info_partido">
            <div class="fecha">
                <p>Fecha/hora: <?php echo $fecha_partido?></p>
            </div>
            <div class="estadio">
                <p>Estadio: <?php
                if ($estadio == "lusail"){
                    $estadio_completo = "Iconico de Lusail";
                }
                else if ($estadio == "al_janoub"){
                    $estadio_completo = "Al Janoub";
                }
                else if ($estadio == "974"){
                    $estadio_completo = "974";
                }
                else if ($estadio == "al_thumama"){
                    $estadio_completo = "Al Thumama";
                }
                else if ($estadio == "khalifa"){
                    $estadio_completo = "Internacional Khalifa";
                }
                else if ($estadio == "educacion"){
                    $estadio_completo = "Ciudad de la Educacion";
                }
                else if ($estadio == "ahmed_bin_ali"){
                    $estadio_completo = "Ahmed bin Ali";
                }
                else if ($estadio == "al_bayt"){
                    $estadio_completo = "Al Bayt";
                }
                echo $estadio_completo?></p>
            </div>
            <div class="equipos">
                <div class="equipo1">
                    <p><?php echo $equipo1?></p>
                </div>
                <div class="equipo2">
                    <p><?php echo $equipo2?></p>
                </div>
                <div class="goles">
                    <label>Resultado Final</label>
                    <p><?php echo $goles_final_equipo1?> - <?php echo $goles_final_equipo2?></p>
                </div>

            </div>
        </div>
        <form method="post">
            <div class="section_vati">
                <?php
                $query3 = "SELECT * FROM quinielas.quiniela WHERE id_partido = '$id_partido'  AND user_login = '$user'";
                $result3 = pg_query($con, $query3);
                $g_resultado1="";
                $g_resultado2="";
                while($mostrar3 = pg_fetch_row($result3)) {
                    $g_resultado1 = $mostrar3['2'];
                    $g_resultado2 = $mostrar3['3'];
                }
                ?>
                <?php
                if(strlen($g_resultado1) == 0 && strlen($g_resultado2) == 0){
                    ?>
                    <input type="num"  name="goles_equipo1" readonly>
                    <input type="num"  name="goles_equipo2" readonly>
                    <?php
                }else{
                    ?>
                    <input type="num" placeholder="<?php echo $g_resultado1 ?>" name="goles_equipo1" readonly>
                    <input type="num" placeholder="<?php echo $g_resultado2 ?>" name="goles_equipo2" readonly>
                    <?php
                }
                ?>
            </div>
        </form>
        <div class="puntos_obtenidos">
            <?php
            if(strlen($g_resultado1) == 0 && strlen($g_resultado2) == 0 ) {
                echo "<p>Has ganado 0 puntos!</p>";
            }else if($g_resultado1 == $goles_final_equipo1 && $g_resultado2 == $goles_final_equipo2){
                echo "<p>Has ganado 6 puntos!</p>";
            }else if($goles_final_equipo1 > $goles_final_equipo2 && $g_resultado1 > $g_resultado2){
                echo "<p>Has ganado 3 puntos!</p>";
            }else if($goles_final_equipo2 > $goles_final_equipo1 && $g_resultado2 > $g_resultado1){
                echo "<p>Has ganado 3 puntos!</p>";
            }else if($goles_final_equipo1 == $goles_final_equipo2 && $g_resultado1 != $g_resultado2){
                echo "<p>Has ganado 0 puntos!</p>";
            }else if($goles_final_equipo1 != $goles_final_equipo2 && $g_resultado1 == $g_resultado2){
                echo "<p>Has ganado 0 puntos!</p>";
            }else if($goles_final_equipo1 == $goles_final_equipo2 && $g_resultado1 == $g_resultado2 ){
                if($goles_final_equipo1 > $g_resultado1 && $goles_final_equipo2 > $g_resultado2){
                    echo "<p>Has ganado 3 puntos!</p>";
                }else if($goles_final_equipo1 < $g_resultado1 && $goles_final_equipo2 < $g_resultado2){
                    echo "<p>Has ganado 3 puntos!</p>";
                }
            }

            ?>
        </div>
        <div class="boton_atras">
            <a href="calendar.php">Regresar</a>
        </div>
        </div>
    </div>
</body>
</html>