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
            <h3 class="black-heading"></h3>
            <!--<p class="para-text"></p>-->
			
            
         
        
        <hr>
        <h4 class="blue-heading"> </h4>
        <p>The Diploma in Architectural CADD program focuses to upskill the participants in the premium 2D drafting and building design soft tools. The course assists students to get complete understanding of the fundamentals and software tools by way of providing excellent coaching with an exclusive practice workbook to gain expertise in Architectural design and Project Management. The course gives participants an unmatched overview of the BIM concept, hands-on 2D CAD and building design soft tool and project management for architects, MEP and structural engineers, and construction professionals. </p>
       
         
           
            <hr>
         <h4 class="blue-heading">Course Highlights  </h4>
            <ul>
            	<li>120 Contact hours  </li>
                <li>Assured success industry wide   </li>
                <li>Learn powerful new tools of AutoCAD   </li>
                <li>Assistance by AutoCAD experts  </li>
                <li>Dedicated team to provide End to End Support  </li>
            </ul>
            <hr>
        <h4 class="blue-heading">Pre-Requisite  </h4>
        <p>Minimum qualification of GCE(A/L).   </p>
        <p>These are the courses that you have to complete to obtain Diploma in Architectural CADD</p>
        <ul><li><a href="<?php echo base_url(); ?>courses/auto_cad_2D">Auto CAD 2D</a></li></ul>
        		<ul>and you must choose</ul>
        <ul><li><a href="<?php echo base_url(); ?>courses/max_eng">Max for Engineers/Architecture</a></li></ul> <ul>or </ul>  
        <ul><li><a href="<?php echo base_url(); ?>courses/revit_architecture">Revit </a></li></ul>
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