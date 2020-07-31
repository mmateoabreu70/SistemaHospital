<?php 

include('libreria/includes.php');
?>
<form enctype = "multipart/form-data" class="col-md-6" method="post">
<div id="receta">
<h3>Receta</h3>
<p>Esta es la receta</p>
<textarea class="form-control" id="res" rows="3"></textarea>
</div>
</form>
</br>
<button class="btn btn-success" onclick="Imprimir('receta')" >Imprimir</button>

<?php include_once("libreria/foot.php"); ?>