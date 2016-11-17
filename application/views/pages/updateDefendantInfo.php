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
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/metimdenu/dist/metimdenu.css" />
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
          <ul class="nav nav-tabs">
            <li class=""><a href="<?php echo base_url();?>dataentry/defendant">Add Defendant Info</a></li>
            <li class="active"><a href="">Edit Defendant Info</a></li>
          </ul>
          <div class="tab-content">
			
			
			<div id="tab-2" class="tab-pane active">
				<div class="panel-body">
					<div class="col-lg-12 panel-body tab-panel">
						<form action="updatedefendant" method="post" class="form-horizontal">
							<h4>Select Defendant To Edit</h4>
							<div class="form-group col-md-12">
								<label class="col-md-2 control-label">Name</label>
								<div class="col-md-6">
									<select class="form-control m-b" id="defendantId" name="defendantId">
										<?php foreach($Defendant_Name as $row){?>
                                        <option value="<?php echo $row['Defendant_id']; ?>"><?php echo $row['Defendant_Name'];?></option>
                                        <?php }?>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"> </div>
								<div class="col-md-2">
									<button type="submit" class="btn w-xs btn-primary">Save</button>
								</div>
							</div>
						</form>
                        
                        <?php if($DefendantInfoById != ""){ /*echo "<pre>"; print_r($DefendantInfoById);*/ ?>
						<?php foreach($DefendantInfoById as $row){?>
                        <form action="updatedefendant" method="post" class="form-horizontal" style=" <?php if($display_form != 1){ ?> display: none; <?php }?>" >
                            <h4>Defendant Information Information</h4>
                            <div class= "form-group form-horizontal col-md-12">
                            	<input type="hidden" id="defendantIdHidden" name="defendantId" value="<?php echo $row['Defendant_id']; ?>" >
                                <label class="col-md-2 control-label">Name</label>
                                <div class="col-md-6">
                                <input type="text" id="name" name="name" class="form-control input-md" value="<?php echo $row['Defendant_Name']; ?>" >
                                </div>
                            </div>
                            
                            <h4>Defendant Contact Details Address</h4>
                            <div class="form-group form-horizontal col-md-12 ">
                            <label class="col-md-2 control-label">Address</label>
                            <div class="col-md-6">
                            <textarea rows="5" id="address" name="address"  class="form-control" > <?php echo $row['Defendant_Address']; ?> </textarea>
                            </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                                <label class="col-md-2 control-label">Zip</label>
                                <div class="col-md-2">
                                    <input type="text" id="zip" name="zip"  placeholder="Ex.11111" class="form-control m-b" value="<?php echo $row['Defendant_Zip']; ?>" >
                                    <!--<input type="text" placeholder=".input-md" class="form-control input-md">--> 
                                </div>
                                <label class="col-md-1 control-label">City</label>
                                <div class="col-md-2">
                                    <select class="form-control m-b" id="city" name="city" >
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                    </select>
                                </div>
                                <label class="col-md-1 control-label">State</label>
                                <div class="col-md-2">
                                    <select class="form-control m-b"  id="state" name="state" >
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                                <label class="col-md-2 control-label">Email</label>
                                <div class="col-md-2">
                                    <input type="text" id="email" name="email"  placeholder="Ex.abc@pqr.com" class="form-control m-b" value="<?php echo $row['Defendant_Email']; ?>" >
                                </div>
                                <label class="col-md-1 control-label">Phone</label>
                                <div class="col-md-2">
                                    <input type="text" id="phone" name="phone"  placeholder="Ex.000000" class="form-control m-b" value="<?php echo $row['Defendant_Phone']; ?>" >
                                </div>
                                <label class="col-md-1 control-label">Fax</label>
                                <div class="col-md-2">
                                    <input type="text" id="fax" name="fax"  placeholder="Ex.11111" class="form-control m-b" value="<?php echo $row['Defendant_Fax']; ?>" >
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                                <div class="col-md-2"> </div>
                                <div class="col-md-2">
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
<!--content animate-panel--> 

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
<script src="<?php echo base_url();?>assets/vendor/metimdenu/dist/metimdenu.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/iCheck/icheck.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/addactive/addactive.js"></script>
<!-- App scripts --> 
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
</body>
</html>