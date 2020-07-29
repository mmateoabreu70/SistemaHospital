<?php
include_once("libreria/db/conexion.php");
include_once("libreria/objetos/ReporteSistema.php");

class Usuario 
{
    /* Definiendo propiedades de la clase Usuario */

    private $Id = 0;
    private $nombre = "";
    private $apellido = "";
    private $usuario = "";
    private $pass = "";
    private $tipo = 0;

    function __get($name)
    {
        return $name;
    }

    function __set($name, $value)
    {
        $this->$name = $value;
    }

    function crearUsuario()
    {
        $con = Conexion::getInstance();

        if($this->existeUsuario())
        {
            $sql = "INSERT INTO usuarios VALUES (0, '$this->nombre', '$this->apellido', '$this->usuario', '$this->pass', $this->tipo, 1)";

            if(mysqli_query($con, $sql))
            {
                $this->Id = mysqli_insert_id($con);

                $report = new ReporteSistema();
                $report->RegistrarEvento(3);

                return true;
            }
    
            return false;
        }
        
        return "Este nombre de usuario ya existe";
    }

    
    function modificarUsuario()
    {
        $con = Conexion::getInstance();

        if($this->existeUsuario())
        {
            $sql = "UPDATE usuarios 
                    SET nombre = '$this->nombre', apellido = '$this->apellido', usuario = '$this->usuario', pass = '$this->pass', tipo = $this->tipo 
                    WHERE idUsuario = {$this->Id}";

            if(!mysqli_query($con, $sql))
            {
                return false;
            }

            $report = new ReporteSistema();
            $report->RegistrarEvento(4);
            return true;
        }
        else {
            return "Este nombre de usuario ya existe";
        }

        return false;
    }


    function eliminarUsuario()
    {
        $con = Conexion::getInstance();

        $sql = "UPDATE usuarios
                SET estado = 2
                WHERE idUsuario = {$this->Id}";

        if(!mysqli_query($con, $sql))
        {
            return false;
        }

        $report = new ReporteSistema();
        $report->RegistrarEvento(5);
        return true;
    }

    private function existeUsuario()
    {
        /* Verificar si ya existe este nombre de usuario */
        $con = Conexion::getInstance();
        $sql = "SELECT usuario 
                FROM usuarios
                WHERE usuario = '{$this->usuario}' AND idUsuario != {$this->Id} AND estado = 1";

        $result = mysqli_query($con, $sql);

        if($result != false)
        {
            $fila = mysqli_fetch_row($result);
        }

        if($fila[0] == $this->usuario)
        {
            return false;
        }

        return true;
    }

}