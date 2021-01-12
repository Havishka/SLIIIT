<?php 
	include("../connection.php");

$title="New Registration | CADD CENTER SRILANKA";
?>
<?php 


$query3="select max(std_id)+1 as sys from student";

$result = mysqli_query($con, $query3);

while($rows=mysqli_fetch_array($result))
{
$systemID=$rows['sys'];
}

?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	
	


    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
    $nic = $_POST['nic'];
	$regDate = $_POST['regDate'];
    $address = $_POST['address'];
	$course_id = $_POST['course_id'];
	$regFee= $_POST['regFee'];
	$branch_id= $_POST['branch_id'];
	$sysID= $_POST['sysID'];
	$dob=$_POST['dob'];
	$occ=$_POST['occ'];
	$gender=$_POST['gender'];
	
   // $branch = $_POST['branch'];
	//$courseName = $_POST['courseName'];
	
	
	//$type = $_POST['type'];
	//$groupNum = $_POST['groupNum'];
	


$query1="insert into student( fname,lname, nic, email, mobile, address ,regDate , regFee, dob, gender, occupation) values ( '$fname', '$lname', '$nic', '$email', '$phone','$address','$regDate' , '$regFee' , '$dob', '$gender', '$occ' )";

$query2="insert into student_branch ( std_id, branch_id) values ( '$sysID', '$branch_id')";

$query3="insert into student_course ( std_id ,course_id, sc_date) values ( '$sysID', '$course_id','$regDate' )";

$result = mysqli_query($con, $query1);
 
$result= mysqli_query($con, $query2);

$result = mysqli_query($con, $query3);

$query5="insert into student_phone (student_id, phone) values ('$sysID', '$phone')";
$result5= mysqli_query($con, $query5);


$query4="SELECT * FROM student_pre_course WHERE nic='$nic'";
$result = mysqli_query($con, $query4);

while($rows=mysqli_fetch_array($result))
{
$count=$rows['count_course'];
}

   $result23 = $con->query( $query4 );
   $num_results23 = $result23->num_rows;
   	if($num_results23 > 0)
	{
			$countnew = $count + 1;
			$sql24 = "update student_pre_course set nic='$nic', last_course_id= '$course_id', count_course='$countnew' where nic='$nic'" ; //update table studentpre course . 
			
			$result24 = $con->query( $sql24 );
	}
	else
	{
		$countnew = 1;
		$sql25 = "insert into student_pre_course(nic,last_course_id,count_course) values('$nic','$course_id','$countnew')"; //insert table studentpre course . 
	    $result25 = $con->query( $sql25 );
	}

if (!($result ))
  {
  	echo("Database Error : " . mysqli_error($con));
  }
else
  {
	//echo("Student creation was Successful");
	echo "<script>alert('Student creation was Successful'); window.location.href = 'index.php?tab=regsingle&&success=true'; </script>";
		
  }
	
	
	
	
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>

 
  <script src="reg/scriptvalidation.js"></script>

   <!-- Check nic -->
      <!-- bootstrap-datetimepicker -->
  <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="vendors/cropper/dist/cropper.min.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    
    <!-- not -->
    
   
  <!-- <script type="text/javascript" src="reg/jquery-1.9.1.js"></script>-->
<script type="text/javascript">
$(document).ready(function(){
	$('#nic1').keyup(function(){
		var nic1 = $('#nic1').val();
		if(nic1.length > 2) {
			$('#username_availability_result').html('Loading..');
			var post_string = 'nic1='+nic1;
			$.ajax({
				type : 'POST',
				data : post_string,
				url  : 'reg/username-check.php',
				success: function(responseText){
					if(responseText == 0){
						$('#username_availability_result').html('<span class="success">Not registered yet</span>');
					}
					else if(responseText > 0){
						$('#username_availability_result').html('<span class="error">This NIC already registered</span>');
						//reset nictext
						alert("NIC Already Registered");
						document.getElementById('nic1').value = "";
					}
					else{
						alert('Problem with mysql query');
					}
				}
			});
		}else{
			$('#username_availability_result').html('');
		}
	});
});
</script>


				<script>
					    function checknicagain() 
						{
						var gotnic = document.getElementById('nic1').value;
						var mlen= gotnic.length;
						
						//if(false) 
							//  || (!preg_match("/^([0-9]{12})$/", gotnic)) || gotnic.pattern="[0-9]{9}[vVxX]"
						//charAt(10)!='V'
						
							if(((mlen =="10") ||(mlen =="12")))
							{
								if((mlen =="10"))
								{
							if(!((mlen =="10") && ((gotnic.charAt(9)=='V') ||(gotnic.charAt(9)=='v') ||(gotnic.charAt(9)=='X') ||(gotnic.charAt(9)=='x'))))
							{
								//reset nictext
								alert("Incorrect NIC");
								document.getElementById('nic1').value = "";
							}
								}
							}
							else
							{
								//reset nictext
								alert("Incorrect NIC");
								document.getElementById('nic1').value = "";
							}
							
							
							
						}
				</script>




<style type="text/css">
.web{
	font-family:tahoma;
	size:12px;
	top:10%;
	border:1px solid #CDCDCD;
	border-radius:10px;
	padding:10px;
	width:45%;
	margin:auto;
	height:70px;
}
h1{
	margin:3px 0;
	font-size:13px;
	text-decoration:underline;
}
.tLink{
	font-family:tahoma;
	size:12px;
	padding-left:10px;
	text-align:center;
}
.success{
	color:#009900;
}
.error{
	color:#FF0000;
}
.talign_right{
	text-align:right;
}
.username_availability_result{
	display:block;
	width:auto;
	float:left;
	
}
.input{
	float:left;
}

span{
    color:green;
}

#myForm div{
    color:black; 
    font-size:14px;
}

</style>
   
   
  </head>


  <h3>Student Registration Form</h3>

                              <hr>      
              <div class="x_content">
                    <br />

                    <form class="form-horizontal form-label-left input_mask" method="post" action="index.php?tab=regsingle" id="myForm">
					
						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Student ID" required name="sysID" value='<?php echo $systemID; ?>' readonly >
                           <span class="fa fa-pencil form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">NIC*</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="NIC" required name="nic" id="nic1"  onKeyUp="validate('nic', this.value)" autocomplete="off"><div id='nic'></div>
                          <div class="username_availability_result" id="username_availability_result"></div>
                          
                          
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">First Name*</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="First name" required name="fname" id="fname1" onKeyUp="validate('fname', this.value); checknicagain();  " autocomplete="off"><div id='fname'></div>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name*</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Last Name" required name="lname" id="lname1" onKeyUp="validate('lname', this.value)" autocomplete="off"><div id='lname'></div>
                           <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
               <!--        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date of Birth</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="dob">
                           <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
					  
					   -->
					       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email*</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Email" name="email" id='email1' onBlur="validate('email', this.value)"><div id='email'></div>
                           <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!--
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Phone" required name="phone" data-inputmask="'mask':'(999) 999-9999'>
                           <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>-->
					  
					       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone*</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Phone" required="required" name="phone" data-inputmask="'mask':'(999) 999-9999'">
                           <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
					   <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12">Course* </label>
           <div class="col-md-9 col-sm-9 col-xs-12">
   <?php   
				
					
					//query
					$sql=mysqli_query($con,"SELECT c_name,course_id FROM course where state='T'");
					if(mysqli_num_rows($sql)){
					$select= '<select id="branch" class="form-control" name="course_id" required="required"><option selected disabled>Please select..</option>';
					
					while($rs=mysqli_fetch_array($sql)){
						  $select.='<option value="'.$rs['course_id'].'">'.$rs['c_name'].'</option>';
					  }
					}
					$select.='</select>';
					echo $select;
?>
    </div>
  </div>
                          

                       
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Branch</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <?php   

					//query
					//if level 2 or 3 only can register to his branch
					if(($le==2)||($le==3))
					{
						$sql=mysqli_query($con,"SELECT branch_id , name FROM branch where branch_id='$bid'");
						
						if(mysqli_num_rows($sql)){
					$select= '<select id="branch" class="form-control" name="branch_id" required="required"><option disabled>Please select..</option>';
					
					while($rs=mysqli_fetch_array($sql)){
						  $select.='<option selected value="'.$rs['branch_id'].'">'.$rs['name'].'</option>';
					  }
					}
					$select.='</select>';
					echo $select;
					}
					else
					{
					$sql=mysqli_query($con,"SELECT branch_id,name FROM branch");
						
					if(mysqli_num_rows($sql)){
					$select= '<select id="branch" class="form-control" name="branch_id" required="required"><option selected disabled>Please select..</option>';
					
					while($rs=mysqli_fetch_array($sql)){
						  $select.='<option value="'.$rs['branch_id'].'">'.$rs['name'].'</option>';
					  }
					}
					$select.='</select>';
					echo $select;
					}
					
				
?>
                        </div>
                      </div>
                      

                   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Registration Date<span class="required"></span>
                        </label>
						
                        <div class="col-md-9 col-sm-9 col-xs-12">
                      
						     <div class='input-group date' id='myDatepicker2'>
                          <input type="text" class="form-control" name="regDate" placeholder="Registration Date" value="<?php echo date("Y-m-d"); ?>" >
                             <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
						
						
                      </div>
					  </div>
					  
					          <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Registration Fee*</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Registration Fee" required="required" name="regFee">
                           <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
					  

					   
					   
					   <div class="form-group">
					      <label class="control-label col-md-3 col-sm-3 col-xs-12">Date of Birth</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           <div class='input-group date' id='myDatepicker'>
                            <input type='text' class="form-control" name="dob" placeholder="Date of Birth YYYY-MM-DD" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div></div>
					  
					  <!-- -->
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select id="gender" class="form-control" name="gender">
                                <option selected readonly value="">Please select..</option>
                           								<option value="male">Male</option>
                                                        <option value="female">Female</option>
                                     </select>
                        </div>
                      </div>
                      
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Occupation</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Occupation" name="occ">
                           <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                   

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Address" name="address">
                           <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <!--  <button type="button" class="btn btn-primary">Cancel</button>-->
						   <button class="btn btn-success" type="reset">Reset</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>

                    </form>

    
       <!-- jQuery 
    <script src="vendors/jquery/dist/jquery.min.js"></script>-->
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper -->
    <script src="vendors/cropper/dist/cropper.min.js"></script>

   <!-- validator -->
    <script src="vendors/validator/validator.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    
    <!-- Initialize datetimepicker -->

	<script>
    $('#myDatepicker').datetimepicker({
	 format: 'YYYY-MM-DD'
	
	});
    
    $('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>

    
  </body>
</html>
