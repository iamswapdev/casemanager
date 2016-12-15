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
<div class="content animate-panel">
<?php $months = array("Just", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "jan");
foreach($CaseInfo as $row){$Case_AutoId = $row['Case_AutoId']; $Case_Id = $row['Case_Id']; $Claim_Amount = $row['Claim_Amount']; $Paid_Amount = $row['Paid_Amount']; $DateOfService_Start = $row['DateOfService_Start']; $DateOfService_End = $row['DateOfService_End']; $Date_BillSent = $row['Date_BillSent']; }

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

	<div class="row">
		<div class="col-lg-12">
		<div class="hpanel">
			<ul class="nav nav-tabs view-case-navigation">
				<li class="active"><a id="tab1" data-toggle="tab" href="#tab-1">Case Information</a></li>
				<li class=""><a id="tab2" data-toggle="tab" href="#tab-2">Extended case info</a></li>
				<li class=""><a id="tab3" data-toggle="tab" href="#tab-3">Notes</a></li>
				<li class=""><a id="tab4" data-toggle="tab" href="#tab-4">Document Manager</a></li>
				<li class=""><a id="tab5" data-toggle="tab" href="#tab-5">Templates</a></li>
				<li class=""><a id="tab6" data-toggle="tab" href="#tab-6">Settlement</a></li>
				<!--<li class=""><a id="tab7" data-toggle="tab" href="#tab-7">New Settlement</a></li>-->
				<li class=""><a id="tab8" data-toggle="tab" href="#tab-8">Payment</a></li>
				<li class=""><a id="tab9" data-toggle="tab" href="#tab-9">Events</a></li>
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
							<table cellpadding="1" cellspacing="1" class="table tdAlignLeft">
								<tbody>
								<tr> 
                                	<th><input type="hidden" name="selectRecordNo" value="1"><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>PROVIDER</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="Provider_Id" name="Provider_Id"><option selected="selected" value=""></option><?php foreach($Provider_Name1 as $row){?><option value="<?php echo $row['Provider_Id']; ?>"> <?php echo $row['Provider_Name']; ?> </option><?php }?></select></div></td>
                                    <th><input type="hidden" name="recordNo" value="2"><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save fa-save1" style="display:none"></i></th>
									<th>CASE STATUS</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="Initial_Status" name="Initial_Status"><option selected="selected" value=""></option><?php foreach($CaseStatus as $row){?><option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option><?php }?></select></div></td>
								</tr>
                                
								<tr>  
                                	<th><input type="hidden" name="recordNo" value="3"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save fa-save1" style="display:none"></i></th>
									<th>INJURED NAME</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><label>Last Name: </label><input type="text" class="input-sm" name="InjuredParty_LastName" /><label>First Name: </label><input type="text" class="input-sm" name="InjuredParty_FirstName" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="4"><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>CURRENT STATUS</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="Last_Status" name="Last_Status"><option selected="selected" value=""></option><?php foreach($Status as $row){?><option value="<?php echo $row['Status_Id']; ?>"> <?php echo $row['Status_Type']; ?> </option><?php }?></select></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="5"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>INSURED NAME</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><label>Last Name: </label><input type="text" class="input-sm" name="InsuredParty_LastName" /><label>First Name: </label><input type="text" class="input-sm" name="InsuredParty_FirstName" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="6"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>INS. CLAIM #</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Ins_Claim_Number" /></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="7"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>POLICY #</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Policy_Number" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="8"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>INDEX / AAA #</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="phone-format input-sm" name="IndexOrAAA_Number" /></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="9"><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>INSURANCE COMPANY</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="InsuranceCompany_Id" name="InsuranceCompany_Id"><option selected="selected" value=""></option><?php foreach($InsuranceCompany_Name as $row){?><option value="<?php echo $row['InsuranceCompany_Id']; ?>"><?php echo $row['InsuranceCompany_Name'];?></option><?php }?></select></div></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" name="recordNo" value="10"><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>DEF ATTORNEY NAME</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="Defendant_Id" name="Defendant_Id" required><option selected="selected" value=""></option><?php foreach($Defendant_Name as $row){?><option value="<?php echo $row['Defendant_id']; ?>"><?php echo $row['Defendant_Name'];?></option><?php }?></select></div></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="11"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>DEF ATTORNEY FILE #</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Attorney_FileNumber" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="12"><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>COURT NAME</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="Court_Id" name="Court_Id"><option selected="selected" value=""></option><?php foreach($Court as $row){?><option value="<?php echo $row['Court_Id']; ?>"> <?php echo $row['Court_Name']; ?> </option><?php }?></select></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="13"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>CLAIM AMOUNT</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Claim_Amount" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="14"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>PAID/BALANCE</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Paid_Amount" /></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="15"><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit1"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>ASSIGN TO WORK DESK</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="caseStatusId" name="caseStatusId"><option selected="selected" value=""></option><?php foreach($CaseStatus as $row){?><option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option><?php }?></select></div></td>
                                    <th><input type="hidden" name="recordNo" value="16"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>OLD CASE ID</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Old_Case_Id" /></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="17"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>DATE OF ACCIDENT</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm datetimepicker_start" name="Accident_Date" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="18"><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>ADJUSTER</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="Adjuster_Id" name="Adjuster_Id"><option selected="selected" value=""></option><?php foreach($Adjuster_Name as $row){?><option value="<?php echo $row['Adjuster_Id']; ?>"> <?php echo $row['Adjuster_LastName'].", ".$row['Adjuster_FirstName']; ?> </option><?php }?></select></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="19"><input type="hidden" name="selectRecordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>PLAINTIFF ATTORNEY CO.</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="Plaintiff_Id" name="Plaintiff_Id"><option selected="selected" value=""></option><?php foreach($Plantiff as $row){?><option value="<?php echo $row['Attorney_id']; ?>"> <?php echo $row['Attorney_Name']; ?> </option><?php }?></select></div></td>
                                    <th></th>
									<th></th>
									<td></td>
								</tr>
                                
                                </tbody>
							</table>
						</div>
						</div>
                        <div class="form-group form-horizontal col-lg-12 set-bg">
							<div class="table-responsive">
								<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped add-case-table">
									<thead>
									<tr>
										<th>D.O.S-Start</th>
										<th>D.O.S.-End</th>
										<th>Claim Amt.</th>
										<th>Paid Amt.</th>
										<th>Date Bill Sent</th>
                                        <th>Service Type</th>
                                        <th>Denial Reason</th>
                                        <th>Delete</th>
									</tr>
                                
                                </thead>
									<tbody>
									<tr class="first-row">
										<td><input id="dateOfServiceStart" name="dateOfServiceStart" class="form-control input-sm datepicker_recurring_start" value="<?php echo str_replace(" 12:00AM","",$DateOfService_Start);?>"></td>
										<td><input id="dateOfServiceEnd"  name="dateOfServiceEnd" class="form-control input-sm datepicker_recurring_start" value="<?php  echo str_replace(" 12:00AM","",$DateOfService_End);?>"></td>
										<td><input type="number" step="0.01" id="claimAmt" name="claimAmt" class="form-control input-sm" value="<?php echo $Claim_Amount;?>"></td>
										<td><input type="number" step="0.01" id="paidAmt" name="paidAmt" class="form-control input-sm" value="<?php echo $Paid_Amount;?>"></td>
										<td><input id="dateBillSent" name="dateBillSent" class="form-control input-sm datepicker_recurring_start" value="<?php echo $Date_BillSent;?>"></td>
                                        <td><select class="form-control input-sm" id="serviceType" name="serviceType">
                                        <option>-- Select Service--</option>
                                        <?php foreach($Service as $row){?>
                                        <option value="<?php echo $row['ServiceType_ID']; ?>"> <?php echo $row['ServiceType']; ?> </option>
                                        <?php }?>
                                    </select></td>
                                        <td><select class="form-control input-sm" id="denialReasons" name="denialReasons" >
                                                <option>-- Select Denial reason --</option>
                                                <?php foreach($DenialReasons as $row){?>
                                                <option value="<?php echo $row['DenialReasons_Id']; ?>"> <?php echo $row['DenialReasons_Type']; ?> </option>
                                                <?php }?>
                                            </select></td>
                                        <td><span><button type="button" id="addOtherInfo" class="btn btn-primary create">Add</button></span></td>
									</tr>
                                
                                </tbody>
								</table>
							</div>
						</div>
                        <div class="form-group form-horizontal col-lg-12">
                            <div class="col-md-2">
                                <button type="button" id="DeleteButton" class="btn w-xs btn-primary" style="display:none;">Delete Checked</button>
                            </div>
                        </div>
                        <div class="form-group form-horizontal col-lg-12">
                        	<br><h5 class="h4-title">Payment Summary Information</h5>
                        </div>
                        
						<div class="form-group form-horizontal col-lg-12 set-bg">
							<div class="table-responsive">
								<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped add-case-table">
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
										<td><input id="dateOfServiceStart" name="dateOfServiceStart" class="form-control input-sm datepicker_recurring_start" value="<?php echo str_replace(" 12:00AM","",$DateOfService_Start);?>"></td>
										<td><input id="dateOfServiceEnd"  name="dateOfServiceEnd" class="form-control input-sm datepicker_recurring_start" value="<?php echo str_replace(" 12:00AM","",$DateOfService_End);?>"></td>
										<td><input type="number" step="0.01" id="claimAmt" name="claimAmt" class="form-control input-sm" value="<?php echo $Claim_Amount;?>"></td>
										<td><input type="number" step="0.01" id="paidAmt" name="paidAmt" class="form-control input-sm" value="<?php echo $Paid_Amount;?>"></td>
										<td><input id="dateBillSent" name="dateBillSent" class="form-control input-sm datepicker_recurring_start" value="<?php echo $Date_BillSent;?>"></td>
									</tr>
                                
                                </tbody>
								</table>
							</div>
						</div>
                        <form id="addNotes_form" method="post">
						<div class="form-group form-horizontal col-lg-12">
						<br><h5 class="h4-title">Notes Information</h5>
							<label class="col-md-2 control-label">Description</label>
							<div class="col-md-4">
                                <textarea rows="3"  id="notesDescription" name="notesDescription" class="form-control" ></textarea>
                                <input type="hidden" name="notesAccidentDate"  class="notesAccidentDate datepicker_recurring_start">
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
                                &nbsp;&nbsp;<button type="submit" class="btn btn-primary">Add Notes</button>
                            </div>
                        </div>
                        <div class="form-group form-horizontal col-lg-12">
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
                        </div> 	
                        </form> 	 	
                        <div class="form-group form-horizontal col-md-12">
                        <!--<form action="/casemanager/search/getNotes" method="post">
                        	<input type="hidden" name="recordNo" name="Case_Id" value="NB09-1">
                            <button type="submit">Sub</button>
                        </form>-->
                        
                        
                        <h5 class="h4-title">Notes Details</h5>
                            <div class="col-md-12">
                                <table id="example1" class="table dataTable table-bordered table-striped tdAlignLeft-bottom">
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
				</div>
				<div id="tab-2" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
						<div class="hpanel">
						<div class="panel-heading"></div>
						<div class="panel-body tab-panel">
							<div class="form-group form-horizontal col-md-8">
								<h5 class="h4-title">Workarea Information</h5>
								<div class="table-responsive">
									<table cellpadding="1" cellspacing="1" class="table tdAlignLeft">
										<tbody>
										<tr>
											<th></th>		
											<th>21 DATE FILE OPENED</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Date_Opened" /></div></td>
											<th><input type="hidden" name="recordNo" value="22"><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>22 PLAINTIFF DISCOVERY COMPLETED</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Plaintiff_Discovery_Due_Date" /></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="23"></i><i title="Save" class="fa fa-save" style="display:none"></i></th> 
											<th>23DATE OF ACCIDENT</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Accident_Date" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="24"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>24 DATE REPLY TO DISC CONF LETTER Recd</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Date_Reply_To_Disc_Conf_Letter_Recd" /></div></td>
										</tr>
										<tr> 
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="25"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>			
											<th>25 DATE BILL SUBMITED</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Date_Bill_Submitted" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="26"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>26 DATE EXT OF TIME 1</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Date_Ext_Of_Time" /></div></td>
										</tr>
										<tr> 
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="27"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>	 			 
											<th>27 DATE STATUS CHANGED</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Date_Status_Changed" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="28"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>28 DATE EXT OF TIME 2</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Date_Ext_Of_Time_2" /></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="29"></i><i title="Save" class="fa fa-save" style="display:none"></i></th> 			 
											<th>29 DATE SUMMONS PRINTED</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Date_Summons_Printed" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="30"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>30 DATE EXT OF TIME 3</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Date_Ext_Of_Time_3" /></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="31"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>			
											<th>31 DATE INDEX NUMBER PURCHASED </th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Date_Index_Number_Purchased" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="32"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>32 DEFENDANT'S DISCOVERY RECEIVED</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Defendant_Discovery_Due_Date" /></div></td>
										</tr>
										<tr> 
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="33"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>			
											<th>33 DATE SUMMONS SENT TO COURT</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Date_Summons_Sent_Court" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="34"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>34 DATE DISCOVERY CONF LETTER PRINTED</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Date_Disc_Conf_Letter_Printed" /></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="35"></i><i title="Save" class="fa fa-save" style="display:none"></i></th> 			
											<th>35 DATE SUMMONS SERVED</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Served_On_Date" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="36"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>36 STIPS SIGNED & RETURNED 1</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="stips_signed_and_returned" /></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="37"></i><i title="Save" class="fa fa-save" style="display:none"></i></th> 			
											<th>37 SERVED TO</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Served_To" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="38"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>38 STIPS SIGNED & RETURNED 2</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="stips_signed_and_returned_2" /></div></td>
										</tr>
										<tr> 
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="39"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>			
											<th>39 SUMMONS SERVE TIME</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_only_time" name="Served_On_Time" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="40"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>40 STIPS SIGNED & RETURNED 3</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="stips_signed_and_returned_3" /></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="41"></i><i title="Save" class="fa fa-save" style="display:none"></i></th> 	 			
											<th>41 DATE AFFIDAVIT FILED</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Date_Afidavit_Filed" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="42"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>42 DATE SUMMONS CLOSED</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Date_Closed" /></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="43"></i><i title="Save" class="fa fa-save" style="display:none"></i></th> 	 			
											<th>43 DATE ANSWER RCVD</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Date_Answer_Received" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="44"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>44 AAA CONCILIATION DATE</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="AAA_Conciliation_Date" /></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="45"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>			
											<th>45 OUR DISCOVERY DEMAND</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Our_Discovery_Demands" /></div></td>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="46"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>46 ARB AWARD DATE</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Arb_Award_Date" /></div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="selectRecordNo" value="0"><i title="Edit" class="fa fa-edit"><input type="hidden" name="recordNo" value="47"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>			
											<th>47 DATE DEMAND PRINTED</th>
											<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input class="input-sm datetimepicker_start" name="Date_Demands_Printed" /></div></td>
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
				</div>
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
                                    &nbsp;&nbsp;<button type="submit" class="btn btn-primary">Add Notes</button>
								</div>
							</div>
							<div class="form-group form-horizontal col-lg-12">
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
							</div>
                            <div class="form-group form-horizontal col-lg-12">
                            	<div class="col-md-11"></div>
                            	<div class="col-md-1"><button type="button" id="deleteNotesButton" class="btn btn-primary">Delete</button></div>
                            </div>
                            </form>
							<div class="form-group form-horizontal col-lg-12">
								<h5 class="h4-title">Notes Details</h5>
									<div class="col-md-12">
										<table id="example2" class="table dataTable table-bordered tdAlignLeft-bottom table-striped">
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
                 </div>
				
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
				</div>
				<div id="tab-5" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
						<div class="hpanel">
						<div class="panel-heading"></div>
						<div class="panel-body tab-panel">
							<div class="form-group form-horizontal col-md-12">
								<br><h5 class="h4-title">Template Manager </h5>
								<div class="col-sm-2"></div>
								<div class="col-sm-4">List of available templates
									<select class="form-control input-sm input-rows" name="account" multiple>
										<option>Admin</option>
										<option>Master</option>
										<option>Search</option>
										<option>WorkArea</option>
										<option>WorkDesk</option>
										<option>Financials</option>
										<option>Contacts</option>
									</select>
								</div>
							</div>
						</div><!-- End of panel-body tab-panel-->
						</div><!-- End hpanel -->
						</div><!-- End col-lg-12-->
					</div><!-- End row-->
				</div>
				<div id="tab-6" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
						<div class="hpanel">
						<div class="panel-heading"></div>
						<div class="panel-body tab-panel">
							<div class="form-group form-horizontal col-md-12">
								<br><h5 class="h4-title">SETTLEMENT DETAIL</h5>
                                <div class="col-md-2"></div>
                                <div class="col-md-1 case-info-tab6-title">CASE ID</div>
                                <div class="col-md-2 case-info-tab6-title">PROVIDER</div>
                                <div class="col-md-2 case-info-tab6-title">INJURED PARTY</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
                            	<div class="col-md-2"></div>
								<div class="col-md-1 case-info-tab6" id="CaseId-tab-6"></div>
                                <div class="col-md-2 case-info-tab6" id="ProviderName-tab-6"></div>
                                <div class="col-md-2 case-info-tab6" id="InjuredPartyName-tab-6"></div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-md-2 control-label">ADJUSTER</label>
								<div class="col-md-6">
									<select class="form-control input-sm" id="adjusterIdTab-6" name="adjusterIdTab-6"><option selected="selected" value=""></option><?php foreach ($Adjuster_Name_Insurance as $row) {?><option value="<?php echo $row['Adjuster_Id']; ?>"> <?php echo $row['Adjuster_LastName']." ".$row['Adjuster_LastName']." => ". $row['InsuranceCompany_Name']; ?> </option><?php  }?></select>
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<label class="col-md-2 control-label">ATTORNEY</label>
								<div class="col-md-6">
									<select class="form-control input-sm" id="defendantIdTab-6" name="defendantIdTab-6"><option selected="selected" value=""></option><?php foreach($Defendant_Name as $row){?><option value="<?php echo $row['Defendant_id']; ?>"><?php echo $row['Defendant_Name']." => ".$row['Defendant_Address'];?></option><?php }?></select>
								</div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-2"><label class="control-label settlement-title">CLAIM AMOUNT</label> </div>
								<div class="col-md-2"><label class="control-label settlement-title">PAYMENTS</label> </div>
								<div class="col-md-2"><label class="control-label settlement-title">BALANCE</label> </div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-2"><input step="0.0001" type="number" id="ClaimAmtTab6" name="ClaimAmtTab6" class="form-control input-sm Amount" ></div> 	 	
								<div class="col-md-2"><input step="0.0001" type="number" id="PaymentsTab6" name="PaymentsTab6" class="form-control input-sm Amount" ></div>
								<div class="col-md-2"><input step="0.0001" type="number" id="BalanceTab6" name="BalanceTab6"  class="form-control input-sm Amount" ></div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-2"></div>
								<div class="col-md-1"><label class="control-label">PERCENTAGE (%)</label> </div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-1"><label class="control-label">SETTLEMENT AMOUNT</label> </div>
								<div class="col-md-1"><input step="0.01" type="number" id="FltSettlement_AmountTab6" name="FltSettlement_AmountTab6"  class="form-control input-sm Amount" ></div>
								<div class="col-md-1"><input step="0.01" type="number" id="settlementPercentageTab6" name="settlementPercentageTab6"  class="form-control input-sm percentage" ></div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-1"><label class="control-label col-md-12">INTEREST</label> </div>
								<div class="col-md-1"><input step="0.01" type="number" id="FltInterestTab6" name="FltInterestTab6"  class="form-control input-sm Amount" ></div>
								<div class="col-md-1"><input step="0.01" type="number" id="FltInterestPercTab6" name="FltInterestPercTab6"  class="form-control input-sm percentage" ></div>
								<div class="col-md-1 start-date-settlement"><label class="control-label col-md-12">START DATE</label> </div>
								<div class="col-md-1"><input type="text" id="CopundIntStartData" name="CopundIntStartData"  class="form-control input-sm datepicker_recurring_start" ></div>
								<div class="col-md-1 end-date-settlement"><label class="control-label col-md-12">END DATE</label> </div>
								<div class="col-md-1"><input type="text" id="CopundIntEndData" name="CopundIntEndData"  class="form-control input-sm datepicker_recurring_start" ></div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-3"></div>
								<div class="col-md-2"><button>Calculate compound interest</button></div>
								<div class="col-md-2"><button>Calculate Simple interest</button></div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-1"><label class="control-label">ATTORNEY'S FEE 	</label> </div>
								<div class="col-md-1"><input step="0.01" type="number" id="FltAttorneyFeeTab6" name="FltAttorneyFeeTab6"  class="form-control input-sm Amount" ></div>
								<div class="col-md-1"><input step="0.01" type="number" id="FltAttorneyPercTab6" name="FltAttorneyPercTab6"  class="form-control input-sm percentage" ></div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-1"><label class="control-label">FILING FEE</label> </div>
								<div class="col-md-1"><input step="0.01" type="number" id="FltFillingFeeTab6" name="FltFillingFeeTab6"  class="form-control input-sm Amount" ></div>
								<div class="col-md-1"><input step="0.01" type="number" id="FltFillingFeePercTab6" name="FltFillingFeePercTab6"  class="form-control input-sm percentage" ></div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-1"><label class="control-label settlement-title">TOTAL AMOUNT</label> </div>
								<div class="col-md-1"><input step="0.01" type="number" id="TotalAmount" name="TotalAmount"  class="form-control input-sm Amount" ></div>
								<div class="col-md-1"><input step="0.01" type="number" id="TotalAmountPerc" name="TotalAmountPerc"  class="form-control input-sm percentage" ></div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-3"></div>
								<div class="col-md-2"><button>Re-Calculate Amount</button></div>
								<div class="col-md-1"><button>Add Amount</button></div>
								<div class="col-md-1"><button>Reset Values</button></div>
							</div>
                            <div class="form-group form-horizontal col-md-12">
								<label class="col-md-2 control-label">SETTLED TYPE</label>
								<div class="col-md-2">
									<select class="form-control input-sm" id="" name="" required>
                                        <option value="0">...SELECT....</option>
                                        <option value="Settled/Phone">SETTLED/PHONE</option>
                                        <option value="Settled/Court">SETTLED IN COURT</option>
                                        <option value="Trial/Win">TRIAL WON</option>
                                        <option value="Trial/Lose">TRIAL LOST</option>
									</select>
								</div>
							</div>
                            <div class="form-group form-horizontal col-md-12">
								<label class="col-md-2 control-label">Notes</label>
								<div class="col-md-4">
									<textarea rows="3"  id="memo" name="memo" class="form-control" ></textarea>
								</div>
							</div>
                            <div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-2"><button>Finalize Settlement</button></div>
								<div class="col-md-1"><button>Reset</button></div>
							</div>
						</div><!-- End of panel-body tab-panel-->
						</div><!-- End hpanel -->
						</div><!-- End col-lg-12-->
					</div><!-- End row-->
				</div>
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
				</div>
				<div id="tab-8" class="tab-pane">
					<div class="row">
						<div class="col-lg-12">
						<div class="hpanel">
						<div class="panel-heading"></div>
						<div class="panel-body tab-panel">
							<div class="form-group form-horizontal col-md-12">
                            	<h5 class="h4-title">PAYMENT DETAILS</h5>
                                <div class="col-md-12">
                                    <table id="example3" class="table dataTable table-bordered table-striped">
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
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Transaction Amount</label>
                                <div class="col-md-2">
                                	<input type="text" id="" name=""  class="form-control input-sm" >
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Transaction Date</label>
                                <div class="col-md-2">
                                	<input type="text" id="TransactionDate" name="TransactionDate"  class="form-control input-sm datepicker_recurring_start" >
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Transaction Type</label>
                                <div class="col-md-2">
                                	<select class="form-control input-sm" id="TransactionType" name="" required>
                                        <option selected="selected" value="0">...Select...</option>
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
                                	<select class="form-control input-sm" id="" name="" required>
                                        <option selected="selected" value="Show On Remittance">Show On Remittance</option>
                                        <option value="X">Do Not Show On Remittance</option>
                                     </select>
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Notes</label>
                                <div class="col-md-4">
									<textarea rows="3"  id="memo" name="memo" class="form-control" ></textarea>
								</div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<div class="col-md-2"></div>
                                <div class="col-md-2"><button>Finalize Settlement</button></div>
                            </div>
						</div><!-- End of panel-body tab-panel-->
						</div><!-- End hpanel -->
						</div><!-- End col-lg-12-->
					</div><!-- End row-->
				</div>
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
                                	<input type="text" id="9CaseId" name="9CaseId"  class="form-control input-sm" >
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Event Date <span class="required-field">*</span></label>
                                <div class="col-md-2">
                                	<input class="form-control input-sm datetimepicker_start" name="EventDate">
                                </div>
                                <!--<div class='input-group date col-md-2' id='datetimepicker6'>
                                    <input type='text' class="form-control input-sm" id="EventDate" name="EventDate" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>-->
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Event Type</label>
                                <div class="col-md-2">
                                	<input id="EventType" name="EventType"  class="form-control input-sm" >
                                    <input type="hidden" name="EventTypeHidden">
                                </div>
                                <div class="col-md-4">
                                	<select class="form-control input-sm" id="selectEventType" name=""><option selected="selected" value="">Select Event Type</option><?php foreach($EventType as $row){?><option value="<?php echo $row['EventTypeId']; ?>"><?php echo $row['EventTypeName'];?></option><?php  }?></select>
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Event Status: </label>
                                <div class="col-md-2">
                                	<input id="EventStatus" name="EventStatus"  class="form-control input-sm" >
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
                                    <input name="AssignUser"  class="form-control input-sm">
                                </div>
                                <div class="col-md-4">
                                	<select class="form-control input-sm" id="selectAssignUser" name="selectAssignUser"><option selected="selected" value="">Select User to Assign</option><?php foreach($EventStatus as $row){?><option value="<?php echo $row['EventStatusId']; ?>"><?php echo $row['EventStatusName'];?></option><?php  }?></select>
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<div class="col-md-2"></div>
                                <div class="col-md-2"><button type="submit" class="btn btn-primary">Save</button></div>
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
                                <div class="col-md-2"><button type="button" id="deleteEventsButton" name="deleteEventsButton" class="btn btn-primary">Deleted Checked</button></div>
                            </div>
                            <!--</form>-->
                            
                            
						</div><!-- End of panel-body tab-panel-->
						</div><!-- End hpanel -->
						</div><!-- End col-lg-12-->
					</div><!-- End row-->
				</div>
			</div>
		
		</div><!-- End hpanel -->
		</div><!-- End col-lg-12-->
	</div><!-- End row-->
    
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
                                            <input type="text" class="mNoteDate input-sm datepicker_recurring_start" id="mEditedDate" name="Notes_Date">
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
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    
    <!-- DATETIMEPICKER SCRIPTS -->
    <script src="<?php echo base_url();?>assets/vendor/mask-phone/maskPhone.js"></script>
    <script src="<?php echo base_url();?>assets/datetimepicker/jscss/js/moment-with-locales.js"></script>
    <script src="<?php echo base_url();?>assets/datetimepicker/jscss/js/bootstrap-datetimepicker.js"></script>
    
    <script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/toastr/build/toastr.min.js"></script>
    <!-- App scripts --> 
    <script src="<?php echo base_url();?>assets/scripts/homer.js"></script> 

<script>
$(document).ready(function(e) {
/**************************** CASEINFORMATION TAB-1 ************************************************************************************/
	var countForRows = 0;
	var value = 0;
	$("#addOtherInfo").click(function(){
		if(countForRows >= 0){
			console.log("ccc: "+countForRows);
			$("#DeleteButton").css("display", "block");
		}
		countForRows++;
		  
		var addNewRow = '<tr class="r'+value+'">';
		    addNewRow += '<td><input class="form-control input-sm datepicker_recurring_start" name="dateOfServiceStart"></td>';
            addNewRow += '<td><input class="form-control input-sm datepicker_recurring_start" name="dateOfServiceStart"></td>'
            addNewRow += '<td><input type="text" name="claimAmt" class="form-control input-sm"></td>'
            addNewRow += '<td><input type="text" name="paidAmt" class="form-control input-sm"></td>'
            addNewRow += '<td><input class="form-control input-sm datepicker_recurring_start" name="dateBillSent"></td>';
			addNewRow += '<td><select class="form-control input-sm" name="serviceType"><option>-- Select Service--</option><?php foreach($Service as $row){?><option value="<?php echo $row['ServiceType_ID']; ?>"> <?php echo $row['ServiceType']; ?> </option><?php }?></select></td>';
			
			addNewRow += '<td><select class="form-control input-sm" name="denialReasons"><option>-- Select Denial reason --</option><?php foreach($DenialReasons as $row){?><option value="<?php echo $row['DenialReasons_Id']; ?>"> <?php echo $row['DenialReasons_Type']; ?> </option><?php }?></select></td>';
			addNewRow += '<td><input class="ads_Checkbox" type="checkbox" name="delete[]" value="'+value+'"></td>';
			value++;
			addNewRow += '</tr>';
						  
		$(addNewRow).insertBefore(".first-row");
	});
	
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
				//$("#myModal").modal("show");
				 $('#example1').dataTable().fnAddData( [ notesDescription,"admin",notesAccidentDate,"",notesType ] );
				callSuccess();
				$("#updateProviderInfo").css("display", "none");
			});
			e.preventDefault();	//STOP default action
	});
	$(".fa-edit").click(function(){
		$(this).parent().find(".fa-save").css("display", "block");
		$(this).css("display", "none");
		var parentTd = $(this).parent();
		var divs = $(parentTd).next().next();
		$(divs).find(".visible").css("display", "none");
		$(divs).find(".editHidden").css("display", "block");
	});
	
/*********** fa-save ***********/
	$(".fa-save").click(function(){
		$(this).parent().find(".fa-edit").css("display", "block");
		$(this).css("display", "none");
		var editHidden = $(this).parent().next().next().find(".editHidden");
		var visible = $(this).parent().next().next().find(".visible");
		var x = document.getElementsByClassName("visible");
		var recordNo = $(this).parent().find("input[name=recordNo]").val();
		var selectRecordNo = $(this).parent().find("input[name=selectRecordNo]").val();
		var string = "recordNo="+recordNo+"&Case_Id=<?php echo $Case_Id;?>";
		
		if(recordNo ==3){
			var InjuredParty_LastName = $(editHidden).find("input[name=InjuredParty_LastName]").val();
			var InjuredParty_FirstName = $(editHidden).find("input[name=InjuredParty_FirstName]").val();
   			x[2].innerHTML = InjuredParty_LastName+", "+InjuredParty_FirstName;
			string += "&InjuredParty_LastName="+InjuredParty_LastName+"&InjuredParty_FirstName="+InjuredParty_FirstName;
		}else if(recordNo ==5){
			var InsuredParty_LastName = $(editHidden).find("input[name=InsuredParty_LastName]").val();
			var InsuredParty_FirstName = $(editHidden).find("input[name=InsuredParty_FirstName]").val();
			x[4].innerHTML = InsuredParty_LastName+", "+InsuredParty_FirstName;
			string += "&InsuredParty_LastName="+InsuredParty_LastName+"&InsuredParty_FirstName="+InsuredParty_FirstName;
		}else{
			if(selectRecordNo !=1){
				var inputName = $(editHidden).find("input").attr("name");
				var inputValue = $(editHidden).find("input[name="+inputName+"]").val();
				console.log("recordNo: "+recordNo+" inputName= "+inputName+" inputValue: "+inputValue);
				//string += "&"+inputName+"="+inputValue;
				string += "&inputName="+inputName+"&inputValue="+inputValue;
				if(recordNo >=22){
					x[recordNo-2].innerHTML = inputValue;
				}else{
					x[recordNo-1].innerHTML = inputValue;
				}
				
			}else{
				var selectId = $(editHidden).find("select").attr("id");
				selectValue = $("#"+selectId+" option:selected").val();
				selectText = $("#"+selectId+" option:selected").text();
				console.log("recordNo:"+recordNo+" selectId:"+selectId+" selectValue:"+selectValue+" selectText:"+selectText);
				if(recordNo == 2 || recordNo ==4){
					//string += "&"+selectId+"="+selectText;
					string += "&inputName="+selectId+"&inputValue="+selectText;
				}else{
					//string += "&"+selectId+"="+selectValue;
					string += "&inputName="+selectId+"&inputValue="+selectValue;
				}
				x[recordNo-1].innerHTML = $("#"+selectId+" option:selected").text();
			}
		}
		
		
		console.log("string= "+string);
		request = $.ajax({
			url:"<?php echo base_url(); ?>search/updateCaseInfo",
			type: "post",
			data: string
		});
		request.done(function (response, textStatus, jqXHR) {
			//console.log("Successssss :"+response);
			callSuccess();
		});
		$(editHidden).css("display", "none");
		$(visible).css("display", "block");
	});
/**************************** EDIT CASE INFO TAB-2 ***********************************************************************/
	$('#example2').dataTable( {
		"ajax": "<?php echo base_url();?>search/getNotes2/<?php echo $Case_Id;?>",
		"iDisplayLength": 10,
    	"aLengthMenu": [5, 10, 20, 25, 50, "All"]
	});
	
/**************************** NOTES TAB-3 ************************************************************************************/
	$(".notesAccidentDate").datepicker().datepicker("setDate", new Date());
	var t = $('#example1').dataTable( {
		"ajax": "<?php echo base_url();?>search/getNotes/<?php echo $Case_Id;?>",
		"iDisplayLength": 5,
    	"aLengthMenu": [5, 10, 20, 25, 50, "All"]
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
					 $('#example2').dataTable().fnAddData( [ notesDescription,"admin",notesAccidentDate,"",notesType,"" ] );
					callSuccess();
					$("#updateProviderInfo").css("display", "none");
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
			},
			error: function(result){ console.log("error"); }
		});
		
	});
/************************************************************************************************************************************/
	
	
/* Bind Case info By CASE_ID clicking Tab-2 */ 
	var x = document.getElementsByClassName("visible");
	var y = document.getElementsByClassName("case-id");
	var y2 = document.getElementsByClassName("old-case-id");
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
					document.getElementById("CaseId-tab-6").innerHTML = results.CaseInfo[$i].Case_Id;
					//y2[0].innerHTML =  results.CaseInfo[$i].Old_Case_Id;
					//document.getElementsByClassName("old-case-id").innerHTML =  results.CaseInfo[$i].Old_Case_Id;
					x[0].innerHTML = results.CaseInfo[$i].Provider_Name;
					document.getElementById("ProviderName-tab-6").innerHTML = results.CaseInfo[$i].Provider_Name;
					x[1].innerHTML = results.CaseInfo[$i].Initial_Status;
					x[2].innerHTML = results.CaseInfo[$i].InjuredParty_LastName +", "+results.CaseInfo[$i].InjuredParty_FirstName ;
					$("input[name=InjuredParty_LastName]").val(results.CaseInfo[$i].InjuredParty_LastName);
					$("input[name=InjuredParty_FirstName]").val(results.CaseInfo[$i].InjuredParty_FirstName);
					document.getElementById("InjuredPartyName-tab-6").innerHTML = results.CaseInfo[$i].InjuredParty_LastName  +" "+results.CaseInfo[$i].InjuredParty_FirstName
					
					x[3].innerHTML = results.CaseInfo[$i].Last_Status;
					x[4].innerHTML = results.CaseInfo[$i].InsuredParty_LastName +", "+results.CaseInfo[$i].InsuredParty_FirstName ;
					$("input[name=InsuredParty_LastName]").val(results.CaseInfo[$i].InsuredParty_LastName);
					$("input[name=InsuredParty_FirstName]").val(results.CaseInfo[$i].InsuredParty_FirstName);
					
					x[5].innerHTML = results.CaseInfo[$i].Ins_Claim_Number;
					$("input[name=Ins_Claim_Number]").val(results.CaseInfo[$i].Ins_Claim_Number);
					
					x[6].innerHTML = results.CaseInfo[$i].Policy_Number;
					$("input[name=Policy_Number]").val(results.CaseInfo[$i].Policy_Number);
					
					x[7].innerHTML = results.CaseInfo[$i].IndexOrAAA_Number;
					$("input[name=IndexOrAAA_Number]").val(results.CaseInfo[$i].IndexOrAAA_Number);
					
					x[8].innerHTML = results.CaseInfo[$i].InsuranceCompany_Name;
					x[9].innerHTML = results.CaseInfo[$i].Defendant_Name;
					
					x[10].innerHTML = results.CaseInfo[$i].Attorney_FileNumber;
					$("input[name=Attorney_FileNumber]").val(results.CaseInfo[$i].Attorney_FileNumber);
					
					x[11].innerHTML = results.CaseInfo[$i].Court_Name;
					
					x[12].innerHTML = results.CaseInfo[$i].Claim_Amount;
					$("input[name=Claim_Amount]").val(results.CaseInfo[$i].Claim_Amount);
					$("#ClaimAmtTab6").val(results.CaseInfo[$i].Claim_Amount);
					$("#PaymentsTab6").val(results.CaseInfo[$i].Paid_Amount);
					var balance = results.CaseInfo[$i].Claim_Amount - results.CaseInfo[$i].Paid_Amount;
					$("#BalanceTab6").val(balance.toFixed(2));
					$("#FltSettlement_AmountTab6").val(results.CaseInfo[$i].FLT_SETTLEMENT_AMOUNT);
					var settlementPercentage = (results.CaseInfo[$i].FLT_SETTLEMENT_AMOUNT * 100)/ balance;
					$("#settlementPercentageTab6").val(settlementPercentage.toFixed(2));
					$("#FltAttorneyFeeTab6").val(results.CaseInfo[$i].FLT_ATTORNEY_FEE);
					$("#FltInterestTab6").val(results.CaseInfo[$i].FLT_INTERATE_RATE);
					$("#FltFillingFeeTab6").val(results.CaseInfo[$i].FLT_FILING_FEE);
					var TotalAmount =  parseFloat(results.CaseInfo[$i].FLT_SETTLEMENT_AMOUNT) + parseFloat(results.CaseInfo[$i].FLT_INTERATE_RATE) + parseFloat(results.CaseInfo[$i].FLT_ATTORNEY_FEE) + parseFloat(results.CaseInfo[$i].FLT_FILING_FEE);
					$("#TotalAmount").val(TotalAmount.toFixed(2));
					
					x[13].innerHTML = results.CaseInfo[$i].Paid_Amount;
					$("input[name=Paid_Amount]").val(results.CaseInfo[$i].Paid_Amount);
					
					x[15].innerHTML = results.CaseInfo[$i].Old_Case_Id;
					$("input[name=Old_Case_Id]").val(results.CaseInfo[$i].Old_Case_Id);
					
					//x[16].innerHTML = results.CaseInfo[$i].Accident_DateNoTimr;
					//$("input[name=Accident_Date]").val(results.CaseInfo[$i].Accident_DateNoTimr);
					
					x[16].innerHTML = results.CaseInfo[$i].Accident_Date;
					$("input[name=Accident_Date]").val(results.CaseInfo[$i].Accident_Date);
					
					x[17].innerHTML = results.CaseInfo[$i].Adjuster_LastName+ ", "+results.CaseInfo[$i].Adjuster_FirstName;
					
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
					
					x[34].innerHTML = results.CaseInfo[$i].stips_signed_and_returned;
					$("input[name=stips_signed_and_returned]").val(results.CaseInfo[$i].stips_signed_and_returned);
					
					x[35].innerHTML = results.CaseInfo[$i].Served_To;
					$("input[name=Served_To]").val(results.CaseInfo[$i].Served_To);
					
					x[36].innerHTML = results.CaseInfo[$i].stips_signed_and_returned_2;
					$("input[name=stips_signed_and_returned_2]").val(results.CaseInfo[$i].stips_signed_and_returned_2);
					
					x[37].innerHTML = results.CaseInfo[$i].Served_On_Time;
					$("input[name=Served_On_Time]").val(results.CaseInfo[$i].Served_On_Time);
					
					x[38].innerHTML = results.CaseInfo[$i].stips_signed_and_returned_3;
					$("input[name=stips_signed_and_returned_3]").val(results.CaseInfo[$i].stips_signed_and_returned_3);
					
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
/*************************************************** EVENT TAB-9 ***************************************************************/
/****GET EVENTS NOTES INFO *********/	
	$('#eventTable').dataTable( {
		"ajax": "<?php echo base_url();?>search/getEvents/<?php echo $Case_Id;?>",
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
	$('#selectAssignUser').on('change', function() {
	  var AssignUser =$("#selectAssignUser option:selected").text();
	  $("input[name=AssignUser]").val(AssignUser);
	});
	$("input[name=EventType]").prop("disabled", true);
	$("input[name=EventStatus]").prop("disabled", true);
	$("input[name=AssignUser]").prop("disabled", true);

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
				// setup some local variables
				var EventIdHidden = $("input[name=EventTypeHidden]").val();
				if(EventIdHidden != ""){
					var $form = $(form);
					// let's select and cache all the fields
					var $inputs = $form.find("input, select, button, textarea");
					// serialize the data in the form
					var serializedData = $form.serialize();
		
					request = $.ajax({
						url:"<?php echo base_url();?>search/updateEventInfo",
						type: "post",
						data: serializedData
					});
		
					// callback handler that will be called on success
					request.done(function (response, textStatus, jqXHR) {
						callSuccess();
					});
				}
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
	$('body').on('focus',".datetimepicker_start", function(){
		$(this).datetimepicker({
			format:'YYYY/MM/DD HH:mm:ss'
		})
	});
	$('body').on('focus',".datetimepicker_only_time", function(){
		$(this).datetimepicker({
			format:'HH:mm:ss'
		});
	});
	
});
	
/**********************************************************************************************************************************/
	
	
</script>
<script>
	$('.dataentry').addClass('active');
	$('.addCaseInfo').addClass('active');
</script>
</body>
</html>