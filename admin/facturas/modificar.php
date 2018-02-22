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

      <?php if (!isset($_POST["id"])) : ?>
      
      <?php  
   
      $connection=conectar();
        
      $id = $_GET['id_factura'];
      
      $query="select f.*, c.*, e.* from facturas f 
      join citas c on f.numero = c.numero 
      join atender a on c.numero = a.numero_cita
      join empleados e on a.id_empleado = e.id_empleado where id_factura = '".$id."'";
      
      if ($result = $connection->query($query)) {

                                 while($obj = $result->fetch_object()) {
                                       
                                       $numero=$obj->numero;
                                       $cantidad=$obj->cantidad;
                                       $fecha=$obj->fecha;
                                       $motivo=$obj->motivo;
                                       $hora=$obj->hora;
                                       $id_emple=$obj->id_empleado;
                                       $n=$obj->nombre;
                                       $a=$obj->apellido;
                                    
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
                    <label>Fecha de la cita</label>
                    <input type='text' class='form-control' name='fecha' value="<?php echo $fecha; ?>" required>   
                </fieldset>
              
                <fieldset class="form-group">
                    <label>Hora de la cita</label>
                    <input type='text' class='form-control' name='hora' value="<?php echo $hora; ?>" required>
                </fieldset>
              
                <fieldset class="form-group">
                    <label>Motivo por el cual el paciente acudio a la cita.</label>
                    <input type='text' class='form-control' name='motivo' value="<?php echo $motivo; ?>" required>    
                </fieldset>
              
                <fieldset class="form-group">
                    <label>Cantidad total a pagar.</label>
                    <input type='text' class='form-control' name='cantidad' value="<?php echo $cantidad; ?>" required>
                </fieldset>
              
                <fieldset class="form-group">
                  <label for="example-time-input" class="col col-form-label">Empleado que ha atendido la cita</label>
                  <select class="custom-select" name="id_empleado" required>
                          <?php
                                select_emple($_GET['$id_emple']);      
                            ?>
                  </select>
              </fieldset>    


              
              
              <input type='hidden' name='id' value="<?php echo $id; ?>"> 
                  <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#flipFlop">Modificar</button>   
          </form>
          
      </div>

      <?php else: ?>
      
      <?php 

            $connection = new mysqli("127.0.0.1", "root", "Admin2015", "clinica",3306);
            $connection->set_charset("utf8");
      
            if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
            }
      
        $query="Update citas SET
        fecha='".$_POST["fecha"]."',
        hora='".$_POST["hora"]."',
        motivo='".$_POST["motivo"]."'
        WHERE numero='".$_POST["id"]."'";
      
        if ($result = $connection->query($query)) {
            
            $query2="Update facturas SET
            cantidad='".$_POST["cantidad"]."'
            WHERE numero='".$_POST["id"]."'";
            
            
            if ($result = $connection->query($query2)) {
                
                $query3="Update atender SET
                id_empleado='".$_POST["id_empleado"]."'
                WHERE numero_cita='".$_POST["id"]."'";
            
            
            if ($result = $connection->query($query3)) {
            
            header('Location: ../citas.php');
            
            }
            
            } else {
                
                echo "error";
            } 
        
        } else {
            
            echo "pos no";
        }


      
      ?>
      
      <?php endif?>
      
  </body>
</html>