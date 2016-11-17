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
<div class="splash">
  <div class="color-line"></div>
  <div class="splash-title">
    <h1></h1>
    <p> </p>
    <img src="images/loading-bars.svg" width="64" height="64" /> </div>
</div>
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
			
			<ul class="nav nav-tabs">
				<li class=""><a href="<?php echo base_url();?>dataentry/attorney">Add Ins. Company</a></li>
				<li class="active"><a href="">Edit Ins. Company</a></li>
			  </ul>
			  
			<div class="tab-content">
				
				<div id="tab-1" class="tab-pane active">
					<div class="panel-body">
						<div class="col-lg-12 panel-body tab-panel">
                            <div class="form-group form-horizontal col-md-12">
                                
                                <form action="updateattorney" method="post" class="form-horizontal">
                                    <h4>Select Name To Edit</h4>
                                    <div class="form-group form-horizontal col-sm-12">
                                        <label class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-6">
                                            <select class="form-control input-sm" id="attorneyId" name="attorneyId">
												<?php foreach($Attorney_Name as $row){?>
                                                <option value="<?php echo $row['Attorney_Id']; ?>"><?php echo $row['Attorney_LastName']." , ".$row['Attorney_FirstName'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal col-sm-12">
                                        <div class="col-sm-2"> </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn w-xs btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                                
                                <?php if($AttorneyInfoById != ""){ /*echo "AttorneyInfoById: <pre>"; print_r($AttorneyInfoById);*/  ?>
                                <form action="add_AttorneyInfo" method="post" class="form-horizontal">
                                    <h4>Attorney Information </h4>
                                    <div class="form-group">
                                    	<input type="hidden" id="attorneyIdHidden" name="attorneyId" value="<?php echo $row['Attorney_Id']; ?>" >
                                        <label class="col-sm-2 control-label">Defendant</label>
                                        <div class="col-md-6">
                                            <select class="form-control input-sm" id="insuranceId" name="insuranceId" >
                                                <?php foreach($Defendant_Name as $row){?>
                                                <option value="<?php echo $row['Defendant_id']; ?>"><?php echo $row['Defendant_Name'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php foreach($AttorneyInfoById as $row){?>
                                    <div class="form-group form-horizontal col-smd-12">
                                        <label class="col-sm-2 control-label">Last Name</label>
                                        <div class="col-sm-2">
                                            <input type="text" id="lastName" name="lastName" placeholder="Last Name" class="form-control input-sm" value="<?php echo $row['Attorney_LastName']; ?>" >
                                        </div>
                                        <label class="col-sm-1 control-label">First Name</label>
                                        <div class="col-sm-2">
                                            <input type="text" id="firstName" name="firstName" placeholder="First Name" class="form-control input-sm" value="<?php echo $row['Attorney_FirstName']; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal col-smd-12">
                                        <label class="col-sm-2 control-label">Zip</label>
                                        <div class="col-sm-2">
                                            <input type="text" id="zip" name="zip" placeholder="Ex.000000" class="form-control input-sm" value="<?php echo $row['Attorney_Zip']; ?>" >
                                        </div>
                                        <label class="col-sm-1 control-label">City</label>
                                        <div class="col-sm-2">
                                            <select class="form-control m-b" id="city" name="city" >
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                            </select>
                                        </div>
                                        <label class="col-sm-1 control-label">State</label>
                                        <div class="col-sm-2">
                                            <select class="form-control m-b"  id="state" name="state" >
                                                <?php foreach($State_Name as $row){?>
                                                <option value="<?php echo $row['State_Id']; ?>"> <?php echo $row['State_Name']; ?> </option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal col-smd-12">
                                        <label class="col-sm-2 control-label">Phone</label>
                                        <div class="col-sm-2">
                                            <input type="text" id="phone" name="phone" placeholder="Ex.000000" class="form-control input-sm" value="<?php echo $row['Attorney_Phone']; ?>" >
                                        </div>
                                        <label class="col-sm-1 control-label">Fax</label>
                                        <div class="col-sm-1">
                                            <input type="text" id="fax" name="fax" placeholder="Ex.000000" class="form-control input-sm" value="<?php echo $row['Attorney_Fax']; ?>" >
                                        </div>
                                        <label class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-2">
                                            <input type="text" id="email" name="email" placeholder="Ex.abc@pqr.com" class="form-control input-sm" value="<?php echo $row['Attorney_Email']; ?>" >
                                        </div>
                                        
                                    </div>
                                    <div class="form-group form-horizontal col-sm-12">
                                        <div class="col-sm-2"> </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn w-xs btn-primary">Save</button>
                                        </div>
                                    </div>
                                    <?php }?>
                                </form>
                                <?php }?>
                            </div>
                            
                            
                            
                            
						</div>
					</div>
				</div>
				
			</div>
			
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
<script src="<?php echo base_url();?>assets/vendor/addactive/addactive.js"></script>
<!-- App scripts --> 
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
</body>
</html>