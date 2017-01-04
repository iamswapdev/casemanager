<?php
session_cache_limiter('private_no_expire');

	class Workdesk extends CI_Controller{
	
		Public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('admin_privilege_model');
		}
		public function index(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/workdesk');
			}else{
				$this->load->view('pages/login');
			}	
		}
		public function get_Assigned_Menus($User_Role){
			$this->session->all_userdata();
			$data = $this->admin_privilege_model->get_Assigned_Menus($User_Role);
			return $data;
		}
		public function workdesks(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
				$this->load->view('pages/workdesk', $data);
			}else{
				$this->load->view('pages/login');
			}
		}	
	} 	
?>