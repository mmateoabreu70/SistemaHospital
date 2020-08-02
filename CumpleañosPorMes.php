<?php
  session_start();
include_once("libreria/includes.php");
$conexion = Conexion::getInstance();
?>
<div class="container">
    <!-- Nombre de la pagina -->  
     <h3 align ="center">     
     Cumpleaños
     </h3>
     <br>
     <!--Formulario de citas-->
     <div align ="center" >
       <div class="col col-sm-6">
         <form align="center" enctype="multipart/form-data" method="POST" action="">
         <!--Cumpleaños-->
         <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon" for="cumpleaños">Cumpleaños</label>
                <!--drop down list-->
                <select name="cumpleaños" class="form-control">                 
                <option value="">Seleccione un mes</option>
                <option value="01">Enero</option>                                  
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
                </select>
            </div>
         <button type="submit" name="consultarcumpleaños" class="btn btn-success">Consultar cumpleanños</button>
        </div>        
         </form>     
     </div>     
</div>
<div>
    <h4>Cumpleaños por mes</h4>
    <table class="table">
        <thead class="thead-dark">
            <tr>                             
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de nacimiento</th>                
                <th>Telefono</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_POST['consultarcumpleaños']))
            {
                $mes = $_POST['cumpleaños'];
                $query = "SELECT `nombre`,`apellido`,`nacimiento`,`telefono` FROM pacientes WHERE MONTH(`nacimiento`) = $mes";   
                $resultado = mysqli_query($conexion, $query);
                while($row=mysqli_fetch_array($resultado))
                {
                    echo "<tr>
                    <td>{$row['nombre']}</td>
                    <td>{$row['apellido']}</td>
                    <td>{$row['nacimiento']}</td>
                    <td>{$row['telefono']}</td>                                   
                    </tr>";
                }
            }

            /*$datos = gente::listado();
            $count = 0;
            foreach($datos as $fila){
                $count++;

                echo "<tr>
                <td>{$count}</td>
                <td>{$fila->cedula}</td>
                <td>{$fila->nombre}</td>
                <td>{$fila->apellido}</td>
                <td>{$fila->nacimiento}</td>
                <td>{$fila->tipoSangre}</td>
                <td>{$fila->telefono}</td>                
                </tr>";
            }*/
            ?>
        </tbody>
    </table>
</div>
<?php
include_once("libreria/foot.php");
?>