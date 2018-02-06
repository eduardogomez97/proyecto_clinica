<?php
include_once 'funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>REGISTRO</title>
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
      
      <?php if (!isset($_POST["user"])) : ?>

      
     <div class="container-fluid">
         
         <?php
            titulo();
         ?>
                
         <div class="row">
             
             <div id="login" class="col-md-12">

                        <form method="post">

                            <span>Usuario</span>
                            <span><input name="user" required></span><br>
                            <span>Contraseña</span>
                            <span><input name="password" type="password" required></span><br>
                            <span>Nombre</span>
                            <span><input name="nombre" required></span><br>
                            <span>Apellidos</span>
                            <span><input name="apellidos" required></span><br>
                            <span>Telefono</span>
                            <span><input name="telefono" required></span><br>

                            <p><center><input type="submit" value="Registrarse"><a href="login.php">Volver</a></center></p> 
                            
                        </form>
                </div>               
             </div>
     </div>     
        
      
      <?php else: ?>
        <?php
        
        $user = $_POST["user"];
        $password = $_POST["password"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $telefono = $_POST["telefono"];
        $tipo = $_POST["tipo"];

        $query= "select * from usuarios where user ='$user'";
      
      
        if ($result = $connection->query($query)) {
            
            if ($result -> num_rows==1) {
                
                echo "EL USUARIO YA EXISTE";
            } else {
                
                 $query = "INSERT INTO usuarios (nombre,apellidos,telefono,user,password,tipo)
                 VALUES ('$nombre','$apellidos','$telefono','$user','$password','user')";
                

                if ($connection->query($query)) {

                      header("Location: login.php");

                } else {

                            echo "ERROR AL REGISTRARTE. <br>";
                  }

                }
            }

        ?>


      <?php endif ?>

  </body>
</html>