<?php
Class Login_model extends CI_Model{
	Public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function autho($data){
		$this->db->where('username',$data['username']);
		$this->db->where('userpassword',$data['password']);
		$data=$this->db->get('dbo_issuetracker_users');
		
		$rows = $data->num_rows();
		if($rows == 1){ return true; }else { return false; }
	}
	public function get_RoleId($data){
		$this->db->where('username',$data['username']);
		$this->db->where('userpassword',$data['password']);
		$query=$this->db->get('dbo_issuetracker_users');
		$data = $query->result_array();
		//echo "<pre>"; print_r($data);
		return $data;
	}
	public function forgot_pass($data){
		$this->db->where('email',$data['email_address']);
		$data=$this->db->get('dbo_issuetracker_users');
		
		$rows = $data->num_rows();
		if($rows == 1){ return true; }else { return false; }	
	}

}
?>