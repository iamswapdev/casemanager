<?php
session_cache_limiter('private_no_expire');

	class Dataentry extends CI_Controller{
	
		Public function __construct(){
			parent::__construct();
			$this->load->library('session');
		}
		public function index(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/addcase');
			}else{
				$this->load->view('pages/login');
			}	
		}
		public function addcase(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/addcase');
			}else{
				$this->load->view('pages/login');
			}
		}
		public function provider(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/provider');
			}else{
				$this->load->view('pages/login');
			}
		}
		public function insurancecompany(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/addinc_company');
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
		public function adjuster(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/add_adjuster_info');
			}else{
				$this->load->view('pages/login');
			}
		}
		public function attorney(){
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/add_attorney');
			}else{
				$this->load->view('pages/login');
			}
		}
		public function plantiffattorney(){
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/add_laintiff_attorney');
			}else{
				$this->load->view('pages/login');
			} 
		}
		public function otherentries(){
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/other_entries');
			}else{
				$this->load->view('pages/login');
			}
		}	
	} 	
?>