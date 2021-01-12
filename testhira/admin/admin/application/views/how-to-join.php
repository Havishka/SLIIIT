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

        	<h2 class="red-heading">How to Join CADDLanka</h2>

     		 

     		 <?php echo $this->session->flashdata('success'); ?>

        <?php

            $attributes = array('class' => 'email', 'id' => 'insightform');

                //$hidden = array('username' => 'Joe', 'member_id' => '234');

                echo form_open_multipart('lanka/how_to_join_reg');

                  $attributes = array(

                      'class' => 'form-horizontal',

                      'style' => 'color: #000;'

                  );

                ?>



     		 <!--<form class="form-horizontal" role="form">-->

                

                   

				<div class="col-md-12">

					

					<div class="col-md-6 form-group">

						 <label for="coursename" class="control-label">Course Name :</label>

						 <input type="text" id="coursename" required="required" name="courseName" placeholder="Course Name" class="form-control" autofocus>

						 

					</div>



					<div class="col-md-6 form-group">

						 <label for="specialization" class="control-label">Course Specialization :</label>

						 <select id="specialization" name="specialization"  class="form-control" required="required" autofocus>

							 <option value="">Select</option>

							 <option>AutoCAD</option>

							 <option>AutoCAD MEP</option>

							 <option>Revit</option>

							 <option>Revit MEP</option>

							 <option>Civil 3D</option>

							 <option>Primavera</option>

							 <option>PTC Creo</option>

							 <option>Project Management</option>

							 <option>Microsoft Project</option>

							 <option>3DS MAX</option>

							 <option>SolidWorks</option>

							 <option>Staad PRO</option>

						</select>

						 

					</div>





				 </div>

                

                	

                <div class="col-md-12">



					<div class="col-md-6">

						 <label for="fullname" class="control-label">Full Name :</label><br>

						 

						<div class="col-md-3 no-pad form-group">



							<select id="name" name="name"  class="form-control" autofocus>

								 <option value="">select</option>

								 <option value="Mr">Mr</option>

								 <option value="Ms">Ms</option>

							</select>

						</div>

						<div class="col-md-9 form-group"><input type="text" id="fullname" name="fullName" placeholder="Full Name" class="form-control" required="required" autofocus data-regex="^(?![0-9]).*?$"></div>

					</div>



					<div class="col-md-6 form-group">

						<label for="birthDate" class="control-label">Date of birth :</label>



						<div class="input-group date">

					      <input type="text" id="birthDate" class="form-control datepicker" name="dob" required="required" autofocus>

					      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>

					    </div>

						 

					</div>



				 </div>



                <div class="form-group col-md-12">

					<div class="col-md-12">

							 <label for="address" class="control-label">Home Address :</label><br>

							 <textarea class="form-control custom-control" id="address" name="address" required="required"></textarea>

					</div>

				 </div>

                  

                

				 <div class="col-md-12">



					<div class="col-md-6 form-group">

						 <label for="national_id" class="control-label">National ID / PP No :</label>

						 <input type="text" id="national_id" class="form-control" name="national_id">

					</div>



					<div class="col-md-6 form-group">

						 <label for="email" class="control-label">Email address :</label>

						 <input type="email" id="email" class="form-control" name="email" required="required">

					</div>







				 </div>

                 

				<div class="col-md-12">

					

					<div class="col-md-6 form-group">

						 <label for="mobile" class="control-label">Phone(Mobile & Res) :</label>

						 <input type="text" id="mobile" class="form-control" name="mobile" required="required">

						 

					</div>



					<div class="col-md-6 form-group">

						 <label for="occupation" class="control-label">Occupation :</label>

						 <input type="text" id="occupation" name="occupation" class="form-control" required="required">

						 

					</div>



				</div>



                 

				<div class="col-md-12">

					

					<div class="col-md-6 form-group">

						 <label for="institute_name" class="control-label">Company/ University/ Institute name :</label>

						 <input type="text" id="institute_name" name="institute_name" class="form-control">

						 

					</div>



					<div class="col-md-6" form-group>

						 <label for="institute_address" class="control-label">Company/ University/ Institute address :</label>

						 <input type="text" id="institute_address" name="institute_address" class="form-control">

						 

					</div>



				</div>

                 

				<div class="col-md-12">

					

					<div class="col-md-6 form-group">

						 <label for="institute_phone" class="control-label">Company/ University/ Phone no(office) :</label>

						 <input type="text" id="institute_phone" name="institute_phone" class="form-control">

						 

					</div>



					<div class="col-md-6 form-group">

						 <label for="institute_mobile" class="control-label">Company/ University/  Phone no(mobile) :</label>

						 <input type="text" id="institute_mobile" name="institute_mobile" class="form-control">

						 

					</div>



				 </div>

                  

                <!--<div class="form-group">

					<div class="col-md-12">

						

						<div class="col-md-6">

							 <label for="specialization" class="control-label">Please select :</label>

							 <select id="specialization" name="specialization"  class="form-control" autofocus>

								 <option></option>

							</select>

							 

						</div>



					</div>

				</div>-->



                <div class="form-group">

					<div class="col-md-12">

							 <label class="control-label">How did you here about the CADD CENTER Lanka:</label><br>

						<div class="col-md-4">

							<div class="checkbox">

                            <label>

                                <input type="checkbox" name="know_about[]" value="News Paper Advertisement">News Paper Advertisement

                            </label>

                        </div>

                        <div class="checkbox">

                            <label>

                                <input type="checkbox" name="know_about[]" value="Web Site">Web Site 

                            </label>

                        </div>

                      

                      

						</div>

						 <div class="col-md-4">

						 	  <div class="checkbox">

                            <label>

                                <input type="checkbox" name="know_about[]" value="News Letter">News Letter

                            </label>

							</div>

							 <div class="checkbox">

								<label>

									<input type="checkbox" name="know_about[]" value="From a Friend">From a Friend

								</label>

							</div>

						 </div>

						  <div class="col-md-4">

						 	  <div class="checkbox">

                            <label>

                                <input type="checkbox" name="know_about[]" value="Exhibition">Exhibition

                            </label>

							</div>

							 <div class="checkbox">

								<label>

									<input type="checkbox" name="know_about[]" value="E-Mail Advertisement">E-Mail Advertisement

								</label>

							</div>

						 </div>

							 

					

					</div>

				 </div>



				<div class="form-group">

					<div class="col-md-12">



				 		<label for="others" class="control-label">Others Please Specify:</label><br>

						<input type="text" id="others" name="others" class="form-control">

                 	

                 	</div>

                 </div>

                 

                    <div class="form-group">

					<div class="col-md-2">

						

					

							  <button type="submit" class="btn btn-primary btn-block">Register</button>

							

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