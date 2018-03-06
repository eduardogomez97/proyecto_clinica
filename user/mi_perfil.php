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
      
    <style>

        
        body {
            
            background: url(../imagenes/dental.jpg);
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
        #imagen {
            
            width:50%;
        
        }
        
    </style> 
      
  </head>
    <body>
      <?php  

      
      $connection=conectar();
        
      $user = $_GET['user'];
      
      $query="SELECT * from usuarios u where user = '".$user."'";
      
      if ($result = $connection->query($query)) {

                                 while($obj = $result->fetch_object()) {
                                       
                                       $id=$obj->id_usuario;    
                                       $user=$obj->user;
                                       $nombre=$obj->nombre;
                                       $apellidos=$obj->apellidos;
                                       $telefono=$obj->telefono;
                                       $foto=$obj->foto;
                                       
                                    
                                  }
      }
      ?>
      
      <div class="container">
          
         <?php
          
          titulo();
          navegador_user();
          ?>

          
              <div class="row">
                  
                  <div class="col-md-8">
                      <form method="post">
                      <fieldset class="form-group">
                          <label>Nombre: </label>
                          <input class='form-control' type='text' name='nombre' value="<?php echo $nombre; ?>">
                      </fieldset>
              
                      <fieldset class="form-group">
                            <label>Apellidos: </label>
                            <input class='form-control' type='text' name='apellidos' value="<?php echo $apellidos; ?>">    
                      </fieldset>
              
                      <fieldset class="form-group">
                            <label>Telefono</label>
                            <input class='form-control' type='text' name='telefono' value="<?php echo $telefono; ?>">    
                      </fieldset>
                          <input type="submit" name='datos' class="btn btn-primary" value="Modificar tu perfil">
                    </form>
                    </div>  
                  
                      <?php  if(isset($_POST['datos'])): ?>
                      <?php 

                            $connection = new mysqli("127.0.0.1", "root", "Admin2015", "clinica",3306);
                                $connection->set_charset("uft8");

                                if ($connection->connect_errno) {
                                  printf("Connection failed: %s\n", $connection->connect_error);
                                  exit();
                                }

                            $query="Update usuarios SET 
                            nombre='".$_POST["nombre"]."',
                            apellidos='".$_POST["apellidos"]."',
                            telefono='".$_POST["telefono"]."'
                            WHERE user='".$user."'";


                            if ($connection->query($query)) {

 header("Location: ../login.php");

                            } else {

                                echo "pos no";
                            }

                          ?>
                      
                      <?php endif; ?>
                      
                  
                  
                  
                  <div class="col-md-4">
                      <form method="post" enctype="multipart/form-data">
                      <?php

                        if (!empty($foto)) {

                            echo "<center><img id='imagen' src='../$foto'></center> <br>";
                            echo "<input class='form-control' name='image' type='file'/> <br>";
                            echo "<input type='submit' name='foto'  class='btn btn-primary' value='Modificar tu foto'>";


                        } else {

                            echo "<center><img id='imagen' src='../imagenes/usuario.png' ></center> <br>";
                            echo "<input class='form-control' name='image' type='file' /><br>";
                            echo "<input type='submit' name='foto' class='btn btn-primary'value='Modificar tu foto'>";

                        }


                      ?>
                          
                        </form>
                      
                      <?php  if(isset($_POST['foto'])): ?>
                      <?php 
                     

                        $tmp_file = $_FILES['image']['tmp_name'];

                        $target_dir = "../imagenes/";

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
                            
                            $query="Update usuarios SET 
                            foto='".$target_file."'
                            WHERE user='".$user."'";
                        
                            
                            if ($connection->query($query)) {
                                
                              header("Location: index.php");
                                

                                }  else {

                                    echo "ERROR. <br>";
                          }                            
                        }
                      ?>
                      <?php endif; ?>
                          </div>
                  
                  
              </div>
        </div>
    </body>
</html> 