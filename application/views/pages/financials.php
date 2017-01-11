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
    <title>CaseSettelments</title>

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
<!--<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Homer - Responsive Admin Theme</h1><p>Special AngularJS Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><img src="images/loading-bars.svg" width="64" height="64" /> </div> </div>-->
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
						<div class="row">
							<div class="col-lg-12">
							<div class="hpanel">
							<div class="panel-heading"></div>
							<div class="panel-body tab-panel">
								
								<form>
									<div class="form-group form-horizontal col-md-12">
										<h4 class="h4-title">Select Date Range for Processed Invoices</h4>
										<label class="col-md-1 control-label">Start Date</label>										
										<div class="col-md-1">
											<input type="text" class="form-control input-sm datepicking">
										</div>
										
										<label class="col-md-1 control-label">End Date</label>										
										<div class="col-md-1">
											<input type="text" class="form-control input-sm datepicking">
										</div>
										<div class="col-md-2">
											<button type="button" class="btn btn-primary">Get</button>
										</div>
										
									</div>
									<div class="form-group form-horizontal col-md-12">
										<label class="col-md-2 control-label">Click <a href="#">here</a> to set Check Date</label>
									</div>
								</form>
								
							</div><!-- End of panel-body tab-panel-->
							</div><!-- End hpanel -->
							</div><!-- End col-lg-12-->
						</div><!-- End row-->
						<div class="row">
							<div class="col-lg-12">
							<div class="hpanel">
							<div class="panel-heading"></div>
							<div class="panel-body tab-panel">
								
								<div class="form-group form-horizontal col-md-12"> 	
									<div class="table-responsive">
										
										<div class="table-responsive">
											<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
												<thead> 	 	 	 	 	 		 	 	
												<tr>  	 	 	 	 	 	 	 	 	 	 	 	 	
													<th>PROVIDER ID</th>
													<th>PROVIDER NAME</th>
													<th>GROSS AMOUNT</th>
													<th>FEES</th>
													<th>CLIENT REMIT AMOUNT</th>
													<th>FIRM REMIT AMOUNT</th>
													<th>PRINT CHECKS</th>
													<th>PRINT INVOICE</th>
													<th>INVOICE ID</th>
													<th>GENERATED ON</th>
													<th>PRINTED ON</th>
													<th>CONFIRM PRINTING</th>
													<th>REVERSE INVOICE</th>
												</tr>
												</thead>
												<tbody>
												<tr>
													
												</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								
							</div><!-- End of panel-body tab-panel-->
							</div><!-- End hpanel -->
							</div><!-- End col-lg-12-->
						</div><!-- End row-->
						
					</div>
					
					<div id="tab-2" class="tab-pane">
						<div class="row">
							<div class="col-lg-12">
							<div class="hpanel">
							<div class="panel-heading"></div>
							<div class="panel-body tab-panel">
								
								<div class="form-group form-horizontal col-md-12"> 	 	 	 	 	 	 	
									<div class="table-responsive">
										<!--<h4 class="h4-title"> <<< <a href="<?php //echo base_url();?>search/advancedsearch">Advanced Search</a></h4>-->
										<div class="table-responsive DailySettlementReports">
											<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
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
													<td><button type="button" class="btn btn-primary">View Report</button></td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								
							</div><!-- End of panel-body tab-panel-->
							</div><!-- End hpanel -->
							</div><!-- End col-lg-12-->
						</div><!-- End row-->
					</div>
					
					<div id="tab-3" class="tab-pane">
						<div class="row">
							<div class="col-lg-12">
							<div class="hpanel">
							<div class="panel-heading"></div>
							<div class="panel-body tab-panel">
								
								<form>
									<h5 class="h4-title">Select Date Range for Firm Fees</h5>
									<div class="form-group form-horizontal col-md-12">
										<label class="col-md-1 control-label">Start Date</label>										
										<div class="col-md-1">
											<input type="text" name="SD_FirmFees" class="form-control input-sm datepicking">
										</div>
										
										<label class="col-md-1 control-label">End Date</label>										
										<div class="col-md-1">
											<input type="text" name="ED_FirmFees" class="form-control input-sm datepicking">
										</div>
										<div class="col-md-2">
											<button type="button" id="FirmFees_btn" class="btn btn-primary">Get</button>
										</div>
										
									</div>
								</form>
								
							</div><!-- End of panel-body tab-panel-->
							</div><!-- End hpanel -->
							</div><!-- End col-lg-12-->
						</div><!-- End row-->

						<div class="row">
							<div class="col-lg-12">
							<div class="hpanel">
							<div class="panel-heading"></div>
							<div class="panel-body tab-panel">
								<div class="form-group form-horizontal col-md-12">
                                    <div class="col-md-12">
                                        <table id="FirmFees" class="table dataTable table-bordered table-striped">
                                            <thead>
                                            <tr> 
                                                <th>PROVIDER ID</th>
                                                <th>PROVIDER NAME</th>
                                                <th>CASE ID</th>
                                                <th>INDEX NUMBER</th>
                                                <th>FFC</th>
                                                <th>AF</th>
                                                <th>DATE</th>
                                                <th>DESCRIPTION</th>
                                            </tr>
                                            </thead>
                                        </table>
                                        
                                    </div>
                                </div>
                                
							</div><!-- End of panel-body tab-panel-->
							</div><!-- End hpanel -->
							</div><!-- End col-lg-12-->
						</div><!-- End row-->
						
					</div>
					
					<div id="tab-4" class="tab-pane">
						<div class="row">
							<div class="col-lg-12">
							<div class="hpanel">
							<div class="panel-heading"></div>
							<div class="panel-body tab-panel">
								<!-- <p><a href="#">All</a>|<a href="#">A</a>|<a href="#">B</a>|<a href="#">C</a>|<a href="#">D</a>|<a href="#">E</a>|<a href="#">F</a>|<a href="#">G</a>|<a href="#">H</a>|<a href="#">I</a>|<a href="#">J</a>|<a href="#">K</a>|<a href="#">L</a>|<a href="#">M</a>|<a href="#">N</a>|<a href="#">O</a>|<a href="#">P</a>|<a href="#">Q</a>|<a href="#">R</a>|<a href="#">S</a>|<a href="#">T</a>|<a href="#">U</a>|<a href="#">V</a>|<a href="#">W</a>|<a href="#">X</a>|<a href="#">Y</a>|<a href="#">Z</a>|</p> -->
								
                                <div class="form-group form-horizontal col-md-12">
                                    <h5 class="h4-title">CLIENT COST BALANCE</h5>
                                    <div class="col-md-12">
                                        <table id="CostBalance" class="table dataTable table-bordered table-striped">
                                            <thead>
                                            <tr> 
                                                <th>PROVIDER ID</th>
                                                <th>PROVIDER NAME</th>
                                                <th>COST BALANCE</th>
                                            </tr>
                                            </thead>
                                        </table>
                                        
                                    </div>
                                </div>
                                
								<div class="form-group form-horizontal col-md-12">
									<div class="col-md-4">
										<button type="button" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
									</div>
								</div>
								
							</div><!-- End of panel-body tab-panel-->
							</div><!-- End hpanel -->
							</div><!-- End col-lg-12-->
						</div><!-- End row-->
						
					</div>
					<div id="tab-5" class="tab-pane">
						<div class="row">
							<div class="col-lg-12">
							<div class="hpanel">
							<div class="panel-heading"></div>
							<div class="panel-body tab-panel">
								<div class="form-group form-horizontal col-md-12">
                                    <h5 class="h4-title">EXP COST BALANCE</h5>
                                    <div class="col-md-12">
                                        <table id="ExpCostBalance" class="table dataTable table-bordered table-striped">
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
                                        </table>
                                    </div>
                                </div>
								
							</div><!-- End of panel-body tab-panel-->
							</div><!-- End hpanel -->
							</div><!-- End col-lg-12-->
						</div><!-- End row-->
					</div>
					
					<div id="tab-6" class="tab-pane">
						<div class="row">
							<div class="col-lg-12">
							<div class="hpanel">
							<div class="panel-heading"></div>
							<div class="panel-body tab-panel">
								
								<div class="table-responsive"> 	 	 	 	 	 	 	
									<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
										<thead>
										<tr>
											<th>Select</th>
											<th>CASE ID</th>
											<th>INSURER NAME</th>
											<th>PROVIDER NAME</th>
											<th>INSURANCE COMPANY NAME</th>
											<th>VENUE</th>
											<th>DATE OPENED </th>
											<th>DATE PRINTED</th>
											<th>STATUS</th>
											<th>COST</th>
											<th>AWAITING PROVIDER VERIFICATION</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td colspan="8"><button class="btn btn-primary " type="submit" data-toggle="modal" data-target="#myModal"><i class="fa fa-check"></i>Process</button></td>
											<td>Checkcount <input type="text" class="form-control input-sm input-height"></td>
											<td>Total=0 <br> Count=0</td>
											<td></td>
										</tr>
										</tbody>
									</table>
								</div>

								
							</div><!-- End of panel-body tab-panel-->
							</div><!-- End hpanel -->
							</div><!-- End col-lg-12-->
						</div><!-- End row-->
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
<script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>

<!-- App scripts -->
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
<script>
$(document).ready(function(e) {
    $('#CostBalance').dataTable( {
		"ajax": "get_Cost_Balance",
		"iDisplayLength": 10,
		"aLengthMenu": [5, 10, 20, 25, 50, "All"],
		"bSort": false,
	});
	$("#FirmFees_btn").click(function(){
		var SD = $("input[name=SD_FirmFees]").val();
		var ED = $("input[name=ED_FirmFees]").val();
		$("#FirmFees").dataTable().fnDestroy();
		$('#FirmFees').dataTable( {
			"ajax": {
				"url": "get_Firm_Fees",
				"data": {"SD_FirmFees":SD, "ED_FirmFees":ED},
				"type": "post"
			},
			"bSort": false,
			"iDisplayLength": 10,
			"aLengthMenu": [5, 10, 20, 25, 50, "All"]
		});
	});
	/*$('#ExpCostBalance').dataTable( {
		"ajax": "get_Exp_Cost_Balance",
		"iDisplayLength": 10,
		"aLengthMenu": [5, 10, 20, 25, 50, "All"],
		"bSort": false,
	});*/
	
	
	$('.datepicking').datepicker({
		"autoclose": true,
		"todayHighlight": true
	});
	
});//End of Document
</script>

<script>
	$('.financials').addClass('active');
	$('.financials-page').addClass('active');
</script>
</body>
</html>