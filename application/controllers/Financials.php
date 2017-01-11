<?php
session_cache_limiter('private_no_expire');

class Financials extends CI_Controller{

	Public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('financials_model');
		$this->load->model('admin_privilege_model');
		$this->load->model('search_model');
		$this->session->all_userdata();
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
			//if($ViewCase == "00"){
				$data['Provider_Name']= $this->search_model->get_Provider();
				$data['InsuranceCompany_Name']= $this->search_model->get_Insurance();
				$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
			//}else{ $data['Case_Id'] = $ViewCase;}
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
	public function get_Zero_Settlement(){
		$Start_Date = date_format(date_create($this->input->post("SD_0Settlement")), 'Y/m/d');
		$End_Date = date_format(date_create($this->input->post("ED_0Settlement")), 'Y/m/d');
		$name = $this->input->post("name");
		$list = $this->financials_model->get_Zero_Settlement($Start_Date, $End_Date, $name);
		$data = array();
		if($name == "Cases0Settlement"){
			foreach($list as $result){
				$row = array();
				$row[] = $result->Case_Id;
				$row[] = $result->InjuredParty_FirstName." ".$result->InjuredParty_LastName;
				$row[] = $result->Provider_Name;
				$row[] = $result->Status;
				$row[] = $result->InsuranceCompany_Name;
				$row[] = $result->Claim_Amount;
				$row[] = $result->Claim_Amount - $result->Paid_Amount;
				$row[] = date_format(date_create(substr($result->Settlement_Date,0,10)),"m/d/Y");
				$row[] = $result->Settlement_Amount;
				$data[] = $row;
			}
		}else{
			foreach($list as $result){
				$row = array();
				$row[] = $result->Case_Id;
				$row[] = $result->InjuredParty_FirstName." ".$result->InjuredParty_LastName;
				$row[] = $result->Provider_Name;
				$row[] = $result->InsuranceCompany_Name;
				$row[] = $result->Claim_Amount;
				$row[] = $result->Claim_Amount - $result->Paid_Amount;
				$row[] = $result->Settlement_Amount;
				$row[] = date_format(date_create(substr($result->Settlement_Date,0,10)),"m/d/Y");
				$row[] = $result->Settlement_Int;
				$row[] = $result->Settlement_Af;
				$row[] = $result->Settlement_Ff;
				$row[] = $result->Settlement_Total;
				$row[] = $result->User_Id;
				$row[] = $result->SettledWith;
				$row[] = "";
				
				$data[] = $row;
			}
		}
		
		$output = array( "data" => $data );
		echo json_encode($output);
	}
	public function get_Cost_Balance(){
		$list = $this->financials_model->get_Cost_Balance();
		//echo "<pre>"; print_r($list);exit;
		$data = array();
		foreach($list as $result){
			$row = array();
			$row[] = $result->Provider_Id;
			$row[] = $result->Provider_Name;
			$row[] = "<input name='' value='0' />";
			$data[] = $row;
		}
		
		$output = array( "data" => $data );
		echo json_encode($output);
	}
	public function get_Exp_Cost_Balance(){
		/*$list = $this->financials_model->get_Exp_Cost_Balance();
		//echo "<pre>"; print_r($list);exit;
		$data = array();
		foreach($list as $result){
			$row = array();
			$row[] = ;
			$row[] = $result->Provider_Name;
			$row[] = ;
		}
		
		$output = array( "data" => $data );
		echo json_encode($output);*/
	}
	public function get_Firm_Fees(){
		$Start_Date = date_format(date_create($this->input->post("SD_FirmFees")), 'Y/m/d');
		$End_Date = date_format(date_create($this->input->post("ED_FirmFees")), 'Y/m/d');
		$list = $this->financials_model->get_Firm_Fees($Start_Date, $End_Date);
		//echo "<pre>"; print_r($list);exit;
		$data = array();
		foreach($list as $result){
			$row = array();
			$row[] = $result->Provider_Id;
			$row[] = $result->Provider_Name;
			$row[] = $result->Case_Id;
			$row[] = $result->IndexOrAAA_Number;
			$row[] = number_format($result->Settlement_Ff, 2);
			$row[] = number_format($result->Settlement_Af, 2);
			$row[] = date_format(date_create(substr($result->Settlement_Date, 0,10)), "m/d/Y");
			$row[] = $result->Settlement_Notes;
			
			$data[] = $row;
		}
		
		$output = array( "data" => $data );
		echo json_encode($output);
	}
} 	
?>