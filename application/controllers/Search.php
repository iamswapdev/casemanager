<?php
class Login_controller extends CI_Controller{
		
	 public function index(){
		//session_destroy(); 
	  $this->load->view('pages/login');
	  
	 }
 }
?>