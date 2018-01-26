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

      <?php  

            $connection = new mysqli("127.0.0.1", "root", "Admin2015", "clinica",3306);
            $connection->set_charset("uft8");
      
            if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
            }
        
      $id_emple = $_GET['id_empleado'];

      $query="SELECT * from empleados u where id_empleado = '".$id_emple."'";
      
      echo $query;
      
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
                    
                    <div class="table table-responsive">
                  
                    <table class="table">
                      
                      <thead class="tabla_head">
                        <tr>
                          <th>FECHA </th>
                          <th>HORA </th>
                          <th>MOTIVO </th>
                          <th>TOTAL A PAGAR(€) </th>
                          <th>CLIENTE AL QUE HA ATENDIDO</th>
                        </tr>  
          </thead>

                      <?php 
                    
                            $query="SELECT c.*, f.*, u.nombre, u.apellidos from empleados e
                                        join atender a on e.id_empleado = a.id_empleado 
                                        join citas c on a.numero_cita = c.numero
                                        join facturas f on c.numero = f.numero
                                        join usuarios u on u.id_usuario = c.id_usuario
                                        where c.id_usuario = '".$id."'";

                            if ($result = $connection->query($query)) {

                                while($obj = $result->fetch_object()) {
                                        echo "<tr>";
                                        echo "<td>".$obj->fecha."</td>";
                                        echo "<td>".$obj->hora."</td>";
                                        echo "<td>".$obj->motivo."</td>";
                                        echo "<td>".$obj->cantidad."</td>";
                                        echo "<td><a href='.php?id=".$obj->id_usuario."'>".$obj->apellidos.", ".$obj->nombre."</a></td>";
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