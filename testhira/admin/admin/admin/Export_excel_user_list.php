<?php

if($_REQUEST['name'] != '')
{
	$name =  $_REQUEST['name'];
	$con1 = "and name = '$name'";	
}	
else {
	$con1 = "";
}

if($_REQUEST['user_id'] != '')

{
	$user_id =  $_REQUEST['user_id'];
	$con2 = "and user_id = '$user_id'";	
}	
else {
	$con2 = "";
}

if($_REQUEST['password'] != '')

{
	$password =  $_REQUEST['password'];
	$con3 = "and password = '$password'";	
}	
else {
	$con3 = "";
}

if($_REQUEST['status'] != '')
{
	$status =  $_REQUEST['status'];
	$con4 = "and status = '$status%'";	
}	
else {
	$con4 = "";
}
if($_REQUEST['criteria'] != '')
{
	$criteria =  $_REQUEST['criteria'];
	$con4 = "and criteria = '$criteria%'";	
}	
else {
	$con5 = "";
}



$tab_data = '<table cellp adding="0" cellspacing="0" width="100%" border="1" bordercolor="#CCCCCC">
	<tr>	
    	    <th>Name</th>
            <th>User ID</th>
            <th>Password</th>
			<th>Status</th>
			<th>Criteria</th>
    </tr>';


include 'config.php';

$select = mysql_query("select * from admin_users where 1 $con1 $con2 $con3 $con4 $con5 order by id desc");


while($fetch = mysql_fetch_array($select))
{

	$tab_data.= "<tr>
    	<td>".$fetch['name']."</td>
        <td>".$fetch['user_id']."</td>
        <td>".$fetch['password']."</td>
        <td>".$fetch['status']."</td>
        <td>".$fetch['criteria']."</td>
    </tr>";

}
	$tab_data.="</table>";

	$file="Export_Excel_user_list.xls";
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=$file");
	echo $tab_data;

?>