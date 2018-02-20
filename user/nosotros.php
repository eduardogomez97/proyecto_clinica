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
          navegador_user();
          ?>
     
          <div class="row">
              <footer class="page-footer center-on-small-only unique-color-dark pt-0">
                  <div class="container-fluid mt-5 mb-4 text-center text-md-left">
                      <div class="row mt-3">
                          <div class="col-md-2 col-lg-4 col-xl-3 mx-auto mb-r">
                              <h6 class="title font-bold"><strong>¿Quienes somos?</strong></h6>
                              <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                              <p>Nuestras instalaciones ocupan un espacio nuevo, pensado y diseñado para que nuestros pacientes se sientan cómodos y relajados.<br><br>Nuestro objetivo principal es cuidar de la salud bucodental de nuestros pacientes. Por ello cada día trabajamos utilizando las técnicas más avanzadas para conseguir sonrisas sanas, bonitas y satisfechas.</p>
                          </div>
                          <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-r">
                        <h6 class="title font-bold"><strong>¿Donde estamos?</strong></h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <div class="embed-responsive embed-responsive-16by9">
                        
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4483.471636026521!2d-6.004812444790272!3d37.3828979063186!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfb6bb621dc08a753!2sIES+Triana!5e0!3m2!1ses!2ses!4v1517921034626" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                        
                        </div>    

                                
                    </div>
                          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-r">
                        <h6 class="title font-bold"><strong>Nuestros datos</strong></h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p><i class="fa fa-home mr-3"></i> Lora del rio, 41440, ES</p>
                        <p><i class="fa fa-envelope mr-3"></i> clinica_dental@gallego.com</p>
                        <p><i class="fa fa-phone mr-3"></i> + 34 639 866 860</p>
                    </div>
                      </div>
                  </div>
              </footer>
          </div>
          
      </div>
     
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
  </body>
</html>
