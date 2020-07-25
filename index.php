<?php
session_start();
include_once("libreria/includes.php");

if(isset($_SESSION['user']))
{
    
}
else {
    header("Location: login.php");
}


?>




<?php include_once("libreria/foot.php") ?>