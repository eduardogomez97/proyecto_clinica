<?php

  session_start();
  if ($_SESSION["user"] == 'admin') {

  } else {
      
    session_destroy();
    header("Location: ../login.php");
      
  }
 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo.css">
  </head>
  <body>

      <?php  
      
            include 'funciones.php';
     
            $connection = new mysqli("127.0.0.1", "root", "Admin2015", "clinica",3306);
            $connection->set_charset("uft8");
      
            if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
            }
        
      
      
      ?>
      
      <div class="container">
          
          <div class="row">        
              
                    
                    <div id="titulo" class="col-md-12 centro" >
          
                        <center>
                           <h1>Clinica Dental Gallego</h1>
                        </center>    
          
                    </div>
                     
              
          </div>      
          
          <nav class="navbar navbar-inverse">
              
              <div class="container-fluid">
                  
                <div class="navbar-header">
                    
                  <a class="navbar-brand" href="index.php">Inicio</a>
                    
                </div>
                <ul class="nav navbar-nav">
                  <li><a href="clientes.php">Lista de clientes</a></li>
                  <li><a href="facturas.php">Facturas</a></li>
                  <li><a href="citas.php">Citas</a></li>
                  <li><a href="empleados.php">Empleados</a></li>
                    </ul>    
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><buttom class="glyphicon glyphicon-user"></buttom> Mi perfil</a></li>
                    <li><a href="logout.php"><buttom class="glyphicon glyphicon-log-in"></buttom> Cerrar sesion</a></li>
                </ul>
                <form class="navbar-form navbar-left" action="/action_page.php">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                </form>  
              </div>
            </nav> 

          <div class="table-responsive ajuste">
                  
                  <table class="table">
                      
                      <thead class="tabla_head">
                        <tr>
                          <th>ID_EMPLEADO </th>
                          <th>NOMBRE </th>
                          <th>APELLIDOS </th>
                          <th>TELEFONO </th>
                          <th>OPCIONES</th>
                        </tr>  
          </thead>

                      <?php 
                      
                            $query="select e.*, a.*  from empleados e 
                                    join atender a on e.id_empleado = a.id_empleado;";
                            if ($result = $connection->query($query)) {

                                while($obj = $result->fetch_object()) {
                                        echo "<tr>";
                                        echo "<td>".$obj->id_empleado."</a></td>";
                                        echo "<td>".$obj->nombre."</td>";
                                        echo "<td>".$obj->apellidos."</td>";
                                        echo "<td>".$obj->telefono."</td>";
                                        echo "<td> 

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
              
      </div>


  </body>
</html>