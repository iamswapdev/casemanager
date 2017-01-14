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
	public function get_Exp_Cost_Balance(){
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
	public function get_Daily_Sett($Start_Date, $End_Date){
		$this->db->select("SUM(t1.Settlement_Int) as Settlement_Int, SUM((t2.Claim_Amount - t2.Paid_Amount)) as Balance, SUM(t1.Settlement_Amount) as Settlement_Amount, SUM(t1.Settlement_Af) as Settlement_Af, SUM(t1.Settlement_Ff) as Settlement_Ff, t3.InsuranceCompany_Name, COUNT(t3.InsuranceCompany_Id) as No_Of_Case, t1.Case_Id, t1.User_Id, (SUM(t1.Settlement_Amount) * 100)/SUM((t2.Claim_Amount - t2.Paid_Amount)) as Settlement_Per ");
		$this->db->from("dbo_tblsettlements as t1");
		$this->db->join("dbo_tblcase as t2", "t2.Case_Id = t1.Case_Id", "LEFT");
		$this->db->join("dbo_tblinsurancecompany as t3", "t3.InsuranceCompany_Id = t2.InsuranceCompany_Id", "LEFT");
		//$this->db->group_by('t1.User_Id');
		$this->db->group_by('t3.InsuranceCompany_Name');
		
		$this->db->join("dbo_tblsettlements as t4", "t4.Case_Id = t2.Case_Id");
		$this->db->where('t1.Settlement_Date >=', $Start_Date);
		$this->db->where('t1.Settlement_Date <=', $End_Date);
		
		$query = $this->db->get();
		return $query->result();
	}
	public function get_Client_Information($Provider_Id){
		$this->db->where("Provider_Id", $Provider_Id);
		$query = $this->db->get("dbo_tblprovider");
		return $query->result();
	}
	public function get_Client_Settlement($Provider_Id, $No_Months, $TableId){
		if($TableId == "ClientSettlements"){
			$this->db->select("DATE_FORMAT(Settlement_Date,'%Y/%m') as Month_Year, COUNT(t1.Case_Id) as Case_Count, SUM(t2.Claim_Amount) as Sum_of_Billed_Amount, SUM(t2.Claim_Amount-t2.Paid_Amount) as Sum_of_Suit_Amount, SUM(t1.Settlement_Amount) as Sum_of_Principal_Settlement, SUM(t1.Settlement_Int) as Sum_of_Interest_Settlement, (((SUM(t1.Settlement_Amount)) + (SUM(t1.Settlement_Int)))*100)/ SUM(t2.Claim_Amount-t2.Paid_Amount) as Percentage ");
		}else if($TableId == "WithdrawnCases"){
			$this->db->select("DATE_FORMAT(Settlement_Date,'%Y/%m') as Month_Year, COUNT(t1.Case_Id) as Case_Count, SUM(t2.Claim_Amount) as Sum_of_Billed_Amount, SUM(t2.Claim_Amount-t2.Paid_Amount) as Sum_of_Suit_Amount, SUM(t1.Settlement_Amount) as Sum_of_Principal_Settlement, (((SUM(t1.Settlement_Amount)) + (SUM(t1.Settlement_Int)))*100)/ SUM(t2.Claim_Amount-t2.Paid_Amount) as Percentage ");
			$this->db->where("t1.Settlement_Amount <=", 0);
		}
		
		
		$this->db->where("t2.Provider_Id", $Provider_Id);
		$this->db->from("dbo_tblsettlements as t1");
		$this->db->join("dbo_tblcase as t2", "t2.Case_Id = t1.Case_Id" );
		
		$End_Date = date("Y/m/d");
		$Curent_month_first_Date = date_format(date_sub(date_create($End_Date),date_interval_create_from_date_string((date("d")-1)." days")), "Y/m/d");
		
		if($No_Months == 1){
			$End_Date = date("Y/m/d");
			$Start_Date = $Curent_month_first_Date;
			$this->db->where('t1.Settlement_Date <=', $End_Date);
		}else{
			//echo "<br>Curent_month_first_Date:".$Curent_month_first_Date;
			$Start_Date = date_format(date_sub(date_create($Curent_month_first_Date),date_interval_create_from_date_string(($No_Months-1)." months")), "Y/m/d");
			//echo "<br>Start_Date:".$Start_Date;
			$End_Date = date_format(date_sub(date_create($Curent_month_first_Date),date_interval_create_from_date_string(($No_Months-2)." months")), "Y/m/d");
			//echo "<br>End date:".$End_Date;
			$this->db->where('t1.Settlement_Date <=', $End_Date);
		}
		$this->db->where('t1.Settlement_Date >=', $Start_Date);
		
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function get_Client_New_Settlement($Provider_Id, $No_Months){
		$this->db->select("DATE_FORMAT(Date_Opened,'%Y/%m') as Month_Year, COUNT(t1.Case_Id) as Case_Count, SUM(t1.Claim_Amount) as Sum_of_Billed_Amount, SUM(t1.Claim_Amount-t1.Paid_Amount) as Sum_of_Suit_Amount");
		
		$this->db->where("t1.Provider_Id", $Provider_Id);
		$this->db->from("dbo_tblcase as t1");
		
		$End_Date = date("Y/m/d");
		$Curent_month_first_Date = date_format(date_sub(date_create($End_Date),date_interval_create_from_date_string((date("d")-1)." days")), "Y/m/d");
		
		if($No_Months == 1){
			$End_Date = date("Y/m/d");
			$Start_Date = $Curent_month_first_Date;
			$this->db->where('t1.Date_Opened <=', $End_Date);
		}else{
			//echo "<br>Curent_month_first_Date:".$Curent_month_first_Date;
			$Start_Date = date_format(date_sub(date_create($Curent_month_first_Date),date_interval_create_from_date_string(($No_Months-1)." months")), "Y/m/d");
			//echo "<br>Start_Date:".$Start_Date;
			$End_Date = date_format(date_sub(date_create($Curent_month_first_Date),date_interval_create_from_date_string(($No_Months-2)." months")), "Y/m/d");
			//echo "<br>End date:".$End_Date;
			$this->db->where('t1.Date_Opened <=', $End_Date);
		}
		$this->db->where('t1.Date_Opened >=', $Start_Date);
		
		$query = $this->db->get();
		return $query->result();
	}

}
?>