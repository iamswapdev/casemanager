<?php
session_cache_limiter('private_no_expire');
ini_set('memory_limit','-1');
class Workarea extends CI_Controller{

	Public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('dataentry_model');
		$this->load->model('workarea_model');
		$this->load->model('admin_privilege_model');
		$this->load->model('search_model');
		$this->session->all_userdata();
	}
	public function index(){
		
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/caseinformation');	
		}else{
			$CurrentPage['CurrentUrl'] = "workarea";
			$this->load->view('pages/login', $CurrentPage);
		}
	}
	public function get_Assigned_Menus($User_Role){
		
		$data = $this->admin_privilege_model->get_Assigned_Menus($User_Role);
		return $data;
	}
	public function caseinformation(){
		
		if(isset($this->session->userdata['logged_in'])){
			$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
			$this->load->view('pages/caseinformation', $data);
		}else{
			$CurrentPage['CurrentUrl'] = "workarea/caseinformation";
			$this->load->view('pages/login', $CurrentPage);
		}
	}
	public function dataentryworkarea(){
		
		if(isset($this->session->userdata['logged_in'])){
			//$data['Provider_Name']= $this->workarea_model->just();
			
			
			$data['Provider_Name']= $this->workarea_model->get_Provider();
			$data['InsuranceCompany_Name']= $this->workarea_model->get_Insurance();
			$data['Status']= $this->workarea_model->get_Status();
			$data['Court']= $this->workarea_model->get_Court();
			$data['Service']= $this->workarea_model->get_Service();
			$data['DenialReasons']= $this->workarea_model->get_DenialReasons();
			$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
			$this->load->view('pages/dataentry_workarea',$data);
		}else{
			$CurrentPage['CurrentUrl'] = "workarea/dataentryworkarea";
			$this->load->view('pages/login', $CurrentPage);
		}
	}
	public function add_CaseInfo(){
		
		if(isset($this->session->userdata['logged_in'])){
			
			$data = array(
				'Initial_Status' => $this->input->post('initialStatus'),
				'Provider_Id' => $this->input->post('providerId'),
				'InjuredParty_LastName' => $this->input->post('injuredPartyLastName'),
				'InjuredParty_FirstName' => $this->input->post('injuredPartyFirstName'),
				'InsuredParty_LastName' => $this->input->post('insuredPartyLastName'),
				'InsuredParty_FirstName' => $this->input->post('insuredPartyFirstName'),
				'InsuranceCompany_Id' => $this->input->post('insuranceCompanyId'),
				'Policy_Number' => $this->input->post('policyNumber'),
				'Ins_Claim_Number' => $this->input->post('insClaimNumber'),
				'Accident_Date' => $this->input->post('accidentDate'),
				'Status' => $this->input->post('Status'),
				'IndexOrAAA_Number' => $this->input->post('indexOrAAANumber'),
				'Court_Id' => $this->input->post('courtId'),
				'DateOfService_Start' => $this->input->post('dateOfServiceStart'),
				'DateOfService_End' => $this->input->post('dateOfServiceEnd'),
				'Claim_Amount' => $this->input->post('claimAmt'),
				'Paid_Amount' => $this->input->post('paidAmt'),
				'Date_BillSent' => $this->input->post('dateBillSent'),
				'DenialReasons_Type' => $this->input->post('denialReasons'),
				'Memo' => $this->input->post('memo')
			);
			$success = $this->dataentry_model->insert_CaseInfo($data);
			//echo "<pre> "; print_r($data); exit();
			if($success){
				return true;
				//$this->load->view('pages/submitted');
			}
		}else{
			$this->load->view('pages/login');
		}
	}
	
	public function fileinsert(){
		//echo "<br><prewe>Session:";print_r($this->session->all_userdata()); echo "</pre>";
		if(isset($this->session->userdata['logged_in'])){
			$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
			$this->load->view('pages/fileinsert', $data);	
		}else{
			$CurrentPage['CurrentUrl'] = "workarea/fileinsert";
			$this->load->view('pages/login', $CurrentPage);
		}
	}
	public function workflowreport(){
		
		if(isset($this->session->userdata['logged_in'])){
			$data['Provider_Name']= $this->workarea_model->get_Provider();
			$data['InsuranceCompany_Name']= $this->workarea_model->get_Insurance();
			$data['Defendant_Name']= $this->workarea_model->get_Defendant();
			$data['Court']= $this->workarea_model->get_Court();
			$data['Status']= $this->search_model->get_StatusArray();
			$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
			$this->load->view('pages/workflowreport',$data);
		}else{
			$CurrentPage['CurrentUrl'] = "workarea/workflowreport";
			$this->load->view('pages/login', $CurrentPage);
		}
	}
	public function calendar(){
		
		if(isset($this->session->userdata['logged_in'])){
			$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
			$this->load->view('pages/calendar', $data);
		}else{
			$CurrentPage['CurrentUrl'] = "workarea/calendar";
			$this->load->view('pages/login', $CurrentPage);
		}
	}
	public function add_Calendar_Events(){
		$start = $this->input->post("start");
		$end = $this->input->post("end");
		
		$list = $this->workarea_model->add_Calendar_Events($start, $end);
		//echo "<pre>";print_r($list); 
		$data = array();
		$Event_date = "";
		$Tot_Events = 0;
		$counter = 0;
		$description = "";
		$row = array();
		
		foreach($list as $result){
			
			if($Event_date != $result->start){
				if($counter == 1){
					$row['title'] = "Events = ".$Tot_Events;
					$row['start'] = $Event_date;
					$row['url'] = base_url()."workarea/Event_List?Date=".$Event_date;
					$row['description'] = $description;
					$data[] = $row;
					$row = array();
				}
				$counter=1;
				$Tot_Events = 0;
				$description = "";
				$Event_date = $result->start;
			}
			$description = $description."<br>".$result->EventStatusName." = ".$result->event_count;
			$Tot_Events = $Tot_Events + $result->event_count;
			
		}
		//echo '[{ "title": "XXX", "start": "2017-01-12", "description": "Hurrayyyyyyyyyy"}]';
		echo json_encode($data);
	}
	public function Event_List(){
		if(isset($this->session->userdata['logged_in'])){
			$data['Date'] = $this->input->get("Date");
			$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
			$this->load->view("pages/Event_List", $data);
		}else{
			$CurrentPage['CurrentUrl'] = "workarea/calendar";
			$this->load->view('pages/login', $CurrentPage);
		}
	}
	public function get_Event_List(){
		$Date = $this->input->post("Date");
		$list = $this->workarea_model->get_Event_List($Date);
		$data = array();
		$Counter = 0;
		foreach($list as $result){
			$Counter++;
			$row = array();
			
			$row[] = $Counter;
			$row[] = $result->Case_id;
			$row[] = $result->EventTypeName;
			$row[] = $result->EventStatusName;
			$row[] = date_format(date_create($result->Event_Date), 'm/d/Y');
			$row[] = date_format(date_create($result->Event_Date), 'H:i');
			$row[] = $result->Event_Notes;
			$row[] = $result->Assigned_To;
			$row[] = $result->Provider_Name;
			$row[] = $result->InjuredParty_LastName." ".$result->InjuredParty_FirstName;
			$row[] = "court misc";
			$row[] = $result->Court_Name;
			$row[] = $result->IndexOrAAA_Number;
			$row[] = $result->Claim_Amount;
			$row[] = $result->Defendant_Name;
			$row[] = $result->InsuranceCompany_Name;
			$row[] = $result->Status;
			
			$data[] = $row;
		}
		$output = array( "data" => $data );
		echo json_encode($output);
	}
	public function get_Print_Table(){
		$Start_Date = date_format(date_create($this->input->post("SD_Print")), 'Y/m/d');
		$End_Date = date_format(date_create($this->input->post("ED_Print")), 'Y/m/d');
		$DateType = $this->input->post("DateType");
		$Status = $this->input->post("Status");
		$TableName = $this->input->post("TableName");
		
		$list = $this->workarea_model->get_Print_Table($Start_Date, $End_Date, $DateType, $Status, $TableName);
		//$list = $this->workarea_model->get_Print_Table(date_format(date_create("01/01/2010"), 'Y/m/d'), date_format(date_create("01/01/2011"), 'Y/m/d'), "Date_Summons_Sent_Court", "SETTLED", "Print");
		//echo "<pre>"; print_r($list);exit;
		$data = array();
		if($TableName == "Print"){
			foreach($list as $result){
				$row = array();
				$row[] = "<input type='checkbox' name='Elite' />";
				$row[] = $result->Case_Id;
				$row[] = $result->InjuredParty_FirstName." ".$result->InjuredParty_LastName;
				$row[] = $result->Provider_Name;
				$row[] = $result->InsuranceCompany_Name;
				$row[] = $result->Court_Name;
				$row[] = $result->Claim_Amount;
				$row[] = date_format(date_create(substr($result->Date_Opened, 0,10)), "m/d/Y");
				$row[] = "";
				$row[] = date_format(date_create(substr($result->$DateType, 0,10)), "m/d/Y");
				$data[] = $row;
			}
		}else if($TableName == "Status"){
			foreach($list as $result){
				$row = array();
				$row[] = $result->Status;
				$row[] = $result->Count;
				$data[] = $row;
			}
		}else if($TableName == "Provider"){
			foreach($list as $result){
				$row = array();
				$row[] = $result->Provider_Name;
				$row[] = $result->Count;
				$data[] = $row;
			}
		}else{
			foreach($list as $result){
				$row = array();
				$row[] = $result->InsuranceCompany_Name;
				$row[] = $result->Count;
				$row[] = "";
				$data[] = $row;
			}
		}
		
		
		
		$output = array( "data" => $data );
		echo json_encode($output);
	}
} 	
?>