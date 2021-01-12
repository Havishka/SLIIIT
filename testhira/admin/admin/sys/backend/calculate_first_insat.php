<?php

include_once '../DB_3.php';
$conn = DB_3::create_conn();

$payid = htmlspecialchars($_POST["payid"]);
$stu = htmlspecialchars($_POST["stu"]);
$course = htmlspecialchars($_POST["course"]);

$sql15 = "select amount,`date` from student_has_first_install where student_idstudent='$stu' && course_idcourse='$course'";
$rs15 = $conn->query($sql15);
$compArray2 = array();

while ($row1 = mysqli_fetch_array($rs15)) {
    $first_ins = new stdClass();
    $first_ins->f_amount = $row1['amount'] == null ? '' : $row1['amount'];
    $first_ins->f_date = $row1['date'] == null ? '' : $row1['date'];

    array_push($compArray2, $first_ins);
    
}
    
echo json_encode($compArray2);

