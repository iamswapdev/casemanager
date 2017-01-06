<?php
session_cache_limiter('private_no_expire');

	class Financials extends CI_Controller{
	
		Public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('financials_model');
			$this->load->model('admin_privilege_model');
		}
		public function index(){
			
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/financials');
			}else{
				$CurrentPage['CurrentUrl'] = "financials";
				$this->load->view('pages/login', $CurrentPage);
			} 		
		}
		public function get_Assigned_Menus($User_Role){
			
			$data = $this->admin_privilege_model->get_Assigned_Menus($User_Role);
			return $data;
		}
		public function financial(){
			
			if(isset($this->session->userdata['logged_in'])){
				
				$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
				$this->load->view('pages/financials', $data);
			}else{
				$CurrentPage['CurrentUrl'] = "financials/financial";
				$this->load->view('pages/login', $CurrentPage);
			}
		}
		public function reports(){
			
			if(isset($this->session->userdata['logged_in'])){
				$data['Provider_Name']= $this->financials_model->get_Provider();
				$data['InsuranceCompany_Name']= $this->financials_model->get_Insurance();
				$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
				$this->load->view('pages/reports',$data);
			}else{
				$CurrentPage['CurrentUrl'] = "financials/reports";
				$this->load->view('pages/login', $CurrentPage);
			}
		}
		public function rapidfunds(){
			
			if(isset($this->session->userdata['logged_in'])){
				$data['Provider_Name']= $this->financials_model->get_Provider();
				$data['InsuranceCompany_Name']= $this->financials_model->get_Insurance();
				$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
				$this->load->view('pages/rapidfunds',$data);
			}else{
				$CurrentPage['CurrentUrl'] = "financials/rapidfunds";
				$this->load->view('pages/login', $CurrentPage);
			}
		}
		public function defendant(){
			
			if(isset($this->session->userdata['logged_in'])){
				$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
				$this->load->view('pages/add_defendant_info', $data);
			}else{
				$CurrentPage['CurrentUrl'] = "financials/defendant";
				$this->load->view('pages/login', $CurrentPage);
			}
		}	
	} 	
?>