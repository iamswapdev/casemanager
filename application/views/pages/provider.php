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
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-1" href="#tab-1">Add Provider Info</a></li>
            <li class=""><a id="tab2" data-toggle="tab" href="#tab-2">View Provider Info</a></li>
          </ul>
          <div class="tab-content">
			<div id="tab-1" class="tab-pane active">
				<div class="panel-body">
					<div class="col-lg-12 panel-body tab-panel">
					<form id="addProviderInfo" action="add_ProviderInfo" method="post" class="form-horizontal">
						<h5>Provider Information </h5>
						<div class="form-group form-horizontal col-md-12">
							<label class="col-sm-2 control-label">Name <span class="required-field">*</span></label>
							<div class="col-md-5">
								<input type="text" id="name" name="name" class="form-control input-sm" required >
							</div>
						</div>
						<div class="form-group form-horizontal col-md-12">
							<label class="col-sm-2 control-label">President <span class="required-field">*</span></label>
							<div class="col-md-5">
								<input type="text" id="president" name="president" class="form-control input-sm" required>
							</div>
						</div>
						<div class="form-group form-horizontal col-md-12">
							<label class="col-sm-2 control-label">Tax ID <span class="required-field">*</span></label>
							<div class="col-md-1">
							<input type="text" id="taxId" name="taxId" class="form-control input-sm" required>
							</div>
                            <label class="col-sm-1 control-label">Type <span class="required-field">*</span></label>
							<div class="col-md-1">
								<input type="text" id="type" name="type" class="form-control input-sm" required>
							</div>
						</div>
						<div class="form-group form-horizontal col-md-12">
							<label class="col-sm-2 control-label">Collection Billing <span class="required-field">*</span></label>
							<div class="col-md-5">
							<input type="text" id="collectionBilling" name="collectionBilling" class="form-control input-sm" required>
							</div>
						</div>
						<div class="form-group form-horizontal col-md-12">
							<label value="0.0" class="col-sm-2 control-label">Interest Billing <span class="required-field">*</span></label>
							<div class="col-md-5">
							<input type="text"  id="interestBilling" name="interestBilling"  class="form-control input-sm" required>
							</div>
						</div>
						<div class="form-group form-horizontal col-md-12">
							<label class="col-sm-2 control-label">Bill Provider for Filing Fees <span class="required-field">*</span></label>
							<div class="col-sm-1">
								<select id="fillingFees" name="fillingFees" class="form-control input-sm" required>
									<option selected="selected" value=""></option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
								</select>
							</div>
                            <label class="col-sm-2 control-label">Reimburse Provider for Filing <span class="required-field">*</span></label>
                            <div class="col-sm-1">
								<select id="reimburseProvider" name="reimburseProvider" class="form-control input-sm" required>
									<option selected="selected" value=""></option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
								</select>
							</div>
						</div>
						<div class="form-group form-horizontal col-md-12">
							<label class="col-sm-2 control-label">Cost Balance <span class="required-field">*</span></label>
							<div class="col-md-1">
							<input type="text" id="costBalance" name="costBalance" class="form-control input-sm" required>
							</div>
                            <label class="col-sm-2 control-label">Invoice Type <span class="required-field">*</span></label>
							<div class="col-md-1">
								<input type="text" id="invoiceType" name="invoiceType" class="form-control input-sm" required>
							</div>
						</div>
						<div class="form-group form-horizontal col-md-12">
							<label class="col-sm-2 control-label">Refered By <span class="required-field">*</span></label>
							<div class="col-md-5">
								<input type="text" id="referedBy" name="referedBy" class="form-control input-sm" required>
							</div>
						</div>
						<div class="form-group form-horizontal col-md-12">
							<label class="col-sm-2 control-label">Notes</label>
							<div class="col-md-5">
								<!--<input type="text" id="notes" name="notes" class="form-control input-sm">-->
                            	<textarea rows="2" id="notes" name="notes" class="form-control"></textarea>
							</div>
							
						</div>
						<div class="form-group form-horizontal col-md-12">
							<div class="hr-line-dashed"></div>
						</div>
									  
						<h5>Provider Local Address</h5>
						<div class="form-group form-horizontal col-md-12">
							<label class="col-sm-2 control-label">Address <span class="required-field">*</span></label>
							<div class="col-sm-5">
                            	<input type="text" id="addressLocal" name="addressLocal" class="form-control input-sm" required>
								<!--<textarea rows="3" id="addressLocal" name="addressLocal" class="form-control" required></textarea>-->
							</div>
						</div>
						<div class="form-group form-horizontal col-md-12">
							<label class="col-sm-2 control-label">Zip <span class="required-field">*</span></label>
							<div class="col-sm-1">
								<input type="text" id="zipLocal" name="zipLocal" placeholder="12345" class="form-control input-sm" required>
							</div>
							<label class="col-sm-1 control-label">City <span class="required-field">*</span></label>
							<div class="col-sm-1">
								<input id="cityLocal" name="cityLocal" type="text" class="form-control input-sm" required>
							</div>
							<label class="col-sm-1 control-label">State <span class="required-field">*</span></label>
							<div class="col-sm-1">
								<select id="stateLocal" name="stateLocal" class="form-control input-sm" required>
                                    <option selected="selected" value=""></option>
									<?php foreach($State_Name as $row){?>
                                    <option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
                                    <?php }?>
								</select>
							</div>
						</div>
						<div class="form-group form-horizontal col-md-12">
							<label class="col-sm-2 control-label">Phone <span class="required-field">*</span></label>
							<div class="col-sm-1">
								<input id="phoneLocal" name="phoneLocal" type="text" class="form-control input-sm">
							</div>
							<label class="col-sm-1 control-label">Fax</label>
							<div class="col-sm-1">
								<input id="faxLocal" name="faxLocal" type="text" class="form-control input-sm">
							</div>
						</div>
						<div class="form-group form-horizontal col-md-12">
							<div class="hr-line-dashed"></div>
						</div>
						
						
						<h5>Provider Permanent Address</h5>
                        <div class="form-group form-horizontal col-md-12">
                            <div class="col-md-2"></div>
                            <div class="col-md-6 checkbox">
                                <label><input type="checkbox" id="checkbox1" >Check here if permanent address info is same.</label>
                            </div>
                        </div>
						<div class="form-group form-horizontal col-md-12">
							<label class="col-sm-2 control-label">Address <span class="required-field">*</span></label>
							<div class="col-sm-5">
                            	<input type="text" id="addressPermanent" name="addressPermanent" class="form-control input-sm" required>
								<!--<textarea rows="3" id="addressPermanent" name="addressPermanent" class="form-control" required></textarea>-->
							</div>
						</div>
						<div class="form-group form-horizontal col-md-12">
							<label class="col-sm-2 control-label">Zip <span class="required-field">*</span></label>
							<div class="col-sm-1">
								<input type="text" id="zipPermanent" name="zipPermanent" placeholder="12345" class="form-control input-sm" required>
							</div>
							<label class="col-sm-1 control-label">City <span class="required-field">*</span></label>
							<div class="col-sm-1">
								<input id="cityPermanent" name="cityPermanent" type="text" class="form-control input-sm" required>
							</div>
							<label class="col-sm-1 control-label">State <span class="required-field">*</span></label>
							<div class="col-sm-1">
								<select id="statePermanent" name="statePermanent" class="form-control input-sm" required>
									<option selected="selected" value=""></option>
									<?php foreach($State_Name as $row){?>
                                    <option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
                                    <?php }?>
								</select>
							</div>
						</div>
						<div class="form-group form-horizontal col-md-12">
							<label class="col-sm-2 control-label">Phone <span class="required-field">*</span></label>
							<div class="col-sm-1">
								<input id="phonePermanent" name="phonePermanent" type="text" class="form-control input-sm">
							</div>
							<label class="col-sm-1 control-label">Fax</label>
							<div class="col-sm-1">
								<input id="faxPermanent" name="faxPermanent" type="text" class="form-control input-sm">
							</div>
						</div>
						<div class="form-group form-horizontal col-md-12">
							<label class="col-sm-2 control-label">Contact</label>
							<div class="col-sm-1">
								<input type="text" id="contact" name="contact" class="form-control input-sm">
							</div>
							<label class="col-sm-1 control-label">Contact 2</label>
							<div class="col-sm-1">
								<input type="text" id="contact2" name="contact2" class="form-control input-sm">
							</div>
							<label class="col-sm-1 control-label">Email <span class="required-field">*</span></label>
							<div class="col-sm-1">
								<input type="email" id="email" name="email" placeholder="abc@xyz.com" class="form-control input-sm" required>
							</div>
						</div>
                        <div class="form-group form-horizontal col-md-12">
                        	<label class="col-md-2 control-label">Memo</label>
                            <div class="col-md-4">
                                <textarea rows="3"  id="memo" name="memo" class="form-control" ></textarea>
                            </div>
                        </div>
						<div class="form-group form-horizontal col-sm-12">
							<div class="col-sm-2"> </div>
							<div class="col-sm-2">
							<button type="submit" class="btn btn-primary demo2" ><i class="fa fa-check"></i> Submit</button>  <button type="button" id="cancel" class="btn btn-primary">Cancel</button>
							</div>
						</div>
					</form>				  
									  
					</div>
				</div>
			</div><!-- End of tab-1 -->
            
            <div id="tab-2" class="tab-pane">
				<div class="panel-body">
					<div class="col-lg-12 panel-body tab-panel">
						
							<div class="form-group form-horizontal col-md-12">
								<form action="" id="updateProvider" method="post" >
                                    <h4 class="h4-title">Select Provider To View </h4>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Name <span class="required-field">*</span></label>
                                        <div class="col-sm-5">
                                            <select class="form-control input-sm" id="providerId" name="providerId" required>
                                                <option selected="selected" value=""></option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal col-sm-12">
                                        <div class="col-sm-2"> </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-paste"></i> Edit</button>  <button type="button" id="cancelUpdate" class="btn btn-primary">Cancel</button>
                                            
                                        </div>
                                    </div>
                                
                                </form> 
							</div>
							
                            
                            <form id="updateProviderInfo" action="updateprovider" method="post" style="display:none;">
                                <h5>Provider Information </h5>
                                <div class="form-group form-horizontal col-md-12">
                                    <input type="hidden" id="providerIdU" name="providerId" >
                                    <label class="col-sm-2 control-label">Name <span class="required-field">*</span></label>
                                    <div class="col-md-5">
                                        <input type="text" id="nameU" name="name" class="form-control input-sm" required>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-sm-2 control-label">President <span class="required-field">*</span></label>
                                    <div class="col-md-5">
                                        <input type="text" id="presidentU" name="president" class="form-control input-sm" required>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-sm-2 control-label">Tax ID <span class="required-field">*</span></label>
                                    <div class="col-md-1">
                                    <input type="text" id="taxIdU" name="taxId" class="form-control input-sm" required>
                                    </div>
                                    <label class="col-sm-1 control-label">Type <span class="required-field">*</span></label>
                                    <div class="col-md-1">
                                        <input type="text" id="typeU" name="type" class="form-control input-sm" required>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-sm-2 control-label">Collection Billing <span class="required-field">*</span></label>
                                    <div class="col-md-5">
                                    <input type="text" id="collectionBillingU" name="collectionBilling" class="form-control input-sm" required>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label value="0.0" class="col-sm-2 control-label">Interest Billing <span class="required-field">*</span></label>
                                    <div class="col-md-5">
                                    <input type="text"  id="interestBillingU" name="interestBilling"  class="form-control input-sm" required>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-sm-2 control-label">Bill Provider for Filing Fees <span class="required-field">*</span></label>
                                    <div class="col-sm-1">
                                        <select id="fillingFeesU" name="fillingFees" class="form-control input-sm" required>
                                            <option selected="selected" value=""></option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label">Reimburse Provider for Filing <span class="required-field">*</span></label>
                                    <div class="col-sm-1">
                                        <select id="reimburseProviderU" name="reimburseProvider" class="form-control input-sm" required>
                                            <option selected="selected" value=""></option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-sm-2 control-label">Cost Balance <span class="required-field">*</span></label>
                                    <div class="col-md-1">
                                    <input type="text" id="costBalanceU" name="costBalance" class="form-control input-sm" required>
                                    </div>
                                    <label class="col-sm-2 control-label">Invoice Type <span class="required-field">*</span></label>
                                    <div class="col-md-1">
                                        <input type="text" id="invoiceTypeU" name="invoiceType" class="form-control input-sm" required>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-sm-2 control-label">Refered By <span class="required-field">*</span></label>
                                    <div class="col-md-5">
                                        <input type="text" id="referedByU" name="referedBy" class="form-control input-sm" required>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-sm-2 control-label">Notes</label>
                                    <div class="col-md-5">
                                    	<!--<input type="text" id="notesU" name="notes" class="form-control input-sm">-->
                                    	<textarea rows="2" id="notesU" name="notes" class="form-control" required></textarea>
                                    </div>
                                    
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <div class="hr-line-dashed"></div>
                                </div>
                                              
                                <h5>Provider Local Address</h5>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-sm-2 control-label">Address <span class="required-field">*</span></label>
                                    <div class="col-sm-5">
                                    	<input type="text" id="addressLocalU" name="addressLocal" class="form-control input-sm" required>
                                        <!--<textarea rows="3" id="addressLocalU" name="addressLocal" class="form-control" required></textarea>-->
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-sm-2 control-label">Zip <span class="required-field">*</span></label>
                                    <div class="col-sm-1">
                                        <input type="text" id="zipLocalU" name="zipLocal" placeholder="12345" class="form-control input-sm" required>
                                    </div>
                                    <label class="col-sm-1 control-label">City <span class="required-field">*</span></label>
                                    <div class="col-sm-1">
                                        <input id="cityLocalU" name="cityLocal" type="text" class="form-control input-sm" required>
                                    </div>
                                    <label class="col-sm-1 control-label">State <span class="required-field">*</span></label>
                                    <div class="col-sm-1">
                                        <select id="stateLocalU" name="stateLocal" class="form-control input-sm" required>
                                            <option selected="selected" value=""></option>
                                            <?php foreach($State_Name as $row){?>
                                            <option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-sm-2 control-label">Phone <span class="required-field">*</span></label>
                                    <div class="col-sm-1">
                                        <input id="phoneLocalU" name="phoneLocal" type="text" class="form-control input-sm" required>
                                    </div>
                                    <label class="col-sm-1 control-label">Fax</label>
                                    <div class="col-sm-1">
                                        <input id="faxLocalU" name="faxLocal" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <div class="hr-line-dashed"></div>
                                </div>
                                
                                
                                <h5>Provider Permanent Address</h5>
                                <div class="form-group form-horizontal col-md-12">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-6 checkbox">
                                        <label><input type="checkbox" id="checkbox2" >Check here if permanent address info is same.</label>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-sm-2 control-label">Address <span class="required-field">*</span></label>
                                    <div class="col-sm-5">
                                    	<input type="text" id="addressPermanentU" name="addressPermanent" class="form-control input-sm" required>
                                        <!--<textarea rows="3" id="addressPermanentU" name="addressPermanent" class="form-control" required></textarea>-->
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-sm-2 control-label">Zip <span class="required-field">*</span></label>
                                    <div class="col-sm-1">
                                        <input type="text" id="zipPermanentU" name="zipPermanent" placeholder="12345" class="form-control input-sm" required>
                                    </div>
                                    <label class="col-sm-1 control-label">City <span class="required-field">*</span></label>
                                    <div class="col-sm-1">
                                        <input id="cityPermanentU" name="cityPermanent" type="text" class="form-control input-sm" required>
                                    </div>
                                    <label class="col-sm-1 control-label">State <span class="required-field">*</span></label>
                                    <div class="col-sm-1">
                                        <select id="statePermanentU" name="statePermanent" class="form-control input-sm" required>
                                            <option selected="selected" value=""></option>
                                            <?php foreach($State_Name as $row){?>
                                            <option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-sm-2 control-label">Phone <span class="required-field">*</span></label>
                                    <div class="col-sm-1">
                                        <input id="phonePermanentU" name="phonePermanent" type="text" class="form-control input-sm" required>
                                    </div>
                                    <label class="col-sm-1 control-label">Fax</label>
                                    <div class="col-sm-1">
                                        <input id="faxPermanentU" name="faxPermanent" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-sm-2 control-label">Contact</label>
                                    <div class="col-sm-1">
                                        <input type="text" id="contactU" name="contact" class="form-control input-sm">
                                    </div>
                                    <label class="col-sm-1 control-label">Contact 2</label>
                                    <div class="col-sm-1">
                                        <input type="text" id="contact2U" name="contact2" class="form-control input-sm">
                                    </div>
                                    <label class="col-sm-1 control-label">Email <span class="required-field">*</span></label>
                                    <div class="col-sm-1">
                                        <input type="email" id="emailU" name="email" placeholder="abc@xyz.com" class="form-control input-sm" required>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Memo</label>
                                    <div class="col-md-4">
                                        <textarea rows="3"  id="memo" name="memo" class="form-control" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-sm-12">
                                    <div class="col-sm-2"> </div>
                                    <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary" ><i class="fa fa-check"></i> Submit</button>  <button type="button" id="cancelUpdate" class="btn btn-primary">Cancel</button>
                                    </div>
                                </div>
                            </form>	
						
						
					</div>
				</div>
			</div> <!--End of tab-2 -->

            
          </div><!--content-->
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
  
  </div><!--content animate-panel-->
  
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
    <script src="<?php echo base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/toastr/build/toastr.min.js"></script>
    
    <!-- App scripts -->
    <script src="<?php echo base_url();?>assets/scripts/homer.js"></script>


<script>
	
	function callSuccess() {
		swal({
			title: "Successfully submitted",
			type: "success"
		});
	}

	$("#cancel").click(function(){
		$('input[type=text]').val('');
		$('select').val('');
		$('textarea').val('');
	});
	$('#checkbox1').change(function() {
		if ($(this).is(':checked')) {
			var addressLocal = $("input[name=addressLocal]").val();
			var zipLocal = $("input[name=zipLocal]").val();
			var cityLocal = $("input[name=cityLocal]").val();
			var stateLocal = $("select[name=stateLocal]").val();
			var phoneLocal = $("input[name=phoneLocal]").val();
			var faxLocal = $("input[name=faxLocal]").val();
			console.log("okkk");
			$('input[name=addressPermanent]').val(addressLocal);
			$('input[name=zipPermanent]').val(zipLocal);
			$('input[name=cityPermanent]').val(cityLocal);
			$('select[name=statePermanent]').val(stateLocal);
			$('input[name=phonePermanent]').val(phoneLocal);
			$('input[name=faxPermanent]').val(faxLocal);
			
		}else{
			$('#addressPermanent').val("");
			$('#zipaPermanent').val("");
			$('#cityPermanent').val("");
			$('#statePermanent').val("");
			$('#phonePermanent').val("");
			$('#faxPermanent').val("");
		}
    });
	$('#checkbox2').change(function() {
		if ($(this).is(':checked')) {
			var addressLocal = $("#updateProviderInfo input[name=addressLocal]").val();
			var zipLocal = $("#updateProviderInfo input[name=zipLocal]").val();
			var cityLocal = $("#updateProviderInfo input[name=cityLocal]").val();
			var stateLocal = $("#updateProviderInfo select[name=stateLocal]").val();
			var phoneLocal = $("#updateProviderInfo input[name=phoneLocal]").val();
			var faxLocal = $("#updateProviderInfo input[name=faxLocal]").val();
			console.log("okkk");
			$('#updateProviderInfo input[name=addressPermanent]').val(addressLocal);
			$('#updateProviderInfo input[name=zipPermanent]').val(zipLocal);
			$('#updateProviderInfo input[name=cityPermanent]').val(cityLocal);
			$('#updateProviderInfo select[name=statePermanent]').val(stateLocal);
			$('#updateProviderInfo input[name=phonePermanent]').val(phoneLocal);
			$('#updateProviderInfo input[name=faxPermanent]').val(faxLocal);
			
		}else{
			$('#addressPermanent').val("");
			$('#zipaPermanent').val("");
			$('#cityPermanent').val("");
			$('#statePermanent').val("");
			$('#phonePermanent').val("");
			$('#faxPermanent').val("");
		}
    });

/* Add Provider information - Tab-1*/ /*---------- Tab-1 --------------------*/
	$("#addProviderInfo").validate({
	
		rules: {
			name: {
				required: true
			},
			president:{
				required: true
			},
			taxId:{
				required: true,
				number: true
			},
			type:{
				required: true
			},
			collectionBilling:{
				required: true,
				number: true
			},
			interesBilling:{
				required: true,
				number: true
			},
			costBalance:{
				required: true,
				number: true
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
			fax:{
				number: true
			},
			zip:{
				required: true,
				number: true
			},
			faxLocal:{
				number: true
			},
			zipLocal:{
				required: true,
				number: true
			},
			cityLocal:{
				required: true
			},
			stateLocal:{
				required: true
			},
			faxPermanent:{
				number: true
			},
			zipPermanent:{
				required: true,
				number: true
			},
			cityPermanent:{
				required: true
			},
			statePermanent:{
				required: true
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
				url:"<?php echo base_url(); ?>dataentry/add_ProviderInfo",
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
				$("#updateProviderInfo").css("display", "none");
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
			url:"<?php echo base_url(); ?>dataentry/getPro",
			success:function(data){
				results = JSON.parse(data);
				var optionsAsString = "";
				for($i in results.Provider_Name){
					//console.log(results.Provider_Name[$i].Adjuster_Id);
					optionsAsString += "<option value='" + results.Provider_Name[$i].Provider_Id + "'>" + results.Provider_Name[$i].Provider_Name + "</option>";
				}
				$( 'select[name="providerId"]' ).append( optionsAsString );
				
			},
			error: function(result){ console.log("error"); }
		
		});
		e.preventDefault();	//STOP default action
	});
/* *************************************************** */

/* Get Provider info By Id - Tab-2 */ /*----------------- Edit ---------------------*/
	$("#updateProvider").submit(function(e){
		var form = $(this);
		var params = form.serialize();
		var nameValue = document.getElementById("providerId").value;
		console.log("Edit: "+nameValue);
		
		e.preventDefault();	//STOP default action
		
		$.ajax({
			type:'POST',
			url:"<?php echo base_url(); ?>dataentry/getProviderById",
			data: params,
			success:function(data){
				results = JSON.parse(data);
				$("#updateProviderInfo").css("display", "block");
				//console.log(data);
				
				$("#providerIdU").val(nameValue);
				$("#nameU").val(results.ProviderInfoById[0].Provider_Name);
				$("#presidentU").val(results.ProviderInfoById[0].Provider_President);
				$("#taxIdU").val(results.ProviderInfoById[0].Provider_TaxID);
				$("#typeU").val(results.ProviderInfoById[0].Provider_Type);
				$("#collectionBillingU").val(results.ProviderInfoById[0].Provider_Billing);
				$("#interestBillingU").val(results.ProviderInfoById[0].Provider_IntBilling);
				$("#filingFeesU").val(results.ProviderInfoById[0].Provider_FF);
				$("#reimburseProviderU").val(results.ProviderInfoById[0].Provider_ReturnFF);
				$("#costBalanceU").val(results.ProviderInfoById[0].cost_balance);
				$("#invoiceTypeU").val(results.ProviderInfoById[0].Invoice_Type);
				$("#referedByU").val(results.ProviderInfoById[0].Provider_ReferredBy);
				$("#notesU").val(results.ProviderInfoById[0].Provider_Notes);
				$("#addressLocalU").val(results.ProviderInfoById[0].Provider_Local_Address);
				$("#zipLocalU").val(results.ProviderInfoById[0].Provider_Local_Zip);
				$("#cityLocalU").val(results.ProviderInfoById[0].Provider_Local_City);
				$("#stateLocalU").val(results.ProviderInfoById[0].Provider_Local_State);
				$("#phoneLocalU").val(results.ProviderInfoById[0].Provider_Local_Phone)
				$("#faxLocalU").val(results.ProviderInfoById[0].Provider_Local_Fax);
				$("#addressPermanentU").val(results.ProviderInfoById[0].Provider_Perm_Address);
				$("#zipPermanentU").val(results.ProviderInfoById[0].Provider_Perm_Zip);
				$("#cityPermanentU").val(results.ProviderInfoById[0].Provider_Perm_City);
				$("#statePermanentU").val(results.ProviderInfoById[0].Provider_Perm_State);
				$("#phonePermanentU").val(results.ProviderInfoById[0].Provider_Perm_Phone);
				$("#faxPermanentU").val(results.ProviderInfoById[0].Provider_Perm_Fax);
				$("#rapidFundsU").val(results.ProviderInfoById[0].provider_Rfunds);
				$("#contactU").val(results.ProviderInfoById[0].Provider_Contact);
				$("#contact2U").val(results.ProviderInfoById[0].Provider_Contact2);
				$("#emailU").val(results.ProviderInfoById[0].Provider_Email);
					
			},
			error: function(result){ console.log("error"); }
		});
		
	});
/* *************************************************** */	

	

/*Update Provider information on Tab-2*/  /*----------------- Update ---------------------*/
	$("#updateProviderInfo").validate({
	
		rules: {
			costBalance:{
				number: true
			},
			taxId:{
				number: true
			},
			collectionBilling:{
				number: true
			},
			interesBilling:{
				number: true
			},
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
				url:"<?php echo base_url(); ?>dataentry/updateProvider",
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
					$("#updateProviderInfo").css("display", "none");
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
	$("#cancelUpdate").click(function(){
		$("#updateProviderInfo").css("display", "none");
	});	
</script>

<!-- App scripts --> 
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>

<script>
	/*$("#addProviderInfo").submit(function(e)
	{
    	var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				$('#name').val('');
				$('#president').val('');
				$('#taxId').val('');
				$('#type').val('');
				$('#collectionBilling').val('');
				$('#interesBilling').val('');
				$('#filingFees').val('');
				$('#reimburseProvider').val('');
				$('#costBalance').val('');
				$('#invoiceType').val('');
				$('#referedBy').val('');
				$('#notes').val('');
				$('#addressLocal').val('');
				$('#zipLocal').val('');
				$('#cityLocal').val('');
				$('#stateLocal').val('');
				$('#phoneLocal').val('');$('#FaxLocal').val('');$('#addressPermanent').val('');$('#zipPermanent').val('');$('#cityPermanent').val('');$('#statePermanent').val('');$('#phonePermanent').val('');$('#faxPermanent').val('');$('#rapidFunds').val('');$('#email').val('');$('#contact').val('');$('#contact2').val('');

			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				alert();
				
			}
		});
		e.preventDefault();	//STOP default action
	});
	$("#ajaxform").submit(); //SUBMIT FORM*/
</script>
<script>
	$('.dataentry').addClass('active');
	$('.provider').addClass('active');
</script>
</body>
</html>