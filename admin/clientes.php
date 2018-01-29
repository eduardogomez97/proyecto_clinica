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
    <title>CLIENTES</title>
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

          <div class="table table-responsive">
                  
                  <table class="table">
                      
                      <thead class="tabla_head">
                        <tr>
                          <th>USUARIO </th>
                          <th>NOMBRE </th>
                          <th>APELLIDOS </th>
                          <th>TELEFONO </th>
                          <th>OPCIONES</th>
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
                                            
                                            <button type='button' class='btn btn-default' data-toggle='modal' data-target='#flipFlop'><img src='images/croos.png' width='20' height='20' /></a></button>

                                        </td>";
                                      echo "</tr>";
                                  }

                          $result->close();
                          unset($obj);
                          unset($connection);
                      } 
                    ?>

                  
                  </table>
              
              <div class='modal fade' id='flipFlop' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h4 class='modal-title' id='modalLabel'>¿Estas seguro?</h4>
                            </div>
                            <div class='modal-body'>
                                    Debes de estar seguro de querer modificar los datos del cliente porque esto puede afectar seriamente al sistema.
                             </div>
                            <div class='modal-footer'>
                                    
                                <button type='submit' class='btn btn-secondary' data-dismiss='modal'><a href='clientes/borrar.php?id_usuario=".$obj->id_usuario."'>Aceptar</a></button>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                            </div>
                        </div>
                                
                    </div>
             </div>
            </div>
                  
      </div>



  </body>
</html>
