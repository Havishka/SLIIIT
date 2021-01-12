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

	$con1 = "and how_to_join.reg_date  >=  '$fdate 00:00:00'";	

}

else

{

	$con1 = ""; 

}



if(isset($_REQUEST['to_date']) && $_REQUEST['to_date'] != '')

{

	$tdate =  $_REQUEST['to_date'];

	$con2 = "and how_to_join.reg_date  <=  '$tdate 24:00:00'";	

}	

else {

	$con2 = "";

}



if(isset($_REQUEST['courseName']) && $_REQUEST['courseName'] != '')

{

	$courseName =  $_REQUEST['courseName'];

	$con3 = "and how_to_join.courseName = '$courseName'";	

}	

else {

	$con3 = "";

}



if(isset($_REQUEST['specialization']) && $_REQUEST['specialization'] != '')

{

	$specialization =  $_REQUEST['specialization'];

	$con4 = "and how_to_join.specialization = '$specialization'";	

}	

else {

	$con4 = "";

}



if(isset($_REQUEST['name']) && $_REQUEST['name'] != '')

{

	$name =  $_REQUEST['name'];

	$con5 = "and how_to_join.name = '$name'";

}	

else {

	$con5 = "";

}



if(isset($_REQUEST['fullName']) && $_REQUEST['fullName'] != '')

{

	$fullName =  $_REQUEST['fullName'];

	$con6 = "and how_to_join.fullName = '$fullName'";	

}	

else {

	$con6 = "";

}



if(isset($_REQUEST['dob']) && $_REQUEST['dob'] != '')

{

	$dob =  $_REQUEST['dob'];

	$con7 = "and how_to_join.dob = '$dob'";	

}	

else {

	$con7 = "";

}



if(isset($_REQUEST['address']) && $_REQUEST['address'] != '')

{

	$address =  $_REQUEST['address'];

	$con8 = "and how_to_join.address = '$address'";	

}	

else {

	$con8 = "";

}



if(isset($_REQUEST['national_id']) && $_REQUEST['national_id'] != '')

{

	$national_id =  $_REQUEST['national_id'];

	$con9 = "and how_to_join.national_id = '$national_id";

}	

else {

	$con9 = "";

}



if(isset($_REQUEST['email']) && $_REQUEST['email'] != '')

{

	$email =  $_REQUEST['email'];

	$con10 = "and how_to_join.email = '$email'";

}	

else {

	$con10 = "";

}



if(isset($_REQUEST['mobile']) && $_REQUEST['mobile'] != '')

{

	$mobile =  $_REQUEST['mobile'];

	$con11 = "and how_to_join.mobile = '$mobile'";

}	

else {

	$con11 = "";

}



if(isset($_REQUEST['occupation']) && $_REQUEST['occupation'] != '')

{

	$occupation =  $_REQUEST['occupation'];

	$con12 = "and how_to_join.occupation = '$occupation'";

}	

else {

	$con12 = "";

}



if(isset($_REQUEST['institute_name']) && $_REQUEST['institute_name'] != '')

{

	$institute_name =  $_REQUEST['institute_name'];

	$con13 = "and how_to_join.institute_name = '$institute_name'";

}	

else {

	$con13 = "";

}



if(isset($_REQUEST['institute_address']) && $_REQUEST['institute_address'] != '')

{

	$institute_address =  $_REQUEST['institute_address'];

	$con14 = "and how_to_join.institute_address = '$institute_address'";

}	

else {

	$con14 = "";

}



if(isset($_REQUEST['institute_phone']) && $_REQUEST['institute_phone'] != '')

{

	$institute_phone =  $_REQUEST['institute_phone'];

	$con15 = "and how_to_join.institute_phone = '$institute_phone'";

}	

else {

	$con15 = "";

}



if(isset($_REQUEST['institute_mobile']) && $_REQUEST['institute_mobile'] != '')

{

	$institute_mobile =  $_REQUEST['institute_mobile'];

	$con16 = "and how_to_join.institute_mobile = '$institute_mobile'";

}	

else {

	$con16 = "";

}



if(isset($_REQUEST['know_about']) && $_REQUEST['know_about'] != '')

{

	$know_about =  $_REQUEST['know_about'];

	$con17 = "and how_to_join.know_about = '$know_about'";

}	

else {

	$con17 = "";

}



if(isset($_REQUEST['others']) && $_REQUEST['others'] != '')

{

	$others =  $_REQUEST['others'];

	$con18 = "and how_to_join.others = '$others'";

}	

else {

	$con18 = "";

}



if(isset($_REQUEST['reg_date']) && $_REQUEST['reg_date'] != '')

{

	$reg_date =  $_REQUEST['reg_date'];

	$con19 = "and how_to_join.reg_date = '$reg_date'";

}	

else {

	$con19 = "";

}









include 'login_check.php';

include_once ("functions/pageno.php");

include_once ("config.php");



$pageno = (!isset($_GET["page"]) ? 1 : $_GET["page"]);

$limit = 20;

$startpoint = ($pageno * $limit) - $limit;



$statement = "how_to_join where 1 $con1 $con2 $con3 $con4 $con5 $con6 $con7 $con8 $con9 $con10 $con11 $con12 $con13 $con14 $con15 $con16 $con17 $con18 $con19 order by reg_date desc";



$where_string = 'courseName='.$_REQUEST['courseName'].'&fullName='.$_REQUEST['fullName'].'&email='.$_REQUEST['email'].'&mobile='.$_REQUEST['mobile'].'&from_date='.$_REQUEST['from_date'].'&national_id='.$_REQUEST['national_id'].'&to_date='.$_REQUEST['to_date'];



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

    	<th colspan="6" class="table_title">How to Join Enquiry - <?php echo $reco['num'] ?></th>

    </tr>

    <tr>

    	<td><b>Name :</b></td>

        <td><input type="text" name="fullName" class="text_box" value="<?=$_REQUEST['fullName']?>" /></td>

    	<td><b>Email :</b></td>

        <td><input type="text" name="email" class="text_box" value="<?=$_REQUEST['email']?>" /></td>

    	<td><b>Mobile :</b></td>

        <td><input type="text" name="mobile" class="text_box" value="<?=$_REQUEST['mobile']?>" /></td>

    </tr>

    <tr>

    	<td><b>Institue name :</b></td>

        <td><input type="text" name="institute_name" class="text_box" value="<?=$_REQUEST['institute_name']?>" /></td>

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

    

    	<input type="hidden" value="how_to_join" name="table" />

        <input type="hidden" value="id" name="data_id" />

        <input type="hidden" value="howt_to_join_enquiry_list.php" name="page" />

        <input type="hidden" value="<?=$pageno?>" name="pageid" />

        

    	<tr>

        	<th><input type="submit" name="delete" class="search" value="Delete" /></th>

            <th>Sno</th>

            <th>Name</th>

            <th>Email</th>

            <th>Mobile</th>

            <th>National ID</th>

            <th>Occupation</th>

			<th>Institute name</th>

            <th>Date and Time</th>

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

    <td><?=$fetch_ad['fullName']?></td>

    <td><?=$fetch_ad['email']?></td>

    <td><?=$fetch_ad['mobile']?></td>

    <td><?=$fetch_ad['national_id']?></td>

    <td><?=$fetch_ad['occupation']?></td>

    <td><?=$fetch_ad['institute_name']?></td>

    <td align="center"><?=$newDate = date("d-m-Y", strtotime($fetch_ad['reg_date']))?></td>

    <td align="center">

    	<a href="how_to_join_enquiry_view.php?id=<?=$fetch_ad['id']?>">View</a> | 

         <a href="delete.php?table=how_to_join&id=<?=$fetch_ad['id']?>&data_id=id&page=<?=$pagename?>" onClick="return confirmDelete()">Delete</a>

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

        	

            <form method="post" action="Export_Excel_how_to_join.php">

            	<input type="hidden" name="fullName" value="<?=$_REQUEST['fullName']?>"/>

            	<input type="hidden" name="email" value="<?=$_REQUEST['email']?>"/>

                <input type="hidden" name="mobile" value="<?=$_REQUEST['mobile']?>"/>

                <input type="hidden" name="institute_name" value="<?=$_REQUEST['institute_name']?>"/>

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

