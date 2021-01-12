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
        	<h2 class="red-heading">Professional Course on Civil CADD</h2>
            <h3 class="black-heading"></h3>
            <!--<p class="para-text"></p>-->
			
            
         
        
        <hr>
        <h4 class="blue-heading"></h4>
        <p>CADD Centre’s Professional programs in Civil CADD is suitable for Civil engineers and experienced diploma engineers in the Civil stream. This program will help the participants to improve the productivity skills and improve their career prospects. Participants will benefit greatly from this program and will help them to keep abreast of the latest technology. The course imparts training to the students starting from 2D drawing, Structural Analysis and Project management.</p>
         <hr>
       
        
        
         <h4 class="blue-heading">Course Highlights  </h4>
            <ul>
            	<li>166 Contact hours  </li>
                <li>Assured success industry wide   </li>
                <li>Learn powerful new tools of AutoCAD   </li>
                <li>Dedicated team to provide End to End Support  </li>
            </ul>
            <hr>
        <h4 class="blue-heading">Pre-Requisite  </h4>
        <p>Minimum qualification of GCE(A/L).   </p>
        <p>These are the courses that you have to complete to obtain Professional Course on Civil CADD</p>
        <ul><li><a href="<?php echo base_url(); ?>courses/auto_cad_2D">Auto CAD 2D</a></li></ul>
        <ul><li><a href="<?php echo base_url(); ?>courses/staad_pro">STAAD.Pro</a></li></ul>
        <ul><li><a href="<?php echo base_url(); ?>courses/ms_project_concepts">Project Managment Concepts</a></li></ul>
        <ul><li><a href="<?php echo base_url(); ?>courses/prim_complete">Primavera Complete</a></li></ul>
        
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
