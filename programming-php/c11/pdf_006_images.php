<?php

require('fpdf/fpdf.php');

class MyPDF extends FPDF
{
    function header()
    {
        global $title;

        $this->SetFont('Times', '', 12);
        $this->SetDrawColor(0, 0, 180);
        $this->SetFillColor(230, 0, 230);
        $this->SetTextColor(0, 0, 255);
        $this->SetLineWidth(0.5);

        $width = $this->GetStringWidth($title) + 120;

        $this->Image('php.png', 10, 10.5, 15, 8.5);
        $this->Cell($width, 9, $title, 1, 1, 'C');
        $this->Ln(10);
    }

    function footer()
    {
        $msg = "This is the page footer -> Page {$this->PageNo()}/{nb}";

        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, $msg, 0, 0, 'C');
    }
}

$title = 'FPDF Library Page Header';

$pdf = new MyPDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Times', '', 24);
$pdf->Cell(0, 0, 'some text toward the bottom', 0, 0, 'L');
$pdf->Ln(225);

$pdf->Cell(0, 0, 'More text toward the bottom', 0, 0, 'C');

$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 15);

$pdf->Cell(0, 0, 'Top of page 2 after header', 0, 1, 'C');

$pdf->Output();
