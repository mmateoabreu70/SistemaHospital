<?php
include_once("libreria/objetos/ReporteSistema.php");

if(isset($_GET['accion']))
{
    $report = new ReporteSistema();
    $report->RegistrarEvento(2);

    session_destroy();
    header("Location:index.php");
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
?>