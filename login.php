<?php
include_once("libreria/includes.php");

$errorMsg = "";

?>

<div id="back-div">
    <div id="main-div">
        <form action="" method="post">
            <div class="container">
                <h3>Acceder</h3>
            </div>
            <span class="invalid-feedback"><?php echo $errorMsg; ?></span>
            <div class="form-group col-12">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control form-control-sm" id="usuario" name="usuario" value="<?php echo $usuario; ?>">
            </div>
            <div class="form-group col-12">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control form-control-sm" id="password" name="password" value="<?php echo $pass; ?>">
            </div>
            <div class="form-row text-center">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once("libreria/foot.php"); ?>