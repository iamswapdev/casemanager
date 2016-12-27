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
    
    <!-- ALERT CSS -->
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
<!-- Main Wrapper -->
<div id="wrapper">
<?php include 'header_adminprivilege.php';?>
 
<div class="content animate-panel">

	<div class="row">
		<div class="col-lg-12">
		<div class="hpanel">
		<div class="panel-heading"></div>
		<div class="panel-body tab-panel">
        	<div class="form-group form-horizontal col-md-12">
            	<h4 class="h4-title"> Manage Users</h4>
                <div class="operation-buttons">
                    <button type="button" class="btn btn-primary" title="Create User" data-toggle="modal" data-target="#CreateUser_modal"><i class="fa fa-group"></i> Create User</button>
                    <button type="button" id="deleteUsersButton" class="btn btn-primary delete" title="Delete User"><i class="fa fa-trash-o"></i>  Delete User</button>
                </div>
                <table id="example1" class="table dataTable table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Desk Info</th>
                        <th>User Name</th>
                        <th>Display Name</th>
                        <th>Role</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                </table>
            </div>
			
			
		</div><!-- End of panel-body tab-panel-->
		</div><!-- End hpanel -->
		</div><!-- End col-lg-12-->
	</div><!-- End row-->
	
    <!--<div class="modal fade hmodal-warning" id="CreateUser_modal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="color-line"></div>
                <form method="post" action="" id="CreateUser_form">
                	
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"> Close </button>
                </div>
            </div>
        </div>
    </div>-->
    <div id="CreateUser_modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title">Create User</h5>
          </div>
          <div class="modal-body">
          	<div class="row">
                <div class="col-lg-12">
                <div class="hpanel">
                <div class="panel-heading"></div>
                <div class="panel-body tab-panel">
                	<form method="post" id="CreateUser_form">
                        <div class="form-group form-horizontal col-md-12">
                            <label class="control-label col-md-3">User Name</label>
                            <div class="col-md-5">
                                <input type="text" name="UserName"  class="form-control input-sm" required />
                            </div>
                        </div>
                        <div class="form-group form-horizontal col-md-12">
                            <label class="control-label col-md-3">Role</label>
                            <div class="col-md-5">
                                <select name="RoleId" id="RoleId" class="form-control input-sm col-md-3" required>
                                	<?php foreach($Roles as $row){?>
                                    	<option value="<?php echo $row['RoleId'];?>"><?php echo $row['RoleName']?></option>
									<?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-horizontal col-md-12">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-5">
                                <input type="email" name="Email"  class="form-control input-sm" required />
                            </div>
                        </div>
                        <div class="form-group form-horizontal col-md-12">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-5">
                                <input type="password"  name="UserPassword1"  class="form-control input-sm" required />
                            </div>
                        </div>
                        <div class="form-group form-horizontal col-md-12">
                            <label class="control-label col-md-3">Confirm Password</label>
                            <div class="col-md-5">
                                <input type="password" name="UserPassword"  class="form-control input-sm" required />
                            </div>
                        </div>
                        <div class="form-group form-horizontal col-md-12">
                        	<div class="col-md-3"></div>
                        	<div class="col-md-5">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div><!-- End of panel-body tab-panel-->
                </div><!-- End hpanel -->
                </div><!-- End col-lg-12-->
            </div><!-- End row-->
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    
      </div>
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
<script src="<?php echo base_url();?>assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
	
    <script src="<?php echo base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- ALERT SCRIPTS -->
    <script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/toastr/build/toastr.min.js"></script>

<!-- App scripts -->
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>


<script>

    $(function () {
        // Initialize Example 1
        $('#example1').dataTable( {
            "ajax": 'getAdj',
			"iDisplayLength": 20,
			"aLengthMenu": [5, 10, 20, 25, 50, "All"]
        });
    });
/******** DELETE USERS ********/
	$('body').on( 'click', '#deleteUsersButton', function () {
		var checkedNo = [];
		$('.deleteCheckedUsers:checked').each(function(i){
			var values = $(this).val();
			checkedNo.push(values);
		});
		
		if(checkedNo.length !=0){
			swal({
				title: "Are you sure?",
				text: "You will not be able to recover these records",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel it!",
				closeOnConfirm: false,
				closeOnCancel: false },
			function (isConfirm) {
				if (isConfirm) {
					request = $.ajax({
						url:"<?php echo base_url();?>adminprivilege/deleteUsers",
						type: "post",
						data: {
								deleteCheckedUsers:checkedNo
							}
					});
			
					request.done(function (response, textStatus, jqXHR) {
						
						$('.deleteCheckedUsers:checked').each(function(i){
							var values = $(this).val();
							var row = $(".deleteCheckedUsers"+values).parent().parent();
							$(row).remove();
						});
						$("#example1").dataTable().fnDestroy();
						$('#example1').dataTable( {
							"ajax": 'getAdj',
							"iDisplayLength": 20,
							"aLengthMenu": [5, 10, 20, 25, 50, "All"]
						});
					});
					swal("Deleted!", "Your records has been deleted.", "success");
				} else {
					swal("Cancelled", "Your records are safe :)", "error");
				}
			});
		}
	});
	
/* Add USERS */
	$("#CreateUser_form").validate({
	
		rules: {
			UserName:{
				required: true
			},
			RoleId: {
				required: true
			},
			Email: {
				required: true,
				email: true
			},
			Password:{
				required: true
			},
			ConfirmPassword:{
				required: true
			}		
		},
				
		submitHandler: function (form) {
			var $form = $(form);
			// let's select and cache all the fields
			var $inputs = $form.find("input, select, button, textarea");
			// serialize the data in the form
			var serializedData = $form.serialize();
			request = $.ajax({
				url:"<?php echo base_url(); ?>adminprivilege/add_Users_Form",
				type: "post",
				data: serializedData
			});

			// callback handler that will be called on success
			console.log('P1: '+$("input[name=UserPassword1]").val());
			console.log("P2: "+$("input[name=UserPassword]").val());
			
			if($("input[name=UserPassword1]").val() == $("input[name=UserPassword]").val()){
				request.done(function (response, textStatus, jqXHR) {
					$('input').val('');
					$('textarea').val('');
					$("select").val('');
					$("#CreateUser_modal").modal("hide");
					$("#example1").dataTable().fnDestroy();
					$('#example1').dataTable( {
						"ajax": 'getAdj',
						"iDisplayLength": 20,
						"aLengthMenu": [5, 10, 20, 25, 50, "All"]
					});
					callSuccess();
				});
	
				request.fail(function (jqXHR, textStatus, errorThrown) {
					console.error(
						"The following error occured: " + textStatus, errorThrown);
				});
	
				request.always(function () {
					// reenable the inputs
					$inputs.prop("disabled", false);
				});
			}else{
				alert("Please Confirm the password");
				$("input[name=UserPassword]").val("");
			}
		}
	});
	function callSuccess() {
		swal({
			title: "Successfully submitted",
			type: "success"
		});
	}

</script>
<script>
	$('.adminprivilege').addClass('active');
	$('.manageUsers').addClass('active');
</script>
</body>
</html>