<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadd Admin</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style>
table{
	padding:30px 20px;
	background:#FFF;
	margin-top:15%;
	border:1px solid #CDCDCD;
	border-radius:8px;
	box-shadow:0 0 13px -6px #000;
}
.text_box{
	width:300px;
	margin-bottom:10px;
	padding:10px 10px;
}
</style>
</head>

<body>
<?php include 'login_check.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/top_nav.php'; ?>

<?php 
session_start();
ob_start();

if(isset($_POST['login']))
{
	
	$uid = mysql_real_escape_string($_POST['uid']);
	$old_password = mysql_real_escape_string($_POST['old_password']);
	$old_password = md5($old_password);
	
	$new_password = mysql_real_escape_string($_POST['new_password']);
	$new_password = md5($new_password);
	$con_password = mysql_real_escape_string($_POST['con_password']);
	
	
	
	$sql="SELECT * FROM admin_users WHERE id ='$uid' and password ='$old_password'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	
	if($count<=0)
	{
		echo '<script>window.location.assign("change_password.php?msg=err&cont=Old Password not match.");</script>';
	}
	else
	{
		
		if($_POST['new_password']==$_POST['con_password'])
		{
			
			$updated = "update admin_users set password='$new_password' where id='$uid'";
			
			if(mysql_query($updated))
			{
				echo '<script>window.location.assign("change_password.php?msg=err&cont=New password updated");</script>';
			}
			
		}
		else
		{
			echo '<script>window.location.assign("change_password.php?msg=err&cont=New password and confirm password does not match");</script>';
		}
	}
	
}

?>	
    
<form method="post" name="login">    
	<table align="center" width="300" style="margin-top:10%;">
    	<tr>
        	<th align="center"><h2>Change Password</h2></th>
		</tr>
        <tr>
        	<td align="center" valign="middle">
            <?php if(isset($_REQUEST['cont']))
			{
				echo '<small style="background:#00aeff;color: #fff;display: block;font-size:12px;padding: 5px 0;">'.$_REQUEST['cont'].'</small>';
			}?>	
            </td>
        </tr>
    	<tr>
            <td></td>
        </tr>
        <tr>
            <td>
            	<input type="hidden" name="uid" class="text_box" value="<?=$fetch_u_details['id']?>" />
	            <input type="password" name="old_password" class="text_box" placeholder="Old Password"/>
            </td>
        </tr>
        <tr>
            <td><input type="password" name="new_password" class="text_box" placeholder="New Password"/></td>
        </tr>
        <tr>
            <td><input type="password" name="con_password" class="text_box" placeholder="Confirm Password"/></td>
        </tr>
        <tr>
            <td><input type="submit" name="login" value="Change" class="search" /></td>
        </tr>
    </table>
</form>

</body>
</html>
