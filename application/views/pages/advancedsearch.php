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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css" />

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
			
			
			<form method="get" id="caseInfoSerach_form" class="form-horizontal label-font">

				<div class="form-group form-horizontal col-md-12">
                <h5 class="h4-title">Search</h5>
					<label class="col-md-2 control-label">CASE ID</label>
					<div class="col-md-2">
						<input type="text" id="sCaseId" name="sCaseId" class="form-control input-sm">
					</div>
                    <label class="col-md-2 control-label">INJURED NAME</label>
					<div class="col-md-2">
						<input type="text" id="sInjuredName" name="sInjuredName" placeholder="Last Name First Name" class="form-control input-sm">
					</div>
                    <label class="col-md-2 control-label">INSURED NAME</label>
					<div class="col-md-2">
						<input type="text" id="sInsuredName" name="sInsuredName" placeholder="Last Name First Name" class="form-control input-sm">
					</div>
				</div>

				<div class="form-group form-horizontal col-md-12">
					
					<label class="col-md-2 control-label">POLICY NUMBER</label>
					<div class="col-md-2">
						<input type="text" id="spolicyNumber" name="spolicyNumber" class="form-control input-sm">
					</div>
					<label class="col-md-2 control-label">INS. CLAIM #</label>
					<div class="col-md-2">
						<input type="text" id="sInsuranceClaimNo" name="sInsuranceClaimNo" class="form-control input-sm">
					</div>
					<label class="col-md-2 control-label">INDEX#/AAA#</label>
					<div class="col-md-2">
						<input type="text" id="sIndexaaa" name="sIndexaaa" class="form-control input-sm phone-format">
					</div>

				</div>
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">STATUS</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="sStatus" name="sStatus">
                            <option selected="selected" value=""></option>
                            <?php foreach($Status as $row){?>
                            <option value="<?php echo $row['Status_Type']; ?>"> <?php echo $row['Status_Type']; ?> </option>
                            <?php }?>
                        </select>
					</div>
					<label class="col-md-2 control-label">INSURANCE COMP.</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="sInsuranceCompanyId" name="sInsuranceCompanyId">
                       	 	<option selected="selected" value=""></option>
                            <?php foreach($InsuranceCompany_Name as $row){?>
                            <option value="<?php echo $row['InsuranceCompany_Id']; ?>"><?php echo $row['InsuranceCompany_Name'];?></option>
                            <?php }?>
                        </select>
					</div>
					<label class="col-md-2 control-label">COURT TYPE</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="sCourtId" name="sCourtId"  >
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
						<select class="form-control input-sm" id="sCaseStatus" name="sCaseStatus">
                            <option selected="selected" value=""></option>
                            <?php foreach($CaseStatus as $row){?>
                            <option value="<?php echo $row['name']; ?>"> <?php echo $row['name']; ?> </option>
                            <?php }?>
						</select>
					</div>
					<label class="col-md-2 control-label">PROVIDER</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="sProviderId" name="sProviderId">
                            <option selected="selected" value=""></option>
                            <?php foreach($Provider_Name as $row){?>
                            <option value="<?php echo $row['Provider_Id']; ?>"> <?php echo $row['Provider_Name']; ?> </option>
                            <?php }?>
                        </select>
					</div>
					<label class="col-md-2 control-label">DEFENDANT NAME</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="sDefendantId" name="sDefendantId" >
                            <option selected="selected" value=""></option>
                            <?php foreach($Defendant_Name as $row){?>
                            <option value="<?php echo $row['Defendant_id']; ?>"><?php echo $row['Defendant_Name']." => ".$row['Defendant_Address'];?></option>
                            <?php }?>
                        </select>
					</div>
				</div>
                <div class="form-group form-horizontal col-md-12">
                	<label class="col-md-2 control-label">ADJUSTER NAME</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="sAdjusterId" name="sAdjusterId" >
                            <option selected="selected" value=""></option>
                            <?php foreach($Adjuster_Name as $row){?>
                            <option value="<?php echo $row['Adjuster_Id']; ?>"><?php echo $row['Adjuster_LastName'].", ".$row['Adjuster_FirstName'];?></option>
                            <?php }?>
                        </select>
					</div>
                    <label class="col-md-2 control-label">ACCIDENT DATE</label>
					<div class="col-md-2">
						<input id="sAccidentDate" name="sAccidentDate"  class="form-control input-sm datepicker_recurring_start">
					</div>
                </div>
                <div class="form-group form-horizontal col-md-12">
					<div class="col-md-2"></div>
					<div class="col-md-4">
						<button type="submit" id="searchbutton" class="btn btn-primary">Search</button>
						<button class="btn btn-primary" id="resetSearch" type="button">Reset</button>   
					</div>
				</div>
			</form>
			
			<h5 class="h4-title">Search Results</h5>
			<div class="form-group form-horizontal col-md-12 table-responsive">
				<table id="AdvancedSearchTable" class="table dataTable table-bordered table-striped advanced-search">
					<thead>
						<tr>
							<th>#</th> 	 	   	 	    	      	      	     	 	 	 	   	 	
							<th>EDIT</th>
							<th class="th-case-id">CASE ID</th>
							<th>INJURED PARTY</th>
							<th>PROVIDER</th>
							<th>INSURANCE COMPANY</th>
							<th class="th-doa">DOA</th>
							<th class="th-dos">DATE OF SERVICE</th>
							<th>STATUS</th>
							<th class="th-claim-no">CLAIM NUMBER</th>
							<th class="th-claim-amt">CLAIM AMT.</th>
                            <th class="th-indexaaano">Indexoraaa_number</th>
                            <th class="th-initial-status">INITIAL_STATUS</th>
						</tr>
					</thead>
				</table>
			</div>
			
			
			
		</div><!-- End of panel-body tab-panel-->
		</div><!-- End hpanel -->
		</div><!-- End col-lg-12-->
	</div><!-- End row-->
	
    
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
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/mask-phone/maskPhone.js"></script>
    
     <script src="<?php echo base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    
    <!-- App scripts -->
    <script src="<?php echo base_url();?>assets/scripts/homer.js"></script>

<script>
	$(document).ready(function(e) {
        //$("tr:nth-child(7)").addClass("DOA-width");
		$('body').on('focus',".phone-format", function(){
			$(this).mask("999999/99");
			//$(this).mask("999-999-999");
		});
		
		$('body').on('focus',".datepicker_recurring_start", function(){
			$(this).datepicker({
				"format": 'yyyy-mm-dd',
				"autoclose": true,
				"todayHighlight": true,
				"selectOtherMonths": true,
				"timeFormat": 'hh:mm'
			});
		});
		$("#resetSearch").click(function(){
			$('input[type=text]').val('');
			$('textarea').val('');
			$("select").val('');
			$("#AdvancedSearchTable").dataTable().fnDestroy();
			$('#AdvancedSearchTable').dataTable( {
				"ajax": 'getSearchTable',
				"pageLength": 100
			});
		});
		$(function () {
			// Initialize Example 1
			$('#AdvancedSearchTable').dataTable( {
				"ajax": 'getSearchTable',
				"pageLength": 100,
				"searching": false
			});
		});
		
		$("#caseInfoSerach_form").validate({
		
			/*rules: {
				sCaseId:{
					required: true
				}	
			},*/
					
			submitHandler: function (form) {
				// setup some local variables
				var $form = $(form);
				// let's select and cache all the fields
				var $inputs = $form.find("input, select, button, textarea");
				// serialize the data in the form
				var serializedData = $form.serialize();
				
				var dataArray = $form.serializeArray(),
				len = dataArray.length,
				dataObj = {};
				
				for (i=0; i<len; i++) {
				  dataObj[dataArray[i].name] = dataArray[i].value;
				}
				//dataObj['title']);
	
				//$inputs.prop("disabled", true);
	
	
				$("#AdvancedSearchTable").dataTable().fnDestroy();
				$('#AdvancedSearchTable').dataTable( {
					"searching": false,
				  "ajax": {
						"url": "getSearchTable_2",
						"data": {
							"sCaseId": dataObj['sCaseId'],
							"InjuredParty_LastName": dataObj['sInjuredName'].split(' ')[0],
							"InjuredParty_FirstName": dataObj['sInjuredName'].split(' ')[1],
							"InsuredParty_LastName": dataObj['sInsuredName'].split(' ')[0],
							"InsuredParty_FirstName": dataObj['sInsuredName'].split(' ')[1],
							"spolicyNumber": dataObj['spolicyNumber'],
							"sInsuranceClaimNo": dataObj['sInsuranceClaimNo'],
							"sIndexaaa": dataObj['sIndexaaa'],
							"sStatus": dataObj['sStatus'],
							"sInsuranceCompanyId": dataObj['sInsuranceCompanyId'],
							"sCourtId": dataObj['sCourtId'],
							"sCaseStatus": dataObj['sCaseStatus'],
							"sProviderId": dataObj['sProviderId'],
							"sDefendantId": dataObj['sDefendantId'],
							"sAdjusterId": dataObj['sAdjusterId'],
							"AccidentDate": dataObj['sAccidentDate'].replace(/\//g , "-")
						},
						"type": "POST"
					  },
					  "pageLength": 100
					  
				});
	
			}
		});
		
		/* *************************************************** */
    });
	
</script>
<script>
	$('.search').addClass('active');
</script>
</body>
</html>