<?php

//Clase para conectar a la base de datos
include_once("libreria/db/config.php");

class Conexion
{
    static $con = null;
    public $instancia = null;

    public function __construct()
    {
        //Este constructor crea la instancia con la base de datos
        $this->instancia = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        //Verificando si no hubo ningun error en la conexion
        if($this->instancia == false)
        {
            echo "
                <script>
                    alert('No se pudo conectar a la base de datos');
                </script>
            ";
        }
    }

    //Metodo estatico para conseguir la instancia de la conexion
    static function getInstance()
    {
        //Verificando si la conexion ya existe
        if(self::$con == null)
        {
            self::$con = new Conexion();
        }

        return self::$con->instancia;
    }

    function __destruct()
    {
        mysqli_close($this->instancia);
    }
}