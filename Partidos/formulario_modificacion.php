<html>
  <head>
     <title>
        Modificacion de Partidos
     </title>
  </head>
  <body>
     <form action="modificar_partidos.php" method="post">
     
<?php
   
   $id_partido = $_GET["id_partido"];
	$fecha_hora = "";
   $estadio = "";
   $equipo1 = "";
   $equipo2 = "";
   $goles_equipo1 = 0;
   $goles_equipo2 = 0;
   $amarillas_equipo1 = 0;
   $amarillas_equipo2 = 0;
   $rojas_equipo1 = 0;
   $rojas_equipo2 = 0;
   $fase = "";
   include('../conexion.php');
   $cn = conexion();
   $query = "SELECT P.id_partido, P.fecha_hora, P.estadio,P.fase_de_partido,P.goles_equipo1,P.goles_equipo2,P.tarjetasamarillas_equipo1,P.tarjetasamarillas_equipo2,P.tarjetasrojas_equipo1,P.tarjetasrojas_equipo2, E.nombre nombre1, E2.nombre nombre2
            from quinielas.partidos P
            INNER JOIN quinielas.equipos E ON E.id_equipo=P.id_equipo1
            INNER JOIN quinielas.equipos E2 ON E2.id_equipo=P.id_equipo2
            WHERE id_partido = $id_partido
            ORDER BY P.fecha_hora;";
	$result = pg_query($cn,"$query");
	while($row = pg_fetch_object($result))
	{
		$fecha_hora = $row->fecha_hora;
      $estadio = $row->estadio;
      $equipo1 = $row->nombre1;
      $equipo2 = $row->nombre2;
      $goles_equipo1 = $row->goles_equipo1;
      $goles_equipo2 = $row->goles_equipo2;
      $amarillas_equipo1 = $row->tarjetasamarillas_equipo1;
      $amarillas_equipo2 = $row->tarjetasamarillas_equipo2;
      $rojas_equipo1 = $row->tarjetasrojas_equipo1;
      $rojas_equipo2 = $row->tarjetasrojas_equipo2;
      $fase = $row->fase_de_partido;
	}
	
      echo"<input name=id_partido id=id_partido value=$id_partido hidden>";
	   echo "<b>Fecha y Hora del Partido:</b>\n";
      echo "<input type=datetime-local name=fecha value= '$fecha_hora' disabled><br>\n";
      echo"<label for=estadio><b>Estadio en el que se jugara el partido:</b></label>";
      echo"<select name=estadio id=estadio disabled>";

      if($estadio == "lusail"){
         echo "<option value=lusail selected>Estadio Iconico de Lusail</option>";
      }
      else{
         echo "<option value=lusail>Estadio Iconico de Lusail</option>";
      }

      if($estadio == "al_janoub"){
         echo "<option value=al_janoub selected>Estadio Al Janoub</option>";
      }
      else{
         echo "<option value=al_janoub>Estadio Al Janoub</option>";
      }

      if($estadio == "974"){
         echo "<option value=974 selected>Estadio 974</option>";
      }
      else{
         echo "<option value=974>Estadio 974</option>";
      }

      if($estadio == "al_thumama"){
         echo "<option value=al_thumama selected>Estadio Al Thumama</option>";
      }
      else{
         echo "<option value=al_thumama>Estadio Al Thumama</option>";
      }

      if($estadio == "khalifa"){
         echo "<option value=khalifa selected>Estadio Internacional Khalifa</option>";
      }
      else{
         echo "<option value=khalifa>Estadio Internacional Khalifa</option>";
      }

      if($estadio == "educacion"){
         echo "<option value=educacion selected>Estadio Ciudad de la Educacion</option>";
      }
      else{
         echo "<option value=educacion>Estadio Ciudad de la Educacion</option>";
      }

      if($estadio == "educacion"){
         echo "<option value=educacion selected>Estadio Ciudad de la Educacion</option>";
      }
      else{
         echo "<option value=educacion>Estadio Ciudad de la Educacion</option>";
      }

      if($estadio == "ahmed_bin_ali"){
         echo "<option value=ahmed_bin_ali selected>Estadio Ahmed bin Ali</option>";
      }
      else{
         echo "<option value=ahmed_bin_ali>Estadio Ahmed bin Ali</option>";
      }

      if($estadio == "al_bayt"){
         echo "<option value=al_bayt selected>Estadio Al Bayt</option>";
      }
      else{
         echo "<option value=al_bayt>Estadio Al Bayt</option>";
      }

      echo"</select><br>";

      $tiempo_actual = new DateTime();
      $tiempo_partido = new DateTime("$fecha_hora");

      if ($tiempo_actual > $tiempo_partido){

         echo"<b>Asignar Resultados del Partido</b>";

      echo "<table border=1>\n";

      echo "\t<tr>\n";
      echo "\t\t<th><b>Equipo 1</b></th>\n";
      echo "\t\t<th>Estadisticas</th>\n";
      echo "\t\t<th>Equipo 2</th>\n";
      echo "\t</tr>\n";

      echo "\t<tr>\n";
      echo "\t\t<th><b>$equipo1</b></th>\n";
      echo "\t\t<th>vs</th>\n";
      echo "\t\t<th>$equipo2</th>\n";
      echo "\t</tr>\n";

      echo "\t<tr>\n";
      if (is_null($goles_equipo1)){
         echo "\t\t<th>  <input type=number name=goles_equipo1></input>  </th>\n";
      }else{
         echo "\t\t<th>  <input type=number name=goles_equipo1 value=$goles_equipo1 disabled></input>  </th>\n";
      }


      echo "\t\t<th>Goles</th>\n";
      if (is_null($goles_equipo2)){
         echo "\t\t<th>  <input type=number name=goles_equipo2></input>  </th>\n";
      }else{
         echo "\t\t<th>  <input type=number name=goles_equipo2 value=$goles_equipo2 disabled></input>  </th>\n";
      }
      echo "\t</tr>\n";

      echo "\t<tr>\n";
      if (is_null($goles_equipo1) || is_null($goles_equipo2)){
         echo "\t\t<th>  <input type=number name=TA_equipo1 value=$amarillas_equipo1></input>  </th>\n";   
      }
      else{
         echo "\t\t<th>  <input type=number name=TA_equipo1 value=$amarillas_equipo1 disabled></input>  </th>\n";   
      }
      
      echo "\t\t<th>Tarjetas Amarillas</th>\n";
      if (is_null($goles_equipo1) || is_null($goles_equipo2)){
         echo "\t\t<th>  <input type=number name=TA_equipo2 value=$amarillas_equipo2></input>  </th>\n";   
      }
      else{
         echo "\t\t<th>  <input type=number name=TA_equipo2 value=$amarillas_equipo2 disabled></input>  </th>\n";   
      }
      echo "\t</tr>\n";

      echo "\t<tr>\n";
      if (is_null($goles_equipo1) || is_null($goles_equipo2)){
         echo "\t\t<th>  <input type=number name=TR_equipo1 value=$rojas_equipo1></input>  </th>\n";   
      }
      else{
         echo "\t\t<th>  <input type=number name=TR_equipo1 value=$rojas_equipo1 disabled></input>  </th>\n";   
      }
      echo "\t\t<th>Tarjetas Rojas</th>\n";
      if (is_null($goles_equipo1) || is_null($goles_equipo2)){
         echo "\t\t<th>  <input type=number name=TR_equipo2 value=$rojas_equipo2></input>  </th>\n";   
      }
      else{
         echo "\t\t<th>  <input type=number name=TR_equipo2 value=$rojas_equipo2 disabled></input>  </th>\n";   
      }
      echo "\t</tr>\n";

      if ($fase != "Grupos"){
         echo "\t<tr>\n";
         echo "\t\t<th>  <input type=number name=Penales1></input>  </th>\n";
         echo "\t\t<th>Goles de penal <br> (Solo si hay empate)</th>\n";
         echo "\t\t<th>   <input type=number name=Penales2></input>    </th>\n";
         echo "\t</tr>\n";
      }

      echo"</table>";

      if (is_null($goles_equipo1) || is_null($goles_equipo2)){
      echo"<br><input type=submit name=submit value=enviar><br>";
      }

      $query = "SELECT U.nombre, U.user_login, goles_equipo1, goles_equipo2
      FROM quinielas.quiniela Q
      INNER JOIN quinielas.usuarios U ON Q.user_login = U.user_login
      WHERE Q.id_partido = $id_partido";
      
      $result = pg_query($cn,"$query");
	   if (pg_num_rows($result) == 0) {
         echo"<br><b>No hay ningun usuario participando en la quiniela de este partido</b>";
      } else{
         echo"<br>";
         echo "<table border=1>\n";
         echo "\t<tr>\n";
         echo "\t\t<th><b>Nombre del participante</b></th>\n";
         echo "\t\t<th>Pronostico del partido</th>\n";
         echo "\t</tr>\n";
         while($row = pg_fetch_object($result)){
            echo "\t<tr>\n";
            echo "\t\t<td><b>$row->nombre</b></td>\n";
            echo "\t\t<td><center>$row->goles_equipo1 - $row->goles_equipo2</center></td>\n";
            echo "\t</tr>\n";
         }
         echo"</table>";

         
      }



      }else{
         echo"<br>";
         echo"<b>Los resultados unicamente pueden ser ingresados luego de que el partido haya finalizado.</b>";
         echo"<br>";
      }
      pg_close($cn);
   
?>
      

      


      

           
     </form>
     <center>
         <a href="listado_partidos.php">regresar</a>
     </center>
  </body>
</html>
