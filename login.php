<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo.css">
  </head>
  <body>

      <?php   
      
            include(funciones.php);
      
      
            $connection = new mysqli("192.168.1.155", "root", "Admin2015", "clinica",3306);
            $connection->set_charset("uft8");
      
            if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
            }

      ?>
      
      <div class="container">
          
          <center>
          
          <div class="row ">        
              
                    <div id="titulo" class="col-md-6 centro" >
          
                            <h1>Clinica Dental Gallego</h1>
          
                    </div>
              
          </div>
          <div class="row">
          
              <div id="login" class="col-md-6 centro">
            
                    <form action="login.php" method="post">

                        <p><span>Usuario:</span><input name="user" required></p>
                        <p><span>Contraseña:</span><input name="password" type="password" required></p>
                        <p><input type="submit" value="Entrar"></p>
                    </form>    
                    
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
          <div class="row">
          
              <div id="registrarse" class="col-md-6 centro">
                    <center>
                  
                    <p>¿Aun no te has registrado?</p>
                    <p><a href='registrarse.php'><input type="submit" value="Registrarse"></a></p>
                  </center>
                </div>    
          
          </div>

        </center>
       
    </div>
      
      
      

  </body>
</html>