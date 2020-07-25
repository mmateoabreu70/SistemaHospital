<?php
include('libreria/head.php');
?>
<html>
<caption><h1><center>Visitas</caption></h1></center>
<link rel= "stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </br>
    <center>
    <form enctype = "multipart/form-data" class="col-md-4" method="post">
    <select class="form-control form-control-sm" class="col s4 " readonly>
    <option>Pacientes</option>    
    <option>pepe</option>    

    </form>
</select>
</br>
</br>
<form>
  <div class="row">
    <div class="col">
      <input type="date" class="form-control" placeholder="First name">
    </div>
    <div class="col">
      <input type="date" class="form-control" placeholder="Last name">
    </div>
  </div>
  </br>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Comentario</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
</form>
</center>
<center><button type="submit" class="btn btn-primary">Agregar</button></center>
<?php
include('libreria/foot.php');
?>