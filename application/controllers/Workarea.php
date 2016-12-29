<?php
session_cache_limiter('private_no_expire');

	class Workarea extends CI_Controller{
	
		Public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('dataentry_model');
			$this->load->model('workarea_model');
		}
		public function index(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('pages/caseinformation');	
			}else{
				$this->load->view('pages/login');
			}
		}
		public function caseinformation(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data['Accessibility'] = $this->session->userdata['RoleId'];
				$this->load->view('pages/caseinformation', $data);
			}else{
				$this->load->view('pages/login');
			}
		}
		public function dataentryworkarea(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				//$data['Provider_Name']= $this->workarea_model->just();
				
				
				$data['Provider_Name']= $this->workarea_model->get_Provider();
				$data['InsuranceCompany_Name']= $this->workarea_model->get_Insurance();
				$data['Status']= $this->workarea_model->get_Status();
				$data['Court']= $this->workarea_model->get_Court();
				$data['Service']= $this->workarea_model->get_Service();
				$data['DenialReasons']= $this->workarea_model->get_DenialReasons();
				$data['Accessibility'] = $this->session->userdata['RoleId'];
				$this->load->view('pages/dataentry_workarea',$data);
			}else{
				$this->load->view('pages/login');
			}
		}
		public function add_CaseInfo(){
			$this->session->all_userdata();
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
			//echo $this->session->userdata['logged_in']['username'];
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data['Accessibility'] = $this->session->userdata['RoleId'];
				$this->load->view('pages/fileinsert', $data);	
			}else{
				$this->load->view('pages/login');
			}
		}
		public function workflowreport(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data['Provider_Name']= $this->workarea_model->get_Provider();
				$data['InsuranceCompany_Name']= $this->workarea_model->get_Insurance();
				$data['Defendant_Name']= $this->workarea_model->get_Defendant();
				$data['Court']= $this->workarea_model->get_Court();
				$data['Accessibility'] = $this->session->userdata['RoleId'];
				$this->load->view('pages/workflowreport',$data);
			}else{
				$this->load->view('pages/login');
			}
		}
		public function calendar(){
			$this->session->all_userdata();
			if(isset($this->session->userdata['logged_in'])){
				$data['Accessibility'] = $this->session->userdata['RoleId'];
				$this->load->view('pages/calendar', $data);
			}else{
				$this->load->view('pages/login');
			}
		}	
	} 	
?>