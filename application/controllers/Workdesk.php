<?php
session_cache_limiter('private_no_expire');
session_start();

	class Workdesk extends CI_Controller{
	
		public function index(){
			//session_destroy(); 
			$this->load->view('pages/workdesk');	
		}
		public function workdesks(){
			$this->load->view('pages/workdesk');
		}	
	} 	
?>