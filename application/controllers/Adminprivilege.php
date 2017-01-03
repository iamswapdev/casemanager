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
			//$this->load->view('pages/config');
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
		$data['Accessibility'] = $this->session->userdata['RoleId'];
	
			$this->load->view('pages/config',$data);
		}else{
			//echo "session deleted";
			$this->load->view('pages/login');
		}
		
	}
	public function manageusers(){
		//echo $this->session->userdata['logged_in']['username'];
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			//$this->load->model('admin_privilege_model');
			$data['Roles']=$this->admin_privilege_model->get_AllRoles();
			$data['Accessibility'] = $this->session->userdata['RoleId'];
			$this->load->view('pages/manageusers', $data);
		}else{
			//echo "session deleted";
			$this->load->view('pages/login');
		}
		
	}
	public function get_Users_List(){
		$list=$this->admin_privilege_model->get_ManageUserData();
		$data = array();
		foreach ($list as $result) {
			
			$row = array();
			$row[] = "<a class='info-link User-info ".$result->UserId."' >".$result->UserName."</a>";
			$row[] = "<a class='info-link User-info ".$result->UserId."' >".$result->UserName."</a>";
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
	public function get_User_Info_By_Id($UserId){
		$data = $this->admin_privilege_model->get_User_Info_By_Id($UserId);
		echo json_encode($data);
	}
	public function deleteUsers(){
		$CheckedUsers = $this->input->post('deleteCheckedUsers');
		$delete_success = $this->admin_privilege_model->delete_Users($CheckedUsers);
	}
	public function add_Users_Form(){
		$data = array(
			"UserName" => $this->input->post("UserName"),
			"UserPassword" => $this->input->post("UserPassword"),
			"RoleId" => $this->input->post("RoleId"),
			"Email" => $this->input->post("Email"),
			"DisplayName" => $this->input->post("UserName")
		);
		$this->admin_privilege_model->add_Users($data);
	}
	public function update_Users_Form(){
		$data = array(
			"UserId" => $this->input->post("UserId"),
			"UserName" => $this->input->post("UserName"),
			"UserPassword" => $this->input->post("UserPassword"),
			"RoleId" => $this->input->post("RoleId"),
			"Email" => $this->input->post("Email"),
			"DisplayName" => $this->input->post("UserName")
		);
		$this->admin_privilege_model->update_Users($data);
	}
	public function addnewrole(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			
			$data['Roles']=$this->admin_privilege_model->get_AllRoles();
			$data['Accessibility'] = $this->session->userdata['RoleId'];
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
			$data['Accessibility'] = $this->session->userdata['RoleId'];
			$this->load->view('pages/assignmenu',$data);
		}else{
			//echo "session deleted";
			$this->load->view('pages/login');
		}
	}	
	public function get_Assigned_Menus($RoleId, $MainMenuId){
		$data['Allocated_Main_Menus'] = $this->admin_privilege_model->get_Allocated_Main_Menus($RoleId);
		$AllocatedMenuId = array();
		for($i=0; $i<count($data['Allocated_Main_Menus']); $i++){
			$AllocatedMenuId[$i] = $data['Allocated_Main_Menus'][$i]['MenuID'];
		}
		if($MainMenuId == 0){
			$data['DeAllocated_Main_Menus'] = $this->admin_privilege_model->get_DeAllocated_Main_Menus($AllocatedMenuId);
			//echo "<pre>"; print_r($data);
		}else{
			//echo "not 0";
			if(in_array($MainMenuId, $AllocatedMenuId)){
				//echo "in array";
				$data['Allocated_SubMenus'] = $this->admin_privilege_model->get_Allocated_SubMenus($RoleId, $MainMenuId);
				$Allocated_SubMenuId = array();
				for($i=0; $i<count($data['Allocated_SubMenus']); $i++){
					$Allocated_SubMenuId[$i] = $data['Allocated_SubMenus'][$i]['MenuID'];
				}
				//echo "<pre>Allocated_SubMenuId:"; print_r($Allocated_SubMenuId);
				$data['DeAllocated_SubMenus'] = $this->admin_privilege_model->get_DeAllocated_SubMenus($RoleId, $MainMenuId, $Allocated_SubMenuId);
				$data['DeAllocated_SubMenus_MM'] = "";
			}else{
				
				$data['DeAllocated_Main_Menus'] = "";
				$data['Allocated_SubMenus'] = "";
				$data['DeAllocated_SubMenus'] = "";
				$data['DeAllocated_SubMenus_MM'] = $this->admin_privilege_model->get_DeAllocated_SubMenus_MM($MainMenuId);
			}
		}
		//echo "<pre>";print_r($data);
		echo json_encode($data);
	}
	
	
	
	
	
	
	
	
	
	
	public function get_Assigned_Menus2($RoleId, $MainMenuId){
		
		$data['Allocated'] = $this->admin_privilege_model->get_Allocated_Menus($RoleId, $MainMenuId);
		if(count($data['Allocated']) ==0){
			$data['DeAllocatedSub'] = $this->admin_privilege_model->get_DeAllocated_SubMenus($MainMenuId);
			$data['DeAllocated'] = "";
			echo json_encode($data);
		}else{
			$AllocatedMenuId = array();
			if($MainMenuId ==0){
				
				for($i=0; $i<count($data['Allocated']); $i++){
					if($data['Allocated'][$i]['MenuID'] <=6){
						$AllocatedMenuId[$i] = $data['Allocated'][$i]['MenuID'];
					}
				}
				//echo "Data len:".count($data);
				//echo "<pre>controller AllocatedMenuId: ";print_r($AllocatedMenuId);
				$data['DeAllocated'] = $this->admin_privilege_model->get_DeAllocated_Menus($AllocatedMenuId, $MainMenuId);
			}else{
				for($i=0; $i<count($data['Allocated']); $i++){
					$AllocatedMenuId[$i] = $data['Allocated'][$i]['MenuID'];
				}
				//echo "Data len:".count($data);
				
				
				$data['DeAllocated'] = $this->admin_privilege_model->get_DeAllocated_Menus($AllocatedMenuId, $MainMenuId);
			}
		}
		//echo "<pre>";print_r($data['DeAllocatedSubMenu']);exit;
		
		echo "<pre>AllocatedMenuId:";print_r($AllocatedMenuId);
		echo "<pre>Allocated:";print_r($data['Allocated']);
		echo "<pre>DeAllocatedSub:";print_r($data['DeAllocatedSub']);exit;
		//echo "<pre>";print_r($data);
		echo json_encode($data);
	}
} 	
?>