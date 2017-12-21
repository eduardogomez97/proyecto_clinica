<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERTAR FACTURA</title>

  </head>
  <body>
      
      <?php if (!isset($_POST["usuario"])) : ?>

      
        <form method="post">
          
            <span>Usuario</span>
            <span><input name="usuario" required></span><br>
            <span>Contraseña</span>
            <span><input name="password" type="password" required></span><br>
            <span>Nombre</span>
            <span><input name="nombre" required></span><br>
            <span>Apellidos</span>
            <span><input name="apellidos" required></span><br>
            <span>Telefono</span>
            <span><input name="telefono" required></span><br>
            
            <p><input type="submit" value="Registrarse"></p>
        
        </form>
      
      <?php else: ?>

        <?php

       
        include("funciones.php");
        conectar();
      
        
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $telefono = $_POST["telefono"];

        $query = "INSERT INTO usuarios(id_usuario,nombre,apellidos,telefono,usuario,password)
        VALUES ('$cod_cliente','$nombre','$apellidos','$telefono','$usuario','$password')";

        echo $query;

        if ($connection->query($query)) {

          echo "CLIENTE INSERTADO";

          $query ="SELECT * FROM usuarios";

          if ($result = $connection->query($query)) {
            echo "<table>";

            while($obj = $result->fetch_object()) {
                
                echo "<tr>";
                
                    echo "<td>".$obj->Cod_Cliente."</td>";
                  echo "<td>".$obj->DNI."</td>";
                  echo "<td>".$obj->Nombre."</td>";
                  echo "<td>".$obj->Apellidos."</td>";
                  echo "<td>".$obj->Direccion."</td>";
                  echo "<td>".$obj->Telefono."</td>";
                echo "</tr>";
            }
            echo "</table>";
          }

        } else {
          echo "ERROR AL INSERTAR CLIENTE";
        }


        ?>

      <?php endif ?>

  </body>
</html>

      
  </body>
</html>
