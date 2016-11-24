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
<aside id="menu">
    <div id="navigation">
        <ul class="nav" id="side-menu">
            <li class="active adminprivilege">
                <a href="#"><span class="nav-label">Admin</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url();?>adminprivilege/manageusers">Admin Privileges</a></li>
                </ul>
            </li>
            <li class="search">
                <a href="#"><span class="nav-label">Search</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url();?>search/searchs">Search</a></li>
                    <li><a href="<?php echo base_url();?>search/advancedsearch">Advanced Search</a></li>
                </ul>
            </li>
            <li class="dataentry">
                <a href="#"><span class="nav-label">Master</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url();?>dataentry/addcase">Data Entry</a></li>
                </ul>
            </li>
             <li class="workarea">
                <a href="#"><span class="nav-label">Work Area</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url();?>workarea/caseinformation">Case Information</a></li>
                    <li><a href="<?php echo base_url();?>workarea/dataentryworkarea">Data Entry(Case Entry Only)</a></li>
                    <li><a href="<?php echo base_url();?>workarea/fileinsert">File Insert</a></li>
                    <li><a href="<?php echo base_url();?>workarea/workflowreport">WorkFlow Report</a></li>
                    <li><a href="<?php echo base_url();?>workarea/calendar">Calendar</a></li>
                </ul>
            </li>
            <li class="workdesk">
                <a href="#"><span class="nav-label">WorkDesk</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url();?>workdesk/workdesks">WorkDesk</a></li>
                </ul>
            </li>
             <li class="financials">
                <a href="#"><span class="nav-label">Financials</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url();?>financials/financial">Financial</a></li>
                    <li><a href="<?php echo base_url();?>financials/reports">Reports</a></li>
                    <li><a href="<?php echo base_url();?>financials/rapidfunds">Rapid Funds</a></li>
                </ul>
            </li>
             <li>
                	<a href="<?php echo base_url();?>admin/contacts"><span class="nav-label">Contacts</span><span class="fa arrow"></span> </a> 
            </li>   
            <li>
                <a href="<?php echo base_url();?>admin/logout"><span class="nav-label">Logoff</span><span class="fa arrow"></span> </a>
            </li>        
      
        </ul>
    </div>
</aside>
<!-- Main Wrapper -->
<div id="wrapper">
<?php include 'header_adminprivilege.php';?>
<div class="content animate-panel">

	<div class="row">
		<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-heading">
			</div>
		<div class="panel-body tab-panel">
			
			<h4 class="h4-title"> Manage Users</h4>
			<div class="operation-buttons">
				<button type="button" class="btn btn-primary" title="Create User" data-toggle="modal" data-target="#myModal"><i class="fa fa-group"></i></button>
				<button type="button" class="btn btn-primary delete" title="Delete User"><i class="fa fa-trash-o"></i></button>
			</div>
            
			<table id="example2" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
				<th>Desk Info</th>
				<th>User Name</th>
				<th>Display Name</th>
				<th>Role</th>
				<th>Operation</th>

			</tr>
			</thead>
			<tbody>
            <?php foreach($UserName as $row){?>
				<tr>
                    <td><?php echo $row['UserName'];?></td>
                    
					<td><?php echo $row['UserName'];?></td>
                    
					<td><?php echo $row['DisplayName'];?></td>
                    
					<td><?php echo $row['RoleName'];?></td>
					<td>
                    	<button class="btn btn-primary table-icons" type="button" title="Edit"><i class="fa fa-paste"></i></button>&nbsp;
                        <button class="btn btn-primary table-icons" type="button" title="Upload"><i class="fa fa-upload"></i></button>&nbsp;
                    	<button class="btn btn-primary table-icons" type="button" title="Delete"><i class="fa fa-trash-o"></i></button>
					</td>

				</tr>
             <?php }?>
			</tbody>
			</table>
			
		</div><!-- End of panel-body tab-panel-->
		</div><!-- End hpanel -->
		</div><!-- End col-lg-12-->
	</div><!-- End row-->

	<div class="row">
		<div class="col-lg-12">
		<div class="hpanel">
			<div class="panel-heading">
			</div>
		<div class="panel-body tab-panel">
			
			<h4 class="h4-title"> Manage Desk </h4>
			<div class="operation-buttons">
				<button type="button" class="btn btn-primary" title="Delete Desk"><i class="fa fa-trash-o"></i></button>
			</div>
			<table id="example3" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>UserName</th>
					<th>DeskName</th>
					<th>Delete</th>>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Tiger Nixon</td>
					<td>System Architect</td>
					<td>Edinburgh</td>
				</tr>
			</tbody>
			</table>
			
		</div><!-- End of panel-body tab-panel-->
		</div><!-- End hpanel -->
		</div><!-- End col-lg-12-->
	</div><!-- End row-->

	<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog model-popup">
	<div class="modal-content ">
		<div class="modal-header model-design">
			<button type="button" class="close close-tab" data-dismiss="modal"> &times;</button>
			<h4 class="modal-title">Create User</h4>
		</div>
		<div class="modal-body">
		<div class="row">
		<div class="form-design">

			<div class="form-group form-horizontal col-md-12">
				<div class="col-md-2"></div>
				<div class="col-md-3 form-horizontal">
					<label class="control-label" style="width:100%;">User Name</label>
				</div>   
				<div class="col-md-5">
					<input type="text" name="username" class="form-control input-sm">
				</div>
				<div class="col-md-2"></div>
			</div>

			<div class="form-group form-horizontal col-md-12">
				<div class="col-md-2"></div>
				<div class="col-md-3 form-horizontal"> 
					<label class="control-label" style="width:100%;">Role</label>
				</div>
				<div class="col-md-5">
					<select class="form-control " name="account">
					<option>option 1</option>
					<option>option 2</option>
					<option>option 3</option>
					<option>option 4</option>
					</select>
				</div>
				<div class="col-md-2"></div>
			</div>  

			<div class="form-group form-horizontal col-md-12">
				<div class="col-md-2"></div>
				<div class="col-md-3 form-horizontal">
					<label class="control-label" style="width:100%;">Email</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="username" class="form-control input-sm">
				</div>
				<div class="col-md-2"></div>
			</div> 
			<div class="form-group form-horizontal col-md-12">
				<div class="col-md-2"></div>
				<div class="col-md-3 form-horizontal"> 
					<label class="control-label" style="width:100%;">Password</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="password" class="form-control input-sm">
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="form-group form-horizontal col-md-12">
				<div class="col-md-1"></div>
				<div class="col-md-4 form-horizontal"> 
					<label class="control-label" style="width:100%;">Confirm Password </label>
				</div>
				<div class="col-md-5">
					<input type="text" name="confirm_password" class="form-control input-sm">
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="form-group form-horizontal col-md-12">
				<div class="col-md-2"></div>
				<div class="col-md-3 form-horizontal"> 
					<button type="button" class="btn w-xs btn-info create">Save</button>
				</div>
				<div class="col-md-3">
					<button type="button" class="btn w-xs btn-info create">Cancel</button>
				</div>
				<div class="col-md-3"></div>
			</div>


		</div>
		</div>
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
	$('.adminprivilege').addClass('active');
</script>
</body>
</html>