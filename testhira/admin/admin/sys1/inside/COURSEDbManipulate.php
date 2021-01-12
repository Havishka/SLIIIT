<?php
include('connection.php');

 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST,$con);
}
function saveData($data,$con){
  
 
 $cnamee = $con->real_escape_string($data['cname']);
  $cfe = $con->real_escape_string($data['cf']);
  $cde = $con->real_escape_string($data['cd']);
  
  
     //$cci= $con->real_escape_string($data['ci']);
   $ff = $con->real_escape_string($data['fi']);
  $ss = $con->real_escape_string($data['si']);
  $tt = $con->real_escape_string($data['ti']);
  
  $installemnt_approval=false;
   
  
  if(($ff==0) ||( $ff==null)){
	  $ff=0;
	  $ss=0;
	  $tt=0;
	  
	  $installemnt_approval=false;
  }
  
  
  
   if(($ss==0) ||( $ss==null)){
	
	  $ss=0;
	  $tt=0;
	   $installemnt_approval=true;
  }
  
  
   if(($tt==0) ||( $tt==null)){
	
	
	  $tt=0;
	   $installemnt_approval=true;
	  
  }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT course_id FROM course_installment order by course_id desc";
$result = $conn->query($sql);




 $finallast=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $last = $row['course_id'];
  $finallast=$last+1;

    }
} else {
    echo "0 results";
}
$conn->close();

  
  
  $sql = "insert into course(course_id,c_name,course_fee,duration) values('','$cnamee','$cfe','$cde')";
  
  
 if(($con->query($sql))){
	 
	 
	 
	 		$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "cadd_db";
			
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql = "SELECT course_id FROM course order by course_id desc limit 1 ";
			$result = $conn->query($sql);
			
			
				while($row = $result->fetch_assoc()) {
					
					
					
					$lid=$row["course_id"];
					
					if($installemnt_approval==true){
					$sqlci = "insert into course_installment(course_id,installment_01,	installment_02,installment_03) values('$lid','$ff','$ss','$tt')";
						
						if($con->query($sqlci)){
						
						showData($data,$con);
							 }else{
								 
								 
								 
							 }
					}else if($installemnt_approval==false){
						
						
						
					}
					
					
				}


		 

		 
		 
		 
  }
  else{
  echo "error";
  }
  
}
function showData($data,$con){
  $sql = "select * from course order by course_id asc";
  $data = $con->query($sql);
  $str='<tr class="head"><td>Course ID</td><td>Course Name</td><td>Course Fee</td><td>Course Duration</td><td></td></tr>';
  if($data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){
      $str.="<tr><tr id='".$row['course_id']."'><td>".$row['course_id']."</td><td>".$row['c_name']."</td><td>".$row['course_fee']."</td><td width='100px'>".$row['duration']."</td><td><a href='Admin/M_COURSE/installements.php'><input type='button' class=' w3-button w3-yellow w3-round-large w3-hover-blue-grey' value='Installments'></a>
	  
	  <br><input type='button' class='ajaxedit w3-button w3-dark-grey w3-round-large w3-hover-blue-grey' value='Edit'/> <input type='button' class='ajaxdelete w3-button w3-red w3-round-large w3-hover-blue-grey' value='Delete'>
	  
	  
 </td>
	  
	  
	  </tr>
	  ";
   }
   }else{
    $str .= "<td colspan='5'>No Data Available</td>";
   }
   
echo $str;   
}
function updateData($data,$con){
   $ccname = $con->real_escape_string($data['cname']);
  $r = $con->real_escape_string($data['cf']);
  $d = $con->real_escape_string($data['cd']);

	$editid = $con->real_escape_string($data['editid']);
  $sql = "update course set c_name='$ccname',course_fee='$r',duration='$d' where course_id='$editid'";
  if($con->query($sql)){
    showData($data,$con);
  }
  else{
   echo "error";
  }
  }
  function deleteData($data,$con){
    $delid = $con->real_escape_string($data['deleteid']); 
	$sql = "delete from course where course_id=$delid";
	if($con->query($sql)){
	  showData($data,$con);
	}
	else{
	echo "error";
	}
  }
?>