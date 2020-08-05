<?php
session_start();
    include_once("libreria/includes.php");
?>    
<div class="container">
    <!-- Nombre de la pagina -->  
     <h3 align ="center">     
     Cumpleaños
     </h3>
     <br>
     <!--Formulario de citas-->
     <div align ="center" >
       <div class="col col-sm-6">
         <form align="center" enctype="multipart/form-data" method="POST" action="">
         <!--Cumpleaños-->
         <div class="form-row col-12 py-2">
                <!--label-->
                <label class="input-group-addon" for="cumpleaños">Cumpleaños</label>
                <!--drop down list-->
                <select name="cumpleaños" class="form-control">                 
                <option value="0">Seleccione un mes</option>
                <option value="01">Enero</option>                                  
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
                </select>
            </div>
         <button onclick="luis()"  class="btn btn-success">Imprimir cumpleanños</button>
        </div>        
         </form>     
     </div>     
</div>

<?php
function luis(){
    if(isset($_POST))
    {$mes = $_POST['cumpleaños'];
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,utf8_decode('Reporte de cumpleaños'),1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
//require('libreria/db/conexion.php');
$conexion = Conexion::getInstance();
$query = "SELECT `nombre`,`apellido`,`nacimiento`,`telefono` FROM pacientes WHERE MONTH(`nacimiento`) = 4"; 
$resultado = mysqli_query($conexion, $query);  
$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'NOMBRE',0,0,'C',0);
$pdf->Cell(40,10,'APELLIDO',0,0,'C',0);
$pdf->Cell(40,10,'NACIMIENTO',0,0,'C',0);
$pdf->Cell(40,10,'TELEFONO',0,1,'C');
while($row=mysqli_fetch_array($resultado))
{
    $pdf->Cell(40,10,$row['nombre'],0,0,'C',0);
    $pdf->Cell(40,10,$row['apellido'],0,0,'C',0);
    $pdf->Cell(40,10,$row['nacimiento'],0,0,'C',0);
    $pdf->Cell(40,10,$row['telefono'],0,1,'C');    
}
$pdf->Output();
}
}
?>