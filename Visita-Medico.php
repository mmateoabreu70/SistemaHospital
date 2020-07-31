<?php
include('libreria/includes.php');
$conexion = Conexion::getInstance();

$sql="SELECT cedula,nombre from pacientes";
$result = $conexion->query($sql);

if($_POST){
extract($_POST);
$sql = "insert into visitas (nombre,fecha,motivo,comentario,receta,fechaVisita) 
values('{$nombre}','{$fecha}','{$motivo}','{$comentario}','{$receta}','{$fechaVisita}')";
$resultado = mysqli_query($conexion, $sql);

header("Location:Visita-Medico.php"); 
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
        
          <option>{$row['cedula']} {$row['nombre']}</option>
       ";
     
      }
   
    ?>
  </select>
  <?= asgInput('fecha','Fecha','',['type'=>'date']);?>
 <?= asgInput('fechaVisita','Fecha Visita','',['type'=>'date']);?>
  <?= asgInput('motivo','Motivo de visita','');?>
  <?= asgInput('comentario','Comentario','');?>
</center>

<center><button type="submit" class="btn btn-success" name="action">Agregar</button></center>
    </br>
<center><a href='receta.php' class='btn btn-info'>Redactar Receta</a></center>

<?php
include('libreria/foot.php');
?>