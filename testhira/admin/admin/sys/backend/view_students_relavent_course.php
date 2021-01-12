<?php
 session_start(); 

if (!isset($_SESSION['idlogin'])) {
    header('Location: login.php');
}

$user_role = $_SESSION['user_role_iduser_role'];


include_once '../DB_3.php';
$conn = DB_3::create_conn();


$nic = htmlspecialchars($_POST["nic"]);
$branch_id = htmlspecialchars($_POST["branch_id"]);

if($user_role == '2'){
    $query = "SELECT * FROM student s WHERE nic='$nic'";
    
 
}else if($user_role == '1'){

    $query = "SELECT * FROM student s WHERE nic='$nic' && branch_idbranch='$branch_id'";
}
$result = $conn->query($query);
$ss = $result->num_rows;


    if( $result->num_rows === 0 ){
        echo 'no';
       
  
    }

else if($result->num_rows > 0){
         

$sql = "Select "
            . "b.name AS bname,s.`name`,s.nic,s.regi_no,s.admission_no,s.address,s.email,s.idstudent,"
            . "s.gender,s.contact,s.regi_date,s.branch_idbranch from student s"
            . " inner join branch b on s.branch_idbranch = b.idbranch where s.nic = '$nic'";
    $rs2 = $conn->query($sql);
    
    
    $compArray2 = array();

    while ($row1 = mysqli_fetch_array($rs2)) {
         $stu = new stdClass();
       $stu->idstudent2 = $row1['idstudent'] == null ? '' : $row1['idstudent'];
          $stu->idstudent = $row1['nic'] == null ? '' : $row1['nic'];
        $stu->regi_no = $row1['regi_no'] == null ? '' : $row1['regi_no'];
       $stu->admission_no = $row1['admission_no'] == null ? '' : $row1['admission_no'];
       $stu->name = $row1['name'] == null ? '' : $row1['name'];
   

      $stu->email = $row1['email'] == null ? '' : $row1['email'];

       
      
       
         $stu->branch = $row1['bname'] == null ? '' : $row1['bname'];
  array_push($compArray2,$stu);
}


echo json_encode($compArray2);
}