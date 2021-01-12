<?php
include("../connection.php");


    $std_id = $_POST['std_id'];
   	$course_id = $_POST['c_id'];
    $yourdis = $_POST['txt3'];
	$totalPrice = $_POST['your_fA'];
	$type = $_POST['type'];
    $paydate = $_POST['item23']; 
	$inst_pay = $_POST['inst_pay'];
	$remark=$_POST['remark'];
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
	
//approvalState //, '$approvalState'

//$query="insert into payment(std_id,course_id, yourdis, totalPrice,type,paydate,remark)values('$std_id', '$course_id','$discount','$tot_amount','$type' ,'$pay_date', '$discount_remark')";

$query="insert into payment(std_id,course_id, discount, tot_amount,type,pay_date,discount_remark,approvalState)
values('$std_id', '$course_id','$yourdis','$totalPrice','$type' ,'$paydate', '$remark', '$approvalState')";

$query1="insert into payment_receipt(pr_date, pr_std_id,pr_course_id, payment,issuedBy)
values('$paydate', '$std_id','$course_id','$inst_pay','$login_namez')";

$query2="insert into payment_installment(l_pay_date, std_id,course_id, installment_1)
values('$paydate', '$std_id','$course_id','$inst_pay')";

$result = mysqli_query($con, $query);
$result1 = mysqli_query($con, $query1);
$result2 = mysqli_query($con, $query2);

if (!($result ) && !($result1)&&!($result2))
  {
  	echo("Database Error : " . mysqli_error($con));
  }
else
  {
	echo("Payment Successful");
	echo "<script>alert('Payment was Successful'); window.location.href = '../index.php?tab=payment_home'; </script>";
		//header("Location: RegHome.php");
  }

?>