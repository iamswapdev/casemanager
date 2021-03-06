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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/styles/style.css">

</head>
<body>

<!-- Simple splash screen-->
<!--<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Homer - Responsive Admin Theme</h1><p>Special AngularJS Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><img src="images/loading-bars.svg" width="64" height="64" /> </div> </div>-->
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Header -->
<?php include 'header.php';?>
<!-- Navigation -->
<?php include 'sidebar.php';?>
<!-- Main Wrapper -->
<div id="wrapper">
<div class="content">
	
    <div class="row">
        <div class="col-lg-12">
        <div class="hpanel">
        <div class="panel-heading"></div>
        <div class="panel-body tab-panel">
        	<div class="form-group form-horizontal col-lg-12">
            	<div class="col-md-2">
                	<input type="text" name="date"  class="form-control input-sm datepicker_settlement" >
                </div>
                <div class="col-md-2">
                	<button type="button" class="btn btn-primary col-md-2" id="Go">Go</button>
            	</div>
            </div>
            <div class="form-group form-horizontal col-lg-12">
                <div class="col-md-12">
                	<br><h5 class="h4-title">Event List</h5>
                    <table id="EventList" class="table dataTable table-bordered table-striped">
                        <thead>
                        <tr>  	 	 	 
                            <th>#</th>											
                            <th>Case ID</th>
                            <th>Event Type</th>
                            <th>Event Status</th>
                            <th>Event Date</th>
                            <th>Event Time</th>
                            <th>Event Description</th>
                            <th>Assigned To</th>
                            <th>Provider Name</th>
                            <th>Injured Party</th>
                            <th>Court Misc</th>
                            <th>Court Name</th>
                            <th>IndexOrAAA Number</th>
                            <th>Claim Amount</th>
                            <th>Defendant Name</th>
                            <th>InsuranceCompany Name</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div><!-- End of panel-body tab-panel-->
        </div><!-- End hpanel -->
        </div><!-- End col-lg-12-->
    </div><!-- End row-->
    
    
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
<script src="<?php echo base_url();?>assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>

<!-- App scripts -->
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
<script>
$(document).ready(function(e) {
	$("#Go").click(function(){
		$("#EventList").dataTable().fnDestroy();
		$('#EventList').dataTable( {
			"ajax": {
				"url": "get_Event_List",
				"data": {
					"Date": $("input[name=date]").val()
				},
				"type": "post"
			},
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": false,
			"bInfo": false,
			"bAutoWidth": false,
			"bSort": false
		});
	});
	$('#EventList').dataTable( {
		"ajax": {
			"url": "get_Event_List",
			"data": {
				"Date": "<?php echo $Date;?>"
			},
			"type": "post"
		},
		"bPaginate": false,
		"bLengthChange": false,
		"bFilter": false,
		"bInfo": false,
		"bAutoWidth": false,
		"bSort": false
	});
	$('body').on('focus',".datepicker_settlement", function(){
		$(this).datepicker({
			"autoclose": true,
			"todayHighlight": true,
			"selectOtherMonths": true
		});
	});
	
});

</script>
<script>
	$('.workarea').addClass('active');
	$('.calendar').addClass('active');
</script>
</body>
</html>