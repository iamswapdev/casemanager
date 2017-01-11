<?php
session_cache_limiter('private_no_expire');

	class Workarea extends CI_Controller{
	
		Public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('dataentry_model');
			$this->load->model('workarea_model');
			$this->load->model('admin_privilege_model');
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
	} 	
?>