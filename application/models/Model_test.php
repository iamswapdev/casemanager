<?php
	Class Model_test extends CI_Model{
		Public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function testdb(){
			$data = array( 
			'id' => '1', 
			'name' => 'Virat' 
			); 

			$res = $this->db->insert("tbl-data", $data);
			if($res)
			{ echo"success";}else{echo"not success";}
	   }
		
	}
?>