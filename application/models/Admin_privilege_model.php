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
		$this->db->where('t2.MenuID >', 6);
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
		$this->db->where('t2.MenuID >', 6);
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
	public function Save_Assign_Menu($OriginalAllocated, $New_Added_array, $Deleted_Menu_Id, $RoleId, $Main_MenuId){
		
		echo "<pre>OriginalAllocated"; print_r($OriginalAllocated);
		echo "<pre>Deleted_Menu_Id"; print_r($Deleted_Menu_Id);
		echo "<pre>New_Added_array"; print_r($New_Added_array);
		
		echo "<pre>OriginalAllocated count:".count($OriginalAllocated);
		echo "<pre>Deleted_Menu_Id count:".count($Deleted_Menu_Id);
		echo "<pre>New_Added_array count:".count($New_Added_array);
		
		if(count($New_Added_array) !=0 ){
			$MenuId = array();
			$flag = 0;
			foreach($New_Added_array as $val){
				$MenuId = array(
					"RoleId" => $RoleId,
					"MenuId" => $val
				);
				$this->db->insert("dbo_tblmenu_access", $MenuId);
				if($val == 8){
					$flag = 1;
				}
				if($val == 9){
					$flag = 2;
				}
				if($val == 19 || $val == 21){
					$flag = 3;
				}
				if($val == 10 || $val == 12 || $val == 13 || $val == 14 || $val == 15){
					$flag = 4;
				}
				if($val == 20){
					$flag = 5;
				}
				if($val == 16 || $val == 17 || $val == 18){
					$flag = 6;
				}
				if($val == 1){
					$MenuId = array(
						"RoleId" => $RoleId,
						"MenuId" => 8
					);
					$this->db->insert("dbo_tblmenu_access", $MenuId);
				}
				if($val == 2){
					$MenuId = array(
						"RoleId" => $RoleId,
						"MenuId" => 9
					);
					$this->db->insert("dbo_tblmenu_access", $MenuId);
				}
				if($val == 3){
					for($j=19; $j<=21; $j++){
						$MenuId = array(
							"RoleId" => $RoleId,
							"MenuId" => $j
						);
						$j++;
						echo "<pre>MenuId flag:"; print_r($MenuId);
						$this->db->insert("dbo_tblmenu_access", $MenuId);
					}
				}
				if($val == 4){
					for($j=10; $j<=15; $j++){
						if($j==11){$j++;}
						$MenuId = array(
							"RoleId" => $RoleId,
							"MenuId" => $j
						);
						echo "<pre>MenuId flag:"; print_r($MenuId);
						$this->db->insert("dbo_tblmenu_access", $MenuId);
					}
				}
				if($val == 5){
					$MenuId = array(
						"RoleId" => $RoleId,
						"MenuId" => 20
					);
					$this->db->insert("dbo_tblmenu_access", $MenuId);
				}
				if($val == 6){
					for($j=16; $j<=18; $j++){
						$MenuId = array(
							"RoleId" => $RoleId,
							"MenuId" => $j
						);
						echo "<pre>MenuId flag:"; print_r($MenuId);
						$this->db->insert("dbo_tblmenu_access", $MenuId);
					}
				}
				echo "<pre>MenuId:"; print_r($MenuId);
				
			}
			if($flag == 1 && count($OriginalAllocated) == 0){	
				$MenuId = array(
					"RoleId" => $RoleId,
					"MenuId" => 1
				);
				echo "<pre>MenuId flag:"; print_r($MenuId);
				$this->db->insert("dbo_tblmenu_access", $MenuId);
			}
			if($flag == 2 && count($OriginalAllocated) == 0){	
				$MenuId = array(
					"RoleId" => $RoleId,
					"MenuId" => 2
				);
				echo "<pre>MenuId flag:"; print_r($MenuId);
				$this->db->insert("dbo_tblmenu_access", $MenuId);
			}
			if($flag == 3 && count($OriginalAllocated) == 0){	
				$MenuId = array(
					"RoleId" => $RoleId,
					"MenuId" => 3
				);
				echo "<pre>MenuId flag:"; print_r($MenuId);
				$this->db->insert("dbo_tblmenu_access", $MenuId);
			}
			if($flag == 4 && count($OriginalAllocated) == 0){	
				$MenuId = array(
					"RoleId" => $RoleId,
					"MenuId" => 4
				);
				echo "<pre>MenuId flag:"; print_r($MenuId);
				$this->db->insert("dbo_tblmenu_access", $MenuId);
			}
			if($flag == 5 && count($OriginalAllocated) == 0){	
				$MenuId = array(
					"RoleId" => $RoleId,
					"MenuId" => 5
				);
				echo "<pre>MenuId flag:"; print_r($MenuId);
				$this->db->insert("dbo_tblmenu_access", $MenuId);
			}
			if($flag == 6 && count($OriginalAllocated) == 0){
				$MenuId = array(
					"RoleId" => $RoleId,
					"MenuId" => 6
				);
				echo "<pre>MenuId flag:"; print_r($MenuId);
				$this->db->insert("dbo_tblmenu_access", $MenuId);
			}
		}
		if(count($Deleted_Menu_Id) != 0){
			foreach($Deleted_Menu_Id as $val){
				$this->db->where('RoleId', $RoleId);
				$this->db->where('MenuId', $val);
				$this->db->delete('dbo_tblmenu_access');
				echo "Delete Id val:".$val;
				if($val == 1){
					$this->db->where('RoleId', $RoleId);
					$this->db->where('MenuId', 8);
					$this->db->delete('dbo_tblmenu_access');
				}else if($val == 2){
					$this->db->where('RoleId', $RoleId);
					$this->db->where('MenuId', 9);
					$this->db->delete('dbo_tblmenu_access');
				}else if($val == 3){
					for($j=19; $j<=21; $j++){
						$this->db->where('RoleId', $RoleId);
						$this->db->where('MenuId', $j);
						$this->db->delete('dbo_tblmenu_access');
						$j++;
					}
				}else if($val == 4){
					for($j=10; $j<=15; $j++){
						if($j==11){$j++;}
						$this->db->where('RoleId', $RoleId);
						$this->db->where('MenuId', $j);
						$this->db->delete('dbo_tblmenu_access');
					}
				}else if($val == 5){
					$this->db->where('RoleId', $RoleId);
					$this->db->where('MenuId', 20);
					$this->db->delete('dbo_tblmenu_access');
				}else if($val == 6){
					for($j=16; $j<=18; $j++){
						$this->db->where('RoleId', $RoleId);
						$this->db->where('MenuId', $j);
						$this->db->delete('dbo_tblmenu_access');
					}
				}
				if($val == 8){
					$this->db->where('RoleId', $RoleId);
					$this->db->where('MenuId', $val);
					$this->db->delete('dbo_tblmenu_access');
					$this->db->where('RoleId', $RoleId);
					$this->db->where('MenuId', 1);
					$this->db->delete('dbo_tblmenu_access');
				}
				if($val == 9){
					$this->db->where('RoleId', $RoleId);
					$this->db->where('MenuId', $val);
					$this->db->delete('dbo_tblmenu_access');
					$this->db->where('RoleId', $RoleId);
					$this->db->where('MenuId', 2);
					$this->db->delete('dbo_tblmenu_access');
				}
				if($val == 19 || $val == 21){
					$this->db->where('RoleId', $RoleId);
					$this->db->where('MenuId', $val);
					$this->db->delete('dbo_tblmenu_access');
					$Remaining_Records = $this->Check_Submenus($RoleId, $Main_MenuId);
					if($Remaining_Records == 0){
						$this->db->where('RoleId', $RoleId);
						$this->db->where('MenuId', 3);
						$this->db->delete('dbo_tblmenu_access');
					}
				}
				if($val == 10 || $val == 12 || $val == 13 || $val == 14 || $val == 15){
					$this->db->where('RoleId', $RoleId);
					$this->db->where('MenuId', $val);
					$this->db->delete('dbo_tblmenu_access');
					$Remaining_Records = $this->Check_Submenus($RoleId, $Main_MenuId);
					if($Remaining_Records == 0){
						$this->db->where('RoleId', $RoleId);
						$this->db->where('MenuId', 4);
						$this->db->delete('dbo_tblmenu_access');
					}
				}
				if($val == 20){
					$this->db->where('RoleId', $RoleId);
					$this->db->where('MenuId', $val);
					$this->db->delete('dbo_tblmenu_access');
					$this->db->where('RoleId', $RoleId);
					$this->db->where('MenuId', 5);
					$this->db->delete('dbo_tblmenu_access');
				}
				if($val == 16 || $val == 17 || $val == 18){
					$this->db->where('RoleId', $RoleId);
					$this->db->where('MenuId', $val);
					$this->db->delete('dbo_tblmenu_access');
					$Remaining_Records = $this->Check_Submenus($RoleId, $Main_MenuId);
					if($Remaining_Records == 0){
						$this->db->where('RoleId', $RoleId);
						$this->db->where('MenuId', 6);
						$this->db->delete('dbo_tblmenu_access');
					}
				}
				
				
			}
		}
	}
	public function Check_Submenus($RoleId, $Main_MenuId){
		if($Main_MenuId != 0){
			$this->db->select('t1.*, t2.*');
			$this->db->from('dbo_tblmenu_access as t1');
			$this->db->join('dbo_tblmenu as t2', 't1.MenuId= t2.MenuID', 'LEFT');
			$this->db->where('t1.RoleId', $RoleId);
			$this->db->where('t2.ParentID', $Main_MenuId);
			$query= $this->db->get();
			$rows = $query->num_rows();
			//echo "Rows count:".$rows;exit;
			return $rows;
		}
	}
	public function get_Assigned_Menus($User_Role){
		$this->db->select("MenuId");
		$this->db->where("RoleId", $User_Role);
		$query = $this->db->get("dbo_tblmenu_access");
		return $query->result_array();
	}
}

?>