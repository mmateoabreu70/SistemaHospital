<?php
  session_start();
    include_once("libreria/includes.php");
    $conexion = Conexion::getInstance();
    
    if($_SESSION['rol'] == 'Asistente' || $_SESSION['rol'] == 'Medico')
    {
    
        // Entra aqui cuando se preciona el boton Agregar cita
        if(isset($_POST['agregarcita']))
        {
            // Se guardan los datos capturados en los inputs y los drop down list y se guardan en variables
            $paciente = $_POST['cedula'];
            $fechacita = $_POST['fechacita'];
            $hora = $_POST['hora'];
            $duracion = $_POST['duracion'];
            $medico = $_POST['medico'];        
            $query = "SELECT precio FROM precioconsultas WHERE id=1";
            $resultado3 = mysqli_query($conexion,$query);

            if($row3=mysqli_fetch_array($resultado3))
            {
                $costo = $row3['precio'];
            }
            
            //Se mandan los datos a la base de datos
            $conexion->query("INSERT INTO citas (fechaCita,hora,duracion,medico,paciente,costo) 
            values ('$fechacita','$hora','$duracion minutos','$medico','$paciente','$costo')");    
        }
    } else {
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
         <!--Fecha de cita-->         
         <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon" for="fechacita"> Fecha de cita</label>
                <!--Input-->
                <input type="date" name="fechacita" id="fechacita" class="form-control"/>            
            </div>
            <!--Hora-->
            <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon" for="hora">Hora</label>
                <!--Input-->
                <input type="time" name="hora" id="hora" class="form-control"/>            
            </div> 
            <!--Duracion-->          
            <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon" for="duracion">Duracion</label>
                <!--Input-->
                <input type="number" name="duracion" class="form-control"/>            
            </div>
            <!--Cedula-->
            <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon" for="cedula">Cedula</label>
                <!--drop down list-->
                <select name="cedula" class="form-control">                 
                <option value="">Seleccione una cedula</option>
               <?php                            
                $query = "SELECT cedula from pacientes;";
                $resultado = mysqli_query($conexion, $query);                
                while($row=mysqli_fetch_array($resultado)){
                ?>
                <option value="<?php echo $row['cedula']?>"><?php echo $row['cedula'];?></option>
                <?php } ?>
                </select>                    
            </div>
            <!--Medico-->
            <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon" for="medico">Medico</label>
                <!--drop down list-->
                <select name="medico" class="form-control">                 
                <option value="">Seleccione medico</option>
               <?php                            
                $query = "SELECT nomUser from usuarios WHERE tipo = 3 AND estado = 1;";
                $query2 = "SELECT idUsuario from usuarios WHERE tipo = 3 AND estado = 1;";
                $resultado = mysqli_query($conexion, $query); 
                $resultado2 = mysqli_query($conexion, $query2);                
                while($row=mysqli_fetch_array($resultado)){
                    $row2=mysqli_fetch_array($resultado2)
                ?>
                <option value="<?php echo $row2['idUsuario']?>"><?php echo $row['nomUser'];?></option>
                <?php } ?>
                </select>                    
            </div>            
                <!--<a href="index.php" class="btn btn-primary">Nuevo</a>-->
                <button type="submit" name="agregarcita" class="btn btn-success">Agregar cita</button>
            </div>        
         </form>     
       </div>    
    </div>
</div>
    
<?php
include_once("libreria/foot.php");
?>