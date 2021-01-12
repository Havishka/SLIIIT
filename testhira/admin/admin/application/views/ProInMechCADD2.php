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
        	<h2 class="red-heading">Professional in Mechanical CADD</h2>
            <h3 class="black-heading"></h3>
            <!--<p class="para-text"></p>-->
			
            
         
        
        <hr>
        <h4 class="blue-heading"></h4>
        <p>Mechanical engineers design, analyse and help manufacture mechanical tools, engines, and machines. They are employed in almost all manufacturing sectors including Heavy machineries, ship building, aerospace, automobile. They are also employedin engineering services and product design companies. They, carry out a wide range of design and analysis activities, in the product development lifecycle. Their key tasks include: Concept Sketching, 2D Design & Drafting, 3D Modeling, Prototyping, and Performance & Safety Analysis. </p>
         <hr>
       
       
         <h4 class="blue-heading">Course Highlights  </h4>
            <ul>
            	<li>60 Contact hours  </li>
                <li>16 Sessions   </li>
                <li>Assured success industry wide   </li>
                <li>Learn powerful new tools of AutoCAD   </li>
                <li>Assistance by AutoCAD experts  </li>
                <li>Dedicated team to provide End to End Support  </li>
            </ul>
            <hr>
        <h4 class="blue-heading">Pre-Requisite  </h4>
        <p>Minimum qualification of GCE(A/L).   </p>
        <p>These are the courses that you have to complete to obtain Professional in Mechanical CADD</p>
        <ul><li><a href="<?php echo base_url(); ?>courses/auto_cad_2D">Auto CAD 2D</a></li></ul>
        <ul><li><a href="<?php echo base_url(); ?>courses/solidworks">Solidworks</a></li></ul>
        <ul><li><a href="<?php echo base_url(); ?>courses/ms_project_concepts">Project Managment Concepts</a></li></ul>
        <ul><li><a href="<?php echo base_url(); ?>courses/microsoft_proj">Microsoft Project</a></li></ul>
        
        
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
