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

	<span class="form_title"><br />How to Join Enquiry<br /><br /></span>
    
	<table align="center" width="90%" cellpadding="10" cellspacing="0" style="font-size:14px;">
    	
<?php 
include_once ("config.php");	
	$id = $_REQUEST['id'];
	$select = mysql_fetch_assoc(mysql_query("select * from how_to_join where id='$id'"));
?>

        <tr>
            <td width="150"><b>Course Name</b></td>
            <td width="5"> : </td>
            <td><?=$select['courseName']?></td>
        </tr>

        <tr>
            <td width="150"><b>Specialization</b></td>
            <td width="5"> : </td>
            <td><?=$select['specialization']?></td>
        </tr>
        
        <tr>
            <td width="150"><b>Name</b></td>
            <td width="5"> : </td>
            <td><?=$select['fullName']?></td>
        </tr>

        <tr>
            <td width="150"><b>Date of Birth</b></td>
            <td width="5"> : </td>
            <td><?=$select['dob']?></td>
        </tr>

        <tr>
            <td width="150"><b>Address</b></td>
            <td width="5"> : </td>
            <td><?=$select['address']?></td>
        </tr>

        <tr>
            <td width="150"><b>National ID</b></td>
            <td width="5"> : </td>
            <td><?=$select['national_id']?></td>
        </tr>

        <tr>
            <td width="150"><b>Email</b></td>
            <td width="5"> : </td>
            <td><?=$select['email']?></td>
        </tr>

        <tr>
            <td width="150"><b>Mobile</b></td>
            <td width="5"> : </td>
            <td><?=$select['mobile']?></td>
        </tr>

        <tr>
            <td width="150"><b>Occupation</b></td>
            <td width="5"> : </td>
            <td><?=$select['occupation']?></td>
        </tr>

        <tr>
            <td width="150"><b>Institute Name</b></td>
            <td width="5"> : </td>
            <td><?=$select['institute_name']?></td>
        </tr>
        <tr>
            <td width="150"><b>Institute ddress</b></td>
            <td width="5"> : </td>
            <td><?=$select['institute_address']?></td>
        </tr>
        <tr>
            <td width="150"><b>Institute Phone</b></td>
            <td width="5"> : </td>
            <td><?=$select['institute_phone']?></td>
        </tr>
        <tr>
            <td width="150"><b>Institute Mobile</b></td>
            <td width="5"> : </td>
            <td><?=$select['institute_mobile']?></td>
        </tr>
        <tr>
            <td width="150"><b>Know About</b></td>
            <td width="5"> : </td>
            <td><?=$select['know_about']?></td>
        </tr>
        <tr>
            <td width="150"><b>Others</b></td>
            <td width="5"> : </td>
            <td><?=$select['others']?></td>
        </tr>
        <tr>
            <td width="150"><b>National</b></td>
            <td width="5"> : </td>
            <td><?=$select['national_id']?></td>
        </tr>
        <tr>
            <td width="150"><b>Submited Date</b></td>
            <td width="5"> : </td>
            <td><?=$select['reg_date']?></td>
        </tr>
    </table>
	<br /><br />
    
</div>

</body>
</html>
