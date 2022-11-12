<html>
  <head>
     <title>
        Ingreso de partidos
     </title>
  </head>
  <body>
     <form action="registro_partidos.php" method="get">
       <b>Fecha y Hora en que se jugara el partido:</b>
       <input type="datetime-local" name="fecha" required><br>

       <label for="estadio"><b>Estadio en el que se jugara el partido:</b></label>

       <select name="estadio" id="estadio">
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


      <?php
      echo"<b>Seleccione el grupo de los equipos que jugaran el partido:</b>";
      $option= '<option value="">Selecciona un grupo</option>';
      $option .= '<option value="A">Grupo A</option>';
      $option .= '<option value="B">Grupo B</option>';
      $option .= '<option value="C">Grupo C</option>';
      $option .= '<option value="D">Grupo D</option>';
      $option .= '<option value="E">Grupo E</option>';
      $option .= '<option value="F">Grupo F</option>';
      $option .= '<option value="G">Grupo G</option>';
      $option .= '<option value="H">Grupo H</option>';
      ?> 

      <html>
         <head>
            
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            <script type="text/javascript">
                  function getData(empid, divid){
                     $.ajax({
                        url: 'consultaequipos.php?empid='+empid, 
                        success: function(html) {
                              var ajaxDisplay = document.getElementById(divid);
                              ajaxDisplay.innerHTML = html;
                        }
                        
                     });
                  }
               
            </script>
         </head>
         <body>

                  
                  <select name="empid" id="empid"  class="form-control" onchange="getData(this.value, 'displaydata')">
                  <?php
                     echo "$option";
                  ?> 
                  </select>
                  <div id="displaydata">
                  </div>

         </body>
      </html>


      <a href="generar_octavos.php">Generar partidos de Octavos de Final</a>

           
     </form>
     <center>
         <a href="administrar_partidos.html">Regresar</a>
     </center>
  </body>
</html>