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
            <li class=""><a href="<?php echo base_url();?>dataentry/insurancecompany">Add Ins. Company</a></li>
            <li class="active"><a href="#tab-2">Edit Ins. Company</a></li>
          </ul>
        <div class="tab-content">
			
			<div id="tab-2" class="tab-pane active">
			<div class="panel-body">
				<div class="col-lg-12 panel-body tab-panel">
					
						<div class="form-group form-horizontal col-md-12">
							
							<form action="updateinsurance" method="post">
								<h4>Select Insurer To Edit</h4>
								<div class="form-group form-horizontal col-sm-12">
									<label class="col-sm-2 control-label">Name</label>
									<div class="col-sm-5">
										<select class="form-control input-sm" id="insuranceId" name="insuranceId">
                                            <?php foreach($InsuranceCompany_Name as $row){?>
                                            <option value="<?php echo $row['InsuranceCompany_Id']; ?>"><?php echo $row['InsuranceCompany_Name'];?></option>
                                            <?php }?>
										</select>
									</div>
								</div>
								<div class="form-group form-horizontal col-sm-12">
									<div class="col-sm-2"> </div>
									<div class="col-sm-2">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-paste"></i> Edit</button>
									</div>
								</div>
							</form>
						</div>
					
                    
                    <div class="form-group form-horizontal col-md-12">
                    <?php if($InsuranceInfoById != ""){ /*echo "<pre>"; print_r($ProviderInfoById);*/ ?>
					<?php foreach($InsuranceInfoById as $row){?>
                    
                    <form action="updateinsurance" class="form-horizontal" method="post" style=" <?php if($display_form != 1){ ?> display: none; <?php }?> ">
                        <h4>Insurance Company Information</h4>
                        <div class="form-group form-horizontal col-md-12">
                        	<input type="hidden" id="insuranceId" name="insuranceId" value="<?php echo $row['InsuranceCompany_Id']; ?>" >
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-5">
                                <input type="text" id="name" name="name" class="form-control input-sm" value="<?php echo $row['InsuranceCompany_Name']; ?>" >
                            </div>
                        </div>
                        <div class="form-group form-horizontal col-md-12">
                            <label class="col-sm-2 control-label">Suit</label>
                            <div class="col-sm-5">
                                <input type="text" id="suit" name="suit" class="form-control input-sm" value="<?php echo $row['InsuranceCompany_SuitName']; ?>" >
                            </div>
                        </div>
                        <div class="form-group form-horizontal col-md-12">
                            <label class="col-sm-2 control-label">Type</label>
                            <div class="col-sm-5">
                                <input type="text" id="type" name="type" class="form-control input-sm" value="<?php echo $row['InsuranceCompany_Type']; ?>" >
                            </div>
                        </div>
                        
                        <h4>Insurance Company Local Address</h4>
                        <div class="form-group form-horizontal col-md-12">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-5">
                                <textarea rows="3" id="addressLocal" name="addressLocal" class="form-control"> <?php echo $row['InsuranceCompany_Local_Address']; ?> </textarea>
                            </div>
                        </div>
                        <div class="form-group form-horizontal col-md-12">
                            <label class="col-sm-2 control-label">Zip</label>
                            <div class="col-sm-1">
                                <input type="text" id="zipLocal" name="zipLocal" placeholder="Ex.11111" class="form-control input-sm" value="<?php echo $row['InsuranceCompany_Local_Zip']; ?>" >
                                <!--<input type="text" placeholder=".input-sm" class="form-control input-sm">--> 
                            </div>
                            <label class="col-sm-1 control-label">City</label>
                            <div class="col-sm-1">
                                <select class="form-control input-sm" id="cityLocal" name="cityLocal" >
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                </select>
                            </div>
                            <label class="col-sm-1 control-label">State</label>
                            <div class="col-sm-1">
                                <select class="form-control input-sm"  id="stateLocal" name="stateLocal">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-horizontal col-md-12">
                            <label class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-1">
                                <input type="text" id="phoneLocal" name="phoneLocal" placeholder="Ex.000000" class="form-control input-sm" value="<?php echo $row['InsuranceCompany_Local_Phone']; ?>" >
                            </div>
                            <label class="col-sm-1 control-label">Fax</label>
                            <div class="col-sm-1">
                                <input type="text" id="faxLocal" name="faxLocal" placeholder="Ex.11111" class="form-control input-sm" value="<?php echo $row['InsuranceCompany_Local_Fax']; ?>" >
                            </div>
                        </div>
                        
                        <h4>Insurance Company Perm.Address</h4>
                        <div class="form-group form-horizontal col-md-12">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-5">
                                <textarea rows="3" id="addressPermanent" name="addressPermanent" class="form-control" > <?php echo $row['InsuranceCompany_Perm_Address']; ?> </textarea>
                            </div>
                        </div>
                        <div class="form-group form-horizontal col-md-12">
                            <label class="col-sm-2 control-label">Zip</label>
                            <div class="col-sm-1">
                                <input type="text" id="zipPermanent" name="zipPermanent" placeholder="Ex.12345" class="form-control input-sm" value="<?php echo $row['InsuranceCompany_Perm_Zip']; ?>" >
                            </div>
                            <label class="col-sm-1 control-label">City</label>
                            <div class="col-sm-1">
                                <select class="form-control input-sm" id="cityPermanent" name="cityPermanent" name="account">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                </select>
                            </div>
                            <label class="col-sm-1 control-label">State</label>
                            <div class="col-sm-1">
                                <select class="form-control input-sm" id="statePermanent" name="statePermanent" >
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-horizontal col-md-12">
                            <label class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-1">
                                <input type="text" id="phonePermanent" name="phonePermanent" placeholder="Ex.12345" class="form-control input-sm" value="<?php echo $row['InsuranceCompany_Perm_Phone']; ?>" >
                            </div>
                            <label class="col-sm-1 control-label">Fax</label>
                            <div class="col-sm-1">
                                <input type="text" id="faxPermanent" name="faxPermanent" placeholder="Ex.12345" class="form-control input-sm" value="<?php echo $row['InsuranceCompany_Perm_Fax']; ?>" >
                            </div>
                        </div>
                        <div class="form-group form-horizontal col-sm-12">
                            <div class="col-sm-2"> </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn w-xs btn-primary">Save</button>
                            </div>
                        </div>
                    </form> <?php }?>
                    <?php }?>
					</div>
					
					
				</div>
			</div>
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
<script src="<?php echo base_url();?>assets/vendor/addactive/addactive.js"></script>
<!-- App scripts --> 
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
</body>
</html>