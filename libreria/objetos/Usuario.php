<?php

class Usuario 
{
    /* Definiendo propiedades de la clase Usuario */

    private $con = Conexion::getInstance();
    private $id = mysqli_insert_id($this->con);
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
        $sql = "INSERT INTO usuarios VALUES ($this->id, '$this->nombre', '$this->apellido', '$this->usuario', '$this->pass', $this->tipo, 1)";
        
        if(!mysqli_query($this->con, $sql))
        {
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