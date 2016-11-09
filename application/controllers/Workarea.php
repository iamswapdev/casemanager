<?php
session_cache_limiter('private_no_expire');
session_start();

	class Workarea extends CI_Controller{
	
		public function index(){
			//session_destroy(); 
			$this->load->view('pages/caseinformation');	
		}
		public function caseinformation(){
			$this->load->view('pages/caseinformation');
		}
		public function dataentry_workarea(){
			$this->load->view('pages/dataentry_workarea');
		}
		public function fileinsert(){
			$this->load->view('pages/fileinsert');
		}
		public function workflowreport(){
			$this->load->view('pages/workflowreport');
		}
		public function calendar(){
			$this->load->view('pages/calendar');
		}	
	} 	
?>