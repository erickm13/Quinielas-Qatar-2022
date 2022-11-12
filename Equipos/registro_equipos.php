<html>
  <head>
     <title>
        Registro de Equipos
     </title>
  </head>
  <body>


<?php

$nombre=$_GET["nombre"];
$grupo=$_GET["grupo"];

include('../conexion.php');
$cn = conexion();

$conteo = "SELECT COUNT(*) AS total FROM quinielas.equipos
          WHERE id_grupo = '$grupo'";
$result_conteo = pg_query($cn,$conteo);
$row = pg_fetch_object($result_conteo);
if ($row->total >= 4){
   echo "Ya se han registrado cuatro equipos en el grupo seleccionado, <br> por favor seleccione otro grupo al ingresar el equipo";
} else{
   $result = pg_query($cn,"INSERT INTO quinielas.equipos (nombre,id_grupo) VALUES ('$nombre','$grupo')");
   echo 'El equipo ha sido ingresado correctamente<br>';
}

pg_close($cn);



?>


     <center>
         <a href="formulario_equipos.html">Ingresar equipo nuevo<br></a>
         <a href="listado_equipos.php">Ver/Modificar equipos<br></a>
         <a href="../index.php"> Regresar al menu principal<br></a>
         
     </center>
  </body>
</html>