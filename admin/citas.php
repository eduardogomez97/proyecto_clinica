<?php

  session_start();
  if ($_SESSION["user"] == 'admin') {

  } else {
      
    session_destroy();
    header("Location: ../login.php");
      
  }

include_once '../funciones.php';
 ?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>CITAS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../estilo.css">
  </head>
  <body>

      <?php  
     
            $connection = new mysqli("127.0.0.1", "root", "Admin2015", "clinica",3306);
            $connection->set_charset("uft8");
      
            if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
            }
        
      
      
      ?>
      
      <div class="container">
          
          <?php
          titulo();
          navegador_admin();
          ?> 

          <div class="table-responsive ajuste">
                  
                  <table class="table">
                      
                      <thead class="tabla_head">
                        <tr>
                          <th>NUMERO DE LA CITA </th>
                          <th>FECHA </th>
                          <th>HORA </th>
                          <th>MOTIVO</th>
                          <th>CLIENTE</th>
                          <th>OPCIONES</th>
                              
                        </tr>  
          </thead>

                      <?php 
                    
                            $query="select c.*, u.* from citas c 
                                    join usuarios u on c.id_usuario = u.id_usuario";
                      
                            if ($result = $connection->query($query)) {

                                while($obj = $result->fetch_object()) {
                                        echo "<tr>";
                                        echo "<td>".$obj->numero."</a></td>";
                                        echo "<td>".$obj->fecha."</td>";
                                        echo "<td>".$obj->hora."</td>";
                                        echo "<td>".$obj->motivo."</td>";
                                        echo "<td>".$obj->apellidos.", ".$obj->nombre."</td>";
                                      
                                        echo "<td> 

                                            <a href='informe.php?id=".$obj->IdReparacion."'><img src='images/eye.png' width='20' height='20' /></a>
                                            <a href='modificar_cliente.php?id=".$obj->IdReparacion."'><img src='images/person.png'width='20' height='20' /></a>
                                            <a href='borrar.php?id=".$obj->IdReparacion."'><img src='images/croos.png' width='20' height='20' /></a>



                                        </td>";
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


  </body>
</html>