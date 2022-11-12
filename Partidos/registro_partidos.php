<html>
  <head>
     <title>
        Registro de Partidos
     </title>
  </head>
  <body>


<?php

$fecha=$_GET["fecha"];
$estadio=$_GET["estadio"];
$equipo1 =$_GET["equipo1"];
$equipo2 =$_GET["equipo2"];

if ($equipo1 == $equipo2){
   echo"Ha seleccionado el mismo equipo dos veces, ingrese el partido de nuevo";
}
else{
   include('../conexion.php');
$cn = conexion();

   $query_mismopartido = "SELECT COUNT (*) FROM quinielas.partidos
   WHERE (id_equipo1 = $equipo1 AND id_equipo2 = $equipo2) OR (id_equipo1 = $equipo2 AND id_equipo2 = $equipo1)";
   $result = pg_query($cn,$query_mismopartido); // Verificamos que el partido no se haya jugado previamente
   $row = pg_fetch_object($result);

   if($row->count == 1){
      echo"Un equipo no puede enfrentarse mas de una vez al mismo equipo, intente de nuevo cambiando los equipos que se enfrentan";
   }
   else{

      $query_fechaestadio = "SELECT COUNT(*) FROM quinielas.partidos
      WHERE estadio = '$estadio' AND fecha_hora::date = '$fecha'";
      $result2 = pg_query($cn,$query_fechaestadio); // Verificamos que el estadio se encuentre disponible en esta fecha
      $row2 = pg_fetch_object($result2);
      if($row2->count == 1){
         echo "Se jugara un partido en el estadio seleccionado en la fecha indicada, seleccione otro estadio u otra fecha al ingresar el partido de nuevo";
      }else{

         $query_fechaequipo = "SELECT COUNT(*) FROM quinielas.partidos
         WHERE (id_equipo1 = $equipo1 OR id_equipo1 = $equipo2 OR id_equipo2 = $equipo1 OR id_equipo2 = $equipo2) AND fecha_hora::date = '$fecha'";
         $result3 = pg_query($cn,$query_fechaequipo); // Verificamos que el equipo no juegue en esa misma fecha
         $row3 = pg_fetch_object($result3);
            if ($row3->count == 1){
               echo "Uno de los equipos seleciconados para el encuentro ya tiene un partido asignado en la misma fecha, seleccione otros equipos u otra fecha para realizar el partido";
            }else{
               $result = pg_query($cn,"INSERT INTO quinielas.partidos (fecha_hora,estadio,id_equipo1,id_equipo2,fase_de_partido) VALUES ('$fecha','$estadio',$equipo1,$equipo2,'Grupos')");
               echo 'El partido ha sido ingresado correctamente<br>';
            }
         
      }


      
   }
   


   
   pg_close($cn);

   
}


?>


     <center>
         <a href="formulario_partidos.php">Ingresar un partido nuevo<br></a>
         <a href="listado_partidos.php">Ver/Modificar partidos<br></a>
         <a href="../admin.php"> Regresar al menu principal<br></a>
         
     </center>
  </body>
</html>