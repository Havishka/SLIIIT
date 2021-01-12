<?php
class Career_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
    }
	
	
	function form_insert($data){

		$this->load->database();

		//print_r($this->db);
		if($this->db->insert('career', $data))
		{
			return '1';
		}
		else
		{
			return '0';
		}

	}
	
		
}