<?php session_start(); ?>
<?php
if (!isset($_SESSION['idlogin'])) {
    header('Location: login.php');
}
$branch = $_SESSION['branch_idbranch'];
$user_role = $_SESSION['user_role_iduser_role'];
include_once 'DB_3.php';
$conn = DB_3::create_conn();

$query = "select `name` from branch where idbranch='$branch'";

$rs2 = $conn->query($query);

while ($row1 = mysqli_fetch_array($rs2)) {
    $b_name = $row1['name'] == null ? '' : $row1['name'];
}




$query2 = "select  COUNT(DISTINCT `nic`) AS NC from student where branch_idbranch = '$branch'";

$rs23 = $conn->query($query2);

while ($row1 = mysqli_fetch_array($rs23)) {
    $count_stu = $row1['NC'] == null ? '' : $row1['NC'];
}


$query25 = "select  COUNT(idbranch) AS BN from branch";

$rs231 = $conn->query($query25);

while ($row1 = mysqli_fetch_array($rs231)) {
    $count_branch = $row1['BN'] == null ? '' : $row1['BN'];
}


$query27 = "select  COUNT(DISTINCT `nic`) AS NC from student";

$rs237 = $conn->query($query27);

while ($row1 = mysqli_fetch_array($rs237)) {
    $count_stu2 = $row1['NC'] == null ? '' : $row1['NC'];
}
?>


<!DOCTYPE html>




<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>CADD CENTRE</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/plugins/morris/morris.css">
        <link href="assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>

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

        <script type="text/javascript">             var tableToExcel = (function () {
                var uri = 'data:application/vnd.ms-excel;base64,'
                        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head>[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]</head><body><table>{table}</table></body></html>'
                        , base64 = function (s) {
                            return window.btoa(unescape(encodeURIComponent(s)))
                        }
                , format = function (s, c) {
                    return s.replace(/{(\w+)}/g, function (m, p) {
                        return c[p];
                    })
                }
                return function (table, name) {
                    if (!table.nodeType)
                        table = document.getElementById(table)
                    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
                    window.location.href = uri + base64(format(template, ctx))
                }
            })()
        </script>

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
                                <a href="dashboard.php" class="waves-effect waves-light active"><i class="md md-home"></i> <span> Home </span> </a>

                            </li>

                            <li class="has_sub">
                                <a href="register_students.php" class="waves-effect waves-light"><i class="md md-palette"></i> <span> Registration</span> </a>

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
                            <?php if ($user_role == '2') {
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
                        <div id="main_div">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php if ($user_role == '1') {
                                        ?>
                                        <h4 class="page-title">Welcome to <?php echo $b_name; ?> branch !</h4>
                                        <?php
                                    } else if ($user_role == '2') {
                                        ?>
                                        <h4 class="page-title">Welcome Super Admin !</h4>
                                    <?php } ?>




                                    <br/><br/>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="widget-panel widget-style-2 bg-white">
                                        <i class="md md-account-child text-info"></i>
                                        <?php
                                        if ($user_role == '2') {
                                            ?>
                                            <h2 class="m-0 text-dark counter font-600"><?php echo $count_stu2; ?></h2>
                                        <?php } else if ($user_role == '1') { ?>
                                            <h2 class="m-0 text-dark counter font-600"><?php echo $count_stu; ?></h2>

                                        <?php } ?> 

                                        <div class="text-muted m-t-5">Students</div>
                                    </div>
                                </div>

                                <?php
                                if ($user_role == '2') {
                                    ?>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="widget-panel widget-style-2 bg-white">
                                            <i class="md  md-business text-pink"></i>
                                            <h2 class="m-0 text-dark counter font-600"><?php echo $count_branch; ?></h2>
                                            <div class="text-muted m-t-5">Branches</div>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="widget-panel widget-style-2 bg-white">
                                        <i class="md  md-assignment text-warning"></i>
                                        <h2 class="m-0 text-dark counter font-600">28</h2>
                                        <div class="text-muted m-t-5">Courses</div>
                                    </div>
                                </div>


                            </div>





                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-box">


                                        <img src="img/cadd-centre-logo.jpg"  style="margin: 2% 2% 2% 20%" width="60%"/>

                                        <!-- end row -->

                                    </div>

                                </div>




                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card-box">
                                        <div class="bar-widget">

                                            <div class="table-detail"  style="display: inline">
                                                <div class="iconbox bg-primary">
                                                    <i class="icon-layers"></i>
                                                </div>
                                            </div>
                                            <div style="display: inline"></div>
                                            <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light" onclick="get_stu_info()">Student Information</button>	





                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card-box">
                                        <div class="bar-widget">

                                            <div class="table-detail"  style="display: inline">
                                                <div class="iconbox bg-success">
                                                    <i class="icon-layers"></i>
                                                </div>
                                            </div>

                                            <div style="display: inline"></div>
                                            <button type="button" class="btn btn-success btn-rounded waves-effect waves-light" onclick="get_payment_info()">Payment Information</button>	



                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card-box">
                                        <div class="bar-widget">

                                            <div class="table-detail"  style="display: inline">

                                                <div class="iconbox bg-purple">

                                                    <i class="icon-layers"></i>

                                                </div>

                                            </div>
                                            <div style="display: inline"></div>

                                            <button type="button" class="btn btn-purple btn-rounded waves-effect waves-light" aria-expanded="false" data-toggle="modal" data-target="#custom-width-modal">Course Information</button>	



                                        </div>
                                    </div>
                                    <input type="hidden" value="<?php echo $branch; ?>" id="branch_id"/>
                                </div>
                            </div>




                        </div> <!-- container -->




                        <div id="stu_table" style="display: none">
                            <?php if ($user_role == '2') { ?>
                                <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Search by Branch</button>    <?php } ?>
                            <a href="dashboard.php" > <button type="button" class="btn btn-success waves-effect waves-light" style="">
                                    <span class="btn-label"><i class="fa fa-arrow-left"></i>
                                    </span>Back</button></a>

                            <div class="card-box m-t-15" >
                                <div id="print1">
                                    <table class="table table-striped table-bordered dataTable no-footer" id="testTable" >

                                        <thead>
                                            <tr>
                                                <th>NIC</th>
                                                <th>Student Name </th>


                                                <th>Registration No.</th>
                                                <th>Admission No</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>Contact No</th>
                                                <th>Registration Date</th>
                                                <th>View</th>

                                            </tr>
                                        </thead>
                                        <tbody id="tb2">

                                        </tbody>
                                    </table> 
                                </div>


                                <div class="text-right m-b-0" style="margin-top: 2%;" >
                                    <button class="btn btn-danger waves-effect waves-light"  style="margin-top: 2%" onclick="printContain1('print1')">
                                        Print
                                    </button>
                                    <button class="btn btn-default waves-effect waves-light m-l-5" style="margin-top: 2%" onclick="tableToExcel('testTable', '')">
                                        Export to Excel
                                    </button>
                                    <a href="dashboard.php">  <button class="btn btn-primary waves-effect waves-light"  style="margin-top: 2%" >
                                            Back
                                        </button></a>


                                </div>

                            </div>
                        </div>


                        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog"> 
                                <div class="modal-content"> 
                                    <div class="modal-header"> 
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                        <h4 class="modal-title">Search by Branch</h4> 
                                    </div> 
                                    <div class="modal-body"> 
                                        <label for="passWord2" >Select a Branch: </label>

                                        <select class="form-control" id="branch_select_combo" onchange="branch_select_method()">
                                            <option value="0">Select One</option>
                                            <?php
                                            $sql4 = "select * from  branch";
                                            $rs4 = $conn->query($sql4);
                                            while ($row1 = mysqli_fetch_array($rs4)) {
                                                ?>
                                                <option value="<?php echo $row1['idbranch']; ?>"><?php echo $row1['name']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" value="" id="branch_select_hide_text"/>

                                    </div> 
                                    <div class="modal-footer"> 

                                        <button type="button" class="btn btn-info waves-effect waves-light" onclick="search_branch_vice()" data-dismiss="modal" id="bnt">Search</button> 

                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 

                                    </div> 
                                </div> 
                            </div>
                        </div>

                        <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none; ">
                            <div class="modal-dialog"> 
                                <div class="modal-content"> 
                                    <div class="modal-header"> 
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                        <h4 class="modal-title">Select a Course</h4> 
                                    </div> 
                                    <div class="modal-body"> 
                                        <select class="form-control" id="course_select2">
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
                                        </select>


                                    </div> 
                                    <div class="modal-footer"> 
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" onclick="course_vice()">Search</button> 

                                    </div> 



                                </div> 
                            </div>
                        </div>

                        <div id="course_table" style="display: none">
                           <?php if ($user_role == '2') { ?>
                               <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#accordion-modal">Search by Branch</button>   <?php } ?>
                            <a href="dashboard.php" > <button type="button" class="btn btn-success waves-effect waves-light" style="">
                                    <span class="btn-label"><i class="fa fa-arrow-left"></i>
                                    </span>Back</button></a>
                            <div class="card-box m-t-15">
                                <div id="print2">
                                    <table class="table table-striped table-bordered dataTable no-footer" id="testTable2" >
                                        <thead>
                                            <tr>


                                                <th>NIC</th>
                                                <th>Student Name </th>
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


                                            </tr>
                                        </thead>
                                        <tbody id="tb3">

                                        </tbody>
                                    </table>
                                </div>

                                <div class="text-right m-b-0" style="margin-top: 2%;" >
                                    <button class="btn btn-danger waves-effect waves-light"  style="margin-top: 2%" onclick="printContain2('print2')">
                                        Print
                                    </button>
                                    <button class="btn btn-default waves-effect waves-light m-l-5" style="margin-top: 2%" onclick="tableToExcel('testTable2', '')">
                                        Export to Excel
                                    </button>
                                    <a href="dashboard.php">  <button class="btn btn-primary waves-effect waves-light"  style="margin-top: 2%" >
                                            Back
                                        </button></a>


                                </div>


                            </div>
                        </div>
                        
                        <div id="accordion-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                         <div class="modal-dialog"> 
                                <div class="modal-content"> 
                                    <div class="modal-header"> 
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                        <h4 class="modal-title">Search by Branch</h4> 
                                    </div> 
                                    <div class="modal-body"> 
                                        <label for="passWord2" >Select a Branch: </label>

                                        <select class="form-control" id="branch_select_combo3" onchange="branch_select_method3()">
                                            <option value="0">Select One</option>
                                            <?php
                                            $sql4 = "select * from  branch";
                                            $rs4 = $conn->query($sql4);
                                            while ($row1 = mysqli_fetch_array($rs4)) {
                                                ?>
                                                <option value="<?php echo $row1['idbranch']; ?>"><?php echo $row1['name']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" value="" id="branch_select_hide_text3"/>

                                    </div> 
                                    <div class="modal-footer"> 

                                        <button type="button" class="btn btn-info waves-effect waves-light" onclick="search_branch_vice_cource()" data-dismiss="modal" id="bnt">Search</button> 

                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 

                                    </div> 
                                </div> 
                            </div>
                                    </div>
                        
                        
                        
                        
                        
                        


                        <div id="payment_table" style="display: none">
                               <?php if ($user_role == '2') { ?>
                                <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#tabs-modal">Search by Branch</button>    <?php } ?>
                            <a href="dashboard.php" > <button type="button" class="btn btn-success waves-effect waves-light" style="">
                                    <span class="btn-label"><i class="fa fa-arrow-left"></i>
                                    </span>Back</button></a>
                            <div class="card-box m-t-15" >
                                <div id="print3">
                                    <table class="table table-striped table-bordered dataTable no-footer" id="testTable3">
                                        <thead>
                                            <tr>
                                                <th >NIC</th>
                                                <th>Admission No</th>
                                                <th>Student Name </th>


                                                <th>Total Payed Amount</th>
                                                <th>Total Arrers</th>
                                                <th>Total Amount<br/>(With Discount)</th>
                                                <th>Total Discount</th>
                                                <th>Total Course Fee<br/>(Without Discount)</th>
    <!--                                            <th>Course info.</th>-->


                                            </tr>
                                        </thead>
                                        <tbody id="tb4">

                                        </tbody>
                                    </table> 
                                </div>


                                <div class="text-right m-b-0" style="margin-top: 2%;" >
                                    <button class="btn btn-danger waves-effect waves-light"  style="margin-top: 2%" onclick="printContain3('print3')">
                                        Print
                                    </button>
                                    <button class="btn btn-default waves-effect waves-light m-l-5" style="margin-top: 2%" onclick="tableToExcel('testTable3', '')">
                                        Export to Excel
                                    </button>
                                    <a href="dashboard.php">  <button class="btn btn-primary waves-effect waves-light"  style="margin-top: 2%" >
                                            Back
                                        </button></a>


                                </div>
                            </div>
                        </div>
                        
                        
                        <div id="tabs-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog"> 
                                <div class="modal-content"> 
                                    <div class="modal-header"> 
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                        <h4 class="modal-title">Search by Branch</h4> 
                                    </div> 
                                    <div class="modal-body"> 
                                        <label for="passWord2" >Select a Branch: </label>

                                        <select class="form-control" id="branch_select_combo2" onchange="branch_select_method2()">
                                            <option value="0">Select One</option>
                                            <?php
                                            $sql4 = "select * from  branch";
                                            $rs4 = $conn->query($sql4);
                                            while ($row1 = mysqli_fetch_array($rs4)) {
                                                ?>
                                                <option value="<?php echo $row1['idbranch']; ?>"><?php echo $row1['name']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" value="" id="branch_select_hide_text2"/>

                                    </div> 
                                    <div class="modal-footer"> 

                                        <button type="button" class="btn btn-info waves-effect waves-light" onclick="search_branch_vice_payment()" data-dismiss="modal" id="bnt">Search</button> 

                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 

                                    </div> 
                                </div> 
                            </div>
                                    </div>




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
                            <a href="#" >
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
                        <li class="list-group-item" >
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








            });
            function branch_select_method2() {
                var n1 = jQuery("#branch_select_combo2").val();
                jQuery("#branch_select_hide_text2").val(n1);
                

            }

            function branch_select_method() {
                var n1 = jQuery("#branch_select_combo").val();
                jQuery("#branch_select_hide_text").val(n1);

            }
            
            
            function branch_select_method3() {
                var n1 = jQuery("#branch_select_combo3").val();
                jQuery("#branch_select_hide_text3").val(n1);

            }
            
            
            function search_branch_vice_cource() {
                //alert("jkj");
                var n2 = jQuery("#branch_select_hide_text3").val();
                var branch_id = jQuery('#branch_id').val();
                 var course_select2 = jQuery('#course_select2').val();
                // alert(course_select2);
                if (n2 === '0') {
                    swal('Select a Branch');
                     jQuery.post('backend/course_report.php', {course_select2: course_select2, branch_id: branch_id},
                            function (data, status) {

                                if (status === 'success') {
                                    jQuery('#tb3').empty();
                                    var rows = JSON.parse(data);
                                    for (var i = 0; i < rows.length; i++) {

                                        var row = rows[i];
                                        var tr = '<tr>' +
                                                '<td>' + row.s_nic + '</td>' +
                                                '<td>' + row.s_name + '</td>' +
                                                '<td><table><tr><td width="90" style="color: #999900">' + row.adm + '</td><td width="90" style="color: #660000">' + row.first + '</td><td width="90" style="color: #999900">' + row.second + '</td><td width="90" style="color: #660000">' + row.third + '</td></tr></table></td>' +
                                                '<td  style="color: #ff3300">' + row.sub + '</td>' +
                                                '<td  style="color: #00cc33">' + row.arr + '</td>' +
                                                '<td>' + row.tot + '</td>' +
                                                '<td>' + row.dis + '</td>' +
                                                '<td>' + row.cu_fee + '</td>' +
//                                            '<td>' + row.regi_date + '</td>' +
//                                            ' <td><a href="view_by_nic.php?nic='+row.nic+'"><button type="button"  class="btn btn-white dropdown-toggle waves-effect bbtn"  aria-expanded="false" ><i class="fa fa-eye"></i></button></a></td>' +
                                                '</tr>';
                                        jQuery('#tb3').append(jQuery(tr));
                                    }


                                }

                            });
                } else {

                    jQuery.post('backend/course_report_branch_vice.php', {course_select2: course_select2, branch_id: n2},
                            function (data, status) {

                                if (status === 'success') {
                                    jQuery('#tb3').empty();
                                    var rows = JSON.parse(data);
                                    for (var i = 0; i < rows.length; i++) {

                                        var row = rows[i];
                                        var tr = '<tr>' +
                                                '<td>' + row.s_nic + '</td>' +
                                                '<td>' + row.s_name + '</td>' +
                                                '<td><table><tr><td width="90" style="color: #999900">' + row.adm + '</td><td width="90" style="color: #660000">' + row.first + '</td><td width="90" style="color: #999900">' + row.second + '</td><td width="90" style="color: #660000">' + row.third + '</td></tr></table></td>' +
                                                '<td  style="color: #ff3300">' + row.sub + '</td>' +
                                                '<td  style="color: #00cc33">' + row.arr + '</td>' +
                                                '<td>' + row.tot + '</td>' +
                                                '<td>' + row.dis + '</td>' +
                                                '<td>' + row.cu_fee + '</td>' +
//                                            '<td>' + row.regi_date + '</td>' +
//                                            ' <td><a href="view_by_nic.php?nic='+row.nic+'"><button type="button"  class="btn btn-white dropdown-toggle waves-effect bbtn"  aria-expanded="false" ><i class="fa fa-eye"></i></button></a></td>' +
                                                '</tr>';
                                                //alert(row.s_nic);
                                        jQuery('#tb3').append(jQuery(tr));
                                    }


                                }

                            });

                }

            }
            
            


            function search_branch_vice() {
                //alert("jkj");
                var n2 = jQuery("#branch_select_hide_text").val();
                var branch_id = jQuery('#branch_id').val();
                if (n2 === '0') {
                    swal('Select a Branch');
                     jQuery.post('backend/view_student.php', {branch_id: branch_id},
                        function (data, status) {

                            if (status === 'success') {

                                jQuery('#tb2').empty();
                                var rows = JSON.parse(data);
                                for (var i = 0; i < rows.length; i++) {







                                    var row = rows[i];
                                    var tr = '<tr>' +
                                            '<td>' + row.nic + '</td>' +
                                            '<td>' + row.name + '</td>' +
                                            '<td>' + row.regi_no + '</td>' +
                                            '<td>' + row.admission_no + '</td>' +
                                            '<td>' + row.gender + '</td>' +
                                            '<td>' + row.address + '</td>' +
                                            '<td>' + row.email + '</td>' +
                                            '<td>' + row.contact + '</td>' +
                                            '<td>' + row.regi_date + '</td>' +
                                            ' <td><a href="view_by_nic.php?nic=' + row.nic + '"><button type="button"  class="btn btn-white dropdown-toggle waves-effect bbtn"  aria-expanded="false" ><i class="fa fa-eye"></i></button></a></td>' +
                                            '</tr>';
                                    jQuery('#tb2').append(jQuery(tr));


                                }


                            }



                        });
                } else {

                    jQuery.post('backend/view_students_by_branch.php', {branch_id: n2},
                            function (data, status) {

                                if (status === 'success') {

                                    jQuery('#tb2').empty();
                                    var rows = JSON.parse(data);
                                    for (var i = 0; i < rows.length; i++) {







                                        var row = rows[i];
                                        var tr = '<tr>' +
                                                '<td>' + row.nic + '</td>' +
                                                '<td>' + row.name + '</td>' +
                                                '<td>' + row.regi_no + '</td>' +
                                                '<td>' + row.admission_no + '</td>' +
                                                '<td>' + row.gender + '</td>' +
                                                '<td>' + row.address + '</td>' +
                                                '<td>' + row.email + '</td>' +
                                                '<td>' + row.contact + '</td>' +
                                                '<td>' + row.regi_date + '</td>' +
                                                ' <td><a href="view_by_nic.php?nic=' + row.nic + '"><button type="button"  class="btn btn-white dropdown-toggle waves-effect bbtn"  aria-expanded="false" ><i class="fa fa-eye"></i></button></a></td>' +
                                                '</tr>';
                                        jQuery('#tb2').append(jQuery(tr));
//                                    jQuery('#stu_table').css('display', 'block');
//                                    jQuery("#con-close-modal").css('display','none');
                                       



                                    }


                                }



                            });

                }

            }
            
            function search_branch_vice_payment() {
                //alert("jkj");
                var n2 = jQuery("#branch_select_hide_text2").val();
                //alert(n2);
                var branch_id = jQuery('#branch_id').val();
                if (n2 === '0') {
                    swal('Select a Branch');
                     jQuery.post('backend/payment_report.php', {branch_id: branch_id},
                        function (data, status) {

                            if (status === 'success') {
                                jQuery('#tb4').empty();
                                var rows = JSON.parse(data);
                                for (var i = 0; i < rows.length; i++) {

                                    var row = rows[i];
                                    var tr = '<tr>' +
                                            '<td>' + row.nic + '</td>' +
                                            '<td>' + row.admission_no + '</td>' +
                                            '<td>' + row.name + '</td>' +
                                            '<td  style="color: #ff3300"><span class="sub_total">' + row.s_sub + '</span></td>' +
                                            '<td  style="color: #00cc33" ><span class="arr_total">' + row.arr + '</span></td>' +
                                            '<td><span class="tot_without_total">' + row.tot + '</span></td>' +
                                            '<td><span class="dis_total">' + row.s_dis + '</span></td>' +
                                            '<td><span class="tot_dis_total">' + row.c_price + '</span></td>' +
//                                            '<td>' + row.regi_date + '</td>' +
                                            // ' <td><button type="button"  class="btn btn-white dropdown-toggle waves-effect bbtn"  aria-expanded="false" ><i class="fa fa-eye"></i></button></td>' +
                                            '</tr>';
                                    jQuery('#tb4').append(jQuery(tr));
                                }

                                var tr2 = '<tr><th colspan="3"  ><p style="margin-left: 30%">Total Amount</p></th><td><p id="sub_tot" style="color: #3333ff"></p></td><td><p id="sub_arr" style="color: #3333ff"></p></td>\n\
               <td><p id="sub_tot_without" style="color: #3333ff"></p></td><td><p id="sub_dis" style="color: #3333ff"></p></td><td><p id="sub_tot_dis" style="color: #3333ff"></p></td></tr>';
                                jQuery('#tb4').append(jQuery(tr2));

                                //caculate arrears sub
                                var sum = 0;
                                jQuery(".arr_total").each(function () {
                                    sum += parseFloat(jQuery(this).text());
                                    //alert(sum);
                                });
                                //alert(sum);
                                jQuery('#sub_arr').text(sum);


                                //caculate sub_payed amount
                                var sum2 = 0;
                                jQuery(".sub_total").each(function () {
                                    sum2 += parseFloat(jQuery(this).text());
                                    //alert(sum);
                                });
                                jQuery('#sub_tot').text(sum2);


                                //calculate  sub_tot_without discount
                                var sum3 = 0;
                                jQuery(".tot_without_total").each(function () {
                                    sum3 += parseFloat(jQuery(this).text());
                                    //alert(sum);
                                });
                                jQuery('#sub_tot_without').text(sum3);

                                //calculate  sub_discount
                                var sum4 = 0;
                                jQuery(".dis_total").each(function () {
                                    sum4 += parseFloat(jQuery(this).text());
                                    //alert(sum);
                                });
                                jQuery('#sub_dis').text(sum4);


                                //calculate  sub_total with discount
                                var sum5 = 0;
                                jQuery(".tot_dis_total").each(function () {
                                    sum5 += parseFloat(jQuery(this).text());
                                    //alert(sum);
                                });
                                jQuery('#sub_tot_dis').text(sum5);

                            }

                        });
                } else {

                    jQuery.post('backend/payment_report_branch_vice.php', {branch_id: n2},
                        function (data, status) {

                            if (status === 'success') {
                                jQuery('#tb4').empty();
                                var rows = JSON.parse(data);
                                for (var i = 0; i < rows.length; i++) {

                                    var row = rows[i];
                                    var tr = '<tr>' +
                                            '<td>' + row.nic + '</td>' +
                                            '<td>' + row.admission_no + '</td>' +
                                            '<td>' + row.name + '</td>' +
                                            '<td  style="color: #ff3300"><span class="sub_total">' + row.s_sub + '</span></td>' +
                                            '<td  style="color: #00cc33" ><span class="arr_total">' + row.arr + '</span></td>' +
                                            '<td><span class="tot_without_total">' + row.tot + '</span></td>' +
                                            '<td><span class="dis_total">' + row.s_dis + '</span></td>' +
                                            '<td><span class="tot_dis_total">' + row.c_price + '</span></td>' +
//                                            '<td>' + row.regi_date + '</td>' +
                                            // ' <td><button type="button"  class="btn btn-white dropdown-toggle waves-effect bbtn"  aria-expanded="false" ><i class="fa fa-eye"></i></button></td>' +
                                            '</tr>';
                                    jQuery('#tb4').append(jQuery(tr));
                                }

                                var tr2 = '<tr><th colspan="3"  ><p style="margin-left: 30%">Total Amount</p></th><td><p id="sub_tot" style="color: #3333ff"></p></td><td><p id="sub_arr" style="color: #3333ff"></p></td>\n\
               <td><p id="sub_tot_without" style="color: #3333ff"></p></td><td><p id="sub_dis" style="color: #3333ff"></p></td><td><p id="sub_tot_dis" style="color: #3333ff"></p></td></tr>';
                                jQuery('#tb4').append(jQuery(tr2));

                                //caculate arrears sub
                                var sum = 0;
                                jQuery(".arr_total").each(function () {
                                    sum += parseFloat(jQuery(this).text());
                                    //alert(sum);
                                });
                                //alert(sum);
                                jQuery('#sub_arr').text(sum);


                                //caculate sub_payed amount
                                var sum2 = 0;
                                jQuery(".sub_total").each(function () {
                                    sum2 += parseFloat(jQuery(this).text());
                                    //alert(sum);
                                });
                                jQuery('#sub_tot').text(sum2);


                                //calculate  sub_tot_without discount
                                var sum3 = 0;
                                jQuery(".tot_without_total").each(function () {
                                    sum3 += parseFloat(jQuery(this).text());
                                    //alert(sum);
                                });
                                jQuery('#sub_tot_without').text(sum3);

                                //calculate  sub_discount
                                var sum4 = 0;
                                jQuery(".dis_total").each(function () {
                                    sum4 += parseFloat(jQuery(this).text());
                                    //alert(sum);
                                });
                                jQuery('#sub_dis').text(sum4);


                                //calculate  sub_total with discount
                                var sum5 = 0;
                                jQuery(".tot_dis_total").each(function () {
                                    sum5 += parseFloat(jQuery(this).text());
                                    //alert(sum);
                                });
                                jQuery('#sub_tot_dis').text(sum5);

                            }

                        });

                }

            }
            
            
            

            function get_stu_info() {
                jQuery('#main_div').css('display', 'none');
                jQuery('#stu_table').css('display', 'block');
                var branch_id = jQuery('#branch_id').val();
                jQuery.post('backend/view_student.php', {branch_id: branch_id},
                        function (data, status) {

                            if (status === 'success') {

                                jQuery('#tb2').empty();
                                var rows = JSON.parse(data);
                                for (var i = 0; i < rows.length; i++) {







                                    var row = rows[i];
                                    var tr = '<tr>' +
                                            '<td>' + row.nic + '</td>' +
                                            '<td>' + row.name + '</td>' +
                                            '<td>' + row.regi_no + '</td>' +
                                            '<td>' + row.admission_no + '</td>' +
                                            '<td>' + row.gender + '</td>' +
                                            '<td>' + row.address + '</td>' +
                                            '<td>' + row.email + '</td>' +
                                            '<td>' + row.contact + '</td>' +
                                            '<td>' + row.regi_date + '</td>' +
                                            ' <td><a href="view_by_nic.php?nic=' + row.nic + '"><button type="button"  class="btn btn-white dropdown-toggle waves-effect bbtn"  aria-expanded="false" ><i class="fa fa-eye"></i></button></a></td>' +
                                            '</tr>';
                                    jQuery('#tb2').append(jQuery(tr));


                                }


                            }



                        });
            }


            function course_vice() {

                var course_select2 = jQuery('#course_select2').val();
                var branch_id = jQuery('#branch_id').val();
                if (course_select2 === 'select') {
                    swal("Select a Course");
                } else {
                    jQuery('#main_div').css('display', 'none');
                    jQuery('#course_table').css('display', 'block');
                    jQuery.post('backend/course_report.php', {course_select2: course_select2, branch_id: branch_id},
                            function (data, status) {

                                if (status === 'success') {
                                    jQuery('#tb3').empty();
                                    var rows = JSON.parse(data);
                                    for (var i = 0; i < rows.length; i++) {

                                        var row = rows[i];
                                        var tr = '<tr>' +
                                                '<td>' + row.s_nic + '</td>' +
                                                '<td>' + row.s_name + '</td>' +
                                                '<td><table><tr><td width="90" style="color: #999900">' + row.adm + '</td><td width="90" style="color: #660000">' + row.first + '</td><td width="90" style="color: #999900">' + row.second + '</td><td width="90" style="color: #660000">' + row.third + '</td></tr></table></td>' +
                                                '<td  style="color: #ff3300">' + row.sub + '</td>' +
                                                '<td  style="color: #00cc33">' + row.arr + '</td>' +
                                                '<td>' + row.tot + '</td>' +
                                                '<td>' + row.dis + '</td>' +
                                                '<td>' + row.cu_fee + '</td>' +
//                                            '<td>' + row.regi_date + '</td>' +
//                                            ' <td><a href="view_by_nic.php?nic='+row.nic+'"><button type="button"  class="btn btn-white dropdown-toggle waves-effect bbtn"  aria-expanded="false" ><i class="fa fa-eye"></i></button></a></td>' +
                                                '</tr>';
                                        jQuery('#tb3').append(jQuery(tr));
                                    }


                                }

                            });
                }


            }


            function get_payment_info() {

                jQuery('#main_div').css('display', 'none');
                jQuery('#payment_table').css('display', 'block');
                var branch_id = jQuery('#branch_id').val();

                jQuery.post('backend/payment_report.php', {branch_id: branch_id},
                        function (data, status) {

                            if (status === 'success') {
                                jQuery('#tb4').empty();
                                var rows = JSON.parse(data);
                                for (var i = 0; i < rows.length; i++) {

                                    var row = rows[i];
                                    var tr = '<tr>' +
                                            '<td>' + row.nic + '</td>' +
                                            '<td>' + row.admission_no + '</td>' +
                                            '<td>' + row.name + '</td>' +
                                            '<td  style="color: #ff3300"><span class="sub_total">' + row.s_sub + '</span></td>' +
                                            '<td  style="color: #00cc33" ><span class="arr_total">' + row.arr + '</span></td>' +
                                            '<td><span class="tot_without_total">' + row.tot + '</span></td>' +
                                            '<td><span class="dis_total">' + row.s_dis + '</span></td>' +
                                            '<td><span class="tot_dis_total">' + row.c_price + '</span></td>' +
//                                            '<td>' + row.regi_date + '</td>' +
                                            // ' <td><button type="button"  class="btn btn-white dropdown-toggle waves-effect bbtn"  aria-expanded="false" ><i class="fa fa-eye"></i></button></td>' +
                                            '</tr>';
                                    jQuery('#tb4').append(jQuery(tr));
                                }

                                var tr2 = '<tr><th colspan="3"  ><p style="margin-left: 30%">Total Amount</p></th><td><p id="sub_tot" style="color: #3333ff"></p></td><td><p id="sub_arr" style="color: #3333ff"></p></td>\n\
               <td><p id="sub_tot_without" style="color: #3333ff"></p></td><td><p id="sub_dis" style="color: #3333ff"></p></td><td><p id="sub_tot_dis" style="color: #3333ff"></p></td></tr>';
                                jQuery('#tb4').append(jQuery(tr2));

                                //caculate arrears sub
                                var sum = 0;
                                jQuery(".arr_total").each(function () {
                                    sum += parseFloat(jQuery(this).text());
                                    //alert(sum);
                                });
                                //alert(sum);
                                jQuery('#sub_arr').text(sum);


                                //caculate sub_payed amount
                                var sum2 = 0;
                                jQuery(".sub_total").each(function () {
                                    sum2 += parseFloat(jQuery(this).text());
                                    //alert(sum);
                                });
                                jQuery('#sub_tot').text(sum2);


                                //calculate  sub_tot_without discount
                                var sum3 = 0;
                                jQuery(".tot_without_total").each(function () {
                                    sum3 += parseFloat(jQuery(this).text());
                                    //alert(sum);
                                });
                                jQuery('#sub_tot_without').text(sum3);

                                //calculate  sub_discount
                                var sum4 = 0;
                                jQuery(".dis_total").each(function () {
                                    sum4 += parseFloat(jQuery(this).text());
                                    //alert(sum);
                                });
                                jQuery('#sub_dis').text(sum4);


                                //calculate  sub_total with discount
                                var sum5 = 0;
                                jQuery(".tot_dis_total").each(function () {
                                    sum5 += parseFloat(jQuery(this).text());
                                    //alert(sum);
                                });
                                jQuery('#sub_tot_dis').text(sum5);

                            }

                        });

            }








            function printContain1(el) {

                var page = document.body.innerHTML;
                var printContaion = document.getElementById(el).innerHTML;
                document.body.innerHTML = printContaion;
                window.print();
                document.body.innerHTML = page;
                window.setTimeout('loaction.reload()', 3000);
            }

            function printContain2(el) {

                var page = document.body.innerHTML;
                var printContaion = document.getElementById(el).innerHTML;
                document.body.innerHTML = printContaion;
                window.print();
                document.body.innerHTML = page;
                window.setTimeout('loaction.reload()', 3000);
            }

            function printContain3(el) {

                var page = document.body.innerHTML;
                var printContaion = document.getElementById(el).innerHTML;
                document.body.innerHTML = printContaion;
                window.print();
                document.body.innerHTML = page;
                window.setTimeout('loaction.reload()', 3000);
            }



            function logout() {
                window.location.href = './backend/logout.php';
            }



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
        <!-- jQuery  -->
        <script src="assets/plugins/moment/moment.js"></script>


        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>

        <script src="assets/plugins/sweetalert/dist/sweetalert.min.js"></script>

        <!-- Todojs  -->
        <script src="assets/pages/jquery.todo.js"></script>

        <!-- chatjs  -->
        <script src="assets/pages/jquery.chat.js"></script>

        <script src="assets/plugins/peity/jquery.peity.min.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script src="assets/pages/jquery.dashboard_2.js"></script>



    </body>
</html>