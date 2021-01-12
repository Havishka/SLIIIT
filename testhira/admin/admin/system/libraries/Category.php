<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CI_Category {
	
	function __construct()
	{
		$this->CI =& get_instance();
		//$this->CI->load->database();
	}
  public function show_category()
  {
	  
    return 'Hello World';
  }
}