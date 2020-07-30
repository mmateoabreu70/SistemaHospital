<?php
/* Comentario */
include_once("libreria/objetos/login.php");

$errorMsg = "";
$usuario = "";
$pass = "";

if($_POST)
{
   

    /* Recuperando informacion de los inputs */
    $usuario = $_POST['usuario'];
    $pass = $_POST['password'];

    /* Instanciar objeto Login y asignando valores a las propiedades */ 
    $login = new Login();

    $login->user = $usuario;
    $login->pass = $pass;

    $confirm = $login->validarUsuario();

    if(!$confirm)
    {
        $errorMsg = "Usuario o contraseña incorrecto";
    } else {
        header("Location: index.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body style="background-image: url('source/background-login.jpg');">

    <div id="main-div">
        <form action="" method="post">
            <div class="container">
                <h3>Acceder</h3>
            </div>
            <span class="errorMsg"><?php echo $errorMsg==null ? "" : ""; ?></span>
            <div class="form-group col-12">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control form-control-sm" id="usuario" name="usuario" value="<?php echo $usuario; ?>" required>
            </div>
            <div class="form-group col-12">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control form-control-sm" id="password" name="password" value="<?php echo $pass; ?>" required>
            </div>
            <div class="form-row text-center">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>

