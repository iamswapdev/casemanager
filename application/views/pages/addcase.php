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
<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Homer - Responsive Admin Theme</h1><p>Special AngularJS Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><img src="images/loading-bars.svg" width="64" height="64" /> </div> </div>
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
      <div class="panel-body">
        <form method="get" class="form-horizontal">
          <h4>CASE INFORMATION </h4>
          <p>(Note: All amounts are in USD wherever applicable.)</p>
          <div class="hr-line-dashed"></div>
          <label>Initial Status:</label>
          <div class="radio"><label> <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios">ARBITRATION</label></div>
                    <div class="radio"><label> <input type="radio" value="option2" id="optionsRadios2" name="optionsRadios"> LITIGATION</label></div>
          <div class="hr-line-dashed"></div>
          <div class="form-group"><label class="col-sm-2 control-label">Provider Name</label>
             <div class="col-sm-10"><input type="text" class="form-control"></div>
          </div>           
          <div class="form-group"><label class="col-sm-2 control-label"></label>
            <div class="col-sm-10"><select class="form-control m-b" name="account">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
              </select>
            </div>
          </div> 
                      
      </div>
    </div>     
  </div> 
</div>
    
  <div class="row">
    <div class="col-lg-12 animated-panel zoomIn" style="animation-delay: 0.4s;">
      <div class="hpanel"> 
        <div class="panel-body">
          <h4>Injured Party Information </h4>
          <div class="form-group"><label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-2">
                <input type="text" placeholder="Last Name" class="form-control m-b"> 
                <!--<input type="text" placeholder=".input-sm" class="form-control input-sm">-->
            </div>
            <div class="col-sm-2">
                <input type="text" placeholder="First Name" class="form-control m-b"> 
                <!--<input type="text" placeholder=".input-sm" class="form-control input-sm">-->
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>  
   
  <div class="row">
    <div class="col-lg-12 animated-panel zoomIn" style="animation-delay: 0.4s;">
      <div class="hpanel"> 
        <div class="panel-body">
          <h4>Insured Party Information</h4>
          <div class="checkbox"><label> <input type="checkbox" class="i-checks">Check here if same as Patient Information.</label></div>
          <div class="form-group"><label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-2">
              <input type="text" placeholder="Last Name" class="form-control m-b"> 
                <!--<input type="text" placeholder=".input-sm" class="form-control input-sm">-->
            </div>
            <div class="col-sm-2">
                <input type="text" placeholder="First Name" class="form-control m-b"> 
                <!--<input type="text" placeholder=".input-sm" class="form-control input-sm">-->
            </div>
          </div>
          </form>
        </div>  
      </div>
    </div>
  </div>   


    <!-- Right sidebar -->
    <div id="right-sidebar" class="animated fadeInRight">
 
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

<!-- App scripts -->
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>

</body>
</html>