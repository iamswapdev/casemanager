<?php
session_cache_limiter('private_no_expire');
session_start();

	class Dataentry extends CI_Controller{
	
		public function index(){
			//session_destroy(); 
			$this->load->view('pages/addcase');	
		}
		public function addcase(){
			$this->load->view('pages/addcase');
		}
		public function provider(){
			$this->load->view('pages/provider');
		}
		public function insurancecompany(){
			$this->load->view('pages/addinc_company');
		}
		public function defendant(){
			$this->load->view('pages/add_defendant_info');
		}
		public function adjuster(){
			$this->load->view('pages/add_adjuster_info');
		}
		public function attorney(){
			$this->load->view('pages/add_attorney');
		}
		public function plantiffattorney(){
			$this->load->view('pages/add_laintiff_attorney'); 
		}
		public function otherentries(){
			$this->load->view('pages/other_entries');
		}	
	} 	
?>