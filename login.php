<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica Dental Gallego</title>
    <link rel="stylesheet" type="text/css" href=" ">
  </head>
  <body>

      <div id="container">
          
          <div id="titulo">
          
              <h1>Clinica Dental Gallego</h1>
          
          </div>
          
          <div id="sesion">
            
                <div id="login">
            
            <form action="login.php" method="post">

            <p><input name="user" required></p>
            <p><input name="passwd" type="password" required></p>
            <p><input type="submit" value="Entrar"></p>
            </form>    
                </div>
        <hr>
                <div id="registrarse">
      <p>¿Aun no te has registrado?</p>
      <p><a href='registrarse.php'><input type="submit" value="Registrarse"></a></p>
                </div>    
            </div> 
      
    <?php
        
        if (isset($_POST["user"])) {

         
           $connection = new mysqli("192.168.1.155", "root", "Admin2015", "clinica",3306);
           $connection->set_charset("uft8");


          
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          
          $consulta="select * from usuarios where
          user='".$_POST["user"]."' and password='".$_POST{"passwd"}."'";

         
          if ($result = $connection->query($consulta)) {

              if ($result->num_rows===0) {
                  
                echo "LOGIN INVALIDO";
                  
              } else {
                
                $_SESSION["user"]=$_POST["user"];
                  
                  if ($_POST["tipo"] == 'admin') {
                      
                      header("Location: admin/index.php");
                      
                  } 
                  
                  elseif ($_POST["tipo"] == 'user') {

                header("Location: user/index.php");
              }
              }

          } else {
            echo "Wrong Query";
          }
        }
      
    ?>

        
          
    </div>


  </body>
</html>