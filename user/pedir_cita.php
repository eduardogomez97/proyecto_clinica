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


                    <div class="col-md-2 col-lg-4 col-xl-3 mb-r">
                        <h6 class="title font-bold"><strong>Clinica Dental gallego</strong></h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>Para pedir cita puede ponerse en contacto con nuestros dentistas especialistas llamando a nuestro numero de contacto o mediante correo electronico.<br>
                            Un equipo de profesionales altamente cualificados le atenderá.</p>
                    </div>

                    <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-r">
                        <h6 class="title font-bold"><strong>Horarios</strong></h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p><strong>Lunes a Jueves</strong></p>
                        <p>Mañana: 09:30 - 13:30</p>
                        <p>Tarde: 13:30 - 21:00</p>
                        <p><strong>Viernes</strong></p>
                        <p>Mañana: 09:30 - 13:30</p>
                                
                    </div>


                    <div class="col-md-4 col-lg-3 col-xl-3">
                        <h6 class="title font-bold"><strong>Contacto</strong></h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p><i class="fa fa-home mr-3"></i> Lora del rio, 41440, ES</p>
                        <p><i class="fa fa-envelope mr-3"></i> clinica_dental@gallego.com</p>
                        <p><i class="fa fa-phone mr-3"></i> + 34 639 866 860</p>
                        <p><i class="fa fa-print mr-3"></i> + 34 123 456 789</p>
                    </div>


                </div>
            </div>
                
                <div class="container-fluid">
                    
                    <div class="row py-4 d-flex align-items-center">
 
                        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                            <h6 class="mb-0 white-text">¡Atento a nuestras redes sociales!</h6>
                        </div>
                        
                        
                        <div class="col-md-6 col-lg-7 text-center text-md-right">
                            <!--Facebook-->
                            <a class="icons-sm fb-ic ml-0"><i class="fa fa-facebook white-text mr-lg-4"> Facebook </i></a>
                            <!--Twitter-->
                            <a class="icons-sm tw-ic"><i class="fa fa-twitter white-text mr-lg-4"> Twitter </i></a>
                            <!--Instagram-->
                            <a class="icons-sm ins-ic"><i class="fa fa-instagram white-text mr-lg-4"> Instagram</i></a>
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






