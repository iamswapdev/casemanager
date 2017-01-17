<?php
session_cache_limiter('private_no_expire');

class Financials extends CI_Controller{

	Public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('financials_model');
		$this->load->model('admin_privilege_model');
		$this->load->model('search_model');
		$this->session->all_userdata();
	}
	public function index(){
		
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/financials');
		}else{
			$CurrentPage['CurrentUrl'] = "financials";
			$this->load->view('pages/login', $CurrentPage);
		} 		
	}
	public function get_Assigned_Menus($User_Role){
		
		$data = $this->admin_privilege_model->get_Assigned_Menus($User_Role);
		return $data;
	}
	public function financial(){
		if(isset($this->session->userdata['logged_in'])){
			
			$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
			$this->load->view('pages/financials', $data);
		}else{
			$CurrentPage['CurrentUrl'] = "financials/financial";
			$this->load->view('pages/login', $CurrentPage);
		}
	}
	public function reports(){
		if(isset($this->session->userdata['logged_in'])){
			//if($ViewCase == "00"){
				$data['Provider_Name']= $this->search_model->get_Provider();
				$data['InsuranceCompany_Name']= $this->search_model->get_Insurance();
				$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
			//}else{ $data['Case_Id'] = $ViewCase;}
			$this->load->view('pages/reports',$data);
		}else{
			$CurrentPage['CurrentUrl'] = "financials/reports";
			$this->load->view('pages/login', $CurrentPage);
		}
	}
	public function rapidfunds(){
		if(isset($this->session->userdata['logged_in'])){
			$data['Provider_Name']= $this->financials_model->get_Provider();
			$data['InsuranceCompany_Name']= $this->financials_model->get_Insurance();
			$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
			$this->load->view('pages/rapidfunds',$data);
		}else{
			$CurrentPage['CurrentUrl'] = "financials/rapidfunds";
			$this->load->view('pages/login', $CurrentPage);
		}
	}
	public function defendant(){
		if(isset($this->session->userdata['logged_in'])){
			$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
			$this->load->view('pages/add_defendant_info', $data);
		}else{
			$CurrentPage['CurrentUrl'] = "financials/defendant";
			$this->load->view('pages/login', $CurrentPage);
		}
	}	
/* get privious posting reports Financials-tab 1*/
	public function get_Privious_Posting_Reports(){
		$Start_Date = date_format(date_create($this->input->post("SD_Privious_Posting")), 'Y/m/d');
		$End_Date = date_format(date_create($this->input->post("ED_Privious_Posting")), 'Y/m/d');
		$list = $this->financials_model->get_Privious_Posting_Reports($Start_Date, $End_Date);
		//echo "<pre>Start_Date:".$Start_Date." End:".$End_Date; print_r($list);exit;
		$data = array();
		$Tot_Gross_Amount = 0;
		$Tot_Firm_Fees = 0;
		$Tot_Final_Remit = 0;
		$Tot_Firm_Remit_Amount = 0;
		
		$No_of_Checks = 0;
		foreach($list as $result){
			$row = array();
			$row[] = $result->Provider_Id;
			$row[] = $result->Provider_Name;
			$row[] = "$".number_format($result->Gross_Amount, 2);
			$row[] = "$".number_format($result->Firm_Fees, 2);
			$row[] = "$".number_format($result->Final_Remit, 2);
			$row[] = "$".number_format($result->Firm_Remit_Amount, 2);
			$row[] = "<a class='info-link'>print checks</a>";
			$row[] = "<a class='info-link'>print invoice</a>";
			$row[] = $result->Account_Id;
			$row[] = date_format(date_create(substr($result->Account_Date, 0,10)), "m/d/Y");
			$row[] = date_format(date_create(substr($result->Last_Printed, 0,10)), "m/d/Y");
			$row[] = "<a class='info-link'>Confirm</a>";
			$row[] = "<a class='info-link'>Reverse</a>";
			
			$data[] = $row;
			$Tot_Gross_Amount = $Tot_Gross_Amount + $result->Gross_Amount;
			$Tot_Firm_Fees = $Tot_Firm_Fees + $result->Firm_Fees;
			$Tot_Final_Remit = $Tot_Final_Remit + $result->Final_Remit;
			$Tot_Firm_Remit_Amount = $Tot_Firm_Remit_Amount + $result->Firm_Remit_Amount;
		}
		$row = array();
		$row[] = "Total";
		$row[] = "";
		$row[] = "$".number_format($Tot_Gross_Amount, 2);
		$row[] = "$".number_format($Tot_Firm_Fees, 2);
		$row[] = "$".number_format($Tot_Final_Remit, 2);
		$row[] = "$".number_format($Tot_Firm_Remit_Amount, 2);
		$row[] = "";
		$row[] = "";
		$row[] = "";
		$row[] = "";
		$row[] = "";
		$row[] = "";
		$row[] = "";
		
		$data[] = $row;
		
		$output = array( "data" => $data );
		echo json_encode($output);
	}
/* get generate daily client invoices Financials-tab 2*/
	public function get_Generate_Daily_Client_Invoices(){
		$list = $this->financials_model->get_Generate_Daily_Client_Invoices();
		//echo "<pre>"; print_r($list);exit;
		$data = array();
		$Total_Amount = 0;
		$No_of_Checks = 0;
		foreach($list as $result){
			$row = array();
			$row[] = $result->Provider_Id;
			$row[] = $result->Provider_Name;
			$row[] = $result->No_of_Checks;
			$row[] = "$".number_format($result->Total_Amount, 2);
			$row[] = "";
			
			$data[] = $row;
			$Total_Amount = $Total_Amount + $result->Total_Amount;
			$No_of_Checks = $No_of_Checks + $result->No_of_Checks;
		}
		$row = array();
		$row[] = "Total";
		$row[] = "";
		$row[] = $No_of_Checks;
		$row[] = "$".number_format($Total_Amount, 2);
		$row[] = "";
		
		$data[] = $row;
		
		$output = array( "data" => $data );
		echo json_encode($output);
	}
	
	
/* get firm account balance Financials-tab 3*/
	public function get_Firm_Fees(){
		$Start_Date = date_format(date_create($this->input->post("SD_FirmFees")), 'Y/m/d');
		$End_Date = date_format(date_create($this->input->post("ED_FirmFees")), 'Y/m/d');
		$list = $this->financials_model->get_Firm_Fees($Start_Date, $End_Date);
		//echo "<pre>"; print_r($list);exit;
		$data = array();
		foreach($list as $result){
			$row = array();
			$row[] = $result->Provider_Id;
			$row[] = $result->Provider_Name;
			$row[] = $result->Case_Id;
			$row[] = $result->IndexOrAAA_Number;
			$row[] = "$".number_format($result->Settlement_Ff, 2);
			$row[] = "$".number_format($result->Settlement_Af, 2);
			$row[] = date_format(date_create(substr($result->Settlement_Date, 0,10)), "m/d/Y");
			$row[] = $result->Settlement_Notes;
			
			$data[] = $row;
		}
		
		$output = array( "data" => $data );
		echo json_encode($output);
	}
/* get cost balance Financials- tab 4*/
	public function get_Cost_Balance(){
		$list = $this->financials_model->get_Cost_Balance();
		//echo "<pre>"; print_r($list);exit;
		$data = array();
		foreach($list as $result){
			$row = array();
			$row[] = $result->Provider_Id;
			$row[] = $result->Provider_Name;
			$row[] = "<input name='' value='".number_format($result->Tot_Cost_Balance, 2)."' />";
			$data[] = $row;
		}
		
		$output = array( "data" => $data );
		echo json_encode($output);
	}
/* get exp cost balance Financials- tab 5 */
	public function get_Exp_Cost_Balance(){
		/*$list = $this->financials_model->get_Exp_Cost_Balance();
		//echo "<pre>"; print_r($list);exit;
		$data = array();
		foreach($list as $result){
			$row = array();
			$row[] = ;
			$row[] = $result->Provider_Name;
			$row[] = ;
		}
		
		$output = array( "data" => $data );
		echo json_encode($output);*/
	}
/*get daily sett table*/
	public function get_Daily_Sett(){
		$Start_Date = date_format(date_create($this->input->post("SD_Daily_Sett")), 'Y/m/d');
		$End_Date = date_format(date_create($this->input->post("ED_Daily_Sett")), 'Y/m/d');
		$Sett_Perc = $this->input->post("Sett_Perc");
		$list = $this->financials_model->get_Daily_Sett($Start_Date, $End_Date);
		//echo "<pre>"; print_r($list);exit;
		$data = array();
		$flag = 0;
		foreach($list as $result){
			if($Sett_Perc == "0"){
				if($result->Settlement_Per <= 0){ $flag = 1; }else{ $flag = 0;}
			}else if($Sett_Perc == "0_to_70"){
				if($result->Settlement_Per >= 0 && $result->Settlement_Per <=70){$flag = 1; }else{ $flag = 0;}
			}else if($Sett_Perc == "Above_70"){
				if($result->Settlement_Per >= 70){$flag = 1; }else{ $flag = 0;}
			}else{ $flag = 1;}
			if($flag == 1){
				$row = array();
				$row[] = $result->User_Id;
				$row[] = $result->InsuranceCompany_Name;
				$row[] = $result->No_Of_Case;
				$row[] = "$".number_format($result->Balance, 2);
				$row[] = "$".number_format($result->Settlement_Amount, 2)." & "."$".number_format($result->Settlement_Int, 2);
				$row[] = "$".number_format($result->Settlement_Ff, 2);
				$row[] = "$".number_format($result->Settlement_Af, 2);
				$row[] = number_format($result->Settlement_Per, 2);
				
				$data[] = $row;
			}
		}
		
		$output = array( "data" => $data );
		echo json_encode($output);
	}
/* get 0 Settlement Amount and overdue settlement Repots- tab 2*/
	public function get_Zero_Settlement(){
		$Start_Date = date_format(date_create($this->input->post("SD_0Settlement")), 'Y/m/d');
		$End_Date = date_format(date_create($this->input->post("ED_0Settlement")), 'Y/m/d');
		$name = $this->input->post("name");
		$list = $this->financials_model->get_Zero_Settlement($Start_Date, $End_Date, $name);
		$data = array();
		if($name == "Cases0Settlement"){
			foreach($list as $result){
				$row = array();
				$row[] = $result->Case_Id;
				$row[] = $result->InjuredParty_FirstName." ".$result->InjuredParty_LastName;
				$row[] = $result->Provider_Name;
				$row[] = $result->Status;
				$row[] = $result->InsuranceCompany_Name;
				$row[] = "$".number_format($result->Claim_Amount, 2);
				$row[] = "$".number_format($result->Claim_Amount - $result->Paid_Amount, 2);
				$row[] = date_format(date_create(substr($result->Settlement_Date,0,10)),"m/d/Y");
				$row[] = "$".number_format($result->Settlement_Amount, 2);
				$data[] = $row;
			}
		}else{
			foreach($list as $result){
				$row = array();
				$row[] = $result->Case_Id;
				$row[] = $result->InjuredParty_FirstName." ".$result->InjuredParty_LastName;
				$row[] = $result->Provider_Name;
				$row[] = $result->InsuranceCompany_Name;
				$row[] = "$".number_format($result->Claim_Amount, 2);
				$row[] = "$".number_format($result->Claim_Amount - $result->Paid_Amount, 2);
				$row[] = "$".number_format($result->Settlement_Amount, 2);
				$row[] = date_format(date_create(substr($result->Settlement_Date,0,10)),"m/d/Y");
				$row[] = "$".number_format($result->Settlement_Int, 2);
				$row[] = "$".number_format($result->Settlement_Af, 2);
				$row[] = "$".number_format($result->Settlement_Ff, 2);
				$row[] = "$".number_format($result->Settlement_Total, 2);
				$row[] = $result->User_Id;
				$row[] = $result->SettledWith;
				$row[] = "";
				
				$data[] = $row;
			}
		}
		
		$output = array( "data" => $data );
		echo json_encode($output);
	}
/******************************************* CLIENT REPORT *********************************/
/*Load Client_Information table*/
	public function get_Client_Information(){
		$Provider_Id = $this->input->post("Provider_Id");
		$No_Months = $this->input->post("No_Months");
		$list = $this->financials_model->get_Client_Information($Provider_Id);
		//echo "<pre>"; print_r($list);exit;
		$data = array();
		foreach($list as $result){
			$row = array();
			
			$row[] = $result->Provider_Name;
			$row[] = $result->Provider_Perm_Address;
			$row[] = $result->Provider_Billing;
			$row[] = "$0.00";
			
			$data[] = $row;
		}
		
		$output = array( "data" => $data );
		echo json_encode($output);
	}
/*Client Settlements for last few months*/
	public function  get_Client_Settlement(){
		$Provider_Id = $this->input->post("Provider_Id");
		$No_Months = $this->input->post("No_Months");
		$TableId = $this->input->post("TableId");
		$data = array();
		$Tot_Case_Count = 0;
		$Tot_Sum_of_Billed_Amount = 0;
		$Tot_Sum_of_Suit_Amount = 0;
		$Tot_Sum_of_Principal_Settlement = 0;
		$Tot_Sum_of_Interest_Settlement = 0;
		$Tot_Percentage = 0;
		$j=1;
		for($i=1; $i <= $No_Months; $i++){
			$list = $this->financials_model->get_Client_Settlement($Provider_Id, $i, $TableId);
			foreach($list as $result){
				if($result->Case_Count != 0){
					$row = array();
						 
					$row[] = "<a target='_blank' class='info-link' href='Client_Settlement?Provider_Id=".$Provider_Id."&SD=".date('Y-m-01', strtotime($result->Current_Month_Date))."&ED=".date('Y-m-t', strtotime($result->Current_Month_Date))."&TableId=".$TableId."'>".$result->Month_Year."</a>"."<input type='hidden' name='SD' value='".date('Y-m-01', strtotime($result->Current_Month_Date))."' /> <input type='hidden' name='ED' value='".date('Y-m-t', strtotime($result->Current_Month_Date))."' />";
					$Tot_Case_Count = $Tot_Case_Count + $result->Case_Count;
					$row[] = $result->Case_Count;
					$row[] = "$".number_format($result->Sum_of_Billed_Amount, 2);
					$Tot_Sum_of_Billed_Amount = $Tot_Sum_of_Billed_Amount + $result->Sum_of_Billed_Amount;
					$row[] = "$".number_format($result->Sum_of_Suit_Amount, 2);
					$Tot_Sum_of_Suit_Amount = $Tot_Sum_of_Suit_Amount + $result->Sum_of_Suit_Amount;
					$row[] = "$".number_format($result->Sum_of_Principal_Settlement, 2);
					$Tot_Sum_of_Principal_Settlement = $Tot_Sum_of_Principal_Settlement + $result->Sum_of_Principal_Settlement;
					if($TableId == "ClientSettlements"){
						$row[] = "$".number_format($result->Sum_of_Interest_Settlement, 2);
						$Tot_Sum_of_Interest_Settlement = $Tot_Sum_of_Interest_Settlement + $result->Sum_of_Interest_Settlement;
					}
					$row[] = number_format($result->Percentage, 2)."%";
					
					$data[] = $row;
					$j++;
					$Tot_Percentage = $Tot_Percentage + $result->Percentage;
				}
			}
		}
		$row = array();
		
		$row[] = "Total";
		$row[] = $Tot_Case_Count;
		$row[] = "$".number_format($Tot_Sum_of_Billed_Amount, 2);
		$row[] = "$".number_format($Tot_Sum_of_Suit_Amount, 2);
		$row[] = "$".number_format($Tot_Sum_of_Principal_Settlement, 2);
		if($TableId == "ClientSettlements"){ $row[] = "$".number_format($Tot_Sum_of_Interest_Settlement, 2); }
		if($j){$row[] = "0.00%";}else{$row[] = number_format($Tot_Percentage/($j-1), 2);}
		
		$data[] = $row;
		
		$output = array( "data" => $data );
		echo json_encode($output);
	}
/*get_Client_New_Settlement for last few months*/
	public function  get_Client_New_Settlement(){
		$Provider_Id = $this->input->post("Provider_Id");
		$No_Months = $this->input->post("No_Months");
		$TableId = $this->input->post("TableId");
		$data = array();
		$Tot_Case_Count = 0;
		$Tot_Sum_of_Billed_Amount = 0;
		$Tot_Sum_of_Suit_Amount = 0;
		$j=1;
		for($i=1; $i <= $No_Months; $i++){
			$list = $this->financials_model->get_Client_New_Settlement($Provider_Id, $i);
			foreach($list as $result){
				if($result->Case_Count != 0){
					$row = array();
						 
					$row[] = "<a target='_blank' class='info-link' href='Client_Settlement?Provider_Id=".$Provider_Id."&SD=".date('Y-m-01', strtotime($result->Current_Month_Date))."&ED=".date('Y-m-t', strtotime($result->Current_Month_Date))."&TableId=".$TableId."'>".$result->Month_Year."</a>"."<input type='hidden' name='SD' value='".date('Y-m-01', strtotime($result->Current_Month_Date))."' /> <input type='hidden' name='ED' value='".date('Y-m-t', strtotime($result->Current_Month_Date))."' />";
					$Tot_Case_Count = $Tot_Case_Count + $result->Case_Count;
					$row[] = $result->Case_Count;
					$row[] = "$".number_format($result->Sum_of_Billed_Amount, 2);
					$Tot_Sum_of_Billed_Amount = $Tot_Sum_of_Billed_Amount + $result->Sum_of_Billed_Amount;
					$row[] = "$".number_format($result->Sum_of_Suit_Amount, 2);
					$Tot_Sum_of_Suit_Amount = $Tot_Sum_of_Suit_Amount + $result->Sum_of_Suit_Amount;
					
					$data[] = $row;
					$j++;
				}
			}
		}
		$row = array();
		
		$row[] = "Total";
		$row[] = $Tot_Case_Count;
		$row[] = "$".number_format($Tot_Sum_of_Billed_Amount, 2);
		$row[] = "$".number_format($Tot_Sum_of_Suit_Amount, 2);
		
		$data[] = $row;
		
		$output = array( "data" => $data );
		echo json_encode($output);
	}
/*Client Invoices*/
	public function get_Client_Invoices(){
		$Provider_Id = $this->input->post("Provider_Id");
		$No_Months = $this->input->post("No_Months");
		$Tot_Gross_Amt = 0;
		$Tot_Firm_Fees = 0;
		$Tot_Cost_Balance = 0;
		$Tot_Applied_Cost = 0;
		$Tot_Final_Remit = 0;
		$data = array();
		for($i=1; $i <= $No_Months; $i++){
			$list = $this->financials_model->get_Client_Invoices($Provider_Id, $i);
			foreach($list as $result){
				$row = array();
						 
				$row[] = "<a target='_blank' class='info-link'>".$result->Account_Id."</a>";
				$row[] = "$".number_format($result->Gross_Amount, 2);
				$row[] = "$".number_format($result->Firm_Fees, 2);
				$row[] = "$".number_format($result->Cost_Balance, 2);
				$row[] = "$".number_format($result->Applied_Cost, 2);
				$row[] = "$".number_format($result->Final_Remit, 2);
				$row[] = date_format(date_create(substr($result->Account_Date, 0, 10)), "m/d/Y");
				$row[] = date_format(date_create(substr($result->Last_Printed, 0, 10)), "m/d/Y");
				$data[] = $row;
				
				$Tot_Gross_Amt = $Tot_Gross_Amt + $result->Gross_Amount;
				$Tot_Firm_Fees = $Tot_Firm_Fees + $result->Firm_Fees;
				$Tot_Cost_Balance = $Tot_Cost_Balance + $result->Cost_Balance;
				$Tot_Applied_Cost = $Tot_Applied_Cost + $result->Applied_Cost;
				$Tot_Final_Remit = $Tot_Final_Remit + $result->Final_Remit;
			}
		}
		$row = array();
						 
		$row[] = "Total";
		$row[] = "$".number_format($Tot_Gross_Amt, 2);
		$row[] = "$".number_format($Tot_Firm_Fees, 2);
		$row[] = "$".number_format($Tot_Cost_Balance, 2);
		$row[] = "$".number_format($Tot_Applied_Cost, 2);
		$row[] = "$".number_format($Tot_Final_Remit, 2);
		$row[] = "";
		$row[] = "";
		$data[] = $row;
		
		$output = array( "data" => $data );
		echo json_encode($output);
	}
/*get_Status_Breakdown*/
	public function get_Status_Breakdown(){
		$Provider_Id = $this->input->post("Provider_Id");
		$No_Months = $this->input->post("No_Months");
		$Tot_Status = 0;
		$data = array();
		$list = $this->financials_model->get_Status_Breakdown($Provider_Id, $No_Months);
		foreach($list as $result){
			$row = array();
					 
			$row[] = "<a class='info-link' target='_blank' href='new_page?No_Months=".$No_Months."&Provider_Id=".$Provider_Id."'>".$result->Status."</a>";
			$row[] = $result->Status_Count;
			$data[] = $row;
			$Tot_Status = $Tot_Status + $result->Status_Count; 
		}
		$row = array();
					 
		$row[] = "Total";
		$row[] = $Tot_Status;
		$data[] = $row;

		$output = array( "data" => $data );
		echo json_encode($output);
	}
	public function Client_Settlement(){
		$data['TableInfo'] = array(
			"Provider_Id" => $this->input->get("Provider_Id"),
			"SD" => $this->input->get("SD"),
			"ED" => $this->input->get("ED"),
			"TableId" => $this->input->get("TableId")
		);
		/*$data['TableInfo'] = array(
			"Provider_Id" => 39,
			"SD" => "2016-02-01",
			"ED" => "2016-02-29",
			"TableId" => "ClientNewCases"
		);*/
		/*if($data['TableId'] == "ClientSettlements" || $data['TableId'] == "WithdrawnCases"){
			$data['ClientSettlements'] = $this->financials_model->get_Client_Settlement_Month($data);
		}else if($data['TableId'] == "ClientNewCases"){
			$data['ClientSettlements'] = "";
			$data['ClientNewSettlements'] = $this->financials_model->get_Client_Settlement_Month($data);
			echo "<pre>";print_r($data['ClientNewSettlements']);exit;
		}
		*/
		
		
		$data['Assigned_Menus'] = $this->get_Assigned_Menus($this->session->userdata['RoleId']);
		$this->load->view("pages/Client_Settlement", $data);
	}
	public function get_Client_Settlement_Month(){
		$input_data = array(
			"Provider_Id" => $this->input->post("Provider_Id"),
			"SD" => $this->input->post("SD"),
			"ED" => $this->input->post("ED"),
			"TableId" => $this->input->post("TableId")
		);
		/*$input_data = array(
			"Provider_Id" => "39",
			"SD" => "2016-09-01",
			"ED" => "2016-09-30",
			"TableId" => "ClientNewCases"
		);*/
		$list = $this->financials_model->get_Client_Settlement_Month($input_data);
		//echo "<pre>".$input_data['TableId']; print_r($input_data);exit;
		$data = array();
		$flag = 0;
		if($input_data['TableId'] == "ClientSettlements" || $input_data['TableId'] == "WithdrawnCases"){
			$Tot_Cases = 0;
			$Tot_Inial_Balance = 0;
			foreach($list as $result){
				$row = array();
				$row[] = $result->Case_Id;
				$row[] = $result->InjuredParty_FirstName." ".$result->InjuredParty_LastName;;
				$row[] = $result->InsuranceCompany_Name;
				$row[] = "$".number_format($result->Initial_Balance, 2);
				$row[] = $result->User_Id;
				$row[] = "P = $".number_format($result->Settlement_Amount, 2)." I = $".number_format($result->Settlement_Int, 2)." FF = $".number_format($result->Settlement_Ff, 2)." AF = $".number_format($result->Settlement_Af, 2)." Total = $".number_format($result->Settlement_Total, 2);
				$row[] = date_format(date_create(substr($result->Settlement_Date, 0, 10)), "m/d/Y");
				$row[] = $result->Settlement_Notes;
				$row[] = number_format($result->Settlement_Percentage, 2)."%";
				$Tot_Cases++;
				$Tot_Inial_Balance = $Tot_Inial_Balance + $result->Initial_Balance;
				$data[] = $row;
			}
			$row = array();
			$row[] = "Total";
			$row[] = $Tot_Cases;
			$row[] = "";
			$row[] = $Tot_Inial_Balance;
			$row[] = "";
			$row[] = "";
			$row[] = "";
			$row[] = "";
			$row[] = "";
			$data[] = $row;
		}else if($input_data['TableId'] == "ClientNewCases"){
			$Tot_Cases = 0;
			$Tot_Inial_Balance = 0;
			
			foreach($list as $result){
				$row = array();
				$row[] = $result->Case_Id;
				$row[] = $result->InjuredParty_FirstName." ".$result->InjuredParty_LastName;;
				$row[] = $result->InsuranceCompany_Name;
				$row[] = "$".number_format($result->Initial_Balance, 2);
				$row[] = $result->Status;
				$row[] = date_format(date_create(substr($result->Date_Opened, 0, 10)), "m/d/Y");
				$Tot_Cases++;
				$Tot_Inial_Balance = $Tot_Inial_Balance + $result->Initial_Balance;
				$data[] = $row;
			}
			$row = array();
			$row[] = "Total";
			$row[] = $Tot_Cases;
			$row[] = "";
			$row[] = $Tot_Inial_Balance;
			$row[] = "";
			$row[] = "";
			$data[] = $row;
		}
		
		
		$output = array( "data" => $data );
		echo json_encode($output);
	}
} 	
?>