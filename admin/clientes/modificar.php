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
    <title>Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../js/bootstrap.min.js">  
    <link rel="stylesheet" href="../../estilo.css">
      
    <style>

        
        body {
            
            background: url(../../imagenes/dental.jpg);
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

      <?php if (!isset($_POST["id"])) : ?>
      
      <?php  
   
      $connection=conectar();
        
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
          </form>
          
      </div>

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