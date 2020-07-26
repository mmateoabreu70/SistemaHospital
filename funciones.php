<?php
session_start();

if($_GET["accion"] == "logout")
{
    session_destroy();
    header("Location: login.php");
}

function devolverRol($rol)
{
    if($rol == 'Administrador')
        return 1;
    elseif ($rol == 'Asistente')
        return 2;
    else {
        return 3;
    }
}