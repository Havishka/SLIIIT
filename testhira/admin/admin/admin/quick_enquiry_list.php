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

	$con1 = "and quick_enquiry.time  >=  '$fdate 00:00:00'";	

}

else

{

	$con1 = ""; 

}



if(isset($_REQUEST['to_date']) && $_REQUEST['to_date'] != '')

{

	$tdate =  $_REQUEST['to_date'];

	$con2 = "and quick_enquiry.time  <=  '$tdate 24:00:00'";	

}	

else {

	$con2 = "";

}



if(isset($_REQUEST['first_name']) && $_REQUEST['first_name'] != '')

{

	$first_name =  $_REQUEST['first_name'];

	$con3 = "and quick_enquiry.first_name = '$first_name'";	

}	

else {

	$con3 = "";

}



if(isset($_REQUEST['last_name']) && $_REQUEST['last_name'] != '')

{

	$last_name =  $_REQUEST['last_name'];

	$con4 = "and quick_enquiry.last_name = '$last_name'";	

}	

else {

	$con4 = "";

}



if(isset($_REQUEST['address']) && $_REQUEST['address'] != '')

{

	$address =  $_REQUEST['address'];

	$con5 = "and quick_enquiry.address = '$address'";	

}	

else {

	$con5 = "";

}



if(isset($_REQUEST['course_intrested']) && $_REQUEST['course_intrested'] != '')

{

	$course_intrested =  $_REQUEST['course_intrested'];

	$con6 = "and quick_enquiry.course_intrested = '$course_intrested'";	

}	

else {

	$con6 = "";

}



if(isset($_REQUEST['phone']) && $_REQUEST['phone'] != '')

{

	$phone =  $_REQUEST['phone'];

	$con7 = "and quick_enquiry.phone = '$phone'";	

}	

else {

	$con7 = "";

}



if(isset($_REQUEST['time']) && $_REQUEST['time'] != '')

{

	$time =  $_REQUEST['time'];

	$con8 = "and quick_enquiry.time = '$time'";	

}	

else {

	$con8 = "";

}


if(isset($_REQUEST['centre']) && $_REQUEST['centre'] != '')
{

	$centre =  $_REQUEST['centre'];
	$con9 = "and quick_enquiry.centre = '$centre'";	

}	
else { $con9 = ""; }





include 'login_check.php';

include_once ("functions/pageno.php");

include_once ("config.php");



$pageno = (!isset($_GET["page"]) ? 1 : $_GET["page"]);

$limit = 20;

$startpoint = ($pageno * $limit) - $limit;



$statement = "quick_enquiry where 1 $con1 $con2 $con3 $con4 $con5 $con6 $con7 $con8 $con9 order by time desc";



$where_string = 'first_name='.$_REQUEST['first_name'].'&last_name='.$_REQUEST['last_name'].'&phone='.$_REQUEST['phone'].'&course_intrested='.$_REQUEST['course_intrested'].'&from_date='.$_REQUEST['from_date'].'&to_date='.$_REQUEST['to_date'];



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

    	<th colspan="6" class="table_title">Quick Enquiry - <?php echo $reco['num'] ?></th>

    </tr>

    <tr>

    	<td><b>First Name :</b></td>

        <td><input type="text" name="first_name" class="text_box" value="<?=$_REQUEST['first_name']?>" /></td>

    	<td><b>Last Name :</b></td>

        <td><input type="text" name="last_name" class="text_box" value="<?=$_REQUEST['last_name']?>" /></td>

    	<td><b>Mobile :</b></td>

        <td><input type="text" name="phone" class="text_box" value="<?=$_REQUEST['phone']?>" /></td>

    </tr>

    <tr>

        <td><b>Course :</b></td>

        <td>

        	<select class="text_box" name="course_intrested">

            	<option value="">select</option>

			<?php

			$select_course = mysql_query("select DISTINCT id,course_intrested from quick_enquiry order by course_intrested asc");

			while($fetch_course = mysql_fetch_array($select_course))

			{

				if($_REQUEST['course_intrested']==$fetch_course['course_intrested']){ $sel = 'selected="selected"';}else { $sel =''; }

				echo '<option value="'.$fetch_course['course_intrested'].'" '.$sel.'>'.$fetch_course['course_intrested'].'</option>';

			}

			?>

            </select>

        </td>

       	<td><b>From Date :</b></td>

        <td><input type="text" name="from_date" class="text_box datepicker" value="<?=$_REQUEST['from_date']?>" /></td>

        <td><b>To Date :</b></td>

        <td><input type="text" name="to_date" class="text_box datepicker" value="<?=$_REQUEST['to_date']?>" /></td>

    </tr>

    <tr>
    	
        <td><b>Centre :</b></td>

        <td>
        	
            <select class="text_box" name="centre">
            	<option value="">select</option>
				<?php
                $select_place = mysql_query("select distinct centre from quick_enquiry where centre!=''");
                while($fetch_place = mysql_fetch_array($select_place))
                {
                    
                    if($_REQUEST['centre']==$fetch_place['centre'])
                    {
                        $sel = 'selected="selected"';
                    }
                    else
                    {
                        $sel = "";
                    }
 
                    echo '<option value="'.$fetch_place['centre'].'" '.$sel.'>'.$fetch_place['centre'].'</option>';
					
                }
                ?>
            </select>
            
        </td>

    	<td colspan="4">

        	<input type="submit" name="search" class="search" value="Search" />

        </td>

    </tr>

  </table>

  </form>



<?php



/*if(isset($_POST['delete']))

{

	$del_id = $_POST['celid'];

	

	echo '<script>alert("");</script>';

}*/



?>    

    

	<table align="center" width="90%" cellpadding="10" cellspacing="0" class="table_1">

	

    <form method="post" name="delform" action="bulk_delete.php">

    

    	<input type="hidden" value="quick_enquiry" name="table" />

        <input type="hidden" value="id" name="data_id" />

        <input type="hidden" value="quick_enquiry_list.php" name="page" />

        <input type="hidden" value="<?=$pageno?>" name="pageid" />

        

    	<tr>

        	<th><input type="submit" name="delete" class="search" value="Delete" /></th>

            <th>Sno</th>

            <th>First Name</th>

            <th>Last Name</th>

            <th>Mobile</th>

            <th>Course</th>
            
            <th>Centre</th>

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

    <td><?=$fetch_ad['first_name']?></td>

    <td><?=$fetch_ad['last_name']?></td>

    <td><?=$fetch_ad['phone']?></td>

    <td><?=$fetch_ad['course_intrested']?></td>
    
    <td><?=$fetch_ad['centre']?></td>

    <td align="center"><?=$newDate = date("d-m-Y", strtotime($fetch_ad['time']))?></td>

    <td align="center">

    	<a href="quick_enquiry_view.php?id=<?=$fetch_ad['id']?>">View</a> | 

         <a href="delete.php?table=quick_enquiry&id=<?=$fetch_ad['id']?>&data_id=id&page=<?=$pagename?>" onClick="return confirmDelete()">Delete</a>

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

        	

            <form method="post" action="Export_Excel_quick_enquiry.php">

            	<input type="hidden" name="first_name" value="<?=$_REQUEST['first_name']?>"/>

            	<input type="hidden" name="last_name" value="<?=$_REQUEST['last_name']?>"/>

                <input type="hidden" name="phone" value="<?=$_REQUEST['phone']?>"/>

                <input type="hidden" name="course_intrested" value="<?=$_REQUEST['course_intrested']?>"/>

                <input type="hidden" name="from_date" value="<?=$_REQUEST['from_date']?>"/>

                <input type="hidden" name="to_date" value="<?=$_REQUEST['to_date']?>"/>
                
                <input type="hidden" name="centre" value="<?=$_REQUEST['centre']?>"/>

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

