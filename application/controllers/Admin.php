<?php
session_cache_limiter('private_no_expire');
session_start();
	class Admin extends CI_Controller{
		
	 public function index(){
		//session_destroy(); 
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
			$_SESSION["username"] = $data['username'] ;
			$_SESSION["password"] = $data['password'];
			
			$this->load->view('pages/index');
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
		 session_destroy();
		 $this->load->view('pages/login');
	 }
	 
	 public function adminprivilege(){
		 $this->load->view('pages/adminprivilege');
	 }
	 public function dataentry(){
		 $this->load->view('pages/dataentry');
	 }
	 public function search(){
		 $this->load->view('pages/search');
	 }
	 public function advancedsearch(){
		 $this->load->view('pages/advancedsearch');
	 }
	 public function caseinformation(){
		 $this->load->view('pages/caseinformation');
	 }
	 public function dataentry_workarea(){
		 $this->load->view('pages/dataentry_workarea');
	 }
	 public function fileinsert(){
		 $this->load->view('pages/fileinsert');
	 }
	 public function workflowreport(){
		 $this->load->view('pages/workflowreport');
	 }
	 public function calendar(){
		 $this->load->view('pages/calendar');
	 }
	 public function workdesk(){
		 $this->load->view('pages/workdesk');
	 }
	 public function financials(){
		 $this->load->view('pages/financials');
	 }
	 public function reports(){
		 $this->load->view('pages/reports');
	 }
	 public function rapidfunds(){
		 $this->load->view('pages/rapidfunds');
	 }
	 public function contacts(){
		 $this->load->view('pages/contacts');
	 }
	 
  } 
	 
	
?>