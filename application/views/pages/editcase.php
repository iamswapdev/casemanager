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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/select2-3.5.2/select2.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/select2-bootstrap/select2-bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" />
    
    <!-- DATETIMEPICKER CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/datetimepicker/jscss/css/bootstrap-datetimepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css" />
    
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
    <h1>Homer - Responsive Admin Theme</h1>
    <p>Special AngularJS Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p>
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
<?php foreach($CaseInfo as $row){ $Case_Id = $row['Case_Id']; $Case_AutoId = $row['Case_AutoId']; $selectedProvider_Id = $row['Provider_Id']; $InsuranceCompany_Id = $row['InsuranceCompany_Id']; $Status_Type = $row['Status']; $DenialReasons_Type = $row['DenialReasons_Type']; $Court_Id = $row['Court_Id']; $Initial_Status = $row['Initial_Status']; $IndexOrAAA_Number = $row['IndexOrAAA_Number']; $Memo = $row['Memo']; $InjuredParty_LastName = $row['InjuredParty_LastName']; $InjuredParty_FirstName = $row['InjuredParty_FirstName']; $InsuredParty_LastName = $row['InsuredParty_LastName']; $InsuredParty_FirstName = $row['InsuredParty_FirstName']; $Accident_Date = $row['Accident_Date']; $Policy_Number = $row['Policy_Number']; $Ins_Claim_Number = $row['Ins_Claim_Number']; $DateOfService_Start = $row['DateOfService_Start']; $DateOfService_End = $row['DateOfService_End']; $Claim_Amount = $row['Claim_Amount']; $Paid_Amount = $row['Paid_Amount']; $Date_BillSent = $row['Date_BillSent']; $Provider_Name_input =$row['Provider_Name']; $InsuranceCompany_Name_input = $row['InsuranceCompany_Name']; $InjuredParty_Type = $row['InjuredParty_Type']; $InsuredParty_Type = $row['InsuredParty_Type']; $InsuredParty_Address = $row['InsuredParty_Address'];$InsuredParty_City = $row['InsuredParty_City'];$InsuredParty_State  = $row['InsuredParty_State']; $InsuredParty_Zip = $row['InsuredParty_Zip'];$InsuredParty_Misc = $row['InsuredParty_Misc'];$Accident_Date = $row['Accident_Date'];$Accident_Address = $row['Accident_Address'];$Accident_City = $row['Accident_City'];$Accident_State = $row['Accident_State']; $Accident_Zip = $row['Accident_Zip'];$InjuredParty_Address = $row['InjuredParty_Address']; $InjuredParty_City = $row['InjuredParty_City']; $InjuredParty_State = $row['InjuredParty_State']; $InjuredParty_Zip = $row['InjuredParty_Zip']; $InjuredParty_Phone = $row['InjuredParty_Phone']; $InjuredParty_Misc = $row['InjuredParty_Misc']; $Adjuster_Id = $row['Adjuster_Id']; $DenialReasons_Id = $row['DenialReasons_Type'];

}

$months = array("Just", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "jan");
for($i=0; $i<=13; $i++){
	if(substr($DateOfService_Start, 0, 3) == $months[$i]){
		if($i<10){
			if(substr($DateOfService_Start, 4, 1) == " "){
				$DateOfService_Start7 = substr_replace($DateOfService_Start,"0",4,1);
				if($i == 13){
					$DateOfService_Start2 = str_replace($months[$i]." ","01-",$DateOfService_Start7);
				}else{
					$DateOfService_Start2 = str_replace($months[$i]." ","0".$i."-",$DateOfService_Start7);
				}
				
			}else{
				if($i == 13){
					$DateOfService_Start2 = str_replace($months[$i]." ","01-",$DateOfService_Start);
				}else{
					$DateOfService_Start2 = str_replace($months[$i]." ","0".$i."-",$DateOfService_Start);
				}
				
			}
		}else{
			$DateOfService_Start2 = str_replace($months[$i]." ",$i."-",$DateOfService_Start);
		}
		$DateOfService_Start3 = substr_replace($DateOfService_Start2,"-",strpos($DateOfService_Start2," "),1);
		$DateOfService_Start = $DateOfService_Start3;
		break;
	}
}

for($i=0; $i<=13; $i++){
	if(substr($DateOfService_End, 0, 3) == $months[$i]){
		if($i<10){
			if(substr($DateOfService_End, 4, 1) == " "){
				$DateOfService_End7 = substr_replace($DateOfService_End,"0",4,1);
				if($i == 13){
					$DateOfService_End2 = str_replace($months[$i]." ","01-",$DateOfService_End7);
				}else{
					$DateOfService_End2 = str_replace($months[$i]." ","0".$i."-",$DateOfService_End7);
				}
			}else{
				if($i == 13){
					$DateOfService_End2 = str_replace($months[$i]." ","01-",$DateOfService_End);
				}else{
					$DateOfService_End2 = str_replace($months[$i]." ","0".$i."-",$DateOfService_End);
				}
			}
		}else{
			$DateOfService_End2 = str_replace($months[$i]." ",$i."-",$DateOfService_End);
		}
		$DateOfService_End3 = substr_replace($DateOfService_End2,"-",strpos($DateOfService_End2," "),1);
		$DateOfService_End = $DateOfService_End3;
		break;
	}
}




?>
<div class="normalheader transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body pad-b">
            <a class="small-header-action" href="">
                <div class="clip-header">
                    <i class="fa fa-arrow-up"></i>
                </div>
            </a>

            <div id="hbreadcrumb" style="margin-top:-10px;" class="pull-right">
                <ol class="hbreadcrumb breadcrumb make-bold">
                    <li ><a class="addCaseInfo active" href="#">EDIT CASE INFO</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content animate-panel">
    
	<div class="row">
		<div class="col-lg-12">
		<div class="hpanel">
		<div class="panel-heading"></div>
		<div class="panel-body tab-panel">
			
			<form id="addCaseForm" role="form" action="add_CaseInfo" method="post" >
				<div class="form-group form-horizontal col-md-12">
                	<h5 class="h4-title">CASE INFORMATION</h5>
                    <div class="col-md-1"></div>
                    <div class="col-md-2"><div class="col-md-5 case-info-id">Case Id:</div><div class="col-md-6 case-id case-info-id-data"><?php echo $Case_Id;?></div></div>
                </div>
				<div class="form-group form-horizontal col-md-12">
                    <input type="hidden" name="Case_AutoId" value="<?php echo $Case_AutoId;?>">
					<!--<p>(Note: All amounts are in USD wherever applicable.)</p>-->
					<label class="col-md-2 control-label">Initial Status</label>
					<div class="col-md-6 radio">
						<label><input type="radio" class="horizontal" value="ARBITRATION" id="arbitration" name="initialStatus" <?php if($Initial_Status == 'ARBITRATION'){ echo "checked";}?>>ARBITRATION</label>
						<label><input type="radio" class="horizontal" value="LITIGATION" id="litigation" name="initialStatus" <?php if($Initial_Status == 'LITIGATION'){ echo "checked";}?>>LITIGATION</label>
                        <label><input type="radio" class="horizontal" value="INITIAL SUBMISSION" id="initialSubmission" name="initialStatus" <?php if($Initial_Status == 'INITIAL SUBMISSION'){ echo "checked";}?>>INITIAL SUBMISSION</label>
                        <label><input type="radio" class="horizontal" value="PERSONAL INJURY" id="personalInjury" name="initialStatus" <?php if($Initial_Status == 'PERSONAL INJURY'){ echo "checked";}?>>PERSONAL INJURY</label>
                        
					</div>
				</div>
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">Provider Name</label>
					<div class="col-md-2">	
						<input type="text" id="providerName" name="providerName" class="form-control input-sm" value="<?php echo $Provider_Name_input; ?>" >
                        <input type="hidden" name="providerNameHidden" value="<?php echo $selectedProvider_Id;?>">
					</div>
					<label class="col-md-2 control-label">Select Provider</label>
					<div class="col-md-2">	
						<select class="form-control input-sm" id="providerId" name="providerId">
                            
                            <?php foreach($Provider_Name as $row){?>
                            <option value="<?php echo $row['Provider_Id']; ?>" <?php if($selectedProvider_Id == $row['Provider_Id']){ echo "selected";}?>> <?php echo $row['Provider_Name']; ?> </option>
                            <?php }?>
                        </select>
					</div>
					<div class="form-horizontal col-md-12 hr-line-dashed"></div>
				</div>

				
				<div class="form-group form-horizontal col-md-12">
                	<h5 class="h4-title">Injured Party Information</h5>
					<label class="col-md-2 control-label">Last Name <span class="required-field">*</span></label>
					<div class="col-md-2">
						<input type="text" id="InjuredPartyLastName" name="InjuredPartyLastName" placeholder="Last Name" class="form-control input-sm" value="<?php echo $InjuredParty_LastName; ?>" required> 
					</div>
					<label class="col-md-2 control-label">First Name <span class="required-field">*</span></label>
					<div class="col-md-2">
						<input type="text" id="InjuredPartyFirstName" name="InjuredPartyFirstName" placeholder="First Name" class="form-control input-sm" value="<?php echo $InjuredParty_FirstName;?>" required>
					</div>
				</div>
                <div class="form-group form-horizontal col-sm-12 ">
                    <label class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-5">
                        <textarea rows="3" id="InjuredParty_Address" name="InjuredParty_Address"  class="form-control" ><?php echo $InjuredParty_Address;?></textarea>
                    </div>
                </div>
                <div class="form-group form-horizontal col-sm-12">
                    <label class="col-sm-2 control-label">Zip</label>
                    <div class="col-sm-1">
                        <input type="text" id="InjuredParty_Zip" name="InjuredParty_Zip"  class="form-control input-sm" value="<?php echo $InjuredParty_Zip;?>">
                        <!--<input type="text" placeholder=".input-sm" class="form-control input-sm">--> 
                    </div>
                    <label class="col-sm-1 control-label">State</label>
                    <div class="col-sm-1">
                        <select class="form-control input-sm"  id="InjuredParty_State" name="InjuredParty_State">
                            <option selected="selected" value=""></option>
                            <?php foreach($State_Name as $row){?>
                            <option value="<?php echo $row['State_Id']; ?>" <?php if($row['State_Id'] == $InjuredParty_State){echo "selected";}?>> <?php echo $row['State_Name']; ?> </option>
                            <?php }?>
                        </select>
                    </div>
                    <label class="col-sm-1 control-label">City</label>
                    <div class="col-sm-2">
                        <input type="text" id="InjuredParty_City" name="InjuredParty_City" class="form-control input-sm" value="<?php echo $InjuredParty_City;?>">
                    </div>
                </div>
                <div class="form-group form-horizontal col-sm-12">
                    <label class="col-sm-2 control-label">Phone</label>
                    <div class="col-sm-1">
                        <input type="text" id="InjuredParty_Phone" name="InjuredParty_Phone"  placeholder="123-456-7890" class="phone-format form-control input-sm" value="<?php echo $InjuredParty_Phone;?>">
                    </div>
                    <label class="col-sm-1 control-label">Misc</label>
                    <div class="col-sm-1">
                        <input type="text" id="InjuredParty_Misc" name="InjuredParty_Misc" class="form-control input-sm" value="<?php echo $InjuredParty_Misc;?>">
                    </div>
                </div>
                <div class="form-group form-horizontal col-md-12">
                    <label class="col-md-2 control-label">Type</label>
					<div class="col-md-6 radio">
						<label><input type="radio" class="horizontal" value="Passenger" name="InjuredParty_Type" <?php if($InjuredParty_Type == 'Passenger'){ echo "checked";}?>>Passenger</label>
						<label><input type="radio" class="horizontal" value="Pedestrian" name="InjuredParty_Type" <?php if($InjuredParty_Type == 'Pedestrian'){ echo "checked";}?>>Pedestrian</label>
                        <label><input type="radio" class="horizontal" value="Other" name="InjuredParty_Type" <?php if($InjuredParty_Type == 'Other'){ echo "checked";}?>>Other</label>
					</div>
                    <div class="form-horizontal col-md-12 hr-line-dashed"></div>
				</div>
                <div class="form-group form-horizontal col-md-12">
                	<h5 class="h4-title">Insured Party Information </h5>
					<div class="col-md-2"></div>
					<div class="col-md-6 checkbox">
						<label><input type="checkbox" id="checkbox1" >Check here if same as Patient Information.</label>
					</div>
				</div>
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">Last Name</label>
					<div class="col-md-2">
						<input type="text" id="InsuredPartyLastName" name="InsuredPartyLastName" value="<?php echo $InsuredParty_LastName;?>" placeholder="Last Name" class="form-control input-sm"> 
					</div>
					<label class="col-md-2 control-label">First Name</label>
					<div class="col-md-2">
						<input type="text" id="InsuredPartyFirstName" name="InsuredPartyFirstName" value="<?php echo $InsuredParty_FirstName;?>" placeholder="First Name" class="form-control input-sm">
					</div>
				</div>
                <div class="form-group form-horizontal col-sm-12 ">
                    <label class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-5">
                        <textarea rows="3" id="InsuredParty_Address" name="InsuredParty_Address"  class="form-control" > <?php echo $InsuredParty_Address;?></textarea>
                    </div>
                </div>
                <div class="form-group form-horizontal col-sm-12">
                    <label class="col-sm-2 control-label">Zip</label>
                    <div class="col-sm-1">
                        <input type="text" id="InsuredParty_Zip" name="InsuredParty_Zip"  class="form-control input-sm" value="<?php echo $InsuredParty_Zip;?>">
                        <!--<input type="text" placeholder=".input-sm" class="form-control input-sm">--> 
                    </div>
                    <label class="col-sm-1 control-label">State</label>
                    <div class="col-sm-1">
                        <select class="form-control input-sm"  id="InsuredParty_State" name="InsuredParty_State">
                            <option selected="selected" value=""></option>
                            <?php foreach($State_Name as $row){?>
                            <option value="<?php echo $row['State_Id']; ?>" <?php if($row['State_Id'] == $InsuredParty_State){echo "selected";}?>> <?php echo $row['State_Name']; ?> </option>
                            <?php }?>
                        </select>
                    </div>
                    <label class="col-sm-1 control-label">City</label>
                    <div class="col-sm-2">
                        <input type="text" id="InsuredParty_City" name="InsuredParty_City" class="form-control input-sm" value="<?php echo $InsuredParty_City;?>">
                    </div>
                </div>
                <div class="form-group form-horizontal col-sm-12">
                    <label class="col-sm-2 control-label">Misc</label>
                    <div class="col-sm-1">
                        <input type="text" id="InsuredParty_Misc" name="InsuredParty_Misc" class="form-control input-sm" value="<?php echo $InsuredParty_Misc;?>">
                    </div>
                </div>
                <div class="form-group form-horizontal col-md-12">
                    <label class="col-md-2 control-label">Type</label>
					<div class="col-md-6 radio">
						<label><input type="radio" class="horizontal" value="Passenger" name="InsuredParty_Type" <?php if($InsuredParty_Type == 'Passenger'){ echo "checked";}?>>Passenger</label>
						<label><input type="radio" class="horizontal" value="Pedestrian" name="InsuredParty_Type" <?php if($InsuredParty_Type == 'Pedestrian'){ echo "checked";}?>>Pedestrian</label>
                        <label><input type="radio" class="horizontal" value="Other" name="InsuredParty_Type" <?php if($InsuredParty_Type == 'Other'){ echo "checked";}?>>Other</label>
					</div>
                    <div class="form-horizontal col-md-12 hr-line-dashed"></div>
				</div>
				
				<div class="form-group form-horizontal col-md-12">
                	<h5 class="h4-title">Insurance Information</h5>
					<label class="col-md-2 control-label">Name</label>
					<div class="col-md-2">	
						<input type="text" id="insuranceName" name="insuranceName" class="form-control input-sm" value="<?php echo $InsuranceCompany_Name_input; ?>">
                        <input type="hidden" name="insuranceNameHidden" value="<?php echo $InsuranceCompany_Id;?>">
					</div>
					<label class="col-md-2 control-label">Select Insurance comp.</label>
					<div class="col-md-2">	
						<select class="form-control input-sm" id="insuranceCompanyId" name="insuranceCompanyId">
                            <?php foreach($InsuranceCompany_Name as $row){?>
                            <option value="<?php echo $row['InsuranceCompany_Id']; ?>" <?php if($row['InsuranceCompany_Id'] == $InsuranceCompany_Id){echo "selected";}?>><?php echo $row['InsuranceCompany_Name'];?></option>
                            <?php }?>
                        </select>
					</div>
                    <label class="col-md-1 control-label">ADJUSTER NAME</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="Adjuster_Id" name="Adjuster_Id" >
                            <option selected="selected" value=""></option>
                            <?php foreach($Adjuster_Name as $row){?>
                            <option value="<?php echo $row['Adjuster_Id']; ?>" <?php if($row['Adjuster_Id'] == $Adjuster_Id){echo "selected";}?>><?php echo $row['Adjuster_LastName'].", ".$row['Adjuster_FirstName'];?></option>
                            <?php }?>
                        </select>
					</div>
				</div>
				<div class="form-group form-horizontal col-md-12">
					<label class="col-md-2 control-label">Policy# <span class="required-field">*</span></label>
					<div class="col-md-2">	
						<input type="text" id="policyNumber" name="policyNumber" class="form-control input-sm" value="<?php echo $Policy_Number; ?>" required>
					</div>
					<label class="col-md-2 control-label">Claim#</label>
					<div class="col-md-2">	
						<input type="text" id="insClaimNumber" name="insClaimNumber" class="form-control input-sm" value="<?php echo $Ins_Claim_Number?>">
					</div>
					<div class="form-horizontal col-md-12 hr-line-dashed"></div>
				</div>
                
				
				<div class="form-group form-horizontal col-md-12">
                	<h5 class="h4-title">Accident Information</h5>
					<label class="col-md-2 control-label">D.O.A <span class="required-field">*</span></label>
					<div class="col-md-2"> <input id="accidentDate" name="accidentDate"  class="form-control input-sm datetimepicker" value="<?php echo $Accident_Date;?>" required> </div>
				</div>
				<div class="form-group form-horizontal col-sm-12 ">
                    <label class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-5">
                        <textarea rows="3" id="Accident_Address" name="Accident_Address"  class="form-control" > <?php echo $Accident_Address;?></textarea>
                    </div>
                </div>
                <div class="form-group form-horizontal col-sm-12">
                    <label class="col-sm-2 control-label">Zip</label>
                    <div class="col-sm-1">
                        <input type="text" id="Accident_Zip" name="Accident_Zip"  class="form-control input-sm" value="<?php echo $Accident_Zip;?>">
                        <!--<input type="text" placeholder=".input-sm" class="form-control input-sm">--> 
                    </div>
                    <label class="col-sm-1 control-label">State</label>
                    <div class="col-sm-1">
                        <select class="form-control input-sm"  id="Accident_State" name="Accident_State">
                            <option selected="selected" value=""></option>
                            <?php foreach($State_Name as $row){?>
                            <option value="<?php echo $row['State_Id']; ?>" <?php if($row['State_Id'] == $Accident_State){echo "selected";}?>> <?php echo $row['State_Name']; ?> </option>
                            <?php }?>
                        </select>
                    </div>
                    <label class="col-sm-1 control-label">City</label>
                    <div class="col-sm-2">
                        <input type="text" id="Accident_City" name="Accident_City" class="form-control input-sm" value="<?php echo $Accident_City;?>">
                    </div>
					<div class="form-horizontal col-md-12 hr-line-dashed"></div>
                </div>
				
				<div class="form-group form-horizontal col-lg-12">
                	<h5 class="h4-title">Other Information </h5>
					<label class="col-md-2 control-label">Status</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="status" name="status">
                            <option selected="selected" value=""></option>
                            <?php foreach($Status as $row){?>
                            <option value="<?php echo $row['Status_Type']; ?>" <?php if($row['Status_Type'] == $Status_Type){echo "selected";}?>> <?php echo $row['Status_Type']; ?> </option>
                            <?php }?>
                        </select>
					</div>
					<label class="col-md-2 control-label"> Index/AAA #</label>
					<div class="col-md-2">
						<input id="indexOrAAANumber"  name="indexOrAAANumber" type="text" class="form-control input-sm" value="<?php echo $IndexOrAAA_Number; ?>">
					</div>
				</div>
                <div class="form-group form-horizontal col-lg-12">
                	<label class="col-md-2 control-label">Denial Reason</label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="denialReasons" name="denialReasons" >
                            <option>-- Select Denial reason --</option>
                            <?php foreach($DenialReasons as $row){?>
                            <option value="<?php echo $row['DenialReasons_Id']; ?>" <?php if($row['DenialReasons_Id'] == $DenialReasons_Id){echo "selected";}?>> <?php echo $row['DenialReasons_Type']; ?> </option>
                            <?php }?>
                        </select>
					</div>
                    <label class="col-md-2 control-label">Court Name <span class="required-field">*</span></label>
					<div class="col-md-2">
						<select class="form-control input-sm" id="courtId" name="courtId" required >
                            <option selected="selected" value=""></option>
                            <?php foreach($Court as $row){?>
                            <option value="<?php echo $row['Court_Id']; ?>" <?php if($row['Court_Id'] == $Court_Id){echo "selected";}?>> <?php echo $row['Court_Name']; ?> </option>
                            <?php }?>
                        </select>
					</div>
                </div>
                
                
                
                <div class="form-group form-horizontal col-lg-12">
                	<label class="col-md-2 control-label">Treatment Info</label>
                    <div class="col-md-10">
                	<div class="table-responsive">
                        <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped add-case-table edit-case-table">
                            <thead>
                            <tr>
                                <th>D.O.S-Start</th>
                                <th>D.O.S.-End</th>
                                <th>Claim Amt.</th>
                                <th>Paid Amt.</th>
                                <th>Date Bill Sent</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="first-row">
                                <td><input id="dateOfServiceStart" name="dateOfServiceStart" class="form-control input-sm datetimepicker_Dos_Doe" value="<?php echo str_replace(" 12:00AM","",$DateOfService_Start);?>"></td>
                                <td><input id="dateOfServiceEnd"  name="dateOfServiceEnd" class="form-control input-sm datetimepicker_Dos_Doe" value="<?php echo str_replace(" 12:00AM","",$DateOfService_End);?>"></td>
                                <td><input type="number" step="0.01" id="claimAmt" name="claimAmt" class="form-control input-sm" value="<?php echo $Claim_Amount;?>"></td>
                                <td><input type="number" step="0.01" id="paidAmt" name="paidAmt" class="form-control input-sm" value="<?php echo $Paid_Amount;?>"></td>
                                <td><input id="dateBillSent" name="dateBillSent" class="form-control input-sm datetimepicker_Dos_Doe" value="<?php echo $Date_BillSent;?>"></td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                        </div>
                </div>
				<div class="form-group form-horizontal col-lg-12">
					<label class="col-md-2 control-label">Memo</label>
					<div class="col-md-4">
						<textarea rows="3"  id="memo" name="memo" class="form-control"><?php echo $Memo;?></textarea>
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>  <button type="button" id="cancel" class="btn btn-primary">Cancel</button><br><br>
					</div>
				</div>
			</form><!--form end -->
		</div><!-- End of panel-body tab-panel-->
		</div><!-- End hpanel -->
		</div><!-- End col-lg-12-->
	</div><!-- End row-->
    

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
    <script src="<?php echo base_url();?>assets/vendor/select2-3.5.2/select2.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    
    <!-- DATETIMEPICKER SCRIPTS -->
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/mask-phone/maskPhone.js"></script>
    <script src="<?php echo base_url();?>assets/datetimepicker/jscss/js/moment-with-locales.js"></script>
    <script src="<?php echo base_url();?>assets/datetimepicker/jscss/js/bootstrap-datetimepicker.js"></script>
    
    <script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/toastr/build/toastr.min.js"></script>
    <!-- App scripts --> 
    <script src="<?php echo base_url();?>assets/scripts/homer.js"></script> 

<script>
	$("#cancel").click(function(){
		$('input').val('');
		$('select').val('');
		$('textarea').val('');
		$('.datepicker_recurring_start').val(''); 
	});
	$('#checkbox1').change(function() {
		if ($(this).is(':checked')) {
			$('#InsuredPartyLastName').val($("#InjuredPartyLastName").val());
			$('#InsuredPartyFirstName').val($("#InjuredPartyFirstName").val());
			$('#InsuredParty_Address').val($("#InjuredParty_Address").val());
			$('#InsuredParty_Zip').val($("#InjuredParty_Zip").val());
			$('#InsuredParty_City').val($("#InjuredParty_City").val());
			$('#InsuredParty_State').val($("#InjuredParty_State").val());
			$('#InsuredParty_Misc').val($("#InjuredParty_Misc").val());
		}else{
			$('#InsuredPartyLastName').val("");
			$('#InsuredPartyFirstName').val("");
			$('#InsuredParty_Address').val("");
			$('#InsuredParty_Zip').val("");
			$('#InsuredParty_City').val("");
			$('#InsuredParty_State').val("");
			$('#InsuredParty_Misc').val("");
		}
		
    });
</script>
<script>
	function callSuccess() {
		swal({
			title: "Successfully submitted",
			type: "success"
		});
	}
	$('body').on('focus',".datepicker_recurring_start", function(){
		$(this).datepicker({
			"autoclose": true,
			"todayHighlight": true,
			"selectOtherMonths": true
		});
	});
</script>
<script>
	$("#addCaseForm").validate({
	
		rules: {
			injuredPartyLastName: {
				required: true,
				minlength: 3
			},
			injuredPartyFirstName: {
				required: true,
				minlength: 3
			},
			policyNumber:{
				required: true
			},
			accidentDate:{
				required: true
			},
			courtId:{
				required: true
			},
			claimAmt: {
				number: true
			},
			paidAmt: {
				number: true
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
				url:"<?php echo base_url(); ?>dataentry/Update_CaseInfo",
				type: "post",
				data: serializedData
			});

			// callback handler that will be called on success
			request.done(function (response, textStatus, jqXHR) {
				callSuccess();
			});

			// callback handler that will be called on failure
			request.fail(function (jqXHR, textStatus, errorThrown) {
				// log the error to the console
				console.error(
					"The following error occured: " + textStatus, errorThrown);
			});

			// callback handler that will be called regardless
			// if the request failed or succeeded
			request.always(function () {
				// reenable the inputs
				$inputs.prop("disabled", false);
			});

		}
	});
	
	$('#providerId').on('change', function() {
		var providerName =$("#providerId option:selected").text();
		var providerId =$("#providerId option:selected").val();
		console.log("providerName:"+providerName+" providerId:"+providerId);
		$("input[name=providerName]").val(providerName);
		$("input[name=providerNameHidden]").val(providerId);
	});
	$('#insuranceCompanyId').on('change', function() {
		var insuranceName =$("#insuranceCompanyId option:selected").text();
		var insuranceId =$("#insuranceCompanyId option:selected").val();
		$("input[name=insuranceName]").val(insuranceName);
		$("input[name=insuranceNameHidden]").val(insuranceId);
	});
	$("input[name=providerName]").prop("disabled", true);
	$("input[name=insuranceName]").prop("disabled", true);
	
	$('body').on('focus',".datetimepicker", function(){
		$(this).datetimepicker({
			format:'YYYY/MM/DD HH:mm:ss'
		})
	});
	$('body').on('focus',".phone-format", function(){
		$(this).mask("999-999-9999");
	});
	$('body').on('focus',".datetimepicker_Dos_Doe", function(){
		$(this).datetimepicker({
			format:'MM/DD/YYYY HH:mm:ss'
		})
	});
	
</script>
<script>
	$('.dataentry').addClass('active');
	$('.addCaseInfo').addClass('active');
</script>
</body>
</html>