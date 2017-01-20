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
<?php //include 'header.php';?>
<!-- Navigation -->
<?php //include 'sidebar.php';?>
<!-- Main Wrapper -->
<!--<div id="wrapper"> -->
<?php //include 'header_financials.php';?>
<?php if($TableInfo['print_invoice'] =="print_invoice"){?>
<div>
    <div class="BeynensonLaw">The Beynenson Law Firm, P.C.</div>
    <div class="BeynensonLaw"><hr></div>
    <div class="BeynensonLaw-address">
        475 FRANKLIN AVENUE
        FRANKLIN SQUARE, NY 11010
        TEL: 516-858-4411     FAX: 516-216-5405
        Email: nofault@beynensonlaw.com
    </div>
    <div class="invoice-date"><?php echo date_format(date_create($TableInfo['AccDate']), "m/d/Y");?></div>
    <div class="provider-address"><?php foreach($Provider_Info as $row){echo $row['Provider_Name']."<br>".$row['Provider_Local_Address']; }?></div>
    <div class="invoice-subject">Re: No Fault Collection </div>
    <div class="invoice-letter">
    
    <p>Dear Client,</p>
    
    <p>Pursuant to our agreement enclosed please find a Disbursement of Funds Report showing a detailed breakdown of settlements/awards regarding the no fault matters that had been sent to my office for representation. Please be advised that all repayments of filing fees disbursed by you or by The Beynenson Law Firm, P.C. on your behalf (if any) will be credited to your monthly billing statement.
    </p>
    <p>Please contact the undersigned with any questions you have concerning either the above or any other matter you are concerned with.</p>
    
    <p>Sincerely,</p>
    
    <p>The Beynenson Law Firm, P.C. </p>
    </div>
</div>
<?php }?>


<div class="content animate-panel client-invoices">
	
    <div class="row">
        <div class="col-lg-12">
        <div class="hpanel">
        <div class="panel-heading"></div>
        <div class="panel-body tab-panel">
        	<div class="form-group form-horizontal col-lg-12">
                <div class="col-md-5"></div>
                <div class="col-md-6 clientinvoice-providername"><h3><?php foreach($Provider_Info as $row){echo $row['Provider_Name']; }?></h3></div>
            </div>
            <div class="form-group form-horizontal col-lg-12">
                
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <h5 class="h4-title">COLLECTIONS FOR THE CURRENT INVOICE PERIOD</h5>
                    <table id="Collections" class="table dataTable table-bordered table-striped">
                        <thead>
                        <tr>  	
                        	<th>#</th> 	 	 
                            <th>Case ID</th>
                            <th>INJURED</th>
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
                <div class="col-md-2"></div>
            </div>
            <div class="form-group form-horizontal col-lg-12">
                
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <h5 class="h4-title">FEES AND COSTS EXPENDED BY FIRM FOR THE CURRENT INVOICE PERIOD</h5>
                    <table id="FessCostsExpended" class="table dataTable table-bordered table-striped">
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
                            <th>INDEX / AAA#</th>
                            <th>COST</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="form-group form-horizontal col-lg-12">
                
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <h5 class="h4-title">CREDITS TO THE PROVIDER FOR THE CURRENT INVOICE PERIOD</h5>
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
                <div class="col-md-2"></div>
            </div>
            <div class="form-group form-horizontal col-lg-12">
                
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <h5 class="h4-title">FEES AND COSTS RECEIVED BY FIRM FROM THE CARRIER FOR THE CURRENT INVOICE PERIOD</h5>
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
                <div class="col-md-2"></div>
            </div>
            <div class="form-group form-horizontal col-lg-12">
                
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <h5 class="h4-title">PROVIDER DETAILS</h5>
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
                <div class="col-md-2"></div>
            </div>
            <div class="form-group form-horizontal col-lg-12">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <table id="FinalClientInvoices" class="table dataTable table-bordered table-striped">
                        <thead>
                        <tr>  	
                        	<th>[A] - GROSS AMOUNT COLLECTED </th>
                            <td></td>
                        </tr>
                        <tr>  	
                        	<th>[B] - LEGAL FEES </th>
                            <td></td>
                        </tr>
                        <tr>  	
                        	<th>[C] - PREVIOUS COSTS </th>
                            <td></td>
                        </tr>
                        <tr>  	
                        	<th>[D] - COSTS EXPENDED </th>
                            <td></td>
                        </tr>
                        <tr>  	
                        	<th>[E] - CREDITS TO THE CLIENT</th>
                            <td></td>
                        </tr>
                        <tr>  	
                        	<th>[F] - RECEIVED FEES & COSTS FROM INSURER, CR TO CLIENT </th>
                            <td></td>
                        </tr>
                        <tr>  	
                        	<th>[G=A-B-C-D+E+F] - FINAL REMITTANCE TO CLIENT </th>
                            <td></td>
                        </tr>
                        <tr>  	
                        	<th>[H=B+C+D-E-F] - FINAL REMITTANCE TO FIRM </th>
                            <td></td>
                        </tr>
                        <tr>  	
                        	<th>NEW BALANCE DUE FROM CLIENT </th>
                            <td></td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="form-group form-horizontal col-lg-12">
            	<div class="col-md-6"></div>
                <div class="col-md-6"><button type="submit" id="searchbutton" class="btn btn-primary">Freeze</button></div>
            </div>
        </div><!-- End of panel-body tab-panel-->
        </div><!-- End hpanel -->
        </div><!-- End col-lg-12-->
    </div><!-- End row-->
                        
      
    
</div><!-- End contenet-->
                
   

<!--</div> -->



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
	$('#Collections').dataTable( {
		"ajax": {
			"url": "get_Collections",
			"data": {
				"Provider_Id": "<?php echo $TableInfo['Provider_Id'];?>",
				"Table_Id": "Collections",
				"Account_Id": "<?php echo $TableInfo['Account_Id'];?>"
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
	$('#FessCostsExpended').dataTable( {
		"ajax": {
			"url": "get_Collections",
			"data": {
				"Provider_Id": "<?php echo $TableInfo['Provider_Id'];?>",
				"Table_Id": "FessCostsExpended",
				"Account_Id": "<?php echo $TableInfo['Account_Id'];?>"
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
	$('#ProviderDetails').dataTable( {
		"ajax": {
			"url": "get_Provider_Details",
			"data": {
				"Provider_Id": "<?php echo $TableInfo['Provider_Id'];?>",
				"Table_Id": "ProviderDetails",
				"Account_Id": "<?php echo $TableInfo['Account_Id'];?>"
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
	$.ajax({
		type:'POST',
		url:"get_Final_Client_Invoices",
		"data": {
			"Provider_Id": "<?php echo $TableInfo['Provider_Id'];?>",
			"Table_Id": "FinalClientInvoices",
			"Account_Id": "<?php echo $TableInfo['Account_Id'];?>"
		},
		success:function(data){
			var i=1;
			results = JSON.parse(data);
			$.each(results[0], function(k, v) {
				//console.log(k + ' == ' + v);
				
				//$("#Insured_Info_table tr:nth-child("+i+") td:nth-child(2)").append(v);
				$("#FinalClientInvoices tr:nth-child("+i+") td:nth-child(2)").text(v);
				i++;
			});
		},
		error: function(result){ console.log("error"); }
	});
		
	
});

</script>
<script>
	$('.financials').addClass('active');
	$('.reports').addClass('active');
</script>
</body>
</html>