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
      
           <div class="container"> 
      <?php  
      
            $connection=conectar();
            titulo();
            barra_informe()


      ?>

      <?php if (!isset($_POST["motivo"])) : ?>
    
        <form method="post">
          
          <div class="row">
              
            <div class="form-group">
              <label class="col-2 col-form-label">Motivo</label>
              <div class="col-12">
                  <textarea class="form-control" rows="1" name="motivo"></textarea>
              </div>
            </div>
              
            <div class="form-group">
              <label for="example-date-input" class="col-2 col-form-label">Fecha</label>
              <div class="col-12">
                <input class="form-control" type="date" name="fecha">
              </div>
            </div>
              
            <div class="form-group">
              <label for="example-time-input" class="col-2 col-form-label">Hora</label>
              <div class="col-12">
                <input class="form-control" type="time" value="13:45:00" name="hora">
              </div>
            </div> 
              
            <div class="form-group">
              <label class="col-2 col-form-label">Precio</label>
              <div class="col-12">
                <input class="form-control" type="" name="cantidad">
              </div>
            </div>   
    
          </div>
          
          <div class="row"> 
              
                <div class="form-group">
                  <label for="example-time-input" class="col col-form-label">Cliente</label>
                  <div class="col-12">
                      <select class="custom-select" name="id_usuario">
                          <?php
                                select_clie();      
                            ?>
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="example-time-input" class="col col-form-label">Empleado que va a atender la cita</label>
                  <div class="col-12">
                      <select class="custom-select" name="id_empleado">
                          <?php
                                select_emple();      
                            ?>
                      </select>
                  </div>
                </div>  

                <input type="submit" value="Agregar cita">
          
          </div>
        
        </form>    
        
        <?php else: ?>
        <?php

        $motivo = $_POST["motivo"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $id_u = $_POST["id_usuario"];
        $id_e = $_POST["id_empleado"];
        $cantidad = $_POST["cantidad"];


        $query= "select * from citas where fecha ='$fecha' and hora ='$hora'";  
          
        if ($result = $connection->query($query)) {
            
            if ($result -> num_rows==1) {
                
                echo "Ya existe una cita en este dia y fecha <br>";
                echo "<a href=nueva_cita.php><input type='button' value ='Volver'></a>";
            } else {
                $query= "select * from usuarios where id_usuario ='$id_u'";   
                if ($connection->query($query)) {
                    $query2 = "INSERT INTO citas (motivo,fecha,hora,id_usuario)
                    VALUES ('$motivo','$fecha','$hora','$id_u')";
                    if ($connection->query($query2)) {    
                        $query3= "select * from citas where id_usuario ='$id_u' and motivo ='$motivo' and fecha ='$fecha' 
                        and hora ='$hora'";         
                        if ($result = $connection->query($query3)) {

                            $obj = $result->fetch_object();
                            $numero = $obj->numero;
                            $query4 = "INSERT INTO atender (numero_cita, id_empleado) VALUES ('$numero','$id_e')";
                            echo $query4;
                            if ($connection->query($query4)) {
                                echo "punto";
                                $query5 = "INSERT INTO facturas (cantidad, numero) VALUES ('$cantidad','$numero')";
                                echo $query5;
                                if ($connection->query($query5)) {
                                    header("Location: ../citas.php");
                                }
                            } else { echo "prueba"; }
                        } 
                    } else {
                        echo "ERROR AL INSERTAR CITA. <br>";
                    }
                }


                    }
        }
        
          

            

        ?>


      <?php endif ?>
          
          
      </div>
     
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
      
  </body>
</html>
