<?php

require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 5, 'Regular normal Arial Text here, size 12', 0, 1, 'L');
$pdf->Ln();

$pdf->SetFont('Arial', 'IBU', 20);
$pdf->Cell(0, 15, 'This is Bold, Underlined, Italicised Text size 20', 0, 0, 'L');
$pdf->Ln();

$pdf->SetFont('Times', 'IU', 15);
$pdf->Cell(0, 5, 'This is Underlined Italicised 15pt Times', 0, 0, 'L');

$pdf->Output();
