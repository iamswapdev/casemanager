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
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/sweetalert/lib/sweet-alert.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/toastr/build/toastr.min.css" />
    
    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/styles/style.css">

</head>
<body>

<!-- Simple splash screen-->
<!--<div class="splash">
  <div class="color-line"></div>
  <div class="splash-title">
    <h1></h1>
    <p> </p>
    <img src="images/loading-bars.svg" width="64" height="64" /> </div>
</div>-->
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]--> 

<!-- Header -->
<?php include 'header.php';?>

<!-- Navigation -->
<?php include 'sidebar.php';?>
<!-- Main Wrapper -->
<div id="wrapper">
<?php include 'header_dataentry.php';?>
  <div class="content animate-panel">
    <div class="row">
      <div class="col-lg-12">
        <div class="hpanel">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-1" href="#tab-1">Add Ins. Company</a></li>
            <li class=""><a id="tab2" data-toggle="tab" href="#tab-2">Edit Ins. Company</a></li>
          </ul>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
				<div class="row">
					<div class="col-lg-12">
					<div class="hpanel">
					<div class="panel-heading"></div>
					<div class="panel-body tab-panel">
						
						<form id="addInsuranceInfo" action="add_InsuranceInfo" method="post" class="form-horizontal">
							<h5 class="h4-title">Insurance Company Information</h5>
							<div class="form-group">
								<label class="col-sm-2 control-label">Name <span class="required-field">*</span></label>
								<div class="col-sm-5">
									<input type="text" id="name" name="name" class="form-control input-sm" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Suit <span class="required-field">*</span></label>
								<div class="col-sm-5">
									<input type="text" id="suit" name="suit" class="form-control input-sm" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Type <span class="required-field">*</span></label>
								<div class="col-sm-5">
									<input type="text" id="type" name="type" class="form-control input-sm" required>
								</div>
							</div>
							
							<h5 class="h4-title">Insurance Company Local Address</h5>
							<div class="form-group form-horizontal col-sm-12 ">
								<label class="col-sm-2 control-label">Address <span class="required-field">*</span></label>
								<div class="col-sm-5">
									<textarea rows="3" id="addressLocal" name="addressLocal" class="form-control" required></textarea>
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12">
								<label class="col-sm-2 control-label">Zip <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<input type="text" id="zipLocal" name="zipLocal"  class="form-control input-sm" required>
									<!--<input type="text" placeholder=".input-sm" class="form-control input-sm">--> 
								</div>
								<label class="col-sm-1 control-label">City <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<input type="text" id="cityLocal" name="cityLocal" class="form-control input-sm" required>
								</div>
								<label class="col-sm-1 control-label">State <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<select class="form-control input-sm"  id="stateLocal" name="stateLocal" required>
										<option selected="selected" value=""></option>
										<?php foreach($State_Name as $row){?>
										<option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12">
								<label class="col-sm-2 control-label">Phone <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<input type="text" id="phoneLocal" name="phoneLocal" class="form-control input-sm" required>
								</div>
								<label class="col-sm-1 control-label">Fax</label>
								<div class="col-sm-1">
									<input type="text" id="faxLocal" name="faxLocal" class="form-control input-sm">
								</div>
							</div>
							
							<h5 class="h4-title">Insurance Company Perm.Address</h5>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-6 checkbox">
									<label><input type="checkbox" id="checkbox1" >Check here if permanent address info is same.</label>
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12 ">
								<label class="col-sm-2 control-label">Address <span class="required-field">*</span></label>
								<div class="col-sm-5">
									<textarea rows="3" id="addressPermanent" name="addressPermanent" class="form-control" required></textarea>
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12">
								<label class="col-sm-2 control-label">Zip <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<input type="text" id="zipPermanent" name="zipPermanent" class="form-control input-sm" required>
								</div>
								<label class="col-sm-1 control-label">City <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<input type="text" id="cityPermanent" name="cityPermanent" class="form-control input-sm" required>
								</div>
								<label class="col-sm-1 control-label">State <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<select class="form-control input-sm" id="statePermanent" name="statePermanent" required>
										<option selected="selected" value=""></option>
										<?php foreach($State_Name as $row){?>
										<option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12">
								<label class="col-sm-2 control-label">Phone <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<input type="text" id="phonePermanent" name="phonePermanent" class="form-control input-sm" required>
								</div>
								<label class="col-sm-1 control-label">Fax</label>
								<div class="col-sm-1">
									<input type="text" id="faxPermanent" name="faxPermanent" class="form-control input-sm">
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12">
								<div class="col-sm-2"> </div>
								<div class="col-sm-2">
									<button type="submit" class="btn btn-primary" ><i class="fa fa-check"></i> Submit</button>  <button type="button" id="cancel" class="btn btn-primary">Cancel</button>
								</div>
							</div>
						</form>
						
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
						
						<form action="" id="updateInsurance" method="post">
							<h5 class="h4-title">Select Insurer To Edit</h5>
							<div class="form-group form-horizontal col-sm-12">
								<label class="col-sm-2 control-label">NAME <span class="required-field">*</span></label>
								<div class="col-sm-5">
									<select class="form-control input-sm" id="insuranceId" name="insuranceId" required>
										<option selected="selected" value=""></option>
									</select>
								</div>
								<div class="col-sm-2">
									<button class="btn btn-primary" type="submit"><i class="fa fa-paste"></i> VIEW</button>
								</div>
							</div>
						</form>
						
					</div><!-- End of panel-body tab-panel-->
					</div><!-- End hpanel -->
					</div><!-- End col-lg-12-->
				</div><!-- End row-->

				<div class="row update-row" style="display:none;">
					<div class="col-lg-12">
					<div class="hpanel">
					<div class="panel-heading"></div>
					<div class="panel-body tab-panel">
						
						<form id="updateInsuranceInfo" action="updateinsurance" method="post" style="display:none;">
							<h5 class="h4-title">Insurance Company Information</h5>
							<div class="form-group form-horizontal col-sm-12 ">
								<input type="hidden" id="insuranceIdU" name="insuranceId" class="form-control input-sm">
								<label class="col-sm-2 control-label">Name <span class="required-field">*</span></label>
								<div class="col-sm-5">
									<input type="text" id="nameU" name="name" class="form-control input-sm" required>
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12 ">
								<label class="col-sm-2 control-label">Suit <span class="required-field">*</span></label>
								<div class="col-sm-5">
									<input type="text" id="suitU" name="suit" class="form-control input-sm" required>
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12 ">
								<label class="col-sm-2 control-label">Type <span class="required-field">*</span></label>
								<div class="col-sm-5">
									<input type="text" id="typeU" name="type" class="form-control input-sm" required>
								</div>
							</div>
							
							<h5 class="h4-title">Insurance Company Local Address</h5>
							<div class="form-group form-horizontal col-sm-12 ">
								<label class="col-sm-2 control-label">Address <span class="required-field">*</span></label>
								<div class="col-sm-5">
									<textarea rows="3" id="addressLocalU" name="addressLocal" class="form-control" required></textarea>
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12">
								<label class="col-sm-2 control-label">Zip <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<input type="text" id="zipLocalU" name="zipLocal" class="form-control input-sm" required>
									<!--<input type="text" placeholder=".input-sm" class="form-control input-sm">--> 
								</div>
								<label class="col-sm-1 control-label">City <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<input type="text" id="cityLocalU" name="cityLocal" class="form-control input-sm" required>
								</div>
								<label class="col-sm-1 control-label">State <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<select class="form-control input-sm"  id="stateLocalU" name="stateLocal" required>
										<option selected="selected" value=""></option>
										<?php foreach($State_Name as $row){?>
										<option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12">
								<label class="col-sm-2 control-label">Phone <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<input type="text" id="phoneLocalU" name="phoneLocal" class="form-control input-sm" required>
								</div>
								<label class="col-sm-1 control-label">Fax</label>
								<div class="col-sm-1">
									<input type="text" id="faxLocalU" name="faxLocal" class="form-control input-sm">
								</div>
							</div>
							
							<h5 class="h4-title">Insurance Company Perm.Address</h5>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-6 checkbox">
									<label><input type="checkbox" id="checkbox2" >Check here if permanent address info is same.</label>
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12 ">
								<label class="col-sm-2 control-label">Address <span class="required-field">*</span></label>
								<div class="col-sm-5">
									<textarea rows="3" id="addressPermanentU" name="addressPermanent" class="form-control" required></textarea>
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12">
								<label class="col-sm-2 control-label">Zip <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<input type="text" id="zipPermanentU" name="zipPermanent" class="form-control input-sm" required>
								</div>
								<label class="col-sm-1 control-label">City <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<input type="text" id="cityPermanentU" name="cityPermanent" class="form-control input-sm" required>
								</div>
								<label class="col-sm-1 control-label">State <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<select class="form-control input-sm" id="statePermanentU" name="statePermanent" required>
										<option selected="selected" value=""></option>
										<?php foreach($State_Name as $row){?>
										<option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12">
								<label class="col-sm-2 control-label">Phone <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<input type="text" id="phonePermanentU" name="phonePermanent" class="form-control input-sm" required>
								</div>
								<label class="col-sm-1 control-label">Fax</label>
								<div class="col-sm-1">
									<input type="text" id="faxPermanentU" name="faxPermanent" class="form-control input-sm">
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12">
								<div class="col-sm-2"> </div>
								<div class="col-sm-2">
									<button type="submit" class="btn btn-primary" ><i class="fa fa-check"></i> Submit</button>  <button type="button" id="cancelUpdate" class="btn btn-primary">Cancel</button>
								</div>
							</div>
						</form>
						
					</div><!-- End of panel-body tab-panel-->
					</div><!-- End hpanel -->
					</div><!-- End col-lg-12-->
				</div><!-- End row-->
			</div>
			
			
        </div>
      </div>
    </div>
    
  </div>
					<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog model-popup">
					<div class="modal-content">
						<div class="modal-header model-design">
							<button type="button" class="close close-tab" data-dismiss="modal"> &times;</button>
							<h5 class="h4-title"> Data Submitted successfully...... </h5>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-12">
								<div class="hpanel">
								<div class="panel-heading"></div>
								<div class="panel-body tab-panel">
									
								</div><!-- End of panel-body tab-panel-->
								</div><!-- End hpanel -->
								</div><!-- End col-lg-12-->
							</div><!-- End row-->
						</div><!-- End of modal-body-->
					</div><!--End of modal-content -->
					</div><!--End of modal-dialog model-popup -->
					</div><!--End of modal fade-->
  
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
    <script src="<?php echo base_url();?>assets/vendor/metisMenu/dist/metisMenu.min.js"></script> 
    <script src="<?php echo base_url();?>assets/vendor/iCheck/icheck.min.js"></script> 
    <script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script> 
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script> 
    <script src="<?php echo base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/toastr/build/toastr.min.js"></script>
    <!-- App scripts --> 
    <script src="<?php echo base_url();?>assets/scripts/homer.js"></script>

<script>
	function callSuccess() {
		swal({
			title: "Successfully submitted",
			type: "success"
		});
	}
	
	$('#checkbox1').change(function() {
		if ($(this).is(':checked')) {
			var addressLocal = $("textarea[name=addressLocal]").val();
			var zipLocal = $("input[name=zipLocal]").val();
			var cityLocal = $("input[name=cityLocal]").val();
			var stateLocal = $("select[name=stateLocal]").val();
			var phoneLocal = $("input[name=phoneLocal]").val();
			var faxLocal = $("input[name=faxLocal]").val();
			console.log("okkk");
			$('textarea[name=addressPermanent]').val(addressLocal);
			$('input[name=zipPermanent]').val(zipLocal);
			$('input[name=cityPermanent]').val(cityLocal);
			$('select[name=statePermanent]').val(stateLocal);
			$('input[name=phonePermanent]').val(phoneLocal);
			$('input[name=faxPermanent]').val(faxLocal);
			
		}else{
			$('#addressPermanent').val("");
			$('#zipaPermanent').val("");
			$('#cityPermanent').val("");
			$('#statePermanent').val("");
			$('#phonePermanent').val("");
			$('#faxPermanent').val("");
		}
    });
	$('#checkbox2').change(function() {
		if ($(this).is(':checked')) {
			var addressLocal = $("textarea[name=addressLocal]").val();
			var zipLocal = $("input[name=zipLocal]").val();
			var cityLocal = $("input[name=cityLocal]").val();
			var stateLocal = $("select[name=stateLocal]").val();
			var phoneLocal = $("input[name=phoneLocal]").val();
			var faxLocal = $("input[name=faxLocal]").val();
			console.log("okkk");
			$('textarea[name=addressPermanent]').val(addressLocal);
			$('input[name=zipPermanent]').val(zipLocal);
			$('input[name=cityPermanent]').val(cityLocal);
			$('select[name=statePermanent]').val(stateLocal);
			$('input[name=phonePermanent]').val(phoneLocal);
			$('input[name=faxPermanent]').val(faxLocal);
			
		}else{
			$('#addressPermanent').val("");
			$('#zipaPermanent').val("");
			$('#cityPermanent').val("");
			$('#statePermanent').val("");
			$('#phonePermanent').val("");
			$('#faxPermanent').val("");
		}
    });

/* Add Insurance information - Tab-1*/ /*---------- Tab-1 --------------------*/
	$("#addInsuranceInfo").validate({
	
		rules: {
			name: {
				required: true
			},
			suit: {
				required: true
			},
			type: {
				required: true
			},
			lastName: {
				required: true
			},
			firstName: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			phone:{
				required: true
			},
			fax:{
				number: true
			},
			zip:{
				number: true
			},
			insuranceId:{
				required: true
			},
			phoneLocal:{
				required: true
			},
			faxLocal:{
				number: true
			},
			zipLocal:{
				number: true
			},
			phonePermanent:{
				required: true
			},
			faxPermanent:{
				number: true
			},
			zipPermanent:{
				number: true
			}		
		},
				
		submitHandler: function (form) {
			// setup some local variables
			var $form = $(form);
			// let's select and cache all the fields
			var $inputs = $form.find("input, select, button, textarea");
			// serialize the data in the form
			var serializedData = $form.serialize();

			// let's disable the inputs for the duration of the ajax request
			$inputs.prop("disabled", true);

			// fire off the request to /form.php

			request = $.ajax({
				url:"<?php echo base_url(); ?>dataentry/add_InsuranceInfo",
				type: "post",
				data: serializedData
			});

			// callback handler that will be called on success
			request.done(function (response, textStatus, jqXHR) {
				$('input[type=text]').val('');
				$('textarea').val('');
				$("select").val('');
				//$("#myModal").modal("show");
				callSuccess();
			});

			// callback handler that will be called on failure
			request.fail(function (jqXHR, textStatus, errorThrown) {
				// log the error to the console
				console.error(
					"The following error occured: " + textStatus, errorThrown);
			});

			// callback handler that will be called regardless
			// if the request failed or succeeded
			request.always(function () {
				// reenable the inputs
				$inputs.prop("disabled", false);
			});

		}
	});
/* *************************************************** */

/* Bind Provider By clicking Tab-2 */  /*----------------- Tab-2 ---------------------*/
	$('#tab2').click(function(e){
		$.ajax({
			type:'POST',
			url:"<?php echo base_url(); ?>dataentry/getIns",
			success:function(data){
				results = JSON.parse(data);
				var optionsAsString = "";
				for($i in results.InsuranceCompany_Name){
					//console.log(results.Provider_Name[$i].Adjuster_Id);
					optionsAsString += "<option value='" + results.InsuranceCompany_Name[$i].InsuranceCompany_Id + "'>" + results.InsuranceCompany_Name[$i].InsuranceCompany_Name + "</option>";
				}
				$( 'select[name="insuranceId"]' ).append( optionsAsString );
				
			},
			error: function(result){ console.log("error"); }
		
		});
		e.preventDefault();	//STOP default action
	});
/* *************************************************** */

/* Get Provider info By Id - Tab-2 */ /*----------------- Edit ---------------------*/
	$("#updateInsurance").submit(function(e){
		var form = $(this);
		var params = form.serialize();
		var nameValue = document.getElementById("insuranceId").value;
		console.log("Edit: "+nameValue);
		
		e.preventDefault();	//STOP default action
		
		$.ajax({
			type:'POST',
			url:"<?php echo base_url(); ?>dataentry/getInsuranceById",
			data: params,
			success:function(data){
				results = JSON.parse(data);
				$("#updateInsuranceInfo, .update-row").css("display", "block");
				//console.log(data);
				
				$("#insuranceIdU").val(nameValue);
				
				//$("#nameU").val(results.InsuranceInfoById[0].InsuranceCompany_Id);
				$("#nameU").val(results.InsuranceInfoById[0].InsuranceCompany_Name);
				$("#suitU").val(results.InsuranceInfoById[0].InsuranceCompany_SuitName);
				$("#typeU").val(results.InsuranceInfoById[0].InsuranceCompany_Type);
				$("#addressLocalU").val(results.InsuranceInfoById[0].InsuranceCompany_Local_Address);
				$("#zipLocalU").val(results.InsuranceInfoById[0].InsuranceCompany_Local_Zip);
				$("#cityLocalU").val(results.InsuranceInfoById[0].InsuranceCompany_Local_City);
				$("#stateLocalU").val(results.InsuranceInfoById[0].InsuranceCompany_Local_State);
				$("#phoneLocalU").val(results.InsuranceInfoById[0].InsuranceCompany_Local_Phone)
				$("#faxLocalU").val(results.InsuranceInfoById[0].InsuranceCompany_Local_Fax);
				$("#addressPermanentU").val(results.InsuranceInfoById[0].InsuranceCompany_Perm_Address);
				$("#zipPermanentU").val(results.InsuranceInfoById[0].InsuranceCompany_Perm_Zip);
				$("#cityPermanentU").val(results.InsuranceInfoById[0].InsuranceCompany_Perm_City);
				$("#statePermanentU").val(results.InsuranceInfoById[0].InsuranceCompany_Perm_State);
				$("#phonePermanentU").val(results.InsuranceInfoById[0].InsuranceCompany_Perm_Phone);
				$("#faxPermanentU").val(results.InsuranceInfoById[0].InsuranceCompany_Perm_Fax);
				
					
			},
			error: function(result){ console.log("error"); }
		});
		
	});
/* *************************************************** */	

	

/*Update Provider information on Tab-2*/  /*----------------- Update ---------------------*/
	$("#updateInsuranceInfo").validate({
	
		rules: {
			name: {
				required: true
			},
			suit: {
				required: true
			},
			type: {
				required: true
			},
			lastName: {
				required: true
			},
			firsttName: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			phone:{
				required: true
			},
			fax:{
				number: true
			},
			zip:{
				number: true
			},
			phoneLocal:{
				required: true
			},
			faxLocal:{
				number: true
			},
			zipLocal:{
				number: true
			},
			phonePermanent:{
				required: true
			},
			faxPermanent:{
				number: true
			},
			zipPermanent:{
				number: true
			}				
		},
				
		submitHandler: function (form) {
			// setup some local variables
			var $form = $(form);
			// let's select and cache all the fields
			var $inputs = $form.find("input, select, button, textarea");
			// serialize the data in the form
			var serializedData = $form.serialize();

			// let's disable the inputs for the duration of the ajax request
			$inputs.prop("disabled", true);

			request = $.ajax({
				url:"<?php echo base_url(); ?>dataentry/updateInsurance",
				type: "post",
				data: serializedData
			});

			// callback handler that will be called on success
			request.done(function (response, textStatus, jqXHR) {
				// log a message to the console
				console.log("Hooray, it worked!");
				$('input[type=text]').val('');
					$('textarea').val('');
					$("#state").val('');
					$("#updateAdjusterInfo, .update-row").css("display", "none");
					 $("#myModal").modal("show");
			});

			// callback handler that will be called on failure
			request.fail(function (jqXHR, textStatus, errorThrown) {
				// log the error to the console
				console.error(
					"The following error occured: " + textStatus, errorThrown);
			});

			// callback handler that will be called regardless
			// if the request failed or succeeded
			request.always(function () {
				// reenable the inputs
				$inputs.prop("disabled", false);
			});

		}
	});
/* *************************************************** */

	$("#cancel").click(function(){
		$('input[type=text]').val('');
		$('select').val('');
		$('textarea').val('');
	});
	$("#cancelUpdate").click(function(){
		$('input[type=text]').val('');
		$('select').val('');
		$('textarea').val('');
		$("#updateInsuranceInfo, .update-row").css("display", "none");
	});
</script>

<script>
	$('.dataentry').addClass('active');
	$('.insuranceCompnay').addClass('active');
</script>
</body>
</html>