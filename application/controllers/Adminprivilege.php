<?php
session_cache_limiter('private_no_expire');

	class Adminprivilege extends CI_Controller{
	
		Public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('admin_privilege_model');
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
				//$this->load->model('admin_privilege_model');
				
				$data['result']=$this->admin_privilege_model->get_provider();
					
				$data['user_result']=$this->admin_privilege_model->get_user();
				
				$data['company_result']=$this->admin_privilege_model->get_company();
				
				$data['Status_Type']=$this->admin_privilege_model->get_StatusType();
		
				$this->load->view('pages/config',$data);
			}else{
				//echo "session deleted";
				$this->load->view('pages/login');
			}
			
		}
		public function manageusers(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				//$this->load->model('admin_privilege_model');
				$data['UserName']=$this->admin_privilege_model->get_ManageUserData();
				//print_r($data); exit();
				$this->load->view('pages/manageusers',$data);
			}else{
				//echo "session deleted";
				$this->load->view('pages/login');
			}
			
		}
		public function addnewrole(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				
				$data['Roles']=$this->admin_privilege_model->get_AllRoles();
				$this->load->view('pages/addnewrole',$data);
			}else{
				//echo "session deleted";
				$this->load->view('pages/login');
			}
		
		}
		public function delete_Roles()
		{
			$data = array();
			$delete= $this->input->post('deleteRole');
			$data =implode(",", $delete); 
			$insert_success = $this->admin_privilege_model->deleteRoles($data);
			
			return true;
		}
		public function insert_Roles(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data=array(
					'RoleName' => $this->input->post('RoleName'),
				); 
				$insert_success = $this->admin_privilege_model->insert_Roles($data);
				if($insert_success){
					$data1['Roles']=$this->admin_privilege_model->get_SingleRoles(); 
					echo json_encode($data1);  
				} else{ $this->addnewrole(); }
				
			}else{
				//echo "session deleted";
				$this->load->view('pages/login');
			}
		
		}
		public function assignmenu(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data['RoleName']=$this->admin_privilege_model->get_AllRoles();
				$this->load->view('pages/assignmenu',$data);
			}else{
				//echo "session deleted";
				$this->load->view('pages/login');
			}
			
		}	
	} 	
?>