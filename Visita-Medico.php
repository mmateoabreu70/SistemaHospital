<?php
include('libreria/includes.php');
$conexion = Conexion::getInstance();

$sql="SELECT cedula,nombre from pacientes";
$result = $conexion->query($sql);

?>  
<html>
<caption><h1><center>Visitas</caption></h1></center>
    </br>
    <center>
    
<form enctype = "multipart/form-data" class="col-md-6" method="post">
  <select class="form-control form-control-sm" class="col-md-4 " readonly>
    <option selected>Elegir paciente</option>
    <?php
      foreach($result as $row)
      {
        echo "
          <option>{$row['cedula']} {$row['nombre']}</option>
        ";
      }
    ?>

  </select>

</form>
</br>
</br>
<form enctype = "multipart/form-data" class="col-md-6" method="post">
  <div class="row">
    <div class="col">
    <label for="fechaingreso">Fecha Visita</label>
      <input type="date" class="form-control" id = "fechaingreso"">
    </div>
    <div class="col">
    <label for="fechasal">Fecha Proxima Visita</label>
      <input type="date" class="form-control" id = "fechasal">
    </div>
    
  </div>
  </br>
  </br>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Reseta</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Comentario</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</form>
</center>
<center><button type="submit" class="btn btn-primary">Agregar</button></center>
<?php
include('libreria/foot.php');
?>