<?php
session_cache_limiter('private_no_expire');

	class Dataentry extends CI_Controller{
	
		Public function __construct(){
			parent::__construct();
			$this->load->library('session');
			//$this->load->driver('session');
			$this->load->model('dataentry_model');
		}
		public function index(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/addcase');
			}else{
				$this->load->view('pages/login');
			}	
		}

/* ************************************  Start of Addcase  *************************************************************************/
		
	public function addcase(){
		$this->session->all_userdata();
		//$username = $this->session->userdata('username');
		//echo "ggg:".$username; exit();
		if(isset($this->session->userdata['logged_in'])){
			
			$data['Provider_Name']= $this->dataentry_model->get_Provider();
			$data['InsuranceCompany_Name']= $this->dataentry_model->get_Insurance();
			$data['Status']= $this->dataentry_model->get_StatusArray();
			$data['Court']= $this->dataentry_model->get_CourtArray();
			$data['Service']= $this->dataentry_model->get_ServiceArray();
			$data['DenialReasons']= $this->dataentry_model->get_DenialReasonsArray();
			$data['Accessibility'] = $this->session->userdata['logged_in']['RoleId'];
			$this->load->view('pages/addcase',$data);
		}else{
			$this->load->view('pages/login');
		}
	}

	public function editcase($Case_AutoId){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			//echo "rererere";
			//$data = array(
			//	$Case_AutoId = $this->input->post('Case_AutoId')
			//);
			$case['CaseInfo']= $this->dataentry_model->get_CaseInfo($Case_AutoId);
			/*$data['Provider_Name']= $this->dataentry_model->get_Provider();
			$data['InsuranceCompany_Name']= $this->dataentry_model->get_Insurance();
			$data['Status']= $this->dataentry_model->get_StatusArray();
			$data['Court']= $this->dataentry_model->get_CourtArray();
			$data['Service']= $this->dataentry_model->get_ServiceArray();
			$data['DenialReasons']= $this->dataentry_model->get_DenialReasonsArray();
			
			$this->load->view('pages/addcase',$data);*/
			//echo "<pre>";print_r($case);exit();
		}else{
			$this->load->view('pages/login');
		}
	}
	public function Update_CaseInfo(){
		$Case_AutoId = $this->input->post('Case_AutoId');
		$data = array(
				'Initial_Status' => $this->input->post('initialStatus'),
				'Provider_Id' => $this->input->post('providerNameHidden'),
				'InjuredParty_LastName' => $this->input->post('InjuredPartyLastName'),
				'InjuredParty_FirstName' => $this->input->post('InjuredPartyFirstName'),
				'InsuredParty_LastName' => $this->input->post('InsuredPartyLastName'),
				'InsuredParty_FirstName' => $this->input->post('InsuredPartyFirstName'),
				'InsuranceCompany_Id' => $this->input->post('insuranceNameHidden'),
				'Policy_Number' => $this->input->post('policyNumber'),
				'Ins_Claim_Number' => $this->input->post('insClaimNumber'),
				'Adjuster_Id' => $this->input->post('Adjuster_Id'),
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
				'Memo' => $this->input->post('memo'),
				'InjuredParty_Address' => $this->input->post('InjuredParty_Address'),
				'InjuredParty_City' => $this->input->post('InjuredParty_City'),
				'InjuredParty_State' => $this->input->post('InjuredParty_State'),
				'InjuredParty_Zip' => $this->input->post('InjuredParty_Zip'),
				'InjuredParty_Phone' => $this->input->post('InjuredParty_Phone'),
				'InjuredParty_Misc' => $this->input->post('InjuredParty_Misc'),
				'InjuredParty_Type' => $this->input->post('InjuredParty_Type'),
				'InsuredParty_Address' => $this->input->post('InsuredParty_Address'),
				'InsuredParty_City' => $this->input->post('InsuredParty_City'),
				'InsuredParty_State' => $this->input->post('InsuredParty_State'),
				'InsuredParty_Zip' => $this->input->post('InsuredParty_Zip'),
				'InsuredParty_Misc' => $this->input->post('InsuredParty_Misc'),
				'InsuredParty_Type' => $this->input->post('InsuredParty_Type'),
				'Accident_Address' => $this->input->post('Accident_Address'),
				'Accident_City' => $this->input->post('Accident_City'),
				'Accident_State' => $this->input->post('Accident_State'),
				'Accident_Zip' => $this->input->post('Accident_Zip'),
				'status' => $this->input->post('status')
		);
		$success = $this->dataentry_model->Update_CaseInfo($data,$Case_AutoId);
		//echo "<pre> "; print_r($data); exit();
		//echo json_encode($success);
		if($success){
			echo json_encode($data);
			//$this->load->view('pages/submitted');
		}
	}
/**ADD NEW AND SETTLEMENT TO OPEN STATUS*/
	public function add_CaseInfo(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			
			$data = array(
				'Initial_Status' => $this->input->post('initialStatus'),
				'Provider_Id' => $this->input->post('providerNameHidden'),
				'InjuredParty_LastName' => $this->input->post('injuredPartyLastName'),
				'InjuredParty_FirstName' => $this->input->post('injuredPartyFirstName'),
				'InsuredParty_LastName' => $this->input->post('insuredPartyLastName'),
				'InsuredParty_FirstName' => $this->input->post('insuredPartyFirstName'),
				'InsuranceCompany_Id' => $this->input->post('insuranceNameHidden'),
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
				'Memo' => $this->input->post('memo'),
			);
			$success = $this->dataentry_model->insert_CaseInfo($data);
			$sett_amt = $this->input->post('claimAmt') - $this->input->post('paidAmt');
			$Attorney_fee = $sett_amt / 5;
			$Totaal = $sett_amt + $Attorney_fee;
			$data2 = array(
				"Settlement_Amount" => $sett_amt,
				"Settlement_Int" => 00.00,
				"Settlement_Af" => $Attorney_fee,
				"Settlement_Ff" => 00.00,
				"Settlement_Total" => $Total,
				"Settlement_Date" => date('Y-m-d'),
				"User_Id" => $this->session->userdata['logged_in']['username'],
				"Settlement_Notes" => "",
				"SettledWith" => ""
			);
			
			$this->dataentry_model->addSettlement($data2);
		}else{
			$this->load->view('pages/login');
		}
	}
		
/* ************************************  Start of Provider  *************************************************************************/

		public function provider(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data['State_Name']= $this->dataentry_model->get_States();
				$data['Provider_Name']= $this->dataentry_model->get_Provider();
				//$data['City_Zip_Country']= $this->dataentry_model->get_City_Zip_Country();
				$data['Accessibility'] = $this->session->userdata['logged_in']['RoleId'];
				$this->load->view('pages/provider',$data);
			}else{
				$this->load->view('pages/login');
			}
		}
		public function add_ProviderInfo(){
			$data = array(
				'Provider_Name' => $this->input->post('name'),'Provider_President' => $this->input->post('president'),
				'Provider_TaxID' => $this->input->post('taxId'),'Provider_Type' => $this->input->post('type'),
				'Provider_Billing' => $this->input->post('collectionBilling'),'Provider_IntBilling' => $this->input->post('interestBilling'),
				'Provider_FF' => $this->input->post('fillingFees'),'Provider_ReturnFF' => $this->input->post('reimburseProvider'),
				'cost_balance' => $this->input->post('costBalance'),'Invoice_Type' => $this->input->post('invoiceType'),
				'Provider_ReferredBy' => $this->input->post('referedBy'),'Provider_Notes' => $this->input->post('notes'),
				'Provider_Local_Address' => $this->input->post('addressLocal'),'Provider_Local_Zip' => $this->input->post('zipLocal'),
				'Provider_Local_City' => $this->input->post('cityLocal'),'Provider_Local_State' => $this->input->post('stateLocal'),
				'Provider_Local_Phone' => $this->input->post('phoneLocal'),'Provider_Local_Fax' => $this->input->post('faxLocal'),
				'Provider_Perm_Address' => $this->input->post('addressPermanent'),'Provider_Perm_Zip' => $this->input->post('zipPermanent'),
				'Provider_Perm_City' => $this->input->post('cityPermanent'),'Provider_Perm_State' => $this->input->post('statePermanent'),
				'Provider_Perm_Phone' => $this->input->post('phonePermanent'),'Provider_Perm_Fax' => $this->input->post('faxPermanent'),
				'provider_Rfunds' => $this->input->post('rapidFunds'),'Provider_Contact' => $this->input->post('contact'),
				'Provider_Contact2' => $this->input->post('contact2'),'Provider_Email' => $this->input->post('email'),'memo' => $this->input->post('memo')
			);
			$success = $this->dataentry_model->insert_ProviderInfo($data);
			if($success){
				$data['Provider_Name']= $this->dataentry_model->get_Provider();
				return true;
				//$this->load->view('pages/submitted');
			}
		}
		public function getPro(){
			$data['Provider_Name']= $this->dataentry_model->get_Provider();
			echo json_encode($data);
			//$this->load->view('pages/adj',$data);
		}
		public function getProviderById(){
			$providerId = $this->input->post('providerId');
			$inputdata = array(
				'Provider_Id' => $providerId
			);
			$data['ProviderInfoById'] = $this->dataentry_model->edit_ProviderById($inputdata);
			echo json_encode($data);
		}
		
		public function updateprovider(){
			$data = array(
				'Provider_Id' => $this->input->post('providerId'),
				'Provider_Name' => $this->input->post('name'),'Provider_President' => $this->input->post('president'),
				'Provider_TaxID' => $this->input->post('taxId'),'Provider_Type' => $this->input->post('type'),
				'Provider_Billing' => $this->input->post('collectionBilling'),'Provider_IntBilling' => $this->input->post('interestBilling'),
				'Provider_FF' => $this->input->post('fillingFees'),'Provider_ReturnFF' => $this->input->post('reimburseProvider'),
				'cost_balance' => $this->input->post('costBalance'),'Invoice_Type' => $this->input->post('invoiceType'),
				'Provider_ReferredBy' => $this->input->post('referedBy'),'Provider_Notes' => $this->input->post('notes'),
				'Provider_Local_Address' => $this->input->post('addressLocal'),'Provider_Local_Zip' => $this->input->post('zipLocal'),
				'Provider_Local_City' => $this->input->post('cityLocal'),'Provider_Local_State' => $this->input->post('stateLocal'),
				'Provider_Local_Phone' => $this->input->post('phoneLocal'),'Provider_Local_Fax' => $this->input->post('faxLocal'),
				'Provider_Perm_Address' => $this->input->post('addressPermanent'),'Provider_Perm_Zip' => $this->input->post('zipPermanent'),
				'Provider_Perm_City' => $this->input->post('cityPermanent'),'Provider_Perm_State' => $this->input->post('statePermanent'),
				'Provider_Perm_Phone' => $this->input->post('phonePermanent'),'Provider_Perm_Fax' => $this->input->post('faxPermanent'),
				'provider_Rfunds' => $this->input->post('rapidFunds'),'Provider_Contact' => $this->input->post('contact'),
				'Provider_Contact2' => $this->input->post('contact2'),'Provider_Email' => $this->input->post('email')
			);
			$success = $this->dataentry_model->update_ProviderInfo($data);
			echo json_encode($data);
		}

/* ************************************  Start of Insurance  *************************************************************************/		
		
		public function insurancecompany(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data['State_Name']= $this->dataentry_model->get_States();
				$data['InsuranceCompany_Name']= $this->dataentry_model->get_Insurance();
				$data['Accessibility'] = $this->session->userdata['logged_in']['RoleId'];
				$this->load->view('pages/addinc_company',$data);
			}else{
				$this->load->view('pages/login');
			}
		}
		public function add_InsuranceInfo(){
			$data = array(
				'InsuranceCompany_Name' => $this->input->post('name'),
				'InsuranceCompany_SuitName' => $this->input->post('suit'),
				'InsuranceCompany_Type' => $this->input->post('type'),
				'InsuranceCompany_Local_Address' => $this->input->post('addressLocal'),
				'InsuranceCompany_Local_Zip' => $this->input->post('zipLocal'),
				'InsuranceCompany_Local_City' => $this->input->post('cityLocal'),
				'InsuranceCompany_Local_State' => $this->input->post('stateLocal'),
				'InsuranceCompany_Local_Phone' => $this->input->post('phoneLocal'),
				'InsuranceCompany_Local_Fax' => $this->input->post('faxLocal'),
				'InsuranceCompany_Perm_Address' => $this->input->post('addressPermanent'),
				'InsuranceCompany_Perm_Zip' => $this->input->post('zipPermanent'),
				'InsuranceCompany_Perm_City' => $this->input->post('cityPermanent'),
				'InsuranceCompany_Perm_State' => $this->input->post('statePermanent'),
				'InsuranceCompany_Perm_Phone' => $this->input->post('phonePermanent'),
				'InsuranceCompany_Perm_Fax' => $this->input->post('faxPermanent')
			);
			$success = $this->dataentry_model->insert_InsuranceInfo($data);
			if($success){
				$data['InsuranceCompany_Name']= $this->dataentry_model->get_Insurance();
				return true;
				//$this->load->view('pages/submitted');
			}
		}
		public function getIns(){
			$data['InsuranceCompany_Name']= $this->dataentry_model->get_Insurance();
			echo json_encode($data);
			//$this->load->view('pages/adj',$data);
		}
		public function getInsuranceById(){
			$insuranceId = $this->input->post('insuranceId');
			$inputdata = array(
				'InsuranceCompany_Id' => $insuranceId
			);
			$data['InsuranceInfoById'] = $this->dataentry_model->edit_InsuranceById($inputdata);
			echo json_encode($data);
		}
		public function updateinsurance(){
			$data = array(
				'InsuranceCompany_Id' => $this->input->post('insuranceId'),
				'InsuranceCompany_Name' => $this->input->post('name'),
				'InsuranceCompany_SuitName' => $this->input->post('suit'),
				'InsuranceCompany_Type' => $this->input->post('type'),
				'InsuranceCompany_Local_Address' => $this->input->post('addressLocal'),
				'InsuranceCompany_Local_Zip' => $this->input->post('zipLocal'),
				'InsuranceCompany_Local_City' => $this->input->post('cityLocal'),
				'InsuranceCompany_Local_State' => $this->input->post('stateLocal'),
				'InsuranceCompany_Local_Phone' => $this->input->post('phoneLocal'),
				'InsuranceCompany_Local_Fax' => $this->input->post('faxLocal'),
				'InsuranceCompany_Perm_Address' => $this->input->post('addressPermanent'),
				'InsuranceCompany_Perm_Zip' => $this->input->post('zipPermanent'),
				'InsuranceCompany_Perm_City' => $this->input->post('cityPermanent'),
				'InsuranceCompany_Perm_State' => $this->input->post('statePermanent'),
				'InsuranceCompany_Perm_Phone' => $this->input->post('phonePermanent'),
				'InsuranceCompany_Perm_Fax' => $this->input->post('faxPermanent')
			);
			$success = $this->dataentry_model->update_InsuranceInfo($data);
			echo json_encode($data);
		}

/* ************************************  Start of Defendant  *************************************************************************/	
		public function defendant(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data['State_Name']= $this->dataentry_model->get_States();
				$data['Accessibility'] = $this->session->userdata['logged_in']['RoleId'];
				$this->load->view('pages/add_defendant_info',$data);
			}else{
				$this->load->view('pages/login');
			}
		}
		public function add_DefendantInfo(){
			$data = array(
				'Defendant_Name' => $this->input->post('name'),
				'Defendant_Address' => $this->input->post('address'),
				'Defendant_Zip' => $this->input->post('zip'),
				'Defendant_City' => $this->input->post('city'),
				'Defendant_State' => $this->input->post('state'),
				'Defendant_Email' => $this->input->post('email'),
				'Defendant_Phone' => $this->input->post('phone'),
				'Defendant_Fax' => $this->input->post('fax')
			);
			$success = $this->dataentry_model->insert_DefendantInfo($data);
			if($success){
				return true;
				//$this->load->view('pages/submitted');
			}
		}
		public function getDef(){
			$data['Defendant_Name']= $this->dataentry_model->get_Defendant();
			echo json_encode($data);
			//$this->load->view('pages/adj',$data);
		}
		public function getDefendantById(){
			$defendantId = $this->input->post('defendantId');
			$inputdata = array(
				'Defendant_id' => $defendantId
			);
			$data['DefendantInfoById'] = $this->dataentry_model->edit_DefendantById($inputdata);
			echo json_encode($data);
		}
		public function updatedefendant(){
			$data = array(
				'Defendant_id' => $this->input->post('defendantId'),
				'Defendant_Name' => $this->input->post('name'),
				'Defendant_Address' => $this->input->post('address'),
				'Defendant_Zip' => $this->input->post('zip'),
				'Defendant_City' => $this->input->post('city'),
				'Defendant_State' => $this->input->post('state'),
				'Defendant_Email' => $this->input->post('email'),
				'Defendant_Phone' => $this->input->post('phone'),
				'Defendant_Fax' => $this->input->post('fax')
			);
			$success = $this->dataentry_model->update_DefendantInfo($data);
			echo json_encode($data);
		}
		
/* ************************************  Start of Adjuster  *************************************************************************/
		
		public function adjuster(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data['InsuranceCompany_Name']= $this->dataentry_model->get_Insurance();
				$data['Adjuster_Name']= $this->dataentry_model->get_Adjuster();
				$data['Accessibility'] = $this->session->userdata['logged_in']['RoleId'];
				$this->load->view('pages/add_adjuster_info',$data);
				
			}else{
				$this->load->view('pages/login');
			}
		}
		public function add_AdjusterInfo(){
			$data = array(
				'InsuranceCompany_Id' => $this->input->post('insuranceId'),
				'Adjuster_LastName' => $this->input->post('lastName'),
				'Adjuster_FirstName' => $this->input->post('firstName'),
				'Adjuster_Phone' => $this->input->post('phone'),
				'Adjuster_Phone_Ext' => $this->input->post('ext'),
				'Adjuster_Email' => $this->input->post('email'),
				'Adjuster_Fax' => $this->input->post('fax')
			);
			$success = $this->dataentry_model->insert_AdjusterInfo($data);
			if($success){
				$data['Adjuster_Name']= $this->dataentry_model->get_Adjuster();
				return true;
				//$this->load->view('pages/submitted');
			}
		}
		public function getAdj(){
			$data['Adjuster_Name']= $this->dataentry_model->get_Adjuster();
			echo json_encode($data);
			//$this->load->view('pages/adj',$data);
		}
		public function getAdjusterById(){
			$adjusterId = $this->input->post('adjusterId');
			$inputdata = array(
				'Adjuster_Id' => $adjusterId
			);
			$data['AdjusterInfoById'] = $this->dataentry_model->edit_AdjusterById($inputdata);
			echo json_encode($data);
		}
		public function updateadjuster(){
			$data = array(
				'Adjuster_Id' => $this->input->post('adjusterId'),
				'InsuranceCompany_Id' => $this->input->post('insuranceId'),
				'Adjuster_LastName' => $this->input->post('lastName'),
				'Adjuster_FirstName' => $this->input->post('firstName'),
				'Adjuster_Phone' => $this->input->post('phone'),
				'Adjuster_Phone_Ext' => $this->input->post('ext'),
				'Adjuster_Email' => $this->input->post('email'),
				'Adjuster_Fax' => $this->input->post('fax')
			);
			$success = $this->dataentry_model->update_AdjusterInfo($data);
			echo json_encode($data);
		}
		
		
/* ************************************  Start of Attorney  *************************************************************************/		
		public function attorney(){
			if(isset($this->session->userdata['logged_in'])){
				$data['State_Name']= $this->dataentry_model->get_States();
				$data['Defendant_Name']= $this->dataentry_model->get_Defendant();
				$data['Accessibility'] = $this->session->userdata['logged_in']['RoleId'];
				$this->load->view('pages/add_attorney',$data);
			}else{
				$this->load->view('pages/login');
			}
		}
		public function add_AttorneyInfo(){
			$data = array(
				'Defendant_id' => $this->input->post('defendantId'),
				'Attorney_LastName' => $this->input->post('lastName'),
				'Attorney_FirstName' => $this->input->post('firstName'),
				'Attorney_Zip' => $this->input->post('zip'),
				'Attorney_City' => $this->input->post('city'),
				'Attorney_State' => $this->input->post('state'),
				'Attorney_Phone' => $this->input->post('phone'),
				'Attorney_Fax' => $this->input->post('fax'),
				'Attorney_Email' => $this->input->post('email'),
				
			);
			$success = $this->dataentry_model->insert_AttorneyInfo($data);
			if($success){
				$data['Attorney_Name']= $this->dataentry_model->get_Attorney();
				return true;
				//$this->load->view('pages/submitted');
			}
		}
		public function getAtt(){
			$data['Attorney_Name']= $this->dataentry_model->get_Attorney();
			echo json_encode($data);
			//$this->load->view('pages/adj',$data);
		}
		public function getAttorneyById(){
			$attorneyId = $this->input->post('attorneyId');
			$inputdata = array(
				'Attorney_Id' => $attorneyId
			);
			$data['AttorneyInfoById'] = $this->dataentry_model->edit_AttorneyById($inputdata);
			echo json_encode($data);
		}
		public function updateattorney(){
			$data = array(
				'Attorney_Id' => $this->input->post('attorneyId'),
				'Defendant_id' => $this->input->post('defendantId'),
				'Attorney_LastName' => $this->input->post('lastName'),
				'Attorney_FirstName' => $this->input->post('firstName'),
				'Attorney_Zip' => $this->input->post('zip'),
				'Attorney_City' => $this->input->post('city'),
				'Attorney_State' => $this->input->post('state'),
				'Attorney_Phone' => $this->input->post('phone'),
				'Attorney_Fax' => $this->input->post('fax'),
				'Attorney_Email' => $this->input->post('email'),
			);
			$success = $this->dataentry_model->update_AttorneyInfo($data);
			echo json_encode($data);
		}

/* ************************************  Start of PlantiffAttorney  *************************************************************************/
		public function plantiffattorney(){
			if(isset($this->session->userdata['logged_in'])){
				$data['State_Name']= $this->dataentry_model->get_States();
				$data['Accessibility'] = $this->session->userdata['logged_in']['RoleId'];
				$this->load->view('pages/plaintiff_attorney',$data);
			}else{
				$this->load->view('pages/login');
			} 
		}
		public function add_PlantiffInfo(){
			$data = array(
				'Attorney_Name' => $this->input->post('name'),
				'Attorney_Address' => $this->input->post('address'),
				'Attorney_Zip' => $this->input->post('zip'),
				'Attorney_City' => $this->input->post('city'),
				'Attorney_State' => $this->input->post('state'),
				'Attorney_Email' => $this->input->post('email'),
				'Attorney_Phone' => $this->input->post('phone'),
				'Attorney_Fax' => $this->input->post('fax')
			);
			$success = $this->dataentry_model->insert_PlantiffInfo($data);
			if($success){
				$data['Attorney_Name']= $this->dataentry_model->get_Plantiff();
				return true;
				//$this->load->view('pages/submitted');
			}
		}
		public function getPla(){
			$data['Plantiff']= $this->dataentry_model->get_Plantiff();
			echo json_encode($data);
			//$this->load->view('pages/adj',$data);
		}
		public function getPlantiffById(){
			$plantiffId = $this->input->post('plantiffId');
			$inputdata = array(
				'Attorney_id' => $plantiffId
			);
			$data['PlantiffInfoById'] = $this->dataentry_model->edit_PlantiffById($inputdata);
			echo json_encode($data);
		}
		public function updateplantiff(){
			$data = array(
				'Attorney_id' => $this->input->post('plantiffId'),
				'Attorney_Name' => $this->input->post('name'),
				'Attorney_Address' => $this->input->post('address'),
				'Attorney_Zip' => $this->input->post('zip'),
				'Attorney_City' => $this->input->post('city'),
				'Attorney_State' => $this->input->post('state'),
				'Attorney_Email' => $this->input->post('email'),
				'Attorney_Phone' => $this->input->post('phone'),
				'Attorney_Fax' => $this->input->post('fax')
			);
			$success = $this->dataentry_model->update_PlantiffInfo($data);
			echo json_encode($data);
		}

/* ************************************  Start of otherentries  *************************************************************************/
		public function otherentries(){
			if(isset($this->session->userdata['logged_in'])){
				/*$data['DenialReasons']= $this->dataentry_model->get_DenialReasons();
				$data['Court']= $this->dataentry_model->get_Court();
				$data['ImageType']= $this->dataentry_model->get_ImageType();
				$data['Status']= $this->dataentry_model->get_Status();
				$data['CaseStatus']= $this->dataentry_model->get_CaseStatus();
				$data['Doc']= $this->dataentry_model->get_Doc();
				$data['Service']= $this->dataentry_model->get_Service();
				$data['EventType']= $this->dataentry_model->get_EventType();
				$data['EventStatus']= $this->dataentry_model->get_EventStatus();*/
				$data['Accessibility'] = $this->session->userdata['logged_in']['RoleId'];
				
				$this->load->view('pages/other_entries');
			}else{
				$this->load->view('pages/login');
			}
		}
/********************************* Tab 1 DenialReasons *******************************************************************/
		public function DenialReasons(){
			$list=$this->dataentry_model->get_DenialReasons();
			$data = array();
			$no=0;
			$row = array();
			$row[] ="";
			$row[] = "<input type='text' name='DenialReasons_Type' class='form-control input-sm input-height' value='' >";
			$row[] = "<button type='button' class='btn addRecord'>Add</button><input type='hidden' name='tabIdentity' value='1' >";
			$data[] = $row;
			foreach ($list as $result) {
				$row = array();
				$no++;
				$row[] ="<button type='button' class='btn editRecord'>Edit</button> <div class='update-record' style='display:none;'> <button type='button' class='btn btn-primary update'>Update</button> <button type='button' class='btn btn-primary cancel'>Cancel</button></div>";
				$row[] = "<input type='text' name='DenialReasons_Type' class='form-control input-sm input-height' value='".$result->DenialReasons_Type."' >";
				$row[] = "<input type='checkbox' name='deleteDenialReasons[]' class='deleteDenialReasons deleteDenialReasons".$result->DenialReasons_Id."' value=".$result->DenialReasons_Id."> <input type='hidden' name='tabIdentity' value='1' > <input type='hidden' name='DenialReasons_Id' value='".$result->DenialReasons_Id."' >";
				
				$data[] = $row;
			}
			$output = array(
				"data" => $data
			);
			echo json_encode($output);
		}
/********************************* Tab 2 Court *******************************************************************/
		public function Court(){
			$list=$this->dataentry_model->get_Court();
			$data = array();
			$no=0;
			$row = array();
			$row[] ="";
			$row[] = "<input type='text' name='Court_Name' class='form-control input-sm input-height' value='' >";
			$row[] = "<input type='text' name='Court_Venue' class='form-control input-sm input-height' value='' >";
			$row[] = "<input type='text' name='Court_Address' class='form-control input-sm input-height' value='' >";
			$row[] = "<input type='text' name='Court_Basis' class='form-control input-sm input-height' value='' >";
			$row[] = "<input type='text' name='Court_Misc' class='form-control input-sm input-height' value='' >";
			$row[] = "<button type='button' class='btn addRecord'>Add</button><input type='hidden' name='tabIdentity' value='2' >";
			
			$data[] = $row;
			foreach ($list as $result) {
				$row = array();
				$no++;
				$row[] ="<button type='button' class='btn editRecord'>Edit</button> <div class='update-record' style='display:none;'> <button type='button' class='btn btn-primary update'>Update</button> <button type='button' class='btn btn-primary cancel'>Cancel</button></div>";
				$row[] = "<input type='text' name='Court_Name' class='form-control input-sm input-height' value='".$result->Court_Name."' >";
				$row[] = "<input type='text' name='Court_Venue' class='form-control input-sm input-height' value='".$result->Court_Venue."' >";
				$row[] = "<input type='text' name='Court_Address' class='form-control input-sm input-height' value='".$result->Court_Address."' >";
				$row[] = "<input type='text' name='Court_Basis' class='form-control input-sm input-height' value='".$result->Court_Basis."' >";
				$row[] = "<input type='text' name='Court_Misc' class='form-control input-sm input-height' value='".$result->Court_Misc."' >";
				$row[] = "<input type='checkbox' name='deleteCourt[]' class='deleteCourt deleteCourt".$result->Court_Id."' value=".$result->Court_Id."> <input type='hidden' name='tabIdentity' value='2' > <input type='hidden' name='Court_Id' value='".$result->Court_Id."' >";
				$data[] = $row;
			}
			$output = array(
				"data" => $data
			);
			echo json_encode($output);
		}
/********************************* Tab 3 ImageType *******************************************************************/
		public function ImageType(){
			$list=$this->dataentry_model->get_ImageType();
			$data = array();
			$no=0;
			$row = array();
			$row[] ="";
			$row[] = "<input type='text' name='Image_Type' class='form-control input-sm input-height'>";
			$row[] = "<button type='button' class='btn addRecord'>Add</button><input type='hidden' name='tabIdentity' value='3' >";
			$data[] = $row;
			foreach ($list as $result) {
				$row = array();
				$no++;
				$row[] ="<button type='button' class='btn editRecord'>Edit</button> <div class='update-record' style='display:none;'> <button type='button' class='btn btn-primary update'>Update</button> <button type='button' class='btn btn-primary cancel'>Cancel</button></div>";
				$row[] = "<input type='text' name='Image_Type' class='form-control input-sm input-height' value='".$result->Image_Type."' >";
				$row[] = "<input type='checkbox' name='deleteImageType[]' class='deleteImageType deleteImageType".$result->Image_Id."' value=".$result->Image_Id."> <input type='hidden' name='tabIdentity' value='3' > <input type='hidden' name='Image_Id' value='".$result->Image_Id."' >";
				
				$data[] = $row;
			}
			$output = array(
				"data" => $data
			);
			echo json_encode($output);
		}
/********************************* Tab 4 Status *******************************************************************/
		public function Status(){
			$list=$this->dataentry_model->get_Status();
			$data = array();
			$no=0;
			$row = array();
			$row[] ="";
			$row[] = "<input type='text' name='Status_Type' class='form-control input-sm input-height'>";
			$row[] = "<input type='text' name='Status_Abr' class='form-control input-sm input-height'>";
			$row[] = "<button type='button' class='btn addRecord'>Add</button><input type='hidden' name='tabIdentity' value='4' >";
			$data[] = $row;
			foreach ($list as $result) {
				$row = array();
				$no++;
				$row[] ="<button type='button' class='btn editRecord'>Edit</button> <div class='update-record' style='display:none;'> <button type='button' class='btn btn-primary update'>Update</button> <button type='button' class='btn btn-primary cancel'>Cancel</button></div>";
				$row[] = "<input type='text' name='Status_Type' class='form-control input-sm input-height' value='".$result->Status_Type."' >";
				$row[] = "<input type='text' name='Status_Abr' class='form-control input-sm input-height' value='".$result->Status_Abr."' >";
				$row[] = "<input type='checkbox' name='deleteStatus[]' class='deleteStatus deleteStatus".$result->Status_Id."' value=".$result->Status_Id."> <input type='hidden' name='tabIdentity' value='4' > <input type='hidden' name='Status_Id' value='".$result->Status_Id."' >";
				
				$data[] = $row;
			}
			$output = array(
				"data" => $data
			);
			echo json_encode($output);
		}
/********************************* Tab 5 CaseStatus *******************************************************************/
		public function CaseStatus(){
			$list=$this->dataentry_model->get_CaseStatus();
			$data = array();
			$no=0;
			$row = array();
			$row[] ="";
			$row[] = "<input type='text' name='name' class='form-control input-sm input-height'>";
			$row[] = "<input type='text' name='description' class='form-control input-sm input-height'>";
			$row[] = "<button type='button' class='btn addRecord'>Add</button><input type='hidden' name='tabIdentity' value='5' >";
			$data[] = $row;
			foreach ($list as $result) {
				$row = array();
				$no++;
				$row[] ="<button type='button' class='btn editRecord'>Edit</button> <div class='update-record' style='display:none;'> <button type='button' class='btn btn-primary update'>Update</button> <button type='button' class='btn btn-primary cancel'>Cancel</button></div>";
				$row[] = "<input type='text' name='name' class='form-control input-sm input-height' value='".$result->name."' >";
				$row[] = "<input type='text' name='description' class='form-control input-sm input-height' value='".$result->description."' >";
				$row[] = "<input type='checkbox' name='deleteCaseStatus[]' class='deleteCaseStatus deleteCaseStatus".$result->id."' value=".$result->id."> <input type='hidden' name='tabIdentity' value='5' > <input type='hidden' name='id' value='".$result->id."' >";
				
				$data[] = $row;
			}
			$output = array(
				"data" => $data
			);
			echo json_encode($output);
		}
/********************************* Tab 6 Doc *******************************************************************/
		public function Doc(){
			$list=$this->dataentry_model->get_Doc();
			$data = array();
			$no=0;
			$row = array();
			$row[] ="";
			$row[] = "<input type='text' name='Doc_Name' class='form-control input-sm input-height'>";
			$row[] = "<input type='text' name='Doc_Value' class='form-control input-sm input-height'>";
			$row[] = "<input type='text' name='Settlement' class='form-control input-sm input-height'>";
			$row[] = "<button type='button' class='btn addRecord'>Add</button><input type='hidden' name='tabIdentity' value='6' >";
			$data[] = $row;
			foreach ($list as $result) {
				$row = array();
				$no++;
				$row[] ="<button type='button' class='btn editRecord'>Edit</button> <div class='update-record' style='display:none;'> <button type='button' class='btn btn-primary update'>Update</button> <button type='button' class='btn btn-primary cancel'>Cancel</button></div>";
				$row[] = "<input type='text' name='Doc_Name' class='form-control input-sm input-height' value='".$result->Doc_Name."' >";
				$row[] = "<input type='text' name='Doc_Value' class='form-control input-sm input-height' value='".$result->Doc_Value."' >";
				$row[] = "<input type='text' name='Settlement' class='form-control input-sm input-height' value='".$result->Settlement."' >";
				$row[] = "<input type='checkbox' name='deleteDoc[]' class='deleteDoc deleteDoc".$result->Doc_Id."' value=".$result->Doc_Id."> <input type='hidden' name='tabIdentity' value='6' > <input type='hidden' name='Doc_Id' value='".$result->Doc_Id."' >";
				
				$data[] = $row;
			}
			$output = array(
				"data" => $data
			);
			echo json_encode($output);
		}
/********************************* Tab 7 Service *******************************************************************/
		public function Service(){
			$list=$this->dataentry_model->get_Service();
			$data = array();
			$no=0;
			$row = array();
			$row[] ="";
			$row[] = "<input type='text' name='ServiceType' class='form-control input-sm input-height'>";
			$row[] = "<input type='text' name='ServiceDesc' class='form-control input-sm input-height'>";
			$row[] = "<button type='button' class='btn addRecord'>Add</button><input type='hidden' name='tabIdentity' value='7' >";
			$data[] = $row;
			foreach ($list as $result) {
				$row = array();
				$no++;
				$row[] ="<button type='button' class='btn editRecord'>Edit</button> <div class='update-record' style='display:none;'> <button type='button' class='btn btn-primary update'>Update</button> <button type='button' class='btn btn-primary cancel'>Cancel</button></div>";
				$row[] = "<input type='text' name='ServiceType' class='form-control input-sm input-height' value='".$result->ServiceType."' >";
				$row[] = "<input type='text' name='ServiceDesc' class='form-control input-sm input-height' value='".$result->ServiceDesc."' >";
				$row[] = "<input type='checkbox' name='deleteService[]' class='deleteService deleteService".$result->ServiceType_ID."' value=".$result->ServiceType_ID."> <input type='hidden' name='tabIdentity' value='7' > <input type='hidden' name='ServiceType_ID' value='".$result->ServiceType_ID."' >";
				
				$data[] = $row;
			}
			$output = array(
				"data" => $data
			);
			echo json_encode($output);
		}
/********************************* Tab 8 EventType *******************************************************************/
		public function EventType(){
			$list=$this->dataentry_model->get_EventType();
			$data = array();
			$no=0;
			$row = array();
			$row[] ="";
			$row[] = "<input type='text' name='EventTypeName' class='form-control input-sm input-height'>";
			$row[] = "<button type='button' class='btn addRecord'>Add</button><input type='hidden' name='tabIdentity' value='8' >";
			$data[] = $row;
			foreach ($list as $result) {
				$row = array();
				$no++;
				$row[] ="<button type='button' class='btn editRecord'>Edit</button> <div class='update-record' style='display:none;'> <button type='button' class='btn btn-primary update'>Update</button> <button type='button' class='btn btn-primary cancel'>Cancel</button></div>";
				$row[] = "<input type='text' name='EventTypeName' class='form-control input-sm input-height' value='".$result->EventTypeName."' > ";
				$row[] = "<input type='checkbox' name='deleteEventType[]' class='deleteEventType deleteEventType".$result->EventTypeId."' value=".$result->EventTypeId."> <input type='hidden' name='tabIdentity' value='8' > <input type='hidden' name='EventTypeId' value='".$result->EventTypeId."' >";
				
				$data[] = $row;
			}
			$output = array(
				"data" => $data
			);
			echo json_encode($output);
		}
/********************************* Tab 9 EventStatus *******************************************************************/
		public function EventStatus(){
			$list=$this->dataentry_model->get_EventStatus();
			$data = array();
			$no=0;
			$row = array();
				$row[] ="<form>";
				$row[] = "<input type='text' name='EventStatusName' class='form-control input-sm input-height'>";
				$row[] = "<button type='button' class='btn addRecord'>Add</button><input type='hidden' name='tabIdentity' value='9' >";
			$data[] = $row;
			foreach ($list as $result) {
				$row = array();
				$no++;
				$row[] ="<button type='button' class='btn editRecord'>Edit</button> <div class='update-record' style='display:none;'> <button type='button' class='btn btn-primary update'>Update</button> <button type='button' class='btn btn-primary cancel'>Cancel</button></div>";
				
				$row[] = "<input type='text' name='EventStatusName' class='form-control input-sm input-height' value='".$result->EventStatusName."' > ";
				$row[] = "<input type='checkbox' name='deleteEventStatus[]' class='deleteEventStatus deleteEventStatus".$result->EventStatusId."' value=".$result->EventStatusId."> <input type='hidden' name='tabIdentity' value='9' ><input type='hidden' name='EventStatusId' value='".$result->EventStatusId."' >";
				
				$data[] = $row;
			}
			$output = array(
				"data" => $data
			);
			echo json_encode($output);
		}
		public function Add_Record(){
			$tabIdentity = $this->input->post('tabIdentity');
			if($tabIdentity == 1){
				$data = array(
					'DenialReasons_Type' => $this->input->post('DenialReasons_Type')
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
				/*$asd = array();
				$row = array();
				$row[] ="<button type='button' class='btn editRecord'>Edit</button> <div class='update-record' style='display:none;'> <button type='button' class='btn btn-primary update'>Update</button> <button type='button' class='btn btn-primary cancel'>Cancel</button></div>";
				$row[] = "<input type='text' name='DenialReasons_Type' class='form-control input-sm input-height' >";
				$row[] = "<input type='checkbox' name='deleteDenialReasons[]' class='deleteDenialReasons' > <input type='hidden' name='tabIdentity' value='1' > <input type='hidden' name='DenialReasons_Id'";
				
				$asd['dd'] = $row;*/
			}else if($tabIdentity == 2){
				$data = array(
					'Court_Name' => $this->input->post('Court_Name'),
					'Court_Venue' => $this->input->post('Court_Venue'),
					'Court_Address' => $this->input->post('Court_Address'),
					'Court_Basis' => $this->input->post('Court_Basis'),
					'Court_Misc' => $this->input->post('Court_Misc')
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}else if($tabIdentity == 3){
				$data = array(
					'Image_Type' => $this->input->post('Image_Type')
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}else if($tabIdentity == 4){
				$data = array(
					'Status_Type' => $this->input->post('Status_Type'),
					'Status_Abr' => $this->input->post('Status_Abr')
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}else if($tabIdentity == 5){
				$data = array(
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description')
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}else if($tabIdentity == 6){
				$data = array(
					'Doc_Name' => $this->input->post('Doc_Name'),
					'Doc_Value' => $this->input->post('Doc_Value'),
					'Settlement' => $this->input->post('Settlement') 
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}else if($tabIdentity == 7){
				$data = array(
					'ServiceType' => $this->input->post('ServiceType'),
					'ServiceDesc' => $this->input->post('ServiceDesc')
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}else if($tabIdentity == 8){
				$data = array(
					'EventTypeName' => $this->input->post('EventTypeName')
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}else if($tabIdentity == 9){
				$data = array(
					'EventStatusName' => $this->input->post('EventStatusName')
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}
			//echo "<pre>"; print_r($data); exit();
			$insert_success = $this->dataentry_model->Add_OtherEntries($data,$tabIdentityData);
			//echo json_encode($asd);
			return true;
		}
		public function update_Record(){
			$tabIdentity = $this->input->post('tabIdentity');
			if($tabIdentity == 1){
				$data = array(
					'DenialReasons_Id' => $this->input->post('DenialReasons_Id'),
					'DenialReasons_Type' => $this->input->post('DenialReasons_Type')
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}else if($tabIdentity == 2){
				$data = array(
					'Court_Id' => $this->input->post('Court_Id'),
					'Court_Name' => $this->input->post('Court_Name'),
					'Court_Venue' => $this->input->post('Court_Venue'),
					'Court_Address' => $this->input->post('Court_Address'),
					'Court_Basis' => $this->input->post('Court_Basis'),
					'Court_Misc' => $this->input->post('Court_Misc')
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}else if($tabIdentity == 3){
				$data = array(
					'Image_Id' => $this->input->post('Image_Id'),
					'Image_Type' => $this->input->post('Image_Type')
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}else if($tabIdentity == 4){
				$data = array(
					'Status_Id' => $this->input->post('Status_Id'),
					'Status_Type' => $this->input->post('Status_Type'),
					'Status_Abr' => $this->input->post('Status_Abr')
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}else if($tabIdentity == 5){
				$data = array(
					'id' => $this->input->post('id'),
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description')
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}else if($tabIdentity == 6){
				$data = array(
					'Doc_Id' => $this->input->post('Doc_Id'),
					'Doc_Name' => $this->input->post('Doc_Name'),
					'Doc_Value' => $this->input->post('Doc_Value'),
					'Settlement' => $this->input->post('Settlement') 
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}else if($tabIdentity == 7){
				$data = array(
					'ServiceType_ID' => $this->input->post('ServiceType_ID'),
					'ServiceType' => $this->input->post('ServiceType'),
					'ServiceDesc' => $this->input->post('ServiceDesc')
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}else if($tabIdentity == 8){
				$data = array(
					'EventTypeId' => $this->input->post('EventTypeId'),
					'EventTypeName' => $this->input->post('EventTypeName')
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}else if($tabIdentity == 9){
				$data = array(
					'EventStatusId' => $this->input->post('EventStatusId'),
					'EventStatusName' => $this->input->post('EventStatusName')
				);
				$tabIdentityData = array(
					'tabIdentity' => $tabIdentity
				);
			}
			
			
			
			//echo "<pre>"; print_r($data); exit();
			$insert_success = $this->dataentry_model->Update_OtherEntries($data,$tabIdentityData);
			return true;
		}
		public function delete_Records(){
			$data = $this->input->post('checkedNo');
			$tabIdentity = $this->input->post('tabIdentity');
			$delete_success = $this->dataentry_model->deleteRecords($data,$tabIdentity);
			if($delete_success){
				return true;
			}else{
				return false;
			}
			
		}
/* ************************************  End of otherentries  *************************************************************************/	
	} 	
?>