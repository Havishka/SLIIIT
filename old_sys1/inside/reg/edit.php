<?php 
	include("../connection.php");

	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

           
                    
                    
  <?php

//include database connection


//check any user action

$action = isset( $_POST['action'] ) ? $_POST['action'] : "";

if($action == "update"){ //if the user hit the submit button

//write our update query

//$mysqli->real_escape_string() function helps us prevent attacks such as SQL injection

$query = "update student

set

std_id = '".$con->real_escape_string($_POST['std_id'])."',

fname = '".$con->real_escape_string($_POST['fname'])."',

lname = '".$con->real_escape_string($_POST['lname'])."',

dob = '".$con->real_escape_string($_POST['dob'])."',

gender  = '".$con->real_escape_string($_POST['gender'])."',

occupation = '".$con->real_escape_string($_POST['occ'])."',

email = '".$con->real_escape_string($_POST['email'])."',

mobile = '".$con->real_escape_string($_POST['phone'])."',

nic = '".$con->real_escape_string($_POST['nic'])."',

regDate = '".$con->real_escape_string($_POST['regDate'])."',

address = '".$con->real_escape_string($_POST['address'])."'


where nic='".$con->real_escape_string($_REQUEST['nic'])."'";

//execute the query

if( $con->query($query) ) {

//if updating the record was successful
      
echo "<div class='daterror'><div class='alert alert-success' role='alert'>Student details are successfully updated! <strong><span class='glyphicon glyphicon-ok'></strong></div></div>";
$query = "select * from student where nic='".$con->real_escape_string($_REQUEST['edit'])."'";

//execute the query

$result = $con->query( $query );

//get number of rows returned

$num_results = $result->num_rows;

//this will link us to our add.php to create new record
echo "<br>";


if( $num_results > 0){ //it means there's already a database record




//creating new table row per record


//just preparing the edit link to edit the record//end table

}else{

//if database table is empty

echo "No records found.";

}


}else{

//if unable to update new record

echo "Database Error: Unable to update record.";

}

}

//select the specific database record to update

$query = "select * from  student

where nic='".$con->real_escape_string($_REQUEST['edit'])."'

limit 0,1";

//execute the query

$result = $con->query( $query );

//get the result

$row = $result->fetch_assoc();

//assign the result to certain variable so our html form will be filled up with values

$std_id= $row['std_id'];
$fname = $row['fname'];
$lname = $row['lname'];

$dob = $row['dob'];

$gender = $row['gender'];

$occupation = $row['occupation'];

$email = $row['email'];

$phone = $row['mobile'];

$nic = $row['nic'];

$regDate = $row['regDate'];

$address = $row['address'];


$regFee = $row['regFee'];

?>
<br>
<!--we have our html form here where user information will be entered-->

<table width="393" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="96" height="67" align="left" valign="middle"><button type="button" class="btn btn-warning" onclick="location.href='index.php?tab=updatestd'">< Back</button></td>
    <td width="297" align="left" valign="middle"><h2><ul><li> Update Student</li></ul></h2></td>
  </tr>
</table>
<p>&nbsp;</p>
<hr>
  <br>
  <br>
  <br>
  <form class="form-horizontal" method="post" action="#" >
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Student No :</label>
      <div class="col-sm-4">
        <input type='text' class="form-control" name='std_id' value='<?php echo $std_id;  ?>' readonly />
      </div>
    </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">First Name. :</label>
    <div class="col-sm-4">
      <input type='text' class="form-control" name='fname' value='<?php echo $fname;  ?>' />
    </div>
    </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Last Name:</label>
    <div class="col-sm-4">
      <input type='text' class="form-control" name='lname' value='<?php echo $lname;  ?>' />
    </div>
    </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Date of Birth :</label>
    <div class="col-sm-4">
  <input type='text' name='dob' class="form-control" value='<?php echo $dob;  ?>' />
    </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Gender :</label>
    <!--  <div class="col-sm-4">
  <input type='text' name='gender' class="form-control" value='<?php echo $gender;  ?>' />
      </div>-->
	       <div class="col-sm-4">
                          <select id="gender" class="form-control" name="gender">
                                <option selected value='<?php echo $gender;  ?>'><?php echo $gender;  ?></option>
                           								<option value="male">Male</option>
                                                        <option value="female">Female</option>
                                     </select>
                        </div>
	  
	  
	  
    </div>
  <div class="form-group">
  <label class="control-label col-sm-2" for="email">Email :</label>
    <div class="col-sm-4">
  <input type='text' name='email' class="form-control" value='<?php echo $email;  ?>' /></td>
    </div>
    </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Occupation :</label>
    <div class="col-sm-4"> 
  <input type='text' name='occ'class="form-control" value='<?php echo $occupation;  ?>'/>
    </div>
    </div>
    
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">NIC :</label>
    <div class="col-sm-4"> 
  <input type='text' name='nic'class="form-control" value='<?php echo $nic;  ?>' readonly="readonly"/>
    </div>
    </div>
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Address :</label>
    <div class="col-sm-4"> 
  <input type='text' name='address' class="form-control" value='<?php echo $address;  ?>' />
  </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Phone :</label>
      <div class="col-sm-4"> 
  <input type='text' name='phone' class="form-control" value='<?php echo $phone;  ?>' />
  </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Registration Date:</label>
      <div class="col-sm-4"> 
  <input type='text' name='regDate' class="form-control" value='<?php echo $regDate;  ?>' />
  </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Registration Fee:</label>
      <div class="col-sm-4"> 
  <input type='text' name='regFee' class="form-control" value='<?php echo $regFee;  ?>'  readonly="readonly" />
  </div>
    </div>
    
    
  <!-- so that we could identify what record is to be updated-->
    
  <input type='hidden' name='nic' value='<?php echo $nic?>' />
    
  <!-- we will set the action to update--> 
    
  <input type='hidden' name='action' value='update' />
    
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input class="btn btn-primary" type='submit' value='Edit' />
    </div>
    </div>
  </form>
  </body>
</html>
