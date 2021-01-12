<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Lanka extends CI_Controller {

	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see https://codeigniter.com/user_guide/general/urls.html

	 */

	public function index()
	{

			$data['title'] = "Home";

			//echo $data['userid'];


			$this->load->view('home', $data);

		

		

	}

	

	public function cadd_lanka($value='')

	{

		$data['title'] = $this->uri->segment(2);

		$s = $this->uri->segment(2);

		$data['lanka'] = $s;

		$this->load->view($s, $data);

	}

	

	/*public function cadd_courses($value='')

	{

		$data['title'] = $this->uri->segment(3);

		$s = $this->uri->segment(3);

		$data['lanka'] = $s;

		$this->load->view($s, $data);

	}*/

	
	public function fra_enquiry()
	{

		$this->load->library('email');

		$data = array(

		'fname' => $this->input->post('fname'),

		'lname' => $this->input->post('lname'),

		'address' => $this->input->post('address'),

		'email' => $this->input->post('email'),

		'phone' => $this->input->post('phone')

		);
		
		
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$address = $this->input->post('address');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		
		
		$this->load->model('fra_model');
		
		//var_dump($data);
		
		$status = $this->fra_model->enquiry_insert($data);
		
		if($status != false){

			$subject = 'Franchise Enquiry - Form';
			
			$email_body ='<body>

			<div style="margin:0 auto; width:500px; padding:20px; background-color:#FFFFFF; font-family:Verdana, Geneva, sans-serif; font-size:14px; border-radius:10px;">

			<center> <h2 style="color:#CC0000; margin-top:0;">'.$subject.'</h2></center>

			<div style="border-top:1px solid #666666;">&nbsp;</div>

			<table cellpadding="5">

			 <tr><td>First Name</td><td>:</td><td>&nbsp;&nbsp;'.$fname.'</td><tr>

			 <tr><td>Last Name</td><td>:</td><td>&nbsp;&nbsp;'.$lname.'</td><tr>

			 <tr><td>E-mail</td><td>:</td><td>&nbsp;&nbsp;'.$email.'</td><tr>

			 <tr><td>Phone</td><td>:</td><td>&nbsp;&nbsp;'.$phone.'</td><tr>
			 
			 <tr><td>Address</td><td>:</td><td>&nbsp;&nbsp;'.$address.'</td><tr>

			</table>

			<p>

			<div style="border-top:1px solid #CCCCCC;text-align:center">

			<br>

			<a href="http://www.caddcentre.lk" style="color:#535353; text-decoration:none">Copyright &copy; 2017 www.caddcentre.lk</a></div>

			</p>

			</div>

			</body>';

			
			$this->email->set_mailtype("html");
			
			$this->email->to('kandy@caddcentre.lk','malabe@caddcentre.lk','kurunegala@caddcentre.lk','jaffna@caddcentre.lk');

	        $this->email->from('cadd@caddcentre.lk');

	        $this->email->subject($subject);

	        $this->email->message($email_body);

	        $this->email->send();

				

			$data['status'] = 1;

			$data['status_message'] = '<div class="alert alert-success"> New Asset has been successfully added</div>';

			$data['title'] = '';

			$data['active_tab'] = $this->input->post('active_tab');

			//redirect('dashboard/home/asset', 'refresh');

			$sucess = '<div class="alert alert-success">Enquiry Successfully Submited</div>';

			$message = $this->session->set_flashdata('success', $sucess);

			redirect(base_url().'cadd-lanka/franchise', 'refresh');

		}

		else{

				//$data['status_message'] ='<div class="alert alert-danger"> Error in uploading Asset</div>';

				//redirect('dashboard/asset', 'refresh');

			$sucess = '<div class="alert alert-danger">Database Error please contact site admin</div>';

			$message = $this->session->set_flashdata('success', $sucess);

			redirect(base_url().'cadd-lanka/franchise', 'refresh');

		}

		//redirect('dashboard/home/asset', 'refresh');

	}

	public function cadd_enquiry()
	{

		$this->load->library('email');

		$data = array(

		'fname' => $this->input->post('fname'),

		'lname' => $this->input->post('lname'),

		'address' => $this->input->post('address'),

		'courseIntrested' => $this->input->post('courseIntrested'),

		'phone' => $this->input->post('phone'),
		
		'centre' => $this->input->post('centre')

		);
		
		
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$address = $this->input->post('address');
		$courseIntrested = $this->input->post('courseIntrested');
		$phone = $this->input->post('phone');
		$centre = $this->input->post('centre');
		
		
		
		$this->load->model('assets_model');
		
		//var_dump($data);
		
		$status = $this->assets_model->enquiry_insert($data);

		if($status != false){

			$subject = 'Quick Enquiry - Form';
			
			$email_body ='<body>

			<div style="margin:0 auto; width:500px; padding:20px; background-color:#FFFFFF; font-family:Verdana, Geneva, sans-serif; font-size:14px; border-radius:10px;">

			<center> <h2 style="color:#CC0000; margin-top:0;">'.$subject.'</h2></center>

			<div style="border-top:1px solid #666666;">&nbsp;</div>

			<table cellpadding="5">

			 <tr><td>First Name</td><td>:</td><td>&nbsp;&nbsp;'.$fname.'</td><tr>

			 <tr><td>Last Name</td><td>:</td><td>&nbsp;&nbsp;'.$lname.'</td><tr>

			 <tr><td>Address</td><td>:</td><td>&nbsp;&nbsp;'.$address.'</td><tr>

			 <tr><td>Course</td><td>:</td><td>&nbsp;&nbsp;'.$courseIntrested.'</td><tr>

			 <tr><td>Phone</td><td>:</td><td>&nbsp;&nbsp;'.$phone.'</td><tr>
			 
			 <tr><td>Centre Location</td><td>:</td><td>&nbsp;&nbsp;'.$centre.'</td><tr>

			</table>

			<p>

			<div style="border-top:1px solid #CCCCCC;text-align:center">

			<br>

			<a href="http://www.caddcentre.lk" style="color:#535353; text-decoration:none">Copyright &copy; 2017 www.caddcentre.lk</a></div>

			</p>

			</div>

			</body>';
			
			
			$this->email->set_mailtype("html");
			
			if($centre=='Malabe'){ $this->email->to('info@caddcentre.lk'); }
			elseif($centre=='Batticaloa'){ $this->email->to('info@blueskycampus.com'); }
			elseif($centre=='Bandarawela'){ $this->email->to('osadauk@gmail.com'); }
			
			elseif($centre=='Kollupitiya'){ $this->email->to('cadd@caddcentre.lk'); }
			elseif($centre=='Kurunagala'){ $this->email->to('cadd@caddcentre.lk'); }
			
			elseif($centre=='Anuradapura'){ $this->email->to('e3anuradhapura@gmail.com'); }
			elseif($centre=='Polonnaruwa'){ $this->email->to('e3anuradhapura@gmail.com'); }
			elseif($centre=='Jaffna'){ $this->email->to('jaffna@caddcentre.lk'); }
			elseif($centre=='Kegalle'){ $this->email->to('kegalle@ets.lk '); }
			else{ $this->email->to('cadd@caddcentre.lk'); }
			
			//$this->email->bcc('web.support@caddcentre.com','pbkfbm@gmail.com');

	        $this->email->from('cadd@caddcentre.lk');

	        $this->email->subject($subject);

	        $this->email->message($email_body);

	        $this->email->send();

				

			$data['status'] = 1;

			$data['status_message'] = '<div class="alert alert-success"> New Asset has been successfully added</div>';

			$data['title'] = '';

			$data['active_tab'] = $this->input->post('active_tab');

			//redirect('dashboard/home/asset', 'refresh');

			$sucess = '<div class="alert alert-success">Enquiry Successfully Submited</div>';

			$message = $this->session->set_flashdata('success', $sucess);

			redirect(base_url().'courses', 'refresh');

		}

			

		else{

				//$data['status_message'] ='<div class="alert alert-danger"> Error in uploading Asset</div>';

				//redirect('dashboard/asset', 'refresh');

			$sucess = '<div class="alert alert-danger">Database Error please contact site admin</div>';

			$message = $this->session->set_flashdata('success', $sucess);

			redirect(base_url().'courses', 'refresh');

		}

		

		//redirect('dashboard/home/asset', 'refresh');

		

			

	}

	

	public function how_to_join_reg()

	{

		$this->load->library('email');

		extract($this->input->post());



		$know_about = implode(",",$know_about);



		$data = array(

			'courseName' => $courseName,

			'specialization' => $specialization,

			'name' => $name,

			'fullName' => $fullName,

			'dob' => $dob,

			'address' => $address,

			'national_id' => $national_id,

			'email' => $email,

			'mobile' => $mobile,

			'occupation' => $occupation,

			'institute_name' => $institute_name,

			'institute_address' => $institute_address,

			'institute_phone' => $institute_phone,

			'institute_mobile' => $institute_mobile,

			'know_about' => $know_about,

			'others' => $others

		);



		//var_dump($data);

		$this->load->model('how_to_join_model');

		$status = $this->how_to_join_model->form_insert($data);

		if($status == 1)

		{

			

			$subject = 'How to Join - Form';



			$email_body ='<body>

			<div style="margin:0 auto; width:500px; padding:20px; background-color:#f1f2f4; font-family:Verdana, Geneva, sans-serif; font-size:14px; border-radius:10px;">

			

			<center> <h2 style="color:#428bca; margin-top:0;">'.$subject.'</h2></center>

			<div style="border-top:1px solid #666666;">&nbsp;</div>

			<table cellpadding="5">

			 <tr><td>Course</td><td>:</td><td>&nbsp;&nbsp;'.$courseName.'</td><tr>

			 <tr><td>Specialization</td><td>:</td><td>&nbsp;&nbsp;'.$specialization.'</td><tr>

			 <tr><td>Full Name</td><td>:</td><td>&nbsp;&nbsp;'.$name.' '.$fullName.'</td><tr>

			 <tr><td>Date of birth</td><td>:</td><td>&nbsp;&nbsp;'.$dob.'</td><tr>

			 <tr><td>Address</td><td>:</td><td>&nbsp;&nbsp;'.$address.'</td><tr>

			 <tr><td>National ID</td><td>:</td><td>&nbsp;&nbsp;'.$national_id.'</td><tr>

			 <tr><td>Email</td><td>:</td><td>&nbsp;&nbsp;'.$email.'</td><tr>

			 <tr><td>Mobile</td><td>:</td><td>&nbsp;&nbsp;'.$mobile.'</td><tr>

			 <tr><td>Occupation</td><td>:</td><td>&nbsp;&nbsp;'.$occupation.'</td><tr>

			 <tr><td>Institute name</td><td>:</td><td>&nbsp;&nbsp;'.$institute_name.'</td><tr>

			 <tr><td>Institute address</td><td>:</td><td>&nbsp;&nbsp;'.$institute_address.'</td><tr>

			 <tr><td>Institute phone</td><td>:</td><td>&nbsp;&nbsp;'.$institute_phone.'</td><tr>

			 <tr><td>Institute mobile</td><td>:</td><td>&nbsp;&nbsp;'.$institute_mobile.'</td><tr>

			 <tr><td>Know About</td><td>:</td><td>&nbsp;&nbsp;'.$know_about.'</td><tr>

			 <tr><td>Others</td><td>:</td><td>&nbsp;&nbsp;'.$others.'</td><tr>

			</table>

			<p>

			<div style="border-top:1px solid #CCCCCC;text-align:center">

			<br>

			<a href="http://www.caddcentre.lk" style="color:#535353; text-decoration:none">Copyright &copy; 2017 www.caddcentre.lk</a></div>

			</p>

			</div>

			</body>';




			$this->email->set_mailtype("html");
			
			$this->email->to('cadd@caddcentre.lk');

	        $this->email->from('cadd@caddcentre.lk');

	        $this->email->subject($subject);

	        $this->email->message($email_body);

	        $this->email->send();



			$sucess = '<div class="alert alert-success">Form Successfully Submited</div>';

			$message = $this->session->set_flashdata('success', $sucess);

			redirect(base_url().'cadd-lanka/how-to-join', 'refresh');

		}

		else

		{

			

			$sucess = '<div class="alert alert-danger">Database Error please contact site admin</div>';

			$message = $this->session->set_flashdata('success', $sucess);

			redirect(base_url().'cadd-lanka/how-to-join', 'refresh');

		}

		



	}

	



	public function career_reg()

	{

		$this->load->library('email');

		extract($this->input->post());

		//print_r($this->input->post());



		$config['upload_path']          = './resumes/';

        $config['allowed_types']        = 'pdf|doc|docx';

        $config['max_size']             = 10000;

        $config['encrypt_name'] 		= TRUE;        



        $this->load->library('upload', $config);



        if ( ! $this->upload->do_upload('resume'))

        {

            $error = array('error' => $this->upload->display_errors());



            $sucess = '<div class="alert alert-danger">'.$error['error'].'</div>';

			$message = $this->session->set_flashdata('success', $sucess);

			redirect(base_url().'cadd-lanka/career', 'refresh');

        }

        else

        {

			$file_data = array('upload_data' => $this->upload->data());

			$file_details = $file_data['upload_data'];

			$file_name = $file_details['file_name'];



			$coursename = implode(",",$coursename);



			$data = array(

				'register_no' => $register_no,

				'fulname' => $fulname,

				'address' => $address,

				'dob' => $dob,

				'age' => $age,

				'gender' => $gender,

				'phone_no' => $phone_no,

				'residence' => $residence,

				'mobile' => $mobile,

				'email' => $email,

				'coursename' => $coursename,

				'interested' => $interested,

				'locations' => $locations,

				'category' => $category,

				'resume' => $file_name

			);

			

			$this->load->model('career_model');

			$status = $this->career_model->form_insert($data);

			if($status == 1)
			{

				$subject = 'Job Portal – Registration form';

				$email_body ='<body>

				<div style="margin:0 auto; width:500px; padding:20px; background-color:#FFFFFF; font-family:Verdana, Geneva, sans-serif; font-size:14px; border-radius:10px;">

				<center> <h2 style="color:#CC0000; margin-top:0;">'.$subject.'</h2></center>

				<div style="border-top:1px solid #666666;">&nbsp;</div>

				<table cellpadding="5">

				 <tr><td>Register No</td><td>:</td><td>&nbsp;&nbsp;'.$register_no.'</td><tr>

				 <tr><td>Full Name</td><td>:</td><td>&nbsp;&nbsp;'.$fulname.'</td><tr>

				 <tr><td>Address</td><td>:</td><td>&nbsp;&nbsp;'.$address.'</td><tr>

				 <tr><td>Date of birth</td><td>:</td><td>&nbsp;&nbsp;'.$dob.'</td><tr>

				 <tr><td>Age</td><td>:</td><td>&nbsp;&nbsp;'.$age.'</td><tr>

				 <tr><td>Gender</td><td>:</td><td>&nbsp;&nbsp;'.$gender.'</td><tr>

				 <tr><td>Phone No</td><td>:</td><td>&nbsp;&nbsp;'.$phone_no.'</td><tr>

				 <tr><td>Residence</td><td>:</td><td>&nbsp;&nbsp;'.$residence.'</td><tr>

				 <tr><td>Mobile</td><td>:</td><td>&nbsp;&nbsp;'.$mobile.'</td><tr>

				 <tr><td>Email</td><td>:</td><td>&nbsp;&nbsp;'.$email.'</td><tr>

				 <tr><td>Coursename</td><td>:</td><td>&nbsp;&nbsp;'.$coursename.'</td><tr>

				 <tr><td>Interested</td><td>:</td><td>&nbsp;&nbsp;'.$interested.'</td><tr>

				 <tr><td>Locations</td><td>:</td><td>&nbsp;&nbsp;'.$locations.'</td><tr>

				 <tr><td>Category</td><td>:</td><td>&nbsp;&nbsp;'.$category.'</td><tr>

				 <tr><td>Resume</td><td>:</td>

				 	<td>&nbsp; <a href="'.base_url().'resumes/'.$file_name.'">Download</a></td><tr>

				</table>

				<p>

				<div style="border-top:1px solid #CCCCCC;text-align:center">

				<br>

				<a href="http://www.caddcentre.lk" style="color:#535353; text-decoration:none">Copyright &copy; 2017 www.caddcentre.lk</a></div>

				</p>

				</div>

				</body>';




				$this->email->set_mailtype("html");
				
				$this->email->to('cadd@caddcentre.lk');

		        $this->email->from('cadd@caddcentre.lk');

		        $this->email->subject($subject);

		        $this->email->message($email_body);

		        $this->email->send();



				$sucess = '<div class="alert alert-success">Form Successfully Submited</div>';

				$message = $this->session->set_flashdata('success', $sucess);

				redirect(base_url().'cadd-lanka/career', 'refresh');

			}

			else

			{

				$sucess = '<div class="alert alert-danger">Database Error please contact site admin</div>';

				$message = $this->session->set_flashdata('success', $sucess);

				redirect(base_url().'cadd-lanka/career', 'refresh');

			}



        }



	}

	

	public function about(){

		

			$data['title'] = "About CADDLanka";

			$this->load->view('about', $data);

	}

	

	public function news_and_events(){

		

			$data['title'] = "News & Events CADDLanka";

			$this->load->view('news_and_events', $data);

	}

	public function testimonials(){

		

			$data['title'] = "Student Testimonials CADDLanka";

			$this->load->view('testimonials', $data);

	}

	

	public function franchise(){

		

			$data['title'] = "Franchise CADDLanka";

			$this->load->view('franchise', $data);

	}

	

	public function how_to_join(){

		

			$data['title'] = "How to Join CADDLanka";

			$this->load->view('how_to_join', $data);

	}

	public function contacts(){

		

			$data['title'] = "Contact CADDLanka";

			$this->load->view('contacts', $data);

	}

	public function gallery(){

		

			$data['title'] = "Gallery CADDLanka";

			$this->load->view('gallery', $data);

	}

	public function courses_calendar(){

		

			$data['title'] = "Gallery CADDLanka";

			$this->load->view('courses_calendar', $data);

	}

	

	



	

	

}

