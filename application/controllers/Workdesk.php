<?php
session_cache_limiter('private_no_expire');

	class Workdesk extends CI_Controller{
	
		Public function __construct(){
			parent::__construct();
			$this->load->library('session');
		}
		public function index(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/workdesk');
			}else{
				$this->load->view('pages/login');
			}	
		}
		public function workdesks(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/workdesk');
			}else{
				$this->load->view('pages/login');
			}
		}	
	} 	
?>