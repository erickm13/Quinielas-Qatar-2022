<html>
  <head>
     <title>
        Registro de PartidosD
     </title>
  </head>
  <body>


<?php
include('../conexion.php');
$cn = conexion();

if (!empty($_GET["fechaA1B2"])){

   $fechaA1B2=$_GET["fechaA1B2"];
   $estadioA1B2=$_GET["estadioA1B2"];
   $id_equipo1A=$_GET["id_equipo1A"];
   $id_equipo2B=$_GET["id_equipo2B"];

   $fechaA2B1=$_GET["fechaA2B1"];
   $estadioA2B1=$_GET["estadioA2B1"];
   $id_equipo2A=$_GET["id_equipo2A"];
   $id_equipo1B=$_GET["id_equipo1B"];

   if ((date('Y:m:d', strtotime($fechaA1B2)) == date('Y:m:d', strtotime($fechaA2B1))) && ($estadioA1B2 == $estadioA2B1)){
      echo"Ha seleccionado la misma fecha y el mismo estadio para ambos partidos";
   }else{

      $query_fechaestadio = "SELECT COUNT(*) FROM quinielas.partidos
      WHERE estadio = '$estadioA1B2' AND fecha_hora::date = '$fechaA1B2'";
      $result2 = pg_query($cn,$query_fechaestadio); // Verificamos que el estadio se encuentre disponible en esta fecha
      $row2 = pg_fetch_object($result2);
      if($row2->count == 1){
         echo "Se jugara un partido en el estadio seleccionado en la fecha indicada, seleccione otro estadio u otra fecha al ingresar el partido de nuevo<br>";
      }else{
            $result = pg_query($cn,"INSERT INTO quinielas.partidos (fecha_hora,estadio,id_equipo1,id_equipo2,fase_de_partido) VALUES ('$fechaA1B2','$estadioA1B2',$id_equipo1A,$id_equipo2B,'Octavos')");
            echo 'El partido de octavos para los equipos 1A y 2B ha sido ingresado correctamente<br>';
         
      }

  

      $query_fechaestadio = "SELECT COUNT(*) FROM quinielas.partidos
         WHERE estadio = '$estadioA2B1' AND fecha_hora::date = '$fechaA2B1'";
         $result2 = pg_query($cn,$query_fechaestadio); // Verificamos que el estadio se encuentre disponible en esta fecha
         $row2 = pg_fetch_object($result2);
         if($row2->count == 1){
            echo "Se jugara un partido en el estadio seleccionado en la fecha indicada, seleccione otro estadio u otra fecha al ingresar el partido de nuevo<br>";
         }else{
               $result = pg_query($cn,"INSERT INTO quinielas.partidos (fecha_hora,estadio,id_equipo1,id_equipo2,fase_de_partido) VALUES ('$fechaA2B1','$estadioA2B1',$id_equipo2A,$id_equipo1B,'Octavos')");
               echo 'El partido de octavos para los equipos 2A y 1B ha sido ingresado correctamente<br>';
            
         }
         
      }
      
   
   

}

if (!empty($_GET["fechaC1D2"])){
   $fechaC1D2=$_GET["fechaC1D2"];
   $estadioC1D2=$_GET["estadioC1D2"];
   $id_equipo1C=$_GET["id_equipo1C"];
   $id_equipo2D=$_GET["id_equipo2D"];

   $fechaC2D1=$_GET["fechaC2D1"];
   $estadioC2D1=$_GET["estadioC2D1"];
   $id_equipo2C=$_GET["id_equipo2C"];
   $id_equipo1D=$_GET["id_equipo1D"];

   if ((date('Y:m:d', strtotime($fechaC1D2)) == date('Y:m:d', strtotime($fechaC2D1))) && ($estadioC1D2 == $estadioC2D1)){
      echo"Ha seleccionado la misma fecha y el mismo estadio para ambos partidos";
   }else{

      $query_fechaestadio = "SELECT COUNT(*) FROM quinielas.partidos
      WHERE estadio = '$estadioC1D2' AND fecha_hora::date = '$fechaC1D2'";
      $result2 = pg_query($cn,$query_fechaestadio); // Verificamos que el estadio se encuentre disponible en esta fecha
      $row2 = pg_fetch_object($result2);
      if($row2->count == 1){
         echo "Se jugara un partido en el estadio seleccionado en la fecha indicada, seleccione otro estadio u otra fecha al ingresar el partido de nuevo<br>";
      }else{
            $result = pg_query($cn,"INSERT INTO quinielas.partidos (fecha_hora,estadio,id_equipo1,id_equipo2,fase_de_partido) VALUES ('$fechaC1D2','$estadioC1D2',$id_equipo1C,$id_equipo2D,'Octavos')");
            echo 'El partido de octavos para los equipos 1C y 2D ha sido ingresado correctamente<br>';
         
      }

  

      $query_fechaestadio = "SELECT COUNT(*) FROM quinielas.partidos
         WHERE estadio = '$estadioC2D1' AND fecha_hora::date = '$fechaC2D1'";
         $result2 = pg_query($cn,$query_fechaestadio); // Verificamos que el estadio se encuentre disponible en esta fecha
         $row2 = pg_fetch_object($result2);
         if($row2->count == 1){
            echo "Se jugara un partido en el estadio seleccionado en la fecha indicada, seleccione otro estadio u otra fecha al ingresar el partido de nuevo<br>";
         }else{
               $result = pg_query($cn,"INSERT INTO quinielas.partidos (fecha_hora,estadio,id_equipo1,id_equipo2,fase_de_partido) VALUES ('$fechaC2D1','$estadioC2D1',$id_equipo2C,$id_equipo1D,'Octavos')");
               echo 'El partido de octavos para los equipos 2C y 1D ha sido ingresado correctamente<br>';
            
         }
         
      } 
}

if (!empty($_GET["fechaE1F2"])){
   
   $fechaE1F2=$_GET["fechaE1F2"];
   $estadioE1F2=$_GET["estadioE1F2"];
   $id_equipo1E=$_GET["id_equipo1E"];
   $id_equipo2F=$_GET["id_equipo2F"];

   $fechaE2F1=$_GET["fechaE2F1"];
   $estadioE2F1=$_GET["estadioE2F1"];
   $id_equipo1F=$_GET["id_equipo1F"];
   $id_equipo2E=$_GET["id_equipo2E"];

   if ((date('Y:m:d', strtotime($fechaE1F2)) == date('Y:m:d', strtotime($fechaE2F1))) && ($estadioE1F2 == $estadioE2F1)){
      echo"Ha seleccionado la misma fecha y el mismo estadio para ambos partidos";
   }else{

      $query_fechaestadio = "SELECT COUNT(*) FROM quinielas.partidos
      WHERE estadio = '$estadioE1F2' AND fecha_hora::date = '$fechaE1F2'";
      $result2 = pg_query($cn,$query_fechaestadio); // Verificamos que el estadio se encuentre disponible en esta fecha
      $row2 = pg_fetch_object($result2);
      if($row2->count == 1){
         echo "Se jugara un partido en el estadio seleccionado en la fecha indicada, seleccione otro estadio u otra fecha al ingresar el partido de nuevo<br>";
      }else{
            $result = pg_query($cn,"INSERT INTO quinielas.partidos (fecha_hora,estadio,id_equipo1,id_equipo2,fase_de_partido) VALUES ('$fechaE1F2','$estadioE1F2',$id_equipo1E,$id_equipo2F,'Octavos')");
            echo 'El partido de octavos para los equipos 1E y 2F ha sido ingresado correctamente<br>';
         
      }

  

      $query_fechaestadio = "SELECT COUNT(*) FROM quinielas.partidos
         WHERE estadio = '$estadioE2F1' AND fecha_hora::date = '$fechaE2F1'";
         $result2 = pg_query($cn,$query_fechaestadio); // Verificamos que el estadio se encuentre disponible en esta fecha
         $row2 = pg_fetch_object($result2);
         if($row2->count == 1){
            echo "Se jugara un partido en el estadio seleccionado en la fecha indicada, seleccione otro estadio u otra fecha al ingresar el partido de nuevo<br>";
         }else{
               $result = pg_query($cn,"INSERT INTO quinielas.partidos (fecha_hora,estadio,id_equipo1,id_equipo2,fase_de_partido) VALUES ('$fechaE2F1','$estadioE2F1',$id_equipo2E,$id_equipo1F,'Octavos')");
               echo 'El partido de octavos para los equipos 2F y 1E ha sido ingresado correctamente<br>';
            
         }
         
      } 

}

if (!empty($_GET["fechaG1H2"])){
   $fechaG1H2=$_GET["fechaG1H2"];
   $estadioG1H2=$_GET["estadioG1H2"];
   $id_equipo1G=$_GET["id_equipo1G"];
   $id_equipo2H=$_GET["id_equipo2H"];

   $fechaG2H1=$_GET["fechaG2H1"];
   $estadioG2H1=$_GET["estadioG2H1"];
   $id_equipo1H=$_GET["id_equipo1H"];
   $id_equipo2G=$_GET["id_equipo2G"];

   if ((date('Y:m:d', strtotime($fechaG1H2)) == date('Y:m:d', strtotime($fechaG2H1))) && ($estadioG1H2 == $estadioG2H1)){
      echo"Ha seleccionado la misma fecha y el mismo estadio para ambos partidos";
   }else{

      $query_fechaestadio = "SELECT COUNT(*) FROM quinielas.partidos
      WHERE estadio = '$estadioG1H2' AND fecha_hora::date = '$fechaG1H2'";
      $result2 = pg_query($cn,$query_fechaestadio); // Verificamos que el estadio se encuentre disponible en esta fecha
      $row2 = pg_fetch_object($result2);
      if($row2->count == 1){
         echo "Se jugara un partido en el estadio seleccionado en la fecha indicada, seleccione otro estadio u otra fecha al ingresar el partido de nuevo<br>";
      }else{
            $result = pg_query($cn,"INSERT INTO quinielas.partidos (fecha_hora,estadio,id_equipo1,id_equipo2,fase_de_partido) VALUES ('$fechaG1H2','$estadioG1H2',$id_equipo1G,$id_equipo2H,'Octavos')");
            echo 'El partido de octavos para los equipos 1G y 2H ha sido ingresado correctamente<br>';
         
      }

  

      $query_fechaestadio = "SELECT COUNT(*) FROM quinielas.partidos
         WHERE estadio = '$estadioG2H1' AND fecha_hora::date = '$fechaG2H1'";
         $result2 = pg_query($cn,$query_fechaestadio); // Verificamos que el estadio se encuentre disponible en esta fecha
         $row2 = pg_fetch_object($result2);
         if($row2->count == 1){
            echo "Se jugara un partido en el estadio seleccionado en la fecha indicada, seleccione otro estadio u otra fecha al ingresar el partido de nuevo<br>";
         }else{
               $result = pg_query($cn,"INSERT INTO quinielas.partidos (fecha_hora,estadio,id_equipo1,id_equipo2,fase_de_partido) VALUES ('$fechaG2H1','$estadioG2H1',$id_equipo2G,$id_equipo1H,'Octavos')");
               echo 'El partido de octavos para los equipos 2G y 1H ha sido ingresado correctamente<br>';
            
         }
         
      }

      
   }
   pg_close($cn); 







   



?>


     <center>
         <a href="generar_octavos.php">Regresar<br></a>
         <a href="listado_partidos.php">Ver/Modificar partidos<br></a>
         <a href="../admin.php"> Regresar al menu principal<br></a>
         
     </center>
  </body>
</html>