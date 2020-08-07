<?php

session_start();
include_once("libreria/includes.php");
    
include 'calendarioFunciones.php';
include 'calendarioConfig.php';

    $id  = evaluar($_GET['id']);

    $bd  = $conexion->query("SELECT * FROM citas WHERE id=$id");


    $row = $bd->fetch_assoc();


    $titulo=$row['title'];

    $evento=$row['body'];

    $inicio=$row['inicio_normal'];

    $final=$row['final_normal'];

if (isset($_POST['eliminar_evento'])) 
{
    $id  = evaluar($_GET['id']);
    $sql = "DELETE FROM citas WHERE id = $id";
    if ($conexion->query($sql)) 
    {
        echo "citas eliminado";
    }
    else
    {
        echo "El citas no se pudo eliminar";
    }
}


 ?>

    <h2 ><font color="black">Título:</h2>
	 <h3><font color="black"><?=$titulo?></font></h3>
     <br>
      <h3><font color="black">Cita:</font></h3>
     <p><?=$evento?></p>
	 
     <h3><font color="black">La Cita es el:</h3>
     <b>Fecha inicio:</b> <?=$inicio?>
     <br>
     <br>
     <br>
     <h3><font color="black">La Cita termina el:</h3>
     <b>Fecha termino:</b> <?=$final?>
     
</body>
<br>
<br>
<form action="" method="post">
    <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>

</form>
<br>
<form action="calendarioIndex.php" method="post">
    <button type="submit" class="btn btn-success" >Volver</button>
    
</form>
<br>
</center>
</html>

