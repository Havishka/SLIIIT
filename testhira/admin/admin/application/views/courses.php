<?php $this->load->view('include/header'); ?>
<!--container -->
<div class="container bg-white main-container ">
	<!--banner-->
	<div class="main-banner">
    	 <div id="Carousel" class="carousel slide carousel-fade ">
    	<ol class="carousel-indicators" >
            <li data-target="#Carousel" data-slide-to="0" class="active"></li>
            <li data-target="#Carousel" data-slide-to="1"></li>
            <li data-target="#Carousel" data-slide-to="2"></li>
           
        </ol>
        <div class="carousel-inner">
        	<div class="item active">
               <div class="banner-caption">
            	<h1 class="text-uppercase">Professional
in Project
Planning and
Management</h1>
                <h2> Get the cadd centre  advantage. 
grow global.</h2>
                <button>Register Now ></button>
            </div>
                    <img src="<?php echo base_url(); ?>images/banner/courses/Planning_and_Management.jpg" class="img-responsive"/>  
    		</div>
            
            <div class="item ">
               <div class="banner-caption">
            	<h1 class="text-uppercase">Professional
in Project
Planning and
Management</h1>
                <h2> Get the cadd centre  advantage. 
grow global.</h2>
                <button>Register Now ></button>
            </div>
                    <img src="<?php echo base_url(); ?>images/banner/courses/oracle.jpg" class="img-responsive"/>  
    		</div>
            
            <div class="item ">
               <div class="banner-caption">
            	<h1 class="text-uppercase">2D + 3D Cad</h1>
                <h2> Learn the essential methors to make three dimensional models in different fields of engineering. Get the cadd centre  advantage. grow global.</h2>
                <button>Register Now ></button>
            </div>
                    <img src="<?php echo base_url(); ?>images/banner/courses/cad_2d_3d.jpg" class="img-responsive"/>  
    		</div>
           
          
         </div>
          
        </div>
    
    </div>
    <!--banner /-->
    <!--left-->
    	<div class="col-md-9 left-content">
        	<h2 class="red-heading">Courses</h2>
            <p class="para-text">We offer a unique design and interdisciplinary curriculum delivered through a industry based learning approach. With a vibrant learning centres and development programmes, we help our students to make a difference in the world. </p>
			
            
         <!--course page -->
         <div class="col-md-12 no-pad courses-main-div">
         	<div class="col-md-4 course-div">
           
       	    <a href="<?php echo base_url(); ?>courses/Ccourse"><div class="course-div-img"><img src="<?php echo base_url(); ?>images/2.jpg" class="img-responsive" alt=""/> </div>
             <p>Certificet Courses</p>
            	</a>
            </div>
            <div class="col-md-4 course-div "><a href="<?php echo base_url(); ?>courses/Dprograms"><div class="course-div-img"><img src="<?php echo base_url(); ?>images/3.jpg" class="img-responsive" alt=""/></div>
            	<p style="background:#f26522;">Diploma Programs</p>
                </a>
            </div>
            <div class="col-md-4 course-div"><a href="<?php echo base_url(); ?>courses/Pprograms"><div class="course-div-img"><img src="<?php echo base_url(); ?>images/4.jpg" class="img-responsive" alt=""/></div>
            	<p style="background:#39b54a;">Professionl Programs</p>
                </a>
            </div>
         </div>
         <!-- / course page-->
         <p>In addition, we provide all our graduates with the skills and knowledge required to get through that all-important interview.</p>
<p>Browse through our course pages to find out how you can earn a certificate in Cadd Centre. Need further assistance, <strong>send your details</strong> or contact us <strong>via phone</strong> or <strong>email</strong> to us to get back.</p>
            
        </div>
    <!--left/-->
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