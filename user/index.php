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
          
          <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color: #e3f2fd;">
              
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href='citas.php'>Lista de tus citas</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href='facturas.php'>Tus Facturas</a>
                      </li>     
                      <li class="nav-item">
                        <a class="nav-link"href='nosotros.php'>Sobre Nosotros</a>
                      </li>
                        
                    </ul>
                    <ul class='nav navbar-nav navbar-right'>
                   
                    <li>
                        <button type="button"><?php echo $_SESSION['user']; ?></button>
                    </li>
                    
                    <li>
                        <a href='logout.php'><button type="button">Cerrar sesion</button></a>
                    </li>
                        
                </ul>
                      
                      
                  </div>
            </nav>
  
          
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
          
          <div class="row">
          
                <div class="card col-md-4" style="width: 18rem;">

                    <img class="card-img-top imagenes_card" src="../imagenes/dental.jpg" alt="dental">
                    <div class="card-body">
                        <p class="card-text">Blanqueamiento dental.</p>
                    </div>

</div>

                <div class="card col-md-4" style="width: 18rem;">

                    <img class="card-img-top imagenes_card" src="../imagenes/dental.jpg" alt="dental">
                    <div class="card-body">
                        <p class="card-text">Blanqueamiento dental.</p>
                    </div>

</div>

                <div class="card col-md-4" style="width: 18rem;">
              
                <img class="card-img-top imagenes_card" src="../imagenes/dental.jpg" alt="dental">
                <div class="card-body">
                    <p class="card-text">Blanqueamiento dental.</p>
                </div>
              
            </div>  
          
    
          </div>
          
          
      </div>



    
      
  </body>
</html>
