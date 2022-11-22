<?php
require("./fpdf/fpdf.php");

$pdf = new FPDF('P', 'in', 'Letter');
$pdf->addPage();

$pdf->setFont('Arial', 'B', 24);

$pdf->cell(0, 0, "Book Store Invoice", 0, 0, 'C');
$pdf->setFont('Arial', 'B', 14);
$pdf->ln(1);

$pdf->cell(0, 0, 'Name', 0 ,1, 'L');
$pdf->cell(0, 0, 'Quantity', 0 ,1, 'C');
$pdf->cell(0, 0, 'Price', 0 ,1, 'R');
$pdf->ln(0.3);
$pdf->setFont('Arial', '', 10);


$pdf->output();
?>