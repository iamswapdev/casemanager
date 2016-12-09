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
				
				$data['CaseInfo']= $this->search_model->get_CaseInfo($Case_AutoIdData);
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
			
			$data['CaseInfo']= $this->search_model->get_CaseInfo_ById($Case_AutoId);
			//echo "<pre>"; print_r($data['Defendant_Name']); exit();
			$this->load->view('pages/workarea_info',$data);
		}else{
			$this->load->view('pages/login');
		}
	}
	public function getCaseInfo($Case_AutoId){
		$data['CaseInfo']= $this->search_model->get_CaseInfo_ById($Case_AutoId);
		echo json_encode($data);
	}
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
	public function getSearchTable(){
		//Nov 31 2012 - May 15 2013  /11-31 2012  /11-31-2012 
		$months = array("Just", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");  
		$list=$this->search_model->get_SearchResult();
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$no."</a>";
			$row[] = "<a href='editcase/".$result->Case_AutoId."'><i title='Edit' class='fa fa-edit'></i></a>";
			//<form action='editcase' method='post'><input type='hidden' name='Case_AutoId' value='".$result->Case_AutoId."'><button type='submit' class='btn btn-primary editRecord'>Edit</button></form>
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Case_Id."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->InjuredParty_LastName.", ".$result->InjuredParty_FirstName."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Provider_Name."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->InsuranceCompany_Name."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Accident_Date."</a>";
			$DateOfService_Start = str_replace(" 12:00AM","",$result->DateOfService_Start);
			$DateOfService_End = str_replace(" 12:00AM","",$result->DateOfService_End);
			
			for($i=0; $i<=12; $i++){
				if(substr($DateOfService_Start, 0, 3) == $months[$i]){
					if($i<10){
						if(substr($DateOfService_Start, 4, 1) == " "){
							$DateOfService_Start7 = substr_replace($DateOfService_Start,"0",4,1);
							$DateOfService_Start2 = str_replace($months[$i]." ","0".$i."-",$DateOfService_Start7);
						}else{
							$DateOfService_Start2 = str_replace($months[$i]." ","0".$i."-",$DateOfService_Start);
						}
					}else{
						$DateOfService_Start2 = str_replace($months[$i]." ",$i."-",$DateOfService_Start);
					}
					$DateOfService_Start3 = substr_replace($DateOfService_Start2,"-",strpos($DateOfService_Start2," "),1);
					
					break;
				}
			}
			for($i=0; $i<=12; $i++){
				if(substr($DateOfService_End, 0, 3) == $months[$i]){
					if($i<10){
						if(substr($DateOfService_End, 4, 1) == " "){
							$DateOfService_End7 = substr_replace($DateOfService_End,"0",4,1);
							$DateOfService_End2 = str_replace($months[$i]." ","0".$i."-",$DateOfService_End7);
						}else{
							$DateOfService_End2 = str_replace($months[$i]." ","0".$i."-",$DateOfService_End);
						}
					}else{
						$DateOfService_End2 = str_replace($months[$i]." ",$i."-",$DateOfService_End);
					}
					$DateOfService_End3 = substr_replace($DateOfService_End2,"-",strpos($DateOfService_End2," "),1);
					
					break;
				}
			}
			
			//07-9-2007- 07-9-2007
			/*$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$DateOfService_Start."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$DateOfService_End."</a>";*/
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$DateOfService_Start3."- ".$DateOfService_End3."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Status."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Ins_Claim_Number."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Claim_Amount."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->IndexOrAAA_Number."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Initial_Status."</a>";
			//$row[] = "<input type='checkbox' name='selectCase[]'> <input type='hidden' name='Case_AutoId' value='".$result->Case_AutoId."' >";
			
			$data[] = $row;
		}
		
		$output = array(
			"data" => $data
		);
		
		echo json_encode($output);
	}
	public function getNotes($Case_Id){
		$list=$this->search_model->get_Notes($Case_Id);
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			$row[] = $result->Notes_Desc;
			$row[] = $result->User_Id;
			$row[] = $result->Notes_Date;
			//$row[] = $result->TIMEONLY;
			$row[] = $result->Notes_Type;
			
			$data[] = $row;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}
	public function getNotes2($Case_Id){
		$list=$this->search_model->get_Notes($Case_Id);
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			$row[] ="<button type='button' class='editNotes'><i title='Edit' class='fa fa-edit'></i></button> <div class='update-Notes' style='display:none;'> <button type='button' class='btn btn-primary update'>Update</button> <button type='button' class='btn btn-primary cancel'>Cancel</button></div>";
			$row[] = $result->Notes_Desc."<input type='hidden' class='tNoteDesc' value='".$result->Notes_Desc."'>";
			$row[] = $result->User_Id."<input type='hidden' class='tNoteUserId' value='".$result->User_Id."'>";
			$row[] = $result->Notes_Date."<input type='hidden' class='tNoteDate' value='".$result->Notes_Date."'>";
			$row[] = $result->Notes_Type."<input type='hidden' class='tNoteType' value='".$result->Notes_Type."'>";
			$row[] = "<input type='hidden' class='tNoteId' value='".$result->Notes_ID."'><input type='checkbox' name='DeleteNotes[]' class='DeleteNotes DeleteNotes".$result->Notes_ID."' value='".$result->Notes_ID."'>";
			
			$data[] = $row;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}
		
		
	public function advancedsearch(){
		$this->session->all_userdata();
		$this->session->all_userdata();
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
	public function updateCaseInfo(){
		$recordNo = $this->input->post("recordNo");
		$Case_Id = $this->input->post("Case_Id");
		if($recordNo == 1){
			$data = array(
				"Provider_Id" => $this->input->post("providerId")
			);
		}else if($recordNo == 2){
			$data = array(
				"Initial_Status" => $this->input->post("caseStatusId")
			);
		}else if($recordNo == 3){
			$data = array(
				"InjuredParty_LastName" => $this->input->post("InjuredParty_LastName"),
				"InjuredParty_FirstName" => $this->input->post("InjuredParty_FirstName")
			);
		}else if($recordNo == 4){
			$data = array(
				"Last_Status" => $this->input->post("currentStatusId")
			);
		}else if($recordNo == 5){
			$data = array(
				"InsuredParty_LastName" => $this->input->post("InsuredParty_LastName"),
				"InsuredParty_FirstName" => $this->input->post("InsuredParty_FirstName")
			);
		}else if($recordNo == 6){
			$data = array(
				"Ins_Claim_Number" => $this->input->post("Ins_Claim_Number")
			);
		}else if($recordNo == 7){
			$data = array(
				"Policy_Number" => $this->input->post("Policy_Number")
			);
		}else if($recordNo == 8){
			$data = array(
				"IndexOrAAA_Number" => $this->input->post("IndexOrAAA_Number")
			);
		}else if($recordNo == 9){
			$data = array(
				"InsuranceCompany_Id" => $this->input->post("insuranceCompanyId")
			);
		}else if($recordNo == 10){
			$data = array(
				"Defendant_Id" => $this->input->post("defendantId")
			);
		}else if($recordNo == 11){
			$data = array(
				"Attorney_FileNumber" => $this->input->post("Attorney_FileNumber")
			);
		}else if($recordNo == 12){
			$data = array(
				"Court_Id" => $this->input->post("courtId")
			);
		}else if($recordNo == 13){
			$data = array(
				"Claim_Amount" => $this->input->post("Claim_Amount")
			);
		}else if($recordNo == 14){
			$data = array(
				"Paid_Amount" => $this->input->post("Paid_Amount")
			);
		}else if($recordNo == 15){
			$data = array(
				"Provider_Id" => $this->input->post("assignToWorkdeskId")
			);
		}else if($recordNo == 16){
			$data = array(
				"Old_Case_Id" => $this->input->post("Old_Case_Id")
			);
		}else if($recordNo == 17){
			$data = array(
				"Accident_Date" => $this->input->post("Accident_Date")
			);
		}else if($recordNo == 18){
			$data = array(
				"Adjuster_Id" => $this->input->post("adjusterId")
			);
		}else if($recordNo == 19){
			$data = array(
				"Plaintiff_Id" => $this->input->post("attorneyId")
			);
		}else if($recordNo == 21){
			$data = array(
				"Date_Opened" => $this->input->post("Date_Opened")
			);
		}else if($recordNo == 22){
			$data = array(
				"Plaintiff_Discovery_Due_Date" => $this->input->post("Plaintiff_Discovery_Due_Date")
			);
		}else if($recordNo == 23){
			$data = array(
				"Accident_Date" => $this->input->post("Accident_Date")
			);
		}else if($recordNo == 24){
			$data = array(
				"Date_Reply_To_Disc_Conf_Letter_Recd" => $this->input->post("Date_Reply_To_Disc_Conf_Letter_Recd")
			);
		}else if($recordNo == 25){
			$data = array(
				"Date_Bill_Submitted" => $this->input->post("Date_Bill_Submitted")
			);
		}else if($recordNo == 26){
			$data = array(
				"Date_Ext_Of_Time" => $this->input->post("Date_Ext_Of_Time")
			);
		}else if($recordNo == 27){
			$data = array(
				"Date_Status_Changed" => $this->input->post("Date_Status_Changed")
			);
		}else if($recordNo == 28){
			$data = array(
				"Date_Ext_Of_Time_2" => $this->input->post("Date_Ext_Of_Time_2")
			);
		}else if($recordNo == 29){
			$data = array(
				"Date_Summons_Printed" => $this->input->post("Date_Summons_Printed")
			);
		}else if($recordNo == 30){
			$data = array(
				"Date_Ext_Of_Time_3" => $this->input->post("Date_Ext_Of_Time_3")
			);
		}
		$success = $this->search_model->update_CaseInfo($data, $Case_Id);
		if($success){
			return true;
		}else{
			return false;
		}
	}
	public function deleteNotes(){
		$data = $this->input->post('checkedNo');
		$delete_success = $this->search_model->delete_Notes($data);
		
		if($delete_success){
			echo json_encode("success");
			return true;
		}else{
			echo json_encode("Falseeee");
			return false;
		}
	}
	public function getSearchTable_2($sproviderId){
		$months = array("Just", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		$list= $this->search_model->get_CaseInfo_ById1($sproviderId);
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$no."</a>";
			$row[] = "<a href='editcase/".$result->Case_AutoId."'><i title='Edit' class='fa fa-edit'></i></a>";
			//<form action='editcase' method='post'><input type='hidden' name='Case_AutoId' value='".$result->Case_AutoId."'><button type='submit' class='btn btn-primary editRecord'>Edit</button></form>
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Case_Id."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'></a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'></a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'></a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Accident_Date."</a>";
			$DateOfService_Start = str_replace(" 12:00AM","",$result->DateOfService_Start);
			$DateOfService_End = str_replace(" 12:00AM","",$result->DateOfService_End);
			
			for($i=0; $i<=12; $i++){
				if(substr($DateOfService_Start, 0, 3) == $months[$i]){
					if($i<10){
						if(substr($DateOfService_Start, 4, 1) == " "){
							$DateOfService_Start7 = substr_replace($DateOfService_Start,"0",4,1);
							$DateOfService_Start2 = str_replace($months[$i]." ","0".$i."-",$DateOfService_Start7);
						}else{
							$DateOfService_Start2 = str_replace($months[$i]." ","0".$i."-",$DateOfService_Start);
						}
					}else{
						$DateOfService_Start2 = str_replace($months[$i]." ",$i."-",$DateOfService_Start);
					}
					$DateOfService_Start3 = substr_replace($DateOfService_Start2,"-",strpos($DateOfService_Start2," "),1);
					
					break;
				}
			}
			for($i=0; $i<=12; $i++){
				if(substr($DateOfService_End, 0, 3) == $months[$i]){
					if($i<10){
						if(substr($DateOfService_End, 4, 1) == " "){
							$DateOfService_End7 = substr_replace($DateOfService_End,"0",4,1);
							$DateOfService_End2 = str_replace($months[$i]." ","0".$i."-",$DateOfService_End7);
						}else{
							$DateOfService_End2 = str_replace($months[$i]." ","0".$i."-",$DateOfService_End);
						}
					}else{
						$DateOfService_End2 = str_replace($months[$i]." ",$i."-",$DateOfService_End);
					}
					$DateOfService_End3 = substr_replace($DateOfService_End2,"-",strpos($DateOfService_End2," "),1);
					
					break;
				}
			}
			
			//07-9-2007- 07-9-2007
			/*$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$DateOfService_Start."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$DateOfService_End."</a>";*/
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$DateOfService_Start3."- ".$DateOfService_End3."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Status."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Ins_Claim_Number."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Claim_Amount."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->IndexOrAAA_Number."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Initial_Status."</a>";
			//$row[] = "<input type='checkbox' name='selectCase[]'> <input type='hidden' name='Case_AutoId' value='".$result->Case_AutoId."' >";
			
			$data[] = $row;
		}
		
		$output = array(
			"data" => $data
		);
		
		echo json_encode($output);
	}
}
?>