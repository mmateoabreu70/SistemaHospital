<?php

session_start();
include_once("libreria/includes.php");
    
include 'calendarioFunciones.php';
include 'calendarioConfig.php';

    $id  = evaluar($_GET['id']);

    $bd  = $conexion->query("SELECT * FROM eventos WHERE id=$id");


    $row = $bd->fetch_assoc();


    $titulo=$row['title'];

    $evento=$row['body'];

    $inicio=$row['inicio_normal'];

    $final=$row['final_normal'];

if (isset($_POST['eliminar_evento'])) 
{
    $id  = evaluar($_GET['id']);
    $sql = "DELETE FROM eventos WHERE id = $id";
    if ($conexion->query($sql)) 
    {
        echo "Cita eliminado";
    }
    else
    {
        echo "El Cita no se pudo eliminar";
    }
}

    include_once("libreria/head.php");
 ?>

<!DOCTYPE html>
<html lang="en">
<br><br><br><br>
<center>
    <center color="white"><h1 color="white"><font color="">CITA PENDIENTE</h1></center>
    <br>
    <br>

<head>
	<meta charset="UTF-8">
	<title>Citas</title>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<style>

.borde{

border-radius: 20px;
border-style: groove; border-width: 4px;
width: 300px;
height: 85px;

}

body{


    background-image: url('source/background-login.jpg');



}


</style>

<body>
    <h2 ><font color="black">Título:</h2>
	 <h3><font color="black"><?=$titulo?></font></h3>
     <br>
      <h3><font color="black">Cita:</font></h3>
     <p><?=$evento?></p>
	 
     <h3><font color="black">La Cita es el:</h3>
     <b>Fecha inicio:</b> <?=$inicio?>
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
<form action="calendarioCitas.php" method="post">
    <button type="submit" class="btn btn-success" >Volver</button>
    
</form>
<br>
</center>
</html>

