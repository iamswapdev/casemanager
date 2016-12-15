<?php
session_cache_limiter('private_no_expire');

class Search extends CI_Controller{

	Public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('search_model');
		$this->load->model('dataentry_model');
	}
	public function index(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$data['SearchResult']=$this->search_model->get_SearchResult();
			$this->load->view('pages/search',$data);
		}else{
			$this->load->view('pages/login');
		}
	}
	public function searchs(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$data['SearchResult']=$this->search_model->get_SearchResult();
			$this->load->view('pages/search',$data);
		}else{
			$this->load->view('pages/login');
		}
	}
	public function advancedsearch(){
		$this->session->all_userdata();
		//echo $this->session->userdata['username'];
		//exit();
		//echo $this->session->userdata['username']; exit();
		if(isset($this->session->userdata['logged_in'])){
			$data['Provider_Name']= $this->search_model->get_Provider();
			$data['InsuranceCompany_Name']= $this->search_model->get_Insurance();
			$data['Status']= $this->search_model->get_StatusArray();
			$data['CaseStatus']= $this->search_model->get_CaseStatus();
			$data['Defendant_Name']= $this->search_model->get_Defendant();
			$data['Adjuster_Name']= $this->search_model->get_Adjuster();
			$data['Court']= $this->search_model->get_CourtArray();
			$data['SearchResult']=$this->search_model->get_SearchResult();
			$this->load->view('pages/advancedsearch',$data);
		}else{
			$this->load->view('pages/login');
		}
	}
	public function editcase($Case_AutoId){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$Case_AutoIdData = array(
					"Case_AutoId" => $Case_AutoId
				);
				$data['Provider_Name']= $this->search_model->get_Provider();
				$data['InsuranceCompany_Name']= $this->search_model->get_Insurance();
				$data['Status']= $this->search_model->get_StatusArray();
				$data['Court']= $this->search_model->get_CourtArray();
				$data['Service']= $this->search_model->get_ServiceArray();
				$data['DenialReasons']= $this->search_model->get_DenialReasonsArray();
				$data['CaseStatus']= $this->search_model->get_CaseStatus();
				$data['State_Name']= $this->dataentry_model->get_States();
				$data['Adjuster_Name']= $this->dataentry_model->get_Adjuster();
				
				$data['CaseInfo']= $this->search_model->get_CaseInfo_ById($Case_AutoId);
				//echo "<pre>"; print_r($data['CaseInfo']); exit();
				$this->load->view('pages/editcase',$data);
				
			}else{
				$this->load->view('pages/login');
			}
		}
	public function viewcase($Case_AutoId){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$data['Provider_Name1']= $this->search_model->get_Provider();
			$data['InsuranceCompany_Name']= $this->search_model->get_Insurance();
			$data['Status']= $this->search_model->get_StatusArray();
			$data['Court']= $this->search_model->get_CourtArray();
			$data['Service']= $this->search_model->get_ServiceArray();
			$data['DenialReasons']= $this->search_model->get_DenialReasonsArray();
			$data['CaseStatus']= $this->search_model->get_CaseStatus();
			$data['Adjuster_Name']= $this->dataentry_model->get_Adjuster();
			$data['Plantiff']= $this->dataentry_model->get_Plantiff();
			$data['Defendant_Name']= $this->dataentry_model->get_Defendant();
			$data['Adjuster_Name_Insurance']= $this->search_model->AdjusterInsurance();
			$data['EventType']= $this->dataentry_model->get_EventTypeArray();
			$data['EventStatus']= $this->dataentry_model->get_EventStatusArray();
			$data['Transactions'] = $this->search_model->Transanction_Info();
			
			$data['CaseInfo']= $this->search_model->get_CaseInfo_ById($Case_AutoId);
			//echo "<pre>"; print_r($data['Adjuster_Name_Insurance']); exit();
			$this->load->view('pages/workarea_info',$data);
		}else{
			$this->load->view('pages/login');
		}
	}
	
	
	public function getSearchTable(){  
		$list=$this->search_model->get_SearchResult();
		$this->Search_Table_Data($list);
	}

/**************************** CASEINFORMATION TAB-1 ************************************************************************************/
	public function getNotes($Case_Id){
		$list=$this->search_model->get_Notes($Case_Id);
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			$row[] = $result->Notes_Desc;
			$row[] = $result->User_Id;
			$row[] = substr($result->Notes_Date, 0, 10);
			$row[] = substr($result->Notes_Date, 11, 8);
			$row[] = $result->Notes_Type;
			
			$data[] = $row;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}
	public function getCaseInfo($Case_AutoId){
		$data['CaseInfo']= $this->search_model->get_CaseInfo_ById($Case_AutoId);
		//echo json_encode($data['CaseInfo'][0]);
		echo json_encode($data);
	}
	public function updateCaseInfo(){
		$recordNo = $this->input->post("recordNo");
		$Case_Id = $this->input->post("Case_Id");
		if($recordNo == 3){
			$data = array(
				"InjuredParty_LastName" => $this->input->post("InjuredParty_LastName"),
				"InjuredParty_FirstName" => $this->input->post("InjuredParty_FirstName")
			);
		}else if($recordNo ==5){
			$data = array(
				"InsuredParty_LastName" => $this->input->post("InsuredParty_LastName"),
				"InsuredParty_FirstName" => $this->input->post("InsuredParty_FirstName")
			);
		}else{
			$data = array(
				$this->input->post("inputName") => $this->input->post("inputValue")
			);
		}
		
		$success = $this->search_model->update_CaseInfo($data, $Case_Id);
		/*if($success){
			return true;
		}else{
			return false;
		}*/
		echo json_encode($data);
	}
	
	public function getSearchTable_2(){
		$Recieveddata = array(
			"Case_Id" => $this->input->post("sCaseId"),
			"InjuredParty_LastName" => $this->input->post("InjuredParty_LastName"),
			"InjuredParty_FirstName" => $this->input->post("InjuredParty_FirstName"),
			"InsuredParty_LastName" => $this->input->post("InsuredParty_LastName"),
			"InsuredParty_FirstName" => $this->input->post("InsuredParty_FirstName"),
			"Policy_Number" => $this->input->post("spolicyNumber"),
			"Ins_Claim_Number" => $this->input->post("sInsuranceClaimNo"),
			"IndexOrAAA_Number" => $this->input->post("sIndexaaa"),
			"Status" => $this->input->post("sStatus"),
			"InsuranceCompany_Id" => $this->input->post("sInsuranceCompanyId"),
			"Court_Id" => $this->input->post("sCourtId"),
			"Initial_Status" => $this->input->post("sCaseStatus"),
			"Provider_Id" => $this->input->post("sProviderId"),
			"Defendant_Id" => $this->input->post("sDefendantId"),
			"Adjuster_Id" => $this->input->post("sAdjusterId"),
			"AccidentDate" => $this->input->post("AccidentDate")
		);
		$list= $this->search_model->get_CaseInfo_ById1($Recieveddata);
		$this->Search_Table_Data($list);
		
	}
/**************************** EDIT CASE INFO TAB-2 ***********************************************************************/
/**************************** NOTES TAB-3 ************************************************************************************/
/***** BIND NOTES TABLE ****/	
	public function getNotes2($Case_Id){
		$list=$this->search_model->get_Notes($Case_Id);
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			$row[] ="<i title='Edit' class='fa fa-edit editNotes'></i>";
			$row[] = $result->Notes_Desc."<input type='hidden' class='tNoteDesc' value='".$result->Notes_Desc."'>";
			$row[] = $result->User_Id."<input type='hidden' class='tNoteUserId' value='".$result->User_Id."'>";
			$row[] = substr($result->Notes_Date, 0, 10)."<input type='hidden' class='tNoteDate' value='".$result->Notes_Date."'>";
			$row[] = substr($result->Notes_Date, 11, 8);
			$row[] = $result->Notes_Type."<input type='hidden' class='tNoteType' value='".$result->Notes_Type."'>";
			$row[] = "<input type='hidden' class='tNoteId' value='".$result->Notes_ID."'><input type='checkbox' name='DeleteNotes[]' class='DeleteNotes DeleteNotes".$result->Notes_ID."' value='".$result->Notes_ID."'>";
			
			$data[] = $row;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}
/**** ADD NOTES ***********/
	public function addNotes(){
		$data = array(
			"Notes_Type" => $this->input->post("notesType"),
			"Notes_Desc" => $this->input->post("notesDescription"),
			"Notes_Date" => $this->input->post("notesAccedentDate"),
			"Case_Id" => $this->input->post("caseId")
			
		);
		$this->search_model->add_Notes($data);
		echo json_encode($data);
		//return true;
	}
/***** DELETE NOTES ********/
	public function deleteNotesFromTab3(){
		$data = $this->input->post('DeletedNotesId');
		$this->search_model->delete_Notes($data);
	}
/***** UPDATE NOTES INFO*/
	public function UpdateNotesInfo(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$data = array(
				"Notes_ID" => $this->input->post('Notes_ID'),
				"Notes_Desc" => $this->input->post('Notes_Desc'),
				"User_Id" => $this->session->userdata['username'],
				"Notes_Date" => $this->input->post('Notes_Date'),
				"Notes_Type" => $this->input->post('Notes_Type'),
			);
			$this->search_model->Update_NotesInfo($data);
		}else{
			$this->load->view('pages/login');
		}
	}
	
	
/**************************** DOCUMENT MANAGER TAB-4 ************************************************************************************/
/**************************** TEMPLATE TAB-5 ************************************************************************************/

/**************************** SETTLEMENT TAB-6 ************************************************************************************/
/**************************** PAYMENET TAB-7 ************************************************************************************/
	public function SettlementQuickView($Case_AutoId){
		$list= $this->search_model->get_CaseInfo_ById2($Case_AutoId);
		//echo "<pre>";print_r($list);exit();
		$data = array();
		foreach ($list as $result) {
			$row = array();
			$row[] = $result->Case_Id;
			$row[] = $result->Provider_Name;
			$row[] = $result->InjuredParty_LastName." ".$result->InjuredParty_FirstName;
			$row[] = $result->InsuranceCompany_Name;
			$row[] = $result->IndexOrAAA_Number;
			$row[] = $result->Claim_Amount;
			$row[] = $result->Paid_Amount;
			$row[] = $result->Last_Status;
			$row[] = $result->Last_Status;
			$row[] = $result->FLT_SETTLEMENT_AMOUNT;
			$row[] = $result->FLT_INTERATE_RATE;
			$row[] = $result->FLT_ATTORNEY_FEE;
			$row[] = $result->FLT_FILING_FEE;
			$row[] = $result->Case_Id;
			$row[] = $result->Case_Id;
			$row[] = $result->Case_Id;
			$row[] = $result->Case_Id;
			
			$data[] = $row;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}
	public function getTransactions($Case_Id){
		$list= $this->search_model->get_Transactions($Case_Id);
		//echo "<pre>";print_r($list);exit();
		$data = array();
		foreach ($list as $result) {
			$row = array();
			$row[] = "<input type='text' name='Provider_Name' class='form-control input-sm input-height' value='".$result->Provider_Name."' >";
			$row[] = "<input type='text' name='Transactions_Type' class='form-control input-sm input-height' value='".$result->Transactions_Type."' >";
			$row[] = "<input type='text' name='ServiceType' class='form-control input-sm input-height' value='".$result->Transactions_Date."' >";
			$row[] = "<input type='text' name='Transactions_Amount' class='form-control input-sm input-height' value='".$result->Transactions_Amount."' >";
			$row[] = "<input type='text' name='Transactions_Description' class='form-control input-sm input-height' value='".$result->Transactions_Description."' >";
			$row[] = "<input type='text' name='ServiceType' class='form-control input-sm input-height' value='".$result->Transactions_Fee."' >";
			$row[] = "<input type='text' name='Transactions_status' class='form-control input-sm input-height' value='".$result->Transactions_status."' >";
			$row[] = "<input type='checkbox' name='deleteCheckedTransactions' class='deleteCheckedTransactions deleteCheckedTransactions".$result->Transactions_Id."' value='".$result->Transactions_Id."' >";
			
			$data[] = $row;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}
	public function addTransactions(){
		$data = array(
			"Case_Id" => $this->input->post('Case_Id'),
			"Transactions_Amount" => $this->input->post('Transactions_Amount'),
			"Transactions_Date" => $this->input->post('Transactions_Date'),
			"Transactions_Type" => $this->input->post('Transactions_Type'),
			"Transactions_status" => $this->input->post('Transactions_status'),
			"Transactions_Description" => $this->input->post('Transactions_Description'),
		);
		$success = $this->search_model->add_Transaction($data);
		if($success){
			return true;
		}else{
			return false;
		}
	}
	public function deleteTransactions(){
		$CheckedTransactions = $this->input->post('deleteCheckedTransactions');
		$delete_success = $this->search_model->delete_Transactions($CheckedTransactions);
		if($delete_success){
			return true;
		}else{
			return false;
		}
	}
/**************************** EVENT TAB-8 ************************************************************************************/
/**** GET EVENT LIST BY CASE ID ********/
	public function getEvents($Case_Id){
		$list=$this->search_model->get_Events($Case_Id);
		//echo "<pre>";print_r($list);exit();
		$data = array();
		foreach ($list as $result) {
			$row = array();
			$row[] ="<i title='Edit' class='fa fa-edit editEventsButton'></i><input type='hidden' name='Assigned_To' value='".$result->Assigned_To."'>"."<input type='hidden' name='EventId' value='".$result->Event_id."'>";
			$row[] = $result->Case_Id;
			$row[] = $result->EventTypeName."<input type='hidden' name='EventTypeIdHidden' value='".$result->EventTypeId."'>";
			$row[] = $result->EventStatusName."<input type='hidden' name='EventStatusIdHidden' value='".$result->EventStatusId."'>";
			$row[] = substr($result->Event_Date, 0, 10);
			$row[] = substr($result->Event_Date, 11, 8);
			$row[] = $result->Event_Notes;
			$row[] = $result->Assigned_To;
			$row[] = $result->Provider_Name;
			$row[] = $result->InjuredParty_LastName." ".$result->InjuredParty_FirstName;
			$row[] = $result->Court_Name;
			$row[] = $result->IndexOrAAA_Number;
			$row[] = $result->Defendant_Name;
			$row[] = $result->InsuranceCompany_Name;
			$row[] = "<input type='checkbox' name='deleteCheckedEvents[]' class='deleteCheckedEvents deleteCheckedEvents".$result->Event_id."' value='".$result->Event_id."'>";
			
			$data[] = $row;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}
/**** delete EVENT LIST ********/
	public function deleteEvents(){
		$CheckedEvents = $this->input->post('deleteCheckedEvents');
		$delete_success = $this->search_model->delete_Events($CheckedEvents);
		if($delete_success){
			return true;
		}else{
			return false;
		}
	}
/**** update EVENT LIST INFO BY ********/
	public function updateEventInfo(){
		$data = array(
			"User_id" => $this->input->post("UserId"),
			"Event_Date" => $this->input->post("EventDate"),
			"EventTypeId" => $this->input->post("EventTypeHidden"),
			"EventStatusId" => $this->input->post("EventStatusHidden"),
			"Event_Time" => $this->input->post("EventTime"),
			"Event_Notes" => $this->input->post("EventDescription"),
			"Assigned_To" => $this->input->post("AssignUser"),
			"Event_id" => $this->input->post("EventIdHidden")
		);
		$this->search_model->update_EventInfo($data);
		//echo "<pre>"; print_r($data);exit();
	}
/*****************************************************************************************************************************************/
	public function Search_Table_Data($list){
		$months = array("Just", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "jan");
		
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$no."</a>";
			$row[] = "<a href='editcase/".$result->Case_AutoId."'><i title='Edit' class='fa fa-edit'></i></a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Case_Id."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->InjuredParty_LastName." ".$result->InjuredParty_FirstName."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Provider_Name."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->InsuranceCompany_Name."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Accident_Date."</a>";
			$DateOfService_Start = substr_replace($result->DateOfService_Start,"",11,8);
			$DateOfService_End = substr_replace($result->DateOfService_End,"",11,8);
			
			
			for($i=0; $i<=13; $i++){
				if(substr($DateOfService_Start, 0, 3) == $months[$i]){
					if($i<10){
						if(substr($DateOfService_Start, 4, 1) == " "){
							$DateOfService_Start7 = substr_replace($DateOfService_Start,"0",4,1);
							if($i == 13){
								$DateOfService_Start2 = str_replace($months[$i]." ","01/",$DateOfService_Start7);
							}else{
								$DateOfService_Start2 = str_replace($months[$i]." ","0".$i."/",$DateOfService_Start7);
							}
							
						}else{
							if($i == 13){
								$DateOfService_Start2 = str_replace($months[$i]." ","01/",$DateOfService_Start);
							}else{
								$DateOfService_Start2 = str_replace($months[$i]." ","0".$i."/",$DateOfService_Start);
							}
							
						}
					}else{
						$DateOfService_Start2 = str_replace($months[$i]." ",$i."/",$DateOfService_Start);
					}
					$DateOfService_Start3 = substr_replace($DateOfService_Start2,"/",strpos($DateOfService_Start2," "),1);
					$DateOfService_Start = $DateOfService_Start3;
					break;
				}
			}
			for($i=0; $i<=13; $i++){
				if(substr($DateOfService_End, 0, 3) == $months[$i]){
					if($i<10){
						if(substr($DateOfService_End, 4, 1) == " "){
							$DateOfService_End7 = substr_replace($DateOfService_End,"0",4,1);
							if($i == 13){
								$DateOfService_End2 = str_replace($months[$i]." ","01/",$DateOfService_End7);
							}else{
								$DateOfService_End2 = str_replace($months[$i]." ","0".$i."/",$DateOfService_End7);
							}
						}else{
							if($i == 13){
								$DateOfService_End2 = str_replace($months[$i]." ","01/",$DateOfService_End);
							}else{
								$DateOfService_End2 = str_replace($months[$i]." ","0".$i."/",$DateOfService_End);
							}
						}
					}else{
						$DateOfService_End2 = str_replace($months[$i]." ",$i."/",$DateOfService_End);
					}
					$DateOfService_End3 = substr_replace($DateOfService_End2,"/",strpos($DateOfService_End2," "),1);
					$DateOfService_End = $DateOfService_End3;
					break;
				}
			}
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$DateOfService_Start." - ".$DateOfService_End."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Status."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Ins_Claim_Number."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Claim_Amount."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->IndexOrAAA_Number."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Initial_Status."</a>";
			$data[] = $row;
		}
		
		$output = array(
			"data" => $data
		);
		
		echo json_encode($output);
	}
/*****************************************************************************************************************************************/
}
?>