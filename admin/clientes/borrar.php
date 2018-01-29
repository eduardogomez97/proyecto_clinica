<?php

  session_start();
  if ($_SESSION["user"] == 'admin') {

  } else {
      
    session_destroy();
    header("Location: ../login.php");
      
  }

include_once '../../funciones.php';

 ?>

      <?php  

            $connection = new mysqli("127.0.0.1", "root", "Admin2015", "clinica",3306);
            $connection->set_charset("uft8");
      
            if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
            }
                  
            $id = $_GET['id_usuario'];
      
    
            $sql="delete from usuarios where id_usuario= ".$id."";
      
            mysql_query($sSQL);
      
      if (mysqli_query($connection, $sql)) {
    
           header('Location: ../clientes.php');
      
      } else {
            echo "Error deleting record: " . mysqli_error($conn);
      }

      mysqli_close($connection);
      
      ?>