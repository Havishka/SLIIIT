<?php 

include_once ("login_check.php");
include_once("config1.php");

$table = $_REQUEST['table'];
$data_id = $_REQUEST['data_id'];
$id = $_REQUEST['id'];
$page = base64_decode($_REQUEST['page']);

$delete = "delete from $table where $data_id='$id'";


if(mysql_query($delete))
{
	header("location: ".$page);
}
else
{
	header("location: ".$page);
}

?>