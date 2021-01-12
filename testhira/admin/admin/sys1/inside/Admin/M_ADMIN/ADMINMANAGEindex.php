<?php
include("../connection.php");
$msg='';
if(isset($_POST['crteusr'])){



    $nn = $_POST['n'];
	$ee = $_POST['e'];
	$uu = $_POST['u'];
	$bb = $_POST['b'];
 	$ll = 2;
	$pp = md5("cadd");


	


$query1="insert into admin(admin_id,name,email,username,branch_id,	level,password) values (null,'$nn','$ee','$uu', '$bb','$ll','$pp')";



$result = mysqli_query($con, $query1);
 



if (!($result ))
  {
  	echo("Database Error : " . mysqli_error($con));
	
	$msg='<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Unsuccess!</strong>Database Error 
</div>';
  }
else
  {
	
	$msg='<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> You have been signed in successfully!
</div>';
		
  }
  
}
  
  

?><!DOCTYPE HTML>
<html>
<title>Ajax table - edit delete add rows with Ajax - InfoTuts</title>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="Admin/M_ADMIN/style.css" />

<style>
.w3-button {width:150px;}
</style>




<script>

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
</script>















<style>

.frmSearch {position:relative;border: 1px solid #a8d4b1;background-color: #F3F3F3;margin: 2px 0px;padding:20px;border-radius:4px;}
#country-list{list-style:none;margin-top:-90px;padding:0;width:220px;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px; border: #a8d4b1 1px solid;border-radius:4px;}
#other-box{padding: 10px; border: #a8d4b1 1px solid;border-radius:4px;}
</style>

</head>
<body>
<div id="mhead">
Manage administration</div>




<div class="x_content">
                    <br />
  
                    
                    <hr>
                    
                </div>










<div class="frmSearch">
<br>
<?php echo $msg;?>

<br>

<form action="index.php?tab=manage_admin" method="post">
            <div class="form-content">
                <div class="row">
                 <div class="col-md-3">
                        <div class="form-group">
                            <label>Full name </label>
							
                          <input type="text" name="n" class="form-control"/ value=""  >
                            
                        </div>
    </div>
					
					<div class="col-md-3">
                        <div class="form-group">
                            <label>Email  </label>
                            <input type="text" name="e" class="form-control"/>
                        </div>
                    </div>
                   
					
                    
					<div class="col-md-3">
                        <div class="form-group">
                            <label>Username </label>
                            <input type="text" name="u" class="form-control"/>
                        </div>
                    </div>
                    
    <div class="col-md-3">
                      <div class="form-group">
                            <label>Branch</label>
                            <br>
                            <?php   
				
					
					//query
					$sql=mysqli_query($con,"SELECT branch_id,name FROM branch");
					if(mysqli_num_rows($sql)){
					$select= '<select id="branch" class="form-control" name="b"><option selected disabled>Please select..</option>';
					
					while($rs=mysqli_fetch_array($sql)){
						  $select.='<option value="'.$rs['branch_id'].'">'.$rs['name'].'</option>';
					  }
					}
					$select.='</select>';
					echo $select;
?>
                            
                            
 							                   
                      </div>
      </div>
      <br>
            <br> <br>    
 <div align="center" style="margin-top:100px;"><button type="submit" class="btn btn-success" name="crteusr" style="margin-right:50px;">Submit</button> <br>
 </div>
  </form>


<p align="left">Default password is :cadd</p>
<p align="left">Level : 2</p>
<table id='demoajax' cellspacing="0">

</table>
<script type="text/javascript" src="Admin/M_ADMIN/script.js"></script>







<div id="suggesstion-box" align="center"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
   
     <td>
</td>
  </tr>
 
</table>


</div>


</body>
</html>
