<?php $this->load->view('include/header'); ?>
<!--container -->
<div class="container bg-white main-container ">
	<!--banner-->
	<div class="main-banner">
    	 <div id="Carousel" class="carousel slide carousel-fade ">
    	
         <div class="carousel-inner">
        	<div class="item active">
               <div class="banner-caption">
            	<h1 class="text-uppercase">Courses 
To build ta 
better world 
through 
engineering
and design</h1>
                <!--<h2>Over 11 years of professional career development experience as an institute and conducts accredited courses of world renown software giants around the world.</h2>-->
                <button>Register Now              ></button>
            </div>
                    <img src="<?php echo base_url(); ?>images/banner/course.jpg" class="img-responsive"/>  
    		</div>
           
          
         </div>
           
        </div>
    
    </div>
    <!--banner /-->
    <!--left-->
    	<div class="col-md-9 left-content aboutus-page">
        	<h2 class="red-heading">Diploma in Graphic Design</h2>
            <h3 class="black-heading"></h3>
            <!--<p class="para-text"></p>-->
			
            
         
        
        <hr>
        <h4 class="blue-heading"> </h4>
        <p>The advanced courses in Graphics design, visual communication of information in print and electronic formats imparts sound knowledge of colours, images, typography and layout. The student will be able to design logos, grafx, brochures,, newsletters, posters, signs, etc for advertisement industry. The course on webdesign makes the student an expert in creating presentations in hypertext and hypermedia and web enabled software. The 3D Modeling and Animation program are designed for a career in the Modeling and Animation industry. </p>
         
         
            <hr>
         <h4 class="blue-heading">Course Highlights  </h4>
            <ul>
            	<li>160 Contact hours  </li>
                <li>Assured success industry wide   </li>
                <li>Dedicated team to provide End to End Support  </li>
            </ul>
            <hr>
        <h4 class="blue-heading">Pre-Requisite  </h4>
        <p>Minimum qualification of GCE(A/L).   </p>
         <p>These are the courses that you have to complete to obtain Diploma in Graphic Design</p>
        <ul><li><a href="<?php echo base_url(); ?>courses/coreldraw">CorelDRAW</a></li></ul>
        <ul><li><a href="">Ilustrator</a></li></ul>
        <ul><li><a href="<?php echo base_url(); ?>courses/photoshop">Photoshop</a></li></ul>
        <ul><li><a href="<?php echo base_url(); ?>courses/indesign">Indesign</a></li></ul>
        
          <hr>
       
       
     
            
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
