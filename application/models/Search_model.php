<?php
Class Search_model extends CI_Model{
	
	Public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function get_CaseInfo($data){
		$this->db->where('Case_AutoId', $data['Case_AutoId']);
		$query = $this->db->get('dbo_tblcase'); 
		$data=$query->result_array();
		//echo "<pre>"; print_r($data); exit();
		return $data;
	}
	public function get_CaseInfo_ById($Case_AutoId){
		/*$this->db->where('Case_AutoId', $data['Case_AutoId']);
		$query = $this->db->get('dbo_tblcase'); 
		$data=$query->result_array();
		//echo "<pre>"; print_r($data); exit();
		return $data;*/ //DATE_FORMAT(t1.Accident_Date,"%m-%Y-%d") as Accident_Date
		
		//$this->db->select('t1.Case_AutoId, t1.Case_Id, t1.InjuredParty_LastName, t1.InjuredParty_FirstName, t2.Provider_Name, t3.InsuranceCompany_Name, t1.DateOfService_Start, t1.DateOfService_End, t1.Status, t1.Ins_Claim_Number, t1.Claim_Amount, t1.IndexOrAAA_Number, t1.Initial_Status, t1.Initial_Status, t1.Initial_Status, t1.Initial_Status, t1.Initial_Status, t4.Defendant_Name, t5.Adjuster_LastName, t5.Adjuster_FirstName, t6.Attorney_Name, t1.InsuredParty_LastName, t1.InsuredParty_FirstName, t1.Attorney_FileNumber, t7.Court_Name, t1.Old_Case_Id, t1.Paid_Amount, t1.Policy_Number, t1.Date_BillSent' );
		//$this->db->select('t1.*, t2.Provider_Name, t3.InsuranceCompany_Name');
		
		$this->db->select('t1.*, DATE_FORMAT(t1.Accident_Date,"%m-%Y-%d") as Accident_DateNoTimr, t2.Provider_Name, t3.InsuranceCompany_Name, t4.Defendant_Name, t5.Adjuster_LastName, t5.Adjuster_FirstName, t6.Attorney_Name, t7.Court_Name' );
		$this->db->from('dbo_tblcase as t1');
		$this->db->where('Case_AutoId',$Case_AutoId);
		$this->db->join('dbo_tblprovider as t2', 't1.Provider_Id = t2.Provider_Id', 'LEFT');
		$this->db->join('dbo_tblinsurancecompany as t3', 't1.InsuranceCompany_Id = t3.InsuranceCompany_Id', 'LEFT');
		$this->db->join('dbo_tbldefendant as t4', 't1.Defendant_Id = t4.Defendant_id', 'LEFT');
		$this->db->join('dbo_tbladjusters as t5', 't1.Adjuster_Id = t5.Adjuster_Id', 'LEFT');
		$this->db->join('dbo_tblplaintiffattorney as t6', 't1.Plaintiff_Id = t6.Attorney_id', 'LEFT');
		$this->db->join('dbo_tblcourt as t7', 't1.Court_Id = t7.Court_Id', 'LEFT');
		$query= $this->db->get();
		$data=$query->result_array();
		//echo "<pre>"; print_r($data); exit();
		return $data;
	}
	public function get_Provider()
	{
		$this->db->order_by("Provider_Name", "asc");
		$query = $this->db->get('dbo_tblprovider'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_Insurance()
	{
		$this->db->order_by("InsuranceCompany_Name", "asc");
		$query=$this->db->get('dbo_tblinsurancecompany');
		$data=$query->result_array();
		return $data;
	}
	public function get_StatusArray()
	{
		$this->db->order_by("Status_Type", "asc");
		$query = $this->db->get('dbo_tblstatus'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_CaseStatus()
	{
		$this->db->order_by("name", "asc");
		$query = $this->db->get('dbo_tblcasestatus'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_Defendant()
	{
		$this->db->order_by("Defendant_Name", "asc");
		$query=$this->db->get('dbo_tbldefendant');
		$data=$query->result_array();
		return $data;
	}
	public function get_ServiceArray()
	{
		$this->db->order_by("ServiceType", "asc");
		$query = $this->db->get('dbo_tblservicetype'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_SearchResult()
	{
		/*$query1=$this->db->like('Accident_Date', array('Accident_Date' => date('Y-m-d')));
		$query=$this->db->get('dbo_tblcase');
		$data=$query->result();
		return $data;*/
		$this->db->select('t1.Case_AutoId, t1.Case_Id, t1.InjuredParty_LastName, t2.Provider_Name, t3.InsuranceCompany_Name, DATE_FORMAT(t1.Accident_Date,"%m-%Y-%d") as Accident_Date, t1.DateOfService_Start, t1.DateOfService_End, t1.Status, t1.Ins_Claim_Number, t1.Claim_Amount, t1.IndexOrAAA_Number, t1.Initial_Status');
		$this->db->from('dbo_tblcase as t1');
		$this->db->join('dbo_tblprovider as t2', 't1.Provider_Id = t2.Provider_Id', 'LEFT');
		$this->db->join('dbo_tblinsurancecompany as t3', 't1.InsuranceCompany_Id = t3.InsuranceCompany_Id', 'LEFT');
		$query= $this->db->get();
		$data=$query->result();
		return $data;
	}
	public function get_Adjuster()
	{
		$this->db->order_by("Adjuster_LastName", "asc");
		$query=$this->db->get('dbo_tbladjusters');
		$data=$query->result_array();
		return $data;
	}
	public function get_CourtArray()
	{
		$this->db->order_by("Court_Name", "asc");
		$query = $this->db->get('dbo_tblcourt'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_DenialReasonsArray()
	{
		$this->db->order_by("DenialReasons_Type", "asc");
		$query = $this->db->get('dbo_tbldenialreasons'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_Notes($Case_Id){
		//$this->db->order_by("Notes_Desc", "asc");
		$this->db->where('Case_Id', $Case_Id);
		$query = $this->db->get('dbo_tblnotes'); 
		$data=$query->result();
		//echo "<pre>"; print_r($data1); exit();
		return $data;
	}
	public function add_Notes($data){
		$this->db->insert("dbo_tblnotes", $data);
		return true;
	}
	

}
?>