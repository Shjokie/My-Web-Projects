<?php
	
error_reporting(E_ALL ^ E_DEPRECATED);

$user_name = "root";
$password = "";
$database = "eed_database";
$server = "localhost";

$db_handle = mysql_connect($server, $user_name, $password);

$db_found = mysql_select_db($database, $db_handle);

/*if ($db_found) {

print "Database Found ";


}
else {

print "Database NOT Found ";

}*/

?>