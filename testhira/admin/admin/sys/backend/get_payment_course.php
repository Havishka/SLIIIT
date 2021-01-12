<?php

include_once '../DB_3.php';
$conn = DB_3::create_conn();


$c_id = htmlspecialchars($_POST["c_id"]);
$hide_id = htmlspecialchars($_POST["hide_id"]);



$sql2 = "SELECT p.sub_total,p.third_install_idthird_install,p.second_install_idsecond_install,p.student_idstudent,"
        . "p.first_install_idfirst_install,p.admission_idadmission FROM payments p"
        . " inner join student s on s.idstudent=p.student_idstudent WHERE s.nic='$hide_id' && p.course_idcourse='$c_id'";

$rs3 = $conn->query($sql2);
while ($row12 = mysqli_fetch_array($rs3)) {
    
    
    
     $idfirst_install = $row12['first_install_idfirst_install'] == null ? '' : $row12['first_install_idfirst_install'];
        $idadmission = $row12['admission_idadmission'] == null ? '' : $row12['admission_idadmission'];
       $idsecond_install= $row12['second_install_idsecond_install'] == null ? '' : $row12['second_install_idsecond_install'];
        $idthird_install = $row12['third_install_idthird_install'] == null ? '' : $row12['third_install_idthird_install'];
       $idstudent = $row12['student_idstudent'] == null ? '' : $row12['student_idstudent'];
        
        
}


$sql9 = "SELECT c.course_name,c.price,p.sub_total,p.idpayments,p.discount,p.student_idstudent from course c inner join payments p on p.course_idcourse=c.idcourse "
        . "inner join student s on s.idstudent=p.student_idstudent where s.nic = '$hide_id' && c.idcourse='$c_id'";

$sql5 = "SELECT amount AS a_amount,`date` AS a_date from admission where idadmission='$idadmission'";
$sql6 = "SELECT amount AS f_amount,`date` AS f_date from first_install where idfirst_install='$idfirst_install'";
$sql7 = "SELECT amount AS d_amount,`date` AS u_date from second_install where idsecond_install='$idsecond_install'";
$sql8 = "SELECT amount AS t_amount,`date` AS t_date from third_install where idthird_install='$idthird_install'";

$sql20 = "SELECT SUM(amount) AS first_sum FROM `student_has_first_install` WHERE `student_idstudent`='$idstudent' && `course_idcourse`='$c_id'";
$sql21 = "SELECT SUM(amount) AS second_sum FROM `student_has_second_install` WHERE `student_idstudent`='$idstudent' && `course_idcourse`='$c_id'";
$sql22 = "SELECT SUM(amount) AS third_sum FROM `student_has_third_install` WHERE `student_idstudent`='$idstudent' && `course_idcourse`='$c_id'";
    
 $rs20 = $conn->query($sql20);
 $rs21 = $conn->query($sql21);
 $rs22 = $conn->query($sql22);


   $rs4 = $conn->query($sql5);
     $rs8 = $conn->query($sql6);
      $rs9 = $conn->query($sql7);
       $rs10 = $conn->query($sql8);
        $rs11 = $conn->query($sql9);
      
       


$compArray2 = array();
 
 while ($row1 = mysqli_fetch_array($rs4)) {
         while ($row8 = mysqli_fetch_array($rs8)) {
             while ($row9 = mysqli_fetch_array($rs9)) {
                  while ($row10 = mysqli_fetch_array($rs10)) {
                       while ($row11 = mysqli_fetch_array($rs11)) {
                               while ($row12 = mysqli_fetch_array($rs20)) {
                                    while ($row13 = mysqli_fetch_array($rs21)) {
                                         while ($row14 = mysqli_fetch_array($rs22)) {
                                    

    
       $all = new stdClass();
    
 $c_name = $row11['course_name'] == null ? '' : $row11['course_name'];
  $c_price = $row11['price'] == null ? '' : $row11['price'];
 $sub_total = $row11['sub_total'] == null ? '' : $row11['sub_total'];


   
$idpayments = $row11['idpayments'] == null ? '' : $row11['idpayments'];
  $discount = $row11['discount'] == null ? '' : $row11['discount'];
    
    $idstudent2 = $row11['student_idstudent'] == null ? '' : $row11['student_idstudent'];
                      
           $first_sum = $row12['first_sum'] == null ? '' : $row12['first_sum'];  
            $second_sum = $row13['second_sum'] == null ? '' : $row13['second_sum']; 
             $third_sum = $row14['third_sum'] == null ? '' : $row14['third_sum']; 
          
             
       $a_amount = $row1['a_amount'] == null ? '' : $row1['a_amount'];
       $a_date = $row1['a_date'] == null ? '' : $row1['a_date'];
       
        $f_amount = $row8['f_amount'] == null ? '' : $row8['f_amount'];
        $f_date = $row8['f_date'] == null ? '' : $row8['f_date'];
        
         $d_amount= $row9['d_amount'] == null ? '' : $row9['d_amount'];
       $s_date  = $row9['u_date'] == null ? '' : $row9['u_date'];
      //echo $d_amount;
        
        
          $t_amount = $row10['t_amount'] == null ? '' : $row10['t_amount'];
          $t_date = $row10['t_date'] == null ? '' : $row10['t_date'];
      
        
        
        
               
               
                $all->a_amount = $a_amount;
               $all->a_date = $a_date;
               
               $all->f_amount = $f_amount;
               $all->f_date = $f_date;
               $all->s_amount = $d_amount;
               $all->s_date = $s_date;
               $all->t_amount = $t_amount;
               $all->t_date = $t_date;
                 $all->c_name = $c_name ;
               $all->c_price = $c_price;
               $all->c_id = $c_id;
               $all->discount = $discount;
               
                $all->idfirst_install = $idfirst_install;
                $all->idsecond_install = $idsecond_install;
                $all->idthird_install = $idthird_install;
                 $all->idstudent2 = $idstudent2;
                 $all->idadmission = $idadmission;
          
              $all->sub_total = $sub_total;
             
              $all->idpayments = $idpayments;
              
               $all->first_sum = $first_sum;
                $all->second_sum = $second_sum;
                 $all->third_sum = $third_sum;
        
         array_push($compArray2, $all);
                               }
                                    }
                               }
         
      }
             }
    }
    }
    }
   echo json_encode($compArray2);

   
    