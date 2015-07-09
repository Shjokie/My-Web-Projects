<?php
	
error_reporting(E_ALL ^ E_DEPRECATED);

$user_name = "eedadvis_d4";
$password = "r]pF.X34FTf.";
$database = "eedadvis_d4";
$server = "localhost";

$db_handle = mysql_connect($server, $user_name, $password);

$db_found = mysql_select_db($database, $db_handle);

/*if ($db_found) {

print "yaaay" or die(mysql_error());


}*/



?>