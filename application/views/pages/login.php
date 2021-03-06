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
<body class="blank" style="background-image:url(<?php echo base_url();?>assets/images/log66.jpg); background-repeat: no-repeat;
    background-size: cover;>

<!--[if lt IE 7]>
<![endif]-->

<!--<div class="color-line"></div>



<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md welcome-text">
            <h2><strong>Welcome to Case Manager </strong></h2>
                <h4>PLEASE LOGIN</h4>
            </div>
            <div class="hpanel">
                <div class="panel-body login-page">
                        <form action="<?php echo base_url(); //if($CurrentUrl != ""){ echo $CurrentUrl;} ?>admin/dashboard" method="post">
                            <div class="form-group">
                            	<input type="hidden" name="currenturl" value="<?php echo $CurrentUrl;?>">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required value="" name="username" id="username" class="form-control">
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Yur strong password</span>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" class="i-checks" checked>
                                     Remember login
                                <p class="help-block small">(if this is a private computer)</p>
                            </div>
                            <?php //if($CurrentUrl != ""){echo base_url(); echo $CurrentUrl;} ?>
                            <button class="btn btn-success btn-block login-form-btn">Login</button>
                            <?php /*?><a class="btn btn-primary btn-block forgot-btn" href="<?php echo base_url();?>admin/forgotPassword">Forgot Password</a><?php */?>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center welcome-text">
            <p>2016 Copyright Company Name</p>
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