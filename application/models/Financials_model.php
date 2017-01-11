<?php
Class Financials_model extends CI_Model{
	
	Public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function get_Provider()
	{
		$query = $this->db->get('dbo_tblprovider'); 
		$data=$query->result_array();
		return $data;
	}
	
	public function get_Insurance()
	{
		$query=$this->db->get('dbo_tblinsurancecompany');
		$data=$query->result_array();
		return $data;
	}
	public function get_Zero_Settlement($Start_Date, $End_Date, $name){
		$this->db->select("t1.*, t2.InjuredParty_FirstName, t2.InjuredParty_LastName, t2.Status, t2.Claim_Amount, t2.Paid_Amount, t3.Provider_Name, t4.InsuranceCompany_Name");
		$this->db->from("dbo_tblsettlements as t1");
		$this->db->where('t1.Settlement_Date >=', $Start_Date);
		$this->db->where('t1.Settlement_Date <=', $End_Date);
		if($name == "Cases0Settlement"){
			$this->db->where("t1.Settlement_Amount", "0.0");
		}
		$this->db->join("dbo_tblcase as t2", "t2.Case_Id = t1.Case_Id", "LEFT");
		$this->db->join("dbo_tblprovider as t3", "t3.Provider_Id = t2.Provider_Id", "LEFT");
		$this->db->join("dbo_tblinsurancecompany as t4", "t4.InsuranceCompany_Id = t2.InsuranceCompany_Id", "LEFT");
		
		$query = $this->db->get();
		return $query->result();
	}
	public function get_Cost_Balance(){
		$this->db->select("t1.Provider_Id, t2.Provider_Name");
		$this->db->from("dbo_tblclientaccount as t1");
		$this->db->group_by('t1.Provider_Id');
		$this->db->join("dbo_tblprovider as t2", "t2.Provider_Id = t1.Provider_Id", "LEFT");
		
		$query = $this->db->get();
		return $query->result();
	}
	public function get_Firm_Fees($Start_Date, $End_Date){
		$this->db->select("t1.Provider_Id, t2.Provider_Name, t3.Case_Id, t3.IndexOrAAA_Number, t4.Settlement_Ff, t4.Settlement_Af, t4.Settlement_Date, t4.Settlement_Notes");
		$this->db->from("dbo_tblclientaccount as t1");
		$this->db->join("dbo_tblprovider as t2", "t2.Provider_Id = t1.Provider_Id");
		$this->db->join("dbo_tblcase as t3", "t3.Provider_Id = t1.Provider_Id" );
		$this->db->group_by('t3.Case_Id');
		$this->db->join("dbo_tblsettlements as t4", "t4.Case_Id = t3.Case_Id");
		$this->db->where('t4.Settlement_Date >=', $Start_Date);
		$this->db->where('t4.Settlement_Date <=', $End_Date);
		
		$query = $this->db->get();
		return $query->result();
	}

}
?>