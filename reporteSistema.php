<?php 
session_start();
include_once("libreria/includes.php");

if($_SESSION['rol'] == 'Administrador')
{
    $datos = ReporteSistema::contarRegistros();

    /* Codigo para la paginacion */ 
    $filas_x_pag = 25;

        //contar registros de la tabla
    $totalFilas = $datos->num_rows;
    $paginas = ceil($totalFilas/$filas_x_pag);

        //Organizar la tabla por paginas
    if(!$_GET){
        header("Location: reporteSistema.php?pag=1");
    }
    elseif($_GET['pag'] > $paginas || $_GET['pag'] <= 0){
        header("Location: reporteSistema.php?pag=1");
    }

    $inicio = ($_GET['pag']-1)*$filas_x_pag;

    /* Llenar la tabla */
    $con = Conexion::getInstance();
    $sql = "SELECT fecha_hora, nomEvento, user, cedula, nombre, apellido
            FROM reportesistema
            INNER JOIN tipoeventos ON reportesistema.evento = tipoeventos.idEvento
            INNER JOIN usuarios ON reportesistema.usuario = usuarios.idUsuario
            LEFT JOIN pacientes ON reportesistema.pacienteAfect = pacientes.cedula
            ORDER BY fecha_hora DESC
            LIMIT $inicio, $filas_x_pag;";
    $result = mysqli_query($con, $sql);
} else {
    header("Location: index.php");
}


?>


<div class="px-3">
    <div class="pb-3">
        <button class="btn btn-success" onclick="Imprimir('reporteSistema')" >Imprimir</button>
        <small style="display: block;">Solo se imprimirá esta pagina</small>
    </div>
    <div id="reporteSistema">
        <div class="py-3">
            <h3>Reportes del sistema</h3>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha/Hora</th>
                    <th scope="col">Actividad</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Paciente Afectado</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                <?php

                    foreach($result as $fila)
                    {
                        $inicio++;
                        $paciente = "";

                        if($fila['cedula'] != null)
                        {
                            $paciente = "{$fila['cedula']} / {$fila['nombre']} {$fila['apellido']}";
                        } else {
                            $paciente = "n/a";
                        }

                        echo "
                            <tr>
                                <td>$inicio</td>
                                <td>{$fila['fecha_hora']}</td>
                                <td>{$fila['nomEvento']}</td>
                                <td>{$fila['user']}</td>
                                <td colspan='2'>$paciente</td>
                            </tr>
                        ";
                    }

                ?>

            </tbody>
        </table>
    </div>
</div>

<?php
 include_once("libreria/Paginador.php");
 include_once("libreria/foot.php"); 
 ?>