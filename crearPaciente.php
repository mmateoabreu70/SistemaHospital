<?php
    session_start();
    include_once("libreria/includes.php");

    if($_SESSION['rol'] == 'Asistente')
    {

        if($_POST){
                    
            //$gente->id = $_POST['id'];
            $gente = new gente();
            $gente->nombre = $_POST['nombre'];
            $gente->apellido = $_POST['apellido'];
            $gente->cedula = $_POST['cedula'];
            $gente->nacimiento = $_POST['nacimiento'];
            $gente->tipoSangre = $_POST['tipoSangre'];
            $gente->telefono = $_POST['telefono'];
            $gente->guardar();

            $sql = "INSERT INTO pacientes VALUES ('$gente->cedula', '$gente->nombre', '$gente->apellido','$gente->nacimiento', '$gente->tipoSangre', '$gente->telefono')";
                
        }else if(isset($_GET['cedula'])){
            $gente = new gente($_GET['cedula']);

        }else if(isset($_GET['del'])){
            gente::desactivar($_GET['del']);

        }

    } else {
        header("Location:index.php");
    } 
 
?>

<div class="container">
     <h3 align ="center">
   
     Agregar Paciente
     </h3>
     <br>
     <div align ="center" >
       <div class="col col-sm-6">
         <form align="center" enctype="multipart/form-data" method="post" action="">
         <!--<input type="hidden" name="id" value="<?php //echo $gente->id; ?>" /> -->
            <div class="form-row col-12 py-2">
                <label  for="cedula">Cedula</label>                                     
                <input type="text" name="cedula" id="cedula"  class="form-control"/>            
            </div>
            <div class="form-row col-12 py-2">
                <label class="input-group-addon">Nombre</label>
                <input type="text" name="nombre" for="nombre" class="form-control"/>            
            </div>
            <div class="form-row col-12 py-2">
                <label class="input-group-addon" for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control"/>            
            </div>
            <div class="form-row col-12 py-2">
                <label class="input-group-addon" for="nacimiento"> Fecha de Nacimiento</label>
                <input type="date" name="nacimiento" id="nacimiento" class="form-control"/>            
            </div>
            <div class="form-row col-12 py-2">
                <label class="input-group-addon" for="tipoSangre">Tipo de sangre</label>
                <input type="text" name="tipoSangre" id="tipoSangre" class="form-control"/>            
            </div>
            <div class="form-row col-12 py-2">
                <label class="input-group-addon" for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono" class="form-control"/>            
            </div>
                <!--<a href="index.php" class="btn btn-primary">Nuevo</a>-->
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>        
         </form>     
       </div>    
    </div>

<?php include_once("libreria/foot.php"); ?>