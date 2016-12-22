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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/select2-3.5.2/select2.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/select2-bootstrap/select2-bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" />
    
    <!-- DATETIMEPICKER CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/datetimepicker/jscss/css/bootstrap-datetimepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css" />
    
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
    <h1>Homer - Responsive Admin Theme</h1>
    <p>Special AngularJS Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p>
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
		<div class="panel-heading"></div>
		<div class="panel-body tab-panel">
			
			<form id="addCaseForm" role="form" action="add_CaseInfo" method="post" >
				
				<div class="form-group form-horizontal col-md-12">
                	<h5 class="h4-title">CASE INFORMATION</h5>
					<!--<p>(Note: All amounts are in USD wherever applicable.)</p>-->
					<label class="col-md-2 control-label">Initial Status</label>
					<div class="col-md-6 radio">
						<label><input type="radio" class="horizontal" value="ARBITRATION" id="arbitration" name="initialStatus">ARBITRATION</label>
						<label><input type="radio" class="horizontal" value="LITIGATION" id="litigation" name="initialStatus">LITIGATION</label>
                        <label><input type="radio" class="horizontal" value="INITIAL SUBMISSION" id="initialSubmission" name="initialStatus">INITIAL SUBMISSION</label>
                        <label><input type="radio" class="horizontal" value="PERSONAL INJURY" id="personalInjury" name="initialStatus">PERSONAL INJURY</label>
					</div>
				</div>
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">Provider Name</label>
					<div class="col-md-2">	
						<input type="text" id="providerName" name="providerName" class="form-control input-sm">
                        <input type="hidden" name="providerNameHidden">
					</div>
					<label class="col-md-2 control-label">Select Provider</label>
					<div class="col-md-2">	
						<select class="form-control input-sm" id="providerId" name="providerId">
                            <option selected="selected" value=""></option>
                            <?php foreach($Provider_Name as $row){?>
                            <option value="<?php echo $row['Provider_Id']; ?>"> <?php echo $row['Provider_Name']; ?> </option>
                            <?php }?>
                        </select>
					</div>
					<div class="form-horizontal col-md-12 hr-line-dashed"></div>
				</div>

				
				<div class="form-group form-horizontal col-md-12">
                	<h5 class="h4-title">Injured Party Information</h5>
					<label class="col-md-2 control-label">Last Name <span class="required-field">*</span></label>
					<div class="col-md-2">
						<input type="text" id="injuredPartyLastName" name="injuredPartyLastName" placeholder="Last Name" class="form-control input-sm" required> 
					</div>
					<label class="col-md-2 control-label">First Name <span class="required-field">*</span></label>
					<div class="col-md-2">
						<input type="text" id="injuredPartyFirstName" name="injuredPartyFirstName" placeholder="First Name" class="form-control input-sm" required>
					</div>
					<div class="form-horizontal col-md-12 hr-line-dashed"></div>
				</div>

				
				<div class="form-group form-horizontal col-md-12">
                	<h5 class="h4-title">Insured Party Information </h5>
					<div class="col-md-2">
					</div>
					<div class="col-md-6 checkbox">
						<label><input type="checkbox" id="checkbox1" >Check here if same as Patient Information.</label>
					</div>
				</div>
                
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">Last Name</label>
					<div class="col-md-2">
						<input type="text" id="insuredPartyLastName" name="insuredPartyLastName" placeholder="Last Name" class="form-control input-sm"> 
					</div>
					<label class="col-md-2 control-label">First Name</label>
					<div class="col-md-2">
						<input type="text" id="insuredPartyFirstName" name="insuredPartyFirstName" placeholder="First Name" class="form-control input-sm">
					</div>
					<div class="form-horizontal col-md-12 hr-line-dashed"></div>
				</div>

				
				<div class="form-group form-horizontal col-md-12">
                	<h5 class="h4-title">Insurance Information</h5>
					<label class="col-md-2 control-label">Name</label>
					<div class="col-md-2">	
						<input type="text" id="insuranceName" name="insuranceName" class="form-control input-sm">
                        <input type="hidden" name="insuranceNameHidden">
					</div>
					<label class="col-md-2 control-label">Select Insurance comp.</label>
					<div class="col-md-2">	
						<select class="form-control input-sm" id="insuranceCompanyId" name="insuranceCompanyId">
                       	 	<option selected="selected" value=""></option>
                            <?php foreach($InsuranceCompany_Name as $row){?>
                            <option value="<?php echo $row['InsuranceCompany_Id']; ?>"><?php echo $row['InsuranceCompany_Name'];?></option>
                            <?php }?>
                        </select>
					</div>
				</div>
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">Policy# <span class="required-field">*</span></label>
					<div class="col-md-2">	
						<input type="text" id="policyNumber" name="policyNumber" class="form-control input-sm"  required>
					</div>
					<label class="col-md-2 control-label">Claim#</label>
					<div class="col-md-2">	
						<input type="text" id="insClaimNumber" name="insClaimNumber" class="form-control input-sm">
					</div>
					<div class="form-horizontal col-md-12 hr-line-dashed"></div>
				</div>
                
				
				<div class="form-group form-horizontal col-md-12">
                	<h5 class="h4-title">Accident Information</h5>
					<label class="col-md-2 control-label">D.O.A <span class="required-field">*</span></label>
					<div class="col-md-2"> <input id="accidentDate" name="accidentDate"  class="form-control input-sm datetimepicker" required> </div>
					<div class="form-horizontal col-md-12 hr-line-dashed"></div>
				</div>

				
				<div class="form-group form-horizontal col-lg-12">
                	<h5 class="h4-title">Other Information </h5>
					<label class="col-md-2 control-label">Status</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="status" name="status">
                            <option selected="selected" value=""></option>
                            <?php foreach($Status as $row){?>
                            <option value="<?php echo $row['Status_Id']; ?>"> <?php echo $row['Status_Type']; ?> </option>
                            <?php }?>
                        </select>
					</div>
					<label class="col-md-2 control-label"> Index/AAA #</label>
					<div class="col-md-2">
						<input id="indexOrAAANumber"  name="indexOrAAANumber" type="text" class="form-control input-sm phone-format">
					</div>
					<label class="col-md-2 control-label">Court Name <span class="required-field">*</span></label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="courtId" name="courtId" required >
                            <option selected="selected" value=""></option>
                            <?php foreach($Court as $row){?>
                            <option value="<?php echo $row['Court_Id']; ?>"> <?php echo $row['Court_Name']; ?> </option>
                            <?php }?>
                        </select>
					</div>
				</div>
                
                
                
                <div class="form-group form-horizontal col-lg-12 set-bg">
                
                	<div class="table-responsive1">
                        <table cellpadding="1" cellspacing="1" class="table table-bordered add-case-table">
                            <thead>
                            <tr>
                                <th>D.O.S-Start</th>
                                <th>D.O.S.-End</th>
                                <th>Claim Amt.</th>
                                <th>Paid Amt.</th>
                                <th>Date Bill Sent</th>
                                <th>Service Type</th>
                                <th>Denial Reason</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="first-row">
                                <td><input id="dateOfServiceStart" name="dateOfServiceStart" class="form-control input-sm datetimepicker_Dos_Doe"></td>
                                <td><input id="dateOfServiceEnd"  name="dateOfServiceEnd" class="form-control input-sm datetimepicker_Dos_Doe"></td>
                                <td><input type="number" step="0.01" id="claimAmt" name="claimAmt" class="form-control input-sm"></td>
                                <td><input type="number" step="0.01" id="paidAmt" name="paidAmt" class="form-control input-sm"></td>
                                <td><input id="dateBillSent" name="dateBillSent" class="form-control input-sm datetimepicker_Dos_Doe"></td>
                                <td><select class="form-control input-sm" id="serviceType" name="serviceType">
                                        <option selected="selected" value=""></option>
                                        <?php foreach($Service as $row){?>
                                        <option value="<?php echo $row['ServiceType_ID']; ?>"> <?php echo $row['ServiceType']; ?> </option>
                                        <?php }?>
                                    </select></td>
                                <td><select class="form-control input-sm" id="denialReasons" name="denialReasons" >
                                        <option selected="selected" value=""></option>
                                        <?php foreach($DenialReasons as $row){?>
                                        <option value="<?php echo $row['DenialReasons_Id']; ?>"> <?php echo $row['DenialReasons_Type']; ?> </option>
                                        <?php }?>
                                    </select></td>
                                <td><span><button type="button" id="addOtherInfo" class="btn btn-primary create">Add</button></span></td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                </div>
                <div class="form-group form-horizontal col-lg-12">
					<div class="col-md-2">
						<button type="button" id="DeleteButton" class="btn w-xs btn-primary" style="display:none;">Delete Checked</button>
					</div>
				</div>
                
				
				<div class="form-group form-horizontal col-lg-12">
					<label class="col-md-2 control-label">Memo</label>
					<div class="col-md-4">
						<textarea rows="3"  id="memo" name="memo" class="form-control" ></textarea>
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>  <button type="button" id="cancel" class="btn btn-primary">Cancel</button><br><br>
					</div>
				</div>
			</form><!--form end -->
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


<!-- Right sidebar -->
<div id="right-sidebar" class="animated fadeInRight"> </div>

<!-- Footer-->
<footer class="footer"> <span class="pull-right"> Example text </span> Company 2015-2020 </footer>
</div>

    <!-- Vendor scripts --> 
    <script src="<?php echo base_url();?>assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery-ui/jquery-ui.min.js"></script> 
    
    <script src="<?php echo base_url();?>assets/vendor/slimScroll/jquery.slimscroll.min.js"></script> 
    <script src="<?php echo base_url();?>assets/datetimepicker/jscss/js/bootstrap.min.js"></script> 
    <script src="<?php echo base_url();?>assets/vendor/metisMenu/dist/metisMenu.min.js"></script> 
    <script src="<?php echo base_url();?>assets/vendor/iCheck/icheck.min.js"></script> 
    <script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script> 
    <script src="<?php echo base_url();?>assets/vendor/select2-3.5.2/select2.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/mask-phone/maskPhone.js"></script>
    
    <!-- DATETIMEPICKER SCRIPTS -->
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/mask-phone/maskPhone.js"></script>
    <script src="<?php echo base_url();?>assets/datetimepicker/jscss/js/moment-with-locales.js"></script>
    <script src="<?php echo base_url();?>assets/datetimepicker/jscss/js/bootstrap-datetimepicker.js"></script>
    
    <!-- ALERT SCRIPTS -->
    <script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/toastr/build/toastr.min.js"></script>
    <!-- App scripts --> 
    <script src="<?php echo base_url();?>assets/scripts/homer.js"></script> 
    
<script>
	$("#cancel").click(function(){
		$('input').val('');
		$('select').val('');
		//$('input[type=radio]').val('');
		$('textarea').val('');
		/*$('#providerId').val('');
		$('#insuranceCompanyId').val('');
		$('#status').val('');
		$('#courtId').val('');
		$('#serviceType').val('');
		$('#denialReasons').val('');*/
		$('.datepicker_recurring_start').val(''); 
	});
	$('#checkbox1').change(function() {
		if ($(this).is(':checked')) {
			var injuredPartyLastName = $("#injuredPartyLastName").val();
			var injuredPartyFirstName = $("#injuredPartyFirstName").val();
			$('#insuredPartyLastName').val(injuredPartyLastName);
			$('#insuredPartyFirstName').val(injuredPartyFirstName);
		}else{
			$('#insuredPartyLastName').val("");
			$('#insuredPartyFirstName').val("");
		}
		
    });
</script>
<script>
	function callSuccess() {
		swal({
			title: "Successfully submitted",
			type: "success"
		});
	}
	
	var countForRows = 0;
	var value = 0;
	$("#addOtherInfo").click(function(){
		if(countForRows >= 0){
			console.log("ccc: "+countForRows);
			$("#DeleteButton").css("display", "block");
		}
		countForRows++;
		  
		var addNewRow = '<tr class="r'+value+'">';
		    addNewRow += '<td><input name="dateOfServiceStart" class="form-control input-sm datetimepicker_Dos_Doe"></td>';
            addNewRow += '<td><input name="dateOfServiceEnd" class="form-control input-sm datetimepicker_Dos_Doe"></td>'
            addNewRow += '<td><input type="text" name="claimAmt" class="form-control input-sm"></td>'
            addNewRow += '<td><input type="text" name="paidAmt" class="form-control input-sm"></td>'
            addNewRow += '<td><input class="form-control input-sm datetimepicker_Dos_Doe" name="dateBillSent"></td>';
			addNewRow += '<td><select class="form-control input-sm" name="serviceType"><option>-- Select Service--</option><?php foreach($Service as $row){?><option value="<?php echo $row['ServiceType_ID']; ?>"> <?php echo $row['ServiceType']; ?> </option><?php }?></select></td>';
			
			addNewRow += '<td><select class="form-control input-sm" name="denialReasons"><option>-- Select Denial reason --</option><?php foreach($DenialReasons as $row){?><option value="<?php echo $row['DenialReasons_Id']; ?>"> <?php echo $row['DenialReasons_Type']; ?> </option><?php }?></select></td>';
			addNewRow += '<td><input class="ads_Checkbox" type="checkbox" name="delete[]" value="'+value+'"></td>';
			value++;
			addNewRow += '</tr>';
						  
		$(addNewRow).insertBefore(".first-row");
	});
	
	 $('#DeleteButton').click(function(){
		var final = '';
		$('.ads_Checkbox:checked').each(function(){        
			var values = $(this).val();
			$(".r"+values).remove();
			countForRows--;
		});
		if(countForRows == 0){
			$("#DeleteButton").css("display", "none");
		}
		
	});
	/*$('input[name=dateOfServiceStart]').datepicker({
			"autoclose": true,
			"todayHighlight": true
		});*/
	/*$(function(){
		//$("#accidentDate").datepicker("setDate", new Date());
		$('#accidentDate').datepicker({
			"autoclose": true,
			"todayHighlight": true
		});
		
		$('#dateOfServiceEnd').datepicker({
			"autoclose": true,
			"todayHighlight": true
		});
		$('#datapicker4').datepicker({
			"autoclose": true,
			"todayHighlight": true
		});
		$('#dateBillSent').datepicker({
			"autoclose": true,
			"todayHighlight": true
		});
	});*/
	/*$('select#providerId').on('change', function() {
		var option = $(this).find('option:selected').val();
		$('#showoption').val(option);
		
		var providerName = $(this).text();
		console.log("providerName: "+providerName);
		$("#providerName").val(providerName);
	});*/
	
	
</script>
<script>
	$("#addCaseForm").validate({
	
		rules: {
			injuredPartyLastName: {
				required: true,
				minlength: 3
			},
			injuredPartyFirstName: {
				required: true,
				minlength: 3
			},
			policyNumber:{
				required: true
			},
			accidentDate:{
				required: true
			},
			courtId:{
				required: true
			},
			claimAmt: {
				number: true
			},
			paidAmt: {
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
				url:"<?php echo base_url(); ?>dataentry/add_CaseInfo",
				type: "post",
				data: serializedData
			});

			// callback handler that will be called on success
			request.done(function (response, textStatus, jqXHR) {
				// log a message to the console
				console.log("Hooray, it worked!");
				$('input[type=text]').val('');
				$('input[type=radio]').val('');
				$('textarea').val('');
				$('#providerId').val('');
				$('#insuranceCompanyId').val('');
				$('#status').val('');
				$('#courtId').val('');
				$('#serviceType').val('');
				$('#denialReasons').val('');   
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
	$('#providerId').on('change', function() {
		var providerName =$("#providerId option:selected").text();
		var providerId =$("#providerId option:selected").val();
		$("input[name=providerName]").val(providerName);
		$("input[name=providerNameHidden]").val(providerId);
	});
	$('#insuranceCompanyId').on('change', function() {
		var insuranceName =$("#insuranceCompanyId option:selected").text();
		var insuranceId =$("#insuranceCompanyId option:selected").val();
		$("input[name=insuranceName]").val(insuranceName);
		$("input[name=insuranceNameHidden]").val(insuranceId);
	});
	$("input[name=providerName]").prop("disabled", true);
	$("input[name=insuranceName]").prop("disabled", true);
	
	
	$('body').on('focus',".phone-format", function(){
		$(this).mask("999999/99");
	});
	
	/*$('body').on('focus',".datetimepicker", function(){
		$(this).datetimepicker({
			format:'YYYY/MM/DD HH:mm:ss'
		})
	});*/
	$('body').on('focus',".datetimepicker", function(){
		$(this).datetimepicker({
			format:'YYYY/MM/DD HH:mm:ss'
		})
	});
	$('body').on('focus',".datetimepicker_Dos_Doe", function(){
		$(this).datetimepicker({
			format:'MM/DD/YYYY HH:mm:ss'
		})
	});
	$('body').on('focus',".datepicker_recurring_start", function(){
		$(this).datepicker({
			"autoclose": true,
			"todayHighlight": true,
			"selectOtherMonths": true
		});
	});
</script>
<script>
	$('.dataentry').addClass('active');
	$('.addCaseInfo').addClass('active');
</script>
</body>
</html>