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
            
             
                    <img src="<?php echo base_url(); ?>images/banner/1.jpg" class="img-responsive"/>  
    		</div>
            <div class="item">
              <img src="<?php echo base_url(); ?>images/banner/2.jpg" class="img-responsive"/>  
    		</div>
            <div class="item">
              <img src="<?php echo base_url(); ?>images/banner/3.jpg" class="img-responsive"/>  
    		</div>
          
         </div>
           <!--<a class="left carousel-control" href="#Carousel" data-slide="prev" style="color:#000; left:-4%; ">
            <span class="glyphicon glyphicon-chevron-left" style="color:#000;"></span>
        </a>
        <a class="right carousel-control" href="#Carousel" data-slide="next" style="color:#000; right:-4%;">
            <span class="glyphicon glyphicon-chevron-right"  style="color:#000; "></span>
        </a>-->
        </div>
    
    </div>
    <!--banner /-->
    <!--left-->
    	<div class="col-md-9 left-content">
        	<h2 class="red-heading">Empower the world with a Quality Education. Create your own path to a successfull career.</h2>
            <p class="para-text">CADD Centre Sri Lanka, offers you an extensive range of study options at both the undergraduate and postgraduate levels. These courses cover a wide range of disciplines such as  autodesk, bentley, primavera inc., adobe, microsoft, cisco, red hat etc.CADD centre lanka india being the franchise holder of CADD centre lanka, provides the students high quality courseware, well recognized certificates of competence, capable lecturers & instructors and a quality classroom environment. </p>
			<p class="para-text">In addition, we provide all our graduates with the skills and knowledge required to get through that all-important interview.</p>
            
            <div class="col-md-12 bg-grey quick-links">
            	 <div id="Carousel2" class="carousel slide carousel-fade ">
    	<ol class="carousel-indicators" >
            <li data-target="#Carousel2" data-slide-to="0" class="active"></li>
            <li data-target="#Carousel2" data-slide-to="1"></li>
             <li data-target="#Carousel2" data-slide-to="2"></li>
              <li data-target="#Carousel2" data-slide-to="3"></li>
            
           
        </ol>
        <h2 class="red-heading">Quick Links - Featured Courses</h2>
            <p>Find the perfect Course for you.</p>
        <div class="carousel-inner">
        	
        	<div class="item active quick-links-items " >
             	<div class="col-md-12 no-pad ">
                	<div class="col-md-2 no-pad"><img src="<?php echo base_url(); ?>images/AutoCad.png" class="img-responsive" alt=""/></div>
                  <div class="col-md-10" >
                  		<h3>Auto CAD 2D + 3D</h3>
                        <p>CADD Centre Lanka’s program will help professionals to transform the quality of structural design in 2D and 3D format that will increase the designer’s productivity.</p>
                        <a href="courses/auto_cad_2D">View Course ></a>
                  </div>
                <!--  <div class="col-md-2 "><img src="<?php echo base_url(); ?>images/courses/b.jpg" class="img-responsive" alt=""/></div>
                  <div class="clearfix"></div>-->
                </div>
                      
    		</div>
            
            <div class="item quick-links-items " >
             	<div class="col-md-12 no-pad">
                	<div class="col-md-2 no-pad"><img src="<?php echo base_url(); ?>images/Civil-3D.png" class="img-responsive" alt=""/></div>
                  <div class="col-md-10 " >
                  		<h3>AutoCAD Civil 3D</h3>
                        <p>AutoCAD Civil 3D is an Autodesk’s infrastructure that is designed to help professionals use Civil Design, Civil Design 3D, and Civil Design Professional software support program.</p>
                        <a href="courses/auto_cad_civil_3d">View Course ></a>
                  </div>
                 
                </div>
                      
    		</div>
               <div class="item quick-links-items " >
             	<div class="col-md-12 no-pad">
                	<div class="col-md-2 no-pad"><img src="<?php echo base_url(); ?>images/Project-Management.png" class="img-responsive" alt=""/></div>
                  <div class="col-md-10 " >
                  		<h3>Project Planning and Management</h3>
                        <p>The course will help applicants to accomplish sound grounding project management principles and encourage participants to adopt them in their model projects.</p>
                        <a hidden="courses/professional_in_project_planning_and_management">View Course ></a>
                  </div>
                 
                </div>
                      
    		</div>
             <div class="item quick-links-items " >
             	<div class="col-md-12 no-pad">
                	<div class="col-md-2 no-pad"><img src="<?php echo base_url(); ?>images/3DS-MAX.png" class="img-responsive" alt=""/></div>
                  <div class="col-md-10" >
                  		<h3>3DS MAX</h3>
                        <p>3d Max from Autodesk is considered as engineering and entertainment design tool and is used by professionals in video games, product designing, film, and motion graphics industry.</p>
                        <a href="courses/three_ds_max">View Course ></a>
                  </div>
                 
                </div>
                      
    		</div>
            
          
            
         </div>
           <!--<a class="left carousel-control" href="#Carousel2" data-slide="prev" style="color:#000;">
            <span class="glyphicon glyphicon-chevron-left" style="color:#f0f0f0;"></span>
            </a>
            <a class="right carousel-control" href="#Carousel2" data-slide="next" style="color:#000;">
                <span class="glyphicon glyphicon-chevron-right"  style="color:#f0f0f0; "></span>
            </a>-->
            </div>
       	</div>
            
        </div>
    <!--left/-->
    <!--right-->
    <div class="col-md-3 right-content">
		<?php include("home_course.php"); ?>
    </div>
    <!--right/-->
    <div class="clearfix"></div>
    <div class="col-md-12 " style="margin-top:40px;">
    
    	<div class="col-md-6 text-left blue-heading">Event Updates</div>
        <div class="col-md-6 text-right blue-heading hidden-xs">Announcements</div>
        <div class="col-md-12 slant-div blue-bg no-pad">
        <div class="col-md-6 no-pad">
                <div class="event">
                	<div class="event-list">
                        <h4 class="text-uppercase">Java Seminar</h4>
                        <p >24th November @ CADD CENTRE</p>
                    </div>
                    <div class="event-list">
                        <h4 class="text-uppercase">Plan CADD Next</h4>
                        <p>Plan CADD Next which is a foundation AutoCAD Program is 
now available for students of University of Peradeniya. 
You will be given a comprehensive guide about CAD 
and its usefulness.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 no-pad bg-grey announcement" style="" >
           			 <div class=" announcement-div">
                	<div class="announcement-list">
                        <h4 class="text-uppercase">National Winner : University of Peradeniya</h4>
                        <h5 >1st Runner up :</h5>
                        <p>Sri Lanka Institute of Information Technology (SLIIT)</p>
                    </div>
                    <div class="announcement-list">
                         <h5 >2nd Runner up:</h5>
                        <p>Sri Lanka College of Technology - Colombo 10</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            
        </div>
    </div>
</div>
<!--container /-->
<?php
$this->load->view('include/footer');
?>    