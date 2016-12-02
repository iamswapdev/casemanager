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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/styles/style.css">

</head>
<body>

<!-- Simple splash screen-->
<!--<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Homer - Responsive Admin Theme</h1><p>Special AngularJS Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><img src="images/loading-bars.svg" width="64" height="64" /> </div> </div>-->
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
		<div class="panel-heading"></div>
		<div class="panel-body tab-panel">
			
			
			<form method="get" class="form-horizontal label-font">

				<div class="form-group form-horizontal col-md-12">
                <h5 class="h4-title">Search</h5>
					<label class="col-md-2 control-label">CASE ID</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm">
					</div>
                    <label class="col-md-2 control-label">INJURED NAME</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm">
					</div>
                    <label class="col-md-2 control-label">INSURED NAME</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm">
					</div>
				</div>

				<div class="form-group form-horizontal col-md-12">
					
					<label class="col-md-2 control-label">POLICY NUMBER</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm">
					</div>
					<label class="col-md-2 control-label">INS. CLAIM #</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm">
					</div>
					<label class="col-md-2 control-label">INDEX#/AAA#</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm">
					</div>

				</div>
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">STATUS</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="status" name="status">
                            <option selected="selected" value=""></option>
                            <?php foreach($Status as $row){?>
                            <option value="<?php echo $row['Status_Id']; ?>"> <?php echo $row['Status_Type']; ?> </option>
                            <?php }?>
                        </select>
					</div>
					<label class="col-md-2 control-label">INSURANCE COMP.</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="insuranceCompanyId" name="insuranceCompanyId">
                       	 	<option selected="selected" value=""></option>
                            <?php foreach($InsuranceCompany_Name as $row){?>
                            <option value="<?php echo $row['InsuranceCompany_Id']; ?>"><?php echo $row['InsuranceCompany_Name'];?></option>
                            <?php }?>
                        </select>
					</div>
					<label class="col-md-2 control-label">COURT TYPE</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="courtId" name="courtId" required >
                            <option selected="selected" value=""></option>
                            <?php foreach($Court as $row){?>
                            <option value="<?php echo $row['Court_Id']; ?>"> <?php echo $row['Court_Name']; ?> </option>
                            <?php }?>
                        </select>
					</div>
				</div>
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">CASE STATUS</label>
					<div class="col-md-2">
						<select class="form-control input-sm" name="account">
                            <option selected="selected" value=""></option>
                            <?php foreach($CaseStatus as $row){?>
                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
                            <?php }?>
						</select>
					</div>
					<label class="col-md-2 control-label">PROVIDER</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="providerId" name="providerId">
                            <option selected="selected" value=""></option>
                            <?php foreach($Provider_Name as $row){?>
                            <option value="<?php echo $row['Provider_Id']; ?>"> <?php echo $row['Provider_Name']; ?> </option>
                            <?php }?>
                        </select>
					</div>
					<label class="col-md-2 control-label">DEFENDANT NAME</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="defendantId" name="defendantId" required>
                            <option selected="selected" value=""></option>
                            <?php foreach($Defendant_Name as $row){?>
                            <option value="<?php echo $row['Defendant_id']; ?>"><?php echo $row['Defendant_Name'];?></option>
                            <?php }?>
                        </select>
					</div>
				</div>
                <div class="form-group form-horizontal col-md-12">
                	<label class="col-md-2 control-label">ADJUSTER NAME</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="adjusterId" name="adjusterId" required>
                            <option selected="selected" value=""></option>
                            <?php foreach($Adjuster_Name as $row){?>
                            <option value="<?php echo $row['Adjuster_Id']; ?>"><?php echo $row['Adjuster_LastName'].", ".$row['Adjuster_FirstName'];?></option>
                            <?php }?>
                        </select>
					</div>
                </div>
                <div class="form-group form-horizontal col-md-12">
					<div class="col-md-2"></div>
					<div class="col-md-4">
						<button type="button" class="btn btn-primary">Search</button>
						<button class="btn btn-primary" type="submit">Reset</button>   
					</div>
				</div>
         <!-- <div class="form-group form-horizontal col-md-12">      
			<table class="table">
              <tbody>
				<tr>
                  <td><label class="control-label">CASE ID</label></td> 
                  <td><input type="text" class="form-control input-sm"></td>
                  <td><label class="control-label">INJURED NAME</label></td>
                  <td><input type="text" class="form-control input-sm"></td>
                  <td><label class="control-label">INSURED NAME</label></td>
                  <td><input type="text" class="form-control input-sm"></td>
                  <td><label class="control-label">POLICY NUMBER</label></td>
                  <td><input type="text" class="form-control input-sm"></td>
                </tr>
                <tr>
                  <td><label class="control-label">CASE ID</label></td> 
                  <td><input type="text" class="form-control input-sm"></td>
                  <td><label class="control-label">INJURED NAME</label></td>
                  <td><input type="text" class="form-control input-sm"></td>
                  <td><label class="control-label">INSURED NAME</label></td>
                  <td><input type="text" class="form-control input-sm"></td>
                  <td><label class="control-label">POLICY NUMBER</label></td>
                  <td><input type="text" class="form-control input-sm"></td>
                </tr>
                <tr>
                  <td ><label class="control-label">CASE ID</label></td> 
                  <td colspan="2"><input type="text" class="form-control input-sm"></td>
                  <td><label class="control-label">INJURED NAME</label></td>
                  <td colspan="2"><input type="text" class="form-control input-sm"></td>
                </tr>
             </tbody>
           </table>  
         </div> --> 

				


			</form>
			
			<h5 class="h4-title">Search Results</h5>
			<div class="form-group form-horizontal col-md-12 table-responsive">
				<table id="example1" class="table dataTable table-bordered table-striped advanced-search">
					<thead>
						<tr>
							<th>#</th> 	 	   	 	    	      	      	     	 	 	 	   	 	
							<th>EDIT</th>
							<th>&nbsp;CASE ID</th>
							<th>INJURED PARTY</th>
							<th>PROVIDER</th>
							<th>INSURANCE COMPANY</th>
							<th>&nbsp;&nbsp;&nbsp;&nbsp;DOA&nbsp;&nbsp;&nbsp;&nbsp;</th>
							<th>DATE OF SERVICE START</th>
                            <th>DATE OF SERVICE END</th>
							<th>STATUS</th>
							<th>CLAIM NUMBER</th>
							<th>CLAIM AMT.</th>
                            <th>Indexor aaa_number</th>
                            <th>INITIAL STATUS</th>
						</tr>
					</thead>
				</table>
			</div>
			
			
			
		</div><!-- End of panel-body tab-panel-->
		</div><!-- End hpanel -->
		</div><!-- End col-lg-12-->
	</div><!-- End row-->
	
    
</div>
<div class="content animate-panel edit-case-info" style="display:none;">
    
	<div class="row">
		<div class="col-lg-12">
		<div class="hpanel">
		<div class="panel-heading"></div>
		<div class="panel-body tab-panel">
			
			<form id="addCaseForm" role="form" action="add_CaseInfo" method="post" >
				
				<div class="form-group form-horizontal col-md-12">
                	<h5 class="h5-title">CASE INFORMATION</h5>
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
                	<h5 class="h5-title">Injured Party Information</h5>
					<label class="col-md-2 control-label">Last Name <span class="required-field">*</span></label>
					<div class="col-md-2">
						<input type="text" id="injuredPartyLastName" name="injuredPartyLastName" placeholder="Last Name" class="form-control input-sm" value="<?php echo $CaseInfo['InsuredParty_LastName'];?>" required> 
					</div>
					<label class="col-md-2 control-label">First Name <span class="required-field">*</span></label>
					<div class="col-md-2">
						<input type="text" id="injuredPartyFirstName" name="injuredPartyFirstName" placeholder="First Name" class="form-control input-sm" value="<?php echo $CaseInfo['InsuredParty_FirstName'];?>" required>
					</div>
					<div class="form-horizontal col-md-12 hr-line-dashed"></div>
				</div>

				
				<div class="form-group form-horizontal col-md-12">
                	<h5 class="h5-title">Insured Party Information </h5>
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
                	<h5 class="h5-title">Insurance Information</h5>
					<label class="col-md-2 control-label">Name</label>
					<div class="col-md-2">	
						<input type="text" id="insuranceName" name="insuranceName" class="form-control input-sm">
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
                	<h5 class="h5-title">Accident Information</h5>
					<label class="col-md-2 control-label">D.O.A <span class="required-field">*</span></label>
					<div class="col-md-2"> <input id="accidentDate" name="accidentDate"  class="form-control input-sm datepicker_recurring_start" required> </div>
					<div class="form-horizontal col-md-12 hr-line-dashed"></div>
				</div>

				
				<div class="form-group form-horizontal col-lg-12">
                	<h5 class="h5-title">Other Information </h5>
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
						<input id="indexOrAAANumber"  name="indexOrAAANumber" type="text" class="form-control input-sm">
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
                	<div class="table-responsive">
                        <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped add-case-table">
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
                                <td><input id="dateOfServiceStart" name="dateOfServiceStart" class="form-control input-sm datepicker_recurring_start"></td>
                                <td><input id="dateOfServiceEnd"  name="dateOfServiceEnd" class="form-control input-sm datepicker_recurring_start"></td>
                                <td><input type="text" id="claimAmt" name="claimAmt" class="form-control input-sm"></td>
                                <td><input type="text" id="paidAmt" name="paidAmt" class="form-control input-sm"></td>
                                <td><input id="dateBillSent" name="dateBillSent" class="form-control input-sm datepicker_recurring_start"></td>
                                <td><select class="form-control input-sm" id="serviceType" name="serviceType">
                                        <option>-- Select Service--</option>
                                        <?php foreach($Service as $row){?>
                                        <option value="<?php echo $row['ServiceType_ID']; ?>"> <?php echo $row['ServiceType']; ?> </option>
                                        <?php }?>
                                    </select></td>
                                <td><select class="form-control input-sm" id="denialReasons" name="denialReasons" >
                                        <option>-- Select Denial reason --</option>
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

<!-- App scripts -->
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
<script>
	//$("tr:nth-child(7)").addClass("DOA-width");

    $(function () {

        // Initialize Example 1
        $('#example1').dataTable( {
            "ajax": 'getAdj',
			"pageLength": 100
        });
    });

</script>
<script>
	$('.search').addClass('active');
</script>
</body>
</html>