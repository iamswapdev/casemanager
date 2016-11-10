<?php
session_cache_limiter('private_no_expire');
session_start();

	class Adminprivilege extends CI_Controller{
	
		public function index(){
			//session_destroy(); 
			$this->load->view('pages/config');	
		}
		public function config(){
			$data = array();
			$user_data = array();
			$this->load->model('admin_privilege_model');
			
			$data['result']=$this->admin_privilege_model->get_provider();
			if($data){
				$this->load->view('pages/config',$data);
			}else{
			}
			
			$user_data['result']=$this->admin_privilege_model->get_user();
			if($user_data){
				$this->load->view('pages/config',$user_data);
			}else{
			}
			
			
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