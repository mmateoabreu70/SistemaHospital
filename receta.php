<?php 
include('libreria/includes.php');
$conexion = Conexion::getInstance();

$sql="SELECT receta from visitas";
$result = $conexion->query($sql);

?>
<form enctype = "multipart/form-data" class="col-md-6" method="post">
<div id="receta">
<h3>Receta</h3>
<h3><p><?php 
foreach($result as $row)
      {
        echo "
          <p>
           {$row['receta']}</p>
       ";}?>
       </p></h3>
</div>
</form>
</br>
<button class="btn btn-success" onclick="Imprimir('receta')" >Imprimir</button>

<?php include_once("libreria/foot.php"); ?>