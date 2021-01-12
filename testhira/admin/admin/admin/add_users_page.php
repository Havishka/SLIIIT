<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadd Admin</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom.js"></script>
<link href="css/jquery-ui-1.10.3.custom.css" rel="stylesheet">

</head>

<body>

<?php include 'login_check.php';?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/top_nav.php'; ?>


<div class="body_holder">
			

  <form method="post" name="pagesettings">
  <table align="center" width="90%" cellpadding="10" cellspacing="0" class="table_1 search_table">
  <tbody>
  	<tr>
    	<th colspan="8" class="table_title">Website Add Page </th>
    </tr>
    <tr>
    	<td><b>Name :</b></td>
        <td><input type="text" id="name"name="name" class="text_box" value="" /></td></tr><tr>
        <td><b>User Id :</b></td>
        <td><input type="text" id="user_id"name="user_id" class="text_box" value="" /></td></tr>
		<tr>
        <td><b>Password :</b></td>
        <td><input type="password" id="password"name="password" class="text_box" value="" /></td></tr><tr>
          <td class="aligntd">Status</td>
          <td class="aligntdnb"> <select name="status" class="InputBox">
          	    <option value="">---select---</option>
                <option value="1">Active</option>
                <option value="0">InActive</option>              
            </select>
            </td>
        </tr> <tr>
          <td class="aligntd">Criteria</td>
          <td class="aligntdnb"> <select name="criteria" class="InputBox">
          	    <option value="">---select---</option>
                <option value="1">Admin</option>
                <option value="2">SEO</option>     
				<option value="3">Cordinator</option>
				<option value="4">Cordinator_Course_Enquiry</option>
				<option value="5">Cordinator_Franchise_Enquiry</option>
                <option value="6">Freelancer Seo</option>
            </select>
            </td>
        </tr> <tr>
    </tr>
    <tr>
    	<td colspan="8">
        	<input type="submit" name="search" onclick="return check();"class="search" value="Submit" />
        </td>
    </tr></tbody>
  </table>
  </form>

<?php
error_reporting(0);
/*if(!isset($_SESSION)) 
{ 
	session_start(); 
}

ob_start();*/

if(isset($_POST['search']))
{
   
    
   $name=$_POST['name'];
   $user_id=$_POST['user_id'];
   $status=$_POST['status'];
   $criteria=$_POST['criteria'];
   $com_code = md5($_POST['password']);
   
	include("config.php");
	
	$insert="INSERT INTO admin_users(id,name,user_id,password,status,criteria) 
	VALUES (NULL,'$name','$user_id','$com_code','$status','$criteria')";
	if(mysql_query($insert))
	{
		echo '<script>alert("Added successfully"); window.location.assign("add_users_list.php?id='.$id.'");</script>';
								
	}
	else
	{
		echo '<script>alert("Error"); window.location.assign("add_users_page.php?id='.$id.'");</script>';
	}
}
?>

  
</body>

    <script type="text/javascript">
function check()
{

  if (document.pagesettings.name.value=='')
  {
  alert("Type the name");
  document.pagesettings.name.focus();
  return false;
  }
  if (document.pagesettings.user_id.value=='')
  {
  alert("Type Page User ID");
  document.pagesettings.user_id.focus();
  return false;
  }
  if (document.pagesettings.status.value=='')
  {
  alert("select the status");
  document.pagesettings.status.focus();
  return false;
  }
  if (document.pagesettings.criteria.value=='')
  {
  alert("select the criteria");
  document.pagesettings.criteria.focus();
  return false;
  }
  
}


function checkForInt(evt) 
{
	evt = ( evt ) ? evt : window.event;
	var charCode = ( evt.which ) ? evt.which : evt.keyCode
	return (charCode <= 31 || (charCode >= 48 && charCode <= 57))
}

</script>


</html>
