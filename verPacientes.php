<?php
    session_start();
    include_once("libreria/includes.php");

    if($_SESSION['rol'] == 'Asistente')
    {
        $conexion = Conexion::getInstance();

        $con = conexion::getInstance();

        $p = new gente();

        $gente = new gente();

        $sql = "SELECT * FROM pacientes";
        $datos = mysqli_query($con, $sql);
    } else {
        header("Location: index.php");
    }
        
?>

<div>
    <h4>Visualizar pacientes</h4>
    <table class="table">
        <thead class="thead-dark">
            <tr> 
                <th>#</th>
                <th>Cedula</th>             
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de nacimiento</th>
                <th>Tipo de sangre</th>
                <th>Telefono</th>

            </tr>
        </thead>
        <tbody>
            <?php

            $datos = gente::listado();
            $count = 0;
            foreach($datos as $fila){
                $count++;

                echo "<tr>
                <td>{$count}</td>
                <td>{$fila->cedula}</td>
                <td>{$fila->nombre}</td>
                <td>{$fila->apellido}</td>
                <td>{$fila->nacimiento}</td>
                <td>{$fila->tipoSangre}</td>
                <td>{$fila->telefono}</td>                
                </tr>";
            }

            ?>
        </tbody>
    </table>
</div>
<?php
    include_once("libreria/foot.php");
?>