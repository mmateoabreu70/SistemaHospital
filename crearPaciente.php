<?php
session_start();
include_once("libreria/includes.php");

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
    
<?php
include_once("libreria/foot.php");
?>