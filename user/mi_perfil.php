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
    <title>CLIENTES</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../estilo.css">
  </head>
  <body>

      <?php  

      
      $connection=conectar();
        
      
      $query="SELECT * from usuarios u where user = '".$_SESSION["user"]."'";

      
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
                    
                  <label for="last_name">Lista de todas sus citas:</label>
                    
                    <div class="table table-responsive">
                  
                    <table class="table">
                      
                      <thead class="tabla_head">
                        <tr>
                          <th>ID_CITA </th>
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
                                        echo "<td>".$obj->numero."</a></td>";
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
