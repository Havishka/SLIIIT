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

             

                    <img src="<?php echo base_url(); ?>images/banner/how_to_join.jpg" class="img-responsive"/>  

    		</div>

           

          

         </div>

           

        </div>

    

    </div>

    <!--banner /-->

    <!--left-->

    	<div class="col-md-12 left-content news-page" id="joinForm">

        	<h2 class="red-heading">Job Portal – Registration form</h2>

     		

        	<?php echo $this->session->flashdata('success'); ?>

        	<?php

            	

            	$attributes = array('class' => 'email', 'id' => 'insightform');

                echo form_open_multipart('lanka/career_reg');

                  $attributes = array(

                      'class' => 'form-horizontal',

                      'style' => 'color: #000;'

                  );

            ?>



     		<!--<form class="form-horizontal" role="form">-->

                   

				<div class="col-md-12">

					<div class="col-md-6 form-group">

						 <label for="register_no" class="control-label">Register No :</label>

						 <input type="text" id="register_no" name="register_no" placeholder="Register No" class="form-control" autofocus required="required">

						 

					</div>

					<div class="col-md-6 form-group">

						 <label for="fulname" class="control-label">Full Name :</label>

						<input type="text" id="fulname" name="fulname" placeholder="Full Name" class="form-control" required="required">

						 

					</div>

				</div>

           

				<div class="col-md-12">

					<div class="col-md-6 form-group">

						<label for="address" class="control-label">Address :</label><br>

						<textarea class="form-control custom-control" id="address" name="address" required="required"></textarea>

					</div>

					<div class="col-md-6 form-group">

						<label for="dob" class="control-label">Date of birth :</label>

						<div class="input-group date">

					      <input type="text" id="dob" name="dob" class="form-control datepicker" required="required">

					      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>

					    </div>



					</div>

				</div>

               

				<div class="col-md-12">

					<div class="col-md-6 form-group">

						 <label for="age" class="control-label">Age :</label>

						 <input type="text" id="age" name="age" class="form-control" required="required">

						 

					</div>

						<div class="col-md-6 form-group">

						 <label for="gender" class="control-label">Gender :</label>

						 <input type="text" id="gender" name="gender" class="form-control" required="required">

						 

					</div>

				</div>



                 

				<div class="col-md-12">

					<div class="col-md-6 form-group">

						 <label for="phone_no" class="control-label">Phone No :</label>

						 <input type="tel" id="phone_no" name="phone_no" class="form-control">

						 

					</div>

					<div class="col-md-6 form-group">

						 <label for="residence" class="control-label">Residence  :</label>

						 <input type="address" id="residence" name="residence" class="form-control" required="required">

						 

					</div>

				</div>

                 

				<div class="col-md-12">

					<div class="col-md-6 form-group">

						 <label for="mobile" class="control-label">Mobile :</label>

						 <input type="text" id="mobile" name="mobile" class="form-control" required="required">

						 

					</div>

						<div class="col-md-6 form-group">

						 <label for="email" class="control-label">E mail :</label>

						 <input type="text" id="email" name="email" class="form-control" required="required">

						 

					</div>

				</div>

              

				<div class="col-md-12">

					

					<div class="col-md-12">

						<label for="course" class="control-label">Courses completed with CADD centre :</label>

					</div>

						

					<div  class="col-md-3 form-group">

						<label for="coursename" class="control-label">Course 1 :</label>

						<input type="text" name="coursename[]" class="form-control">

					</div>

					

					<div  class="col-md-3 form-group">

						<label for="coursename" class="control-label">Course 2 :</label>

						<input type="text" name="coursename[]" class="form-control">

					</div>



					<div  class="col-md-3 form-group">

						<label for="coursename" class="control-label">Course 3 :</label>

						<input type="text" name="coursename[]" class="form-control">

					</div>



					<div  class="col-md-3 form-group">

						<label for="coursename" class="control-label">Course 4 :</label>

						<input type="text" name="coursename[]" class="form-control">

					</div>

				</div>

              

				<div class="col-md-12">

					<div class="col-md-6 form-group">

						 <label for="interested" class="control-label">Interested Job Areas :</label>

						 <select id="interested" name="interested" class="form-control" autofocus required="required">

							<option value="">Select</option>

							<option>Civil</option>

							<option>Mechanical</option>

							<option>Architectural</option>

							<option>Interior Design</option>

						</select>

					</div>

					<div class="col-md-6 form-group">

						<label for="locations" class="control-label">Locations :</label>

						<select id="locations" name="locations" class="form-control" autofocus required="required">

							<option value="">Select</option>

							<option>Foreign</option>

							<option>Local</option>

						</select>

					</div>

				</div>



             



				<div class="col-md-12">

					<div class="col-md-6 form-group">

						 <label for="category" class="control-label">Category :</label>

						 <select id="category" name="category" class="form-control" autofocus required="required">

							 <option value="">Select</option>

							 <option>Full time</option>

							 <option>Part time</option>

						</select>

						 

					</div>

					<div class="col-md-6 form-group">

						 <label for="resume" class="control-label">Upload Your CV :</label>

						 <input type="file" id="resume" name="resume" class="form-control" required="required">

					</div>

				</div>

             

                <div class="form-group">

					<div class="col-md-2">

						<div class="col-md-12">

							<button type="submit" class="btn btn-primary btn-block">Register</button>

						</div>

					</div>

				</div>

            

            </form> 

        

    		

     	

            

        </div>

    <!--left/-->

    <!--right-->

    <?php

//$this->load->view('include/panel_form');

?> 

    <!--right/-->

    <div class="clearfix"></div>

   

</div>

<!--container /-->

<?php

$this->load->view('include/footer');

?>



