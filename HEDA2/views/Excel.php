<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once '../Classes/PHPExcel.php';
require_once '../model/DBConnect.php';
require_once '../model/Messages.php';
require_once '../model/ClientModel.php';
$connect = new DBConnect();
$conn = $connect->getConnection();
$model = new ClientModel();
$message = new Messages();
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Robert")
        ->setLastModifiedBy("Robert")
        ->setTitle("PHPExcel Test Document")
        ->setSubject("PHPExcel Test Document")
        ->setDescription("Test document for PHPExcel, generated using PHP classes.")
        ->setKeywords("office PHPExcel php")
        ->setCategory("Test result file");

$result = mysqli_query($conn, "SELECT * FROM incoming_messages WHERE deleted=0 ORDER BY date_received DESC ");


$objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'RESPONDENT')
        ->setCellValue('B1', 'FUEL')
        ->setCellValue('C1', 'AMOUNT (Kg)')
        ->setCellValue('D1', 'DATE');

$header = 'A1:D1';
$objPHPExcel->getActiveSheet()->getStyle($header)->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('00ffff00');
$style = array(
    'font' => array('bold' => true,),
    'alignment' => array('horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_LEFT,),
);
$objPHPExcel->getActiveSheet()->getStyle($header)->applyFromArray($style);
// Miscellaneous glyphs, UTF-8

$num = 1;
$x = 2;
while ($row = mysqli_fetch_array($result)) {
    $head = 'A' . $x . ':D' . $x;
    $objPHPExcel->getActiveSheet()->getStyle($head)->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('00ffcccc');
    $style = array(
        'font' => array('bold' => false,),
        'alignment' => array('horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_GENERAL,),
    );
    $objPHPExcel->getActiveSheet()->getStyle($head)->applyFromArray($style);
    $x +=2;


    $id = $row['energy_id'];
    $fuelName = $message->getFuelName($id);
    $amount = $row['amount'];
    $model = new ClientModel();
    $mobNum = $row['sender_number'];
    $name = $model->getClientNameByMobNum($mobNum);
    $date = $row['date_received'];
    $num++;
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . $num, $name)
            ->setCellValue('B' . $num, $fuelName)
            ->setCellValue('C' . $num, $amount)
            ->setCellValue('D' . $num, $date);
}



$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(0)->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(1)->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(2)->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn(3)->setAutoSize(true);
//$objPHPExcel->getActiveSheet()->getStyle('A8')->getAlignment()->setWrapText(true);
// Rename worksheet
//echo date('H:i:s'), " Rename worksheet", EOL;
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', '../files/Excel.xlsx'));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//$objWriter->save(str_replace('.php', '.xls', __FILE__));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;
