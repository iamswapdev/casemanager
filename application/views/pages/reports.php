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

	<!-- DATATABLES CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/advanced-datatable/buttons.dataTables.min.css" />
	<!-- ALERT CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/sweetalert/lib/sweet-alert.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/toastr/build/toastr.min.css" />
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
<?php include 'header_financials.php';?>
<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="hpanel">
				<ul class="nav nav-tabs">
					<?php if($Admin){?><li class="active"><a data-toggle="tab" href="#tab-1">Daily Settlement Reports</a></li>
					<li class=""><a data-toggle="tab" href="#tab-2">Discontinuance Reports</a></li><?php } ?>
					<li class="<?php if($RoleId==2){echo "active";}?>"><a data-toggle="tab" href="#tab-3">Client Reports</a></li>
				</ul>
				
				<div class="tab-content">
					<div id="tab-1" class="tab-pane <?php if($Admin){?> active <?php }?>">
						<div class="row">
							<div class="col-lg-12">
							<div class="hpanel">
							<div class="panel-heading"></div>
							<div class="panel-body tab-panel">
								
                                <div class="form-group form-horizontal col-md-12">
                                    <h4 class="h4-title">Select Date Range for Settlements</h4>
                                    
                                    <label class="col-md-1 control-label">Start Date</label>										
                                    <div class="col-md-1">
                                        <input type="text" name="SD_Daily_Sett" class="form-control input-sm datepicking">
                                    </div>
                                    
                                    <label class="col-md-1 control-label">End Date</label>										
                                    <div class="col-md-1">
                                        <input type="text" name="ED_Daily_Sett" class="form-control input-sm datepicking">
                                    </div>
                                    <div class="col-md-1">
                                            
                                        <select class="form-control input-sm" id="Sett_Perc" name="Sett_Percentage">
                                            <option value="All">All</option>
                                            <option value="0">0%</option>
                                            <option value="0_to_70">Between 0% and 70%</option>
                                            <option value="Above_70">70% and above</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" id="Daily_Sett_btn" class="btn btn-primary">Get</button>
                                    </div>
                                </div>
								
							</div><!-- End of panel-body tab-panel-->
							</div><!-- End hpanel -->
							</div><!-- End col-lg-12-->
						</div><!-- End row-->
						<div class="row">
							<div class="col-lg-12">
							<div class="hpanel">
							<div class="panel-heading"></div>
							<div class="panel-body tab-panel">
								<div class="form-group form-horizontal col-lg-12 responsive">
									<h5 class="h4-title">Daily Settlement Reports</h5>
                                    <div class="col-md-12">
                                        <table id="DailySettlement" class="table dataTable table-bordered table-striped">
                                            <thead>
                                            <tr>  	 	 	 
                                                <th>USER</th>
                                                <th>INSURER</th>
                                                <th>#OF CASES</th>
                                                <th>BALANCE</th>
                                                <th>STLMT AMOUNT</th>
                                                <th>FF</th>
                                                <th>AF</th>
                                                <th>STLMT %AGE</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
								
							</div><!-- End of panel-body tab-panel-->
							</div><!-- End hpanel -->
							</div><!-- End col-lg-12-->
						</div><!-- End row-->
					</div><!-- End of Daily Settlement Reports-->
					
					<div id="tab-2" class="tab-pane">
						<div class="row">
							<div class="col-lg-12">
							<div class="hpanel">
							<div class="panel-heading"></div>
							<div class="panel-body tab-panel">
								
                                <div class="form-group form-horizontal col-md-12">
                                    <h5>Select Insurance Company Name</h5>
                                    <div class="col-md-2">
                                            
                                        <select class="form-control input-sm" id="insuranceId" name="insuranceId">
                                            <option>-- Select Insurance comp. --</option>
                                            <?php foreach($InsuranceCompany_Name as $row){?>
                                            <option value="<?php echo $row['InsuranceCompany_Id']; ?>"><?php echo $row['InsuranceCompany_Name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <button type="button" id="Insurance_btn" class="btn btn-primary">Get</button>
                                    </div>
                                </div>
								
								<h5>OR</h5><div class="hr-line-dashed"></div>
                                <div class="form-group form-horizontal col-md-12">	
                                    <h5>Select Provider Name</h5>
                                    <div class="col-md-2">
                                            
                                        <select class="form-control input-sm" id="providerId" name="providerId">
                                            <option>-- Select Provider --</option>
                                            <?php foreach($Provider_Name as $row){?>
                                            <option value="<?php echo $row['Provider_Id']; ?>"> <?php echo $row['Provider_Name']; ?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <button type="button" id="Provider_btn" class="btn btn-primary">Get</button>
                                    </div>
                                </div>
								
								<h5>OR</h5><div class="hr-line-dashed"></div>
									<div class="form-group form-horizontal col-md-12">
										<h5>Cases for 0 Settlement Amount</h5>
										
										<label class="col-md-1 control-label">Start Date</label>										
										<div class="col-md-1">
											<input type="text" name="SD_0Settlement" class="form-control input-sm datepicking">
										</div>
										<label class="col-md-1 control-label">End Date</label>										
										<div class="col-md-1">
											<input type="text" name="ED_0Settlement" class="form-control input-sm datepicking">
										</div>
										
										<div class="col-md-2">
											<button type="button" id="Cases0Settlement_btn" class="btn btn-primary">Get</button>
										</div>
									</div>
								
								<h5>OR</h5><div class="hr-line-dashed"></div>
									<div class="form-group form-horizontal col-md-12">	
										<h5>Overdue Settlement Report</h5>
										
										<label class="col-md-1 control-label">Start Date</label>										
										<div class="col-md-1">
											<input type="text" name="SD_OverdueSettlement" class="form-control input-sm datepicking">
										</div>
										<label class="col-md-1 control-label">End Date</label>										
										<div class="col-md-1">
											<input type="text" name="ED_OverdueSettlement" class="form-control input-sm datepicking">
										</div>
										
										<div class="col-md-2">
											<button type="button" id="OverdueSettlement_btn" class="btn btn-primary">Get</button>
										</div>
									</div>
								
							</div><!-- End of panel-body tab-panel-->
							</div><!-- End hpanel -->
							</div><!-- End col-lg-12-->
						</div><!-- End row-->
						<div class="row Cases0Settlement" style="display:none;">
                            <div class="col-lg-12">
                            <div class="hpanel">
                            <div class="panel-heading"></div>
                            <div class="panel-body tab-panel">
                                <div class="form-group form-horizontal col-lg-12 responsive">
									<h5 class="h4-title">Cases for 0 Settlement Amount</h5>
                                    <div class="col-md-12">
                                        <table id="Cases0Settlement" class="table dataTable table-bordered table-striped">
                                            <thead>
                                            <tr>  	 	 	 
                                                <th>Case Id</th>
                                                <th>Injured Party</th>
                                                <th>Provider Name</th>
                                                <th>Status</th>
                                                <th>Insurance Company </th>
                                                <th>Claim Amount</th>
                                                <th>Balance</th>
                                                <th>Settlement Date</th>
                                                <th>Settlement Amount </th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- End of panel-body tab-panel-->
                            </div><!-- End hpanel -->
                            </div><!-- End col-lg-12-->
                        </div><!-- End row-->
                        
                        <div class="row OverdueSettlement" style="display:none;">
                            <div class="col-lg-12">
                            <div class="hpanel">
                            <div class="panel-heading"></div>
                            <div class="panel-body tab-panel">
                            	<div class="form-group form-horizontal col-md-12">
                                    <h5 class="h4-title">Overdue Settlement Report</h5>
                                    <div class="col-md-12">
                                        <table id="OverdueSettlement" class="table dataTable table-bordered table-striped">
                                            <thead>
                                            <tr> 
                                                <th>Case Id</th>
                                                <th>Injured Party</th>
                                                <th>Provider Name</th>
                                                <th>Insurance Company </th>
                                                <th>Claim Amount</th>
                                                <th>Balance</th>
                                                <th>Settlement Amount </th>
                                                <th>Settlement Date</th>
                                                <th>Settlement Interest</th>
                                                <th>Settlement Attorney Fees</th>
                                                <th>Settlement Filing Fees</th>
                                                <th>Settlement Total</th>
                                                <th>Settled By</th>
                                                <th>Settled With</th>
                                                <th>Fees Status</th>
                                            </tr>
                                            </thead>
                                        </table>
                                        
                                    </div>
                                </div>
                                
                                
                            </div><!-- End of panel-body tab-panel-->
                            </div><!-- End hpanel -->
                            </div><!-- End col-lg-12-->
                        </div><!-- End row-->
                        
						
					</div><!--End of Discontinuance Reports -->
					
					<div id="tab-3" class="tab-pane <?php if($RoleId == 2){echo "active";}?>">
						<div class="row">
							<div class="col-lg-12">
							<div class="hpanel">
							<div class="panel-heading"></div>
							<div class="panel-body tab-panel">
                                <h4 class="h4-title">Client Reports</h4>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Select provider name:</label>
                                    <div class="col-md-2">
                                        <select class="form-control input-sm" id="providerId_client" name="providerId">
                                            <option>-- Select Provider --</option>
                                            <?php foreach($Provider_Name as $row){?>
                                            <option value="<?php echo $row['Provider_Id']; ?>"> <?php echo $row['Provider_Name']; ?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <label class="col-md-2 control-label">Enter date range in month:</label>
                                    <div class="col-md-1">
                                        <input type="number" name="No_Months" value="100" class="form-control input-sm">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" id="Client_Reports_btn" class="btn btn-primary">Get</button>
                                    </div>
                                </div>
								
							</div><!-- End of panel-body tab-panel-->
							</div><!-- End hpanel -->
							</div><!-- End col-lg-12-->
						</div><!-- End row-->
                        
                        <div class="row initial-tables" style="display:none">
                            <div class="col-lg-12">
                            <div class="hpanel">
                            <div class="panel-heading"></div>
                            <div class="panel-body tab-panel">
                                <div class="form-group form-horizontal col-lg-12 responsive">
									<h5 class="h4-title">Client Information</h5>
                                    <div class="col-md-12">
                                        <table id="Client_Information" class="table dataTable table-bordered table-striped">
                                            <thead>
                                            <tr>  	 	 	 
                                                <th>Client Name</th>
                                                <th>Client Address</th>
                                                <th>Client Billing %</th>
                                                <th>Cost Balance</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- End of panel-body tab-panel-->
                            </div><!-- End hpanel -->
                            </div><!-- End col-lg-12-->
                        </div><!-- End row-->
                        
                        <div class="row initial-tables" style="display:none">
                            <div class="col-lg-12">
                            <div class="hpanel">
                            <div class="panel-heading"></div>
                            <div class="panel-body tab-panel">
                                <div class="form-group form-horizontal col-lg-12 responsive">
									<h5 class="h4-title">Client Settlements for last <span class="no-month"></span> months</h5>
                                    <div class="col-md-12">
                                        <table id="ClientSettlements" class="table dataTable table-bordered table-striped">
                                            <thead>
                                            <tr>  	 	 	 	 	 	  	 	 	 
                                                <th>Month / Year</th>
                                                <th>Count of Cases</th>
                                                <th>Sum of Billed Amount</th>
                                                <th>Sum of Suit Amount</th>
                                                <th>Sum of Principal Settlement</th>
                                                <th>Sum of Interest Settlement</th>
                                                <th>Percentage</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- End of panel-body tab-panel-->
                            </div><!-- End hpanel -->
                            </div><!-- End col-lg-12-->
                        </div><!-- End row-->
                        <div class="row initial-tables" style="display:none">
                            <div class="col-lg-12">
                            <div class="hpanel">
                            <div class="panel-heading"></div>
                            <div class="panel-body tab-panel">
                                <div class="form-group form-horizontal col-lg-12 responsive">
									<h5 class="h4-title">Withdrawn Cases for last <span class="no-month"></span> months</h5>
                                    <div class="col-md-12">
                                        <table id="WithdrawnCases" class="table dataTable table-bordered table-striped">
                                            <thead>
                                            <tr>  	 	 	 	 	  	 	 	 
                                                <th>Month / Year</th>
                                                <th>Count of Cases</th>
                                                <th>Sum of Billed Amount</th>
                                                <th>Sum of Suit Amount</th>
                                                <th>Sum of Settlement Principal</th>
                                                <th>Percentage</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- End of panel-body tab-panel-->
                            </div><!-- End hpanel -->
                            </div><!-- End col-lg-12-->
                        </div><!-- End row-->
                        <div class="row initial-tables" style="display:none">
                            <div class="col-lg-12">
                            <div class="hpanel">
                            <div class="panel-heading"></div>
                            <div class="panel-body tab-panel">
                                <div class="form-group form-horizontal col-lg-12 responsive">
									<h5 class="h4-title">Client New Cases for last <span class="no-month"></span> months</h5>
                                    <div class="col-md-12">
                                        <table id="ClientNewCases" class="table dataTable table-bordered table-striped">
                                            <thead>
                                            <tr>  	 	 	 
                                                <th>Year/Month</th>
                                                <th>Count of Cases</th>
                                                <th>Sum of Billed Amount</th>
                                                <th>Sum of Suit Amount</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- End of panel-body tab-panel-->
                            </div><!-- End hpanel -->
                            </div><!-- End col-lg-12-->
                        </div><!-- End row-->
                        <div class="row initial-tables" style="display:none">
                            <div class="col-lg-12">
                            <div class="hpanel">
                            <div class="panel-heading"></div>
                            <div class="panel-body tab-panel">
                                <div class="form-group form-horizontal col-lg-12 responsive">
									<h5 class="h4-title">Client Invoices</h5>
                                    <div class="col-md-12">
                                        <table id="ClientInvoices" class="table dataTable table-bordered table-striped">
                                            <thead>
                                            <tr>				 	 	 	 	 	 	 	 	 
                                                <th>INVOICE ID</th>
                                                <th>GROSS AMOUNT</th>
                                                <th>FIRM FEES</th>
                                                <th>COST BALANCE</th>
                                                <th>APPLIED COST</th>
                                                <th>FINAL REMIT</th>
                                                <th>INVOICE DATE</th>
                                                <th>LAST INVOICE PRINTED</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- End of panel-body tab-panel-->
                            </div><!-- End hpanel -->
                            </div><!-- End col-lg-12-->
                        </div><!-- End row-->
                        <div class="row initial-tables" style="display:none">
                            <div class="col-lg-12">
                            <div class="hpanel">
                            <div class="panel-heading"></div>
                            <div class="panel-body tab-panel">
                                <div class="form-group form-horizontal col-lg-12 responsive">
									<h5 class="h4-title">Status Breakdown </h5>
                                    <div class="col-md-3">
                                        <table id="StatusBreakdown" class="table dataTable table-bordered table-striped">
                                            <thead>
                                            <tr>  	 	 	 
                                                <th>Status</th>
                                                <th>Count</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- End of panel-body tab-panel-->
                            </div><!-- End hpanel -->
                            </div><!-- End col-lg-12-->
                        </div><!-- End row-->
                        
					</div><!--End of Client Reports -->
				</div>
			</div>
		</div>
	</div>
	
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
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
    
    <!--Datatable js -->
    <script src="<?php echo base_url();?>assets/vendor/advanced-datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/advanced-datatable/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/advanced-datatable/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/advanced-datatable/jszip.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/advanced-datatable/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/advanced-datatable/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/advanced-datatable/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/advanced-datatable/buttons.print.min.js"></script>
    <!-- ALERT SCRIPTS -->
    <script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/toastr/build/toastr.min.js"></script>
    <!--Validate -->
    <script src="<?php echo base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    
    <!-- App scripts -->
    <script src="<?php echo base_url();?>assets/scripts/homer.js"></script>

<script>
$(document).ready(function(e) {
/*Load DailySettlement table*/
	$("#Daily_Sett_btn").click(function(){
		var SD = $("input[name=SD_Daily_Sett]").val();
		var ED = $("input[name=ED_Daily_Sett]").val();
		var Sett_Perc = $("#Sett_Perc").val();
		var table ="";
		 $("#DailySettlement").dataTable().fnDestroy();
		 $('#DailySettlement').dataTable( {
			"ajax": {
				"url": "get_Daily_Sett",
				"data": {"SD_Daily_Sett":SD, "ED_Daily_Sett":ED, "Sett_Perc": Sett_Perc},
				"type": "post"
			},
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": false,
			"bInfo": false,
			"bAutoWidth": false,
			"bSort": false
		});
		//row = table.row("tr");
		//$(row).addClass("qwerty");
		$("#DailySettlement tbody tr").find("input").css("display", "none");
		//$(".DailySettlement").css("display", "block");
	});
/*****Start from here */
	$("#Client_Reports_btn").click(function(){
		$(".initial-tables").css("display", "block");
		var Provider_Id = $("#providerId_client").val();
		var No_Months = $("input[name=No_Months]").val();
		$(".no-month").text(No_Months);
/*Load Client_Information table*/
		$("#Client_Information").dataTable().fnDestroy();
		$('#Client_Information').dataTable( {
			"ajax": {
				"url": "get_Client_Information",
				"data": {"Provider_Id":Provider_Id, "TableId": "Client_Information"},
				"type": "post"
			},
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": false,
			"bInfo": false,
			"bAutoWidth": false,
			"bSort": false
		});
/*Load ClientSettlements table*/		
		$("#ClientSettlements").dataTable().fnDestroy();
		$('#ClientSettlements').dataTable( {
			"ajax": {
				"url": "get_Client_Settlement",
				"data": {"Provider_Id":Provider_Id, "No_Months": No_Months, "TableId": "ClientSettlements"},
				"type": "post"
			},
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": false,
			"bInfo": false,
			"bAutoWidth": false,
			"bSort": false
		});
/*Load WithdrawnCases table*/
		$("#WithdrawnCases").dataTable().fnDestroy();
		$('#WithdrawnCases').dataTable( {
			"ajax": {
				"url": "get_Client_Settlement",
				"data": {"Provider_Id":Provider_Id, "No_Months": No_Months, "TableId": "WithdrawnCases"},
				"type": "post"
			},
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": false,
			"bInfo": false,
			"bAutoWidth": false,
			"bSort": false
		});
/*Load ClientNewCases table*/
		$("#ClientNewCases").dataTable().fnDestroy();
		$('#ClientNewCases').dataTable( {
			"ajax": {
				"url": "get_Client_New_Settlement",
				"data": {"Provider_Id":Provider_Id, "No_Months": No_Months, "TableId": "ClientNewCases"},
				"type": "post"
			},
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": false,
			"bInfo": false,
			"bAutoWidth": false,
			"bSort": false
		});
/*Load ClientInvoices table*/
		$("#ClientInvoices").dataTable().fnDestroy();
		$('#ClientInvoices').dataTable( {
			"ajax": {
				"url": "get_Client_Invoices",
				"data": {"Provider_Id":Provider_Id, "No_Months": No_Months, "TableId": "ClientInvoices"},
				"type": "post"
			},
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": false,
			"bInfo": false,
			"bAutoWidth": false,
			"bSort": false
		});
/*Load StatusBreakdown table*/
		$("#StatusBreakdown").dataTable().fnDestroy();
		$('#StatusBreakdown').dataTable( {
			"ajax": {
				"url": "get_Status_Breakdown",
				"data": {"Provider_Id":Provider_Id, "No_Months": No_Months, "TableId": "StatusBreakdown"},
				"type": "post"
			},
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": false,
			"bInfo": false,
			"bAutoWidth": false,
			"bSort": false
		});
	});
	//$('#ClientNewCases tr:last').css("background-color", "red");

	$("#Cases0Settlement_btn").click(function(){
		var SD = $("input[name=SD_0Settlement]").val();
		var ED = $("input[name=ED_0Settlement]").val();
		$("#Cases0Settlement").dataTable().fnDestroy();
		$('#Cases0Settlement').dataTable( {
			"ajax": {
				"url": "get_Zero_Settlement",
				"data": {"SD_0Settlement":SD, "ED_0Settlement":ED, "name": "Cases0Settlement"},
				"type": "post"
			},
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": false,
			"bInfo": false,
			"bAutoWidth": false,
			"bSort": false
		});
		$(".Cases0Settlement").css("display", "block");
	});
	$("#OverdueSettlement_btn").click(function(){
		var SD = $("input[name=SD_OverdueSettlement]").val();
		var ED = $("input[name=ED_OverdueSettlement]").val();
		$("#OverdueSettlement").dataTable().fnDestroy();
		$('#OverdueSettlement').dataTable( {
			"ajax": {
				"url": "get_Zero_Settlement",
				"data": {"SD_0Settlement":SD, "ED_0Settlement":ED, "name": "OverdueSettlement"},
				"type": "post"
			},
			dom: 'lBfrtip',
			buttons: [ 'excel'],
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": false,
			"bInfo": false,
			"bAutoWidth": false,
			"bSort": false
		});
		$(".OverdueSettlement").css("display", "block");
	});
	
	$("#DailySettlement").find(".HiddenField").remove();
	$("#DailySettlement").find('td').addClass('myClass');
	
	
});//End of Document
</script>
<script>
$(function(){
	$('.datepicking').datepicker({
		"autoclose": true,
		"todayHighlight": true
	});
});
</script>
<script>
	$('.financials').addClass('active');
	$('.reports').addClass('active');
</script>
</body>
</html>