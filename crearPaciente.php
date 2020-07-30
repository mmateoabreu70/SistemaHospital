<?php
    session_start();
    include_once("libreria/includes.php");

    if($_SESSION['rol'] == 'Asistente')
    {
        $conexion = Conexion::getInstance();

        $con = conexion::getInstance();

        $p = new gente();

        $gente = new gente();

        $sql = "SELECT * FROM pacientes";
        $datos = mysqli_query($con, $sql);

        if($_POST){
            
            //$gente->id = $_POST['id'];
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
        
    }
      else{
          header("Location:index.php");
      }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Crear Pacientes</title>
    <link align='center' rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container">
     <h3>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     Agregar Paciente
     </h3>
     <br>
     <div class="row">
       <div class="col col-sm-6">
         <form align="center" enctype="multipart/form-data" method="post" action="">
         <!--<input type="hidden" name="id" value="<?php //echo $gente->id; ?>" /> -->
            <div class="form-group input-group">
                <label class="input-group-addon" for="cedula">Cedula</label>
                <input type="text"  name="cedula" id="cedula"  class="form-control"/>            
            </div>
            <div class="form-group input-group">
                <label class="input-group-addon">Nombre</label>
                <input type="text"  name="nombre" for="nombre" class="form-control"/>            
            </div>
            <div class="form-group input-group">
                <label class="input-group-addon" for="apellido">Apellido</label>
                <input type="text"  name="apellido" id="apellido" class="form-control"/>            
            </div>
            <div class="form-group input-group">
                <label class="input-group-addon" for="nacimiento"> Fecha de Nacimiento</label>
                <input type="date"  name="nacimiento" id="nacimiento" class="form-control"/>            
            </div>
            <div class="form-group input-group">
                <label class="input-group-addon" for="tipoSangre">Tipo de sangre</label>
                <input type="text"  name="tipoSangre" id="tipoSangre" class="form-control"/>            
            </div>
            <div class="form-group input-group">
                <label class="input-group-addon" for="telefono">Telefono</label>
                <input type="text"  name="telefono" id="telefono" class="form-control"/>            
            </div>
                <!--<a href="index.php" class="btn btn-primary">Nuevo</a>-->
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>        
         </form>     
       </div>    
     </div>
     <div>
         <h4>Visualizar pacientes</h4>
            <table class="table">
                <thead class="thead-dark">
                    <tr> 
                      <th>Cedula</th>             
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Fecha de nacimiento</th>
                      <th>Tipo de sangre</th>
                      <th>Telefono</th>

                    </tr>
                </thead>
                <tbody>
                 <?php

                    $datos = gente::listado();

                    foreach($datos as $fila){
                        echo "<tr>
                        <td>{$fila->cedula}</td>
                        <td>{$fila->nombre}</td>
                        <td>{$fila->apellido}</td>
                        <td>{$fila->nacimiento}</td>
                        <td>{$fila->tipoSangre}</td>
                        <td>{$fila->telefono}</td>                
                        </tr>";
                    }

                 ?>
                </tbody>
            </table>
        </div>
        </div>    
</body>
</html>








<?php
include_once("libreria/foot.php");
?>