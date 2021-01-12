<?php
session_start(); 

if (!isset($_SESSION['idlogin'])) {
    header('Location: login.php');
}

$user_role = $_SESSION['user_role_iduser_role'];


include_once '../DB_3.php';
$conn = DB_3::create_conn();
$nic = htmlspecialchars($_POST["nic"]);

$branch_id = htmlspecialchars($_POST["branch_id"]);
if($user_role == '2'){

$query = "SELECT * FROM student s WHERE nic='$nic'";

$result = $conn->query($query);
$ss = $result->num_rows;


    if( $result->num_rows === 0 ){
        echo 'no';
       
  
    }else if($result->num_rows > 0){
     $sql15 = "SELECT s.`name` AS s_name,s.nic,s.regi_no,s.admission_no,s.address,s.email,s.gender,s.contact,s.branch_idbranch,b.`name` AS b_name FROM student s inner join branch b on s.branch_idbranch= b.idbranch where status='1' && nic='$nic'";     

     $rs15 = $conn->query($sql15);
$compArray2 = array();

while ($row1 = mysqli_fetch_array($rs15)) {
    $stu = new stdClass();
    $stu->s_name = $row1['s_name'] == null ? '' : $row1['s_name'];
    $stu->nic = $row1['nic'] == null ? '' : $row1['nic'];
     $stu->regi_no = $row1['regi_no'] == null ? '' : $row1['regi_no'];
    $stu->admission_no = $row1['admission_no'] == null ? '' : $row1['admission_no'];
     $stu->address = $row1['address'] == null ? '' : $row1['address'];
    $stu->email = $row1['email'] == null ? '' : $row1['email'];
     $stu->gender = $row1['gender'] == null ? '' : $row1['gender'];
    $stu->contact = $row1['contact'] == null ? '' : $row1['contact'];
    $stu->b_name = $row1['b_name'] == null ? '' : $row1['b_name'];
    
   
   
   $stu->branch_id = $branch_id;
    

    array_push($compArray2, $stu);
    
}
    
echo json_encode($compArray2);

}
}
     
     
    
else if($user_role == '1'){
    
    
$query = "SELECT * FROM student s WHERE nic='$nic' && branch_idbranch='$branch_id'";

$result = $conn->query($query);
$ss = $result->num_rows;


    if( $result->num_rows === 0 ){
        echo 'no';
       
  
    }else if($result->num_rows > 0){
     $sql15 = "SELECT s.`name` AS s_name,s.nic,s.regi_no,s.admission_no,s.address,s.email,s.gender,s.contact,s.branch_idbranch,b.`name` AS b_name FROM student s inner join branch b on s.branch_idbranch= b.idbranch where  branch_idbranch= '$branch_id' && status='1' && nic='$nic'";     
$rs15 = $conn->query($sql15);
$compArray2 = array();

while ($row1 = mysqli_fetch_array($rs15)) {
    $stu = new stdClass();
    $stu->s_name = $row1['s_name'] == null ? '' : $row1['s_name'];
    $stu->nic = $row1['nic'] == null ? '' : $row1['nic'];
     $stu->regi_no = $row1['regi_no'] == null ? '' : $row1['regi_no'];
    $stu->admission_no = $row1['admission_no'] == null ? '' : $row1['admission_no'];
     $stu->address = $row1['address'] == null ? '' : $row1['address'];
    $stu->email = $row1['email'] == null ? '' : $row1['email'];
     $stu->gender = $row1['gender'] == null ? '' : $row1['gender'];
    $stu->contact = $row1['contact'] == null ? '' : $row1['contact'];
    $stu->b_name = $row1['b_name'] == null ? '' : $row1['b_name'];
    
   
   
   $stu->branch_id = $branch_id;
    

    array_push($compArray2, $stu);
    
}
    
echo json_encode($compArray2);

}
}



