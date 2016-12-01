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
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/sweetalert/lib/sweet-alert.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/toastr/build/toastr.min.css" />

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
				<h4>Denial Types Add/Edit</h4>
				<form id="deleteDenialReasonsForm"  method="post">
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-8">
							<table id="example1" class="table dataTable table-bordered table-striped">
								<thead>
								<tr>
									<th></th>
									<th>Denial Reason Type</th>
									<th>Delete</th>
								</tr>
								</thead>
							</table>
							
						</div>
					</div>
					
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-2">
						  <button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> Deleted checked</button><br><br>
						</div>
					</div>
				</form>
                
              </div>
            </div>
            <div id="tab-2" class="tab-pane">
              <div class="panel-body">
                <h4>Court Types Add/Edit</h4>
				<form id="deleteCourtForm"  method="post">
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-12">
							<table id="example2" class="table dataTable table-bordered table-striped">
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
                                <tr>
                                	<td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Add</td>
                                </tr>
                                </tbody>
							</table>
							
						</div>
					</div>
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-2">
						  <button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> Deleted checked</button><br><br>
						</div>
					</div>
				</form>
                
              </div>
            </div>
            <div id="tab-3" class="tab-pane">
              <div class="panel-body"> 
                <h4>Image Types Add/Edit</h4>
                <form id="deleteImageTypeForm"  method="post">
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-12">
							<table id="example3" class="table dataTable table-bordered table-striped">
								<thead>
								<tr>
									<th class="col-sm-1"></th>
									<th class="col-sm-2">Image Type</th>
									<th class="col-sm-1">Delete</th>
								</tr>
								</thead>
							</table>
							
							
						</div>
					</div>
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-2">
						  <button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> Deleted checked</button><br><br>
						</div>
					</div>
				</form>
                
              </div>
            </div>
            <div id="tab-4" class="tab-pane">
              <div class="panel-body">
                <h4>Status Types Add/Edit</h4>
              	<form id="deleteStatusForm"  method="post">
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-12">
							<table id="example4" class="table dataTable table-bordered table-striped">
								<thead>
								<tr>
									<th class="col-sm-1"></th>
									<th class="col-sm-2">Status Type</th>
									<th class="col-sm-2">Status Abr</th>
									<th class="col-sm-1">Delete</th>
								</tr>
								</thead>
							</table>
							
						</div>
					</div>
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-2">
						  <button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> Deleted checked</button><br><br>
						</div>
					</div>
				</form>
              </div>
            </div>
            <div id="tab-5" class="tab-pane">
              <div class="panel-body"> 
                <h4>Case Status Types Add/Edit</h4>
              	<form id="deleteCaseStatusForm"  method="post">
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-12">
							<table id="example5" class="table dataTable table-bordered table-striped">
								<thead>
								<tr>
									<th class="col-sm-1"></th>
									<th class="col-sm-2">Case Status</th>
									<th class="col-sm-2">Description</th>
									<th class="col-sm-1">Delete</th>
								</tr>
								</thead>
							</table>
							
						</div>
					</div>
					
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-2">
						  <button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> Deleted checked</button><br><br>
						</div>
					</div>
				</form>
              </div>
            </div>
              
               <div id="tab-6" class="tab-pane">
              <div class="panel-body">
                <h4>Document Types Add/Edit</h4>
               
                <form id="deleteDocForm"  method="post">
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-12">
							<table id="example6" class="table dataTable table-bordered table-striped">
								<thead>
								<tr>
									<th class="col-sm-1"></th>
									<th class="col-sm-2">Document Name</th>
									<th class="col-sm-2">Document Value</th>
									<th class="col-sm-1">Settlement</th>
									<th class="col-sm-1">Delete</th>
								</tr>
								</thead>
							</table>
							
						</div>
					</div>
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-2">
						  <button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> Deleted checked</button><br><br>
						</div>
					</div>
				</form>
                
              </div>
            </div>
            <div id="tab-7" class="tab-pane">
              <div class="panel-body"> <span>
                <h4>Service Types Add/Edit</h4>
                </span>
				<form id="deleteServiceForm"  method="post">
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-12">
							<table id="example7" class="table dataTable table-bordered table-striped">
								<thead>
								<tr>
									<th class="col-sm-1"></th>
									<th class="col-sm-2">Service Type</th>
									<th class="col-sm-2">Service Desc</th>
									<th class="col-sm-1">Delete</th>
								</tr>
								</thead>
							</table>
						</div>
					</div>
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-2">
						  <button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> Deleted checked</button><br><br>
						</div>
					</div>
				</form>
              </div>
            </div>
            
            <div id="tab-8" class="tab-pane">
              <div class="panel-body">
                <h4>Event Type Add/Edit</h4>
                <form id="deleteEventTypeForm"  method="post">
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-12">
							<table id="example8" class="table dataTable table-bordered table-striped">
								<thead>
								<tr>
									<th class="col-sm-1"></th>
									<th class="col-sm-6">Event Type</th>
									<th class="col-sm-1">Delete</th>
								</tr>
								</thead>
							</table>
						</div>
					</div>
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-2">
						  <button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i> Deleted checked</button><br><br>
						</div>
					</div>
				</form>
              </div>
            </div>
            
             <div id="tab-9" class="tab-pane">
              <div class="panel-body"> 
                <h4>Event Status Add/Edit</h4>
                <form id="deleteEventStatusForm"  method="post">
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-12">
							<table id="example9" class="table dataTable table-bordered table-striped">
								<thead>
								<tr>
									<th class="col-sm-1"></th>
									<th class="col-sm-6">Event Status</th>
									<th class="col-sm-1">Delete</th>
								</tr>
								</thead>
							</table>
						</div>
						
					</div>
					<div class="form-group form-horizontal col-md-12 otherEntries-table">
						<div class="col-md-2">
						  <button type="submit"  class="btn btn-primary"><i class="fa fa-trash-o"></i> Deleted checked</button><br><br>
						</div>
					</div>
				</form>
                
                
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
<script src="<?php echo base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>

<script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/toastr/build/toastr.min.js"></script>
<!-- App scripts --> 
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
<script>
	$('.dataentry').addClass('active');
	$('.otherEntries').addClass('active');
	$(document).ready(function(e) {
        $("button").click(function(){
			console.log("okk");
		});
    });
</script>
<script>
	$('#example1').dataTable( {
		"ajax": 'DenialReasons'
	});
	$('#example2').dataTable( {
		"ajax": 'Court'
	});
	$('#example3').dataTable( {
		"ajax": 'ImageType'
	});
	$('#example4').dataTable( {
		"ajax": 'Status'
	});
	$('#example5').dataTable( {
		"ajax": 'CaseStatus'
	});
	$('#example6').dataTable( {
		"ajax": 'Doc'
	});
	$('#example7').dataTable( {
		"ajax": 'Service'
	});
	$('#example8').dataTable( {
		"ajax": 'EventType'
	});
	var table = $('#example9').dataTable( {
		"ajax": 'EventStatus'
	});
	$('tbody').on( 'click', '.editRecord', function () {
		var parentR = $(this).parent();
		var div = $(parentR).find(".update-record").css("display", "block");
		$(this).css("display", "none");
    } );
	$('tbody').on( 'click', '.cancel', function () {
		var parentR = $(this).parent().parent();
		
		var div = $(parentR).find(".update-record").css("display", "none");
		var div = $(parentR).find(".editRecord").css("display", "block");
		$(parentR).css("text-align", "center");
		
    } );
	
	$('tbody').on( 'click', '.addRecord', function () {
		var parentR = $(this).parent().parent();
		var tabIdentity = $(parentR).find("input[name=tabIdentity]").val();
		
		if(tabIdentity == 1){
			console.log("tabIdentity: "+tabIdentity);
			var DenialReasons_Type = $(parentR).find("input[name=DenialReasons_Type]").val();
			//var serializeData = [];
			//serializeData.push({DenialReasons_Type:DenialReasons_Type});
			var string = "tabIdentity="+tabIdentity+"&DenialReasons_Type="  + DenialReasons_Type;
			console.log("string: "+string);
		}else if(tabIdentity == 2){
			console.log("tabIdentity: "+tabIdentity);
			var Court_Name = $(parentR).find("input[name=Court_Name]").val();
			var Court_Venue = $(parentR).find("input[name=Court_Venue]").val();
			var Court_Address = $(parentR).find("input[name=Court_Address]").val();
			var Court_Basis = $(parentR).find("input[name=Court_Basis]").val();
			var Court_Misc = $(parentR).find("input[name=Court_Misc]").val();
			//var serializeData = [];
			//serializeData.push({Court_Name:Court_Name, Court_Venue:Court_Venue});
			var string = "tabIdentity="+tabIdentity+"&Court_Name="  + Court_Name + "&Court_Venue="  + Court_Venue + "&Court_Address="  + Court_Address + "&Court_Basis="  + Court_Basis + "&Court_Misc="  + Court_Misc;
			console.log("string: "+string);
		}else if(tabIdentity == 3){
			console.log("tabIdentity: "+tabIdentity);
			var Image_Type = $(parentR).find("input[name=Image_Type]").val();
			////var serializeData = [];
			////serializeData.push({EventStatusName:EventStatusName, EventStatusId:EventStatusId});
			var string = "tabIdentity="+tabIdentity+"&Image_Type="  + Image_Type;
			console.log("string: "+string);
		}else if(tabIdentity == 4){
			console.log("tabIdentity: "+tabIdentity);
			var Status_Type = $(parentR).find("input[name=Status_Type]").val();
			var Status_Abr = $(parentR).find("input[name=Status_Abr]").val();
			////var serializeData = [];
			////serializeData.push({EventStatusName:EventStatusName, EventStatusId:EventStatusId});
			var string = "tabIdentity="+tabIdentity+"&Status_Type="  + Status_Type + "&Status_Abr="  + Status_Abr;
			console.log("string: "+string);
		}else if(tabIdentity == 5){
			console.log("tabIdentity: "+tabIdentity);
			var name = $(parentR).find("input[name=name]").val();
			var description = $(parentR).find("input[name=description]").val();
			//var serializeData = [];
			//serializeData.push({EventStatusName:EventStatusName, EventStatusId:EventStatusId});
			var string = "tabIdentity="+tabIdentity+"&name="  + name + "&description="  + description;
			console.log("string: "+string);
		}else if(tabIdentity == 6){
			console.log("tabIdentity: "+tabIdentity);
			var Doc_Name = $(parentR).find("input[name=Doc_Name]").val();
			var Doc_Value = $(parentR).find("input[name=Doc_Value]").val();
			var Settlement = $(parentR).find("input[name=Settlement]").val();
			//var serializeData = [];
			//serializeData.push({EventStatusName:EventStatusName, EventStatusId:EventStatusId});
			var string = "tabIdentity="+tabIdentity+"&Doc_Name="  + Doc_Name + "&Doc_Value="  + Doc_Value + "&Settlement="  + Settlement;
			console.log("string: "+string);
		}else if(tabIdentity == 7){
			console.log("tabIdentity: "+tabIdentity);
			var ServiceType = $(parentR).find("input[name=ServiceType]").val();
			var ServiceDesc = $(parentR).find("input[name=ServiceDesc]").val();
			//var serializeData = [];
			//serializeData.push({EventStatusName:EventStatusName, EventStatusId:EventStatusId});
			var string = "tabIdentity="+tabIdentity+"&ServiceType="  + ServiceType + "&ServiceDesc="  + ServiceDesc;
			console.log("string: "+string);
		}else if(tabIdentity == 8){
			console.log("tabIdentity: "+tabIdentity);
			var EventTypeName = $(parentR).find("input[name=EventTypeName]").val();
			//var serializeData = [];
			//serializeData.push({EventTypeName:EventTypeName, EventTypeId:EventTypeId});
			var string = "tabIdentity="+tabIdentity+"&EventTypeName="  + EventTypeName;
			console.log("string: "+string);
		}else if(tabIdentity == 9){
			console.log("tabIdentity: "+tabIdentity);
			var EventStatusName = $(parentR).find("input[name=EventStatusName]").val();
			//var serializeData = [];
			//serializeData.push({EventStatusName:EventStatusName, EventStatusId:EventStatusId});
			var string = "tabIdentity="+tabIdentity+"&EventStatusName="  + EventStatusName;
			console.log("string: "+string);
		}
		request = $.ajax({
			url:"<?php echo base_url(); ?>dataentry/Add_Record",
			type: "post",
			data: string
		});

		request.done(function (response, textStatus, jqXHR) {
			console.log("Successssss ");
			callSuccess();
		});
	})
	
	$('tbody').on( 'click', '.update', function () {
		var parentR = $(this).parent().parent().parent();
		var tabIdentity = $(parentR).find("input[name=tabIdentity]").val();
		
		var div = $(parentR).find(".update-record").css("display", "none");
		var div = $(parentR).find(".editRecord").css("display", "block");
		
		if(tabIdentity == 1){
			console.log("tabIdentity: "+tabIdentity);
			var DenialReasons_Type = $(parentR).find("input[name=DenialReasons_Type]").val();
			var DenialReasons_Id = $(parentR).find("input[name=DenialReasons_Id]").val();
			//var serializeData = [];
			//serializeData.push({DenialReasons_Type:DenialReasons_Type, DenialReasons_Id:DenialReasons_Id});
			var string = "tabIdentity="+tabIdentity+"&DenialReasons_Type="  + DenialReasons_Type + "&DenialReasons_Id="  + DenialReasons_Id;
			console.log("string: "+string);
		}else if(tabIdentity == 2){
			console.log("tabIdentity: "+tabIdentity);
			var Court_Name = $(parentR).find("input[name=Court_Name]").val();
			var Court_Venue = $(parentR).find("input[name=Court_Venue]").val();
			var Court_Address = $(parentR).find("input[name=Court_Address]").val();
			var Court_Basis = $(parentR).find("input[name=Court_Basis]").val();
			var Court_Misc = $(parentR).find("input[name=Court_Misc]").val();
			var Court_Id = $(parentR).find("input[name=Court_Id]").val();
			//var serializeData = [];
			//serializeData.push({Court_Name:Court_Name, Court_Venue:Court_Venue});
			var string = "tabIdentity="+tabIdentity+"&Court_Name="  + Court_Name + "&Court_Venue="  + Court_Venue + "&Court_Address="  + Court_Address + "&Court_Basis="  + Court_Basis + "&Court_Misc="  + Court_Misc + "&Court_Id="  + Court_Id;
			console.log("string: "+string);
		}else if(tabIdentity == 3){
			console.log("tabIdentity: "+tabIdentity);
			var Image_Type = $(parentR).find("input[name=Image_Type]").val();
			var Image_Id = $(parentR).find("input[name=Image_Id]").val();
			////var serializeData = [];
			////serializeData.push({EventStatusName:EventStatusName, EventStatusId:EventStatusId});
			var string = "tabIdentity="+tabIdentity+"&Image_Type="  + Image_Type + "&Image_Id="  + Image_Id;
			console.log("string: "+string);
		}else if(tabIdentity == 4){
			console.log("tabIdentity: "+tabIdentity);
			var Status_Type = $(parentR).find("input[name=Status_Type]").val();
			var Status_Abr = $(parentR).find("input[name=Status_Abr]").val();
			var Status_Id = $(parentR).find("input[name=Status_Id]").val();
			//var serializeData = [];
			//serializeData.push({EventStatusName:EventStatusName, EventStatusId:EventStatusId});
			var string = "tabIdentity="+tabIdentity+"&Status_Type="  + Status_Type + "&Status_Abr="  + Status_Abr + "&Status_Id="  + Status_Id;
			console.log("string: "+string);
		}else if(tabIdentity == 5){
			console.log("tabIdentity: "+tabIdentity);
			var name = $(parentR).find("input[name=name]").val();
			var description = $(parentR).find("input[name=description]").val();
			var id = $(parentR).find("input[name=id]").val();
			//var serializeData = [];
			//serializeData.push({EventStatusName:EventStatusName, EventStatusId:EventStatusId});
			var string = "tabIdentity="+tabIdentity+"&name="  + name + "&description="  + description + "&id="  + id;
			console.log("string: "+string);
		}else if(tabIdentity == 6){
			console.log("tabIdentity: "+tabIdentity);
			var Doc_Name = $(parentR).find("input[name=Doc_Name]").val();
			var Doc_Value = $(parentR).find("input[name=Doc_Value]").val();
			var Settlement = $(parentR).find("input[name=Settlement]").val();
			var Doc_Id = $(parentR).find("input[name=Doc_Id]").val();
			//var serializeData = [];
			//serializeData.push({EventStatusName:EventStatusName, EventStatusId:EventStatusId});
			var string = "tabIdentity="+tabIdentity+"&Doc_Name="  + Doc_Name + "&Doc_Value="  + Doc_Value + "&Settlement="  + Settlement + "&Doc_Id="  + Doc_Id;
			console.log("string: "+string);
		}else if(tabIdentity == 7){
			console.log("tabIdentity: "+tabIdentity);
			var ServiceType = $(parentR).find("input[name=ServiceType]").val();
			var ServiceDesc = $(parentR).find("input[name=ServiceDesc]").val();
			var ServiceType_ID = $(parentR).find("input[name=ServiceType_ID]").val();
			//var serializeData = [];
			//serializeData.push({EventStatusName:EventStatusName, EventStatusId:EventStatusId});
			var string = "tabIdentity="+tabIdentity+"&ServiceType="  + ServiceType + "&ServiceDesc="  + ServiceDesc + "&ServiceType_ID="  + ServiceType_ID;
			console.log("string: "+string);
		}else if(tabIdentity == 8){
			console.log("tabIdentity: "+tabIdentity);
			var EventTypeName = $(parentR).find("input[name=EventTypeName]").val();
			var EventTypeId = $(parentR).find("input[name=EventTypeId]").val();
			//var serializeData = [];
			//serializeData.push({EventTypeName:EventTypeName, EventTypeId:EventTypeId});
			var string = "tabIdentity="+tabIdentity+"&EventTypeName="  + EventTypeName + "&EventTypeId="  + EventTypeId;
			console.log("string: "+string);
		}else if(tabIdentity == 9){
			console.log("tabIdentity: "+tabIdentity);
			var EventStatusName = $(parentR).find("input[name=EventStatusName]").val();
			var EventStatusId = $(parentR).find("input[name=EventStatusId]").val();
			//var serializeData = [];
			//serializeData.push({EventStatusName:EventStatusName, EventStatusId:EventStatusId});
			var string = "tabIdentity="+tabIdentity+"&EventStatusName="  + EventStatusName + "&EventStatusId="  + EventStatusId;
			console.log("string: "+string);
		}
		/*for(i=0;i<serializeData.length;i++){
			var string = "EventStatusName="  + serializeData[i].EventStatusName + "&EventStatusId="  + serializeData[i].EventStatusId;
			console.log("EventStatusName="  + serializeData[i].EventStatusName + "&EventStatusId="  + serializeData[i].EventStatusId);
		}*/
		
		request = $.ajax({
			url:"<?php echo base_url(); ?>dataentry/just",
			type: "post",
			data: string
		});

		request.done(function (response, textStatus, jqXHR) {
			console.log("Successssss ");
			
			callSuccess();
		});
		
    } );
	/*$("#deleteEventStatusForm").click(function(){
		var vv = $(".deleteEventStatus16").parent().parent();
		console.log("VV: "+vv);
	});*/
	
	
/********************************* Tab 1 DenialReasons *******************************************************************/
	$("#deleteDenialReasonsForm").submit(function(form){
		var $form = $(form);
		var $inputs = $form.find("input, select, button, textarea");
		var serializedData = $form.serialize();
		//console.log("DDDD: "+serializedData);
		$inputs.prop("disabled", true);

		request = $.ajax({
			url:"delete_Roles",
			type: "post",
			data: serializedData
		});

		request.done(function (response, textStatus, jqXHR) {
			//console.log("Done: ");
			$('.deleteDenialReasons:checked').each(function(i){
				var values = $(this).val();
				
				var row = $(".deleteDenialReasons"+values).parent().parent();
				$(row).remove();
				console.log("value: "+values);
			});
			callDelete();
		});

		request.always(function () {
			$inputs.prop("disabled", false);
		});
		form.preventDefault();	//STOP default action
	});
/********************************* Tab 2 Court *******************************************************************/
	$("#deleteCourtForm").submit(function(form){
		var $form = $(form);
		var $inputs = $form.find("input, select, button, textarea");
		var serializedData = $form.serialize();
		//console.log("DDDD: "+serializedData);
		$inputs.prop("disabled", true);

		request = $.ajax({
			url:"delete_Roles",
			type: "post",
			data: serializedData
		});

		request.done(function (response, textStatus, jqXHR) {
			//console.log("Done: ");
			$('.deleteCourt:checked').each(function(i){
				var values = $(this).val();
				
				var row = $(".deleteCourt"+values).parent().parent();
				$(row).remove();
				console.log("value: "+values);
			});
			callDelete();
		});

		request.always(function () {
			$inputs.prop("disabled", false);
		});
		form.preventDefault();	//STOP default action
	});
/********************************* Tab 3 ImageType *******************************************************************/
	$("#deleteImageTypeForm").submit(function(form){
		var $form = $(form);
		var $inputs = $form.find("input, select, button, textarea");
		var serializedData = $form.serialize();
		//console.log("DDDD: "+serializedData);
		$inputs.prop("disabled", true);

		request = $.ajax({
			url:"delete_Roles",
			type: "post",
			data: serializedData
		});

		request.done(function (response, textStatus, jqXHR) {
			//console.log("Done: ");
			$('.deleteImageType:checked').each(function(i){
				var values = $(this).val();
				
				var row = $(".deleteImageType"+values).parent().parent();
				$(row).remove();
				console.log("value: "+values);
			});
			callDelete();
		});

		request.always(function () {
			$inputs.prop("disabled", false);
		});
		form.preventDefault();	//STOP default action
	});
/********************************* Tab 4 Status *******************************************************************/
	$("#deleteStatusForm").submit(function(form){
		var $form = $(form);
		var $inputs = $form.find("input, select, button, textarea");
		var serializedData = $form.serialize();
		//console.log("DDDD: "+serializedData);
		$inputs.prop("disabled", true);

		request = $.ajax({
			url:"delete_Roles",
			type: "post",
			data: serializedData
		});

		request.done(function (response, textStatus, jqXHR) {
			//console.log("Done: ");
			$('.deleteStatus:checked').each(function(i){
				var values = $(this).val();
				
				var row = $(".deleteStatus"+values).parent().parent();
				$(row).remove();
				console.log("value: "+values);
			});
			callDelete();
		});

		request.always(function () {
			$inputs.prop("disabled", false);
		});
		form.preventDefault();	//STOP default action
	});
/********************************* Tab 5 CaseStatus *******************************************************************/
	$("#deleteCaseStatusForm").submit(function(form){
		var $form = $(form);
		var $inputs = $form.find("input, select, button, textarea");
		var serializedData = $form.serialize();
		//console.log("DDDD: "+serializedData);
		$inputs.prop("disabled", true);

		request = $.ajax({
			url:"delete_Roles",
			type: "post",
			data: serializedData
		});

		request.done(function (response, textStatus, jqXHR) {
			//console.log("Done: ");
			$('.deleteCaseStatus:checked').each(function(i){
				var values = $(this).val();
				
				var row = $(".deleteCaseStatus"+values).parent().parent();
				$(row).remove();
				console.log("value: "+values);
			});
			callDelete();
		});

		request.always(function () {
			$inputs.prop("disabled", false);
		});
		form.preventDefault();	//STOP default action
	});
/********************************* Tab 6 Doc *******************************************************************/
	$("#deleteDocForm").submit(function(form){
		var $form = $(form);
		var $inputs = $form.find("input, select, button, textarea");
		var serializedData = $form.serialize();
		//console.log("DDDD: "+serializedData);
		$inputs.prop("disabled", true);

		request = $.ajax({
			url:"delete_Roles",
			type: "post",
			data: serializedData
		});

		request.done(function (response, textStatus, jqXHR) {
			//console.log("Done: ");
			$('.deleteDoc:checked').each(function(i){
				var values = $(this).val();
				
				var row = $(".deleteDoc"+values).parent().parent();
				$(row).remove();
				console.log("value: "+values);
			});
			callDelete();
		});

		request.always(function () {
			$inputs.prop("disabled", false);
		});
		form.preventDefault();	//STOP default action
	});
/********************************* Tab 7 Service *******************************************************************/
	$("#deleteServiceForm").submit(function(form){
		var $form = $(form);
		var $inputs = $form.find("input, select, button, textarea");
		var serializedData = $form.serialize();
		//console.log("DDDD: "+serializedData);
		$inputs.prop("disabled", true);

		request = $.ajax({
			url:"delete_Roles",
			type: "post",
			data: serializedData
		});

		request.done(function (response, textStatus, jqXHR) {
			//console.log("Done: ");
			$('.deleteService:checked').each(function(i){
				var values = $(this).val();
				
				var row = $(".deleteService"+values).parent().parent();
				$(row).remove();
				console.log("value: "+values);
			});
			callDelete();
		});

		request.always(function () {
			$inputs.prop("disabled", false);
		});
		form.preventDefault();	//STOP default action
	});
/********************************* Tab 8 EventType *******************************************************************/
	$("#deleteEventTypeForm").submit(function(form){
		var $form = $(form);
		var $inputs = $form.find("input, select, button, textarea");
		var serializedData = $form.serialize();
		//console.log("DDDD: "+serializedData);
		$inputs.prop("disabled", true);

		request = $.ajax({
			url:"delete_Roles",
			type: "post",
			data: serializedData
		});

		request.done(function (response, textStatus, jqXHR) {
			//console.log("Done: ");
			$('.deleteEventType:checked').each(function(i){
				var values = $(this).val();
				
				var row = $(".deleteEventType"+values).parent().parent();
				$(row).remove();
				console.log("value: "+values);
			});
			callDelete();
		});

		request.always(function () {
			$inputs.prop("disabled", false);
		});
		form.preventDefault();	//STOP default action
	});
/********************************* Tab 9 EventStatus *******************************************************************/
	$("#deleteEventStatusForm").submit(function(form){
		var $form = $(form);
		var $inputs = $form.find("input, select, button, textarea");
		var serializedData = $form.serialize();
		//console.log("DDDD: "+serializedData);
		$inputs.prop("disabled", true);

		request = $.ajax({
			url:"<?php echo base_url(); ?>dataentry/delete_Roles",
			type: "post",
			data: serializedData
		});

		request.done(function (response, textStatus, jqXHR) {
			//console.log("Done: ");
			$('.deleteEventStatus:checked').each(function(i){
				var values = $(this).val();
				
				var row = $(".deleteEventStatus"+values).parent().parent();
				$(row).remove();
				console.log("value: "+values);
			});
			callDelete();
		});

		request.always(function () {
			$inputs.prop("disabled", false);
		});
		form.preventDefault();	//STOP default action
	});
	
	$('#deleteEventTypeForm td:first-child').append("Some appended text.");
	/*$("button .editRecord").click(function(){
		console.log("okk");
		var parentR = $(this).parent();
		var div = $(parentR).find(".update-record");
		$(div).css("display", "blobk");
	});*/
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
	
		
</script>
</body>
</html>