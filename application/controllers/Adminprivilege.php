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
	public function get_Assigned_Menus_New($User_Role){
		$this->session->all_userdata();
		$data = $this->admin_privilege_model->get_Assigned_Menus($User_Role);
		//echo "<pre>";print_r($data); exit;
		return $data;
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
		$data['Assigned_Menus'] = $this->get_Assigned_Menus_New($this->session->userdata['RoleId']);
	
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
			$data['Assigned_Menus'] = $this->get_Assigned_Menus_New($this->session->userdata['RoleId']);
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
			$data['Assigned_Menus'] = $this->get_Assigned_Menus_New($this->session->userdata['RoleId']);
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
			$data['Assigned_Menus'] = $this->get_Assigned_Menus_New($this->session->userdata['RoleId']);
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
		//echo "<pre>";print_r($AllocatedMenuId);exit;
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
				//echo "<pre>Allocated_SubMenuId:"; print_r($Allocated_SubMenuId);exit;
				$data['DeAllocated_SubMenus'] = $this->admin_privilege_model->get_DeAllocated_SubMenus($RoleId, $MainMenuId, $Allocated_SubMenuId);
				$data['DeAllocated_SubMenus_MM'] = "";
			}else{
				
				$data['DeAllocated_Main_Menus'] = "";
				$data['Allocated_SubMenus'] = "";
				$data['DeAllocated_SubMenus'] = "";
				$data['DeAllocated_SubMenus_MM'] = $this->admin_privilege_model->get_DeAllocated_SubMenus_MM($MainMenuId);
			}
		}
		//echo "<pre>AllocatedMenuId";print_r($AllocatedMenuId);
		//echo "<pre>DeAllocated_Main_Menus";print_r($data['DeAllocated_Main_Menus']);
		echo json_encode($data);
	}
	public function Save_Assign_Menu(){
		$OriginalAllocated = $this->input->post("OriginalAllocated");
		$NewAllocated_array = $this->input->post("NewAllocated_array");
		$RoleId = $this->input->post("RoleId");
		$Main_MenuId = $this->input->post("Main_MenuId");
		//echo "count-OriginalAllocated:".count($OriginalAllocated)." count-NewAllocated_array:".count($NewAllocated_array)."<br>";
		/*if(count($OriginalAllocated) ==0){
			$Deleted_Menu_Id = $NewAllocated_array;
		}else if(count($OriginalAllocated) > count($NewAllocated_array)){
			$Deleted_Menu_Id = array_diff($OriginalAllocated, $NewAllocated_array);
			$New_Added_array = array_diff($NewAllocated_array, $OriginalAllocated);
		}else if(count($OriginalAllocated) < count($NewAllocated_array)){
			$Deleted_Menu_Id = array_diff($OriginalAllocated, $NewAllocated_array);
			$New_Added_array = array_diff($NewAllocated_array, $OriginalAllocated);
		}else{
			$Deleted_Menu_Id = $NewAllocated_array;
		}*/
		
		if(count($OriginalAllocated) ==0){
			$New_Added_array = $NewAllocated_array;
			$Deleted_Menu_Id = array();
		}else{
			if(count($NewAllocated_array) !=0){
				$Deleted_Menu_Id = array_diff($OriginalAllocated, $NewAllocated_array);
				$New_Added_array = array_diff($NewAllocated_array, $OriginalAllocated);
			}else{
				$Deleted_Menu_Id = $OriginalAllocated;
				$New_Added_array = array();
			}
			
		}
		/*echo "<pre>OriginalAllocated"; print_r($OriginalAllocated);
		echo "<pre>NewAllocated_array"; print_r($NewAllocated_array);
		echo "<pre>Deleted_Menu_Id"; print_r($Deleted_Menu_Id);
		echo "<pre>Deleted_Menu_Id count:".count($Deleted_Menu_Id);
		echo "<pre>New_Added_array"; print_r($New_Added_array);*/
		
		$this->admin_privilege_model->Save_Assign_Menu($OriginalAllocated, $New_Added_array, $Deleted_Menu_Id, $RoleId, $Main_MenuId);
		return true;
	}
} 	
?>