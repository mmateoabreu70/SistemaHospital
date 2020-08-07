<?php

include_once("libreria/db/conexion.php");

class ReporteSistema
{
    private $Id = 0;

    function __get($name)
    {
        return $this->$name;
    }

    function __set($name, $value)
    {
        $this->$name = $value;
    }

    function RegistrarEvento($idEvento, $idPaciente = "")
    {
        session_start();

        //Obteniendo fecha y hora
        date_default_timezone_set('America/Santo_Domingo');
        $fecha_hora = date("Y-m-d H:i:s");

        //obteniendo usuario
        $idUser = $_SESSION['id'];

        $con = Conexion::getInstance();

        if($idPaciente != null)
        {
            $query = "INSERT INTO reportesistema VALUES (0, '$fecha_hora', $idEvento, $idUser, '$idPaciente');";
        } else {
            $query = "INSERT INTO reportesistema VALUES (0, '$fecha_hora', $idEvento, $idUser, null);";
        }
        
        if(mysqli_query($con, $query))
        {

            $this->Id = mysqli_insert_id($con);
            return true;
        }

    }

    static function contarRegistros()
    {
        $con = Conexion::getInstance();
        $sql = "SELECT * FROM reporteSistema";
        return mysqli_query($con, $sql);
    }
}