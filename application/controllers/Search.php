<?php
session_cache_limiter('private_no_expire');
session_start();

class Search extends CI_Controller{

	public function index(){
		$this->load->view('pages/search');
	}
	public function advancedsearch(){
		$this->load->view('pages/advancedsearch');
	}
}
?>