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
      <div class="col-lg-12 animated-panel zoomIn">
       <div class="hpanel">
        <div class="tabs-left">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-1">Denial Types Add/Edit</a></li>
            <li class=""><a data-toggle="tab" href="#tab-2">Court Types Add/Edit</a></li>
            <li class=""><a data-toggle="tab" href="#tab-3">Image Types Add/Edit</a></li>
            <li class=""><a data-toggle="tab" href="#tab-4">Status Types Add/Edit</a></li>
            <li class=""><a data-toggle="tab" href="#tab-5">Case Status Types Add/Edit</a></li>
            <li class=""><a data-toggle="tab" href="#tab-6">Doc Types Add/Edit</a></li>
            <li class=""><a data-toggle="tab" href="#tab-7">Service Types Add/Edit</a></li>
            <li class=""><a data-toggle="tab" href="#tab-8">Event Types Add/Edit</a></li>
            <li class=""><a data-toggle="tab" href="#tab-9">Event Status Add/Edit</a></li>
          </ul>
          <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
              <div class="panel-body"> 
				<h5>Denial Types Add/Edit</h5>
				<div class="form-group form-horizontal col-md-12">
					<div class="col-md-8">
                        <table id="example1" class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th></th>
                              <th>Denial Reason Type</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($DenialReasons as $row){ ?>
                            <tr>
                                
                              <td><button onClick="edit(this)"> Edit </button></td>
                              <td><input type="text" placeholder="" class="form-control input-sm" value="ABCCA"> <?php echo $row['DenialReasons_Type']; ?></td>
                              <td><input type="checkbox" class="i-checks"></td>
                            </tr>
                            <?php } ?>
                            <tr>
                              <td></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><a href="#">Add</a></td>
                            </tr>
                          </tbody>
                        </table>
					</div>
				</div>
				
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-2">
                      <button type="button" class="btn w-xs btn-info create">Deleted checked</button><br><br>
                    </div>
                </div>
                
              </div>
            </div>
            <div id="tab-2" class="tab-pane">
              <div class="panel-body">
                <h5>Court Types Add/Edit</h5>
              
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-12">
                        <table id="example2" class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th class="col-sm-1"></th>
                              <th class="col-sm-1">Court Name</th>
                              <th class="col-sm-1">Court Venue</th>
                              <th class="col-sm-1">Court Address</th>
                              <th class="col-sm-1">Court Basis</th>
                              <th class="col-sm-1">Court Misc</th>
                              <th class="col-sm-1">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($Court as $row){ ?>
                            <tr>
                              <td><a href="#">Edit</a></td>
                              <td><input type="text" placeholder="" class="form-control input-sm" value="<?php echo $row['Court_Name']; ?>"></td>
                              <td><input type="text" placeholder="" class="form-control input-sm" value="<?php echo $row['Court_Venue']; ?>"></td>
                              <td><input type="text" placeholder="" class="form-control input-sm" value="<?php echo $row['Court_Address']; ?>"></td>
                              <td><input type="text" placeholder="" class="form-control input-sm" value="<?php echo $row['Court_Basis']; ?>"></td>
                              <td><input type="text" placeholder="" class="form-control input-sm" value="<?php echo $row['Court_Misc']; ?>"></td>
                              <td><input type="checkbox" class="i-checks"></td>
                            </tr>
                            <?php } ?>
                            <tr>
                              <td></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><a href="#">Add</a></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-2">
                      <button type="button" class="btn w-xs btn-info create">Deleted checked</button><br><br>
                    </div>
                </div>
                
              </div>
            </div>
            <div id="tab-3" class="tab-pane">
              <div class="panel-body"> 
                <h5>Image Types Add/Edit</h5>
                
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-12">
                        <table id="example3" class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th class="col-sm-1"></th>
                              <th class="col-sm-2">Image Type</th>
                              <th class="col-sm-1">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($ImageType as $row){ ?>
                            <tr>
                              <td><a href="#">Edit</a></td>
                              <td><input type="text" placeholder="" class="form-control input-sm" value="<?php echo $row['Image_Type']; ?>"></td>
                              <td><input type="checkbox" class="i-checks"></td>
                            </tr>
                            <?php } ?>
                            <tr>
                              <td></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><a href="#">Add</a></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-2">
                      <button type="button" class="btn w-xs btn-info create">Deleted checked</button><br><br>
                    </div>
                </div>
                
              </div>
            </div>
            <div id="tab-4" class="tab-pane">
              <div class="panel-body">
                <h5>Status Types Add/Edit</h5>
              	
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-12">
                        <table id="example4" class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th class="col-sm-1"></th>
                              <th class="col-sm-2">Status Type</th>
                              <th class="col-sm-2">Status Abr</th>
                              <th class="col-sm-1">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($Status as $row){ ?>
                            <tr>
                              <td><a href="#">Edit</a></td>
                              <td><input type="text" placeholder="" class="form-control input-sm" value="<?php echo $row['Status_Type']; ?>"></td>
                              <td><input type="text" placeholder="" class="form-control input-sm" value="<?php echo $row['Status_Abr']; ?>"></td>
                              <td><input type="checkbox" class="i-checks"></td>
                            </tr>
                            <?php } ?>
                            <tr>
                              <td></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><a href="#">Add</a></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-2">
                      <button type="button" class="btn w-xs btn-info create">Deleted checked</button><br><br>
                    </div>
                </div>
              </div>
            </div>
            <div id="tab-5" class="tab-pane">
              <div class="panel-body"> 
                <h5>Case Status Types Add/Edit</h5>
              	
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-12">
                        <table id="example5" class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th class="col-sm-1"></th>
                              <th class="col-sm-2">Case Status</th>
                              <th class="col-sm-2">Description</th>
                              <th class="col-sm-1">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($CaseStatus as $row){ ?>
                            <tr>
                              <td><a href="#">Edit</a></td>
                              <td><input type="text" placeholder="" class="form-control input-sm" value="<?php echo $row['name']; ?>"></td>
                              <td><input type="text" placeholder="" class="form-control input-sm" value="<?php echo $row['description']; ?>"></td>
                              <td><input type="checkbox" class="i-checks"></td>
                            </tr>
                            <?php } ?>
                            <tr>
                              <td></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><a href="#">Add</a></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-2">
                      <button type="button" class="btn w-xs btn-info create">Deleted checked</button><br><br>
                    </div>
                </div>
              </div>
            </div>
              
               <div id="tab-6" class="tab-pane">
              <div class="panel-body">
                <h5>Document Types Add/Edit</h5>
               
                
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-12">
                        <table id="example6" class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th class="col-sm-1"></th>
                              <th class="col-sm-2">Document Name</th>
                              <th class="col-sm-2">Document Value</th>
                              <th class="col-sm-1">Settlement</th>
                              <th class="col-sm-1">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($Doc as $row){ ?>
                            <tr>
                              <td><a href="#">Edit</a></td>
                              <td><input type="text" placeholder="" class="form-control input-sm" value="<?php echo $row['Doc_Name']; ?>"></td>
                              <td><input type="text" placeholder="" class="form-control input-sm" value="<?php echo $row['Doc_Value']; ?>"></td>
                              <td><input type="checkbox" class="i-checks"></td>
                              <td><input type="checkbox" class="i-checks"></td>
                            </tr>
                            <?php } ?>
                            <tr>
                              <td></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><input type="checkbox" class="i-checks"></td>
                              <td><a href="#">Add</a></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-2">
                      <button type="button" class="btn w-xs btn-info create">Deleted checked</button><br><br>
                    </div>
                </div>
                
              </div>
            </div>
            <div id="tab-7" class="tab-pane">
              <div class="panel-body"> <span>
                <h5>Service Types Add/Edit</h5>
                </span>
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-12">
                        <table id="example7" class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th class="col-sm-1"></th>
                              <th class="col-sm-2">Service Type</th>
                              <th class="col-sm-2">Service Desc</th>
                              <th class="col-sm-1">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($Service as $row){ ?>
                            <tr>
                              <td><a href="#">Edit</a></td>
                              <td><input type="text" placeholder="" class="form-control input-sm" value="<?php echo $row['ServiceType']; ?>"></td>
                              <td><input type="text" placeholder="" class="form-control input-sm" value="<?php echo $row['ServiceDesc']; ?>"></td>
                              <td><input type="checkbox" class="i-checks"></td>
                            </tr>
                            <?php } ?>
                            <tr>
                              <td></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><a href="#">Add</a></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-2">
                      <button type="button" class="btn w-xs btn-info create">Deleted checked</button><br><br>
                    </div>
                </div>
              </div>
            </div>
            
            <div id="tab-8" class="tab-pane">
              <div class="panel-body">
                <h5>Event Type Add/Edit</h5>
                
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-12">
                        <table id="example8" class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th class="col-sm-1"></th>
                              <th class="col-sm-6">Event Type</th>
                              <th class="col-sm-1">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($EventType as $row){ ?>
                            <tr>
                              <td><a href="#">Edit</a></td>
                              <td><input type="text" class="form-control input-sm" value="<?php echo $row['EventTypeName']; ?>"></td>
                              <td><input type="checkbox" class="i-checks"></td>
                            </tr>
                            <?php } ?>
                            <tr>
                              <td></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><a href="#">Add</a></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-2">
                      <button type="button" class="btn w-xs btn-info create">Deleted checked</button><br><br>
                    </div>
                </div>
              </div>
            </div>
            
             <div id="tab-9" class="tab-pane">
              <div class="panel-body"> 
                <h5>Event Status Add/Edit</h5>
               
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-12">
                        <table id="example9" class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th class="col-sm-1"></th>
                              <th class="col-sm-6">Event Status</th>
                              <th class="col-sm-1">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($EventStatus as $row){ ?>
                            <tr>
                              <td><a href="#">Edit</a></td>
                              <td><input type="text" placeholder="" class="form-control input-sm" value="<?php echo $row['EventStatusName']; ?>"></td>
                              <td><input type="checkbox" class="i-checks"></td>
                            </tr>
                            <?php } ?>
                            
                            <tr>
                              <td></td>
                              <td><input type="text" placeholder="" class="form-control input-sm"></td>
                              <td><a href="#">Add</a></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="form-group form-horizontal col-md-12">
                	<div class="col-md-2">
                      <button type="button" class="btn w-xs btn-info create">Deleted checked</button><br><br>
                    </div>
                </div>
                
                
              </div>
            </div>
            
            </div>
        </div>
       </div>
      </div>
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
<script src="<?php echo base_url();?>assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script> 
<!-- App scripts --> 
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
<script>
	$('.dataentry').addClass('active');
	$('.otherEntries').addClass('active');
</script>
<script>
	$('#example1').dataTable();
	$('#example2').dataTable();
	$('#example3').dataTable();
	$('#example4').dataTable();
	$('#example5').dataTable();
	$('#example6').dataTable();
	$('#example7').dataTable();
	$('#example8').dataTable();
	$('#example9').dataTable();
</script>
</body>
</html>