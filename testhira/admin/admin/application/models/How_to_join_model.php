<?php
class How_to_join_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
    }
	
	
	function form_insert($data){

		$this->load->database();

		//print_r($this->db);
		if($this->db->insert('how_to_join', $data))
		{
			return '1';
		}
		else
		{
			return '0';
		}

	}
	
	/*function form_insert($data){
		$sql = "INSERT INTO quick_enquiry(first_name, last_name, address, course_intrested, phone) VALUES (:fname, :lname, :address, :courseIntrested, :phone)";
		//$sql = "INSERT INTO asset(asset_id, asset_name ) VALUES ( :asset_id, :asset_name)";
		
		$stmt = $this->db->conn_id->prepare($sql);  
		$stmt->bindParam(":fname", $data['fname']);
		$stmt->bindParam(":lname", $data['lname']);
		$stmt->bindParam(":address", $data['address']);
		$stmt->bindParam(":courseIntrested", $data['courseIntrested']);
		$stmt->bindParam(":phone", $data['phone']);
		$status = $stmt->execute(); 
		return $status;	
	}*/
	
		
}