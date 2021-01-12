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
                                <a href="update_student_main.php" class="waves-effect waves-light"><i class="md md-invert-colors-on"></i><span> Update Students</span> </a>

                            </li>
                            <li class="has_sub">
                                <a href="add_payment.php" class="waves-effect waves-light active"><i class="md md-invert-colors-on"></i><span> Payments</span> </a>

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

                        <input type="hidden" value="<?php echo $branch;?>" id="branch_id3"/>

                        <div class="col-md-8 p-l-0" id="div1" >

                            <input type="text" required placeholder="Enter NIC NO" class="form-control" id='nic'  style="display: inline"></div>


                        <div class="col-md-4" id="div2">     <button type="button" class="btn btn-success btn-rounded waves-effect waves-light" onclick="search_by_nic()" style="display: inline">Search</button></div>



                        <div class="row" id="div_info" style="display: none">

                            <div class="col-lg-12">
                                <div class="card-box m-t-15">


                                    <form action="#" data-parsley-validate novalidate>

                                        <div class="form-group" >
                                            <div class="col-sm-6" >
                                                <label for="emailAddress">Name </label>
                                                <input type="hidden" id='hide_id' />

                                                <input type="text"  class="form-control" id="name" disabled="" >
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div class="col-sm-6" style="margin-top: 0%">
                                                <label for="pass1">Admission No </label>
                                                <input  type="text"  required class="form-control" id="admission_no" disabled="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="passWord2">Registration No </label>
                                                <input type="text"  class="form-control" id="regi_no" disabled="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="passWord2">Email</label>
                                                <input  type="text"  class="form-control" id="email" disabled="">





                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-top: 2%"> 
                                                <label for="passWord2">Select a Course to make payment</label>
                                                <select id='cour_sele' class="form-control" onchange="get_pay_info()">
                                                    <option value=""></option>
                                                </select>

                                            </div>


                                        </div>
                                        <div class="form-group" style="visibility: hidden">
                                            <div class="col-sm-6" style="margin-top: 2%">
                                                <label for="passWord2">Email</label>
                                                <input  type="text"  class="form-control"  disabled="">





                                            </div>
                                        </div>





                                    </form>

                                    <div class="form-group text-right m-b-0" style="margin-top: 2%;visibility: hidden" >
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






                        <div class="row" style="display: none;" id='pay_id'>
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
                                                    <tbody>

                                                        <tr>
                                                            <td><p id='c_name'></p></td>
                                                            <td>
                                                                <table >
                                                                    <tr>
                                                                        <td width='80' style="color: #999900" id='a_amount'></td>

                                                                        <td width='80' style="color: #660000" id='f_amount'></td>



                                                                        <td width='80' style="color: #999900" id='s_amount'></td>
                                                                        <td width='80' style="color: #660000" id='t_amount'></td>












                                                                    </tr>  

                                                                </table>







                                                            </td>
                                                            <td style="color: #ff0000" id='sub'></td>
                                                            <td style="color: #33cc00" id='arr'> </td>
                                                            <td id="tot"></td>
                                                            <td id="dis"></td>
                                                           
                                                            <td id='c_price'></td>

                                                            <td><span class="label label-table label-danger" style="display: none" id='comple_ad2'>Completed</span><span class="label label-table label-success" style="display: none" id='pending_ad2'>Pending</span></td>


                                                            <td><p id="pay" style="display: none"></p></td>  
                                                            <td><p id="c_id" style="display: none"></p></td>
                                                            <td><p id="hide_id2"  style="display: none"></p></td>




                                                            <td><button type="button" id='bb' class="btn btn-white dropdown-toggle waves-effect bbtn"  aria-expanded="false" data-toggle="modal" data-target="#custom-width-modal" ><i class="fa fa-eye"></i></button></td>
                                                        </tr>

                                                    </tbody>
                                                </table>






                                            </div>
                                        </div>


                                    </form>


                                    <div class="text-right m-b-0" style="margin-top: 2%;" >
                                        <button class="btn btn-danger  waves-effect waves-light"  style="margin-top: 2%" onclick="make_payment();">
                                            Add Payment
                                        </button>
                                        <a href="add_payment.php"> <button class="btn btn-primary  waves-effect waves-light"  style="margin-top: 2%" onclick="make_payment();">
                                           Back
                                            </button></a>



                                    </div>


                                </div></div></div>


                        <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none; ">
                            <div class="modal-dialog"> 
                                <div class="modal-content"> 
                                    <div class="modal-header"> 
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                        <h4 class="modal-title" id="cu_name"></h4> 
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
                                                <tr style="display: none;" id="second_hide">
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
                                                    <td><p id="sub2" style="color: #cc0000;font-weight: bold;font-size: 15px;"></p></td>
                                                    <td><p id="arr2" style="color: #00cc00;font-weight: bold;font-size: 15px;"></p></td>
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
                        <div class="row" id="new_div" style="display: none">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Make a Payment</b></h4><br/>


                                    <div class="table-responsive">
                                        <table class="table table-bordered m-0">

                                            <thead>
                                                <tr>
                                                    <th>Payment Plan</th>
                                                    <th>Payed Amount</th>
                                                    <th>Enter Amount</th>
                                                    <th>Payed Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Admission Fee</td>
                                                    <td><p id="payed_ad"></p></td>
<!--                                                    <td><input type="text" id="" onchange="" value="0" class="" style="display: none"/>
                                                        <span class="label label-table label-danger" id='' >Completed</span></td>-->

                                                    <td><input type="text" id="ad" onchange="" value="0" class="" style="display: none"/>
                                                        <span class="label label-table label-danger" id='comple_a' style="display: none">Completed </span>

                                                    </td>
                                            <input type="hidden" id="txtdateapply"/>

                                            <td><p id="payed_ad_date"></p></td>

                                            </tr>
                                            <tr>
                                                <td>1st Installment</td>
                                                <td><p id="payed_fr"></p></td>
                                                <td><input type="text" id="enter_fr" onchange="update17()" value="0" class="calc" style="display: none"/>
                                                    <span class="label label-table label-danger" id='comple_f' style="display: none">Completed</span>

                                                </td>
                                                <td><p id="payed_fr_date"></p></td>
                                            <input type="hidden" id="hide_payed_fr_date"/>
                                            <input type="hidden" id="hide_first_sub"/>
                                            </tr>
                                            <tr>
                                                <td>2nd Installment</td>
                                                <td><p id="payed_se"></p></td>
                                                <td><input type="text" id="enter_se" onchange="update18()"  value="0" class="calc" style="display: none"/>
                                                    <span class="label label-table label-danger" id='comple_s' style="display: none">Completed</span></td>
                                                <td><p id="payed_se_date"></p></td>
                                            <input type="hidden" id="hide_payed_se_date"/>
                                            <input type="hidden" id="hide_second_sub"/>
                                            </tr>
                                            <tr>
                                                <td>3rd Installment</td>
                                                <td><p id="payed_th"></p></td>
                                                <td><input type="text" id="enter_th" onchange="update19()" value="0" class="calc" style="display: none"/>
                                                    <span class="label label-table label-danger" id='comple_t' style="display: none">Completed</span>
                                                </td>
                                                <td><p id="payed_th_date"></p></td>
                                            <input type="hidden" id="hide_payed_th_date" />
                                            <input type="hidden" id="hide_third_sub"/>
                                            <input type="hidden" id="c_price"/>
                                            <input type="hidden" id="idadmission"/>
                                            <input type="hidden" id="idfirst_install"/>
                                            <input type="hidden" id="idsecond_install"/>
                                            <input type="hidden" id="idthird_install"/>
                                            <input type="hidden" id="idpayments"/>
                                            <input type="hidden" id="id_stu4"/>


                                            <input type="hidden" id="c_name4"/>
                                            <input type="hidden" id="idcourse3"/>
                                            </tr>
                                            <tr>
                                                <th>Discount</th>
                                                <td><p id="discount" style="font-weight: bold"></p></td></tr>
                                            <tr>
                                                <th>Amount</th>
                                                <td><p id="sub_pay_payed" style="font-weight: bold;color: #009900;font-size: 16px;"></p></td>
                                                <td><p id="sub_pay_new" onchange="update_sub_amount()" style="font-weight: bold;color: #009900;font-size: 17px;">0</p></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>Total Amount</th>
                                                <td colspan="2"><p id="total_am" style="color: #ff0000;font-weight: bold;font-size: 19px;margin-left: 38%"></p></td>

                                                <td></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                          <p class="m-t-10"><b>Total Course Fee (With Discount)&nbsp;&nbsp; -</b>&nbsp;&nbsp; <span id="tot9" style="color: #ff0000;font-weight: bold;font-size: 16px;"></span></p>

                                        <div class="form-group text-right m-b-0" style="margin-top: 2%;" >
                                            <button class="btn btn-danger waves-effect waves-light" type="submit" style="margin-top: 2%" onclick="upadate_2()">
                                                Update
                                            </button>
                                            <a href="add_payment.php"> <button class="btn btn-success waves-effect waves-light m-l-5" style="margin-top: 2%">
                                                    Cancel
                                                </button></a>
                                        </div>

                                    </div>
                                </div>
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



            //set date to textfield
            var now = new Date();

            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);

//            var today = now.getFullYear() + "-" + (month) + "-" + (day);
            var today = (month) + "/" + (day) + "/" + now.getFullYear();
            jQuery("#txtdateapply").val(today);
            // ending set date to textfield



            $('.bbtn').click(function (event) {
                // alert('kk');
                //var $row = $(this).parents('tr');
//                 var $row = $(this).parents('tr');
//            var payid = $row.find('input[name="pay"]').val();
//            var course = $row.find('input[name="course"]').val();
//            var stu = $row.find('input[name="stu"]').val();
                var payid = jQuery("#pay").text();
                var course = jQuery("#c_id").text();
                var stu = jQuery('#hide_id2').text();
//                alert(payid);
//                alert(course);
//                alert(stu);


                jQuery.post('backend/course_vice_payments.php', {payid: payid, course: course, stu: stu},
                        function (data, status) {

                            if (status === 'success') {

                                var rows = JSON.parse(data);

                                for (var i = 0; i < rows.length; i++) {

                                    var row = rows[i];

                                    //alert(row.name);
                                    jQuery('#cu_name').text(row.course_name);
                                    jQuery('#sub2').text(row.sub_total);
                                           // alert(row.ad_price);
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
                                   
                                    
                                    jQuery('#dis_2').text(row.discount);
                                    
                                    
                                    





                                    var cprice = row.Cprice;
                                    var sub = row.sub_total;
                                    var incprice = parseFloat(cprice) + 1000;
                                    var tot = parseFloat(incprice) - parseFloat(row.discount);
                                    var arr = parseFloat(tot) - parseFloat(sub);
                                    jQuery("#arr2").html(arr);
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



            jQuery('.calc').change(function () {
                var total = 0;
                jQuery('.calc').each(function () {

                    if (jQuery(this).val() != '')
                    {
                        total += parseInt(jQuery(this).val());
                    }
                });
                //alert(total);
                jQuery('#sub_pay_new').text(total);
                update_sub_amount();
            });



            jQuery('#enter_fr').on('input', function () {
                var cc = jQuery('#enter_fr').val();
                var sd = jQuery('#hide_payed_fr_date').val();
                var dd = jQuery("#txtdateapply").val();
                if (cc === '') {
                    jQuery('#payed_fr_date').text(sd);
                } else if (cc !== '0') {
                    jQuery('#payed_fr_date').text(dd);
                } else {
                    jQuery('#payed_fr_date').text(sd);
                }
                var ss = 'ok';
                jQuery('#hide_first_sub').val(ss);


            });




            jQuery('#enter_se').on('input', function () {
                var sd = jQuery('#hide_payed_se_date').val();
                var dd = jQuery("#txtdateapply").val();
                var cc = jQuery('#enter_se').val();
                if (cc === '') {
                    jQuery('#payed_se_date').text(sd);
                } else if (cc !== '0') {
                    jQuery('#payed_se_date').text(dd);
                } else {
                    jQuery('#payed_se_date').text(sd);
                }
                var ss = 'ok';
                jQuery('#hide_second_sub').val(ss);


            });



            jQuery('#enter_th').on('input', function () {
                var sd = jQuery('#hide_payed_th_date').val();
                var dd = jQuery("#txtdateapply").val();
                var cc = jQuery('#enter_th').val();
                // alert(sd);alert(dd);alert(cc);
                if (cc === '') {
                    jQuery('#payed_th_date').text(sd);
                } else if (cc !== '0') {

                    jQuery('#payed_th_date').text(dd);
                } else {
                    jQuery('#payed_th_date').text(sd);
                }
                var ss = 'ok';
                jQuery('#hide_third_sub').val(ss);


            });



        });





        function search_by_nic() {
            // alert('jj');
            var nic = jQuery('#nic').val();
            var branch_id = jQuery('#branch_id3').val();

            // alert(nic);



            // var valid_nic = /^[0-9]{9}[vVxX]$/;
            if (nic === '') {
                swal('NIC No Required..!! ');



            } else {
                //alert(name+gen+address+email+nic+date_app+contact+branch+amount+regi+first+second+third+gen+registration+admission);
                jQuery.post('./backend/view_students_relavent_course.php', {nic: nic,branch_id:branch_id
                },
                        function (data, status) {

                            if (status === 'success') {

                                if (data === 'no') {
                                    jQuery('#div_info').css('display', 'none');
                                    jQuery('#pay_id').css('display', 'none');
                                    




                                    swal({
                                        title: "Sorry!",
                                        text: "No result Found.",
                                        imageUrl: "img/sorry.png"
                                    });
                                    jQuery('#nic').val("");
                                    //location.href = 'register_students.php';

                                } else {


                                    var rows = JSON.parse(data);

                                    for (var i = 0; i < rows.length; i++) {

                                        var row = rows[i];

                                        //alert(row.name);

                                        jQuery('#name').val(row.name);
                                        jQuery('#admission_no').val(row.admission_no);
                                        jQuery('#regi_no').val(row.regi_no);
                                        jQuery('#hide_id').val(row.idstudent);
                                        jQuery('#email').val(row.email);
                                        jQuery('#hide_id2').text(row.idstudent2);
                                        //   alert(row.idstudent2);


                                    }

                                }
                            }

                        }

                );

                jQuery.post('./backend/display_courses.php', {nic: nic,
                },
                        function (data, status) {

                            if (status === 'success') {

                                jQuery('#cour_sele').empty();
                                var rows = JSON.parse(data);

                                for (var i = 0; i < rows.length; i++) {

                                    var row = rows[i];
                                    var ii = rows.length;
                                    if (ii === 1) {

                                        var option = '<option>Select one</option><option value=' + row.idcourse + '~' + row.stu_id + '> ' + row.course_name + ' </option>';


                                        jQuery('#cour_sele').append(jQuery(option));

                                    } else {
                                        var option = '<option value=' + row.idcourse + '~' + row.stu_id + '> ' + row.course_name + ' </option>';


                                        jQuery('#cour_sele').append(jQuery(option));
                                    }
                                    //alert(row.idcourse);


                                }

                            }

                        }

                );


            }

            jQuery('#div_info').css('display', 'block');

        }


        function get_pay_info() {
            var c_id2 = jQuery('#cour_sele').val();
            var hide_id = jQuery('#hide_id').val();
            //var ss = c_id.split(' ');
            // alert(ss);
            // var input = 'john smith~123 Street~Apt 4~New York~NY~12345';

            var fields = c_id2.split('~');

            var c_id = fields[0];
            var hide_id2 = fields[1];






            jQuery('#c_id').text(c_id);
            jQuery('#hide_id2').text(hide_id2);
            //alert(hide_id);


            jQuery.post('./backend/get_payment_course.php', {c_id: c_id, hide_id: hide_id


            },
                    function (data, status) {

                        if (status === 'success') {

                            var rows = JSON.parse(data);

                            for (var i = 0; i < rows.length; i++) {

                                var row = rows[i];

                                //alert(row.name);

                                jQuery('#a_amount').text(row.a_amount);
                                jQuery('#f_amount').text(row.first_sum);
                                jQuery('#s_amount').text(row.second_sum);
                                jQuery('#t_amount').text(row.third_sum);

                                jQuery('#c_name').text(row.c_name);
                                jQuery('#c_id').val(row.c_id);
                                jQuery('#sub').text(row.sub_total);
                                jQuery('#c_price').text(row.c_price);
                                jQuery('#pay').text(row.idpayments);
                                  
                                jQuery('#dis').text(row.discount);

                                var ss = row.c_price;
                                var inti = parseFloat(ss) + 1000;
                                var tot = parseFloat(inti) - parseFloat(row.discount);
                                jQuery('#tot').text(tot);
                                jQuery('#c_price').text(inti);
                                var sub = row.sub_total;
                                var arr = parseFloat(tot) - parseFloat(sub);
                                jQuery('#arr').text(arr);
                                //alert(row.idpayments);
                                // alert(row.c_id);


                                if (tot === 0) {
                                    jQuery('#comple_ad2').css('display', 'block');
                                    jQuery('#pending_ad2').css('display', 'none');
                                } else {
                                    jQuery('#pending_ad2').css('display', 'block');
                                    jQuery('#comple_ad2').css('display', 'none');

                                }




                            }
                        }

                    }


            );
            jQuery('#pay_id').css('display', 'block');



        }



        function make_payment() {

            jQuery('#div1').css('display', 'none');
            jQuery('#div2').css('display', 'none');
            jQuery('#div_info').css('display', 'none');
            jQuery('#pay_id').css('display', 'none');
            jQuery('#new_div').css('display', 'block');

            var hide_id = jQuery('#hide_id').val();

            var c_id = jQuery('#c_id').val();


            jQuery.post('./backend/pay_detail.php', {c_id: c_id, hide_id: hide_id


            },
                    function (data, status) {

                        if (status === 'success') {

                            var rows = JSON.parse(data);

                            for (var i = 0; i < rows.length; i++) {

                                var row = rows[i];

                                //alert(row.name);

                                jQuery('#payed_ad').text(row.a_amount);
                                jQuery('#payed_fr').text(row.first_sum);
                                jQuery('#payed_se').text(row.second_sum);
                                jQuery('#payed_th').text(row.third_sum);

                                jQuery('#payed_ad_date').text(row.a_date);
                                jQuery('#payed_fr_date').text(row.f_date);
                                jQuery('#payed_se_date').text(row.s_date);
                                jQuery('#payed_th_date').text(row.t_date);
                                //  alert(row.t_date);
                                jQuery('#hide_payed_fr_date').val(row.f_date);
                                jQuery('#hide_payed_se_date').val(row.s_date);
                                jQuery('#hide_payed_th_date').val(row.t_date);
                                // jQuery('#c_id').val(row.c_id);
                                jQuery('#sub_pay_payed').text(row.sub_total);
                                jQuery('#discount').text(row.discount);

                                jQuery('#c_price').val(row.c_price);
                                jQuery('#idfirst_install').val(row.idfirst_install);

                                //jQuery('#idfirst_install').text(row.idfirst_install);
                                jQuery('#idsecond_install').val(row.idsecond_install);
                                jQuery('#idthird_install').val(row.idthird_install);
                                jQuery('#idadmission').val(row.idadmission);
                                jQuery('#idpayments').val(row.idpayments);


                                jQuery('#c_name4').val(row.c_name);
                                jQuery('#idcourse3').val(row.c_id);

                                jQuery('#id_stu4').val(row.idstudent2);

                                var dd = row.f_i_price;
                                var dd1 = row.first_sum;
                                // alert(dd);alert(dd1);
                                if (dd === dd1) {
                                    jQuery('#enter_fr').css('display', 'none');
                                    jQuery('#comple_f').css('display', 'block');


                                } else {
                                    jQuery('#enter_fr').css('display', 'block');
                                    jQuery('#comple_f').css('display', 'none');
                                    //alert('77');
                                    // alert('88');
                                }

                                var dd2 = row.s_i_price;

                                var dd3 = row.second_sum;
                                if (dd2 === dd3) {
                                    jQuery('#enter_se').css('display', 'none');
                                    jQuery('#comple_s').css('display', 'block');


                                } else {

                                    jQuery('#enter_se').css('display', 'block');
                                    jQuery('#comple_s').css('display', 'none');

                                }

                                var dd4 = row.t_i_price;
                                var dd5 = row.third_sum;
                                //alert(dd4);alert(dd5);
                                if (dd4 === dd5) {
                                    jQuery('#enter_th').css('display', 'none');
                                    jQuery('#comple_t').css('display', 'block');


                                } else {
                                    jQuery('#enter_th').css('display', 'block');
                                    jQuery('#comple_t').css('display', 'none');

                                }


                                var dd6 = '1000';
                                var dd7 = row.a_amount;
                                //alert(dd4);alert(dd5);
                                if (dd6 === dd7) {
                                    jQuery('#ad').css('display', 'none');
                                    jQuery('#comple_a').css('display', 'block');


                                } else {
                                    jQuery('#ad').css('display', 'block');
                                    jQuery('#comple_a').css('display', 'none');

                                }


                                //alert(row.idfirst_install);


                                var ss = row.c_price;
                                var inti = parseFloat(ss) + 1000;
                                var sub = row.sub_total;
                                var tot = parseFloat(inti) - parseFloat(row.discount);
                                jQuery('#tot9').html(tot);
//                              alert(row.idpayments);
//                                alert(row.c_id);








                            }
                        }

                    }


            );



        }



        var first_install_change = 0;
        var second_install_change = 0;
        var third_install_change = 0;

        function update17() {



            var app6 = jQuery('#enter_fr').val();
            var app7 = jQuery('#enter_se').val();
            var app8 = jQuery('#enter_th').val();





            if (app6 == '') {
                var too = 0;
                jQuery('#enter_fr').val(too);
                app6 = 0;
//                 }else if(app6!=''){
//               jQuery('#first_install_amount').css("background-color", "#ffff");
//                


            } else if (app7 == '') {
                swal("Please enter Amount");
//                 }else if(app7!=''){
//               jQuery('#second_install_amount').css("background-color", "#ffff");
//                

            } else if (app8 == '') {
                swal("Please enter Amount");
//                 }else if(app8!=''){
//               jQuery('#third_install_amount').css("background-color", "#ffff");
//                

            }

            first_install_change = jQuery('#enter_fr').val();


            // jQuery('#tot_1').val(num7 + tot_12);

        }


        function update18() {



            var app6 = jQuery('#enter_fr').val();
            var app7 = jQuery('#enter_se').val();
            var app8 = jQuery('#enter_th').val();


            if (app6 == '') {
                swal("Please enter Amount");
//                 }else if(app6!=''){
//               jQuery('#first_install_amount').css("background-color", "#ffff");
//                


            } else if (app7 == '') {
                var too = 0;
                jQuery('#enter_se').val(too);
                app7 = 0;
//                 }else if(app7!=''){
//               jQuery('#second_install_amount').css("background-color", "#ffff");
//                

            } else if (app8 == '') {
                swal("Please enter Amount");
//                 }else if(app8!=''){
//               jQuery('#third_install_amount').css("background-color", "#ffff");
//                

            }

            second_install_change = jQuery('#enter_se').val();

            // jQuery('#tot_1').val(num8 + tot_12);

        }


        function update19() {



            var app6 = jQuery('#enter_fr').val();
            var app7 = jQuery('#enter_se').val();
            var app8 = jQuery('#enter_th').val();



            if (app6 == '') {
                swal("Please enter Amount");
//                 }else if(app6!=''){
//               jQuery('#first_install_amount').css("background-color", "#ffff");
//                


            } else if (app7 == '') {
                swal("Please enter Amount");
//                 }else if(app7!=''){
//               jQuery('#second_install_amount').css("background-color", "#ffff");
//                

            } else if (app8 == '') {
                var too = 0;
                jQuery('#enter_th').val(too);
                app8 = 0;
//                 }else if(app8!=''){
//               jQuery('#third_install_amount').css("background-color", "#ffff");
//                

            }





            third_install_change = jQuery('#enter_th').val();




            // jQuery('#tot_1').val(num9 + tot_12);


        }




        function update_sub_amount() {
            //alert("klkl");

            var tot_now = jQuery('#sub_pay_new').text();
            //alert(tot_now);
            var num_tot1 = parseInt(tot_now);

            var tot_past = jQuery('#sub_pay_payed').text();
            var num_tot2 = parseInt(tot_past);
            
            // alert(num_tot2);


            jQuery('#total_am').text(num_tot1 + num_tot2);

        }


        function upadate_2() {
            var c_price = jQuery('#c_price').val();
            var dis = jQuery('#discount').text();
            // alert(dis);

            var idcourse = jQuery('#idcourse3').val();
            var course = jQuery('#c_name4').val();
            //alert(idcourse);  alert(course);
            var id_stu = jQuery('#id_stu4').val();


            var name = jQuery('#name').val();
            var admission_no = jQuery('#admission_no').val();
           
            var c_p = parseFloat(c_price) + 1000;

            var tot_c = parseFloat(c_p) - parseFloat(dis);


            var email = jQuery('#email').val();


            var amount = jQuery('#total_am').text();
            var first_install_amount = jQuery('#enter_fr').val();
            var second_install_amount = jQuery('#enter_se').val();
            var third_install_amount = jQuery('#enter_th').val();




            var first_date = jQuery('#payed_fr_date').text();
            var second_date = jQuery('#payed_se_date').text();
            var third_date = jQuery('#payed_th_date').text();


            var idadmission = jQuery('#idadmission').val();
            var idfirst_install = jQuery('#idfirst_install').val();
            var idsecond_install = jQuery('#idsecond_install').val();
            var idthird_install = jQuery('#idthird_install').val();

            var payid = jQuery('#idpayments').val();



            //alert(module_amount);





            ///////************Employement History Table *****************////////////////



            // Validation begin




            if (first_install_amount === '') {
                swal('Valid Application Fee Required..!! ');
            } else if (second_install_amount === '') {
                swal('Valid Application Processing Fee Required..!! ');
            } else if (third_install_amount === '') {
                swal('Valid Module Mapping Amount Required..!! ');

            } else if (first_install_amount === '0' && second_install_amount === '0' && third_install_amount === '0') {

                swal('Make a Payment..!! ');

            } else if (amount === '') {
                swal('Amount Required..!! ');
            } else if (amount === 'NaN') {
                swal('Please Enter Valid Amount..!! ');
            } else if (amount > tot_c) {
                swal('Course Fee is ' + tot_c + '  , Please Check Amounts!!!');
                // alert('ii');

                // alert(amount);
                //alert(tot_c);
            } else {
                // alert(fullName+nameInitial+dob+gen+national+address+mobile+home+email+nic+date_app+office);
                jQuery.post('./backend/sendmail_online.php', {
                    dis: dis, idcourse: idcourse, course: course, name: name, id_stu: id_stu,
                    email: email, amount: amount, first_install_amount: first_install_change,
                    second_install_amount: second_install_change, third_install_amount: third_install_change,
                    first_date: first_date, second_date: second_date,
                    third_date: third_date, payid: payid, idfirst_install: idfirst_install, idsecond_install: idsecond_install,
                    idthird_install: idthird_install, idadmission: idadmission,admission_no:admission_no

                },
////                    position: position, from_em: from_em,
////                    to_em: to_em, cmpny_name_em: cmpny_name_em, o_l_A: o_l_A, o_l_B: o_l_B, o_l_C: o_l_C, o_l_S: o_l_S, year_o_l: year_o_l,
////                    a_l_A: a_l_A, a_l_B: a_l_B, a_l_C: a_l_C, a_l_S: a_l_S, year_a_l: year_a_l, stream: stream, pending_1: pending_1,
////                    pending_2: pending_2, pending_3: pending_3, nameInsti_quli: nameInsti_quli, Qulifi: Qulifi,
////                    from_quli: from_quli, to_quli: to_quli, grade_quli: grade_quli},
                        function (data, status) {

                            if (status === 'success') {
//                        // alert(data);
//                        // var row = JSON.parse(data);
//
//
                                if (data === 'ok') {
                                    swal('Successfully Updated..!', "", "success");
                                    location.href = 'invoice2.php?course=' + course;
                                } else {
                                    swal('Cannot Updated', "", "error");
                                }
                            }

                        }

                );
            }




        }
        
        
         function logout(){
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


    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

    <script src="assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
    <script src="assets/pages/jquery.sweet-alert.init.js"></script>






</body>
</html>