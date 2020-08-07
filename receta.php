<?php 
    session_start();
    include('libreria/includes.php');

    if($_SESSION['rol'] == 'Medico')
    {
        if(isset($_GET['idVisita']))
        {
            $conexion = Conexion::getInstance();

            $sql="SELECT receta from visitas
                  WHERE idVisita = {$_GET['idVisita']}";
            $result = $conexion->query($sql);
            $row = mysqli_fetch_array($result);

        }
    
        if($_POST)
        {
            $report = new ReporteSistema();
            $report->RegistrarEvento(10);
        }
    }
    else {
        header("Location:index.php");
    }

    include_once("libreria/head.php");
?>

<a href="Visita-Medico.php" >Volver</a>
<form class="col-md-6" method="post">
</br>
<div id="receta">
<h3>Receta</h3>
    <h3><p>
        <?php 
            if($row['receta'] != null)
            {
                echo "
                    <p>
                    {$row['receta']}
                    </p>
                ";
            }
            else {
                echo "
                    <span>No hay receta disponible</span>
                ";
            }
        ?>
    </p></h3>
</div>

<button type="submit" class="btn btn-success" <?php echo $row['receta']==null ? 'disabled' : '' ?> onclick="Imprimir('receta')" >Imprimir</button>

</form>
</br>

<?php include_once("libreria/foot.php"); ?>