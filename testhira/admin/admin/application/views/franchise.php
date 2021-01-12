

<?php $this->load->view('include/header'); ?>
<!--container -->
<div class="container bg-white main-container ">
   <!--banner-->
   <div class="main-banner">
      <div id="Carousel" class="carousel slide carousel-fade ">
         <div class="carousel-inner">
            <div class="item active">
               <div class="banner-caption">
                  <h1 class="text-uppercase">Welcome to 
                     Cadd Centre
                     Sri Lanka
                  </h1>
                  <h2>Browse our franchise details for unit and franchise opportunities in 
                     Sri Lanka. Join with us and grow with the World-Class Cadd Education.
                  </h2>
                  <!--<button>Register Now ></button>-->
               </div>
               <img src="<?php echo base_url(); ?>images/banner/2_new.jpg" class="img-responsive" />
            </div>
         </div>
      </div>
   </div>
   <!--banner /-->
   <!--left-->
   <div class="col-md-9 left-content news-page">
      <h2 class="red-heading">Franchise</h2>
      <h3>Design and Technology Training plays a critical role for the world’s economic development. </h3>
      <p>Investments in Training technology and education are the fundamental infrastructure help in building the same. Having said strong market potential for good quality technology training, CADD Center Srilanka now invites training partners all over Srilanka.</p>
      <p>The features of the partnership can be spoken in five points mentioned below:</p>
      <ul>
         <li>Mutually benefiting model</li>
         <li>Powerful System</li>
         <li>Highly Profitable</li>
         <li>Transparent</li>
         <li>Functional Support</li>
      </ul>
      <p>Grow with us. Become a training partner today!</p>
      <h3 class="blue-heading">Our Branch Locations:</h3>
      <p>Branch locations list given below.</p>
      
      <div class="row">
      
      <div class="col-md-12">
         <div class="col-md-10" style="background:#fafafa;border:1px solid #EDEDED;padding:20px;margin-bottom:25px;">
         	
            <img width="210" src="<?php echo base_url(); ?>/images/malabe_centre.jpg" style="border: 1px solid #cdcdcd;float: left;margin-right: 15px;padding: 5px;" />
            
            <address style="margin-bottom:0;">
               <strong>Malabe</strong><br>
               <font style="color:#CC0000;">CORPORATE HEAD OFFICE</font><br><br>
               Address :<br>
               No 436/B,<br>
               Kaduwela Road,<br>
               Pittugala,<br>
               Malabe<br><br>
               <i class="fa fa-phone"></i>  +94 117 204 204/ +94 777 309 077<br>
               <i class="fa fa-envelope"></i> info@caddcentre.lk,<br>
            </address>
            
         </div>
         
         <div class="clearfix"></div>
         
         <div class="col-md-6">
            <address>
               <strong>Colombo (Main Branch) </strong><br>
               2<sup>nd</sup> Floor, Methodist Central Building,<br>
               252, Galle Road, Colombo 03
               <br>
               Colombo<br>
               <i class="fa fa-phone"></i> +94 115 338 500<br>
               <i class="fa fa-envelope"></i> info@caddcentre.lk<br>
            </address>
         </div>
         
         <div class="col-md-6">
            <address>
               <strong>Bandarawela</strong><br>
               IDM Bandarawela <br>
               No 232 2/1 <br>
               Badulla road<br>
               Bandarawela<br>
               <i class="fa fa-phone"></i> +94 716 342 611<br>
               <i class="fa fa-envelope"></i> osadauk@gmail.com, 
            </address>
         </div>
         
         <div class="clearfix"></div>
         
         <div class="col-md-6">
            <address>
               <strong>Kurunagala </strong>
               <br>
               No 18, 1<sup>st</sup> Floor,<br>
               Jayawansa Building,<br>
               Mihindu Mawatha,<br>
               Kurunegala.<br>
               <i class="fa fa-phone"></i> +94 372 221 400<br>
               <i class="fa fa-phone"></i> +94 377 377 387
            </address>
         </div>
         
         <div class="col-md-6">
            <address>
               <strong>Kandy</strong><br>
               Kandy Center<br> 
               No 457,<br>
               Peradeniya Road,<br>
               Kandy <br>
               <i class="fa fa-phone"></i> +94 768 243 701<br>
               <i class="fa fa-phone"></i> +94 812 232 000<br>
               <i class="fa fa-envelope"></i> kandy@caddcentre.lk<br>
            </address>
         </div>
         
         <div class="clearfix"></div>
         
         <div class="col-md-6">
            <address>
               <strong>Badulla</strong>
               ETS - Badulla,<br> 
               No 07<br>
              Badulupitiya Road,<br>
               Badulla <br>
               
               <i class="fa fa-phone"></i> +94 557 200 215<br>
               <i class="fa fa-envelope"></i>  badulla@ets.lk<br>
            </address>
         </div>
         
         <div class="col-md-6">
            <address>
               <strong> Jaffna</strong>
               <br>Jaffna Branch, <br>
               No 53,<br>
               Point Pedro Road,<br>
               Jaffna.<br>
               <i class="fa fa-phone"></i> +94 217 200 406 <br>
               <i class="fa fa-envelope"></i> jaffna@caddcentre.lk<br>
            </address>
         </div>
         
         <div class="clearfix"></div>
         
         <div class="col-md-6">
            <address>
               <strong> Kegalle.</strong>
               ETS Training Centre, <br>
               No 314,<br>
               Kandy Road,<br>
               Kegalle.<br>
               <i class="fa fa-phone"></i> +94 355 110 110 <br>
               <i class="fa fa-envelope"></i> kegalle@ets.lk
            </address>
         </div>
      </div>
      
      </div>
      
   </div>
   <!--left/-->
   <!--right-->
   <?php
      //$this->load->view('include/panel_form');
      
      ?>
   <div class="col-md-3 right-content">
      <!--form-->
      <div class=" slant-div ">
         <a class="blue-bg white-color">FRANCHISE ENQUIRY</a>
      </div>
      <div class="quick-form">
         <?php echo $this->session->flashdata('success'); ?>
         <?php
            $attributes = array('class' => 'email', 'id' => 'insightform');
            
            	//$hidden = array('username' => 'Joe', 'member_id' => '234');
            
            	echo form_open_multipart('lanka/fra_enquiry');
            
            	  $attributes = array(
            
            		  'class' => 'mycustomclass',
            
            		  'style' => 'color: #000;'
            
            	  );
            
            	?>
         <feildset>
            <div class="form-group">
               <input data-title="Please enter your first name" name="fname" class="form-control" required placeholder="First Name" data-regex="^(?![0-9]).*?$" />
            </div>
            <div class="form-group">
               <input data-title="Please enter your last name" name="lname" class="form-control" required placeholder="Last Name" data-regex="^(?![0-9]).*?$" />
            </div>
            <div class="form-group">
               <input data-title="Please enter your Email ID" name="email" type="email" class="form-control" required placeholder="Email Address">
            </div>
            <div class="form-group">
               <input data-title="Please enter your Phone number" name="phone" class="form-control" required placeholder="Phone" data-regex="^[1-9]\d*$">
            </div>
            <div class="form-group">
               <textarea class="form-control" data-title="Please enter your address" name="address" required rows="3" placeholder="Address"></textarea>
            </div>
            <div class="alert alert-danger">
            </div>
            <div class="form-group text-center">
               <button class="btn btn-default" type="submit">Submit</button>
            </div>
         </feildset>
         </form>
      </div>
      <!--/form-->
   </div>
   <!--right/-->
   <div class="clearfix"></div>
</div>
<!--container /-->
<?php
   $this->load->view('include/footer');
   
   ?>

