<?php
include('libreria/includes.php');
$conexion = Conexion::getInstance();

$sql="SELECT apellido,nombre from pacientes";
$result = $conexion->query($sql);

if($_POST){
extract($_POST);
$sql = "insert into visitas (nombre,fecha,motivo,comentario,receta,fechaVisita) 
values('{$nombre}','{$fecha}','{$motivo}','{$comentario}','{$receta}','{$fechaVisita}')";
$resultado = mysqli_query($conexion, $sql);

header("Location:receta.php"); 
}

?>  
<html>
<caption><h1><center>Visitas</caption></h1></center>
    </br>
    <center>
    
<form enctype = "multipart/form-data" class="col-md-6" method="post">
  <select class="form-control form-control-sm" class="col-md-4 " name = "nombre" readonly>
    <option selected>Elegir paciente</option>
    <?php
     
      foreach($result as $row)
      {
        echo "
          <option>{$row['nombre']} {$row['apellido']}</option>
       ";}
   
    ?>
  </select>
  <div class="form-group">
    <label for="fecha1">Fecha Actual</label>
    <input type="date" class="form-control" id="fecha1" name = "fecha">
  </div>
  <div class="form-group">
    <label for="mot">Motivo de la visita</label>
    <textarea class="form-control" id="mot" rows="3" name = "motivo"></textarea>
  </div>
  <div class="form-group">
    <label for="com">Comentario</label>
    <textarea class="form-control" id="com" rows="3" name = "comentario"></textarea>
  </div>
  <div class="form-group">
    <label for="res">Receta</label>
    <textarea class="form-control" id="res" rows="3" name = "receta"></textarea>
  </div>
  <div class="form-group">
    <label for="fecha2">Fecha Proxima Visita</label>
    <input type="date" class="form-control" id="fecha2" name = "fechaVisita">
  </div>
</center>

<center><button type="submit" class="btn btn-success" name="action">Agregar</button></center>
    </br>
</form>
<?php
include('libreria/foot.php');
?>