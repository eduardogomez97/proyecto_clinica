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
                          <th>NOMBRE </th>
                          <th>APELLIDOS </th>
                          <th>TELEFONO </th>
                            <th>AÑADIR EMPLEADO<a href="empleados/nuevo_empleado.php"><img src='images/mas.jpg' width='20' height='20'/></a></th>
                        </tr>  
          </thead>

                      <?php 
                      
                            $query="select e.* from empleados e;";
                            if ($result = $connection->query($query)) {

                                while($obj = $result->fetch_object()) {
                                        echo "<tr>";
                                        echo "<td>".$obj->nombre."</td>";
                                        echo "<td>".$obj->apellidos."</td>";
                                        echo "<td>".$obj->telefono."</td>";
                                        echo "<td> 

                                           <a href='empleados/informe.php?id=".$obj->id_empleado."'><img src='images/eye.png' width='20' height='20' /></a>
                                            <a href='empleados/modificar.php?id=".$obj->id_empleado."'><img src='images/person.png'width='20' height='20' /></a>
                                            <a href='empleados/borrar.php?id=".$obj->id_empleado."'><img src='images/croos.png' width='20' height='20' /></a>



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