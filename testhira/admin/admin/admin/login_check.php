<?php   
error_reporting(0);
if(!isset($_SESSION)) 
{ 
	session_start(); 
}

ob_start();
   
if(!isset($_SESSION['foreuid']) )
{
	header("Location: index.php");
}
else {
		
	include_once 'config.php';
	

	$select_us = mysql_query("select * from admin_users where id='$_SESSION[foreuid]'");
	$fetch_u_details = mysql_fetch_array($select_us);
	
}

?>