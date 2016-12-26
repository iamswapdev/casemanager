<?php
session_cache_limiter('private_no_expire');

class Search extends CI_Controller{
	public $username = "";
	public $Case_Id = "";
	Public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('search_model');
		$this->load->model('dataentry_model');
	}
	public function index(){
		$this->session->all_userdata();
		$this->$username = $this->session->userdata['logged_in']['username'];
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
		//echo "<pre>"; echo $this->session->userdata['logged_in']['username']; exit();
		//print_r($this->session->all_userdata());
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
			$Provider_Id = $data['CaseInfo'][0]['Provider_Id'];
			$InsuranceCompany_Id = $data['CaseInfo'][0]['InsuranceCompany_Id'];
			$Defendant_Id = $data['CaseInfo'][0]['Defendant_Id'];
			$Adjuster_Id = $data['CaseInfo'][0]['Adjuster_Id'];
			
			//$data['Provider_Info']= $this->search_model->get_Provider_ById($Provider_Id);
			$data['InsuranceCompany_Info']= $this->search_model->get_Insurance_ById($InsuranceCompany_Id);
			$data['Defendant_Info']= $this->search_model->get_Defendant_ById($Defendant_Id);
			$data['Adjuster_Info']= $this->search_model->get_Adjuster_ById($Adjuster_Id);
			
			$data3 = array(
				"Notes_Type" => "ACTIVITY",
				"Notes_Desc" => "File Viewed",
				"Notes_Date" => $date = date('Y-m-d H:i:s'),
				"Case_Id" => $data['CaseInfo'][0]['Case_Id'],
				"User_Id" => $this->session->userdata['logged_in']['username']
			);
			$this->search_model->add_Notes($data3);
			
			$this->load->view('pages/workarea_info',$data);
		}else{
			$this->load->view('pages/login');
		}
	}
/* GET SETTLED BY INFO BY CASE ID*/
	public function get_Settled_By($Case_Id){
		$data = $this->search_model->getSettled_By($Case_Id);
		//echo "<pre>";print_r($data);
		echo json_encode($data);
	}
/*GET TREATEMENT TABLE*/
	public function getTreatement($Case_Id){
		$list = $this->search_model->get_Treatment($Case_Id);
		//echo "<pre>"; print_r($list); exit();  date_format(substr($result->DateOfService_Start, 0,9),'m/d/Y H:i:s"')
		//substr(date_format($result->DateOfService_Start, 'm/d/Y H:i:s'), 0,9) 2010-11-30 00:00:00.000000
		//date_format(date_create(substr($result->DateOfService_Start,0,18)),'m/d/Y')
		
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			$row[] ="<button type='button' class='btn editTreatment'>Edit</button> <div class='update-Treatment' style='display:none;'> <button type='button' class='btn btn-primary update'>Update</button> <button type='button' class='btn cancel'>Cancel</button></div>";
			$row[] = "<input type='text' name='dateOfServiceStart' class='form-control input-sm datetimepicker_Dos_Doe dos-date dos-input' value='".date_format(date_create(substr($result->DateOfService_Start, 0, 10)), 'm/d/Y')."' disabled>";
			$row[] = "<input type='text' name='dateOfServiceEnd' class='form-control input-sm datetimepicker_Dos_Doe dos-date dos-input' value='".date_format(date_create(substr($result->DateOfService_End, 0, 10)), 'm/d/Y')."' disabled>";
			$row[] = "<input type='text' name='Claim_Amount_treat' class='form-control input-sm amt-input' value='".$result->Claim_Amount."' disabled>";
			$row[] = "<input type='text' name='Paid_Amount_treat' class='form-control input-sm amt-input' value='".$result->Paid_Amount."' disabled>";
			$row[] = "<input type='text' name='Date_BillSent_treat' class='form-control input-sm datetimepicker_Dos_Doe dos-input' value='".$result->Date_BillSent."' disabled>";
			$row[] = "<div class='SERVICE_TYPE_treat_div'> <input type='text' name='SERVICE_TYPE_treat' class='form-control input-sm' value='".$result->SERVICE_TYPE."' disabled><input type='hidden' name='SERVICE_TYPE_treat_hidden' value='".$result->SERVICE_TYPE."'> </div>";
			
			
			
			$row[] = "<div class='DENIALREASONS_TYPE_treat_div'> <input type='text' name='DENIALREASONS_TYPE_treat' class='form-control input-sm' value='".$result->DENIALREASONS_TYPE."' disabled> <input type='hidden' name='DENIALREASONS_TYPE_treat_hidden' value='".$result->DENIALREASONS_TYPE."'> </div>";
			$row[] = "<input type='checkbox' name='DeleteTreatement[]' class='DeleteTreatement DeleteTreatement".$result->Treatment_Id."' value=".$result->Treatment_Id."> <input type='hidden' name='Treatment_Id' value='".$result->Treatment_Id."' >";
			$data[] = $row;
		}
		$output = array(
			"data" => $data
		);
		//echo "<pre>"; print_r($output); exit();
		echo json_encode($output);
	}
/*UPDATE TREATEMENT RECORDS*/
	public function update_Treatement(){
		$Treatment_Id = $this->input->post("Treatment_Id");
		$data = array(
			"DateOfService_Start" => $this->input->post('DateOfService_Start'),
			"DateOfService_End" => $this->input->post('DateOfService_End'),
			"Claim_Amount" => $this->input->post('Claim_Amount'),
			"Paid_Amount" => $this->input->post('Paid_Amount'),
			"Date_BillSent" => $this->input->post('Date_BillSent'),
			"SERVICE_TYPE" => $this->input->post('currentServiceType'),
			"DENIALREASONS_TYPE" => $this->input->post('currentDenialReasonType')
		);
		$this->search_model->updateTreatement($data, $Treatment_Id);
		echo json_encode($data);
	}
/*ADD TREATEMENT RECORDS*/
	public function add_Treatement(){
		$data = array(
			"DateOfService_Start" => $this->input->post('DateOfService_Start'),
			"DateOfService_End" => $this->input->post('DateOfService_End'),
			"Claim_Amount" => $this->input->post('Claim_Amount'),
			"Paid_Amount" => $this->input->post('Paid_Amount'),
			"Date_BillSent" => $this->input->post('Date_BillSent'),
			"Case_Id" => $this->input->post("Case_Id"),
			"DENIALREASONS_TYPE" =>$this->input->post("denialReasons"),
			"SERVICE_TYPE" => $this->input->post("serviceType")
		);
		$this->search_model->addTreatement($data);
	}
/*ADD TREATEMENT RECORDS*/
	public function deleteTreatement(){
		$data = $this->input->post('DeletedTreatementId');
		$this->search_model->delete_Treatement($data);
	}
	public function getProvider_ById($Provider_Id){
		$list=$this->search_model->get_Provider_ById($Provider_Id);
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			$row[] = $result->Provider_Name;
			$row[] = $result->Provider_Perm_Address;
			$row[] = $result->Provider_Perm_City;
			$row[] = $result->Provider_Perm_State;
			$row[] = $result->Provider_Perm_Zip;
			$row[] = $result->Provider_Perm_Phone;
			$row[] = $result->Provider_Perm_Fax;
			$row[] = $result->Provider_Email;
			$row[] = $result->Provider_Type;
			
			$data[] = $row;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}
	public function getInsurance_ById($InsuranceCompany_Id){
		$list=$this->search_model->get_Insurance_ById($InsuranceCompany_Id);
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			$row[] = $result->InsuranceCompany_Name;
			$row[] = $result->InsuranceCompany_Local_Address;
			$row[] = $result->InsuranceCompany_Local_City;
			$row[] = $result->InsuranceCompany_Local_State;
			$row[] = $result->InsuranceCompany_Local_Zip;
			$row[] = $result->InsuranceCompany_Local_Phone;
			$row[] = $result->InsuranceCompany_Local_Fax;
			$row[] = $result->InsuranceCompany_Email;
			
			$data[] = $row;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}
	public function getDefendant_ById($Defendant_Id){
		$list=$this->search_model->get_Defendant_ById($Defendant_Id);
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			$row[] = $result->Defendant_Name;
			$row[] = $result->Defendant_Address;
			$row[] = $result->Defendant_City;
			$row[] = $result->Defendant_State;
			$row[] = $result->Defendant_Zip;
			$row[] = $result->Defendant_Phone;
			$row[] = $result->Defendant_Fax;
			$row[] = $result->Defendant_Email;
			$row[] = "Defendant ".$result->active;
			
			$data[] = $row;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}
	public function getAdjuster_ById($Adjuster_Id){
		$list=$this->search_model->get_Adjuster_ById($Adjuster_Id);
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			$row[] = $result->Adjuster_LastName." ". $result->Adjuster_FirstName;
			$row[] = "";
			$row[] = "";
			$row[] = "";
			$row[] = "";
			$row[] = $result->Adjuster_Phone;
			$row[] = $result->Adjuster_Phone_Ext;
			$row[] = $result->Adjuster_Fax;
			$row[] = $result->Adjuster_Email;
			$row[] = "Adjuster".$result->IS_BIT;
			
			$data[] = $row;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}
	public function getInjured_ById($Case_AutoId){
		$list=$this->search_model->get_CaseInfo_ById2($Case_AutoId);
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			$row[] = $result->InjuredParty_LastName." ". $result->InjuredParty_FirstName;
			$row[] = $result->InjuredParty_Address;
			$row[] = $result->InjuredParty_City;
			$row[] = $result->InjuredParty_State;
			$row[] = $result->InjuredParty_Zip;
			$row[] = $result->InjuredParty_Phone;
			
			$data[] = $row;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}
	public function getInsured_ById($Case_AutoId){
		$list=$this->search_model->get_CaseInfo_ById2($Case_AutoId);
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			$row[] = $result->InsuredParty_LastName." ". $result->InsuredParty_FirstName;
			$row[] = $result->InsuredParty_Address;
			$row[] = $result->InsuredParty_City;
			$row[] = $result->InsuredParty_State;
			$row[] = $result->InsuredParty_Zip;
			
			$data[] = $row;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
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
/**** ADD NOTES ***********/
	public function addNotes(){
		$data = array(
			"Notes_Type" => $this->input->post("notesType"),
			"Notes_Desc" => $this->input->post("notesDescription"),
			"Notes_Date" => $this->input->post("notesAccidentDate"),
			"Case_Id" => $this->input->post("caseId"),
			"User_Id" => $this->session->userdata['logged_in']['username']
		);
		$this->search_model->add_Notes($data);
		echo json_encode($data);
		//return true;
	}
	public function getCaseInfo($Case_AutoId){
		$data['CaseInfo']= $this->search_model->get_CaseInfo_ById($Case_AutoId);
		//echo "<pre>"; print_r($data['CaseInfo']); exit();
		//echo $data['CaseInfo'][0]['Date_Summons_Printed'];
		if($data['CaseInfo'][0]['Accident_Date'] !=""){
			$data['CaseInfo'][0]['Accident_Date'] = date_format(date_create(substr($data['CaseInfo'][0]['Accident_Date'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Date_Status_Changed'] !=""){
			$data['CaseInfo'][0]['Date_Status_Changed'] = date_format(date_create(substr($data['CaseInfo'][0]['Date_Status_Changed'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Date_Answer_Received'] !=""){
			$data['CaseInfo'][0]['Date_Answer_Received'] = date_format(date_create(substr($data['CaseInfo'][0]['Date_Answer_Received'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Motion_Date'] !=""){
			$data['CaseInfo'][0]['Motion_Date'] = date_format(date_create(substr($data['CaseInfo'][0]['Motion_Date'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Date_Ext_Of_Time_2'] !=""){
			$data['CaseInfo'][0]['Date_Ext_Of_Time_2'] = date_format(date_create(substr($data['CaseInfo'][0]['Date_Ext_Of_Time_2'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['DateOfService_Start'] !=""){
			$data['CaseInfo'][0]['DateOfService_Start'] = date_format(date_create(substr($data['CaseInfo'][0]['DateOfService_Start'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['DateOfService_End'] !=""){
			$data['CaseInfo'][0]['DateOfService_End'] = date_format(date_create(substr($data['CaseInfo'][0]['DateOfService_End'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Date_Summons_Printed'] !=""){
			$data['CaseInfo'][0]['Date_Summons_Printed'] = date_format(date_create(substr($data['CaseInfo'][0]['Date_Summons_Printed'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Plaintiff_Discovery_Due_Date'] !=""){
			$data['CaseInfo'][0]['Plaintiff_Discovery_Due_Date'] = date_format(date_create(substr($data['CaseInfo'][0]['Plaintiff_Discovery_Due_Date'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Defendant_Discovery_Due_Date'] !=""){
			$data['CaseInfo'][0]['Defendant_Discovery_Due_Date'] = date_format(date_create(substr($data['CaseInfo'][0]['Defendant_Discovery_Due_Date'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Date_Bill_Submitted'] !=""){
			$data['CaseInfo'][0]['Date_Bill_Submitted'] = date_format(date_create(substr($data['CaseInfo'][0]['Date_Bill_Submitted'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Date_Index_Number_Purchased'] !=""){
			$data['CaseInfo'][0]['Date_Index_Number_Purchased'] = date_format(date_create(substr($data['CaseInfo'][0]['Date_Index_Number_Purchased'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Date_Afidavit_Filed'] !=""){
			$data['CaseInfo'][0]['Date_Afidavit_Filed'] = date_format(date_create(substr($data['CaseInfo'][0]['Date_Afidavit_Filed'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Date_Ext_Of_Time'] !=""){
			$data['CaseInfo'][0]['Date_Ext_Of_Time'] = date_format(date_create(substr($data['CaseInfo'][0]['Date_Ext_Of_Time'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Date_Summons_Sent_Court'] !=""){
			$data['CaseInfo'][0]['Date_Summons_Sent_Court'] = date_format(date_create(substr($data['CaseInfo'][0]['Date_Summons_Sent_Court'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Date_Ext_Of_Time_3'] !=""){
			$data['CaseInfo'][0]['Date_Ext_Of_Time_3'] = date_format(date_create(substr($data['CaseInfo'][0]['Date_Ext_Of_Time_3'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Served_On_Date'] !=""){
			$data['CaseInfo'][0]['Served_On_Date'] = date_format(date_create(substr($data['CaseInfo'][0]['Served_On_Date'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Date_Closed'] !=""){
			$data['CaseInfo'][0]['Date_Closed'] = date_format(date_create(substr($data['CaseInfo'][0]['Date_Closed'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Date_Demands_Printed'] !=""){
			$data['CaseInfo'][0]['Date_Demands_Printed'] = date_format(date_create(substr($data['CaseInfo'][0]['Date_Demands_Printed'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Date_Disc_Conf_Letter_Printed'] !=""){
			$data['CaseInfo'][0]['Date_Disc_Conf_Letter_Printed'] = date_format(date_create(substr($data['CaseInfo'][0]['Date_Disc_Conf_Letter_Printed'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Date_Reply_To_Disc_Conf_Letter_Recd'] !=""){
			$data['CaseInfo'][0]['Date_Reply_To_Disc_Conf_Letter_Recd'] = date_format(date_create(substr($data['CaseInfo'][0]['Date_Reply_To_Disc_Conf_Letter_Recd'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['Arb_Award_Date'] !=""){
			$data['CaseInfo'][0]['Arb_Award_Date'] = date_format(date_create(substr($data['CaseInfo'][0]['Arb_Award_Date'],0,19)),"m/d/Y");
		}
		if($data['CaseInfo'][0]['AAA_Conciliation_Date'] !=""){
			$data['CaseInfo'][0]['AAA_Conciliation_Date'] = date_format(date_create(substr($data['CaseInfo'][0]['AAA_Conciliation_Date'],0,19)),"m/d/Y");
		}
		
		echo json_encode($data);
	}
	public function updateCaseInfo(){
		$recordNo = $this->input->post("recordNo");
		$Case_AutoId = $this->input->post("Case_AutoId");
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
		
		if($recordNo ==3){
			$PreviousValue1 = $this->get_Changed_Value("InjuredParty_LastName", $Case_AutoId);
			$PreviousValue2 = $this->get_Changed_Value("InjuredParty_FirstName", $Case_AutoId);
		}else if($recordNo ==5){
			$PreviousValue1 = $this->get_Changed_Value("InsuredParty_LastName", $Case_AutoId);
			$PreviousValue2 = $this->get_Changed_Value("InsuredParty_FirstName", $Case_AutoId);
		}else{
			$PreviousValue = $this->get_Changed_Value($this->input->post("inputName"), $Case_AutoId);
		}
		
		
		
		$success = $this->search_model->update_CaseInfo($data, $Case_AutoId);

		
		if($recordNo ==3){
			$NewValue1 = $this->get_Changed_Value("InjuredParty_LastName", $Case_AutoId);
			$NewValue2 = $this->get_Changed_Value("InjuredParty_FirstName", $Case_AutoId);
		}else if($recordNo ==5){
			$NewValue1 = $this->get_Changed_Value("InsuredParty_LastName", $Case_AutoId);
			$NewValue2 = $this->get_Changed_Value("InsuredParty_FirstName", $Case_AutoId);
		}else{
			$NewValue = $this->get_Changed_Value($this->input->post("inputName"), $Case_AutoId);
		}
		$data3 = array(
			"Notes_Type" => "ACTIVITY",
			"Notes_Desc" => $this->input->post("inputName")." Changed from ".$PreviousValue." To ".$NewValue,
			"Notes_Date" => $date = date('Y-m-d H:i:s'),
			"Case_Id" => $Case_Id,
			"User_Id" => $this->session->userdata['logged_in']['username']
		);
		if($recordNo == 3){
			$data3['Notes_Desc'] = "InjuredParty Name Changed from ".$PreviousValue1." ".$PreviousValue2." To ".$NewValue1." ".$NewValue2;
		}else if($recordNo ==5){
			$data3['Notes_Desc'] = "InsuredParty Name Changed from ".$PreviousValue1." ".$PreviousValue2." To ".$NewValue1." ".$NewValue2;
		}else if($recordNo ==36 || $recordNo ==38 || $recordNo ==40){
			if($PreviousValue == 1){
				$PreviousValue = "Yes";
			}else{
				$PreviousValue ="No";
			}
			if($NewValue == 1){
				$NewValue = "Yes";
			}else{
				$NewValue ="No";
			}
			$data3['Notes_Desc'] = $this->input->post("inputName")." Changed from ".$PreviousValue." To ".$NewValue;
		}else{
			$data3['Notes_Desc'] = $this->input->post("inputName")." Changed from ".$PreviousValue." To ".$NewValue;
		}
		$this->search_model->add_Notes($data3);
	}
	public function get_Changed_Value($Field_Name, $Case_AutoId){
		$list= $this->search_model->get_CaseInfo_ById($Case_AutoId);
		//echo "<pre>"; print_r($list);
		if($Field_Name == "Provider_Id"){
			return $list[0]["Provider_Name"];
		}else if($Field_Name == "InsuranceCompany_Id"){
			return $list[0]["InsuranceCompany_Name"];
		}else if($Field_Name == "Defendant_Id"){
			return $list[0]["Defendant_Name"];
		}else if($Field_Name == "Court_Id"){
			return $list[0]["Court_Name"];
		}else if($Field_Name == "Adjuster_Id"){
			return $list[0]["Adjuster_LastName"]." ".$list[0]["Adjuster_FirstName"];
		}else if($Field_Name == "Plaintiff_Id"){
			return $list[0]["Attorney_Name"];
		}else{
			return $list[0][$Field_Name];
		}
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
	
	public function update_Settlement(){
		$data = array(
			"Settlement_Amount" =>$this->input->post('Settlement_Amount'),
			"Settlement_Int" => $this->input->post('Settlement_Int'),
			"Settlement_Af" => $this->input->post('Settlement_Af'),
			"Settlement_Ff" => $this->input->post('Settlement_Ff'),
			"Settlement_Total" => $this->input->post('Settlement_Total'),
			"Settlement_Date" => date('Y-m-d H:i:s'),
			"User_Id" => $this->session->userdata['logged_in']['username'],
			"Settlement_Notes" => $this->input->post('Settlement_Notes')
		);
		if($this->input->post('SettledWithAdjuster') != ""){
			$data['SettledWith'] = $this->input->post('SettledWithAdjuster');
		}else{
			$data['SettledWith'] = $this->input->post('SettledWithAttorney');
		}
		$Case_Id = $this->input->post('Case_Id');
		$this->search_model->updateSettlement($data,$Case_Id);
		//echo "<pre>"; print_r($data);
	}
	public function reset_Settlement($Case_AutoId){
		$this->search_model->resetSettlement($Case_AutoId);
	}
	public function get_Current_Status($Case_AutoId){
		$data = $this->search_model->getCurrent_Status($Case_AutoId);
		//echo "<pre>";print_r($data);
		echo json_encode($data);
	}

/**************************** PAYMENET TAB-7 ************************************************************************************/
/*GET SETTLEMENT QUICK VIEW TABLE*/
	public function SettlementQuickView($Case_Id){
		$list= $this->search_model->get_SettlementQuickView($Case_Id);
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
			$row[] = $result->Settlement_Amount;
			$row[] = $result->Settlement_Int;
			$row[] = $result->Settlement_Af;
			$row[] = $result->Settlement_Ff;
			$row[] = $result->Settlement_Total;
			$row[] = date_format(date_create(substr($result->Settlement_Date,0,10)),"m/d/Y");
			$row[] = $result->SettledWith;
			$row[] = $result->User_Id;
			
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
			$row[] = "<input type='checkbox' name='deleteCheckedTransactions[]' class='deleteCheckedTransactions deleteCheckedTransactions".$result->Transactions_Id."' value='".$result->Transactions_Id."' >";
			
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
			"Provider_Id" => $this->input->post('Provider_Id_Trans')
		);
		$success = $this->search_model->add_Transaction($data);
		if($success){
			$list= $this->search_model->get_Transactions($data['Case_Id']);
			//echo "<pre>";print_r($list);exit();
			$data2 = array();
			foreach ($list as $result) {
				$row = array();
				$row[] = "<input type='text' name='Provider_Name' class='form-control input-sm input-height' value='".$result->Provider_Name."' >";
				$row[] = "<input type='text' name='Transactions_Type' class='form-control input-sm input-height' value='".$result->Transactions_Type."' >";
				$row[] = "<input type='text' name='Transactions_Date' class='form-control input-sm input-height' value='".$result->Transactions_Date."' >";
				$row[] = "<input type='text' name='Transactions_Amount' class='form-control input-sm input-height' value='".$result->Transactions_Amount."' >";
				$row[] = "<input type='text' name='Transactions_Description' class='form-control input-sm input-height' value='".$result->Transactions_Description."' >";
				$row[] = "<input type='text' name='Transactions_Fee' class='form-control input-sm input-height' value='".$result->Transactions_Fee."' >";
				$row[] = "<input type='text' name='Transactions_status' class='form-control input-sm input-height' value='".$result->Transactions_status."' >";
				$row[] = "<input type='checkbox' name='deleteCheckedTransactions[]' class='deleteCheckedTransactions deleteCheckedTransactions".$result->Transactions_Id."' value='".$result->Transactions_Id."' >";
				
				$data2[] = $row;
			}
			$output = array(
				"data" => $data2
			);
			$data3 = array(
				"Notes_Type" => "ACTIVITY",
				"Notes_Desc" => "Payment/Transaction posted : $".$data['Transactions_Amount']." (".$data['Transactions_Type'].") Desc->".$data['Transactions_Description'],
				"Notes_Date" => $date = date('Y-m-d H:i:s'),
				"Case_Id" => $data['Case_Id'],
				"User_Id" => $this->session->userdata['logged_in']['username']
			);
			$this->search_model->add_Notes($data3);
			echo json_encode($output);
		}else{
			return false;
		}
	}
	public function deleteTransactions(){
		$CheckedTransactions = $this->input->post('deleteCheckedTransactions');
		$CheckedTransactionsAmt = $this->input->post('CheckedTransactionsAmt');
		$CheckedTransactionsType = $this->input->post('CheckedTransactionsType');
		$CheckedTransactionsDesc = $this->input->post('CheckedTransactionsDesc');
		$Case_Id = $this->input->post('Case_Id');
		$delete_success = $this->search_model->delete_Transactions($CheckedTransactions);
		
		for($i=0; $i<count($CheckedTransactions); $i++){
			$data[$i] = array(
				"Notes_Type" => "ACTIVITY",
				"Notes_Desc" => "Payment/Transaction deleted : $".$CheckedTransactionsAmt[$i]." (".$CheckedTransactionsType[$i].") Desc->".$CheckedTransactionsDesc[$i],
				"Notes_Date" => $date = date('Y-m-d H:i:s'),
				"Case_Id" => $Case_Id,
				"User_Id" => $this->session->userdata['logged_in']['username']
			);
			$this->search_model->add_Notes($data[$i]);
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
			$row[] = "<a href='".base_url()."search/editcase/".$result->Case_AutoId."'><i title='Edit' class='fa fa-edit'></i></a>";
			$row[] = "<a href='".base_url()."search/viewcase/".$result->Case_AutoId."'>".$result->Case_Id."</a>";
			$row[] = "<a href='".base_url()."search/viewcase/".$result->Case_AutoId."'>".$result->InjuredParty_LastName." ".$result->InjuredParty_FirstName."</a>";
			$row[] = "<a href='".base_url()."search/viewcase/".$result->Case_AutoId."'>".$result->Provider_Name."</a>";
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
	public function testmethod(){
		/*echo "Case_Id: ".$this->Case_Id; exit();
		$date = date('Y-m-d H:i:s');
		echo "date:".date('Y');
		//2014-06-17 00:00:00.00000
		$q = date_create("2014-06-17");
		$w = date_format($q, "m/d/Y");
		echo "<br>JJJ:".substr(date("Y"), 2, 2);*/
		
		$date2="";
		$date3= date_create(substr($date2,0,19));
		echo "<br>Data:".$date2;
		echo "<br><br>New format:".date_format(date_create(substr($date2,0,19)),"m/d/Y")."<br></br>";
		//echo "<br>NNN:".substr(date_format($date2, 'm/d/Y H:i:s'), 0,10);
		echo "<br>base_url:".base_url();
		echo "<br>Time zone:".date_default_timezone_get();
		echo "<br>Current Time: ".date('h:i:sa');
		
	}
/*****************************************************************************************************************************************/
}
?>