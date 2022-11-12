<html>
  <head>
     <title>
        Modificacion de Partidos
     </title>
  </head>
  <body>


<?php

$id_partido =$_POST["id_partido"];
$goles_equipo1 =$_POST["goles_equipo1"];
$goles_equipo2 =$_POST["goles_equipo2"];
$amarillas_equipo1 =$_POST["TA_equipo1"];
$amarillas_equipo2 =$_POST["TA_equipo2"];
$rojas_equipo1 =$_POST["TR_equipo1"];
$rojas_equipo2 =$_POST["TR_equipo2"];
$id_equipo1 = 0;
$id_equipo2 = 0;


include('../conexion.php');
$cn = conexion();
   $result = pg_query($cn,"UPDATE quinielas.partidos SET goles_equipo1=$goles_equipo1, goles_equipo2=$goles_equipo2, tarjetasamarillas_equipo1=$amarillas_equipo1, tarjetasamarillas_equipo2=$amarillas_equipo2, tarjetasrojas_equipo1=$rojas_equipo1, tarjetasrojas_equipo2=$rojas_equipo2 WHERE id_partido=$id_partido");

   $result1 =  pg_query($cn,"SELECT id_equipo1, id_equipo2 FROM quinielas.partidos WHERE id_partido = $id_partido");

   while ($row = pg_fetch_object($result1)) {
      $id_equipo1 = $row->id_equipo1;
      $id_equipo2 = $row->id_equipo2;
   }

   if($goles_equipo1 > $goles_equipo2){
      $result = pg_query($cn,"CALL quinielas.actualizarvictorias($id_equipo1,$goles_equipo1,$goles_equipo2)");
      $result = pg_query($cn,"CALL quinielas.actualizarderrotas($id_equipo2,$goles_equipo2,$goles_equipo1)");
   }
   else if($goles_equipo2 > $goles_equipo1){
      $result = pg_query($cn,"CALL quinielas.actualizarvictorias($id_equipo2,$goles_equipo2,$goles_equipo1)");
      $result = pg_query($cn,"CALL quinielas.actualizarderrotas($id_equipo1,$goles_equipo1,$goles_equipo2)");
   }
   else{
      $result = pg_query($cn,"CALL quinielas.actualizarempates($id_equipo1,$id_equipo2,$goles_equipo2)");
   }


   $query = "SELECT U.nombre, U.user_login, goles_equipo1, goles_equipo2
      FROM quinielas.quiniela Q
      INNER JOIN quinielas.usuarios U ON Q.user_login = U.user_login
      WHERE Q.id_partido = $id_partido";
      
      $result = pg_query($cn,"$query");
	   if (pg_num_rows($result) == 0) {
         
      } else{
         
         while($row = pg_fetch_object($result)){
            if ($goles_equipo1 > $goles_equipo2){
               if (($row->goles_equipo1 == $goles_equipo1) && ($row->goles_equipo2 == $goles_equipo2)){
                  $query1 = "UPDATE quinielas.usuarios SET punteo = punteo + 6 WHERE user_login = '$row->user_login'";
                  $result1 = pg_query($cn,"$query1");
               }
               else if ($row->goles_equipo1 > $row->goles_equipo2){
                  $query1 = "UPDATE quinielas.usuarios SET punteo = punteo + 3 WHERE user_login = '$row->user_login'";
                  $result1 = pg_query($cn,"$query1");
               }
               
            } else if($goles_equipo2 > $goles_equipo1){
               if (($row->goles_equipo1 == $goles_equipo1) && ($row->goles_equipo2 == $goles_equipo2)){
                  $query1 = "UPDATE quinielas.usuarios SET punteo = punteo + 6 WHERE user_login = '$row->user_login'";
                  $result1 = pg_query($cn,"$query1");
               }
               else if ($row->goles_equipo1 < $row->goles_equipo2){
                  $query1 = "UPDATE quinielas.usuarios SET punteo = punteo + 3 WHERE user_login = '$row->user_login'";
                  $result1 = pg_query($cn,"$query1");
               }
            } else if($goles_equipo2 == $goles_equipo1){
               if (($row->goles_equipo1 == $goles_equipo1) && ($row->goles_equipo2 == $goles_equipo2)){
                  $query1 = "UPDATE quinielas.usuarios SET punteo = punteo + 6 WHERE user_login = '$row->user_login'";
                  $result1 = pg_query($cn,"$query1");
               }
               else if ($row->goles_equipo1 == $row->goles_equipo2){
                  $query1 = "UPDATE quinielas.usuarios SET punteo = punteo + 3 WHERE user_login = '$row->user_login'";
                  $result1 = pg_query($cn,"$query1");
               }
            }
         }
         echo"</table>";

         
      }

   
   


   echo 'Los resultados han sido asignados correctamente<br>';
   
   pg_close($cn);


?>


     <center>
         <a href="formulario_partidos.php">Ingresar un partido nuevo<br></a>
         <a href="listado_partidos.php">Ver/Modificar partidos<br></a>
         <a href="../admin.php"> Regresar al menu principal<br></a>
         
     </center>
  </body>
</html>