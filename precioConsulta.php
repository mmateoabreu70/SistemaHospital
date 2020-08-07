<?php
    session_start();
    include_once("libreria/includes.php");

    if($_SESSION['rol'] == 'Administrador')
    {
        $errorMsg = "";

        /* Traer precio actual */
        $con = Conexion::getInstance();
        $query = "SELECT precio FROM precioconsultas;";
        $result = mysqli_query($con, $query);
        $fila = mysqli_fetch_row($result);

        $precioDB = $fila[0];

        if($_POST)
        {
            extract($_POST);

            if($precio == $precioDB)
            {
                $errorMsg = "Lo sentimos, este es el precio actual";
            }
            elseif($precio >= 500)
            {
                $query = "UPDATE precioconsultas
                SET precio = '{$precio}'";

                if(mysqli_query($con, $query))
                {
                    $report = new ReporteSistema();
                    $report->RegistrarEvento(6);

                    $errorMsg = "Precio actualizado exitosamente";
                    header("Location:precioConsulta.php");
                } else {
                    $errorMsg = "El precio no se pudo actualizar";
                }

            }
            else {
                $errorMsg = "Lo sentimos, este precio es muy bajo";
            }

        }
        
    } else {
        header("Location:index.php");
    }

    include_once("libreria/head.php");
?>

<div class="px-xl-5 py-3 ">
    <div class="p-3">
        <h3>Asignar costo de consulta general</h3>
    </div>
    <span class="errorMsg"><?php echo $errorMsg; ?></span>
    <form method="post">
        <div class="form-row col-6 py-2">
            <div class="form-group">
                <label for="precio" class="col-sm-2 col-form-label">Precio:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $precioDB; ?>" required>
                </div>
            </div>

            <div class="container p-3">
                <button class='btn btn-success' type='submit'>Modificar</button>
            </div>
        </div>
    </form>
</div>

<?php include_once("libreria/foot.php"); ?>