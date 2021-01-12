<?php

include_once '../DB_3.php';
$conn = DB_3::create_conn();

$branch_id = htmlspecialchars($_POST["b_id"]);


$sql = "select name from branch WHERE idbranch ='$branch_id'";
$rs2 = $conn->query($sql);

$compArray2 = array();

while ($row1 = mysqli_fetch_array($rs2)) {
    $branch_name = $row1['name'] == null ? '' : $row1['name'];
}

$sql2 = "select * from `login` WHERE `branch_idbranch`='$branch_id' && user_role_iduser_role='1'";
$rs3 = $conn->query($sql2);

while ($row1 = mysqli_fetch_array($rs3)) {
    $stu = new stdClass();
    $username = $row1['usename'] == null ? '' : $row1['usename'];
    $password = $row1['password'] == null ? '' : $row1['password'];



    $stu->b_name = $branch_name;
    $stu->un2 = $username;
    $stu->pw2 = $password;
    $stu->bid = $branch_id;
array_push($compArray2, $stu);
}
    
echo json_encode($compArray2);

