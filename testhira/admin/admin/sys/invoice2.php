<?php // session_start(); ?>
<?php
//if (!isset($_SESSION['iduser_login'])) {
//    header('Location: online_login.php');
//}
//
//?>



  <?php
        include_once 'DB_3.php';
        $conn = DB_3::create_conn();
        
 $course = htmlspecialchars($_GET["course"]);
       
        $query = "SELECT * FROM `email/invoice` ORDER BY `idemail/invoice` DESC LIMIT 1";

   $rs2 = $conn->query($query);
   
    while ($row1 = mysqli_fetch_array($rs2)) {
            $name = $row1['name'] == null ? '' : $row1['name'];

            $idemail_invoice = $row1['idemail/invoice'] == null ? '' : $row1['idemail/invoice'];
            $admission_no = $row1['admission_no'] == null ? '' : $row1['admission_no'];
            $amount = $row1['amount'] == null ? '' : $row1['amount'];
            $date = $row1['date'] == null ? '' : $row1['date'];
            
            
            $remark = $row1['remark'] == null ? '' : $row1['remark'];
           
     
    }

?>


<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7 "> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <!--<![endif]-->
    <head>
        
          <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title> CADD CENTRE </title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Mobile Specific Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Favicons -->
        <link rel="shortcut icon" href="favicon2.ico"/>

        <link href="css/flower-loader-style.css" rel="stylesheet" type="text/css" />


        <title></title>
    </head>
   
    <body>
  
        
            <br/><br/>
         
         <div style="background-color: #ffffff; margin: 3% 10% 2% 10%;border: 2px solid #000" id='print_div' >
             <div style="margin-left: 5%;margin-right:3%;margin-bottom: 2%">
                 <br/>
                 <center>
                 <table>
                     <tr>
                         <td style="width: 200px"></td>
                         <td style="width: 500px"><h2 style="color: #000;display: inline"><center>Cash Receipt</center></h2></td>
                        
                         <td style="width: 200px;"><p style="display: inline;margin-left: 60%">No :<span style="color: #ff0000;margin-left: 3%"><?php echo $idemail_invoice;?></span></p></td>
                     </tr>
                 </table></center>
                 
                 <table>
                     <tr>
                         <td><img src="img/cadd-centre-logo.jpg" width="120" /></td>
                         <td style="width: 1150px"><h1 style="display: inline;margin-left: 3%;font-size: 22px;color: #ff0000">CADD CENTER LANKA (PVT) LTD</h1>
                 </td>
                         <td style="width: 200px">Date : <?php echo $date;?></td>
                     </tr>
                     </table>
                 <hr/>
                
                   <table style="display: inline">
                     <tr>
                         <td><b>Student Name</b> </td><td style="width: 20px;text-align: center"><b>:</b></td><td><b><?php echo $name?></b></td>
                     </tr><br/>
                     <tr><td><b>Amount Paid</b></td>
                         <td style="width: 80px;text-align: center"><b>:</b></td>
                         <td><b>Rs. <?php echo $amount;?></b></td>
                     </tr><br/>
                     <tr>
                         <td><b>Remarks</b></td>
                         <td style="width: 80px;text-align: center"><b>:</b></td>
                         <td><b><?php echo $course;?> - <?php echo $remark;?></b></td>
                     </tr>
                 </table>
                 <table style="display: inline;margin-left:20%">
                     <tr>
                         <td><b>Student ID</b></td>
                         <td style="width: 80px;text-align: center"><b>:</b></td>
                         <td><b><?php echo $admission_no;?> </b></td>
                     </tr>
                 </table>
                 
                 
                 
<!--                 <table style="margin-top: 0%" ><tr>
                         <td style="width: 500px;"><div style="margin-left: 0%;margin-top: 0%;">
                     <p>KASP Learning Management (Pvt) Ltd.<br/>
                     410,Pannipitiya Rd,Pelawatta,Battaramulla.<br/>
                     Tel : 0115115514/15/16<span style="margin-left: 3%"> Web : www.kasplearning.com</span></p>
                     
                 </div>
                </td>
                <td style="width: 440px"><p>This is a system generated invoice no signature is required.<br/></p>
                    <p style="color: #cc0000"><b> * Course fees are not refundable</b></p><br/>
                         </td>
                     
                     </tr></table>-->
                 
                 <table style="margin-top: 3%" ><tr>
                      
                <td style="width: 440px"><p>This is a system generated invoice will not carry any signature.<br/></p>
                    <p style="color: #cc0000"><b>* Course fees are not refundable</b></p><br/>
                         </td>
                        
                         
                     
                     </tr></table>
                    
                
              
             </div>
            </div>
          
           
    <center>
        <div><button onclick="divprint('print_div')" style="display: inline">Print</button>&nbsp;&nbsp;
        
            <a href="add_payment.php"> <button>Back</button></a>
        </div></center>
            
       
  
        
        
        
       
        
       
   <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>


               
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





                    function divprint(el) {

                        var page = document.body.innerHTML;
                        var printContaion = document.getElementById(el).innerHTML;
                        document.body.innerHTML = printContaion;
                        window.print();
                        document.body.innerHTML = page;
                        window.setTimeout('loaction.reload()', 3000);

                    }


                    


                </script>
                
</body> 
</html>
    