<?php
Class Financials_model extends CI_Model{
	
	Public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function get_Provider()
	{
		$query = $this->db->get('dbo_tblprovider'); 
		$data=$query->result_array();
		return $data;
	}
	
	public function get_Insurance()
	{
		$query=$this->db->get('dbo_tblinsurancecompany');
		$data=$query->result_array();
		return $data;
	}

}
?>