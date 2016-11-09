<?php
session_cache_limiter('private_no_expire');
session_start();

	class Financials extends CI_Controller{
	
		public function index(){
			//session_destroy(); 
			$this->load->view('pages/financials');	
		}
		public function financial(){
			$this->load->view('pages/financials');
		}
		public function reports(){
			$this->load->view('pages/reports');
		}
		public function rapidfunds(){
			$this->load->view('pages/rapidfunds');
		}
		public function defendant(){
			$this->load->view('pages/add_defendant_info');
		}	
	} 	
?>