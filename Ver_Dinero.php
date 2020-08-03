<?php
session_start();

include('libreria/includes.php');

$conexion = Conexion::getInstance();
$sql="SELECT id, paciente,fechaCita, costo from citas";
$result = $conexion->query($sql);

if(isset($_GET['id']))
    {
        $user = new Usuario();
        $user->Id = $_GET['id'];

        $user->eliminarUsuario();
        header("Location:AdminUsuario.php"); 
    }
?>
<html>
<caption><h1><center>Dinero recaudado</caption></h1></center>
</br>
<table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cedula paciente</th>
                <th scope="col">Fecha de cita</th>
                <th scope="col">Pago</th>
           
            </tr>
        </thead>
        <tbody>
            <?php

                foreach($result as $fila)
                {
                    echo "
                        <tr>
                            <td>{$fila['id']}</td>
                            <td>{$fila['paciente']}</td>
                            <td>{$fila['fechaCita']}</td>
                            <td>{$fila['costo']}</td>

                        </tr>
                    ";
                }

            ?>
        </tbody>
    </table>
</div>

















<?php
include('libreria/foot.php');
?>