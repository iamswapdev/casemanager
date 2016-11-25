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
		<li class="active"><a data-toggle="tab" href="#tab-1">Add Plaintiff Attorney</a></li>
		<li class=""><a id="tab2" data-toggle="tab" href="#tab-2">Edit Plaintiff Attorney</a></li>
		</ul>
	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">
			<div class="row">
				<div class="col-lg-12">
				<div class="hpanel">
				<div class="panel-body tab-panel">
					
					<form id="addPlantiffInfo" action="add_PlantiffInfo" method="post" class="form-horizontal">
						<h4>Plaintiff Attorney Information</h4>
						<div class="form-group form-horizontal col-sm-12">
							<label class="col-sm-2 control-label">Name</label>
							<div class="col-sm-4">
								<input type="text" id="name" name="name" class="form-control input-sm" required>
							</div>
						</div>
						
                        
                        <h4>Defendant Contact Details Address</h4>
						<div class="form-group form-horizontal col-sm-12 ">
							<label class="col-sm-2 control-label">Address</label>
							<div class="col-sm-6">
							<textarea rows="5" id="address" name="address" class="form-control" ></textarea>
							</div>
						</div>
						<div class="form-group form-horizontal col-sm-12">
							<label class="col-sm-2 control-label">Zip</label>
							<div class="col-sm-2">
								<input type="text" id="zip" name="zip" placeholder="Ex.11111" class="form-control input-sm">
								<!--<input type="text" placeholder=".input-sm" class="form-control input-sm">--> 
							</div>
							<label class="col-sm-1 control-label">City</label>
							<div class="col-sm-2">
								<input type="text" id="city" name="city" placeholder="Ex.11111" class="form-control input-sm">
							</div>
							<label class="col-sm-1 control-label">State</label>
							<div class="col-sm-2">
								<select id="state" name="state" class="form-control input-sm" >
                                    <option></option>
									<?php foreach($State_Name as $row){?>
                                    <option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
                                    <?php }?>
								</select>
							</div>
						</div>
						<div class="form-group form-horizontal col-sm-12">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-2">
								<input type="text" id="email" name="email" placeholder="Ex.abc@pqr.com" class="form-control input-sm" required>
							</div>
							<label class="col-sm-1 control-label">Phone</label>
							<div class="col-sm-2">
								<input  type="text" id="phone" name="phone" placeholder="Ex.000000" class="form-control input-sm" required>
							</div>
							<label class="col-sm-1 control-label">Fax</label>
							<div class="col-sm-2">
								<input type="text" id="fax" name="fax" placeholder="Ex.11111" class="form-control input-sm">
							</div>
						</div>
						<div class="form-group form-horizontal col-sm-12">
							<div class="col-sm-2"> </div>
							<div class="col-sm-2">
								<button type="submit" class="btn btn-primary" ><i class="fa fa-check"></i> Submit</button>  
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
				<div class="panel-body tab-panel">
					
					
					<form action="" id="updatePlantiff" method="post">
						<h4>Select Plaintiff Attorney To </h4>
						<div class="form-group form-horizontal col-sm-12">
							<label class="col-sm-2 control-label">Name</label>
							<div class="col-sm-4">
								<select id="plantiffId" name="plantiffId" class="form-control input-sm">
									<option></option>
								</select>
							</div>
						</div>
						<div class="form-group form-horizontal col-sm-12">
							<div class="col-sm-2"> </div>
							<div class="col-sm-2">
								<button type="submit" class="btn btn-primary">Submit</button>
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
				<div class="panel-body tab-panel">
					
					 <form id="updatePlantiffInfo" action="updateplantiff" method="post" style="display:none;">
						<h4>Plaintiff Attorney Information</h4>
						<div class="form-group form-horizontal col-sm-12">
							<input type="hidden" id="plantiffIdU" name="plantiffId" class="form-control input-sm">
                            <label class="col-sm-2 control-label">Name</label>
							<div class="col-sm-4">
								<input type="text" id="nameU" name="name" class="form-control input-sm" required>
							</div>
						</div>
						
                        
                        <h4>Defendant Contact Details Address</h4>
						<div class="form-group form-horizontal col-sm-12">
							<label class="col-sm-2 control-label">Address</label>
							<div class="col-sm-6">
							<textarea rows="5" id="addressU" name="address" class="form-control" ></textarea>
							</div>
						</div>
						<div class="form-group form-horizontal col-sm-12">
							<label class="col-sm-2 control-label">Zip</label>
							<div class="col-sm-2">
								<input type="text" id="zipU" name="zip" placeholder="Ex.11111" class="form-control input-sm">
								<!--<input type="text" placeholder=".input-sm" class="form-control input-sm">--> 
							</div>
							<label class="col-sm-1 control-label">City</label>
							<div class="col-sm-2">
								<input type="text" id="cityU" name="city" placeholder="Ex.11111" class="form-control input-sm">
							</div>
							<label class="col-sm-1 control-label">State</label>
							<div class="col-sm-2">
								<select id="stateU" name="state" class="form-control input-sm" >
                                    <option></option>
									<?php foreach($State_Name as $row){?>
                                    <option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
                                    <?php }?>
								</select>
							</div>
						</div>
						<div class="form-group form-horizontal col-sm-12">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-2">
								<input type="text" id="emailU" name="email" placeholder="Ex.abc@pqr.com" class="form-control input-sm" required>
							</div>
							<label class="col-sm-1 control-label">Phone</label>
							<div class="col-sm-2">
								<input  type="text" id="phoneU" name="phone" placeholder="Ex.000000" class="form-control input-sm" required>
							</div>
							<label class="col-sm-1 control-label">Fax</label>
							<div class="col-sm-2">
								<input type="text" id="faxU" name="fax" placeholder="Ex.11111" class="form-control input-sm">
							</div>
						</div>
						<div class="form-group form-horizontal col-sm-12">
							<div class="col-sm-2"> </div>
							<div class="col-sm-2">
								<button type="submit" class="btn btn-primary" ><i class="fa fa-check"></i> Submit</button>  <button type="button" id="cancelUpdate" class="btn btn-primary"><i class="fa fa-check"></i> Cancel</button>
							</div>
						</div>
					</form>
					
					
				</div><!-- End of panel-body tab-panel-->
				</div><!-- End hpanel -->
				</div><!-- End col-lg-12-->
			</div><!-- End row-->
			
            <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog model-popup">
            <div class="modal-content">
                <div class="modal-header model-design">
                    <button type="button" class="close close-tab" data-dismiss="modal"> &times;</button>
                    <h5> Data Submitted successfully...... </h5>
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

	</div>
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
<script src="<?php echo base_url();?>assets/vendor/metisMenu/dist/metisMenu.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/iCheck/icheck.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
<!-- App scripts --> 
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
<script>

/* Add Plantiff information - Tab-1*/ /*---------- Tab-1 --------------------*/
	$("#addPlantiffInfo").validate({
	
		rules: {
			name: {
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
				url:"<?php echo base_url(); ?>dataentry/add_PlantiffInfo",
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

/* Bind Plantiff By clicking Tab-2 */  /*----------------- Tab-2 ---------------------*/
	$('#tab2').click(function(e){
		$.ajax({
			type:'POST',
			url:"<?php echo base_url(); ?>dataentry/getPla",
			success:function(data){
				console.log("data: "+data);
				results = JSON.parse(data);
				var optionsAsString = "";
				for($i in results.Plantiff){
					//console.log(results.Provider_Name[$i].Adjuster_Id);
					optionsAsString += "<option value='" + results.Plantiff[$i].Attorney_id + "'>" + results.Plantiff[$i].Attorney_Name + "</option>";
				}
				$( 'select[name="plantiffId"]' ).append( optionsAsString );
				
			},
			error: function(result){ console.log("error"); }
		
		});
		e.preventDefault();	//STOP default action
	});
/* *************************************************** */

/* Get Provider info By Id - Tab-2 */ /*----------------- Edit ---------------------*/
	$("#updatePlantiff").submit(function(e){
		var form = $(this);
		var params = form.serialize();
		var nameValue = document.getElementById("plantiffId").value;
		console.log("Edit: "+nameValue);
		
		e.preventDefault();	//STOP default action
		
		$.ajax({
			type:'POST',
			url:"<?php echo base_url(); ?>dataentry/getPlantiffById",
			data: params,
			success:function(data){
				results = JSON.parse(data);
				$("#updatePlantiffInfo").css("display", "block");
				//console.log(data);
				
				$("#plantiffIdU").val(nameValue);
				
				$("#nameU").val(results.PlantiffInfoById[0].Attorney_Name);
				$("#addressU").val(results.PlantiffInfoById[0].Attorney_Address);
				$("#zipU").val(results.PlantiffInfoById[0].Attorney_Zip);
				$("#cityU").val(results.PlantiffInfoById[0].Attorney_City);
				$("#stateU").val(results.PlantiffInfoById[0].Attorney_State);
				$("#emailU").val(results.PlantiffInfoById[0].Attorney_Email);
				$("#phoneU").val(results.PlantiffInfoById[0].Attorney_Phone);
				$("#faxU").val(results.PlantiffInfoById[0].Attorney_Fax);
					
			},
			error: function(result){ console.log("error"); }
		});
		
	});
/* *************************************************** */	

	

/*Update Plantiff information on Tab-2*/  /*----------------- Update ---------------------*/
	$("#updatePlantiffInfo").validate({
	
		rules: {
			name: {
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
				url:"<?php echo base_url(); ?>dataentry/updatePlantiff",
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
		$("#updatePlantiffInfo").css("display", "none");
	});
</script>
<script>
	$('.dataentry').addClass('active');
</script>
</body>
</html>