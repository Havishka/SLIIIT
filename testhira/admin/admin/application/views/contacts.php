<?php $this->load->view('include/header'); ?>
<!--container -->
<div class="container bg-white main-container ">
	<!--banner-->
	<div class="main-banner">
    	 <div id="Carousel" class="carousel slide carousel-fade ">
    
        <div class="carousel-inner">
        	<div class="item active">
             <div class="banner-caption">
            	<h1 class="text-uppercase">Find the
right course
for you</h1>
                <h2>Join and deepen your knowledge across engineering design and design thinking.</h2>
                <button>Register Now              ></button>
            </div>
                    <img src="<?php echo base_url(); ?>images/banner/contact.jpg" class="img-responsive"/>  
    		</div>
           
          
         </div>
           
        </div>
    
    </div>
    <!--banner /-->
    <!--left-->
    	<div class="col-md-9 left-content news-page">
        
        	<h2 class="red-heading">Contacts</h2>
     
        	<address>
            	Methodist Central Building, <br>

02nd Floor,252, Galle Road, <br>

Colombo 03, Sri Lanka. <br>
            </address><br>
            
            <h2 class="blue-heading">GET IN TOUCH </h2>
<i class="fa fa-phone"></i> +94-11-5338500, +94-77-2919595 <br> 

<i class="fa fa-fax"></i> +94-11-5338501 <br>
    
     	
            
        </div>
    <!--left/-->
    <!--right-->
    <?php
$this->load->view('include/panel_form');
?> 
    <!--right/-->
    <div class="clearfix"></div>
   
</div>
<!--container /-->
<?php
$this->load->view('include/footer');
?>    