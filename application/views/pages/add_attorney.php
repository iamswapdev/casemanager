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
			<li class="active"><a data-toggle="tab" href="#tab-1">Add Ins. Company</a></li>
			<li class=""><a id="tab2" data-toggle="tab" href="#tab-2">Edit Ins. Company</a></li>
		  </ul>
          
		  <div class="tab-content">
			<div id="tab-1" class="tab-pane active">
				<div class="panel-body">
					<div class="col-lg-12 panel-body tab-panel">
						
						<form id="addAttorneyInfo" action="add_AttorneyInfo" method="post" class="form-horizontal">
						<h4>Attorney Information </h4>
						<div class="form-group">
							<label class="col-sm-2 control-label">Defendant</label>
							<div class="col-md-5">
								<select class="form-control input-sm" id="defendantId" name="defendantId" >
									<?php foreach($Defendant_Name as $row){?>
									<option value="<?php echo $row['Defendant_id']; ?>"><?php echo $row['Defendant_Name'];?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="form-group form-horizontal col-smd-12">
							<label class="col-sm-2 control-label">Last Name</label>
							<div class="col-sm-1">
								<input type="text" id="lastName" name="lastName" placeholder="Last Name" class="form-control input-sm">
							</div>
							<label class="col-sm-1 control-label">First Name</label>
							<div class="col-sm-1">
								<input type="text" id="firstName" name="firstName" placeholder="First Name" class="form-control input-sm">
							</div>
						</div>
						<div class="form-group form-horizontal col-smd-12">
							<label class="col-sm-2 control-label">Zip</label>
							<div class="col-sm-1">
								<input type="text" id="zip" name="zip" placeholder="Ex.000000" class="form-control input-sm">
							</div>
							<label class="col-sm-1 control-label">City</label>
							<div class="col-sm-1">
								<input type="text" id="city" name="city" placeholder="Ex.000000" class="form-control input-sm">
							</div>
							<label class="col-sm-1 control-label">State</label>
							<div class="col-sm-1">
								<select class="form-control input-sm"  id="state" name="state" >
									<?php foreach($State_Name as $row){?>
									<option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="form-group form-horizontal col-smd-12">
							<label class="col-sm-2 control-label">Phone</label>
							<div class="col-sm-1">
								<input type="text" id="phone" name="phone" placeholder="Ex.000000" class="form-control input-sm">
							</div>
							<label class="col-sm-1 control-label">Fax</label>
							<div class="col-sm-1">
								<input type="text" id="fax" name="fax" placeholder="Ex.000000" class="form-control input-sm">
							</div>
							<label class="col-sm-1 control-label">Email</label>
							<div class="col-sm-1">
								<input type="text" id="email" name="email" placeholder="abc@pqr.com" class="form-control input-sm">
							</div>
							
						</div>
						<div class="form-group form-horizontal col-sm-12">
							<div class="col-sm-2"> </div>
							<div class="col-sm-2">
								<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Save</button>
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
							
							<form action="" method="post" id="updateAttorney">
								<h4>Select Name To Edit</h4>
								<div class="form-group form-horizontal col-sm-12">
									<label class="col-sm-2 control-label">Name</label>
									<div class="col-sm-6">
										<select class="form-control input-sm" id="attorneyId" name="attorneyId">
											
										</select>
									</div>
								</div>
								<div class="form-group form-horizontal col-sm-12">
									<div class="col-sm-2"> </div>
									<div class="col-sm-2">
										<button type="submit" class="btn btn-primary"><i class="fa fa-paste"></i> Edit</button>
									</div>
								</div>
							</form>
                            
                            <form id="updateAttorneyInfo" action="updateattorney" method="post" class="form-horizontal" style="display:none;">
                                <h4>Attorney Information </h4>
                                <div class="form-group">
                                	<input type="hidden" id="attorneyIdU" name="attorneyIdU" class="form-control input-sm">
                                    
                                    <label class="col-sm-2 control-label">Defendant</label>
                                    <div class="col-md-5">
                                        <select class="form-control input-sm" id="defendantIdU" name="defendantIdU" >
                                            <?php foreach($Defendant_Name as $row){?>
                                            <option value="<?php echo $row['Defendant_id']; ?>"><?php echo $row['Defendant_Name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-smd-12">
                                    <label class="col-sm-2 control-label">Last Name</label>
                                    <div class="col-sm-1">
                                        <input type="text" id="lastNameU" name="lastName" placeholder="Last Name" class="form-control input-sm">
                                    </div>
                                    <label class="col-sm-1 control-label">First Name</label>
                                    <div class="col-sm-1">
                                        <input type="text" id="firstNameU" name="firstName" placeholder="First Name" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-smd-12">
                                    <label class="col-sm-2 control-label">Zip</label>
                                    <div class="col-sm-1">
                                        <input type="text" id="zipU" name="zip" placeholder="Ex.000000" class="form-control input-sm">
                                    </div>
                                    <label class="col-sm-1 control-label">City</label>
                                    <div class="col-sm-1">
                                        <input type="text" id="cityU" name="city" placeholder="Ex.000000" class="form-control input-sm">
                                    </div>
                                    <label class="col-sm-1 control-label">State</label>
                                    <div class="col-sm-1">
                                        <select class="form-control input-sm"  id="stateU" name="state" >
                                            <?php foreach($State_Name as $row){?>
                                            <option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-smd-12">
                                    <label class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-1">
                                        <input type="text" id="phoneU" name="phone" placeholder="Ex.000000" class="form-control input-sm">
                                    </div>
                                    <label class="col-sm-1 control-label">Fax</label>
                                    <div class="col-sm-1">
                                        <input type="text" id="faxU" name="fax" placeholder="Ex.000000" class="form-control input-sm">
                                    </div>
                                    <label class="col-sm-1 control-label">Email</label>
                                    <div class="col-sm-1">
                                        <input type="text" id="emailU" name="email" placeholder="abc@pqr.com" class="form-control input-sm">
                                    </div>
                                    
                                </div>
                                <div class="form-group form-horizontal col-sm-12">
                                    <div class="col-sm-2"> </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Save</button>
                                    </div>
                                </div>
                            </form>
							
						</div>
					</div>
				</div>
			</div>
			
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
<!-- App scripts --> 
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
<script>

/* Add Attorney information - Tab-1*/ /*---------- Tab-1 --------------------*/
	$("#addAttorneyInfo").submit(function(e)
	{
    	var postData = $(this).serializeArray();
		var formDataNew = $(this).serialize();
		var formURL = $(this).attr("action");
		console.log("formURL: "+formURL);
		console.log("formDataNew: "+formDataNew);
		//e.preventDefault();	//STOP default action
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data) 
			{
				$('input[type=text]').val('');
				$('#defendantId').val('');
				$('#state').val('');
				console.log("add success: "+data);
			},
			error: function(jqXHR, textStatus, errorThrown){ console.log("error"); }
		});
		
	});
/* *************************************************** */

/* Bind Attorney By clicking Tab-2 */  /*----------------- Tab-2 ---------------------*/
	$('#tab2').click(function(e){
		$.ajax({
			type:'POST',
			url:"<?php echo base_url(); ?>dataentry/getAtt",
			success:function(data){
				results = JSON.parse(data);
				var optionsAsString = "";
				for($i in results.Attorney_Name){
					//console.log(results.Adjuster_Name[$i].Adjuster_Id);
					optionsAsString += "<option value='" + results.Attorney_Name[$i].Attorney_Id + "'>" + results.Attorney_Name[$i].Attorney_LastName + " ," + results.Attorney_Name[$i].Attorney_FirstName + "</option>";
				}
				$( 'select[name="attorneyId"]' ).append( optionsAsString );
				
			},
			error: function(result){ console.log("error"); }
		
		});
		e.preventDefault();	//STOP default action
	});
/* *************************************************** */

/* Get Afjuster info By Id - Tab-2 */ /*----------------- Edit ---------------------*/
	$("#updateAttorney").submit(function(e){
		var form = $(this);
		var params = form.serialize();
		var nameValue = document.getElementById("attorneyId").value;
		console.log("Edit: "+nameValue);
		
		e.preventDefault();	//STOP default action
		
		$.ajax({
			type:'POST',
			url:"<?php echo base_url(); ?>dataentry/getAttorneyById",
			data: params,
			success:function(data){
				results = JSON.parse(data);
				$("#updateAttorneyInfo").css("display", "block");
				console.log("Retrieved data: "+data);
				
				$("#attorneyIdU").val(nameValue);
				$("#defendantIdU").val(results.AttorneyInfoById[0].Defendant_Id);
				$("#lastNameU").val(results.AttorneyInfoById[0].Attorney_LastName);
				$("#firstNameU").val(results.AttorneyInfoById[0].Attorney_FirstName);
				$("#zipU").val(results.AttorneyInfoById[0].Attorney_Zip);
				$("#cityU").val(results.AttorneyInfoById[0].Attorney_City);
				$("#stateU").val(results.AttorneyInfoById[0].Attorney_State);
				$("#phoneU").val(results.AttorneyInfoById[0].Attorney_Phone);
				$("#faxU").val(results.AttorneyInfoById[0].Attorney_Fax);
				$("#emailU").val(results.AttorneyInfoById[0].Attorney_Email);	
			},
			error: function(result){ console.log("error"); }
		});
		
	});
/* *************************************************** */	

	

/*Update Adjuster information on Tab-2*/  /*----------------- Update ---------------------*/
	$("#updateAttorneyInfo").submit(function(e){
		var form = $(this);
		var formDataNew = form.serialize();
    	var formData = form.serializeArray();
		var formURL = $(this).attr("action");
		//console.log("Update: "+formData);
		console.log("Update: "+formDataNew);
		e.preventDefault();	//STOP default action
		
		$.ajax({
			url : formURL,
			type: "POST",
			data : formData,
			success:function(data) 
			{
				results = JSON.parse(data);
				console.log("Update success: "+data);
				$('input[type=text]').val('');
				$('#defendantIdU').val('');
				$('#stateU').val('');
				$("#updateAttorneyInfo").css("display", "none");
			},
			error: function(result) { alert(); }
		});
		
	});
/* *************************************************** */	
	$("#ajaxform").submit(); //SUBMIT FORM
</script>
<script>
	$('.dataentry').addClass('active');
</script>
</body>
</html>