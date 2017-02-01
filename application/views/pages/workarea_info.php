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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.css" />
    
    <!-- DATETIMEPICKER CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/datetimepicker/jscss/css/bootstrap-datetimepicker.css" />
    
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
<?php include 'header.php'; ?>

<!-- Navigation -->
<?php include 'sidebar.php';?>
<!-- Main Wrapper -->
<div id="wrapper"> 
<div class="content">
<?php $months = array("Just", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "jan");
foreach($CaseInfo as $row){$Case_AutoId = $row['Case_AutoId']; $Case_Id = $row['Case_Id']; $Claim_Amount = $row['Claim_Amount']; $Paid_Amount = $row['Paid_Amount']; $DateOfService_Start = $row['DateOfService_Start']; $DateOfService_End = $row['DateOfService_End']; $Date_BillSent = $row['Date_BillSent']; $Provider_Name_fix = $row['Provider_Name']; $Provider_Id_fix = $row['Provider_Id']; $Check_Status=$row['Status']; }

for($i=0; $i<=13; $i++){
	if(substr($DateOfService_Start, 0, 3) == $months[$i]){
		if($i<10){
			if(substr($DateOfService_Start, 4, 1) == " "){
				$DateOfService_Start7 = substr_replace($DateOfService_Start,"0",4,1);
				if($i == 13){
					$DateOfService_Start2 = str_replace($months[$i]." ","01/",$DateOfService_Start7);
				}else{
					$DateOfService_Start2 = str_replace($months[$i]." ","0".$i."/",$DateOfService_Start7);
				}
				
			}else{
				if($i == 13){
					$DateOfService_Start2 = str_replace($months[$i]." ","01/",$DateOfService_Start);
				}else{
					$DateOfService_Start2 = str_replace($months[$i]." ","0".$i."/",$DateOfService_Start);
				}
				
			}
		}else{
			$DateOfService_Start2 = str_replace($months[$i]." ",$i."/",$DateOfService_Start);
		}
		$DateOfService_Start3 = substr_replace($DateOfService_Start2,"/",strpos($DateOfService_Start2," "),1);
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
					$DateOfService_End2 = str_replace($months[$i]." ","01/",$DateOfService_End7);
				}else{
					$DateOfService_End2 = str_replace($months[$i]." ","0".$i."/",$DateOfService_End7);
				}
			}else{
				if($i == 13){
					$DateOfService_End2 = str_replace($months[$i]." ","01/",$DateOfService_End);
				}else{
					$DateOfService_End2 = str_replace($months[$i]." ","0".$i."/",$DateOfService_End);
				}
			}
		}else{
			$DateOfService_End2 = str_replace($months[$i]." ",$i."/",$DateOfService_End);
		}
		$DateOfService_End3 = substr_replace($DateOfService_End2,"/",strpos($DateOfService_End2," "),1);
		$DateOfService_End = $DateOfService_End3;
		break;
	}
}

?>

	<div class="row">
		<div class="col-lg-12">
		<div class="hpanel">
			<ul class="nav nav-tabs view-case-navigation">
				<li class="active"><a id="tab1" data-toggle="tab" href="#tab-1">Case Information</a></li>
				<li class=""><a id="tab2" data-toggle="tab" href="#tab-2">Extended case info</a></li>
				<?php if($Admin) {?><li class=""><a id="tab3" data-toggle="tab" href="#tab-3">Notes</a></li><?php } ?>
				<li class=""><a href="/casemanager/search/Document_Manager">Document Manager</a></li>
                
                <?php if($Accessibility == 2) {?><li class=""><a id="tabMotions" data-toggle="tab" href="#tab-Motions">Motions</a></li><?php } ?>
                <?php if($Accessibility == 2) {?><li class=""><a id="tabTrials" data-toggle="tab" href="#tab-Trials">Trials</a></li><?php } ?>
                
				<?php if($Admin) {?><li class=""><a id="tab5" data-toggle="tab" href="#tab-5">Templates</a></li><?php } ?>
				<li class=""><a id="tab6" data-toggle="tab" href="#tab-6">Settlement</a></li>
				<!--<li class=""><a id="tab7" data-toggle="tab" href="#tab-7">New Settlement</a></li>-->
				<?php if($Admin) {?><li class=""><a id="tab8" data-toggle="tab" href="#tab-8">Payment</a></li>
				<li class=""><a id="tab9" data-toggle="tab" href="#tab-9">Events</a></li><?php } ?>
			</ul>
			<div class="tab-content">
				<div id="tab-1" class="tab-pane active">
					<div class="row">
					<div class="col-lg-12">
					<div class="hpanel">
					<div class="panel-heading"></div>
					<div class="panel-body tab-panel">
                    <div class="form-group form-horizontal col-md-12">
                    	<h5 class="h4-title">Workarea Information</h5>
                      	<!--<div class="col-md-2"><div class="col-md-6 case-info-id">Old Case Id:</div><div class="col-md-6 old-case-id case-info-id-data"></div></div>-->
                        <div class="col-md-2"><div class="col-md-5 case-info-id">Case Id:</div><div class="col-md-6 case-id case-info-id-data"></div></div>
                    </div>
						<div class="form-group form-horizontal col-md-10">                
						<div class="table-responsive">
							<table cellpadding="1" id="WorkAreaTable" cellspacing="1" class="table tdAlignLeft work-area-info">
								<tbody>
								<tr> 
                                	<th><input type="hidden" name="selectRecordNo" value="1"><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
									<th>PROVIDER</th>
									<td><div class="visible"><input type="hidden" id="Hidden_Provider_Id"><a class="info-link VisibleInfo" id="ProviderInfoLink"></a></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="Provider_Id" name="Provider_Id"><option selected="selected" value=""></option><?php foreach($Provider_Name1 as $row){?><option value="<?php echo $row['Provider_Id']; ?>"> <?php echo $row['Provider_Name']; ?> </option><?php }?></select></div></td>
                                    <th><input type="hidden" name="recordNo" value="2"><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save fa-save1" style="display:none"></i></th>
									<th>CASE STATUS</th>
									<td><div class="visible"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="Initial_Status" name="Initial_Status"><option selected="selected" value=""></option><?php foreach($CaseStatus as $row){?><option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option><?php }?></select></div></td>
								</tr>
                                
								<tr>  
                                	<th><input type="hidden" name="recordNo" value="3"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save fa-save1" style="display:none"></i></th>
									<th>INJURED NAME</th>
									<td><div class="visible"><input type="hidden" id="Hidden_Case_AutoId"><a class="info-link VisibleInfo" id="InjuredInfoLink"></a></div><div class="editHidden" style="display:none;"><label>Last Name: </label><input type="text" class="input-sm" name="InjuredParty_LastName" /><label>First Name: </label><input type="text" class="input-sm" name="InjuredParty_FirstName" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="4"><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
									<th>CURRENT STATUS</th>
									<td><div class="visible"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="Status" name="Status"><option selected="selected" value=""></option><?php foreach($Status as $row){?><option value="<?php echo $row['Status_Id']; ?>"> <?php echo $row['Status_Type']; ?> </option><?php }?></select></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="5"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
									<th>INSURED NAME</th>
									<td><div class="visible"><a class="info-link VisibleInfo" id="InsuredInfoLink"></a></div><div class="editHidden" style="display:none;"><label>Last Name: </label><input type="text" class="input-sm" name="InsuredParty_LastName" /><label>First Name: </label><input type="text" class="input-sm" name="InsuredParty_FirstName" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="6"><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
									<th>INS. CLAIM #</th>
									<td><div class="visible"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Ins_Claim_Number" /></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="7"><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
									<th>POLICY #</th>
									<td><div class="visible"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Policy_Number" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="8"><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
									<th>INDEX / AAA #</th>
									<td><div class="visible"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="IndexOrAAA_Number" /></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="9"><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
									<th>INSURANCE COMPANY</th>
									<td><div class="visible"><input type="hidden" id="Hidden_InsuranceCompany_Id"><a class="info-link VisibleInfo" id="InsuranceCompanyInfoLink"></a></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="InsuranceCompany_Id" name="InsuranceCompany_Id"><option selected="selected" value=""></option><?php foreach($InsuranceCompany_Name as $row){?><option value="<?php echo $row['InsuranceCompany_Id']; ?>"><?php echo $row['InsuranceCompany_Name'];?></option><?php }?></select></div></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" name="recordNo" value="10"><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
									<th>DEF ATTORNEY NAME</th>
									<td><div class="visible"><input type="hidden" id="Hidden_Defendant_Id"><a class="info-link VisibleInfo" id="DefendantInfoLink"></a></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="Defendant_Id" name="Defendant_Id" required><option selected="selected" value=""></option><?php foreach($Defendant_Name as $row){?><option value="<?php echo $row['Defendant_id']; ?>"><?php echo $row['Defendant_Name'];?></option><?php }?></select></div></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="11"><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
									<th>DEF ATTORNEY FILE #</th>
									<td><div class="visible"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Attorney_FileNumber" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="12"><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
									<th>COURT NAME</th>
									<td><div class="visible"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="Court_Id" name="Court_Id"><option selected="selected" value=""></option><?php foreach($Court as $row){?><option value="<?php echo $row['Court_Id']; ?>"> <?php echo $row['Court_Name']; ?> </option><?php }?></select></div></td>
								</tr>
                                
                                <tr> 
                                	<th><!--<input type="hidden" name="recordNo" value="13"><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i>--></th>
									<th>CLAIM AMOUNT</th>
									<td><div class="visible"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Claim_Amount" /></div></td>
                                    <th><!--<input type="hidden" name="recordNo" value="14"><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i>--></th>
									<th>PAID / Balance</th>
									<td><div class="visible"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Paid_Amount" /></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="15"><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
									<th>ASSIGN TO WORK DESK</th>
									<td><div class="visible"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="selectAssignUser" name="selectAssignUser"><option selected="selected" value="">Select User to Assign</option><?php foreach($User_List as $row){?><option value="<?php echo $row['UserName']; ?>"><?php echo $row['UserName'];?></option><?php  }?></select></div></td>
                                    <th><input type="hidden" name="recordNo" value="16"><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
									<th>OLD CASE ID</th>
									<td><div class="visible"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Old_Case_Id" /></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="17"><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
									<th>DATE OF ACCIDENT</th>
									<td><div class="visible"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm datetimepicker_Dos_Doe" name="Accident_Date" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="18"><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
									<th>ADJUSTER</th>
									<td><div class="visible"><input type="hidden" id="Hidden_Adjuster_Id"><a class="info-link VisibleInfo" id="AdjusterInfoLink"></a></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="Adjuster_Id" name="Adjuster_Id"><?php foreach($Adjuster_Name as $row){?><option value="<?php echo $row['Adjuster_Id']; ?>"> <?php echo $row['Adjuster_FirstName']." ".$row['Adjuster_LastName']; ?> </option><?php }?></select></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="19"><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
									<th>PLAINTIFF ATTORNEY CO.</th>
									<td><div class="visible"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="Plaintiff_Id" name="Plaintiff_Id"><option selected="selected" value=""></option><?php foreach($Plantiff as $row){?><option value="<?php echo $row['Attorney_id']; ?>"> <?php echo $row['Attorney_Name']; ?> </option><?php }?></select></div></td>
                                    <th></th>
									<th></th>
									<td></td>
								</tr>
                                
                                </tbody>
							</table>
						</div>
						</div>
                        <div class="form-group form-horizontal col-lg-12">
                            	<table id="Treatement_Info_table" class="table dataTable tdAlignLeft-bottom">
                                    <thead>
                                    <tr>
                                    	<?php if($Admin) {?><th>Edit</th><?php } ?>
                                        <th>D.O.S-Start</th>
										<th>D.O.S.-End</th>
										<th>Claim Amt.</th>
										<th>Paid Amt.</th>
                                        <th>Total Balance</th>
										<th>Date Bill Sent</th>
                                        <th>Service Type</th>
                                        <th>Denial Reason</th>
                                        <?php if($Admin) {?><th>Delete</th><?php  } ?>
                                    </tr>
                                    </thead>
                                    <?php if($Admin) {?>
                                    <tfoot>
                                      <tr class="first-row">
                                            <td></td>
                                            <td><input id="dateOfServiceStart" name="dateOfServiceStart" class="form-control input-sm datetimepicker_Dos_Doe dos-input"></td>
                                            <td><input id="dateOfServiceEnd"  name="dateOfServiceEnd" class="form-control input-sm datetimepicker_Dos_Doe dos-input"></td>
                                            <td><input type="number" step="0.01" id="claimAmt" name="Claim_Amount_treat" class="form-control input-sm amt-input"></td>
                                            <td><input type="number" step="0.01" id="paidAmt" name="Paid_Amount_treat" class="form-control input-sm amt-input"></td>
                                            <td><input type="number" step="0.01" id="TotalBalance" name="TotalBalance" class="form-control input-sm amt-input" disabled></td>
                                            <td><input id="dateBillSent" name="Date_BillSent_treat" class="form-control input-sm datetimepicker_Dos_Doe dos-input"></td>
                                            <td><select class="form-control input-sm" id="serviceType" name="serviceType">
                                            <option>-- Select Service--</option>
                                            <?php foreach($Service as $row){?>
                                            <option value="<?php echo $row['ServiceType']; ?>"> <?php echo $row['ServiceType']; ?> </option>
                                            <?php }?>
                                        </select></td>
                                            <td><select class="form-control input-sm" id="denialReasons" name="denialReasons" >
                                                    <option>-- Select Denial reason --</option>
                                                    <?php foreach($DenialReasons as $row){?>
                                                    <option value="<?php echo $row['DenialReasons_Type']; ?>"> <?php echo $row['DenialReasons_Type']; ?> </option>
                                                    <?php }?>
                                                </select></td>
                                            <td><span><button type="button" id="addOtherInfo" class="btn btn-primary create">Add</button></span></td>
                                        </tr>
                                    </tfoot>
                                    <?php } ?>
                                </table>
						</div>
                        
                        <div class="form-group form-horizontal col-lg-12 payment-summary-delete">
                        	<div class="col-md-2"><br><h5 class="h4-title">Payment Summary Information</h5></div>
                            <?php if($Admin) {?>
                        	<div class="col-md-8"></div>
                            <div class="col-md-2 deleteTreatementButton"><button type="button" id="deleteTreatementButton" class="btn btn-primary"><i class="fa fa-trash-o"></i> Delete Checked</button></div>
                            <?php } ?>
                        </div>
                        
                        <div class="form-group form-horizontal col-lg-12">
                            	<table id="Payment_Info_table" class="table dataTable tdAlignLeft-bottom payment-summary">
                                    <thead>
                                    <tr>
                                    	<th></th>
										<th>D.O.S-Start</th>
										<th>D.O.S.-End</th>
										<th>Total Claim Amt.</th>
										<th>Total Paid Amt.</th>
                                        <th>Total Balance</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                      <tr class="first-row">
                                            <td></td>
                                            <td><input id="dateOfServiceStart" name="dateOfServiceStart" class="form-control input-sm datetimepicker_Dos_Doe dos-input" value="<?php echo substr($DateOfService_Start, 0, 10);?>"></td>
                                            <td><input id="dateOfServiceEnd"  name="dateOfServiceEnd" class="form-control input-sm datetimepicker_Dos_Doe dos-input" value="<?php echo substr($DateOfService_End,0, 10);?>"></td>
                                            <td><input type="text" step="0.01" id="claimAmt" name="claimAmt" class="form-control input-sm amt-input" value="<?php echo "$".number_format($Claim_Amount, 2);?>"></td>
                                            <td><input type="text" step="0.01" id="paidAmt" name="paidAmt" class="form-control input-sm amt-input" value="<?php echo "$".number_format($Paid_Amount, 2);?>"></td>
                                            <td><input type="text" step="0.01" id="balance" name="balance" class="form-control input-sm amt-input" value="<?php echo "$".number_format($Claim_Amount-$Paid_Amount, 2);?>"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                      </tr>
                                </table>
						</div>
                        <form id="addNotes_form" method="post">
						<div class="form-group form-horizontal col-lg-12">
						<br><h5 class="h4-title">Notes Information</h5>
							<label class="col-md-2 control-label">Description</label>
							<div class="col-md-4">
                                <textarea rows="2"  id="notesDescription" name="notesDescription" class="form-control" ></textarea>
                                <input type="hidden" name="notesAccidentDate"  class="notesAccidentDate">
                            </div>
						</div>				
                        <div class="form-group form-horizontal col-lg-12">
                        	<label class="col-md-2 control-label">Type</label>
                            <div class="col-md-6 radio">
                                <label><input type="radio" class="horizontal" value="ACTIVITY" id="activity" name="notesType" checked>ACTIVITY</label>
                                <label><input type="radio" class="horizontal" value="CALENDAR" id="calendar" name="notesType">CALENDAR</label>
                                <label><input type="radio" class="horizontal" value="GENERAL" id="general" name="notesType">GENERAL</label>
                                <label><input type="radio" class="horizontal" value="POPUP" id="popup" name="notesType">POPUP</label>
                                <label><input type="radio" class="horizontal" value="PROVIDER" id="provider" name="notesType">PROVIDER</label>
                                &nbsp;&nbsp;<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Add Notes</button>
                            </div>
                        </div>
                        <!--<div class="form-group form-horizontal col-lg-12">
                            <div class="col-md-9"></div>
                            <div class="col-md-1">
                            	<select class="form-control input-sm" id="" name="">
                                    <option value="">ACTIVITY</option>
                                    <option value="">CALENDAR</option>
                                    <option value="">GENERAL</option>
                                    <option value="">POPUP</option>
                                    <option value="">PROVIDER</option>
                                </select>
                            </div>
                            <div class="col-md-1"><button type="button" class="btn btn-primary">Filter</button></div>
                        </div> -->	
                        </form> 	 	
                        <div class="form-group form-horizontal col-md-12">
                        <!--<form action="/casemanager/search/getNotes" method="post">
                        	<input type="hidden" name="recordNo" name="Case_Id" value="NB09-1">
                            <button type="submit">Sub</button>
                        </form>-->
                        
                        
                        <h5 class="h4-title">Notes Details</h5>
                            <div class="col-md-12">
                                <table id="NotesTab1" class="table dataTable table-bordered table-striped tdAlignLeft-bottom">
                                    <thead>
                                    <tr>
                                    	<th>Notes Desc.</th>
                                        <th>Editted By</th>
                                        <th>Date Editted</th>
                                        <th>Time</th>
                                        <th>Type</th>
                                    </tr>
                                
                                </thead>
                                </table>
                                
                            </div>
                        </div>
                        

						
					</div><!-- End of panel-body tab-panel-->
					</div><!-- End hpanel -->
					</div><!-- End col-lg-12-->
				</div><!-- End row-->
				</div><!--End of Case info Tab-->
                
				<div id="tab-2" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
						<div class="hpanel">
						<div class="panel-heading"></div>
						<div class="panel-body tab-panel">
							<div class="form-group form-horizontal col-md-8">
								<h5 class="h4-title">Workarea Information</h5>
								<div class="table-responsive">
									<table cellpadding="1" id="ExtendedCase_Info_table" cellspacing="1" class="table tdAlignLeft work-area-info-tab2">
										<tbody>
										<tr>
											<th></th>		
											<th>DATE FILE OPENED</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Date_Opened" /></div></td>
											<th><input type="hidden" name="recordNo" value="22"><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
											<th>PLAINTIFF DISCOVERY COMPLETED</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Plaintiff_Discovery_Due_Date" /></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="23"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th> 
											<th>DATE OF ACCIDENT</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Accident_Date" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="24"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
											<th>DATE REPLY TO DISC CONF LETTER Recd</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Date_Reply_To_Disc_Conf_Letter_Recd" /></div></td>
										</tr>
										<tr> 
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="25"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>			
											<th>DATE BILL SUBMITED</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Date_Bill_Submitted" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="26"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
											<th>DATE EXT OF TIME 1</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Date_Ext_Of_Time" /></div></td>
										</tr>
										<tr> 
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="27"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>	 			 
											<th>DATE STATUS CHANGED</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Date_Status_Changed" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="28"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
											<th>DATE EXT OF TIME 2</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Date_Ext_Of_Time_2" /></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="29"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th> 			 
											<th>DATE SUMMONS PRINTED</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Date_Summons_Printed" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="30"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
											<th>DATE EXT OF TIME 3</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Date_Ext_Of_Time_3" /></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="31"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>			
											<th>DATE INDEX NUMBER PURCHASED </th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Date_Index_Number_Purchased" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="32"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
											<th>DEFENDANT'S DISCOVERY RECEIVED</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Defendant_Discovery_Due_Date" /></div></td>
										</tr>
										<tr> 
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="33"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>			
											<th>DATE SUMMONS SENT TO COURT</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Date_Summons_Sent_Court" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="34"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
											<th>DATE DISCOVERY CONF LETTER PRINTED</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Date_Disc_Conf_Letter_Printed" /></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="35"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th> 			
											<th>DATE SUMMONS SERVED</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Served_On_Date" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="36"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
											<th>STIPS SIGNED & RETURNED 1</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><select name="stips_signed_and_returned" id="stips_signed_and_returned" class="form-control input-sm"><option selected="selected" value="0">No</option><option value="1">Yes</option></select></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="37"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th> 			
											<th>SERVED TO</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Served_To" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="38"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
											<th>STIPS SIGNED & RETURNED 2</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><select name="stips_signed_and_returned_2" id="stips_signed_and_returned_2" class="form-control input-sm"><option selected="selected" value="0">No</option><option value="1">Yes</option></select></div></td>
										</tr>
										<tr> 
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="39"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>			
											<th>SUMMONS SERVE TIME</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_only_time" name="Served_On_Time" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="40"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
											<th>STIPS SIGNED & RETURNED 3</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><select name="stips_signed_and_returned_3" id="stips_signed_and_returned_3" class="form-control input-sm"><option selected="selected" value="0">No</option><option value="1">Yes</option></select></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="41"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th> 	 			
											<th>DATE AFFIDAVIT FILED</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Date_Afidavit_Filed" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="42"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
											<th>DATE SUMMONS CLOSED</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Date_Closed" /></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="43"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th> 	 			
											<th>DATE ANSWER RCVD</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Date_Answer_Received" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="44"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
											<th>AAA CONCILIATION DATE</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="AAA_Conciliation_Date" /></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="45"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>			
											<th>OUR DISCOVERY DEMAND</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Our_Discovery_Demands" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="46"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>
											<th>ARB AWARD DATE</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Arb_Award_Date" /></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="47"></i><i title="Save" class="fa fa-save" style="display:none"></i><i title="Cancel" class="fa fa-times" style="display:none"></i></th>			
											<th>DATE DEMAND PRINTED</th>
											<td><div class="visible"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_Dos_Doe" name="Date_Demands_Printed" /></div></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div><!-- End of panel-body tab-panel-->
						</div><!-- End hpanel -->
						</div><!-- End col-lg-12-->
					</div><!-- End row-->
				</div><!--End of Extended info Tab-->
                
				<div id="tab-3" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
						<div class="hpanel">
						<div class="panel-heading"></div>
						<div class="panel-body tab-panel">
                        	<form id="addNotes_form2" method="post">
							<div class="form-group form-horizontal col-md-12">
								<h5 class="h4-title">Notes Module</h5>
								<label class="col-md-2 control-label">Description</label>
								<div class="col-md-4">
									<textarea rows="3"  id="notesDescription2" name="notesDescription" class="form-control" ></textarea>
                                    <input type="hidden" class="notesAccidentDate" name="notesAccidentDate"  class="form-control input-sm" value="">
								</div>
                                <label class="col-md-1 control-label">Memo</label>
                                <div class="col-md-4">
									<textarea rows="3"  id="notesDescription2" name="notesDescription" class="form-control" ></textarea>
								</div>
							</div>
							<div class="form-group form-horizontal col-lg-12">
								<label class="col-md-2 control-label">Type</label>
								<div class="col-md-6 radio">
									<label><input type="radio" class="horizontal" value="ACTIVITY" id="activity" name="notesType" checked>ACTIVITY</label>
									<label><input type="radio" class="horizontal" value="CALENDAR" id="calendar" name="notesType">CALENDAR</label>
									<label><input type="radio" class="horizontal" value="GENERAL" id="general" name="notesType">GENERAL</label>
									<label><input type="radio" class="horizontal" value="POPUP" id="popup" name="notesType">POPUP</label>
									<label><input type="radio" class="horizontal" value="PROVIDER" id="provider" name="notesType">PROVIDER</label>
                                    &nbsp;&nbsp;<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Add Notes</button>
								</div>
							</div>
							<!--<div class="form-group form-horizontal col-lg-12">
								<div class="col-md-9"></div>
								<div class="col-md-1">
									<select class="form-control input-sm" id="" name="">
										<option value="ACTIVITY">ACTIVITY</option>
										<option value="CALENDAR">CALENDAR</option>
										<option value="GENERAL">GENERAL</option>
										<option value="POPUP">POPUP</option>
										<option value="PROVIDER">PROVIDER</option>
									</select>
								</div>
								<div class="col-md-1"><button type="button" class="btn btn-primary">Filter</button></div>
							</div>-->
                            <div class="form-group form-horizontal col-lg-12">
                            	<div class="col-md-11"></div>
                            	<div class="col-md-1"><button type="button" id="deleteNotesButton" class="btn btn-primary"><i class="fa fa-trash-o"></i> Delete</button></div>
                            </div>
                            </form>
							<div class="form-group form-horizontal col-lg-12">
								<h5 class="h4-title">Notes Details</h5>
									<div class="col-md-12">
										<table id="NotesTab3" class="table dataTable table-bordered tdAlignLeft-bottom table-striped">
											<thead>
											<tr>
                                            	<th>Edit</th>
												<th>Notes Desc.</th>
												<th>Editted By</th>
												<th>Date Editted</th>
                                                <th>Time Editted</th>
												<th>Type</th>
                                                <th>Notes Id</th>
											</tr>
											</thead>
										</table>
									</div>
							</div>
						</div><!-- End of panel-body tab-panel-->
						</div><!-- End hpanel -->
						</div><!-- End col-lg-12-->
					</div><!-- End row-->
                 </div><!--End of Notes Tab-->
				
				<div id="tab-4" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
						<div class="hpanel">
						<div class="panel-heading"></div>
						<div class="panel-body tab-panel">
							
						</div><!-- End of panel-body tab-panel-->
						</div><!-- End hpanel -->
						</div><!-- End col-lg-12-->
					</div><!-- End row-->
				</div><!--End of Document Manager tab-->
                
				<div id="tab-5" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
						<div class="hpanel">
						<div class="panel-heading"></div>
						<div class="panel-body tab-panel">
                        	<form action="<?php echo base_url();?>search/EditTemplate" method="post">
							<div class="form-group form-horizontal col-md-12">
								<br><h5 class="h4-title">Template Manager </h5>
								<div class="col-sm-2"></div>
								<div class="col-sm-4">List of available templates
                                	<input type="hidden" name="Templates_Case_AutoId" value="<?php echo $Case_AutoId;?>" />
                                	<select size="4" name="TemplateName" id="TemplateName" class="form-control input-sm input-rows" style="height:520px;width:900px;">
                                        <option value="10 DAY LETTER (AB)">10 DAY LETTER (AB)</option>
                                        <option value="10 DAY LETTER">10 DAY LETTER</option>
                                        <option value="AAA FORM AR (Amended)">AAA FORM AR (Amended)</option>
                                        <option value="AAA FORM AR">AAA FORM AR</option>
                                        <option value="AB-SETTLEMENT-PRTIAL-STIP-AB">AB-SETTLEMENT-PRTIAL-STIP-AB</option>
                                        <option value="AB-SETTLEMENT-STIP-AB">AB-SETTLEMENT-STIP-AB</option>
                                        <option value="AFFIDAVIT FOR EMGNCV">AFFIDAVIT FOR EMGNCV</option>
                                        <option value="AFFIDAVIT FOR PROVIDERS MRI-SUPPLIES-OWNER">AFFIDAVIT FOR PROVIDERS MRI-SUPPLIES-OWNER</option>
                                        <option value="Affidavit Negative IME - PT">Affidavit Negative IME - PT</option>
                                        <option value="AFFIDAVIT OF PROVIDER (Chiro Negative IME) 2">AFFIDAVIT OF PROVIDER (Chiro Negative IME) 2</option>
                                        <option value="AFFIDAVIT OF PROVIDER (Chiro Negative IME)">AFFIDAVIT OF PROVIDER (Chiro Negative IME)</option>
                                        <option value="AFFIDAVIT OF PROVIDER (EMGNCV and Negative IME)">AFFIDAVIT OF PROVIDER (EMGNCV and Negative IME)</option>
                                        <option value="AFFIDAVIT OF PROVIDER (EMGNCV AND ROM)">AFFIDAVIT OF PROVIDER (EMGNCV AND ROM)</option>
                                        <option value="AFFIDAVIT OF PROVIDER (MRI)">AFFIDAVIT OF PROVIDER (MRI)</option>
                                        <option value="AFFIDAVIT OF PROVIDER (MRI-Shoulder)">AFFIDAVIT OF PROVIDER (MRI-Shoulder)</option>
                                        <option value="AFFIDAVIT OF PROVIDER (NEGATIVE IME-PT)">AFFIDAVIT OF PROVIDER (NEGATIVE IME-PT)</option>
                                        <option value="AFFIDAVIT OF PROVIDER (PT AND ROM)">AFFIDAVIT OF PROVIDER (PT AND ROM)</option>
                                        <option value="AFFIDAVIT OF PROVIDER FOR  EMGNCV (A)">AFFIDAVIT OF PROVIDER FOR  EMGNCV (A)</option>
                                        <option value="AFFIDAVIT OF PROVIDER FOR CHIRO NEGATIVE IME (A)">AFFIDAVIT OF PROVIDER FOR CHIRO NEGATIVE IME (A)</option>
                                        <option value="AFFIDAVIT OF PROVIDER FOR MRI">AFFIDAVIT OF PROVIDER FOR MRI</option>
                                        <option value="AFFIDAVIT OF PROVIDER FOR NON RECEIVAL OF VER. REQST 2">AFFIDAVIT OF PROVIDER FOR NON RECEIVAL OF VER. REQST 2</option>
                                        <option value="AFFIDAVIT OF PROVIDER FOR NON RECEIVAL OF VER. REQST">AFFIDAVIT OF PROVIDER FOR NON RECEIVAL OF VER. REQST</option>
                                        <option value="AFFIDAVIT OF PROVIDER- CHIRO NEGATIVE IME">AFFIDAVIT OF PROVIDER- CHIRO NEGATIVE IME</option>
                                        <option value="AFFIDAVIT OF SERVICE BY MAIL">AFFIDAVIT OF SERVICE BY MAIL</option>
                                        <option value="AFFIDAVIT OF SERVICE FOR MANI PROCESS SERVER">AFFIDAVIT OF SERVICE FOR MANI PROCESS SERVER</option>
                                        <option value="AFFIDAVIT OF SERVICE FOR PROCESS COMPANIES">AFFIDAVIT OF SERVICE FOR PROCESS COMPANIES</option>
                                        <option value="AFFIDAVIT- EMGNCV">AFFIDAVIT- EMGNCV</option>
                                        <option value="AFFIDAVIT-FOR-DEFAULT MOTION(PHI)">AFFIDAVIT-FOR-DEFAULT MOTION(PHI)</option>
                                        <option value="AFFIDAVIT-FOR-DEFAULT MOTION">AFFIDAVIT-FOR-DEFAULT MOTION</option>
                                        <option value="AFFIRMATION- AFFIRMATION IN REPLY WO AFFIDAVIT (VG)">AFFIRMATION- AFFIRMATION IN REPLY WO AFFIDAVIT (VG)</option>
                                        <option value="AFFIRMATION- AFFIRMATION IN REPLY">AFFIRMATION- AFFIRMATION IN REPLY</option>
                                        <option value="BI - RETAINER STATEMENT">BI - RETAINER STATEMENT</option>
                                        <option value="BI- AUTHORIZATION FOR NO-FAULT">BI- AUTHORIZATION FOR NO-FAULT</option>
                                        <option value="BI- DEMAND LETTER">BI- DEMAND LETTER</option>
                                        <option value="BI- Letter of Rep to PRPTY">BI- Letter of Rep to PRPTY</option>
                                        <option value="BI- LETTER OF REPRESENTATION NF-2 FORM">BI- LETTER OF REPRESENTATION NF-2 FORM</option>
                                        <option value="BI- LETTER OF REPRESENTATION">BI- LETTER OF REPRESENTATION</option>
                                        <option value="BI- NOTICE OF CLAIM - sidewalk NYC">BI- NOTICE OF CLAIM - sidewalk NYC</option>
                                        <option value="BI- RETAINER AGREEMENT w-PATIENT">BI- RETAINER AGREEMENT w-PATIENT</option>
                                        <option value="BI-Request for Medical records and Bills">BI-Request for Medical records and Bills</option>
                                        <option value="BRUNO-GERBINO-RESPONSE-FOR-PROOF-OF-FILING">BRUNO-GERBINO-RESPONSE-FOR-PROOF-OF-FILING</option>
                                        <option value="CONSENT TO CHANGE ATTORNEY LIST OF ACTIONS">CONSENT TO CHANGE ATTORNEY LIST OF ACTIONS</option>
                                        <option value="COVER LETTER FOR RESUBMISSION OF BILLS">COVER LETTER FOR RESUBMISSION OF BILLS</option>
                                        <option value="COVER PG FOR CHANGE OF ATTORNY CONSENT">COVER PG FOR CHANGE OF ATTORNY CONSENT</option>
                                        <option value="COVER PG OF STIP AGREEMENT BY BOTH PARTIES-AB">COVER PG OF STIP AGREEMENT BY BOTH PARTIES-AB</option>
                                        <option value="COVER PG OF STIP AGREEMENT BY BOTH PARTIES">COVER PG OF STIP AGREEMENT BY BOTH PARTIES</option>
                                        <option value="COVER PG OF UNVERIFIED RESPONSE(AB)">COVER PG OF UNVERIFIED RESPONSE(AB)</option>
                                        <option value="COVER PG OF UNVERIFIED RESPONSE">COVER PG OF UNVERIFIED RESPONSE</option>
                                        <option value="COVER PG OF VERIFIED RESPONSE">COVER PG OF VERIFIED RESPONSE</option>
                                        <option value="DEFAULT JUDGMENT EXECUTION LETTER">DEFAULT JUDGMENT EXECUTION LETTER</option>
                                        <option value="DISCOVERY FOR SHORT AND BILLY, PC 22 ROGS">DISCOVERY FOR SHORT AND BILLY, PC 22 ROGS</option>
                                        <option value="DISCOVERY- FOR- GERBER AND GERBER 10 CD">DISCOVERY- FOR- GERBER AND GERBER 10 CD</option>
                                        <option value="DISCOVERY-FOR-ABRAMS COHEN AND  ASSOCIATES-10 ROGS">DISCOVERY-FOR-ABRAMS COHEN AND  ASSOCIATES-10 ROGS</option>
                                        <option value="DISCOVERY-FOR-ABRAMS COHEN AND  ASSOCIATES-17 ROGS 31 DD">DISCOVERY-FOR-ABRAMS COHEN AND  ASSOCIATES-17 ROGS 31 DD</option>
                                        <option value="DISCOVERY-FOR-ABRAMS COHEN AND  ASSOCIATES-31 ROGS">DISCOVERY-FOR-ABRAMS COHEN AND  ASSOCIATES-31 ROGS</option>
                                        <option value="DISCOVERY-FOR-ALI-AND-BAINS-PC-7-ROGS-AND-DI">DISCOVERY-FOR-ALI-AND-BAINS-PC-7-ROGS-AND-DI</option>
                                        <option value="DISCOVERY-FOR-ALOY-IBUZOR- 34 ROGS 32 DNI_files">DISCOVERY-FOR-ALOY-IBUZOR- 34 ROGS 32 DNI_files</option>
                                        <option value="DISCOVERY-FOR-ALOY-IBUZOR- 36 ROGS 34 DNI_files">DISCOVERY-FOR-ALOY-IBUZOR- 36 ROGS 34 DNI_files</option>
                                        <option value="DISCOVERY-FOR-BRAND GLICK BRAND-31 ROGS-10 DNI">DISCOVERY-FOR-BRAND GLICK BRAND-31 ROGS-10 DNI</option>
                                        <option value="DISCOVERY-FOR-BRUNO-GERBINO-SOR 12 BOP 16 DNI">DISCOVERY-FOR-BRUNO-GERBINO-SOR 12 BOP 16 DNI</option>
                                        <option value="DISCOVERY-FOR-BRUNO-GERBINO-SOR-28ROGS-11DNI(SUPPLY)">DISCOVERY-FOR-BRUNO-GERBINO-SOR-28ROGS-11DNI(SUPPLY)</option>
                                        <option value="DISCOVERY-FOR-BRUNO-GERBINO-SOR-9ROGS-36DNI-1NP(AB)">DISCOVERY-FOR-BRUNO-GERBINO-SOR-9ROGS-36DNI-1NP(AB)</option>
                                        <option value="DISCOVERY-FOR-BRUNO-GERBINO-SOR-9ROGS-36DNI-1NP">DISCOVERY-FOR-BRUNO-GERBINO-SOR-9ROGS-36DNI-1NP</option>
                                        <option value="DISCOVERY-FOR-BRYAN-CAVE-15-ROGS-11-DNI(AB)_files">DISCOVERY-FOR-BRYAN-CAVE-15-ROGS-11-DNI(AB)_files</option>
                                        <option value="DISCOVERY-FOR-BRYAN-M-ROTHENBERG-31-ROG-20-CD.">DISCOVERY-FOR-BRYAN-M-ROTHENBERG-31-ROG-20-CD.</option>
                                        <option value="DISCOVERY-FOR-CALLAHAN-AND- MALONE-27ROGS-9DNI">DISCOVERY-FOR-CALLAHAN-AND- MALONE-27ROGS-9DNI</option>
                                        <option value="DISCOVERY-FOR-CARCAGNO-AND-ASSOCIATES-20RPGS-38DMND(PT)">DISCOVERY-FOR-CARCAGNO-AND-ASSOCIATES-20RPGS-38DMND(PT)</option>
                                        <option value="DISCOVERY-FOR-CARMAN-CALLAHAN-INGHAM-31 ROGS-2 DNI-CPLR1">DISCOVERY-FOR-CARMAN-CALLAHAN-INGHAM-31 ROGS-2 DNI-CPLR1</option>
                                        <option value="DISCOVERY-FOR-DANIEL J.TUCKER 27 DNI (AB)">DISCOVERY-FOR-DANIEL J.TUCKER 27 DNI (AB)</option>
                                        <option value="DISCOVERY-FOR-DANIEL J.TUCKER 27 DNI">DISCOVERY-FOR-DANIEL J.TUCKER 27 DNI</option>
                                        <option value="DISCOVERY-FOR-DEIDREE-TOBIN-30ROGS-9WD">DISCOVERY-FOR-DEIDREE-TOBIN-30ROGS-9WD</option>
                                        <option value="DISCOVERY-FOR-DEIDREE-TOBIN-33ROGS-9WD">DISCOVERY-FOR-DEIDREE-TOBIN-33ROGS-9WD</option>
                                        <option value="DISCOVERY-FOR-DeMARTINI-AND-YI-20 ROGS 15 DNI">DISCOVERY-FOR-DeMARTINI-AND-YI-20 ROGS 15 DNI</option>
                                        <option value="DISCOVERY-FOR-DODGE-AND-MONROY-39 ROGS 37 DNI">DISCOVERY-FOR-DODGE-AND-MONROY-39 ROGS 37 DNI</option>
                                        <option value="DISCOVERY-FOR-EPSTEIN-GIALLEONARO-HARMS-McDONALD-BOP-9-NP-12">DISCOVERY-FOR-EPSTEIN-GIALLEONARO-HARMS-McDONALD-BOP-9-NP-12</option>
                                        <option value="DISCOVERY-FOR-EPSTEIN-HARMS-McDONALD-BOP-9-NP-10(AB)">DISCOVERY-FOR-EPSTEIN-HARMS-McDONALD-BOP-9-NP-10(AB)</option>
                                        <option value="DISCOVERY-FOR-EPSTEIN-HARMS-McDONALD-BOP-9-NP-12">DISCOVERY-FOR-EPSTEIN-HARMS-McDONALD-BOP-9-NP-12</option>
                                        <option value="DISCOVERY-FOR-FREIBERG-PECK-KANG LLP-20-ROGS-AND-COMB(AB)">DISCOVERY-FOR-FREIBERG-PECK-KANG LLP-20-ROGS-AND-COMB(AB)</option>
                                        <option value="DISCOVERY-FOR-FREIBERG-PECK-LLP-20-ROGS-AND-COMB">DISCOVERY-FOR-FREIBERG-PECK-LLP-20-ROGS-AND-COMB</option>
                                        <option value="DISCOVERY-FOR-GALLO-VITUCCI-KLAR-2-DNI(AB)_files">DISCOVERY-FOR-GALLO-VITUCCI-KLAR-2-DNI(AB)_files</option>
                                        <option value="DISCOVERY-FOR-GULLO-AND-ASSOCIATES-43-ROGS-22CD">DISCOVERY-FOR-GULLO-AND-ASSOCIATES-43-ROGS-22CD</option>
                                        <option value="DISCOVERY-FOR-ISEMAN-CUNNINGHAM-RIESTER-HYDE-29 DNI (AB)">DISCOVERY-FOR-ISEMAN-CUNNINGHAM-RIESTER-HYDE-29 DNI (AB)</option>
                                        <option value="DISCOVERY-FOR-JAFFE-AND-KOUMOURDAS-LLP-23-ROGS-DNI-CPLR1.">DISCOVERY-FOR-JAFFE-AND-KOUMOURDAS-LLP-23-ROGS-DNI-CPLR1.</option>
                                        <option value="DISCOVERY-FOR-JAMES-SULLIVAN-26-ROGS-2DNI">DISCOVERY-FOR-JAMES-SULLIVAN-26-ROGS-2DNI</option>
                                        <option value="DISCOVERY-FOR-JASON-TENENBAUM-22-ROGS-12-DNI(AB)_files">DISCOVERY-FOR-JASON-TENENBAUM-22-ROGS-12-DNI(AB)_files</option>
                                        <option value="DISCOVERY-FOR-JEENA-BELIL 38 ROGS-29-DNI">DISCOVERY-FOR-JEENA-BELIL 38 ROGS-29-DNI</option>
                                        <option value="DISCOVERY-FOR-JEFFREY-MILLER-AND-ASSOC.-39-ROGS-14-DNI(AB)_files">DISCOVERY-FOR-JEFFREY-MILLER-AND-ASSOC.-39-ROGS-14-DNI(AB)_files</option>
                                        <option value="DISCOVERY-FOR-JEFFREY-MILLER-AND-ASSOC.-39-ROGS-16-DNI(AB)_files">DISCOVERY-FOR-JEFFREY-MILLER-AND-ASSOC.-39-ROGS-16-DNI(AB)_files</option>
                                        <option value="DISCOVERY-FOR-JOHN-E-McCORMACK-PC-30ROGS-20CD">DISCOVERY-FOR-JOHN-E-McCORMACK-PC-30ROGS-20CD</option>
                                        <option value="DISCOVERY-FOR-JOHN-TROP-26ROGS-9CD">DISCOVERY-FOR-JOHN-TROP-26ROGS-9CD</option>
                                        <option value="DISCOVERY-FOR-JOSEPH M. ECKSTEIN-14DNI-14BOP">DISCOVERY-FOR-JOSEPH M. ECKSTEIN-14DNI-14BOP</option>
                                        <option value="DISCOVERY-FOR-JUSTIN-C-BARTH-5-ROGS">DISCOVERY-FOR-JUSTIN-C-BARTH-5-ROGS</option>
                                        <option value="DISCOVERY-FOR-KAREN-C-DODSON-36-ROGS-33-DNI">DISCOVERY-FOR-KAREN-C-DODSON-36-ROGS-33-DNI</option>
                                        <option value="DISCOVERY-FOR-KAREN-C-DODSON-36-ROGS-56-DNI">DISCOVERY-FOR-KAREN-C-DODSON-36-ROGS-56-DNI</option>
                                        <option value="DISCOVERY-FOR-KAREN-C-DODSON-36-ROGS-57-DNI">DISCOVERY-FOR-KAREN-C-DODSON-36-ROGS-57-DNI</option>
                                        <option value="DISCOVERY-FOR-KAREN-C-DODSON-36-ROGS-58-DNI">DISCOVERY-FOR-KAREN-C-DODSON-36-ROGS-58-DNI</option>
                                        <option value="DISCOVERY-FOR-KAREN-LAWRENCE-26-ROGS-9-DNI(AB)_files">DISCOVERY-FOR-KAREN-LAWRENCE-26-ROGS-9-DNI(AB)_files</option>
                                        <option value="DISCOVERY-FOR-KATZ-AND ASSOCIATES-26-ROGS-10-DNI(AB)_files">DISCOVERY-FOR-KATZ-AND ASSOCIATES-26-ROGS-10-DNI(AB)_files</option>
                                        <option value="DISCOVERY-FOR-KELLY SHERIDAN 14 BOP 13 DNI">DISCOVERY-FOR-KELLY SHERIDAN 14 BOP 13 DNI</option>
                                        <option value="DISCOVERY-FOR-KORSHIN-AND-WELDEN-7-BOP-13-DNI (AB)">DISCOVERY-FOR-KORSHIN-AND-WELDEN-7-BOP-13-DNI (AB)</option>
                                        <option value="DISCOVERY-FOR-LAWRENCE N ROGAK  LLC 39 ROGS 16 DNI">DISCOVERY-FOR-LAWRENCE N ROGAK  LLC 39 ROGS 16 DNI</option>
                                        <option value="DISCOVERY-FOR-LAWRENCE N ROGAK  LLC 43 ROGS 19 DNI (AB)">DISCOVERY-FOR-LAWRENCE N ROGAK  LLC 43 ROGS 19 DNI (AB)</option>
                                        <option value="DISCOVERY-FOR-LAWRENCE R. MILES-20 ROGS 14 DNI">DISCOVERY-FOR-LAWRENCE R. MILES-20 ROGS 14 DNI</option>
                                        <option value="DISCOVERY-FOR-LESTER-KATZ- DWYER 2DNI">DISCOVERY-FOR-LESTER-KATZ- DWYER 2DNI</option>
                                        <option value="DISCOVERY-FOR-LEWIS-JOHS-AVALLONE-AVILES-14 BOP-9 DNI">DISCOVERY-FOR-LEWIS-JOHS-AVALLONE-AVILES-14 BOP-9 DNI</option>
                                        <option value="DISCOVERY-FOR-LINDEN  ZACHRY AND-TAND-47ROGS-11DNI">DISCOVERY-FOR-LINDEN  ZACHRY AND-TAND-47ROGS-11DNI</option>
                                        <option value="DISCOVERY-FOR-MAHON-VANHAASTER-BOP-6-DD-6(AB)">DISCOVERY-FOR-MAHON-VANHAASTER-BOP-6-DD-6(AB)</option>
                                        <option value="DISCOVERY-FOR-MARSHALL-AND MARSHALL-11 ROGS-9-DNI">DISCOVERY-FOR-MARSHALL-AND MARSHALL-11 ROGS-9-DNI</option>
                                        <option value="DISCOVERY-FOR-MARSHALL-AND MARSHALL-15 ROGS-10 DNI">DISCOVERY-FOR-MARSHALL-AND MARSHALL-15 ROGS-10 DNI</option>
                                        <option value="DISCOVERY-FOR-MARSHALL-AND MARSHALL-20 ROGS-12-DNI">DISCOVERY-FOR-MARSHALL-AND MARSHALL-20 ROGS-12-DNI</option>
                                        <option value="DISCOVERY-FOR-MARSHALL-AND MARSHALL-9 ROGS-8-DNI">DISCOVERY-FOR-MARSHALL-AND MARSHALL-9 ROGS-8-DNI</option>
                                        <option value="DISCOVERY-FOR-MARTYN-TOHER-and-MARTYN-29ROGS.">DISCOVERY-FOR-MARTYN-TOHER-and-MARTYN-29ROGS.</option>
                                        <option value="DISCOVERY-FOR-MARY-AUDI-BJORK-26-ROGS(AB)">DISCOVERY-FOR-MARY-AUDI-BJORK-26-ROGS(AB)</option>
                                        <option value="DISCOVERY-FOR-MARY-AUDI-BJORK-26-ROGS-9-DNI(AB)_files">DISCOVERY-FOR-MARY-AUDI-BJORK-26-ROGS-9-DNI(AB)_files</option>
                                        <option value="DISCOVERY-FOR-MATHEW- BREW-ASSCIATES-16-ROGS-9-DNI(AB)_files">DISCOVERY-FOR-MATHEW- BREW-ASSCIATES-16-ROGS-9-DNI(AB)_files</option>
                                        <option value="DISCOVERY-FOR-McANDREW-CONBOY-PRISCO-20RPGS-38DMND(PT)">DISCOVERY-FOR-McANDREW-CONBOY-PRISCO-20RPGS-38DMND(PT)</option>
                                        <option value="DISCOVERY-FOR-McCORMACK-AND MATTEI-27ROGS-20CD">DISCOVERY-FOR-McCORMACK-AND MATTEI-27ROGS-20CD</option>
                                        <option value="DISCOVERY-FOR-MCDONNELL-AND-ADELS- P.C.-11-ROGS-22-CD">DISCOVERY-FOR-MCDONNELL-AND-ADELS- P.C.-11-ROGS-22-CD</option>
                                        <option value="DISCOVERY-FOR-MCDONNELL-AND-ADELS-10-ROGS-23-NP">DISCOVERY-FOR-MCDONNELL-AND-ADELS-10-ROGS-23-NP</option>
                                        <option value="DISCOVERY-FOR-MCDONNELL-AND-ADELS-11-ROGS-24-NP">DISCOVERY-FOR-MCDONNELL-AND-ADELS-11-ROGS-24-NP</option>
                                        <option value="DISCOVERY-FOR-MICHAEL-G-NASHAK-19-BOP-11-DNI (AB)">DISCOVERY-FOR-MICHAEL-G-NASHAK-19-BOP-11-DNI (AB)</option>
                                        <option value="DISCOVERY-FOR-MICHAEL-G-NASHAK-19-BOP-11-DNI">DISCOVERY-FOR-MICHAEL-G-NASHAK-19-BOP-11-DNI</option>
                                        <option value="DISCOVERY-FOR-MILLER-LEIBY-AND-ASSOC-39-ROGS-16-DNI(AB)_files">DISCOVERY-FOR-MILLER-LEIBY-AND-ASSOC-39-ROGS-16-DNI(AB)_files</option>
                                        <option value="DISCOVERY-FOR-MOIRA-DOHERTY-33 ROGS">DISCOVERY-FOR-MOIRA-DOHERTY-33 ROGS</option>
                                        <option value="DISCOVERY-FOR-NANCY-LINDEN-10RPGS-27DMND-PSYCHO">DISCOVERY-FOR-NANCY-LINDEN-10RPGS-27DMND-PSYCHO</option>
                                        <option value="DISCOVERY-FOR-NANCY-LINDEN-10RPGS-27DMND-XRAY-MRI">DISCOVERY-FOR-NANCY-LINDEN-10RPGS-27DMND-XRAY-MRI</option>
                                        <option value="DISCOVERY-FOR-NANCY-LINDEN-10RPGS-27DMND">DISCOVERY-FOR-NANCY-LINDEN-10RPGS-27DMND</option>
                                        <option value="DISCOVERY-FOR-NANCY-LINDEN-47ROGS-10DNI">DISCOVERY-FOR-NANCY-LINDEN-47ROGS-10DNI</option>
                                        <option value="DISCOVERY-FOR-NICOLINI-PARADISE-FERRETTI-24-ROGS-8-NP">DISCOVERY-FOR-NICOLINI-PARADISE-FERRETTI-24-ROGS-8-NP</option>
                                        <option value="DISCOVERY-FOR-NOVINS-AND ASSOCIATED-47ROGS-11DNI">DISCOVERY-FOR-NOVINS-AND ASSOCIATED-47ROGS-11DNI</option>
                                        <option value="DISCOVERY-FOR-PEKNIC-PECNIC-SCHAEFER-50ROGS-12DNI">DISCOVERY-FOR-PEKNIC-PECNIC-SCHAEFER-50ROGS-12DNI</option>
                                        <option value="DISCOVERY-FOR-PETER-C-MERANI 40 ROGS. 15DNI">DISCOVERY-FOR-PETER-C-MERANI 40 ROGS. 15DNI</option>
                                        <option value="DISCOVERY-FOR-PICCIANO-AND-SCAHILL-22-ROGS-11-DNI(AB)_files">DISCOVERY-FOR-PICCIANO-AND-SCAHILL-22-ROGS-11-DNI(AB)_files</option>
                                        <option value="DISCOVERY-FOR-PRINTZ-AND-GOLDSTEIN-7-BOP-13-DNI (AB)">DISCOVERY-FOR-PRINTZ-AND-GOLDSTEIN-7-BOP-13-DNI (AB)</option>
                                        <option value="DISCOVERY-FOR-RHONDA-BARRY- 25-ROGS-18 DNI">DISCOVERY-FOR-RHONDA-BARRY- 25-ROGS-18 DNI</option>
                                        <option value="DISCOVERY-FOR-ROBERT-P-TUSA-26-ROGS-9-DMNDS-2NP">DISCOVERY-FOR-ROBERT-P-TUSA-26-ROGS-9-DMNDS-2NP</option>
                                        <option value="DISCOVERY-FOR-ROBERT-P-TUSA-ESQ-26-ROGS-9-DNI-TRANSP">DISCOVERY-FOR-ROBERT-P-TUSA-ESQ-26-ROGS-9-DNI-TRANSP</option>
                                        <option value="DISCOVERY-FOR-ROSSILLO-AND-LICATA-24ROG-7DNI">DISCOVERY-FOR-ROSSILLO-AND-LICATA-24ROG-7DNI</option>
                                        <option value="DISCOVERY-FOR-RUBIN-FIORELLA-AND-FRIEDMAN-32ROG-7DNI">DISCOVERY-FOR-RUBIN-FIORELLA-AND-FRIEDMAN-32ROG-7DNI</option>
                                        <option value="DISCOVERY-FOR-RUBIN-FIORELLA-AND-FRIEDMAN-42ROG-7DNI">DISCOVERY-FOR-RUBIN-FIORELLA-AND-FRIEDMAN-42ROG-7DNI</option>
                                        <option value="DISCOVERY-FOR-RUBIN-FIORELLA-AND-FRIEDMAN-42ROG-8DNI">DISCOVERY-FOR-RUBIN-FIORELLA-AND-FRIEDMAN-42ROG-8DNI</option>
                                        <option value="DISCOVERY-FOR-SHORT-AND-BILLY-PC-22-ROGS">DISCOVERY-FOR-SHORT-AND-BILLY-PC-22-ROGS</option>
                                        <option value="DISCOVERY-FOR-SHORT-AND-BILLY-PC-36- ROGS-EAST-WEST">DISCOVERY-FOR-SHORT-AND-BILLY-PC-36- ROGS-EAST-WEST</option>
                                        <option value="DISCOVERY-FOR-SKENDERIS-AND-CORNACCHIA-14DNI-14BOP">DISCOVERY-FOR-SKENDERIS-AND-CORNACCHIA-14DNI-14BOP</option>
                                        <option value="DISCOVERY-FOR-SMITH-AND-BRINK-39ROGS-48CD">DISCOVERY-FOR-SMITH-AND-BRINK-39ROGS-48CD</option>
                                        <option value="DISCOVERY-FOR-SPINA-KORSHIN-WELDIN-7-BOP-13-DNI (AB)">DISCOVERY-FOR-SPINA-KORSHIN-WELDIN-7-BOP-13-DNI (AB)</option>
                                        <option value="DISCOVERY-FOR-STERN AND MONTANA-14DNI">DISCOVERY-FOR-STERN AND MONTANA-14DNI</option>
                                        <option value="DISCOVERY-FOR-TERESA-M-SPINA-7-BOP-13-DNI">DISCOVERY-FOR-TERESA-M-SPINA-7-BOP-13-DNI</option>
                                        <option value="DISCOVERY-FOR-TERESA-M-SPINA-7-BOP-15-DNI (AB)">DISCOVERY-FOR-TERESA-M-SPINA-7-BOP-15-DNI (AB)</option>
                                        <option value="DISCOVERY-FOR-TERESA-M-SPINA-7-BOP-15-DNI">DISCOVERY-FOR-TERESA-M-SPINA-7-BOP-15-DNI</option>
                                        <option value="DISCOVERY-FOR-TERESA-M-SPINA-7-BOP-16-DNI (AB)">DISCOVERY-FOR-TERESA-M-SPINA-7-BOP-16-DNI (AB)</option>
                                        <option value="DISCOVERY-FOR-tTOBIAS-AND -KUHN-80-ROGS">DISCOVERY-FOR-tTOBIAS-AND -KUHN-80-ROGS</option>
                                        <option value="DISCOVERY-FOR-VERRILL-AND-ASSOCIATES- 25-ROGS-18 DNI">DISCOVERY-FOR-VERRILL-AND-ASSOCIATES- 25-ROGS-18 DNI</option>
                                        <option value="DISCOVERY-FOR-WOLLERSTEIN-AND-FUTORAN-4-BOP">DISCOVERY-FOR-WOLLERSTEIN-AND-FUTORAN-4-BOP</option>
                                        <option value="DISCOVERY-SUPPLEMENTAL-DEMANDS-BRYAN-M-ROTHENBERG-30">DISCOVERY-SUPPLEMENTAL-DEMANDS-BRYAN-M-ROTHENBERG-30</option>
                                        <option value="EAST-WEST-VERIFICATION">EAST-WEST-VERIFICATION</option>
                                        <option value="EUO TRANSCRIPT REQUEST">EUO TRANSCRIPT REQUEST</option>
                                        <option value="FaxSheet">FaxSheet</option>
                                        <option value="GOOD-FAITH-LETTER-FOR-OUR-DISCOVERY-DMND(AB)">GOOD-FAITH-LETTER-FOR-OUR-DISCOVERY-DMND(AB)</option>
                                        <option value="GOOD-FAITH-LETTER-FOR-OUR-DISCOVERY-DMND(Liberty Mutual)(AB)">GOOD-FAITH-LETTER-FOR-OUR-DISCOVERY-DMND(Liberty Mutual)(AB)</option>
                                        <option value="GOOD-FAITH-LETTER-FOR-OUR-DISCOVERY-DMND(Liberty Mutual)">GOOD-FAITH-LETTER-FOR-OUR-DISCOVERY-DMND(Liberty Mutual)</option>
                                        <option value="GOOD-FAITH-LETTER-FOR-OUR-DISCOVERY-DMND">GOOD-FAITH-LETTER-FOR-OUR-DISCOVERY-DMND</option>
                                        <option value="IME-PEER REVIEW REPORT REQUEST">IME-PEER REVIEW REPORT REQUEST</option>
                                        <option value="JUDGEMENT AFTER SETTLEMENT-summons">JUDGEMENT AFTER SETTLEMENT-summons</option>
                                        <option value="JUDGEMENT AFTER SETTLEMENT">JUDGEMENT AFTER SETTLEMENT</option>
                                        <option value="JUDGEMENT TO ENFORCE SETTLEMENT TERMS">JUDGEMENT TO ENFORCE SETTLEMENT TERMS</option>
                                        <option value="JUDGMENT-DEFAULT JUDGMENT">JUDGMENT-DEFAULT JUDGMENT</option>
                                        <option value="LETTER-AMEND MOTION DATE">LETTER-AMEND MOTION DATE</option>
                                        <option value="LETTER-BREAK DOWN LETTER">LETTER-BREAK DOWN LETTER</option>
                                        <option value="LETTER-NO DEF. DISCOVERY DEMAND">LETTER-NO DEF. DISCOVERY DEMAND</option>
                                        <option value="LETTER">LETTER</option>
                                        <option value="MOTION -CROSS MOTION MEDICAL NECESSITY (Bronx)(AB)">MOTION -CROSS MOTION MEDICAL NECESSITY (Bronx)(AB)</option>
                                        <option value="MOTION -CROSS MOTION MEDICAL NECESSITY (Queens)(VG)">MOTION -CROSS MOTION MEDICAL NECESSITY (Queens)(VG)</option>
                                        <option value="MOTION -CROSS MOTION MEDICAL NECESSITY w.Dr.Affidavit (Bronx)(AB)">MOTION -CROSS MOTION MEDICAL NECESSITY w.Dr.Affidavit (Bronx)(AB)</option>
                                        <option value="MOTION-CROSS MOTION IME-EUO NO SHOW(interpreter)">MOTION-CROSS MOTION IME-EUO NO SHOW(interpreter)</option>
                                        <option value="MOTION-DEFAULT MOTION(QUEENS)">MOTION-DEFAULT MOTION(QUEENS)</option>
                                        <option value="MOTION-DEFAULT MOTION">MOTION-DEFAULT MOTION</option>
                                        <option value="MOTION-NOTICE OF CROSS- MOTION (Bronx)(AB)">MOTION-NOTICE OF CROSS- MOTION (Bronx)(AB)</option>
                                        <option value="MOTION-NOTICE OF MOTION (BX)">MOTION-NOTICE OF MOTION (BX)</option>
                                        <option value="MOTION-NOTICE OF MOTION (QUEENS)">MOTION-NOTICE OF MOTION (QUEENS)</option>
                                        <option value="MOTION-NOTICE OF MOTION FOR NOTICE TO ADMIT (Bronx)(AB)">MOTION-NOTICE OF MOTION FOR NOTICE TO ADMIT (Bronx)(AB)</option>
                                        <option value="MOTION-NOTICE OF MOTION FOR SUMMARY JUDGMENT (1)">MOTION-NOTICE OF MOTION FOR SUMMARY JUDGMENT (1)</option>
                                        <option value="MOTION-NOTICE OF MOTION FOR SUMMARY JUDGMENT (Bronx)(AB)">MOTION-NOTICE OF MOTION FOR SUMMARY JUDGMENT (Bronx)(AB)</option>
                                        <option value="MOTION-NOTICE OF MOTION FOR SUMMARY JUDGMENT (Bronx)">MOTION-NOTICE OF MOTION FOR SUMMARY JUDGMENT (Bronx)</option>
                                        <option value="MOTION-NOTICE OF MOTION FOR SUMMARY JUDGMENT (Queens)(AB)">MOTION-NOTICE OF MOTION FOR SUMMARY JUDGMENT (Queens)(AB)</option>
                                        <option value="MOTION-NOTICE OF MOTION FOR SUMMARY JUDGMENT (Queens)">MOTION-NOTICE OF MOTION FOR SUMMARY JUDGMENT (Queens)</option>
                                        <option value="MOTION-NOTICE OF MOTION FOR SUMMARY JUDGMENT - NO DENIALS (Queens)(AB)">MOTION-NOTICE OF MOTION FOR SUMMARY JUDGMENT - NO DENIALS (Queens)(AB)</option>
                                        <option value="MOTION-NOTICE OF MOTION FOR SUMMARY JUDGMENT 3">MOTION-NOTICE OF MOTION FOR SUMMARY JUDGMENT 3</option>
                                        <option value="MOTION-NOTICE OF MOTION FOR SUMMARY JUDGMENT">MOTION-NOTICE OF MOTION FOR SUMMARY JUDGMENT</option>
                                        <option value="MOTION-NOTICE OF MOTION TO STRIKE (BX)">MOTION-NOTICE OF MOTION TO STRIKE (BX)</option>
                                        <option value="MOTION-NOTICE OF MOTION TO STRIKE (QUEENS)">MOTION-NOTICE OF MOTION TO STRIKE (QUEENS)</option>
                                        <option value="NOT BRONX(AB)">NOT BRONX(AB)</option>
                                        <option value="NOT BRONX(VG)">NOT BRONX(VG)</option>
                                        <option value="NOT BRONX">NOT BRONX</option>
                                        <option value="NOT QUEENS(AB)">NOT QUEENS(AB)</option>
                                        <option value="NOT QUEENS(VG)">NOT QUEENS(VG)</option>
                                        <option value="NOTICE TO ADMIT (FOR BRONX)">NOTICE TO ADMIT (FOR BRONX)</option>
                                        <option value="NOTICE TO ADMIT">NOTICE TO ADMIT</option>
                                        <option value="NOTICE-TO-ADMIT-ALOY IBUZOR 11">NOTICE-TO-ADMIT-ALOY IBUZOR 11</option>
                                        <option value="NOTICE-TO-ADMIT-ALOY IBUZOR 5">NOTICE-TO-ADMIT-ALOY IBUZOR 5</option>
                                        <option value="NOTICE-TO-ADMIT-ALOY IBUZOR 7">NOTICE-TO-ADMIT-ALOY IBUZOR 7</option>
                                        <option value="NOTICE-TO-ADMIT-ALOY IBUZOR 9">NOTICE-TO-ADMIT-ALOY IBUZOR 9</option>
                                        <option value="NOTICE-TO-ADMIT-DEIRDRE-TOBIN-5Q">NOTICE-TO-ADMIT-DEIRDRE-TOBIN-5Q</option>
                                        <option value="NOTICE-TO-ADMIT-JAMES-SULLIVAN Q10">NOTICE-TO-ADMIT-JAMES-SULLIVAN Q10</option>
                                        <option value="NOTICE-TO-ADMIT-JAMES-SULLIVAN Q11">NOTICE-TO-ADMIT-JAMES-SULLIVAN Q11</option>
                                        <option value="NOTICE-TO-ADMIT-PETER-C-MERANI Q10">NOTICE-TO-ADMIT-PETER-C-MERANI Q10</option>
                                        <option value="NOTICE-TO-ADMIT-PETER-C-MERANI Q11">NOTICE-TO-ADMIT-PETER-C-MERANI Q11</option>
                                        <option value="NOTICE-TO-ADMIT-PETER-C-MERANI Q12">NOTICE-TO-ADMIT-PETER-C-MERANI Q12</option>
                                        <option value="NOTICE-TO-ADMIT-PETER-C-MERANI Q13">NOTICE-TO-ADMIT-PETER-C-MERANI Q13</option>
                                        <option value="NOTICE-TO-ADMIT-PETER-C-MERANI Q14">NOTICE-TO-ADMIT-PETER-C-MERANI Q14</option>
                                        <option value="NOTICE-TO-ADMIT-PETER-C-MERANI Q19">NOTICE-TO-ADMIT-PETER-C-MERANI Q19</option>
                                        <option value="NOTICE-TO-ADMIT-PETER-C-MERANI Q38">NOTICE-TO-ADMIT-PETER-C-MERANI Q38</option>
                                        <option value="NOTICE-TO-ADMIT-PETER-C-MERANI Q5">NOTICE-TO-ADMIT-PETER-C-MERANI Q5</option>
                                        <option value="NOTICE-TO-ADMIT-PETER-C-MERANI Q7">NOTICE-TO-ADMIT-PETER-C-MERANI Q7</option>
                                        <option value="NOTICE-TO-ADMIT-PETER-C-MERANI Q9">NOTICE-TO-ADMIT-PETER-C-MERANI Q9</option>
                                        <option value="OPPOSITION-45 DAY RULE">OPPOSITION-45 DAY RULE</option>
                                        <option value="OPPOSITION-8 UNITS">OPPOSITION-8 UNITS</option>
                                        <option value="OPPOSITION-AND-REPLY TO DEF CROSS AND OPP FOR OUR SJM-MN[1]">OPPOSITION-AND-REPLY TO DEF CROSS AND OPP FOR OUR SJM-MN[1]</option>
                                        <option value="OPPOSITION-DUPLICATE BILLING">OPPOSITION-DUPLICATE BILLING</option>
                                        <option value="OPPOSITION-EUO-IME NO SHOW">OPPOSITION-EUO-IME NO SHOW</option>
                                        <option value="OPPOSITION-FEE SCHEDULE">OPPOSITION-FEE SCHEDULE</option>
                                        <option value="OPPOSITION-IME CUT OFF">OPPOSITION-IME CUT OFF</option>
                                        <option value="OPPOSITION-IME NO SHOW 1">OPPOSITION-IME NO SHOW 1</option>
                                        <option value="OPPOSITION-IME NO SHOW 2">OPPOSITION-IME NO SHOW 2</option>
                                        <option value="OPPOSITION-IME NO SHOW 3">OPPOSITION-IME NO SHOW 3</option>
                                        <option value="OPPOSITION-IME NO SHOW 4 with letter of representation">OPPOSITION-IME NO SHOW 4 with letter of representation</option>
                                        <option value="OPPOSITION-IME NO SHOW 5">OPPOSITION-IME NO SHOW 5</option>
                                        <option value="OPPOSITION-IME NO SHOW 6">OPPOSITION-IME NO SHOW 6</option>
                                        <option value="OPPOSITION-IME NO SHOW">OPPOSITION-IME NO SHOW</option>
                                        <option value="OPPOSITION-MATERIAL MISREPRESENTATION-policy address">OPPOSITION-MATERIAL MISREPRESENTATION-policy address</option>
                                        <option value="OPPOSITION-MATERIAL MISREPRESENTATION-staged accident">OPPOSITION-MATERIAL MISREPRESENTATION-staged accident</option>
                                        <option value="OPPOSITION-MEDICAL NECESSITY 2">OPPOSITION-MEDICAL NECESSITY 2</option>
                                        <option value="OPPOSITION-MEDICAL NECESSITY 3">OPPOSITION-MEDICAL NECESSITY 3</option>
                                        <option value="OPPOSITION-MEDICAL NECESSITY AND FEE SCHEDULE">OPPOSITION-MEDICAL NECESSITY AND FEE SCHEDULE</option>
                                        <option value="OPPOSITION-MEDICAL NECESSITY">OPPOSITION-MEDICAL NECESSITY</option>
                                        <option value="OPPOSITION-USAA">OPPOSITION-USAA</option>
                                        <option value="ORDER WITH NOTICE OF ENTRY">ORDER WITH NOTICE OF ENTRY</option>
                                        <option value="OUR DISCOVERY DEMANDS (2) WO NTA (AB)">OUR DISCOVERY DEMANDS (2) WO NTA (AB)</option>
                                        <option value="OUR DISCOVERY DEMANDS 2 (AB)">OUR DISCOVERY DEMANDS 2 (AB)</option>
                                        <option value="OUR DISCOVERY DEMANDS 2">OUR DISCOVERY DEMANDS 2</option>
                                        <option value="OUR DISCOVERY DEMANDS">OUR DISCOVERY DEMANDS</option>
                                        <option value="OVERDUE SETTLEMENT LETTER AB">OVERDUE SETTLEMENT LETTER AB</option>
                                        <option value="OVERDUE SETTLEMENT LETTER">OVERDUE SETTLEMENT LETTER</option>
                                        <option value="PLAINTIFF AFFIDAVIT (BAY MEDICAL)">PLAINTIFF AFFIDAVIT (BAY MEDICAL)</option>
                                        <option value="PLAINTIFF AFFIDAVIT (IMMEDIATE)">PLAINTIFF AFFIDAVIT (IMMEDIATE)</option>
                                        <option value="PLAINTIFF AFFIDAVIT (LEMONTI)">PLAINTIFF AFFIDAVIT (LEMONTI)</option>
                                        <option value="PLAINTIFF AFFIDAVIT (PH)">PLAINTIFF AFFIDAVIT (PH)</option>
                                        <option value="PLAINTIFF AFFIDAVIT (PHI)(AMENDED)">PLAINTIFF AFFIDAVIT (PHI)(AMENDED)</option>
                                        <option value="PLAINTIFF AFFIDAVIT (PHI)">PLAINTIFF AFFIDAVIT (PHI)</option>
                                        <option value="PLAINTIFF AFFIDAVIT- wrong ins. comp. mailing 3">PLAINTIFF AFFIDAVIT- wrong ins. comp. mailing 3</option>
                                        <option value="PLAINTIFF AFFIDAVIT- wrong ins. comp. mailing 5[1]">PLAINTIFF AFFIDAVIT- wrong ins. comp. mailing 5[1]</option>
                                        <option value="PLAINTIFF AFFIDAVIT- wrong ins. comp. mailing">PLAINTIFF AFFIDAVIT- wrong ins. comp. mailing</option>
                                        <option value="PLAINTIFF AFFIDAVIT-AK DIAGNOSTIC">PLAINTIFF AFFIDAVIT-AK DIAGNOSTIC</option>
                                        <option value="PLAINTIFF AFFIDAVIT">PLAINTIFF AFFIDAVIT</option>
                                        <option value="REPRESENTATION LETTER (INITIAL SUB) PRIVATE INS">REPRESENTATION LETTER (INITIAL SUB) PRIVATE INS</option>
                                        <option value="REPRESENTATION LETTER (INITIAL SUBMISSION)">REPRESENTATION LETTER (INITIAL SUBMISSION)</option>
                                        <option value="REPRESENTATION LETTER RESPOND TO VERIFICATION">REPRESENTATION LETTER RESPOND TO VERIFICATION</option>
                                        <option value="REPRESENTATION LETTER(ADVANCED MEDICAL)">REPRESENTATION LETTER(ADVANCED MEDICAL)</option>
                                        <option value="REPRESENTATION LETTER">REPRESENTATION LETTER</option>
                                        <option value="STIPULATION EXTEND TIME">STIPULATION EXTEND TIME</option>
                                        <option value="STIPULATION OF ADJOURNMENT FOR DEF-S MOTION">STIPULATION OF ADJOURNMENT FOR DEF-S MOTION</option>
                                        <option value="STIPULATION OF DISCONTINUANCE WOP-AB">STIPULATION OF DISCONTINUANCE WOP-AB</option>
                                        <option value="STIPULATION OF DISCONTINUANCE WOP">STIPULATION OF DISCONTINUANCE WOP</option>
                                        <option value="STIPULATION OF DISCONTINUANCE WP  AB (libertyMutual)">STIPULATION OF DISCONTINUANCE WP  AB (libertyMutual)</option>
                                        <option value="STIPULATION OF DISCONTINUANCE WP  AB">STIPULATION OF DISCONTINUANCE WP  AB</option>
                                        <option value="STIPULATION OF DISCONTINUANCE WP">STIPULATION OF DISCONTINUANCE WP</option>
                                        <option value="STIPULATION OF PLAINTIFFS MOTION TO PRECLUDE AB">STIPULATION OF PLAINTIFFS MOTION TO PRECLUDE AB</option>
                                        <option value="STIPULATION OF PLAINTIFFS MOTION TO PRECLUDE VG">STIPULATION OF PLAINTIFFS MOTION TO PRECLUDE VG</option>
                                        <option value="STIPULATION OF PLAINTIFFS MOTION TO PRECLUDE">STIPULATION OF PLAINTIFFS MOTION TO PRECLUDE</option>
                                        <option value="STIPULATION OF SETTLEMENT FOR LIT">STIPULATION OF SETTLEMENT FOR LIT</option>
                                        <option value="STIPULATION TO AMEND CAPTION">STIPULATION TO AMEND CAPTION</option>
                                        <option value="STIPULATION TO CHANGE ATTORNEYS">STIPULATION TO CHANGE ATTORNEYS</option>
                                        <option value="STIPULATION TO WITHDRAW SJ MTN- ok prima facia- except MedNec(AB)">STIPULATION TO WITHDRAW SJ MTN- ok prima facia- except MedNec(AB)</option>
                                        <option value="STIPULATION TO WITHDRAW SJ MTN- ok prima facia- except MedNec(VG)">STIPULATION TO WITHDRAW SJ MTN- ok prima facia- except MedNec(VG)</option>
                                        <option value="Summons and Complaint 1 BILL - CIVIL AB">Summons and Complaint 1 BILL - CIVIL AB</option>
                                        <option value="Summons and Complaint 1 BILL - CIVIL">Summons and Complaint 1 BILL - CIVIL</option>
                                        <option value="SUMMONS-MULTI">SUMMONS-MULTI</option>
                                        <option value="SUMMONSHEAD AB">SUMMONSHEAD AB</option>
                                        <option value="SUMMONSHEAD">SUMMONSHEAD</option>
                                        <option value="SUMMONSTAIL AB">SUMMONSTAIL AB</option>
                                        <option value="SUMMONSTAIL">SUMMONSTAIL</option>
                                        <option value="TEMPLATE">TEMPLATE</option>
                                        <option value="VERIFICATION AFFIDAVIT">VERIFICATION AFFIDAVIT</option>
                                        <option value="VERIFIEDCOMPLAINT-orig">VERIFIEDCOMPLAINT-orig</option>
                                        <option value="VERIFIEDCOMPLAINT">VERIFIEDCOMPLAINT</option>
                                        <option value="Z-RETAINER AGREEMENT W-CLIENTS-AB">Z-RETAINER AGREEMENT W-CLIENTS-AB</option>
                                        <option value="Z-RETAINER AGREEMENT WITH CLIENTS VG">Z-RETAINER AGREEMENT WITH CLIENTS VG</option>
                                        <option value="TEST">TEST</option>
                                        <option value="sid">SID</option>
                                    
                                    </select>
								</div>
							</div>
                            <div class="form-group form-horizontal col-md-12">
                            	<div class="col-sm-2"></div>
                                <div class="col-sm-2">
                                	<button type="submit" class="btn btn-primary" id="EditTemplate">Edit Template</button>
                                </div>
                            </div>
                            </form>
						</div><!-- End of panel-body tab-panel-->
						</div><!-- End hpanel -->
						</div><!-- End col-lg-12-->
					</div><!-- End row-->
				</div><!--End of Template tab-->
                
                <div id="tab-Motions" class="tab-pane">
                	<div class="row">
                        <div class="col-lg-12">
                        <div class="hpanel">
                        <div class="panel-heading"></div>
                        <div class="panel-body tab-panel">
                        	<div class="form-group form-horizontal col-md-12">
                                <div class="col-md-12">
                                    <table id="MotionTable" class="table dataTable table-bordered table-striped">
                                        <thead>
                                        <tr> 	
                                        	<!--<th>Edit</th>-->
                                            <th>Motion Date</th>
                                            <th>Motion Status</th>
                                            <th>Our Motion Type</th>
                                            <th>Def. Motion Type</th>
                                            <th>Opp. Due Date</th>
                                            <th>Reply Due Date</th>
                                            <th>Notes</th>
                                            <th>Cross Motion</th>
                                            <th>Whose Motion</th>
                                            <th>Room</th>
                                            <th>Part</th>
                                            <th>Judge</th>
                                            <th>Time Duration</th>
                                            <!--<th>Delete</th>-->
                                        </tr>
                                        </thead>
                                    </table>
                                    
                                </div>
                            </div>
                            <!--<div class="form-group form-horizontal col-md-12">
                                <div class="col-md-2"><button type="button" id="deleteMotionButton" name="deleteEventsButton" class="btn btn-primary"><i class="fa fa-trash-o"></i> Deleted Checked</button></div>
                            </div>-->
                            <!--<form id="add_Motion_Info_form"  method="post">
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label"> Motion  Date: </label>
                                    <div class="col-md-1">
                                    	<input type="hidden" name="Case_ID" value="<?php //echo $Case_Id;?>">
                                        <input type="text" id="" name="Motion_Date"  class="form-control input-sm datetimepicker_Dos_Doe" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label"> Motion  Status: </label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="Motion_Status"  class="form-control input-sm" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Our  Motion Type: </label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="Our_Motion_Type"  class="form-control input-sm" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Defendant Motion Type: </label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="Defendent_Motion_Type"  class="form-control input-sm" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Opposition Due Date:  </label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="Opposition_Due_Date"  class="form-control input-sm datetimepicker_Dos_Doe" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Reply Due Date:  </label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="Reply_Due_Date"  class="form-control input-sm datetimepicker_Dos_Doe" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Cross Motion:</label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="cross_motion"  class="form-control input-sm" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Whose Motion</label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="whose_motion"  class="form-control input-sm" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Room</label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="room"  class="form-control input-sm" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Part: </label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="part"  class="form-control input-sm" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Judge Name: </label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="judge_name"  class="form-control input-sm" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Time: </label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="time_duration"  class="form-control input-sm datetimepicker_only_time" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Motion Notes: </label>
                                    <div class="col-md-2">
                                        <textarea rows="3"  id="" name="Notes" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary"> Save</button>
                                    </div>
                                </div>
                            </form>-->
                            	
                            
                        </div><!-- End of panel-body tab-panel-->
                        </div><!-- End hpanel -->
                        </div><!-- End col-lg-12-->
                    </div><!-- End row-->
                </div><!--End of Motion tab -->
                
                <div id="tab-Trials" class="tab-pane">
                	<div class="row">
                        <div class="col-lg-12">
                        <div class="hpanel">
                        <div class="panel-heading"></div>
                        <div class="panel-body tab-panel">
                            <div class="form-group form-horizontal col-md-12">
                                <div class="col-md-12">
                                    <table id="TrialsTable" class="table dataTable table-bordered table-striped">
                                        <thead>
                                        <tr>
                                        	<!--<th></th>-->								 	
                                        	<th>Trial Date</th>
                                            <th>Trial Status</th>
                                            <th>Trial Result</th>
                                            <th>Trial Type</th>
                                            <th>Jury Selection Date</th>
                                            <th>Judge Name</th>
                                            <th>Court Cal. Number</th>
                                            <th>Not Filed Date</th>
                                            <th>Receipt Date:</th>
                                            <th>Notes</th>
                                            <!--<th>Delete</th>-->
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <!--<div class="form-group form-horizontal col-md-12">
                                <div class="col-md-2"><button type="button" id="deleteTrialsButton" name="deleteTrialsButton" class="btn btn-primary"><i class="fa fa-trash-o"></i> Deleted Checked</button></div>
                            </div>-->
                            <!--<form id="add_Trials_Info_form"  method="post">
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Trial Date: </label>
                                    <div class="col-md-1">
                                    	<input type="hidden" name="CASE_ID" value="<?php //echo $Case_Id;?>">
                                        <input type="text" id="" name="Trial_Date"  class="form-control input-sm datetimepicker_Dos_Doe" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Trial Status: </label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="Trial_Status"  class="form-control input-sm" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Trial Result: </label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="Trial_Result"  class="form-control input-sm" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Trial Type: </label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="Trial_Type"  class="form-control input-sm" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Jury Selection Date:</label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="Jury_Selection_Date"  class="form-control input-sm datetimepicker_Dos_Doe" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Judge Name: </label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="Judge_Name"  class="form-control input-sm" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Court Cal Number: </label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="Court_Cal_Number"  class="form-control input-sm" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Not Filed Date: </label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="Not_Filed_Date"  class="form-control input-sm datetimepicker_Dos_Doe" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Receipt Date: </label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="Receipt_date"  class="form-control input-sm datetimepicker_Dos_Doe" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Service Complete Date: </label>
                                    <div class="col-md-1">
                                        <input type="text" id="" name="service_complete_date"  class="form-control input-sm datetimepicker_Dos_Doe" >
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <label class="col-md-2 control-label">Trial Notes: </label>
                                    <div class="col-md-2">
                                        <textarea rows="3"  id="" name="Notes" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal col-md-12">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary"> Save</button>
                                    </div>
                                </div>
                            </form>-->
                            	
                            
                        </div><!-- End of panel-body tab-panel-->
                        </div><!-- End hpanel -->
                        </div><!-- End col-lg-12-->
                    </div><!-- End row-->
                </div><!--End of Trials tab -->
                
				<div id="tab-6" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
						<div class="hpanel">
						<div class="panel-heading"></div>
						<div class="panel-body tab-panel">
                        	<div class="form-group form-horizontal col-md-12">
                            	<br><h5 class="h4-title">SETTLEMENT DETAIL</h5>
                            </div>
                            <div class="form-horizontal col-md-12 settlement-title-info">
                                <div class="col-md-2"></div>
                                <div class="col-md-1 case-info-tab6-title case-info-tab6-title-width">CASE ID</div>
                                <div class="col-md-2 case-info-tab6-title">PROVIDER</div>
                                <div class="col-md-2 case-info-tab6-title">INJURED PARTY</div>
                                <!--<div class="col-md-1 settled-by-show"></div>-->
                                <div class="col-md-2 case-info-tab6-title settled-by settled-by-show">SETTLED BY</div>
                                <div class="col-md-2 case-info-tab6-title settled-by settled-by-show">SETTLED DATE</div>
                                
							</div>
							<div class="form-horizontal col-md-12 settlement-title-info">
                            	<div class="col-md-2"></div>
								<div class="col-md-1 case-info-tab6 case-info-tab6-title-width" id="CaseId-tab-6"></div>
                                <div class="col-md-2 case-info-tab6" id="ProviderName-tab-6"></div>
                                <div class="col-md-2 case-info-tab6" id="InjuredPartyName-tab-6"></div>
                                
                                <!--<div class="col-md-1 settled-by-show"></div>-->
                                <div class="col-md-2 case-info-tab6 settled-by-info settled-by-show"></div>
                                <div class="col-md-2 case-info-tab6 settled-by-info settled-by-show">27/01/1231</div>
                               
							</div>
<!--------------- SETTLED FORM ---------------------------------------------------------------------------------->
                            <form method="post" id="settlement_form_open">
							<div class="form-group form-horizontal col-md-12 settled-status-open">
								<label class="col-md-2 control-label">ADJUSTER</label>
								<div class="col-md-6">
                                	<input type="hidden" name="Case_Id">
									<select class="form-control input-sm" id="adjusterIdTab-6" name="adjusterIdTab-6"><option selected="selected" value=""></option><?php foreach ($Adjuster_Name_Insurance as $row) {?><option value="<?php echo $row['Adjuster_Id']; ?>"> <?php echo $row['Adjuster_LastName']." ".$row['Adjuster_FirstName']." => [ADJ.PH#: ".$row['Adjuster_Phone']." / INS CPY: ". $row['InsuranceCompany_Name']." / ADJ FAX#: ".$row['Adjuster_Fax']."]"; ?> </option><?php  }?></select>
                                    <input type="hidden" name="SettledWithAdjuster">
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12 settled-status-open">
								<label class="col-md-2 control-label">ATTORNEY</label>
								<div class="col-md-6">
									<select class="form-control input-sm" id="defendantIdTab-6" name="defendantIdTab-6"><option selected="selected" value=""></option><?php foreach($Defendant_Name as $row){?><option value="<?php echo $row['Defendant_id']; ?>"><?php echo $row['Defendant_Name']." => ".$row['Defendant_Address'];?></option><?php }?></select>
                                    <input type="hidden" name="SettledWithAttorney">
								</div>
							</div>
                            <div class="form-group form-horizontal col-md-12 sett-with-name settled-by-show">
                            	<label class="control-label col-md-2">Settled with: </label>
                                <div class="col-md-8 case-info-tab6 settled-by-info"></div>
                            </div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-2 claim-paid-balance"><label class="control-label settlement-title">CLAIM AMOUNT</label> </div>
								<div class="col-md-2 claim-paid-balance"><label class="control-label settlement-title">PAYMENTS</label> </div>
								<div class="col-md-2 claim-paid-balance"><label class="control-label settlement-title">BALANCE</label> </div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-2 claim-paid-balance"><input step="0.0001" type="number" id="ClaimAmtTab6" name="ClaimAmtTab6" class="form-control input-sm Amount" disabled></div> 	 	
								<div class="col-md-2 claim-paid-balance"><input step="0.0001" type="number" id="PaymentsTab6" name="PaymentsTab6" class="form-control input-sm Amount" disabled></div>
								<div class="col-md-2 claim-paid-balance"><input step="0.0001" type="number" id="BalanceTab6" name="BalanceTab6"  class="form-control input-sm Amount" disabled></div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-4"></div>
								<div class="col-md-2 claim-paid-balance sett-percentage"><label class="control-label">PERCENTAGE (%)</label> </div>
							</div>
							<div class="form-group form-horizontal col-md-12 disabling_input">
                            	<input type="hidden" name="Case_Id" value="<?php echo $Case_Id;?>">
                                <input type="hidden" name="Case_AutoId" value="<?php echo $Case_AutoId;?>">
								<div class="col-md-2"></div>
								<div class="col-md-2 claim-paid-balance sett-cal-title-left"><label class="control-label">SETTLEMENT AMOUNT</label> </div>
								<div class="col-md-2 claim-paid-balance">
                                    <!--<input type="text" id="FltSettlement_AmountTab6" name="Settlement_Amount"  class="form-control input-sm Amount settled-by-info" />-->
                                    <input type="number" name="Settlement_Amount" value="" class="form-control input-sm Amount settled-by-info"/>
                                </div>
								<div class="col-md-2 claim-paid-balance"><input step="0.01" type="number" id="settlementPercentageTab6" name="settlementPercentageTab6"  class="form-control input-sm percentage" value="100.00"></div>
							</div>
                            <div class="form-group form-horizontal col-md-12">
                            	<div class="col-md-5"></div>
                                <div class="col-md-1 start-date-settlement settled-status-open"><label class="control-label col-md-12 viewcase-label">START DATE</label> </div>
                                <div class="col-md-1 end-date-settlement settled-status-open"><label class="control-label col-md-12 viewcase-label">END DATE</label> </div>
                                <div class="col-md-1 settled-status-open"><label class="control-label col-md-12 viewcase-label">No. of Days:</label> </div>
                            </div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-2 claim-paid-balance sett-cal-title-left"><label class="control-label">INTEREST</label> </div>
								<div class="col-md-2 claim-paid-balance">
                                	<input type="number" id="FltInterestTab6" name="Settlement_Int"  class="form-control input-sm Amount settled-by-info" />
                                </div>
								<div class="col-md-2 claim-paid-balance"><input step="0.01" type="number" id="FltInterestPercTab6" name="FltInterestPercTab6"  class="form-control input-sm percentage" value="100.00" ></div>
								
								<div class="col-md-1 settled-status-open viewcase-input"><input type="text" id="CopundIntStartData" name="CopundIntStartData"  class="form-control input-sm datepicker_settlement" ></div>
								
								<div class="col-md-1 settled-status-open viewcase-input"><input type="text" id="CopundIntEndData" name="CopundIntEndData"  class="form-control input-sm datepicker_settlement" ></div>
                                
                                <div class="col-md-1 settled-status-open viewcase-input"><input type="number" name="No_of_days" class="form-control input-sm"></div> 
							</div>
							<div class="form-group form-horizontal col-md-12 settled-status-open">
								<div class="col-md-3"></div>
								<div class="col-md-2 CalSimpleInterest-div"><button type="button" class="CalSimpleInterest" id="CalculateSI">Calculate Simple interest</button></div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-2 claim-paid-balance sett-cal-title-left"><label class="control-label">ATTORNEY'S FEE 	</label> </div>
								<div class="col-md-2 claim-paid-balance"><input step="0.01" type="number" id="FltAttorneyFeeTab6" name="Settlement_Af"  class="form-control input-sm Amount" ></div>
								<div class="col-md-2 claim-paid-balance"><input step="0.01" type="number" id="FltAttorneyPercTab6" value="100.00" name="FltAttorneyPercTab6"  class="form-control input-sm percentage" disabled></div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-2 claim-paid-balance sett-cal-title-left"><label class="control-label">FILING FEE</label> </div>
								<div class="col-md-2 claim-paid-balance"><input step="0.01" type="number" id="FltFillingFeeTab6" name="Settlement_Ff"  class="form-control input-sm Amount" ></div>
								<div class="col-md-2 claim-paid-balance"><input step="0.01" value="100.00" type="number" id="FltFillingFeePercTab6" name="FltFillingFeePercTab6"  class="form-control input-sm percentage" disabled></div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-2 claim-paid-balance sett-cal-title-left"><label class="control-label settlement-title">TOTAL AMOUNT</label> </div>
								<div class="col-md-2 claim-paid-balance"><input type="text" id="TotalAmount" name="Settlement_Total"  class="form-control input-sm Amount" ></div>
								<div class="col-md-2 claim-paid-balance"><input step="0.01" value="100.00" type="number" id="TotalAmountPerc" name="TotalAmountPerc"  class="form-control input-sm percentage" disabled></div>
							</div>
							<div class="form-group form-horizontal col-md-12 settled-status-open">
								<div class="col-md-3"></div>
								<div class="col-md-2 recalculate-btn"><button type="button" id="RecalculateAmt">Re-Calculate Amount</button></div>
								<!--<div class="add-amt-btn col-md-1"></div>-->
								<div class="reset-amt-btn col-md-1 sett-reset-values"><button type="button" id="ResetValues" class="">Reset Values</button></div>
							</div>
                            <div class="form-group form-horizontal col-md-12 settled-status-open">
								<label class="col-md-2 control-label">SETTLED TYPE</label>
								<div class="col-md-2 sett-type">
									<select class="form-control input-sm" id="SettledType" name="SettledType" required>
                                        <option value="0">...SELECT....</option>
                                        <option value="Settled/Phone">SETTLED/PHONE</option>
                                        <option value="Settled/AAA">SETTLED/AAA</option>
                                        <option value="AAA HEARING WON">AAA HEARING WON</option>
                                        <option value="Settled/Court">SETTLED IN COURT</option>
                                        <option value="Trial/Win">TRIAL WON</option>
                                        <option value="Trial/Lose">TRIAL LOST</option>
									</select>
								</div>
							</div>
                            <div class="form-group form-horizontal col-md-12 settled-status-open">
								<label class="col-md-2 control-label">Notes</label>
								<div class="col-md-4 sett-notes">
									<textarea rows="3"  id="Settlement_Notes" name="Settlement_Notes" class="form-control" required></textarea>
								</div>
							</div>
                            <div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-2 finalize-sett-button"><button type="submit" class="btn btn-primary" id="finalizeButton" <?php if($Check_Status =="OPEN" || $Check_Status =="OPEN "){}else{echo "disabled";}?>><i class="fa fa-check"></i> Finalize Settlement</button></div>
								<div class="col-md-1 sett-reset"><button type="button" class="reset-settlement">Reset</button></div>
							</div>
                            </form>
                            
						</div><!-- End of panel-body tab-panel-->
						</div><!-- End hpanel -->
						</div><!-- End col-lg-12-->
					</div><!-- End row-->
				</div><!--End of Settlement Tab -->
                
				<div id="tab-7" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
						<div class="hpanel">
						<div class="panel-heading"></div>
						<div class="panel-body tab-panel">
							<div class="form-group form-horizontal col-md-12">
								<br><h5 class="h4-title">New Settlements</h5>
								<label class="col-md-2 control-label">CASE ID</label>
								<label class="col-md-2 control-label">PROVIDER</label>
								<label class="col-md-2 control-label">INJURED PARTY</label>
							</div>
                            <div class="form-group form-horizontal col-md-12">
								<label class="col-md-2 control-label">CASE ID</label>
								<label class="col-md-2 control-label">PROVIDER</label>
								<label class="col-md-2 control-label">INJURED PARTY</label>
							</div>
                            <div class="form-group form-horizontal col-md-12"> 	 	
								<div class="col-md-2"></div>
								<div class="col-md-2"><label class="control-label">Claim Amount</label> </div>
								<div class="col-md-2"><label class="control-label">Payments</label> </div>
								<div class="col-md-2"><label class="control-label">Balance Due</label> </div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-2"><input type="text" id="" name="" class="form-control input-sm" ></div> 	 	
								<div class="col-md-2"><input type="text" id="" name="" class="form-control input-sm" ></div>
								<div class="col-md-2"><input type="text" id="" name=""  class="form-control input-sm" ></div>
							</div>
                            <div class="form-group form-horizontal col-md-12">  				 	
								<div class="col-md-2"></div>
								<div class="col-md-2"><label class="control-label">Settlement Total</label> </div>
								<div class="col-md-2"><label class="control-label">Interest Total</label> </div>
								<div class="col-md-2"><label class="control-label">Attorney Total</label> </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-2"><label class="control-label">Filing Fee Total</label> </div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-2"><input type="text" id="" name="" class="form-control input-sm" ></div> 	 	
								<div class="col-md-2"><input type="text" id="" name="" class="form-control input-sm" ></div>
								<div class="col-md-2"><input type="text" id="" name=""  class="form-control input-sm" ></div>
                                <div class="col-md-1"></div>
                                <div class="col-md-2"><input type="text" id="" name=""  class="form-control input-sm" ></div>
							</div>
                            <div class="form-group form-horizontal col-md-12">
								<label class="col-md-2 control-label">ADJUSTER</label>
								<div class="col-md-6">
									<select class="form-control input-sm" id="" name="" required>
										<option selected="selected" value=""></option>
										<?php //foreach($InsuranceCompany_Name as $row){?>
										<option value="<?php //echo $row['InsuranceCompany_Id']; ?>"><?php //echo $row['InsuranceCompany_Name'];?> option</option>
										<?php // }?>
									</select>
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-md-2 control-label">ATTORNEY</label>
								<div class="col-md-6">
									<select class="form-control input-sm" id="" name="" required>
										<option selected="selected" value=""></option>
										<?php //foreach($InsuranceCompany_Name as $row){?>
										<option value="<?php //echo $row['InsuranceCompany_Id']; ?>"><?php //echo $row['InsuranceCompany_Name'];?> option</option>
										<?php // }?>
									</select>
								</div>
							</div>
                            <div class="form-group form-horizontal col-lg-12 set-bg">
                                <div class="table-responsive">
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped add-case-table">
                                        <thead>
                                        <tr>				 		
                                        	<th>Select</th>
                                            <th>D.O.S-Start</th>
                                            <th>D.O.S.-End</th>
                                            <th>Claim Amt.</th>
                                            <th>Paid Amt.</th>
                                            <th>Bal.Amt</th>
                                            <th>Stlmt</th>
                                            <th>Int.</th>
                                            <th>AttFee.</th>
                                            <th>FFee.</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="first-row">
                                        	<td><input type="checkbox" /></td>
                                            <td><input id="dateOfServiceStart" name="dateOfServiceStart" class="form-control input-sm datepicker_recurring_start" value="<?php echo $DateOfService_Start;?>"></td>
                                            <th><input id="dateOfServiceEnd"  name="dateOfServiceEnd" class="form-control input-sm datepicker_recurring_start" value="<?php echo $DateOfService_End;?>"></th>
                                            <td><input type="number" step="0.01" id="claimAmt" name="claimAmt" class="form-control input-sm" value="<?php echo $Claim_Amount;?>"></td>
                                            <td><input type="number" step="0.01" id="paidAmt" name="paidAmt" class="form-control input-sm" value="<?php echo $Paid_Amount;?>"></td>
                                            <td><input type="number" step="0.01" id="paidAmt" name="paidAmt" class="form-control input-sm" value="<?php echo $Paid_Amount;?>"></td>
                                            <td><input type="number" step="0.01" id="paidAmt" name="paidAmt" class="form-control input-sm" value="<?php echo $Paid_Amount;?>"></td>
                                            <td><input type="number" step="0.01" id="paidAmt" name="paidAmt" class="form-control input-sm" value="<?php echo $Paid_Amount;?>"></td>
                                            <td><input type="number" step="0.01" id="paidAmt" name="paidAmt" class="form-control input-sm" value="<?php echo $Paid_Amount;?>"></td>
                                            <td><input type="number" step="0.01" id="paidAmt" name="paidAmt" class="form-control input-sm" value="<?php echo $Paid_Amount;?>"></td>
                                            <td><input type="number" step="0.01" id="paidAmt" name="paidAmt" class="form-control input-sm" value="<?php echo $Paid_Amount;?>"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-2"></div>
								<div class="col-md-1"><label class="control-label">PERCENTAGE (%)</label> </div>
							</div>
                            <div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-1"><label class="control-label">SETTLEMENT AMOUNT</label> </div>
								<div class="col-md-1"><input type="text" id="" name=""  class="form-control input-sm" ></div>
								<div class="col-md-1"><input type="text" id="" name=""  class="form-control input-sm" ></div>
                                <div class="col-md-1"><label class="control-label">Settlement Type</label> </div>
                                <div class="col-md-2">
                                	<select class="form-control input-sm" id="" name="" required>
										<option selected="selected" value=""></option>
										<?php //foreach($InsuranceCompany_Name as $row){?>
										<option value="<?php //echo $row['InsuranceCompany_Id']; ?>"><?php //echo $row['InsuranceCompany_Name'];?> option</option>
										<?php // }?>
									</select>
                                </div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-1"><label class="control-label col-md-12">INTEREST</label> </div>
								<div class="col-md-1"><input type="text" id="" name=""  class="form-control input-sm" ></div>
								<div class="col-md-1"><input type="text" id="" name=""  class="form-control input-sm" ></div>
                                <div class="col-md-1"><label class="control-label">Interest Type</label> </div>
                                <div class="col-md-2">
                                	<select class="form-control input-sm" id="" name="" required>
										<option selected="selected" value=""></option>
										<?php //foreach($InsuranceCompany_Name as $row){?>
										<option value="<?php //echo $row['InsuranceCompany_Id']; ?>"><?php //echo $row['InsuranceCompany_Name'];?> option</option>
										<?php // }?>
									</select>
                                </div>
							</div>
                            <div class="form-group form-horizontal col-md-12">
                            	<div class="col-md-2"></div>
                                <div class="col-md-1"><label class="control-label col-md-12">START DATE</label> </div>
								<div class="col-md-1"><input type="text" id="" name=""  class="form-control input-sm" ></div>
								<div class="col-md-1"><label class="control-label col-md-12">END DATE</label> </div>
								<div class="col-md-1"><input type="text" id="" name=""  class="form-control input-sm" ></div>
                            </div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-3"></div>
								<div class="col-md-2"><button>Calculate Interest</button></div>
							</div>
                            <div class="form-group form-horizontal col-md-12">
								<label class="col-md-3 control-label">Notes</label>
								<div class="col-md-4">
									<textarea rows="3"  id="memo" name="memo" class="form-control" ></textarea>
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-1"><label class="control-label">ATTORNEY'S FEE 	</label> </div>
								<div class="col-md-1"><input type="text" id="" name=""  class="form-control input-sm" ></div>
								<div class="col-md-1"><input type="text" id="" name=""  class="form-control input-sm" ></div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-1"><label class="control-label">FILING FEE</label> </div>
								<div class="col-md-1"><input type="text" id="" name=""  class="form-control input-sm" ></div>
								<div class="col-md-1"><input type="text" id="" name=""  class="form-control input-sm" ></div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-1"><label class="control-label">TOTAL AMOUNT</label> </div>
								<div class="col-md-1"><input type="text" id="" name=""  class="form-control input-sm" ></div>
								<div class="col-md-1"><input type="text" id="" name=""  class="form-control input-sm" ></div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-3"></div>
								<div class="col-md-2"><button>Apply/Re-Calculate Amount</button></div>
								<div class="col-md-2"><button>Reset old Values</button></div>
								<div class="col-md-2"><button>Finalize Settlement</button></div>
							</div>
                            
                            
						</div><!-- End of panel-body tab-panel-->
						</div><!-- End hpanel -->
						</div><!-- End col-lg-12-->
					</div><!-- End row-->
				</div><!--End of New Settlement Tab-->
                
				<div id="tab-8" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
						<div class="hpanel">
						<div class="panel-heading"></div>
						<div class="panel-body tab-panel">
							<div class="form-group form-horizontal col-md-12">
                            	<h5 class="h4-title">Settlement Quick View</h5>
                                <div class="col-md-12">
                                    <table id="SettlementQuickView" class="table dataTable table-bordered table-striped">
                                        <thead>
                                        <tr> 
                                            <th>Case ID</th>
                                            <th>Provider</th>
                                            <th>Injured Name</th>
                                            <th>Ins Company</th>
                                            <th>Index/AAA</th>
                                            <th>Claim Amt.</th>
                                            <th>Paid Amt.</th>
                                            <th>Balance</th>
                                            <th>Status</th>
                                            <th>Settled Amt.</th>
                                            <th>Interest</th>
                                            <th>AF</th>
                                            <th>FF</th>
                                            <th>Total</th>
                                            <th>Stlmnt Date</th>
                                            <th>Settled With</th>
                                            <th>Settled By</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    
                                </div>
                            </div>
                            <!--<form action="/casemanager/ search/testmethod" method="post">-->
                            <div class="form-group form-horizontal col-md-12">
                            	<h5 class="h4-title">PAYMENT DETAILS</h5>
                                <div class="col-md-12">
                                    <table id="TransactionTable" class="table dataTable table-bordered table-striped">
                                        <thead>
                                        <tr>					
                                            <th>Provider</th>
                                            <th>Transactions Type</th>
                                            <th>Trans. Date</th>
                                            <th>Trans. Amt.</th>
                                            <th>Description</th>
                                            <th>Fee</th>
                                            <th>Transactions Status</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                                <div class="col-md-2"><button type="button" id="deleteTransactionsButton" name="deleteTransactionsButton" class="btn btn-primary"><i class="fa fa-trash-o"></i> Deleted Checked</button></div>
                            </div>
                            <!--</form>-->
                            <form method="post" id="add_Transactions_Form" >
                            <div class="form-group form-horizontal col-md-12">
                            	<input type="hidden" name="Case_Id" value="<?php echo $Case_Id;?>">
                                <input type="hidden" name="Provider_Name_Trans" value="<?php echo $Provider_Name_fix;?>">
                                <input type="hidden" name="Provider_Id_Trans" value="<?php echo $Provider_Id_fix;?>">
                            	<label class="col-md-2 control-label">Transaction Amount</label>
                                <div class="col-md-2">
                                	<input type="number" id="Transactions_Amount" name="Transactions_Amount"  class="form-control input-sm" >
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Transaction Date</label>
                                <div class="col-md-2">
                                	<input type="text" id="Transactions_Date" name="Transactions_Date"  class="form-control input-sm datetimepicker_Dos_Doe" >
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Transaction Type</label>
                                <div class="col-md-2">
                                	<select class="form-control input-sm" id="Transactions_Type" name="Transactions_Type" >
                                    	<option selected value=""></option>
                                        <!--<option selected="selected" value="0">...Select...</option>-->
                                        <option value="C">Collected (C - From Insurer)</option>
                                        <option value="AF">Attorney Fee (AF)</option>
                                        <option value="CRED">Credit (CRED - To Provider)</option>
                                        <option value="EXP">Expense (EXP - Billed to Provider)</option>
                                        <option value="FFB">Filing Fee Billed (FFB)</option>
                                        <option value="FFC">Filing Fee Collected (FFC - From Provider)</option>
                                        <option value="I">Interest (I - From Insurer)</option>
                                        <option value="W">WriteOff (W - To Provider)</option>
									</select>
                                 </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Transaction Status</label>
                                <div class="col-md-2">
                                	<select class="form-control input-sm" id="Transactions_status" name="Transactions_status" >
                                    	<option selected value=""></option>
                                        <option value="Show On Remittance">Show On Remittance</option>
                                        <option value="XFREEZED">FREEZED</option>
                                        <option value="X">Do Not Show On Remittance</option>
                                        
                                     </select>
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Notes</label>
                                <div class="col-md-4">
									<textarea rows="3"  id="Transactions_Description" name="Transactions_Description" class="form-control" ></textarea>
								</div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<div class="col-md-2"></div>
                                <div class="col-md-2">
                                	<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                                </div>
                            </div>
                            </form>
						</div><!-- End of panel-body tab-panel-->
						</div><!-- End hpanel -->
						</div><!-- End col-lg-12-->
					</div><!-- End row-->
				</div><!--End of Payment Tab-->
                
				<div id="tab-9" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
						<div class="hpanel">
						<div class="panel-heading"></div>
						<div class="panel-body tab-panel">
                        <form id="updateEventInfo_form"  method="post">
							<div class="form-group form-horizontal col-md-12">
                            	<h5 class="h4-title">Event Module</h5>
                            	<label class="col-md-2 control-label">User_Id:</label>
                                <div class="col-md-2">
                               		<input type="hidden" name="EventIdHidden">
                                	<input type="text" id="UserId" name="UserId"  class="form-control input-sm" value="admin" >
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Case_Id:</label>
                                <div class="col-md-2">
                                	<input type="text" id="9CaseIdHidden" name="9CaseIdHidden"  class="form-control input-sm" disabled />
                                	<input type="hidden" id="9CaseId" name="9CaseId"  class="form-control input-sm"/>
                                </div>
                            </div>
                            
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Event Date <span class="required-field">*</span></label>
                                <div class="col-md-2">
                                	<input class="form-control input-sm datepicker_settlement" name="EventDate">
                                </div>
                                <!--<div class='input-group date col-md-2' id='datetimepicker6'>
                                    <input type='text' class="form-control input-sm" id="EventDate" name="EventDate" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>-->
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Event Time</label>
                                <div class="col-md-2">
                                	<input class="input-sm datetimepicker_only_time" name="Event_Time" />
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Event Type</label>
                                <div class="col-md-2">
                                	<input id="EventType" name="EventType"  class="form-control input-sm" disabled>
                                    <input type="hidden" name="EventTypeHidden">
                                </div>
                                <div class="col-md-4">
                                	<select class="form-control input-sm" id="selectEventType" name=""><option selected="selected" value="">Select Event Type</option><?php foreach($EventType as $row){?><option value="<?php echo $row['EventTypeId']; ?>"><?php echo $row['EventTypeName'];?></option><?php  }?></select>
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Event Status: </label>
                                <div class="col-md-2">
                                	<input id="EventStatus" name="EventStatus"  class="form-control input-sm" disabled>
                                    <input type="hidden" name="EventStatusHidden">
                                </div>
                                <div class="col-md-4">
                                	<select class="form-control input-sm" id="selectEventStatus" name=""><option selected="selected" value="">Select Event Status</option><?php foreach($EventStatus as $row){?><option value="<?php echo $row['EventStatusId']; ?>"><?php echo $row['EventStatusName'];?></option><?php  }?></select>
                                </div>
                            </div>
                            <!--<div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Time</label>
                                <div class="col-md-2">
                                	<input id="EventTime" name="EventTime"  class="form-control input-sm" >
                                </div>
                            </div>-->
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Event Notes: </label>
                                <div class="col-md-2">
                                	<textarea rows="3"  id="EventDescription" name="EventDescription" class="form-control" ></textarea>
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Assigned To: </label>
                                <div class="col-md-2">
                                    <input type="text" name="AssignUser"  class="form-control input-sm">
                                    <!--<input type="hidden" name="AssignUserHidden"  class="form-control input-sm">-->
                                </div>
                                <div class="col-md-4">
                                	<select class="form-control input-sm" id="9selectAssignUser" name="9selectAssignUser"><option selected="selected" value="">Select User to Assign</option><?php foreach($User_List as $row){?><option value="<?php echo $row['UserName']; ?>"><?php echo $row['UserName'];?></option><?php  }?></select>
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<div class="col-md-2"></div>
                                <div class="col-md-2"><button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save</button></div>
                            </div>
                            </form>
                            <!--<form action="/casemanager/search/deleteEvents" method="post">-->
                            <div class="form-group form-horizontal col-md-12">
                                <div class="col-md-12">
                                    <table id="eventTable" class="table dataTable table-bordered table-striped">
                                        <thead>
                                        <tr> 	
                                        	<th>Edit</th>											
                                            <th>Case ID</th>
                                            <th>Event Type</th>
                                            <th>Event Status</th>
                                            <th>Event Date</th>
                                            <th>Event Time</th>
                                            <th>Event Description</th>
                                            <th>Assigned To</th>
                                            <th>Provider Name</th>
                                            <th>Injured Party</th>
                                            <th>Court Name</th>
                                            <th>IndexOrAAA Number</th>
                                            <th>Defendant Name</th>
                                            <th>InsuranceCompany Name</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                                <div class="col-md-2"><button type="button" id="deleteEventsButton" name="deleteEventsButton" class="btn btn-primary"><i class="fa fa-trash-o"></i> Deleted Checked</button></div>
                            </div>
                            <!--</form>-->
                            
                            
						</div><!-- End of panel-body tab-panel-->
						</div><!-- End hpanel -->
						</div><!-- End col-lg-12-->
					</div><!-- End row-->
				</div> <!-- End of Tab-9 Event -->
			</div>
		
		</div><!-- End hpanel -->
		</div><!-- End col-lg-12-->
	</div><!-- End row-->
    
    <!-- EDIT Notes -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                    <form id="UpdateNotesInfo_form" method="post">
                        <div class="modal-body">
                            <div class="hpanel">
                                <div class="panel-body tab-panel">
                                    <div class="form-group form-horizontal col-md-12">
                                    	<input type="hidden" class="mNoteId" name="Notes_ID">
                                        <label class="col-md-3 control-label">Description</label>
                                        <div class="col-md-6">
                                            <textarea rows="3" id="mnotesDescription" name="Notes_Desc" class="mNoteDesc  form-control" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal col-md-12">
                                        <label class="col-md-3 control-label">Edited By</label>
                                        <div class="col-md-4">
                                            <input type="text" class="mNoteEditedBy input-sm" id="mEditedBy" name="User_Id">
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal col-md-12">
                                    	<label class="col-md-3 control-label">Edited Date</label>
                                        <div class="col-md-4">
                                            <input type="text" class="mNoteDate input-sm datetimepicker_start" id="mEditedDate" name="Notes_Date">
                                        </div>
                                    </div>
                                    <div class="form-group form-horizontal col-md-12">
                                        <label class="col-md-3 control-label">Notes Type</label>
                                        <div class="col-md-4">
                                            <select class="form-control input-sm mNoteType" id="mNoteType" name="Notes_Type">
                                                <option value="ACTIVITY">ACTIVITY</option>
                                                <option value="CALENDAR">CALENDAR</option>
                                                <option value="GENERAL">GENERAL</option>
                                                <option value="POPUP">POPUP</option>
                                                <option value="PROVIDER">PROVIDER</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    
    <!-- SHOW PROVIDER INFO-->
    <div class="modal fade" id="showProviderInfoLink" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            	<h5 class="modal-title work-area-modal-title">Provider Info</h5>
            	<div class="table-responsive">
                    <table cellpadding="1" id="Provider_Info_table" cellspacing="1" class="table tdAlignLeft work-area-info info-link-popup">
                        <tbody>
                            <tr> <th>Name</th> <td></td> </tr>
                            <tr> <th>Address</th> <td></td> </tr>
                            <tr> <th>City</th> <td></td> </tr>
                            <tr> <th>State</th> <td></td> </tr>
                            <tr> <th>Zip</th> <td></td> </tr>
                            <tr> <th>Phone</th> <td></td> </tr>
                            <tr> <th>Fax</th> <td></td> </tr>
                            <tr> <th>Email</th> <td></td> </tr>
                            <tr> <th>Type</th> <td></td> </tr>
                        </tbody>
                    </table>
                </div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"> Close </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- SHOW INSURANCE INFO-->
    <div class="modal fade" id="showInsuranceCompanyInfoLink" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            	<h5 class="modal-title work-area-modal-title">Insurance Company Info</h5>
            	<div class="table-responsive">
                    <table cellpadding="1" id="InsuranceCompany_Info_table" cellspacing="1" class="table tdAlignLeft work-area-info info-link-popup">
                        <tbody>
                            <tr> <th>Name</th> <td></td> </tr>
                            <tr> <th>Local Address</th> <td></td> </tr>
                            <tr> <th>City</th> <td></td> </tr>
                            <tr> <th>State</th> <td></td> </tr>
                            <tr> <th>Zip</th> <td></td> </tr>
                            <tr> <th>Phone</th> <td></td> </tr>
                            <tr> <th>Fax</th> <td></td> </tr>
                            <tr> <th>Email</th> <td></td> </tr>
                            <tr> <th>Type</th> <td></td> </tr>
                        </tbody>
                    </table>
                </div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"> Close </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- SHOW DEFENDANT INFO-->
    <div class="modal fade" id="showDefendantInfoLink" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            	<h5 class="modal-title work-area-modal-title">Defendant Info</h5>
            	<div class="table-responsive">
                    <table cellpadding="1" id="Defendant_Info_table" cellspacing="1" class="table tdAlignLeft work-area-info info-link-popup">
                        <tbody>
                            <tr> <th>Name</th> <td></td> </tr>
                            <tr> <th>Local Address</th> <td></td> </tr>
                            <tr> <th>City</th> <td></td> </tr>
                            <tr> <th>State</th> <td></td> </tr>
                            <tr> <th>Zip</th> <td></td> </tr>
                            <tr> <th>Phone</th> <td></td> </tr>
                            <tr> <th>Fax</th> <td></td> </tr>
                            <tr> <th>Email</th> <td></td> </tr>
                            <tr> <th>Type</th> <td></td> </tr>
                        </tbody>
                    </table>
                </div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"> Close </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- SHOW ADJUSTER INFO-->
    <div class="modal fade" id="showAdjusterInfoLink" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            	<h5 class="modal-title work-area-modal-title">Adjuster Info</h5>
            	<div class="table-responsive">
                    <table cellpadding="1" id="Adjuster_Info_table" cellspacing="1" class="table tdAlignLeft work-area-info info-link-popup">
                        <tbody>
                            <tr> <th>Name</th> <td></td> </tr>
                            <tr> <th>Local Address</th> <td></td> </tr>
                            <tr> <th>City</th> <td></td> </tr>
                            <tr> <th>State</th> <td></td> </tr>
                            <tr> <th>Zip</th> <td></td> </tr>
                            <tr> <th>Phone</th> <td></td> </tr>
                            <tr> <th>Fax</th> <td></td> </tr>
                            <tr> <th>Email</th> <td></td> </tr>
                            <tr> <th>Type</th> <td></td> </tr>
                        </tbody>
                    </table>
                </div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"> Close </button>
                </div>
            </div>
        </div>
    </div>

    <!-- SHOW INJURED PARTY INFO-->
    <div class="modal fade" id="showInjuredInfoLink" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            	<h5 class="modal-title work-area-modal-title">Injured Party</h5>
            	<div class="table-responsive">
                    <table cellpadding="1" id="Injured_Info_table" cellspacing="1" class="table tdAlignLeft work-area-info info-link-popup">
                        <tbody>
                            <tr> <th>Name</th> <td></td> </tr>
                            <tr> <th>Local Address</th> <td></td> </tr>
                            <tr> <th>City</th> <td></td> </tr>
                            <tr> <th>State</th> <td></td> </tr>
                            <tr> <th>Zip</th> <td></td> </tr>
                            <tr> <th>Phone</th> <td></td> </tr>
                        </tbody>
                    </table>
                </div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"> Close </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- SHOW INSURED PARTY INFO-->
    <div class="modal fade" id="showInsuredInfoLink" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            	<h5 class="modal-title work-area-modal-title">Insured Party</h5>
            	<div class="table-responsive">
                    <table cellpadding="1" id="Insured_Info_table" cellspacing="1" class="table tdAlignLeft work-area-info info-link-popup">
                        <tbody>
                            <tr> <th>Name</th> <td></td> </tr>
                            <tr> <th>Local Address</th> <td></td> </tr>
                            <tr> <th>City</th> <td></td> </tr>
                            <tr> <th>State</th> <td></td> </tr>
                            <tr> <th>Zip</th> <td></td> </tr>
                        </tbody>
                    </table>
                </div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"> Close </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- SELECT EITHER ADJUSTER OR ATTORNEY -->
    <div class="modal fade hmodal-warning" id="AdjOrAtt" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="color-line"></div>
                <div class="modal-header">
                    <h4 class="modal-title">Select either Adjuster or Attoreny</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"> Close </button>
                </div>
            </div>
        </div>
    </div>

    

</div>

<?php
//mkdir("testing");
if (!file_exists('Cases/'.$Case_Id)) {
    mkdir('Cases/'.$Case_Id);
}

?>
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
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    
    <!-- DATETIMEPICKER SCRIPTS -->
    <script src="<?php echo base_url();?>assets/vendor/Date/date.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/mask-phone/maskPhone.js"></script>
    <script src="<?php echo base_url();?>assets/datetimepicker/jscss/js/moment-with-locales.js"></script>
    <script src="<?php echo base_url();?>assets/datetimepicker/jscss/js/bootstrap-datetimepicker.js"></script>
    
    <!-- ALERT SCRIPTS -->
    <script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/toastr/build/toastr.min.js"></script>
    
    <!-- App scripts --> 
    <script src="<?php echo base_url();?>assets/scripts/homer.js"></script> 

<script>
$(document).ready(function(e) {
	//$(".info-link-popup tr:nth-child(2) td:nth-child(2)").css("color", "blue");
	$('#notesDescription5').bind("cut copy paste",function(e) {
		e.preventDefault();
	});
	//$(".financials").find(".view-reports").attr("href", "<?php echo base_url();?>/financials/reports/<?php echo $Case_Id;?>");
	var Accessibility = true;
	if(Accessibility){
		console.log("Accessibility:"+Accessibility);
		<?php if(!$Admin) {?>
		$("#WorkAreaTable th:nth-child(1)").html("");
		$("#WorkAreaTable th:nth-child(4)").html("");
		//$("#Treatement_Info_table th:nth-child(2), #Treatement_Info_table th:nth-child(9)").html("");
		
		//$("#Treatement_Info_table td:nth-child(4), #Treatement_Info_table td:nth-child(9)").html("");
		$("#ExtendedCase_Info_table th:nth-child(1), #ExtendedCase_Info_table th:nth-child(4)").html("");
		<?php } ?>
	}
	Update_Settlement();
	var current_case_status ="";
	var NewRow = $('#Treatement_Info_table').dataTable( {
		"ajax": "<?php echo base_url();?>search/getTreatement/<?php echo $Case_Id;?>",
		"iDisplayLength": 10,
    	"aLengthMenu": [5, 10, 20, 25, 50, "All"],
		"bSort": false,
		"searching": false,
		"lengthChange": false,
		"bInfo": false,
		"bPaginate": false
	});
	$("#Payment_Info_table input").prop("disabled", true);
/**************************** CASEINFORMATION TAB-1 ************************************************************************************/
	var countForRows = 0;
	var value = 0;
/**** ADD TREATEMENT ROW**********/
	$("#addOtherInfo").click(function(){
		var parentR = $(this).parent().parent().parent();
		
		var DateOfService_Start = $(parentR).find("input[name=dateOfServiceStart]").val();
		var DateOfService_End = $(parentR).find("input[name=dateOfServiceEnd]").val();
		var Claim_Amount = $(parentR).find("input[name=Claim_Amount_treat]").val();
		var Paid_Amount = $(parentR).find("input[name=Paid_Amount_treat]").val();
		var Date_BillSent = $(parentR).find("input[name=Date_BillSent_treat]").val();
		var denialReasons = $(parentR).find("#denialReasons").val();
		var serviceType = $(parentR).find("#serviceType").val();
		
		
		var string = "&DateOfService_Start="+DateOfService_Start+"&DateOfService_End="+DateOfService_End+"&Claim_Amount="+Claim_Amount+"&Paid_Amount="+Paid_Amount+"&Date_BillSent="+Date_BillSent+"&denialReasons="+denialReasons+"&serviceType="+serviceType+"&Case_Id=<?php echo $Case_Id;?>";
		
		request = $.ajax({
			url:"<?php echo base_url(); ?>search/add_Treatement",
			type: "post",
			data: string
		});

		request.done(function (response, textStatus, jqXHR) {
			console.log("Successssss ");
			$("#Treatement_Info_table").dataTable().fnDestroy();
			$('#Treatement_Info_table').dataTable( {
				"ajax": "<?php echo base_url();?>search/getTreatement/<?php echo $Case_Id;?>",
				"iDisplayLength": 10,
				"aLengthMenu": [5, 10, 20, 25, 50, "All"],
				"bSort": false,
				"searching": false,
				"lengthChange": false,
				"bInfo": false,
				"bPaginate": false
			});
			$(parentR).find("input[name=dateOfServiceStart]").val("");
			$(parentR).find("input[name=dateOfServiceEnd]").val("");
			$(parentR).find("input[name=Claim_Amount_treat]").val("");
			$(parentR).find("input[name=Paid_Amount_treat]").val("");
			$(parentR).find("input[name=Date_BillSent_treat]").val("");
				callSuccess();
		});
	});
/**** DELETE TREATEMENT ROW **********/
	 $('#DeleteButton').click(function(){
		var final = '';
		$('.ads_Checkbox:checked').each(function(){        
			var values = $(this).val();
			$(".r"+values).remove();
			countForRows--;
		});
		if(countForRows == 0){
			$("#DeleteButton").css("display", "none");
		}
		
	});
/**** DELETE TREATEMENT **********/
	$('body').on( 'click', '#deleteTreatementButton', function () {
		var DeletedTreatementId = [];
		$('.DeleteTreatement:checked').each(function(i){
			var values = $(this).val();
			DeletedTreatementId.push(values);
		});
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
					url:"<?php echo base_url();?>search/deleteTreatement",
					type: "post",
					data: {DeletedTreatementId:DeletedTreatementId, Case_Id:"<?php echo $Case_Id;?>"}
				});
		
				request.done(function (response, textStatus, jqXHR) {
					$('.DeleteTreatement:checked').each(function(i){
						var values = $(this).val();
						var row = $(".DeleteTreatement"+values).parent().parent();
						$(row).remove();
					});
				});
				swal("Deleted!", "Your records has been deleted.", "success");
			} else {
				swal("Cancelled", "Your records are safe :)", "error");
			}
		
		});
	});
/**** EDIT TREATEMENT **********/
	$('tbody').on( 'click', '.editTreatment', function () {
		var parentR = $(this).parent();
		var currentRow = $(this).parent().parent();
		var div = $(parentR).find(".update-Treatment").css("display", "block");
		$(this).css("display", "none");
		$(this).parent().parent().find("input[name=dateOfServiceStart]").prop("disabled", false);
		$(this).parent().parent().find("input[name=dateOfServiceEnd]").prop("disabled", false);
		$(this).parent().parent().find("input[name=Claim_Amount_treat]").prop("disabled", false);
		$(this).parent().parent().find("input[name=Paid_Amount_treat]").prop("disabled", false);
		$(this).parent().parent().find("input[name=Date_BillSent_treat]").prop("disabled", false);
		$(this).parent().parent().find("input[name=DENIALREASONS_TYPE_treat]").prop("disabled", false);
		$(this).parent().parent().find("input[name=SERVICE_TYPE_treat]").prop("disabled", false);
		
		var serviceTypeValue = $(currentRow).find("input[name=SERVICE_TYPE_treat_hidden]").val();
		var denialReasonTypeValue = $(currentRow).find("input[name=DENIALREASONS_TYPE_treat_hidden]").val();
		
		var string="<select class='form-control input-sm current-serviceType' id='serviceType' name='serviceType'>";
		string += "<option value=''></option>";
		<?php foreach($Service as $row){?>
		string += "<option value='<?php echo $row['ServiceType']; ?>'><?php echo $row['ServiceType']; ?></option>";
		<?php }?>
		string += "</select>";
		$(currentRow).find( '.SERVICE_TYPE_treat_div' ).html( string );
		$(currentRow).find(".current-serviceType").val(serviceTypeValue);
		
		var string2="<select class='form-control input-sm current-denialReasonType' name='denialReasonType'>";
		string2 += "<option value=''></option>";
		<?php foreach($DenialReasons as $row){?>
		string2 += "<option value='<?php echo $row['DenialReasons_Type']; ?>'><?php echo $row['DenialReasons_Type']; ?></option>";
		<?php }?>
		string2 += "</select>";
		$(currentRow).find( '.DENIALREASONS_TYPE_treat_div' ).html( string2);
		$(currentRow).find(".current-denialReasonType").val(denialReasonTypeValue);
		
		
    } );
/**** CANCEL TREATEMENT **********/
	$('tbody').on( 'click', '.cancel', function () {
		var parentR = $(this).parent().parent();
		
		var div = $(parentR).find(".update-Treatment").css("display", "none");
		var div = $(parentR).find(".editTreatment").css("display", "block");
		$(parentR).css("text-align", "center");
		$("#Treatement_Info_table").dataTable().fnDestroy();
		$('#Treatement_Info_table').dataTable( {
			"ajax": "<?php echo base_url();?>search/getTreatement/<?php echo $Case_Id;?>",
			"iDisplayLength": 10,
			"aLengthMenu": [5, 10, 20, 25, 50, "All"],
			"bSort": false,
			"searching": false,
			"lengthChange": false,
			"bInfo": false,
			"bPaginate": false
		});
		
    } );
/**** UPDATE TREATEMENT **********/
	$('tbody').on( 'click', '.update', function () {
		var parentR = $(this).parent().parent().parent();
		
		var DateOfService_Start = $(parentR).find("input[name=dateOfServiceStart]").val();
		var DateOfService_End = $(parentR).find("input[name=dateOfServiceEnd]").val();
		var Claim_Amount = $(parentR).find("input[name=Claim_Amount_treat]").val();
		var Paid_Amount = $(parentR).find("input[name=Paid_Amount_treat]").val();
		var Date_BillSent = $(parentR).find("input[name=Date_BillSent_treat]").val();
		var Treatment_Id = $(parentR).find("input[name=Treatment_Id]").val();
		var currentServiceType = $(parentR).find(".current-serviceType").val();
		var currentDenialReasonType = $(parentR).find(".current-denialReasonType").val();
		
		var string = "&DateOfService_Start="+DateOfService_Start+"&DateOfService_End="+DateOfService_End+"&Claim_Amount="+Claim_Amount+"&Paid_Amount="+Paid_Amount+"&Date_BillSent="+Date_BillSent+"&Treatment_Id="+Treatment_Id+"&currentServiceType="+currentServiceType+ "&currentDenialReasonType="+currentDenialReasonType + "&Case_Id=<?php echo $Case_Id;?>";
		
		request = $.ajax({
			url:"<?php echo base_url(); ?>search/update_Treatement",
			type: "post",
			data: string
		});

		request.done(function (response, textStatus, jqXHR) {
			console.log("Successssss ");
			$("#Treatement_Info_table").dataTable().fnDestroy();
			$('#Treatement_Info_table').dataTable( {
				"ajax": "<?php echo base_url();?>search/getTreatement/<?php echo $Case_Id;?>",
				"iDisplayLength": 10,
				"aLengthMenu": [5, 10, 20, 25, 50, "All"],
				"bSort": false,
				"searching": false,
				"lengthChange": false,
				"bInfo": false,
				"bPaginate": false
			});
			callSuccess();
		});
		
		
		var div = $(parentR).find(".update-Treatment").css("display", "none");
		var div = $(parentR).find(".editTreatment").css("display", "block");
	});
	
	
/**** ADD NOTES **********/
	$("#addNotes_form").submit(function(e){
		// setup some local variables
		var notesDescription = $(this).find("textarea").val();
		var notesType = $(this).find('input[name=notesType]:checked').val();
		var notesAccidentDate = $(this).find("input[name=notesAccidentDate]").val();
		//console.log("notesAccidentDate: "+notesAccidentDate);
		var caseId = "<?php echo $Case_Id;?>";
		var Case_AutoId = "<?php echo $Case_AutoId;?>";
			// fire off the request to /form.php

			request = $.ajax({
				url:"<?php echo base_url(); ?>search/addNotes",
				type: "post",
				data: {notesDescription:notesDescription, caseId:caseId,notesAccidentDate:notesAccidentDate,notesType:notesType,Case_AutoId:Case_AutoId }
			});

			// callback handler that will be called on success
			request.done(function (response, textStatus, jqXHR) {
				$('input[type=text]').val('');
				$('textarea').val('');
				$("select").val('');
				$("#NotesTab1").dataTable().fnDestroy();
				$('#NotesTab1').dataTable( {
					"ajax": "<?php echo base_url();?>search/getNotes/<?php echo $Case_Id;?>",
					"iDisplayLength": 5,
					"aLengthMenu": [5, 10, 20, 25, 50, "All"],
					"bSort": false
				});
				$("#NotesTab3").dataTable().fnDestroy();
				$('#NotesTab3').dataTable( {
					"ajax": "<?php echo base_url();?>search/getNotes2/<?php echo $Case_Id;?>",
					"iDisplayLength": 10,
					"aLengthMenu": [5, 10, 20, 25, 50, "All"],
					"bSort": false
				});
				//$("#myModal").modal("show");
				callSuccess();
			});
			e.preventDefault();	//STOP default action
	});
	
	
	$(".fa-edit").click(function(){
		$(this).parent().find(".fa-save").css("display", "block");
		$(this).parent().find(".fa-times").css("display", "block");
		$(this).css("display", "none");
		var parentTd = $(this).parent();
		var divs = $(parentTd).next().next();
		$(divs).find(".visible").css("display", "none");
		$(divs).find(".editHidden").css("display", "block");
	});
	$(".fa-times").click(function(){
		$(this).parent().find(".fa-save").css("display", "none");
		$(this).parent().find(".fa-times").css("display", "none");
		$(this).css("display", "none");
		var parentTd = $(this).parent();
		var divs = $(parentTd).next().next();
		$(divs).find(".visible").css("display", "block");
		$(divs).find(".editHidden").css("display", "none");
		$(this).parent().find(".fa-edit").css("display", "block");
	});
	
/*********** fa-save ***********/
	var info1 = document.getElementsByClassName("VisibleInfo");
	$(".fa-save").click(function(){
		$(this).parent().find(".fa-edit").css("display", "block");
		$(this).parent().find(".fa-times").css("display", "none");
		$(this).css("display", "none");
		var editHidden = $(this).parent().next().next().find(".editHidden");
		var visible = $(this).parent().next().next().find(".visible");
		var x = document.getElementsByClassName("visible");
		var recordNo = $(this).parent().find("input[name=recordNo]").val();
		var selectRecordNo = $(this).parent().find("input[name=selectRecordNo]").val();
		//console.log("selectRecordNo:"+selectRecordNo);
		var string = "recordNo="+recordNo+"&Case_AutoId=<?php echo $Case_AutoId;?>"+"&Case_Id=<?php echo $Case_Id;?>";
		
		if(recordNo ==3){
			var InjuredParty_LastName = $(editHidden).find("input[name=InjuredParty_LastName]").val();
			var InjuredParty_FirstName = $(editHidden).find("input[name=InjuredParty_FirstName]").val();
   			//x[2].innerHTML = InjuredParty_LastName+", "+InjuredParty_FirstName;
			info1[1].innerHTML = InjuredParty_LastName+", "+InjuredParty_FirstName;
			string += "&InjuredParty_LastName="+InjuredParty_LastName+"&InjuredParty_FirstName="+InjuredParty_FirstName;
		}else if(recordNo ==5){
			var InsuredParty_LastName = $(editHidden).find("input[name=InsuredParty_LastName]").val();
			var InsuredParty_FirstName = $(editHidden).find("input[name=InsuredParty_FirstName]").val();
			//x[4].innerHTML = InsuredParty_LastName+", "+InsuredParty_FirstName;
			info1[2].innerHTML = InsuredParty_LastName+", "+InsuredParty_FirstName;
			string += "&InsuredParty_LastName="+InsuredParty_LastName+"&InsuredParty_FirstName="+InsuredParty_FirstName;
		}else{
			if(selectRecordNo ==0){
				var inputName = $(editHidden).find("input").attr("name");
				var inputValue = $(editHidden).find("input[name="+inputName+"]").val();
				//console.log("recordNo: "+recordNo+" inputName= "+inputName+" inputValue: "+inputValue);
				//string += "&"+inputName+"="+inputValue;
				string += "&inputName="+inputName+"&inputValue="+inputValue;
				if(recordNo >=22){
					x[recordNo-2].innerHTML = inputValue;
				}else if(recordNo == 14){
					var balance = parseFloat($(".visible:eq(12)").text()) - inputValue;
					x[13].innerHTML = "PAID / $"+inputValue.toFixed(2) +" / BALANCE $"+balance.toFixed(2);
				}else if(recordNo == 13){
					var balance = parseFloat($(".visible:eq(12)").text()) - inputValue;
					x[recordNo-1].innerHTML = "$"+inputValue;
				}else{
					x[recordNo-1].innerHTML = inputValue;
				}
				
			}else{
				var selectId = $(editHidden).find("select").attr("id");
				selectValue = $("#"+selectId+" option:selected").val();
				selectText = $("#"+selectId+" option:selected").text();
				//console.log("recordNo:"+recordNo+" selectId:"+selectId+" selectValue:"+selectValue+" selectText:"+selectText);
				if(recordNo == 2 || recordNo ==4){
					//string += "&"+selectId+"="+selectText;
					string += "&inputName="+selectId+"&inputValue="+selectText;
				}else{
					//string += "&"+selectId+"="+selectValue;
					if(recordNo == 1 || recordNo ==9 || recordNo == 10 || recordNo ==18){
						$("#Hidden_"+selectId).val(inputValue);
					}
					string += "&inputName="+selectId+"&inputValue="+selectValue;
				}
				if(recordNo == 1 || recordNo ==9 || recordNo == 10 || recordNo ==18){
					var hh ="Hidden_" + selectId;
					//console.log("HH: "+hh);
					$("#Hidden_"+selectId).val(selectValue);
					if(recordNo == 1){
						info1[0].innerHTML = $("#"+selectId+" option:selected").text();
					}else if(recordNo == 9){
						info1[3].innerHTML = $("#"+selectId+" option:selected").text();
					}else if(recordNo == 10){
						info1[4].innerHTML = $("#"+selectId+" option:selected").text();
					}else if(recordNo == 18){
						$.ajax({
							type:'POST',
							url:"<?php echo base_url(); ?>search/getAdjuster_ById2/"+selectValue,
							success:function(data){
								results = JSON.parse(data);
								var adjPhone = results.data[0][2];
								var adjExt = results.data[0][3];
								if(adjPhone == null){
									adjPhone ="";
								}
								if(adjExt == null){
									adjExt ="";
								}
									info1[5].innerHTML = results.data[0][0]+ " "+results.data[0][1]+" / "+adjPhone+" ext."+adjExt;
								//info1[5].innerHTML = $("#"+selectId+" option:selected").text();
							},
							error: function(result){ console.log("error"); }
						});
					}
				}else{
					if(recordNo >=22){
						x[recordNo-2].innerHTML = $("#"+selectId+" option:selected").text();
					}else{
						x[recordNo-1].innerHTML = $("#"+selectId+" option:selected").text();
					}
				}
				
			}
		}
		
		
		console.log("Final string= "+string);
		request = $.ajax({
			url:"<?php echo base_url(); ?>search/updateCaseInfo",
			type: "post",
			data: string
		});
		request.done(function (response, textStatus, jqXHR) {
			//console.log("Successssss :"+response);
			$("#NotesTab1").dataTable().fnDestroy();
			$('#NotesTab1').dataTable( {
				"ajax": "<?php echo base_url();?>search/getNotes/<?php echo $Case_Id;?>",
				"iDisplayLength": 5,
				"aLengthMenu": [5, 10, 20, 25, 50, "All"],
				"bSort": false
			});
			$("#NotesTab3").dataTable().fnDestroy();
			$('#NotesTab3').dataTable( {
				"ajax": "<?php echo base_url();?>search/getNotes2/<?php echo $Case_Id;?>",
				"iDisplayLength": 10,
				"aLengthMenu": [5, 10, 20, 25, 50, "All"],
				"bSort": false
			});
			callSuccess();
		});
		$(editHidden).css("display", "none");
		$(visible).css("display", "block");
	});	
	
/**************************** NOTES TAB-3 ************************************************************************************/
	//$(".notesAccidentDate").datepicker().datepicker("setDate", new Date());
	$('#NotesTab3').dataTable( {
		"ajax": "<?php echo base_url();?>search/getNotes2/<?php echo $Case_Id;?>",
		"iDisplayLength": 10,
    	"aLengthMenu": [5, 10, 20, 25, 50, "All"],
		"bSort": false
	});
	var dateNow = new Date();
        $('.notesAccidentDate').datetimepicker({
            defaultDate:dateNow,
			format:'YYYY/MM/DD HH:mm:ss'
        });
	$('#NotesTab1').dataTable( {
		"ajax": "<?php echo base_url();?>search/getNotes/<?php echo $Case_Id;?>",
		"iDisplayLength": 5,
    	"aLengthMenu": [5, 10, 20, 25, 50, "All"],
		"bSort": false,
	});

/**** ADD NOTES INFO *********/
	$("#addNotes_form2").submit(function(e){
		console.log("addNotes_form2: ");
		var notesDescription = $(this).find("textarea").val();
		var notesType = $(this).find('input[name=notesType]:checked').val();
		var notesAccidentDate = $(this).find(".notesAccidentDate").val();
		console.log("notesAccidentDate: "+notesAccidentDate);
		var caseId = "<?php echo $Case_Id;?>";
		var Case_AutoId = "<?php echo $Case_AutoId;?>";
			// fire off the request to /form.php

			request = $.ajax({
				url:"<?php echo base_url(); ?>search/addNotes",
				type: "post",
				data: {notesDescription:notesDescription, caseId:caseId,notesAccidentDate:notesAccidentDate,notesType:notesType,Case_AutoId:Case_AutoId }
			});

			// callback handler that will be called on success
			request.done(function (response, textStatus, jqXHR) {
				$('input[type=text]').val('');
				$('textarea').val('');
				$("select").val('');
				//$("#myModal").modal("show");
				$("#NotesTab1").dataTable().fnDestroy();
				$('#NotesTab1').dataTable( {
					"ajax": "<?php echo base_url();?>search/getNotes/<?php echo $Case_Id;?>",
					"iDisplayLength": 5,
					"aLengthMenu": [5, 10, 20, 25, 50, "All"],
					"bSort": false,
				});
				$("#NotesTab3").dataTable().fnDestroy();
				$('#NotesTab3').dataTable( {
					"ajax": "<?php echo base_url();?>search/getNotes2/<?php echo $Case_Id;?>",
					"iDisplayLength": 10,
					"aLengthMenu": [5, 10, 20, 25, 50, "All"],
					"bSort": false
				});
				callSuccess();
			});
			e.preventDefault();	//STOP default action
	});
	
/**** EDIT NOTES INFO *********/
	$('tbody').on( 'click', '.editNotes', function () {
		console.log("ccc");
		var tNoteId = $(this).parent().parent().find(".tNoteId").val();
		var tNoteDesc = $(this).parent().parent().find(".tNoteDesc").val();
		var tNoteEditedBy = $(this).parent().parent().find(".tNoteUserId").val();
		var tNoteDate = $(this).parent().parent().find(".tNoteDate").val();
		var tNoteType = $(this).parent().parent().find(".tNoteType").val();
		console.log("tNoteId:"+tNoteId);
		console.log("tNoteDesc:"+tNoteDesc);
		console.log("tNoteEditedBy:"+tNoteEditedBy);
		console.log("tNoteDate:"+tNoteDate);
		console.log("tNoteType:"+tNoteType);
		$(".mNoteId").val(tNoteId);
		$(".mNoteDesc").val(tNoteDesc);
		$(".mNoteEditedBy").val(tNoteEditedBy);
		$(".mNoteDate").val(tNoteDate);
		//$(".mNoteType").val(tNoteType);
		
		$("#myModal").modal("show");
	});
/**** DELETE NOTES **********/
	$('body').on( 'click', '#deleteNotesButton', function () {
		var DeletedNotesId = [];
		$('.DeleteNotes:checked').each(function(i){
			var values = $(this).val();
			DeletedNotesId.push(values);
		});
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
					url:"<?php echo base_url();?>search/deleteNotesFromTab3",
					type: "post",
					data: {DeletedNotesId:DeletedNotesId}
				});
		
				request.done(function (response, textStatus, jqXHR) {
					$('.DeleteNotes:checked').each(function(i){
						var values = $(this).val();
						var row = $(".DeleteNotes"+values).parent().parent();
						$(row).remove();
					});
					$("#NotesTab1").dataTable().fnDestroy();
					$('#NotesTab1').dataTable( {
						"ajax": "<?php echo base_url();?>search/getNotes/<?php echo $Case_Id;?>",
						"iDisplayLength": 5,
						"aLengthMenu": [5, 10, 20, 25, 50, "All"],
						"bSort": false
					});
					$("#NotesTab3").dataTable().fnDestroy();
					$('#NotesTab3').dataTable( {
						"ajax": "<?php echo base_url();?>search/getNotes2/<?php echo $Case_Id;?>",
						"iDisplayLength": 10,
						"aLengthMenu": [5, 10, 20, 25, 50, "All"],
						"bSort": false
					});
					console.log("suuuuu:"+response);
				});
				swal("Deleted!", "Your records has been deleted.", "success");
			} else {
				swal("Cancelled", "Your records are safe :)", "error");
			}
		
		});
	});
/****UPDATE NOTES INFO *********/	
	$("#UpdateNotesInfo_form").submit(function(e){
		var form = $(this);
		var params = form.serialize();
		console.log("params:"+params);
		e.preventDefault();	//STOP default action
		
		$.ajax({
			type:'POST',
			url:"<?php echo base_url(); ?>search/UpdateNotesInfo",
			data: params,
			success:function(data){
				//results = JSON.parse(data);	
				//callSuccess();
				$("#NotesTab1").dataTable().fnDestroy();
				$('#NotesTab1').dataTable( {
					"ajax": "<?php echo base_url();?>search/getNotes/<?php echo $Case_Id;?>",
					"iDisplayLength": 5,
					"aLengthMenu": [5, 10, 20, 25, 50, "All"],
					"bSort": false
				});
				$("#NotesTab3").dataTable().fnDestroy();
				$('#NotesTab3').dataTable( {
					"ajax": "<?php echo base_url();?>search/getNotes2/<?php echo $Case_Id;?>",
					"iDisplayLength": 10,
					"aLengthMenu": [5, 10, 20, 25, 50, "All"],
					"bSort": false
				});
			},
			error: function(result){ console.log("error"); }
		});
		
	});
/************************************************************************************************************************************/
/************************************************* SETTLEMENT TAB-6 *************************************************************/
	var FF_Sum = 0;
	$('#tab6').click(function(e){
		checkstatus_open();
		load_sett_data();
		var rowCount = $('#TransactionTable >tbody >tr').length;
		FF_Sum = 0;
		for(var counter=1; counter <= $('#TransactionTable >tbody >tr').length; counter++){
			var value = parseFloat(($("#TransactionTable tr:nth-child("+counter+")").find("input[name=Transactions_Amount]").val()).replace("$", ""));
			FF_Sum = FF_Sum + value;
		}
	});
	$('#SettledType').on('change', function() {
		var Sett_Final_Note =$('#SettledType option:selected').text()+" => "+$('input[name=Settlement_Amount]').val()+" / "+$('input[name=Settlement_Int]').val()+" / "+$('input[name=Settlement_Af]').val()+" / "+$('input[name=Settlement_Ff]').val()+ " , Sett % "+$('input[name=settlementPercentageTab6]').val();
		
		$("#Settlement_Notes").val(Sett_Final_Note);
	});
	$('#defendantIdTab-6').on('change', function() {
		$("input[name=SettledWithAttorney]").val($("#defendantIdTab-6 option:selected").text());
	});
	$('#adjusterIdTab-6').on('change', function() {
		$("input[name=SettledWithAdjuster]").val($("#adjusterIdTab-6 option:selected").text());
	});
	function checkstatus_open(){
		//console.log("current_case_status BEFORE ajax call :"+current_case_status+"Z");
		$("input[name=Settlement_Amount]").prop("disabled", false);
		$("input[name=settlementPercentageTab6]").prop("disabled", false);
		$("input[name=Settlement_Int]").prop("disabled", false);
		$("input[name=Settlement_Af]").prop("disabled", false);
		$("input[name=Settlement_Ff]").prop("disabled", false);
		$("input[name=Settlement_Total]").prop("disabled", false);
		$("input[name=FltInterestPercTab6]").prop("disabled", false);
		$("input[name=FltAttorneyPercTab6]").prop("disabled", false);
		$("input[name=FltFillingFeePercTab6]").prop("disabled", false);
		$("input[name=TotalAmountPerc]").prop("disabled", false);
					
		$.ajax({
			type:'POST',
			url: "<?php echo base_url();?>search/get_Current_Status/<?php echo $Case_AutoId;?>", 
			success: function(data){
				results = JSON.parse(data);
			//	Update_Settlement();
				current_case_status = results[0].Status;
				//console.log("current_case_status AFTER ajax call :"+current_case_status+"Z");
				if(current_case_status == "OPEN "){ current_case_status = "OPEN"; }
				if(current_case_status == "OPEN"){
					$(".settled-status-open").css("display", "block");
					$(".settled-by-show").css("display","none");
					//console.log("current_case_status if open:"+current_case_status);
				}else{
					$(".settled-status-open").css("display", "none");
					$("input[name=Settlement_Amount]").prop("disabled", true);
					$("input[name=settlementPercentageTab6]").prop("disabled", true);
					$("input[name=Settlement_Int]").prop("disabled", true);
					$("input[name=Settlement_Af]").prop("disabled", true);
					$("input[name=Settlement_Ff]").prop("disabled", true);
					$("input[name=Settlement_Total]").prop("disabled", true);
					$("input[name=FltInterestPercTab6]").prop("disabled", true);
					$("input[name=FltAttorneyPercTab6]").prop("disabled", true);
					$("input[name=FltFillingFeePercTab6]").prop("disabled", true);
					$("input[name=TotalAmountPerc]").prop("disabled", true);
					//console.log("current_case_status if others:"+current_case_status);
				}
				current_case_status ="";
        	},
			error: function(result){ console.log("error"); }
		});
	}
	function load_sett_data(){
		$.ajax({
			type:'POST',
			url:"<?php echo base_url(); ?>search/get_Settled_By/<?php echo $Case_Id;?>",
			success:function(data){
				results = JSON.parse(data);
				/*$.each(results[0], function(k, v) {
					//console.log(k + ' is ' + v);
				});*/
				 var settledBy = document.getElementsByClassName("settled-by-info");
				for($i in results){
					/*console.log("Settlement_Amount:"+results[$i].Settlement_Amount);
					console.log("Settlement_Int:"+parseFloat(results[$i].Settlement_Int));
					console.log("Settlement_Af:"+parseFloat(results[$i].Settlement_Af));
					console.log("Settlement_Ff:"+parseFloat(results[$i].Settlement_Ff));
					console.log("Settlement_Total:"+parseFloat(results[$i].Settlement_Total));*/
					
					settledBy[0].innerHTML = results[$i].User_Id;
					
					var dateAr = results[$i].Settlement_Date.substr(0, 10).split('-');
					var newDate = dateAr[1] + '-' + dateAr[2] + '-' + dateAr[0];
					settledBy[1].innerHTML = newDate;
					var str = results[$i].SettledWith;
					var str = results[$i].SettledWith.replace("=> [ADJ.PH#:", "/");
					var str = str.replace("/ INS CPY:", "/");
					var str = str.replace("]", "");
					var str = str.substring(0, str.indexOf("/ ADJ FAX#: "));
					
					settledBy[2].innerHTML = str;
					 
					if(results[$i].Settlement_Amount == null){ $("input[name=Settlement_Amount]").val("0.00"); }else{ $("input[name=Settlement_Amount]").val(parseFloat(results[$i].Settlement_Amount).toFixed(2)); }
					
					 //$("#FltInterestTab6").val(results[$i].Settlement_Int);
					 $("input[name=Settlement_Int]").val(parseFloat(results[$i].Settlement_Int).toFixed(2));
					// $("input[name=Settlement_Af]").val(parseFloat(results[$i].Settlement_Af).toFixed(2));
					 //console.log("aaatttt FF:"+parseFloat(results[$i].Settlement_Af).toFixed(2));
					 $("input[name=Settlement_Ff]").val(parseFloat(FF_Sum).toFixed(2));
					 Settlement_Calculation();
					 interestCount = 0;
				}
			}
		});
	}
/*Calculate Settlement Interest*/
	var interestCount = 0;
	var interest = "";
	$("#FltInterestPercTab6").keyup(function(){
		if(interestCount == 0){
			interest = $("input[name=Settlement_Int]").val();
		}
		interestCount++;
		var interestPerc = $(this).val();
		if ($(this).val() > 100){
			$(this).val("100.00");
			$("input[name=Settlement_Int]").val(parseFloat(interest).toFixed(2))
			//console.log("calInt:"+calInt);
		}else{
			calInt = (parseFloat(interestPerc) / 100) * interest;
			$("input[name=Settlement_Int]").val(calInt)  //.toFixed(2)
			$("input[name=Settlement_Af]").val(((parseFloat($("input[name=Settlement_Amount]").val()) + calInt)/5).toFixed(2));
			Attorney_Cal(parseFloat($("input[name=Settlement_Amount]").val()), calInt);
			//console.log("calInt:"+calInt);
		}
	});
/*Calculate Attorney FF */
	function Attorney_Cal(SettlementAmt, SettlementPerc){
		var Final_Attorney = ((SettlementAmt + SettlementPerc)/5).toFixed(2);
		if(Final_Attorney > 1350){
			$("input[name=Settlement_Af]").val(1350.00);
		}else{
			$("input[name=Settlement_Af]").val(((SettlementAmt + SettlementPerc)/5).toFixed(2));
		}
		
	}
/*Calculate settlement Amount according to percentage*/
	var SettCount = 0;
	var Set_Amt = "";
	$("#settlementPercentageTab6").keyup(function(){
		if(SettCount == 0){
			Set_Amt = $("input[name=BalanceTab6]").val();
		}
		SettCount++;
		if ($(this).val() > 100){
			$(this).val("100.00");
			$("input[name=Settlement_Amount]").val(parseFloat(Set_Amt).toFixed(2))
		}else{
			calSettAmt = (parseFloat(Set_Amt) / 100) * $(this).val();
			$("input[name=Settlement_Amount]").val(parseFloat(calSettAmt).toFixed(2));
		}
		Attorney_Cal(parseFloat($("input[name=Settlement_Amount]").val()), parseFloat($("input[name=Settlement_Int]").val()));
	});
/*Calculate settlement Percentage according to sett amt*/
	var SettCount2 = 0;
	var Set_Amt2 = "";
	$("input[name=Settlement_Amount]").keyup(function(){
		if(SettCount2 == 0){
			Set_Amt2 = $("input[name=Settlement_Amount]").val();
		}
		SettCount2++;
		var dataPerc = ( $("input[name=Settlement_Amount]").val() * 100 ) / $("input[name=BalanceTab6]").val();
		$("input[name=settlementPercentageTab6]").val(parseFloat(dataPerc).toFixed(2));
		Attorney_Cal(parseFloat($("input[name=Settlement_Amount]").val()), parseFloat($("input[name=Settlement_Int]").val()));
	});
/*Calculate Days difference and simple interest*/
	$("#CalculateSI").click( function(){
		var Day_Diff = daydiff(parseDate($('#CopundIntStartData').val()), parseDate($('#CopundIntEndData').val()));
		if(Day_Diff >=0){
			var settAmt = $("input[name=Settlement_Amount]").val();
			//var settAmt = 1515.36;
			var Total_Interest = (settAmt * 0.02 * Day_Diff) / 30;
			$("#FltInterestTab6").val(parseFloat(Total_Interest).toFixed(2));
			Attorney_Cal(parseFloat($("input[name=Settlement_Amount]").val()), parseFloat($("input[name=Settlement_Int]").val()));
			//$("input[name=Settlement_Af]").val(((parseFloat($("input[name=Settlement_Amount]").val()) + parseFloat($("input[name=Settlement_Int]").val()))/5).toFixed(2));
			//console.log("Total_Interest:"+Total_Interest);
		}else{ alert("Please Select correct End Date");}
	});
    function parseDate(str) {
		var mdy = str.split('/')
		return new Date(mdy[2], mdy[0]-1, mdy[1]);
	}
	function daydiff(first, second) {
		return (second-first)/(1000*60*60*24)
	}
	$("#RecalculateAmt").click(function(){
		Settlement_Calculation();
		interestCount = 0;
	});
	function Settlement_Calculation(){
		var SetAmt = $("input[name=Settlement_Amount]").val();
		var SetInt = $("input[name=Settlement_Int]").val();
		Attorney_Cal(parseFloat($("input[name=Settlement_Amount]").val()), parseFloat($("input[name=Settlement_Int]").val()));
		
		//$("input[name=Settlement_Af]").val(((parseFloat($("input[name=Settlement_Amount]").val()) + parseFloat($("input[name=Settlement_Int]").val()))/5).toFixed(2));
		var SetAF = $("input[name=Settlement_Af]").val();
		var SetFF = $("input[name=Settlement_Ff]").val();
		if(SetAF == null){ SetAF = "0.00"; }
		if(SetFF == null){ SetFF = "0.00"; }
		var TotalAmount =  parseFloat(SetAmt) + parseFloat(SetInt) + parseFloat(SetAF) + parseFloat(SetFF);
		$("input[name=Settlement_Total]").val("$"+TotalAmount.toFixed(2));
	}
	$("#ResetValues").click(function(){
		$("input[name=Settlement_Int]").val("0.00");
		$("input[name=Settlement_Af]").val("0.00");
		$("input[name=Settlement_Ff]").val("0.00");
		$("input[name=Settlement_Total]").val("0.00");
		interestCount = 0;
	});
/*UPDATE SETTLEMENT DATA*/
	$("#settlement_form_open").validate({
		rules:{
			Settlement_Notes:{
				required: true
			}
		},
		submitHandler: function (form) {
			var $form = $(form);
			//var FixedSettAmt = $("input[name=Settlement_Amount]").val();
			var $inputs = $form.find("input, select, button, textarea");
			var serializedData = $form.serialize();
			var flag = 0;
			if($("input[name=SettledWithAdjuster]").val() == ""){
				flag = 0;
				if($("input[name=SettledWithAttorney]").val() == ""){ flag = 0; }else{ flag = 1; }
			}else{ flag = 1; }

			if(flag == 1){
				/*var dataArray = $form.serializeArray();
				len = dataArray.length;
				dataObj = [];
				
				for (i=0; i<len; i++) {
				  dataObj[dataArray[i].name] = dataArray[i].value;
				}*/
				
				request = $.ajax({
					url:"<?php echo base_url(); ?>search/update_Settlement",
					type: "post",
					"data": serializedData
				});
				request.done(function (response, textStatus, jqXHR) {
					Update_Settlement();
					checkstatus_open();
					$(".settled-by-show").css("display","block");
					$("#NotesTab3").dataTable().fnDestroy();
					$('#NotesTab3').dataTable( {
						"ajax": "<?php echo base_url();?>search/getNotes2/<?php echo $Case_Id;?>",
						"iDisplayLength": 10,
						"aLengthMenu": [5, 10, 20, 25, 50, "All"]
					});
					$("#NotesTab1").dataTable().fnDestroy();
					$('#NotesTab1').dataTable( {
						"ajax": "<?php echo base_url();?>search/getNotes/<?php echo $Case_Id;?>",
						"iDisplayLength": 5,
						"aLengthMenu": [5, 10, 20, 25, 50, "All"],
						"bSort": false
					});
					load_sett_data();
					callSuccess();
					$("#finalizeButton").prop('disabled', true);
				});
			}else{
				$("#AdjOrAtt").modal("show");
			}
		}
	});
/*RESET SETTLEMENT*/
	$(".reset-settlement").click(function(e){
		swal({
			title: "Are you sure?",
			text: "Your Settlement Data will Reset",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, Reset it!",
			cancelButtonText: "No, cancel plx!",
			closeOnConfirm: false,
			closeOnCancel: false },
		function (isConfirm) {
			if (isConfirm) {
				swal("Reset!", "Settlement successfully Reset", "success");
				$.ajax({
					type:'POST',
					url: "<?php echo base_url();?>search/reset_Settlement/<?php echo $Case_AutoId;?>/<?php echo $Case_Id;?>", 
					success: function(data){
						$("#NotesTab3").dataTable().fnDestroy();
						$('#NotesTab3').dataTable( {
							"ajax": "<?php echo base_url();?>search/getNotes2/<?php echo $Case_Id;?>",
							"iDisplayLength": 10,
							"aLengthMenu": [5, 10, 20, 25, 50, "All"]
						});
						$("#NotesTab1").dataTable().fnDestroy();
						$('#NotesTab1').dataTable( {
							"ajax": "<?php echo base_url();?>search/getNotes/<?php echo $Case_Id;?>",
							"iDisplayLength": 5,
							"aLengthMenu": [5, 10, 20, 25, 50, "All"],
							"bSort": false
						});
						Update_Settlement();
						checkstatus_open();
						$("#finalizeButton").prop('disabled', false);
						load_sett_data();
					},
					error: function(result){ console.log("error"); }
				
				});
				e.preventDefault();	//STOP default action
			} else {
				swal("Cancelled", "Your Settlement Data is safe :)", "error");
			}
		});
	});
	
	
/*************************************************** Payment TAB-8 ***************************************************************/	
	
	$('#SettlementQuickView').dataTable( {
		"ajax": "<?php echo base_url();?>search/SettlementQuickView/<?php echo $Case_Id;?>",
		"iDisplayLength": 10,
		"aLengthMenu": [5, 10, 20, 25, 50, "All"],
		"bSort": false,
		"searching": false,
		"lengthChange": false
	});
	$('#TransactionTable').dataTable( {
		"ajax": "<?php echo base_url();?>search/getTransactions/<?php echo $Case_Id;?>",
		"iDisplayLength": 10,
		"aLengthMenu": [5, 10, 20, 25, 50, "All"],
		"bSort": false,
		"searching": false,
	});
/******** DELETE TRANSACTIONS ********/
	$('body').on( 'click', '#deleteTransactionsButton', function () {
		var checkedNo = [];
		var Transaction_Amt = [];
		var Transaction_Type = [];
		var Transactions_Description =[];
		
		$('.deleteCheckedTransactions:checked').each(function(i){
			var values = $(this).val();
			Transaction_Amt.push($(this).parent().parent().find("input[name=Transactions_Amount]").val());
			Transaction_Type.push($(this).parent().parent().find("input[name=Transactions_Type]").val());
			Transactions_Description.push($(this).parent().parent().find("input[name=Transactions_Description]").val());
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
						url:"<?php echo base_url();?>search/deleteTransactions",
						type: "post",
						data: {
								deleteCheckedTransactions:checkedNo, 
								CheckedTransactionsAmt:Transaction_Amt, 
								CheckedTransactionsType:Transaction_Type,
								CheckedTransactionsDesc: Transactions_Description,
								Case_Id: "<?php echo $Case_Id;?>"
							}
					});
			
					request.done(function (response, textStatus, jqXHR) {
						
						$('.deleteCheckedTransactions:checked').each(function(i){
							var values = $(this).val();
							var row = $(".deleteCheckedTransactions"+values).parent().parent();
							$(row).remove();
						});
						$("#NotesTab3").dataTable().fnDestroy();
						$('#NotesTab3').dataTable( {
							"ajax": "<?php echo base_url();?>search/getNotes2/<?php echo $Case_Id;?>",
							"iDisplayLength": 10,
							"aLengthMenu": [5, 10, 20, 25, 50, "All"]
						});
						$("#NotesTab1").dataTable().fnDestroy();
						$('#NotesTab1').dataTable( {
							"ajax": "<?php echo base_url();?>search/getNotes/<?php echo $Case_Id;?>",
							"iDisplayLength": 5,
							"aLengthMenu": [5, 10, 20, 25, 50, "All"],
							"bSort": false
						});
						load_sett_data();
					});
					swal("Deleted!", "Your records has been deleted.", "success");
				} else {
					swal("Cancelled", "Your records are safe :)", "error");
				}
			});
		}
	});
/*ADD TRANSACTIONS*/
	$("#add_Transactions_Form").validate({
		/*rules: {
				Transactions_Type:{
					required: true
				},
				Transactions_status:{
					required: true
				}	
			},*/
	
		submitHandler: function (form) {
			// setup some local variables
			var $form = $(form);
			// let's select and cache all the fields
			var $inputs = $form.find("input, select, button, textarea");
			// serialize the data in the form
			var serializedData = $form.serialize();

			request = $.ajax({
				url:"<?php echo base_url(); ?>search/addTransactions",
				type: "post",
				data: serializedData
			});

			request.done(function (response, textStatus, jqXHR) {
				results = JSON.parse(response);
				
				$('input[type=text]').val('');
				$('textarea').val('');
				$("select").val('');
				//$("#myModal").modal("show");
				$("#TransactionTable").dataTable().fnDestroy();
				$('#TransactionTable').dataTable( {
					"ajax": "<?php echo base_url();?>search/getTransactions/<?php echo $Case_Id;?>",
					"iDisplayLength": 10,
					"aLengthMenu": [5, 10, 20, 25, 50, "All"]
				});
				$("#NotesTab3").dataTable().fnDestroy();
				$('#NotesTab3').dataTable( {
					"ajax": "<?php echo base_url();?>search/getNotes2/<?php echo $Case_Id;?>",
					"iDisplayLength": 10,
					"aLengthMenu": [5, 10, 20, 25, 50, "All"]
				});
				$("#NotesTab1").dataTable().fnDestroy();
				$('#NotesTab1').dataTable( {
					"ajax": "<?php echo base_url();?>search/getNotes/<?php echo $Case_Id;?>",
					"iDisplayLength": 5,
					"aLengthMenu": [5, 10, 20, 25, 50, "All"],
					"bSort": false
				});
				load_sett_data();
				callSuccess();
			});
		}
	});
/*************************************************** EVENT TAB-9 ***************************************************************/
/****GET EVENTS NOTES INFO *********/	
	$('#eventTable').dataTable( {
		"ajax": {
			"url": "<?php echo base_url();?>search/getEvents",
			"data": {
				"Case_Id": '<?php echo $Case_Id;?>'
			},
			"type": "post"
		},
		"iDisplayLength": 10,
    	"aLengthMenu": [5, 10, 20, 25, 50, "All"]
	});
	$('#selectEventType').on('change', function() {
		var EventType =$("#selectEventType option:selected").text();
		var EventTypeId =$("#selectEventType option:selected").val();
		$("input[name=EventType]").val(EventType);
		$("input[name=EventTypeHidden]").val(EventTypeId);
	});
	$('#selectEventStatus').on('change', function() {
	  var EventStatus =$("#selectEventStatus option:selected").text();
		var EventStatusId =$("#selectEventStatus option:selected").val();
	  $("input[name=EventStatus]").val(EventStatus);
	  $("input[name=EventStatusHidden]").val(EventStatusId);
	});
	$('#9selectAssignUser').on('change', function() {
		$("input[name=AssignUser]").val($("#9selectAssignUser option:selected").text());
	  //$("input[name=AssignUserHidden]").val($("#selectAssignUser option:selected").text());
	});
	//$("input[name=AssignUser]").prop("disabled", true);
	//$("#FltSettlement_AmountTab6").prop("disabled", true);
	//$("#settlementPercentageTab6").prop("disabled", true);

/******** DELETE EVENTS ********/
	$('body').on( 'click', '#deleteEventsButton', function () {
		var checkedNo = [];
		
		$('.deleteCheckedEvents:checked').each(function(i){
			var values = $(this).val();
			checkedNo.push(values);
			console.log("deleteEventsButton values:"+values);
		});
		console.log("deleteEventsButton:"+checkedNo.length);
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
						url:"<?php echo base_url();?>search/deleteEvents",
						type: "post",
						data: {deleteCheckedEvents:checkedNo}
					});
			
					request.done(function (response, textStatus, jqXHR) {
						$('.deleteCheckedEvents:checked').each(function(i){
							var values = $(this).val();
							var row = $(".deleteCheckedEvents"+values).parent().parent();
							$(row).remove();
						});
					});
					swal("Deleted!", "Your records has been deleted.", "success");
				} else {
					swal("Cancelled", "Your records are safe :)", "error");
				}
			});
		}
	});
/******** EDIT EVENTS ********/
	$('body').on( 'click', '.editEventsButton', function () {
		var parentRow = $(this).parent().parent();
		var EventDate = $(parentRow).find("td:nth-child(5)").text();
		var EventId = $(this).parent().find("input[name=EventId]").val();
		
		var EventType = $(parentRow).find("td:nth-child(3)").text();
		var EventTypeId = $(parentRow).find("td:nth-child(3)").find("input[name=EventTypeIdHidden]").val();
		
		var EventStatus = $(parentRow).find("td:nth-child(4)").text();
		var EventStatusId = $(parentRow).find("td:nth-child(4)").find("input[name=EventStatusIdHidden]").val();
		
		//var EventTime = $(parentRow).find("td:nth-child(6)").text();
		var EventDescription = $(parentRow).find("td:nth-child(7)").text();
		var Assigned_To = $(parentRow).find("input[name=Assigned_To]").val();
		$("input[name=AssignUser]").val(Assigned_To);
		//$("input[name=AssignUserHidden]").val(Assigned_To);
		$("input[name=EventDate]").val(EventDate);
		$("input[name=EventType]").val(EventType);
		$("input[name=EventStatus]").val(EventStatus);
		//$("input[name=EventTime]").val(EventTime);
		$("#EventDescription").val(EventDescription);
		$("input[name=EventTypeHidden]").val(EventTypeId);
		$("input[name=EventStatusHidden]").val(EventStatusId);
		$("input[name=EventIdHidden]").val(EventId);
	});
/******** UPDATE EVENTS ********/
	$("#updateEventInfo_form").validate({
			rules: {
				EventDate:{
					required: true
				}	
			},		
			submitHandler: function (form) {
				var EventIdHidden = $("input[name=EventTypeHidden]").val();
				if(EventIdHidden != ""){
					var $form = $(form);
					var $inputs = $form.find("input, select, button, textarea");
					var serializedData = $form.serialize();
					
					request = $.ajax({
						url:"<?php echo base_url();?>search/update_Event_Info",
						type: "post",
						data: serializedData
					});
					request.done(function (response, textStatus, jqXHR) {
						$("#eventTable").dataTable().fnDestroy();
						$('#eventTable').dataTable( {
							"ajax": {
								"url": "<?php echo base_url();?>search/getEvents",
								"data": {
									"Case_Id": '<?php echo $Case_Id;?>'
								},
								"type": "post"
							},
							"iDisplayLength": 10,
							"aLengthMenu": [5, 10, 20, 25, 50, "All"]
						});
						callSuccess();
					});
				}
			}
	});
/*Get Motion table*/
	$('#MotionTable').dataTable( {
		"ajax": "<?php echo base_url();?>search/get_Motion_Data/<?php echo $Case_Id;?>",
		"iDisplayLength": 10,
		"aLengthMenu": [5, 10, 20, 25, 50, "All"],
		"bSort": false,
		"searching": false
	});
/******** ADD MOTIONS ********/
	$("#add_Motion_Info_form").validate({
		rules: {
			Motion_Date:{
				required: true
			}	
		},		
		submitHandler: function (form) {
			var $form = $(form);
			var $inputs = $form.find("input, select, button, textarea");
			var serializedData = $form.serialize();
			request = $.ajax({
				url:"<?php echo base_url();?>search/add_Motion_Info_form",
				type: "post",
				data: serializedData
			});
			request.done(function (response, textStatus, jqXHR) {
				$("#MotionTable").dataTable().fnDestroy();
				$('#MotionTable').dataTable( {
					"ajax": "<?php echo base_url();?>search/get_Motion_Data/<?php echo $Case_Id;?>",
					"iDisplayLength": 10,
					"aLengthMenu": [5, 10, 20, 25, 50, "All"],
					"bSort": false,
					"searching": false
				});
				callSuccess();
			});
		}
	});
/******** DELETE TRIALS ********/
	$('body').on( 'click', '#deleteMotionButton', function () {
		var checkedNo = [];
		$('.deleteCheckedMotion:checked').each(function(i){
			var values = $(this).val();
			checkedNo.push(values);
		});
		console.log("deleteMotionButton:"+checkedNo.length);
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
						url:"<?php echo base_url();?>search/delete_Motion",
						type: "post",
						data: {deleteCheckedMotion:checkedNo}
					});
			
					request.done(function (response, textStatus, jqXHR) {
						$('.deleteCheckedMotion:checked').each(function(i){
							var values = $(this).val();
							var row = $(".deleteCheckedMotion"+values).parent().parent();
							$(row).remove();
						});
					});
					swal("Deleted!", "Your records has been deleted.", "success");
				} else {
					swal("Cancelled", "Your records are safe :)", "error");
				}
			});
		}
	});
/*Get Motion table*/
	$('#TrialsTable').dataTable( {
		"ajax": "<?php echo base_url();?>search/get_Trials_Data/<?php echo $Case_Id;?>",
		"iDisplayLength": 10,
		"aLengthMenu": [5, 10, 20, 25, 50, "All"],
		"bSort": false,
		"searching": false
	});
/******** ADD TRIALS ********/
	$("#add_Trials_Info_form").validate({
		rules: {
			Motion_Date:{
				required: true
			}	
		},		
		submitHandler: function (form) {
			var $form = $(form);
			var $inputs = $form.find("input, select, button, textarea");
			var serializedData = $form.serialize();
			request = $.ajax({
				url:"<?php echo base_url();?>search/add_Trials_Info_form",
				type: "post",
				data: serializedData
			});
			request.done(function (response, textStatus, jqXHR) {
				$("#TrialsTable").dataTable().fnDestroy();
				$('#TrialsTable').dataTable( {
					"ajax": "<?php echo base_url();?>search/get_Trials_Data/<?php echo $Case_Id;?>",
					"iDisplayLength": 10,
					"aLengthMenu": [5, 10, 20, 25, 50, "All"],
					"bSort": false,
					"searching": false
				});
				callSuccess();
			});
		}
	});
/******** DELETE TRIALS ********/
	$('body').on( 'click', '#deleteTrialsButton', function () {
		var checkedNo = [];
		$('.deleteCheckedTrials:checked').each(function(i){
			var values = $(this).val();
			checkedNo.push(values);
		});
		console.log("deleteTrialsButton:"+checkedNo.length);
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
						url:"<?php echo base_url();?>search/delete_Trials",
						type: "post",
						data: {deleteCheckedTrials:checkedNo}
					});
			
					request.done(function (response, textStatus, jqXHR) {
						$('.deleteCheckedTrials:checked').each(function(i){
							var values = $(this).val();
							var row = $(".deleteCheckedTrials"+values).parent().parent();
							$(row).remove();
						});
					});
					swal("Deleted!", "Your records has been deleted.", "success");
				} else {
					swal("Cancelled", "Your records are safe :)", "error");
				}
			});
		}
	});
/*********************************************************/
	$('body').on('focus',".datepicker_recurring_start", function(){
		$(this).datepicker({
			"autoclose": true,
			"todayHighlight": true,
			"selectOtherMonths": true
		});
	});
	function callSuccess() {
		swal({
			title: "Successfully Added",
			type: "success"
		});
	}
	$('body').on('focus',".phone-format", function(){
		$(this).mask("999999/99");
		//$(this).mask("999-999-999");
	});
	//$("#myModal").modal("show");
/*DATE TIME PICKER SECTION*/
	$('body').on('focus',".datetimepicker_start", function(){
		$(this).datetimepicker({
			format:'YYYY/MM/DD HH:mm:ss'
		})
	});
/*DATE TIME PICKER SECTION*/
	$('body').on('focus',".datetimepicker_HM", function(){
		$(this).datetimepicker({
			format:'YYYY/MM/DD HH:mm'
		})
	});
/*ONLY TIME PICKER SECTION*/
	$('body').on('focus',".datetimepicker_only_time", function(){
		$(this).datetimepicker({
			format:'HH:mm'
		});
	});
	$("body").on('change', '.datepicker_settlement', function(){
		$("input[name=No_of_days]").val(daydiff(parseDate($('#CopundIntStartData').val()), parseDate($('#CopundIntEndData').val())));
	});
daydiff(parseDate($('#CopundIntStartData').val()), parseDate($('#CopundIntEndData').val()));
/*ONLY DATE PICKER SECTION*/
	$('body').on('focus',".datetimepicker_Dos_Doe", function(){
		$(this).datetimepicker({
			format:'MM/DD/YYYY'
		})
	});
	$('body').on('focus',".datepicker_settlement", function(){
		$(this).datepicker({
			"autoclose": true,
			"todayHighlight": true,
			"selectOtherMonths": true
		});
	});
	
	
});
	
/**********************************************************************************************************************************/
/* Bind Case info By CASE_ID clicking Tab-2 */ 
	
	function Update_Settlement(){
		var x = document.getElementsByClassName("visible");
		var y = document.getElementsByClassName("case-id");
		var y2 = document.getElementsByClassName("old-case-id");
		var info = document.getElementsByClassName("VisibleInfo");
		
		$.ajax({
			type:'POST',
			url:"<?php echo base_url(); ?>search/getCaseInfo/<?php echo $Case_AutoId;?>",
			success:function(data){
				results = JSON.parse(data);
				/*$.each($.parseJSON(data), function(k, v) {
					console.log(k + ' is ' + v);
				});*/
				
				var optionsAsString = "";
				for($i in results.CaseInfo){
					y[0].innerHTML =  results.CaseInfo[$i].Case_Id;
					$("#9CaseId").val(results.CaseInfo[$i].Case_Id);
					$("#9CaseIdHidden").val(results.CaseInfo[$i].Case_Id);
					document.getElementById("CaseId-tab-6").innerHTML = results.CaseInfo[$i].Case_Id;
					//y2[0].innerHTML =  results.CaseInfo[$i].Old_Case_Id;
					//document.getElementsByClassName("old-case-id").innerHTML =  results.CaseInfo[$i].Old_Case_Id;
					//x[0].innerHTML = results.CaseInfo[$i].Provider_Name;
					
					info[0].innerHTML = results.CaseInfo[$i].Provider_Name;
					$("#Hidden_Provider_Id").val(results.CaseInfo[$i].Provider_Id);
					document.getElementById("ProviderName-tab-6").innerHTML = results.CaseInfo[$i].Provider_Name;
					x[1].innerHTML = results.CaseInfo[$i].Initial_Status;
					//x[2].innerHTML = results.CaseInfo[$i].InjuredParty_LastName +", "+results.CaseInfo[$i].InjuredParty_FirstName ;
					info[1].innerHTML = results.CaseInfo[$i].InjuredParty_LastName +", "+results.CaseInfo[$i].InjuredParty_FirstName ;
					$("input[name=InjuredParty_LastName]").val(results.CaseInfo[$i].InjuredParty_LastName);
					$("input[name=InjuredParty_FirstName]").val(results.CaseInfo[$i].InjuredParty_FirstName);
					document.getElementById("InjuredPartyName-tab-6").innerHTML = results.CaseInfo[$i].InjuredParty_LastName  +" "+results.CaseInfo[$i].InjuredParty_FirstName
					
					x[3].innerHTML = results.CaseInfo[$i].Status;
					//x[4].innerHTML = results.CaseInfo[$i].InsuredParty_LastName +", "+results.CaseInfo[$i].InsuredParty_FirstName ;
					info[2].innerHTML = results.CaseInfo[$i].InsuredParty_LastName +", "+results.CaseInfo[$i].InsuredParty_FirstName ;
					$("input[name=InsuredParty_LastName]").val(results.CaseInfo[$i].InsuredParty_LastName);
					$("input[name=InsuredParty_FirstName]").val(results.CaseInfo[$i].InsuredParty_FirstName);
					
					x[5].innerHTML = results.CaseInfo[$i].Ins_Claim_Number;
					$("input[name=Ins_Claim_Number]").val(results.CaseInfo[$i].Ins_Claim_Number);
					
					x[6].innerHTML = results.CaseInfo[$i].Policy_Number;
					$("input[name=Policy_Number]").val(results.CaseInfo[$i].Policy_Number);
					
					x[7].innerHTML = results.CaseInfo[$i].IndexOrAAA_Number;
					$("input[name=IndexOrAAA_Number]").val(results.CaseInfo[$i].IndexOrAAA_Number);
					
					//x[8].innerHTML = results.CaseInfo[$i].InsuranceCompany_Name;
					info[3].innerHTML = results.CaseInfo[$i].InsuranceCompany_Name;
					$("#Hidden_InsuranceCompany_Id").val(results.CaseInfo[$i].InsuranceCompany_Id);
					//x[9].innerHTML = results.CaseInfo[$i].Defendant_Name;
					info[4].innerHTML = results.CaseInfo[$i].Defendant_Name;
					$("#Hidden_Defendant_Id").val(results.CaseInfo[$i].Defendant_Id);
					
					x[10].innerHTML = results.CaseInfo[$i].Attorney_FileNumber;
					$("input[name=Attorney_FileNumber]").val(results.CaseInfo[$i].Attorney_FileNumber);
					
					x[11].innerHTML = results.CaseInfo[$i].Court_Name;
					
					x[12].innerHTML = '$'+results.CaseInfo[$i].Claim_Amount;
					$("input[name=Claim_Amount]").val(results.CaseInfo[$i].Claim_Amount);
					
					$("#ClaimAmtTab6").val(parseFloat(results.CaseInfo[$i].Claim_Amount).toFixed(2));
					$("#PaymentsTab6").val(parseFloat(results.CaseInfo[$i].Paid_Amount).toFixed(2));
					var balance = results.CaseInfo[$i].Claim_Amount - results.CaseInfo[$i].Paid_Amount;
					$("#BalanceTab6").val(balance.toFixed(2));
					
					/*$("#FltSettlement_AmountTab6").val(results.CaseInfo[$i].FLT_SETTLEMENT_AMOUNT.toFixed(2));
					var settlementPercentage = (results.CaseInfo[$i].FLT_SETTLEMENT_AMOUNT * 100)/ balance;
					$("#settlementPercentageTab6").val(settlementPercentage.toFixed(2));
					$("#FltAttorneyFeeTab6").val(results.CaseInfo[$i].FLT_ATTORNEY_FEE);
					//$("#FltInterestTab6").val(results.CaseInfo[$i].FLT_INTERATE_RATE);
					$("#FltFillingFeeTab6").val(results.CaseInfo[$i].FLT_FILING_FEE);
					var TotalAmount =  parseFloat(results.CaseInfo[$i].FLT_SETTLEMENT_AMOUNT) + parseFloat(results.CaseInfo[$i].FLT_INTERATE_RATE) + parseFloat(results.CaseInfo[$i].FLT_ATTORNEY_FEE) + parseFloat(results.CaseInfo[$i].FLT_FILING_FEE);
					$("#TotalAmount").val(TotalAmount.toFixed(2));*/
					
					
					x[13].innerHTML = "PAID / $"+parseFloat(results.CaseInfo[$i].Paid_Amount).toFixed(2)+" / BALANCE $"+balance.toFixed(2);
					$("input[name=Paid_Amount]").val(results.CaseInfo[$i].Paid_Amount);
					
					x[15].innerHTML = results.CaseInfo[$i].Old_Case_Id;
					$("input[name=Old_Case_Id]").val(results.CaseInfo[$i].Old_Case_Id);
					
					//x[16].innerHTML = results.CaseInfo[$i].Accident_DateNoTimr;
					//$("input[name=Accident_Date]").val(results.CaseInfo[$i].Accident_DateNoTimr);
					
					x[16].innerHTML = results.CaseInfo[$i].Accident_Date;
					$("input[name=Accident_Date]").val(results.CaseInfo[$i].Accident_Date);
					
					//x[17].innerHTML = results.CaseInfo[$i].Adjuster_LastName+ ", "+results.CaseInfo[$i].Adjuster_FirstName;
					var adjFirstName = "";
					var adjLastName = "";
					var adjPhone = "";
					var adjExt = "";
					if(results.CaseInfo[$i].Adjuster_FirstName == null){ adjFirstName = "";
					}else{ adjFirstName = results.CaseInfo[$i].Adjuster_FirstName; }
					if(results.CaseInfo[$i].Adjuster_LastName == null){ adjLastName = "";
					}else{ adjLastName = results.CaseInfo[$i].Adjuster_LastName; }
					if(results.CaseInfo[$i].Adjuster_Phone == null){ adjPhone = "";
					}else{ adjPhone = results.CaseInfo[$i].Adjuster_Phone; }
					if(results.CaseInfo[$i].Adjuster_Phone_Ext == null){ adjExt = "";
					}else{ adjExt = results.CaseInfo[$i].Adjuster_Phone_Ext; }
					info[5].innerHTML = adjFirstName+ " "+adjLastName+" / "+adjPhone+" ext."+adjExt;
					$("#Hidden_Adjuster_Id").val(results.CaseInfo[$i].Adjuster_Id);
					x[18].innerHTML = results.CaseInfo[$i].Attorney_Name;
					
					x[21].innerHTML = results.CaseInfo[$i].Date_Opened;
					$("input[name=Date_Opened]").val(results.CaseInfo[$i].Date_Opened);
					x[20].innerHTML = results.CaseInfo[$i].Plaintiff_Discovery_Due_Date;
					$("input[name=Plaintiff_Discovery_Due_Date]").val(results.CaseInfo[$i].Plaintiff_Discovery_Due_Date);
					x[21].innerHTML = results.CaseInfo[$i].Accident_Date;
					$("input[name=Accident_Date]").val(results.CaseInfo[$i].Accident_Date);
					x[22].innerHTML = results.CaseInfo[$i].Date_Reply_To_Disc_Conf_Letter_Recd;
					$("input[name=Date_Reply_To_Disc_Conf_Letter_Recd]").val(results.CaseInfo[$i].Date_Reply_To_Disc_Conf_Letter_Recd);
					x[23].innerHTML = results.CaseInfo[$i].Date_Bill_Submitted;
					$("input[name=Date_Bill_Submitted]").val(results.CaseInfo[$i].Date_Bill_Submitted);
					x[24].innerHTML = results.CaseInfo[$i].Date_Ext_Of_Time;
					$("input[name=Date_Ext_Of_Time]").val(results.CaseInfo[$i].Date_Ext_Of_Time);
					x[25].innerHTML = results.CaseInfo[$i].Date_Status_Changed;
					$("input[name=Date_Status_Changed]").val(results.CaseInfo[$i].Date_Status_Changed);
					x[26].innerHTML = results.CaseInfo[$i].Date_Ext_Of_Time_2;
					$("input[name=Date_Ext_Of_Time_2]").val(results.CaseInfo[$i].Date_Ext_Of_Time_2);
					x[27].innerHTML = results.CaseInfo[$i].Date_Summons_Printed;
					$("input[name=Date_Summons_Printed]").val(results.CaseInfo[$i].Date_Summons_Printed);
					x[28].innerHTML = results.CaseInfo[$i].Date_Ext_Of_Time_3;
					$("input[name=Date_Ext_Of_Time_3]").val(results.CaseInfo[$i].Date_Ext_Of_Time_3);
					
					x[29].innerHTML = results.CaseInfo[$i].Date_Index_Number_Purchased;
					$("input[name=Date_Index_Number_Purchased]").val(results.CaseInfo[$i].Date_Index_Number_Purchased);
					
					x[30].innerHTML = results.CaseInfo[$i].Defendant_Discovery_Due_Date;
					$("input[name=Defendant_Discovery_Due_Date]").val(results.CaseInfo[$i].Defendant_Discovery_Due_Date);
					
					x[31].innerHTML = results.CaseInfo[$i].Date_Summons_Sent_Court;
					$("input[name=Date_Ext_Of_Time_3]").val(results.CaseInfo[$i].Date_Ext_Of_Time_3);
					
					x[32].innerHTML = results.CaseInfo[$i].Date_Disc_Conf_Letter_Printed;
					$("input[name=Date_Ext_Of_Time_3]").val(results.CaseInfo[$i].Date_Ext_Of_Time_3);
					
					x[33].innerHTML = results.CaseInfo[$i].Served_On_Date;
					$("input[name=Served_On_Date]").val(results.CaseInfo[$i].Served_On_Date);
					
					$("#stips_signed_and_returned").val(results.CaseInfo[$i].stips_signed_and_returned);
					if(results.CaseInfo[$i].stips_signed_and_returned == 1){
						x[34].innerHTML = "Yes";
					}else{
						x[34].innerHTML = "No";
					}
					
					x[35].innerHTML = results.CaseInfo[$i].Served_To;
					$("input[name=Served_To]").val(results.CaseInfo[$i].Served_To);
					
					//x[36].innerHTML = results.CaseInfo[$i].stips_signed_and_returned_2;
					$("#stips_signed_and_returned_2").val(results.CaseInfo[$i].stips_signed_and_returned_2);
					if(results.CaseInfo[$i].stips_signed_and_returned_2 == 1){
						x[36].innerHTML = "Yes";
					}else{
						x[36].innerHTML = "No";
					}
					
					
					x[37].innerHTML = results.CaseInfo[$i].Served_On_Time;
					$("input[name=Served_On_Time]").val(results.CaseInfo[$i].Served_On_Time);
					
					//x[38].innerHTML = results.CaseInfo[$i].stips_signed_and_returned_3;
					$("#stips_signed_and_returned_3").val(results.CaseInfo[$i].stips_signed_and_returned_3);
					if(results.CaseInfo[$i].stips_signed_and_returned_3 == 1){
						x[38].innerHTML = "Yes";
					}else{
						x[38].innerHTML = "No";
					}
					
					x[39].innerHTML = results.CaseInfo[$i].Date_Afidavit_Filed;
					$("input[name=Date_Afidavit_Filed]").val(results.CaseInfo[$i].Date_Afidavit_Filed);
					
					x[40].innerHTML = results.CaseInfo[$i].Date_Closed;
					$("input[name=Date_Closed]").val(results.CaseInfo[$i].Date_Closed);
					 
					x[41].innerHTML = results.CaseInfo[$i].Date_Answer_Received;
					$("input[name=Date_Answer_Received]").val(results.CaseInfo[$i].Date_Answer_Received);
					
					x[42].innerHTML = results.CaseInfo[$i].AAA_Conciliation_Date;
					$("input[name=AAA_Conciliation_Date]").val(results.CaseInfo[$i].AAA_Conciliation_Date);
					
					x[43].innerHTML = results.CaseInfo[$i].Our_Discovery_Demands;
					$("input[name=Our_Discovery_Demands]").val(results.CaseInfo[$i].Our_Discovery_Demands);
					
					x[44].innerHTML = results.CaseInfo[$i].Arb_Award_Date;
					$("input[name=Arb_Award_Date]").val(results.CaseInfo[$i].Arb_Award_Date);
					
					x[45].innerHTML = results.CaseInfo[$i].Date_Demands_Printed;
					$("input[name=Date_Demands_Printed]").val(results.CaseInfo[$i].Date_Demands_Printed);
				}  
			},
			error: function(result){ console.log("error"); }
		
		});
	}
	
	/*$.ajax({
		type:'POST',
		url:"<?php //echo base_url(); ?>search/get_Settled_By/<?php //echo $Case_Id;?>",
		success:function(data){
			results = JSON.parse(data);
			$.each(results[0], function(k, v) {
				console.log(k + ' is ' + v);
			});
			 var settledBy = document.getElementsByClassName("settled-by-info");
			for($i in results){
				 settledBy[0].innerHTML = results[$i].User_Id;
				 settledBy[1].innerHTML = results[$i].SettledWith ;
				console.log("ssss:"+results[$i].User_Id);
			}
		}
	});*/
	
		
		$(".info-link").click(function(){
			var id = $(this).attr("id");
			var hiddenField = $(this).prev().val();
			console.log("hiddenField:"+hiddenField);
			if($(this).attr("id") == "ProviderInfoLink"){
				//console.log("ProviderInfoLink:");
				$.ajax({
					type:'POST',
					url:"<?php echo base_url();?>search/getProvider_ById/"+hiddenField,
					success:function(data){
						var i=1;
						results = JSON.parse(data);
						$.each(results[0], function(k, v) {
							//console.log(k + ' == ' + v);
							$("#Provider_Info_table tr:nth-child("+i+") td:nth-child(2)").text(v);
							i++;
						});
					},
					error: function(result){ console.log("error"); }
				});
				/*$("#Provider_Info_table").dataTable().fnDestroy();
				$('#Provider_Info_table').dataTable( {
					"ajax": "<?php //echo base_url();?>search/getProvider_ById/"+hiddenField,
					"iDisplayLength": 10,
					"aLengthMenu": [5, 10, 20, 25, 50, "All"],
					"bSort": false,
					"searching": false,
					"lengthChange": false,
					"bInfo": false,
					"bPaginate": false
				});*/
			}else if($(this).attr("id") == "InsuranceCompanyInfoLink"){
				console.log("InsuranceCompanyInfoLink:");
				$.ajax({
					type:'POST',
					url:"<?php echo base_url();?>search/getInsurance_ById/"+hiddenField,
					success:function(data){
						var i=1;
						results = JSON.parse(data);
						$.each(results[0], function(k, v) {
							//console.log(k + ' == ' + v);
							$("#InsuranceCompany_Info_table tr:nth-child("+i+") td:nth-child(2)").text(v);
							i++;
						});
					},
					error: function(result){ console.log("error"); }
				});
			}else if($(this).attr("id") == "DefendantInfoLink"){
				console.log("DefendantInfoLink:");
				$.ajax({
					type:'POST',
					url:"<?php echo base_url();?>search/getDefendant_ById/"+hiddenField,
					success:function(data){
						var i=1;
						results = JSON.parse(data);
						$.each(results[0], function(k, v) {
							//console.log(k + ' == ' + v);
							$("#Defendant_Info_table tr:nth-child("+i+") td:nth-child(2)").text(v);
							i++;
						});
					},
					error: function(result){ console.log("error"); }
				});
			}else if($(this).attr("id") == "AdjusterInfoLink"){
				console.log("AdjusterInfoLink:");
				$.ajax({
					type:'POST',
					url:"<?php echo base_url();?>search/getAdjuster_ById/"+hiddenField,
					success:function(data){
						var i=1;
						results = JSON.parse(data);
						$.each(results[0], function(k, v) {
							//console.log(k + ' == ' + v);
							$("#Adjuster_Info_table tr:nth-child("+i+") td:nth-child(2)").text(v);
							i++;
						});
					},
					error: function(result){ console.log("error"); }
				});
			}else if($(this).attr("id") == "InjuredInfoLink"){
				console.log("InjuredInfoLink:");
				$.ajax({
					type:'POST',
					url:"<?php echo base_url();?>search/getInjured_ById/<?php echo $Case_AutoId?>",
					success:function(data){
						var i=1;
						results = JSON.parse(data);
						$.each(results[0], function(k, v) {
							//console.log(k + ' == ' + v);
							$("#Injured_Info_table tr:nth-child("+i+") td:nth-child(2)").text(v);
							i++;
						});
					},
					error: function(result){ console.log("error"); }
				});
			}else if($(this).attr("id") == "InsuredInfoLink"){
				console.log("InjuredInfoLink:");
				$.ajax({
					type:'POST',
					url:"<?php echo base_url();?>search/getInsured_ById/<?php echo $Case_AutoId?>",
					success:function(data){
						var i=1;
						results = JSON.parse(data);
						$.each(results[0], function(k, v) {
							//console.log(k + ' == ' + v);
							
							//$("#Insured_Info_table tr:nth-child("+i+") td:nth-child(2)").append(v);
							$("#Insured_Info_table tr:nth-child("+i+") td:nth-child(2)").text(v);
							i++;
						});
					},
					error: function(result){ console.log("error"); }
				});
			}
			$("#show"+id).modal("show");
		});
		
	
</script>
<script>
	$('.dataentry').addClass('active');
	$('.addCaseInfo').addClass('active');
</script>
</body>
</html>