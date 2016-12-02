<?php
session_cache_limiter('private_no_expire');
	class Admin extends CI_Controller{
		
	Public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	public function index(){
		//$this->load->library('session');
		$this->load->view('pages/login');
	}
	public function dashboard()
	{ 	
		$this->load->model('login_model');
		$data=array(
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
		); 
		
		$check=$this->login_model->autho($data);
		if($check){
			$session_data = array(
				'username'  => $data['username'],
				'password'     => $data['password'],
				'logged_in' => TRUE
			);
			
			$session_set=$this->session->set_userdata('logged_in', $session_data);
			redirect("search/advancedsearch");
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
		$this->load->view('pages/login');
	}
	
	public function adminprivilege(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/adminprivilege');
		}else{
			$this->load->view('pages/login');
		}
		
	}
	public function dataentry(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/dataentry');
		}else{
			$this->load->view('admin');
		}
		
	}
	public function search(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/search');
		}else{
			$this->load->view('admin');
		}
	}
	public function advancedsearch(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/advancedsearch');
		}else{
			$this->load->view('admin');
		}
	}
	public function caseinformation(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/caseinformation');
		}else{
			$this->load->view('admin');
		}
	}
	public function dataentry_workarea(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/dataentry_workarea');
		}else{
			$this->load->view('admin');
		}
	}
	public function fileinsert(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/fileinsert');
		}else{
			$this->load->view('admin');
		}
	}
	public function workflowreport(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/workflowreport');
		}else{
			$this->load->view('admin');
		}
	}
	public function calendar(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/calendar');
		}else{
			$this->load->view('admin');
		}
	}
	public function workdesk(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/workdesk');
		}else{
			$this->load->view('admin');
		}
	}
	public function financials(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/financials');
		}else{
			$this->load->view('admin');
		}
	}
	public function reports(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/reports');
		}else{
			$this->load->view('admin');
		}
	}
	public function rapidfunds(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/rapidfunds');
		}else{
			$this->load->view('admin');
		}
		
	}
	public function contacts(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/contacts');
		}else{
			$this->load->view('admin');
		}
	}
	 
} 
	 
	
?>