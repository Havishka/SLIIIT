 <div class="col-md-3 right-content">

		<div class=" slant-div ">

        	<a class="blue-bg white-color">BROCHURE</a>

		</div>

        <div class="broucher-right"><img src="<?php echo base_url();?>images/dummy-broucher.jpg" class="img-responsive" alt=""/>

        	<p>Download the general course

<a href="<?php echo base_url()?>assets/cadd_lanka_brochure.pdf" target="_blank">brochure here</a>.</p>

        </div>
        
                


        

        <!--form-->

        <div class=" slant-div ">

        	<a class="blue-bg white-color">QUICK ENQUIRY</a>

		</div>

        <div class="quick-form">

        	 <?php echo $this->session->flashdata('success'); ?>

        <?php

            $attributes = array('class' => 'email', 'id' => 'insightform');

                //$hidden = array('username' => 'Joe', 'member_id' => '234');

                echo form_open_multipart('lanka/cadd_enquiry');

                  $attributes = array(

                      'class' => 'mycustomclass',

                      'style' => 'color: #000;'

                  );

                ?>

          <feildset>

            <div class="form-group">

              <input data-title="Please enter your first name" name="fname" class="form-control" required placeholder="First Name" data-regex="^(?![0-9]).*?$" />

            </div>

                        <div class="form-group">

              <input data-title="Please enter your last name" name="lname" class="form-control" required placeholder="Last Name" data-regex="^(?![0-9]).*?$" />

            </div>

                          <div class="form-group">

                        <textarea class="form-control" data-title="Please enter your address" name="address" required rows="3" placeholder="Address"></textarea>

                      </div>

            

            <div class="form-group">

            	<input data-title="Please enter your Course In" name="courseIntrested" class="form-control" required placeholder="Course Intrested">

            </div>
            
            <div class="form-group">

                <select data-title="Please Select Centre Location" id="centre" name="centre" class="form-control" required>
                     <option value="">Select Centre Location</option>
                     <option>Malabe</option>
                     <option>Batticaloa</option>
                     <option>Bandarawela</option>
                     <option>Kollupitiya</option>
                     <option>Kurunagala</option>
                     <option>Anuradapura</option>
                     <option>Polonnaruwa</option>
                     <option>Jaffna</option>
                     <option>Kegalle</option>
                </select>
                
            </div>
            

              <div class="form-group">

            <input data-title="Please enter your Phone number" name="phone" class="form-control" required placeholder="Phone">

            </div>

            <div class="alert alert-danger">



            </div>

            <div class="form-group text-center">

              <button class="btn btn-default" type="submit">Submit</button>

            </div>

          </feildset>

        </form>

        </div>

        <!--/form-->

        

     <?php include('other_courses.php');?>   

    

    </div>