<?php
session_start();
include_once("libreria/includes.php");

if($_SESSION['rol'] == 'Administrador')
{

    /*Llenando rol de usuario*/
    $con = Conexion::getInstance();
    $query = "SELECT * FROM roles";
    $llenarDrop = mysqli_query($con, $query);

    if($_POST){

        $errorMsg = "";
        extract($_POST);

        /* Verificar si coinciden la confirmacion de contraseña */
        if($pass != $confirm)
        {
            $errorMsg = "Las contraseñas no coinciden";
        }
        else {
            extract($_POST);

            /* Insertando valores al objeto */ 
            $objUser = new Usuario();

            $id = 0;

            if($_GET['id'] != null)
            {
                $id = $_GET['id'];
            }

            $objUser->Id = $id;
            $objUser->nombre = $nomUser;
            $objUser->apellido = $apellidoUser;
            $objUser->usuario = $user;
            $objUser->pass = $pass;
            $objUser->tipo = devolverRol($rol);

            /* Si existe id en $_GET modifica Usuario */
            if(isset($_GET['id']))
            {
                $result = $objUser->modificarUsuario();
            } else {
                $result = $objUser->crearUsuario();
            }

            $errorMsg = $result;

            /* Verifica si no hubo error */
            if( $errorMsg == "" || $errorMsg == 1)
            {
                header("Location:AdminUsuario.php");
            }
        }

    } elseif(isset($_GET['id'])) {

        /* Consiguiendo usuario por id */
        $sql = "SELECT nomUser, apellidoUser, user, pass, rol FROM usuarios
                INNER JOIN roles ON usuarios.tipo = roles.idRol 
                WHERE idUsuario = {$_GET['id']}";

        $result = mysqli_query($con, $sql);

        foreach($result as $dato)
        {
            /* Pasando valores al POST */
            $_POST = $dato;

        }


    }
}
else {
    header("Location: index.php");
}

?>
<div class="px-xl-5 py-3 ">
    <div class="p-3">
        <?php
            if(isset($_GET['id'])){
                echo "<center><h3>Editar usuario</h3></center>";
            } else {
                echo "<center><h3>Crear usuario</h3></center>";
            }
        ?>
    </div>
    <span class="errorMsg"><?php echo $errorMsg; ?></span>
    <form method="post">
        <div class="form-row col-12 py-2">
            <div class="col-6">
                <label for="nombre">Nombres</label>
                <input type="text" class="form-control" id="nombre" name="nomUser" value="<?php echo $_POST['nomUser']; ?>" required>
            </div>
            <div class="col-6">
                <label for="nombre">Apellidos</label>
                <input type="text" class="form-control" id="apellido" name="apellidoUser" value="<?php echo $_POST['apellidoUser']; ?>" required>
            </div>
        </div>

        <div class="form-row col-12 py-2">
            <div class="form-group col-md-6">
                <label for="rol">Rol de usuario</label>
                <select id="rol" name="rol" class="form-control" >
                    <option selected>Elige un rol...</option>

                    <?php
                        foreach($llenarDrop as $fila)
                        {
                            $prop = "";

                            /* Verificar el rol del usuario seleccionado */
                            if( isset( $_GET['id']) && $fila['rol'] == $_POST['rol'] ) 
                            {
                                $prop = "selected";
                            }

                            echo "
                                <option {$prop}>{$fila['rol']}</option>
                            ";
                        }

                    ?>
                </select>
            </div>
            <div class="col-6">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="user" value="<?php echo $_POST['user']; ?>" required>
            </div>
        </div>

        <?php
            if(isset($_GET['id']))
            {
                echo "
                    <div class='p-3'>
                        <h5>Cambiar contraseña</h5>
                    </div>
                ";
            }
        ?>

        <div class="form-row col-12 py-2">
            <div class="col-6">
                <label for="pass">Contraseña</label>
                <input type="password" class="form-control" id="pass" name="pass" value="<?php echo $_POST['pass']; ?>" required>
            </div>
            <div class="col-6">
                <label for="confirm">Confirmar contraseña</label>
                <input type="password" class="form-control" id="confirm" name="confirm" value="<?php echo $_POST['pass']; ?>" required>
            </div>
        </div>
        <div class="container p-3">
            <?php
                if(isset($_GET['id'])){
                    echo "<center><button class='btn btn-primary' type='submit'>Modificar</button></center>";
                } else {
                    echo "<center><button class='btn btn-primary' type='submit'>Crear</button></center>";
                }
            ?>
        </div>
    </form>
</div>
<?php include_once("libreria/foot.php"); ?>