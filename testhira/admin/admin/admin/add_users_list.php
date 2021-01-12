<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadd Admin</title>
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
	$con1 = "and name ='$name'";	
}	
else {
	$con1 = "";
}

if(isset ($_REQUEST['user_id'] )&& $_REQUEST['user_id'] != '')
{
	$user_id =  $_REQUEST['user_id'];
	$con2 = "and user_id = '$user_id'";	
}	
else {
	$con2 = "";
}

if(isset ($_REQUEST['status'] )&&$_REQUEST['status'] != '')
{
	$status=  $_REQUEST['status'];
	$con3 = "and status = '$status'";	
}	
else {
	$con3 = "";
}

if(isset ($_REQUEST['criteria'])&&$_REQUEST['criteria'] != '')
{
	$criteria =  $_REQUEST['criteria'];
	$con4 = "and criteria = '$criteria'";	
}	
else {
	$con4 = "";
}

include 'login_check.php';
include_once ("functions/pageno.php");
include_once ("config.php");

$pageno = (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 20;
$startpoint = ($pageno * $limit) - $limit;

$statement = "admin_users where 1 $con1 $con2 $con3 $con4 $con5 $con6 order by id desc";

echo "admin_users where 1 $con1 $con2 $con3 $con4 $con5 $con6 order by id desc";

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
    	<th colspan="8" class="table_title">User List - <?php echo "(" . $reco['num'].")"?></th>
    </tr>
    <tr>
    	<td><b>Name:</b></td>
        <td><input type="text" name="name" class="text_box" value="<?=$_REQUEST['name']?>" /></td>
        <td><b>User Id :</b></td>
        <td><input type="text" name="user_id" class="text_box" value="<?=$_REQUEST['user_id']?>" /></td>
        <td><b>Status:</b></td>
        <td>  
           <select name="status" class="text_box">
          	    <option value="">---select---</option>
                <option value="1">Active</option>
                <option value="0">InActive</option>             
            </select>
            </td>
        <td><b>Key Criteria :</b></td>
        <td><select name="criteria" class="text_box">
          	    <option  value="">---select---</option>
                <option  value="1">Admin</option>
                <option  value="2">Cordinator</option>             
            </select>
            </td>
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
            <th>User Id</th>
            <th>Status</th>
			<th>Criteria</th>
			<th></th>
            
            
        </tr>

<?php if(mysql_num_rows($select_ad)>0)
{
	 while($fetch_ad = mysql_fetch_array($select_ad))
	 {

		$district_id = $fetch_ad['name'];
		$district_name = mysql_fetch_assoc(mysql_query("select district from india_districts_detail where district_id='$district_id'"));

		if($fetch_ad['status']=='0' || $fetch_ad['status']=='') 
		{
			$status = '';
		}
		else
		{
			$status = $fetch_ad['status'];
		}
		
		$pagename = base64_encode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 
?>
<tr>
	<td align="center"><?=$si?></td>
    <td><?=$fetch_ad['name']?></td>
    <td><?=$fetch_ad['user_id']?></td>
    <td><?php if($fetch_ad['status']==1){echo "Active";}else{echo"InActive";}?></td>
	<td><?php if($fetch_ad['criteria']==1){echo"Admin";}
			elseif($fetch_ad['criteria']==2){echo"SEO";}
			elseif($fetch_ad['criteria']==3){echo"Cordinator";}
			elseif($fetch_ad['criteria']==4){echo"Cordinator_Course_Enquiry";}
			elseif($fetch_ad['criteria']==5){echo"Cordinator_Franchise_Enquiry";}
			elseif($fetch_ad['criteria']==6){echo"Freelancer Seo";}?></td>
	
    <td align="center">
    	<a href="add_users_view.php?id=<?=$fetch_ad['id']?>">View</a> | 
    	<a href="delete.php?page=<?=$pagename?>&table=admin_users&id=<?=$fetch_ad['id']?>&data_id=id" onClick="return confirmDelete()">Delete</a>    
    </td>
</tr>
<?php $si++; } } else { echo "<tr><td colspan='8'>
<div class='alert alert-block alert-info fade in no-margin'>
<h4 class='alert-heading'> Alert! </h4>
<p>Sorry no records found.</p>
</div></td></tr>"; }?>        
	<tr>
    	<td colspan="8">
        	
            <form method="post" action="Export_excel_user_list.php">
            	<input type="hidden" name="name" value="<?=$_REQUEST['name']?>"/>
                <input type="hidden" name="user_id" value="<?=$_REQUEST['user_id']?>"/>
                <input type="hidden" name="password" value="<?=$_REQUEST['password']?>"/>
                <input type="hidden" name="status" value="<?=$_REQUEST['status']?>"/>
				<input type="hidden" name="criteria" value="<?=$_REQUEST['criteria']?>"/>
                <input class="search" type="submit" value="Export Report" name="export">
            </form>
            
        </td>
    </tr>
  </table>

  <div class="page_no_holder"><?=$pagination?></div>
    
    
  <div class="clear"></div>
    
</div>

</body>
</html>
