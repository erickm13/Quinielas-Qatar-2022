<html>
  <head>
     <title>
        Listado de Equipos
     </title>
  </head>
  <body>

   
<?php

include('../conexion.php');
$cn = conexion();

$query = "SELECT id_equipo,nombre,id_grupo
from quinielas.equipos
ORDER BY id_grupo,nombre;";

$result = pg_query($cn,$query);


if(pg_num_rows($result) == 0){
   echo "No hay equipos registrados en la base de datos, proceda a ingresar un equipo<br>";
   echo "<a href=formulario_equipos.html>Ingresar un equipo nuevo</a>";
}
else{
$id_equipo=0;
$nombre="";
$id_grupo="";

echo "<table border=1>\n";
echo "\t<tr>\n";
echo "\t\t<th><b>Nombre del Equipo</b></th>\n";
echo "\t\t<th>Grupo al que pertenece</th>\n";
echo "\t\t<th>Modificar equipo</th>\n";
echo "\t</tr>\n";

while ($row = pg_fetch_object($result)) {
   $id_equipo = $row->id_equipo;
   $nombre=$row->nombre;
   $id_grupo=$row->id_grupo;



   echo "\t<tr>\n";
   echo "\t\t<td><center>$nombre</center></td>\n";
   echo "\t\t<td><center>$id_grupo</center></td>\n";

   echo "\t\t<td><a href=formulario_modificacion.php?id_equipo=$id_equipo><center><img src=icon-edit.jpg></center></a></td>\n";
   echo "\t</tr>\n";
}
echo "</table>\n";
}

pg_close($cn);


?>




     <center>
         <a href="administrar_equipos.html">Regresar </a>
     </center>
  </body>
</html>
