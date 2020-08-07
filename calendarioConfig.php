<?php

include_once("libreria/db/config.php");

$conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);	


$conexion->set_charset('utf8');


if ($conexion->connect_errno) {
	echo "Error al conectar la base de datos {$conexion->connect_errno}";
}


$base_url="http://localhost/sistemahospital/";

?>
