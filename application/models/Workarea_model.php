<?php

Class Workarea_model extends CI_Model{
	
	Public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function get_Provider()
	{
		$this->db->order_by("Provider_Name", "asc");
		$query = $this->db->get('tblprovider'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_Insurance()
	{
		$this->db->order_by("InsuranceCompany_Name", "asc");
		$query=$this->db->get('tblinsurancecompany');
		$data=$query->result_array();
		return $data;
	}
	public function get_Defendant()
	{
		$this->db->order_by("Defendant_Name", "asc");
		$query=$this->db->get('tbldefendant');
		$data=$query->result_array();
		return $data;
	}
	public function get_Court()
	{
		$this->db->order_by("Court_Name", "asc");
		$query = $this->db->get('tblcourt'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_Status()
	{
		$this->db->order_by("Status_Type", "asc");
		$query = $this->db->get('tblstatus'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_Service()
	{
		$this->db->order_by("ServiceType", "asc");
		$query = $this->db->get('tblservicetype'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_DenialReasons()
	{
		$this->db->order_by("DenialReasons_Type", "asc");
		$query = $this->db->get('tbldenialreasons'); 
		$data=$query->result_array();
		return $data;
	}
	function just(){

		$query ="select Case_AutoId from tblcase order by Case_AutoId DESC limit 1";
		$qwe = array(
			"name" => "sid",
			"name 2" => "sid 2"
		);
		$res = $this->db->query($query);
		$data = $res->result_array();
		echo $data['Case_AutoId'];
		$qwe['sid'] = $data['Case_AutoId'];
		echo "<pre>"; print_r($qwe); exit();
		if($res->num_rows() > 0) {
			return $res->result("array");
		}
			return array();
	}
	public function get_Print_Table($Start_Date, $End_Date, $DateType, $Status, $TableName){
		
		$this->db->from('tblcase as t1');
		if($TableName == "Print"){
			$this->db->select('t1.*, t2.Provider_Name, t3.InsuranceCompany_Name, t4.Court_Name');
		}else if($TableName == "Status"){
			$this->db->select('t1.Status, COUNT(t1.Status) as Count');
			$this->db->group_by("t1.Status");
		}else if($TableName == "Provider"){
			$this->db->select('t2.Provider_Name, COUNT(t1.Provider_Id) as Count');
			$this->db->group_by("t1.Provider_Id");
		}else{
			$this->db->select('t3.InsuranceCompany_Name, COUNT(t1.InsuranceCompany_Id) as Count');
			$this->db->group_by("t1.InsuranceCompany_Id");
		}
		
		
		$this->db->join('tblprovider as t2', 't1.Provider_Id = t2.Provider_Id', 'LEFT');
		$this->db->join('tblinsurancecompany as t3', 't1.InsuranceCompany_Id = t3.InsuranceCompany_Id', 'LEFT');
		$this->db->join('tblcourt as t4', 't1.Court_Id = t4.Court_Id', 'LEFT');
		
		$this->db->where('t1.'.$DateType.' >=', $Start_Date);
		$this->db->where('t1.'.$DateType.' <=', $End_Date);
		if($Status != ""){
			$this->db->where('t1.Status',$Status);
		}
		$query= $this->db->get();
		$data=$query->result();
		return $data;
	}
	public function get_Status_Table($Start_Date, $End_Date, $DateType, $Status){
		$this->db->from('tblcase as t1');
		
		$this->db->join('tblprovider as t2', 't1.Provider_Id = t2.Provider_Id', 'LEFT');
		$this->db->join('tblinsurancecompany as t3', 't1.InsuranceCompany_Id = t3.InsuranceCompany_Id', 'LEFT');
		$this->db->join('tblcourt as t4', 't1.Court_Id = t4.Court_Id', 'LEFT');
		
		$this->db->where('t1.'.$DateType.' >=', $Start_Date);
		$this->db->where('t1.'.$DateType.' <=', $End_Date);
		if($Status != ""){
			$this->db->where('t1.Status',$Status);
		}
		$query= $this->db->get();
		$data=$query->result();
		return $data;
	}
	public function add_Calendar_Events($start, $end){
		$this->db->select("t1.Case_id, DATE_FORMAT(t1.Event_date, '%Y/%m/%d') as start, t2.EventStatusName, COUNT(t1.Event_date) as date_count, COUNT(t1.EventStatusId) as event_count");
		$this->db->from("tblevent as t1");
		$this->db->order_by("t1.Event_date", "asc");
		$this->db->join("tbleventstatus as t2", "t2.EventStatusId = t1.EventStatusId");
		$this->db->where("t1.Event_date >=", $start);
		$this->db->where("t1.Event_date <=", $end);
		$this->db->group_by("t1.Event_date");
		$this->db->group_by("t1.EventStatusId");
		$query = $this->db->get();
		return $query->result();
	}
	public function get_Event_List($Date){
		$this->db->select('t2.Case_AutoId, t1.Case_id, t3.EventTypeName, t4.EventStatusName, t1.Event_Date, t1.Event_Time, t1.Event_Notes, t1.Assigned_To, t5.Provider_Name, t2.InjuredParty_LastName, t2.InjuredParty_FirstName, t6.Court_Name, t2.IndexOrAAA_Number, t2.Claim_Amount, t7.Defendant_Name, t8.InsuranceCompany_Name, t2.Status');
		
		$this->db->from('tblevent as t1');
		$this->db->join('tblcase as t2', 't1.Case_id = t2.Case_id', "LEFT");
		$this->db->join('tbleventtype as t3', 't1.EventTypeId = t3.EventTypeId', "LEFT");
		$this->db->join('tbleventstatus as t4', 't1.EventStatusId = t4.EventStatusId', "LEFT");
		$this->db->join('tblprovider as t5', 't2.Provider_Id = t5.Provider_Id', "LEFT");
		$this->db->join('tblcourt as t6', 't2.Court_Id = t6.Court_Id', "LEFT");
		$this->db->join('tbldefendant as t7', 't2.Defendant_Id = t7.Defendant_id', "LEFT");
		$this->db->join('tblinsurancecompany as t8', 't2.InsuranceCompany_Id = t8.InsuranceCompany_Id', "LEFT");
		$this->db->where("t1.Event_Date", $Date);
		$this->db->order_by("t1.Event_Date","asc");
		$query= $this->db->get();
		$data=$query->result();
		return $data;
	}
	public function get_Calendar_Report($data){
		$this->db->select('t2.Case_AutoId, t1.Case_id, t3.EventTypeName, t4.EventStatusName, t1.Event_Date, t1.Event_Time, t1.Event_Notes, t1.Assigned_To, t5.Provider_Name, t2.InjuredParty_LastName, t2.InjuredParty_FirstName, t6.Court_Name, t2.IndexOrAAA_Number, t2.Claim_Amount, t7.Defendant_Name, t8.InsuranceCompany_Name, t2.Status');
		
		$this->db->from('tblevent as t1');
		$this->db->join('tblcase as t2', 't1.Case_id = t2.Case_id', "LEFT");
		$this->db->join('tbleventtype as t3', 't1.EventTypeId = t3.EventTypeId', "LEFT");
		$this->db->join('tbleventstatus as t4', 't1.EventStatusId = t4.EventStatusId', "LEFT");
		$this->db->join('tblprovider as t5', 't2.Provider_Id = t5.Provider_Id', "LEFT");
		$this->db->join('tblcourt as t6', 't2.Court_Id = t6.Court_Id', "LEFT");
		$this->db->join('tbldefendant as t7', 't2.Defendant_Id = t7.Defendant_id', "LEFT");
		$this->db->join('tblinsurancecompany as t8', 't2.InsuranceCompany_Id = t8.InsuranceCompany_Id', "LEFT");
		if($data['CR_SD'] != ""){
			$this->db->where("t1.Event_Date >=", $data['CR_SD']);
		}
		if($data['CR_ED'] != ""){
			$this->db->where("t1.Event_Date <=", $data['CR_ED']);
		}
		if($data['CR_CalendarType'] != "All"){
			$this->db->where("t3.EventTypeId", $data['CR_CalendarType']);
		}
		if($data['CR_ProviderId'][0] != "All"){
			$this->db->where("t5.Provider_Id", $data['CR_ProviderId'][0]);
		}
		if($data['CR_InsuranceCompanyId'][0] != "All"){
			$this->db->where("t8.InsuranceCompany_Id", $data['CR_InsuranceCompanyId'][0]);
		}
		if($data['CR_DefendantId'][0] != "All"){
			$this->db->where("t7.Defendant_Id", $data['CR_DefendantId'][0]);
		}
		if($data['CR_CourtId'][0] != "All"){
			$this->db->where("t6.Court_Id", $data['CR_CourtId'][0]);
		}
		
		$this->db->order_by("t1.Event_Date","asc");
		$query= $this->db->get();
		$data=$query->result();
		return $data;
	}
}

?>