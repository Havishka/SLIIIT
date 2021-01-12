<?php session_start(); ?>
<?php
if (!isset($_SESSION['idlogin'])) {
    header('Location: login.php');
}else if($_SESSION['user_role_iduser_role'] == '1'){
     header('Location: login.php');
}
$user_role = $_SESSION['user_role_iduser_role'];
$branch_id = $_SESSION['branch_idbranch'];
?>
<?php
    include_once 'DB_3.php';
    $conn = DB_3::create_conn();
    
   
$sql4 = "select name,idbranch from  branch";
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
                        <div class="row" style="margin-left: 20%" id="b_1">
                            <div class="col-lg-9">
                                <div class="card-box">
                                    <h4 class="text-dark header-title m-t-0">Change Password - Branch</h4>


                                    <div class="col-lg-12" style="margin-top: 4%">
                                        <label for="pass1">Select a Branch <span style="color: #F30166">*</span></label>
                                        <select id="select_branch" class="form-control" style="margin-top: 2%" onchange="get_branch_id()">
                                            <option value="0">Select one</option>
                                           <?php
                                                    while ($row1 = mysqli_fetch_array($rs4)) {
                                                        
                                                        ?>
                                            <option value="<?php echo $row1['idbranch'];?>"> <?php echo $row1['name'];?></option>
                                                        <?php
                                                    }
                                                    ?> 
                                            
                                        </select>
                                        <input type="hidden" id="branch_field"/>
                                   
                                        
                                    </div>
                                    

                                    

                                    







                                    <div class="form-group text-right m-b-0">
                                        
                                        <button class="btn btn-default waves-effect waves-light m-l-5" style="margin-top: 9%" onclick="search_branch2()">
                                                Submit
                                            </button>
                                    </div>




                                    <!-- end row -->

                                </div>

                            </div>



                        </div>







                        <div class="row" style="margin-left: 20%;display: none" id="b_2">
                            <div class="col-lg-9">
                                <div class="card-box">
                                    <h4 class="text-dark header-title m-t-0">Change Password - <span id="b_name2"></span> Branch</h4>

                                   
                                            <div class="col-lg-12" style="margin-top: 4%">
                                                <label for="pass1">Username <span style="color: #F30166">*</span></label>
                                                <input  type="text" placeholder="Enter Username" required class="form-control" id="un" style="margin-top: 2%" value="<?php echo $username;?>" disabled />
                                            </div>
                                    <input type="hidden" value="<?php echo $password;?>" id="hide_old_pw"/>
                                    <input type="hidden" value="<?php echo $branch_id;?>" id="b_id"/>
                                    
                                            <div class="col-lg-12" style="margin-top: 4%">
                                                <label for="pass1">Old Password <span style="color: #F30166">*</span></label>
                                                <input  type="password" placeholder=" Enter Old Password" required class="form-control" id="old"  style="margin-top: 2%">
                                            </div>
                                    <div class="col-lg-12" style="margin-top: 4%">
                                                <label for="pass1">New Password <span style="color: #F30166">*</span></label>
                                                <input  type="password" placeholder="Enter New Password" required class="form-control" id="new"  style="margin-top: 2%">
                                            </div>
                                    <div class="col-lg-12" style="margin-top: 4%">
                                                <label for="pass1">Re-type New Password <span style="color: #F30166">*</span></label>
                                                <input  type="password" placeholder="Re-type New Password" required class="form-control" id="re_new" style="margin-top: 2%" >
                                            </div>
                                        

                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit" style="margin-top: 9%" onclick="change_pass()">
                                           Change
                                        </button>
                                        <a href="change_pass.php">  <button type="reset" class="btn btn-default waves-effect waves-light m-l-5" style="margin-top: 9%">
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
            
            
            function get_branch_id(){
                var ee = jQuery("#select_branch").val();
                jQuery("#branch_field").val(ee);
            }
            
            
            function search_branch2(){
                jQuery("#b_1").css('display','none');
                jQuery("#b_2").css('display','block');
                var b_id = jQuery("#branch_field").val();
                if(b_id === ""){
                    swal("Please Select a Branch");
                    
                }else if(b_id === "0"){
                      swal("Please Select a Branch");
                  }else{
                     jQuery.post('./backend/view_branch_pass_user.php', {b_id: b_id
                    
                },
                
                function (data, status) {

                        if (status === 'success') {

                            var rows = JSON.parse(data);

                            for (var i = 0; i < rows.length; i++) {

                                var row = rows[i];

                                //alert(row.name);

                                jQuery('#b_name2').text(row.b_name);
                                jQuery('#un').val(row.un2);
                                jQuery('#hide_old_pw').val(row.pw2);
                                 jQuery('#b_id').val(row.bid);
                               

                              
                               




                            }
                        }

                    }

                );
                
                    
                }
            }
            
            
            
            function change_pass(){
                 var letter = /[a-zA-Z]/;
            var number = /[0-9]/;
            //alert('klklk');
            var branch_name1 = jQuery('#branch_name').val();
            var un = jQuery('#un').val();
            var pw = jQuery('#new').val();
             var pw2 = jQuery('#re_new').val();
             var br_id = jQuery('#b_id').val();
             var old_pw = jQuery('#old').val();
              var hide_old_pw = jQuery('#hide_old_pw').val();
            
              if (branch_name1 === '') {
                swal("Branch Name Required..!! ");
            
            }else if(un === ''){
                     swal("Username Required..!! ");
                 }else if(old_pw === ''){
                     swal("Old Passwword Required..!! ");
                 }else if(old_pw !== hide_old_pw){
                     swal("Old password is incorrect..!! ");
                    
                } else if(pw === ''){
                     swal("Password Required..!! ");
                    
                }else if(pw.length <= 4){
                    swal("Password must contain at least five characters..!! ");
                
                }else if( !letter.test(pw) || !number.test(pw)){
                    swal("Password must include one or more numbers & one or more characters only ..!! ");
                   }else if(pw2 === ''){ 
                       swal("Re-type NewPassword..!! ");
                        }else if(pw2 !== pw){ 
                       swal("Re-Enter Password doesn't match with New password..!! ");
                }else{
                     jQuery.post('./backend/change_pass.php', {br_id: br_id,
                    un: un, pw: pw
                },
                
                 function (data, status) {
                            if (status === 'success') {
//                        // alert(data);
//                        // var row = JSON.parse(data);
//
//
                              if (data === 'already in pass') {
                                     swal('Password already taken. Use another one', "", "error");
                                   
                                }else if (data === 'ok') {
                                    swal('Successfully Changed Password..!', "", "success");
                                    location.href = 'dashboard.php';
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