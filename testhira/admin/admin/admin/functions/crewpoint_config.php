<?php	
ob_start();
$user_hostname = "localhost";
$user_username = "root";
$user_password = "";
$user_database = "crewpoint";
//ini_set('display_errors',"off");

$connect = mysql_connect($user_hostname, $user_username, $user_password);
mysql_select_db($user_database, $connect);
	
?>