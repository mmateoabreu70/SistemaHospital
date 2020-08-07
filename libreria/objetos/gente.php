<?php
include_once("libreria/db/conexion.php");
class gente{

    private $cedula = "";
    private $nombre = "";
    private $apellido = "";
    private $nacimiento = "";
    private $tipoSangre = "";
    private $telefono = "";

    public function __construct($cedula=0){
        //$cedula = $cedula+0;
        if($cedula > 0){
            $sql = "select * from pacientes where cedula = '{$cedula}'";
            $rs = mysqli_query(conexion::getInstance(), $sql);
            if(mysqli_num_rows($rs) > 0){
                $fila = mysqli_fetch_array($rs);

                $this->cedula = $fila['cedula'];
                $this->nombre = $fila['nombre'];
                $this->apellido = $fila['apellido'];
                $this->nacimiento = $fila['nacimiento'];
                $this->tipoSangre = $fila['tipoSangre'];
                $this->telefono = $fila['telefono'];
                
            }
        }
    }

    static function desactivar($cedula){
        $sql = "delete from pacientes where cedula = '{$cedula}'";
        mysqli_query(conexion::getInstance(), $sql);

    }

    static function listado(){

        $datos = array();
        $sql = "select * from pacientes";

        $rs = mysqli_query(conexion::getInstance(), $sql);

        while($fila = mysqli_fetch_object($rs)){
            $datos[] = $fila;
        }
        
        return $datos;

    }

    function guardar(){
        
        $sql = "insert into pacientes values ('{$this->cedula}','{$this->nombre}','{$this->apellido}','{$this->nacimiento}','{$this->tipoSangre}','{$this->telefono}');";
        $link = conexion::getInstance();
        $result = mysqli_query($link, $sql);

        if($result)
        {
            return true;
        }

        return false;

    }

    function __toString(){
        return "yo soy una gente";
    }

    function __get($prop){
        if(isset($this->$prop)){
            return $this->$prop;
        }
        else{
            echo "No existe una propiedad llamada {$prop}";
        }


    }

    function __set($prop, $val){

        if(isset($this->$prop)){
            $this->$prop = $val;
        }
        else{
            echo "No existe una propiedad llamada {$prop}";
        }

    }
}