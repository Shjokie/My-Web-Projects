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
//require_once dirname(__FILE__) . '../Classes/PHPExcel.php';
// Create new PHPExcel object
//echo date('H:i:s'), " Create new PHPExcel object", EOL;
$objPHPExcel = new PHPExcel();

// Set document properties
//echo date('H:i:s'), " Set document properties", EOL;
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
        ->setLastModifiedBy("Maarten Balliauw")
        ->setTitle("PHPExcel Test Document")
        ->setSubject("PHPExcel Test Document")
        ->setDescription("Test document for PHPExcel, generated using PHP classes.")
        ->setKeywords("office PHPExcel php")
        ->setCategory("Test result file");


// Add some data
//echo date('H:i:s'), " Add some data", EOL;
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
    $x+=2;
    

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


// Save Excel 2007 file
//echo date('H:i:s'), " Write to Excel2007 format", EOL;
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', '../files/Excel.xlsx'));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

//echo date('H:i:s'), " File written to ", str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)), EOL;
//echo 'Call time to write Workbook was ', sprintf('%.4f', $callTime), " seconds", EOL;
// Echo memory usage
//echo date('H:i:s'), ' Current memory usage: ', (memory_get_usage(true) / 1024 / 1024), " MB", EOL;
// Save Excel 95 file
//echo date('H:i:s'), " Write to Excel5 format", EOL;
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//$objWriter->save(str_replace('.php', '.xls', __FILE__));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

//echo date('H:i:s'), " File written to ", str_replace('.php', '.xls', pathinfo(__FILE__, PATHINFO_BASENAME)), EOL;
//echo 'Call time to write Workbook was ', sprintf('%.4f', $callTime), " seconds", EOL;
// Echo memory usage
//echo date('H:i:s'), ' Current memory usage: ', (memory_get_usage(true) / 1024 / 1024), " MB", EOL;


// Echo memory peak usage
//echo date('H:i:s'), " Peak memory usage: ", (memory_get_peak_usage(true) / 1024 / 1024), " MB", EOL;

// Echo done
//echo date('H:i:s'), " Done writing files", EOL;
//echo 'Files have been created in ', getcwd(), EOL;
