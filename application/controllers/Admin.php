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
		print_r($data);
		$check=$this->login_model->forgot_pass($data);
		if($check){
			$this->load->view('pages/sendpasslink');
		}
		else{ 
			echo "email address not match";
		}
	 }
	 public function passAuth(){
		 echo "Password is successfully created...";
	 }
	 public function logout(){
		 session_destroy();
		 $this->load->view('pages/login');
	 }
	 
	 public function contacts(){
		 $this->load->view('pages/contacts');
	 }
	 
  } 
	 
	
?>