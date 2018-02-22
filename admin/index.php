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
        
        .text-center {
            
            margin-top: 75px;
            
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
          navegador_admin()
          ?>
          
          <div class="text-center"><h1>¡Bienvenido a la zona administrador!</h1></div>
          
          
          
                                
      </div>
     
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
      
  </body>
</html>

