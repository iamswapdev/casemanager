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

<div class="normalheader transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <a class="small-header-action" href="">
                <div class="clip-header">
                    <i class="fa fa-arrow-up"></i>
                </div>
            </a>

            <div id="hbreadcrumb" class="pull-right m-t-lg">
                <ol class="hbreadcrumb breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li>
                        <span>App views</span>
                    </li>
                    <li class="active">
                        <span>Contacts</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Contacts
            </h2>
            <small>Show users list in nice and color panels</small>
        </div>
    </div>
</div>

<div class="content animate-panel">

<div class="row">
    <div class="col-lg-3">
        <div class="hpanel hgreen contact-panel">
            <div class="panel-body">
                <span class="label label-success pull-right">NEW</span>
                <img alt="logo" class="img-circle m-b" src="images/profile.jpg">
                <h3><a href=""> Bradly Danforth </a></h3>
                <div class="text-muted font-bold m-b-xs">California, LA</div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                </p>
            </div>
            <div class="panel-footer contact-footer">
                <div class="row">
                    <div class="col-md-4 border-right"> <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div> </div>
                    <div class="col-md-4 border-right"> <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div> </div>
                    <div class="col-md-4"> <div class="contact-stat"><span>Views: </span> <strong>400</strong></div> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="hpanel hyellow contact-panel">
            <div class="panel-body">
                <img alt="logo" class="img-circle m-b" src="images/a4.jpg">
                <h3><a href=""> Tangela Sternberg </a></h3>
                <div class="text-muted font-bold m-b-xs">California, LA</div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                </p>
            </div>
            <div class="panel-footer contact-footer">
                <div class="row">
                    <div class="col-md-4 border-right"> <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div> </div>
                    <div class="col-md-4 border-right"> <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div> </div>
                    <div class="col-md-4"> <div class="contact-stat"><span>Views: </span> <strong>400</strong></div> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="hpanel hviolet contact-panel">
            <div class="panel-body">
                <img alt="logo" class="img-circle m-b" src="images/a2.jpg">
                <h3><a href=""> Claud Vogan </a></h3>
                <div class="text-muted font-bold m-b-xs">California, LA</div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                </p>
            </div>
            <div class="panel-footer contact-footer">
                <div class="row">
                    <div class="col-md-4 border-right"> <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div> </div>
                    <div class="col-md-4 border-right"> <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div> </div>
                    <div class="col-md-4"> <div class="contact-stat"><span>Views: </span> <strong>400</strong></div> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="hpanel hblue contact-panel">
            <div class="panel-body">
                <img alt="logo" class="img-circle m-b" src="images/a3.jpg">
                <h3><a href=""> Valda Purdy </a></h3>
                <div class="text-muted font-bold m-b-xs">California, LA</div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                </p>
            </div>
            <div class="panel-footer contact-footer">
                <div class="row">
                    <div class="col-md-4 border-right"> <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div> </div>
                    <div class="col-md-4 border-right"> <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div> </div>
                    <div class="col-md-4"> <div class="contact-stat"><span>Views: </span> <strong>400</strong></div> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="hpanel hblue contact-panel">
            <div class="panel-body">
                <img alt="logo" class="img-circle m-b" src="images/a9.jpg">
                <h3><a href="">Max Simson</a></h3>
                <div class="text-muted font-bold m-b-xs">California, LA</div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                </p>
            </div>
            <div class="panel-footer contact-footer">
                <div class="row">
                    <div class="col-md-4 border-right"> <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div> </div>
                    <div class="col-md-4 border-right"> <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div> </div>
                    <div class="col-md-4"> <div class="contact-stat"><span>Views: </span> <strong>400</strong></div> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="hpanel hgreen contact-panel">
            <div class="panel-body">
                <img alt="logo" class="img-circle m-b" src="images/a5.jpg">
                <h3><a href="">Max Simson</a></h3>
                <div class="text-muted font-bold m-b-xs">California, LA</div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                </p>
            </div>
            <div class="panel-footer contact-footer">
                <div class="row">
                    <div class="col-md-4 border-right"> <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div> </div>
                    <div class="col-md-4 border-right"> <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div> </div>
                    <div class="col-md-4"> <div class="contact-stat"><span>Views: </span> <strong>400</strong></div> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="hpanel hyellow contact-panel">
            <div class="panel-body">
                <span class="label label-warning pull-right">SPECIAL</span>
                <img alt="logo" class="img-circle m-b" src="images/a6.jpg">
                <h3><a href="">Max Simson</a></h3>
                <div class="text-muted font-bold m-b-xs">California, LA</div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                </p>
            </div>
            <div class="panel-footer contact-footer">
                <div class="row">
                    <div class="col-md-4 border-right"> <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div> </div>
                    <div class="col-md-4 border-right"> <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div> </div>
                    <div class="col-md-4"> <div class="contact-stat"><span>Views: </span> <strong>400</strong></div> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="hpanel hred contact-panel">
            <div class="panel-body">
                <img alt="logo" class="img-circle m-b" src="images/a7.jpg">
                <h3><a href="">Max Simson</a></h3>
                <div class="text-muted font-bold m-b-xs">California, LA</div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                </p>
            </div>
            <div class="panel-footer contact-footer">
                <div class="row">
                    <div class="col-md-4 border-right"> <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div> </div>
                    <div class="col-md-4 border-right"> <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div> </div>
                    <div class="col-md-4"> <div class="contact-stat"><span>Views: </span> <strong>400</strong></div> </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-lg-3">
            <div class="hpanel hgreen contact-panel">
                <div class="panel-body">
                    <span class="label label-success pull-right">NEW</span>
                    <img alt="logo" class="img-circle m-b" src="images/profile.jpg">
                    <h3><a href=""> Bradly Danforth </a></h3>
                    <div class="text-muted font-bold m-b-xs">California, LA</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                    </p>
                </div>
                <div class="panel-footer contact-footer">
                    <div class="row">
                        <div class="col-md-4 border-right"> <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div> </div>
                        <div class="col-md-4 border-right"> <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div> </div>
                        <div class="col-md-4"> <div class="contact-stat"><span>Views: </span> <strong>400</strong></div> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="hpanel hyellow contact-panel">
                <div class="panel-body">
                    <img alt="logo" class="img-circle m-b" src="images/a4.jpg">
                    <h3><a href=""> Tangela Sternberg </a></h3>
                    <div class="text-muted font-bold m-b-xs">California, LA</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                    </p>
                </div>
                <div class="panel-footer contact-footer">
                    <div class="row">
                        <div class="col-md-4 border-right"> <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div> </div>
                        <div class="col-md-4 border-right"> <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div> </div>
                        <div class="col-md-4"> <div class="contact-stat"><span>Views: </span> <strong>400</strong></div> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="hpanel hviolet contact-panel">
                <div class="panel-body">
                    <img alt="logo" class="img-circle m-b" src="images/a2.jpg">
                    <h3><a href=""> Claud Vogan </a></h3>
                    <div class="text-muted font-bold m-b-xs">California, LA</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                    </p>
                </div>
                <div class="panel-footer contact-footer">
                    <div class="row">
                        <div class="col-md-4 border-right"> <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div> </div>
                        <div class="col-md-4 border-right"> <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div> </div>
                        <div class="col-md-4"> <div class="contact-stat"><span>Views: </span> <strong>400</strong></div> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="hpanel hblue contact-panel">
                <div class="panel-body">
                    <img alt="logo" class="img-circle m-b" src="images/a3.jpg">
                    <h3><a href=""> Valda Purdy </a></h3>
                    <div class="text-muted font-bold m-b-xs">California, LA</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                    </p>
                </div>
                <div class="panel-footer contact-footer">
                    <div class="row">
                        <div class="col-md-4 border-right"> <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div> </div>

                        <div class="col-md-4 border-right"> <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div> </div>
                        <div class="col-md-4"> <div class="contact-stat"><span>Views: </span> <strong>400</strong></div> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="hpanel hblue contact-panel">
                <div class="panel-body">
                    <img alt="logo" class="img-circle m-b" src="images/a9.jpg">
                    <h3><a href="">Max Simson</a></h3>
                    <div class="text-muted font-bold m-b-xs">California, LA</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                    </p>
                </div>
                <div class="panel-footer contact-footer">
                    <div class="row">
                        <div class="col-md-4 border-right"> <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div> </div>
                        <div class="col-md-4 border-right"> <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div> </div>
                        <div class="col-md-4"> <div class="contact-stat"><span>Views: </span> <strong>400</strong></div> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="hpanel hgreen contact-panel">
                <div class="panel-body">
                    <img alt="logo" class="img-circle m-b" src="images/a5.jpg">
                    <h3><a href="">Max Simson</a></h3>
                    <div class="text-muted font-bold m-b-xs">California, LA</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                    </p>
                </div>
                <div class="panel-footer contact-footer">
                    <div class="row">
                        <div class="col-md-4 border-right"> <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div> </div>
                        <div class="col-md-4 border-right"> <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div> </div>
                        <div class="col-md-4"> <div class="contact-stat"><span>Views: </span> <strong>400</strong></div> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="hpanel hyellow contact-panel">
                <div class="panel-body">
                    <span class="label label-warning pull-right">SPECIAL</span>
                    <img alt="logo" class="img-circle m-b" src="images/a6.jpg">
                    <h3><a href="">Max Simson</a></h3>
                    <div class="text-muted font-bold m-b-xs">California, LA</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                    </p>
                </div>
                <div class="panel-footer contact-footer">
                    <div class="row">
                        <div class="col-md-4 border-right"> <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div> </div>
                        <div class="col-md-4 border-right"> <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div> </div>
                        <div class="col-md-4"> <div class="contact-stat"><span>Views: </span> <strong>400</strong></div> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="hpanel hred contact-panel">
                <div class="panel-body">
                    <img alt="logo" class="img-circle m-b" src="images/a7.jpg">
                    <h3><a href="">Max Simson</a></h3>
                    <div class="text-muted font-bold m-b-xs">California, LA</div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                    </p>
                </div>
                <div class="panel-footer contact-footer">
                    <div class="row">
                        <div class="col-md-4 border-right"> <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div> </div>
                        <div class="col-md-4 border-right"> <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div> </div>
                        <div class="col-md-4"> <div class="contact-stat"><span>Views: </span> <strong>400</strong></div> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- Right sidebar -->
    <div id="right-sidebar" class="animated fadeInRight">

        <div class="p-m">
            <button id="sidebar-close" class="right-sidebar-toggle sidebar-button btn btn-default m-b-md"><i class="pe pe-7s-close"></i>
            </button>
            <div>
                <span class="font-bold no-margins"> Analytics </span>
                <br>
                <small> Lorem Ipsum is simply dummy text of the printing simply all dummy text.</small>
            </div>
            <div class="row m-t-sm m-b-sm">
                <div class="col-lg-6">
                    <h3 class="no-margins font-extra-bold text-success">300,102</h3>

                    <div class="font-bold">98% <i class="fa fa-level-up text-success"></i></div>
                </div>
                <div class="col-lg-6">
                    <h3 class="no-margins font-extra-bold text-success">280,200</h3>

                    <div class="font-bold">98% <i class="fa fa-level-up text-success"></i></div>
                </div>
            </div>
            <div class="progress m-t-xs full progress-small">
                <div style="width: 25%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" role="progressbar"
                     class=" progress-bar progress-bar-success">
                    <span class="sr-only">35% Complete (success)</span>
                </div>
            </div>
        </div>
        <div class="p-m bg-light border-bottom border-top">
            <span class="font-bold no-margins"> Social talks </span>
            <br>
            <small> Lorem Ipsum is simply dummy text of the printing simply all dummy text.</small>
            <div class="m-t-md">
                <div class="social-talk">
                    <div class="media social-profile clearfix">
                        <a class="pull-left">
                            <img src="images/a1.jpg" alt="profile-picture">
                        </a>

                        <div class="media-body">
                            <span class="font-bold">John Novak</span>
                            <small class="text-muted">21.03.2015</small>
                            <div class="social-content small">
                                Injected humour, or randomised words which don't look even slightly believable.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social-talk">
                    <div class="media social-profile clearfix">
                        <a class="pull-left">
                            <img src="images/a3.jpg" alt="profile-picture">
                        </a>

                        <div class="media-body">
                            <span class="font-bold">Mark Smith</span>
                            <small class="text-muted">14.04.2015</small>
                            <div class="social-content">
                                Many desktop publishing packages and web page editors.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social-talk">
                    <div class="media social-profile clearfix">
                        <a class="pull-left">
                            <img src="images/a4.jpg" alt="profile-picture">
                        </a>

                        <div class="media-body">
                            <span class="font-bold">Marica Morgan</span>
                            <small class="text-muted">21.03.2015</small>

                            <div class="social-content">
                                There are many variations of passages of Lorem Ipsum available, but the majority have
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-m">
            <span class="font-bold no-margins"> Sales in last week </span>
            <div class="m-t-xs">
                <div class="row">
                    <div class="col-xs-6">
                        <small>Today</small>
                        <h4 class="m-t-xs">$170,20 <i class="fa fa-level-up text-success"></i></h4>
                    </div>
                    <div class="col-xs-6">
                        <small>Last week</small>
                        <h4 class="m-t-xs">$580,90 <i class="fa fa-level-up text-success"></i></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <small>Today</small>
                        <h4 class="m-t-xs">$620,20 <i class="fa fa-level-up text-success"></i></h4>
                    </div>
                    <div class="col-xs-6">
                        <small>Last week</small>
                        <h4 class="m-t-xs">$140,70 <i class="fa fa-level-up text-success"></i></h4>
                    </div>
                </div>
            </div>
            <small> Lorem Ipsum is simply dummy text of the printing simply all dummy text.
                Many desktop publishing packages and web page editors.
            </small>
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

<!-- App scripts -->
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>

</body>
</html>