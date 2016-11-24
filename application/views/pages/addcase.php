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
			
			<form id="addCaseForm" role="form" action="addCaseInfo" method="post" >
				<h4 class="h4-title">CASE INFORMATION</h4>
				<div class="form-group form-horizontal col-md-12">
					<p>(Note: All amounts are in USD wherever applicable.)</p>
					<label class="col-md-2 control-label">Initial Status <span class="required-field">*</span></label>
					<div class="col-md-4 radio">
						<label><input type="radio" value="option1" id="arbitration" name="initialStatus">ARBITRATION</label>
						<label><input type="radio" value="option2" id="litigation" name="initialStatus">LITIGATION</label>
					</div>
				</div>
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">Provider Name <span class="required-field">*</span></label>
					<div class="col-md-2">	
						<input type="text" id="providerName" name="providerName" class="form-control input-sm" required>
					</div>
					<label class="col-md-2 control-label">Select Provider <span class="required-field">*</span></label>
					<div class="col-md-2">	
						<select class="form-control input-sm" id="providerId" name="providerId" required>
                            <option>-- Select Provider --</option>
                            <?php foreach($Provider_Name as $row){?>
                            <option value="<?php echo $row['Provider_Id']; ?>"> <?php echo $row['Provider_Name']; ?> </option>
                            <?php }?>
                        </select>
					</div>
					<div class="form-horizontal col-md-12 hr-line-dashed"></div>
				</div>

				<h4 class="h4-title">Injured Party Information</h4>
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">Last Name <span class="required-field">*</span></label>
					<div class="col-md-2">
						<input type="text" id="lastNameInjured" name="lastNameInjured" placeholder="Last Name" class="form-control input-sm" required> 
					</div>
					<label class="col-md-2 control-label">First Name <span class="required-field">*</span></label>
					<div class="col-md-2">
						<input type="text" id="firstNameInjured" name="firstNameInjured" placeholder="First Name" class="form-control input-sm" required>
					</div>
					<div class="form-horizontal col-md-12 hr-line-dashed"></div>
				</div>

				<h4 class="h4-title">Insured Party Information </h4>
				<div class="form-group form-horizontal col-md-12">
					<div class="col-md-2">
					</div>
					<div class="col-md-6 checkbox">
						<label><input type="checkbox" id="checkbox1" >Check here if same as Patient Information.</label>
					</div>
				</div>
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">Last Name <span class="required-field">*</span></label>
					<div class="col-md-2">
						<input type="text" id="lastNameInsured" name="lastNameInsured" placeholder="Last Name" class="form-control input-sm" required> 
					</div>
					<label class="col-md-2 control-label">First Name <span class="required-field">*</span></label>
					<div class="col-md-2">
						<input type="text" id="firstNameInsured" name="firstNameInsured" placeholder="First Name" class="form-control input-sm" required>
					</div>
					<div class="form-horizontal col-md-12 hr-line-dashed"></div>
				</div>

				<h4 class="h4-title">Insurance Information</h4>
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">Name <span class="required-field">*</span></label>
					<div class="col-md-2">	
						<input type="text" id="insuranceName" name="insuranceName" class="form-control input-sm" required>
					</div>
					<label class="col-md-2 control-label">Select Insurance comp. <span class="required-field">*</span></label>
					<div class="col-md-2">	
						<select class="form-control input-sm" id="insuranceId" name="insuranceId" required>
                       	 	<option>--Select Insurance comp.--</option>
                            <?php foreach($InsuranceCompany_Name as $row){?>
                            <option value="<?php echo $row['InsuranceCompany_Id']; ?>"><?php echo $row['InsuranceCompany_Name'];?></option>
                            <?php }?>
                        </select>
					</div>
				</div>
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">Policy#</label>
					<div class="col-md-2">	
						<input type="text" id="policyInsurance" name="policyInsurance" class="form-control input-sm">
					</div>
					<label class="col-md-2 control-label">Claim#</label>
					<div class="col-md-2">	
						<input type="text" id="cliamInsurance" name="cliamInsurance" class="form-control input-sm">
					</div>
					<div class="form-horizontal col-md-12 hr-line-dashed"></div>
				</div>

				<h4 class="h4-title">Accident Information</h4>
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">D.O.B <span class="required-field">*</span></label>
					<div class="col-md-2"> <input id="doBirth" name="doBirth" type="text" class="form-control input-sm" > </div>
					<div class="form-horizontal col-md-12 hr-line-dashed"></div>
				</div>

				<h4 class="h4-title">Other Information </h4>
				<div class="form-group form-horizontal col-lg-12">
					<label class="col-md-2 control-label">Status</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="status" name="status">
                            <option>-- Select Status --</option>
                            <?php foreach($Status as $row){?>
                            <option value="<?php echo $row['Status_Id']; ?>"> <?php echo $row['Status_Type']; ?> </option>
                            <?php }?>
                        </select>
					</div>
					<label class="col-md-2 control-label"> Index/AAA #</label>
					<div class="col-md-2">
						<input id="indexA"  name="indexA" type="text" class="form-control input-sm">
					</div>
					<label class="col-md-2 control-label">Court Name</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="court" name="court">
                            <option>-- Select Court --</option>
                            <?php foreach($Court as $row){?>
                            <option value="<?php echo $row['Court_Id']; ?>"> <?php echo $row['Court_Name']; ?> </option>
                            <?php }?>
                        </select>
					</div>
				</div>
				<div class="form-group form-horizontal col-lg-12 set-bg">
					<div class="col-md-1 align-dostart">
						<label class="control-label">D.O.S-Start</label>
						<input id="dosStart" name="dosStart" type="text" value="02/16/2012" class="form-control input-sm">
					</div>
					<div class="col-md-1 ">
						<label class="control-label">D.O.S.-End</label>
						<input id="dosEnd"  name="dosEnd" type="text" value="02/16/2012" class="form-control input-sm">
					</div>
					<div class="col-md-1">
						<label class="control-label">Claim Amt.</label>
						<input type="text" id="claimAmt" name="claimAmt" class="form-control input-sm">
					</div>
					<div class="col-md-1">
						<label class="control-label">Paid Amt.</label>
						<input type="text" id="paidAmt" name="paidAmt" class="form-control input-sm">
					</div>
					<div class="col-md-2">
						<label class="control-label">Date Bill Sent</label>
						<input id="dateBillSent" name="dateBillSent" type="text" value="02/16/2012" class="form-control input-sm">
					</div>
					<div class="col-md-2 ">
						<label class="control-label">Service Type</label>
						<div>
							<select class="form-control input-sm" id="serviceType" name="serviceType">
                                <option>-- Select Service--</option>
                                <?php foreach($Service as $row){?>
                                <option value="<?php echo $row['ServiceType_ID']; ?>"> <?php echo $row['ServiceType']; ?> </option>
                                <?php }?>
                            </select>
						</div>
					</div>
					<div class="col-md-2">
						<label class="control-label">Denial Reason</label>
						<div>
						<select class="form-control input-sm" id="denialReason" name="denialReason" >
                            <option>-- Select Denial reason --</option>
                            <?php foreach($DenialReasons as $row){?>
                            <option value="<?php echo $row['DenialReasons_Id']; ?>"> <?php echo $row['DenialReasons_Type']; ?> </option>
                            <?php }?>
                        </select>
						</div>
					</div>
					<div class="col-md-1" style="text-align:center">
						<label class="control-label col-md-12">Delete</label>
						<span><button type="button" class="btn btn-primary create">Add</button></span> 
					</div>
				</div>
				<div class="form-group form-horizontal col-lg-12">
					<div class="col-md-2">
						<button type="button" class="btn w-xs btn-primary">Delete Checked</button>
					</div>
				</div>
				<div class="form-group form-horizontal col-lg-12">
					<label class="col-md-2 control-label">Memo</label>
					<div class="col-md-4">
						<textarea rows="3"  id="memo" name="memo" class="form-control" ></textarea>
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button><br><br>
					</div>
				</div>
			</form><!--form end -->
		</div><!-- End of panel-body tab-panel-->
		</div><!-- End hpanel -->
		</div><!-- End col-lg-12-->
	</div><!-- End row-->
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
	$('#checkbox1').change(function() {
		if ($(this).is(':checked')) {
			var lastNameInsured = $("#lastNameInjured").val();
			var firstNameInjured = $("#firstNameInjured").val();
			$('#lastNameInsured').val(lastNameInsured);
			$('#firstNameInsured').val(firstNameInjured);
		}else{
			$('#lastNameInsured').val("");
			$('#firstNameInsured').val("");
		}
		
		
    });
</script>
<script>
$(function(){
	$('#doBirth').datepicker();
	$('#dosStart').datepicker();
	$('#dosEnd').datepicker();
	$('#datapicker4').datepicker();
	$('#dateBillSent').datepicker();
	$('.input-group.date').datepicker({ });
	$('.input-daterange').datepicker({ });
});
</script>
<script>

	$(function(){
         $("#addCaseForm").validate({
            rules: {
				initialStatus: {
					required: true
				},
                providerName: {
                    required: true,
					minlength: 3
                },
				providerId: {
                    required: true
                },
				lastNameInjured: {
                    required: true,
					minlength: 3
                },
				firstNameInjured: {
                    required: true,
					minlength: 3
                },
				lastNameInsured: {
                    required: true,
					minlength: 3
                },
				firstNameInsured: {
                    required: true,
					minlength: 3
                },
				insuranceName: {
					required: true
				},
				claimAmt: {
					required: true,
					number: true
				},
				paidAmt: {
					required: true,
					number: true
				},
				
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
	});
</script>
<script>
	$('.dataentry').addClass('active');
</script>
</body>
</html>