<?php 
session_start();
include('libreria/includes.php');
$conexion = Conexion::getInstance();

$sql="SELECT receta from visitas";
$result = $conexion->query($sql);

if(isset($_GET['id']))
    {
        $user = new Usuario();
        $user->Id = $_GET['id'];

        $user->eliminarUsuario();
    }
?>
<a href="Visita-Medico.php" >Volver</a>
<form enctype = "multipart/form-data" class="col-md-6" method="post">
</br>
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