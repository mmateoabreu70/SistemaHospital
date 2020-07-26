<?php
session_start();
include_once("libreria/includes.php");

/*Llenando rol de usuario*/
$con = Conexion::getInstance();
$query = "SELECT * FROM roles";
$result = mysqli_query($con, $query);

if($_POST)
{
    $errorMsg = "";
    extract($_POST);


    /* Verificar si coinciden la confirmacion de contraseña */
    if($pass != $confirm)
    {
        $errorMsg = "Las contraseñas no coinciden";

    } else {

        /* Insertando valores al objeto */ 
        $user = new Usuario();

        $user->nombre = $nombre;
        $user->apellido = $apellido;
        $user->usuario = $usuario;
        $user->pass = $pass;
        $user->tipo = devolverRol($rol);

        if($user->crearUsuario())
        {
            header("Location: CrearUsuario.php");
        }
    }
}

?>

<div class="px-xl-5 py-3 ">
    <div class="container p-3">
        <center><h3>Crear usuario</h3></center>
    </div>
    <span class="errorMsg"><?php echo $errorMsg; ?></span>
    <form method="post">
        <div class="form-row col-12 py-2">
            <div class="col-6">
                <label for="nombre">Nombres</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" >
            </div>
            <div class="col-6">
                <label for="nombre">Apellidos</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido; ?>" >
            </div>
        </div>

        <div class="form-row col-12 py-2">
            <div class="form-group col-md-6">
                <label for="rol">Rol de usuario</label>
                <select id="rol" name="rol" class="form-control" >
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
                <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario; ?>" >
            </div>
        </div>

        <div class="form-row col-12 py-2">
            <div class="col-6">
                <label for="pass">Contraseña</label>
                <input type="password" class="form-control" id="pass" name="pass" value="<?php echo $pass; ?>" >
            </div>
            <div class="col-6">
                <label for="confirm">Confirmar contraseña</label>
                <input type="password" class="form-control" id="confirm" name="confirm" value="<?php echo $confirm; ?>" >
            </div>
        </div>
        <div class="container p-3">
            <center><button class="btn btn-primary" type="submit">Crear</button></center>
        </div>
    </form>
</div>

<?php include_once("libreria/foot.php"); ?>