<?php
session_start();
include_once("libreria/db/conexion.php");
include_once("libreria/objetos/ReporteSistema.php");
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
        $sql = "SELECT idUsuario, nomUser, apellidoUser, user, pass, rol FROM usuarios
                INNER JOIN roles ON usuarios.tipo = roles.idRol
                WHERE user = '$this->user' AND estado = 1";
        $result = mysqli_query($con, $sql);
        
        /* Verificando si no hubo ningun error */ 
        if(mysqli_error($con))
        {
            return false;
        }

        $fila = mysqli_fetch_row($result);

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

                $report = new ReporteSistema();
                $report->RegistrarEvento(1);
                return true;
            } else {

                return false;
            }
        }
    }
}