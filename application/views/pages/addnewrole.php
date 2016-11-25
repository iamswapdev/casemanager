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

<div class="content animate-panel">

    <div class="row">
		<div class="col-lg-12">
		<div class="hpanel">
		<div class="panel-heading">
			<div class="panel-tools">
			</div>
		</div>
		<div class="panel-body tab-panel">
			
			<h4 class="h4-title">Add New Role</h4>
			<form id="addRoleForm"  action="insert_Roles" method="post">
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
			
			<form id="deleteRoleForm1"  action="delete_Roles" method="post">
			<div class="form-group form-horizontal col-md-12">
				<div class="col-md-2"></div>
				<div class="col-md-4">
					<table id="example2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
						<th>Roll Name</th>
						<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($Roles as $row){?>
						<tr>
							<td><?php echo $row['RoleName']?></td>
							<td><input name="deleteRole[]" type="checkbox" class="i-checks" value="<?php echo $row['RoleId']; ?>"></td>
						</tr>
						<?php }?>
					</tbody>
					</table>
				</div>
			</div>
			<div class="form-group form-horizontal col-md-12">
				<div class="col-md-2"></div>
				<div class="col-md-2">
					<button type="button" class="btn w-xs btn-primary">Delete Checked</button><br><br>
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
<!-- App scripts -->
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>

<script>
	/* Add Plantiff information - Tab-1*/ /*---------- Tab-1 --------------------*/
	$("#cancel").click(function(){
		$("input[type=text]").val("");
	});
	$("#addRoleForm").validate({
		rules: {
			RoleName: {
				required: true,
				minlength: 3
			}		
		},
				
		submitHandler: function (form) {
			// setup some local variables
			var $form = $(form);
			// let's select and cache all the fields
			var $inputs = $form.find("input, select, button, textarea");
			// serialize the data in the form
			var serializedData = $form.serialize();

			// let's disable the inputs for the duration of the ajax request
			$inputs.prop("disabled", true);

			// fire off the request to /form.php

			request = $.ajax({
				url:"<?php echo base_url(); ?>adminprivilege/insert_Roles",
				type: "post",
				data: serializedData,
				success:function(data, textStatus, jqXHR) 
				{
					results = JSON.parse(data);
					var optionsAsString = "";
					for($i in results.Roles){
						//console.log(results.Provider_Name[$i].Adjuster_Id);
						optionsAsString +="<tr> <td>'"+results.Roles[$i].RoleName+"'</td> <td><input type='checkbox' class='i-checks' value='"+results.Roles[$i].RoleId+"' > </td></tr>"
						
					}
					$( 'tbody' ).append( optionsAsString );
				}
			});

			// callback handler that will be called on success
			request.done(function (response, textStatus, jqXHR) {
				// log a message to the console
				console.log("Hooray, it worked!");
					 $("#myModal").modal("show");
					
					
					$('input[type=text]').val('');
			});

			// callback handler that will be called regardless
			// if the request failed or succeeded
			request.always(function () {
				// reenable the inputs
				$inputs.prop("disabled", false);
			});

		}
	});
	
	$("#deleteRoleForm").validate({
		submitHandler: function (form) {
			// setup some local variables
			var $form = $(form);
			// let's select and cache all the fields
			var $inputs = $form.find("input, select, button, textarea");
			// serialize the data in the form
			var serializedData = $form.serialize();
			console.log("DDDD: "+serializedData);

			// let's disable the inputs for the duration of the ajax request
			$inputs.prop("disabled", true);

			// fire off the request to /form.php

			request = $.ajax({
				url:"<?php echo base_url(); ?>adminprivilege/delete_Roles",
				type: "post",
				data: serializedData,
				success:function(data, textStatus, jqXHR) 
				{
					/*results = JSON.parse(data);
					var optionsAsString = "";
					for($i in results.Roles){
						//console.log(results.Provider_Name[$i].Adjuster_Id);
						optionsAsString +="<tr> <td>'"+results.Roles[$i].RoleName+"'</td> <td><input type='checkbox' class='i-checks' value='"+results.Roles[$i].RoleId+"' > </td></tr>"
						
					}
					$( 'tbody' ).append( optionsAsString );*/
				}
			});

			// callback handler that will be called on success
			request.done(function (response, textStatus, jqXHR) {
				// log a message to the console
				console.log("Hooray, it worked!");
					 $("#myModal").modal("show");
					$('input[type=text]').val('');
			});

			// callback handler that will be called regardless
			// if the request failed or succeeded
			request.always(function () {
				// reenable the inputs
				$inputs.prop("disabled", false);
			});

		}
	});
	$("#addRoleForm1").submit(function(e)
	{
    	var postData = $(this).serializeArray();
		var postDataN = $(this).serialize();
		console.log("postDataN: "+postDataN);
		var formURL = $(this).attr("action");
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				
				results = JSON.parse(data);
				var optionsAsString = "";
				for($i in results.Roles){
					//console.log(results.Provider_Name[$i].Adjuster_Id);
					optionsAsString +="<tr> <td>'"+results.Roles[$i].RoleName+"'</td> <td><input type='checkbox' class='i-checks' value='"+results.Roles[$i].RoleId+"' > </td></tr>"
					
				}
				$( 'tbody' ).append( optionsAsString );
				
				$('input[type=text]').val('');
				console.log("Success...........");
				$("").attr();
			},
			error: function(jqXHR, textStatus, errorThrown){ alert(); }
		});
		e.preventDefault();	//STOP default action
	});
/* *************************************************** */
	/*$(function(){
         $("#addRoleForm").validate({
            rules: {
                RoleName: {
                    required: true,
                    minlength: 3
                }
            },
            submitHandler: function(form, e) {
                e.preventDefault();	//STOP default action
				//form.submit();
            }
        });
	});*/
</script>
<script>
	$('.adminprivilege').addClass('active');
</script>
</body>
</html>