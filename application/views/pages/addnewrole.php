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
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/sweetalert/lib/sweet-alert.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/toastr/build/toastr.min.css" />

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
<?php include 'header_adminprivilege.php';?>

<div class="content">

    <div class="row">
		<div class="col-lg-12">
		<div class="hpanel">
		<div class="panel-heading">
			<div class="panel-tools">
			</div>
		</div>
		<div class="panel-body tab-panel">
			
			<h4 class="h4-title">Add New Role</h4>
			<form id="addRoleForm" method="post">
				<div class="form-group form-horizontal col-md-12">
					<label class="col-sm-2 control-label">Role Name</label>
					<div class="col-sm-4">
						<input type="text" name="RoleName" id="RoleName" class="form-control input-sm" required>
					</div>
				</div>
				<div class="form-group form-horizontal col-md-12">
					<div class="col-md-2"></div>
					<div class="col-md-1">
						<button class="btn btn-primary " type="submit" ><i class="fa fa-check"></i> Add</button>
					</div>
					<div class="col-md-1">
						<button type="button" id="cancel" class="btn btn-primary" >Cancel</button>
					</div> 
				</div>
			</form>
			
			<form id="deleteRoleForm"  action="delete_Roles" method="post">
			<div class="form-group form-horizontal col-md-12">
				<div class="col-md-2"></div>
				<div class="col-md-4">
                	<table id="RoleTable" class="table dataTable table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Roll Name</th>
							<th>Delete</th>
                        </tr>
                        </thead>
                    </table>
                
				</div>
			</div>
			<div class="form-group form-horizontal col-md-12">
				<div class="col-md-2"></div>
				<div class="col-md-2">
					<button type="submit" id="DeleteButton" class="btn w-xs btn-primary">Delete Checked</button><br><br>
				</div>
			</div>
			</form>
			
			
			
		</div><!-- End of panel-body tab-panel-->
		</div><!-- End hpanel -->
		</div><!-- End col-lg-12-->
	</div><!-- End row-->   
	
	<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <h4>Data submited successfully..</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
      
    
    
    
	
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
    <script src="<?php echo base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    
	<script src="<?php echo base_url();?>assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/toastr/build/toastr.min.js"></script>
    <!-- App scripts --> 
    <script src="<?php echo base_url();?>assets/scripts/homer.js"></script>

<script>
	$('#RoleTable').dataTable( {
		"ajax": {
			"url": "get_Role_Table",
			"type": "post"
		},
		"bPaginate": false,
		"bLengthChange": false,
		"bFilter": false,
		"bInfo": false,
		"bAutoWidth": false,
		"bSort": false
	});
	
	var value= 0;
	$("#addRoleForm1").validate({
		rules: {
			RoleName: {
				required: true,
				minlength: 3
			}		
		},
				
		submitHandler: function (form) {
			form.submit();
		}
	});
	
	
	$("#addRoleForm").validate({
		rules: {
			RoleName: {
				required: true,
				minlength: 3
			}		
		},
				
		submitHandler: function (form) {
			var $form = $(form);
			var $inputs = $form.find("input, select, button, textarea");
			var serializedData = $form.serialize();

			request = $.ajax({
				url:"insert_Roles",
				type: "post",
				data: serializedData,
				success:function(data, textStatus, jqXHR) 
				{
					$('#RoleTable').dataTable().fnDestroy();
					$('#RoleTable').dataTable( {
						"ajax": {
							"url": "get_Role_Table",
							"type": "post"
						},
						"bPaginate": false,
						"bLengthChange": false,
						"bFilter": false,
						"bInfo": false,
						"bAutoWidth": false,
						"bSort": false
					});
				}
			});

			request.done(function (response, textStatus, jqXHR) {
				$('input[type=text]').val('');
				callSuccess();
			});

			request.always(function () {
				$inputs.prop("disabled", false);
			});

		}
	});
	
	$("#deleteRoleForm").validate({
		submitHandler: function (form) {
			var $form = $(form);
			var $inputs = $form.find("input, select, button, textarea");
			var serializedData = $form.serialize();
			//console.log("DDDD: "+serializedData);
			$inputs.prop("disabled", true);

			request = $.ajax({
				url:"<?php echo base_url(); ?>adminprivilege/delete_Roles",
				type: "post",
				data: serializedData
			});

			request.done(function (response, textStatus, jqXHR) {
				$('#RoleTable').dataTable().fnDestroy();
				$('#RoleTable').dataTable( {
					"ajax": {
						"url": "get_Role_Table",
						"type": "post"
					},
					"bPaginate": false,
					"bLengthChange": false,
					"bFilter": false,
					"bInfo": false,
					"bAutoWidth": false,
					"bSort": false
				});
				callDelete();
			});

			request.always(function () {
				$inputs.prop("disabled", false);
			});

		}
	});
	function callSuccess() {
		swal({
			title: "Successfully Added",
			type: "success"
		});
	}
	function callDelete() {
		swal({
			title: "Successfully Deleted",
			type: "success"
		});
	}
	
	$("#cancel").click(function(){
		$("input[type=text]").val("");
	});
	
</script>
<script>
	$('.adminprivilege').addClass('active');
	 $('.addNewRole').addClass('active');
</script>
</body>
</html>