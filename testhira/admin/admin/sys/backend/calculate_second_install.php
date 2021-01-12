<?php

include_once '../DB_3.php';
$conn = DB_3::create_conn();

$payid = htmlspecialchars($_POST["payid"]);
$stu = htmlspecialchars($_POST["stu"]);
$course = htmlspecialchars($_POST["course"]);

$sql15 = "select amount,`date` from student_has_second_install where student_idstudent='$stu' && course_idcourse='$course'";
$rs15 = $conn->query($sql15);
$compArray2 = array();

while ($row1 = mysqli_fetch_array($rs15)) {
    $second_ins = new stdClass();
    $second_ins->s_amount = $row1['amount'] == null ? '' : $row1['amount'];
    $second_ins->s_date = $row1['date'] == null ? '' : $row1['date'];

    array_push($compArray2, $second_ins);
}
    
echo json_encode($compArray2);
