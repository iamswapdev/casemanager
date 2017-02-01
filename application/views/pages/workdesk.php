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
<div class="content">
	<div class="row">
	<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-heading">	
			   <h4>Workdesk Results</h4>
			</div>	 	 	 	 	 	 	 	 	 	 	 	
		<div class="panel-body">
			<table id="example2" class="table table-striped table-bordered table-hover">
				<thead>
				<tr>
					<th>Del</th>
                    <th>Case ID</th>
                    <th>Provider</th>
                    <th>Ins. Co.</th>
                    <th>Injured Party</th>
                    <th>D.O.Acc.</th>
                    <th>D.O.S.(S)</th>
                    <th>D.O.S.(E)</th>
                    <th>Status</th>
                    <th>Policy #</th>
                    <th>Reason for Case assigned</th>
                    <th>Assigned By</th>
                    <th>Assigned on</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>Abraham</td>
					<td>076 9477 4896</td>
					<td>076 9477 4896</td>
					<td>076 9477 4896</td>
                    <td>Abraham</td>
					<td>076 9477 4896</td>
					<td>076 9477 4896</td>
					<td>076 9477 4896</td>
                    <td>Abraham</td>
					<td>076 9477 4896</td>
					<td>076 9477 4896</td>
					<td>076 9477 4896</td>
                    <td>076 9477 4896</td>
				</tr>
				</tr>
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
<script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>

<!-- App scripts -->
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
<script>
$(function(){
$('#datapicker1').datepicker();
$('#datapicker2').datepicker();
  $('.input-group.date').datepicker({ });
  $('.input-daterange').datepicker({ });
});
</script>
<script>
	$('.workdesk').addClass('active');
</script>
<script>

    $(function(){

        $("#form").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 3
                },
                url: {
                    required: true,
                    url: true
                },
                number: {
                    required: true,
                    number: true
                },
                max: {
                    required: true,
                    maxlength: 4
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