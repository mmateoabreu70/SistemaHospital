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
                <option value="">Enero</option>                                  
                <option value="">Febrero</option>
                <option value="">Marzo</option>
                <option value="">Abril</option>
                <option value="">Mayo</option>
                <option value="">Junio</option>
                <option value="">Julio</option>
                <option value="">Agosto</option>
                <option value="">Septiembre</option>
                <option value="">Octubre</option>
                <option value="">Noviembre</option>
                <option value="">Diciembre</option>
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

            $datos = gente::listado();
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
            }

            ?>
        </tbody>
    </table>
</div>
<?php
include_once("libreria/foot.php");
?>