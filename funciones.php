<?
function conectar() {
  
            $connection = new mysqli("localhost", "root", "Admin2015", "clinica",3306);
          $connection->set_charset("uft8");


          
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
}
?>