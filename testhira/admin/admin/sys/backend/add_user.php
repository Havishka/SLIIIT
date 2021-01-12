<?php

include_once '../DB_3.php';
$conn = DB_3::create_conn();

$query = "SELECT * FROM login s WHERE user_role_iduser_role='2'";


$result = $conn->query($query);
$ss = $result->num_rows;


    if( $result->num_rows === 0 ){
        $sql15 = "INSERT INTO `login`(`usename`, `password`, `status`, `branch_idbranch`, `user_role_iduser_role`) "
        . "VALUES ('super','123','1','1','2')";
$rs15 = $conn->query($sql15);
       
       
  
    }else{
       echo 'no';  
    }




