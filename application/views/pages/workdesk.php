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
<div class="content animate-panel">
	<div class="row">
		<div class="col-lg-12">
			<div class="hpanel">
				<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#tab-1">Rapid Fund Search</a></li>
				<li class=""><a data-toggle="tab" href="#tab-2">Unconfirmed Deposits</a></li>
				<li class=""><a data-toggle="tab" href="#tab-3">Confirmed Deposits</a></li>
				</ul>
				
				<div class="tab-content">
					<div id="tab-1" class="tab-pane active">
						<div class="panel-body">

							<div class="row">
							<div class="col-lg-12">
							<div class="hpanel">
							<div class="panel-body tab-panel">
								<h4>Provider Local Address</h4>
								<form method="get" class="form-horizontal">
									<div class="form-group form-horizontal">
										<label class="col-sm-2 control-label">Start Date</label>
										<div class="col-sm-2"> <input id="datapicker1" type="text" class="form-control"> </div>
										<label class="col-sm-2 control-label">End Date</label>
										<div class="col-sm-2"> <input id="datapicker2" type="text" class="form-control"> </div>
									</div>
									<div class="form-group form-horizontal">
										<div class="col-lg-4 animated-panel zoomIn" style="animation-delay: 0.2s;">
											<div class="col-sm-10">Select Provider<select class="form-control m-b" name="account" multiple>
											<option>option 1</option>
											<option>option 2</option>
											<option>option 3</option>
											<option>option 4</option>
											</select>
											</div>
										</div>
										<div class="col-lg-4 animated-panel zoomIn" style="animation-delay: 0.2s;">
											<div class="col-sm-10">Select Insurance Company<select class="form-control m-b" name="account" multiple>
											<option>option 1</option>
											<option>option 2</option>
											<option>option 3</option>
											<option>option 4</option>
											</select>
											</div>
										</div>
									</div>
									<div class="form-group form-horizontal"><div class="col-sm-4">
									<button type="button" class="btn w-xs btn-info create">Submit</button>
									</div>
									</div>
								</form>
							</div>
							</div>
							</div>
							</div>

						</div>
						<!--tab-pane--> 
					</div><!--tab 1 close-->
					<!--tab1panel-->
					
					<div id="tab-2" class="tab-pane">
						<div class="panel-body">

							<div class="row">
							<div class="col-lg-12 animated-panel zoomIn" style="animation-delay: 0.4s;">
							<div class="hpanel">
							<div class="panel-body tab-panel">
								<h4>Rapid Fund Deposits</h4>
								<div class="form-group form-horizontal">
									<form method="get" class="form-horizontal">
                                    	<div class="form-group">
                                        	<div class="col-sm-10">
												<div class="radio">
													<label> <input type="radio" name="Radios-ucd">Confirmed</label>
													<label> <input type="radio" name="Radios-ucd">Unconfirmed</label>
												</div>
											</div>
                                        </div>
                                        <div class="form-group">
                                        	<div class="col-sm-12">
                                                <button type="button" class="btn w-xs btn-info create">Submit</button>
                                            </div>
                                        </div>
                                    </form>
								</div>
							</div>
							</div>
							</div>
							</div>

						</div>
					</div><!--tab 2 close--> 
					
					<div id="tab-3" class="tab-pane">
						<div class="panel-body">

							<div class="row">
							<div class="col-lg-12 animated-panel zoomIn" style="animation-delay: 0.4s;">
							<div class="hpanel">
							<div class="panel-body tab-panel">
								<h4>Rapid Fund Deposits</h4>
								<div class="form-group form-horizontal">
									<form method="get" class="form-horizontal">
                                    	<div class="form-group">
                                        	<div class="col-sm-10">
												<div class="radio">
													<label> <input type="radio" name="Radios-cd">Confirmed</label>
													<label> <input type="radio" name="Radios-cd">Unconfirmed</label>
												</div>
											</div>
                                        </div>
                                        <div class="form-group">
                                        	<div class="col-sm-12">
                                                <button type="button" class="btn w-xs btn-info create">Submit</button>
                                            </div>
                                        </div>
                                    </form>
								</div>
							</div>
							</div>
							</div>
							</div>

						</div>
					</div><!--tab 3 close--> 
				</div><!--tab content close-->
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

<!-- App scripts -->
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
<script>
$(function(){
$('#datapicker1').datepicker();
$('#datapicker2').datepicker();
  $('.input-group.date').datepicker({ });
  $('.input-daterange').datepicker({ });
});
</script>

</body>
</html>