<?php
    session_start();
    include_once("libreria/includes.php");
    
    if($_SESSION['rol'] == 'Asistente')
    {      
        
    }
    else
    {
        header("Location:index.php");
    }
?>
<a href="CitasPendientesPorDia.php">Regresar a citas</a>
<div id="cita">
    <h1>Citas</h1>
    <?php
        if(isset($_GET['fecha']))
        {
            $conexion = Conexion::getInstance();
            $query = "SELECT pacientes.nombre, pacientes.apellido, usuarios.nomUser, usuarios.apellidoUser, citas.hora, citas.duracion, citas.fechaCita FROM citas JOIN usuarios ON citas.medico = usuarios.idUsuario JOIN pacientes ON pacientes.cedula = citas.paciente WHERE citas.fechaCita = '2020-08-02'";
            $resultado = mysqli_query($conexion, $query);           
            
            while($row=mysqli_fetch_array($resultado))
            {
                echo "<h3><tr>
                    <td><strong>Paciente: </strong>{$row['nombre']} {$row['apellido']}</td>                    
                    <td><th><strong>Medico: </strong></th>{$row['nomUser']} {$row['apellidoUser']}</td>                    
                    <td><strong>Hora: </strong>{$row['hora']}</td>
                    <td><strong>Duracion: </strong>{$row['duracion']}</td>
                    <td><strong>Fecha de la cita: </strong>{$row['fechaCita']}</td>                                                      
                    </tr></h3>
                    <br>";
            }            
        }
        else
        {
           echo "<p>No existen citas con esta ficha</p>";            
        }
    ?>    
</div>
<button type="submit" class="btn btn-success" onclick="Imprimir('cita')">Imprimir</button>