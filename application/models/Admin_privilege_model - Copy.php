<?php
	Class Admin_privilege_model extends CI_Model{
		Public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function get_provider()
		{
			//echo "get_providerergrt";
			$query = $this->db->get('dbo_tblprovider'); 
			$data=$query->result_array();
			return $data;
			//($row!=0)? $data: false;
		}
		public function get_user()
		{
			//echo "get_providerergrt";
			$query = $this->db->get('dbo_issuetracker_users'); 
			$data=$query->result_array();
			return $data;
		}
		public function get_company()
		{
			//echo "get_providerergrt";
			$query = $this->db->get('dbo_tblinsurancecompany'); 
			$data=$query->result_array();
			return $data;
		}
		public function get_StatusType()
		{
			$this->db->select('Status_Type');
			$query = $this->db->get('dbo_tblstatus'); 
			$data=$query->result_array();
			return $data;
		}
		public function get_ManageUserData()
		{
			$this->db->select('t1.UserName, t1.DisplayName, t2.RoleName');
			$this->db->from('dbo_issuetracker_users as t1');
			$this->db->join('dbo_issuetracker_roles as t2', 't1.RoleId = t2.RoleId', 'LEFT');
			$query= $this->db->get();
			$data=$query->result_array();
			return $data;
		}
		public function get_AllRoles()
		{
			$this->db->select('RoleName');
			$this->db->from('dbo_issuetracker_roles');
			$query=$this->db->get();
			
			$data=$query->result_array();
			return $data;
		}
		public function insert_Roles($data)
		{
			$check = $this->db->insert("dbo_issuetracker_roles", $data);
			if($check){ return true;} else{ return false;}
		}
    }

?>