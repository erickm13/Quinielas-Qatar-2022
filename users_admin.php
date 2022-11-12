<?php
include('conexion.php');
$con = conexion();

$query = "SELECT * FROM quinielas.usuarios WHERE administrador = 'false'";
$consulta = pg_query($con, $query);

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
    <title>Puntos</title>
</head>
<body>

    <div class="landing_container">
        <section class="info_user">
            <div class="title">
                <h1>Participantes</h1>
            </div>
            <div class="regresar">
                <a href="admin.php">Regresar</a>
            </div>
        </section>
    </div>
    <div class="container_bottom">
            <div class="table_date">
                <form method="post">
                    <table border="3">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Puntos</th>
                            </tr>
                        </thead>
                        <?php
                            $consulta3 = "SELECT user_login, nombre, punteo FROM quinielas.usuarios WHERE administrador = false ORDER BY punteo DESC";
                            $resultado3 = pg_query($con, $consulta3);
                            while($mostrar3 = pg_fetch_row($resultado3)) {
                                $user_login = $mostrar3['0'];
                                $nombre = $mostrar3['1'];
                                $puntos = $mostrar3['2'];
                            ?>
                            <tr>
                            <td><?php echo $nombre?></td>
                            <td><?php echo $puntos?></td>
                            <td><a name="botton_submit" href="modif_users_for_admin.php?usuario=<?php echo $user_login ?>">Eliminar</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                        </table>
                </form>
            </div>
    </div>
</body>
</html>