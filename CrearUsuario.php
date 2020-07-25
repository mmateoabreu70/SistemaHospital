<?php
session_start();
include_once("libreria/head.php");

?>

<div class="px-xl-5 py-3 ">
    <div class="container p-3">
        <center><h3>Crear usuario</h3></center>
    </div>
    <form method="post">
        <div class="form-row col-12 py-3">
            <div class="col-6">
                <label for="nombre">Nombres</label>
                <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" required>
            </div>
            <div class="col-6">
                <label for="nombre">Apellidos</label>
                <input type="text" class="form-control form-control-sm" id="apellido" name="apellido" required>
            </div>
        </div>
    </form>
</div>

<?php include_once("libreria/foot.php"); ?>