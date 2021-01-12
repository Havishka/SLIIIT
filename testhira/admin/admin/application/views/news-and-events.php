<?php $this->load->view('include/header'); ?>
<!--container -->
<div class="container bg-white main-container ">
	<!--banner-->
	<div class="main-banner">
    	 <div id="Carousel" class="carousel slide carousel-fade ">
     <div class="carousel-inner">
        	<div class="item active">
             <div class="banner-caption">
            	<h1 class="text-uppercase">Our flagship
Events and 
News </h1>
                <h2>A variety of events including lectures, seminars, student shows, exhibitions and contest helps our students focus better in their area of expertise.</h2>
                <button>Register Now              ></button>
            </div>
                    <img src="<?php echo base_url(); ?>images/banner/news_events.jpg" class="img-responsive"/>  
    		</div>
           
          
         </div>
           
        </div>
    
    </div>
    <!--banner /-->
    <!--left-->
    	<div class="col-md-9 left-content news-page">
        	<h2 class="red-heading">News &amp; Events</h2>
     <div class="news-div">
        <h4 class="blue-heading">Java Seminar:</h4>
        <h5>12th March 2017 @ CADD CENTRE</h5>
        <div class="row">
        	<div class="clo-md-12">
        	<div class="col-md-4"></div>
            <div class="col-md-8">Welcome to the Hands-On Java Seminar, a multimedia learning experience incorporating slides + audio lectures. This is based on Thinking in Java, Second Edition (the HTML version of the book is included in this seminar), published way back in 2000 for Java version 1.2.</div>
            </div>
              
        </div>
        
       
        </div>
        
        <div class="news-div">
        <h4 class="blue-heading">Plan Cadd Next</h4>
        <h5>24th March 2017 @ CADD CENTRE</h5>
        <div class="col-md-12">
        	<div class="col-md-4"></div>
            <div class="col-md-8">Plan CADD Next which is a foundation AutoCAD Program is now available for students of University of Peradeniya. You will be given a comprehensive guide about CAD and its usefulness.</div>
            
        </div>
        
         <div class="clearfix"></div>
        </div>
    
     	
            
        </div>
    <!--left/-->
    <!--right-->
    <?php
$this->load->view('include/right_panel_form');
?> 
    <!--right/-->
    <div class="clearfix"></div>
   
</div>
<!--container /-->
<?php
$this->load->view('include/footer');
?>    