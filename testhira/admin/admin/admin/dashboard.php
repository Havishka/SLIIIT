<?php include 'login_check.php'; ?>



<?php 

include_once("config.php");



function career_reg($month)

{

	

	$date = date('Y-m-d');

	$newdate = strtotime ( '-'.$month.' month' , strtotime ( $date ) ) ;

	$s_mount = date ( 'Y-m' , $newdate );

	$month_name = date ( 'F' , $newdate );

	

	$start_date = $s_mount.'-01 00:00:00';
	$end_date = $s_mount.'-31 24:00:00';

	

	$select = mysql_fetch_assoc(mysql_query("select count(*) as num from career where 1 and `post_date` >= '$start_date' and `post_date` <= '$end_date'"));

	

	$count = $select['num'];

	

	$result = 'label: "'.$month_name.'", y: '.$count;

	

	return $result;

	

}



function quick_enquiry($month)

{

	

	$date = date('Y-m-d');

	$newdate = strtotime ( '-'.$month.' month' , strtotime ( $date ) ) ;

	$s_mount = date ( 'Y-m' , $newdate );

	$month_name = date ( 'F' , $newdate );

	

	$start_date = $s_mount.'-01 00:00:00';
	$end_date = $s_mount.'-31 24:00:00';

	

	$select = mysql_fetch_assoc(mysql_query("select count(*) as num from quick_enquiry where 1 and `time` >= '$start_date' and `time` <= '$end_date'"));

	

	$count = $select['num'];

	

	$result = 'label: "'.$month_name.'", y: '.$count;

	//return "select count(*) as num from quick_enquiry where 1 and `time` >= '$start_date' and `time` <= '$end_date'";

	return $result;

	

}



function how_to_join($month)

{

	

	$date = date('Y-m-d');

	$newdate = strtotime ( '-'.$month.' month' , strtotime ( $date ) ) ;

	$s_mount = date ( 'Y-m' , $newdate );

	$month_name = date ( 'F' , $newdate );

	$start_date = $s_mount.'-01 00:00:00';
	$end_date = $s_mount.'-31 24:00:00';

	

	$select = mysql_fetch_assoc(mysql_query("select count(*) as num from how_to_join where reg_date >= '$start_date' and reg_date <= '$end_date'"));

	

	$count = $select['num'];

	

	$result = 'label: "'.$month_name.'", y: '.$count;

	

	return $result;

	

}



/*function website_course_enquiry_pie($stream)

{

	

	$select = mysql_fetch_assoc(mysql_query("select count(*) as num from  lw_course_enquiry where 1 and (type='Home page' or type='Enquiry page') and course = '$stream'"));

	

	$count = $select['num'];

	

	

	$select_stream = mysql_fetch_assoc(mysql_query("select distinct (stream_name) from lw_cfs_stream where stream_name ='$stream'"));

	

	$stream_name = $select_stream['stream_name'];

	

	$result = 'label: "'.$stream.'", y: '.$count;

	

	return $result;

	

}



function google_course_enquiry_pie($stream)

{

	

	$select = mysql_fetch_assoc(mysql_query("select count(*) as num from campaign_reg where course = '$stream'"));

	

	$count = $select['num'];

	

	$result = 'label: "'.$stream.'", y: '.$count;

	

	return $result;

	

}*/







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

<script>

$(function() {

$(".datepicker").datepicker({

		changeMonth: true,

		changeYear: true,

		dateFormat: "yy-mm-dd"

	});

});

</script>





<script type="text/javascript" src="canvas/canvasjs.min.js"></script>

</head>



<body>



<?php include 'inc/header.php'; ?>

<?php include 'inc/top_nav.php'; ?>



<div class="body_holder">

    <br />

  <table class="table_1" border="0" cellpadding="10" cellspacing="0" width="95%" align="center">

  	<tr>

    	<th colspan="2" class="table_title">Dashbord</th>

    </tr>

    <tr>

    	<td width="50%" align="center" colspan="2">

            <div id="quick_enquiry" style="height: 300px; width: 90%;"></div>

        </td>

    </tr>

    <tr>

    	<td width="50%" align="center">

            <div id="how_to_join" style="height: 300px; width: 90%;"></div>

        </td>

        <td width="50%" align="center">

        	<div id="career_reg" style="height: 300px; width: 90%;"></div>

        </td>

    </tr>

    

  </table>

  

<style>

.canvasjs-chart-credit{

	display:none !important;

}

</style> 

	    

  <div class="clear"></div>

    

</div>



<script type="text/javascript">

  window.onload = function () {

	  

    var chart = new CanvasJS.Chart("quick_enquiry", {



      title:{

        text: "Last 12 Month Quick Enquiry"              

      },

      data: [//array of dataSeries              

        { //dataSeries object



         /*** Change type "column" to "bar", "area", "line" or "pie"***/

         type: "column",

         dataPoints: [

         { <?=quick_enquiry('11')?> },

		 { <?=quick_enquiry('10')?> },

         { <?=quick_enquiry('9')?> },

         { <?=quick_enquiry('8')?> },                                    

         { <?=quick_enquiry('7')?> },

		 { <?=quick_enquiry('6')?> },

		 { <?=quick_enquiry('5')?> },

		 { <?=quick_enquiry('4')?> },

         { <?=quick_enquiry('3')?> },

         { <?=quick_enquiry('2')?> },                                    

         { <?=quick_enquiry('1')?> },

         { <?=quick_enquiry('0')?> }

         ]

       }

       ]

     });

	 

	 chart.render();

	 

	 var chart = new CanvasJS.Chart("how_to_join", {



      title:{

        text: "Last 6 Month How to join Enquiry"              

      },

      data: [//array of dataSeries              

        { //dataSeries object



         /*** Change type "column" to "bar", "area", "line" or "pie"***/

         type: "column",

         dataPoints: [

         { <?=how_to_join('5')?> },

		 { <?=how_to_join('4')?> },

         { <?=how_to_join('3')?> },

         { <?=how_to_join('2')?> },                                    

         { <?=how_to_join('1')?> },

         { <?=how_to_join('0')?> }

         ]

       }

       ]

     });



    chart.render();

	

	var chart = new CanvasJS.Chart("career_reg", {



      title:{

        text: "Last 6 Month Careers Registration"

      },

      data: [//array of dataSeries              

        { //dataSeries object



         /*** Change type "column" to "bar", "area", "line" or "pie"***/

         type: "column",

         dataPoints: [

         { <?=career_reg('5')?> },

		 { <?=career_reg('4')?> },

         { <?=career_reg('3')?> },

         { <?=career_reg('2')?> },                                    

         { <?=career_reg('1')?> },

         { <?=career_reg('0')?> }

         ]

       }

       ]

     });



    chart.render();

	

  }

</script>



</body>

</html>

