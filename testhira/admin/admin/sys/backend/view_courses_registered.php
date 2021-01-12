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
    $sql15 = "SELECT s.idstudent FROM student s  where status='1' && nic='$nic'";
}else if($user_role == '1'){
    $sql15 = "SELECT s.idstudent FROM student s  where  branch_idbranch= '$branch_id' && status='1' && nic='$nic'";
}

$rs15 = $conn->query($sql15);
$compArray2 = array();

while ($row1 = mysqli_fetch_array($rs15)) {
    $stu = new stdClass();
    $stu1_id = $row1['idstudent'] == null ? '' : $row1['idstudent'];
    
    $sql16 = "SELECT c.course_name from course c inner join  course_has_student cs on cs.course_idcourse=c.idcourse WHERE cs.student_idstudent='$stu1_id'";
$rs16 = $conn->query($sql16);
while ($row2 = mysqli_fetch_array($rs16)) {
   
   
  $stu->course_name = $row2['course_name'] == null ? '' : $row2['course_name'];
    

    array_push($compArray2, $stu);
}
}
    
echo json_encode($compArray2);


