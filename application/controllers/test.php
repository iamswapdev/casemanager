<?php
	class Test extends CI_Controller{
	  public function index(){
		$this->load->model('model_test');  
		$this->model_test->testdb();
	  //echo"hello world";
	  $this->load->view('test');
	  
	 }
	} 
	 
	
?>