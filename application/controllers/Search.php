<?php
session_cache_limiter('private_no_expire');

class Search extends CI_Controller{

	Public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('search_model');
		}
	public function index(){
		$this->session->all_userdata();
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$data['SearchResult']=$this->search_model->get_SearchResult();
			$this->load->view('pages/search',$data);
		}else{
			$this->load->view('pages/login');
		}
	}
	public function searchs(){
		$this->session->all_userdata();
		if(isset($this->session->userdata['logged_in'])){
			$data['SearchResult']=$this->search_model->get_SearchResult();
			$this->load->view('pages/search',$data);
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