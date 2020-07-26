<?php
session_start();
include_once("libreria/db/conexion.php");
$_SESSION['autorizado'] = false;


class Login 
{
    private $user = "";
    private $pass = "";

    function __get($name)
    {
        return $name;
    }

    function __set($name, $value)
    {
        $this->$name = $value;
    }

    function validarUsuario()
    {
        $con = Conexion::getInstance();
        $sql = "SELECT idUsuario, nombre, apellido, usuario, pass, rol FROM usuarios
                INNER JOIN roles ON usuarios.idUsuario = roles.idRol
                WHERE usuario = '$this->user'";
        $result = mysqli_query($con, $sql);
        
        /* Verificando si no hubo ningun error */ 
        if(mysqli_error($con))
        {
            return false;
        }

        $fila = $result->fetch_row();

        /* Verifica si no hay fila vacia, de lo contrario realiza validaciones */
        if($fila == null)
        {
            return false;
        } else {
            if($this->pass == $fila[4])
            {
                $_SESSION['id'] = $fila[0];
                $_SESSION['nombre'] = $fila[1];
                $_SESSION['apellido'] = $fila[2];
                $_SESSION['user'] = $fila[3];
                $_SESSION['pass'] = $fila[4];
                $_SESSION['rol'] = $fila[5];

                return true;
            } else {
                return false;
            }
        }
    }
}