 <?php
ini_set('memory_limit','-1');
session_cache_limiter('private_no_expire');

class Search extends CI_Controller{
	public $username = "";
	protected $Case_Id = "";
	Public function __construct(){
		parent::__construct();
		$this->load->library('parser');
		$this->load->library('session');
		$this->load->model('search_model');
		$this->load->model('dataentry_model');
		$this->load->model('workarea_model');
		$this->load->model('admin_privilege_model');
		$this->load->model("case_info_model");
		$this->load->helper('date');
		$this->load->helper('case_helper');//get_Case_AutoId($Case_Id);
		$this->session->all_userdata();
		
	}
	
	public function index(){
		//$this->session->all_userdata();
		$this->$username = $this->session->userdata['username'];
		if(isset($this->session->userdata['logged_in'])){
			$data['SearchResult']=$this->search_model->get_SearchResult(1,1);
			$this->load->view('pages/search',$data);
		}else{
			$CurrentPage['CurrentUrl'] = "search";
			$this->load->view('pages/login', $CurrentPage);
		}
	}
	public function Document_Manager($Case_Id){
		if(isset($this->session->userdata['logged_in'])){
			$data['Case_Id'] = $Case_Id;
			$data['User_Name'] = $this->session->userdata['username'];
			$this->load->view('pages/Document_Manager', $data);
		}else{
			$CurrentPage['CurrentUrl'] = "search/viewcase/".get_Case_AutoId($Case_Id);
			$this->load->view('pages/login', $CurrentPage);
		}
		
	}
	public function searchs(){
		//$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$data['SearchResult']=$this->search_model->get_SearchResult(1,1);
			$this->load->view('pages/search',$data);
		}else{
			$CurrentPage['CurrentUrl'] = "search/searchs";
			$this->load->view('pages/login', $CurrentPage);
		}
	}
	public function advancedsearch(){
		if(isset($this->session->userdata['logged_in'])){
			//echo "<br><pre>:";print_r($this->session->all_userdata());
			//echo "<br>Role ID:".$this->session->userdata['RoleId'];exit;
			$data['Provider_Name']= $this->search_model->get_Provider();
			$data['InsuranceCompany_Name']= $this->search_model->get_Insurance();
			$data['Status']= $this->search_model->get_StatusArray();
			$data['CaseStatus']= $this->search_model->get_CaseStatus();
			$data['Defendant_Name']= $this->search_model->get_Defendant();
			$data['Adjuster_Name']= $this->search_model->get_Adjuster();
			$data['Court']= $this->search_model->get_CourtArray();
			//$data['SearchResult']=$this->search_model->get_SearchResult(1,1);
			$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
			$data['UserId'] = $this->session->userdata['UserId'];
			$data['RoleId'] = $this->session->userdata['RoleId'];
			$this->load->view('pages/advancedsearch',$data);
		}else{
			$CurrentPage['CurrentUrl'] = "search/advancedsearch";
			$this->load->view('pages/login', $CurrentPage);
		}
	}
/* get Search table data - viewcase page*/
	public function getSearchTable(){  
		$UserId = $this->input->post("UserId");
		$RoleId = $this->input->post("RoleId");
		
		$list=$this->search_model->get_SearchResult($UserId, $RoleId);
		$this->Search_Table_Data($list);
	}
	public function getSearchTable_2(){
		$UserId = $this->input->post("UserId");
		$RoleId = $this->input->post("RoleId");
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
			"AccidentDate" => $this->input->post("AccidentDate"),
			"FirstId" => $this->input->post("FirstId"),
			"LastId" => $this->input->post("LastId")
		);
		$list= $this->search_model->get_CaseInfo_ById1($Recieveddata, $UserId, $RoleId);
		$this->Search_Table_Data($list);
	}
	public function editcase($Case_AutoId){
			//$this->session->all_userdata();
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
				$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
				//echo "<pre>"; print_r($data['CaseInfo']); exit();
				$this->load->view('pages/editcase',$data);
				
			}else{
				$CurrentPage['CurrentUrl'] = "search/editcase";
				$this->load->view('pages/login', $CurrentPage);
			}
		}
	public function get_Assigned_Menus($User_Role){
		$data = $this->admin_privilege_model->get_Assigned_Menus($User_Role);
		return $data;
	}
	public function viewcase($Case_AutoId){
		//echo "<br><prewe>Session:";print_r($this->session->all_userdata()); echo "</pre>";
		
		//echo "Case_AutoId:".$Case_AutoId;
		//exit;
		if(isset($this->session->userdata['logged_in'])){
			if($Case_AutoId == -1){
				$data = array(
					"SearchValue" => $this->input->post("Case_AutoId"),
					"SearchBy" => $this->input->post("SearchBy")
				);
				$Case_AutoIdNew = $this->search_model->get_Case_AutoId_By_Quick($data);
				$Case_AutoId = $Case_AutoIdNew;
			}
			$data['Provider_Name1']= $this->search_model->get_Provider();
			$data['InsuranceCompany_Name']= $this->search_model->get_Insurance();
			$data['Status']= $this->search_model->get_StatusArray();
			$data['Court']= $this->search_model->get_CourtArray();
			$data['Service']= $this->search_model->get_ServiceArray();
			$data['DenialReasons']= $this->search_model->get_DenialReasonsArray();
			$data['CaseStatus']= $this->search_model->get_CaseStatus();
			$data['Adjuster_Name']= $this->dataentry_model->get_Adjuster_FirstName();
			$data['Plantiff']= $this->dataentry_model->get_Plantiff();
			$data['Defendant_Name']= $this->dataentry_model->get_Defendant();
			$data['Adjuster_Name_Insurance']= $this->search_model->AdjusterInsurance();
			$data['EventType']= $this->dataentry_model->get_EventTypeArray();
			$data['EventStatus']= $this->dataentry_model->get_EventStatusArray();
			$data['Transactions'] = $this->search_model->Transanction_Info();
			$data['User_List'] = $this->search_model->get_User_List();
			
			$data['CaseInfo']= $this->search_model->get_CaseInfo_ById($Case_AutoId);
			$Provider_Id = $data['CaseInfo'][0]['Provider_Id'];
			$InsuranceCompany_Id = $data['CaseInfo'][0]['InsuranceCompany_Id'];
			$Defendant_Id = $data['CaseInfo'][0]['Defendant_Id'];
			$Adjuster_Id = $data['CaseInfo'][0]['Adjuster_Id'];
			$this->Case_Id = $data['CaseInfo'][0]['Case_Id'];
			/*$Update_Case_Path = array(
				"Case_Id" => $data['CaseInfo'][0]['Case_Id'],
				"Path" => base_url()
			);
			$this->search_model->Update_Document_Manager_Path($Update_Case_Path);*/
			
			//$data['Provider_Info']= $this->search_model->get_Provider_ById($Provider_Id);
			$data['InsuranceCompany_Info']= $this->search_model->get_Insurance_ById($InsuranceCompany_Id);
			$data['Defendant_Info']= $this->search_model->get_Defendant_ById($Defendant_Id);
			$data['Adjuster_Info']= $this->search_model->get_Adjuster_ById($Adjuster_Id);
			
			$data3 = array(
				"Notes_Type" => "ACTIVITY",
				"Notes_Desc" => "File Viewed",
				"Notes_Date" => $date = date('Y-m-d H:i:s'),
				"Case_Id" => $data['CaseInfo'][0]['Case_Id'],
				"User_Id" => $this->session->userdata['username']
			);
			$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
			$data['Accessibility'] = $this->session->userdata['RoleId'];
			//echo "<pre>";print_r($userAccebility); exit();
			$this->search_model->add_Notes($data3);
			
			$this->load->view('pages/workarea_info',$data );
		}else{
			$CurrentPage['CurrentUrl'] = "search/viewcase/".$Case_AutoId;
			$this->load->view('pages/login', $CurrentPage);
		}
	}
	
/* GET SETTLED BY INFO BY CASE ID*/
	public function get_Settled_By($Case_Id){
		$data = $this->search_model->get_Settled_By($Case_Id);
		//echo "<pre>";print_r($data);
		echo json_encode($data);
	}
/*GET TREATEMENT TABLE*/
	public function getTreatement($Case_Id){
		$list = $this->search_model->get_Treatment($Case_Id);
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			if($this->session->userdata['RoleId'] == 1){
			$row[] ="<button type='button' class='btn editTreatment'>Edit</button> <div class='update-Treatment' style='display:none;'> <button type='button' class='btn btn-primary update'>Update</button> <button type='button' class='btn cancel'>Cancel</button></div>";
			}
			$row[] = "<input type='text' name='dateOfServiceStart' class='form-control input-sm datetimepicker_Dos_Doe dos-date dos-input' value='".date_format(date_create(substr($result->DateOfService_Start, 0, 10)), 'm/d/Y')."' disabled>";
			$row[] = "<input type='text' name='dateOfServiceEnd' class='form-control input-sm datetimepicker_Dos_Doe dos-date dos-input' value='".date_format(date_create(substr($result->DateOfService_End, 0, 10)), 'm/d/Y')."' disabled>";
			$row[] = "<input type='text' name='Claim_Amount_treat' class='form-control input-sm amt-input' value='$".number_format($result->Claim_Amount, 2)."' disabled>";
			$row[] = "<input type='text' name='Paid_Amount_treat' class='form-control input-sm amt-input' value='$".number_format($result->Paid_Amount, 2)."' disabled>";
			$row[] = "<input type='text' name='Paid_Amount_treat' class='form-control input-sm amt-input' value='$".number_format(($result->Claim_Amount - $result->Paid_Amount), 2)."' disabled>";
			$row[] = "<input type='text' name='Date_BillSent_treat' class='form-control input-sm datetimepicker_Dos_Doe dos-input' value='".$result->Date_BillSent."' disabled>";
			$row[] = "<div class='SERVICE_TYPE_treat_div'> <input type='text' name='SERVICE_TYPE_treat' class='form-control input-sm' value='".$result->SERVICE_TYPE."' disabled><input type='hidden' name='SERVICE_TYPE_treat_hidden' value='".$result->SERVICE_TYPE."'> </div>";
			
			
			
			$row[] = "<div class='DENIALREASONS_TYPE_treat_div'> <input type='text' name='DENIALREASONS_TYPE_treat' class='form-control input-sm' value='".$result->DENIALREASONS_TYPE."' disabled> <input type='hidden' name='DENIALREASONS_TYPE_treat_hidden' value='".$result->DENIALREASONS_TYPE."'> </div>";
			if($this->session->userdata['RoleId'] == 1){
			$row[] = "<input type='checkbox' name='DeleteTreatement[]' class='DeleteTreatement DeleteTreatement".$result->Treatment_Id."' value=".$result->Treatment_Id."> <input type='hidden' name='Treatment_Id' value='".$result->Treatment_Id."' >";
			}
			$data[] = $row;
		}
		$output = array( "data" => $data );
		//echo "<pre>"; print_r($output); exit();
		echo json_encode($output);
	}
/*UPDATE TREATEMENT RECORDS*/
	public function update_Treatement(){
		$Treatment_Id = $this->input->post("Treatment_Id");
		$data = array(
			"DateOfService_Start" => $this->input->post('DateOfService_Start'),
			"DateOfService_End" => $this->input->post('DateOfService_End'),
			"Claim_Amount" => str_replace('$', '', $this->input->post('Claim_Amount')),
			"Paid_Amount" => str_replace('$', '', $this->input->post('Paid_Amount')),
			"Date_BillSent" => $this->input->post('Date_BillSent'),
			"SERVICE_TYPE" => $this->input->post('currentServiceType'),
			"DENIALREASONS_TYPE" => $this->input->post('currentDenialReasonType')
		);
		$this->search_model->updateTreatement($data, $Treatment_Id);
		$this->update_Claim_Paid_Dates($this->input->post("Case_Id"));
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
		$this->update_Claim_Paid_Dates($this->input->post("Case_Id"));
	}
/*ADD TREATEMENT RECORDS*/
	public function deleteTreatement(){
		$data = $this->input->post('DeletedTreatementId');
		$this->search_model->delete_Treatement($data);
		$this->update_Claim_Paid_Dates($this->input->post("Case_Id"));
	}
/*Update claim paid DOS start and end*/
	public function update_Claim_Paid_Dates($Case_Id){
		$list = $this->search_model->update_Claim_Paid_Dates($Case_Id, "");
		$Tot_Claim = 0;
		$Tot_Paid = 0;
		$DOS_End = "";
		$i=1;
		foreach($list as $result){
			if($i == 1){$DOS_Start = $result->DateOfService_Start;}
			$i++;
			
			$Tot_Claim = $Tot_Claim + $result->Claim_Amount;
			$Tot_Paid = $Tot_Paid + $result->Paid_Amount;
			$DOS_End = $result->DateOfService_End;
		}
		
		$data = array(
			"Claim_Amount" => $Tot_Claim,
			"Paid_Amount" => $Tot_Paid,
			"DateOfService_Start" => $DOS_Start,
			"DateOfService_End" => $DOS_End
		);
		$this->search_model->update_Claim_Paid_Dates($Case_Id, $data);
	} 
/* get provider by id - viewcase page*/
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
		$output = array( "data" => $data );
		//echo "<pre>";print_r($output);
		echo json_encode($data);
	}
/* get insurance by id - viewcase page*/
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
		$output = array( "data" => $data );
		echo json_encode($data);
	}
/* get defendant by id - viewcase page*/
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
		$output = array( "data" => $data );
		echo json_encode($data);
	}
/* get adjuster by id - viewcase page*/
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
		$output = array( "data" => $data );
		//echo "<pre>:";print_r($output);
		echo json_encode($data);
	}
	public function getAdjuster_ById2($Adjuster_Id){
		$list=$this->search_model->get_Adjuster_ById2($Adjuster_Id);
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			$row[] = $result->Adjuster_FirstName;
			$row[] = $result->Adjuster_LastName;
			$row[] = $result->Adjuster_Phone;
			$row[] = $result->Adjuster_Phone_Ext;
			
			$data[] = $row;
		}
		$output = array( "data" => $data );
		//echo "<pre>:";print_r($output);
		echo json_encode($output);
	}
/* get injured by id - viewcase page*/
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
		$output = array( "data" => $data );
		echo json_encode($data);
	}
/* get insured by id - viewcase page*/
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
		$output = array( "data" => $data );
		echo json_encode($data);
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
			$row[] = date_format(date_create(substr($result->Notes_Date, 0, 10)), "m/d/Y");
			$row[] = substr($result->Notes_Date, 11, 5);
			$row[] = $result->Notes_Type;
			
			$data[] = $row;
		}
		$output = array( "data" => $data );
		echo json_encode($output);
	}
/**** ADD NOTES ***********/
	public function addNotes(){
		$data = array(
			"Notes_Type" => $this->input->post("notesType"),
			"Notes_Desc" => $this->input->post("notesDescription"),
			"Notes_Date" => $this->input->post("notesAccidentDate"),
			"Case_Id" => $this->input->post("caseId"),
			"User_Id" => $this->session->userdata['username']
		);
		$this->search_model->add_Notes($data);
		echo json_encode($data);
		//return true;
	}
/* get Case info by id - viewcase page*/
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
			"User_Id" => $this->session->userdata['username']
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
			$row[] = date_format(date_create(substr($result->Notes_Date, 0, 10)), "m/d/Y")."<input type='hidden' class='tNoteDate' value='".$result->Notes_Date."'>";
			$row[] = substr($result->Notes_Date, 11, 5);
			$row[] = $result->Notes_Type."<input type='hidden' class='tNoteType' value='".$result->Notes_Type."'>";
			$row[] = "<input type='hidden' class='tNoteId' value='".$result->Notes_ID."'><input type='checkbox' name='DeleteNotes[]' class='DeleteNotes DeleteNotes".$result->Notes_ID."' value='".$result->Notes_ID."'>";
			
			$data[] = $row;
		}
		$output = array( "data" => $data );
		echo json_encode($output);
	}

/***** DELETE NOTES ********/
	public function deleteNotesFromTab3(){
		$data = $this->input->post('DeletedNotesId');
		$this->search_model->delete_Notes($data);
	}
/***** UPDATE NOTES INFO*/
	public function UpdateNotesInfo(){
		//$this->session->all_userdata();
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
			"User_Id" => $this->session->userdata['username'],
			"Settlement_Notes" => $this->input->post('Settlement_Notes')
		);
		if($this->input->post('SettledWithAdjuster') != ""){
			$data['SettledWith'] = $this->input->post('SettledWithAdjuster');
		}else{
			$data['SettledWith'] = $this->input->post('SettledWithAttorney');
		}
		$Case_Id = $this->input->post('Case_Id');
		$this->search_model->updateSettlement($data,$Case_Id);
		
		$data3 = array(
			"Notes_Type" => "ACTIVITY",
			"Notes_Desc" => "Case Settled by ".$this->session->userdata['username']." with ".$data['SettledWith'],
			"Notes_Date" => $date = date('Y-m-d H:i:s'),
			"Case_Id" => $this->input->post('Case_Id'),
			"User_Id" => $this->session->userdata['username']
		);
		$this->search_model->add_Notes($data3);
		echo "<pre>"; print_r($data);
	}
	public function reset_Settlement($Case_AutoId, $Case_Id){
		$this->search_model->resetSettlement($Case_AutoId);
		$data3 = array(
			"Notes_Type" => "ACTIVITY",
			"Notes_Desc" => "Case Reset with/by ".$this->session->userdata['username'],
			"Notes_Date" => $date = date('Y-m-d H:i:s'),
			"Case_Id" => $Case_Id,
			"User_Id" => $this->session->userdata['username']
		);
		$this->search_model->add_Notes($data3);
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
			$row[] = "$".number_format($result->Claim_Amount, 2);
			$row[] = "$".number_format($result->Paid_Amount, 2);
			$row[] = "$".number_format($result->Claim_Amount - $result->Paid_Amount, 2);
			$row[] = $result->Last_Status;
			$row[] = "$".number_format($result->Settlement_Amount, 2);
			$row[] = "$".number_format($result->Settlement_Int, 2);
			$row[] = "$".number_format($result->Settlement_Af, 2);
			$row[] = "$".number_format($result->Settlement_Ff, 2);
			$row[] = "$".number_format($result->Settlement_Total, 2);
			$row[] = date_format(date_create(substr($result->Settlement_Date,0,10)),"m/d/Y");
			$row[] = $result->SettledWith;
			$row[] = $result->User_Id;
			
			$data[] = $row;
		}
		$output = array( "data" => $data );
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
			$row[] = "<input type='text' name='ServiceType' class='form-control input-sm input-height datetimepicker_Dos_Doe' value='".date_format(date_create(substr($result->Transactions_Date,0,10)),"m/d/Y")."' >";
			$row[] = "<input type='text' name='Transactions_Amount' class='form-control input-sm input-height' value='$".number_format($result->Transactions_Amount, 2)."' >";
			$row[] = "<input type='text' name='Transactions_Description' class='form-control input-sm input-height' value='".$result->Transactions_Description."' >";
			$row[] = "<input type='text' name='Transactions_Fee' class='form-control input-sm input-height' value='$".number_format($result->Transactions_Fee, 2)."' >";
			$row[] = "<input type='text' name='Transactions_status' class='form-control input-sm input-height' value='".$result->Transactions_status."' >";
			$row[] = "<input type='checkbox' name='deleteCheckedTransactions[]' class='deleteCheckedTransactions deleteCheckedTransactions".$result->Transactions_Id."' value='".$result->Transactions_Id."' >";
			
			$data[] = $row;
		}
		$output = array( "data" => $data );
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
			$output = array( "data" => $data2 );
			$data3 = array(
				"Notes_Type" => "ACTIVITY",
				"Notes_Desc" => "Payment/Transaction posted : $".$data['Transactions_Amount']." (".$data['Transactions_Type'].") Desc->".$data['Transactions_Description'],
				"Notes_Date" => $date = date('Y-m-d H:i:s'),
				"Case_Id" => $data['Case_Id'],
				"User_Id" => $this->session->userdata['username']
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
				"User_Id" => $this->session->userdata['username']
			);
			$this->search_model->add_Notes($data[$i]);
		}
	}
/**************************** EVENT TAB-8 ************************************************************************************/
/**** GET EVENT LIST BY CASE ID ********/
	public function getEvents(){
		$Case_Id = $this->input->post("Case_Id");
		//echo "Case_Id:".$Case_Id."G";
		$list=$this->search_model->get_Events($Case_Id);
		//echo "<pre>";print_r($list);exit();
		$data = array();
		foreach ($list as $result) {
			$row = array();
			$Event_Time = $result->Event_Time;
			if($Event_Time == null){ $Event_Time = ""; }else{ $Event_Time = substr($Event_Time, 11, 5);}
			$row[] ="<i title='Edit' class='fa fa-edit editEventsButton'></i><input type='hidden' name='Assigned_To' value='".$result->Assigned_To."'>"."<input type='hidden' name='EventId' value='".$result->Event_id."'>";
			$row[] = $result->Case_Id;
			$row[] = $result->EventTypeName."<input type='hidden' name='EventTypeIdHidden' value='".$result->EventTypeId."'>";
			$row[] = $result->EventStatusName."<input type='hidden' name='EventStatusIdHidden' value='".$result->EventStatusId."'>";
			$row[] = date_format(date_create($result->Event_Date), 'm/d/Y');
			$row[] = date_format(date_create($result->Event_Time), 'H:i');
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
		$output = array( "data" => $data );
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
/* add events */
	public function add_Event_Info(){
		$data = array(
			"User_id" => $this->input->post("UserId"),
			"Event_Date" => $this->input->post("EventDate"),
			"EventTypeId" => $this->input->post("EventTypeHidden"),
			"EventStatusId" => $this->input->post("EventStatusHidden"),
			"Event_Time" => $this->input->post("EventTime"),
			"Event_Notes" => $this->input->post("EventDescription"),
			"Assigned_To" => $this->input->post("AssignUser"),
			"Event_id" => $this->input->post("EventIdHidden"),
			"Case_id" => $this->input->post("9CaseId")
		);
		$this->search_model->add_Event_Info($data);
		echo "<pre>"; print_r($data);
	}
/**** update EVENT LIST INFO BY ********/
	public function update_Event_Info(){
		$data = array(
			"User_id" => $this->input->post("UserId"),
			"Event_Date" => date_format(date_create($this->input->post("EventDate")), "Y-m-d"),
			"Event_Time" => date_format(date_create($this->input->post("EventDate")." ".$this->input->post("Event_Time")), "Y-m-d H:i"),
			"EventTypeId" => $this->input->post("EventTypeHidden"),
			"EventStatusId" => $this->input->post("EventStatusHidden"),
			"Event_Notes" => $this->input->post("EventDescription"),
			"Assigned_To" => $this->input->post("AssignUser"),
			"Event_id" => $this->input->post("EventIdHidden"),
			"Case_id" => $this->input->post("9CaseId")
		);
		$this->search_model->update_Event_Info($data);
		echo "<pre>"; print_r($data);
	}
/* GET MOTION DATA */
	public function get_Motion_Data($Case_Id){
		$list=$this->search_model->getMotion_Data($Case_Id);
		//echo "<pre>";print_r($list);exit();
		$data = array();
		foreach ($list as $result) {
			$row = array();
			
			//$row[] = "";
			$row[] = $result->Motion_Date;
			$row[] = $result->Motion_Status;
			$row[] = $result->Our_Motion_Type;
			$row[] = $result->Defendent_Motion_Type;
			$row[] = $result->Opposition_Due_Date;
			$row[] = $result->Reply_Due_Date;
			$row[] = $result->cross_motion;
			$row[] = $result->Notes;
			$row[] = $result->whose_motion;
			$row[] = $result->room;
			$row[] = $result->part;
			$row[] = $result->judge_name;
			$row[] = $result->time_duration;
			//$row[] = "<input type='checkbox' name='deleteCheckedMotion[]' class='deleteCheckedMotion deleteCheckedMotion".$result->Motion_ID."' value='".$result->Motion_ID."'>";
			
			$data[] = $row;
		}
		$output = array( "data" => $data );
		echo json_encode($output);
	}
/* ADD MOTION DATA*/
	public function add_Motion_Info_form(){
		$data = array(
			"Case_ID" => $this->input->post("Case_ID"),
			"Motion_Date" => $this->input->post("Motion_Date"),
			"Motion_Status" => $this->input->post("Motion_Status"),
			"Our_Motion_Type" => $this->input->post("Our_Motion_Type"),
			"Defendent_Motion_Type" => $this->input->post("Defendent_Motion_Type"),
			"Opposition_Due_Date" => $this->input->post("Opposition_Due_Date"),
			"Reply_Due_Date" => $this->input->post("Reply_Due_Date"),
			"cross_motion" => $this->input->post("cross_motion"),
			"whose_motion" => $this->input->post("whose_motion"),
			"room" => $this->input->post("room"),
			"part" => $this->input->post("part"),
			"judge_name" => $this->input->post("judge_name"),
			"time_duration" => $this->input->post("time_duration"),
			"Notes" => $this->input->post("Notes")
		);
		$this->search_model->addMotion_Info_form($data);
	}
/**** DELETE MOTION ********/
	public function delete_Motion(){
		$CheckedMotion = $this->input->post('deleteCheckedMotion');
		$delete_success = $this->search_model->deleteMotion($CheckedMotion);
	}
/* GET TRIAL DATA */
	public function get_Trials_Data($Case_Id){
		$list=$this->search_model->getTrials_Data($Case_Id);
		//echo "<pre>";print_r($list);exit();
		$data = array();
		foreach ($list as $result) {
			$row = array();
			
			//$row[] = "";
			$row[] = $result->Trial_Date;
			$row[] = $result->Trial_Status;
			$row[] = $result->Trial_Result;
			$row[] = $result->Trial_Type;
			$row[] = $result->Jury_Selection_Date;
			$row[] = $result->Judge_Name;
			$row[] = $result->Court_Cal_Number;
			$row[] = $result->Not_Filed_Date;
			$row[] = $result->Receipt_date;
			$row[] = $result->Notes;
			//$row[] = "<input type='checkbox' name='deleteCheckedTrials[]' class='deleteCheckedTrials deleteCheckedTrials".$result->Trial_ID."' value='".$result->Trial_ID."'>";
			
			$data[] = $row;
		}
		$output = array( "data" => $data );
		echo json_encode($output);
	}
/**** ADD TRIAL DATA ********/
	public function add_Trials_Info_form(){
		$data = array(
			"CASE_ID" => $this->input->post("CASE_ID"),
			"Trial_Date" => $this->input->post("Trial_Date"),
			"Trial_Status" => $this->input->post("Trial_Status"),
			"Trial_Result" => $this->input->post("Trial_Result"),
			"Trial_Type" => $this->input->post("Trial_Type"),
			"Jury_Selection_Date" => $this->input->post("Jury_Selection_Date"),
			"Judge_Name" => $this->input->post("Judge_Name"),
			"Court_Cal_Number" => $this->input->post("Court_Cal_Number"),
			"Not_Filed_Date" => $this->input->post("Not_Filed_Date"),
			"Receipt_date" => $this->input->post("Receipt_date"),
			"service_complete_date" => $this->input->post("service_complete_date"),
			"Notes" => $this->input->post("Notes")
		);
		$this->search_model->addTrials_Info_form($data);
	}
/**** DELETE TRIALS ********/
	public function delete_Trials(){
		$CheckedTrials = $this->input->post('deleteCheckedTrials');
		$delete_success = $this->search_model->deleteTrials($CheckedTrials);
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
			if($this->session->userdata['RoleId'] == 1 ){
				$row[] = "<a href='".base_url()."search/editcase/".$result->Case_AutoId."'><i title='Edit' class='fa fa-edit'></i></a>";
				//<img src='".base_url()."assets/images.jpg' class='editRecord'/>
			}
			$row[] = "<a href='".base_url()."search/viewcase/".$result->Case_AutoId."'>".$result->Case_Id."</a>";
			$row[] = "<a href='".base_url()."search/viewcase/".$result->Case_AutoId."'>".$result->InjuredParty_LastName." ".$result->InjuredParty_FirstName."</a>";
			$row[] = "<a href='".base_url()."search/viewcase/".$result->Case_AutoId."'>".$result->Provider_Name."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->InsuranceCompany_Name."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Accident_Date."</a>";
			
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".nice_date($result->DateOfService_Start, 'm/d/Y')." - ".nice_date($result->DateOfService_End, 'm/d/Y')."</a>";
			//$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$DateOfService_Start." - ".$DateOfService_End."</a>";
			//$row[] = date_format(date_create($result->DateOfService_Start),"m/d/Y")." - ".date_format(date_create($result->DateOfService_End),"m/d/Y");
			//$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".date_format(date_create($result->DateOfService_Start),"m/d/Y")." - ".date_format(date_create($result->DateOfService_End),"m/d/Y")."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Status."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Ins_Claim_Number."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>$".$result->Claim_Amount."</a>";
			if($this->session->userdata['RoleId'] == 1 ){ $row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->IndexOrAAA_Number."</a>";
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Initial_Status."</a>"; }
			$data[] = $row;
		}
		
		$output = array( "data" => $data );
		
		echo json_encode($output);
	}
	public function get_data(){
		//$start = $this->input->post("start");
		//$end = $this->input->post("end");
		
		$list = $this->workarea_model->add_Calendar_Events("2016-12-01", "2016-12-31");
		echo "<pre>";print_r($list);
	}
	public function EditTemplate(){
		$template = $this->input->post("TemplateName");
		$Case_Id = $this->input->post("Templates_Case_Id");
		if(isset($this->session->userdata['logged_in'])){
			$data3 = array(
				"Notes_Type" => "General",
				"Notes_Desc" => "Document ".$template." Printed",
				"Notes_Date" => $date = date('Y-m-d H:i:s'),
				"Case_Id" => $Case_Id,
				"User_Id" => $this->session->userdata['username']
			);
			$this->search_model->add_Notes($data3);
			$Case_AutoId = $this->input->post("Templates_Case_AutoId");
			$originalArray = $this->case_info_model->get_Case_Info($Case_AutoId);
			$data = array();
			$data = $originalArray[0];
			
			$data['Adjuster_Name'] = $data['Adjuster_FirstName']." ".$data['Adjuster_LastName'];
			$data['Accident_Date'] = date_format(date_create($data['Accident_Date']), 'm/d/Y');
			$data['ACCIDENT_DATE'] = $data['Accident_Date'];
			$data['ATTORNEY_FILENUMBER'] = $data['Attorney_FileNumber'];
			$data['Balance_Amount'] = "$".number_format($data['Claim_Amount']-$data['Paid_Amount'], 2);
			$data['BALANCE_AMOUNT'] = $data['Balance_Amount'];
			$data['Claim_Amount'] = "$".number_format($data['Claim_Amount'], 2);
			$data['CLAIM_AMOUNT'] = $data['Claim_Amount'];
			$data['CASE_ID'] = $data['Case_Id'];
			$data['COURT_VENUE'] = $data['Court_Venue'];
			$data['COURT_NAME'] = $data['Court_Name'];
			$data['COURT_ADDRESS'] = $data['Court_Address'];
			$data['DateOfService_Start'] = date_format(date_create($data['DateOfService_Start']), 'm/d/Y');
			$data['DateOfService_End'] = date_format(date_create($data['DateOfService_End']), 'm/d/Y');
			$data['DATEOFSERVICE_START'] = $data['DateOfService_Start'];
			$data['DATEOFSERVICE_END'] = $data['DateOfService_End'];
			$data['DateOfService_START'] = $data['DateOfService_Start'];
			$data['DateOfService_END'] = $data['DateOfService_End'];
			$data['DEFENDANT_NAME'] = $data['Defendant_Name'];
			$data['DEFENDANT_ADDRESS'] = $data['Defendant_Address'];
			$data['DEFENDANT_CITY'] = $data['Defendant_City'];
			$data['DEFENDANT_STATE'] = $data['Defendant_State'];
			$data['DEFENDANT_ZIP'] = $data['Defendant_Zip'];
			$data['DEFENDANT_PHONE'] = $data['Defendant_Phone'];
			
			$data['INSURANCECOMPANY_NAME'] = $data['InsuranceCompany_Name'];
			$data['INSURANCECOMPANY_LOCAL_ADDRESS'] = $data['InsuranceCompany_Local_Address'];
			$data['INSURANCECOMPANY_LOCAL_CITY'] = $data['InsuranceCompany_Local_City'];
			$data['INSURANCECOMPANY_LOCAL_STATE'] = $data['InsuranceCompany_Local_State'];
			$data['INSURANCECOMPANY_LOCAL_ZIP'] = $data['InsuranceCompany_Local_Zip'];
			$data['InjuredParty_Name'] = $data['InjuredParty_FirstName']." ".$data['InjuredParty_LastName'];
			$data['INJUREDPARTY_NAME'] = $data['InjuredParty_Name'];
			$data['InsuredParty_Name'] = $data['InsuredParty_FirstName']." ".$data['InsuredParty_LastName'];
			$data['INS_CLAIM_NUMBER'] = $data['Ins_Claim_Number'];
			$data['NOWDT'] = date("m/d/Y");
			$data['Provider_PERM_Address'] = $data['Provider_Perm_Address'];
			$data['Provider_PERM_City'] = $data['Provider_Perm_City'];
			$data['Provider_PERM_State'] = $data['Provider_Perm_State'];
			$data['Provider_PERM_Zip'] = $data['Provider_Perm_Zip'];
			$data['Paid_Amount'] = "$".number_format($data['Paid_Amount'], 2);
			$data['PAID_AMOUNT'] = $data['Paid_Amount'];
			$data['PROVIDER_NAME'] = $data['Provider_Name'];
			$data['Policy_number'] = $data['Policy_Number'];
			$url = base_url()."assets/sign/";
			$data['SCANNED_SIGNATURE'] = "<img src='".$url."sign.JPG'>";
			$data['Scanned_signature'] = "<img src='".$url."sign.JPG'>";
			$data['Scan_sign_ab'] = "<img src='".$url."signAB.JPG'>";
			$data['SCAN_SIGN_AB'] = $data['Scan_sign_ab'];
			$data['PROVIDER_PRESIDENT'] = $data['Provider_President'];
			$data['SETTLEMENT_AMOUNT'] = $data['Settlement_Amount'];
			$data['SETTLEMENT_INT'] = $data['Settlement_Int'];
			$data['SETTLEMENT_AF'] = $data['Settlement_Af'];
			$data['SETTLEMENT_FF'] = $data['Settlement_Ff'];
			
			//echo "<pre>";print_r($data);exit;
			
			$this->parser->parse("templates/".$template.".htm", $data);
			//$this->load->view('templates/'.$template.".htm", $data);
		}else{
			$CurrentPage['CurrentUrl'] = "search/viewcase/".get_Case_AutoId($Case_Id);
			$this->load->view('pages/login', $CurrentPage);
		}
	}
	public function folderSize($dir){
		$count_size = 0;
		$count = 0;
		$dir_array = scandir($dir);
		  foreach($dir_array as $key=>$filename){
			if($filename!=".." && $filename!="."){
			   if(is_dir($dir."/".$filename)){
				  $new_foldersize = $this->foldersize($dir."/".$filename);
				  $count_size = $count_size+ $new_foldersize;
				}else if(is_file($dir."/".$filename)){
				  $count_size = $count_size + filesize($dir."/".$filename);
				  $count++;
				}
		   }
		 }
		return $count_size;
	}
	public function testmethod(){
		/*$Case_Id = $this->dataentry_model->get_Last_Case_Id();
		echo "CaseID:".$_SERVER['REQUEST_URI'];exit;
		$this->db->where('order_date >=', $first_date);
		$this->db->where('order_date <=', $second_date);
		return $this->db->get('orders');
		/*echo "Case_Id: ".$this->Case_Id; exit();
		$date = date('Y-m-d H:i:s');
		echo "date:".date('Y');
		//2014-06-17 00:00:00.00000
		$q = date_create("2014-06-17");
		$w = date_format($q, "m/d/Y");
		echo "<br>JJJ:".substr(date("Y"), 2, 2);
		echo "username:".$this->session->userdata['username'];
		$date2="";
		$date3= date_create(substr($date2,0,19));
		echo "<br>Data:".$date2;
		echo "<br><br>New format:".date_format(date_create(substr($date2,0,19)),"m/d/Y")."<br></br>";
		//echo "<br>NNN:".substr(date_format($date2, 'm/d/Y H:i:s'), 0,10);
		echo "<br>base_url:".base_url();
		echo "<br>Time zone:".date_default_timezone_get();*/
		echo "<br>Current Time: ".date("Y-m-d h:i:s");
		echo "<br>$ testing:".str_replace('$', '', 'hellogg');
		$date=date_create("2013-03-15");
		echo "<br><br>1st Date:".date_format($date,"Y-m-d");
		echo "<br><br>Substract 40 days";
		date_sub($date,date_interval_create_from_date_string("1 months"));
		echo "<br><br>New Date:".date_format($date,"Y-m-d");
		echo "<br><br>current day's:".date("d");
		$ddd = date("m/d/Y");
		echo "First date of current month:".date_format(date_sub(date_create($ddd),date_interval_create_from_date_string((date("d")-1)." days")), "m/d/Y");
		$first = date_format(date_sub(date_create($ddd),date_interval_create_from_date_string((date("d")-1)." days")), "m/d/Y");
		
		echo "<br><br>Date before 2 months:".date_format(date_sub(date_create($first),date_interval_create_from_date_string("2 months")), "m/d/Y");
		
		$query_date = '2010-02-04';

		// First day of the month.
		echo "<br>Date: '2010-02-04'<br>First day of the month:".date('Y-m-01', strtotime($query_date));
		
		// Last day of the month.
		echo "<br>Last day of the month.:".date('Y-m-t', strtotime($query_date));
		
		$date=date_create("jun 13 2012");
		echo "<br>text date:".date_format($date,"Y/m/d");
		
		$timestamp = strtotime( "February 15, 2015" );
   
   		echo "<br>Feb 15, 2015 = ".date( 'Y-m-d', $timestamp );
		if("alla" == "ALLA"){
			echo "<br>true";
		}else { echo "<br>false";}
		echo "<br>".strcasecmp("H","h");
		
		echo "<br>".strcasecmp("Hello","hELLo");
		
		$dir = "C:/xampp/htdocs/casemanager/application/views/templates/*.php*";
		//$files1 = glob($dir);
		//echo "<pre>";print_r($files1);
		
		$images = glob($dir);   
		foreach($images as $image) {
			echo str_replace(".php", "", basename($image)). "<br>";
		}	
		
		$Folder_Name = array("BILLS", "AOB", "DENIALS", "SUMMONS-AND-COMPLAINT", "AFF-OF-SERVICE", "PAYMENTS", "SETTLEMENT-DOCS", "ANSWER", "THEIR-DEMANDS", "POM", "INDEX NUMBER", "DELAY LETTER", "PROVIDERS DOCUMENTS", "CORRESPONDENCE", "ACKNOWLEDGEMENT", "PEER REVIEW", "POLICE REPORT", "CERTIFICATE OF INCORPORATION", "LICENSES", "ANSWER DEMANDS", "AFF IN OPPOSITION", "EBT", "DISCOVERY CONFERENCE", "DEF SUPPLEMENTAL DEMANDS", "CONSENT TO CHANGE ATTORNEY", "PEER REVIEW", "IME", "OUR DEMANDS", "OUR DISCOVERY RESPONSES", "VERIFICATION REQUEST", "VERIFIED ANSWER", "UNCATEGORIZED", "Bills", "Bills", "Saved Letters", "Packet Exhibits", "Packet Document", "OUR MOTIONS", "ARBITRATIONS"
		);
		foreach($Folder_Name as $row){
			//echo "G:".$row;
		}
		/*$file = base_url().'RIS PACS Manual 2016.pdf';
		$filename = 'filename.pdf';
		header('Content-type: application/pdf');
		header('Content-Disposition: inline; filename="' . $filename . '"');
		header('Content-Transfer-Encoding: binary');
		header('Accept-Ranges: bytes');
		@readfile($file);*/
		
		//echo "<iframe src='".base_url()."RIS PACS Manual 2016.pdf' width=\"100%\" style=\"height:100%\"></iframe>";
		echo "<br>Folder size:".number_format(($this->folderSize("C:/xampp/htdocs/casemanager/Cases"))/1048576, 2)." MB";
		
		echo "<br>Array ************************* ********************";
		$data2 = array(
			"first" => "first",
			"second" => "second"
		);
		$data2["third"] = "third";
		echo "<pre>"; print_r($data2);
		echo "<br>date and time concate.....";
		$date=date_create("2013-03-15");
		echo "<br>1st Date:".date_format($date,"m/d/Y H:i");
		echo "<br><h2>search page date issue.....</h2><br>";
		$d1 = date_create("jan 1 2010");
		$d2 = date_create("jan 10 2010");
		echo "<a href='viewcase/1'>".date_format($d1, 'm/d/Y')." - ".date_format($d2, 'm/d/Y')."</a>";
	}
	
/*****************************************************************************************************************************************/
}
?>