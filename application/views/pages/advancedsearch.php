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
<div class="content animate-panel">

	<div class="row">
		<div class="col-lg-12">
		<div class="hpanel">
		<div class="panel-heading"></div>
		<div class="panel-body tab-panel">
			
			
			<form method="get" class="form-horizontal label-font">

				<div class="form-group form-horizontal col-md-12">
                <h5 class="h4-title">Search</h5>
					<label class="col-md-2 control-label">CASE ID</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm">
					</div>
                    <label class="col-md-2 control-label">INJURED NAME</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm">
					</div>
                    <label class="col-md-2 control-label">INSURED NAME</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm">
					</div>
				</div>

				<div class="form-group form-horizontal col-md-12">
					
					<label class="col-md-2 control-label">POLICY NUMBER</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm">
					</div>
					<label class="col-md-2 control-label">INS. CLAIM #</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm">
					</div>
					<label class="col-md-2 control-label">INDEX#/AAA#</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm">
					</div>

				</div>
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">STATUS</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="status" name="status">
                            <option selected="selected" value=""></option>
                            <?php foreach($Status as $row){?>
                            <option value="<?php echo $row['Status_Id']; ?>"> <?php echo $row['Status_Type']; ?> </option>
                            <?php }?>
                        </select>
					</div>
					<label class="col-md-2 control-label">INSURANCE COMP.</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="insuranceCompanyId" name="insuranceCompanyId">
                       	 	<option selected="selected" value=""></option>
                            <?php foreach($InsuranceCompany_Name as $row){?>
                            <option value="<?php echo $row['InsuranceCompany_Id']; ?>"><?php echo $row['InsuranceCompany_Name'];?></option>
                            <?php }?>
                        </select>
					</div>
					<label class="col-md-2 control-label">COURT TYPE</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="courtId" name="courtId" required >
                            <option selected="selected" value=""></option>
                            <?php foreach($Court as $row){?>
                            <option value="<?php echo $row['Court_Id']; ?>"> <?php echo $row['Court_Name']; ?> </option>
                            <?php }?>
                        </select>
					</div>
				</div>
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">CASE STATUS</label>
					<div class="col-md-2">
						<select class="form-control input-sm" name="account">
                            <option selected="selected" value=""></option>
                            <?php foreach($CaseStatus as $row){?>
                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
                            <?php }?>
						</select>
					</div>
					<label class="col-md-2 control-label">PROVIDER</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="providerId" name="providerId">
                            <option selected="selected" value=""></option>
                            <?php foreach($Provider_Name as $row){?>
                            <option value="<?php echo $row['Provider_Id']; ?>"> <?php echo $row['Provider_Name']; ?> </option>
                            <?php }?>
                        </select>
					</div>
					<label class="col-md-2 control-label">DEFENDANT NAME</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="defendantId" name="defendantId" required>
                            <option selected="selected" value=""></option>
                            <?php foreach($Defendant_Name as $row){?>
                            <option value="<?php echo $row['Defendant_id']; ?>"><?php echo $row['Defendant_Name'];?></option>
                            <?php }?>
                        </select>
					</div>
				</div>
                <div class="form-group form-horizontal col-md-12">
                	<label class="col-md-2 control-label">ADJUSTER NAME</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="adjusterId" name="adjusterId" required>
                            <option selected="selected" value=""></option>
                            <?php foreach($Adjuster_Name as $row){?>
                            <option value="<?php echo $row['Adjuster_Id']; ?>"><?php echo $row['Adjuster_LastName'].", ".$row['Adjuster_FirstName'];?></option>
                            <?php }?>
                        </select>
					</div>
                </div>
                <div class="form-group form-horizontal col-md-12">
					<div class="col-md-2"></div>
					<div class="col-md-4">
						<button type="button" class="btn btn-primary">Search</button>
						<button class="btn btn-primary" type="submit">Reset</button>   
					</div>
				</div>
			</form>
			
			<h5 class="h4-title">Search Results</h5>
			<div class="form-group form-horizontal col-md-12 table-responsive">
				<table id="example1" class="table dataTable table-bordered table-striped advanced-search">
					<thead>
						<tr>
							<th>#</th> 	 	   	 	    	      	      	     	 	 	 	   	 	
							<th>EDIT</th>
							<th>&nbsp;CASE ID</th>
							<th>INJURED PARTY</th>
							<th>PROVIDER</th>
							<th>INSURANCE COMPANY</th>
							<th>&nbsp;&nbsp;&nbsp;&nbsp;DOA&nbsp;&nbsp;&nbsp;&nbsp;</th>
							<th>DATE OF SERVICE START</th>
                            <th>DATE OF SERVICE END</th>
							<th>STATUS</th>
							<th>CLAIM NUMBER</th>
							<th>CLAIM AMT.</th>
                            <th>Indexor aaa_number</th>
                            <th>INITIAL STATUS</th>
						</tr>
					</thead>
				</table>
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

<!-- App scripts -->
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
<script>
	//$("tr:nth-child(7)").addClass("DOA-width");

    $(function () {

        // Initialize Example 1
        $('#example1').dataTable( {
            "ajax": 'getAdj',
			"pageLength": 100
        });
    });

</script>
<script>
	$('.search').addClass('active');
</script>
</body>
</html>