<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>HOMER | WebApp admin theme</title>

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
<body class="blank">

<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Homer - Responsive Admin Theme</h1><p>Special AngularJS Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><img src="<?php echo base_url();?>assets/images/loading-bars.svg" width="64" height="64" /> </div> </div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="color-line"></div>

<div class="back-link">
    <a href="index.html" class="btn btn-primary">Back to Dashboard</a>
</div>

<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
            <h2><strong>Welcome to Case Manager </strong></h2>
                <h3>PLEASE LOGIN</h3>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                        <form action="emailauth" method="post">
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you Email Address" required value="" name="email" id="email" class="form-control">
                                <span class="help-block small">Your unique Email Address to app</span>
                            </div>
                            <button class="btn btn-success btn-block">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            2016 Copyright Company Name
        </div>
    </div>
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