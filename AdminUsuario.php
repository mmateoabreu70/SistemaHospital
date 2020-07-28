<?php
    session_start();
    include_once("libreria/includes.php");

    /* Llenando la tabla */
    $con = Conexion::getInstance();
    $sql = "SELECT idUsuario, nombre, apellido, usuario, pass, rol FROM usuarios 
            INNER JOIN roles ON usuarios.tipo = roles.idRol
            WHERE estado = 1";
    $result = mysqli_query($con, $sql);

    /* Verificar si hay id en la url */
    if(isset($_GET['id']))
    {
        $user = new Usuario();
        $user->Id = $_GET['id'];

        $user->eliminarUsuario();
<<<<<<< HEAD
        header("Location:AdminUsuario.php");
=======
        header("Location:AdminUsuario.php"); 
>>>>>>> master
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

                foreach($result as $fila)
                {
                    $count++;

                    echo "
                        <tr>
                            <td>$count</td>
                            <td>{$fila['nombre']}</td>
                            <td>{$fila['apellido']}</td>
                            <td>{$fila['usuario']}</td>
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