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
<?php include 'header_workarea.php';?>
<div class="content animate-panel">

	<div class="row">
		<div class="col-lg-12">
			<div class="hpanel">
				<ul class="nav nav-tabs top-pad">
					<li class="active"><a data-toggle="tab" href="#tab-1">Calendar Reports</a></li>					
					<li class=""><a data-toggle="tab" href="#tab-2">Service Reports</a></li>					
					<li class=""><a data-toggle="tab" href="#tab-3">Summons Printed Report</a></li>					
					<li class=""><a data-toggle="tab" href="#tab-4">CloseOut Cases</a></li>				
					<li class=""><a data-toggle="tab" href="#tab-5">Case DeadLines</a></li>
					<li class=""><a data-toggle="tab" href="#tab-6">Pending Resons</a></li>
				</ul>
			
				<div class="tab-content">
					<div id="tab-1" class="tab-pane active">
						<div class="row">
                            <div class="col-lg-12">
                            <div class="hpanel">
                            <div class="panel-heading"></div>
                            <div class="panel-body tab-panel">
                                
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-1 control-label">Start Date</label>										
                                    <div class="col-md-1">
                                        <input type="text" name="CR_SD" class="form-control input-sm datepicking">
                                    </div>
                                    
                                    <label class="col-md-1 control-label">End Date</label>										
                                    <div class="col-md-1">
                                        <input type="text" name="CR_ED" class="form-control input-sm datepicking">
                                    </div>
                                    
                                    <label class="col-md-1 control-label">Calendar type</label>	
                                    <div class="col-md-2">											
                                        <select class="form-control input-sm" id="CR_CalendarType" name="CR_CalendarType">
                                            <option value="All">All</option>
                                            <option value="1">Motion</option>
                                            <option value="2">Trial</option>
                                            <option value="25">Opposition Due Date</option>
                                            <option value="29">Reply DueDate</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <div class="col-lg-4 animated-panel zoomIn" style="animation-delay: 0.2s;">
                                        <br>Select Provider
                                        <select class="form-control input-sm select-height" id="CR_ProviderId" multiple name="CR_ProviderId">
                                            <option selected="selected" value="All">All</option>
                                            <?php foreach($Provider_Name as $row){?>
                                            <option value="<?php echo $row['Provider_Id']; ?>"> <?php echo $row['Provider_Name']; ?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 animated-panel zoomIn" style="animation-delay: 0.2s;">
                                        <br>Select Insurance Company
                                        <select class="form-control input-sm select-height" id="CR_InsuranceCompanyId" multiple name="CR_InsuranceCompanyId">
                                            <option selected="selected" value="All">All</option>
                                            <?php foreach($InsuranceCompany_Name as $row){?>
                                            <option value="<?php echo $row['InsuranceCompany_Id']; ?>"><?php echo $row['InsuranceCompany_Name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>	
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <div class="col-lg-4 animated-panel zoomIn" style="animation-delay: 0.2s;">
                                        <br>Select Defendant
                                        <select class="form-control input-sm select-height" id="CR_DefendantId" name="CR_DefendantId" multiple>
                                            <option selected="selected" value="All">All</option>
                                            <?php foreach($Defendant_Name as $row){?>
                                            <option value="<?php echo $row['Defendant_id']; ?>"><?php echo $row['Defendant_Name'];?></option>
                                            <?php }?>
                                        </select>										
                                    </div>
                                    <div class="col-lg-4 animated-panel zoomIn" style="animation-delay: 0.2s;">
                                        <br>Select Venue
                                        <select class="form-control input-sm select-height" id="CR_CourtId" name="CR_CourtId" multiple >
                                            <option selected="selected" value="All">All</option>
                                            <?php foreach($Court as $row){?>
                                            <option value="<?php echo $row['Court_Id']; ?>"> <?php echo $row['Court_Name']; ?> </option>
                                            <?php }?>
                                        </select>
                                    </div>	
                                </div>
                                
                                
                                <div class="form-group form-horizontal col-md-12">
                                    <div class="col-md-4">
                                        <br><button type="button" id="CalendarReport_Btn" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>  <button type="button" id="cancel" class="btn btn-primary">Cancel</button>
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
                            <div class="form-group form-horizontal col-lg-12">
                                <div class="col-md-12 responsive">
                                    <br><h5 class="h4-title">Calendar Report</h5>
                                    <table id="CalendarReport" class="table dataTable table-bordered table-striped">
                                        <thead>
                                        <tr>  	 	 	 
                                            <th>#</th>											
                                            <th>Case ID</th>
                                            <th>Event Type</th>
                                            <th>Event Status</th>
                                            <th>Event Date</th>
                                            <th>Event Time</th>
                                            <th>Event Description</th>
                                            <th>Assigned To</th>
                                            <th>Provider Name</th>
                                            <th>Injured Party</th>
                                            <th>Court Misc</th>
                                            <th>Court Name</th>
                                            <th>IndexOrAAA Number</th>
                                            <th>Claim Amount</th>
                                            <th>Defendant Name</th>
                                            <th>InsuranceCompany Name</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End of panel-body tab-panel-->
                        </div><!-- End hpanel -->
                        </div><!-- End col-lg-12-->
                    </div><!-- End row-->
    
    
    
					</div><!--End of Calendar reports -->
					
					<div id="tab-2" class="tab-pane">
						<div class="row">
                            <div class="col-lg-12">
                            <div class="hpanel">
                            <div class="panel-heading"></div>
                            <div class="panel-body tab-panel">
                                
                                <form>
                                    <h5>Select Date Range for Summons Sent to Court</h5>
                                    <div class="form-group form-horizontal col-md-12">
                                        <label class="col-md-1 control-label">Start Date</label>										
                                        <div class="col-md-1">
                                            <input type="text" class="form-control input-sm datepicking">
                                        </div>
                                        
                                        <label class="col-md-1 control-label">End Date</label>										
                                        <div class="col-md-1">
                                            <input type="text" class="form-control input-sm datepicking">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-primary">Get</button>
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
							<div class="panel-heading"></div>
							<div class="panel-body tab-panel">
								
								<div class="form-group form-horizontal col-md-12">
									<div class="table-responsive col-md-6">
										<h4>Local Service</h4>
										<div class="table-responsive">
											<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
												<thead>
												<tr>  	 	 	 	 	 	 	 	 	 	 	 	 	
													<th>Insurance Company</th>
													<th>Address</th>
													<th>Count</th>
													<th>Service Info</th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="table-responsive col-md-6">
										<h4>Superintendent Service</h4>
										<div class="table-responsive">
											<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
												<thead>
												<tr>  	 	 	 	 	 	 	 	 	 	 	 	 	
													<th>Insurance Company</th>
													<th>Address</th>
													<th>Count</th>
													<th>Service Info</th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								
							</div><!-- End of panel-body tab-panel-->
							</div><!-- End hpanel -->
							</div><!-- End col-lg-12-->
						</div><!-- End row-->
					</div><!--End of Service reports -->
					
					<div id="tab-3" class="tab-pane">
						<div class="row">
                            <div class="col-lg-12">
                            <div class="hpanel">
                            <div class="panel-heading"></div>
                            <div class="panel-body tab-panel">
                            
                                <h5>Select Date Range for Print</h5>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-1 control-label">Start Date</label>										
                                    <div class="col-md-1">
                                        <input type="text" name="SD_Print" class="form-control input-sm datepicking">
                                    </div>
                                    
                                    <label class="col-md-1 control-label">End Date</label>										
                                    <div class="col-md-1">
                                        <input type="text" name="ED_Print" class="form-control input-sm datepicking">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="DateType" id="DateType" class="form-control input-sm">
                                            <option value="Date_Opened">Date_Opened</option>
                                            <option value="Date_Summons_Printed">Date_Summons_Printed</option>
                                            <option value="Date_Summons_Sent_Court">Date_Summons_Sent_Court</option>
                                            <option value="Date_Summons_Served">Date_Summons_Served</option>
                                            <option value="Date_Index_Number_Purchased">Date_Index_Number_Purchased</option>
                                            <option value="Date_Afidavit_Filed">Date_Afidavit_Filed</option>
                                            <option value="Date_Answer_Received">Date_Answer_Received</option>
                                            <option value="Date_Closed">Date_Closed</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control input-sm" id="PrintStatus" name="PrintStatus">
                                            <option selected="selected" value=""></option>
                                            <?php foreach($Status as $row){?>
                                            <option value="<?php echo $row['Status_Type']; ?>"> <?php echo $row['Status_Type']; ?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" id="Print_btn" class="btn btn-primary">Get</button>
                                    </div>
                                    
                                </div>
                            </div><!-- End of panel-body tab-panel-->
                            </div><!-- End hpanel -->
                            </div><!-- End col-lg-12-->
                        </div><!-- End row-->
                        
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="hpanel">
                            <div class="panel-body tab-panel">
                                <div class="form-group form-horizontal col-lg-12">
									<h5 class="h4-title"></h5>
                                    <div class="col-md-12">
                                        <table id="PrintTable" class="table dataTable table-bordered table-striped">
                                            <thead>
                                            <tr>  	 	 	 
                                                <th>Send to Elite</th>
                                                <th>Case ID</th>
                                                <th>Patient</th>
                                                <th>Provider</th>
                                                <th>Insurer</th>
                                                <th>Venue</th>
                                                <th>Claim Amount</th>
                                                <th>Date Opened</th>
                                                <th>Date Printed</th>
                                                <th class="DateType"></th>
                                            </tr>
                                            </thead>
                                        </table>
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
                                
                                <div class="form-group form-horizontal col-md-12">
                                    <div class="table-responsive col-md-4">
                                    	<table id="StatusTable" class="table dataTable table-bordered table-striped">
                                            <thead>
                                            <tr>  	 	 	 
                                                <th>Status</th>
                                            	<th>Count</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
									<div class="table-responsive col-md-4">
                                    	<table id="ProviderTable" class="table dataTable table-bordered table-striped">
                                            <thead>
                                            <tr>  	 	 	 
                                                <th>Provider</th>
                                            	<th>Count</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="table-responsive col-md-4">
                                    	<table id="InsuranceTable" class="table dataTable table-bordered table-striped">
                                            <thead>
                                            <tr>  	 	 	 
                                                <th>Insurer</th>
                                            	<th>Count</th>
                                            	<th>Filing Fee Cost</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    <!--<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>  	  		 	 	 	 	 	 	 	 	
                                            <th>Insurer</th>
                                            <th>Count</th>
                                            <th>Filing Fee Cost</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Provider</td>
                                            <td>Count</td>
                                            <th>Filing Fee Cost</th>
                                        </tr>
                                        </tbody>
                                    </table>-->
                                    </div>
                                    
									
                                </div>
                                
                            </div><!-- End of panel-body tab-panel-->
                            </div><!-- End hpanel -->
                            </div><!-- End col-lg-12-->
                        </div><!-- End row-->
                        
                        
					</div><!--End of summons printed report -->
					
					<div id="tab-4" class="tab-pane">
						<div class="row">
                            <div class="col-lg-12">
                            <div class="hpanel">
                            <div class="panel-heading"></div>
                            <div class="panel-body tab-panel">
                                
								<div class="table-responsive">
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>   	 	 	 	 	 	 	 	 		 	 	 	 	 	 	 	 	 	
                                            <th>CASE ID</th>
                                            <th>INJURED PARTY</th>
                                            <th>PROVIDER</th>
                                            <th>INSURER</th>
                                            <th>STATUS</th>
                                            <th>CLAIM AMOUNT</th>
                                            <th>PRINCIPAL</th>
                                            <th>INTEREST</th>
                                            <th>FILING FEE</th>
                                            <th>ATTORNEY FEE/th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
											<td colspan="10"><button type="button" id="Close" class="btn btn-primary create">Close</button></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
								
                            </div><!-- End of panel-body tab-panel-->
                            </div><!-- End hpanel -->
                            </div><!-- End col-lg-12-->
                        </div><!-- End row-->
					</div><!--End of Case close out -->
                    
					<div id="tab-5" class="tab-pane">
						<div class="row">
                            <div class="col-lg-12">
                            <div class="hpanel">
                            <div class="panel-heading"></div>
                            <div class="panel-body tab-panel">
								<div class="form-group form-horizontal col-md-12">	
									<ul>
										<li><a id="SummonsNotServed" href="#">All Cases Index Numbered 100 days and over and not Served</a></li>
										<li><a id="SummonsNotField" href="#">All Cases Printed 30 days and over and not filed</a></li>
										<li><a id="AffidavitNotGenerated" href="#">All Affidavits Printed 30 days and over and not filed</a></li>
									</ul>
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
								<div class="form-group form-horizontal col-md-12"> 
									
									<div class="table-responsive SummonsNotServed" style="display:none;"> 
										<h5>SUMMONS NOT SERVED</h5>
										<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
											<thead>
											<tr>   	 	 	 	 	 	 	 	 		 	 	 	 	 	 	 	 	 	
												<th>Case Id</th>
												<th>Patient</th>
												<th>Provider</th>
												<th>Insurer</th>
												<th>Index No</th>
												<th>Date Summons sent to court</th>
												<th>Date Index Purchased </th>
												<th>Claim Amount</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											</tbody>
										</table>
									</div>
									<div class="table-responsive SummonsNotField" style="display:none;"> 
										<h5>SUMMONS NOT FILED</h5>
										<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
											<thead>
											<tr>   	 	 	 	 	 	 	 	 		 	 	 	 	 	 	 	 	 	
												<th>Case Id</th>
												<th>Patient</th>
												<th>Provider</th>
												<th>Insurer</th>
												<th>Index No</th>
												<th>Date Printed </th>
												<th>Date Summons sent to court</th>
												<th>Date Index Purchased </th>
												<th>Claim Amount</th>
												<th>Status</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											</tbody>
										</table>
									</div>
									<div class="table-responsive AffidavitNotGenerated" style="display:none;"> 
										<h5>AFFIDAVIT NOT GENERATED</h5>
										<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
											<thead>
											<tr>   	 	 	 	 	 	 	 	 		 	 	 	 	 	 	 	 	 	
												<th>Case Id</th>
												<th>Patient</th>
												<th>Provider</th>
												<th>Insurer</th>
												<th>Index No</th>
												<th>Date Printed </th>
												<th>Date Summons sent to court</th>
												<th>Date Index Purchased </th>
												<th>Claim Amount</th>
												<th>Status</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div><!-- End of panel-body tab-panel-->
							</div><!-- End hpanel -->
							</div><!-- End col-lg-12-->
						</div><!-- End row-->
							
					</div><!--End of Case deadlines -->
					
					<div id="tab-6" class="tab-pane">
						
						<div class="row">
							<div class="col-lg-12">
							<div class="hpanel">
							<div class="panel-heading"></div>
							<div class="panel-body tab-panel">
								
								<form>
									
									<div class="form-group form-horizontal col-md-12">
										<h5>Select Date Range for Pending Resons</h5>
										<label class="col-md-1 control-label">Start Date</label>										
										<div class="col-md-1">
											<input type="text" class="form-control input-sm datepicking">
										</div>
										
										<label class="col-md-1 control-label">End Date</label>										
										<div class="col-md-1">
											<input type="text" class="form-control input-sm datepicking">
										</div>
										<div class="col-md-2">
											<button type="button" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
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
							<div class="panel-heading"></div>
							<div class="panel-body tab-panel">
								
								<div class="form-group form-horizontal col-md-12">
									<div class="col-md-2">Total Pending Ids Found :
									</div>
									<div class="col-md-2">Total Pending Reasons Found :
									</div>
								</div>
								
								<div class="form-group form-horizontal col-md-12">
								<div class="table-responsive"> 	 		 
									<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
										<thead>
										<tr>   	 	 	 	 	 	 	 	 		 	 	 	 	 	 	 	 	 	
											<th>CASE ID</th>
											<th>STATUS</th>
											<th>NOTES DESCRIPTION</th>
											<th>NOTES DATE </th>
											<th>USER ID</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										</tbody>
									</table>
								</div>
								</div>
								
							</div><!-- End of panel-body tab-panel-->
							</div><!-- End hpanel -->
							</div><!-- End col-lg-12-->
						</div><!-- End row-->
						
					</div> <!-- End of Pending Resons -->
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
    
    <!-- App scripts -->
    <script src="<?php echo base_url();?>assets/scripts/homer.js"></script>

<script>
$(document).ready(function(e) {
	$("#CalendarReport_Btn").click(function(e){
		var CR_SD = $("input[name=CR_SD]").val();
		var CR_ED = $("input[name=CR_ED]").val();
		var CR_CalendarType = $("#CR_CalendarType").val();
		var CR_ProviderId = $("#CR_ProviderId").val();
		var CR_InsuranceCompanyId = $("#CR_InsuranceCompanyId").val();
		var CR_DefendantId = $("#CR_DefendantId").val();
		var CR_CourtId = $("#CR_CourtId").val();
		
		$('#CalendarReport').dataTable().fnDestroy();
		$('#CalendarReport').dataTable( {
			"ajax": {
				"url": "get_Calendar_Report",
				"data": {"CR_SD": CR_SD, "CR_ED": CR_ED, "CR_CalendarType": CR_CalendarType, "CR_ProviderId": CR_ProviderId, "CR_InsuranceCompanyId": CR_InsuranceCompanyId, "CR_DefendantId": CR_DefendantId, "CR_CourtId": CR_CourtId},
				"type": "post"
			},
			"iDisplayLength": 10,
			"aLengthMenu": [5, 10, 20, 25, 50, "All"],
			"bSort": true,
			//bJQueryUI: true,
			//"sDom": '<"top"flp>rt<"bottom"i><"clear">',
			dom: 'lBfrtip',
			//dom: "<'row'<'col-sm-4 demo'l><'col-sm-4 text-center'B><'col-sm-4'f>>lBfrtip",
            
            buttons: [ 'excel', 'print' ]
		});
		
	});
	
	$("#Print_btn").click(function(){
		var SD = $("input[name=SD_Print]").val();
		var ED = $("input[name=ED_Print]").val();
		var DateType = $("#DateType").val();
		$(".DateType").text(DateType);
		var Status = $("#PrintStatus").val();
		console.log("sd:"+SD+" ed:"+ED+" DateType:"+DateType+" Status:"+Status);
		$("#PrintTable").dataTable().fnDestroy();
		$('#PrintTable').dataTable( {
			"ajax": {
				"url": "get_Print_Table",
				"data": {"SD_Print":SD, "ED_Print":ED, "DateType": DateType, "Status": Status, "TableName": "Print"},
				"type": "post"
			},
			"iDisplayLength": 10,
			"aLengthMenu": [5, 10, 20, 25, 50, "All"]
		});
		
		$("#StatusTable").dataTable().fnDestroy();
		$('#StatusTable').dataTable( {
			"ajax": {
				"url": "get_Print_Table",
				"data": {"SD_Print":SD, "ED_Print":ED, "DateType": DateType, "Status": Status, "TableName": "Status"},
				"type": "post"
			},
			"iDisplayLength": 10,
			"aLengthMenu": [5, 10, 20, 25, 50, "All"]
		});
		
		$("#ProviderTable").dataTable().fnDestroy();
		$('#ProviderTable').dataTable( {
			"ajax": {
				"url": "get_Print_Table",
				"data": {"SD_Print":SD, "ED_Print":ED, "DateType": DateType, "Status": Status, "TableName": "Provider"},
				"type": "post"
			},
			"iDisplayLength": 10,
			"aLengthMenu": [5, 10, 20, 25, 50, "All"]
		});
		
		$("#InsuranceTable").dataTable().fnDestroy();
		$('#InsuranceTable').dataTable( {
			"ajax": {
				"url": "get_Print_Table",
				"data": {"SD_Print":SD, "ED_Print":ED, "DateType": DateType, "Status": Status, "TableName": "Insurance"},
				"type": "post"
			},
			"iDisplayLength": 10,
			"aLengthMenu": [5, 10, 20, 25, 50, "All"]
		});
	});
	
	$("#SummonsNotServed").click(function(){
		$(".SummonsNotServed").css("display","block");
		$(".SummonsNotField").css("display","none");
		$(".AffidavitNotGenerated").css("display","none");
	});
	$("#SummonsNotField").click(function(){
		$(".SummonsNotServed").css("display","none");
		$(".SummonsNotField").css("display","block");
		$(".AffidavitNotGenerated").css("display","none");
	});
	$("#AffidavitNotGenerated").click(function(){
		$(".SummonsNotServed").css("display","none");
		$(".SummonsNotField").css("display","none");
		$(".AffidavitNotGenerated").css("display","block");
	});
	
	$("#cancel").click(function(){
		$('input[type=text]').val('');
		$('select').val('All');
	});
    $('.datepicking').datepicker({
		"autoclose": true,
		"todayHighlight": true
	});
});
</script>
<script>
	$('.workarea').addClass('active');
	$('.workflowReport').addClass('active');
</script>
</body>
</html>