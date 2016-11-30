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
	public function getAdj(){
		$list=$this->search_model->get_SearchResult();
		$data = array();
		$no=0;
		foreach ($list as $customers) {
			$row = array();
			$no++;
			$row[] = $no;
			$row[] = "Edit";
			$row[] = $customers->Case_Id;
			$row[] = $customers->InjuredParty_LastName;
			$row[] = "provider";
			$row[] = "insur com";
			$row[] = $customers->Accident_Date;
			$row[] = $customers->DateOfService_Start;
			$row[] = $customers->DateOfService_End;
			$row[] = $customers->Status;
			$row[] = $customers->	Ins_Claim_Number;
			$row[] = $customers->Claim_Amount;
			$row[] = "select";
			
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
			$data['SearchResult']=$this->search_model->get_SearchResult();
			$this->load->view('pages/advancedsearch',$data);
		}else{
			$this->load->view('pages/login');
		}
	}
}
?>