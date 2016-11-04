<?php
session_start();
	class CMindex extends CI_Controller{
	  public function index(){
	  	$this->load->view('pages/index');
	 }
	 public function contacts(){
		 $this->load->view('pages/contacts');
	 }
	 
	} 
	 
	
?>