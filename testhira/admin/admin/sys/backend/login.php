<?php

include_once '../DB_3.php';
session_start();


$un = htmlspecialchars($_POST["un"]);
$pw = htmlspecialchars($_POST["pw"]);


$conn = DB_3::create_conn();

$sql = "SELECT * FROM  login WHERE usename='$un' AND password='$pw' AND status='1'";
    

$query = $conn->query($sql);

 
$uname="";
while ($row = mysqli_fetch_array($query)) {
     $uname=$row['usename'];
    $userId = $row['idlogin'];
     $branch_id = $row['branch_idbranch'];
     $user_role = $row['user_role_iduser_role'];
     $_SESSION['idlogin'] = $row['idlogin'];
     $_SESSION['branch_idbranch'] = $row['branch_idbranch'];
      $_SESSION['user_role_iduser_role'] = $row['user_role_iduser_role'];
    
   
}
if($uname=="") {
      
     
         
       header('Location: ../login.php');
      }else {
           $_SESSION['idlogin'] =$userId;
            $_SESSION['branch_idbranch'] = $branch_id;
                     $_SESSION['user_role_iduser_role'] = $user_role;
          header('Location: ../dashboard.php');
      }
    
 






