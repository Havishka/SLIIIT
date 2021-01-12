<?php
include("../connection.php");


    $std_id = $_POST['std_id'];
   	$course_id = $_POST['course_id'];
    $yourdis = $_POST['txt3'];
	$totalPrice = $_POST['totalPrice'];
	$type = $_POST['type'];
    $paydate = $_POST['item23']; 
	$remark = $_POST['remark'];
    $discountperx=$_POST['txt2'];
	$login_namez = $_POST['login_name']; 
	
	if($discountperx>20)
	{
		$approvalState='F'; //so need approval
	}
	else
	{
		$approvalState='T';
	}
	
// ,approvalState // , '$approvalState'


//$query="insert into payment(std_id,course_id, yourdis, totalPrice,type,paydate,remark,approvalState)values('$std_id', '$course_id','$discount','$tot_amount','$type' ,'$pay_date', '$discount_remark', '$approvalState')";

$query="insert into payment(std_id,course_id, discount, tot_amount,type,pay_date,discount_remark,approvalState)
values('$std_id', '$course_id','$yourdis','$totalPrice','$type' ,'$paydate', '$remark', '$approvalState')";

$query1="insert into payment_receipt(pr_date, pr_std_id,pr_course_id, payment,issuedBy)
values('$paydate', '$std_id','$course_id','$totalPrice','$login_namez')";

$result = mysqli_query($con, $query);
$result1 = mysqli_query($con, $query1);

if (!($result ) && !($result1))
  {
  	echo("Database Error : " . mysqli_error($con));
  }
else
  {
	
	echo "<script>alert('Full Payment was Successful'); window.location.href = '../index.php?tab=payment_home'; </script>";
	
  }

?>