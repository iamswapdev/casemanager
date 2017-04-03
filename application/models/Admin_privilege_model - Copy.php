<?php
	Class Admin_privilege_model extends CI_Model{
		Public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function get_provider()
		{
			//echo "get_providerergrt";
			$query = $this->db->get('tblprovider'); 
			$data=$query->result_array();
			return $data;
			//($row!=0)? $data: false;
		}
		public function get_user()
		{
			//echo "get_providerergrt";
			$query = $this->db->get('issuetracker_users'); 
			$data=$query->result_array();
			return $data;
		}
		public function get_company()
		{
			//echo "get_providerergrt";
			$query = $this->db->get('tblinsurancecompany'); 
			$data=$query->result_array();
			return $data;
		}
		public function get_StatusType()
		{
			$this->db->select('Status_Type');
			$query = $this->db->get('tblstatus'); 
			$data=$query->result_array();
			return $data;
		}
		public function get_ManageUserData()
		{
			$this->db->select('t1.UserName, t1.DisplayName, t2.RoleName');
			$this->db->from('issuetracker_users as t1');
			$this->db->join('issuetracker_roles as t2', 't1.RoleId = t2.RoleId', 'LEFT');
			$query= $this->db->get();
			$data=$query->result_array();
			return $data;
		}
		public function get_AllRoles()
		{
			$this->db->select('RoleName');
			$this->db->from('issuetracker_roles');
			$query=$this->db->get();
			
			$data=$query->result_array();
			return $data;
		}
		public function insert_Roles($data)
		{
			$check = $this->db->insert("issuetracker_roles", $data);
			if($check){ return true;} else{ return false;}
		}
    }

?>