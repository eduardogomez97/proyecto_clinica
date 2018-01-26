<?php

  session_start();
  if ($_SESSION["user"] == 'admin') {

  } else {
      
    session_destroy();
    header("Location: ../login.php");
      
  }

include_once '../../funciones.php';

 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>CLIENTES</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../estilo.css">
  </head>
  <body>

      <?php if (!isset($_POST["id"])) : ?>
      
      <?php  
   
            $connection = new mysqli("127.0.0.1", "root", "Admin2015", "clinica",3306);
            $connection->set_charset("uft8");
      
            if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
            }
        
      $id = $_GET['id_usuario'];
      
      $query="SELECT * from usuarios u where id_usuario = '".$id."'";
      
      if ($result = $connection->query($query)) {

                                 while($obj = $result->fetch_object()) {
                                       
                                        
                                       $id=$obj->id_usuario;
                                       $tipo=$obj->tipo;
                                       $user=$obj->user;
                                       $nombre=$obj->nombre;
                                       $apellidos=$obj->apellidos;
                                       $telefono=$obj->telefono;
                                       $pass=$obj->password;
                                     $user=$obj->user;
                                       
                                    
                                  }
      }
      ?>
      
      <div class="container">
          
         <?php
          titulo();
          barra_informe();
          ?>
          
          <form method="post">
              
                <fieldset class="form-group">
                <label for="first_name">Nombre</label>
                <input type='text' class='form-control' id='first_name' name='nombre' value="<?php echo $nombre; ?>">
                    
                </fieldset>
              
                <fieldset class="form-group">
                <label for="last_name">Apellidos</label>
                <input type='text' class='form-control' id='first_name' name='apellidos' value="<?php echo $apellidos; ?>">
                </fieldset>
              
                <fieldset class="form-group">
                <label for="last_name">Telefono</label>
                <input type='text' class='form-control' id='first_name' name='telefono' value="<?php echo $telefono; ?>">    
                </fieldset>
              
                <input type='hidden' name='id' value="<?php echo $id; ?>"> 
                <input type='hidden' name='tipo' value="<?php echo $tipo; ?>"> 
                <input type='hidden' name='pass' value="<?php echo $pass; ?>"> 
                <input type='hidden' name='user' value="<?php echo $user; ?>"> 
              
                <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#flipFlop">Modificar</button>

                    <!-- The modal -->
                    <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                     <h4 class="modal-title" id="modalLabel">¿Estas seguro?</h4>
                                    <h4 class="modal-title" id="modalLabel">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </h4>
                                    
                                   
                                    
                                </div>
                                
                                <div class="modal-body">
                                    Debes de estar seguro de querer modificar los datos del cliente porque esto puede afectar seriamente al sistema.
                                </div>

                                <div class="modal-footer">
                                    
                                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                
              
          </form>
      </div>
      
      
      <?php
      estilo();
      ?>

      <?php else: ?>
      
      <?php 

        $connection = new mysqli("127.0.0.1", "root", "Admin2015", "clinica",3306);
            $connection->set_charset("uft8");
      
            if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
            }
      
        $query="Update usuarios SET 
        id_usuario='".$_POST["id"]."',
        nombre='".$_POST["nombre"]."',
        apellidos='".$_POST["apellidos"]."',
        telefono='".$_POST["telefono"]."',
        user='".$_POST["user"]."',
        password='".$_POST["pass"]."',
        tipo='".$_POST["tipo"]."'
        WHERE id_usuario='".$_POST["id"]."'";
      
      
        if ($result = $connection->query($query)) {
            
            header('Location: ../clientes.php');

            
        } else {
            
            echo "pos no";
        }


      
      ?>
      
      <?php endif?>
      
  </body>
</html>