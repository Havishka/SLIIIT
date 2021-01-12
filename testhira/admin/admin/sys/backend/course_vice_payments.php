<?php


include_once '../DB_3.php';
$conn = DB_3::create_conn();

$payid = htmlspecialchars($_POST["payid"]);
$stu = htmlspecialchars($_POST["stu"]);
$course = htmlspecialchars($_POST["course"]);


    

    $sql3 = "select `third_install_idthird_install`,`second_install_idsecond_install`,`first_install_idfirst_install`,`admission_idadmission`,`discount`"
            . "FROM  payments where idpayments='$payid'";
    $rs6 = $conn->query($sql3);
    while ($row2 = mysqli_fetch_array($rs6)) {
       
        $idfirst_install = $row2['first_install_idfirst_install'] == null ? '' : $row2['first_install_idfirst_install'];
        $idadmission = $row2['admission_idadmission'] == null ? '' : $row2['admission_idadmission'];
       $idsecond_install= $row2['second_install_idsecond_install'] == null ? '' : $row2['second_install_idsecond_install'];
        $idthird_install = $row2['third_install_idthird_install'] == null ? '' : $row2['third_install_idthird_install'];
        $discount = $row2['discount'] == null ? '' : $row2['discount'];
//       
    }
   $sql4 = "select ad.`date` AS ad_date,ad.amount AS ad_amount,p.sub_total FROM admission ad inner join payments p on p.admission_idadmission=ad.idadmission WHERE `idadmission` = '$idadmission'";
   $sql6 = "select `date` AS  fs_date ,amount AS fs_amount FROM  first_install where idfirst_install='$idfirst_install'";
   
   $sql9 = "select `date` AS ss_date,amount AS ss_amount FROM second_install WHERE `idsecond_install` = '$idsecond_install'";
   $sql10 = "select `date` AS ts_date,amount AS ts_amount FROM third_install WHERE `idthird_install` = '$idthird_install'";
   
   $sqlad="SELECT c.course_name,cd.price AS ad_price,c.price AS Cprice FROM course c inner join admission_course cd on c.idcourse=cd.course_idcourse where c.idcourse='$course'";
   $sqlfr="select price  AS fr_price FROM first_install_course WHERE course_idcourse='$course'";
   $sqlse="select price  AS se_price FROM second_install_course WHERE course_idcourse='$course'";
   $sqlth="select price  AS th_price FROM  third_install_course WHERE course_idcourse='$course'";
   
   
   
$sql20 = "SELECT SUM(amount) AS first_sum FROM `student_has_first_install` WHERE `student_idstudent`='$stu' && `course_idcourse`='$course'";
$sql21 = "SELECT SUM(amount) AS second_sum FROM `student_has_second_install` WHERE `student_idstudent`='$stu' && `course_idcourse`='$course'";
$sql22 = "SELECT SUM(amount) AS third_sum FROM `student_has_third_install` WHERE `student_idstudent`='$stu' && `course_idcourse`='$course'";
  

 $rs20 = $conn->query($sql20);
 $rs21 = $conn->query($sql21);
 $rs22 = $conn->query($sql22);
   
//    $sql21 = "SELECT amount AS se2_date,`date` AS se2_amount FROM student_has_second_install where student_idstudent ='$stu' && course_idcourse='$course'";
//    $rs21 = $conn->query($sql21);
   
   
   
   $rs4 = $conn->query($sql4);
     $rs8 = $conn->query($sql6);
      $rs9 = $conn->query($sql9);
       $rs10 = $conn->query($sql10);
       
       $rsad = $conn->query($sqlad);
       $rsfr = $conn->query($sqlfr);
       $rsse= $conn->query($sqlse);
       $rsth = $conn->query($sqlth);
       
    $compArray2 = array();

  
     
    while ($row1 = mysqli_fetch_array($rs4)) {
         while ($row8 = mysqli_fetch_array($rs8)) {
             while ($row9 = mysqli_fetch_array($rs9)) {
                  while ($row10 = mysqli_fetch_array($rs10)) {
                      
                while ($row11 = mysqli_fetch_array($rsad)) {
         while ($row12 = mysqli_fetch_array($rsfr)) {
             while ($row13 = mysqli_fetch_array($rsse)) {
                  while ($row14 = mysqli_fetch_array($rsth)) {
                                                     while ($row15 = mysqli_fetch_array($rs20)) {
                                    while ($row16 = mysqli_fetch_array($rs21)) {
                                         while ($row17 = mysqli_fetch_array($rs22)) {
                         
             
             $all = new stdClass();
             
       $sub_total = $row1['sub_total'] == null ? '' : $row1['sub_total'];
       $admission_date = $row1['ad_date'] == null ? '' : $row1['ad_date'];
       $admission_amount = $row1['ad_amount'] == null ? '' : $row1['ad_amount'];
        $first_date = $row8['fs_date'] == null ? '' : $row8['fs_date'];
        $first_amount = $row8['fs_amount'] == null ? '' : $row8['fs_amount'];
        
         $second_date = $row9['ss_date'] == null ? '' : $row9['ss_date'];
       $second_amount = $row9['ss_amount'] == null ? '' : $row9['ss_amount'];
        $third_date = $row10['ts_date'] == null ? '' : $row10['ts_date'];
        $third_amount = $row10['ts_amount'] == null ? '' : $row10['ts_amount'];
        
        
          $Cprice = $row11['Cprice'] == null ? '' : $row11['Cprice'];
          $course_name = $row11['course_name'] == null ? '' : $row11['course_name'];
        $ad_price = $row11['ad_price'] == null ? '' : $row11['ad_price'];
       $fr_price = $row12['fr_price'] == null ? '' : $row12['fr_price'];
        $se_price = $row13['se_price'] == null ? '' : $row13['se_price'];
        $th_price = $row14['th_price'] == null ? '' : $row14['th_price'];
        
        $first_sum = $row15['first_sum'] == null ? '' : $row15['first_sum'];  
            $second_sum = $row16['second_sum'] == null ? '' : $row16['second_sum']; 
             $third_sum = $row17['third_sum'] == null ? '' : $row17['third_sum']; 
        
        
        
        //$se2_date = $row9['se2_date'] == null ? '' : $row9['se2_date'];
        //$se2_amount = $row9['se2_amount'] == null ? '' : $row9['se2_amount'];
        
        
          
          
          
          
        $all->admission_date =$admission_date;
        $all->admission_amount = $admission_amount;
        //echo $row8['fs_amount'];
      // echo $first_amount;
       
                $all->first_date = $first_date;
               $all->first_amount = $first_amount;
               
               
               
                $all->second_date = $second_date;
               $all->second_amount = $second_amount;
               
               
               
                $all->third_date = $third_date;
               $all->third_amount = $third_amount;
               
               $all->ad_price = $ad_price;
               $all->fr_price = $fr_price;
               $all->se_price = $se_price;
               $all->th_price = $th_price;
               $all->course_name = $course_name;
               $all->sub_total = $sub_total;
          
               $all->Cprice = $Cprice;
               
                $all->first_sum = $first_sum;
                $all->second_sum = $second_sum;
                 $all->third_sum = $third_sum;
                 $all->discount = $discount;
        
         array_push($compArray2, $all);
       //  echo $compArray2;
                                         }
                                    }
                                                     }
             }
    }
    }
    }
                  }
             }
         }
    }
  
   echo json_encode($compArray2);

   
 
   
     
   
    
    
    

   
//    $sql8 = "select `date`,amount FROM second_install where idsecond_install='$idsecond_install'";
//    $rs8 = $conn->query($sql8);
//    while ($row1 = mysqli_fetch_array($rs8)) {
//        $second_date = $row1['date'] == null ? '' : $row1['date'];
//        $second_amount = $row1['amount'] == null ? '' : $row1['amount'];
//    }
//
//    $sql9 = "select `date`,amount FROM third_install where idthird_install='$idthird_install'";
//    $rs9 = $conn->query($sql9);
//    while ($row1 = mysqli_fetch_array($rs9)) {
//        $third_date = $row1['date'] == null ? '' : $row1['date'];
//        $third_amount = $row1['amount'] == null ? '' : $row1['amount'];
//    }
//
//   
//
//    $sql12 = "SELECT `idcourse`,`course_name` FROM `course` WHERE `student_idstudent`='$idstudent'";
//    $rs12 = $conn->query($sql12);
//    while ($row1 = mysqli_fetch_array($rs12)) {
//        $course_name = $row1['course_name'] == null ? '' : $row1['course_name'];
//       
//    }
//
//
//    
//
//
//    
//
//    $sql19 = "SELECT amount,`date` FROM student_has_first_istall where student_idstudent ='$idstudent'";
//    $rs19 = $conn->query($sql19);
//
//    
//    
//    
//    
//    $sql21 = "SELECT amount,`date` FROM student_has_second_install where student_idstudent ='$idstudent'";
//    $rs21 = $conn->query($sql21);
//
//   
//    
//    
//    
//    $sql23 = "SELECT amount,`date` FROM student_has_third_install where student_idstudent='$idstudent'";
//    $rs23 = $conn->query($sql23);
//
//    
//     
//    $sql23 = "SELECT amount,`date` FROM student_has_third_install where student_idstudent='$idstudent'";
//    $rs23 = $conn->query($sql23);
//
//    
//
