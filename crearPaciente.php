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
            
            if($gente->guardar())
            {
                echo "
                <script>
                    alert('Paciente registrado exitosamente');
                    window.location = 'validarCedula.php';
                </script>
                ";
            } 

            echo "
            <script>
                alert('Este paciente ya existe');
                window.location = 'validarCedula.php';
            </script>
            ";
        }
        elseif(isset($_GET)){
            $cedula = $_GET['ced'];
            $nombre = $_GET['nom'];
            $apellido = $_GET['apell'];
            $fecha = str_replace(" 00:00:00.000", "", $_GET['fecha']);

        }

    } else {
        header("Location:index.php");
    } 

    include_once("libreria/head.php");
 
?>

<div class="container">
    <a href="validarCedula.php">Buscar otra persona</a>

    <!-- Nombre de la pagina-->
     <h3 align ="center">   
        Agregar Paciente
     </h3>
     <br>
     <!-- Formulario -->
     <div align ="center" >
       <div class="col col-sm-6">
         <span class="errorMsg"><?php echo $errorMsg; ?></span>
         <form align="center" enctype="multipart/form-data" method="post" name="crearPaciente">
            
            <div class="form-row col-12 py-2">
                <!--label-->
                <label  for="cedula">Cedula</label> 
                <!--Input-->                                    
                <input type="text" name="cedula" id="cedula" value="<?php echo $cedula; ?>"  class="form-control" readonly/>    
                
            </div>
            
            <!--Nombre-->
            <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon">Nombre</label>
                <!--Input-->
                <input type="text" name="nombre" for="nombre" value="<?php echo $nombre; ?>" class="form-control" readonly/>            
            </div>

            <!--Apellido-->
            <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon" for="apellido">Apellido</label>
                <!--Input-->
                <input type="text" name="apellido" id="apellido" value="<?php echo $apellido; ?>" class="form-control" readonly/>            
            </div>
            <!--Fecha de nacimiento-->
            <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon" for="nacimiento"> Fecha de Nacimiento</label>
                <!--Input-->
                <input type="date" name="nacimiento" id="nacimiento" value="<?php echo $fecha; ?>" class="form-control" readonly/>

            </div>
            <!--Tipo de sangre-->
            <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon" for="tipoSangre">Tipo de sangre</label>
                <!--Input-->
                <input type="text" name="tipoSangre" id="tipoSangre" class="form-control" required/>            
            </div>
            <!--Telefono-->
            <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon" for="telefono">Telefono</label>
                <!--Input-->
                <input type="text" name="telefono" id="telefono" maxlength="10" class="form-control" required/>            
            </div>
                <!--<a href="index.php" class="btn btn-primary">Nuevo</a>-->
                <button type="submit" class="btn btn-success" >Guardar</button>
            </div>        
         </form>     
       </div>    
    </div>
</div>

<?php include_once("libreria/foot.php"); ?>