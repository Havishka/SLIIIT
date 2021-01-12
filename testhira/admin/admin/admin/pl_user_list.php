<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IID Admin</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom.js"></script>
<link href="css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
<script>
$(function() {
$(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat: "yy-mm-dd"
        });
});
</script>

<script type="text/javascript">
	function confirmDelete()
	{
	var agree=confirm("Are you sure you want to delete this file?");
	if(agree)
	  return true;
	else
	    return false;
	}
</script>

</head>

<body>

<?php 

if(isset ($_REQUEST['name'])&&$_REQUEST['name'] != '')
{
	$name =  $_REQUEST['name'];
	$con1 = "and name  like '%$name%'";	
}	
else {
	$con1 = "";
}

if(isset ($_REQUEST['email'] )&& $_REQUEST['email'] != '')
{
	$email =  $_REQUEST['email'];
	$con2 = "and email = '$email'";	
}	
else {
	$con2 = "";
}

if(isset($_REQUEST['mobile']) && $_REQUEST['mobile'] != '')
{
	$mobile =  $_REQUEST['mobile'];
	$con3 = "and mobile  =  '$mobile'";	
}
else
{
	$con3 = ""; 
}

include 'login_check.php';
include_once ("functions/pageno.php");
include_once ("config.php");

$pageno = (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 20;
$startpoint = ($pageno * $limit) - $limit;

$statement = "pl_user where 1 $con1 $con2 $con3 order by uid  desc";

$where_string = $_SERVER['REQUEST_URI'];
 
$pagination = pagination($statement,$limit,$pageno,$where_string);

$select_ad = mysql_query("select * from {$statement} LIMIT {$startpoint} , {$limit}");
	
$si=1;
$co=mysql_query("select count(*) as num from {$statement}");
$reco=mysql_fetch_assoc($co);

?>

<?php include 'inc/header.php'; ?>
<?php include 'inc/top_nav.php'; ?>

<div class="body_holder">
  <form>
  <table align="center" width="90%" cellpadding="10" cellspacing="0" class="table_1 search_table">
  	<tr>
    	<th colspan="8" class="table_title">Student List - <?php echo "(" . $reco['num'].")"?></th>
    </tr>
    <tr>
    	
        <td><b>Name:</b></td>
        <td><input type="text" name="name" class="text_box" value="<?=$_REQUEST['name']?>" /></td>
        <td><b>Email :</b></td>
        <td><input type="text" name="email" class="text_box" value="<?=$_REQUEST['email']?>" /></td>
        <td><b>Mobile:</b></td>
        <td><input type="text" name="mobile" class="text_box" value="<?=$_REQUEST['mobile']?>" /></td>
    </tr>
    <tr>
    	<td colspan="8">
        	<input type="submit" name="search" class="search" value="Search" />
        </td>
    </tr>
  </table>
  </form>
    
	<table align="center" width="90%" cellpadding="10" cellspacing="0" class="table_1">
    	<tr>
        	<th>Sno</th>
            <th>Name</th>
			<th>Email</th>
			<th>Mobile</th>
            <th>Photo</th>
            <th>CV</th>
            <th>Status</th>
        </tr>

<?php 
if(mysql_num_rows($select_ad)>0)
{
	 while($fetch_ad = mysql_fetch_array($select_ad))
	 {

		if($fetch_ad['status']=='0' || $fetch_ad['status']=='') 
		{
			$status = 'Inactive';
		}
		else
		{
			$status = 'Active';
		}
?>
<tr>
	<td align="center"><?=$si?></td>
    <td><?=$fetch_ad['name']?></td>
    <td><?=$fetch_ad['email']?></td>
    <td><?=$fetch_ad['mobile']?></td>
    <td align="center"><img width="50px" height="50px" src="../<?=$fetch_ad['photo']?>" /></td>
    <td><a href="../<?=$fetch_ad['cv']?>">Download</a></td>
    <td><?=$status?></td>
</tr>
<?php $si++; } } else { echo "<tr><td colspan='8'>
<div class='alert alert-block alert-info fade in no-margin'>
<h4 class='alert-heading'> Alert! </h4>
<p>Sorry no records found.</p>
</div></td></tr>"; }?>        
  </table>

  <div class="page_no_holder"><?=$pagination?></div>
    
    
  <div class="clear"></div>
    
</div>

</body>
</html>
