<?php
session_start();
include_once("libreria/includes.php");

/*Llenando rol de usuario*/
$con = Conexion::getInstance();
$query = "SELECT * FROM roles";
$result = mysqli_query($con, $query);

if($_POST)
{
    extract($_POST);


}

?>

<div class="px-xl-5 py-3 ">
    <div class="container p-3">
        <center><h3>Crear usuario</h3></center>
    </div>
    <form method="post">
        <div class="form-row col-12 py-2">
            <div class="col-6">
                <label for="nombre">Nombres</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
            </div>
            <div class="col-6">
                <label for="nombre">Apellidos</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido; ?>" required>
            </div>
        </div>

        <div class="form-row col-12 py-2">
            <div class="form-group col-md-6">
                <label for="rol">Rol de usuario</label>
                <select id="rol" name="rol" class="form-control" value="<?php echo $rol; ?>" required>
                    <option selected>Elige un rol...</option>
                    <?php

                        foreach($result as $fila)
                        {
                            echo "
                                <option>{$fila['rol']}</option>
                            ";
                        }

                    ?>
                </select>
            </div>
            <div class="col-6">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario; ?>" required>
            </div>
        </div>

        <div class="form-row col-12 py-2">
            <div class="col-6">
                <label for="pass">Contraseña</label>
                <input type="password" class="form-control" id="pass" name="pass" value="<?php echo $pass; ?>" required>
            </div>
            <div class="col-6">
                <label for="confirm">Confirmar contraseña</label>
                <input type="password" class="form-control" id="confirm" name="confirm" value="<?php echo $confirm; ?>" required>
            </div>
        </div>
        <div class="container p-3">
            <center><button class="btn btn-primary" type="submit">Crear</button></center>
        </div>
    </form>
</div>

<?php include_once("libreria/foot.php"); ?>