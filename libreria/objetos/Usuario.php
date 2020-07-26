<?php
include_once("libreria/db/conexion.php");

class Usuario 
{
    /* Definiendo propiedades de la clase Usuario */

    private $id = 0;
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
        $sql = "INSERT INTO usuarios VALUES ($this->id, '$this->nombre', '$this->apellido', '$this->usuario', '$this->pass', $this->tipo, 1)";
        
        if(!mysqli_query($con, $sql))
        {
            mysqli_insert_id($con);
            return false;
        }

        return true;

    }

    function modificarUsuario()
    {
        $sql = "UPDATE usuarios 
                SET nombre = '$this->nombre', apellido = '$this->apellido', usuario = '$this->usuario', pass = '$this->pass' 
                WHERE idUsuario = $this->id";
        
        if(!mysqli_query($this->con, $sql))
        {
            return false;
        }

        return true;
    }


    function eliminarUsuario()
    {
        $sql = "UPDATE usuarios
                SET estado = 2
                WHERE idUsuario = $this->id";
        if(!mysqli_query($this->con, $sql))
        {
            return false;
        }

        return true;
    }
}