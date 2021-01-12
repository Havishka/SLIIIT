<?php

class Assets_model extends CI_Model {

	

	public function __construct()

	{

		parent::__construct();

    }
	

	function enquiry_insert($data){

		$sql = "INSERT INTO quick_enquiry(first_name, last_name, address, course_intrested, phone, centre) VALUES (:fname, :lname, :address, :courseIntrested, :phone, :centre)";
		
		//$sql = "INSERT INTO asset(asset_id, asset_name ) VALUES ( :asset_id, :asset_name)";

		$stmt = $this->db->conn_id->prepare($sql);  

		$stmt->bindParam(":fname", $data['fname']);

		$stmt->bindParam(":lname", $data['lname']);

		$stmt->bindParam(":address", $data['address']);

		$stmt->bindParam(":courseIntrested", $data['courseIntrested']);

		$stmt->bindParam(":phone", $data['phone']);
		
		$stmt->bindParam(":centre", $data['centre']);

		$status = $stmt->execute(); 

		return $status;	

	}

	

		

}