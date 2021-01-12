<?php
include_once '../DB_3.php';
$conn = DB_3::create_conn();

 
$stu_id = htmlspecialchars($_POST["stu_id"]);
$branch = htmlspecialchars($_POST["branch"]);
$nic = htmlspecialchars($_POST["nic"]);
$admission = htmlspecialchars($_POST["admission"]);
$registration = htmlspecialchars($_POST["registration"]);
$name = htmlspecialchars($_POST["name"]);
$address = htmlspecialchars($_POST["address"]);
$email = htmlspecialchars($_POST["email"]);
$contact = htmlspecialchars($_POST["contact"]);
$date_app = htmlspecialchars($_POST["date_app"]);

$gen = htmlspecialchars($_POST["gen"]);


$date_a = date("Y-m-d", strtotime($date_app));









$sqlSave = "UPDATE `student` SET `nic`='$nic',`regi_no`='$registration',"
        . "`admission_no`='$admission',`name`='$name',`address`='$address',`email`='$email',"
        . "`gender`='$gen',`contact`='$contact',`regi_date`='$date_a',`branch_idbranch`='$branch' WHERE `nic`='$nic'";

$conn->query($sqlSave);







//$sqlSave1 = "UPDATE `payments` SET `idpayments`='$payid',`sub_amount`='$float_amount',`Application_fee_idApplication_fee`='$idApplication_fee',"
//        . "`moule_mapping_idmoule_mapping`='$idmoule_mapping',`App_process_idApp_process`='$idApp_process',`uni_regi_fee_iduni_regi_fee`='$iduni_regi_fee',"
//        . "`uni_fee_iduni_fee`='$iduni_fee',`first_istall_idfirst_istall`='$idfirst_istall',`second_install_idsecond_install`='$idsecond_install',"
//        . "`third_install_idthird_install`='$idthird_install',`student_idstudent`='$id_stu' WHERE `idpayments`='$payid'";
//
//$conn->query($sqlSave1);
//
//$sqlSave2 = "UPDATE `application_fee` SET `idApplication_fee`='$idApplication_fee',`amount`='$float_app',`date`='$date_app' WHERE `idApplication_fee`='$idApplication_fee'";
//
//$conn->query($sqlSave2);
//
//
//$sqlSave3 = "UPDATE `app_process` SET `idApp_process`='$idApp_process',`amount`='$float_app_proess',`date`='$date_app_proess' WHERE `idApp_process`='$idApp_process'";
//
//$conn->query($sqlSave3);
//
//$sqlSave4 = "UPDATE `first_istall` SET `idfirst_istall`='$idfirst_istall',`amount`='$float_first',`date`='$date_first' WHERE `idfirst_istall`='$idfirst_istall'";
//
//$conn->query($sqlSave4);
//
//$sqlSave5 = "UPDATE `moule_mapping` SET `idmoule_mapping`='$idmoule_mapping',`amount`='$float_module',`date`='$date_module' WHERE `idmoule_mapping`='$idmoule_mapping'";
//
//$conn->query($sqlSave5);
//
//
//
//
//
//
//
//
//
//$sqlSave6 = "UPDATE `second_install` SET `idsecond_install`='$idsecond_install',`amount`='$float_second',`date`='$date_second' WHERE `idsecond_install`='$idsecond_install'";
//
//$conn->query($sqlSave6);
//
//$sqlSave7 = "UPDATE `third_install` SET `idthird_install`='$idthird_install',`amount`='$float_third',`date`='$date_third' WHERE `idthird_install`='$idthird_install'";
//
//$conn->query($sqlSave7);
//
//
//$sqlSave8 = "UPDATE `uni_fee` SET `iduni_fee`='$iduni_fee',`amount`='$float_uni_fee',`date`='$date_uni_fee' WHERE `iduni_fee`='$iduni_fee'";
//
//$conn->query($sqlSave8);
//
//$sqlSave9 = "UPDATE `uni_regi_fee` SET `iduni_regi_fee`='$iduni_regi_fee',`amount`='$float_uni_regi',`date`='$date_uni_regi' WHERE `iduni_regi_fee`='$iduni_regi_fee'";
//
//$conn->query($sqlSave9);

echo 'ok';