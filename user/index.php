<?php

  session_start();
  if ($_SESSION["user"]) {

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
          
          <?php
          titulo();
          ?>
          <nav class='navbar navbar-inverse'>
              
              <div class='container-fluid'>
                  
                <div class='navbar-header'>
                    
                  <a class='navbar-brand' href='index.php'>Inicio</a>
                    
                </div>
                <ul class='nav navbar-nav'>
                  <li><a href='clientes.php'>Pedir Cita</a></li>
                  <li><a href='facturas.php'>Lista de tus citas</a></li>
                  <li><a href='citas.php'>Tus Facturas</a></li>
                  <li><a href=''>Sobre Nosotros</a></li>    
                    
                    </ul>    
                
                <ul class='nav navbar-nav navbar-right'>
                    <li><a href=''><buttom class='glyphicon glyphicon-user'></buttom>Mi perfil</a></li>
                    <li><a href='logout.php'><buttom class='glyphicon glyphicon-log-in'></buttom> Cerrar sesion</a></li>
                </ul>
  
              </div>
            </nav>

          
    </div>

      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

  </body>
</html>
