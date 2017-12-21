<?
function conectar() {
  
            $connection = new mysqli("192.168.1.155", "root", "Admin2015", "tf",3306);
          $connection->set_charset("uft8");


          
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
}
?>