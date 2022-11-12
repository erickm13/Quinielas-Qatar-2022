<?php
$empid = $_GET['empid'];
include('../conexion.php');
$cn = conexion();
//Check for connection error

if (isset($empid)) {
    $select  = " SELECT * FROM quinielas.equipos WHERE id_grupo = '$empid'";
    $result = pg_query($cn,$select);

	if (pg_num_rows($result)==0){
		echo"No hay equipos registrados en este grupo, seleccione otro grupo o ingrese un equipo nuevo";
	}

	else{
		echo"<b>Seleccione el equipo participante #1: </b>";
		echo "<select name=equipo1>\n";
		while($row = pg_fetch_object($result))
		{
		   echo "<option value=$row->id_equipo>$row->nombre</option>\n";
		}
		echo "</select>\n";
		echo"<br>";
		$select  = " SELECT * FROM quinielas.equipos WHERE id_grupo = '$empid'";
	   $result = pg_query($cn,$select);

		echo"<b>Seleccione el equipo participante #2: </b>";

		echo "<select name=equipo2>\n";
		$equipo = 0;
		while($row = pg_fetch_object($result))
		{
			if($equipo == 1){
			   echo "<option value=$row->id_equipo selected>$row->nombre</option>\n";
			}
			else{
			   echo "<option value=$row->id_equipo >$row->nombre</option>\n";
			}
		   $equipo = $equipo + 1;
		}
		echo "</select>\n<br>";
		echo"<input type=submit name=submit value=enviar>";
	}
    
   

		 
}     
pg_close($cn);
?>   