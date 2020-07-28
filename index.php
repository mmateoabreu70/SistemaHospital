<?php
session_start();
include_once("libreria/includes.php");

if(isset($_SESSION['user']))
{
    
}
else {
    header("Location: login.php");
}


?>

<center>
    <div class="container">
        <p>Bienvenido, <?php echo $_SESSION['rol']. " <strong>". $_SESSION['nombre']; ?></strong>. <br/>
        Ve al menu y elige una opcion</p>
    </div>
</center>
<<<<<<< HEAD

=======
>>>>>>> master

<?php include_once("libreria/foot.php") ?>