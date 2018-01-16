<?php
  session_start();
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
          
          <div class="row ">        
              
                    <div id="titulo" class="col-md-12 centro" >
          
                        <center>
                            <h1>Clinica Dental Gallego</h1>
                        </center>    
          
                    </div>
              
          </div>
          <div class="row">
          
              <div class="rutas">

                  <ul>
                      <li><a href="clientes.php">Lista de clientes</a></li>
                      <li><a href="facturas.php">Facturas</a></li>
                      <li><a href="citas.php">Citas</a></li>
                      <li><a href="empleadps.php">Empleados</a></li>
                    </ul>    
                    
                    <?php if (isset($_POST["user"])) {

                            $consulta="select * from usuarios where
                            user='".$_POST["user"]."' and password='".$_POST{"password"}."'";

                            if ($result = $connection->query($consulta)) {

                            if ($result->num_rows===0) {

                                echo "LOGIN INVALIDO";

                            } else {

                                 while($obj = $result->fetch_object()) {

                                    $tipo = $obj->tipo;

                                }


                                $_SESSION["user"]=$_POST["user"];

                                    if ($tipo == 'admin') {

                                        header("Location: admin/index.php");

                                    } 

                                    elseif ($tipo == 'user') {

                                        header("Location: user/index.php");

                                    }
                                }

                        }       
                            else {
                            echo "Wrong Query";
                        }

                    } ?>
                </div>
              
          </div>
       
    </div>


  </body>
</html>
