<html>
  <head>
     <title>
        Modificacion Exitosa
     </title>
  </head>
  <body>


<?php

	$id_equipo=$_POST["id_equipo"];
	$nombre=$_POST["nombre"];

   include('../conexion.php');
   $cn = conexion();
		$query = "UPDATE quinielas.equipos SET nombre='$nombre' WHERE id_equipo=$id_equipo";
		$result = pg_query($cn,$query);
		echo"La modificacion ha sido exitosa";
		pg_close($cn);

?>

     <center>
         <a href="listado_equipos.php">Ver/Modificar equipos<br></a>
         <a href="../index.php">Regresar al menu principal<br></a>
     </center>
  </body>
</html>
