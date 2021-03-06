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
    
    <!-- Alerts css-->
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
  <div class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="hpanel">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-1">Add Adjuster Info</a></li>
            <li class=""><a id="tab2" data-toggle="tab" href="#tab-2">Edit Adjuster Info</a></li>
          </ul>
          <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
				<div class="row">
					<div class="col-lg-12">
					<div class="hpanel">
					<div class="panel-heading"></div>
					<div class="panel-body tab-panel">
						
						<form id="addAdjusterInfo" action="add_AdjusterInfo" method="post" class="form-horizontal">
							<h5 class="h4-title">Adjuster Information </h5>
							<div class="form-group">
								<label class="col-sm-2 control-label">Insurer <span class="required-field">*</span></label>
								<div class="col-md-5">
									<select class="form-control input-sm" id="insuranceId" name="insuranceId" required>
										<option selected="selected" value=""></option>
										<?php foreach($InsuranceCompany_Name as $row){?>
										<option value="<?php echo $row['InsuranceCompany_Id']; ?>"><?php echo $row['InsuranceCompany_Name'];?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-smd-12">
								<label class="col-sm-2 control-label">Last Name <span class="required-field">*</span></label>
								<div class="col-sm-2">
									<input type="text" id="lastName" name="lastName" placeholder="Last Name" class="form-control input-sm" required>
								</div>
								<label class="col-sm-1 control-label">First Name <span class="required-field">*</span></label>
								<div class="col-sm-2">
									<input type="text" id="firstName" name="firstName" placeholder="First Name" class="form-control input-sm" required>
								</div>
							</div>
							<div class="form-group form-horizontal col-smd-12">
								<label class="col-sm-2 control-label">Phone <span class="required-field">*</span></label>
								<div class="col-sm-2">
									<input type="text" id="phone" name="phone"  placeholder="123-456-7890" class="phone-format form-control input-sm" required>
								</div>
								<label class="col-sm-1 control-label align-sec">Ext.</label>
								<div class="col-sm-1">
									<input type="text" id="ext" name="ext"  class="form-control input-sm">
								</div>
							</div>
							<div class="form-group form-horizontal col-smd-12">
								<label class="col-sm-2 control-label">Email</label>
								<div class="col-sm-2">
									<input type="text" id="email" name="email" placeholder="Ex.abc@pqr.com" class="form-control input-sm">
								</div>
								<label class="col-sm-1 control-label">Fax <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<input type="text" id="fax" name="fax" placeholder="123-456-7890"  class="phone-format form-control input-sm" required>
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
						
						<form action="" method="post" id="updateAdjuster">
							<h5 class="h4-title">Select Adjuster To Edit</h5> 
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">NAME <span class="required-field">*</span></label>
								<div id="test" class="col-md-5">
									<select class="form-control input-sm" id="adjusterId" name="adjusterId" required>
										<option selected="selected" value=""></option>
									</select>
								</div>
								<div class="col-sm-2">
									<button type="submit" class="btn btn-primary"><i class="fa fa-paste"></i> SUBMIT</button>
                                        &nbsp;&nbsp;<button type="button"  class="btn btn-primary delete" id="DeleteMaster"><i class="fa fa-trash-o"></i> Delete</button>
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
						
						<form id="updateAdjusterInfo" action="updateadjuster" method="post" class="form-horizontal" style="display:none;">
							<h5 class="h4-title">Adjuster Information </h5>
							<div class="form-group">
								<label class="col-sm-2 control-label">Insurer <span class="required-field">*</span></label>
								<div class="col-md-5">
									<select class="form-control input-sm" id="insuranceIdU" name="insuranceId" required>
										<option selected="selected" value=""></option>
										<?php foreach($InsuranceCompany_Name as $row){?>
										<option value="<?php echo $row['InsuranceCompany_Id']; ?>"><?php echo $row['InsuranceCompany_Name'];?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-smd-12">
								<input type="hidden" id="adjusterIdU" name="adjusterId" class="form-control input-sm">
								<label class="col-sm-2 control-label">Last Name <span class="required-field">*</span></label>
								<div class="col-sm-2">
									<input type="text" id="lastNameU" name="lastName" placeholder="Last Name" class="form-control input-sm" required>
								</div>
								<label class="col-sm-1 control-label">First Name <span class="required-field">*</span></label>
								<div class="col-sm-2">
									<input type="text" id="firstNameU" name="firstName" placeholder="First Name" class="form-control input-sm" required>
								</div>
							</div>
							<div class="form-group form-horizontal col-smd-12">
								<label class="col-sm-2 control-label">Phone <span class="required-field">*</span></label>
								<div class="col-sm-2">
									<input type="text" id="phoneU" name="phone" placeholder="123-456-7890"  class="phone-format form-control input-sm" required>
								</div>
								<label class="col-sm-1 control-label align-sec">Ext.</label>
								<div class="col-sm-1">
									<input type="text" id="extU" name="ext"  class="form-control input-sm">
								</div>
							</div>
							<div class="form-group form-horizontal col-smd-12">
								<label class="col-sm-2 control-label">Email</label>
								<div class="col-sm-2">
									<input type="text" id="emailU" name="email" placeholder="Ex.abc@pqr.com" class="form-control input-sm">
								</div>
								<label class="col-sm-1 control-label">Fax <span class="required-field">*</span></label>
								<div class="col-sm-1">
									<input type="text" id="faxU" name="fax" placeholder="123-456-7890" class="phone-format form-control input-sm" required>
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
			</div><!-- End of tab-1-->
			
        </div>
          <!--tab content close--> 
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
    
    <script src="<?php echo base_url();?>assets/vendor/mask-phone/maskPhone.js"></script>
    
    <!--Alerts js -->
    <script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/toastr/build/toastr.min.js"></script>
    <!-- App scripts --> 
    <script src="<?php echo base_url();?>assets/scripts/homer.js"></script>

<script>
	$('body').on('focus',".phone-format", function(){
		$(this).mask("999-999-9999");
	});
	function callSuccess() {
		swal({
			title: "Successfully submitted",
			type: "success"
		});
	}

/* Add Adjuster information - Tab-1*/ /*---------- Tab-1 --------------------*/
	$("#addAdjusterInfo").validate({
	
		rules: {
			insuranceId:{
				required: true
			},
			lastName: {
				required: true
			},
			firstName: {
				required: true
			},
			phone:{
				required: true
			},
			ext:{
				number: true
			},
			email: {
				email: true
			},		
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
				url:"<?php echo base_url(); ?>dataentry/add_AdjusterInfo",
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

/* Bind Adjusters By clicking Tab-2 */  /*----------------- Tab-2 ---------------------*/
	$('#tab2').click(function(e){
		$.ajax({
			type:'POST',
			url:"<?php echo base_url(); ?>dataentry/getAdj",
			success:function(data){
				results = JSON.parse(data);
				var optionsAsString = "";
				for($i in results.Adjuster_Name){
					//console.log(results.Adjuster_Name[$i].Adjuster_Id);
					optionsAsString += "<option value='" + results.Adjuster_Name[$i].Adjuster_Id + "'>" + results.Adjuster_Name[$i].Adjuster_LastName + " ," + results.Adjuster_Name[$i].Adjuster_FirstName + "</option>";
				}
				$( 'select[name="adjusterId"]' ).append( optionsAsString );
				
			},
			error: function(result){ console.log("error"); }
		});
		e.preventDefault();	//STOP default action
	});
/* *************************************************** */

/* Get Afjuster info By Id - Tab-2 */ /*----------------- Edit ---------------------*/
	$("#updateAdjuster").submit(function(e){
		var form = $(this);
		var params = form.serialize();
		var nameValue = document.getElementById("adjusterId").value;
		console.log("Edit: "+nameValue);
		
		e.preventDefault();	//STOP default action
		
		$.ajax({
			type:'POST',
			url:"<?php echo base_url(); ?>dataentry/getAdjusterById",
			data: params,
			success:function(data){
				results = JSON.parse(data);
				$("#updateAdjusterInfo, .update-row").css("display", "block");
				//console.log(data);
				
				$("#adjusterIdU").val(nameValue);
				$("#insuranceIdU").val(results.AdjusterInfoById[0].InsuranceCompany_Id);
				$("#lastNameU").val(results.AdjusterInfoById[0].Adjuster_LastName);
				$("#firstNameU").val(results.AdjusterInfoById[0].Adjuster_FirstName);
				$("#phoneU").val(results.AdjusterInfoById[0].Adjuster_Phone);
				$("#extU").val(results.AdjusterInfoById[0].Adjuster_Phone_Ext);
				$("#emailU").val(results.AdjusterInfoById[0].Adjuster_Email);
				$("#faxU").val(results.AdjusterInfoById[0].Adjuster_Fax);	
			},
			error: function(result){ console.log("error"); }
		});
		
	});
/* *************************************************** */	

	

/*Update Adjuster information on Tab-2*/  /*----------------- Update ---------------------*/
	$("#updateAdjusterInfo").validate({
	
		rules: {
			insuranceId:{
				required: true
			},
			lastName: {
				required: true
			},
			firstName: {
				required: true
			},
			phone:{
				required: true
			},
			ext:{
				number: true
			},
			email: {
				email: true
			},			
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
				url:"<?php echo base_url(); ?>dataentry/updateAdjuster",
				type: "post",
				data: serializedData
			});

			// callback handler that will be called on success
			request.done(function (response, textStatus, jqXHR) {
				// log a message to the console
				console.log("Hooray, it worked!");
				$('input[type=text]').val('');
					$('input[type=text]').val('');
					$('textarea').val('');
					$("select").val('');
					//$("#myModal").modal("show");
					callSuccess();
					$("#updateAdjusterInfo").css("display", "none");
					
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
	$("#cancel").click(function(){
		$('input[type=text]').val('');
		$('select').val('');
		$('textarea').val('');
	});
	$("#cancelUpdate").click(function(){
		$('input[type=text]').val('');
		$('select').val('');
		$('textarea').val('');
		$("#updateAdjusterInfo, .update-row").css("display", "none");
	});
/* Delete Master Entry records*/
	$('#DeleteMaster').click(function () {
		 var adjusterId = $("#adjusterId").val();
		swal(
			{
				title: "Are you sure?",
				text: "Your will not be able to recover this imaginary file!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel plx!",
				closeOnConfirm: false,
				closeOnCancel: false 
			},
			function (isConfirm) 
				{
				if (isConfirm) {
					$.ajax({
						url:"delete_Master_Records",
						type: "post",
						data: {Column_Name: "Adjuster_Id", Table_Name: "dbo_tbladjusters", Id: adjusterId},
						success: function(){
							swal("Deleted!", "Your imaginary file has been deleted.", "success");
							$('#adjusterId').find('option').remove();
							$.ajax({
								type:'POST',
								url:"<?php echo base_url(); ?>dataentry/getAdj",
								success:function(data){
									results = JSON.parse(data);
									var optionsAsString = "";
									for($i in results.Adjuster_Name){
										//console.log(results.Adjuster_Name[$i].Adjuster_Id);
										optionsAsString += "<option value='" + results.Adjuster_Name[$i].Adjuster_Id + "'>" + results.Adjuster_Name[$i].Adjuster_LastName + " ," + results.Adjuster_Name[$i].Adjuster_FirstName + "</option>";
									}
									$( 'select[name="adjusterId"]' ).append( optionsAsString );
									
								},
								error: function(result){ console.log("error"); }
							});
						}
					});
					
				} else {
					swal("Cancelled", "Your imaginary file is safe :)", "error");
				}
			}
		);
	});
/* *************************************************** */	

</script>
<script>
	$('.dataentry').addClass('active');
	$('.adjuster').addClass('active');
</script>
</body>
</html>