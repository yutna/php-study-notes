<?php

require('fpdf/fpdf.php');

$pdf = new FPDF('P', 'in', 'Letter');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 24);

$pdf->Cell(0, 0, 'Top Left!', 0, 1, 'L');
$pdf->Cell(6, 0.5, 'Top Right!', 1, 0, 'R');
$pdf->Ln(4.5);

$pdf->Cell(0, 0, 'This is the middle!', 0, 0, 'C');
$pdf->Ln(5.3);

$pdf->Cell(0, 0, 'Bottom Left!', 0, 0, 'L');
$pdf->Cell(0, 0, 'Bottom Right!', 0, 0, 'R');

$pdf->Output();
