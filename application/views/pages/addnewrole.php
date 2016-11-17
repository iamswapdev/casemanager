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
<?php include 'header_adminprivilege.php';?>

<div class="content animate-panel">

    <div class="row">
		<div class="col-lg-12">
		<div class="hpanel">
		<div class="panel-heading">
			<div class="panel-tools">
			</div>
		</div>
		<div class="panel-body tab-panel">
			
			<h4>Add New Role</h4>
			<form id="addRoleForm" role="form" action="insert_Roles" method="post">
				<div class="form-group form-horizontal col-md-12">
					<label class="col-sm-2 control-label">Role Name</label>
					<div class="col-sm-4">
						<input type="text" name="RoleName" id="RoleName" class="form-control input-sm" required>
					</div>
				</div>
				<div class="form-group form-horizontal col-md-12">
					<div class="col-md-2"></div>
					<div class="col-md-1">
						<button type="submit" class="btn w-xs btn-primary">Add</button>
					</div>
					<div class="col-md-2">
						<button class="btn btn-primary" >Cancel</button>
					</div> 
				</div>
			</form>
			
			<div class="form-group form-horizontal col-md-12">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<table id="example2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
						<th>Roll Name</th>
						<th>Delete</th>
						</tr>
					</thead>
					<tbody>
                    <?php foreach($RoleName as $row){?>
						<tr>
							<td><?php echo $row['RoleName']?></td>
							<td><input type="checkbox" class="i-checks"></td>
						</tr>
                    <?php }?>
					</tbody>
					</table>
				</div>
				
			</div>
			<div class="form-group form-horizontal col-md-12">
				<div class="col-md-2"></div>
				<div class="col-md-2">
					<button type="button" class="btn w-xs btn-primary">Delete Checked</button>
				</div>
			</div>
			
			
			
		</div><!-- End of panel-body tab-panel-->
		</div><!-- End hpanel -->
		</div><!-- End col-lg-12-->
	</div><!-- End row-->   
      
    
    
    
	
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
<script src="<?php echo base_url();?>assets/vendor/addactive/addactive.js"></script>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<!-- App scripts -->
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>

<script>

	$(function(){
	
		
         $("#addRoleForm").validate({
            rules: {
                RoleName: {
                    required: true,
                    minlength: 3
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
	
	
	});
</script>

</body>
</html>