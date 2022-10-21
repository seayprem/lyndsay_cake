<?php 
// error_reporting(0);
require_once('fpdf/fpdf.php');

$pdf = new FPDF('L', 'mm', 'A4'); // Change แนวตั้ง L = นอน P = ตั้งละมั้ง ลืมหมดละ ไม่ได้เขียนมา 21 วัน

$pdf->AddPage();
$pdf->AddFont('angsa','','angsa.php');

$pdf->SetFont('angsa', '', 20);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'Lyndsay Cake'), 0, 1, 'C');
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'รายงานสรุปยอดขาย'), 0, 1, 'C');
$pdf->SetFont('angsa', '', 16);

$pdf->Cell(12,10, iconv('UTF-8', 'TIS-620', 'ลำดับ'), 1, 0, 'C');
$pdf->Cell(30,10, iconv('UTF-8', 'TIS-620', 'รหัสสินค้า'), 1, 0, 'C');
$pdf->Cell(108,10, iconv('UTF-8', 'TIS-620', 'ชื่อสินค้า'), 1, 0, 'C');
$pdf->Cell(20,10, iconv('UTF-8', 'TIS-620', 'จำนวนสินค้า'), 1, 0, 'C');
$pdf->Cell(30,10, iconv('UTF-8', 'TIS-620', 'สถานะ'), 1, 0, 'C');
$pdf->Cell(40,10, iconv('UTF-8', 'TIS-620', 'ผู้รับผิดชอบ'), 1, 0, 'C');
$pdf->Cell(40,10, iconv('UTF-8', 'TIS-620', 'วันเวลา'), 1, 1, 'C');

$msg = "";

$datesss = date("Y-m-d_h-i-s-a");
$math_random = "lyndsaycake".$datesss.".pdf";
$filename = "report/".$math_random."";


$pdf->OutPut('F', $filename, true);

$pdf->OutPut();

?>