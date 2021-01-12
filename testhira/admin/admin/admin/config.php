<?php
ob_start();
error_reporting(0);
$user_hostname = "localhost";
$user_username = "root";
$user_password = "";
$user_database = "caddcent_main";

$connect = mysql_connect($user_hostname, $user_username, $user_password);
mysql_select_db($user_database, $connect);
?>