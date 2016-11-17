<?php
	/*session_cache_limiter('private_no_expire');
	if( !isset($_SESSION["username"]) && !isset($_SESSION["password"])){
		
		header('Location: admin');
	}*/
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>Manage User</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css" />
	

    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/styles/style.css">

</head>
<body>

<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Homer - Responsive Admin Theme</h1><p>Special AngularJS Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><img src="images/loading-bars.svg" width="64" height="64" /> </div> </div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Header -->
<?php include 'header.php';?>
<!-- Navigation -->
<?php include 'sidebar.php';?>
<!-- Main Wrapper -->
<div id="wrapper">
<?php include 'header_financials.php';?>
<div class="content animate-panel">

	<div class="row">
		<div class="col-lg-12">
			<div class="hpanel">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#tab-1">Previous Postings Reports</a></li>					
					<li class=""><a data-toggle="tab" href="#tab-2">Generate Daily Client Invoice</a></li>					
					<li class=""><a data-toggle="tab" href="#tab-3">Firm Account Balance</a></li>					
					<li class=""><a data-toggle="tab" href="#tab-4">Cost Balance</a></li>				
					<li class=""><a data-toggle="tab" href="#tab-5">Exp Cost Balance</a></li>
					<li class=""><a data-toggle="tab" href="#tab-6">Filing Fees Cost</a></li>
				</ul>
			
				<div class="tab-content">
					<div id="tab-1" class="tab-pane active">
						<div class="panel-body">
							<div class="col-lg-12 panel-body tab-panel">
								<form>
									
									<h4>Select Date Range for Processed Invoices</h4>
									<div class="form-group form-horizontal col-md-12">
										<label class="col-md-1 control-label">Start Date</label>										
										<div class="col-md-2">
											<input id="datapicker1" type="text" class="form-control input-sm">
										</div>
										
										<label class="col-md-1 control-label">End Date</label>										
										<div class="col-md-2">
											<input id="datapicker2" type="text" class="form-control input-sm">
										</div>
										<div class="col-md-2">
											<button type="button" class="btn w-xs btn-primary">Get</button>
										</div>
										
									</div>
									<p> Click <a href="#">here</a> to set Check Date </p>
								</form>
							</div>
						</div>
					</div>
					
					<div id="tab-2" class="tab-pane">
						<div class="panel-body">
							<div class="col-lg-12 panel-body tab-panel">
								<form>
									<h4>Select Date Range for Summons Sent to Court</h4>
									<div class="panel-heading">
										<div class="panel-tools">
											<a class="showhide"><i class="fa fa-chevron-up"></i></a>
											<a class="closebox"><i class="fa fa-times"></i></a>
										</div>
									</div>
									<table id="example2" class="table table-striped table-bordered table-hover">
										<thead>
										<tr>
											<th>PROVIDER ID</th>
											<th>PROVIDER NAME</th>
											<th>NUMBER OF CHECKS</th>
											<th>TOTAL AMOUNT</th>
											<th>PROCESS INVOICE</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td>Abraham</td>
											<td>076 9477 4896</td>
											<td>076 9477 4896</td>
											<td>076 9477 4896</td>
											<td><button type="button" class="btn w-xs btn-primary">View Report</button></td>
										</tr>
										</tbody>
									</table>
								</form>
							</div>
						</div>
					</div>
					
					<div id="tab-3" class="tab-pane">
						<div class="panel-body">
							<div class="col-lg-12 panel-body tab-panel">
								<form>
									<h4>Select Date Range for Firm Fees</h4>
									<div class="form-group form-horizontal col-md-12">
										<label class="col-md-1 control-label">Start Date</label>										
										<div class="col-md-2">
											<input id="datapicker3" type="text" class="form-control input-sm">
										</div>
										
										<label class="col-md-1 control-label">End Date</label>										
										<div class="col-md-2">
											<input id="datapicker4" type="text" class="form-control input-sm">
										</div>
										<div class="col-md-2">
											<button type="button" class="btn w-xs btn-primary">Get</button>
										</div>
										
									</div>
								</form>
							</div>
						</div>
					</div>
					
					<div id="tab-4" class="tab-pane">
						<div class="panel-body">
							<div class="col-lg-12 panel-body tab-panel">
								<h4>Client Cost Balance</h4>
								<p><a href="#">All</a>|<a href="#">A</a>|<a href="#">B</a>|<a href="#">C</a>|<a href="#">D</a>|<a href="#">E</a>|<a href="#">F</a>|<a href="#">G</a>|<a href="#">H</a>|<a href="#">I</a>|<a href="#">J</a>|<a href="#">K</a>|<a href="#">L</a>|<a href="#">M</a>|<a href="#">N</a>|<a href="#">O</a>|<a href="#">P</a>|<a href="#">Q</a>|<a href="#">R</a>|<a href="#">S</a>|<a href="#">T</a>|<a href="#">U</a>|<a href="#">V</a>|<a href="#">W</a>|<a href="#">X</a>|<a href="#">Y</a>|<a href="#">Z</a>|</p>
								
								<div class="panel-heading">
									<div class="panel-tools">
										<a class="showhide"><i class="fa fa-chevron-up"></i></a>
										<a class="closebox"><i class="fa fa-times"></i></a>
									</div>
								</div>
								<table id="example2" class="table table-striped table-bordered table-hover">
									<thead>
									<tr>
										<th>PROVIDER ID</th>
										<th>PROVIDER NAME</th>
										<th>COST BALANCE</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td>Abraham</td>
										<td>076 9477 4896</td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Abraham</td>
										<td>076 9477 4896</td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Abraham</td>
										<td>076 9477 4896</td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Abraham</td>
										<td>076 9477 4896</td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Abraham</td>
										<td>076 9477 4896</td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Abraham</td>
										<td>076 9477 4896</td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Abraham</td>
										<td>076 9477 4896</td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Abraham</td>
										<td>076 9477 4896</td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Abraham</td>
										<td>076 9477 4896</td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Abraham</td>
										<td>076 9477 4896</td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Abraham</td>
										<td>076 9477 4896</td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Abraham</td>
										<td>076 9477 4896</td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="tab-5" class="tab-pane">
						<div class="panel-body">
							<div class="col-lg-12 panel-body tab-panel">
								<div class="panel-heading">
									<div class="panel-tools">
										<a class="showhide"><i class="fa fa-chevron-up"></i></a>
										<a class="closebox"><i class="fa fa-times"></i></a>
									</div>
								</div>
									<table id="example2" class="table table-striped table-bordered table-hover">
									<thead>
									<tr>
										<th>Select</th>
										<th>PROVIDER NAME</th>
										<th>INSURER NAME</th>
										<th>CASE ID</th>
										<th>EXP COST</th>
										<th>FFB</th>
										<th>FFC</th>
										<th>FFREC</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td><input type="checkbox" value="" /></td>
										<td>System Architect</td>
										<td>Edinburgh</td>
										<td>61</td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Garrett Winters</td>
										<td>Accountant</td>
										<td>Tokyo</td>
										<td>63</td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Ashton Cox</td>
										<td>Junior Technical Author</td>
										<td>San Francisco</td>
										<td>66</td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Cedric Kelly</td>
										<td>Senior Javascript Developer</td>
										<td>Edinburgh</td>
										<td>22</td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Airi Satou</td>
										<td>Accountant</td>
										<td>Tokyo</td>
										<td>33</td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Brielle Williamson</td>
										<td>Integration Specialist</td>
										<td>New York</td>
										<td>61</td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Herrod Chandler</td>
										<td>Sales Assistant</td>
										<td>San Francisco</td>
										<td>59</td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Rhona Davidson</td>
										<td>Integration Specialist</td>
										<td>Tokyo</td>
										<td>55</td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Colleen Hurst</td>
										<td>Javascript Developer</td>
										<td>San Francisco</td>
										<td>39</td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Sonya Frost</td>
										<td>Software Engineer</td>
										<td>Edinburgh</td>
										<td>23</td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Sonya Frost</td>
										<td>Software Engineer</td>
										<td>Edinburgh</td>
										<td>23</td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									<tr>
										<td>Sonya Frost</td>
										<td>Software Engineer</td>
										<td>Edinburgh</td>
										<td>23</td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
										<td><input type="text" class="form-control input-sm"></td>
									</tr>
									
									</tbody>
									</table>
									<div class="col-md-2">
										<button type="button" class="btn w-xs btn-primary">Submit</button>
									</div>
							</div>
						</div>
					</div>
					
					<div id="tab-6" class="tab-pane">
						<div class="panel-body">
							<div class="col-lg-12 panel-body tab-panel">
								<form>
									<h4>Select Date Range for Pending Resons</h4>
									
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
                
    <!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
            Example text
        </span>
        Company 2015-2020
    </footer>

</div>



<!-- Vendor scripts -->
<script src="<?php echo base_url();?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script>
<script src="<?php echo base_url();?>assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/addactive/addactive.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>

<!-- App scripts -->
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
<script>

    $(function () {

        // Initialize Example 1
        $('#example1').dataTable( {
            "ajax": 'api/datatables.json'
        });

        // Initialize Example 2
        $('#example2').dataTable();
		$('#example3').dataTable();

    });

</script>
$(function(){
	$('#datapicker1').datepicker();
	$('#datapicker2').datepicker();
	$('#datapicker3').datepicker();
	$('#datapicker4').datepicker();
});
</script>

</body>
</html>