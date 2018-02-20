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
            
            width:15%;
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
          
          <form action="/html/tags/html_form_tag_action.cfm">
              
              <?php
              
                if (!isset($_foto)) {
                    
                    echo "<img id='imagen' src='../imagenes/usuario.png' class='rounded-circle float-right' > <br>";
                    
                } else {
                    
                    echo "<img id='imagen' src='$foto' class='rounded-circle float-right' > <br>";
                    
                }
                
              
              ?>

                
              
              <fieldset class="form-group">
                  
                    
                    <label for="first_name">Nombre: </label>
                    <label for="first_name"><?php echo $nombre; ?> </label>  
              </fieldset>
              
              <fieldset class="form-group">
                    <label for="last_name">Apellidos: </label>
                    <label for="first_name"><?php echo $apellidos; ?> </label>  
              </fieldset>
              
              <fieldset class="form-group">
                    <label for="last_name">Telefono</label>
                    <label for="first_name"><?php echo $telefono; ?> </label>  
              </fieldset>
              
              <fieldset class="form-group">
                    
                  <label for="last_name">Lista de todas sus citas:</label>
                    
                  <div class="row">
                  
                    <table class="table table-striped">
                      
                      <thead>
                        <tr>

                          <th>FECHA </th>
                          <th>HORA </th>
                          <th>MOTIVO </th>
                          <th>TOTAL A PAGAR(€) </th>
                          <th>RESPONSABLE QUE LE HA ATENDIDO</th>
                        </tr>  
                      </thead>

                      <?php 
                    
                            $query="SELECT c.*, f.*, e.id_empleado, e.nombre, e.apellidos from citas c
                                        join atender a on c.numero = a.numero_cita 
                                        join empleados e on a.id_empleado = e.id_empleado
                                        join facturas f on c.numero = f.numero
                                        where c.id_usuario = '".$id."'";

                            if ($result = $connection->query($query)) {

                                while($obj = $result->fetch_object()) {
                                        echo "<tr>";

                                        echo "<td>".$obj->fecha."</td>";
                                        echo "<td>".$obj->hora."</td>";
                                        echo "<td>".$obj->motivo."</td>";
                                        echo "<td>".$obj->cantidad."</td>";
                                        echo "<td><a href='../empleados/informe.php?id=".$obj->id_empleado."'>".$obj->apellidos.", ".$obj->nombre."</a></td>";
                                      echo "</tr>";
                                  }

                          $result->close();
                          unset($obj);
                          unset($connection);
                      } 
                    ?>

                  
                  </table>
                  
              </div>  
              </fieldset>
            
        </form>
          
             
      </div>
    </body>
</html> 