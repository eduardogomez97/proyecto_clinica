<?php

  session_start();
  if ($_SESSION["user"] == 'admin') {

  } else {
      
    session_destroy();
    header("Location: ../../login.php");
      
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

      <?php  

      $connection=conectar();
        
      $id_emple = $_GET['id'];

      $query="SELECT * from empleados u where id_empleado = '".$id_emple."'";
      
      if ($result = $connection->query($query)) {

                                 while($obj = $result->fetch_object()) {
                                       
                                        
                                       $nombre=$obj->nombre;
                                       $apellidos=$obj->apellidos;
                                       $telefono=$obj->telefono;
                                       
                                    
                                  }
      }
      ?>
      
      <div class="container">
          
         <?php
          titulo();
          barra_informe();
          ?>
          
          <form action="/html/tags/html_form_tag_action.cfm">
              
              <fieldset>
                <img src="../images/cliente/person.png" class="rounded-circle float-right" alt="Sample image"> <br> 
              </fieldset>
              
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
                    
                  <label for="last_name">Lista de todas sus citas a las que ha atendido:</label>
                    
                  <div class="row">
                  
                    <table class="table table-striped">
                      
                      <thead>
                        <tr>
                          <th>FECHA </th>
                          <th>HORA </th>
                          <th>MOTIVO </th>
                          <th>TOTAL COBRADO(€) </th>
                          <th>CLIENTE AL QUE HA ATENDIDO</th>
                        </tr>  
                        </thead>

                      <?php 
                        
                    
                            $query="SELECT c.*, f.*, u.id_usuario ,u.nombre, u.apellidos from atender a 
                                    join citas c on a.numero_cita = c.numero
                                    join facturas f on c.numero = f.numero
                                    join usuarios u on u.id_usuario = c.id_usuario
                                    where id_empleado = '".$id_emple."'";

                            if ($result = $connection->query($query)) {

                                while($obj = $result->fetch_object()) {
                                        echo "<tr>";
                                        echo "<td>".$obj->fecha."</td>";
                                        echo "<td>".$obj->hora."</td>";
                                        echo "<td>".$obj->motivo."</td>";
                                        echo "<td>".$obj->cantidad."</td>";
                                        echo "<td><a href='../clientes/informe.php?id_usuario=".$obj->id_usuario."'>".$obj->apellidos.", ".$obj->nombre."</a></td>";
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