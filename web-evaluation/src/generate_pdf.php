<?php
require '../vendor/autoload.php';

use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\StreamReader;
use setasign\Fpdi\Tcpdf\Fpdi as TcpdfFpdi;
use TCPDF;

function generatePDFReport($url, $load_time, $word_count, $image_count, $link_count, $script_count) {
    // Create new PDF document
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 10, 'Evaluation Report', 0, 1, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'URL: ' . $url, 0, 1);
    $pdf->Cell(0, 10, 'Load Time: ' . $load_time . ' seconds', 0, 1);
    $pdf->Cell(0, 10, 'Word Count: ' . $word_count, 0, 1);
    $pdf->Cell(0, 10, 'Image Count: ' . $image_count, 0, 1);
    $pdf->Cell(0, 10, 'Link Count: ' . $link_count, 0, 1);
    $pdf->Cell(0, 10, 'Script Count: ' . $script_count, 0, 1);
    $pdf->Output('D', 'evaluation_report.pdf');
}
?>
