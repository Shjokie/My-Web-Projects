<?php
$file = '../files/Excel.xlsx';
$filename = 'Excel.xlsx'; /* Note: Always use .pdf at the end. */
header('Content-type: application/xlsx');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');
@readfile($file);

?>
