<?php

include_once '../DB_3.php';
$conn = DB_3::create_conn();

$payid = htmlspecialchars($_POST["payid"]);
$stu = htmlspecialchars($_POST["stu"]);
$course = htmlspecialchars($_POST["course"]);

$sql15 = "select amount,`date` from student_has_third_install where student_idstudent='$stu' && course_idcourse='$course'";
$rs15 = $conn->query($sql15);
$compArray2 = array();

while ($row1 = mysqli_fetch_array($rs15)) {
    $third_ins = new stdClass();
    $third_ins->t_amount = $row1['amount'] == null ? '' : $row1['amount'];
    $third_ins->t_date = $row1['date'] == null ? '' : $row1['date'];

    array_push($compArray2, $third_ins);
}
    
echo json_encode($compArray2);
