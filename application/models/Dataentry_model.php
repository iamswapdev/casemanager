<?php
Class Dataentry_model extends CI_Model{
	
	Public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
/* ************************************  Start of Addcase  *************************************************************************/
	public function insert_CaseInfo($data)
	{
		$query = $this->db->insert('dbo_tblcase',$data); 
		return $query;
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

/* *******************************************************************************************************************************************/	
	
	
	public function get_Status()
	{
		$this->db->order_by("Status_Type", "asc");
		$query = $this->db->get('dbo_tblstatus'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_City_Zip_Country()
	{
		$query = $this->db->get('dbo_ziplist'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_Court()
	{
		$this->db->order_by("Court_Name", "asc");
		$query = $this->db->get('dbo_tblcourt'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_Service()
	{
		$this->db->order_by("ServiceType", "asc");
		$query = $this->db->get('dbo_tblservicetype'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_DenialReasons()
	{
		$this->db->order_by("DenialReasons_Type", "asc");
		$query = $this->db->get('dbo_tbldenialreasons'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_States()
	{
		$this->db->order_by("State_Name", "asc");
		$query = $this->db->get('dbo_tblstates'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_ImageType()
	{
		$this->db->order_by("Image_Type", "asc");
		$query = $this->db->get('dbo_tblimagetypes'); 
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
	public function get_Doc()
	{
		$this->db->order_by("Doc_Name", "asc");
		$query = $this->db->get('dbo_tbldocs'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_EventStatus()
	{
		$this->db->order_by("EventStatusName", "asc");
		$query = $this->db->get('dbo_tbleventstatus'); 
		$data=$query->result_array();
		return $data;
	}
	public function get_EventType()
	{
		$this->db->order_by("EventTypeName", "asc");
		$query = $this->db->get('dbo_tbleventtype'); 
		$data=$query->result_array();
		return $data;
	}
	
	
	
	
	
	
	
	
	
	

}
?>