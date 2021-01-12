<?php

 session_start(); 
 $user_role = $_SESSION['user_role_iduser_role'];
include_once '../DB_3.php';
$conn = DB_3::create_conn();


$course = htmlspecialchars($_POST["course_select2"]);
$branch_id = htmlspecialchars($_POST["branch_id"]);


  
$sql15 = "Select s.`name`,s.nic,s.idstudent from course_has_student cs inner join student s  on cs.student_idstudent=s.idstudent where cs.course_idcourse='$course' && s.branch_idbranch='$branch_id'";





$rs15 = $conn->query($sql15);
$compArray2 = array();

while ($row1 = mysqli_fetch_array($rs15)) {
    $first_ins = new stdClass();
    $first_ins->s_name = $row1['name'] == null ? '' : $row1['name'];
    $first_ins->s_nic = $row1['nic'] == null ? '' : $row1['nic'];
    $id_student = $row1['idstudent'] == null ? '' : $row1['idstudent'];
    
 $sql16 = "SELECT p.idpayments,p.sub_total,p.discount,p.admission_idadmission from payments p "
         . "where student_idstudent='$id_student'";
$rs17 = $conn->query($sql16);



        

$sql20 = "SELECT SUM(amount) AS first_sum FROM `student_has_first_install` WHERE `student_idstudent`='$id_student' && `course_idcourse`='$course'";
$sql21 = "SELECT SUM(amount) AS second_sum FROM `student_has_second_install` WHERE `student_idstudent`='$id_student' && `course_idcourse`='$course'";
$sql22 = "SELECT SUM(amount) AS third_sum FROM `student_has_third_install` WHERE `student_idstudent`='$id_student' && `course_idcourse`='$course'";

$sql26 = "select price from course where idcourse='$course'";
$rs26 = $conn->query($sql26);

$rs20 = $conn->query($sql20);
 $rs21 = $conn->query($sql21);
 $rs22 = $conn->query($sql22);

while ($row1 = mysqli_fetch_array($rs17)) {
      $idpay = $row1['idpayments'] == null ? '' : $row1['idpayments']; 
      $idadmission = $row1['admission_idadmission'] == null ? '' : $row1['admission_idadmission'];
      
    $sub = $row1['sub_total'] == null ? '' : $row1['sub_total'];
     $dis = $row1['discount'] == null ? '' : $row1['discount'];
     
     
     $sql5 = "SELECT amount AS a_amount,`date` AS a_date from admission where idadmission='$idadmission'";
      $rs23 = $conn->query($sql5);
     while ($row12 = mysqli_fetch_array($rs20)) {
                                    while ($row13 = mysqli_fetch_array($rs21)) {
                                         while ($row14 = mysqli_fetch_array($rs22)) {
                                              while ($row15 = mysqli_fetch_array($rs23)) {
                                                  while ($row16 = mysqli_fetch_array($rs26)) {
                                             
            $first_ins->first = $row12['first_sum'] == null ? '' : $row12['first_sum'];  
              $first_ins->second = $row13['second_sum'] == null ? '' : $row13['second_sum']; 
               $first_ins->third = $row14['third_sum'] == null ? '' : $row14['third_sum'];
               $first_ins->adm = $row15['a_amount'] == null ? '' : $row15['a_amount']; 
                                             
                 $c_fee= $row16['price'] == null ? '' : $row16['price']; 
                 $cu_fee = $c_fee+1000;
                 $tot = $cu_fee - $dis;
                 $arr = $tot - $sub;
                 
                  $first_ins->cu_fee = $cu_fee;
                 $first_ins->sub = $sub;
                  $first_ins->dis = $dis;
                  $first_ins->arr = $arr;
                  $first_ins->tot = $tot;
                 
    array_push($compArray2, $first_ins);
    //echo $compArray2;
                                            
     }}}
     
     }
     }
     
}
    
}
    
echo json_encode($compArray2);


