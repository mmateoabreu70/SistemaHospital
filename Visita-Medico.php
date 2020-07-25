<?php
include('libreria/head.php');
?>
<html>
<caption><h1><center>Visitas</caption></h1></center>
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