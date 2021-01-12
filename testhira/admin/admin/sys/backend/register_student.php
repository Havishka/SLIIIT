<?php

include_once '../DB_3.php';
$conn = DB_3::create_conn();


$branch = htmlspecialchars($_POST["branch"]);
$nic = htmlspecialchars($_POST["nic"]);
$admission = htmlspecialchars($_POST["admission"]);
$registration = htmlspecialchars($_POST["registration"]);
$name = htmlspecialchars($_POST["name"]);
$address = htmlspecialchars($_POST["address"]);
$email = htmlspecialchars($_POST["email"]);
$contact = htmlspecialchars($_POST["contact"]);
$date_app = htmlspecialchars($_POST["date_app"]);
//$pay_purpose = htmlspecialchars($_POST["pay_purpose"]);

$gen = htmlspecialchars($_POST["gen"]);
$course = htmlspecialchars($_POST["course"]);

$date_a = date("Y-m-d", strtotime($date_app));
//echo $nic;
//echo $branch;
//echo $admission;
//echo $registration;
//echo $name;
//echo $address;
//echo $email;
//echo $contact;
//echo $date_app;
//echo $gen;

//
$amount = htmlspecialchars($_POST["amount"]);
$regi = htmlspecialchars($_POST["regi"]);
$discount = htmlspecialchars($_POST["discount"]);


$date_b =date("Y-m-d");
$first = htmlspecialchars($_POST["first"]);
$second= htmlspecialchars($_POST["second"]);
$third = htmlspecialchars($_POST["third"]);


$float_regi = floatval($regi);

$float_first = floatval($first);
$float_second = floatval($second);
$float_third = floatval($third);
$float_amount = floatval($amount);
$float_dis = floatval($discount);




$query = "SELECT * FROM student s "
        . "inner join course_has_student cs on s.idstudent=cs.student_idstudent "
        . "where s.nic='$nic' && cs.course_idcourse='$course'";

$result = $conn->query($query);

 if( $result->num_rows > 0 ){
      echo 'A record already exists'; 
     exit;
    }

else{




$idstudent = '';
$sqlSave = "INSERT INTO `student` (`name`, `nic`, `regi_no`, `admission_no`, `address`, 
        `email`, `gender`, `contact`,`regi_date`,`status`,`branch_idbranch`
        ) VALUES ('$name', '$nic', '$registration', '$admission', '$address', '$email','$gen', 
        '$contact','$date_a','1', '$branch')";

$conn->query($sqlSave);
$idstudent = mysqli_insert_id($conn);








//------------------------------------------------Application_fee 

$idadmission='';
$sqlSave1 = "INSERT INTO `admission` (`amount`, `date`) "
        . "VALUES ('$float_regi', '$date_a')";

$conn->query($sqlSave1);
$idadmission = mysqli_insert_id($conn);


$sqljoin45 = "INSERT INTO `student_has_admission`(`student_idstudent`, `admission_idadmission`, `amount`, `date`,`course_idcourse`)  VALUES "
        . "('$idstudent','$idadmission','$float_regi','$date_a','$course')";

$conn->query($sqljoin45);
//echo $sqljoin45;




$idfirst_install='';
$sqlSave6 = "INSERT INTO `first_install` (`amount`, `date`) "
        . "VALUES ('$float_first', '$date_a')";

$conn->query($sqlSave6);
$idfirst_install = mysqli_insert_id($conn);


$sqljoin4 = "INSERT INTO `student_has_first_install`(`student_idstudent`, `first_install_idfirst_install`, `amount`, `date`,`course_idcourse`) VALUES "
        . "('$idstudent','$idfirst_install','$float_first','$date_a','$course')";

$conn->query($sqljoin4);





//------------------------------------------------second_install

$idsecond_install='';
$sqlSave7 = "INSERT INTO `second_install` (`amount`, `date`) "
        . "VALUES ('$float_second', '$date_a')";

$conn->query($sqlSave7);
$idsecond_install = mysqli_insert_id($conn);

$sqljoin5 = "INSERT INTO `student_has_second_install`(`student_idstudent`, `second_install_idsecond_install`, `amount`, `date`,`course_idcourse`) VALUES"
        . " ('$idstudent','$idsecond_install','$float_second','$date_a','$course')";

$conn->query($sqljoin5);


//------------------------------------------------third_install

$idthird_install='';
$sqlSave8 = "INSERT INTO `third_install` (`amount`, `date`) "
        . "VALUES ('$third', '$date_a')";

$conn->query($sqlSave8);
$idthird_install = mysqli_insert_id($conn);


$sqljoin6 = "INSERT INTO `student_has_third_install`(`student_idstudent`, `third_install_idthird_install`, `amount`, `date`,`course_idcourse`) VALUES "
        . "('$idstudent','$idthird_install','$float_third','$date_a','$course')";

$conn->query($sqljoin6);


//echo $float_amount,,,$idsecond_install,$idApp_process,$uni_fee,$uni_regi,$idfirst_istall,$idthird_install,$idstudent;
//echo $idApplication_fee;
//echo $idmoule_mapping;

$sqlSave9 = "INSERT INTO `payments`(`sub_total`, `student_idstudent`, `third_install_idthird_install`, `second_install_idsecond_install`, "
        . "`first_install_idfirst_install`, `admission_idadmission`, `discount`, `course_idcourse`) "
        . "VALUES ('$float_amount','$idstudent','$idthird_install','$idsecond_install','$idfirst_install','$idadmission','$float_dis','$course')";

$conn->query($sqlSave9);


$sqlcourse = "INSERT INTO `course_has_student`(`course_idcourse`, `student_idstudent`) "
        . "VALUES ('$course','$idstudent')";

$conn->query($sqlcourse);

}
if ($idstudent!=='')   {
   echo 'ok';
}
 else if( $result->num_rows > 0 ) {
    echo 'A record already exists';
}else{
    echo 'cannot';
}

