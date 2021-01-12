<?php

 session_start(); 
 $user_log = $_SESSION['user_role_iduser_role'];
include_once '../DB_3.php';
$conn = DB_3::create_conn();

$branch = htmlspecialchars($_POST["br_id"]);
$un = htmlspecialchars($_POST["un"]);
$pw = htmlspecialchars($_POST["pw"]);



$query2 = "SELECT password FROM login WHERE password='$pw' ";
$result2 = $conn->query($query2);


if ($result2->num_rows > 0) {
    echo 'already in pass';
    exit();
    
}else{


$sqlSave = "UPDATE `login` SET `usename`='$un',"
        . "`password`='$pw' WHERE `branch_idbranch`='$branch' && `user_role_iduser_role`='$user_log'";

$conn->query($sqlSave);
}


if ($result2->num_rows > 0) {
    echo 'already in pass';
    }else{
echo 'ok';
    }


