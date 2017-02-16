<?php
Class Case_Info_model extends CI_Model{
	Public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function get_Case_Info($Case_AutoId){
		$this->db->select("t1.*, t2.*, t3.*, t4.*, t5.*, t6.*, t7.*, t8.*");
		$this->db->from("dbo_tblcase as t1");
		$this->db->where("Case_AutoId", $Case_AutoId);
		
		$this->db->join('dbo_tblprovider as t2', 't1.Provider_Id = t2.Provider_Id', 'LEFT');
		$this->db->join('dbo_tblinsurancecompany as t3', 't1.InsuranceCompany_Id = t3.InsuranceCompany_Id', 'LEFT');
		$this->db->join('dbo_tbldefendant as t4', 't1.Defendant_Id = t4.Defendant_id', 'LEFT');
		$this->db->join('dbo_tbladjusters as t5', 't1.Adjuster_Id = t5.Adjuster_Id', 'LEFT');
		$this->db->join('dbo_tblplaintiffattorney as t6', 't1.Plaintiff_Id = t6.Attorney_id', 'LEFT');
		$this->db->join('dbo_tblcourt as t7', 't1.Court_Id = t7.Court_Id', 'LEFT');
		$this->db->join('dbo_tblsettlements as t8', 't1.Case_Id = t8.Case_Id', 'LEFT');
		
		$query=$this->db->get();
		$data=$query->result_array();
		//echo "<pre>"; print_r($data); exit;
		return $data;
	}
	public function get_Last_Case_Id()
	{
		$this->db->order_by("Case_AutoId", "desc");
		$this->db->select("Case_Id");
		$this->db->limit('1');
		$query = $this->db->get("dbo_tblcase");
		$Case_Id = $query->result_array();
		$Case_Id1 = $Case_Id[0]['Case_Id'];
		return $Case_Id1;
	}
	public function get_Case_AutoId($Case_Id)
	{
		$this->db->select("Case_AutoId");
		$this->db->where("Case_Id", $Case_Id);
		$this->db->limit('1');
		$query = $this->db->get("dbo_tblcase");
		$Case_AutoId = $query->result_array();
		
		return $Case_AutoId[0]['Case_AutoId'];
	}

}
?>