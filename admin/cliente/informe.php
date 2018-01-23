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

      if (empty($_GET)) {
          echo "No tengo de la reparación";
          exit();
        }
      
            $connection = new mysqli("127.0.0.1", "root", "Admin2015", "clinica",3306);
            $connection->set_charset("uft8");
      
            if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
            }
        
      $id = $_GET['id_usuario'];
      
      $query="SELECT u.*, c.* from usuarios u 
            
                join citas c on u.id_usuario = c.id_usuario where id_usuario = '".$id."'";
      
      if ($result = $connection->query($query)) {

                                while($obj = $result->fetch_object()) {
                                       
                                        
                                       $user=$obj->user;
                                       $nombre=$obj->nombre;
                                       $apellidos=$obj->apellidos;
                                       $telefono=$obj->telefono;
                                       $fecha=$obj->fecha;
                                       $hora=$obj->hora;
                                       $motivo=$obj->motivo;
                                       $id_cita=$obj->numero;
                                    
                                    
                                    
                                  }
      ?>
      
      <div class="container">
          
         <?php
          titulo();
          ?>
          
          <form action="/html/tags/html_form_tag_action.cfm">
              
              <fieldset>
                <img src="/pix/samples/9s.jpg" class="rounded-circle"> <br> 
              </fieldset>
              
              <fieldset class="form-group">
                  
                    
                    <label for="first_name">Nombre: </label>
                    <label for="first_name"><?php echo $nombre; ?> </label>  
              </fieldset>
              
              <fieldset class="form-group">
                    <label for="last_name">Apellidos</label>
                    <label for="first_name"><?php echo $nombre; ?> </label>  
              </fieldset>
              
              <fieldset class="form-group">
                    <label for="last_name">Telefono</label>
                    <label for="first_name"><?php echo $telefono; ?> </label>  
              </fieldset>
              
              <fieldset class="form-group">
                    <label for="last_name">Lista de todas sus citas</label>
                    
                    <div class="table table-responsive">
                  
                    <table class="table">
                      
                      <thead class="tabla_head">
                        <tr>
                          <th>ID_CLIENTE </th>
                          <th>USUARIO </th>
                          <th>NOMBRE </th>
                          <th>APELLIDOS </th>
                          <th>TELEFONO </th>
                          <th>OPCIONES</th>
                        </tr>  
          </thead>

                      <?php 
                    
                            $query="select c.*, u.* from citas c 
                                    join usuarios u on c.id_usuario = u.id_usuario";
                      
                            if ($result = $connection->query($query)) {

                                while($obj = $result->fetch_object()) {
                                        echo "<tr>";
                                        echo "<td>".$obj->numero."</a></td>";
                                        echo "<td>".$obj->fecha."</td>";
                                        echo "<td>".$obj->hora."</td>";
                                        echo "<td>".$obj->motivo."</td>";
                                        echo "<td>".$obj->apellidos.", ".$obj->nombre."</td>";
                                      
                                        echo "<td> QUIEN LE ATENDIO

                                            <a href='informe.php?id=".$obj->IdReparacion."'><img src='images/eye.png' width='20' height='20' /></a>
                                            <a href='modificar_cliente.php?id=".$obj->IdReparacion."'><img src='images/person.png'width='20' height='20' /></a>
                                            <a href='borrar.php?id=".$obj->IdReparacion."'><img src='images/croos.png' width='20' height='20' /></a>



                                        </td>";
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