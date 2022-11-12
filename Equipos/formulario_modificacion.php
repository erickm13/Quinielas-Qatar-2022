<html>
  <head>
     <title>
        Modificacion de Equipos
     </title>
  </head>
  <body>
     <form action="modificar_equipos.php" method="post">
        <?php
         $id_equipo = $_GET["id_equipo"];
         
         include('../conexion.php');
         $cn = conexion();

         $query = "SELECT nombre, id_grupo FROM quinielas.equipos WHERE id_equipo = $id_equipo";
         $result = pg_query($cn,$query);
         $nombre="";

         while ($row = pg_fetch_object($result)) {
            $nombre=$row->nombre;
            echo "<input type=hidden name=id_equipo value=$id_equipo>\n";
       echo"<b>Nombre del Equipo:</b>";
       echo"<input type=text name=nombre maxlength=50 size = 55 value = '",$nombre,"'><br>";

       echo"<b>Grupo al que sera asignado: $row->id_grupo</b></label>";
         }
       
       pg_close($cn);
       ?>
       <br>
       <input type="submit" name="submit" value="enviar">     
     </form>
     <center>
        <a href="listado_equipos.php">Regresar</a>
     </center>
  </body>
</html>

