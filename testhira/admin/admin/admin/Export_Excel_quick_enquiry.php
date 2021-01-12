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







$tab_data = '<table cellp adding="0" cellspacing="0" width="100%" border="1" bordercolor="#CCCCCC">

	<tr>	

    	    <th>First Name</th>

    	    <th>Last Name</th>

            <th>Mobile</th>

            <th>Address</th>

            <th>Course Intrested</th>
			
			<th>Centre</th>

			<th>Time</th>

    </tr>';





include 'config.php';



$select = mysql_query("select * from quick_enquiry where 1 $con1 $con2 $con3 $con4 $con5 $con6 $con7 $con8 $con9 order by id desc");





while($fetch = mysql_fetch_array($select))

{



	$tab_data.= "<tr>

    	<td>".$fetch['first_name']."</td>

    	<td>".$fetch['last_name']."</td>

        <td>".$fetch['phone']."</td>

        <td>".$fetch['address']."</td>

        <td>".$fetch['course_intrested']."</td>
		
		<td>".$fetch['centre']."</td>

        <td>".$fetch['time']."</td>

    </tr>";



}

	$tab_data.="</table>";



	$file="Export_Excel_quick_enquiry_list.xls";

	header("Content-type: application/vnd.ms-excel");

	header("Content-Disposition: attachment; filename=$file");

	echo $tab_data;



?>