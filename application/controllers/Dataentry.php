<?php
session_cache_limiter('private_no_expire');

	class Dataentry extends CI_Controller{
	
		Public function __construct(){
			parent::__construct();
			$this->load->library('session');
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
		public function addcase(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				
				$data['Provider_Name']= $this->dataentry_model->get_Provider();
				$data['InsuranceCompany_Name']= $this->dataentry_model->get_Insurance();
				$data['Status']= $this->dataentry_model->get_Status();
				$data['Court']= $this->dataentry_model->get_Court();
				$data['Service']= $this->dataentry_model->get_Service();
				$data['DenialReasons']= $this->dataentry_model->get_DenialReasons();
				
				$this->load->view('pages/addcase',$data);
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
				'Provider_Contact2' => $this->input->post('contact2'),'Provider_Email' => $this->input->post('email'),
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
		
/* ************************************  End of Provider  *************************************************************************/

/* ************************************  Start of Insurance  *************************************************************************/		
		
		public function insurancecompany(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data['State_Name']= $this->dataentry_model->get_States();
				$data['InsuranceCompany_Name']= $this->dataentry_model->get_Insurance();
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
/* ************************************  End of Insurance  *************************************************************************/

/* ************************************  Start of Defendant  *************************************************************************/	
		public function defendant(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data['State_Name']= $this->dataentry_model->get_States();
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
/* ************************************  End of Defendant  *************************************************************************/
		
/* ************************************  Start of Adjuster  *************************************************************************/
		
		public function adjuster(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data['InsuranceCompany_Name']= $this->dataentry_model->get_Insurance();
				$data['Adjuster_Name']= $this->dataentry_model->get_Adjuster();
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
		
/* ************************************  End of Adjuster  *************************************************************************/
		
		
/* ************************************  Start of Attorney  *************************************************************************/		
		public function attorney(){
			if(isset($this->session->userdata['logged_in'])){
				$data['State_Name']= $this->dataentry_model->get_States();
				$data['Defendant_Name']= $this->dataentry_model->get_Defendant();
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
		
/* ************************************  End of Attorney  *************************************************************************/

/* ************************************  Start of PlantiffAttorney  *************************************************************************/
		public function plantiffattorney(){
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/plaintiff_attorney');
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
				'Attorney_Id' => $this->input->post('attorneyId'),
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
		
/* ************************************  End of PlantiffAttorney  *************************************************************************/

/* ************************************  Start of otherentries  *************************************************************************/
		public function otherentries(){
			if(isset($this->session->userdata['logged_in'])){
				$data['DenialReasons']= $this->dataentry_model->get_DenialReasons();
				$data['Court']= $this->dataentry_model->get_Court();
				$data['ImageType']= $this->dataentry_model->get_ImageType();
				$data['Status']= $this->dataentry_model->get_Status();
				$data['CaseStatus']= $this->dataentry_model->get_CaseStatus();
				$data['Doc']= $this->dataentry_model->get_Doc();
				$data['Service']= $this->dataentry_model->get_Service();
				$data['EventType']= $this->dataentry_model->get_EventType();
				$data['EventStatus']= $this->dataentry_model->get_EventStatus();
				
				$this->load->view('pages/other_entries',$data);
			}else{
				$this->load->view('pages/login');
			}
		}
/* ************************************  End of otherentries  *************************************************************************/	
	} 	
?>