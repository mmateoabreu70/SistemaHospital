<?php
session_start();
include_once("libreria/includes.php");

if(isset($_SESSION['user']))
{

    if($_POST)
    {
        $conexion = Conexion::getInstance();

        $fecha = $_POST['fechacita'];
        $fecha = date("Y-m-d", strtotime($fecha));  
        $fecha = "'$fecha'";              
        $query = "SELECT id, nombre, apellido, nomUser, apellidoUser, hora 
                  FROM citas   
                  INNER JOIN pacientes ON citas.paciente = pacientes.cedula
                  INNER JOIN usuarios ON citas.medico = usuarios.idUsuario
                  WHERE fechaCita = $fecha
                  ORDER BY hora asc"; 
        
        $resultado = null;
        $resultado = mysqli_query($conexion, $query);  
    }

}
else {
    header("Location:index.php");
}

?>


<div class="container">
    <!-- Nombre de la pagina -->  
     <h3 align ="center">     
     Buscar citas por fecha
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
         <button type="submit" name="consultarcitaporfecha" class="btn btn-success">Consultar</button>
        </div>        
         </form>     
     </div>     
</div>
<div>
    <h4>Citas encontradas</h4>
    <table class="table">
        <thead class="thead-dark">
            <tr>      
                <th>#</th>    
                <th>Hora</th>                   
                <th>Paciente</th>
                <th>Medico</th>               
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php

                $count = 0;
                if(empty($resultado) || !isset($resultado))
                {
                    echo "                      
                        <td colspan='5'>
                            <center>
                                No hay resultados
                            </center>
                        </td>                        
                    ";
                }else
                {
                    foreach($resultado as $row)
                    {
                        $count++;
    
                        echo "<tr>
                            <td>{$count}</td>
                            <td>{$row['hora']}</td>   
                            <td>{$row['nombre']} {$row['apellido']}</td>
                            <td>{$row['nomUser']} {$row['apellidoUser']}</td>
                            <td>
                                <a href='cita.php?id={$row['id']}' class='btn btn-info'>Ver</a>
                            </td>                                
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