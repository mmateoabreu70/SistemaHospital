<?php
    session_start();
    include_once("libreria/includes.php");
    
    if($_SESSION['rol'] == 'Asistente' || $_SESSION['rol'] == 'Medico')
    {      
        if(isset($_GET['id']))
        {
                
            $conexion = Conexion::getInstance();
            $query = "SELECT pacientes.nombre, pacientes.apellido, usuarios.nomUser, usuarios.apellidoUser, citas.hora, citas.duracion, citas.fechaCita 
                    FROM citas 
                    JOIN usuarios ON citas.medico = usuarios.idUsuario 
                    JOIN pacientes ON pacientes.cedula = citas.paciente 
                    WHERE id = {$_GET['id']}";

            $resultado = mysqli_query($conexion, $query);  
            $row=mysqli_fetch_array($resultado);
        }

    }
    else
    {
        header("Location:index.php");
    }
?>
<a href="CitasPendientesPorDia.php">Regresar a citas</a>
<div class="mt-4" id="cita">
    <center><h2>Detalles de la cita</h2></center>

    <?php if($row != null){ ?>

    <center>

            <h5>
                <tr>
                    </br>
                    <td><strong>Paciente: </strong><?php echo "{$row['nombre']} {$row['apellido']}" ?></td> 
                    </br>
                    </br>              
                    <td><th><strong>Medico: </strong></th><?php echo "{$row['nomUser']} {$row['apellidoUser']}" ?></td>                   
                    </br>
                    </br>
                    <td><strong>Hora: </strong><?php echo "{$row['hora']}" ?></td>
                    </br>
                    </br>
                    <td><strong>Duracion: </strong><?php echo "{$row['duracion']}" ?></td>
                    </br>
                    </br>
                    <td><strong>Fecha de la cita: </strong><?php echo "{$row['fechaCita']}" ?></td>                                                      
                </tr>
            </h5>
            <br>
    </center>

    <?php
        } else {
           echo "
                <p>
                    <center>
                        No existe cita con este id
                    </center>
                </p>";            
        }

    ?>

</div>

<?php if($_SESSION['rol'] == 'Asistente'): ?>

    <center>
        <button type="submit" class="btn btn-success" <?php echo $row==null ? 'disabled' : '' ?> onclick="Imprimir('cita')">Imprimir</button>
    </center>
<?php endif ?>