<?php $this->load->view('include/header'); ?>
<!--container -->
<div class="container bg-white main-container ">
	<!--banner-->
	<div class="main-banner">
    	 <div id="Carousel" class="carousel slide carousel-fade ">
    	
        <div class="carousel-inner">
        	<div class="item active">
             <div class="banner-caption">
            	<h1 class="text-uppercase">an ewis group company.</h1>
                <h2>Over 11 years of professional career development experience as an institute and conducts accredited courses of world renown software giants around the world.</h2>
                <button>Register Now              ></button>
            </div>
                    <img src="<?php echo base_url(); ?>images/banner/about.jpg" class="img-responsive"/>  
    		</div>
           
          
         </div>
          
        </div>
    
    </div>
    <!--banner /-->
    <!--left-->
    	<div class="col-md-9 left-content aboutus-page">
        	<h2 class="red-heading">About Us</h2>
            <h3 class="black-heading">Welcome to CADD Centre Lanka, a EWIS Company that started in year 2002! CADD Centre is the fastest growing chain of engineering training centre and has founded several institutes under its umbrella, one of which is CADD Centre Lanka.  </h3>
            <p class="para-text">The industry experts of CADD Centre Lanka have designed the courses to ensure that our students graduate with cutting-edge skills and are valued by employers across the world.  The institution aspires to run along the best lines of education and become a center where teaching-learning process attains a deeper meaning. It also has a powerful team of professional trainers, who are well-versed with the concepts of Engineering, graphic designing, project management, interior design, and accredited programs of ACTA (Association of Construction Training Academy).  </p>
			
            <h5 class="">CADD Centre Lanka has meticulously planned campus providing great facilities such as: </h5>
            <ul>
            	<li>High-quality classroom environment.  </li>
                <li>Project work for the development of managerial skills and right exposure.  </li>
                <li>Offering training in renowned software bigwigs such as Autodesk, Bentley, Microsoft, Adobe, etc.  </li>
            </ul>
        
        <hr>
        <h4 class="blue-heading">Our Forte </h4>
        <p>Experience the finest Mechanical/Civil engineers as instructors who will share extensive experience gained from within the industry and taking teaching-learning process to the next level.  </p>
         <hr>
        <h4 class="blue-heading">Vision  </h4>
        <p>The vision of CADD Centre Lanka is to become a premier institute of academic excellence by imparting intellectual, professional, and technical skills within the students and working professionals. We intending to collaborate with learners and engage in the process of nation building.  </p>
         <hr>
        <h4 class="blue-heading">Offerings </h4>
        <p><em>Secure your space for the preferred class!</em><br>Students now have the biggest opportunity to enroll for certification programs in CAD modules, Solidworks and Autodesk. Students are invited to choose their preferred certification from worldwide-recognized CADD Centre for technical and productive study paths.    </p>
     
            
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