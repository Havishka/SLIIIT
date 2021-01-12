<?php

include_once '../DB_3.php';
$conn = DB_3::create_conn();

$branch = htmlspecialchars($_POST["branch"]);
$un = htmlspecialchars($_POST["un"]);
$pw = htmlspecialchars($_POST["pw"]);


$query = "SELECT * FROM branch WHERE name='$branch'";
$query2 = "SELECT password FROM  login WHERE password='$pw'";

$result = $conn->query($query);
$result2 = $conn->query($query2);



//$rs2 = $conn->query($query2);
//
//while ($row1 = mysqli_fetch_array($rs2)) {
//    $password = $row1['password'] == null ? '' : $row1['password'];
//}


if ($result->num_rows > 0) {
    echo 'A record already exists';
    exit;
} else if ($result2->num_rows > 0){
        echo 'already in pass';
        exit;
}	

else {

    $idbranch = '';
    $sqlSave = "INSERT INTO `branch` (`name`,`ststus`
        ) VALUES ('$branch','1')";

    $conn->query($sqlSave);
    $idbranch = mysqli_insert_id($conn);
   

    $sqlSave2 = "INSERT INTO `login` (`usename`, `password`, `status`,`branch_idbranch`, `user_role_iduser_role`
         ) VALUES ('$un', '$pw', '1', '$idbranch','1')";

    $conn->query($sqlSave2);
}
if ($idbranch !== '') {
    echo 'ok';
} else if ($result->num_rows > 0) {
    echo 'A record already exists';
    } else if ($result2->num_rows > 0) {
    echo 'already in pass';
} else {
    echo 'cannot';
}