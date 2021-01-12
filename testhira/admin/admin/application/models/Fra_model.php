<?php

class Fra_model extends CI_Model {

	

	public function __construct()

	{

		parent::__construct();

    }
	

	function enquiry_insert($data){

		$sql = "INSERT INTO fra_enquiry(first_name, last_name, address, email, phone) VALUES (:fname, :lname, :address, :email, :phone)";

		
		//$sql = "INSERT INTO asset(asset_id, asset_name ) VALUES ( :asset_id, :asset_name)";

		$stmt = $this->db->conn_id->prepare($sql);  

		$stmt->bindParam(":fname", $data['fname']);

		$stmt->bindParam(":lname", $data['lname']);

		$stmt->bindParam(":address", $data['address']);

		$stmt->bindParam(":email", $data['email']);

		$stmt->bindParam(":phone", $data['phone']);

		$status = $stmt->execute(); 

		return $status;	

	}

	

		

}