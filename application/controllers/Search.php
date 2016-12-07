<?php
session_cache_limiter('private_no_expire');

class Search extends CI_Controller{

	Public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('search_model');
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
			
			$data['CaseInfo']= $this->search_model->get_CaseInfo_ById($Case_AutoId);
			//echo "<pre>"; print_r($data['CaseInfo']); exit();
			$this->load->view('pages/workarea_info',$data);
		}else{
			$this->load->view('pages/login');
		}
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
	public function getAdj(){
		$list=$this->search_model->get_SearchResult();
		$data = array();
		$no=0;
		foreach ($list as $result) {
			$row = array();
			$no++;
			$row[] = "<a href='editcase/".$result->Case_AutoId."'>".$no."</a>";
			$row[] = "<a href='editcase/".$result->Case_AutoId."'>Edit</a>";
			//<form action='editcase' method='post'><input type='hidden' name='Case_AutoId' value='".$result->Case_AutoId."'><button type='submit' class='btn btn-primary editRecord'>Edit</button></form>
			$row[] = "<a href='viewcase/".$result->Case_AutoId."'>".$result->Case_Id."</a>";
			$row[] = "<a href='editcase/".$result->Case_AutoId."'>".$result->InjuredParty_LastName."</a>";
			$row[] = "<a href='editcase/".$result->Case_AutoId."'>".$result->Provider_Name."</a>";
			$row[] = "<a href='editcase/".$result->Case_AutoId."'>".$result->InsuranceCompany_Name."</a>";
			$row[] = "<a href='editcase/".$result->Case_AutoId."'>".$result->Accident_Date."</a>";
			$DateOfService_Start = str_replace("12:00AM","",$result->DateOfService_Start);
			$DateOfService_End = str_replace("12:00AM","",$result->DateOfService_End);
			$row[] = "<a href='editcase/".$result->Case_AutoId."'>".$DateOfService_Start."</a>";
			$row[] = "<a href='editcase/".$result->Case_AutoId."'>".$DateOfService_End."</a>";
			$row[] = "<a href='editcase/".$result->Case_AutoId."'>".$result->Status."</a>";
			$row[] = "<a href='editcase/".$result->Case_AutoId."'>".$result->Ins_Claim_Number."</a>";
			$row[] = "<a href='editcase/".$result->Case_AutoId."'>".$result->Claim_Amount."</a>";
			$row[] = "<a href='editcase/".$result->Case_AutoId."'>".$result->IndexOrAAA_Number."</a>";
			$row[] = "<a href='editcase/".$result->Case_AutoId."'>".$result->Initial_Status."</a>";
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
			$row[] = $result->Notes_Type;
			
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
}
?>