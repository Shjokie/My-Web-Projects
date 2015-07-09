<?php
$file = '../files/List of Household energy use.pdf';
$filename = 'List of Household energy use.pdf'; /* Note: Always use .pdf at the end. */
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');
@readfile($file);

?>
