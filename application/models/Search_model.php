<?php
Class Search_model extends CI_Model{
	
	Public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function get_CaseInfo($Case_AutoId){
		$this->db->where('Case_AutoId', $Case_AutoId);
		$query = $this->db->get('tblcase'); 
		$data=$query->result_array();
		//echo "<pre>"; print_r($data); echo "AL:".count($data[0]);exit();
		return $data;
	}
	public function get_Case_AutoId_By_Quick($data){
		$this->db->select('Case_AutoId');
		if($data['SearchBy'] == "Case_Id"){	
			$this->db->order_by("Case_AutoId", "asc");
		}else{
			$this->db->order_by($data['SearchBy'], "asc");
		}
		$this->db->where($data['SearchBy']. " LIKE ", "%".$data['SearchValue']."%");
		$this->db->limit('1');
		$query = $this->db->get("tblcase");
		$Case_AutoId = $query->result_array();
		return $Case_AutoId[0]['Case_AutoId'];
	}
	
	
	public function get_CaseInfo_ById($Case_AutoId){
		
		$this->db->select('t1.*, DATE_FORMAT(t1.Accident_Date,"%m-%Y-%d") as Accident_DateNoTimr, t2.Provider_Name, t3.InsuranceCompany_Name, t4.Defendant_Name, t5.Adjuster_LastName, t5.Adjuster_FirstName, t5.Adjuster_Phone, t5.Adjuster_Phone_Ext, t6.Attorney_Name, t7.Court_Name' );
		$this->db->from('tblcase as t1');
		
		$this->db->join('tblprovider as t2', 't1.Provider_Id = t2.Provider_Id', 'LEFT');
		$this->db->join('tblinsurancecompany as t3', 't1.InsuranceCompany_Id = t3.InsuranceCompany_Id', 'LEFT');
		$this->db->join('tbldefendant as t4', 't1.Defendant_Id = t4.Defendant_id', 'LEFT');
		$this->db->join('tbladjusters as t5', 't1.Adjuster_Id = t5.Adjuster_Id', 'LEFT');
		$this->db->join('tblplaintiffattorney as t6', 't1.Plaintiff_Id = t6.Attorney_id', 'LEFT');
		$this->db->join('tblcourt as t7', 't1.Court_Id = t7.Court_Id', 'LEFT');
		$this->db->where('Case_AutoId',$Case_AutoId);
		$query= $this->db->get();
		$data=$query->result_array();
		//echo "<pre>"; print_r($data); exit();
		return $data;
	}
	/*public function Update_Document_Manager_Path($data){
		$this->db->set($data);
		$this->db->update("current_case", $data);
	}*/
	public function get_CaseInfo_ById2($Case_AutoId){
		
		$this->db->select('t1.*, DATE_FORMAT(t1.Accident_Date,"%m-%Y-%d") as Accident_DateNoTimr, t2.Provider_Name, t3.InsuranceCompany_Name, t4.Defendant_Name, t5.Adjuster_LastName, t5.Adjuster_FirstName, t6.Attorney_Name, t7.Court_Name' );
		$this->db->from('tblcase as t1');
		
		$this->db->join('tblprovider as t2', 't1.Provider_Id = t2.Provider_Id', 'LEFT');
		$this->db->join('tblinsurancecompany as t3', 't1.InsuranceCompany_Id = t3.InsuranceCompany_Id', 'LEFT');
		$this->db->join('tbldefendant as t4', 't1.Defendant_Id = t4.Defendant_id', 'LEFT');
		$this->db->join('tbladjusters as t5', 't1.Adjuster_Id = t5.Adjuster_Id', 'LEFT');
		$this->db->join('tblplaintiffattorney as t6', 't1.Plaintiff_Id = t6.Attorney_id', 'LEFT');
		$this->db->join('tblcourt as t7', 't1.Court_Id = t7.Court_Id', 'LEFT');
		$this->db->where('Case_AutoId',$Case_AutoId);
		$query= $this->db->get();
		$data=$query->result();
		//echo "<pre>"; print_r($data); exit();
		return $data;
	}
	public function get_SettlementQuickView($Case_Id){
		$this->db->select('t1.*, t2.*, t3.Provider_Name, t4.InsuranceCompany_Name' );
		
		$this->db->from('tblsettlements as t1');
		$this->db->join('tblcase as t2', 't2.Case_Id = t1.Case_Id');
		$this->db->join('tblprovider as t3', 't2.Provider_Id = t3.Provider_Id', 'LEFT');
		$this->db->join('tblinsurancecompany as t4', 't2.InsuranceCompany_Id = t4.InsuranceCompany_Id', 'LEFT');
		$this->db->where('t1.Case_Id',$Case_Id);
		$query= $this->db->get();
		$data=$query->result();
		//echo "<pre>"; print_r($data); exit();
		return $data;
	}
	public function getCurrent_Status($Case_AutoId){
		$this->db->select("Status");
		$this->db->from("tblcase");
		$this->db->where("Case_AutoId", $Case_AutoId);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}
	public function getPrivious_Value($Field_Name, $Case_Id){
		$this->db->select($Field_Name);
		$this->db->from('tblcase');
		$this->db->where("Case_Id", $Case_Id);
		$this->db->get();
	}
	public function get_Transactions($Case_Id){
		$this->db->select('t1.*,  t2.Provider_Name' );
		$this->db->from('tbltransactions as t1');
		$this->db->join('tblprovider as t2', 't1.Provider_Id = t2.Provider_Id', 'LEFT');
		$this->db->where('Case_Id',$Case_Id);
		$query= $this->db->get();
		$data=$query->result();
		//echo "<pre>"; print_r($data); exit();
		return $data;
	}
/* GET SETTLED BY INFO*/
	public function get_Settled_By($Case_Id){
		$this->db->where('Case_Id',$Case_Id);
		$query= $this->db->get("tblsettlements");
		$data=$query->result_array();
		return $data;
	}
	public function delete_Transactions($CheckedTransactions){
		foreach($CheckedTransactions as $row){
			$this->db->where("Transactions_Id", $row);
			//echo "ID: ".$row;
			$this->db->delete('tbltransactions');
		}
	}
	public function add_Transaction($data){
		$query = $this->db->insert('tbltransactions',$data); 
		if($query){
			return true;
		}else{
			return false;
		}
	}
/*UPDATE TREATEMENT RECORDS*/
	public function updateTreatement($data, $Treatment_Id){
		$this->db->set($data);
		$this->db->where("Treatment_Id", $Treatment_Id);
		$this->db->update("tbltreatment", $data);
	}
/*ADD TREATEMENT RECORDS*/
	public function addTreatement($data){
		$this->db->insert("tbltreatment", $data);
	}
/*Delete treatement*/
	public function delete_Treatement($data){
		foreach($data as $id){
			$this->db->where('Treatment_Id', $id);
			$this->db->delete('tbltreatment');
		}
	}
/*Update claim paid DOS start and end*/
	public function update_Claim_Paid_Dates($Case_Id, $data){
		if($data == ""){
			$this->db->order_by("Treatment_Id", "asc");
			$this->db->where("Case_Id", $Case_Id);
			$data = $this->db->get("tbltreatment");
			return $data->result();
		}else{
			$this->db->set($data);
			$this->db->where("Case_Id", $Case_Id);
			$this->db->update("tblcase", $data);
		}
	}
	public function get_Provider()
	{
		$this->db->order_by("Provider_Name", "asc");
		$query = $this->db->get('tblprovider'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_Provider_ById($Provider_Id){
		$this->db->order_by("Provider_Name", "asc");
		$this->db->where("Provider_Id", $Provider_Id);
		$query = $this->db->get('tblprovider'); 
		$data=$query->result();
		return $data;
	}
	public function get_Insurance()
	{
		$this->db->order_by("InsuranceCompany_Name", "asc");
		$query=$this->db->get('tblinsurancecompany');
		$data=$query->result_array();
		return $data;
	}
	public function get_Insurance_ById($InsuranceCompany_Id){
		$this->db->order_by("InsuranceCompany_Name", "asc");
		$this->db->where("InsuranceCompany_Id", $InsuranceCompany_Id);
		$query=$this->db->get('tblinsurancecompany');
		$data=$query->result();
		return $data;
	}
	public function get_StatusArray()
	{
		$this->db->order_by("Status_Type", "asc");
		$query = $this->db->get('tblstatus'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_CaseStatus()
	{
		$this->db->order_by("name", "asc");
		$query = $this->db->get('tblcasestatus'); 
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
	public function get_Defendant_ById($Defendant_id)
	{
		$this->db->order_by("Defendant_Name", "asc");
		$this->db->where("Defendant_id" ,$Defendant_id);
		$query=$this->db->get('tbldefendant');
		$data=$query->result();
		return $data;
	}
	public function get_ServiceArray()
	{
		$this->db->order_by("ServiceType", "asc");
		$query = $this->db->get('tblservicetype'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_SearchResult($userId, $RoleId)
	{
		$this->db->order_by("Case_AutoId","desc");
		$this->db->select('t1.*, t2.Provider_Name, t3.InsuranceCompany_Name, DATE_FORMAT(t1.Accident_Date,"%m-%d-%Y") as Accident_Date, DATE_FORMAT(t1.DateOfService_Start,"%m-%d-%Y") as DOS_S, DATE_FORMAT(t1.DateOfService_End,"%m-%d-%Y") as DOS_E');
		$this->db->from('tblcase as t1');
		if($RoleId == 2){
			$this->db->where("t2.UserId", $userId);
		}
		$this->db->join('tblprovider as t2', 't1.Provider_Id = t2.Provider_Id', 'LEFT');
		$this->db->join('tblinsurancecompany as t3', 't1.InsuranceCompany_Id = t3.InsuranceCompany_Id', 'LEFT');
		$query= $this->db->get();
		$data=$query->result();
		//echo "<pre>"; print_r($data); exit();
		return $data;
	}
	public function get_Adjuster()
	{
		$this->db->order_by("Adjuster_LastName", "asc");
		$query=$this->db->get('tbladjusters');
		$data=$query->result_array();
		return $data;
	}
	public function get_Adjuster_ById($Adjuster_Id)
	{
		$this->db->order_by("Adjuster_LastName", "asc");
		$this->db->where("Adjuster_Id", $Adjuster_Id);
		$query=$this->db->get('tbladjusters');
		$data=$query->result();
		return $data;
	}
	public function get_Adjuster_ById2($Adjuster_Id)
	{
		$this->db->order_by("Adjuster_FirstName", "asc");
		$this->db->where("Adjuster_Id", $Adjuster_Id);
		$query=$this->db->get('tbladjusters');
		$data=$query->result();
		return $data;
	}
	public function get_CourtArray()
	{
		$this->db->order_by("Court_Name", "asc");
		$query = $this->db->get('tblcourt'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_DenialReasonsArray()
	{
		$this->db->order_by("DenialReasons_Type", "asc");
		$query = $this->db->get('tbldenialreasons'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_Notes($Case_Id){
		$this->db->order_by("Notes_Date", "desc");
		$this->db->where('Case_Id', $Case_Id);
		$query = $this->db->get('tblnotes'); 
		$data=$query->result();
		//echo "<pre>"; print_r($data1); exit();
		return $data;
	}
	public function add_Notes($data){
		$this->db->insert("tblnotes", $data);
		return true;
	}
	public function update_CaseInfo($data, $Case_AutoId){
		$this->db->set($data);
		$this->db->where("Case_AutoId", $Case_AutoId);
		$query = $this->db->update("tblcase", $data);
		if($query){
			return true;
		}else{
			return false;
		}
	
	}
	public function delete_Notes($data){
		foreach($data as $id){
			$this->db->where('Notes_ID', $id);
			$this->db->delete('tblnotes');
		}
	}
	public function get_CaseInfo_ById1($Recieveddata, $userId, $RoleId){
		$this->db->order_by("Case_Id","dsc");
		$this->db->select('t1.*, t2.Provider_Name, t3.InsuranceCompany_Name, DATE_FORMAT(t1.Accident_Date,"%m-%d-%Y") as Accident_Date');
		$this->db->from('tblcase as t1');
		if($RoleId == 2){
			$this->db->where("t2.UserId", $userId);
		}
		$this->db->join('tblprovider as t2', 't1.Provider_Id = t2.Provider_Id', 'LEFT');
		$this->db->join('tblinsurancecompany as t3', 't1.InsuranceCompany_Id = t3.InsuranceCompany_Id', 'LEFT');
		if($Recieveddata['Case_Id'] !=""){
			//$this->db->where('t1.Case_Id', $Recieveddata['Case_Id']);
			$this->db->where("t1.Case_Id LIKE '".$Recieveddata['Case_Id']."%'");
		}
		if($Recieveddata['InjuredParty_LastName'] !=""){
			$this->db->where("t1.InjuredParty_LastName LIKE '".$Recieveddata['InjuredParty_LastName']."%'");
			//$this->db->where('t1.InjuredParty_LastName', $Recieveddata['InjuredParty_LastName']);
		}
		if($Recieveddata['InjuredParty_FirstName'] !=""){
			$this->db->where("t1.InjuredParty_FirstName LIKE '".$Recieveddata['InjuredParty_FirstName']."%'");
			//$this->db->where('t1.InjuredParty_FirstName', $Recieveddata['InjuredParty_FirstName']);
		}
		if($Recieveddata['InsuredParty_LastName'] !=""){
			$this->db->where("t1.InsuredParty_LastName LIKE '".$Recieveddata['InsuredParty_LastName']."%'");
			//$this->db->where('t1.InsuredParty_LastName', $Recieveddata['InsuredParty_LastName']);
		}
		if($Recieveddata['InsuredParty_FirstName'] !=""){
			$this->db->where("t1.InsuredParty_FirstName LIKE '".$Recieveddata['InsuredParty_FirstName']."%'");
			//$this->db->where('t1.InsuredParty_FirstName', $Recieveddata['InsuredParty_FirstName']);
		}
		if($Recieveddata['Policy_Number'] !=""){
			$this->db->where("t1.Policy_Number LIKE '".$Recieveddata['Policy_Number']."%'");
			//$this->db->where('t1.Policy_Number', $Recieveddata['Policy_Number']);
		}
		if($Recieveddata['Ins_Claim_Number'] !=""){
			$this->db->where("t1.Ins_Claim_Number LIKE '".$Recieveddata['Ins_Claim_Number']."%'");
			//$this->db->where('t1.Ins_Claim_Number', $Recieveddata['Ins_Claim_Number']);
		}
		if($Recieveddata['IndexOrAAA_Number'] !=""){
			$this->db->where("t1.IndexOrAAA_Number LIKE '".$Recieveddata['IndexOrAAA_Number']."%");
			//$this->db->where('t1.IndexOrAAA_Number', $Recieveddata['IndexOrAAA_Number']);
		}
		if($Recieveddata['Status'] !=""){
			$this->db->where('t1.Status', $Recieveddata['Status']);
		}
		if($Recieveddata['InsuranceCompany_Id'] !=""){
			$this->db->where('t1.InsuranceCompany_Id', $Recieveddata['InsuranceCompany_Id']);
		}
		if($Recieveddata['Court_Id'] !=""){
			$this->db->where('t1.Court_Id', $Recieveddata['Court_Id']);
		}
		if($Recieveddata['Initial_Status'] !=""){
			$this->db->where('t1.Initial_Status', $Recieveddata['Initial_Status']);
		}
		if($Recieveddata['Provider_Id'] !=""){
			$this->db->where('t1.Provider_Id', $Recieveddata['Provider_Id']);
		}
		if($Recieveddata['Defendant_Id'] !=""){
			$this->db->where('t1.Defendant_Id', $Recieveddata['Defendant_Id']);
		}
		if($Recieveddata['Adjuster_Id'] !=""){
			$this->db->where('t1.Adjuster_Id', $Recieveddata['Adjuster_Id']);
		}
		if($Recieveddata['AccidentDate'] !=""){
			$this->db->where("t1.Accident_Date LIKE '".$Recieveddata['AccidentDate']."%'");
		}
		if($Recieveddata['FirstId'] !="" && 'LastId' !=""){
			$this->db->where('t1.Case_Id >=', $Recieveddata['FirstId']);
			$this->db->where('t1.Case_Id <=', $Recieveddata['LastId']);
		}
		
		$query= $this->db->get();
		$data=$query->result();
		//echo "<pre>"; print_r($data); exit();
		return $data;
	}
	public function Update_NotesInfo($data){
		$this->db->set($data);
		$this->db->where("Notes_ID", $data["Notes_ID"]);
		$this->db->update("tblnotes");
	}
	public function AdjusterInsurance(){
		$this->db->order_by('t1.Adjuster_LastName');
		$this->db->select('t1.*, t2.*');
		$this->db->from('tbladjusters as t1');
		$this->db->join('tblinsurancecompany as t2', 't1.InsuranceCompany_Id = t2.InsuranceCompany_Id', 'LEFT');
		$query= $this->db->get();
		$data=$query->result_array();
		//echo "<pre>"; print_r($data); exit();
		return $data;
	}
	public function Transanction_Info(){
		$this->db->order_by("Transactions_Type", "asc");
		$query = $this->db->get("tbltransactions");
		$data = $query->result_array();
		return $data;
	}
	public function get_Events($Case_Id){
		$this->db->order_by("t1.Case_Id","asc");
		$this->db->select('t1.Case_Id, t2.Event_id, t3.EventTypeName, t4.EventStatusName, t2.Event_Date, t2.Event_Time, t2.Event_Notes, t2.Assigned_To, t5.Provider_Name, t1.InjuredParty_LastName, t1.InjuredParty_FirstName, t6.Court_Name, t1.IndexOrAAA_Number, t7.Defendant_Name, t8.InsuranceCompany_Name, t2.EventTypeId, t2.EventStatusId');
		$this->db->from('tblcase as t1');
		$this->db->join('tblevent as t2', 't1.Case_Id = t2.Case_id', "LEFT");
		$this->db->join('tbleventtype as t3', 't2.EventTypeId = t3.EventTypeId', "LEFT");
		$this->db->join('tbleventstatus as t4', 't2.EventStatusId = t4.EventStatusId', "LEFT");
		$this->db->join('tblprovider as t5', 't1.Provider_Id = t5.Provider_Id', "LEFT");
		$this->db->join('tblcourt as t6', 't1.Court_Id = t6.Court_Id', "LEFT");
		$this->db->join('tbldefendant as t7', 't1.Defendant_Id = t7.Defendant_id', "LEFT");
		$this->db->join('tblinsurancecompany as t8', 't1.InsuranceCompany_Id = t8.InsuranceCompany_Id', "LEFT");
		$this->db->where("t1.Case_Id", $Case_Id);
		$query= $this->db->get();
		$data=$query->result();
		return $data;
	}
	public function delete_Events($CheckedEvents){
		foreach($CheckedEvents as $row){
			$this->db->where("Event_id", $row);
			$this->db->delete('tblevent');
		}
	}
	public function update_Event_Info($data){
		if($data['Event_id'] == ""){
			unset($data['Event_id']);
			$this->db->insert("tblevent", $data);
		}else{
			$this->db->set($data);
			$this->db->where("Event_id", $data['Event_id']);
			$this->db->update("tblevent");
		}
	}
	

/*UPDATE SETTLEMENT*/
	public function updateSettlement($data1, $Case_Id){
		$this->db->where("Case_Id", $Case_Id);
		$data=$this->db->get('tblsettlements');
		$rows = $data->num_rows();
		if($rows == 1){ 
			$this->db->set($data1);
			$this->db->where("Case_Id", $Case_Id);
			$this->db->update("tblsettlements", $data1); 
		}else { 
			$data1['Case_Id'] = $Case_Id;
			$this->db->insert("tblsettlements", $data1);
		}
		$status_to_paid = array(
			"Status" => "PAID"
		);
		$this->db->set($status_to_paid);
		$this->db->where("Case_Id", $Case_Id);
		$this->db->update("tblcase", $status_to_paid);
	}
/* Reset Settlement Make case status from PAID to OPEN*/
	public function resetSettlement($Case_AutoId){
		$status_to_open = array(
			"Status" => "OPEN "
		);
		$this->db->set($status_to_open);
		$this->db->where("Case_AutoId", $Case_AutoId);
		$this->db->update("tblcase", $status_to_open);
	}
/* Get Treatments*/
	public function get_Treatment($Case_Id){
		$this->db->where("Case_Id", $Case_Id);
		$data = $this->db->get("tbltreatment");
		return $data->result();
	}
/* GET USERS LIST*/
	public function get_User_List(){
		$query = $this->db->get("issuetracker_users");
		return $query->result_array();
	}
/* GET MOTION DATA*/
	public function getMotion_Data($Case_Id){
		$this->db->where("Case_ID", $Case_Id);
		$query = $this->db->get("tblmotions");
		return $query->result();
	}
/*ADD MOTION DATA*/
	public function addMotion_Info_form($data){
		$this->db->insert("tblmotions", $data);
	}
/*DELETE motion*/
	public function deleteMotion($CheckedMotion){
		foreach($CheckedMotion as $row){
			$this->db->where("Motion_ID", $row);
			$this->db->delete('tblmotions');
		}
	}
/* GET TRIALS DATA*/
	public function getTrials_Data($Case_Id){
		$this->db->where("CASE_ID", $Case_Id);
		$query = $this->db->get("tbltrials");
		return $query->result();
	}
/*ADD TRIALS DATA*/
	public function addTrials_Info_form($data){
		$this->db->insert("tbltrials", $data);
	}
/*DELETE TRIALS*/
	public function deleteTrials($CheckedTrials){
		foreach($CheckedTrials as $row){
			$this->db->where("Trial_ID", $row);
			$this->db->delete('tbltrials');
		}
	}
}
?>