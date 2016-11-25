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
<?php include 'header_search.php';?>
<div class="content animate-panel">

	<div class="row">
		<div class="col-lg-12">
		<div class="hpanel">
		<div class="panel-heading"></div>
		<div class="panel-body tab-panel">
			
			<h4>Search</h4>
			<form method="get" class="form-horizontal">

				<div class="form-group form-horizontal">
					<label class="col-sm-2 control-label">Case ID</label>
					<div class="col-sm-2">
						<input type="text" class="form-control input-sm">
					</div>
					<label class="col-sm-2 control-label">Injured Last Name</label>
					<div class="col-sm-2">
						<input type="text" class="form-control input-sm">
					</div>
					<label class="col-sm-2 control-label">Insured First Name</label>
					<div class="col-sm-2">
						<input type="text" class="form-control input-sm">
					</div>
				</div>

				<div class="form-group form-horizontal">
					<label class="col-sm-2 control-label">Injured First Name</label>
					<div class="col-sm-2">
						<input type="text" class="form-control input-sm">
					</div>
					<label class="col-sm-2 control-label">Insured Last Name</label>
					<div class="col-sm-2">
						<input type="text" class="form-control input-sm">
					</div>
					<label class="col-sm-2 control-label">Index/AAA Number</label>
					<div class="col-sm-2">
						<input type="text" class="form-control input-sm">
					</div>

				</div>

				<div class="form-group form-horizontal">
					<label class="col-sm-2 control-label">Policy Number</label>
					<div class="col-sm-2">
						<input type="text" class="form-control input-sm">
					</div>
					<label class="col-sm-2 control-label">Insurance Claim </label>
					<div class="col-sm-2">
						<input type="text" class="form-control input-sm">
					</div>
					<label class="col-sm-2 control-label">Exclude ID's</label>
					<div class="col-sm-2">
						<input type="text" class="form-control input-sm">
					</div>

				</div>

				<div class="form-group form-horizontal">
					<label class="col-sm-2 control-label">ID Range</label>
					<div class="col-sm-1">
						<input type="text" class="form-control input-sm">
					</div>  
					<div class="col-sm-1">  
						<input type="text" class="form-control input-sm">
					</div>
					<label class="col-sm-2 control-label">Status</label>
					<div class="col-sm-2">
						<select class="form-control m-b input-sm" name="account">
						<option>Yes</option>
						<option>No</option>
						</select>
					</div>

				</div>

				<div class="form-group form-horizontal col-md-12">
					<div class="col-sm-2"></div>
					<div class="col-sm-4">
						<button type="button" class="btn btn-primary">Search</button>
						<button class="btn btn-primary" type="submit">Reset</button>   
					</div>
				</div>


			</form>
			
			<h4>Search Results</h4>
			<div class="form-group form-horizontal col-md-12 table-responsive">
				<table id="example2" class="table table-striped table-bordered table-hover dataTable no-footer">
					<thead>
						<tr>
							<th>#</th> 	 	   	 	    	      	      	     	 	 	 	   	 	
							<th>EDIT</th>
							<th>CASE ID</th>
							<th>INJURED PARTY</th>
							<th>PROVIDER</th>
							<th>INSURANCE COMPANY</th>
							<th>DOA</th>
							<th>DOS-Start</th>
							<th>DOS-End</th>
							<th>STATUS</th>
							<th>CLAIM NUMBER</th>
							<th>CLAIM AMT.</th>
							<th>SELECT</th>
						</tr>
					</thead>
					<tbody>
                    <?php foreach($SearchResult as $row){?>
						<tr>
							<td><?php echo $row['Case_AutoId']?></td>
                            <td><?php echo "Edit"?></td>
							<td><?php echo $row['Case_Id']?></td>
                            <td><?php echo $row['InjuredParty_FirstName'].", ".$row['InjuredParty_LastName']?></td>
                            <td><?php echo $row['Provider_Id']?></td>
                            <td><?php echo "Insurance comp name" ?></td>
                            <td><?php echo $row['Accident_Date']?></td>
                            <td><?php echo "Dos"?></td>
                            <td><?php echo "Dos End"?></td>
                            <td><?php echo $row['Status']?></td>
                            <td><?php echo $row['Ins_Claim_Number']?></td>
                            <td><?php echo $row['Claim_Amount']?></td>
                            <td><?php echo "Select"?></td>
                            
						</tr>
                    <?php }?>
					</tbody>
				</table>
			</div>
			
			
			
		</div><!-- End of panel-body tab-panel-->
		</div><!-- End hpanel -->
		</div><!-- End col-lg-12-->
	</div><!-- End row-->
                
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

    $(function () {

        // Initialize Example 1
        $('#example1').dataTable( {
            "ajax": 'api/datatables.json'
        });

        // Initialize Example 2
        $('#example2').dataTable();
		$('#example3').dataTable();

    });

</script>
<script>
	$('.search').addClass('active');
</script>

</body>
</html>