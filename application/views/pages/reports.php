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
					<li class="active"><a data-toggle="tab" href="#tab-1">Daily Settlement Reports</a></li>
					<li class=""><a data-toggle="tab" href="#tab-2">Discontinuance Reports</a></li>
					<li class=""><a data-toggle="tab" href="#tab-3">Client Reports</a></li>
				</ul>
				
				<div class="tab-content">
					<div id="tab-1" class="tab-pane active">
						<div class="panel-body">
							<div class="col-lg-12 panel-body tab-panel">
								<form>
									<h4>Select Date Range for Settlements</h4>
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
												
											<select class="form-control input-sm" name="account">
												<option>All</option>
												<option>0%</option>
												<option>Between 0% and 70%</option>
												<option>70% and above</option>
											</select>
										</div>
										<div class="col-md-2">
											<button type="button" class="btn w-xs btn-primary">Get</button>
										</div>
										
									</div>
								</form>
							</div>
						</div>
					</div>
					
					<div id="tab-2" class="tab-pane">
						<div class="panel-body">
							<div class="col-lg-12 panel-body tab-panel">
								<form>
									<h4>Select Insurance Company Name</h4>
									<div class="form-group form-horizontal col-md-12">										
										<div class="col-md-2">
												
											<select class="form-control input-sm" name="account">
												<option>All</option>
												<option>0%</option>
												<option>Between 0% and 70%</option>
												<option>70% and above</option>
											</select>
										</div>
										
										<div class="col-md-2">
											<button type="button" class="btn w-xs btn-primary">Get</button>
										</div>
									</div>
								</form>
								
								<h5>OR</h5><div class="hr-line-dashed"></div>
								<form>
									<h4>Select Provider Name</h4>
									<div class="form-group form-horizontal col-md-12">										
										<div class="col-md-2">
												
											<select class="form-control input-sm" name="account">
												<option>All</option>
												<option>0%</option>
												<option>Between 0% and 70%</option>
												<option>70% and above</option>
											</select>
										</div>
										
										<div class="col-md-2">
											<button type="button" class="btn w-xs btn-primary">Get</button>
										</div>
									</div>
								</form>
								
								<h5>OR</h5><div class="hr-line-dashed"></div>
								<form>
									<h4>Cases for 0 Settlement Amount</h4>
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
								
								<h5>OR</h5><div class="hr-line-dashed"></div>
								<form>
									<h4>Overdue Settlement Report</h4>
									<div class="form-group form-horizontal col-md-12">										
										<label class="col-md-1 control-label">Start Date</label>										
										<div class="col-md-2">
											<input id="datapicker5" type="text" class="form-control input-sm">
										</div>
										<label class="col-md-1 control-label">End Date</label>										
										<div class="col-md-2">
											<input id="datapicker6" type="text" class="form-control input-sm">
										</div>
										
										<div class="col-md-2">
											<button type="button" class="btn w-xs btn-primary">Get</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					
					<div id="tab-3" class="tab-pane">
						<div class="panel-body">
							<div class="col-lg-12 panel-body tab-panel">
								<form>
									<h4>Client Reports</h4>
									<div class="form-group form-horizontal col-md-12">
										<label class="col-md-2 control-label">Select provider name:</label>
										<div class="col-md-2">
												
											<select class="form-control input-sm" name="account">
												<option>All</option>
												<option>0%</option>
												<option>Between 0% and 70%</option>
												<option>70% and above</option>
											</select>
										</div>
										<label class="col-md-2 control-label">Enter date range in month:</label>
										<div class="col-md-2">
											<input type="number" class="form-control input-sm">
										</div>
										<div class="col-md-2">
											<button type="button" class="btn w-xs btn-primary">Get</button>
										</div>
									</div>
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
<script>
$(function(){
	$('#datapicker1').datepicker();
	$('#datapicker2').datepicker();
	$('#datapicker3').datepicker();
	$('#datapicker4').datepicker();
	$('#datapicker5').datepicker();
	$('#datapicker6').datepicker();
	$('.input-group.date').datepicker({ });
	$('.input-daterange').datepicker({ });
});
</script>

</body>
</html>