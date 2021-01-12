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
			yearRange: "+0:+1",
			dateFormat: "yy-mm-dd"
        });
});
</script>

</head>

<body>

<?php 

include 'login_check.php';

?>

<?php include 'inc/header.php'; ?>
<?php include 'inc/top_nav.php'; ?>

<div class="body_holder">

	<span class="form_title"><br />User List<br /><br /></span>
    
	<table align="center" width="90%" cellpadding="10" cellspacing="0" style="font-size:14px;">
    	
<?php 
	include_once("config1.php");
	$id = $_REQUEST['id'];
	
if(isset($_POST['submit']))	
{
	
	extract($_POST);
	$enpassword = md5($password);
	
	if($password=='')
	{
		$update = "update admin_users set name='$name',user_id='$user_id',status='$status',criteria='$criteria' where id='$id'";
	}
	else
	{
		$update = "update admin_users set name='$name',user_id='$user_id',password='$enpassword',status='$status',criteria='$criteria' where id='$id'";
	}
		
	if(mysql_query($update))
	{
		echo '<script>alert("Updated successfully"); window.location.assign("add_users_list.php?id='.$id.'");</script>';
	}
	else
	{
		echo '<script>alert("Error not updated"); window.location.assign("add_users_view.php?id='.$id.'");</script>';
	}
	
}
	
	
	$select = mysql_fetch_assoc(mysql_query("select * from admin_users where id='$id'"));
	
?>
<form method="post" name="update">
        <tr>
            <td width="150"><b>Name</b></td>
            <td width="5"> : </td>
            <td><input type="text" name="name" class="text_box" value="<?=$select['name']?>" /></td>
        </tr>
        
        
        <tr>
            <td width="150"><b>User ID</b></td>
            <td width="5"> : </td>
            <td><input type="text" name="user_id" class="text_box" value="<?=$select['user_id']?>" /></td>
        </tr>
        <tr>
            <td width="150"><b>Password</b></td>
            <td width="5"> : </td>
            <td><input type="text" name="password"class="text_box"  value="" /></td>
        </tr>
		<tr>
          <td width="150"><b>Status</b></td><td width="5"> : </td>
          <td> <select name="status" class="text_box">
          	    <option <?php if($select['status']=='') { echo "selected='selected'";} ?> value="">---select---</option>
                <option <?php if($select['status']==1){echo "selected='selected'";} ?> value="1">Active</option>
                <option <?php if($select['status']==0){echo "selected='selected'";} ?> value="0">InActive</option>             
            </select>
            </td>
        </tr>
		<tr>
          <td width="150"><b>Criteria</b></td><td width="5"> : </td>
          <td> <select name="criteria" class="text_box">
          	    <option <?php if($select['criteria']=='') { echo "selected='selected'";} ?> value="">---select---</option>
                <option <?php if($select['criteria']==1){echo "selected='selected'";} ?> value="1">Admin</option>
                <option <?php if($select['criteria']==2){echo "selected='selected'";} ?> value="2">SEO</option>             
				<option <?php if($select['criteria']==3){echo "selected='selected'";} ?> value="3">Cordinator</option>             
				<option <?php if($select['criteria']==4){echo "selected='selected'";} ?> value="4">Cordinator_Course_Enquiry</option>             
				<option <?php if($select['criteria']==5){echo "selected='selected'";} ?> value="5">Cordinator_Franchise_Enquiry</option>             
                <option <?php if($select['criteria']==6){echo "selected='selected'";} ?> value="6">Freelancer Seo</option>             
            </select>
            </td>
        </tr>
        <tr>
            <td colspan="3"><input type="submit" name="submit" value="Update" class="search" />
			</td><tr>

        </tr>
        </form>
    </table>
	<br /><br />
    
</div>

</body>
</html>
