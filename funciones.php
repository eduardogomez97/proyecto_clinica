<?php
function conectar() {
  
            $connection = new mysqli("127.0.0.1", "root", "Admin2015", "clinica",3306);
          $connection->set_charset("uft8");


          
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
}

function estilo () {
    
    echo"<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>";
        
    echo"<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>";
    
}

function titulo(){
    
    echo "          <div class='row'>        
              
                    
                    <div id='titulo' class='col-md-12 centro' >
          
                        <center>
                           <h1>Clinica Dental Gallego</h1>
                        </center>    
          
                    </div>
                     
              
          </div>  ";
}

function navegador_admin() {
    
    echo "<nav class='navbar navbar-inverse'>
              
              <div class='container-fluid'>
                  
                <div class='navbar-header'>
                    
                  <a class='navbar-brand' href='index.php'>Inicio</a>
                    
                </div>
                <ul class='nav navbar-nav'>
                  <li><a href='clientes.php'>Lista de clientes</a></li>
                  <li><a href='facturas.php'>Facturas</a></li>
                  <li><a href='citas.php'>Citas</a></li>
                  <li><a href='empleados.php'>Empleados</a></li>
                    </ul>    
                
                <ul class='nav navbar-nav navbar-right'>
                    <li><a href=''><buttom class='glyphicon glyphicon-user'></buttom>Mi perfil</a></li>
                    <li><a href='logout.php'><buttom class='glyphicon glyphicon-log-in'></buttom> Cerrar sesion</a></li>
                </ul>
  
              </div>
            </nav>";
    
}

function navegador_user() {
    
    echo "<nav class='navbar navbar-inverse'>
              
              <div class='container-fluid'>
                  
                <div class='navbar-header'>
                    
                  <a class='navbar-brand' href='index.php'>Inicio</a>
                    
                </div>
                <ul class='nav navbar-nav'>
                  <li><a href='clientes.php'>Lista de clientes</a></li>
                  <li><a href='facturas.php'>Facturas</a></li>
                  <li><a href='citas.php'>Citas</a></li>
                  <li><a href='empleados.php'>Empleados</a></li>
                    </ul>    
                
                <ul class='nav navbar-nav navbar-right'>
                    <li><a href=''><buttom class='glyphicon glyphicon-user'></buttom>Mi perfil</a></li>
                    <li><a href='logout.php'><buttom class='glyphicon glyphicon-log-in'></buttom> Cerrar sesion</a></li>
                </ul>
  
              </div>
            </nav>";
    
}

function shear() {
    
    echo"<form class='navbar-form navbar-left' action='/action_page.php'>
                  <div class='form-group'>
                    <input type='text' class='form-control' placeholder='Search'>
                  </div>
                  <button type='submit' class='btn btn-default'>Submit</button>
                </form>";
}
?>

