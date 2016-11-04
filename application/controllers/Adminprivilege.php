<?php
session_cache_limiter('private_no_expire');
session_start();

	class Adminprivilege extends CI_Controller{
	
		public function index(){
			//session_destroy(); 
			$this->load->view('pages/config');	
		}
		public function config(){
			$this->load->view('pages/config');
		}
		public function manageusers(){
			$this->load->view('pages/manageusers');
		}
		public function addnewrole(){
			$this->load->view('pages/addnewrole');
		}
		public function assignmenu(){
			$this->load->view('pages/assignmenu');
		}	
	} 	
?>