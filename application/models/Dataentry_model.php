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
		$this->db->select("Case_AutoId");
		$this->db->limit('1');
		$query1 = $this->db->get("dbo_tblcase");
		$Case_AutoId = $query1->result_array();
		$Case_AutoId1 = $Case_AutoId[0]['Case_AutoId'];
		$data1 = $data;
		$data["Case_Id"] = "AR16-".($Case_AutoId1+1);
		
		$query = $this->db->insert('dbo_tblcase',$data); 
		return true;
	}
	public function Update_CaseInfo($data, $Case_AutoId){
		$this->db->set($data);
		$this->db->where("Case_AutoId", $Case_AutoId);
		$query = $this->db->update("dbo_tblcase",$data);
		return $query;
	}
	public function get_CaseInfo($Case_AutoId){
		$this->db->where('Case_AutoId', $Case_AutoId);
		$query = $this->db->get('dbo_tblcase'); 
		$data=$query->result_array();
		//echo "<pre>"; print_r($data); exit();
		return $data;
	}

/* ************************************  Start of Provider  *************************************************************************/	
	public function get_Provider()
	{
		$this->db->order_by("Provider_Name", "asc");
		$query = $this->db->get('dbo_tblprovider'); 
		$data=$query->result_array();
		return $data;
	}
	public function insert_ProviderInfo($data)
	{
		$query = $this->db->insert('dbo_tblprovider',$data); 
		return $query;
	}
	public function edit_ProviderById($providerId)
	{
		$this->db->where('Provider_Id',$providerId['Provider_Id']);
		$query = $this->db->get('dbo_tblprovider'); 
		$data=$query->result_array();
		return $data;
	}
	public function update_ProviderInfo($data)
	{
		$this->db->set($data); 
		$this->db->where("Provider_Id", $data['Provider_Id']); 
		$query = $this->db->update("dbo_tblprovider", $data);
		return $query;
	}
	
/* ************************************  Start of Insurance  *************************************************************************/
	public function get_Insurance()
	{
		$this->db->order_by("InsuranceCompany_Name", "asc");
		$query=$this->db->get('dbo_tblinsurancecompany');
		$data=$query->result_array();
		return $data;
	}
	public function insert_InsuranceInfo($data)
	{
		$this->db->order_by("InsuranceCompany_Id", "asc");
		$query = $this->db->insert('dbo_tblinsurancecompany',$data); 
		return $query;
	}
	public function edit_InsuranceById($insuranceId)
	{
		$this->db->where('InsuranceCompany_Id',$insuranceId['InsuranceCompany_Id']);
		$query = $this->db->get('dbo_tblinsurancecompany'); 
		$data=$query->result_array();
		return $data;
	}
	public function update_InsuranceInfo($data)
	{
		$this->db->set($data); 
		$this->db->where("InsuranceCompany_Id", $data['InsuranceCompany_Id']); 
		$query = $this->db->update("dbo_tblinsurancecompany", $data);
		return $query;
	}
	
/* ************************************  Start of Defendant  *************************************************************************/	
	public function get_Defendant()
	{
		$this->db->order_by("Defendant_Name", "asc");
		$query=$this->db->get('dbo_tbldefendant');
		$data=$query->result_array();
		return $data;
	}
	public function insert_DefendantInfo($data)
	{
		$query = $this->db->insert('dbo_tbldefendant',$data); 
		return $query;
	}
	public function edit_DefendantById($defendantId)
	{
		$this->db->where('Defendant_id',$defendantId['Defendant_id']);
		$query = $this->db->get('dbo_tbldefendant'); 
		$data=$query->result_array();
		return $data;
	}
	public function update_DefendantInfo($data)
	{
		$this->db->set($data); 
		$this->db->where("Defendant_id", $data['Defendant_id']); 
		$query = $this->db->update("dbo_tbldefendant", $data);
		return $query;
	}
	
/* ************************************  Start of Adjuster  *************************************************************************/
	public function get_Adjuster()
	{
		$this->db->order_by("Adjuster_LastName", "asc");
		$query=$this->db->get('dbo_tbladjusters');
		$data=$query->result_array();
		return $data;
	}
	public function insert_AdjusterInfo($data)
	{
		$query = $this->db->insert('dbo_tbladjusters',$data); 
		return $query;
	}
	public function edit_AdjusterById($defendantId)
	{
		$this->db->where('Adjuster_Id',$defendantId['Adjuster_Id']);
		$query = $this->db->get('dbo_tbladjusters'); 
		$data=$query->result_array();
		return $data;
	}
	public function update_AdjusterInfo($data)
	{
		$this->db->set($data); 
		$this->db->where("Adjuster_Id", $data['Adjuster_Id']); 
		$query = $this->db->update("dbo_tbladjusters", $data);
		return $query;
	}
	
/* ************************************  Start of Attorney  *************************************************************************/
	public function get_Attorney()
	{
		$this->db->order_by("Attorney_LastName", "asc");
		$query=$this->db->get('dbo_tblattorney');
		$data=$query->result_array();
		return $data;
	}
	public function insert_AttorneyInfo($data)
	{
		$query = $this->db->insert('dbo_tblattorney',$data); 
		/*if($query){
			echo "succcssss";
		}*/
		return $query;
	}
	public function edit_AttorneyById($attorneyId)
	{
		$this->db->where('Attorney_Id',$attorneyId['Attorney_Id']);
		$query = $this->db->get('dbo_tblattorney'); 
		$data=$query->result_array();
		return $data;
	}
	public function update_AttorneyInfo($data)
	{
		$this->db->set($data); 
		$this->db->where("Attorney_Id", $data['Attorney_Id']); 
		$query = $this->db->update("dbo_tblattorney", $data);
		return $query;
	}
	
/* ************************************  Start of Plantiff  *************************************************************************/	
	public function get_Plantiff()
	{
		$this->db->order_by("Attorney_Name", "asc");
		$query=$this->db->get('dbo_tblplaintiffattorney');
		$data=$query->result_array();
		return $data;
	}
	public function insert_PlantiffInfo($data)
	{
		$query = $this->db->insert('dbo_tblplaintiffattorney',$data); 
		return $query;
	}
	public function edit_PlantiffById($plantiffId)
	{
		$this->db->where('Attorney_id',$plantiffId['Attorney_id']);
		$query = $this->db->get('dbo_tblplaintiffattorney'); 
		$data=$query->result_array();
		return $data;
	}
	public function update_PlantiffInfo($data)
	{
		$this->db->set($data); 
		$this->db->where("Attorney_id", $data['Attorney_id']); 
		$query = $this->db->update("dbo_tblplaintiffattorney", $data);
		return $query;
	}

	
/* ************************************  Start of Otherentries  *************************************************************************/		
	public function get_DenialReasons()
	{
		$this->db->order_by("DenialReasons_Type", "asc");
		$query = $this->db->get('dbo_tbldenialreasons'); 
		$data=$query->result();
		return $data;
	}
	public function get_DenialReasonsArray()
	{
		$this->db->order_by("DenialReasons_Type", "asc");
		$query = $this->db->get('dbo_tbldenialreasons'); 
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
	public function get_Court()
	{
		$this->db->order_by("Court_Name", "asc");
		$query = $this->db->get('dbo_tblcourt'); 
		$data=$query->result();
		return $data;
	}
	public function get_ImageType()
	{
		$this->db->order_by("Image_Type", "asc");
		$query = $this->db->get('dbo_tblimagetypes'); 
		$data=$query->result();
		return $data;
	}
	public function get_Status()
	{
		$this->db->order_by("Status_Type", "asc");
		$query = $this->db->get('dbo_tblstatus'); 
		$data=$query->result();
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
		$data=$query->result();
		return $data;
	}
	public function get_Doc()
	{
		$this->db->order_by("Doc_Name", "asc");
		$query = $this->db->get('dbo_tbldocs'); 
		$data=$query->result();
		return $data;
	}
	public function get_Service()
	{
		$this->db->order_by("ServiceType", "asc");
		$query = $this->db->get('dbo_tblservicetype'); 
		$data=$query->result();
		return $data;
	}
	public function get_ServiceArray()
	{
		$this->db->order_by("ServiceType", "asc");
		$query = $this->db->get('dbo_tblservicetype'); 
		$data=$query->result_array();
		return $data;
	}
	
	public function get_EventType()
	{
		$this->db->order_by("EventTypeName", "asc");
		$query = $this->db->get('dbo_tbleventtype'); 
		$data=$query->result();
		return $data;
	}
	public function get_EventStatus()
	{
		$this->db->order_by("EventStatusName", "asc");
		$query = $this->db->get('dbo_tbleventstatus'); 
		$data=$query->result();
		return $data;
	}
	public function get_EventTypeArray()
	{
		$this->db->order_by("EventTypeName", "asc");
		$query = $this->db->get('dbo_tbleventtype'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_EventStatusArray()
	{
		$this->db->order_by("EventStatusName", "asc");
		$query = $this->db->get('dbo_tbleventstatus'); 
		$data=$query->result_array();
		return $data;
	}
	public function deleteRecords($data,$tabIdentity)
	{
		if($tabIdentity == 1){
			foreach($data as $id){
				$this->db->where('DenialReasons_Id', $id);
				$this->db->delete('dbo_tbldenialreasons');
			} 
			return true;
		}else if($tabIdentity == 2){
			foreach($data as $id){
				$this->db->where('Court_Id', $id);
				$this->db->delete('dbo_tblcourt');
			} 
			return true;
		}else if($tabIdentity == 3){
			foreach($data as $id){
				$this->db->where('Image_Id', $id);
				$this->db->delete('dbo_tblimagetypes');
			} 
			return true;
		}else if($tabIdentity == 4){
			foreach($data as $id){
				$this->db->where('Status_Id', $id);
				$this->db->delete('dbo_tblstatus');
			} 
			return true;
		}else if($tabIdentity == 5){
			foreach($data as $id){
				$this->db->where('id', $id);
				$this->db->delete('dbo_tblcasestatus');
			} 
			return true;
		}else if($tabIdentity == 6){
			foreach($data as $id){
				$this->db->where('Doc_Id', $id);
				$this->db->delete('dbo_tbldocs');
			} 
			return true;
		}else if($tabIdentity == 7){
			foreach($data as $id){
				$this->db->where('ServiceType_ID', $id);
				$this->db->delete('dbo_tblservicetype');
			} 
			return true;
		}else if($tabIdentity == 8){
			foreach($data as $id){
				$this->db->where('EventTypeId', $id);
				$this->db->delete('dbo_tbleventtype');
			} 
			return true;
		}else if($tabIdentity == 9){
			foreach($data as $id){
				$this->db->where('EventStatusId', $id);
				$this->db->delete('dbo_tbleventstatus');
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
		$query = $this->db->get('dbo_tblstates'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_City_Zip_Country()
	{
		$query = $this->db->get('dbo_ziplist'); 
		$data=$query->result();
		return $data;
	}
	
	public function Add_OtherEntries($data,$tabIdentityData)
	{
		if($tabIdentityData['tabIdentity'] == 1){
			$query = $this->db->insert('dbo_tbldenialreasons',$data); 
			return $query;
		}else if($tabIdentityData['tabIdentity'] == 2){
			$query = $this->db->insert('dbo_tblcourt',$data); 
			return $query;
		}else if($tabIdentityData['tabIdentity'] == 3){
			$query = $this->db->insert('dbo_tblimagetypes',$data); 
			return $query;
		}else if($tabIdentityData['tabIdentity'] == 4){
			$query = $this->db->insert('dbo_tblstatus',$data); 
			return $query;
		}else if($tabIdentityData['tabIdentity'] == 5){
			$query = $this->db->insert('dbo_tblcasestatus',$data); 
			return $query;
		}else if($tabIdentityData['tabIdentity'] == 6){
			$query = $this->db->insert('dbo_tbldocs',$data); 
			return $query;
		}else if($tabIdentityData['tabIdentity'] == 7){
			$query = $this->db->insert('dbo_tblservicetype',$data); 
			return $query;
		}else if($tabIdentityData['tabIdentity'] == 8){
			$query = $this->db->insert('dbo_tbleventtype',$data); 
			return $query;
		}else if($tabIdentityData['tabIdentity'] == 9){
			$query = $this->db->insert('dbo_tbleventstatus',$data); 
			return $query;
		}
	}
	public function Update_OtherEntries($data,$tabIdentityData)
	{
		if($tabIdentityData['tabIdentity'] == 1){
			$this->db->set($data); 
			$this->db->where("DenialReasons_Id", $data['DenialReasons_Id']); 
			$query = $this->db->update("dbo_tbldenialreasons", $data);
		}else if($tabIdentityData['tabIdentity'] == 2){
			$this->db->set($data); 
			$this->db->where("Court_Id", $data['Court_Id']); 
			$query = $this->db->update("dbo_tblcourt", $data);
		}else if($tabIdentityData['tabIdentity'] == 3){
			$this->db->set($data); 
			$this->db->where("Image_Id", $data['Image_Id']); 
			$query = $this->db->update("dbo_tblimagetypes", $data);
		}else if($tabIdentityData['tabIdentity'] == 4){
			$this->db->set($data); 
			$this->db->where("Status_Id", $data['Status_Id']); 
			$query = $this->db->update("dbo_tblstatus", $data);
		}else if($tabIdentityData['tabIdentity'] == 5){
			$this->db->set($data); 
			$this->db->where("id", $data['id']); 
			$query = $this->db->update("dbo_tblcasestatus", $data);
		}else if($tabIdentityData['tabIdentity'] == 6){
			$this->db->set($data); 
			$this->db->where("Doc_Id", $data['Doc_Id']); 
			$query = $this->db->update("dbo_tbldocs", $data);
		}else if($tabIdentityData['tabIdentity'] == 7){
			$this->db->set($data); 
			$this->db->where("ServiceType_ID", $data['ServiceType_ID']); 
			$query = $this->db->update("dbo_tblservicetype", $data);
		}else if($tabIdentityData['tabIdentity'] == 8){
			$this->db->set($data); 
			$this->db->where("EventTypeId", $data['EventTypeId']); 
			$query = $this->db->update("dbo_tbleventtype", $data);
		}else if($tabIdentityData['tabIdentity'] == 9){
			$this->db->set($data); 
			$this->db->where("EventStatusId", $data['EventStatusId']); 
			$query = $this->db->update("dbo_tbleventstatus", $data);
		}
		
		return $query;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

}
?>