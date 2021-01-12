<?php session_start(); ?>
<?php
if (!isset($_SESSION['idlogin'])) {
    header('Location: login.php');
}
$branch = $_SESSION['branch_idbranch'];
$user_role = $_SESSION['user_role_iduser_role'];

include_once 'DB_3.php';
$conn = DB_3::create_conn();


$sql = "SELECT `name` FROM `branch` WHERE `idbranch`='$branch'";
$rs = $conn->query($sql);
while ($row1 = mysqli_fetch_array($rs)) {
    $b_name = $row1['name'] == null ? '' : $row1['name'];
}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <title>CADD CENTRE</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/plugins/morris/morris.css">
        <link href="assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>
        <style>
            #btn_dis{
                margin-top: 11%;
                background-color: #F05050;
                border-radius: 5px;
                color: #ffffff;
                margin-left: 10%;
            }



        </style>



    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><img src="logo/logo.jpg" width="50" height="50" class="icon-c-logo"/><span><img src="logo/logo.jpg" width="100" height="50" class="md md-album"/></span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect">
                                    <i class="md md-menu"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>







                            <ul class="nav navbar-nav navbar-right pull-right">



                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile waves-effect" onclick="logout()"><i class="ti-power-off m-r-5" style="color: #cc0000;font-size: 16px;"></i><span style="color: #006600">Logout</span></a>

                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>



                            <li class="has_sub">
                                <a href="dashboard.php" class="waves-effect waves-light "><i class="md md-home"></i> <span> Home </span> </a>

                            </li>

                            <li class="has_sub">
                                <a href="register_students.php" class="waves-effect waves-light active"><i class="md md-palette"></i> <span> Registration</span> </a>

                            </li>

                            <li class="has_sub">
                                <a href="update_student_main.php" class="waves-effect waves-light"><i class="md md-invert-colors-on"></i><span> Update Students</span> </a>

                            </li>
                            <li class="has_sub">
                                <a href="add_payment.php" class="waves-effect waves-light"><i class="md md-invert-colors-on"></i><span> Payments</span> </a>

                            </li>



                            <li class="has_sub">
                                <a href="courses.php" class="waves-effect waves-light"><i class="md md-now-widgets"></i><span> Courses </span></a>

                            </li>
                            <?php if($user_role == '2'){
                                
                                
                           
                                 ?>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect waves-light"><i class="md md-pages"></i><span> Branch Management </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_branch.php">Add Branch</a></li>
                                    <li><a href="change_pass_branch.php">Change Password-Branch</a></li>

                                </ul>
                            </li>
                            <?php }
                            
                            ?>

                            <li class="has_sub">
                                <a href="#" class="waves-effect waves-light"><i class="md md-view-list"></i><span>Settings </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="change_pass.php">Change Password</a></li>

                                </ul>
                            </li>




                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none; ">
                            <div class="modal-dialog"> 
                                <div class="modal-content"> 
                                    <div class="modal-header"> 
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                        <h4 class="modal-title">Enter NIC NO</h4> 
                                        <input type="hidden" value="<?php echo $branch; ?>" id="branch_id7"/>
                                    </div> 
                                    <div class="modal-body"> 
                                        <input  type="text" required placeholder="Enter NIC NO" class="form-control" id="nic_search3">


                                    </div> 
                                    <div class="modal-footer"> 
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" onclick="registered_student()">Search</button> 

                                    </div> 



                                </div> 
                            </div>
                        </div>

                        <!-- Page-Title -->

                        <div id="first_div" class="m-t-20">

                            <div class="row">
                                <h4 class="m-l-10 text-center m-b-20" style="font-size: 21px;"><b>Register Student</b></h4>
                                <div class="col-sm-6 col-md-3 col-lg-6 m-t-20 " style="margin-left: 25%">
                                    <div class="widget-bg-color-icon card-box">
                                        <div class="bg-icon bg-icon-primary pull-left">
                                            <i class=" md-account-child text-primary"></i>
                                        </div>
                                        <div class="text-right">
                                            <h4 class="text-primary" style="font-size: 20px;"><b class="counter">New Student</b></h4>
                                            <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light" onclick="new_student()">
                                                <span class="btn-label"><i class="fa fa-plus"></i></span>
                                                Click Here
                                            </button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div> <div class="row">
                                <div class="col-sm-6 col-md-3 col-lg-6 m-t-20" style="margin-left: 25%">
                                    <div class="widget-bg-color-icon card-box">
                                        <div class="bg-icon bg-icon-success pull-left">
                                            <i class="fa fa-check  text-success"></i>
                                        </div>
                                        <div class="text-right">
                                            <h4 class="text-success " style="font-size: 20px;"><b class="counter">Already Registered</b></h4>
                                            <button type="button" class="btn btn-success btn-rounded waves-effect waves-light" aria-expanded="false" data-toggle="modal" data-target="#custom-width-modal">
                                                <span class="btn-label"><i class="fa fa-plus"></i></span>
                                                Click Here
                                            </button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row" id="pesonal_detail_already" style="display: none">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="text-dark header-title m-t-0">Personal Information</h4>

                                    <form action="#" data-parsley-validate novalidate>
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="userName">Branch <span style="color: #F30166">*</span></label>

                                                <input type="text" name="nick" parsley-trigger="change" required placeholder="" class="form-control" value="<?php echo $b_name;?>" readonly="">
                                                <input type="hidden" value="<?php echo $branch; ?>" id="branch_select2">


                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div class="col-sm-6" >
                                                <label for="emailAddress">NIC <span style="color: #F30166">*</span></label>
                                                <input type="email" name="email" parsley-trigger="change" required placeholder="Enter NIC" class="form-control" id="txtnic2" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="pass1">Admission No <span style="color: #F30166">*</span></label>
                                                <input  type="text" placeholder="Enter Admission NO" required class="form-control" id="admission_no2" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="passWord2">Registration No <span style="color: #F30166">*</span></label>
                                                <input type="text" required placeholder="Enter Registration NO" class="form-control" id="regi_no2" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12" style="margin-top: 2%">
                                                <label for="passWord2">Name <span style="color: #F30166">*</span></label>
                                                <input  type="text" required placeholder="Enter Name" class="form-control" id="name2" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="passWord2">Gender <span style="color: #F30166">*</span></label>

                                                <input  type="text" required placeholder="Enter Name" class="form-control" id="gen2" disabled/>  



                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div class="col-sm-6" style="margin-top: 2%">

                                                <label for="passWord2">Email <span style="color: #F30166">*</span></label>
                                                <input  type="email" required placeholder="Enter Email" class="form-control" id="txtEmail2" disabled/>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12" style="margin-top: 2%">
                                                <label for="passWord2">Address<span style="color: #F30166">*</span></label>
                                                <input  type="text" required placeholder="Enter Address" class="form-control" id="address2" disabled />
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="passWord2">Contact No <span style="color: #F30166">*</span></label>
                                                <input type="text" required placeholder="Enter Contact NO" class="form-control" id="contact2" disabled/>

                                            </div>
                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="passWord2">Date <span style="color: #F30166">*</span></label>
                                                <input type="text"  class="form-control" id="txtdateapply2" disabled/>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12" style="margin-top: 2%">
                                                <label for="passWord2">Registered Courses : </label>
                                                <ul id="course_ul" class="m-l-0 " >

                                                </ul>

                                            </div>

                                        </div>




                                        <div class="form-group text-right m-b-0" style="margin-top: 2%;visibility: hidden">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit" style="margin-top: 2%">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5" style="margin-top: 2%">
                                                Cancel
                                            </button>
                                        </div>

                                    </form>


                                    <!-- end row -->

                                </div>

                            </div>



                        </div>




                        <div class="row" id="new_personal" style="display: none;">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="text-dark header-title m-t-0">Personal Information</h4>

                                    <form action="#" data-parsley-validate novalidate>
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="userName">Branch <span style="color: #F30166">*</span></label>
                                                <?php
                                                if ($user_role == '2') {
                                                    ?>
                                                    <select id='branch_select' class="form-control">
                                                        <option value="0">Select one</option>
                                                        <?php
                                                        $sql = "SELECT * FROM `branch`";
                                                        $rs = $conn->query($sql);
                                                        while ($row1 = mysqli_fetch_array($rs)) {
                                                            ?>

                                                            <option value="<?php echo $row1['idbranch']; ?>"> <?php echo $row1['name']; ?></option>



        <?php
    }
    ?>
                                                    </select>
                                                        <?php
                                                    } else if ($user_role == '1') {
                                                        ?>

                                                    <input type="text" name="nick" parsley-trigger="change" required placeholder="" class="form-control" value="<?php echo $b_name;?>" readonly id="bname">
                                                    <input type="hidden" value="<?php echo $branch; ?>" id="branch_select">
<?php }
?> 
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div class="col-sm-6" >
                                                <label for="emailAddress">NIC <span style="color: #F30166">*</span></label>
                                                <input type="email" name="email" parsley-trigger="change" required placeholder="Enter NIC" class="form-control" id="txtnic">
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="pass1">Admission No <span style="color: #F30166">*</span></label>
                                                <input  type="text" placeholder="Enter Admission NO" required class="form-control" id="admission_no">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="passWord2">Registration No <span style="color: #F30166">*</span></label>
                                                <input type="text" required placeholder="Enter Registration NO" class="form-control" id="regi_no">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12" style="margin-top: 2%">
                                                <label for="passWord2">Name <span style="color: #F30166">*</span></label>
                                                <input  type="text" required placeholder="Enter Name" class="form-control" id="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 5%">
                                                <label for="passWord2">Gender <span style="color: #F30166">*</span></label>


                                                <select id="gen" style="margin-left: 5%">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>


                                                </select>


                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div class="col-sm-6" style="margin-top: 2%">

                                                <label for="passWord2">Email <span style="color: #F30166">*</span></label>
                                                <input  type="email" required placeholder="Enter Email" class="form-control" id="txtEmail">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12" style="margin-top: 2%">
                                                <label for="passWord2">Address<span style="color: #F30166">*</span></label>
                                                <input  type="text" required placeholder="Enter Address" class="form-control" id="address">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="passWord2">Contact No <span style="color: #F30166">*</span></label>
                                                <input type="text" required placeholder="Enter Contact NO" class="form-control" id="contact">

                                            </div>
                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="passWord2">Date <span style="color: #F30166">*</span></label>
                                                <input type="text"  class="form-control" id="txtdateapply" disabled>

                                            </div>
                                        </div>




                                        <div class="form-group text-right m-b-0" style="margin-top: 2%;visibility: hidden">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit" style="margin-top: 2%">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5" style="margin-top: 2%">
                                                Cancel
                                            </button>
                                        </div>

                                    </form>


                                    <!-- end row -->

                                </div>

                            </div>



                        </div>
                        <!-- end row -->




                        <div class="row" id="cv" style="display: none">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="text-dark header-title m-t-0">Payment Information</h4>

                                    <form>
                                        <div id='course_div'>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label for="userName">Select Course <span style="color: #F30166">*</span></label>

                                                    <select id="course_select" onchange="selectCourse()" class="form-control">
                                                        <option value="select">Select One</option>
                                                        <option value="1">FCADD(AUTOCAD)</option>
                                                        <option value="2">FCADD MEP</option>
                                                        <option value="3">REVIT</option>
                                                        <option value="4">REVIT MEP</option>
                                                        <option value="5">DID</option>

                                                        <option value="6">DID MASTER DIP.</option>
                                                        <option value="7">DPPM</option>
                                                        <option value="8">PRO - E</option>
                                                        <option value="9">PPP (PRIMAVERA)</option>
                                                        <option value="10">QS</option>
                                                        <option value="11">MANUAL DRAFT</option>

                                                        <option value="12">3D'S MAX</option>
                                                        <option value="13">CIVIL 3D</option>
                                                        <option value="14">STAAD PRO</option>
                                                        <option value="15">SOLID WORK</option>
                                                        <option value="16">QTO</option>

                                                        <option value="17">Navis Works</option>
                                                        <option value="18">SAP 2000</option>
                                                        <option value="19">Corel Draw</option>
                                                        <option value="20">Photoshop</option>
                                                        <option value="21">Illustrator</option>

                                                        <option value="22">Indesign</option>
                                                        <option value="23">MEP QS</option>
                                                        <option value="24">E-TABS</option>
                                                        <option value="25">AUTOCAD ELECTRICAL</option>
                                                        <option value="26">PMP</option>
                                                        <option value="27">CAPM</option>

                                                        <option value="28">FOUNDATION - PMI</option>

                                                        <!--                                                                        course values also in select function-->

                                                    </select>
                                                    <input type="hidden" value="" id="course_price2"/>
                                                </div>
                                                <div class="col-sm-6"></div>
                                            </div>

                                            <div id="FCADD_AUTOCAD" style="display: none" >
                                                <div id="toppings" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 26,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_1" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_2" value="10000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">10,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_3" value="7500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">7,500 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_4" value="7500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> 7,500 LKR</span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>
                                            <div id="FCADD_MEP"  style="display: none">
                                                <div id="toppings2" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 28,500 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_5" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_6" value="11500" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">11,500 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_7" value="8000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">8,000 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_8" value="8000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> 8000 LKR</span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>
                                            <div id="REVIT"  style="display: none">
                                                <div id="toppings3" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 33,500 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_9" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_10" value="20000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">20,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_11" value="12500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">12,500 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_12" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> - </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>
                                            <div id="REVIT_MEP"  style="display: none">
                                                <div id="toppings4" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 33,500 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_13" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_14" value="20000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">20,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_15" value="12500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">12,500 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_16" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> - </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>
                                            <div id="DID"  style="display: none">
                                                <div id="toppings5" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 101,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_17" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_18" value="40000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">40,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_19" value="30000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">30,000 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_20" value="30000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> 30,000 LKR </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>


                                            <div id="DID_MASTER_DIP"  style="display: none">
                                                <div id="toppings6" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 176,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_21" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_22" value="70000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">70,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_23" value="52500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">52,500 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_24" value="52500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> 52,500 LKR </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>
                                            <div id="DPPM"  style="display: none">
                                                <div id="toppings7" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 33,500 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_25" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_26" value="13500" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">13,500 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_27" value="9500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">9,500 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_28" value="9500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> 9,500 LKR </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>


                                            <div id="PRO_E"  style="display: none">
                                                <div id="toppings8" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 46,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_29" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_30" value="18000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">18,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_31" value="13500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">13,500 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_32" value="13500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> 13,500 LKR </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="PPP_PRIMAVERA"  style="display: none">
                                                <div id="toppings9" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 33,500 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_33" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_34" value="20000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">20,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_35" value="12500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">12,500 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_36" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> - </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="QS"  style="display: none">
                                                <div id="toppings10" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 33,500 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_37" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_38" value="13500" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">13,500 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_39" value="9500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">9,500 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_40" value="9500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> 9,500 LKR </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>
                                            <div id="MANUAL_DRAFT"  style="display: none">
                                                <div id="toppings11" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 21,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_41" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_42" value="12000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">12,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_43" value="8000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">8,000 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_44" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> - </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>
                                            <div id="3D_MAX"  style="display: none">
                                                <div id="toppings12" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 26,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_45" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_46" value="10000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">10,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_47" value="7500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">7,500 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_48" value="7500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000">7,500 LKR </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="CIVIL_3D"  style="display: none">
                                                <div id="toppings13" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 38,500 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_49" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_50" value="15500" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">15,500 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_51" value="11000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">11,000 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_52" value="11000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000">11,000 LKR </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="STAAD_PRO"  style="display: none">
                                                <div id="toppings14" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 37,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_53" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_54" value="14000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">14,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_55" value="11000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">11,000 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_56" value="11000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000">11,000 LKR </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="SOLID_WORK"  style="display: none">
                                                <div id="toppings15" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 38,500 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_57" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_58" value="15500" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">15,500 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_59" value="11000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">11,000 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_60" value="11000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000">11,000 LKR </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>
                                            <div id="QTO"  style="display: none">
                                                <div id="toppings16" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 38,500 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_61" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_62" value="20000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">20,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_63" value="12000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">12,000 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_64" value="8000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000">8,000 LKR </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="Navis_Works"  style="display: none">
                                                <div id="toppings17" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 31,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_65" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_66" value="18000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">18,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_67" value="12000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">12,000 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_68" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> - </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="SAP_2000"  style="display: none">
                                                <div id="toppings18" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 41,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_69" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_70" value="24000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">24,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_71" value="16000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">16,000 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_72" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> - </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="Corel_Draw"  style="display: none">
                                                <div id="toppings19" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 21,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_73" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_74" value="12000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">12,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_75" value="8000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">8,000 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_76" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> - </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="Photoshop"  style="display: none">
                                                <div id="toppings20" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 21,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_77" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_78" value="12000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">12,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_79" value="8000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">8,000 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_80" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> - </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="Illustrator"  style="display: none">
                                                <div id="toppings21" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 21,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_81" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_82" value="12000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">12,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_83" value="8000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">8,000 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_84" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> - </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="Indesign"  style="display: none">
                                                <div id="toppings22" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 21,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_85" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_86" value="12000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">12,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_87" value="8000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">8,000 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_88" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> - </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="MEP_QS"  style="display: none">
                                                <div id="toppings23" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 26,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_89" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_90" value="10000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">10,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_91" value="7500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">7,500 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_92" value="7500" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> 7,500 LKR </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="E_TABS"  style="display: none">
                                                <div id="toppings24" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 41,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_93" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_94" value="24000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">24,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_95" value="16000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">16,000 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_96" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> - </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="AUTOCAD_ELECTRICAL"  style="display: none">
                                                <div id="toppings25" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 31,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_97" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_98" value="16000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">16,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_99" value="12000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000">12,000 LKR</span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_100" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> - </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="PMP"  style="display: none">
                                                <div id="toppings26" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 41,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_101" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_102" value="40000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">40,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_103" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000"> - </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_104" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> - </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="CAPM"  style="display: none">
                                                <div id="toppings27" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 31,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_105" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_106" value="30000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">30,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_107" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000"> - </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_108" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> - </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>

                                            <div id="FOUNDATION_PMI"  style="display: none">
                                                <div id="toppings28" class="column one"  >
                                                    <br/><br/>
                                                    <div class="col-md-12"><p style="margin-left: 1%"><br/>Total Course Fee :<span style="color: #F30166"> 21,000 LKR</span></p></div>
                                                    <div class="col-md-12" >
                                                        <table border="0" style="display: inline;margin-left: 5%;text-align: left;">
                                                            <tr>
                                                                <td style="height: 40px;"><input type="checkbox" id="check_109" value="1000" /> </td>
                                                                <td style="font-size: 15px;text-align: left;width: 500px"><span style="margin-left: 4%;color: #009900">Registration  Fee - <span style="color: #cc0000">1000 LKR</span></span></td>


                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_110" value="20000" /></td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">1<sup>st</sup> Installment - <span style="color: #cc0000">20,000 LKR </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_111" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">2<sup>nd</sup> Installment - <span style="color: #cc0000"> - </span></span></td>  
                                                            </tr>
                                                            <tr>
                                                                <td style="height: 40px"><input type="checkbox" id="check_112" value="0" /> </td>
                                                                <td style="font-size: 15px;text-align: left;"><span style="margin-left: 4%;color: #009900">3<sup>rd</sup> Installment -<span style="color: #cc0000"> - </span></span></td>


                                                            </tr>


                                                        </table></div>

                                                </div>
                                            </div>
                                        </div>





                                        <div style="display: none" id="tot_div">
                                            
                                             <div class="col-md-12" id="manual_1">
                                                <div class="col-md-6"> 
                                                    <br/>
                                                    <label style="font-size: 13px">Enter Manual : &nbsp;</label><span>

                                                        <input type="text"    id="tot_2" style="width: 100%;display: inline;font-size: 18px;;color: #cc3300;" onchange="change_sub_total()"/>
                                                    </span>
                                                </div>
                                                    <div class="col-md-6" >
                                                      
                                                        <label style="font-size: 13px;margin-top: 4%">Select a Payment Method : &nbsp;</label><span>
                                                            <select class="form-control" id="install_select" onchange="check_install()">
                                                                <option value="0">Select One</option>
                                                                <option value="1">1st Inastallment</option>
                                                                <option value="2">2nd Inastallment</option>
                                                                <option value="3">3rd Inastallment</option>
                                                               
                                                                
                                                                
                                                                
                                                            </select>
                                                            <input type="hidden" value="0" id="install_hide"/>
                                                        </span>


                                                </div>            
                                            
                                            
                                             </div>
                                            
                                            <div class="col-md-12">
                                                <div class="col-md-6"> 
                                                    <br/>
                                                    <label style="font-size: 13px">Course Fee : &nbsp;<sup style="color: #ff0000"><b>*</b></sup></label><span>

                                                        <input type="text" name="total"   id="tot_1" style="width: 100%;display: inline;font-size: 18px;;color: #cc3300;" readonly=""/>
                                                    </span>
                                                
                                                   
                                                    
                                                    
                                                
                                                
                                                </div>                          <div class="col-md-6" id="dis_btn">
                                                    <input type="button" value="Click here to Add Discount" id='btn_dis' onclick="discount_div_preview()"/>
                                                    <!--                                                        <button class="btn btn-danger waves-effect waves-light" onclick="discount_div_preview()" style="margin-top: 10%;">Click here to Add Discount</button>-->

                                                </div></div>
                                            
                                            
                                            
                                            
                                            
                                            

                                            <div class="col-md-12" style="display: none;margin-top: 2%" id='discount_div'>

                                                <div class="col-md-6"> 
                                                    <label for="passWord2">Discount</label>


                                                    <select style="margin-left: 0%" class="form-control" id="discount_select" onchange="change_discount()">
                                                        <option value="0">No discount</option>
                                                        <option value="1">Percentage</option>
                                                        <option value="2">Enter Manual</option>
                                                    </select>
                                                    <input type="hidden" id="dis_text" value="0"/>
                                                </div>
                                                <div class="col-md-6" style="display: none" id="percentage_div" >
                                                    <br/>
                                                    <select id="dis_percentage" style="margin-left: 0%" class="form-control" onchange="discount_2()">
                                                        <option value="0">0%</option>
                                                        <option value="12.5">12.5%</option>
                                                        <option value="15">15%</option>
                                                        <option value="20">20%</option>
                                                        <option value="25">25%</option>



                                                    </select>
                                                </div>
                                                <div class="col-md-6" style="display: none" id="enter_amount_div">

                                                    <label style="font-size: 14px">Enter Discount Amount : &nbsp;</label><span>

                                                        <input type="text" value="0" class="form-control" onchange="calculate_dis()" id="txt_enter_dis"/>

                                                    </span>
                                                </div>
                                                <div class="col-md-12 p-l-0" id='dis_count2_div' style=";margin-top: 2%">
                                                    <div class="col-md-6 " id='dis_div1' style="display: none"> 
                                                        <label for="passWord2">Discount Amount</label>
                                                        <input  type="text" value="0" class="form-control" id="dis_price">
                                                    </div>
                                                    <div class="col-md-6" id='dis_div2' >
                                                        <label for="passWord2" style="color: #cc0000;font-size: 16px;"><b>Total Course Fee (With Discount)</b></label>
                                                        <input  type="text" value="0" class="form-control" id="final_sub" style="color: #009900;font-size: 21px;font-weight: bold">

                                                    </div>


                                                </div>
                                            </div></div>



                                    </form>    



                                    <div class="text-right m-b-0" style="margin-top: 2%;display: none" id="new_submit">
                                        <button class="btn btn-primary waves-effect waves-light"  style="margin-top: 2%" onclick="register()">
                                            Submit
                                        </button>
                                        <a href="register_students.php"> <button class="btn btn-default waves-effect waves-light m-l-5" style="margin-top: 2%">
                                                Cancel
                                            </button></a>
                                    </div>

                                    <div class="text-right m-b-0" style="margin-top: 2%;display: none" id="already_submit" >
                                        <button class="btn btn-primary waves-effect waves-light"  style="margin-top: 2%" onclick="register_old()">
                                            Submit
                                        </button>
                                        <a href="register_students.php"> <button class="btn btn-default waves-effect waves-light m-l-5" style="margin-top: 2%">
                                                Cancel
                                            </button></a>
                                    </div>





                                    <!-- end row -->

                                </div>

                            </div>



                        </div>

                        <!-- container -->
                    </div>
                </div> <!-- content -->

                <footer class="footer text-right">
                    2017 © CADD CENTRE LANKA (PVT) LTD.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">Chat</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-1.jpg" alt="">
                                </div>
                                <span class="name">Chadengle</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <span class="name">Tomaslau</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <span class="name">Stillnotdavid</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-4.jpg" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-5.jpg" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-6.jpg" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-7.jpg" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-8.jpg" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-9.jpg" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-10.jpg" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>  
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->

        <script>





            jQuery(document).ready(function () {

                //set date to textfield
                var now = new Date();

                var day = ("0" + now.getDate()).slice(-2);
                var month = ("0" + (now.getMonth() + 1)).slice(-2);

                //            var today = now.getFullYear() + "-" + (month) + "-" + (day);
                var today = (month) + "/" + (day) + "/" + now.getFullYear();
                jQuery("#txtdateapply").val(today);
                jQuery("#txtdateapply2").val(today);
                // ending set date to textfield









            });
            
            
            function change_sub_total(){
                var vv = jQuery("#tot_2").val();
                var vv1 = jQuery("#tot_1").val();
               
                var vv3 = parseFloat(vv)+parseFloat(vv1);
                jQuery("#tot_1").val(vv3);
                
            }


            function new_student() {
                jQuery('#first_div').css('display', 'none');
                jQuery('#pesonal_detail_already').css('display', 'none');
                jQuery('#cv').css('display', 'block');
                jQuery('#already_submit').css('display', 'none');
                jQuery('#new_personal').css('display', 'block');
                jQuery('#new_submit').css('display', 'block');
            }



            function registered_student() {

                var new_nic = jQuery('#nic_search3').val();
                //alert(new_nic);

                var branch_id7 = jQuery('#branch_id7').val();

                if (new_nic === '') {
                    swal('NIC No Required..!! ');



                } else {
                    //alert(name+gen+address+email+nic+date_app+contact+branch+amount+regi+first+second+third+gen+registration+admission);
                    jQuery.post('./backend/search_student_registered.php', {nic: new_nic, branch_id: branch_id7
                    },
                            function (data, status) {

                                if (status === 'success') {
                                    if (data === 'no') {

                                        //location.href = 'register_students.php';


                                        jQuery('#first_div').css('display', 'block');
                                        jQuery('#pesonal_detail_already').css('display', 'none');
                                        jQuery('#cv').css('display', 'none');
                                        jQuery('#already_submit').css('display', 'none');
                                        jQuery('#new_personal').css('display', 'none');
                                        jQuery('#new_submit').css('display', 'none');



                                        swal({
                                            title: "Sorry!",
                                            text: "No result Found.",
                                            imageUrl: "img/sorry.png"
                                        });
                                        jQuery('#nic_search3').val("");
                                        //location.href = 'register_students.php';

                                    } else {

                                        jQuery('#first_div').css('display', 'none');
                                        jQuery('#pesonal_detail_already').css('display', 'block');
                                        jQuery('#cv').css('display', 'block');
                                        jQuery('#already_submit').css('display', 'block');
                                        jQuery('#new_personal').css('display', 'none');
                                        jQuery('#new_submit').css('display', 'none');

                                        var rows = JSON.parse(data);

                                        for (var i = 0; i < rows.length; i++) {

                                            var row = rows[i];

                                            //alert(row.name);

                                            jQuery('#name2').val(row.s_name);
                                            jQuery('#admission_no2').val(row.admission_no);
                                            jQuery('#regi_no2').val(row.regi_no);

                                            jQuery('#txtEmail2').val(row.email);
                                            jQuery('#txtnic2').val(row.nic);


                                            jQuery('#address2').val(row.address);
                                            jQuery('#contact2').val(row.contact);

                                            jQuery('#gen2').val(row.gender);
                                            jQuery('#branch_select2').val(row.branch_id);
                                            

                                            jQuery('#bname').val(row.b_name);

                                            //   alert(row.idstudent2);


                                        }
                                    }

                                }

                            }

                    );

                    jQuery.post('./backend/view_courses_registered.php', {nic: new_nic, branch_id: branch_id7
                    },
                            function (data, status) {

                                if (status === 'success') {

                                    var rows = JSON.parse(data);

                                    for (var i = 0; i < rows.length; i++) {

                                        var row = rows[i];

                                        //alert(row.name);

                                        var li = '<li>' + row.course_name + '<br/></li>';

                                        jQuery('#course_ul').append(jQuery(li));

                                        //   alert(row.idstudent2);


                                    }


                                }

                            }

                    );



                }





            }













            var change_val_dis = 'no';


            function change_discount() {

                var tr = jQuery('#discount_select').val();

                if (tr === '0') {
                    var d = 0;
                    jQuery('#enter_amount_div').css('display', 'none');
                    jQuery('#percentage_div').css('display', 'none');
                    jQuery('#dis_text').val(0);
                    jQuery('#final_sub').val(0);
                    jQuery('#dis_price').val(0);
                    var tt = jQuery('#course_price2').val();
                    jQuery('#final_sub').val(tt);
                    jQuery('#dis_div1').css('display', 'none');
                    jQuery('#dis_div2').css('display', 'block');
                    






                } else if (tr === '1') {
                    jQuery('#percentage_div').css('display', 'block');
                    jQuery('#enter_amount_div').css('display', 'none');
                    jQuery('#dis_text').val(0);
                    jQuery('#final_sub').val(0);
                    jQuery('#dis_price').val(0);
                    var tt = jQuery('#course_price2').val();
                    jQuery('#final_sub').val(tt);
                    $("select#dis_percentage").val("0");
                    jQuery('#dis_div1').css('display', 'block');
                    jQuery('#dis_div2').css('display', 'block');









                } else if (tr === '2') {
                    jQuery('#enter_amount_div').css('display', 'block');
                    jQuery('#percentage_div').css('display', 'none');

                    jQuery('#dis_text').val(0);
                    jQuery('#final_sub').val(0);
                    jQuery('#dis_price').val(0);
                    var tt = jQuery('#course_price2').val();
                    jQuery('#final_sub').val(tt);
                    $("select#dis_percentage").val("0");
                    jQuery('#dis_div1').css('display', 'none');
                    jQuery('#dis_div2').css('display', 'block');



                }
            }

            function discount_2() {
                var dd = jQuery('#dis_percentage').val();
                jQuery('#dis_text').val(dd);
                var tt = jQuery('#course_price2').val();
                //alert(tt);
                //alert(dd);
                var sum = parseFloat(tt) * parseFloat(dd) / 100;
                //alert(sum);
                jQuery('#dis_price').val(sum);
                var sub = parseFloat(tt) - parseFloat(sum);
                jQuery('#final_sub').val(sub);


            }
            jQuery('#txt_enter_dis').on('keyup', function () {
                var dd = jQuery('#txt_enter_dis').val();
                jQuery('#dis_text').val(dd);
                jQuery('#dis_price').val(dd);
            });



            function calculate_dis() {
                var dd = jQuery('#txt_enter_dis').val();

                var tt = jQuery('#course_price2').val();
                var sub = parseFloat(tt) - parseFloat(dd);
//                alert(tt);
//                alert(dd);

                //alert(sum);

                //var sub = parseFloat(tt) - parseFloat(dd);
                jQuery('#final_sub').val(sub);



            }



//            jQuery('#tot_1').on('change', function () {
//                alert('oo');
////                var dd = jQuery('#txt_enter_dis').val();
////                jQuery('#dis_text').val(dd);
//            });



            function discount_div_preview() {
                jQuery('#course_div').css('display', 'none');
                jQuery('#discount_div').css('display', 'block');
                jQuery('#dis_btn').css('display', 'none');
                jQuery('#manual_1').css('display', 'none');
                var tt = jQuery('#course_price2').val();
                jQuery('#final_sub').val(tt);
                change_val_dis = 'yes';
                

            }



            function selectCourse() {

                var sid = $('#course_select').val();
                //var jk = $('#course_select').text();
                // alert(jk);


                if (sid === 'select') {
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').hide();
                    jQuery('#course_price2').val(0);
                } else



                if (sid === '1') {

                    // alert(sid);
                    $('#FCADD_AUTOCAD').show();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();


                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(26000);



                    function attachCheckboxHandlers() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers();






                } else if (sid === '2') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').show();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();
                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(28500);

                    function attachCheckboxHandlers3() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings2');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal3;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal3(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal3(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal3(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers3();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '3') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').show();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();
                    $('#tot_div').show();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(33500);

                    function attachCheckboxHandlers4() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings3');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal4;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal4(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal4(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal4(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers4();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '4') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').show();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();
                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(33500);

                    function attachCheckboxHandlers5() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings4');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal5;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal5(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal5(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal5(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers5();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '5') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').show();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(101000);


                    function attachCheckboxHandlers6() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings5');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal6;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal6(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal6(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal6(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers6();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '6') {
                    // alert('kl');
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').show();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(176000);

                    function attachCheckboxHandlers7() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings6');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal7;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal7(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal7(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal7(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers7();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '7') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').show();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(33500);


                    function attachCheckboxHandlers8() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings7');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal8;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal8(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal8(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal8(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers8();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '8') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').show();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(46000);

                    function attachCheckboxHandlers9() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings8');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal9;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal9(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal9(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal9(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers9();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '9') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').show();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(33500);

                    function attachCheckboxHandlers10() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings9');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal10;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal10(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal10(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal10(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers10();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '10') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').show();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(33500);


                    function attachCheckboxHandlers11() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings10');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal11;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal11(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal11(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal11(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers11();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '11') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').show();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(21000);

                    function attachCheckboxHandlers12() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings11');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal12;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal12(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal12(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal12(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers12();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '12') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').show();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(26000);


                    function attachCheckboxHandlers13() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings12');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal13;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal13(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal13(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal13(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers13();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '13') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').show();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(38500);


                    function attachCheckboxHandlers14() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings13');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal14;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal14(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal14(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal14(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers14();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '14') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').show();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(37000);


                    function attachCheckboxHandlers15() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings14');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal15;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal15(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal15(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal15(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers15();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '15') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').show();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(38500);


                    function attachCheckboxHandlers16() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings15');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal16;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal16(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal16(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal16(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers16();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '16') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').show();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(21000);


                    function attachCheckboxHandlers17() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings16');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal17;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal17(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal17(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal17(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers17();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '17') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').show();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(31000);


                    function attachCheckboxHandlers18() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings17');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal18;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal18(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal18(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal18(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers18();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '18') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').show();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(41000);


                    function attachCheckboxHandlers19() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings18');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal19;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal19(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal19(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal19(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers19();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '19') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').show();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(21000);


                    function attachCheckboxHandlers20() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings19');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal20;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal20(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal20(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal20(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers20();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '20') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').show();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(21000);


                    function attachCheckboxHandlers21() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings20');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal21;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal21(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal21(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal21(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers21();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '21') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').show();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(21000);


                    function attachCheckboxHandlers22() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings21');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal22;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal22(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal22(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal22(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers22();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '22') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').show();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();
                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(21000);


                    function attachCheckboxHandlers23() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings22');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal23;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal23(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal23(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal23(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers23();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '23') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').show();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(26000);


                    function attachCheckboxHandlers24() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings23');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal24;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal24(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal24(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal24(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers24();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '24') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').show();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(41000);


                    function attachCheckboxHandlers25() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings24');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal25;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal25(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal25(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal25(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers25();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '25') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').show();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(29000);


                    function attachCheckboxHandlers26() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings25');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal26;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal26(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal26(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal26(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers26();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '26') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').show();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();


                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(41000);


                    function attachCheckboxHandlers27() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings26');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal27;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal27(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal27(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal27(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers27();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '27') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').show();
                    $('#FOUNDATION_PMI').hide();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(31000);


                    function attachCheckboxHandlers28() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings27');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal28;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal28(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal28(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal28(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers28();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                } else if (sid === '28') {
                    // alert(sid);
                    $('#FCADD_AUTOCAD').hide();
                    $('#FCADD_MEP').hide();
                    $('#REVIT').hide();
                    $('#REVIT_MEP').hide();
                    $('#DID').hide();
                    $('#DID_MASTER_DIP').hide();

                    $('#DPPM').hide();
                    $('#PRO_E').hide();
                    $('#PPP_PRIMAVERA').hide();
                    $('#QS').hide();
                    $('#MANUAL_DRAFT').hide();

                    $('#3D_MAX').hide();
                    $('#CIVIL_3D').hide();
                    $('#STAAD_PRO').hide();
                    $('#SOLID_WORK').hide();
                    $('#QTO').hide();


                    $('#Navis_Works').hide();
                    $('#SAP_2000').hide();
                    $('#Corel_Draw').hide();
                    $('#Photoshop').hide();
                    $('#Illustrator').hide();


                    $('#Indesign').hide();
                    $('#MEP_QS').hide();
                    $('#E_TABS').hide();
                    $('#AUTOCAD_ELECTRICAL').hide();
                    $('#PMP').hide();

                    $('#CAPM').hide();
                    $('#FOUNDATION_PMI').show();
                    $('#tot_div').show();

                    var tt = '0';
                    var ttt = parseInt(tt);
                    $("#tot_1").val(ttt);
                    $('input:checkbox').removeAttr('checked');
                    jQuery('#course_price2').val(21000);


                    function attachCheckboxHandlers29() {
                        // get reference to element containing toppings checkboxes
                        var el = document.getElementById('toppings28');

                        // get reference to input elements in toppings container element
                        var tops = el.getElementsByTagName('input');

                        // assign updateTotal function to onclick property of each checkbox
                        for (var i = 0, len = tops.length; i < len; i++) {
                            if (tops[i].type === 'checkbox') {
                                tops[i].onclick = updateTotal29;
                            }
                        }
                    }

                    // called onclick of toppings checkboxes
                    function updateTotal29(e) {
                        // 'this' is reference to checkbox clicked on
                        var form = this.form;

                        // get current value in total text box, using parseFloat since it is a string
                        var val = parseFloat(form.elements['total'].value);

                        // if check box is checked, add its value to val, otherwise subtract it
                        if (this.checked) {
                            val += parseFloat(this.value);
                        } else {
                            val -= parseFloat(this.value);
                        }

                        // format val with correct number of decimal places
                        // and use it to update value of total text box
                        form.elements['total'].value = formatDecimal29(val);
                    }

                    // format val to n number of decimal places
                    // modified version of Danny Goodman's (JS Bible)
                    function formatDecimal29(val, n) {
                        n = n || 2;
                        var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                        while (str.length <= n) {
                            str = "0" + str;
                        }
                        var pt = str.length - n;
                        return str.slice(0, pt) + "." + str.slice(pt);
                    }

                    // in script segment below form
                    attachCheckboxHandlers29();


                    //   var tt = '0';
                    //        var ttt = parseInt(tt);
                    //        jQuery("#tot_1").val(ttt);
                    //         jQuery('input:checkbox').removeAttr('checked');
                    //              

                }


            }





            function attachCheckboxHandlers() {
                // get reference to element containing toppings checkboxes
                var el = document.getElementById('toppings2');

                // get reference to input elements in toppings container element
                var tops = el.getElementsByTagName('input');

                // assign updateTotal function to onclick property of each checkbox
                for (var i = 0, len = tops.length; i < len; i++) {
                    if (tops[i].type === 'checkbox') {
                        tops[i].onclick = updateTotal;
                    }
                }
            }

            // called onclick of toppings checkboxes
            function updateTotal(e) {
                // 'this' is reference to checkbox clicked on
                var form = this.form;

                // get current value in total text box, using parseFloat since it is a string
                var val = parseFloat(form.elements['total'].value);

                // if check box is checked, add its value to val, otherwise subtract it
                if (this.checked) {
                    val += parseFloat(this.value);
                } else {
                    val -= parseFloat(this.value);
                }

                // format val with correct number of decimal places
                // and use it to update value of total text box
                form.elements['total'].value = formatDecimal(val);
            }

            // format val to n number of decimal places
            // modified version of Danny Goodman's (JS Bible)
            function formatDecimal(val, n) {
                n = n || 2;
                var str = "" + Math.round(parseFloat(val) * Math.pow(10, n));
                while (str.length <= n) {
                    str = "0" + str;
                }
                var pt = str.length - n;
                return str.slice(0, pt) + "." + str.slice(pt);
            }

            // in script segment below form
            attachCheckboxHandlers();
            
            
            
            var ss ;
            function check_install(){
                var nn = jQuery("#install_select").val();
                jQuery("#install_hide").val(nn);
              
                
            }


            

            function register() {
                  ss = jQuery("#install_hide").val();
                   

                var amount = '0';
                if (change_val_dis === 'no') {
                    amount = jQuery('#tot_1').val();

                } else if (change_val_dis === 'yes') {
                    amount = jQuery('#tot_1').val();

                }

                var course = jQuery('#course_select').val();
                var branch = jQuery('#branch_select').val();
                var nic = jQuery('#txtnic').val();
                var admission = jQuery('#admission_no').val();
                var registration = jQuery('#regi_no').val();
                var discount = jQuery('#dis_price').val();

                // alert(discount);
                var name = jQuery('#name').val();

                var address = jQuery('#address').val();

                var email = jQuery('#txtEmail').val();
                var contact = jQuery('#contact').val();


                var date_app = jQuery('#txtdateapply').val();

                var pay_purpose = jQuery('#pay_purpose').val();




                var gen = jQuery('#gen').val();
                //var discount = jQuery('#discount').val();

                //alert(admission);


                var regi = '';

                var first = '';
                var second = '';
                var third = '';





                if (jQuery("#check_1").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_5").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_9").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_13").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_17").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_21").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_25").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_29").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_33").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_37").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_17").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_41").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_45").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_49").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_53").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_57").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_61").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_65").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_69").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_73").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_77").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_81").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_85").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_89").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_93").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_97").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_101").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_105").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_109").prop('checked')) {
                    regi = '1000';




                } else {
                    regi = '0';
                }




                if (jQuery("#check_2").prop('checked')) {
                    first = '10000';
                } else if (jQuery("#check_6").prop('checked')) {
                    first = '11500';
                } else if (jQuery("#check_10").prop('checked')) {
                    first = '20000';
                } else if (jQuery("#check_14").prop('checked')) {
                    first = '20000';
                } else if (jQuery("#check_18").prop('checked')) {
                    first = '40000';
                } else if (jQuery("#check_22").prop('checked')) {
                    first = '70000';
                } else if (jQuery("#check_26").prop('checked')) {
                    first = '13500';
                } else if (jQuery("#check_30").prop('checked')) {
                    first = '18000';
                } else if (jQuery("#check_34").prop('checked')) {
                    first = '20000';
                } else if (jQuery("#check_38").prop('checked')) {
                    first = '13500';
                } else if (jQuery("#check_42").prop('checked')) {
                    first = '12000';
                } else if (jQuery("#check_46").prop('checked')) {
                    first = '10000';
                } else if (jQuery("#check_50").prop('checked')) {
                    first = '15500';
                } else if (jQuery("#check_54").prop('checked')) {
                    first = '14000';
                } else if (jQuery("#check_58").prop('checked')) {
                    first = '15500';
                } else if (jQuery("#check_62").prop('checked')) {
                    first = '12000';
                } else if (jQuery("#check_66").prop('checked')) {
                    first = '18000';
                } else if (jQuery("#check_70").prop('checked')) {
                    first = '24000';
                } else if (jQuery("#check_74").prop('checked')) {
                    first = '12000';
                } else if (jQuery("#check_78").prop('checked')) {
                    first = '12000';
                } else if (jQuery("#check_82").prop('checked')) {
                    first = '12000';
                } else if (jQuery("#check_86").prop('checked')) {
                    first = '12000';
                } else if (jQuery("#check_90").prop('checked')) {
                    first = '10000';
                } else if (jQuery("#check_94").prop('checked')) {
                    first = '24000';
                } else if (jQuery("#check_98").prop('checked')) {
                    first = '16000';
                } else if (jQuery("#check_102").prop('checked')) {
                    first = '40000';
                } else if (jQuery("#check_106").prop('checked')) {
                    first = '30000';
                } else if (jQuery("#check_110").prop('checked')) {
                    first = '20000';



                } else {
                    first = '0';
                }






                if (jQuery("#check_3").prop('checked')) {
                    second = '7500';
                } else if (jQuery("#check_7").prop('checked')) {
                    second = '8000';
                } else if (jQuery("#check_11").prop('checked')) {
                    second = '12500';
                } else if (jQuery("#check_15").prop('checked')) {
                    second = '12500';
                } else if (jQuery("#check_19").prop('checked')) {
                    second = '30000';
                } else if (jQuery("#check_23").prop('checked')) {
                    second = '52500';
                } else if (jQuery("#check_27").prop('checked')) {
                    second = '9500';
                } else if (jQuery("#check_31").prop('checked')) {
                    second = '13500';
                } else if (jQuery("#check_35").prop('checked')) {
                    second = '12500';
                } else if (jQuery("#check_39").prop('checked')) {
                    second = '9500';
                } else if (jQuery("#check_43").prop('checked')) {
                    second = '8000';
                } else if (jQuery("#check_47").prop('checked')) {
                    second = '7500';
                } else if (jQuery("#check_51").prop('checked')) {
                    second = '11000';
                } else if (jQuery("#check_55").prop('checked')) {
                    second = '11000';
                } else if (jQuery("#check_59").prop('checked')) {
                    second = '11000';
                } else if (jQuery("#check_63").prop('checked')) {
                    second = '8000';
                } else if (jQuery("#check_67").prop('checked')) {
                    second = '12000';
                } else if (jQuery("#check_71").prop('checked')) {
                    second = '16000';
                } else if (jQuery("#check_75").prop('checked')) {
                    second = '8000';
                } else if (jQuery("#check_79").prop('checked')) {
                    second = '8000';
                } else if (jQuery("#check_83").prop('checked')) {
                    second = '8000';
                } else if (jQuery("#check_87").prop('checked')) {
                    second = '8000';
                } else if (jQuery("#check_91").prop('checked')) {
                    second = '7500';
                } else if (jQuery("#check_95").prop('checked')) {
                    second = '16000';
                } else if (jQuery("#check_99").prop('checked')) {
                    second = '12000';
                } else if (jQuery("#check_103").prop('checked')) {
                    second = '0';
                } else if (jQuery("#check_107").prop('checked')) {
                    second = '0';
                } else if (jQuery("#check_111").prop('checked')) {
                    second = '0';

                } else {
                    second = '0';
                }





                if (jQuery("#check_4").prop('checked')) {
                    third = '7500';
                } else if (jQuery("#check_8").prop('checked')) {
                    third = '8000';
                } else if (jQuery("#check_12").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_16").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_20").prop('checked')) {
                    third = '30000';
                } else if (jQuery("#check_24").prop('checked')) {
                    third = '52500';
                } else if (jQuery("#check_28").prop('checked')) {
                    third = '9500';
                } else if (jQuery("#check_32").prop('checked')) {
                    third = '13500';
                } else if (jQuery("#check_36").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_40").prop('checked')) {
                    third = '9500';
                } else if (jQuery("#check_44").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_48").prop('checked')) {
                    third = '7500';
                } else if (jQuery("#check_52").prop('checked')) {
                    third = '11000';
                } else if (jQuery("#check_56").prop('checked')) {
                    third = '11000';
                } else if (jQuery("#check_60").prop('checked')) {
                    third = '11000';
                } else if (jQuery("#check_64").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_68").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_72").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_76").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_80").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_84").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_88").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_92").prop('checked')) {
                    third = '7500';
                } else if (jQuery("#check_96").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_100").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_104").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_108").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_112").prop('checked')) {
                    third = '0';

                } else {
                    third = '0';
                }



                if(ss === '1'){
                   first = jQuery("#tot_2").val();
                }else if(ss === '2'){
                    second = jQuery("#tot_2").val();
                }else if(ss === '3'){
                    third = jQuery("#tot_2").val();
                }









//
//            if (jQuery("#check_2").prop('checked')) {
//                app_proess = '5000';
//            } else {
//                app_proess = '1200';
//            }
//
//
//
//            if (jQuery("#check_3").prop('checked')) {
//                module = '30000';
//            } else {
//                module = '0';
//            }
//
//
//
//            if (jQuery("#check_4").prop('checked')) {
//                uni_regi = '30000';
//            } else {
//                uni_regi = '0';
//            }
//
//
//
//            if (jQuery("#check_5").prop('checked')) {
//                uni_fee = '75000';
//            } else {
//                uni_fee = '0';
//            }
//
//
//
//            if (jQuery("#check_6").prop('checked')) {
//                first = '45000';
//            } else {
//                first = '0';
//            }
//
//
//
//            if (jQuery("#check_7").prop('checked')) {
//                second = '45000';
//            } else {
//                second = '0';
//            }



//            if (jQuery("#check_8").prop('checked')) {
//                third = '45000';
//            } else {
//                third = '120';
////            }
//           if  {
//                app = '1000';
//            } else {
//                app= '130';
//            }
////             if (jQuery("#check_10").prop('checked')) {
////                app = '5000';
////            } else {
////                app= '0';
////            }
//            
//             
//                app = '1000';
//            } else {
//                app= '120';
//            }
//            
   



                // Validation begin
//                alert(regi);
//                alert(first);
//                alert(second);
//                alert(third);

                var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                // var valid_nic = /^[0-9]{9}[vVxX]$/;
                //var valid_nic2 = /^[0-9]{12}$/;
                //  alert(branch);
                
                var vvb = jQuery("#tot_2").val();
                
                
                if (branch === '0') {
                    swal("Select a Branch..!! ");
                } else if (nic === '') {
                    swal('NIC No Required..!! ');
                } else if (admission === '') {
                    swal("Admission No Required..!! ");



                } else if (registration === '') {
                    swal('Registration No Required..!! ');
                } else if (name === '') {
                    swal('Name Required..!! ');


                } else if (gen === '') {
                    swal('Gender Required..!! ');

                } else if (email === '') {
                    swal('Email Address Required..!! ');
                } else if (!filter.test(email)) {
                    swal('Valid Email Address Required..!! ');

                } else if (address === '') {
                    swal('Address Required..!! ');
                } else if (contact === '') {
                    swal('Contact No Required..!! ');

                } else if (course === 'select') {
                    swal('Please Select a Course..!! ');
                } else if (amount === '0') {
                    swal('Select a Registration Fee..!! ');
                }else  if (vvb !== '' && ss === '0') {
                    swal('Select a Payment Method ');
                    
                } else {
                    //alert(name+gen+address+email+nic+date_app+contact+branch+amount+regi+first+second+third+gen+registration+admission);
                    jQuery.post('./backend/register_student.php', {branch: branch,
                        nic: nic, admission: admission, registration: registration, name: name, address: address, email: email,
                        contact: contact, date_app: date_app, gen: gen
                        , amount: amount, regi: regi,
                        first: first, second: second, third: third, course: course, discount: discount

                    },
////                    position: position, from_em: from_em,
////                    to_em: to_em, cmpny_name_em: cmpny_name_em, o_l_A: o_l_A, o_l_B: o_l_B, o_l_C: o_l_C, o_l_S: o_l_S, year_o_l: year_o_l,
////                    a_l_A: a_l_A, a_l_B: a_l_B, a_l_C: a_l_C, a_l_S: a_l_S, year_a_l: year_a_l, stream: stream, pending_1: pending_1,
////                    pending_2: pending_2, pending_3: pending_3, nameInsti_quli: nameInsti_quli, Qulifi: Qulifi,
////                    from_quli: from_quli, to_quli: to_quli, grade_quli: grade_quli},
//                        function (data, status) {
//
                            function (data, status) {
                                if (status === 'success') {
//                        // alert(data);
//                        // var row = JSON.parse(data);
//
//
                                    if (data === 'ok') {
                                        swal('Successfully Saved..!', "", "success");
                                        location.href = 'register_students.php';
                                    } else if (data === 'A record already exists') {
                                        swal('Already Registered for this Course', "", "error");
                                        location.href = 'register_students.php';
                                    }
                                }

                            }

                    );
                }
            }




            function register_old() {
                 ss = jQuery("#install_hide").val();

                var amount = '0';
                if (change_val_dis === 'no') {
                    amount = jQuery('#tot_1').val();

                } else if (change_val_dis === 'yes') {
                    amount = jQuery('#tot_1').val();

                }

                var course = jQuery('#course_select').val();
                var branch = jQuery('#branch_select2').val();
                var nic = jQuery('#txtnic2').val();
                var admission = jQuery('#admission_no2').val();
                var registration = jQuery('#regi_no2').val();
                var discount = jQuery('#dis_price').val();

                // alert(discount);
                var name = jQuery('#name2').val();

                var address = jQuery('#address2').val();

                var email = jQuery('#txtEmail2').val();
                var contact = jQuery('#contact2').val();


                var date_app = jQuery('#txtdateapply2').val();

                var pay_purpose = jQuery('#pay_purpose').val();




                var gen = jQuery('#gen2').val();
                //var discount = jQuery('#discount').val();

                //alert(admission);


                var regi = '';

                var first = '';
                var second = '';
                var third = '';





                if (jQuery("#check_1").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_5").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_9").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_13").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_17").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_21").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_25").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_29").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_33").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_37").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_17").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_41").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_45").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_49").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_53").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_57").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_61").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_65").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_69").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_73").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_77").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_81").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_85").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_89").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_93").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_97").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_101").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_105").prop('checked')) {
                    regi = '1000';
                } else if (jQuery("#check_109").prop('checked')) {
                    regi = '1000';




                } else {
                    regi = '0';
                }




                if (jQuery("#check_2").prop('checked')) {
                    first = '10000';
                } else if (jQuery("#check_6").prop('checked')) {
                    first = '11500';
                } else if (jQuery("#check_10").prop('checked')) {
                    first = '20000';
                } else if (jQuery("#check_14").prop('checked')) {
                    first = '20000';
                } else if (jQuery("#check_18").prop('checked')) {
                    first = '40000';
                } else if (jQuery("#check_22").prop('checked')) {
                    first = '70000';
                } else if (jQuery("#check_26").prop('checked')) {
                    first = '13500';
                } else if (jQuery("#check_30").prop('checked')) {
                    first = '18000';
                } else if (jQuery("#check_34").prop('checked')) {
                    first = '20000';
                } else if (jQuery("#check_38").prop('checked')) {
                    first = '13500';
                } else if (jQuery("#check_42").prop('checked')) {
                    first = '12000';
                } else if (jQuery("#check_46").prop('checked')) {
                    first = '10000';
                } else if (jQuery("#check_50").prop('checked')) {
                    first = '15500';
                } else if (jQuery("#check_54").prop('checked')) {
                    first = '14000';
                } else if (jQuery("#check_58").prop('checked')) {
                    first = '15500';
                } else if (jQuery("#check_62").prop('checked')) {
                    first = '12000';
                } else if (jQuery("#check_66").prop('checked')) {
                    first = '18000';
                } else if (jQuery("#check_70").prop('checked')) {
                    first = '24000';
                } else if (jQuery("#check_74").prop('checked')) {
                    first = '12000';
                } else if (jQuery("#check_78").prop('checked')) {
                    first = '12000';
                } else if (jQuery("#check_82").prop('checked')) {
                    first = '12000';
                } else if (jQuery("#check_86").prop('checked')) {
                    first = '12000';
                } else if (jQuery("#check_90").prop('checked')) {
                    first = '10000';
                } else if (jQuery("#check_94").prop('checked')) {
                    first = '24000';
                } else if (jQuery("#check_98").prop('checked')) {
                    first = '16000';
                } else if (jQuery("#check_102").prop('checked')) {
                    first = '40000';
                } else if (jQuery("#check_106").prop('checked')) {
                    first = '30000';
                } else if (jQuery("#check_110").prop('checked')) {
                    first = '20000';



                } else {
                    first = '0';
                }


                      



                if (jQuery("#check_3").prop('checked')) {
                    second = '7500';
                } else if (jQuery("#check_7").prop('checked')) {
                    second = '8000';
                } else if (jQuery("#check_11").prop('checked')) {
                    second = '12500';
                } else if (jQuery("#check_15").prop('checked')) {
                    second = '12500';
                } else if (jQuery("#check_19").prop('checked')) {
                    second = '30000';
                } else if (jQuery("#check_23").prop('checked')) {
                    second = '52500';
                } else if (jQuery("#check_27").prop('checked')) {
                    second = '9500';
                } else if (jQuery("#check_31").prop('checked')) {
                    second = '13500';
                } else if (jQuery("#check_35").prop('checked')) {
                    second = '12500';
                } else if (jQuery("#check_39").prop('checked')) {
                    second = '9500';
                } else if (jQuery("#check_43").prop('checked')) {
                    second = '8000';
                } else if (jQuery("#check_47").prop('checked')) {
                    second = '7500';
                } else if (jQuery("#check_51").prop('checked')) {
                    second = '11000';
                } else if (jQuery("#check_55").prop('checked')) {
                    second = '11000';
                } else if (jQuery("#check_59").prop('checked')) {
                    second = '11000';
                } else if (jQuery("#check_63").prop('checked')) {
                    second = '8000';
                } else if (jQuery("#check_67").prop('checked')) {
                    second = '12000';
                } else if (jQuery("#check_71").prop('checked')) {
                    second = '16000';
                } else if (jQuery("#check_75").prop('checked')) {
                    second = '8000';
                } else if (jQuery("#check_79").prop('checked')) {
                    second = '8000';
                } else if (jQuery("#check_83").prop('checked')) {
                    second = '8000';
                } else if (jQuery("#check_87").prop('checked')) {
                    second = '8000';
                } else if (jQuery("#check_91").prop('checked')) {
                    second = '7500';
                } else if (jQuery("#check_95").prop('checked')) {
                    second = '16000';
                } else if (jQuery("#check_99").prop('checked')) {
                    second = '12000';
                } else if (jQuery("#check_103").prop('checked')) {
                    second = '0';
                } else if (jQuery("#check_107").prop('checked')) {
                    second = '0';
                } else if (jQuery("#check_111").prop('checked')) {
                    second = '0';

                } else {
                    second = '0';
                }





                if (jQuery("#check_4").prop('checked')) {
                    third = '7500';
                } else if (jQuery("#check_8").prop('checked')) {
                    third = '8000';
                } else if (jQuery("#check_12").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_16").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_20").prop('checked')) {
                    third = '30000';
                } else if (jQuery("#check_24").prop('checked')) {
                    third = '52500';
                } else if (jQuery("#check_28").prop('checked')) {
                    third = '9500';
                } else if (jQuery("#check_32").prop('checked')) {
                    third = '13500';
                } else if (jQuery("#check_36").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_40").prop('checked')) {
                    third = '9500';
                } else if (jQuery("#check_44").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_48").prop('checked')) {
                    third = '7500';
                } else if (jQuery("#check_52").prop('checked')) {
                    third = '11000';
                } else if (jQuery("#check_56").prop('checked')) {
                    third = '11000';
                } else if (jQuery("#check_60").prop('checked')) {
                    third = '11000';
                } else if (jQuery("#check_64").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_68").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_72").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_76").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_80").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_84").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_88").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_92").prop('checked')) {
                    third = '7500';
                } else if (jQuery("#check_96").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_100").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_104").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_108").prop('checked')) {
                    third = '0';
                } else if (jQuery("#check_112").prop('checked')) {
                    third = '0';

                } else {
                    third = '0';
                }
                
                
                
              

                    if(ss === '1'){
                   first = jQuery("#tot_2").val();
                }else if(ss === '2'){
                    second = jQuery("#tot_2").val();
                }else if(ss === '3'){
                    third = jQuery("#tot_2").val();
                }









//
//            if (jQuery("#check_2").prop('checked')) {
//                app_proess = '5000';
//            } else {
//                app_proess = '1200';
//            }
//
//
//
//            if (jQuery("#check_3").prop('checked')) {
//                module = '30000';
//            } else {
//                module = '0';
//            }
//
//
//
//            if (jQuery("#check_4").prop('checked')) {
//                uni_regi = '30000';
//            } else {
//                uni_regi = '0';
//            }
//
//
//
//            if (jQuery("#check_5").prop('checked')) {
//                uni_fee = '75000';
//            } else {
//                uni_fee = '0';
//            }
//
//
//
//            if (jQuery("#check_6").prop('checked')) {
//                first = '45000';
//            } else {
//                first = '0';
//            }
//
//
//
//            if (jQuery("#check_7").prop('checked')) {
//                second = '45000';
//            } else {
//                second = '0';
//            }



//            if (jQuery("#check_8").prop('checked')) {
//                third = '45000';
//            } else {
//                third = '120';
////            }
//           if  {
//                app = '1000';
//            } else {
//                app= '130';
//            }
////             if (jQuery("#check_10").prop('checked')) {
////                app = '5000';
////            } else {
////                app= '0';
////            }
//            
//             
//                app = '1000';
//            } else {
//                app= '120';
//            }
//            




                // Validation begin
//                alert(regi);
//                alert(first);
//                alert(second);
//                alert(third);

                var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                // var valid_nic = /^[0-9]{9}[vVxX]$/;
                //var valid_nic2 = /^[0-9]{12}$/;
                
                 var vvb = jQuery("#tot_2").val();
                if (nic === '') {
                    swal('NIC No Required..!! ');
                } else if (admission === '') {
                    swal("Admission No Required..!! ");



                } else if (registration === '') {
                    swal('Registration No Required..!! ');
                } else if (name === '') {
                    swal('Name Required..!! ');


                } else if (gen === '') {
                    swal('Gender Required..!! ');

                } else if (email === '') {
                    swal('Email Address Required..!! ');
                } else if (!filter.test(email)) {
                    swal('Valid Email Address Required..!! ');

                } else if (address === '') {
                    swal('Address Required..!! ');
                } else if (contact === '') {
                    swal('Contact No Required..!! ');

                } else if (course === 'select') {
                    swal('Please Select a Course..!! ');
                } else if (amount === '0') {
                    swal('Select a Registration Fee..!! ');
                    }else  if (vvb !== '' && ss === '0') {
                    swal('Select a Payment Method ');
                    

                } else {
                    //alert(name+gen+address+email+nic+date_app+contact+branch+amount+regi+first+second+third+gen+registration+admission);
                    jQuery.post('./backend/register_student.php', {branch: branch,
                        nic: nic, admission: admission, registration: registration, name: name, address: address, email: email,
                        contact: contact, date_app: date_app, gen: gen
                        , amount: amount, regi: regi,
                        first: first, second: second, third: third, course: course, discount: discount

                    },
////                    position: position, from_em: from_em,
////                    to_em: to_em, cmpny_name_em: cmpny_name_em, o_l_A: o_l_A, o_l_B: o_l_B, o_l_C: o_l_C, o_l_S: o_l_S, year_o_l: year_o_l,
////                    a_l_A: a_l_A, a_l_B: a_l_B, a_l_C: a_l_C, a_l_S: a_l_S, year_a_l: year_a_l, stream: stream, pending_1: pending_1,
////                    pending_2: pending_2, pending_3: pending_3, nameInsti_quli: nameInsti_quli, Qulifi: Qulifi,
////                    from_quli: from_quli, to_quli: to_quli, grade_quli: grade_quli},
//                        function (data, status) {
//
                            function (data, status) {
                                if (status === 'success') {
//                        // alert(data);
//                        // var row = JSON.parse(data);
//
//
                                    if (data === 'ok') {
                                        swal('Successfully Saved..!', "", "success");
                                        location.href = 'register_students.php';
                                    } else if (data === 'A record already exists') {
                                        swal('Already Registered for this Course', "", "error");
                                        location.href = 'register_students.php';
                                    }
                                }

                            }

                    );
                }
            }

            function logout() {
                window.location.href = './backend/logout.php';
            }



            //           
        </script>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script src="assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script src="assets/pages/jquery.sweet-alert.init.js"></script>






    </body>
</html>