<?php

$conexion = Conexion::getInstance();	

$conexion->set_charset('utf8');


if ($conexion->connect_errno) {
	echo "Error al conectar la base de datos {$conexion->connect_errno}";
}


$base_url="http://localhost/SistemaHospital/";

?>
