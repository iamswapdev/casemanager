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
		</div>
		<div class="panel-body tab-panel">
			
			<div class="form-group form-horizontal col-md-12">
				<label class="col-sm-2 control-label">Select Role Name :</label>
				<div class="col-sm-4">
					<select class="form-control input-sm" id="SelectRole">
					
                    <?php foreach($RoleName as $row){?>
							<option value="<?php echo $row['RoleId']?>"><?php echo $row['RoleName']?></option>
                    <?php }?>
					</select>
				</div>
			</div>
			<div class="form-group form-horizontal col-md-12">
				<label class="col-sm-2 control-label">Select Main Menu Name:</label>
				<div class="col-sm-4">
					<select class="form-control input-sm" id="SelectMainMenu">
                    <option value=""></option>
					<option value="1">Admin</option>
					<option value="2">Master</option>
					<option value="3">Search</option>
					<option value="4">WorkArea</option>
					<option value="5">WorkDesk</option>
					<option value="6">Financials</option>
					</select>
				</div>
			</div>
			
			<div class="form-group form-horizontal col-md-12">
				<div class="col-md-4">List of Menus for selected role and main menu.<select class="form-control input-sm input-rows" id="DeAllocated" multiple>
					<option>option 1</option>
					<option>option 2</option>
					<option>option 3</option>
					<option>option 4</option>
					</select>
				</div>
				<div class="col-sm-1"><br><br><button type="button" id="AssignRight" class="btn btn-primary assign-menu-btn"><p> >> </p></button><br><br><button type="button" id="AssignLeft" class="btn btn-primary assign-menu-btn"><p> << </p></button>
                </div>
				<div class="col-sm-4">List Assigned Menus To A Role
                	<select class="form-control input-sm input-rows" id="Allocated" multiple>
					</select>
				 </div>
			</div>
			
			<div class="form-group form-horizontal col-md-12">
				<div class="col-sm-4">
                    <button type="button" class="btn w-xs btn-primary">Save Assigned Menus</button>
                </div>
			</div>
			
		</div><!-- End of panel-body tab-panel-->
		</div><!-- End hpanel -->
		</div><!-- End col-lg-12-->
	</div><!-- End row-->

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
<!-- App scripts -->
<script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
<script>
$(document).ready(function(e) {
	/*$.ajax({
		type:'POST',
		url:"<?php echo base_url();?>adminprivilege/get_Assigned_Menus/1",
		success:function(data){
			results = JSON.parse(data);
			/*for(var i=0; i<results.length; i++){
				$.each(results[i], function(k, v) {
					console.log(k + ' == ' + v);
					if(k == "MenuID" && v > 6){
						$("#DeAllocated").append("<option value='"+v+"'>"+Text+"</option>");
					}
				});
			}*/
			for($i in results){
				if(results[$i].MenuID <= 6){
					$("#Allocated").append("<option value='"+results[$i].MenuID+"'>"+results[$i].MenuName+"</option>");
					//console.log("MenuID:"+results[$i].MenuID+" MenueName:"+results[$i].MenuName);
				}
			}
			
		},
		error: function(result){ console.log("error"); }
	});*/
	$("#SelectRole").on('change', function(){
		$.ajax({
			type:'POST',
			url:"<?php echo base_url();?>adminprivilege/get_Assigned_Menus/"+$("#SelectRole option:selected").val()+"/"+$("#SelectMainMenu option:selected").val(),
			success:function(data){
				results = JSON.parse(data);
				$('#Allocated').empty();
				if($("#SelectRole option:selected").val() == 1 || $("#SelectRole option:selected").val() == 3){
					for($i in results){
						if(results[$i].MenuID <= 6){
							$("#Allocated").append("<option value='"+results[$i].MenuID+"'>"+results[$i].MenuName+"</option>");
							//console.log("MenuID:"+results[$i].MenuID+" MenueName:"+results[$i].MenuName);
						}
					}
				}else{
					for($i in results){
						if(results[$i].MenuID > 6){
							$("#Allocated").append("<option value='"+results[$i].MenuID+"'>"+results[$i].MenuName+"</option>");
						}
					}
				}
				
				
			},
			error: function(result){ console.log("error"); }
		});
	});
	$("#AssignRight").click(function(){
		var Value = $("#DeAllocated option:selected").val();
		var Text = $("#DeAllocated option:selected").text();
		$("#Allocated").append("<option value='"+Value+"'>"+Text+"</option>");
		
		$("#DeAllocated option:selected").remove();
	});
	$("#AssignLeft").click(function(){
		var Value = $("#Allocated option:selected").val();
		var Text = $("#Allocated option:selected").text();
		$("#DeAllocated").append("<option value='"+Value+"'>"+Text+"</option>");
		
		$("#Allocated option:selected").remove();
	}); 
});
	
	
	
</script>
<script>
	$('.adminprivilege').addClass('active');
	$('.assignMenu').addClass('active');
</script>
</body>
</html>