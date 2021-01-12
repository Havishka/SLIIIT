<?php



include("../connection.php");

//default pass

if($thisuserpass==md5("cadd")){
		
		
		
	

$passtype=$thisuserpass;


$active="disabled";


		
	}else{
		
	$passtype="";	
		
		$active="";
		
		
	}









$d="select * from admin where username='".$_SESSION['username']."'";

$result = mysqli_query($con, $d);

if($rows=mysqli_fetch_array($result))
{
$nn=$rows['name'];

$ee=$rows['email'];
}

if (isset($_POST['gi'])) {

$fn = $_POST['fname'];

$em = $_POST['email'];


		
		$qus="UPDATE admin SET name='".$fn."' , email='".$em."' WHERE username='".$_SESSION['username']."'";
		
		
		
		$ree = mysqli_query($con, $qus);
		 
		
		
		
		
		if (!($ree ))
		  {
			echo("Database Error : " . mysqli_error($con));
		  }
		else
		  {
			 
			echo("Update Successful");
			
		  }




}

 if (isset($_POST['pwc'])) {
				
	if($thisuserpass!=md5("cadd")){
				$cn = md5($_POST['cp']);
				$np = md5($_POST['np']);
				$p="select password from admin where username='".$_SESSION['username']."'";
			
			$result = mysqli_query($con, $p);
			
			if($rows=mysqli_fetch_array($result))
			{
			$ccpw=$rows['password'];
			
			if($ccpw==$cn){
				
				
				
				$query1="UPDATE admin SET password='".$np."' WHERE username='".$_SESSION['username']."'";
					
					
					
					$result = mysqli_query($con, $query1);
					 
					
					
					
					
					if (!($result ))
					  {
						echo("Database Error : " . mysqli_error($con));
					  }
					else
					  {
						  
						  
						  session_destroy();
						 echo "<script>
			
				location.reload();
			
			</script>";
						  
						$msg='<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> You have password changed successfully!
</div>';
					  }
				
				
			}
			
			
			
			
			}
				
			
			
			
			
				 }else{
					 
					 
					 
					 
					 
									 
									 
									 
								$cn =md5("cadd");
								$np = md5($_POST['np']);
								$p="select password from admin where username='".$_SESSION['username']."'";
							
							$result = mysqli_query($con, $p);
							
							if($rows=mysqli_fetch_array($result))
							{
							$ccpw=$rows['password'];
							
							if($ccpw==$cn){
								
								
								
								$query1="UPDATE admin SET password='".$np."' WHERE username='".$_SESSION['username']."'";
									
									
									
									$result = mysqli_query($con, $query1);
									 
									
									
									
									
									if (!($result ))
									  {
										echo("Database Error : " . mysqli_error($con));
									  }
									else
									  {
										  
										  
										  session_destroy();
										 echo "<script>
							
								location.reload();
							
							</script>";
										  
										echo("Password updated");
										
										$msg='<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> You have password changed successfully!
</div>';
									  }
								
								
							}
							
							
							
							
							}
								
							
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
					 
				 }
				
}


?>





<!DOCTYPE html>
<html lang="en">


  <body class="nav-md">
    <div class="container body">
  <!-- top navigation -->
  <div class="top_nav"></div>
  <!-- /top navigation -->

  <!-- page content -->

  <div class="clearfix"></div>
<?php echo $msg;?>
  <div class="row">
  <div class="x_title">
    <h1>Profile</h1>

    <div class="clearfix"></div>
    </div>
     <div class="x_content">
       <br />
        
       <form class="form-horizontal form-label-left input_mask" method="post" action="" form="form1">
          
         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Full Name</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" class="form-control" placeholder="First Name" required name="fname" value="<?php echo $nn;?>">
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" class="form-control" placeholder="Email" required name="email" value="<?php echo $ee;?>">
              <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
            </div>
         </div>
          
         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Level</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
             
              <input type="text"  class="form-control"  value=" <?php echo $le;?>" disabled>
              <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
           </div>
         </div>
        
         <div class="ln_solid"></div>
         <div class="form-group">
           <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              
              <input type="submit" value="Update" name="gi" class="btn btn-primary">
           </div>
         </div>
          
       </form>
       
       
       
       
       
       
       <br>
       
       <h1>Change password</h1>
       
       
       
       
       <form class="form-horizontal form-label-left input_mask" method="post" action="" form="form1">
          
         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
               <input type="hidden" name="cpp"  value="<?php echo $_SESSION['username'];?>">
              <input type="text" class="form-control"  value=" <?php echo $_SESSION['username'];?>" disabled>
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
           </div>
         </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Password</label>
            :
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" class="form-control"  required name="cp" placeholder="Currunt Password" value="<?php echo $passtype;?>" <?php echo $active;?> >
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">New Password</label>
            :
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="password" class="form-control" placeholder="New Password" required name="np" >
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
            </div>
         </div>
         <div class="ln_solid"></div>
         <div class="form-group">
           <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              
             <input type="submit" value="Change" name="pwc" class="btn btn-warning">
           </div>
         </div>
          
       </form>
       
       
       
       
    </div>
</body>
</html>
