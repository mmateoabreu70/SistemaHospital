<?php
  session_start();
include_once("libreria/includes.php");
$conexion = Conexion::getInstance();
?>
<div class="container">
     <h3 align ="center">   
     Citas
     </h3>
     <br>
     <div align ="center" >
       <div class="col col-sm-6">
         <form align="center" enctype="multipart/form-data" method="post" action="">
         <!--<input type="hidden" name="id" value="<?php //echo $gente->id; ?>" /> -->
         <div class="form-row col-12 py-2">
                <label class="input-group-addon" for="fechacita"> Fecha de cita</label>
                <input type="date" name="fechacita" id="fechacita" class="form-control"/>            
            </div>
            <div class="form-row col-12 py-2">
                <label class="input-group-addon" for="hora">Hora</label>
                <input type="text" name="hora" id="hora" class="form-control"/>            
            </div>           
            <div class="form-row col-12 py-2">
                <label class="input-group-addon" for="duracion">Duracion</label>
                <input type="number" name="duracion" class="form-control"/>            
            </div>
            <div class="form-row col-12 py-2">
                <label class="input-group-addon" for="cedula">Cedula</label>
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
            <div class="form-row col-12 py-2">
                <label class="input-group-addon" for="medico">Medico</label>
                <select name="medico" class="form-control">                 
                <option value="">Seleccione medico</option>
               <?php                            
                $query = "SELECT nomUser from usuarios WHERE tipo = 3 AND estado = 1;";
                $resultado = mysqli_query($conexion, $query);                
                while($row=mysqli_fetch_array($resultado)){
                ?>
                <option value="<?php echo $row['nomUser']?>"><?php echo $row['nomUser'];?></option>
                <?php } ?>
                </select>                    
            </div>        
           
            <!--<div class="form-row col-12 py-2">
                <label class="input-group-addon" for="tipoSangre">Tipo de sangre</label>
                <input type="text" name="tipoSangre" id="tipoSangre" class="form-control"/>            
            </div>-->
            
                <!--<a href="index.php" class="btn btn-primary">Nuevo</a>-->
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>        
         </form>     
       </div>    
    </div>
</div>

<?php
include_once("libreria/foot.php");
?>