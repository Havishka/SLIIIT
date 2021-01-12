<?php
error_reporting(0);
if(!isset($_SESSION)) 
{ 
	session_start(); 
}

ob_start();
   
    $id=$_SESSION['foreuid'];
   $url=$_POST['url'];
   $titletag=$_POST['titletag'];
   $description=($_POST['description']);
   $keywords=$_POST['keywords'];
   
   
	include("config.php");
	
	$insert="insert into lw_admin_add (uid,url,titletag,description,keywords)values('$id','$url','$titletag','$description','$keywords')";
	if(mysql_query($insert))
	{
		echo '<script>alert("Added successfully"); window.location.assign("website_add_list.php?id='.$id.'");</script>';
								
	}
	else
	{
		echo '<script>alert("Error"); window.location.assign("website_add_page.php?id='.$id.'");</script>';
	}
	
	?>



  
