<?php 
	include("../connection.php");

	//session_start();
	
	//include("Dashboard.html"); 
?>
<?php 


$query4="select max(group_id)+1 as sys from student_group_tot";

$result = mysqli_query($con, $query4);

while($rows=mysqli_fetch_array($result))
{
$group_id=$rows['sys'];
}

?>



<?php
if (isset($_POST['crtegrp'])){

		
	






	
   
	$groupNo= $_POST['groupNo'];
	
	
	$course_id = $_POST['course_id'];
	
	$branch_id= $_POST['branch_id'];
	$memNo = $_POST['memNo'];
	
	$date=date("l jS \of F Y h:i:s A");
   // $branch = $_POST['branch'];
	//$courseName = $_POST['courseName'];
	
	
	//$type = $_POST['type'];
	//$groupNum = $_POST['groupNum'];
	


$query1="insert into student_group_tot ( group_id, g_course_id, numMembers, g_branch_id,dateCreate) values ( '$groupNo', '$course_id', '$memNo' ,'$branch_id','$date')";

//$query2="insert into student_group ( std_id, branch_id) values ( '$sysID', '$branch_id')";

//$query3="insert into student_course ( std_id ,course_id ,regNo) values ( '$sysID', '$course' , '$regNo')";

$result = mysqli_query($con, $query1);
 
//$result= mysqli_query($con, $query2);

//$result = mysqli_query($con, $query3);



if (!($result ))
  {
  	echo("Database Error : " . mysqli_error($con));
  }
else
  {
	   unset($_SESSION['grpid']);
	unset($_SESSION['brnid']);
	unset($_SESSION['coid']);
	unset($_SESSION['nostudent']);
	  
	  //create session
    $_SESSION['grpid']=$_POST['groupNo'];
	$_SESSION['coid']= $_POST['course_id'];
	$_SESSION['brnid']= $_POST['branch_id'];
	$_SESSION['nostudent']=$_POST['memNo'];

	
	echo "<script>alert('Group creation was Successful'); window.location.href = 'index.php?tab=regrp&&ref=3231&&grpid=".$_SESSION['grpid']."'; </script>";
		//header("Location: RegHome.php");
  }
  
  
  
  
		
		
		
		
	}
	
	
	
	
	
	
	?>
<?php

if (isset($_POST['editg'])) {
	
	
	 unset($_SESSION['grpid']);
	unset($_SESSION['brnid']);
	unset($_SESSION['coid']);
	unset($_SESSION['nostudent']);
	
	
	
	
	 $_SESSION['grpid']=$_POST['g'];
	$_SESSION['coid']= $_POST['c'];
	$_SESSION['brnid']= $_POST['b'];
	$_SESSION['nostudent']=$_POST['b'];
	
	echo "<script>window.location.href = 'index.php?tab=regrp&&ref=3231&&grpid=".$_SESSION['grpid']."'; </script>";
  
}

?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CADD</title>

   <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="../vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="../vendors/cropper/dist/cropper.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

               <h3>Create new group</h3>
                  
                
              <div class="x_content">
                    <br />
                <form action="index.php?tab=regrp" method="post">
            <div class="form-content">
                <div class="row">
                 <div class="col-md-3">
                        <div class="form-group">
                            <label>Group Number </label>
							
                            <input type="text" name="groupNo" class="form-control"/ value="<?php echo $group_id; ?>"  readonly="readonly">
                            
                        </div>
                    </div>
					
					<div class="col-md-3">
                        <div class="form-group">
                            <label>Course</label>
                            <br>
                            <?php   
				
					
					//query
					$sql=mysqli_query($con,"SELECT c_name,course_id FROM course where state='T' ");
					if(mysqli_num_rows($sql)){
					$select= '<select id="branch" class="form-control" name="course_id"><option selected disabled>Please select..</option>';
					
					while($rs=mysqli_fetch_array($sql)){
						  $select.='<option value="'.$rs['course_id'].'">'.$rs['c_name'].'</option>';
					  }
					}
					$select.='</select>';
					echo $select;
?>
                        </div>
                    </div>
                   
					
                    
					<div class="col-md-3">
                        <div class="form-group">
                            <label>Number of Members </label>
                            <input type="text" name="memNo" class="form-control"/>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Branch</label>
                            <br>
                            <?php   
			
					//query
					//$sql=mysqli_query($con,"SELECT branch_id,name FROM branch");
					
						//if level 2 or 3 only can register to his branch
					if(($le==2)||($le==3))
					{
						$sql=mysqli_query($con,"SELECT branch_id , name FROM branch where branch_id='$bid'");
					}
					else
					{
					$sql=mysqli_query($con,"SELECT branch_id,name FROM branch");
					}
					
					
					
					
					if(mysqli_num_rows($sql)){
					$select= '<select id="branch" class="form-control" name="branch_id"><option selected disabled>Please select..</option>';
					
					while($rs=mysqli_fetch_array($sql)){
						  $select.='<option value="'.$rs['branch_id'].'">'.$rs['name'].'</option>';
					  }
					}
					$select.='</select>';
					echo $select;
?>
                            
                            
 							                   
                      </div>
                    </div>
					
				  <button type="submit" class="btn btn-success" name="crtegrp">Submit</button>
                 </form>
                    
                    <hr>
                    
                </div>    
                    
              <hr>
              <br>
              
  <h3>Edit Group</h3>

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
  <?php

 $sql = "SELECT course.c_name AS coursename, student_group_tot.group_id AS ggid,student_group_tot.dateCreate
 AS DCTE ,student_group_tot.g_course_id AS codid ,student_group_tot.g_branch_id AS bidd FROM course
LEFT JOIN  student_group_tot ON course.course_id = student_group_tot.g_course_id WHERE student_group_tot.g_branch_id
ORDER BY student_group_tot.dateCreate desc";
 


$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'><tr><th>Group ID</th><th>Course</th><th>g_branch_id</th><th>date create</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["ggid"]. "</td><td>" . $row["coursename"]. " (Course ID:" . $row["codid"]. ")</td><td>" . $row["bidd"]. "</td><td>" . $row["DCTE"]. "</td><td width='100px'><form action='' method='post'><input type='hidden' value='" . $row["ggid"]. "' name='g'><input type='hidden' value='" . $row["codid"]. "' name='c'><input type='hidden' value='". $row["bidd"]."' name='b'><button type='submit' class='btn btn-warning' name='editg'>Edit group</button></form></td><td width='100px'><button type='button' class='btn btn-danger' >Delete group</button></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$con->close();


?>
  </body>
</html>
