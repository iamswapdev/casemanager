<?php
session_cache_limiter('private_no_expire');

	class Financials extends CI_Controller{
	
		Public function __construct(){
			parent::__construct();
			$this->load->library('session');
		}
		public function index(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/financials');
			}else{
				$this->load->view('pages/login');
			} 		
		}
		public function financial(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/financials');
			}else{
				$this->load->view('pages/login');
			}
		}
		public function reports(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/reports');
			}else{
				$this->load->view('pages/login');
			}
		}
		public function rapidfunds(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/rapidfunds');
			}else{
				$this->load->view('pages/login');
			}
		}
		public function defendant(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/add_defendant_info');
			}else{
				$this->load->view('pages/login');
			}
		}	
	} 	
?>