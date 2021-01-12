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

	

if(isset($_REQUEST['from_date']) && $_REQUEST['from_date'] != '')

{

	$fdate =  $_REQUEST['from_date'];

	$con1 = "and career.post_date  >=  '$fdate 00:00:00'";	

}

else

{

	$con1 = ""; 

}



if(isset($_REQUEST['to_date']) && $_REQUEST['to_date'] != '')

{

	$tdate =  $_REQUEST['to_date'];

	$con2 = "and career.post_date  <=  '$tdate 24:00:00'";	

}	

else {

	$con2 = "";

}



if(isset($_REQUEST['register_no']) && $_REQUEST['register_no'] != '')

{

	$register_no =  $_REQUEST['register_no'];

	$con3 = "and career.register_no = '$register_no'";	

}	

else {

	$con3 = "";

}



if(isset($_REQUEST['fulname']) && $_REQUEST['fulname'] != '')

{

	$fulname =  $_REQUEST['fulname'];

	$con4 = "and career.fulname = '$fulname'";	

}	

else {

	$con4 = "";

}



if(isset($_REQUEST['address']) && $_REQUEST['address'] != '')

{

	$address =  $_REQUEST['address'];

	$con5 = "and career.address = '$address'";

}	

else {

	$con5 = "";

}



if(isset($_REQUEST['dob']) && $_REQUEST['dob'] != '')

{

	$dob =  $_REQUEST['dob'];

	$con6 = "and career.dob = '$dob'";	

}	

else {

	$con6 = "";

}



if(isset($_REQUEST['age']) && $_REQUEST['age'] != '')

{

	$age =  $_REQUEST['age'];

	$con7 = "and career.age = '$age'";	

}	

else {

	$con7 = "";

}



if(isset($_REQUEST['gender']) && $_REQUEST['gender'] != '')

{

	$gender =  $_REQUEST['gender'];

	$con8 = "and career.gender = '$gender'";	

}	

else {

	$con8 = "";

}



if(isset($_REQUEST['phone_no']) && $_REQUEST['phone_no'] != '')

{

	$phone_no =  $_REQUEST['phone_no'];

	$con9 = "and career.phone_no = '$phone_no";

}	

else {

	$con9 = "";

}



if(isset($_REQUEST['residence']) && $_REQUEST['residence'] != '')

{

	$residence =  $_REQUEST['residence'];

	$con10 = "and career.residence = '$residence'";

}	

else {

	$con10 = "";

}



if(isset($_REQUEST['mobile']) && $_REQUEST['mobile'] != '')

{

	$mobile =  $_REQUEST['mobile'];

	$con11 = "and career.mobile = '$mobile'";

}	

else {

	$con11 = "";

}



if(isset($_REQUEST['email']) && $_REQUEST['email'] != '')

{

	$email =  $_REQUEST['email'];

	$con12 = "and career.email = '$email'";

}	

else {

	$con12 = "";

}



if(isset($_REQUEST['coursename']) && $_REQUEST['coursename'] != '')

{

	$coursename =  $_REQUEST['coursename'];

	$con13 = "and career.coursename = '$coursename'";

}	

else {

	$con13 = "";

}



if(isset($_REQUEST['interested']) && $_REQUEST['interested'] != '')

{

	$interested =  $_REQUEST['interested'];

	$con14 = "and career.interested = '$interested'";

}	

else {

	$con14 = "";

}



if(isset($_REQUEST['locations']) && $_REQUEST['locations'] != '')

{

	$locations =  $_REQUEST['locations'];

	$con15 = "and career.locations = '$locations'";

}	

else {

	$con15 = "";

}



if(isset($_REQUEST['category']) && $_REQUEST['category'] != '')

{

	$category =  $_REQUEST['category'];

	$con16 = "and career.category = '$category'";

}	

else {

	$con16 = "";

}



if(isset($_REQUEST['resume']) && $_REQUEST['resume'] != '')

{

	$resume =  $_REQUEST['resume'];

	$con17 = "and career.resume = '$resume'";

}	

else {

	$con17 = "";

}



if(isset($_REQUEST['post_date']) && $_REQUEST['post_date'] != '')

{

	$post_date =  $_REQUEST['post_date'];

	$con18 = "and career.post_date = '$post_date'";

}	

else {

	$con18 = "";

}







include 'login_check.php';

include_once ("functions/pageno.php");

include_once ("config.php");



$pageno = (!isset($_GET["page"]) ? 1 : $_GET["page"]);

$limit = 20;

$startpoint = ($pageno * $limit) - $limit;



$statement = "career where 1 $con1 $con2 $con3 $con4 $con5 $con6 $con7 $con8 $con9 $con10 $con11 $con12 $con13 $con14 $con15 $con16 $con17 $con18 order by post_date desc";



$where_string = 'register_no='.$_REQUEST['register_no'].'&fulname='.$_REQUEST['fulname'].'&email='.$_REQUEST['email'].'&mobile='.$_REQUEST['mobile'].'&gender='.$_REQUEST['gender'].'&from_date='.$_REQUEST['from_date'].'&to_date='.$_REQUEST['to_date'];



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

    	<th colspan="6" class="table_title">Career Registration - <?php echo $reco['num'] ?></th>

    </tr>

    <tr>

    	<td><b>Register No :</b></td>

        <td><input type="text" name="register_no" class="text_box" value="<?=$_REQUEST['register_no']?>" /></td>

    	<td><b>Fullname :</b></td>

        <td><input type="text" name="fulname" class="text_box" value="<?=$_REQUEST['fulname']?>" /></td>

    	<td><b>Mobile :</b></td>

        <td><input type="text" name="mobile" class="text_box" value="<?=$_REQUEST['mobile']?>" /></td>

    </tr>

    <tr>

    	<td><b>Gender :</b></td>

        <td>



        	<select class="text_box" name="gender">

				<option value="" <?php if($_REQUEST['status']==''){ echo 'selected="selected"'; } ?> >Select</option>

                <option <?php if($_REQUEST['gender']=='Male'){ echo 'selected="selected"'; } ?> >Male</option>

                <option <?php if($_REQUEST['gender']=='Female'){ echo 'selected="selected"'; } ?> >Female</option>

            </select>

		</td>

       	<td><b>From Date :</b></td>

        <td><input type="text" name="from_date" class="text_box datepicker" value="<?=$_REQUEST['from_date']?>" /></td>

        <td><b>To Date :</b></td>

        <td colspan="3"><input type="text" name="to_date" class="text_box datepicker" value="<?=$_REQUEST['to_date']?>" /></td>

    </tr>

    <tr>

    	<td colspan="6">

        	<input type="submit" name="search" class="search" value="Search" />

        </td>

    </tr>

  </table>

  </form>



    

	<table align="center" width="90%" cellpadding="10" cellspacing="0" class="table_1">

	

    <form method="post" name="delform" action="bulk_delete.php">

    

    	<input type="hidden" value="career" name="table" />

        <input type="hidden" value="id" name="data_id" />

        <input type="hidden" value="career_enquiry_list.php" name="page" />

        <input type="hidden" value="<?=$pageno?>" name="pageid" />

        

    	<tr>

        	<th><input type="submit" name="delete" class="search" value="Delete" /></th>

            <th>Sno</th>

            <th>Register No</th>

            <th>Name</th>

			<th>Gender</th>

            <th>Email</th>

            <th>Mobile</th>

            <th>Course Name</th>

            <th>Date</th>

            <th width="100">Option</th>

        </tr>



<?php if(mysql_num_rows($select_ad)>0)

{

	 while($fetch_ad = mysql_fetch_array($select_ad))

	 {



		$pagename = base64_encode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);



?>







<tr>

	<td align="center"><input type="checkbox" name="celid[]" value="<?=$fetch_ad['id']?>" style="min-width:70px;"/></td>

    <td align="center"><?=$si?></td>

    <td><?=$fetch_ad['register_no']?></td>

    <td><?=$fetch_ad['fulname']?></td>

    <td><?=$fetch_ad['gender']?></td>

    <td><?=$fetch_ad['email']?></td>

    <td><?=$fetch_ad['mobile']?></td>

    <td><?=$fetch_ad['coursename']?></td>

    <td align="center"><?=$newDate = date("d-m-Y", strtotime($fetch_ad['post_date']))?></td>

    <td align="center">

    	<a href="career_enquiry_view.php?id=<?=$fetch_ad['id']?>">View</a> | 

         <a href="delete.php?table=career&id=<?=$fetch_ad['id']?>&data_id=id&page=<?=$pagename?>" onClick="return confirmDelete()">Delete</a>

    </td>

</tr>



<?php $si++; 

}

 } 

 else 

 { 

 echo "<tr><td colspan='8'>

<div class='alert alert-block alert-info fade in no-margin'>

<h4 class='alert-heading'> Alert! </h4>

<p>Sorry no records found.</p>

</div></td></tr>"; }?>        





</form>

	<tr>

    	<td colspan="8">

        	

            <form method="post" action="Export_Excel_career_enquiry.php">

            	<input type="hidden" name="register_no" value="<?=$_REQUEST['register_no']?>"/>

            	<input type="hidden" name="fulname" value="<?=$_REQUEST['fulname']?>"/>

                <input type="hidden" name="email" value="<?=$_REQUEST['email']?>"/>

                <input type="hidden" name="mobile" value="<?=$_REQUEST['mobile']?>"/>

                <input type="hidden" name="from_date" value="<?=$_REQUEST['from_date']?>"/>

                <input type="hidden" name="to_date" value="<?=$_REQUEST['to_date']?>"/>

                <input class="search" type="submit" value="Export Report" name="export">

            </form>

            

        </td>

    </tr>

  </table>



  <div class="page_no_holder"><?=$pagination?></div>

    

  <div class="clear"></div>

    

</div>



<script type="text/javascript">

	$(document).ready(function()

	{

	$("#cat").change(function()

	{

	var id=$(this).val();

	

	var test = 'id='+ id;

	//alert(test);

	$.ajax

	({

	type: "POST",

	url: "../ajax_sub_cat.php",

	data: test,

	cache: false,

	success: function(re)

	{

	$("#sub_cat").html(re);

	} 

	});

	

	});

	});

</script>



</body>

</html>

