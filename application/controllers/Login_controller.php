<?php
session_cache_limiter('private_no_expire');
session_start();
	class Login_controller extends CI_Controller{
		
	  public function index(){
		//session_destroy(); 
	  $this->load->view('pages/login');
	  
	 }
	 public function getData()
	 { 
	 
	   /*if( isset($_SESSION["username"])){	
			echo "set";
			redirect('forgotpassword', 'refresh');
		}else{
			echo "not set";
			redirect('getdata', 'refresh');
		}*/
		$this->load->model('login_model');
		$data=array(
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
		); 
		$check=$this->login_model->autho($data);
		if($check){
			//echo "success"; 
			
			$_SESSION["username"] = $data['username'] ;
			$_SESSION["password"] = $data['password'];
			echo "set";
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
			'email'=>$this->input->post('email')
		); 
		$check=$this->login_model->forgot_pass($data);
		if($check){
			$link = base_url().'recovry/recover';
			email($data['email'], $link);
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