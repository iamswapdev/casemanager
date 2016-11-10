<?php
session_cache_limiter('private_no_expire');

class Search extends CI_Controller{

	Public function __construct(){
			parent::__construct();
			$this->load->library('session');
		}
	public function index(){
		$this->session->all_userdata();
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/search');
		}else{
			$this->load->view('pages/login');
		}
	}
	public function searchs(){
		$this->session->all_userdata();
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/search');
		}else{
			$this->load->view('pages/login');
		}
	}
	public function advancedsearch(){
		$this->session->all_userdata();
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('pages/advancedsearch');
		}else{
			$this->load->view('pages/login');
		}
	}
}
?>