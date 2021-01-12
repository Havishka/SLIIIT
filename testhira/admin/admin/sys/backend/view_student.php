<?php

session_start(); 

if (!isset($_SESSION['idlogin'])) {
    header('Location: login.php');
}

$user_role = $_SESSION['user_role_iduser_role'];


include_once '../DB_3.php';
$conn = DB_3::create_conn();

$branch_id = htmlspecialchars($_POST["branch_id"]);
if($user_role == '2'){
    $sql15 = "SELECT * FROM student  where status='1' GROUP BY nic";
}else if($user_role == '1'){
    $sql15 = "SELECT * FROM student  where branch_idbranch= '$branch_id' && status='1' GROUP BY nic";
}



$rs15 = $conn->query($sql15);
$compArray2 = array();

while ($row1 = mysqli_fetch_array($rs15)) {
    $stu = new stdClass();
    $stu->name = $row1['name'] == null ? '' : $row1['name'];
    $stu->nic = $row1['nic'] == null ? '' : $row1['nic'];
     $stu->regi_no = $row1['regi_no'] == null ? '' : $row1['regi_no'];
    $stu->admission_no = $row1['admission_no'] == null ? '' : $row1['admission_no'];
     $stu->address = $row1['address'] == null ? '' : $row1['address'];
    $stu->email = $row1['email'] == null ? '' : $row1['email'];
     $stu->gender = $row1['gender'] == null ? '' : $row1['gender'];
    $stu->contact = $row1['contact'] == null ? '' : $row1['contact'];
    
    $stu->regi_date = $row1['regi_date'] == null ? '' : $row1['regi_date'];
     $stu->status = $row1['status'] == null ? '' : $row1['status'];
   
    

    array_push($compArray2, $stu);
    
}
    
echo json_encode($compArray2);

