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
				<div class="panel-body">
					<div class="col-lg-12 panel-body tab-panel">
						
						<form id="addInsuranceInfo" action="add_InsuranceInfo" method="post" class="form-horizontal">
							<h4>Insurance Company Information</h4>
							<div class="form-group">
								<label class="col-sm-2 control-label">Name <span class="required-field">*</span></label>
								<div class="col-sm-6">
									<input type="text" id="name" name="name" class="form-control input-sm" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Suit <span class="required-field">*</span></label>
								<div class="col-sm-6">
									<input type="text" id="suit" name="suit" class="form-control input-sm" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Type <span class="required-field">*</span></label>
								<div class="col-sm-6">
									<input type="text" id="type" name="type" class="form-control input-sm" required>
								</div>
							</div>
							
							<h4>Insurance Company Local Address</h4>
							<div class="form-group form-horizontal col-sm-12 ">
								<label class="col-sm-2 control-label">Address</label>
								<div class="col-sm-6">
									<textarea rows="5" id="addressLocal" name="addressLocal" class="form-control"></textarea>
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12">
								<label class="col-sm-2 control-label">Zip</label>
								<div class="col-sm-2">
									<input type="text" id="zipLocal" name="zipLocal" placeholder="Ex.11111" class="form-control input-sm">
									<!--<input type="text" placeholder=".input-sm" class="form-control input-sm">--> 
								</div>
								<label class="col-sm-1 control-label">City</label>
								<div class="col-sm-2">
									<input type="text" id="cityLocal" name="cityLocal" placeholder="Ex.11111" class="form-control input-sm">
								</div>
								<label class="col-sm-1 control-label">State</label>
								<div class="col-sm-2">
									<select class="form-control input-sm"  id="stateLocal" name="stateLocal">
										<option>-- Select State --</option>
										<?php foreach($State_Name as $row){?>
                                        <option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
                                        <?php }?>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12">
								<label class="col-sm-2 control-label">Phone <span class="required-field">*</span></label>
								<div class="col-sm-2">
									<input type="text" id="phoneLocal" name="phoneLocal" placeholder="Ex.000000" class="form-control input-sm" required>
								</div>
								<label class="col-sm-1 control-label">Fax</label>
								<div class="col-sm-2">
									<input type="text" id="faxLocal" name="faxLocal" placeholder="Ex.11111" class="form-control input-sm">
								</div>
							</div>
							
							<h4>Insurance Company Perm.Address</h4>
							<div class="form-group form-horizontal col-sm-12 ">
								<label class="col-sm-2 control-label">Address</label>
								<div class="col-sm-6">
									<textarea rows="5" id="addressPermanent" name="addressPermanent" class="form-control" ></textarea>
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12">
								<label class="col-sm-2 control-label">Zip</label>
								<div class="col-sm-2">
									<input type="text" id="zipPermanent" name="zipPermanent" placeholder="Ex.12345" class="form-control input-sm">
								</div>
								<label class="col-sm-1 control-label">City</label>
								<div class="col-sm-2">
									<input type="text" id="cityPermanent" name="cityPermanent" placeholder="Ex.11111" class="form-control input-sm">
								</div>
								<label class="col-sm-1 control-label">State</label>
								<div class="col-sm-2">
									<select class="form-control input-sm" id="statePermanent" name="statePermanent" >
										<option>-- Select State --</option>
										<?php foreach($State_Name as $row){?>
                                        <option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
                                        <?php }?>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12">
								<label class="col-sm-2 control-label">Phone <span class="required-field">*</span></label>
								<div class="col-sm-2">
									<input type="text" id="phonePermanent" name="phonePermanent" placeholder="Ex.12345" class="form-control input-sm" required>
								</div>
								<label class="col-sm-1 control-label">Fax</label>
								<div class="col-sm-2">
									<input type="text" id="faxPermanent" name="faxPermanent" placeholder="Ex.12345" class="form-control input-sm">
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12">
								<div class="col-sm-2"> </div>
								<div class="col-sm-2">
									<button type="submit" class="btn btn-primary" ><i class="fa fa-check"></i> Submit</button>
								</div>
							</div>
						</form>
						
					</div>
				</div>
			</div>
			
			<div id="tab-2" class="tab-pane">
				<div class="panel-body">
					<div class="col-lg-12 panel-body tab-panel">
						
							<div class="form-group form-horizontal col-md-12">
								
								<form action="" id="updateInsurance" method="post">
									<h4>Select Insurer To Edit</h4>
									<div class="form-group form-horizontal col-sm-12">
										<label class="col-sm-2 control-label">Name</label>
										<div class="col-sm-5">
											<select class="form-control input-sm" id="insuranceId" name="insuranceId">
												
											</select>
										</div>
									</div>
									<div class="form-group form-horizontal col-sm-12">
										<div class="col-sm-2"> </div>
										<div class="col-sm-2">
											<button class="btn btn-primary" type="submit"><i class="fa fa-paste"></i> Edit</button>
										</div>
									</div>
								</form>
							</div>
							
							<div class="form-group form-horizontal col-md-12">
								<form id="updateInsuranceInfo" action="updateinsurance" method="post" style="display:none;">
									<h4>Insurance Company Information</h4>
									<div class="form-group">
                                    	<input type="hidden" id="insuranceIdU" name="insuranceId" class="form-control input-sm">
										<label class="col-sm-2 control-label">Name <span class="required-field">*</span></label>
										<div class="col-sm-6">
											<input type="text" id="nameU" name="name" class="form-control input-sm" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Suit <span class="required-field">*</span></label>
										<div class="col-sm-6">
											<input type="text" id="suitU" name="suit" class="form-control input-sm" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Type <span class="required-field">*</span></label>
										<div class="col-sm-6">
											<input type="text" id="typeU" name="type" class="form-control input-sm" required>
										</div>
									</div>
									
									<h4>Insurance Company Local Address</h4>
									<div class="form-group form-horizontal col-sm-12 ">
										<label class="col-sm-2 control-label">Address</label>
										<div class="col-sm-6">
											<textarea rows="5" id="addressLocalU" name="addressLocal" class="form-control"></textarea>
										</div>
									</div>
									<div class="form-group form-horizontal col-sm-12">
										<label class="col-sm-2 control-label">Zip</label>
										<div class="col-sm-2">
											<input type="text" id="zipLocalU" name="zipLocal" placeholder="Ex.11111" class="form-control input-sm">
											<!--<input type="text" placeholder=".input-sm" class="form-control input-sm">--> 
										</div>
										<label class="col-sm-1 control-label">City</label>
										<div class="col-sm-2">
											<input type="text" id="cityLocalU" name="cityLocal" placeholder="Ex.11111" class="form-control input-sm">
										</div>
										<label class="col-sm-1 control-label">State</label>
										<div class="col-sm-2">
											<select class="form-control input-sm"  id="stateLocalU" name="stateLocal">
												<option>-- Select State --</option>
												<?php foreach($State_Name as $row){?>
												<option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
												<?php }?>
											</select>
										</div>
									</div>
									<div class="form-group form-horizontal col-sm-12">
										<label class="col-sm-2 control-label">Phone <span class="required-field">*</span></label>
										<div class="col-sm-2">
											<input type="text" id="phoneLocalU" name="phoneLocal" placeholder="Ex.000000" class="form-control input-sm" required>
										</div>
										<label class="col-sm-1 control-label">Fax</label>
										<div class="col-sm-2">
											<input type="text" id="faxLocalU" name="faxLocal" placeholder="Ex.11111" class="form-control input-sm">
										</div>
									</div>
									
									<h4>Insurance Company Perm.Address</h4>
									<div class="form-group form-horizontal col-sm-12 ">
										<label class="col-sm-2 control-label">Address</label>
										<div class="col-sm-6">
											<textarea rows="5" id="addressPermanentU" name="addressPermanent" class="form-control" ></textarea>
										</div>
									</div>
									<div class="form-group form-horizontal col-sm-12">
										<label class="col-sm-2 control-label">Zip</label>
										<div class="col-sm-2">
											<input type="text" id="zipPermanentU" name="zipPermanent" placeholder="Ex.12345" class="form-control input-sm">
										</div>
										<label class="col-sm-1 control-label">City</label>
										<div class="col-sm-2">
											<input type="text" id="cityPermanentU" name="cityPermanent" placeholder="Ex.12345" class="form-control input-sm">
										</div>
										<label class="col-sm-1 control-label">State</label>
										<div class="col-sm-2">
											<select class="form-control input-sm" id="statePermanentU" name="statePermanent" >
												<option>-- Select State --</option>
												<?php foreach($State_Name as $row){?>
												<option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
												<?php }?>
											</select>
										</div>
									</div>
									<div class="form-group form-horizontal col-sm-12">
										<label class="col-sm-2 control-label">Phone <span class="required-field">*</span></label>
										<div class="col-sm-2">
											<input type="text" id="phonePermanentU" name="phonePermanent" placeholder="Ex.12345" class="form-control input-sm" required>
										</div>
										<label class="col-sm-1 control-label">Fax</label>
										<div class="col-sm-2">
											<input type="text" id="faxPermanentU" name="faxPermanent" placeholder="Ex.12345" class="form-control input-sm">
										</div>
									</div>
									<div class="form-group form-horizontal col-sm-12">
										<div class="col-sm-2"> </div>
										<div class="col-sm-2">
											<button type="submit" class="btn btn-primary" ><i class="fa fa-check"></i> Submit</button>  <button type="button" id="cancelUpdate" class="btn btn-primary"><i class="fa fa-check"></i> Cancel</button>
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
					<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog model-popup">
					<div class="modal-content">
						<div class="modal-header model-design">
							<button type="button" class="close close-tab" data-dismiss="modal"> &times;</button>
							<h4> Data Submitted successfully...... </h4>
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
<!-- App scripts --> 
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
<script>

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
				required: true,
				number: true
			},
			fax:{
				number: true
			},
			zip:{
				number: true
			},
			phoneLocal:{
				required: true,
				number: true
			},
			faxLocal:{
				number: true
			},
			zipLocal:{
				number: true
			},
			phonePermanent:{
				required: true,
				number: true
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
				// log a message to the console
				console.log("Hooray, it worked!");
				$('input[type=text]').val('');
					$('textarea').val('');
					$("#state").val('');
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
				$("#updateInsuranceInfo").css("display", "block");
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
				required: true,
				number: true
			},
			fax:{
				number: true
			},
			zip:{
				number: true
			},
			phoneLocal:{
				required: true,
				number: true
			},
			faxLocal:{
				number: true
			},
			zipLocal:{
				number: true
			},
			phonePermanent:{
				required: true,
				number: true
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
					$("#updateAdjusterInfo").css("display", "none");
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

	
	$("#cancelUpdate").click(function(){
		$("#updateInsuranceInfo").css("display", "none");
	});
</script>

<script>
	$('.dataentry').addClass('active');
</script>
</body>
</html>