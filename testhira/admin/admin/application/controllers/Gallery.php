<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

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

	
	
	public function open_day_colombo(){
		
			$data['title'] = "CADDLanka - Colombo Open Day";
			$this->load->view('open_day_colombo', $data);
	} 
	
	public function cricket_festival(){
		
			$data['title'] = "CADDLanka - Cricket Festival";
			$this->load->view('cricket_festival', $data);
	} 
	
		public function Gcadd_open_day_2015(){
		
			$data['title'] = "CADDLanka - Cricket Festival";
			$this->load->view('Gcadd_open_day_2015', $data);
	} 
	
	public function Gcadd_edex_2016(){
		
			$data['title'] = "CADDLanka - Cadd Edex 2016";
			$this->load->view('Gcadd_edex_2016', $data);
	} 
	
	public function GNDT_get(){
		
			$data['title'] = "CADDLanka - NDT get together";
			$this->load->view('GNDT_get', $data);
	} 
	
	public function Gworkshop_ID(){
		
			$data['title'] = "CADDLanka - Workshop on Interior Designing";
			$this->load->view('Gworkshop_ID', $data);
	}
	
	public function Gaward_ceramony(){
		
			$data['title'] = "CADDLanka - Award Ceramony";
			$this->load->view('Gaward_ceramony', $data);
	}
	   
	   
	   public function Gchristmas_2015(){
		
			$data['title'] = "CADDLanka - Award Ceramony";
			$this->load->view('Gchristmas_2015', $data);
	}
	   
	    
	

	
	
}
