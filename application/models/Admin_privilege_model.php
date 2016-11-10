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
    }

?>