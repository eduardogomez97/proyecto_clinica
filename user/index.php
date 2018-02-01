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
          <div>
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color: #e3f2fd;">
              
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                      </li>
                      
                      <li class="nav-item">
                        <a class="nav-link" href='pedir_cita.php'>Pedir_cita</a>
                      </li>
                        
                      <li class="nav-item">
                        <a class="nav-link" href='mis_citas.php'>Lista de tus citas</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href='mis_facturas.php'>Tus Facturas</a>
                      </li>     
                      <li class="nav-item">
                        <a class="nav-link"href='nosotros.php'>Sobre Nosotros</a>
                      </li>
                        
                    </ul>
                    <ul class='nav navbar-nav navbar-right'>
                   
                    <li>
                        <a href='mi_perfil.php'><button type="button"><?php echo $_SESSION['user']; ?></button></a>
                    </li>
                    
                    <li>
                        <a href='logout.php'><button type="button">Cerrar sesion</button></a>
                    </li>
                        
                </ul>
                      
                      
                  </div>
              
            </nav>
          </div>  
          
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="imagenes/clinica1.jpg" alt="Primera imagen">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="imagenes/clinica2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="imagenes/clinica3.png" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
              </a>
            </div>
          
          <div id="accordion">
              
              <div class="card">
                  
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      ¿Quienes somos?
                    </button>
                  </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <p>Hace 40 años, Clinica Dental Gallego (Centro de Odontología) abrió sus puertas en Lora del Rio.<br>

                    De forma progresiva y conforme a las necesidades de los pacientes se fueron incorporando nuevas especialidades y disciplinas, ofreciendo así, un tratamiento completo tanto en el niño como en el adulto , cumpliendo de esta forma nuestra filosofía de clínica multidisciplinar.<br>
                      
                    Estudiamos cada caso desde un punto de vista multidisciplinar con la más alta tecnología de la
                    odontología, para diseñar la sonrisa con la que tanto sueñan nuestros pacientes. </p>
                  </div>
                </div>
                  
              </div>
              
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Collapsible Group Item #2
                    </button>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Collapsible Group Item #3
                    </button>
                  </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              
            </div>
          
          <footer class="page-footer center-on-small-only unique-color-dark pt-0" style="background-color: #97efff;">

            <div style="background-color: #6351ce;">
                <div class="container">
                    <!--Grid row-->
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
            </div>


            <div class="container mt-5 mb-4 text-center text-md-left">
                <div class="row mt-3">


                    <div class="col-md-2 col-lg-4 col-xl-3 mb-r">
                        <h6 class="title font-bold"><strong>Clinica Dental gallego</strong></h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>Dentistas especialistas. Un equipo de profesionales altamente cualificados le atenderá.</p>
                    </div>

                    <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-r">
                        <h6 class="title font-bold"><strong>Hotarios</strong></h6>
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

            <div class="footer-copyright">
                <div class="container-fluid">
                    © 2017 Copyright: <a href="https://www.MDBootstrap.com"><strong> MDBootstrap.com</strong></a>
                </div>
            </div>


        </footer>

         
      </div>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
      
  </body>
</html>
