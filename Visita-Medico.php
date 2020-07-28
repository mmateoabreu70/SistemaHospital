<?php
include('libreria/head.php');
include('libreria/db/conexion.php');

$con = new Conexion::getInstance();
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}
$sql="SELECT nombre from pacientes";
$result = $conexion->query($sql);
if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobit .=" <option value=\"{$row['nombre']}\"></option>"; 
    }
}
else
{
    echo "No hubo resultados";
}
?>  
<html>
<caption><h1><center>Visitas</caption></h1></center>
    </br>
    <center>
    <form enctype = "multipart/form-data" class="col-md-6" method="post">
    <select class="form-control form-control-sm" class="col-md-4 " readonly>
    <?php echo $combobit; ?>
   

</select>
</br>
</br>
<form>
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