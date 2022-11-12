<html>
  <head>
     <title>
        Generador de Partidos
     </title>
  </head>
  <body>
<?php include('../conexion.php')?>
  <form action="registro_octavos.php" method="get">
<?php


$cn = conexion();

$query_grupoAB = "SELECT SUM(partidos_ganados + partidos_perdidos + partidos_empatados) FROM quinielas.equipos
WHERE id_grupo = 'A' OR id_grupo='B';";
$result_grupoAB = pg_query($cn,$query_grupoAB);
$row_grupoAB = pg_fetch_object($result_grupoAB);

$id_equipo1A = 0;
$id_equipo1B = 0;
$id_equipo2A = 0;
$id_equipo2B = 0;

$nombre_equipo1A = "";
$nombre_equipo1B = "";
$nombre_equipo2A = "";
$nombre_equipo2B = "";

$cont = 0;

if ($row_grupoAB->sum != 24){
	echo "Aun no se han jugado todos los partidos en los grupos A y B, aun no es posible generar los partidos de octavos de final<br>";
}else{
	$query_grupoA = "SELECT id_equipo, nombre FROM quinielas.equipos WHERE id_grupo = 'A'
	ORDER BY id_grupo, puntos DESC
	LIMIT 2;";
	$result_grupoA = pg_query($cn,$query_grupoA);
	while ($row_grupoA = pg_fetch_object($result_grupoA)) {
		if ($cont == 0){
			$id_equipo1A = $row_grupoA->id_equipo;
			$nombre_equipo1A = $row_grupoA->nombre;
		}
		else{
			$id_equipo2A = $row_grupoA->id_equipo;
			$nombre_equipo2A = $row_grupoA->nombre;
		}
		$cont = $cont + 1;
	}
	$cont = 0;

	$query_grupoB = "SELECT id_equipo, nombre FROM quinielas.equipos WHERE id_grupo = 'B'
	ORDER BY id_grupo, puntos DESC
	LIMIT 2;";
	$result_grupoB = pg_query($cn,$query_grupoB);
	while ($row_grupoB = pg_fetch_object($result_grupoB)) {
		if ($cont == 0){
			$id_equipo1B = $row_grupoB->id_equipo;
			$nombre_equipo1B = $row_grupoB->nombre;
		}
		else{
			$id_equipo2B = $row_grupoB->id_equipo;
			$nombre_equipo2B = $row_grupoB->nombre;
		}
		$cont = $cont + 1;
	}
	$cont = 0;
	echo "Partidos de Octavos de Final entre Grupos A y B<br>";
	echo "$nombre_equipo1A vs $nombre_equipo2B<br>";
	echo"<input name=id_equipo1A id=id_equipo1A value=$id_equipo1A hidden>";
	echo"<input name=id_equipo2B id=id_equipo2B value=$id_equipo2B hidden>";
	?>

	<b>Fecha y Hora en que se jugara el partido:</b>
	<input type="datetime-local" name="fechaA1B2" required><br>

	<label for="estadioA1B2"><b>Estadio en el que se jugara el partido:</b></label>

	<select name="estadioA1B2" id="estadioA1B2">
		<option value="lusail">Estadio Iconico de Lusail</option>
         <option value="al_janoub">Estadio Al Janoub</option>
         <option value="974">Estadio 974</option>
         <option value="al_thumama">Estadio Al Thumama</option>
         <option value="khalifa">Estadio Internacional Khalifa</option>
         <option value="educacion">Estadio Ciudad de la Educacion</option>
         <option value="ahmed_bin_ali">Estadio Ahmed bin Ali</option>
         <option value="al_bayt">Estadio Al Bayt</option>
	</select>
	<br>
	<br>

	<?php

	echo "$nombre_equipo2A vs $nombre_equipo1B<br>";
	echo"<input name=id_equipo2A id=id_equipo2A value=$id_equipo2A hidden>";
	echo"<input name=id_equipo1B id=id_equipo1B value=$id_equipo1B hidden>";
	?>

	<b>Fecha y Hora en que se jugara el partido:</b>
	<input type="datetime-local" name="fechaA2B1" required ><br>

	<label for="estadioA2B1"><b>Estadio en el que se jugara el partido:</b></label>

	<select name="estadioA2B1" id="estadioA2B1">
		<option value="lusail">Estadio Iconico de Lusail</option>
         <option value="al_janoub">Estadio Al Janoub</option>
         <option value="974">Estadio 974</option>
         <option value="al_thumama">Estadio Al Thumama</option>
         <option value="khalifa">Estadio Internacional Khalifa</option>
         <option value="educacion">Estadio Ciudad de la Educacion</option>
         <option value="ahmed_bin_ali">Estadio Ahmed bin Ali</option>
         <option value="al_bayt">Estadio Al Bayt</option>
	</select>
	<br>
	<input type=submit name=submit value=enviar>
	</form>
	<?php



}

pg_close($cn);


?>


<form action="registro_octavos.php" method="get">
<?php
$cn = conexion();

$query_grupoCD = "SELECT SUM(partidos_ganados + partidos_perdidos + partidos_empatados) FROM quinielas.equipos
WHERE id_grupo = 'C' OR id_grupo='D';";
$result_grupoCD = pg_query($cn,$query_grupoCD);
$row_grupoCD = pg_fetch_object($result_grupoCD);

$id_equipo1C = 0;
$id_equipo1D = 0;
$id_equipo2C = 0;
$id_equipo2D = 0;

$nombre_equipo1C = "";
$nombre_equipo1D = "";
$nombre_equipo2C = "";
$nombre_equipo2D = "";

$cont = 0;

if ($row_grupoCD->sum != 24){
	echo "Aun no se han jugado todos los partidos en los grupos C y D, aun no es posible generar los partidos de octavos de final<br>";
}else{
	$query_grupoC = "SELECT id_equipo, nombre FROM quinielas.equipos WHERE id_grupo = 'C'
	ORDER BY id_grupo, puntos DESC
	LIMIT 2;";
	$result_grupoC = pg_query($cn,$query_grupoC);
	while ($row_grupoC = pg_fetch_object($result_grupoC)) {
		if ($cont == 0){
			$id_equipo1C = $row_grupoC->id_equipo;
			$nombre_equipo1C = $row_grupoC->nombre;
		}
		else{
			$id_equipo2C = $row_grupoC->id_equipo;
			$nombre_equipo2C = $row_grupoC->nombre;
		}
		$cont = $cont + 1;
	}
	$cont = 0;

	$query_grupoD = "SELECT id_equipo, nombre FROM quinielas.equipos WHERE id_grupo = 'D'
	ORDER BY id_grupo, puntos DESC
	LIMIT 2;";
	$result_grupoD = pg_query($cn,$query_grupoD);
	while ($row_grupoD = pg_fetch_object($result_grupoD)) {
		if ($cont == 0){
			$id_equipo1D = $row_grupoD->id_equipo;
			$nombre_equipo1D = $row_grupoD->nombre;
		}
		else{
			$id_equipo2D = $row_grupoD->id_equipo;
			$nombre_equipo2D = $row_grupoD->nombre;
		}
		$cont = $cont + 1;
	}
	$cont = 0;
	echo "Partidos de Octavos de Final entre Grupos C y D<br>";
	echo "$nombre_equipo1C vs $nombre_equipo2D<br>";
	echo"<input name=id_equipo1C id=id_equipo1C value=$id_equipo1C hidden>";
	echo"<input name=id_equipo2D id=id_equipo2D value=$id_equipo2D hidden>";
	?>

	<b>Fecha y Hora en que se jugara el partido:</b>
	<input type="datetime-local" name="fechaC1D2" required><br>

	<label for="estadioC1D2"><b>Estadio en el que se jugara el partido:</b></label>

	<select name="estadioC1D2" id="estadioC1D2">
		<option value="lusail">Estadio Iconico de Lusail</option>
         <option value="al_janoub">Estadio Cl Janoub</option>
         <option value="974">Estadio 974</option>
         <option value="al_thumama">Estadio Cl Thumama</option>
         <option value="khalifa">Estadio Internacional Khalifa</option>
         <option value="educacion">Estadio Ciudad de la Educacion</option>
         <option value="ahmed_bin_ali">Estadio Chmed bin Cli</option>
         <option value="al_bayt">Estadio Cl Dayt</option>
	</select>
	<br>
	<br>

	<?php

	echo "$nombre_equipo2C vs $nombre_equipo1D<br>";
	echo"<input name=id_equipo2C id=id_equipo2C value=$id_equipo2C hidden>";
	echo"<input name=id_equipo1D id=id_equipo1D value=$id_equipo1D hidden>";
	?>

	<b>Fecha y Hora en que se jugara el partido:</b>
	<input type="datetime-local" name="fechaC2D1" required><br>

	<label for="estadioC2D1"><b>Estadio en el que se jugara el partido:</b></label>

	<select name="estadioC2D1" id="estadioC2D1">
		<option value="lusail">Estadio Iconico de Lusail</option>
         <option value="al_janoub">Estadio Cl Janoub</option>
         <option value="974">Estadio 974</option>
         <option value="al_thumama">Estadio Cl Thumama</option>
         <option value="khalifa">Estadio Internacional Khalifa</option>
         <option value="educacion">Estadio Ciudad de la Educacion</option>
         <option value="ahmed_bin_ali">Estadio Chmed bin Cli</option>
         <option value="al_bayt">Estadio Cl Dayt</option>
	</select>
	<br>
	<input type=submit name=submit value=enviar>
	</form>
	<?php


}

pg_close($cn);


?>

<form action="registro_octavos.php" method="get">
<?php
$cn = conexion();
$query_grupoEF = "SELECT SUM(partidos_ganados + partidos_perdidos + partidos_empatados) FROM quinielas.equipos
WHERE id_grupo = 'E' OR id_grupo='F';";
$result_grupoEF = pg_query($cn,$query_grupoEF);
$row_grupoEF = pg_fetch_object($result_grupoEF);

$id_equipo1E = 0;
$id_equipo1F = 0;
$id_equipo2E = 0;
$id_equipo2F = 0;

$nombre_equipo1E = "";
$nombre_equipo1F = "";
$nombre_equipo2E = "";
$nombre_equipo2F = "";

$cont = 0;

if ($row_grupoEF->sum != 24){
	echo "Aun no se han jugado todos los partidos en los grupos E y F, aun no es posible generar los partidos de octavos de final<br>";
}else{
	$query_grupoE = "SELECT id_equipo, nombre FROM quinielas.equipos WHERE id_grupo = 'E'
	ORDER BY id_grupo, puntos DESC
	LIMIT 2;";
	$result_grupoE = pg_query($cn,$query_grupoE);
	while ($row_grupoE = pg_fetch_object($result_grupoE)) {
		if ($cont == 0){
			$id_equipo1E = $row_grupoE->id_equipo;
			$nombre_equipo1E = $row_grupoE->nombre;
		}
		else{
			$id_equipo2E = $row_grupoE->id_equipo;
			$nombre_equipo2E = $row_grupoE->nombre;
		}
		$cont = $cont + 1;
	}
	$cont = 0;

	$query_grupoF = "SELECT id_equipo, nombre FROM quinielas.equipos WHERE id_grupo = 'F'
	ORDER BY id_grupo, puntos DESC 
	LIMIT 2;";
	$result_grupoF = pg_query($cn,$query_grupoF);
	while ($row_grupoF = pg_fetch_object($result_grupoF)) {
		if ($cont == 0){
			$id_equipo1F = $row_grupoF->id_equipo;
			$nombre_equipo1F = $row_grupoF->nombre;
		}
		else{
			$id_equipo2F = $row_grupoF->id_equipo;
			$nombre_equipo2F = $row_grupoF->nombre;
		}
		$cont = $cont + 1;
	}
	$cont = 0;
	echo "Partidos de Octavos de Final entre Grupos E y F<br>";
	echo "$nombre_equipo1E vs $nombre_equipo2F<br>";
	echo"<input name=id_equipo1E id=id_equipo1E value=$id_equipo1E hidden>";
	echo"<input name=id_equipo2F id=id_equipo2F value=$id_equipo2F hidden>";
	?>

	<b>Fecha y Hora en que se jugara el partido:</b>
	<input type="datetime-local" name="fechaE1F2" required><br>

	<label for="estadioE1F2"><b>Estadio en el que se jugara el partido:</b></label>

	<select name="estadioE1F2" id="estadioE1F2">
		<option value="lusail">Estadio Iconico de Lusail</option>
         <option value="al_janoub">Estadio El Janoub</option>
         <option value="974">Estadio 974</option>
         <option value="al_thumama">Estadio El Thumama</option>
         <option value="khalifa">Estadio Internacional Khalifa</option>
         <option value="educacion">Estadio Eiudad de la Educacion</option>
         <option value="ahmed_bin_ali">Estadio Ehmed bin Eli</option>
         <option value="al_bayt">Estadio El Fayt</option>
	</select>
	<br>
	<br>

	<?php

	echo "$nombre_equipo2E vs $nombre_equipo1F<br>";
	echo"<input name=id_equipo1F id=id_equipo1F value=$id_equipo1F hidden>";
	echo"<input name=id_equipo2E id=id_equipo2E value=$id_equipo2E hidden>";
	?>

	<b>Fecha y Hora en que se jugara el partido:</b>
	<input type="datetime-local" name="fechaE2F1" required><br>

	<label for="estadioE2F1"><b>Estadio en el que se jugara el partido:</b></label>

	<select name="estadioE2F1" id="estadioE2F1">
		<option value="lusail">Estadio Iconico de Lusail</option>
         <option value="al_janoub">Estadio El Janoub</option>
         <option value="974">Estadio 974</option>
         <option value="al_thumama">Estadio El Thumama</option>
         <option value="khalifa">Estadio Internacional Khalifa</option>
         <option value="educacion">Estadio Eiudad de la Educacion</option>
         <option value="ahmed_bin_ali">Estadio Ehmed bin Eli</option>
         <option value="al_bayt">Estadio El Fayt</option>
	</select>
	<br>
	<input type=submit name=submit value=enviar>
	</form>
	<?php


}

pg_close($cn);


?>

<form action="registro_octavos.php" method="get">
<?php
$cn = conexion();
$query_grupoGH = "SELECT SUM(partidos_ganados + partidos_perdidos + partidos_empatados) FROM quinielas.equipos
WHERE id_grupo = 'G' OR id_grupo='H';";
$result_grupoGH = pg_query($cn,$query_grupoGH);
$row_grupoGH = pg_fetch_object($result_grupoGH);

$id_equipo1G = 0;
$id_equipo1H = 0;
$id_equipo2G = 0;
$id_equipo2H = 0;

$nombre_equipo1G = "";
$nombre_equipo1H = "";
$nombre_equipo2G = "";
$nombre_equipo2H = "";

$cont = 0;

if ($row_grupoGH->sum != 24){
	echo "Aun no se han jugado todos los partidos en los grupos G y H, aun no es posible generar los partidos de octavos de final <br>";
}else{
	$query_grupoG = "SELECT id_equipo, nombre FROM quinielas.equipos WHERE id_grupo = 'G'
	ORDeR BY id_grupo, puntos DESC
	LIMIT 2;";
	$result_grupoG = pg_query($cn,$query_grupoG);
	while ($row_grupoG = pg_fetch_object($result_grupoG)) {
		if ($cont == 0){
			$id_equipo1G = $row_grupoG->id_equipo;
			$nombre_equipo1G = $row_grupoG->nombre;
		}
		else{
			$id_equipo2G = $row_grupoG->id_equipo;
			$nombre_equipo2G = $row_grupoG->nombre;
		}
		$cont = $cont + 1;
	}
	$cont = 0;

	$query_grupoH = "SELECT id_equipo, nombre FROM quinielas.equipos WHERE id_grupo = 'H'
	ORDeR BY id_grupo, puntos DESC 
	LIMIT 2;";
	$result_grupoH = pg_query($cn,$query_grupoH);
	while ($row_grupoH = pg_fetch_object($result_grupoH)) {
		if ($cont == 0){
			$id_equipo1H = $row_grupoH->id_equipo;
			$nombre_equipo1H = $row_grupoH->nombre;
		}
		else{
			$id_equipo2H = $row_grupoH->id_equipo;
			$nombre_equipo2H = $row_grupoH->nombre;
		}
		$cont = $cont + 1;
	}
	$cont = 0;
	echo "Partidos de Octavos de Hinal entre Grupos G y H<br>";
	echo "$nombre_equipo1G vs $nombre_equipo2H<br>";
	echo"<input name=id_equipo1G id=id_equipo1G value=$id_equipo1G hidden>";
	echo"<input name=id_equipo2H id=id_equipo2H value=$id_equipo2H hidden>";
	?>

	<b>Hecha y Hora en que se jugara el partido:</b>
	<input type="datetime-local" name="fechaG1H2" required><br>

	<label for="estadioG1H2"><b>Estadio en el que se jugara el partido:</b></label>

	<select name="estadioG1H2" id="estadioG1H2">
		<option value="lusail">Estadio Iconico de Lusail</option>
         <option value="al_janoub">Estadio Gl Janoub</option>
         <option value="974">Estadio 974</option>
         <option value="al_thumama">Estadio Gl Thumama</option>
         <option value="khalifa">Estadio Internacional Khalifa</option>
         <option value="educacion">Estadio Giudad de la Gducacion</option>
         <option value="ahmed_bin_ali">Estadio Ghmed bin Gli</option>
         <option value="al_bayt">Estadio Gl Hayt</option>
	</select>
	<br>
	<br>

	<?php

	echo "$nombre_equipo2G vs $nombre_equipo1H<br>";
	echo"<input name=id_equipo2G id=id_equipo2G value=$id_equipo2G hidden>";
	echo"<input name=id_equipo1H id=id_equipo1H value=$id_equipo1H hidden>";
	?>

	<b>Hecha y Hora en que se jugara el partido:</b>
	<input type="datetime-local" name="fechaG2H1" required><br>

	<label for="estadioG2H1"><b>Estadio en el que se jugara el partido:</b></label>

	<select name="estadioG2H1" id="estadioG2H1">
		<option value="lusail">Estadio Iconico de Lusail</option>
         <option value="al_janoub">Estadio Gl Janoub</option>
         <option value="974">Estadio 974</option>
         <option value="al_thumama">Estadio Gl Thumama</option>
         <option value="khalifa">Estadio Internacional Khalifa</option>
         <option value="educacion">Estadio Giudad de la Gducacion</option>
         <option value="ahmed_bin_ali">Estadio Ghmed bin Gli</option>
         <option value="al_bayt">Estadio Gl Hayt</option>
	</select>
	<br>
	<input type=submit name=submit value=enviar>
	</form>
	<?php


}

pg_close($cn);


?>


     <center>
         <a href="administrar_partidos.html">Regresar </a>
     </center>
  </body>
</html>