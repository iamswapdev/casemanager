<?php
session_cache_limiter('private_no_expire');

	class Workarea extends CI_Controller{
	
		Public function __construct(){
			parent::__construct();
			$this->load->library('session');
		}
		public function index(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/caseinformation');	
			}else{
				$this->load->view('pages/login');
			}
		}
		public function caseinformation(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/caseinformation');
			}else{
				$this->load->view('pages/login');
			}
		}
		public function dataentryworkarea(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/dataentry_workarea');
			}else{
				$this->load->view('pages/login');
			}
		}
		public function fileinsert(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/fileinsert');	
			}else{
				$this->load->view('pages/login');
			}
		}
		public function workflowreport(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/workflowreport');
			}else{
				$this->load->view('pages/login');
			}
		}
		public function calendar(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/calendar');
			}else{
				$this->load->view('pages/login');
			}
		}	
	} 	
?>