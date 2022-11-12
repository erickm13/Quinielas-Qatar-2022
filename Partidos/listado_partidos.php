<html>
  <head>
     <title>
        Listado de Partidos
     </title>
  </head>
  <body>

   
<?php

include('../conexion.php');
$cn = conexion();

$query = "SELECT P.id_partido, P.fecha_hora, P.estadio, P.id_equipo1, P.id_equipo2, P.fase_de_partido, E.nombre nombre1, E2.nombre nombre2, P.goles_equipo1, P.goles_equipo2
from quinielas.partidos P
INNER JOIN quinielas.equipos E ON E.id_equipo=P.id_equipo1
INNER JOIN quinielas.equipos E2 ON E2.id_equipo=P.id_equipo2
ORDER BY P.fecha_hora;";

$result = pg_query($cn,$query);

	


if(pg_num_rows($result) == 0){
   echo "No hay partidos registrados en la base de datos, proceda a ingresar un partido<br>";
   echo "<a href=formulario_partidos.php>Ingresar un partido nuevo</a>";
}
else{
$id_partido=0;
$fecha_hora="";
$estadio="";
$estadio_completo="";
$fase_de_partido="";
$equipo1="";
$equipo2="";
$goles_equipo1 = NULL;
$goles_equipo2 = NULL;

echo "<table border=1>\n";
echo "\t<tr>\n";
echo "\t\t<th><b>Fecha y Hora del Partido</b></th>\n";
echo "\t\t<th>Estadio del Partido</th>\n";
echo "\t\t<th>Fase del Partido</th>\n";
echo "\t\t<th>Equipos que se enfrentan</th>\n";
echo "\t\t<th>Asignar<br>resultados</th>\n";
echo "\t</tr>\n";

while ($row = pg_fetch_object($result)) {
   $id_partido = $row->id_partido;
   $fecha_hora=$row->fecha_hora;
   $estadio=$row->estadio;
   $fase_de_partido = $row->fase_de_partido;
   $equipo1 = $row->nombre1;
   $equipo2 = $row->nombre2;

   if (!is_null($row->goles_equipo1)){
      $goles_equipo1 = $row->goles_equipo1;
   }

   if (!is_null($row->goles_equipo2)){
      $goles_equipo2 = $row->goles_equipo2;
   }

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

   echo "\t<tr>\n";
   echo "\t\t<td><center>$fecha_hora</center></td>\n";
   echo "\t\t<td><center>$estadio_completo</center></td>\n";
   echo "\t\t<td><center>$fase_de_partido</center></td>\n";

   if (!is_null($goles_equipo1) && !is_null($goles_equipo2)){
      echo "\t\t<th>$equipo1 vs $equipo2<br>$goles_equipo1 - $goles_equipo2</th>\n";
   }else{
      echo "\t\t<th>$equipo1 vs $equipo2</th>\n";
   }

   $goles_equipo1 = NULL;
   $goles_equipo2 = NULL;
   
   
   echo "\t\t<td><a href=formulario_modificacion.php?id_partido=$id_partido> &nbsp; <img src=icon-edit.jpg></a></td>\n";
   echo "\t</tr>\n";
}
echo "</table>\n";
}

pg_close($cn);


?>




     <center>
         <a href="administrar_partidos.html">Regresar </a>
     </center>
  </body>
</html>
