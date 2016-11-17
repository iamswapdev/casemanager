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
    <title>Manage User</title>

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
<?php include 'header_workarea.php';?>
<div class="content animate-panel">

	<div class="row">
		<div class="col-lg-12">
			<div class="hpanel">
				<div class="panel-heading">
					<div class="panel-tools">
					</div>
				</div>
				
			<div class="panel-body">
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
							<select class="form-control input-sm" name="account">
								<option>Yes</option>
								<option>No</option>
							</select>
						</div>

					</div>

					<div class="form-group form-horizontal col-md-12">
						<div class="col-md-2"></div>
						<div class="col-md-1">
							<button type="button" class="btn w-xs btn-primary">Search</button>
						</div>
						<div class="col-md-2">
							<button class="btn btn-primary" type="submit">Reset</button>
						</div> 
						
                    </div>
					<div class="col-md-12">
						<div class="hr-line-dashed"></div>
					</div>
					
				</form>
				
				<h4>Search Results</h4>
				<div class="operation-buttons">
					<button type="button" class="btn w-xs btn-primary">Create User</button>
				</div>
				
				<table id="example2" class="display table table-bordered">
				<thead>
				<tr>
					<th>Name</th>
					<th>Position</th>
					<th>Office</th>
					<th>Age</th>
					<th>Start date</th>
					<th>Salary</th>
				</tr>
				</thead>
				<tbody>
					<tr>
						<td>Tiger Nixon</td>
						<td>System Architect</td>
						<td>Edinburgh</td>
						<td>61</td>
						<td>2011/04/25</td>
						<td>$320,800</td>
					</tr>
					<tr>
						<td>Garrett Winters</td>
						<td>Accountant</td>
						<td>Tokyo</td>
						<td>63</td>
						<td>2011/07/25</td>
						<td>$170,750</td>
					</tr>
					<tr>
						<td>Ashton Cox</td>
						<td>Junior Technical Author</td>
						<td>San Francisco</td>
						<td>66</td>
						<td>2009/01/12</td>
						<td>$86,000</td>
					</tr>
					<tr>
						<td>Cedric Kelly</td>
						<td>Senior Javascript Developer</td>
						<td>Edinburgh</td>
						<td>22</td>
						<td>2012/03/29</td>
						<td>$433,060</td>
					</tr>
					<tr>
						<td>Airi Satou</td>
						<td>Accountant</td>
						<td>Tokyo</td>
						<td>33</td>
						<td>2008/11/28</td>
						<td>$162,700</td>
					</tr>
					<tr>
						<td>Brielle Williamson</td>
						<td>Integration Specialist</td>
						<td>New York</td>
						<td>61</td>
						<td>2012/12/02</td>
						<td>$372,000</td>
					</tr>
					<tr>
						<td>Herrod Chandler</td>
						<td>Sales Assistant</td>
						<td>San Francisco</td>
						<td>59</td>
						<td>2012/08/06</td>
						<td>$137,500</td>
					</tr>
					<tr>
						<td>Rhona Davidson</td>
						<td>Integration Specialist</td>

						<td>Tokyo</td>
						<td>55</td>
						<td>2010/10/14</td>
						<td>$327,900</td>
					</tr>
					<tr>
						<td>Colleen Hurst</td>
						<td>Javascript Developer</td>
						<td>San Francisco</td>
						<td>39</td>
						<td>2009/09/15</td>
						<td>$205,500</td>
					</tr>
					<tr>
						<td>Sonya Frost</td>
						<td>Software Engineer</td>
						<td>Edinburgh</td>
						<td>23</td>
						<td>2008/12/13</td>
						<td>$103,600</td>
					</tr>
					<tr>
						<td>Jena Gaines</td>
						<td>Office Manager</td>
						<td>London</td>
						<td>30</td>
						<td>2008/12/19</td>
						<td>$90,560</td>
					</tr>
				</tbody>
				</table>
			
			</div><!--End panel body -->
			
			</div><!--End hpanel -->
		</div><!--End col-lg-12 -->
	</div><!--End row -->
	
    
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
<script src="<?php echo base_url();?>assets/vendor/addactive/addactive.js"></script>

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

</body>
</html>