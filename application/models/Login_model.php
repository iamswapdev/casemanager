<?php
	Class Login_model extends CI_Model{
		Public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function autho($data){
			
		 $query=$this->db->query('select * from admin where username="'.$data['username'].'" and password="'.$data['password'].'"');
		 $rows = $query->num_rows();
		 if($rows > 0){
			 return true;
		 }else
		 {
			return false;
		 }
	    }
		public function forgot_pass($data){
		 $query=$this->db->query('select * from admin where email_address="'.$data['email'].'"');
		 $rows = $query->num_rows();
		 if($rows > 0){
			 return true;
		 }else
		 {
			return false;
		 }	
		}
		
	}
?>