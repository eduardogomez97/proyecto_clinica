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
              <form method="post">
                  <div class="form-group">
                      <input type="search" name="buscar" required>
                      <input type="submit" value="Buscar">
                  </div>
              </form>
          
          </div>
          <?php if(isset($_POST['buscar'])) {
    
                $busqueda = $_POST['buscar'];
                $query= "SELECT * from usuarios where (nombre like '%$busqueda%' or apellidos like '%$busqueda%') and id_usuario > 1 ";
                
                echo "<div class='row'>";
                    echo "Clientes encontrados: <br>";
                            echo "<table class='table table-striped'>
                                    <thead>
                                        <tr>
                                              <th>USUARIO </th>
                                              <th>NOMBRE </th>
                                              <th>APELLIDOS </th>
                                              <th>TELEFONO </th>
                                              <th>VER INFORME </th>
                                        </tr>
                                    </thead>";
    
                    if ($result = $connection->query($query)) {
                     while($obj = $result->fetch_object()) {

                         
                            echo " <tr>";
                                echo "<td>".$obj->user."</td>";
                                echo "<td>".$obj->nombre."</td>";
                                echo "<td>".$obj->apellidos."</td>";
                                echo "<td>".$obj->telefono."</td>";
                                echo "<td> 

                                            <a href='clientes/informe.php?id_usuario=".$obj->id_usuario."'><img src='images/eye.png' width='20' height='20' /></a>
                                            <a href='clientes/modificar.php?id_usuario=".$obj->id_usuario."'><img src='images/person.png'width='20' height='20' /></a>
                                            
                                            <a href='clientes/borrar.php?id_usuario=".$obj->id_usuario."'><img src='images/croos.png' width='20' height='20'/></a>

                                        </td>";
                         
                                
                            echo "</tr>";
                     }

                   
                }
                echo "</table>";
                echo "</div>";    

            }
          ?>
          <div class="row">
                  
                  <table class="table table-striped">
                      
                      <thead>
                        <tr>
                          <th>USUARIO </th>
                          <th>NOMBRE </th>
                          <th>APELLIDOS </th>
                          <th>TELEFONO </th>
                          <th>AÑADIR CLIENTE<a href="clientes/nuevo_cliente.php"><img src='images/mas.jpg' width='20' height='20'/></a></th>
                        </tr>  
                    </thead>

                      <?php 
                      
                            $query="SELECT * from usuarios where id_usuario > 1";
                            if ($result = $connection->query($query)) {

                                while($obj = $result->fetch_object()) {
                                        echo "<tr>";
                                        echo "<td>".$obj->user."</td>";
                                        echo "<td>".$obj->nombre."</td>";
                                        echo "<td>".$obj->apellidos."</td>";
                                        echo "<td>".$obj->telefono."</td>";
                                        echo "<td> 

                                            <a href='clientes/informe.php?id_usuario=".$obj->id_usuario."'><img src='images/eye.png' width='20' height='20' /></a>
                                            <a href='clientes/modificar.php?id_usuario=".$obj->id_usuario."'><img src='images/person.png'width='20' height='20' /></a>
                                            
                                            <a href='clientes/borrar.php?id_usuario=".$obj->id_usuario."'><img src='images/croos.png' width='20' height='20'/></a>

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

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>
