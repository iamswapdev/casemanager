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
/* get privious posting reports Financials-tab 1*/
	public function get_Privious_Posting_Reports($Start_Date, $End_Date){
		$this->db->select("t1.Provider_Id, t2.Provider_Name, t1.Gross_Amount, t1.Firm_Fees, t1.Final_Remit, ((t1.Firm_Fees + t1.Applied_Cost)) as Firm_Remit_Amount, t1.Account_Id, t1.Account_Date, t1.Last_Printed");
		$this->db->from("dbo_tblclientaccount as t1");
		$this->db->join("dbo_tblprovider as t2", "t1.Provider_Id = t2.Provider_Id", "LEFT");
		$this->db->where("t1.Account_Date >=", $Start_Date);
		$this->db->where("t1.Account_Date <=", $End_Date);
		$query = $this->db->get();
		return $query->result();
	}	
/* get Generate Daily Client Invoices Financials-tab 2*/
	public function get_Generate_Daily_Client_Invoices(){
		$this->db->select("t1.Provider_Id, t2.Provider_Name, COUNT(t1.Provider_Id) as No_of_Checks, SUM(t1.Gross_Amount) as Total_Amount");
		$this->db->from("dbo_tblclientaccount as t1");
		$this->db->group_by("t1.Provider_Id");
		$this->db->join("dbo_tblprovider as t2", "t1.Provider_Id = t2.Provider_Id");
		$query = $this->db->get();
		return $query->result();
	}
/* get firm account balance Financials-tab 3*/
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
/* get cost balance Financials- tab 4*/
	public function get_Cost_Balance(){
		$this->db->select("t1.Provider_Id, t2.Provider_Name, SUM(t1.Cost_Balance) as Tot_Cost_Balance");
		$this->db->from("dbo_tblclientaccount as t1");
		$this->db->group_by('t1.Provider_Id');
		$this->db->join("dbo_tblprovider as t2", "t2.Provider_Id = t1.Provider_Id", "LEFT");
		
		$query = $this->db->get();
		return $query->result();
	}
/* get exp cost balance Financials- tab 5 */
	public function get_Exp_Cost_Balance(){
		$this->db->select("t1.Provider_Id, t2.Provider_Name");
		$this->db->from("dbo_tblclientaccount as t1");
		$this->db->group_by('t1.Provider_Id');
		$this->db->join("dbo_tblprovider as t2", "t2.Provider_Id = t1.Provider_Id", "LEFT");
		
		$query = $this->db->get();
		return $query->result();
	}
/*get Daily settlement */
	public function get_Daily_Sett($Start_Date, $End_Date){
		$this->db->select(" t1.User_Id, t3.InsuranceCompany_Name, COUNT(t3.InsuranceCompany_Id) as No_Of_Case, SUM((t2.Claim_Amount - t2.Paid_Amount)) as Balance, SUM(t1.Settlement_Amount) as Settlement_Amount, SUM(t1.Settlement_Ff) as Settlement_Ff, SUM(t1.Settlement_Af) as Settlement_Af, (SUM(t1.Settlement_Amount) * 100)/SUM((t2.Claim_Amount - t2.Paid_Amount)) as Settlement_Per, SUM(t1.Settlement_Int) as Settlement_Int, t1.Case_Id");
		 
		 
		$this->db->from("dbo_tblsettlements as t1");
		$this->db->join("dbo_tblcase as t2", "t2.Case_Id = t1.Case_Id", "LEFT");
		$this->db->join("dbo_tblinsurancecompany as t3", "t3.InsuranceCompany_Id = t2.InsuranceCompany_Id", "LEFT");
		$this->db->group_by(array("t1.User_Id", "t3.InsuranceCompany_Id"));
		//$this->db->group_by('t3.InsuranceCompany_Id');
		
		
		$this->db->join("dbo_tblsettlements as t4", "t4.Case_Id = t2.Case_Id");
		$this->db->where('t1.Settlement_Date >=', $Start_Date);
		$this->db->where('t1.Settlement_Date <=', $End_Date);
		
		$query = $this->db->get();
		return $query->result();
	}
/* get 0 Settlement Amount and overdue settlement Repots- tab 2*/
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
/*Load Client_Information table*/
	public function get_Client_Information($Provider_Id){
		$this->db->where("Provider_Id", $Provider_Id);
		$query = $this->db->get("dbo_tblprovider");
		return $query->result();
	}
	
/* get_Client_Settlement*/
	public function get_Client_Settlement($Provider_Id, $No_Months, $TableId){
		if($TableId == "ClientSettlements"){
			$this->db->select("DATE_FORMAT(Settlement_Date,'%Y/%m') as Month_Year, DATE_FORMAT(Settlement_Date,'%Y/%m/%d') as Current_Month_Date, COUNT(t1.Case_Id) as Case_Count, SUM(t2.Claim_Amount) as Sum_of_Billed_Amount, SUM(t2.Claim_Amount-t2.Paid_Amount) as Sum_of_Suit_Amount, SUM(t1.Settlement_Amount) as Sum_of_Principal_Settlement, SUM(t1.Settlement_Int) as Sum_of_Interest_Settlement, (((SUM(t1.Settlement_Amount)) + (SUM(t1.Settlement_Int)))*100)/ SUM(t2.Claim_Amount-t2.Paid_Amount) as Percentage ");
		}else if($TableId == "WithdrawnCases"){
			$this->db->select("DATE_FORMAT(Settlement_Date,'%Y/%m') as Month_Year, DATE_FORMAT(Settlement_Date,'%Y/%m/%d') as Current_Month_Date, COUNT(t1.Case_Id) as Case_Count, SUM(t2.Claim_Amount) as Sum_of_Billed_Amount, SUM(t2.Claim_Amount-t2.Paid_Amount) as Sum_of_Suit_Amount, SUM(t1.Settlement_Amount) as Sum_of_Principal_Settlement, (SUM(t1.Settlement_Amount)*100/SUM(t2.Claim_Amount-t2.Paid_Amount)) as Percentage ");
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
	
/*get_Client_New_Settlement*/
	public function get_Client_New_Settlement($Provider_Id, $No_Months){
		$this->db->select("DATE_FORMAT(Date_Opened,'%Y/%m') as Month_Year, DATE_FORMAT(Date_Opened,'%Y/%m/%d') as Current_Month_Date, COUNT(t1.Case_Id) as Case_Count, SUM(t1.Claim_Amount) as Sum_of_Billed_Amount, SUM(t1.Claim_Amount-t1.Paid_Amount) as Sum_of_Suit_Amount");
		
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

/*get_Client_Invoices*/
	public function get_Client_Invoices($Provider_Id, $No_Months){
		$this->db->where("Provider_Id", $Provider_Id);
		$this->db->from("dbo_tblclientaccount as t1");
		
		$End_Date = date("Y/m/d");
		$Curent_month_first_Date = date_format(date_sub(date_create($End_Date),date_interval_create_from_date_string((date("d")-1)." days")), "Y/m/d");
		
		if($No_Months == 1){
			$End_Date = date("Y/m/d");
			$Start_Date = $Curent_month_first_Date;
			$this->db->where('Last_Printed <=', $End_Date);
		}else{
			//echo "<br>Curent_month_first_Date:".$Curent_month_first_Date;
			$Start_Date = date_format(date_sub(date_create($Curent_month_first_Date),date_interval_create_from_date_string(($No_Months-1)." months")), "Y/m/d");
			//echo "<br>Start_Date:".$Start_Date;
			$End_Date = date_format(date_sub(date_create($Curent_month_first_Date),date_interval_create_from_date_string(($No_Months-2)." months")), "Y/m/d");
			//echo "<br>End date:".$End_Date;
			$this->db->where('Last_Printed <=', $End_Date);
		}
		$this->db->where('Last_Printed >=', $Start_Date);
		
		$query = $this->db->get();
		return $query->result();
	}
	
/*get_Status_Breakdown*/
	public function get_Status_Breakdown($Provider_Id, $No_Months){
		$this->db->select("Status, COUNT(Status) as Status_Count");
		
		$this->db->where("Provider_Id", $Provider_Id);
		$this->db->group_by("Status");
		$this->db->from("dbo_tblcase");
		
		$Current_Date = date("Y/m/d");
		$End_Date = date_format(date_sub(date_create($Current_Date),date_interval_create_from_date_string((date("d")-1)." days")), "Y/m/d");
		$Start_Date = date_format(date_sub(date_create($End_Date),date_interval_create_from_date_string(($No_Months-1)." months")), "Y/m/d");
		
		$this->db->where('Date_Opened >=', $Start_Date);
		$this->db->where('Date_Opened <=', $Current_Date);
		
		$query = $this->db->get();
		return $query->result();
	}
	
	
	
/*get client settlement in one month*/
	public function get_Client_Settlement_Month($data){
		if($data['TableId'] == "ClientSettlements"){
			$this->db->select("t1.*, t2.InjuredParty_FirstName, t2.InjuredParty_LastName, t3.InsuranceCompany_Name, (t2.Claim_Amount-t2.Paid_Amount) as Initial_Balance, ((t1.Settlement_Amount + t1.Settlement_Int)*100/ (t2.Claim_Amount-t2.Paid_Amount))  as Settlement_Percentage");
		}else if($data['TableId'] == "WithdrawnCases"){
			$this->db->select("t1.*, t2.InjuredParty_FirstName, t2.InjuredParty_LastName, t3.InsuranceCompany_Name, (t2.Claim_Amount-t2.Paid_Amount) as Initial_Balance, ((t1.Settlement_Amount)*100/ (t2.Claim_Amount-t2.Paid_Amount))  as Settlement_Percentage");
		}else if($data['TableId'] == "ClientNewCases" || $data['TableId'] == "StatusBreakdown"){
			$this->db->select("t1.*, t1.InjuredParty_FirstName, t1.InjuredParty_LastName, t2.InsuranceCompany_Name, (t1.Claim_Amount-t1.Paid_Amount) as Initial_Balance");
		}
		
		
		if($data['TableId'] == "ClientSettlements" || $data['TableId'] == "WithdrawnCases"){
			$this->db->from("dbo_tblsettlements as t1");
			$this->db->join("dbo_tblcase as t2", "t2.Case_Id = t1.Case_Id" );
			$this->db->join("dbo_tblinsurancecompany as t3", "t3.InsuranceCompany_Id = t2.InsuranceCompany_Id" );
			$this->db->where("t2.Provider_Id", $data['Provider_Id']);
			$this->db->where('t1.Settlement_Date >=', $data['SD']);
			$this->db->where('t1.Settlement_Date <=', $data['ED']);
			if($data['TableId'] == "WithdrawnCases"){
				$this->db->where("t1.Settlement_Amount <=", 0);
			}
		}else if($data['TableId'] == "ClientNewCases"){
			$this->db->from("dbo_tblcase as t1");
			$this->db->join("dbo_tblinsurancecompany as t2", "t1.InsuranceCompany_Id = t2.InsuranceCompany_Id" );
			$this->db->where("t1.Provider_Id", $data['Provider_Id']);
			$this->db->where('t1.Date_Opened >=', $data['SD']);
			$this->db->where('t1.Date_Opened <=', $data['ED']);
		}else if($data['TableId'] == "StatusBreakdown"){
			$this->db->from("dbo_tblcase as t1");
			$this->db->join("dbo_tblinsurancecompany as t2", "t1.InsuranceCompany_Id = t2.InsuranceCompany_Id" );
			$this->db->where("t1.Provider_Id", $data['Provider_Id']);
			$this->db->where("t1.Status", $data['Status']);
			$this->db->where('t1.Date_Opened >=', $data['SD']);
			$this->db->where('t1.Date_Opened <=', $data['ED']);
		}
		
		$query = $this->db->get();
		return $query->result();
	}

}
?>