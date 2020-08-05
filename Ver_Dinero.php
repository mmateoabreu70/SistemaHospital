<?php
    session_start();
    include('libreria/includes.php');

    if($_SESSION['rol'] == 'Medico')
    {
        //// Aqui es el select para la tabla de citas y asi mostrar algunos campos
        $conexion = Conexion::getInstance();
        $sql="SELECT id, paciente,fechaCita, costo 
                FROM citas
                WHERE medico = {$_SESSION['id']}";
        $result = $conexion->query($sql);

        /// Aqui es la suma de todos los campos de la celda
        $consulta="SELECT SUM(costo) as TotalPrecios
                    FROM citas
                    WHERE medico = {$_SESSION['id']}";

        $resultado = mysqli_query($conexion, $consulta);
        $rowTotal = mysqli_fetch_array($resultado);

    }
    else {
        header("Location:index.php");
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

                /// Aqui se esta haciendo el mostrar del total

                echo "<tr>
                    <th colspan ='3'></th>
                        <th>Total: {$rowTotal['TotalPrecios']}</th>
                    </tr>              
                "
            ?>
        </tbody>
    </table>
</div>
<?php
include('libreria/foot.php');
?>