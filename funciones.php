<?php
function titulo(){
    
    echo "          <div class='row'>        
              
                    
                    <div id='titulo' class='col-md-12' >
          
                        
                           <h1  style='text-align: center'>Clinica Dental Gallego</h1>
                           
          
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
                  <li><a href='citas.php'>Citas</a></li>
                  <li><a href='empleados.php'>Empleados</a></li>
                    </ul>    
                
                <ul class='nav navbar-nav navbar-right'>
                    <li><a href=''><buttom class='glyphicon glyphicon-user'></buttom> ";
        echo $_SESSION['user'];
            echo "</a></li>
                    <li><a href='logout.php'><buttom class='glyphicon glyphicon-log-in'></buttom> Cerrar sesion</a></li>
                </ul>
  
              </div>
            </nav>";
    
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
    
    echo "<nav class='navbar navbar-inverse'>
              
              <div class='container-fluid'>
                  
                <div class='navbar-header'>
                    
                  <a class='navbar-brand' href='../index.php'>Inicio</a>
                    
                </div>
                <ul class='nav navbar-nav'>
                  <li><a href='../clientes.php'>Lista de clientes</a></li>
                  <li><a href='../citas.php'>Citas</a></li>
                  <li><a href='../empleados.php'>Empleados</a></li>
                    </ul>    
                
                <ul class='nav navbar-nav navbar-right'>
                    <li><a href=''><buttom class='glyphicon glyphicon-user'></buttom>Mi perfil</a></li>
                    <li><a href='../logout.php'><buttom class='glyphicon glyphicon-log-in'></buttom> Cerrar sesion</a></li>
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

