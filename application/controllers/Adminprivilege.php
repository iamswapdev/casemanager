<?php
session_cache_limiter('private_no_expire');

	class Adminprivilege extends CI_Controller{
	
		Public function __construct(){
			parent::__construct();
			$this->load->library('session');
		}
		public function index(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/config');
			}else{
				//echo "session deleted";
				$this->load->view('pages/login');
			}
			
				
		}
		public function config(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data = array();
				$user_data = array();
				$all_data = array();
				$this->load->model('admin_privilege_model');
				
				$data['result']=$this->admin_privilege_model->get_provider();
					
				$data['user_result']=$this->admin_privilege_model->get_user();
				
				$data['company_result']=$this->admin_privilege_model->get_company();
		
				$this->load->view('pages/config',$data);
			}else{
				//echo "session deleted";
				$this->load->view('pages/login');
			}
			
		}
		public function manageusers(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/manageusers');
			}else{
				//echo "session deleted";
				$this->load->view('pages/login');
			}
			
		}
		public function addnewrole(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/addnewrole');
			}else{
				//echo "session deleted";
				$this->load->view('pages/login');
			}
		
		}
		public function assignmenu(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/assignmenu');
			}else{
				//echo "session deleted";
				$this->load->view('pages/login');
			}
			
		}	
	} 	
?>