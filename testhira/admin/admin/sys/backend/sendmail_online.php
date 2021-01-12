<?php

include_once '../DB_3.php';
$conn = DB_3::create_conn();





$name = htmlspecialchars($_POST["name"]);
$admission_no = htmlspecialchars($_POST["admission_no"]);


$course = htmlspecialchars($_POST["course"]);
$dis = htmlspecialchars($_POST["dis"]);


$email = htmlspecialchars($_POST["email"]);
$idcourse = htmlspecialchars($_POST["idcourse"]);


$id_stu = htmlspecialchars($_POST["id_stu"]);


$date_a = date("Y-m-d");


$amount = htmlspecialchars($_POST["amount"]);


//$idcourse = htmlspecialchars($_POST["idcourse"]);

$first_install_amount = htmlspecialchars($_POST["first_install_amount"]);
$second_install_amount = htmlspecialchars($_POST["second_install_amount"]);
$third_install_amount = htmlspecialchars($_POST["third_install_amount"]);




$first_date = htmlspecialchars($_POST["first_date"]);
$second_date= htmlspecialchars($_POST["second_date"]);
$third_date = htmlspecialchars($_POST["second_date"]);




$float_first = floatval($first_install_amount);
$float_second = floatval($second_install_amount);
$float_third = floatval($third_install_amount);
$float_amount = floatval($amount);


$date_first = date("Y-m-d", strtotime($first_date));
$date_second = date("Y-m-d", strtotime($second_date));
$date_third = date("Y-m-d", strtotime($third_date));




$idadmission = htmlspecialchars($_POST["idadmission"]);
$idfirst_istall = htmlspecialchars($_POST["idfirst_install"]);
$idsecond_install = htmlspecialchars($_POST["idsecond_install"]);
$idthird_install = htmlspecialchars($_POST["idthird_install"]);

$payid = htmlspecialchars($_POST["payid"]);
//echo $name, $course , $dis, $id_stu , $amount,$float_first,$float_second,$float_third,$idadmission,$idfirst_istall,$idsecond_install,$idthird_install,$payid;


$remark6='';
$remark7='';
$remark8='';



if($float_first == 0){
     $remark6 = '';
    
}else{
    $sqljoin7 = "INSERT INTO `student_has_first_install`(`student_idstudent`, `first_install_idfirst_install`, `amount`, `date`,`course_idcourse`) VALUES "
            . "('$id_stu','$idfirst_istall','$float_first','$date_a','$idcourse')";

    $conn->query($sqljoin7);
    echo $sqljoin7;
$sqlSave4 = "UPDATE `first_install` SET `idfirst_install`='$idfirst_istall',`amount`='$float_first',`date`='$date_first' WHERE `idfirst_install`='$idfirst_istall'";

$conn->query($sqlSave4);
 $remark6 = '1st Ins.';
}

if($float_second == 0){
    $remark7 = '';
}else{
     $sqljoin9 = "INSERT INTO `student_has_second_install`(`student_idstudent`, `second_install_idsecond_install`, `amount`, `date`,`course_idcourse`) VALUES "
            . "('$id_stu','$idsecond_install','$float_second','$date_a','$idcourse')";

    $conn->query($sqljoin9);
  
    $sqlSave6 = "UPDATE `second_install` SET `idsecond_install`='$idsecond_install',`amount`='$float_second',`date`='$date_second' WHERE `idsecond_install`='$idsecond_install'";
    
$conn->query($sqlSave6);
 $remark7 = '2nd Ins.';
}
if($float_third == 0){
    $remark8 = '';
    
    
}else{
     $sqljoin10 = "INSERT INTO `student_has_third_install`(`student_idstudent`, `third_install_idthird_install`, `amount`, `date`,`course_idcourse`) "
            . "VALUES ('$id_stu','$idthird_install','$float_third','$date_a','$idcourse')";

    $conn->query($sqljoin10);
  //   echo $sqljoin10;
    $sqlSave7 = "UPDATE `third_install` SET `idthird_install`='$idthird_install',`amount`='$float_third',`date`='$date_third' WHERE `idthird_install`='$idthird_install'";

$conn->query($sqlSave7);
$remark8 = '3rd Ins.';
}

$sqlSave1 = "UPDATE `payments` SET `idpayments`='$payid',`sub_total`='$float_amount',"
        . "`student_idstudent`='$id_stu',`third_install_idthird_install`='$idthird_install',"
        . "`second_install_idsecond_install`='$idsecond_install',`first_install_idfirst_install`='$idfirst_istall',"
        . "`admission_idadmission`='$idadmission',`discount`='$dis',`course_idcourse`='$idcourse' "
        . "WHERE `idpayments`='$payid'";

$conn->query($sqlSave1);

 // echo $sqlSave1;
$tot = $float_first+$float_second+$float_third;


$float_tot= floatval($tot);


$idinvoice = '';


    
//    echo $remark1;
//      echo $remark5;
     
        $sqlin = "INSERT INTO `email/invoice`(`name`, `amount`, `date`, `remark`,`student_idstudent`,`admission_no`) "
                . "VALUES ('$name','$float_tot','$date_a','$remark6  $remark7  $remark8','$id_stu','$admission_no')";
      
      $conn->query($sqlin);
    $idinvoice = mysqli_insert_id($conn);

    $sqlretrive = "SELECT * FROM `email/invoice` WHERE `idemail/invoice`='$idinvoice'";
    $rs3 = $conn->query($sqlretrive);
        while ($row1 = mysqli_fetch_array($rs3)) {
           $remark = $row1['remark'] == null ? '' : $row1['remark'];
            $date2 = $row1['date'] == null ? '' : $row1['date'];
        }
      

$to = $email;


// subject
$subject = "CADD Center Cash Receipt";

// message
//        $message = "<b>CONGRATULATIONS</b>";
//        $message .= '   <h1 style="color: #ff6666;font-family: fantasy;"> Testing.....    </h1>
//                        <p style="color: #009999;font-weight: bolder;font-size: x-large;">  Done!Your payment received...Thank you for your payment. </p> ' ;
$price='100';

$message = "
        <html>
        <head>
       
        </head>
       <body>
  
         <div style=\"background-color: #ffffff;border: 2px solid #000\">
             <div style=\"margin-left: 2%;margin-right: 2%;margin-bottom: 1%\">

                 <br/>
                 <center>
                 <table>
                     <tr>
                         <td></td>
                         <td style=\"width: 600px\"><h2 style=\"color: #000;display: inline\"><center>Cash Receipt</center></h2></td>
                        
                         <td><p style=\"display: inline;\">No :<span style=\"color: #ff0000;\">$idinvoice</span></p></td>
                     </tr>
                 </table></center>
                   <table>
                     <tr>
                         <td><img src=\"https://image.ibb.co/bT3wKa/cadd_centre_logo.jpg\" width=\"120\" /></td>
                         <td style=\"width: 549px\"><h1 style=\"display: inline;margin-left: 3%\">CADD CENTER LANKA (PVT) LTD</h1>
                 </td>
                         <td>Date : $date2</td>
                     </tr>
                     </table>
                 <hr/>
                     <br/>
                   <table style=\"display: inline\">
                     <tr>
                         <td><b>Student Name</b> </td><td style=\"width: 20px;text-align: center\"><b>:</b></td><td><b>$name</b></td>
                     </tr><br/>
                     <tr><td><b>Amount Paid</b></td>
                         <td style=\"width: 20px;text-align: center\"><b>:</b></td>
                         <td><b>Rs. $float_tot</b></td>
                     </tr><br/>
                     <tr>
                         <td><b>Remarks</b></td>
                         <td style=\"width: 20px;text-align: center\"><b>:</b></td>
                         <td><b>$course - $remark</b></td>
                     </tr>
                 </table>
                 <table style=\"display: inline;margin-left:12%\">
                     <tr>
                         <td><b>Student ID</b></td>
                         <td style=\"width: 20px;text-align: center\"><b>:</b></td>
                         <td><b>$admission_no</b></td>
                     </tr>
                 </table>
                 
                 
                
                 
                 
  
                 <table style=\"margin-top: 0%\" ><tr>
                        
               
                <td style=\"width: 440px\"><p>This is a system generated invoice will not carry any signature.<br/></p>
                    <p style=\"color: #cc0000\"><b> * Course fees are not refundable</b></p><br/>
                         </td>
                       
                      

                     
                     </tr></table>           
                    
                
              
             </div>
            </div>

            
            
            
            
            
       
    </body>
        </html>
        ";


// FROM
$header = "From: info@kasplearning.com \r\n";

// CC

// To send HTML mail, the Content-type header must be set
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";



$retval = mail($to, $subject, $message, $header);






      
      
      
echo 'ok';



