<?php
require('../fpdf181/fpdf.php');

class PDF extends FPDF
{
function Header()
{
    // Logo
//    $this->Image('logo_pb.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(40,10,'Cierre de Caja',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetTitle('Cierre de Caja');
$pdf->SetFont('Arial','B',16);

$pdf->Cell(45,10,'Fecha:',0,0,'L');
$pdf->Cell(35,10,'12/12/2012',0,1,'L');

$pdf->Cell(50,10,'Usuario Turno 1:',0,0,'L');
$pdf->Cell(110,10,'Diego Huanaco',0,1,'L');
$pdf->Cell(50,10,'Usuario Turno 2:',0,0,'L');
$pdf->Cell(110,10,'Diego Huanaco',0,1,'L');
$pdf->Cell(50,10,'Usuario Turno 3:',0,0,'L');
$pdf->Cell(110,10,'Diego Huanaco',0,1,'L');
$pdf->Ln();

$pdf->Cell(50,10,' ',0,0,'L');
$pdf->Cell(30,10,'Turno',1,0,'C');
$pdf->Cell(30,10,'Ingreso',1,0,'C');
$pdf->Cell(30,10,'Egreso',1,1,'C');
$pdf->Cell(50,10,' ',0,0,'L');
$pdf->Cell(30,10,'Turno 1',1,0,'L');
$pdf->Cell(30,10,'$',1,0,'L');
$pdf->Cell(30,10,'$',1,1,'L');
$pdf->Cell(50,10,' ',0,0,'L');
$pdf->Cell(30,10,'Turno 2',1,0,'L');
$pdf->Cell(30,10,'$',1,0,'L');
$pdf->Cell(30,10,'$',1,1,'L');
$pdf->Cell(50,10,' ',0,0,'L');
$pdf->Cell(30,10,'Turno 3',1,0,'L');
$pdf->Cell(30,10,'$',1,0,'L');
$pdf->Cell(30,10,'$',1,1,'L');
$pdf->Cell(50,10,' ',0,0,'L');
$pdf->Cell(30,10,'Total',1,0,'L');
$pdf->Cell(30,10,'$',1,0,'L');
$pdf->Cell(30,10,'$',1,1,'L');


$pdf->Ln();
$pdf->Cell(40,10,' ',0,0,'L');
$pdf->Cell(65,10,'Total Ingreso Efectivo',1,0,'L');
$pdf->Cell(40,10,'$',1,0,'L');


$pdf->Output('example_001.pdf', 'I');
?>