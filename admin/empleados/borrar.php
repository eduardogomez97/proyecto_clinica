<?php

  session_start();
  if ($_SESSION["user"] == 'admin') {

  } else {
      
    session_destroy();
    header("Location: ../../login.php");
      
  }

include_once '../../funciones.php';
 ?>

      <?php  

      $connection=conectar();  
            $id = $_GET['id_empleado'];
      
    
            $sql="delete from empleados where id_empleado= ".$id."";
      
            mysql_query($sql);
      
      if (mysqli_query($connection, $sql)) {
    
           header('Location: ../empleados.php');
      
      } else {
            echo "Error deleting record: " . mysqli_error($conn);
            echo $id;
            echo $sql;
      }

      mysqli_close($connection);
      
      ?>