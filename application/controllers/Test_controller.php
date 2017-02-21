<?php
session_cache_limiter('private_no_expire');
class Test_controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('string');
		$this->load->helper('captcha');
		$this->load->helper('date');
		$this->load->helper('email');
		$this->load->helper('file');
		$this->load->helper('case');
		$this->load->helper('url');
		$this->load->library('encrypt');
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
		
		echo "<br>Email helper......<br>";
		if (valid_email('email@somesite.com')){
			echo 'email is valid';
		}
		else{
			echo 'email is not valid';
		}
		$Path = '../controllers/Test_controller.php';
		echo "path= ".$Path;
		echo "<br>File helper........<br>";
		$string = read_file($Path);
		echo $string;
		echo "<br>Case helper........<br>";
		echo "<br>now:".get_Case_Id();
		echo "<br>Url helper........<br>";
		echo "<br>current url:".current_url();
		echo "<br>Encrypt library........<br>";
		$msg = 'My secret message';
		echo "<br> Ecrypted msg: ".$this->encrypt->encode($msg);
		echo "<br>Encryption key...";
		$msg = 'My secret message';
		$key = 'super-secret-key';
		
		echo "Encrypted msg: ".$this->encrypt->encode($msg, $key);
	}
	
//test method
	public function testmethod(){
		/*$Case_Id = $this->dataentry_model->get_Last_Case_Id();
		echo "CaseID:".$_SERVER['REQUEST_URI'];exit;
		$this->db->where('order_date >=', $first_date);
		$this->db->where('order_date <=', $second_date);
		return $this->db->get('orders');
		/*echo "Case_Id: ".$this->Case_Id; exit();
		$date = date('Y-m-d H:i:s');
		echo "date:".date('Y');
		//2014-06-17 00:00:00.00000
		$q = date_create("2014-06-17");
		$w = date_format($q, "m/d/Y");
		echo "<br>JJJ:".substr(date("Y"), 2, 2);
		echo "username:".$this->session->userdata['username'];
		$date2="";
		$date3= date_create(substr($date2,0,19));
		echo "<br>Data:".$date2;
		echo "<br><br>New format:".date_format(date_create(substr($date2,0,19)),"m/d/Y")."<br></br>";
		//echo "<br>NNN:".substr(date_format($date2, 'm/d/Y H:i:s'), 0,10);
		echo "<br>base_url:".base_url();
		echo "<br>Time zone:".date_default_timezone_get();*/
		echo "<br>Current Time: ".date("Y-m-d h:i:s");
		echo "<br>$ testing:".str_replace('$', '', 'hellogg');
		$date=date_create("2013-03-15");
		echo "<br><br>1st Date:".date_format($date,"Y-m-d");
		echo "<br><br>Substract 40 days";
		date_sub($date,date_interval_create_from_date_string("1 months"));
		echo "<br><br>New Date:".date_format($date,"Y-m-d");
		echo "<br><br>current day's:".date("d");
		$ddd = date("m/d/Y");
		echo "First date of current month:".date_format(date_sub(date_create($ddd),date_interval_create_from_date_string((date("d")-1)." days")), "m/d/Y");
		$first = date_format(date_sub(date_create($ddd),date_interval_create_from_date_string((date("d")-1)." days")), "m/d/Y");
		
		echo "<br><br>Date before 2 months:".date_format(date_sub(date_create($first),date_interval_create_from_date_string("2 months")), "m/d/Y");
		
		$query_date = '2010-02-04';

		// First day of the month.
		echo "<br>Date: '2010-02-04'<br>First day of the month:".date('Y-m-01', strtotime($query_date));
		
		// Last day of the month.
		echo "<br>Last day of the month.:".date('Y-m-t', strtotime($query_date));
		
		$date=date_create("jun 13 2012");
		echo "<br>text date:".date_format($date,"Y/m/d");
		
		$timestamp = strtotime( "February 15, 2015" );
   
   		echo "<br>Feb 15, 2015 = ".date( 'Y-m-d', $timestamp );
		if("alla" == "ALLA"){
			echo "<br>true";
		}else { echo "<br>false";}
		echo "<br>".strcasecmp("H","h");
		
		echo "<br>".strcasecmp("Hello","hELLo");
		
		$dir = "C:/xampp/htdocs/casemanager/application/views/templates/*.php*";
		//$files1 = glob($dir);
		//echo "<pre>";print_r($files1);
		
		$images = glob($dir);   
		foreach($images as $image) {
			echo str_replace(".php", "", basename($image)). "<br>";
		}	
		
		$Folder_Name = array("BILLS", "AOB", "DENIALS", "SUMMONS-AND-COMPLAINT", "AFF-OF-SERVICE", "PAYMENTS", "SETTLEMENT-DOCS", "ANSWER", "THEIR-DEMANDS", "POM", "INDEX NUMBER", "DELAY LETTER", "PROVIDERS DOCUMENTS", "CORRESPONDENCE", "ACKNOWLEDGEMENT", "PEER REVIEW", "POLICE REPORT", "CERTIFICATE OF INCORPORATION", "LICENSES", "ANSWER DEMANDS", "AFF IN OPPOSITION", "EBT", "DISCOVERY CONFERENCE", "DEF SUPPLEMENTAL DEMANDS", "CONSENT TO CHANGE ATTORNEY", "PEER REVIEW", "IME", "OUR DEMANDS", "OUR DISCOVERY RESPONSES", "VERIFICATION REQUEST", "VERIFIED ANSWER", "UNCATEGORIZED", "Bills", "Bills", "Saved Letters", "Packet Exhibits", "Packet Document", "OUR MOTIONS", "ARBITRATIONS"
		);
		foreach($Folder_Name as $row){
			//echo "G:".$row;
		}
		/*$file = base_url().'RIS PACS Manual 2016.pdf';
		$filename = 'filename.pdf';
		header('Content-type: application/pdf');
		header('Content-Disposition: inline; filename="' . $filename . '"');
		header('Content-Transfer-Encoding: binary');
		header('Accept-Ranges: bytes');
		@readfile($file);*/
		
		//echo "<iframe src='".base_url()."RIS PACS Manual 2016.pdf' width=\"100%\" style=\"height:100%\"></iframe>";
		echo "<br>Folder size:".number_format(($this->folderSize("C:/xampp/htdocs/casemanager/Cases"))/1048576, 2)." MB";
		
		echo "<br>Array ************************* ********************";
		$data2 = array(
			"first" => "first",
			"second" => "second"
		);
		$data2["third"] = "third";
		echo "<pre>"; print_r($data2);
		echo "<br>date and time concate.....";
		$date=date_create("2013-03-15");
		echo "<br>1st Date:".date_format($date,"m/d/Y H:i");
		echo "<br><h2>search page date issue.....</h2><br>";
		$d1 = date_create("jan 1 2010");
		$d2 = date_create("jan 10 2010");
		echo "<a href='viewcase/1'>".date_format($d1, 'm/d/Y')." - ".date_format($d2, 'm/d/Y')."</a>";
		$this->jquery->toggle("#first");
		$this->load->view("pages/htmldemo");
	}
	public function folderSize($dir){
		$count_size = 0;
		$count = 0;
		$dir_array = scandir($dir);
		  foreach($dir_array as $key=>$filename){
			if($filename!=".." && $filename!="."){
			   if(is_dir($dir."/".$filename)){
				  $new_foldersize = $this->foldersize($dir."/".$filename);
				  $count_size = $count_size+ $new_foldersize;
				}else if(is_file($dir."/".$filename)){
				  $count_size = $count_size + filesize($dir."/".$filename);
				  $count++;
				}
		   }
		 }
		return $count_size;
	}
	
}