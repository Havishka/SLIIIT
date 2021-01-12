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



if(isset($_REQUEST['fullName']) && $_REQUEST['fullName'] != '')

{

	$fullName =  $_REQUEST['fullName'];

	$con3 = "and how_to_join.fullName = '$fullName'";	

}	

else {

	$con3 = "";

}



if(isset($_REQUEST['email']) && $_REQUEST['email'] != '')

{

	$email =  $_REQUEST['email'];

	$con4 = "and how_to_join.email = '$email'";	

}	

else {

	$con4 = "";

}



if(isset($_REQUEST['mobile']) && $_REQUEST['mobile'] != '')

{

	$mobile =  $_REQUEST['mobile'];

	$con5 = "and how_to_join.mobile = '$mobile'";	

}	

else {

	$con5 = "";

}



if(isset($_REQUEST['institute_name']) && $_REQUEST['institute_name'] != '')

{

	$institute_name =  $_REQUEST['institute_name'];

	$con6 = "and how_to_join.institute_name = '$institute_name'";	

}	

else {

	$con6 = "";

}









$tab_data = '<table cellp adding="0" cellspacing="0" width="100%" border="1" bordercolor="#CCCCCC">

	<tr>	

    	    <th>Course Name</th>

    	    <th>Specialization</th>

            <th>FullName</th>

            <th>Date of birth</th>

            <th>address</th>

            <th>National ID</th>

            <th>Email</th>

            <th>Mobile</th>

            <th>Occupation</th>

            <th>Institute Name</th>

            <th>Institute Address</th>

            <th>Institute Phone</th>

            <th>Institute Mobile</th>

            <th>Know About</th>

            <th>others</th>

			<th>Date</th>

    </tr>';





include 'config.php';



$select = mysql_query("select * from how_to_join where 1 $con1 $con2 $con3 $con4 $con5 $con6 order by id desc");





while($fetch = mysql_fetch_array($select))

{



	$tab_data.= "<tr>

    	<td>".$fetch['courseName']."</td>

    	<td>".$fetch['specialization']."</td>

        <td>".$fetch['fullName']."</td>

        <td>".$fetch['dob']."</td>

        <td>".$fetch['address']."</td>

        <td>".$fetch['national_id']."</td>

        <td>".$fetch['email']."</td>

        <td>".$fetch['mobile']."</td>

        <td>".$fetch['occupation']."</td>

        <td>".$fetch['institute_name']."</td>

        <td>".$fetch['institute_address']."</td>

        <td>".$fetch['institute_phone']."</td>

        <td>".$fetch['institute_mobile']."</td>

        <td>".$fetch['know_about']."</td>

        <td>".$fetch['others']."</td>

        <td>".$fetch['reg_date']."</td>

    </tr>";



}

	$tab_data.="</table>";



	$file="Export_Excel_career_enquiry.xls";

	header("Content-type: application/vnd.ms-excel");

	header("Content-Disposition: attachment; filename=$file");

	echo $tab_data;



?>