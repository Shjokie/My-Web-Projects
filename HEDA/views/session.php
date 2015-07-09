<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include ('../model/DBConnect.php');
$a = new DBConnect();
        
//$con = $a->connect();
$connection = $a->getConnection();
// Selecting Database
//$db = mysql_select_db("company", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query( $connection, "select username from system_users where username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
$login_session = "You have not logged on";
mysqli_close($connection); // Closing Connection
header('Location: ../index.php'); // Redirecting To Home Page

}

/*$user_add = $_SESSION['new_user'];
$ses = mysqli_query($connection,"SELECT first_name, last_name from users_table WHERE deleted = 0 AND email")*/

?>