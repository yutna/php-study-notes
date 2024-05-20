<?php

require('fpdf/fpdf.php');

class TablePDF extends FPDF
{
    function buildTable($header, $data)
    {
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');

        $widths = array(85, 40, 15);

        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($widths[$i], 7, $header[$i], 1, 0, 'C', 1);
        }

        $this->Ln();

        $this->SetFillColor(175);
        $this->SetTextColor(0);
        $this->SetFont('');

        $fill = 0;
        $url = 'http://www.oreilly.com';

        foreach ($data as $row) {
            $this->Cell($widths[0], 6, $row[0], 'LR', 0, 'L', $fill);

            $this->SetTextColor(0, 0, 255);
            $this->SetFont('', 'U');
            $this->Cell($widths[1], 6, $row[1], 'LR', 0, 'L', $fill, $url);

            $this->SetTextColor(0);
            $this->SetFont('');
            $this->Cell($widths[2], 6, $row[2], 'LR', 0, 'C', $fill);

            $this->Ln();

            $fill = ($fill) ? 0 : 1;
        }

        $this->Cell(array_sum($widths), 0, '', 'T');
    }
}

$dbconn = new mysqli('localhost', 'root', 'secret', 'library');
$sql = 'SELECT * FROM books ORDER BY title;';
$result = $dbconn->query($sql);

while ($row = $result->fetch_assoc()) {
    $data[] = array($row['title'], $row['ISBN'], $row['pub_year']);
}

$header = array('Title', 'ISBN', 'Year');

$pdf = new TablePDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 14);
$pdf->buildTable($header, $data);
$pdf->Output();
