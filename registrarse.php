<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>

  </head>
  <body>
      
      <?php if (!isset($_POST["user"])) : ?>

      
        <form method="post">
          
            <span>Usuario</span>
            <span><input name="user" required></span><br>
            <span>Contraseña</span>
            <span><input name="password" type="password" required></span><br>
            <span>Nombre</span>
            <span><input name="nombre" required></span><br>
            <span>Apellidos</span>
            <span><input name="apellidos" required></span><br>
            <span>Telefono</span>
            <span><input name="telefono" required></span><br>
            
            <p><input type="submit" value="Registrarse"></p>
            
            <input name="tipo" value="user" style="visibility:hidden;">
        
        </form>
      
      <?php else: ?>

        <?php

       
             $connection = new mysqli("192.168.1.155", "root", "Admin2015", "clinica",3306);
             $connection->set_charset("uft8");

          
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

        $user = $_POST["user"];
        $password = $_POST["password"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $telefono = $_POST["telefono"];
        $tipo = $_POST["tipo"];

        $query = "INSERT INTO usuarios (id_usuario,nombre,apellidos,telefono,user,password,tipo)
        VALUES ( null,'$nombre','$apellidos','$telefono','$user','$password','$tipo')";

        if ($connection->query($query)) {

          echo "¡ESTAS REGISTRADO!. <br>";
            
          } else {
          echo "ERROR AL REGISTRARTE. <br>";
        }


        ?>

      <a href="login.php">Volver</a>
      
      <?php endif ?>

  </body>
</html>
