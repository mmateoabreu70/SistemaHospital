<?php
session_start();
include_once("libreria/includes.php");

if($_SESSION['rol'] == 'Asistente' || $_SESSION['rol'] == 'Medico')
{
    $conexion = Conexion::getInstance();
}
else {
    header("Location:index.php");
}
?>


<div class="container">
    <!-- Nombre de la pagina -->  
     <h3 align ="center">     
     Citas
     </h3>
     <br>
     <!--Formulario de citas-->
     <div align ="center" >
       <div class="col col-sm-6">
         <form align="center" enctype="multipart/form-data" method="POST" action="">
         <!--Citas-->
         <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon" for="citas">Fecha</label>
                <!--Input tipo date-->
                <input type="date" name="fechacita" id="fechacita" class="form-control"/>                     
            </div>
         <button type="submit" name="consultarcitaporfecha" class="btn btn-success">Consultar cita por fecha</button>
        </div>        
         </form>     
     </div>     
</div>
<div>
    <h4>Citas pendientes</h4>
    <table class="table">
        <thead class="thead-dark">
            <tr>                             
                <th>Paciente</th>
                <th>Medico</th>
                <th>Fecha</th>                
                <th>Hora</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_POST['consultarcitaporfecha']))
            {
                $fecha = $_POST['fechacita'];
                $fecha = date("Y-m-d", strtotime($fecha));  
                $fecha = "'$fecha'";              
                $query = "SELECT `paciente`,`medico`,`fechaCita`,`hora` FROM citas WHERE fechaCita = $fecha";                   
                $resultado = mysqli_query($conexion, $query);                                     
                while($row=mysqli_fetch_array($resultado))
                {
                    echo "<tr>
                    <td>{$row['paciente']}</td>
                    <td>{$row['medico']}</td>
                    <td>{$row['fechaCita']}</td>
                    <td>{$row['hora']}</td>                                   
                    </tr>";
                }
            }           
            ?>
        </tbody>
    </table>
</div>

<?php
include_once("libreria/foot.php");
?>