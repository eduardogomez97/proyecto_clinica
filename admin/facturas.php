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
              <th>ID FACTURA </th>
              <th>CANTIDAD A PAGAR </th>
              <th>NUMERO DE CITA </th>
            </tr>  
          </thead>

      <?php
          $query="SELECT * from facturas";
      if ($result = $connection->query($query)) {
          while($obj = $result->fetch_object()) {
              echo "<tr>";
                echo "<td><a href='datos_factura.php?id=".$obj->id_factura.
                "'>".$obj->id_usuario."</a></td>";
                echo "<td>".$obj->cantidad."</td>";
                echo "<td>".$obj->numero."</td>";
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
