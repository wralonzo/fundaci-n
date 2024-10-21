<?php
require './fpdf/fpdf.php';

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->SetFont('Arial','B',16);
    // Arial bold 15
    $this->Cell(60);
    // Movernos a la derecha
    $this->Cell(70,10,'Reporte',1,0,'C');
    // Título
    // Salto de línea
    $this->Ln(20);
    $this->Cell(30,10,'#',1,0,'C');
    $this->Cell(30,10,'Nombre',1,0,'C');
    $this->Cell(40,10,'Apellido',1,0,'C');
    $this->Cell(40,10,'Dpi',1,0,'C');
    $this->Cell(40,10,'Telefono',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('pagina') .$this->PageNo().'/{nb}',0,0,'C');
}
}
include "../conexion.php";
$consulta = "SELECT * FROM usuario";
$resultado = mysqli_query($conexion, $consulta);
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

while ($row=$resultado->fetch_assoc()) {
  $pdf->Cell(30,10,$row['idusuario'],1,0,'C',0);
  $pdf->Cell(30,10,$row['nombre'],1,0,'C',0);
  $pdf->Cell(40,10,$row['apellido'],1,0,'C',0);
  $pdf->Cell(40,10,$row['dpi'],1,0,'C',0);
  $pdf->Cell(40,10,$row['telefono'],1,1,'C',0);
}


$pdf->Output();
?>
