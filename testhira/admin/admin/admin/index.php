<?php 

session_start();
ob_start();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Cadd Admin</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />

<style>

table{

	padding:30px 20px;

	background:#FFF;

	margin-top:15%;

	border:1px solid #CDCDCD;

	border-radius:8px;

	box-shadow:0 0 13px -6px #000;

}

.text_box{

	width:300px;

	margin-bottom:10px;

	padding:10px 10px;

}

</style>

</head>



<body>



<?php 




include "config.php";



if(isset($_REQUEST['data']))

{

	$data = base64_decode($_REQUEST['data']);

	

	$data1 = explode(",",$data);

	

	$dmname = $data1[0];

	$dmid = $data1[1];

	

	$data2 = base64_decode($data1[2]);

	

	$data3 = explode(",",$data2);

	

	if($dmname==$data3[0] && $dmid==$data3[1])

	{

		$select = mysql_query("select * from admin_users where empid='$dmid'");

		$count = mysql_num_rows($select);

		

		if($count==0)

		{

			$insert = "insert into admin_users (empid,name,criteria,status) values ('$dmid','$dmname','3','1')";

			

			if(mysql_query($insert))

			{

				$insert_id = mysql_insert_id();

				$_SESSION['foreuid'] = $insert_id;

				echo '<script>window.location.assign("dashboard.php");</script>';

			}

			else

			{

				echo '<script>window.location.assign("index.php?msg=err&cont=Insert Error");</script>';

			}

			

			

		}

		else

		{

			$fetch = mysql_fetch_assoc($select);

			$_SESSION['foreuid'] = $fetch['id'];

			echo '<script>window.location.assign("dashboard.php");</script>';

		}

		

	}

	else

	{

		echo '<script>window.location.assign("index.php?msg=err&cont=Authentication error");</script>';

	}

	

}





if(isset($_SESSION['foreuid']))

{

	echo '<script>window.location.assign("dashboard.php");</script>';

}



if(isset($_POST['login']))

{

	

	$username = mysql_real_escape_string($_POST['username']);

	$password = mysql_real_escape_string($_POST['password']);

	$enpassword = md5($password);

	

	$sql="SELECT * FROM admin_users WHERE user_id ='$username' and password ='$enpassword'";

	$result=mysql_query($sql);

	$count=mysql_num_rows($result);

	

	if($count<=0)

	{

		echo '<script>window.location.assign("index.php?msg=err&cont=Incorrect Username / Password.");</script>';

	}

	else

	{

		$fetch = mysql_fetch_array($result);

		if($fetch['status']==0)

		{

			echo '<script>window.location.assign("index.php?msg=err&cont=Please activate your account.");</script>';

		}

		else {

			

			$_SESSION['foreuid'] = $fetch['id'];

			

			if($username=='freelancer')

			{

				echo '<script>window.location.assign("https://www.livewireindia.com/lwadmin/add_users_list.php");</script>';

			}

			else

			{

				echo '<script>window.location.assign("dashboard.php");</script>';

			}

			

		}

	}

	

}



?>	

    

<form method="post" name="login">    

	<table align="center" width="300">

    	<tr>

        	<th align="center"><h2>Admin Login</h2></th>

		</tr>

        <tr>

        	<td align="center" valign="middle"><small style="color:#F00;padding:5px 0;"><?=$_REQUEST['cont']?></small></td>

        </tr>

    	<tr>

            <td><input type="text" name="username" class="text_box" placeholder="Username" /></td>

        </tr>

        <tr>

            <td><input type="password" name="password" class="text_box" placeholder="●●●●●●●●"/></td>

        </tr>

        <tr>

            <td><input type="submit" name="login" value="Login" class="search" /></td>

        </tr>

    </table>

</form>



</body>

</html>

