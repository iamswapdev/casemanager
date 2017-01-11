<?php
session_cache_limiter('private_no_expire');

	class Workdesk extends CI_Controller{
	
		Public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('admin_privilege_model');
			$this->session->all_userdata();
		}
		public function index(){
			
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/workdesk');
			}else{
				$CurrentPage['CurrentUrl'] = "workdesk";
				$this->load->view('pages/login', $CurrentPage);
			}	
		}
		public function get_Assigned_Menus($User_Role){
			
			$data = $this->admin_privilege_model->get_Assigned_Menus($User_Role);
			return $data;
		}
		public function workdesks(){
			
			if(isset($this->session->userdata['logged_in'])){
				$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
				$this->load->view('pages/workdesk', $data);
			}else{
				$CurrentPage['CurrentUrl'] = "workdesk/workdesks";
				$this->load->view('pages/login', $CurrentPage);
			}
		}	
	} 	
?>