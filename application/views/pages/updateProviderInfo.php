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
  <div class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="hpanel">
          <ul class="nav nav-tabs">
            <li class=""><a href="<?php echo base_url();?>dataentry/provider">Add Provider Info</a></li>
            <li class="active"><a href="">View Provider Info</a></li>
          </ul>
          <div class="tab-content">
			
            <div id="tab-2" class="tab-pane active">
				<div class="panel-body">
					<div class="col-lg-12 panel-body tab-panel">
						
							<div class="form-group form-horizontal col-md-12">
								<form action="updateprovider" method="post" >
                                    <h4 class="h4-title">Select Provider To View </h4>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-5">
                                            <select class="form-control input-sm" id="providerId" name="providerId">
                                                <option>-- Select Provider --</option>
                                                <?php foreach($Provider_Name as $row){?>
                                                <option value="<?php echo $row['Provider_Id']; ?>"> <?php echo $row['Provider_Name']; ?> </option>
                                                <?php }?>
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
							</div>
							
						
						<?php if($ProviderInfoById != ""){ /*echo "<pre>"; print_r($ProviderInfoById);*/ ?>
						<?php foreach($ProviderInfoById as $row){?>
                        
                        
						<form action="updateprovider" id="edit_ProviderInfo" method="post" style=" <?php if($display_form != 1){ ?> display: none; <?php }?> ">
							<div class="form-group form-horizontal col-md-12">
								<div class="hr-line-dashed"></div>
							</div>
                            <h4 class="h4-title">Provider Information </h4>
							<div class="form-group form-horizontal col-md-12">
                            	<input type="hidden" id="providerId" name="providerId" value="<?php echo $row['Provider_Id']; ?>" >
								<label class="col-sm-2 control-label">Name</label>
								<div class="col-sm-5">
									<input type="text" id="name" name="name" class="form-control input-sm" value="<?php echo $row['Provider_Name']; ?>" >
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">President</label>
								<div class="col-sm-5">
									<input type="text" id="president" name="president" class="form-control input-sm" value="<?php echo $row['Provider_President']; ?>" >
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">Tax ID</label>
								<div class="col-sm-5">
								<input type="text" id="taxId" name="taxId" class="form-control input-sm" value="<?php echo $row['Provider_TaxID']; ?>" >
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">Type</label>
								<div class="col-sm-5">
								<input type="text" id="type" name="type" class="form-control input-sm" value="<?php echo $row['Provider_Type']; ?>" >
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">Collection Billing</label>
								<div class="col-sm-5">
								<input type="text" id="collectionBilling" name="collectionBilling" class="form-control input-sm" value="<?php echo $row['Provider_Billing']; ?>" >
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label value="0.0" class="col-sm-2 control-label">Interest Billing</label>
								<div class="col-sm-5">
								<input type="text"  id="interestBilling" name="interestBilling"  class="form-control input-sm" value="<?php echo $row['Provider_IntBilling']; ?>" >
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">Bill Provider for Filing Fees</label>
								<div class="col-sm-1">
									<select id="fillingFees" name="fillingFees" class="form-control input-sm" name="account">
										<option>-- Select Bill Provider for Filing Fees --</option>
										<option value="1">Yes</option>
										<option value="0">No</option>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">Reimburse Provider for Filing</label>
								<div class="col-sm-1">
									<select id="reimburseProvider" name="reimburseProvider" class="form-control input-sm" name="account">
										<option>-- Select Reimburse Provider for Filing --</option>
										<option value="1">Yes</option>
										<option value="0">No</option>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">Cost Balance</label>
								<div class="col-sm-5">
								<input type="text" id="costBalance" name="costBalance" class="form-control input-sm" value="<?php echo $row['cost_balance']; ?>" >
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">Invoice Type</label>
								<div class="col-sm-5">
								<input type="text" id="invoiceType" name="invoiceType" class="form-control input-sm" value="<?php echo $row['Invoice_Type']; ?>" >
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">Refered By </label>
								<div class="col-sm-5">
									<input type="text" id="referedBy" name="referedBy" class="form-control input-sm" value="<?php echo $row['Provider_ReferredBy']; ?>" >
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">Notes</label>
								<div class="col-sm-5">
								<input type="text" id="notes" name="notes" class="form-control input-sm" value="<?php echo $row['Provider_Notes']; ?>" >
								</div>
								
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="hr-line-dashed"></div>
							</div>
										  
							<h4 class="h4-title">Provider Local Address</h4>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">Address</label>
								<div class="col-sm-5">
									<textarea rows="3" id="addressLocal" name="addressLocal" class="form-control" ><?php echo $row['Provider_Local_Address']; ?></textarea>
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">Zip</label>
								<div class="col-sm-1">
									<input type="text" id="zipLocal" name="zipLocal" placeholder="12345" class="form-control input-sm" value="<?php echo $row['Provider_Local_Zip']; ?>" >
								</div>
								<label class="col-sm-1 control-label">City</label>
								<div class="col-sm-1">
									<select id="cityLocal" name="cityLocal" class="form-control input-sm">
									<option>Yes</option>
									<option>No</option>
									</select>
								</div>
								<label class="col-sm-1 control-label">State</label>
								<div class="col-sm-1">
									<select id="stateLocal" name="stateLocal" class="form-control input-sm" >
										<option>-- Select State --</option>
										<?php foreach($State_Name as $row){?>
										<option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">Phone</label>
								<div class="col-sm-1">
									<input id="phoneLocal" name="phoneLocal" type="text" class="form-control input-sm" value="<?php echo $row['Provider_Local_Phone']; ?>" >
								</div>
								<label class="col-sm-1 control-label">Fax</label>
								<div class="col-sm-1">
									<input id="faxLocal" name="faxLocal" type="text" class="form-control input-sm" value="<?php echo $row['Provider_Local_Fax']; ?>" >
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="hr-line-dashed"></div>
							</div>
							
							
							<h4 class="h4-title">Provider Permanent Address</h4>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">Address</label>
								<div class="col-sm-5">
									<textarea rows="3" id="addressPermanent" name="addressPermanent" class="form-control"  ><?php echo $row['Provider_Perm_Address']; ?></textarea>
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">Zip</label>
								<div class="col-sm-1">
									<input type="text" id="zipPermanent" name="zipPermanent" placeholder="12345" class="form-control input-sm" value="<?php echo $row['Provider_Perm_Zip']; ?>" >
								</div>
								<label class="col-sm-1 control-label">City</label>
								<div class="col-sm-1">
									<select id="cityPermanent" name="cityPermanent" class="form-control input-sm" >
									<option>Yes</option>
									<option>No</option>
									</select>
								</div>
								<label class="col-sm-1 control-label">State</label>
								<div class="col-sm-1">
									<select id="statePermanent" name="statePermanent" class="form-control input-sm" >
										<option>-- Select State --</option>
										<?php foreach($State_Name as $row){?>
										<option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">Phone</label>
								<div class="col-sm-1">
									<input id="phonePermanent" name="phonePermanent" type="text" class="form-control input-sm" value="<?php echo $row['Provider_Perm_Phone']; ?>" >
								</div>
								<label class="col-sm-1 control-label">Fax</label>
								<div class="col-sm-1">
									<input id="faxPermanent" name="faxPermanent" type="text" class="form-control input-sm" value="<?php echo $row['Provider_Perm_Fax']; ?>" >
								</div>
								<label class="col-sm-1 control-label">Rapid Funds</label>
								<div class="col-sm-1">
									<select id="rapidFunds" name="rapidFunds" class="form-control input-sm" >
									<option>-- Select Rapid Funds --</option>
									<option value="1">Yes</option>
									<option value="0">No</option>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-sm-2 control-label">Contact</label>
								<div class="col-sm-1">
									<input type="text" id="contact" name="contact" class="form-control input-sm" value="<?php echo $row['Provider_Contact']; ?>" >
								</div>
								<label class="col-sm-1 control-label">Contact 2</label>
								<div class="col-sm-1">
									<input type="text" id="contact2" name="contact2" class="form-control input-sm" value="<?php echo $row['Provider_Contact2']; ?>" >
								</div>
								<label class="col-sm-1 control-label">Email</label>
								<div class="col-sm-1">
									<input type="email" id="email" name="email" placeholder="example@example.com" class="form-control input-sm" value="<?php echo $row['Provider_Email']; ?>" >
								</div>
							</div>
							<div class="form-group form-horizontal col-sm-12">
								<div class="col-sm-2"> </div>
								<div class="col-sm-2">
								<button type="submit" class="btn w-xs btn-primary">Save</button>
								</div>
							</div>
						</form>	<?php }?>
						<?php }?>
					</div>
				</div>
			</div>
            
          </div><!--content-->
        </div>
      </div>
    </div>
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
<script src="<?php echo base_url();?>assets/vendor/addactive/addactive.js"></script> 

<!-- App scripts --> 
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>


</body>
</html>