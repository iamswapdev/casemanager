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
<!--<div class="splash">
  <div class="color-line"></div>
  <div class="splash-title">
    <h1></h1>
    <p> </p>
    <img src="images/loading-bars.svg" width="64" height="64" /> </div>
</div>-->
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]--> 

<!-- Header -->
<?php include 'header.php';?>

<!-- Navigation -->
<?php include 'sidebar.php';?>
<!-- Main Wrapper -->
<div id="wrapper">
  <?php include 'header_dataentry.php';?>
  <div class="content animate-panel">
    <div class="row">
      <div class="col-lg-12">
        <div class="hpanel">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-1">Add Plaintiff Attorney</a></li>
            <li class=""><a data-toggle="tab" href="#tab-2">Edit Plaintiff Attorney</a></li>
          </ul>
          <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
              <div class="panel-body">
                <div class="row">
                <div class="col-lg-12">
                <div class="hpanel">
                <div class="panel-body tab-panel">
                <form id="addPlantiffInfo" method="get" class="form-horizontal">
                  <h4>Plaintiff Attorney </h4>
                  <span>Information</span>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control input-sm">
                    </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-12">
                  <div class="hpanel">
                  <div class="panel-body tab-panel">
                  <h4>Defendant Contact Details </h4>
                  <span>Address</span>
                  <div class="form-group form-horizontal col-sm-12 ">
                    <label class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-8">
                      <textarea rows="5" id="" class="form-control" name=""></textarea>
                    </div>
                  </div>
                  <div class="form-group form-horizontal col-sm-12">
                    <label class="col-sm-2 control-label">Zip</label>
                    <div class="col-sm-2">
                      <input type="text" placeholder="Ex.11111" class="form-control m-b">
                      <!--<input type="text" placeholder=".input-sm" class="form-control input-sm">--> 
                    </div>
                    <label class="col-sm-1 control-label">City</label>
                    <div class="col-sm-2">
                      <select class="form-control m-b" name="account">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                      </select>
                    </div>
                    <label class="col-sm-1 control-label">State</label>
                    <div class="col-sm-2">
                      <select class="form-control m-b" name="account">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group form-horizontal col-sm-12">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-2">
                      <input type="text" placeholder="Ex.abc@pqr.com" class="form-control m-b">
                    </div>
                    <label class="col-sm-1 control-label">Phone</label>
                    <div class="col-sm-2">
                      <input type="text" placeholder="Ex.000000" class="form-control m-b">
                    </div>
                    <label class="col-sm-1 control-label">Fax</label>
                    <div class="col-sm-2">
                      <input type="text" placeholder="Ex.11111" class="form-control m-b">
                    </div>
                  </div>
                  <div class="form-group form-horizontal">
                    <button type="button" class="btn w-xs btn-info create">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="tab-2" class="tab-pane">
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="hpanel">
              <div class="panel-body tab-panel">
                <form method="get" class="form-horizontal">
                  <h4>Select Plaintiff Attorney To </h4>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <select class="form-control m-b" name="account">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--tab content close--> 
</div>
</div>
</div>
	<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog model-popup">
	<div class="modal-content">
		<div class="modal-header model-design">
			<button type="button" class="close close-tab" data-dismiss="modal"> &times;</button>
			<h4> Data Submitted successfully...... </h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-lg-12">
				<div class="hpanel">
				<div class="panel-heading"></div>
				<div class="panel-body tab-panel">
					
				</div><!-- End of panel-body tab-panel-->
				</div><!-- End hpanel -->
				</div><!-- End col-lg-12-->
			</div><!-- End row-->
		</div><!-- End of modal-body-->
	</div><!--End of modal-content -->
	</div><!--End of modal-dialog model-popup -->
	</div><!--End of modal fade-->
</div>
</div>

<!-- Right sidebar -->
<div id="right-sidebar" class="animated fadeInRight"> </div>

<!-- Footer-->
<footer class="footer"> <span class="pull-right"> Example text </span> Company 2015-2020 </footer>
</div>

<!-- Vendor scripts --> 
<script src="<?php echo base_url();?>assets/vendor/jquery/dist/jquery.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/jquery-ui/jquery-ui.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/slimScroll/jquery.slimscroll.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/metisMenu/dist/metisMenu.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/iCheck/icheck.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script> 
<script src="<?php echo base_url();?>assets/vendor/addactive/addactive.js"></script>
<!-- App scripts --> 
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
<script>
	$("#addPlantiffInfo").submit(function(e)
	{
    	var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				$('#insuranceId').val('');
				$('#lastName').val('');
				$('#firstName').val('');
				$('#phone').val('');
				$('#ext').val('');
				$('#email').val('');
				$('#fax').val('');

			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				alert();
				
			}
		});
		e.preventDefault();	//STOP default action
	});
	$("#ajaxform").submit(); //SUBMIT FORM
</script>
</body>
</html>