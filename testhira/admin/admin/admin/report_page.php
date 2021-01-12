<?php
	error_reporting(0);
?>

<?php include "session_check.php"; 
ob_start();
$cmenu = "dashboard";
$cmenulink = "";
$active = "home_cadd";

include("config.php");



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadd Admin</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />


<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom.js"></script>
<link href="css/jquery-ui-1.10.3.custom.css" rel="stylesheet">

<script type="text/javascript" src="canvas/canvasjs.min.js"></script>

<script>
$(function() {
$(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat: "yy-mm-dd"
        });
});
</script>


<style>
.form_title{
	font-size:16px;
}

.dark_border {
    border-bottom: 1px solid #000;
    border-right: 1px solid #000;
    font-size: 12px;
}

.dark_border th, .dark_border td {
    border-left: 1px solid #000;
    border-top: 1px solid #000;
}
</style>


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

include("config.php");


if(isset($_POST['search']))
{

	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	
	
	if($from_date!='' && $to_date!='')
	{
		$result = "( ".date('d-m-Y', strtotime($from_date))." - ".date('d-m-Y', strtotime($to_date))." )";
	}
	elseif($from_date!='' && $to_date=='')
	{
		$result = "( ".date('d-m-Y', strtotime($from_date))." - ".date('d-m-Y')." )";
	}
	else
	{
		$result = "";
	}
	
}
else
{
	$result = "";
}

?>    
    
<?php 
include 'login_check.php';
include_once ("functions/pageno.php");

include 'inc/header.php';
include 'inc/top_nav.php';

include 'function_report.php';

?>



<div class="body_holder">

        <br>
        <br>
<table class="table_1" border="0" cellpadding="10" cellspacing="0" width="95%" align="center">
    <tr>
        <th colspan="5" class="table_title">Search</th>
    </tr>
	<form method="post" name="report">    
    <tr>
        <td><b>From Date:</b></td>
        <td><input class="text_box datepicker" type="text" value="<?=$_REQUEST['from_date']?>" name="from_date"></td>
        <td><b>To Date:</b></td>
		<td><input class="text_box datepicker" type="text" value="<?=$_REQUEST['to_date']?>" name="to_date"></td>
        <td><input class="search" type="submit" value="Search" name="search"></td>
   </tr>
   </form>
</table>




<br /><br />
<table class="table_1" border="0" cellpadding="10" cellspacing="0" width="95%" align="center" id="print_div">
    <tr>
    	<td colspan="2">
        	<span class="form_title" style="font-size:18px;">Dreamzone Website Lead Generation Report<br /><?=$result?></span>	
        </td>
    </tr>
    <tr>
		<td valign="top">
        	<br />
        	<span class="form_title">Course Enquiry</span>
            <br />
            <table class="table_1 dark_border" border="0" cellpadding="10" cellspacing="0" width="90%" align="center">
            	<tr>
                	<th>Type:</th>
                    <th>Leads</th>
                    <th>Converted</th>
                    <th>Conversion Ratio</th>
                </tr>
                <tr>
	                <td>Website Course enquiry</td>
                    <td align="right"><?=$course_enq?></td>
                    <td align="right"><?=$course_enq_rg?></td>
                    <td align="right"><?=$course_enq_pg?></td>
                </tr>
                <tr>
	                <td>Google Course enquiry</td>
                    <td align="right"><?=$send_enq?></td>
                    <td align="right"><?=$send_enq_rg?></td>
                    <td align="right"><?=$send_enq_pg?></td>
                </tr>
                <tr>
                	<td><b><big>Total</big></b></td>
                    <td align="right"><big><b><?=$t1_ov?></b></big></td>
                    <td align="right"><big><b><?=$t1_rg?></b></big></td>
                    <td align="right"><big><b><?=$t1_pg?></b></big></td>
                </tr>
            </table>
			
        </td>
    </tr>
    <tr>
    	<td colspan="2">
        	<br />
        	<span class="form_title">Franchise Enquiry</span>
        </td>
    </tr>
    <tr>
    	<td  colspan="2">
            <br />
			            <table class="table_1 dark_border" border="0" cellpadding="10" cellspacing="0" width="95%" align="center">
                <tr>
                    <th>Type</th>
                    <th>Prospect</th>
                    <th>Not Interested</th>
                    <th>Closed</th>
                    <th>Duplication</th>
                    <th>Luke warm</th>
                    <th>Signed</th>
                    <th>Total</th>
                </tr>
                <tr>
                    <td>Website</td>
                    <td><?=$fra_web_enq_1?></td>
                    <td><?=$fra_web_enq_2?></td>
                    <td><?=$fra_web_enq_3?></td>
                    <td><?=$fra_web_enq_4?></td>
                    <td><?=$fra_web_enq_5?></td>
                    <td><?=$fra_web_enq_6?></td>
                    <td><?=$fra_web_enq?></td>
                </tr>
                <tr>
                    <td>Google</td>
                    <td><?=$fra_gg_enq_1?></td>
                    <td><?=$fra_gg_enq_2?></td>
                    <td><?=$fra_gg_enq_3?></td>
                    <td><?=$fra_gg_enq_4?></td>
                    <td><?=$fra_gg_enq_5?></td>
                    <td><?=$fra_gg_enq_6?></td>
                    <td><?=$fra_gg_enq?></td>
                </tr>

                <tr>
                    <td colspan="7" align="right"><strong>Total</strong></td>
                    <td align="left"><b><big><?=$fra_t1?></big></b></td>
                </tr>
				
				</table>
				
				<br/><br/>

			<table align="center">
	<tr>
    	<td align="center">
            <input type="button" name="print" value="Print" class="search" onclick="printDiv('print_div')"/>
        </td>
        <td>
        	<form method="post" action="report_mail.php">
        	<input type="hidden" name="from_date" value="<?=$from_date?>" />
            <input type="hidden" name="to_date" value="<?=$to_date?>" />
        	<input type="submit" name="submit" value="Send Mail" class="search" />
            </form>
        </td>
    </tr>
</table>


<script>
function printDiv(divName) 
{
	var printContents = document.getElementById(divName).innerHTML;
	var originalContents = document.body.innerHTML;
	document.body.innerHTML = printContents;
	window.print();
	document.body.innerHTML = originalContents;
}
</script>
                
	<div class="clear"></div>
</div>

	</body>
  
</html>
