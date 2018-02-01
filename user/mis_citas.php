<fieldset class="form-group">
                    
                  <label for="last_name">Lista de todas sus citas:</label>
                    
                    <div class="table table-responsive">
                  
                    <table class="table">
                      
                      <thead class="tabla_head">
                        <tr>
                          <th>ID_CITA </th>
                          <th>FECHA </th>
                          <th>HORA </th>
                          <th>MOTIVO </th>
                          <th>TOTAL A PAGAR(€) </th>
                          <th>RESPONSABLE QUE LE HA ATENDIDO</th>
                        </tr>  
          </thead>

                      <?php 
                    
                            $query="SELECT c.*, f.*, e.id_empleado, e.nombre, e.apellidos from citas c
                                        join atender a on c.numero = a.numero_cita 
                                        join empleados e on a.id_empleado = e.id_empleado
                                        join facturas f on c.numero = f.numero
                                        where c.id_usuario = '".$id."'";

                            if ($result = $connection->query($query)) {

                                while($obj = $result->fetch_object()) {
                                        echo "<tr>";
                                        echo "<td>".$obj->numero."</a></td>";
                                        echo "<td>".$obj->fecha."</td>";
                                        echo "<td>".$obj->hora."</td>";
                                        echo "<td>".$obj->motivo."</td>";
                                        echo "<td>".$obj->cantidad."</td>";
                                        echo "<td><a href='../empleados/informe.php?id=".$obj->id_empleado."'>".$obj->apellidos.", ".$obj->nombre."</a></td>";
                                      echo "</tr>";
                                  }

                          $result->close();
                          unset($obj);
                          unset($connection);
                      } 
                    ?>

                  
                  </table>
                  
              </div>  
              </fieldset>