<?php
  session_start();
include_once("libreria/includes.php");
<<<<<<< Updated upstream
include_once("libreria/db/conexion.php");
$conexion = Conexion::getInstance();
?>
<?php
if(isset($_POST['agregarcita']))
{
	$fechacita = $_POST["fechacita"];
	$hora = $_POST["hora"];
	$duracion = $_POST["duracion"];
	$cedula = $_POST["cedula"];
	$medico = $_POST["medico"];	

	$insertarDatos = "INSERT INTO citas (id,fechaCita,hora,duracion,medico) VALUES ('$cedula','$fechacita','$hora','$duracion minutos','$medico')";
	$ejecutarInsertar = mysqli_query($conexion,$insertarDatos);
}	
?>     
=======
//$conexion = Conexion::getInstance();

?>

>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
                <button type="submit" name="agregarcita" class="btn btn-success">Agregar cita</button>
=======
                <button type="submit" class="btn btn-success">Agregar cita</button>
>>>>>>> Stashed changes
            </div>        
         </form>     
       </div>    
    </div>
</div>
<?php
include_once("libreria/foot.php");
?>