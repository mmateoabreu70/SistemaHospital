<?php
include_once("libreria/includes.php");

?>

<center>
    <div class="container">
        <p>Bienvenido, <?php echo $_SESSION['rol']. " <strong>". $_SESSION['nombre']; ?></strong>. <br/>
        Ve al menu y elige una opcion</p>
    </div>
</center>

<?php include_once("libreria/foot.php") ?>