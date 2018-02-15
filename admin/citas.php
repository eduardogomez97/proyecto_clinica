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
    <title>Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../js/bootstrap.min.js">  
    <link rel="stylesheet" href="../estilo.css">
      
    <style>

        
        body {
            
            background: url(../imagenes/dental.jpg);
            display:flex;
            align-items:center;
            margin: auto;
            background-repeat:no-repeat;
            background-position:center center;
            background-attachment:fixed;
            -o-background-size: 100% 100%, auto;
            -moz-background-size: 100% 100%, auto;
            -webkit-background-size: 100% 100%, auto;
            background-size: 100% 100%, auto;    
                
        }
        
    </style> 
      
  </head>
  <body>

      <?php  
            
      $connection=conectar();
        
      
      ?>
      
      <div class="container">
          
         <?php
          titulo();
          navegador_admin();
          ?>

          <div class="row">
                  
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>NUMERO DE LA CITA </th>
                          <th>FECHA </th>
                          <th>HORA </th>
                          <th>MOTIVO</th>
                          <th>CLIENTE</th>
                          <th>AÑADIR CITA <a href="citas/nueva_cita.php"><img src='images/mas.jpg' width='20' height='20'/></a></th>
                              
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
                                        echo "<td><a href='clientes/informe.php?id_usuario=".$obj->id_usuario."'>".$obj->apellidos.", ".$obj->nombre."</td></a>";
                                      
                                        echo "<td>
                                            <a href='citas/borrar.php?numero=".$obj->numero."'><img src='images/croos.png' width='20' height='20'/></a>

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