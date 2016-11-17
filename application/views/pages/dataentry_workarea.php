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
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/metimdenu/dist/metimdenu.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/animate.css/animate.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap/dist/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css" />

<!-- App styles -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/pe-icon-7-stroke/css/helper.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/styles/style.css">
</head>
<body>

<!-- Simple splash screen-->
<div class="splash">
  <div class="color-line"></div>
  <div class="splash-title">
    <h1>Homer - Responsive Admin Theme</h1>
    <p>Special AngularJS Admin Theme for mdall and medium webapp with very clean and aesthetic style and feel. </p>
    <img src="images/loading-bars.svg" width="64" height="64" /> </div>
</div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]--> 

<!-- Header -->
<?php include 'header.php';?>

<!-- Navigation -->
<?php include 'sidebar.php';?>
<!-- Main Wrapper -->
<div id="wrapper">
<?php include 'header_workarea.php';?>
<div class="content animate-panel">

	<div class="row">
		<div class="col-lg-12">
			<div class="hpanel">
			
				<div class="panel-body">
					<div class="col-lg-12 panel-body tab-panel">
						<form method="get" >
							<h4>CASE INFORMATION</h4>
							<div class="form-group form-horizontal col-md-12">
								<p>(Note: All amounts are in USD wherever applicable.)</p>
								<label class="col-md-2 control-label">Initial Status:</label>
								<div class="col-md-4 radio">
									<label><input type="radio" value="option1" id="optionsRadios1" name="optionsRadios">ARBITRATION</label>
									<label><input type="radio" value="option2" id="optionsRadios2" name="optionsRadios">LITIGATION</label>
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-md-2 control-label">Provider Name</label>
								<div class="col-md-2">	
									<input type="text" class="form-control input-sm">
								</div>
								<label class="col-md-2 control-label">Select Provider</label>
								<div class="col-md-2">	
									<select class="form-control input-sm" name="account">
										<option>Select Provider</option>
										<option>option 2</option>
										<option>option 3</option>
										<option>option 4</option>
									</select>
								</div>
								<div class="form-horizontal col-md-12 hr-line-dashed"></div>
							</div>

							<h4>Injured Party Information</h4>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-md-2 control-label">Last Name</label>
								<div class="col-md-2">
									<input type="text" placeholder="Last Name" class="form-control input-sm"> 
								</div>
								<label class="col-md-2 control-label">First Name</label>
								<div class="col-md-2">
									<input type="text" placeholder="First Name" class="form-control input-sm">
								</div>
								<div class="form-horizontal col-md-12 hr-line-dashed"></div>
							</div>

							<h4>Insured Party Information </h4>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2">
								</div>
								<div class="col-md-6 checkbox">
									<label><input type="checkbox" >Check here if same as Patient Information.</label>
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-md-2 control-label">Last Name</label>
								<div class="col-md-2">
									<input type="text" placeholder="Last Name" class="form-control input-sm"> 
								</div>
								<label class="col-md-2 control-label">First Name</label>
								<div class="col-md-2">
									<input type="text" placeholder="First Name" class="form-control input-sm">
								</div>
								<div class="form-horizontal col-md-12 hr-line-dashed"></div>
							</div>

							<h4>Insurance Information</h4>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-md-2 control-label">Name</label>
								<div class="col-md-2">	
									<input type="text" class="form-control input-sm">
								</div>
								<label class="col-md-2 control-label">Select Insurance comp.</label>
								<div class="col-md-2">	
									<select class="form-control input-sm" name="account">
										<option>Select Insurance comp.</option>
										<option>option 2</option>
										<option>option 3</option>
										<option>option 4</option>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-md-2 control-label">Policy#</label>
								<div class="col-md-2">	
									<input type="text" class="form-control input-sm">
								</div>
								<label class="col-md-2 control-label">Claim#</label>
								<div class="col-md-2">	
									<input type="text" class="form-control input-sm">
								</div>
								<div class="form-horizontal col-md-12 hr-line-dashed"></div>
							</div>

							<h4>Accident Information</h4>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-md-2 control-label">D.O.B</label>
								<div class="col-md-2"> <input id="datapicker1" type="text" class="form-control input-sm"> </div>
								<div class="form-horizontal col-md-12 hr-line-dashed"></div>
							</div>

							<h4>Other Information </h4>
							<div class="form-group form-horizontal col-lg-12">
								<label class="col-md-2 control-label">Status</label>
								<div class="col-md-2">
									<select class="form-control input-sm" name="account">
										<option>option 1</option>
										<option>option 2</option>
										<option>option 3</option>
										<option>option 4</option>
									</select>
								</div>
								<label class="col-md-2 control-label"> Index/AAA #</label>
								<div class="col-md-2">
									<select class="form-control input-sm" name="account">
										<option>option 1</option>
										<option>option 2</option>
										<option>option 3</option>
										<option>option 4</option>
									</select>
								</div>
								<label class="col-md-2 control-label">Court Name</label>
								<div class="col-md-2">
									<select class="form-control input-sm" name="account">
										<option>option 1</option>
										<option>option 2</option>
										<option>option 3</option>
										<option>option 4</option>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-lg-12 set-bg">
								<div class="col-md-1 align-dostart">
									<label class="control-label">D.O.S-Start</label>
									<input id="datapicker2" type="text" value="02/16/2012" class="form-control input-sm">
								</div>
								<div class="col-md-1 ">
									<label class="control-label">D.O.S.-End</label>
									<input id="datapicker3" type="text" value="02/16/2012" class="form-control input-sm">
								</div>
								<div class="col-md-1">
									<label class="control-label">Claim Amt.</label>
									<input type="text" class="form-control input-sm">
								</div>
								<div class="col-md-1">
									<label class="control-label">Paid Amt.</label>
									<input type="text" class="form-control input-sm">
								</div>
								<div class="col-md-2">
									<label class="control-label">Date Bill Sent</label>
									<input id="datapicker4" type="text" value="02/16/2012" class="form-control input-sm">
								</div>
								<div class="col-md-2 ">
									<label class="control-label">Service Type</label>
									<div>
										<select class="form-control input-sm" name="account">
											<option>option 1</option>
											<option>option 2</option>
											<option>option 3</option>
											<option>option 4</option>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<label class="control-label">Denial Reason</label>
									<div>
									<select class="form-control input-sm" name="account">
										<option>option 1</option>
										<option>option 2</option>
										<option>option 3</option>
										<option>option 4</option>
									</select>
									</div>
								</div>
								<div class="col-md-1" style="text-align:center">
									<label class="control-label col-md-12">Delete</label>
									<span><button type="button" class="btn w-xs btn-info create">Add</button></span> 
								</div>
							</div>
							<div class="form-group form-horizontal col-lg-12">
								<div class="col-md-2">
									<button type="button" class="btn w-xs btn-primary">Delete Checked</button>
								</div>
							</div>
							<div class="form-group form-horizontal col-lg-12">
								<label class="col-md-2 control-label">Memo</label>
								<div class="col-md-6">
									<textarea rows="5" id="" class="form-control" name=""></textarea>
								</div>
								<div class="col-md-12">
									<button type="button" class="btn w-xs btn-primary">Save</button>
								</div>
							</div>
						</form><!--form end -->

					</div>
				</div><!--tab panel end -->
				
			</div>
		</div>
	</div>
	
</div>
  


<!-- Right sidebar -->
<div id="right-sidebar" class="animated fadeInRight"> </div>

<!-- Footer-->
<footer class="footer"> <span class="pull-right"> Example text </span> Company 2015-2020 </footer>
</div>

<!-- Vendor scripts --> 
<script src="<?php echo base_url();?>assets/vendor/jquery/dist/jquery.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/jquery-ui/jquery-ui.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/slimScroll/jquery.slimscroll.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/metimdenu/dist/metimdenu.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/iCheck/icheck.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/addactive/addactive.js"></script>

<!-- App scripts --> 
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script> 

<script>
$(function(){
	$('#datapicker1').datepicker();
	$('#datapicker2').datepicker();
	$('#datapicker3').datepicker();
	$('#datapicker4').datepicker();
	$('#datapicker5').datepicker();
	$('.input-group.date').datepicker({ });
	$('.input-daterange').datepicker({ });
});
</script>
</body>
</html>