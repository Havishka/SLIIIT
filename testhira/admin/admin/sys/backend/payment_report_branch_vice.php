<?php

session_start(); 

if (!isset($_SESSION['idlogin'])) {
    header('Location: login.php');
}

$user_role = $_SESSION['user_role_iduser_role'];


include_once '../DB_3.php';
$conn = DB_3::create_conn();

$branch_id = htmlspecialchars($_POST["branch_id"]);




    $sql15 = "SELECT * FROM student  where branch_idbranch= '$branch_id' && status='1' GROUP BY nic";
    



$rs15 = $conn->query($sql15);
$compArray2 = array();

while ($row1 = mysqli_fetch_array($rs15)) {
    $stu = new stdClass();
  
    $stu->name = $row1['name'] == null ? '' : $row1['name'];
    $nic = $row1['nic'] == null ? '' : $row1['nic'];
    $stu->admission_no = $row1['admission_no'] == null ? '' : $row1['admission_no'];


if($user_role == '2'){
       $sql16 = "SELECT SUM(sub_total) AS s_sub, SUM(discount) AS s_dis from payments p "
            . "inner join student s on s.idstudent = p.student_idstudent where s.nic='$nic'";
    $rs16 = $conn->query($sql16); 
}else if($user_role == '1'){
        $sql16 = "SELECT SUM(sub_total) AS s_sub, SUM(discount) AS s_dis from payments p "
            . "inner join student s on s.idstudent = p.student_idstudent where s.nic='$nic' && s.branch_idbranch='$branch_id'";
    $rs16 = $conn->query($sql16);
}


    
    $sql17 = "Select sum(tot_price) AS c_price from course c inner join course_has_student cs on cs.course_idcourse = c.idcourse "
                . "inner join student s on s.idstudent = cs.student_idstudent where s.nic='$nic'";
        $rs17 = $conn->query($sql17);


    while ($row2 = mysqli_fetch_array($rs16)) {
        $s_sub = $row2['s_sub'] == null ? '' : $row2['s_sub'];
        $s_dis = $row2['s_dis'] == null ? '' : $row2['s_dis'];
        //$nic = $row1['nic'] == null ? '' : $row1['nic'];

        

        while ($row3 = mysqli_fetch_array($rs17)) {
           $c_price = $row3['c_price'] == null ? '' : $row3['c_price'];
            $tot = $c_price - $s_dis ;
            $arr = $tot  - $s_sub;
            
            
        


        $stu->nic = $nic;
        $stu->s_sub = $s_sub;
        $stu->s_dis = $s_dis;
         $stu->c_price  = $c_price ;
         $stu->tot  = $tot ;
          $stu->arr  = $arr ;
         


        array_push($compArray2, $stu);
        //echo $compArray2;
        //}
    }
}
}

echo json_encode($compArray2);

