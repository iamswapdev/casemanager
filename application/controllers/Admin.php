<?php
session_cache_limiter('private_no_expire');
	class Admin extends CI_Controller{
		
	Public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin_privilege_model');
		$this->load->model('dataentry_model');
		$this->session->all_userdata();
	}
	public function index(){
		//$this->load->library('session');
		$CurrentPage['CurrentUrl'] = "search/advancedsearch";
		$this->load->view('pages/login', $CurrentPage);
	}
	public function get_Assigned_Menus_New($User_Role){
		//$this->session->all_userdata();
		$data = $this->admin_privilege_model->get_Assigned_Menus($User_Role);
		//echo "<pre>";print_r($data); exit;
		return $data;
	}
	public function dashboard()
	{ 	
		$CurrentUrl = $this->input->post('currenturl');
		$this->load->model('login_model');
		$data=array(
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password')
		); 
		
		$check=$this->login_model->autho($data);
		$RoleIddata=array(
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password')
		); 
		$result['Role']=$this->login_model->get_RoleId($RoleIddata);
		if($check){
			$session_data = array(
				'username'  => $data['username'],
				'password'     => $data['password'],
				'RoleId' => $result['Role'][0]['RoleId'],
				'logged_in' => TRUE
			);
			$this->session->set_userdata($session_data);
			//$session_set=$this->session->set_userdata('logged_in', $session_data);
			//echo "Current url:".$_SERVER['REQUEST_URI'];
			$Base_Url = base_url();
			redirect($Base_Url.$CurrentUrl);
			//redirect("search/advancedsearch");
			//$this->load->view('pages/advancedsearch');
		}else{
			$this->load->view('pages/error_one');
		}		
	}
	public function forgotPassword(){
		$this->load->view('pages/forgotpassword');
	}
	public function emailAuth(){
		$this->load->model('login_model');
		$data=array(
			'email_address'=>$this->input->post('email')
		); 
		
		$check=$this->login_model->forgot_pass($data);
		
		if($check){
			$this->load->view('pages/sendpasslink');
		}
		else{ 
			$this->load->view('pages/errorpasslink');
		}
	}
	public function passAuth(){
		echo "Password is successfully created...";
	}
	public function logout(){
		$this->session->sess_destroy();
		//echo "Session distroyed";
		$CurrentPage['CurrentUrl'] = "search/advancedsearch";
		$this->load->view('pages/login', $CurrentPage);
	}
	
	public function adminprivilege(){
		//$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/adminprivilege');
		}else{
			$this->load->view('pages/login');
		}
		
	}
	public function dataentry(){
		//$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/dataentry');
		}else{
			$this->load->view('admin');
		}
		
	}
	public function search(){
		//$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/search');
		}else{
			$this->load->view('admin');
		}
	}
	public function advancedsearch(){
		//$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/advancedsearch');
		}else{
			$this->load->view('admin');
		}
	}
	public function contacts(){
		//$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$data['Assigned_Menus'] = $this->get_Assigned_Menus_New($this->session->userdata['RoleId']);
			$this->load->view('pages/contacts', $data);
		}else{
			$this->load->view('admin');
		}
	}
/* GET CONTACT DATA */
	public function get_Contact_Data(){
		$list=$this->dataentry_model->get_Adjuster_Objects();
		//echo "<pre>";print_r($list);exit();
		$data = array();
		foreach ($list as $result) {
			$row = array();
			
			$row[] = $result->Adjuster_FirstName;
			$row[] = $result->InsuranceCompany_Name;
			$row[] = "";
			$row[] = "";
			$row[] = "";
			$row[] = "";
			$row[] = $result->Adjuster_Phone;
			$row[] = $result->Adjuster_Fax;
			$row[] = $result->Adjuster_Email;
			$row[] = "Adjuster";
			
			$data[] = $row;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}
	 
} 
	 
	
?>