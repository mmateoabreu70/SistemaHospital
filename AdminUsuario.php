<?php
    session_start();
    include_once("libreria/includes.php");

    if($_SESSION['rol'] == 'Administrador')
    {
        /* Llenando la tabla */
        $con = Conexion::getInstance();
        $sql = "SELECT idUsuario, nomUser, apellidoUser, user, pass, rol FROM usuarios 
                INNER JOIN roles ON usuarios.tipo = roles.idRol
                WHERE estado = 1
                ORDER BY idUsuario";
        $result = mysqli_query($con, $sql);

        /* Verificar si hay id en la url */
        if(isset($_GET['id']))
        {
            $user = new Usuario();
            $user->Id = $_GET['id'];

            $user->eliminarUsuario();
            header("Location:AdminUsuario.php"); 
        }
    } else {
        header("Location:index.php");
    }
?>

<div class="px-3">
    <div class="py-3">
        <h3>Administrar usuarios</h3>
    </div>
    <div class="pb-3">
        <a href="CrearUsuario.php" class="btn btn-success">Nuevo</a>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Usuario</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Rol</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $count = 0;

                foreach($result as $fila)
                {
                    $count++;

                    echo "
                        <tr>
                            <td>$count</td>
                            <td>{$fila['nomUser']}</td>
                            <td>{$fila['apellidoUser']}</td>
                            <td>{$fila['user']}</td>
                            <td>{$fila['pass']}</td>
                            <td>{$fila['rol']}</td>
                            <td colspan='2'>
                                <a href='CrearUsuario.php?id={$fila['idUsuario']}' class='btn btn-warning'>Modificar</a>
                                <a href='AdminUsuario.php?id={$fila['idUsuario']}' class='btn btn-danger'>Eliminar</a>
                            </td>
                        </tr>
                    ";
                }

            ?>
        </tbody>
    </table>
</div>

<?php include_once("libreria/foot.php") ?>