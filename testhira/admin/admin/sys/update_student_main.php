<?php session_start(); ?>
<?php
if (!isset($_SESSION['idlogin'])) {
    header('Location: login.php');
}
$branch = $_SESSION['branch_idbranch'];
$user_role = $_SESSION['user_role_iduser_role'];
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

                        <div id="main_div">
                            <div class="row "> <h4 class="page-title text-center"><i class="ion-android-search" style="color: #000099"></i><span style="margin-left: 1%;font-size: 24px;"><b>Search Students</b></span></h4>
                                <br/><br/>
                                <div class="col-md-12" style="margin-top: 0%">
                                    <div class="card-box">
                                        <h4 class="text-dark header-title m-t-0 m-b-30">Search By NIC</h4>


                                        <div id="sparkline3"></div>
                                        <label for="passWord2">NIC NO<span style="color: #F30166">*</span></label>
                                        <input type="text" required placeholder="Enter NIC NO" class="form-control" id='nic'>
                                        <br/>
                                        <div class="text-right"> <button type="button" class="btn btn-success btn-rounded waves-effect waves-light" onclick="search_by_nic()">Search</button></div>

                                    </div>

                                </div>

                                <div class="col-md-12" style="margin-top: 3%;">
                                    <div class="card-box">
                                        <h4 class="text-dark  header-title m-t-0 m-b-30">Search By Course</h4>
                                        <input type="hidden" value="<?php echo $branch; ?>" id="branch_id"/>

                                        <div id="sparkline3"></div>
                                        <label for="passWord2">Select a Course<span style="color: #F30166">*</span></label>
                                        <select id="course_select" onchange="selectCourse()" style="" class="form-control">
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
                                        <br/>
                                        <div class="text-right"> <button type="button" class="btn btn-success btn-rounded waves-effect waves-light" onclick="search_by_course()">Search</button></div>

                                    </div>


                                </div>

                            </div>


                        </div>

                        <div id="course_table" style="display: none">
                            <a href="update_student_main.php"> <button type="button" class="btn btn-success waves-effect waves-light" style="">
                                    <span class="btn-label"><i class="fa fa-arrow-left"></i>
                                    </span>Back</button></a>
                            <div class="card-box" class="card-box m-t-15" style="margin-top: 1%">
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
                                                <th>View</th>


                                            </tr>
                                        </thead>
                                        <tbody id="tb3">

                                        </tbody>
                                    </table>
                                </div>

                                <div class="text-right m-b-0" style="margin-top: 2%;" >

                                    <a href="update_student_main.php">  <button class="btn btn-primary waves-effect waves-light"  style="margin-top: 2%" >
                                            Back
                                        </button></a>


                                </div>


                            </div >
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

        function search_by_nic() {
            // alert('jj');
            var nic = jQuery('#nic').val();

            // alert(nic);



            // var valid_nic = /^[0-9]{9}[vVxX]$/;
            if (nic === '') {
                swal('NIC No Required..!! ');



            } else {
                window.location = 'view_by_nic.php?nic=' + nic;
            }

        }


        function searchBranch() {
            var branch = jQuery('#branch_select').val();
            window.location = 'online_branch_student_payment.php?branch=' + branch;
        }


        function search_by_course() {

            var course_select2 = jQuery('#course_select').val();

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
                                            ' <td><a href="view_by_nic.php?nic=' + row.s_nic + '"><button type="button"  class="btn btn-white dropdown-toggle waves-effect bbtn"  aria-expanded="false" ><i class="fa fa-eye"></i></button></a></td>' +
                                            '</tr>';
                                    jQuery('#tb3').append(jQuery(tr));
                                }


                            }

                        });
            }



        }





    </script>

    <script>
        jQuery(document).ready(function () {

            //set date to textfield
            var now = new Date();

            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);

            //            var today = now.getFullYear() + "-" + (month) + "-" + (day);
            var today = (month) + "/" + (day) + "/" + now.getFullYear();
            jQuery("#txtdateapply").val(today);
            // ending set date to textfield









        });




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