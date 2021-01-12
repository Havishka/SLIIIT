<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pro {
	
	 function __construct() {
        $this->CI =& get_instance(); //gives access to the CI object
    }

  public function show_hello_world()
  {
	   $this->CI =& get_instance();
    return 'Hello World';
  }
}