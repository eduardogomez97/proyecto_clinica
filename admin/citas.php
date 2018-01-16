<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo.css">
  </head>
  <body>

      <?php  
      
            include(funciones.php);
     
            $connection = new mysqli("127.0.0.1", "root", "Admin2015", "clinica",3306);
            $connection->set_charset("uft8");
      
            if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
            }
        
      
      
      ?>
      
      <div class="container">
          
          <div class="row ">        
              
                    <div id="titulo" class="col-md-12 centro" >
          
                        <center>
                            <h1>Clinica Dental Gallego</h1>
                        </center>    
          
                    </div>
              
          </div>
          <div class="row">
          
              <div class="">
   
          <table style="border:1px solid black">
          <thead>
            <tr>
              <th>Numero </th>
              <th>Fecha </th>
              <th>Motivo </th>
              <th>Hora </th>
              <th>Cliente </th>    
            </tr>  
          </thead>

      <?php
          $query="SELECT * from citas";
            if ($result = $connection->query($query)) {
         
                while($obj = $result->fetch_object()) {
              echo "<tr>";
                echo "<td><a href='datos_cliente.php?id=".$obj->numero.
                "'>".$obj->numero."</a></td>";
                echo "<td>".$obj->fecha."</td>";
                echo "<td>".$obj->motivo."</td>";
                echo "<td>".$obj->hora."</td>";
                echo "<td>".$obj->id_cliente."</td>";
              echo "</tr>";
          }
         
          $result->close();
          unset($obj);
          unset($connection);
      } 
    ?>

                  
                  </table>
              </div>
              
          </div>
       
    </div>


  </body>
</html>