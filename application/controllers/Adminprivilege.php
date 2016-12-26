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
				
				$this->load->view('pages/manageusers');
			}else{
				//echo "session deleted";
				$this->load->view('pages/login');
			}
			
		}
		public function getAdj(){
			$list=$this->admin_privilege_model->get_ManageUserData();
			$data = array();
			foreach ($list as $result) {
				
				$row = array();
				$row[] = $result->RoleName;
				$row[] = $result->UserName;
				$row[] = $result->DisplayName;
				$row[] = $result->RoleName;
				$row[] = "<input type='checkbox' name='deleteCheckedUsers[]' class='deleteCheckedUsers deleteCheckedUsers".$result->UserId."' value='".$result->UserId."' >";
				
				$data[] = $row;
			}
			
			$output = array(
					"data" => $data
			);
			
			//print_r($data); exit();
			echo json_encode($output);
			//$this->load->view('pages/adj',$data);
		}
		public function deleteUsers(){
			$CheckedUsers = $this->input->post('deleteCheckedUsers');
			$delete_success = $this->admin_privilege_model->delete_Users($CheckedUsers);
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
			$data = $this->input->post('deleteRole');
			//echo "<pre>"; print_r($data);
			$insert_success = $this->admin_privilege_model->deleteRoles($data);
			return true;
		}
		public function insert_Roles(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$Rolename = $this->input->post('RoleName');
				if($Rolename != ""){
					$data=array(
						'RoleName' => $this->input->post('RoleName'),
					); 
					$insert_success = $this->admin_privilege_model->insert_Roles($data);
					redirect("/adminprivilege/addnewrole");
					//$this->addnewrole();
				}else{
					echo "R: ".$Rolename; exit();
					$this->addnewrole();
				}
				
				
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