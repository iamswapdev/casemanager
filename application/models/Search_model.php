<?php
Class Search_model extends CI_Model{
	
	Public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function get_SearchResult()
	{
		$query=$this->db->get('dbo_tblcase');
		$data=$query->result();
		return $data;
	}

}
?>