<?php
	error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mail Report</title>

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



</head>

<body>


<?php

$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];

include_once ("functions/pageno.php");

include 'inc/header.php';
include 'inc/top_nav.php';

include("config.php");

include 'function_report.php';


if(isset($_POST['submitb']))
{
	extract($_POST);
	
	
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
	
	
	$subject = "Livewire Enquiry Report ".$result;
	
	$message = '<div style="font-family:Arial;font-size:12px;width:800px;">
	
	Dear '.$name.',<br><br>
	
		'.$mail_cont.'<br><br>
		
		<h4><u>Course Enquiry</u></h4>
		<table border="1" cellpadding="5" cellspacing="0" style="font-family:Arial;font-size:12px;">
			<tr>
				<th>Type</th>
				<th>Leads</th>
				<th>Converted</th>
				<th>Conversion Ratio</th>
			</tr>
			<tr>
				<td>Website</td>
				<td align="right">'.$course_enq.'</td>
				<td align="right">'.$course_enq_rg.'</td>
				<td align="right">'.$course_enq_pg.'</td>
			</tr>
			<tr>
				<td>Google</td>
				<td align="right">'.$send_enq.'</td>
				<td align="right">'.$send_enq_rg.'</td>
				<td align="right">'.$send_enq_pg.'</td>
			</tr>
			<tr>
				<td><b><big>Total</big></b></td>
				<td align="right"><big><b>'.$t1_ov.'</b></big></td>
				<td align="right"><big><b>'.$t1_rg.'</b></big></td>
				<td align="right"><big><b>'.$t1_pg.'</b></big></td>
			</tr>
		</table>
		
		<br><br>
		<h4><u>Franchise Enquiry</u></h4>
		<table border="1" cellpadding="5" cellspacing="0" style="font-family:Arial;font-size:12px;">
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
				<td>'.$fra_web_enq_1.'</td>
				<td>'.$fra_web_enq_2.'</td>
				<td>'.$fra_web_enq_3.'</td>
				<td>'.$fra_web_enq_4.'</td>
				<td>'.$fra_web_enq_5.'</td>
				<td>'.$fra_web_enq_6.'</td>
				<td>'.$fra_web_enq.'</td>
			</tr>
			<tr>
				<td>Google</td>
				<td>'.$fra_gg_enq_1.'</td>
				<td>'.$fra_gg_enq_2.'</td>
				<td>'.$fra_gg_enq_3.'</td>
				<td>'.$fra_gg_enq_4.'</td>
				<td>'.$fra_gg_enq_5.'</td>
				<td>'.$fra_gg_enq_6.'</td>
				<td>'.$fra_gg_enq.'</td>
			</tr>
			<tr>
				<td colspan="7" align="right"><strong>Total</strong></td>
				<td align="right"><b><big>'.$fra_t1.'</big></b></td>
			</tr>
			
		</table>
		</div>';
		
	$headers  = "From: Corpcom <corpcom@caddcentre.com>\r\n";
	$headers .= "Return-Path: Corpcom <corpcom@caddcentre.com>\r\n";
	$headers .= 'Bcc: web.support@caddcentre.ws'."\r\n";
	$headers .= "X-Mailer: Drupal\n";
	$headers .= 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	$to = $email;
	
	if(mail($to,$subject,$message,$headers))
	{
		echo '<script>alert("Mail sent successfully");</script>';
	}
	else
	{
		echo '<script>alert("Error mail not sent");</script>';
	}
	
}


?>

<div class="body_holder">
    
    <div class="form_holder">
    	
        <span class="sub_title">
	        <font>Send report</font>
        </span>


        <form enctype="multipart/form-data" name="reg" method="post" action="">
        	
            <input type="hidden" name="from_date" value="<?=$from_date?>" />
            <input type="hidden" name="to_date" value="<?=$to_date?>" />
            
            <div class="form_row">
                <span class="label">To </span>
                <input class="text_box" type="text" value="" name="email">
            </div>
            <div class="form_row">
                <span class="label">Name </span>
                <input class="text_box" type="text" value="" name="name">
            </div>
            <div class="form_row">
                <span class="label-full">Mail Content</span>
                <textarea class="text_box" rows="5" name="mail_cont"></textarea>
            </div>
            <div class="form_row">
            	<input class="search" type="submit" name="submitb" value="Submit">
            </div>
            
        </form>
        
    </div>
    
	<div class="clear"></div>
</div>


</body>
</html>