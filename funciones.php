<?php

function conectar() {

            $connection = new mysqli("127.0.0.1", "root", "Admin2015", "clinica",3306);
            $connection->set_charset("uft8");
      
            if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
            }
    
            return $connection;
    
}

function titulo(){
    
    echo "          <div class='row'>        
              
                    
                    <div id='titulo' class='col-md-12' >
          
                        
                           <h1  style='text-align: center'>Clinica Dental Gallego</h1>
                           
          
                    </div>
                     
              
          </div>  ";
}

function navegador_admin() {
    
    echo "<div class='row'>                 
              <nav class='navbar navbar-toggleable-md navbar-light bg-faded col-12'>
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                   <ul class='navbar-nav mr-auto'>
                       
                      <li class='nav-item active'>
                           <a class='nav-link' href='index.php'>Inicio <span class='sr-only'>(current)</span></a>
                      </li>

                       <li class='nav-item'>
                            <a class='nav-link' href='clientes.php'>Lista de clientes</a>
                       </li>

                       <li class='nav-item'>
                             <a class='nav-link' href='citas.php'>Citas</a>
                       </li>   
                       
                       <li class='nav-item'>
                             <a class='nav-link' href='empleados.php'>Empleados</a>
                       </li>
                                        
                   </ul>
                                      
                   <ul class='nav navbar-nav navbar-right'>
                       
                        <li>
                            <a href='mi_perfil.php'>
                                <button type='button'>";
                        echo $_SESSION['user'];
                            echo "
                            </a>
                        </li>
                        <li>
                             <a href='logout.php'><button type='button'>Cerrar sesion</button></a>
                        </li>

                    </ul>


                </div>
            </nav>                  
          </div> ";
    
}

function navegador_user() {
    
    echo "           <div class='row' >
                            
                                <nav class='navbar navbar-toggleable-md navbar-light bg-faded col-12'>

                                  <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                                    <ul class='navbar-nav mr-auto'>
                                      <li class='nav-item active'>
                                        <a class='nav-link' href='index.php'>Inicio <span class='sr-only'>(current)</span></a>
                                      </li>

                                      <li class='nav-item'>
                                        <a class='nav-link' href='pedir_cita.php'>Pedir cita</a>
                                      </li>

                                      <li class='nav-item'>
                                        <a class='nav-link' href='mis_citas.php'>Lista de tus citas</a>
                                      </li>     
                                      <li class='nav-item'>
                                        <a class='nav-link' href='nosotros.php'>Sobre Nosotros</a>
                                      </li>

                                    </ul>
                                    <ul class='nav navbar-nav navbar-right'>
                                   <li><a href='mi_perfil.php'><button type='button'></buttom> ";
                        echo $_SESSION['user'];
                            echo "</a></li>
                                    <li>
                                        <a href='logout.php'><button type='button'>Cerrar sesion</button></a>
                                    </li>

                                </ul>


                                  </div>

                            </nav>
                             
          </div>  ";   
}

function barra_informe(){
    
    echo "      
          <div class='row'>                 
              <nav class='navbar navbar-toggleable-md navbar-light bg-faded col-12'>
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                   <ul class='navbar-nav mr-auto'>
                       
                      <li class='nav-item active'>
                           <a class='nav-link' href='../index.php'>Inicio <span class='sr-only'>(current)</span></a>
                      </li>

                       <li class='nav-item'>
                            <a class='nav-link' href='../clientes.php'>Lista de clientes</a>
                       </li>

                       <li class='nav-item'>
                             <a class='nav-link' href='../citas.php'>Citas</a>
                       </li>   
                       
                       <li class='nav-item'>
                             <a class='nav-link' href='../empleados.php'>Empleados</a>
                       </li>
                                        
                   </ul>
                                      
                   <ul class='nav navbar-nav navbar-right'>
                       
                        <li>
                            <a href='mi_perfil.php'>
                                <button type='button'>";
                        echo $_SESSION['user'];
                            echo "
                            </a>
                        </li>
                        <li>
                             <a href='logout.php'><button type='button'>Cerrar sesion</button></a>
                        </li>

                    </ul>


                </div>
            </nav>                  
          </div> ";
}

function shear() {
    
    echo"<form class='navbar-form navbar-left' action='/action_page.php'>
                  <div class='form-group'>
                    <input type='text' class='form-control' placeholder='Search'>
                  </div>
                  <button type='submit' class='btn btn-default'>Submit</button>
                </form>";
}

function select_clie() {
    
    $connection=conectar();
    $query="select * from usuarios where id_usuario > 1 order by apellidos";
        
    if ($result = $connection->query($query)) {

                                while($obj = $result->fetch_object()) {
                                        echo "<option value=".$obj->id_usuario.">".$obj->apellidos.", ".$obj->nombre."</option>";
                                  }
 
    }
}

function select_emple(){
    
    $connection=conectar();
    $query="select * from empleados order by apellidos";
        
    if ($result = $connection->query($query)) {

                                while($obj = $result->fetch_object()) {
                                        echo "<option value=".$obj->id_empleado.">".$obj->apellidos.", ".$obj->nombre."</option>";
                                  }
 
    }
}

?>

