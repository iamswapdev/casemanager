<?php
Class Workarea_model extends CI_Model{
	
	Public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function just(){

		$query ="select Case_AutoId from dbo_tblcase order by Case_AutoId DESC limit 1";
		$qwe = array(
			"name" => "sid",
			"name 2" => "sid 2"
		);
		$res = $this->db->query($query);
		$data = $res->result_array();
		echo $data['Case_AutoId'];
		$qwe['sid'] = $data['Case_AutoId'];
		echo "<pre>"; print_r($qwe); exit();
		if($res->num_rows() > 0) {
			return $res->result("array");
		}
			return array();
	}
}

?>