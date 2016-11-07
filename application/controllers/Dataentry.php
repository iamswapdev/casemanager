<?php
session_cache_limiter('private_no_expire');
session_start();

	class Dataentry extends CI_Controller{
	
		public function index(){
			//session_destroy(); 
			$this->load->view('pages/addcase');	
		}
		public function provider(){
			$this->load->view('pages/provider');
		}
		public function insurancecompany(){
			$this->load->view('pages/insurancecompany');
		}
		public function defendant(){
			$this->load->view('pages/defendant');
		}
		public function adjuster(){
			$this->load->view('pages/adjuster');
		}
		public function attorney(){
			$this->load->view('pages/attorney');
		}
		public function plantiffattorney(){
			$this->load->view('pages/plantiffattorney');
		}
		public function otherentries(){
			$this->load->view('pages/otherentries');
		}	
	} 	
?>