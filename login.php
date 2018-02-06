<?php
  session_start();
  include_once 'funciones.php';

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>CLINICA DENTAL GALLEGO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">  
    <link rel="stylesheet" href="estilo.css">
    <style>
    
        html, body {
            
            height: 100%;
        }
        
        body {
            
            background: url(imagenes/dental.jpg);
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
     
            $connection = new mysqli("127.0.0.1", "root", "Admin2015", "clinica",3306);
            $connection->set_charset("uft8");
      
            if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
            }
      

      ?>
      
      <div class="container-fluid" style="margin: auto">

          <?php
          titulo();
          ?>
          
          <div class="row">
          
              <div id="login" class="col-md-12">
            
                    <form action="login.php" method="post">

                        <p><span>Usuario:</span><input name="user" required></p>
                        <p><span>Contraseña:</span><input name="password" type="password" required></p>
                        <p><center><input type="submit" value="Entrar"></center></p>
                    </form>    
                    
                    <?php if (isset($_POST["user"])) {

                            $consulta="select * from usuarios where
                            user='".$_POST["user"]."' and password='".$_POST{"password"}."'";

                            if ($result = $connection->query($consulta)) {

                            if ($result->num_rows===0) {

                                echo "<center><p class='mensaje_error'>Usuario o contraseña invalidos.</p></center>";

                            } else {

                                 while($obj = $result->fetch_object()) {

                                    $tipo = $obj->tipo;
                                    $id= $obj->id_usuario;

                                }


                                $_SESSION["user"]=$_POST["user"];
                                $_SESSION["id"]=$id;

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
          
              <div id="registrarse" class="col-md-12">
                    <center>
                  
                    <p>¿Aun no te has registrado?</p>
                    <p><a href='registrarse.php'><input type="submit" value="Registrarse"></a></p>
                  </center>
                </div>    
          
          </div>
       
    </div>

  </body>
</html>