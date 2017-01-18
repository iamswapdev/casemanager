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
<?php include 'header_financials.php';?>
<div class="content animate-panel">
	
    <div class="row ClientSettlements WithdrawnCases" style="display:none;">
        <div class="col-lg-12">
        <div class="hpanel">
        <div class="panel-heading"></div>
        <div class="panel-body tab-panel">
            <div class="form-group form-horizontal col-lg-12">
                <h5 class="h4-title"><?php echo $TableInfo['TableId'];?></h5>
                <div class="col-md-12">
                    <table id="ClientSettlements" class="table dataTable table-bordered table-striped">
                        <thead>
                        <tr>  	 	 	 
                            <th>Case ID</th>
                            <th>Patient</th>
                            <th>Insurer</th>
                            <th>Initial Amount</th>
                            <th>Settled By</th>
                            <th>Settlement Terms</th>
                            <th>Settlement Date </th>
                            <th>Settlement Notes</th>
                            <th>Settlement %age</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div><!-- End of panel-body tab-panel-->
        </div><!-- End hpanel -->
        </div><!-- End col-lg-12-->
    </div><!-- End row-->
    
    <div class="row ClientNewCases" style="display:none;">
        <div class="col-lg-12">
        <div class="hpanel">
        <div class="panel-heading"></div>
        <div class="panel-body tab-panel">
            <div class="form-group form-horizontal col-lg-12">
                <h5 class="h4-title"><?php echo $TableInfo['TableId'];?></h5>
                <div class="col-md-12">
                    <table id="ClientNewCases" class="table dataTable table-bordered table-striped">
                        <thead>
                        <tr>  	 	 	 
                            <th>Case ID</th>
                            <th>Patient</th>
                            <th>Insurer</th>
                            <th>Initial Amount</th>
                            <th>Status</th>
                            <th>Date Opened</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div><!-- End of panel-body tab-panel-->
        </div><!-- End hpanel -->
        </div><!-- End col-lg-12-->
    </div><!-- End row-->
    
    <div class="row StatusBreakdown" style="display:none;">
        <div class="col-lg-12">
        <div class="hpanel">
        <div class="panel-heading"></div>
        <div class="panel-body tab-panel">
            <div class="form-group form-horizontal col-lg-12">
                <h5 class="h4-title"><?php echo $TableInfo['TableId'];?></h5>
                <div class="col-md-12">
                    <table id="StatusBreakdown" class="table dataTable table-bordered table-striped">
                        <thead>
                        <tr>  	 	 	 
                            <th>Case ID</th>
                            <th>Patient</th>
                            <th>Insurer</th>
                            <th>Date Opened</th>
                            <th>Status</th>
                            <th>Initial Amount</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div><!-- End of panel-body tab-panel-->
        </div><!-- End hpanel -->
        </div><!-- End col-lg-12-->
    </div><!-- End row-->
    
    <div class="row ClientInvoices" style="display:none;">
        <div class="col-lg-12">
        <div class="hpanel">
        <div class="panel-heading"></div>
        <div class="panel-body tab-panel">
            <div class="form-group form-horizontal col-lg-12">
                <h5 class="h4-title">COLLECTIONS FOR THE CURRENT INVOICE PERIOD</h5>
                <div class="col-md-12">
                    <table id="Collections" class="table dataTable table-bordered table-striped">
                        <thead>
                        <tr>  	
                        	<th>#</th> 	 	 
                            <th>Case ID</th>
                            <th>Injurer</th>
                            <th>DOA</th>
                            <th>DOS</th>
                            <th>CLAIM</th>
                            <th>TYPE</th>
                            <th>DESC</th>
                            <th>DATE</th>
                            <th>COLLECTED</th>
                            <th>FEES</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="form-group form-horizontal col-lg-12">
                <h5 class="h4-title">FEES AND COSTS EXPENDED BY FIRM FOR THE CURRENT INVOICE PERIOD</h5>
                <div class="col-md-12">
                    <table id="FessCostsExpended" class="table dataTable table-bordered table-striped">
                        <thead>
                        <tr>  	
                        	<th>Case ID</th>
                            <th>Injurer</th>
                            <th>DOA</th>
                            <th>DOS</th>
                            <th>CLAIM</th>
                            <th>TYPE</th>
                            <th>DESC</th>
                            <th>INDEX / AAA#</th>
                            <th>COST</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="form-group form-horizontal col-lg-12">
                <h5 class="h4-title">CREDITS TO THE PROVIDER FOR THE CURRENT INVOICE PERIOD</h5>
                <div class="col-md-12">
                    <table id="CreditsToProvider" class="table dataTable table-bordered table-striped">
                        <thead>
                        <tr>  	
                        	<th>Case ID</th>
                            <th>Injurer</th>
                            <th>DOA</th>
                            <th>DOS</th>
                            <th>CLAIM</th>
                            <th>TYPE</th>
                            <th>DESC</th>
                            <th>INDEX / AAA#</th>
                            <th>COST CREDIT</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="form-group form-horizontal col-lg-12">
                <h5 class="h4-title">FEES AND COSTS RECEIVED BY FIRM FROM THE CARRIER FOR THE CURRENT INVOICE PERIOD</h5>
                <div class="col-md-12">
                    <table id="FeesCostsReceived" class="table dataTable table-bordered table-striped">
                        <thead>
                        <tr>  	
                        	<th>Case ID</th>
                            <th>Injurer</th>
                            <th>DOA</th>
                            <th>DOS</th>
                            <th>CLAIM</th>
                            <th>TYPE</th>
                            <th>DESC</th>
                            <th>INDEX / AAA#</th>
                            <th>COST CREDIT</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="form-group form-horizontal col-lg-12">
                <h5 class="h4-title">PROVIDER DETAILS</h5>
                <div class="col-md-12">
                    <table id="ProviderDetails" class="table dataTable table-bordered table-striped">
                        <thead>
                        <tr>  	
                        	<th>PROVIDER ID</th>
                            <th>PROVIDER NAME</th>
                            <th>PREVIOUS COSTS</th>
                            <th>COLLECTION %AGE</th>
                            <th>INTEREST %AGE</th>
                            <th>INVOICE TYPE</th>
                            <th>PROVIDER BILLED FOR FF</th>
                            <th>PROVIDER REIMBURSED FOR FF</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="form-group form-horizontal col-lg-12">
                <h5 class="h4-title">PROVIDER DETAILS</h5>
                <div class="col-md-12">
                    <table id="FinalClientInvoices" class="table dataTable table-bordered table-striped">
                        <thead>
                        <tr>  	
                        	<th>[A] - GROSS AMOUNT COLLECTED </th>
                            <td>testtesttesttesttesttesttesttesttesttest</td>
                        </tr>
                        <tr>  	
                        	<th>[B] - LEGAL FEES </th>
                            <td>testtesttesttesttesttesttesttesttesttest</td>
                        </tr>
                        <tr>  	
                        	<th>[C] - PREVIOUS COSTS </th>
                            <td>testtesttesttesttesttesttesttesttesttest</td>
                        </tr>
                        <tr>  	
                        	<th>[D] - COSTS EXPENDED </th>
                            <td>testtesttesttesttesttesttesttesttesttest</td>
                        </tr>
                        <tr>  	
                        	<th>[E] - CREDITS TO THE CLIENT</th>
                            <td>testtesttesttesttesttesttesttesttesttest</td>
                        </tr>
                        <tr>  	
                        	<th>[F] - RECEIVED FEES & COSTS FROM INSURER, CR TO CLIENT </th>
                            <td>testtesttesttesttesttesttesttesttesttest</td>
                        </tr>
                        <tr>  	
                        	<th>[G=A-B-C-D+E+F] - FINAL REMITTANCE TO CLIENT </th>
                            <td>testtesttesttesttesttesttesttesttesttest</td>
                        </tr>
                        <tr>  	
                        	<th>[H=B+C+D-E-F] - FINAL REMITTANCE TO FIRM </th>
                            <td>testtesttesttesttesttesttesttesttesttest</td>
                        </tr>
                        <tr>  	
                        	<th>NEW BALANCE DUE FROM CLIENT </th>
                            <td>testtesttesttesttesttesttesttesttesttest</td>
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
	var TableId = "<?php echo $TableInfo['TableId']?>";
    $("."+TableId).css("display", "block");
	
	$('#'+TableId).dataTable( {
		"ajax": {
			"url": "get_Client_Report_Month",
			"data": {
				"Provider_Id": "<?php echo $TableInfo['Provider_Id'];?>",
				"SD": "<?php echo $TableInfo['SD'];?>",
				"ED": "<?php echo $TableInfo['ED'];?>",
				"TableId": "<?php echo $TableInfo['TableId'];?>",
				"Status": "<?php echo $TableInfo['Status'];?>"
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

</script>
<script>
	$('.financials').addClass('active');
	$('.reports').addClass('active');
</script>
</body>
</html>