<?php
    session_start();
    include_once("libreria/includes.php");

    $errorMsg = "";

    if($_SESSION['rol'] == 'Asistente')
    {

        if(isset($_GET['cedula']))
        {
            $cedula = str_replace("-", "", $_GET['cedula']);

            $url="http://api.adamix.net/apec/cedula/$cedula";
            $datoJson = file_get_contents($url);
            $datos = json_decode($datoJson);

            if($datos->ok == false)
            {
                $errorMsg = "Esta cedula no existe";
            } 
            else {

                $nombre = $datos->Nombres;
                $apellido = $datos->Apellido1 . " " . $datos->Apellido2;
                $fechaNac = $datos->FechaNacimiento;

                header("Location: crearPaciente.php?ced={$cedula}&nom={$nombre}&apell={$apellido}&fecha={$fechaNac}");
            }

        }

    } else {
        header("Location:index.php");
    }


    include_once("libreria/head.php");
?>

<center>
    <div class="col col-sm-6">
        <span class="errorMsg"><?php echo $errorMsg; ?></span>
        <form id="datosPersona" method="get">
            <div class="form-row col-8 py-2">
                <!--label-->
                <label  for="cedula">Cedula</label> 
                <!--Input-->                                    
                <input type="text" name="cedula" id="cedula"  class="form-control" required/>    
            </div>

            <button type="submit" class="btn btn-info">Buscar persona</button>
        </form>
    </div>
</center>

<?php include_once("libreria/foot.php"); ?>