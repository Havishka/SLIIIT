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
        	<h2 class="red-heading">Diploma in Architectural CADD</h2>
            <h3 class="black-heading"> </h3>
            <!--<p class="para-text"></p>-->
			
            
         
        
        <hr>
        <h4 class="blue-heading">Objectives </h4>
        <p>CADD Centre Lanka’s program will help professionals to transform the quality of structural design in 2D and 3D format that will increase the designer’s productivity.   </p>
         <hr>
        <h4 class="blue-heading">Who Should be Aiming for the Course?   </h4>
        <ul>
        	<li>Students with basic knowledge of AutoCAD.   </li>
            <li>Professionals who want to learn multiple applications of AutoCAD tools and excel in 2D and 3D drafting.   </li>
        </ul>
         <hr>
         <h4 class="blue-heading">What’s in it for me?  </h4>
         <p>After successful completion of the course, students will be able to run significant operations.   </p>
            <ul>
            	<li>Easily make 2D and 3D engineering drawings.   </li>
                <li>Navigate the AutoCAD interface in comfortable manner.   </li>
                <li>Become confident to present technical drawings in an impressive and detailed layout.   </li>
                <li>Students will be eligible to attain official Autodesk Professional Certification.  </li>
                <li>Graduates of the program will easily find employment in design & architectural firms, engineering companies and own their construction business.  </li>
            </ul>
            <hr>
         <h4 class="blue-heading">Course Highlights  </h4>
            <ul>
            	<li>60 Contact Hours  </li>
                <li>16 Sessions   </li>
                <li>Assured success industry wide   </li>
                <li>Learn powerful new tools of AutoCAD   </li>
                <li>Assistance by AutoCAD experts  </li>
                <li>Dedicated team to provide End to End Support  </li>
            </ul>
            <hr>
        <h4 class="blue-heading">Pre-Requisite  </h4>
        <p>Minimum qualification of GCE(A/L).   </p>
        <p>These are the courses that you have to complete to obtain Diploma in CAD</p>
        <ul><li><a href="<?php echo base_url(); ?>courses/auto_cad_2d_3D">Auto CAD 2D</a></li></ul>
        <ul><li><a href="<?php echo base_url(); ?>courses/revit_mep">Revit MEP</a></li></ul>
         
        
        
       
     
            
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