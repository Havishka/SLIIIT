<?php

include_once '../DB_3.php';
$conn = DB_3::create_conn();


$nic = htmlspecialchars($_POST["nic"]);

$sql2 = "select c.course_name,c.idcourse,s.idstudent from course c "
        . "inner join course_has_student cs on cs.course_idcourse=c.idcourse "
        . "inner join student s on s.idstudent=cs.student_idstudent where s.nic='$nic'";
$rs3 = $conn->query($sql2);


$compArray2 = array();
while ($row1 = mysqli_fetch_array($rs3)) {
    $cour_arr = new stdClass();
    
    $cour_arr->idcourse = $row1['idcourse'] == null ? '' : $row1['idcourse'];
    $cour_arr->course_name = $row1['course_name'] == null ? '' : $row1['course_name'];
    $cour_arr->stu_id = $row1['idstudent'] == null ? '' : $row1['idstudent'];
   
 array_push($compArray2, $cour_arr);
 
}


echo json_encode($compArray2);
