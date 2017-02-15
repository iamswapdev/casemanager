<?php
session_cache_limiter('private_no_expire');
class Test_controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('string');
		$this->load->helper('captcha');
		$this->load->helper('date');
	}
	public function index(){
		echo "Test_controller Index";
		echo "<br>string helper random_string function: ".random_string('alnum', 16);
		echo "<br>".increment_string('file', '_'); // "file_1"
		echo increment_string('file', '-', 2); // "file-2"
		echo increment_string('file_4'); // "file_5"
		echo "<br>alternator:<br>";
		for ($i = 0; $i < 10; $i++)
		{
			echo alternator('one', 'two', 'three', 'four', 'five');
		}
		echo "<br>date helper:<br>";
		$datestring = 'Year: %Y Month: %m Day: %d - %h:%i %a';
		$time = time();
		echo mdate($datestring, $time);
		$bad_date = '199605';
		// Should Produce: 1996-05-01
		$better_date = nice_date($bad_date, 'Y-m-d');
		echo "<br>Date 1:".$better_date;
		
		$bad_date = 'Jun 12 2017 12:00 am';
		// Should Produce: 2001-09-11
		$better_date = nice_date($bad_date, 'Y-m-d');
		echo "<br>Date 1:".$better_date;
	}
}