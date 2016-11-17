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
				$data['Status_Type']= $this->dataentry_model->get_Status();
				$data['ServiceType']= $this->dataentry_model->get_Service();
				$data['DenialReasons_Type']= $this->dataentry_model->get_DenialReasons();
				
				$this->load->view('pages/addcase',$data);
			}else{
				$this->load->view('pages/login');
			}
		}
		public function provider(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data['State_Name']= $this->dataentry_model->get_States();
				$data['Provider_Name']= $this->dataentry_model->get_Provider();
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
			$this->load->view('pages/submitted');
		}
		public function updateprovider(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$providerName = $this->input->post('name');
				//echo "IIIDDD: ".$providerName; exit();
				if($providerName == ""){
					$data['Provider_Name']= $this->dataentry_model->get_Provider();
					$providerId = $this->input->post('providerId');
					//echo "providerId: ".$providerId; exit();
					if($providerId == ""){
						$data['ProviderInfoById'] = "";
						$data['display_form'] = 0;
						$this->load->view('pages/updateProviderInfo',$data);
						return false;
					}
					$data['display_form'] = 1;
					$inputdata = array(
						'Provider_Id' => $this->input->post('providerId')
					);
					
					$data['ProviderInfoById'] = $this->dataentry_model->edit_ProviderById($inputdata);
					//echo "YYYY: <pre>".$providerId. print_r($data['ProviderInfoById']);
					
					$this->load->view('pages/updateProviderInfo',$data);
				}else{
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
						'Provider_Contact2' => $this->input->post('contact2'),'Provider_Email' => $this->input->post('email'),
					);
					$success = $this->dataentry_model->update_ProviderInfo($data);
					if($success){
						$this->load->view('pages/submitted');
					}
				}
					
			}else{
				$this->load->view('pages/login');
			}
		}
		
		
		
		public function insurancecompany(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data['State_Name']= $this->dataentry_model->get_States();
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
				$this->load->view('pages/submitted');
			}
		}
		public function updateinsurance(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$insuranceName = $this->input->post('name');
				//echo "IIIDDD: ".$insuranceName; exit();
				if($insuranceName == ""){
					$data['InsuranceCompany_Name']= $this->dataentry_model->get_Insurance();
					$insuranceId = $this->input->post('insuranceId');
					//echo "<pre>";print_r($data); exit();
					//echo "insuranceId: ".$insuranceId; exit();
					if($insuranceId == ""){
						$data['InsuranceInfoById'] = "";
						$data['display_form'] = 0;
						$this->load->view('pages/updateInsuranceInfo',$data);
						return false;
					}
					$data['display_form'] = 1;
					$inputdata = array(
						'InsuranceCompany_Id' => $this->input->post('insuranceId')
					);
					
					$data['InsuranceInfoById'] = $this->dataentry_model->edit_InsuranceById($inputdata);
					$this->load->view('pages/updateInsuranceInfo',$data);
				}else{
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
					if($success){
						$this->load->view('pages/submitted');
					}
				}
					
			}else{
				$this->load->view('pages/login');
			}
		}
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
				$this->load->view('pages/submitted');
			}
		}
		public function updatedefendant(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$defendantName = $this->input->post('name');
				//echo "IIIDDD: ".$defendantName; exit();
				if($defendantName == ""){
					$data['Defendant_Name']= $this->dataentry_model->get_Defendant();
					$defendantId = $this->input->post('defendantId');
					//echo "<pre>";print_r($data); exit();
					//echo "defendantId: ".$defendantId; exit();
					if($defendantId == ""){
						$data['DefendantInfoById'] = "";
						$data['display_form'] = 0;
						$this->load->view('pages/updateDefendantInfo',$data);
						return false;
					}
					$data['display_form'] = 1;
					$inputdata = array(
						'Defendant_id' => $this->input->post('defendantId')
					);
					//echo "inputdata: <pre>"; print_r($inputdata); exit();
					$data['DefendantInfoById'] = $this->dataentry_model->edit_DefendantById($inputdata);
					//echo "DefendantInfoById: <pre>"; print_r($data['DefendantInfoById']); exit();
					$this->load->view('pages/updateDefendantInfo',$data);
				}else{
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
					if($success){
						$this->load->view('pages/submitted');
					}
				}
					
			}else{
				$this->load->view('pages/login');
			}
		}
		public function adjuster(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data['InsuranceCompany_Name']= $this->dataentry_model->get_Insurance();
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
				$this->load->view('pages/submitted');
			}
		}
		public function updateadjuster(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$adjusterName = $this->input->post('lastName');
				//echo "adjusterName: ".$adjusterName; exit();
				if($adjusterName == ""){
					$data['Adjuster_Name']= $this->dataentry_model->get_Adjuster();
					$adjusterId = $this->input->post('adjusterId');
					//echo "<pre>";print_r($data); exit();
					//echo "adjusterId: ".$adjusterId; exit();
					if($adjusterId == ""){
						$data['AdjusterInfoById'] = "";
						$data['display_form'] = 0;
						$data['InsuranceCompany_Name']= $this->dataentry_model->get_Insurance();
						$this->load->view('pages/updateAdjusterInfo',$data);
						return false;
					}
					$data['display_form'] = 1;
					$inputdata = array(
						'Adjuster_Id' => $adjusterId
					);
					//echo "inputdata: <pre>"; print_r($inputdata); exit();
					$data['AdjusterInfoById'] = $this->dataentry_model->edit_AdjusterById($inputdata);
					 //echo "AdjusterInfoById: <pre>"; print_r($data['AdjusterInfoById']); exit();
					$data['InsuranceCompany_Name']= $this->dataentry_model->get_Insurance();
					$this->load->view('pages/updateAdjusterInfo',$data);
				}else{
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
					if($success){
						$this->load->view('pages/submitted');
					}
				}
					
			}else{
				$this->load->view('pages/login');
			}
		}
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
				$this->load->view('pages/submitted');
			}
		}
		public function updateattorney(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$attorneyName = $this->input->post('lastName');
				//echo "attorneyName: ".$attorneyName; exit();
				if($attorneyName == ""){
					$data['Attorney_Name']= $this->dataentry_model->get_Attorney();
					$attorneyId = $this->input->post('attorneyId');
					//echo "<pre>";print_r($data); exit();
					//echo "adjusterId: ".$adjusterId; exit();
					if($attorneyId == ""){
						$data['AttorneyInfoById'] = "";
						$data['display_form'] = 0;
						$data['Defendant_Name']= $this->dataentry_model->get_Defendant();
						$this->load->view('pages/updateAttorneyInfo',$data);
						return false;
					}
					$data['display_form'] = 1;
					$inputdata = array(
						'Attorney_Id' => $attorneyId
					);
					//echo "inputdata: <pre>"; print_r($inputdata); exit();
					$data['AttorneyInfoById'] = $this->dataentry_model->edit_AttorneyById($inputdata);
					 //echo "AttorneyInfoById: <pre>"; print_r($data['AdjusterInfoById']); exit();
					$data['Defendant_Name']= $this->dataentry_model->get_Defendant();
					$this->load->view('pages/updateAttorneyInfo',$data);
				}else{
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
					if($success){
						$this->load->view('pages/submitted');
					}
				}
					
			}else{
				$this->load->view('pages/login');
			}
		}
		public function plantiffattorney(){
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/plaintiff_attorney');
			}else{
				$this->load->view('pages/login');
			} 
		}
		public function otherentries(){
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/other_entries');
			}else{
				$this->load->view('pages/login');
			}
		}	
	} 	
?>