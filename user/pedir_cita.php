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
        
         <div>
          <form>
              
              <div class="row">
                <div class="col-md-5 mb-3">
                  <label for="inputState">Motivo</label>
                  <select id="inputState" class="form-control" name="motivo">
                    
                    <option selected>REVISION</option>
                    <option>ODONTOPEDIATRÍA</option>
                    <option>ORTODONCIA</option>
                    <option>IMPLANTOLOGÍA/PERIODONCIA</option>
                    <option>ESTÉTICA DENTAL</option>
                    <option>ENDODONCIA</option>
                    </select>
                </div>
       
                    
                  
                
                  
                <div class="col-md-5 mb-3">
                  <label for="validationCustom02">Fecha</label>
                  <input type="date" class="form-control" id="validationCustom02" placeholder="Last name" value="fecha" required>
                </div>
              </div>

              <div class="row">
                  
                <div class="col-md-4 mb-3">
                  <label>Elige una hora para su cita:</label>
	               <input type="time" name="hora" max="21:30:00" min="09:30:00" step="1">

                </div>  
                <div class="col-md-2 mb-3">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="ma">
                  <label class="form-check-label" for="inlineRadio1">Horario de Mañana</label>
                </div>
                <div class="col-md-3 mb-3">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="ta">
                  <label class="form-check-label" for="inlineRadio2">Horario de tarde</label>
                </div>
                  
              </div>
     
              <button class="btn btn-primary" type="submit">¡Pedir Cita!</button>
              
        </form> 
         </div>  
      </div>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
      
  </body>
</html>






