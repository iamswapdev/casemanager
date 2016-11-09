<?php
	session_cache_limiter('private_no_expire');
	if( !isset($_SESSION["username"]) && !isset($_SESSION["password"])){
		
		header('Location: admin');
	}
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
    <h1>Homer - Responsive Admin Theme</h1>
    <p>Special AngularJS Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p>
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
      <div class="col-lg-10">
        <div class="hpanel">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-1">Add Provider Info</a></li>
            <li class=""><a data-toggle="tab" href="#tab-2">View Provider Info</a></li>
          </ul>
          <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="hpanel">
                      <div class="panel-body tab-panel">
                        <h4>Provider Information </h4>
                        <form method="get" class="form-horizontal">
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control input-sm">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">President</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control input-sm">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Tax ID</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control input-sm">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Type</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control input-sm">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Collection Billing</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control input-sm">
                            </div>
                          </div>
                          <div class="form-group">
                            <label value="0.0" class="col-sm-2 control-label">Interest Billing</label>
                            <div class="col-sm-10">
                              <input type="text"  class="form-control input-sm">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Bill Provider for Filing Fees</label>
                            <div class="col-sm-10">
                              <select class="form-control m-b input-sm" name="account">
                                <option>Yes</option>
                                <option>No</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Reimburse Provider for Filing</label>
                            <div class="col-sm-10">
                              <select class="form-control m-b input-sm" name="account">
                                <option>Yes</option>
                                <option>No</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Cost Balance</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control input-sm">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Invoice Type</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control input-sm">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Refered By </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control input-sm">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Notes</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control input-sm">
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="hpanel">
                      <div class="panel-body tab-panel">
                        <h4>Provider Local Address</h4>
                        <form method="get" class="form-horizontal">
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                              <textarea rows="5" id="" class="form-control" name=""></textarea>
                            </div>
                          </div>
                          <div class="form-group form-horizontal">
                            <label class="col-sm-2 control-label">Zip</label>
                            <div class="col-sm-2">
                              <input type="text" class="form-control input-sm">
                            </div>
                            <label class="col-sm-2 control-label">City</label>
                            <div class="col-sm-2">
                              <select class="form-control m-b input-sm" name="account">
                                <option>Yes</option>
                                <option>No</option>
                              </select>
                            </div>
                            <label class="col-sm-2 control-label">State</label>
                            <div class="col-sm-2">
                              <select class="form-control m-b input-sm" name="account">
                                <option>Yes</option>
                                <option>No</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group form-horizontal">
                            <label class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-2">
                              <input type="text" class="form-control input-sm">
                            </div>
                            <label class="col-sm-2 control-label">Fax</label>
                            <div class="col-sm-2">
                              <input type="text" class="form-control input-sm">
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="hpanel">
                      <div class="panel-body tab-panel">
                        <h4>Provider Permanent Address</h4>
                        <form method="get" class="form-horizontal">
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                              <textarea rows="5" id="" class="form-control" name=""></textarea>
                            </div>
                          </div>
                          <div class="form-group form-horizontal">
                            <label class="col-sm-2 control-label">Zip</label>
                            <div class="col-sm-2">
                              <input type="text" class="form-control input-sm">
                            </div>
                            <label class="col-sm-2 control-label">City</label>
                            <div class="col-sm-2">
                              <select class="form-control m-b input-sm" name="account">
                                <option>Yes</option>
                                <option>No</option>
                              </select>
                            </div>
                            <label class="col-sm-2 control-label">State</label>
                            <div class="col-sm-2">
                              <select class="form-control m-b input-sm" name="account">
                                <option>Yes</option>
                                <option>No</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group form-horizontal">
                            <label class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-2">
                              <input type="text" class="form-control input-sm">
                            </div>
                            <label class="col-sm-2 control-label">Fax</label>
                            <div class="col-sm-2">
                              <input type="text" class="form-control input-sm">
                            </div>
                            <label class="col-sm-2 control-label">Rapid Funds</label>
                            <div class="col-sm-2">
                              <select class="form-control m-b input-sm" name="account">
                                <option>Yes</option>
                                <option>No</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group form-horizontal">
                            <label class="col-sm-2 control-label">Contact</label>
                            <div class="col-sm-2">
                              <input type="text" class="form-control input-sm">
                            </div>
                            <label class="col-sm-2 control-label">Contact 2</label>
                            <div class="col-sm-2">
                              <input type="text" class="form-control input-sm">
                            </div>
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-2">
                              <input type="email" class="form-control input-sm">
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="tab-2" class="tab-pane">
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="hpanel">
                      <div class="panel-body tab-panel">
                        <form method="get" class="form-horizontal">
                          <h4>Select Provider To View </h4>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                              <select class="form-control m-b" name="account">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <button type="button" class="btn w-xs btn-info create">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!--tab2 close-->
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

<!-- App scripts --> 
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
</body>
</html>