<?php
session_start();
include_once("libreria/includes.php");

if($_GET["accion"] == "logout")
{
    session_destroy();

    $report = new ReporteSistema();
    $report->RegistrarEvento(2);

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

