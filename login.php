<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href=" ">
  </head>
  <body>

    <?php
        
        if (isset($_POST["usuario"])) {

         
          include("funciones.php");
          conectar();

          
          $consulta="select * from usuarios where
          username='".$_POST["usuario"]."' and password=md5('".$_POST["password"]."');";

         
          if ($result = $connection->query($consulta)) {

              if ($result->num_rows===0) {
                  
                echo "LOGIN INVALIDO";
                  
              } else {
                
                $_SESSION["usuario"]=$_POST["usuario"];
                
                  if ($_POST["tipo"]= "admin") {
                      
                      header("Location: admin/index.php");
                      
                  } else {

                header("Location: index.php");
              }
              }

          } else {
            echo "Wrong Query";
          }
        }
      
    ?>

    <form action="login.php" method="post">

      <p><input name="user" required></p>
      <p><input name="password" type="password" required></p>
      <p><input type="submit" value="Entrar"></p>
        <hr>
      <p>¿Aun no te has registrado?</p>
      <p><a href='registrarse.php'><input type="submit" value="Registrarse"></a></p>

    </form>



  </body>
</html>