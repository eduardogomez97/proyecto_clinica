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
                .container-fluid {
            
            margin: auto; 
            background-color: white;
            -webkit-box-shadow: 0px 0px 13px 1px rgba(0,0,0,0.79);
            -moz-box-shadow: 0px 0px 13px 1px rgba(0,0,0,0.79);
            box-shadow: 0px 0px 13px 1px rgba(0,0,0,0.79);
            
        }  
        
    </style>  
      
  </head>
  <body>
      
      
      <?php

       
      $connection=conectar();
      
      ?>
      
      

      
     <div class="container-fluid">
         
         <?php
            titulo();
         ?>
         <?php if (!isset($_POST["user"])) : ?>
                
         <div class="row">
             
             <div id="login" class="col-md-12">

                        <form enctype="multipart/form-data" method="POST">

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
                            
                            Foto de perfil: <input class="form-control" name="image" type="file" />
                            
                            <p><center><input type="submit" value="Registrarse"><a href="login.php">Volver</a></center></p> 
                            
                        </form>
                </div>               
             </div>
     </div>     
        
      
      <?php else: ?>
        <?php
        
                $tmp_file = $_FILES['image']['tmp_name'];
                
                $target_dir = "imagenes/";
               
                $target_file = strtolower($target_dir . basename($_FILES['image']['name']));
               
                $valid= true;

                

                if ($_FILES['imagen']['size'] > (2048000)) {
			            $valid = false;
			            echo 'Oops!  Your file\'s size is to large.';
		            }
               
                $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); 
                if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
                  $valid = false;
                  echo "Only JPG, JPEG, PNG & GIF files are allowed";
                }
                if ($valid) {
                  
                  move_uploaded_file($tmp_file, $target_file);
      
                $user = $_POST["user"];
                $password = $_POST["password"];
                $nombre = $_POST["nombre"];
                $apellidos = $_POST["apellidos"];
                $telefono = $_POST["telefono"];

                $query= "select * from usuarios where user ='$user'";


                if ($result = $connection->query($query)) {

                    if ($result -> num_rows==1) {

                        echo "EL USUARIO YA EXISTE";
                    } else {

                         $query = "INSERT INTO usuarios (nombre,apellidos,telefono,user,password,tipo,foto)
                         VALUES ('$nombre','$apellidos','$telefono','$user',md5('$password'),'user','$target_file')";

                        if ($connection->query($query)) {

                              header("Location: login.php");

                        } else {

                                    echo "ERROR AL REGISTRARTE. <br>";
                          }

                        }
                    }
                }

            ?>
      


      <?php endif ?>

  </body>
</html>