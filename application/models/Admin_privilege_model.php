<?php
Class Admin_privilege_model extends CI_Model{
	Public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function get_provider()
	{
		//echo "get_providerergrt";
		$query = $this->db->get('dbo_tblprovider'); 
		$data=$query->result_array();
		return $data;
		//($row!=0)? $data: false;
	}
	public function get_user()
	{
		//echo "get_providerergrt";
		$query = $this->db->get('dbo_issuetracker_users'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_company()
	{
		//echo "get_providerergrt";
		$query = $this->db->get('dbo_tblinsurancecompany'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_StatusType()
	{
		$this->db->select('Status_Type');
		$query = $this->db->get('dbo_tblstatus'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_ManageUserData()
	{
		$this->db->select('t1.*, t2.*');
		$this->db->order_by("t1.UserName", "asc");
		$this->db->from('dbo_issuetracker_users as t1');
		$this->db->join('dbo_issuetracker_roles as t2', 't1.RoleId = t2.RoleId', 'LEFT');
		$query= $this->db->get();
		$data=$query->result();
		return $data;
	}
	public function get_User_Info_By_Id($UserId){
		$this->db->where("UserId", $UserId);
		$query = $this->db->get("dbo_issuetracker_users");
		return $query->result_array();
	}
	public function delete_Users($CheckedUsers){
		foreach($CheckedUsers as $row){
			$this->db->where("UserId", $row);
			$this->db->delete('dbo_issuetracker_users');
		}
	}
	public function add_Users($data){
		$this->db->insert("dbo_issuetracker_users", $data);
	}
	public function update_Users($data){
		$this->db->set($data);
		$this->db->where("UserId", $data['UserId']);
		$this->db->update("dbo_issuetracker_users", $data);
	}
	public function get_AllRoles()
	{
		$query=$this->db->get('dbo_issuetracker_roles');	
		$data=$query->result_array();
		return $data;
	}
	public function deleteRoles($roleId_array)
	{
		foreach($roleId_array as $id){
			$this->db->where('RoleId', $id);
			$this->db->delete('dbo_issuetracker_roles');
		}
		return true;
	}
	public function get_SingleRoles()
	{
		$query ="select * from dbo_issuetracker_roles order by RoleId DESC limit 1";
		$res = $this->db->query($query);
		$data=$res->result_array();
		return $data;
	}
	public function insert_Roles($data)
	{
		$check = $this->db->insert("dbo_issuetracker_roles", $data);
		if($check){ return true;} else{ return false;}
	}
	public function get_Allocated_Main_Menus($RoleId){
		$this->db->select('t1.*, t2.*');
		$this->db->from('dbo_tblmenu_access as t1');
		$this->db->join('dbo_tblmenu as t2', 't1.MenuId = t2.MenuID', 'LEFT');
		$this->db->where('t1.MenuId <=', 6);
		$this->db->where('t1.RoleId', $RoleId);
		$query= $this->db->get();
		$data=$query->result_array();
		//echo "<pre>"; print_r($data); exit();
		return $data;
	}
	public function get_DeAllocated_Main_Menus($AllocatedMenuId){
		$MainMenuId = array(1,2,3,4,5,6);
		$result = array_diff($MainMenuId, $AllocatedMenuId);
		if(count($result) !=0){
			$this->db->where_in('MenuID',$result);
			$query= $this->db->get("dbo_tblmenu");
			$data=$query->result_array();
		}else{
			$data = "";
		}
		//echo "<pre>"; print_r($data);
		return $data;
	}
	public function get_Allocated_SubMenus($RoleId, $MainMenuId){
		$this->db->select('t1.*, t2.*');
		$this->db->from('dbo_tblmenu_access as t1');
		$this->db->join('dbo_tblmenu as t2', 't1.MenuId = t2.MenuID', 'LEFT');
		$this->db->where('t1.RoleId', $RoleId);
		$this->db->where('t2.ParentID', $MainMenuId);
		$query= $this->db->get();
		$data=$query->result_array();
		//echo "<pre>get_Allocated_SubMenus:"; print_r($data); exit();
		return $data;
	}
	public function get_DeAllocated_SubMenus($RoleId, $MainMenuId, $Allocated_SubMenuId){
		//echo "<pre>Allocated_SubMenuId model:"; print_r($Allocated_SubMenuId);
		//echo "RoleId:".$RoleId." MainMenuId:".$MainMenuId." Allocated_SubMenuId:";print_r($Allocated_SubMenuId);
		$this->db->select('t1.*, t2.*');
		$this->db->from('dbo_tblmenu_access as t1');
		$this->db->join('dbo_tblmenu as t2', 't1.MenuId = t2.ParentID');
		$this->db->where('t1.RoleId', $RoleId);
		$this->db->where('t1.MenuId', $MainMenuId);
		$this->db->where_not_in("t2.MenuID", $Allocated_SubMenuId);
		$query= $this->db->get();
		$data=$query->result_array();
		//echo "<pre>get_DeAllocated_SubMenus:"; print_r($data); exit();
		return $data;
	}
	public function get_DeAllocated_SubMenus_MM($MainMenuId){
		//echo "RoleId:".$RoleId." MainMenuId:".$MainMenuId;
		$this->db->where('ParentID', $MainMenuId);
		$query= $this->db->get("dbo_tblmenu");
		$data=$query->result_array();
		//echo "<pre>get_DeAllocated_SubMenus_MM:"; print_r($data); exit();
		return $data;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	/**************************************************/
	public function get_Allocated_Menus2($RoleId, $MainMenuId){
		$this->db->select('t1.*, t2.*');
		
		$this->db->from('dbo_tblmenu_access as t1');
		$this->db->join('dbo_tblmenu as t2', 't1.MenuId = t2.MenuID', 'LEFT');
		$this->db->where('t1.RoleId',$RoleId);
		if($MainMenuId !=0){
			//echo "dsdsd";
			$this->db->where('t2.ParentID',$MainMenuId);
		}
		
		$query= $this->db->get();
		$data=$query->result_array();
		//echo "<pre>"; print_r($data); exit();
		return $data;
	}
	public function get_DeAllocated_SubMenus2($MainMenuId){
		$this->db->where('ParentID',$MainMenuId);
		$query= $this->db->get("dbo_tblmenu");
		$data=$query->result_array();
		//echo "<pre>"; print_r($data); exit();
		return $data;
	}
	public function get_DeAllocated_Menus2($AllocatedMenuId, $MainMenuId){
		if(count($AllocatedMenuId) !=0){
			if($MainMenuId !=0){
				$this->db->where_not_in('MenuID',$AllocatedMenuId);
				$this->db->where("ParentID", $MainMenuId);
			}else{
				if(count($AllocatedMenuId) !=6){
					$DeAllocatedMainMenu = array(1,2,3,4,5,6);
					$result2 =array();
					$result = array_diff($DeAllocatedMainMenu, $AllocatedMenuId);
					foreach($result as $val){
						array_push($result2, $val);
					}
					//echo "<pre> model:DeAllocatedMainMenu:";print_r($result2);
					$this->db->where_in('MenuID',$result2);
				}	
			}
		}
		$query= $this->db->get("dbo_tblmenu");
		$data=$query->result_array();
		//echo "<pre>"; print_r($data);
		return $data;
	}
}

?>