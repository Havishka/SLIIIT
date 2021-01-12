<?php 
include 'login_check.php';
include_once ("config.php");

extract($_POST);

$flag = 0;

foreach($celid as $celid)
{
	$delete = "delete from $table where $data_id='$celid'";
	
	if(mysql_query($delete))
	{
		$flag = 0;
	}
	else
	{
		$flag++;
	}
	
}

if($flag==0)
{
	header("location: ".$page."?page=".$pageid."&m=suc");
}
else
{
	header("location: ".$page."?page=".$pageid."&m=err");
}

?>