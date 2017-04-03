<?php
Class Dataentry_model extends CI_Model{
	
	Public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
/* ************************************  Start of Addcase  *************************************************************************/
	public function insert_CaseInfo($data)
	{
		$this->db->order_by("Case_AutoId", "desc");
		$this->db->select("Case_AutoId, Case_Id");
		$this->db->limit('1');
		$query1 = $this->db->get("tblcase");
		$Case_AutoId = $query1->result_array();
		$Case_AutoId1 = $Case_AutoId[0]['Case_AutoId'];
		$data1 = $data;
		$data["Case_Id"] = "AR16-".($Case_AutoId1+1);
		$data["Case_Id"] = "AR".substr(date("Y"), 2, 2)."-".($Case_AutoId1+1);
		
		$query = $this->db->insert('tblcase',$data); 
		$Inserted_Case_Id = $this->get_Last_Case_Id();
		
		$Folder_Name = array("BILLS", "AOB", "DENIALS", "SUMMONS-AND-COMPLAINT", "AFF-OF-SERVICE", "PAYMENTS", "SETTLEMENT-DOCS", "ANSWER", "THEIR-DEMANDS", "POM", "INDEX NUMBER", "DELAY LETTER", "PROVIDERS DOCUMENTS", "CORRESPONDENCE", "ACKNOWLEDGEMENT", "PEER REVIEW", "POLICE REPORT", "CERTIFICATE OF INCORPORATION", "LICENSES", "ANSWER DEMANDS", "AFF IN OPPOSITION", "EBT", "DISCOVERY CONFERENCE", "DEF SUPPLEMENTAL DEMANDS", "CONSENT TO CHANGE ATTORNEY", "PEER REVIEW", "IME", "OUR DEMANDS", "OUR DISCOVERY RESPONSES", "VERIFICATION REQUEST", "VERIFIED ANSWER", "UNCATEGORIZED", "Bills", "Bills", "Saved Letters", "Packet Exhibits", "Packet Document", "OUR MOTIONS", "ARBITRATIONS"
		);
		
		
		if (!file_exists('Cases/'.$Inserted_Case_Id)) {
			mkdir('Cases/'.$Inserted_Case_Id);
			foreach($Folder_Name as $row){
				mkdir('Cases/'.$Inserted_Case_Id."/".$row);
			}
		}
		return true;
	}
	public function get_Last_Case_Id()
	{
		$this->db->order_by("Case_AutoId", "desc");
		$this->db->select("Case_Id");
		$this->db->limit('1');
		$query = $this->db->get("tblcase");
		$Case_Id = $query->result_array();
		$Case_Id1 = $Case_Id[0]['Case_Id'];
		return $Case_Id1;
	}
/*add Settlement*/
	public function addSettlement($data){
		$this->db->order_by("Case_AutoId", "desc");
		$this->db->select("Case_Id");
		$this->db->limit('1');
		$query1 = $this->db->get("tblcase");
		$Case_Id = $query1->result_array();
		$Case_Id1 = $Case_Id[0]['Case_Id'];
		$data["Case_Id"] = $Case_Id1;
		$this->db->insert("tblsettlements", $data);
		return $Case_Id1;
	}
	public function Update_CaseInfo($data, $Case_AutoId){
		$this->db->set($data);
		$this->db->where("Case_AutoId", $Case_AutoId);
		$query = $this->db->update("tblcase",$data);
		return $query;
	}
	public function insert_Claim_Paid_Dates($data, $Case_Id){
		$this->db->set($data);
		$this->db->where("Case_Id", $Case_Id);
		$query = $this->db->update("tblcase",$data);
		return $query;
	}
	public function get_CaseInfo($Case_AutoId){
		$this->db->where('Case_AutoId', $Case_AutoId);
		$query = $this->db->get('tblcase'); 
		$data=$query->result_array();
		//echo "<pre>"; print_r($data); exit();
		return $data;
	}

/* ************************************  Start of Provider  *************************************************************************/	
	public function get_Provider()
	{
		$this->db->order_by("Provider_Name", "asc");
		$query = $this->db->get('tblprovider'); 
		$data=$query->result_array();
		return $data;
	}
	public function insert_ProviderInfo($data)
	{
		$query = $this->db->insert('tblprovider',$data); 
		return $query;
	}
	public function edit_ProviderById($providerId)
	{
		$this->db->where('Provider_Id',$providerId['Provider_Id']);
		$query = $this->db->get('tblprovider'); 
		$data=$query->result_array();
		return $data;
	}
	public function update_ProviderInfo($data)
	{
		$this->db->set($data); 
		$this->db->where("Provider_Id", $data['Provider_Id']); 
		$query = $this->db->update("tblprovider", $data);
		return $query;
	}
	
/* ************************************  Start of Insurance  *************************************************************************/
	public function get_Insurance()
	{
		$this->db->order_by("InsuranceCompany_Name", "asc");
		$query=$this->db->get('tblinsurancecompany');
		$data=$query->result_array();
		return $data;
	}
	public function insert_InsuranceInfo($data)
	{
		$this->db->order_by("InsuranceCompany_Id", "asc");
		$query = $this->db->insert('tblinsurancecompany',$data); 
		return $query;
	}
	public function edit_InsuranceById($insuranceId)
	{
		$this->db->where('InsuranceCompany_Id',$insuranceId['InsuranceCompany_Id']);
		$query = $this->db->get('tblinsurancecompany'); 
		$data=$query->result_array();
		return $data;
	}
	public function update_InsuranceInfo($data)
	{
		$this->db->set($data); 
		$this->db->where("InsuranceCompany_Id", $data['InsuranceCompany_Id']); 
		$query = $this->db->update("tblinsurancecompany", $data);
		return $query;
	}
	
/* ************************************  Start of Defendant  *************************************************************************/	
	public function get_Defendant()
	{
		$this->db->order_by("Defendant_Name", "asc");
		$query=$this->db->get('tbldefendant');
		$data=$query->result_array();
		return $data;
	}
	public function insert_DefendantInfo($data)
	{
		$query = $this->db->insert('tbldefendant',$data); 
		return $query;
	}
	public function edit_DefendantById($defendantId)
	{
		$this->db->where('Defendant_id',$defendantId['Defendant_id']);
		$query = $this->db->get('tbldefendant'); 
		$data=$query->result_array();
		return $data;
	}
	public function update_DefendantInfo($data)
	{
		$this->db->set($data); 
		$this->db->where("Defendant_id", $data['Defendant_id']); 
		$query = $this->db->update("tbldefendant", $data);
		return $query;
	}
	
/* ************************************  Start of Adjuster  *************************************************************************/
	public function get_Adjuster()
	{
		$this->db->order_by("Adjuster_LastName", "asc");
		$query=$this->db->get('tbladjusters');
		$data=$query->result_array();
		return $data;
	}
	public function get_Adjuster_Objects()
	{
		$this->db->select("t1.*, t2.InsuranceCompany_Name");
		$this->db->from("tbladjusters as t1");
		$this->db->join("tblinsurancecompany as t2", "t1.InsuranceCompany_Id = t2.InsuranceCompany_Id");
		$this->db->order_by("t1.Adjuster_FirstName", "asc");
		$query=$this->db->get();
		$data=$query->result();
		return $data;
	}
	public function get_Adjuster_FirstName()
	{
		$this->db->order_by("Adjuster_FirstName", "asc");
		$query=$this->db->get('tbladjusters');
		$data=$query->result_array();
		return $data;
	}
	public function insert_AdjusterInfo($data)
	{
		$query = $this->db->insert('tbladjusters',$data); 
		return $query;
	}
	public function edit_AdjusterById($defendantId)
	{
		$this->db->where('Adjuster_Id',$defendantId['Adjuster_Id']);
		$query = $this->db->get('tbladjusters'); 
		$data=$query->result_array();
		return $data;
	}
	public function update_AdjusterInfo($data)
	{
		$this->db->set($data); 
		$this->db->where("Adjuster_Id", $data['Adjuster_Id']); 
		$query = $this->db->update("tbladjusters", $data);
		return $query;
	}
	
/* ************************************  Start of Attorney  *************************************************************************/
	public function get_Attorney()
	{
		$this->db->order_by("Attorney_LastName", "asc");
		$query=$this->db->get('tblattorney');
		$data=$query->result_array();
		return $data;
	}
	public function insert_AttorneyInfo($data)
	{
		$query = $this->db->insert('tblattorney',$data); 
		/*if($query){
			echo "succcssss";
		}*/
		return $query;
	}
	public function edit_AttorneyById($attorneyId)
	{
		$this->db->where('Attorney_Id',$attorneyId['Attorney_Id']);
		$query = $this->db->get('tblattorney'); 
		$data=$query->result_array();
		return $data;
	}
	public function update_AttorneyInfo($data)
	{
		$this->db->set($data); 
		$this->db->where("Attorney_Id", $data['Attorney_Id']); 
		$query = $this->db->update("tblattorney", $data);
		return $query;
	}
	
/* ************************************  Start of Plantiff  *************************************************************************/	
	public function get_Plantiff()
	{
		$this->db->order_by("Attorney_Name", "asc");
		$query=$this->db->get('tblplaintiffattorney');
		$data=$query->result_array();
		return $data;
	}
	public function insert_PlantiffInfo($data)
	{
		$query = $this->db->insert('tblplaintiffattorney',$data); 
		return $query;
	}
	public function edit_PlantiffById($plantiffId)
	{
		$this->db->where('Attorney_id',$plantiffId['Attorney_id']);
		$query = $this->db->get('tblplaintiffattorney'); 
		$data=$query->result_array();
		return $data;
	}
	public function update_PlantiffInfo($data)
	{
		$this->db->set($data); 
		$this->db->where("Attorney_id", $data['Attorney_id']); 
		$query = $this->db->update("tblplaintiffattorney", $data);
		return $query;
	}

	
/* ************************************  Start of Otherentries  *************************************************************************/		
	public function get_DenialReasons()
	{
		$this->db->order_by("DenialReasons_Type", "asc");
		$query = $this->db->get('tbldenialreasons'); 
		$data=$query->result();
		return $data;
	}
	public function get_DenialReasonsArray()
	{
		$this->db->order_by("DenialReasons_Type", "asc");
		$query = $this->db->get('tbldenialreasons'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_CourtArray()
	{
		$this->db->order_by("Court_Name", "asc");
		$query = $this->db->get('tblcourt'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_Court()
	{
		$this->db->order_by("Court_Name", "asc");
		$query = $this->db->get('tblcourt'); 
		$data=$query->result();
		return $data;
	}
	public function get_ImageType()
	{
		$this->db->order_by("Image_Type", "asc");
		$query = $this->db->get('tblimagetypes'); 
		$data=$query->result();
		return $data;
	}
	public function get_Status()
	{
		$this->db->order_by("Status_Type", "asc");
		$query = $this->db->get('tblstatus'); 
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
		$data=$query->result();
		return $data;
	}
	public function get_Doc()
	{
		$this->db->order_by("Doc_Name", "asc");
		$query = $this->db->get('tbldocs'); 
		$data=$query->result();
		return $data;
	}
	public function get_Service()
	{
		$this->db->order_by("ServiceType", "asc");
		$query = $this->db->get('tblservicetype'); 
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
	
	public function get_EventType()
	{
		$this->db->order_by("EventTypeName", "asc");
		$query = $this->db->get('tbleventtype'); 
		$data=$query->result();
		return $data;
	}
	public function get_EventStatus()
	{
		$this->db->order_by("EventStatusName", "asc");
		$query = $this->db->get('tbleventstatus'); 
		$data=$query->result();
		return $data;
	}
	public function get_EventTypeArray()
	{
		$this->db->order_by("EventTypeName", "asc");
		$query = $this->db->get('tbleventtype'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_EventStatusArray()
	{
		$this->db->order_by("EventStatusName", "asc");
		$query = $this->db->get('tbleventstatus'); 
		$data=$query->result_array();
		return $data;
	}
	public function deleteRecords($data,$tabIdentity)
	{
		if($tabIdentity == 1){
			foreach($data as $id){
				$this->db->where('DenialReasons_Id', $id);
				$this->db->delete('tbldenialreasons');
			} 
			return true;
		}else if($tabIdentity == 2){
			foreach($data as $id){
				$this->db->where('Court_Id', $id);
				$this->db->delete('tblcourt');
			} 
			return true;
		}else if($tabIdentity == 3){
			foreach($data as $id){
				$this->db->where('Image_Id', $id);
				$this->db->delete('tblimagetypes');
			} 
			return true;
		}else if($tabIdentity == 4){
			foreach($data as $id){
				$this->db->where('Status_Id', $id);
				$this->db->delete('tblstatus');
			} 
			return true;
		}else if($tabIdentity == 5){
			foreach($data as $id){
				$this->db->where('id', $id);
				$this->db->delete('tblcasestatus');
			} 
			return true;
		}else if($tabIdentity == 6){
			foreach($data as $id){
				$this->db->where('Doc_Id', $id);
				$this->db->delete('tbldocs');
			} 
			return true;
		}else if($tabIdentity == 7){
			foreach($data as $id){
				$this->db->where('ServiceType_ID', $id);
				$this->db->delete('tblservicetype');
			} 
			return true;
		}else if($tabIdentity == 8){
			foreach($data as $id){
				$this->db->where('EventTypeId', $id);
				$this->db->delete('tbleventtype');
			} 
			return true;
		}else if($tabIdentity == 9){
			foreach($data as $id){
				$this->db->where('EventStatusId', $id);
				$this->db->delete('tbleventstatus');
			} 
			return true;
		}else{
			return false;
		}
	}
/* *******************************************************************************************************************************************/	
	
	
	public function get_States()
	{
		$this->db->order_by("State_Name", "asc");
		$query = $this->db->get('tblstates'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_City_Zip_Country()
	{
		$query = $this->db->get('ziplist'); 
		$data=$query->result();
		return $data;
	}
	
	public function Add_OtherEntries($data,$tabIdentityData)
	{
		if($tabIdentityData['tabIdentity'] == 1){
			$query = $this->db->insert('tbldenialreasons',$data); 
			return $query;
		}else if($tabIdentityData['tabIdentity'] == 2){
			$query = $this->db->insert('tblcourt',$data); 
			return $query;
		}else if($tabIdentityData['tabIdentity'] == 3){
			$query = $this->db->insert('tblimagetypes',$data); 
			return $query;
		}else if($tabIdentityData['tabIdentity'] == 4){
			$query = $this->db->insert('tblstatus',$data); 
			return $query;
		}else if($tabIdentityData['tabIdentity'] == 5){
			$query = $this->db->insert('tblcasestatus',$data); 
			return $query;
		}else if($tabIdentityData['tabIdentity'] == 6){
			$query = $this->db->insert('tbldocs',$data); 
			return $query;
		}else if($tabIdentityData['tabIdentity'] == 7){
			$query = $this->db->insert('tblservicetype',$data); 
			return $query;
		}else if($tabIdentityData['tabIdentity'] == 8){
			$query = $this->db->insert('tbleventtype',$data); 
			return $query;
		}else if($tabIdentityData['tabIdentity'] == 9){
			$query = $this->db->insert('tbleventstatus',$data); 
			return $query;
		}
	}
	public function Update_OtherEntries($data,$tabIdentityData)
	{
		if($tabIdentityData['tabIdentity'] == 1){
			$this->db->set($data); 
			$this->db->where("DenialReasons_Id", $data['DenialReasons_Id']); 
			$query = $this->db->update("tbldenialreasons", $data);
		}else if($tabIdentityData['tabIdentity'] == 2){
			$this->db->set($data); 
			$this->db->where("Court_Id", $data['Court_Id']); 
			$query = $this->db->update("tblcourt", $data);
		}else if($tabIdentityData['tabIdentity'] == 3){
			$this->db->set($data); 
			$this->db->where("Image_Id", $data['Image_Id']); 
			$query = $this->db->update("tblimagetypes", $data);
		}else if($tabIdentityData['tabIdentity'] == 4){
			$this->db->set($data); 
			$this->db->where("Status_Id", $data['Status_Id']); 
			$query = $this->db->update("tblstatus", $data);
		}else if($tabIdentityData['tabIdentity'] == 5){
			$this->db->set($data); 
			$this->db->where("id", $data['id']); 
			$query = $this->db->update("tblcasestatus", $data);
		}else if($tabIdentityData['tabIdentity'] == 6){
			$this->db->set($data); 
			$this->db->where("Doc_Id", $data['Doc_Id']); 
			$query = $this->db->update("tbldocs", $data);
		}else if($tabIdentityData['tabIdentity'] == 7){
			$this->db->set($data); 
			$this->db->where("ServiceType_ID", $data['ServiceType_ID']); 
			$query = $this->db->update("tblservicetype", $data);
		}else if($tabIdentityData['tabIdentity'] == 8){
			$this->db->set($data); 
			$this->db->where("EventTypeId", $data['EventTypeId']); 
			$query = $this->db->update("tbleventtype", $data);
		}else if($tabIdentityData['tabIdentity'] == 9){
			$this->db->set($data); 
			$this->db->where("EventStatusId", $data['EventStatusId']); 
			$query = $this->db->update("tbleventstatus", $data);
		}
		
		return $query;
	}
	public function delete_Master_Records($Column_Name, $Table_Name, $Id){
		$this->db->where($Column_Name, $Id);
		$this->db->delete($Table_Name);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

}
?>