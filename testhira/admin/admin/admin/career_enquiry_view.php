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



	<span class="form_title"><br />Career Registration<br /><br /></span>

    

	<table align="center" width="90%" cellpadding="10" cellspacing="0" style="font-size:14px;">

    	

<?php 

include_once ("config.php");	

	$id = $_REQUEST['id'];

	$select = mysql_fetch_assoc(mysql_query("select * from career where id='$id'"));

?>



        <tr>

            <td width="150"><b>Register No</b></td>

            <td width="5"> : </td>

            <td><?=$select['register_no']?></td>

        </tr>



        <tr>

            <td width="150"><b>Full Name</b></td>

            <td width="5"> : </td>

            <td><?=$select['fulname']?></td>

        </tr>

        

        <tr>

            <td width="150"><b>Address</b></td>

            <td width="5"> : </td>

            <td><?=$select['address']?></td>

        </tr>



        <tr>

            <td width="150"><b>Date of birth</b></td>

            <td width="5"> : </td>

            <td><?=$select['dob']?></td>

        </tr>



        <tr>

            <td width="150"><b>Age</b></td>

            <td width="5"> : </td>

            <td><?=$select['age']?></td>

        </tr>



        <tr>

            <td width="150"><b>Gender </b></td>

            <td width="5"> : </td>

            <td><?=$select['gender']?></td>

        </tr>



        <tr>

            <td width="150"><b>Phone No</b></td>

            <td width="5"> : </td>

            <td><?=$select['phone_no']?></td>

        </tr>



        <tr>

            <td width="150"><b>Residence</b></td>

            <td width="5"> : </td>

            <td><?=$select['residence']?></td>

        </tr>



        <tr>

            <td width="150"><b>Mobile</b></td>

            <td width="5"> : </td>

            <td><?=$select['mobile']?></td>

        </tr>



        <tr>

            <td width="150"><b>E mail</b></td>

            <td width="5"> : </td>

            <td><?=$select['email']?></td>

        </tr>

        <tr>

            <td width="150"><b>Courses completed with CADD centre</b></td>

            <td width="5"> : </td>

            <td><?=$select['coursename']?></td>

        </tr>

        <tr>

            <td width="150"><b>Interested Job Areas</b></td>

            <td width="5"> : </td>

            <td><?=$select['interested']?></td>

        </tr>

        <tr>

            <td width="150"><b>Locations</b></td>

            <td width="5"> : </td>

            <td><?=$select['locations']?></td>

        </tr>

        <tr>

            <td width="150"><b>Category</b></td>

            <td width="5"> : </td>

            <td><?=$select['category']?></td>

        </tr>
		
		<tr>

            <td width="150"><b>Download Resume</b></td>

            <td width="5"> : </td>

            <td><a href="http://caddcentre.lk/resumes/<?=$select['resume']?>" download >Download</a></td>

        </tr>

        <tr>

            <td width="150"><b>Submited Date</b></td>

            <td width="5"> : </td>

            <td><?=$select['post_date']?></td>

        </tr>

    </table>

	<br /><br />

    

</div>



</body>

</html>

