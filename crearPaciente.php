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
    <!-- Nombre de la pagina-->
     <h3 align ="center">   
     Agregar Paciente
     </h3>
     <br>
     <!-- Formulario -->
     <div align ="center" >
       <div class="col col-sm-6">
         <form align="center" enctype="multipart/form-data" method="post" action="">
            <!--Cedula-->         
            <div class="form-row col-12 py-2">
                <!--label-->
                <label  for="cedula">Cedula</label> 
                <!--Input-->                                    
                <input type="text" name="cedula" id="cedula"  class="form-control"/>            
            </div>
            <!--Nombre-->
            <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon">Nombre</label>
                <!--Input-->
                <input type="text" name="nombre" for="nombre" class="form-control"/>            
            </div>
            <!--Apellido-->
            <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon" for="apellido">Apellido</label>
                <!--Input-->
                <input type="text" name="apellido" id="apellido" class="form-control"/>            
            </div>
            <!--Fecha de nacimiento-->
            <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon" for="nacimiento"> Fecha de Nacimiento</label>
                <!--Input-->
                <input type="date" name="nacimiento" id="nacimiento" class="form-control"/>            
            </div>
            <!--Tipo de sangre-->
            <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon" for="tipoSangre">Tipo de sangre</label>
                <!--Input-->
                <input type="text" name="tipoSangre" id="tipoSangre" class="form-control"/>            
            </div>
            <!--Telefono-->
            <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon" for="telefono">Telefono</label>
                <!--Input-->
                <input type="text" name="telefono" id="telefono" class="form-control"/>            
            </div>
                <!--<a href="index.php" class="btn btn-primary">Nuevo</a>-->
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>        
         </form>     
       </div>    
    </div>
</div>

<?php include_once("libreria/foot.php"); ?>