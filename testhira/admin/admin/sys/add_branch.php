<?php session_start(); ?>
<?php
if (!isset($_SESSION['idlogin'])) {
    header('Location: login.php');
}else if($_SESSION['user_role_iduser_role'] == '1'){
     header('Location: login.php');
}
$branch_id = $_SESSION['branch_idbranch'];
$user_role = $_SESSION['user_role_iduser_role'];
?>
<?php
include_once 'DB_3.php';
$conn = DB_3::create_conn();


$sql4 = "select name from  branch";
$rs4 = $conn->query($sql4);
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
                                <a href="update_student_main.php" class="waves-effect waves-light "><i class="md md-invert-colors-on"></i><span> Update Students</span> </a>

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
                                <a href="#" class="waves-effect waves-light active"><i class="md md-pages"></i><span> Branch Management </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_branch.php">Add Branch</a></li>
                                    <li><a href="change_pass_branch.php">Change Password-Branch</a></li>

                                </ul>
                            </li>
                            <?php }
                            
                            ?>


                            <li class="has_sub">
                                <a href="#" class="waves-effect waves-light "><i class="md md-view-list"></i><span>Settings </span></a>
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








                        <div class="row" style="margin-left: 20%">
                            <div class="col-lg-9">
                                <div class="card-box">
                                    <h4 class="text-dark header-title m-t-0">Add Branch</h4>


                                    <div class="col-lg-12" style="margin-top: 4%">
                                        <label for="pass1">Branch Name <span style="color: #F30166">*</span></label>
                                        <input  type="text" placeholder="Enter Branch Name" required class="form-control" id="bname" style="margin-top: 2%"/>
                                    </div>
                                    <div class="col-lg-12" style="margin-top: 4%">
                                        <label for="pass1">Username <span style="color: #F30166">*</span></label>
                                        <input  type="text"  required class="form-control" id="un" style="margin-top: 2%" value="admin"/>
                                    </div>
                                    <div class="col-lg-12" style="margin-top: 4%">
                                        <label for="pass1">Password <span style="color: #F30166">*</span></label>
                                        <input  type="password"  placeholder="Enter Password" required class="form-control" id="pw" style="margin-top: 2%" />
                                    </div>

                                    <div class="col-lg-12" style="margin-top: 4%"><button type="button" class="btn btn-block btn-sm btn-success waves-effect waves-light" aria-expanded="false" data-toggle="modal" data-target="#custom-width-modal" style="font-size: 14px;">View Registered Branches</button>
                                    </div>

                                    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none; ">
                                        <div class="modal-dialog"> 
                                            <div class="modal-content"> 
                                                <div class="modal-header"> 
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                                    <h4 class="modal-title">Registered Branches</h4> 
                                                </div> 
                                                <div class="modal-body"> 
                                                    <ul>
                                                    <?php
                                                    while ($row1 = mysqli_fetch_array($rs4)) {
                                                        
                                                        ?>
                                                        <li> <?php echo $row1['name'];?></li>
                                                        <?php
                                                    }
                                                    ?>
                                                          </ul>


                                                </div> 
                                                <div class="modal-footer"> 
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 

                                                </div> 



                                            </div> 
                                        </div>
                                    </div>







                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit" style="margin-top: 9%" onclick="add_branch()">
                                            Save
                                        </button>
                                        <a href="add_branch.php">  <button type="reset" class="btn btn-default waves-effect waves-light m-l-5" style="margin-top: 9%">
                                                Cancel
                                            </button></a>
                                    </div>




                                    <!-- end row -->

                                </div>

                            </div>



                        </div>
                        <!-- end row -->





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
            });






            function logout() {
                window.location.href = './backend/logout.php';
            }

            function view_branches() {

            }



            function add_branch() {
                
              
            var letter = /[a-zA-Z]/;
            var number = /[0-9]/;
            //alert('klklk');
            var branch_name1 = jQuery('#bname').val();
            var un = jQuery('#un').val();
            var pw = jQuery('#pw').val();
            
              if (branch_name1 === '') {
                swal("Branch Name Required..!! ");
            
            }else if(un === ''){
                     swal("Username Required..!! ");
                    
                } else if(pw === ''){
                     swal("Password Required..!! ");
                    
                }else if(pw.length <= 4){
                    swal("Password must contain at least five characters..!! ");
                
                }else if( !letter.test(pw) || !number.test(pw)){
                    swal("Password must include one or more numbers & one or more characters only ..!! ");
                }else{
                     jQuery.post('./backend/save_branch.php', {branch: branch_name1,
                    un: un, pw: pw
                },
                
                 function (data, status) {
                            if (status === 'success') {
//                        // alert(data);
//                        // var row = JSON.parse(data);
//
//
                                if (data === 'ok') {
                                    swal('Successfully Saved..!', "", "success");
                                    location.href = 'add_branch.php';
                                } else if (data === 'A record already exists') {
                                    swal('Already Registered', "", "error");
                                    location.href = 'add_branch.php';
                                }else if (data === 'already in pass') {
                                    swal('Password already taken. Use another one', "", "error");
                                    location.href = 'add_branch.php';
                                }
                            }

                        }

                );
                
                    
                }
                    
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