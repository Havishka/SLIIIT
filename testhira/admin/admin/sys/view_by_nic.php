<?php session_start(); ?>
<?php
if (!isset($_SESSION['idlogin'])) {
    header('Location: login.php');
}
$branch = $_SESSION['branch_idbranch'];
$user_role = $_SESSION['user_role_iduser_role'];
?>


<!DOCTYPE html>

<?php
include_once 'DB_3.php';
$conn = DB_3::create_conn();
//$branch_id = $_SESSION['branh_idbranh'];
//$user_role = $_SESSION['user_role_iduser_role'];
//$nic = htmlspecialchars($_GET["nic"]);
//if ($user_role == 2) {
//    $query = "SELECT * FROM student s WHERE nic='$nic'";
//    $result = $conn->query($query);
//
//}else if($user_role == 1){;
$nic = htmlspecialchars($_GET["nic"]);

if($user_role == '2'){
    $query = "SELECT * FROM student s WHERE nic='$nic'";
}else if($user_role == '1'){


$query = "SELECT * FROM student s WHERE nic='$nic' && branch_idbranch='$branch'";
}

$result = $conn->query($query);
//}

if ($result->num_rows == 0) {
    ?>
    <center><h2 style="color: #cc0000;margin-top: 20%">No Result to Preview</h2></center>
    <center> <a href="update_student_main.php"><button>Back to Search</button></a></center>
    <?php
    exit;
} else {
    $sql = "Select "
            . "b.name AS bname,s.`name`,s.idstudent,s.regi_no,s.admission_no,s.address,s.email,"
            . "s.gender,s.contact,s.regi_date,s.branch_idbranch from student s"
            . " inner join branch b on s.branch_idbranch = b.idbranch where s.nic = '$nic'";
    $rs2 = $conn->query($sql);

    while ($row1 = mysqli_fetch_array($rs2)) {
        $idstudent = $row1['idstudent'] == null ? '' : $row1['idstudent'];

        $regi_no = $row1['regi_no'] == null ? '' : $row1['regi_no'];
        $admission_no = $row1['admission_no'] == null ? '' : $row1['admission_no'];
        $name = $row1['name'] == null ? '' : $row1['name'];
        $address = $row1['address'] == null ? '' : $row1['address'];

        $email = $row1['email'] == null ? '' : $row1['email'];

        $gender = $row1['gender'] == null ? '' : $row1['gender'];
        $contact = $row1['contact'] == null ? '' : $row1['contact'];
        $regi_date = $row1['regi_date'] == null ? '' : $row1['regi_date'];
        $branch = $row1['bname'] == null ? '' : $row1['bname'];
        $branchid = $row1['branch_idbranch'] == null ? '' : $row1['branch_idbranch'];
    }



    $sql4 = "SELECT c.course_name,c.idcourse from course c "
            . "inner join course_has_student cs on cs.course_idcourse=c.idcourse "
            . "WHERE cs.student_idstudent='$idstudent'";
    $rs5 = $conn->query($sql4);
    while ($row2 = mysqli_fetch_array($rs5)) {
        $course = $row2['course_name'] == null ? '' : $row2['course_name'];
        $idcourse = $row2['idcourse'] == null ? '' : $row2['idcourse'];
    }





//    $sql2 = "SELECT idpayments,sub_amount from payments WHERE student_idstudent='$idstudent'";
//    $rs3 = $conn->query($sql2);
//    while ($row1 = mysqli_fetch_array($rs3)) {
//        $payid = $row1['idpayments'] == null ? '' : $row1['idpayments'];
//        $sub = $row1['sub_amount'] == null ? '' : $row1['sub_amount'];
//    }
//
//    $sql3 = "select `Application_fee_idApplication_fee`,`App_process_idApp_process`,moule_mapping_idmoule_mapping,uni_regi_fee_iduni_regi_fee,"
//            . "uni_fee_iduni_fee,first_istall_idfirst_istall,second_install_idsecond_install,third_install_idthird_install "
//            . "FROM payments where idpayments='$payid'";
//    $rs4 = $conn->query($sql3);
//    while ($row2 = mysqli_fetch_array($rs4)) {
//        $idApp_process = $row2['App_process_idApp_process'] == null ? '' : $row2['App_process_idApp_process'];
//        $idApplication_fee = $row2['Application_fee_idApplication_fee'] == null ? '' : $row2['Application_fee_idApplication_fee'];
//        $idfirst_istall = $row2['first_istall_idfirst_istall'] == null ? '' : $row2['first_istall_idfirst_istall'];
//        $idmoule_mapping = $row2['moule_mapping_idmoule_mapping'] == null ? '' : $row2['moule_mapping_idmoule_mapping'];
//        $idsecond_install = $row2['second_install_idsecond_install'] == null ? '' : $row2['second_install_idsecond_install'];
//        $idthird_install = $row2['third_install_idthird_install'] == null ? '' : $row2['third_install_idthird_install'];
//        $iduni_fee = $row2['uni_fee_iduni_fee'] == null ? '' : $row2['uni_fee_iduni_fee'];
//        $iduni_regi_fee = $row2['uni_regi_fee_iduni_regi_fee'] == null ? '' : $row2['uni_regi_fee_iduni_regi_fee'];
//    }
//    $sql4 = "select `date`,amount FROM app_process WHERE `idApp_process` = '$idApp_process'";
//    $rs4 = $conn->query($sql4);
//    while ($row1 = mysqli_fetch_array($rs4)) {
//        $app_process_date = $row1['date'] == null ? '' : $row1['date'];
//        $app_process_amount = $row1['amount'] == null ? '' : $row1['amount'];
//    }
//
//    $sql5 = "select `date`,amount FROM application_fee where `idApplication_fee`='$idApplication_fee'";
//    $rs5 = $conn->query($sql5);
//    while ($row1 = mysqli_fetch_array($rs5)) {
//        $application_date = $row1['date'] == null ? '' : $row1['date'];
//        $application_amount = $row1['amount'] == null ? '' : $row1['amount'];
//    }
//
//
//    $sql6 = "select `date`,amount FROM first_istall where idfirst_istall='$idfirst_istall'";
//    $rs6 = $conn->query($sql6);
//    while ($row1 = mysqli_fetch_array($rs6)) {
//        $first_date = $row1['date'] == null ? '' : $row1['date'];
//        $first_amount = $row1['amount'] == null ? '' : $row1['amount'];
//    }
//
//    $sql7 = "select `date`,amount FROM moule_mapping where idmoule_mapping='$idmoule_mapping'";
//    $rs7 = $conn->query($sql7);
//    while ($row1 = mysqli_fetch_array($rs7)) {
//        $module_date = $row1['date'] == null ? '' : $row1['date'];
//        $module_amount = $row1['amount'] == null ? '' : $row1['amount'];
//    }
//
//    $sql8 = "select `date`,amount FROM second_install where idsecond_install='$idsecond_install'";
//    $rs8 = $conn->query($sql8);
//    while ($row1 = mysqli_fetch_array($rs8)) {
//        $second_date = $row1['date'] == null ? '' : $row1['date'];
//        $second_amount = $row1['amount'] == null ? '' : $row1['amount'];
//    }
//
//    $sql9 = "select `date`,amount FROM third_install where idthird_install='$idthird_install'";
//    $rs9 = $conn->query($sql9);
//    while ($row1 = mysqli_fetch_array($rs9)) {
//        $third_date = $row1['date'] == null ? '' : $row1['date'];
//        $third_amount = $row1['amount'] == null ? '' : $row1['amount'];
//    }
//
//    $sql10 = "select `date`,amount FROM uni_fee where iduni_fee='$iduni_fee'";
//    $rs10 = $conn->query($sql10);
//    while ($row1 = mysqli_fetch_array($rs10)) {
//        $uni_fee_date = $row1['date'] == null ? '' : $row1['date'];
//        $uni_fee_amount = $row1['amount'] == null ? '' : $row1['amount'];
//    }
//
//    $sql11 = "select `date`,amount FROM uni_regi_fee where iduni_regi_fee='$iduni_regi_fee'";
//    $rs11 = $conn->query($sql11);
//    while ($row1 = mysqli_fetch_array($rs11)) {
//        $uni_regi_date = $row1['date'] == null ? '' : $row1['date'];
//        $uni_regi_amount = $row1['amount'] == null ? '' : $row1['amount'];
//    }
//
//
//    $sql12 = "SELECT `idcourse`,`course_name` FROM `course` WHERE `student_idstudent`='$idstudent'";
//    $rs12 = $conn->query($sql12);
//    while ($row1 = mysqli_fetch_array($rs12)) {
//        $course_name = $row1['course_name'] == null ? '' : $row1['course_name'];
//        $idcourse = $row1['idcourse'] == null ? '' : $row1['idcourse'];
//    }
//
//    $sql13 = "SELECT * FROM `student_has_moule_mapping` WHERE `student_idstudent`='$idstudent'";
//    $rs13 = $conn->query($sql13);
//
//    $sql14 = "SELECT SUM(amont) AS module_sum FROM `student_has_moule_mapping` WHERE `student_idstudent`='$idstudent'";
//    $rs14 = $conn->query($sql14);
//    while ($row1 = mysqli_fetch_array($rs14)) {
//        $module_sum = $row1['module_sum'] == null ? '' : $row1['module_sum'];
//    }
//
//
//    $sql15 = "SELECT amount,`date` FROM student_has_uni_regi_fee where student_idstudent='$idstudent'";
//    $rs15 = $conn->query($sql15);
//
//    $sql16 = "SELECT SUM(amount) AS uni_regi_sum FROM `student_has_uni_regi_fee` WHERE `student_idstudent`='$idstudent'";
//    $rs16 = $conn->query($sql16);
//    while ($row1 = mysqli_fetch_array($rs16)) {
//        $uni_regi_sum = $row1['uni_regi_sum'] == null ? '' : $row1['uni_regi_sum'];
//    }
//
//
//    $sql17 = "SELECT amount,`date` FROM student_has_uni_fee where student_idstudent='$idstudent'";
//    $rs17 = $conn->query($sql17);
//
//    $sql18 = "SELECT SUM(amount) AS uni_sum FROM `student_has_uni_fee` WHERE `student_idstudent`='$idstudent'";
//    $rs18 = $conn->query($sql18);
//    while ($row1 = mysqli_fetch_array($rs18)) {
//        $uni_sum = $row1['uni_sum'] == null ? '' : $row1['uni_sum'];
//    }
//
//
//    $sql19 = "SELECT amount,`date` FROM student_has_first_istall where student_idstudent ='$idstudent'";
//    $rs19 = $conn->query($sql19);
//
//    $sql20 = "SELECT SUM(amount) AS first_sum FROM `student_has_first_istall` WHERE `student_idstudent`='$idstudent'";
//    $rs20 = $conn->query($sql20);
//    while ($row1 = mysqli_fetch_array($rs20)) {
//        $first_sum = $row1['first_sum'] == null ? '' : $row1['first_sum'];
//    }
//    
//    
//    
//    $sql21 = "SELECT amount,`date` FROM student_has_second_install where student_idstudent ='$idstudent'";
//    $rs21 = $conn->query($sql21);
//
//    $sql22 = "SELECT SUM(amount) AS second_sum FROM `student_has_second_install` WHERE `student_idstudent`='$idstudent'";
//    $rs22 = $conn->query($sql22);
//    while ($row1 = mysqli_fetch_array($rs22)) {
//        $second_sum = $row1['second_sum'] == null ? '' : $row1['second_sum'];
//    }
//    
//    
//    
//    $sql23 = "SELECT amount,`date` FROM student_has_third_install where student_idstudent='$idstudent'";
//    $rs23 = $conn->query($sql23);
//
//    $sql24 = "SELECT SUM(amount) AS third_sum FROM `student_has_third_install` WHERE `student_idstudent`='$idstudent'";
//    $rs24 = $conn->query($sql24);
//    while ($row1 = mysqli_fetch_array($rs24)) {
//        $third_sum = $row1['third_sum'] == null ? '' : $row1['third_sum'];
//    }
}
?>

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

        <link href="assets/plugins/footable/css/footable.core.css" rel="stylesheet">
        <link href="assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />


        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>
        <style>
            .active1{
                background-color: green;
                color: #fff;
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
                                <a href="register_students.php" class="waves-effect waves-light"><i class="md md-palette"></i> <span> Registration</span> </a>

                            </li>

                            <li class="has_sub">
                                <a href="update_student_main.php" class="waves-effect waves-light active"><i class="md md-invert-colors-on"></i><span> Update Students</span> </a>

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
                        <!-- Page-Title -->








                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="text-dark header-title m-t-0">Personal Information</h4>

                                    <form action="#" data-parsley-validate novalidate>
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="userName">Branch <span style="color: #F30166">*</span></label><br/>

                                                <select id="branch_select" class="form-control">
                                                    <option value="<?php echo $branchid; ?>"><?php echo $branch; ?></option>
                                                    <option value="1">Colombo</option>
                                                    <option value="2">Anuradhapura</option>
                                                    <option value="3">Badulla</option>
                                                    <option value="4">Kegalle</option>
                                                    <option value="5">Gampaha</option>
                                                    <option value="6">Polonnaruwa</option>
                                                    <option value="7">Kurunagala</option>
                                                    <option value="8">Galle</option>
                                                    <option value="9">Thambuththegama</option>
                                                    <option value="10">Kandy</option>
                                                    <option value="11">Batticaloa</option>
                                                    <option value="12">Akkaraipattu</option>
                                                    <option value="13">Matara</option>
                                                    <option value="14">Vavuniya</option>
                                                </select>



                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div class="col-sm-6" >
                                                <label for="emailAddress">NIC <span style="color: #F30166">*</span></label>
                                                <input type="email" name="email" parsley-trigger="change" value="<?php echo $nic; ?>" class="form-control" id="txtnic">
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="pass1">Admission No <span style="color: #F30166">*</span></label>
                                                <input  type="text" value="<?php echo $admission_no; ?>" required class="form-control" id="admission_no">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="passWord2">Registration No <span style="color: #F30166">*</span></label>
                                                <input type="text" value="<?php echo $regi_no; ?>" class="form-control" id="regi_no">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12" style="margin-top: 2%">
                                                <label for="passWord2">Name <span style="color: #F30166">*</span></label>
                                                <input  type="text" value="<?php echo $name; ?>" class="form-control" id="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="passWord2">Gender <span style="color: #F30166">*</span></label>
                                                <input  type="text" value="<?php echo $gender; ?>" class="form-control" id="gen">





                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div class="col-sm-6" style="margin-top: 2%">

                                                <label for="passWord2">Email <span style="color: #F30166">*</span></label>
                                                <input  type="email" value="<?php echo $email; ?>" class="form-control" id="txtEmail">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12" style="margin-top: 2%">
                                                <label for="passWord2">Address<span style="color: #F30166">*</span></label>
                                                <input  type="text" value="<?php echo $address; ?>" class="form-control" id="address">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" value="<?php echo $idstudent; ?>" id='stu_id'/>

                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="passWord2">Contact No <span style="color: #F30166">*</span></label>
                                                <input type="text" value="<?php echo $contact; ?>" class="form-control" id="contact">

                                            </div>
                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="passWord2">Registered Date <span style="color: #F30166">*</span></label>
                                                <input type="text"  class="form-control" id="txtdateapply" disabled value="<?php echo $regi_date; ?>">

                                            </div>

                                        </div>

                                    </form>

                                    <div class="form-group text-right m-b-0" style="margin-top: 2%;">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit" style="margin-top: 2%" onclick="register()">
                                            Update
                                        </button>
                                        <button type="reset" class="btn btn-default waves-effect waves-light m-l-5" style="margin-top: 2%">
                                            Cancel
                                        </button>
                                    </div>




                                    <!-- end row -->

                                </div>

                            </div>



                        </div>
                        <!-- end row -->




                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="text-dark header-title m-t-0">Payment Information</h4>

                                    <form action="" data-parsley-validate novalidate>
                                        <div class="form-group">
                                            <div class="col-sm-12">


                                                <table class="table table table-hover m-0" >
                                                    <thead>
                                                        <tr>
                                                            <th>Course Name </th>
                                                            <th><table border="0" >
                                                                    <tr><td colspan="8" style="text-align: center">Payments</td></tr>
                                                                    <tr><td width='80' style="font-size: 13px;font-weight: normal">&nbsp;Admission&nbsp;</td>

                                                                        <td width='80' style="font-size: 13px;font-weight: normal">&nbsp;1st Ins.&nbsp;</td>
                                                                        <td width='80' style="font-size: 13px;font-weight: normal">&nbsp;2nd Ins.&nbsp;</td>
                                                                        <td width='80' style="font-size: 13px;font-weight: normal">&nbsp;3rd Ins.&nbsp;</td>
                                                                    </tr>


                                                                </table></th>
                                                            <th>Paid amount</th>
                                                            <th>Arrears</th>
                                                            <th>Total Amount</th>
                                                            <th>Discount</th>
                                                            <th>Course Fee</th>
                                                            <th>Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl">
                                                        <?php
                                                        $sql2 = "select p.idpayments,p.discount,c.course_name,p.sub_total,"
                                                                . "p.admission_idadmission,p.first_install_idfirst_install,p.second_install_idsecond_install,"
                                                                . "p.third_install_idthird_install,c.price,c.idcourse,s.idstudent from payments p inner join student s on s.idstudent = p.student_idstudent"
                                                                . " inner join course c on c.idcourse=p.course_idcourse where s.nic = '$nic'";
                                                        $rs3 = $conn->query($sql2);
                                                        while ($row1 = mysqli_fetch_array($rs3)) {
                                                            $course_name = $row1['course_name'] == null ? '' : $row1['course_name'];
                                                            $sub = $row1['sub_total'] == null ? '' : $row1['sub_total'];
                                                            $admission = $row1['admission_idadmission'] == null ? '' : $row1['admission_idadmission'];

                                                            $first = $row1['first_install_idfirst_install'] == null ? '' : $row1['first_install_idfirst_install'];
                                                            $second = $row1['second_install_idsecond_install'] == null ? '' : $row1['second_install_idsecond_install'];
                                                            $third = $row1['third_install_idthird_install'] == null ? '' : $row1['third_install_idthird_install'];

                                                            $price_c = $row1['price'] == null ? '' : $row1['price'];
                                                            $idpayment = $row1['idpayments'] == null ? '' : $row1['idpayments'];
                                                            $idcourse = $row1['idcourse'] == null ? '' : $row1['idcourse'];
                                                            $idstudent = $row1['idstudent'] == null ? '' : $row1['idstudent'];
                                                            $discount = $row1['discount'] == null ? '' : $row1['discount'];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $course_name; ?></td>
                                                                <td>
                                                                    <table ><?php
                                                                        $sql25 = "SELECT amount AS sub_admission from admission WHERE idadmission='$admission'";
                                                                        $rs25 = $conn->query($sql25);



                                                                        $sql24 = "SELECT SUM(amount) AS first_sum FROM `student_has_first_install` WHERE first_install_idfirst_install='$first'";
                                                                        $rs24 = $conn->query($sql24);



                                                                        $sql21 = "SELECT SUM(amount) AS second_sum FROM `student_has_second_install` where second_install_idsecond_install='$second'";
                                                                        $rs21 = $conn->query($sql21);

                                                                        $sql22 = "SELECT SUM(amount) AS third_sum FROM `student_has_third_install` where third_install_idthird_install='$third'";
                                                                        $rs22 = $conn->query($sql22);










                                                                        while ($row5 = mysqli_fetch_array($rs21)) {

                                                                            while ($row6 = mysqli_fetch_array($rs22)) {


                                                                                while ($row8 = mysqli_fetch_array($rs24)) {
                                                                                    while ($row9 = mysqli_fetch_array($rs25)) {
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td width='80' style="color: #999900">&nbsp;<?php echo $row9['sub_admission']; ?>&nbsp;</td>

                                                                                            <td width='80' style="color: #660000">&nbsp;<?php echo $row8['first_sum']; ?>&nbsp;</td>



                                                                                            <td width='80' style="color: #999900">&nbsp;  <?php echo $row5['second_sum']; ?>&nbsp;</td>
                                                                                            <td width='80' style="color: #660000">&nbsp;  <?php echo $row6['third_sum']; ?>&nbsp;</td>












                                                                                        </tr>  
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </table>







                                                                </td>
                                                                <td style="color: #ff0000"><?php echo $sub; ?></td>
                                                                <td style="color: #33cc00"><?php
                                                                    $new_sb9 = $price_c + 1000;
                                                                    $new_sb7 = $new_sb9 - $discount;
                                                                    $arr = $new_sb7 - $sub;
                                                                    echo $arr;
                                                                    ?></td>
                                                                <td><?php
                                                                    $new_sb3 = $price_c + 1000;
                                                                    $new_sb4 = $new_sb3 - $discount;
                                                                    echo $new_sb4;
                                                                    ?></td>
                                                                <td><?php echo $discount; ?></td>
                                                                <td><?php
                                                                    $new_sb7 = $price_c + 1000;
                                                                    echo $new_sb7;
                                                                    ?></td>
                                                                <?php
                                                                if ($arr === 0) {
                                                                    ?>
                                                                    <td><span class="label label-table label-danger">Completed</span></td>

                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <td><span class="label label-table label-success">Pending</span></td>
                                                                <?php } ?>

                                                                <td ><input id="hiddenId3" type="hidden" value="<?php echo $idstudent; ?>" name="stu"/></td>
                                                                <td ><input id="hiddenId2" type="hidden" value="<?php echo $idcourse; ?>" name="course"/></td>
                                                                <td ><input id="hiddenId" type="hidden" value="<?php echo $idpayment; ?>" name="pay"/></td>
                                                                <td><button type="button" id='bb' class="btn btn-white dropdown-toggle waves-effect bbtn"  aria-expanded="false" data-toggle="modal" data-target="#custom-width-modal" ><i class="fa fa-eye"></i></button></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>

                                                    </tbody>
                                                </table>






                                            </div>
                                        </div>


                                    </form>


                                    <div class="text-right m-b-0" style="margin-top: 5%;" >
                                        <a href="update_student_main.php"> <button type="button" class="btn btn-purple waves-effect waves-light" style="">
                                                <span class="btn-label"><i class="fa fa-arrow-left"></i>
                                                </span>Back</button></a>



                                    </div>





                                    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none; ">
                                        <div class="modal-dialog"> 
                                            <div class="modal-content"> 
                                                <div class="modal-header"> 
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                                    <h4 class="modal-title" id="c_name"></h4> 
                                                </div> 
                                                <div class="modal-body"> 
                                                    <table class="table table-striped m-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Installment Plan</th>
                                                                <th>Date</th>
                                                                <th>Paid Amount</th>

                                                                <th>Arrears</th>
                                                                <th>Fee</th>
                                                                <th>Status</th>
                                                                <th>View</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Admission</td>
                                                                <td><p id='add_date'></p></td>
                                                                <td><p id='add_pay'></p></td>

                                                                <td><p id='arr_add'></p></td>
                                                                <td><p id='add_fee'></p></td>
                                                                <td><span class="label label-table label-danger" id='comple_ad' style="display: none">Completed</span><span class="label label-table label-success" id='pending_ad'  style="display: none">Pending</span></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr style="display: none"><td></td></tr>

                                                            <tr>
                                                                <td>1st Install.</td> 
                                                                <td><p id='first_date'></p></td>

                                                                <td><p id='first_pay'></p></td>

                                                                <td><p id='arr_fr'></p></td>
                                                                <td><p id='first_fee'></p></td>
                                                                <td><span class="label label-table label-danger" id='comple_fr' style="display: none">Completed</span><span class="label label-table label-success" id='pending_fr'  style="display: none">Pending</span></td>
                                                                <td><button type="button"  class="btn btn-white dropdown-toggle waves-effect "  aria-expanded="false"  id='first_plus'><i class="fa fa-plus" style="color: #00cc33"></i></button>
                                                                    <button type="button"  class="btn btn-white dropdown-toggle waves-effect "  aria-expanded="false" style="display: none" id='first_minus'><i class="fa fa-minus" style="color: #ff0000"></i></button></td>
                                                            </tr>
                                                            <tr style="display: none" id="first_hide">
                                                                <td colspan="2">
                                                                    <ul id="u_1" style=""><li></li>


                                                                    </ul></td>


                                                            </tr>
                                                            <tr>
                                                                <td>2nd Install.</td>
                                                                <td><p id='second_date'></p></td>
                                                                <td><p id='second_pay'></p></td>

                                                                <td><p id='arr_se'></p></td>
                                                                <td><p id='second_fee'></p></td>
                                                                <td><span class="label label-table label-danger" id='comple_se' style="display: none">Completed</span><span class="label label-table label-success" id='pending_se'  style="display: none">Pending</span></td>
                                                                <td><button type="button"  class="btn btn-white dropdown-toggle waves-effect "  aria-expanded="false"  id='second_plus'><i class="fa fa-plus" style="color: #00cc33"></i></button>
                                                                    <button type="button"  class="btn btn-white dropdown-toggle waves-effect "  aria-expanded="false" style="display: none" id='second_minus'><i class="fa fa-minus" style="color: #ff0000"></i></button></td>
                                                            </tr>
                                                            <tr style="display: none" id="second_hide">
                                                                <td colspan="2">
                                                                    <ul id="u_2" style=""><li></li>


                                                                    </ul></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3rd Install.</td>
                                                                <td><p id='third_date'></p></td>
                                                                <td><p id='third_pay'></p></td>

                                                                <td><p id='arr_th'></p></td>
                                                                <td><p id='third_fee'></p></td>
                                                                <td><span class="label label-table label-danger" id='comple_th' style="display: none">Completed</span><span class="label label-table label-success" id='pending_th'  style="display: none">Pending</span></td>
                                                                <td><button type="button"  class="btn btn-white dropdown-toggle waves-effect "  aria-expanded="false"  id='third_plus'><i class="fa fa-plus" style="color: #00cc33"></i></button>
                                                                    <button type="button"  class="btn btn-white dropdown-toggle waves-effect "  aria-expanded="false" style="display: none" id='third_minus'><i class="fa fa-minus" style="color: #ff0000"></i></button></td>
                                                            </tr>
                                                            <tr style="display: none" id="third_hide">
                                                                <td colspan="2">
                                                                    <ul id="u_3" style=""><li></li>


                                                                    </ul></td>
                                                            </tr>
                                                            <tr><td><b>Discount</b></td>
                                                                <td></td>
                                                                <td> <p id="dis_2" style="color: #0033cc;font-weight: bold;font-size: 15px;"></p></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr style="background-color: #ccffcc"><td colspan="2"><b>Total</b></td>
                                                                <td><p id="sub" style="color: #cc0000;font-weight: bold;font-size: 15px;"></p></td>
                                                                <td><p id="arr" style="color: #00cc00;font-weight: bold;font-size: 15px;"></p></td>
                                                                <td><p id="fee" style="color: #000099;font-weight: bold;font-size: 15px;"></p></td>
                                                                <td></td> <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p class="m-t-10"><b>Total Course Fee (With Discount)&nbsp;&nbsp; -</b>&nbsp;&nbsp; <span id="tot3" style="color: #ff0000;font-weight: bold;font-size: 16px;"></span></p>




                                                </div> 
                                                <div class="modal-footer"> 
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 

                                                </div> 



                                            </div> 
                                        </div>
                                    </div>





                                    <!-- end row -->

                                </div>

                            </div>



                        </div>

                    </div> <!-- container -->

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
            $(document).ready(function () {
                $('.bbtn').click(function (event) {
                    // alert('kk');
                    var $row = $(this).parents('tr');
                    var payid = $row.find('input[name="pay"]').val();
                    var course = $row.find('input[name="course"]').val();
                    var stu = $row.find('input[name="stu"]').val();
//            alert(payid);
//            alert(course);
//          alert(stu);


                    jQuery.post('backend/course_vice_payments.php', {payid: payid, course: course, stu: stu},
                            function (data, status) {

                                if (status === 'success') {

                                    var rows = JSON.parse(data);

                                    for (var i = 0; i < rows.length; i++) {

                                        var row = rows[i];

                                        //alert(row.name);

                                        jQuery('#add_pay').text(row.admission_amount);
                                        jQuery('#add_date').text(row.admission_date);
                                        jQuery('#add_fee').text(row.ad_price);
                                        jQuery('#first_pay').text(row.first_sum);
                                        jQuery('#first_date').text(row.first_date);
                                        jQuery('#first_fee').text(row.fr_price);
                                        jQuery('#second_pay').text(row.second_sum);
                                        jQuery('#second_date').text(row.second_date);
                                        jQuery('#second_fee').text(row.se_price);

                                        jQuery('#third_pay').text(row.third_sum);
                                        jQuery('#third_date').text(row.third_date);
                                        jQuery('#third_fee').text(row.th_price);
                                        jQuery('#c_name').text(row.course_name);
                                        jQuery('#sub').text(row.sub_total);
                                        jQuery('#dis_2').text(row.discount);

                                        var cprice = row.Cprice;
                                        var sub = row.sub_total;
                                        var incprice = parseFloat(cprice) + 1000;
                                        var tot = parseFloat(incprice) - parseFloat(row.discount);
                                        var arr = parseFloat(tot) - parseFloat(sub);
                                        jQuery("#arr").html(arr);
                                        jQuery("#fee").html(incprice);
                                        jQuery("#tot3").html(tot);

                                        var ad_pay = row.admission_amount;
                                        var add_fee = row.ad_price;
                                        var arr_ad = parseFloat(add_fee) - parseFloat(ad_pay);
                                        jQuery("#arr_add").html(arr_ad);

                                        var fr_pay = row.first_amount;
                                        var fr_fee = row.fr_price;
                                        var arr_fr = parseFloat(fr_fee) - parseFloat(fr_pay);
                                        jQuery("#arr_fr").html(arr_fr);


                                        var se_pay = row.second_amount;
                                        var se_fee = row.se_price;
                                        var arr_se = parseFloat(se_fee) - parseFloat(se_pay);
                                        jQuery("#arr_se").html(arr_se);


                                        var th_pay = row.third_amount;
                                        var th_fee = row.th_price;
                                        var arr_th = parseFloat(th_fee) - parseFloat(th_pay);
                                        jQuery("#arr_th").html(arr_th);




                                        if (arr_ad === 0) {
                                            jQuery('#comple_ad').css('display', 'block');
                                            jQuery('#pending_ad').css('display', 'none');
                                        } else {
                                            jQuery('#pending_ad').css('display', 'block');
                                            jQuery('#comple_ad').css('display', 'none');

                                        }
                                        if (arr_fr === 0) {
                                            jQuery('#comple_fr').css('display', 'block');
                                            jQuery('#pending_fr').css('display', 'none');
                                        } else {
                                            jQuery('#pending_fr').css('display', 'block');
                                            jQuery('#comple_fr').css('display', 'none');

                                        }
                                        if (arr_se === 0) {
                                            jQuery('#comple_se').css('display', 'block');
                                            jQuery('#pending_se').css('display', 'none');
                                        } else {
                                            jQuery('#pending_se').css('display', 'block');
                                            jQuery('#comple_se').css('display', 'none');

                                        }
                                        if (arr_th === 0) {
                                            jQuery('#comple_th').css('display', 'block');
                                            jQuery('#pending_th').css('display', 'none');

                                        } else {
                                            jQuery('#pending_th').css('display', 'block');
                                            jQuery('#comple_th').css('display', 'none');


                                        }





                                        //  alert(arr_ad);

                                    }


                                }

                            });


                    jQuery.post('backend/calculate_first_insat.php', {payid: payid, course: course, stu: stu},
                            function (data, status) {

                                if (status === 'success') {

                                    jQuery('#u_1').empty();
                                    var rows = JSON.parse(data);

                                    for (var i = 0; i < rows.length; i++) {

                                        var row = rows[i];

                                        var li = '<li> Rs.&nbsp' + row.f_amount + '<br/>' + row.f_date + '<br/></li>';

                                        jQuery('#u_1').append(jQuery(li));

                                    }

                                }

                            });

                    jQuery.post('backend/calculate_second_install.php', {payid: payid, course: course, stu: stu},
                            function (data, status) {

                                if (status === 'success') {

                                    jQuery('#u_2').empty();
                                    var rows = JSON.parse(data);

                                    for (var i = 0; i < rows.length; i++) {

                                        var row = rows[i];

                                        var li = '<li> Rs.&nbsp' + row.s_amount + '<br/>' + row.s_date + '<br/></li>';

                                        jQuery('#u_2').append(jQuery(li));

                                    }

                                }

                            });

                    jQuery.post('backend/calculate_third_install.php', {payid: payid, course: course, stu: stu},
                            function (data, status) {

                                if (status === 'success') {

                                    jQuery('#u_3').empty();
                                    var rows = JSON.parse(data);

                                    for (var i = 0; i < rows.length; i++) {

                                        var row = rows[i];

                                        var li = '<li> Rs.&nbsp' + row.t_amount + '<br/>' + row.t_date + '<br/></li>';

                                        jQuery('#u_3').append(jQuery(li));

                                    }

                                }

                            });





                });



                jQuery("#add_plus").click(function () {
//            alert('ee');
                    jQuery('#add_plus').css("display", "none");
                    jQuery('#admis_hide').css("display", "block");
                    jQuery('#add_minus').css("display", "block");




                });
                jQuery("#add_minus").click(function () {
//            alert('ee');
                    jQuery('#admis_hide').css("display", "none");
                    jQuery('#add_plus').css("display", "block");

                    jQuery('#add_minus').css("display", "none");


                });

                jQuery("#first_plus").click(function () {
//            alert('ee');
                    jQuery('#first_plus').css("display", "none");
                    jQuery('#first_minus').css("display", "block");
                    jQuery('#first_hide').css("display", "block");




                });
                jQuery("#first_minus").click(function () {
//            alert('ee');
                    jQuery('#first_minus').css("display", "none");
                    jQuery('#first_plus').css("display", "block");

                    jQuery('#first_hide').css("display", "none");


                });


                jQuery("#second_plus").click(function () {
//            alert('ee');
                    jQuery('#second_plus').css("display", "none");
                    jQuery('#second_minus').css("display", "block");
                    jQuery('#second_hide').css("display", "block");




                });
                jQuery("#second_minus").click(function () {
//            alert('ee');
                    jQuery('#second_minus').css("display", "none");
                    jQuery('#second_plus').css("display", "block");

                    jQuery('#second_hide').css("display", "none");


                });


                jQuery("#third_plus").click(function () {
//            alert('ee');
                    jQuery('#third_plus').css("display", "none");
                    jQuery('#third_minus').css("display", "block");
                    jQuery('#third_hide').css("display", "block");




                });
                jQuery("#third_minus").click(function () {
//            alert('ee');
                    jQuery('#third_minus').css("display", "none");
                    jQuery('#third_plus').css("display", "block");

                    jQuery('#third_hide').css("display", "none");


                });
























            });





            function register() {

                // var course = jQuery('#course_select').val();
                var branch = jQuery('#branch_select').val();
                var nic = jQuery('#txtnic').val();
                var admission = jQuery('#admission_no').val();
                var registration = jQuery('#regi_no').val();

                var name = jQuery('#name').val();

                var address = jQuery('#address').val();

                var email = jQuery('#txtEmail').val();
                var contact = jQuery('#contact').val();


                var date_app = jQuery('#txtdateapply').val();






                var gen = jQuery('#gen').val();
                var stu_id = jQuery('#stu_id').val();

                //alert(admission);













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



                } else {
                    //alert(name+gen+address+email+nic+date_app+contact+branch+amount+regi+first+second+third+gen+registration+admission);
                    jQuery.post('./backend/update_student.php', {branch: branch,
                        nic: nic, admission: admission, registration: registration, name: name, address: address, email: email, contact: contact, date_app: date_app, gen: gen, stu_id: stu_id



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
                                        location.href = 'update_student_main.php';
                                    } else if (data === 'A record already exists') {
                                        swal('Cannot Update', "", "error");
                                        location.href = 'update_student_main.php';
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
        <script src="assets/plugins/footable/js/footable.all.min.js"></script>

        <script src="assets/plugins/footable/js/footable.all.min.js"></script>

        <script src="assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>

        <!--FooTable Example-->
        <script src="assets/pages/jquery.footable.js"></script>




    </body>
</html>