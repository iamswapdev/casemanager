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
<?php foreach($CaseInfo as $row){$Case_AutoId = $row['Case_AutoId']; $Provider_Name = $row['Provider_Name']; $InsuranceCompany_Name1 = $row['InsuranceCompany_Name']; $Status = $row['Status']; $InjuredParty_LastName = $row['InjuredParty_LastName']; $InjuredParty_FirstName = $row['InjuredParty_FirstName']; $Accident_DateNoTimr = $row['Accident_DateNoTimr']; $Ins_Claim_Number = $row['Ins_Claim_Number']; $Claim_Amount = $row['Claim_Amount']; $InsuredParty_LastName = $row['InsuredParty_LastName']; $InsuredParty_FirstName = $row['InsuredParty_FirstName']; $Old_Case_Id = $row['Old_Case_Id']; $Paid_Amount = $row['Paid_Amount']; $Adjuster_LastName = $row['Adjuster_LastName']; $Adjuster_FirstName = $row['Adjuster_FirstName']; $Attorney_Name = $row['Attorney_Name']; $IndexOrAAA_Number = $row['IndexOrAAA_Number']; $Policy_Number = $row['Policy_Number']; $Defendant_Name = $row['Defendant_Name']; $Attorney_FileNumber = $row['Attorney_FileNumber']; $Court_Name = $row['Court_Name']; $DateOfService_Start = $row['DateOfService_Start']; $DateOfService_End = $row['DateOfService_End']; $Date_BillSent = $row['Date_BillSent']; $DenialReasons_Type = $row['DenialReasons_Type']; $Case_Id = $row['Case_Id']; $Case_Id = $row['Case_Id']; $Case_Id = $row['Case_Id']; $Case_Id = $row['Case_Id']; $Case_Id = $row['Case_Id']; $Date_Opened = $row['Date_Opened']; $Date_Bill_Submitted = $row['Date_Bill_Submitted']; $Date_Status_Changed = $row['Date_Status_Changed']; $Date_Summons_Printed = $row['Date_Summons_Printed']; $Date_Index_Number_Purchased = $row['Date_Index_Number_Purchased']; $Date_Summons_Sent_Court = $row['Date_Summons_Sent_Court']; $Served_On_Date = $row['Served_On_Date']; $Served_To = $row['Served_To']; $Served_On_Time = $row['Served_On_Time']; $Date_Afidavit_Filed = $row['Date_Afidavit_Filed']; $Date_Answer_Received = $row['Date_Answer_Received']; $Our_Discovery_Demands = $row['Our_Discovery_Demands']; $Date_Demands_Printed = $row['Date_Demands_Printed']; $Plaintiff_Discovery_Due_Date = $row['Plaintiff_Discovery_Due_Date']; $Date_Disc_Conf_Letter_Printed = $row['Date_Disc_Conf_Letter_Printed']; $Date_Ext_Of_Time = $row['Date_Ext_Of_Time']; $Date_Ext_Of_Time_2 = $row['Date_Ext_Of_Time_2']; $Date_Ext_Of_Time_3 = $row['Date_Ext_Of_Time_3']; $Date_Disc_Conf_Letter_Printed = $row['Date_Disc_Conf_Letter_Printed']; $stips_signed_and_returned = $row['stips_signed_and_returned']; $stips_signed_and_returned_2 = $row['stips_signed_and_returned_2']; $stips_signed_and_returned_3 = $row['stips_signed_and_returned_3']; $Date_Closed = $row['Date_Closed']; $AAA_Conciliation_Date = $row['AAA_Conciliation_Date']; $Arb_Award_Date = $row['Arb_Award_Date']; $Date_Reply_To_Disc_Conf_Letter_Recd = $row['Date_Reply_To_Disc_Conf_Letter_Recd'];}?>

<div class="content animate-panel">

	<div class="row">
		<div class="col-lg-12">
		<div class="hpanel">
			<ul class="nav nav-tabs">
				<li class="active"><a id="tab1" data-toggle="tab" href="#tab-1">Case Information</a></li>
				<li class=""><a id="tab2" data-toggle="tab" href="#tab-2">Extended case info</a></li>
				<li class=""><a id="tab3" data-toggle="tab" href="#tab-3">Notes</a></li>
				<li class=""><a id="tab4" data-toggle="tab" href="#tab-4">Document Manager</a></li>
				<li class=""><a id="tab5" data-toggle="tab" href="#tab-5">Templates</a></li>
				<li class=""><a id="tab6" data-toggle="tab" href="#tab-6">Settlement</a></li>
				<li class=""><a id="tab7" data-toggle="tab" href="#tab-7">New Settlement</a></li>
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
						<div class="form-group form-horizontal col-md-8">
                        <h5 class="h4-title">Workarea Information</h5>
						<div class="table-responsive">
							<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
								<tbody>
								<tr> 
                                	<th><input type="hidden" name="recordNo" value="1"><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>1 PROVIDER</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="providerId" name="providerId"><option selected="selected" value=""></option><?php foreach($Provider_Name1 as $row){?><option value="<?php echo $row['Provider_Id']; ?>"> <?php echo $row['Provider_Name']; ?> </option><?php }?></select></div></td>
                                    <th><input type="hidden" name="recordNo" value="2"><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save fa-save1" style="display:none"></i></th>
									<th>2 CASE STATUS</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="caseStatusId" name="caseStatusId"><option selected="selected" id="caseStatusId" name="caseStatusId" value=""></option><?php foreach($CaseStatus as $row){?><option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option><?php }?></select></div></td>
								</tr>
                                
								<tr>  
                                	<th><input type="hidden" name="recordNo" value="3"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save fa-save1" style="display:none"></i></th>
									<th>3 INJURED NAME</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="InjuredParty_LastName" /><input type="text" class="input-sm" name="InjuredParty_FirstName" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="4"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>4 CURRENT STATUS</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="5"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>5 INSURED NAME</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="InsuredParty_LastName" /><input type="text" class="input-sm" name="InsuredParty_FirstName" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="6"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>6 INS. CLAIM #</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Ins_Claim_Number" /></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="7"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>7 POLICY #</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Policy_Number" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="8"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>8 INDEX / AAA #</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="IndexOrAAA_Number" /></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="9"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>9 INSURANCE COMPANY</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="insuranceCompanyId" name="insuranceCompanyId"><option selected="selected" value=""></option><?php foreach($InsuranceCompany_Name as $row){?><option value="<?php echo $row['InsuranceCompany_Id']; ?>"><?php echo $row['InsuranceCompany_Name'];?></option><?php }?></select></div></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" name="recordNo" value="10"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>10 DEF ATTORNEY NAME</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="11"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>11 DEF ATTORNEY FILE #</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Attorney_FileNumber" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="12"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>12 COURT NAME</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="courtId" name="courtId"><option selected="selected" value=""></option><?php foreach($Court as $row){?><option value="<?php echo $row['Court_Id']; ?>"> <?php echo $row['Court_Name']; ?> </option><?php }?></select></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="13"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>13 CLAIM AMOUNT</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Claim_Amount" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="14"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>14 PAID/BALANCE</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Paid_Amount" /></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="15"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>15 ASSIGN TO WORK DESK</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="caseStatusId" name="caseStatusId"><option selected="selected" value=""></option><?php foreach($CaseStatus as $row){?><option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option><?php }?></select></div></td>
                                    <th><input type="hidden" name="recordNo" value="16"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>16 OLD CASE ID</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Old_Case_Id" /></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="17"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>17 DATE OF ACCIDENT</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><input type="text" class="input-sm" name="Accident_Date" /></div></td>
                                    <th><input type="hidden" name="recordNo" value="18"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>18 ADJUSTER</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="adjusterId" name="adjusterId"><option selected="selected" value=""></option><?php foreach($Adjuster_Name as $row){?><option value="<?php echo $row['Adjuster_Id']; ?>"> <?php echo $row['Adjuster_LastName'].", ".$row['Adjuster_FirstName']; ?> </option><?php }?></select></div></td>
								</tr>
                                
                                <tr> 
                                	<th><input type="hidden" name="recordNo" value="19"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
									<th>19 PLAINTIFF ATTORNEY CO.</th>
									<td><div class="visible" style="display:block;"></div><div class="editHidden" style="display:none;"><select class="form-control input-sm" id="attorneyId" name="attorneyId"><option selected="selected" value=""></option><?php foreach($Plantiff as $row){?><option value="<?php echo $row['Attorney_id']; ?>"> <?php echo $row['Attorney_Name']; ?> </option><?php }?></select></div></td>
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
										<td><input id="dateOfServiceStart" name="dateOfServiceStart" class="form-control input-sm datepicker_recurring_start" value="<?php echo $DateOfService_Start;?>"></td>
										<th><input id="dateOfServiceEnd"  name="dateOfServiceEnd" class="form-control input-sm datepicker_recurring_start" value="<?php echo $DateOfService_End;?>"></th>
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
										<td><input id="dateOfServiceStart" name="dateOfServiceStart" class="form-control input-sm datepicker_recurring_start" value="<?php echo $DateOfService_Start;?>"></td>
										<th><input id="dateOfServiceEnd"  name="dateOfServiceEnd" class="form-control input-sm datepicker_recurring_start" value="<?php echo $DateOfService_End;?>"></th>
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
                                <input type="hidden" name="notesAccidentDate"  class="form-control input-sm datepicker_recurring_start">
                            </div>
						</div>				
                        <div class="form-group form-horizontal col-lg-12">
                        	<label class="col-md-2 control-label">Type</label>
                            <div class="col-md-6 radio">
                                <label><input type="radio" class="horizontal" value="ACTIVITY" id="activity" name="notesType">ACTIVITY</label>
                                <label><input type="radio" class="horizontal" value="CALENDAR" id="calendar" name="notesType">CALENDAR</label>
                                <label><input type="radio" class="horizontal" value="GENERAL" id="general" name="notesType">GENERAL</label>
                                <label><input type="radio" class="horizontal" value="POPUP" id="popup" name="notesType">POPUP</label>
                                <label><input type="radio" class="horizontal" value="PROVIDER" id="provider" name="notesType">PROVIDER</label>
                            </div>
                        </div>
                        <div class="form-group form-horizontal col-lg-12">
                        	<div class="col-md-1"><button type="submit" class="btn btn-primary">Add Notes</button></div>
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
                                <table id="example1" class="table dataTable table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Notes Desc.</th>
                                        <th>Editted By</th>
                                        <th>Date Editted</th>
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
									<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
										<tbody>
										<tr>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>		
											<th>DATE FILE OPENED</th>
											<td>First <div class="visible" style="display:block;"><?php echo $Date_Opened;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>PLAINTIFF DISCOVERY COMPLETED</th>
											<td>First <div class="visible" style="display:block;"><?php echo $Status;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th> 
											<th>DATE OF ACCIDENT</th>
											<td><div class="visible" style="display:block;"><?php echo $Accident_DateNoTimr;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>DATE REPLY TO DISC CONF LETTER Recd</th>
											<td><div class="visible" style="display:block;"><?php echo $Accident_DateNoTimr;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
										</tr>
										<tr> 
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>			
											<th>DATE BILL SUBMITED</th>
											<td><div class="visible" style="display:block;"><?php echo $Date_Bill_Submitted;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>DATE EXT OF TIME 1</th>
											<td><div class="visible" style="display:block;"><?php echo $Date_Ext_Of_Time;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
										</tr>
										<tr> 
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>	 			 
											<th>DATE STATUS CHANGED</th>
											<td><div class="visible" style="display:block;"><?php echo $Policy_Number;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>DATE EXT OF TIME 2</th>
											<td><div class="visible" style="display:block;"><?php echo $Date_Ext_Of_Time_2;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th> 			 
											<th>DATE SUMMONS PRINTED</th>
											<td><div class="visible" style="display:block;"><?php echo $Date_Summons_Printed;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>DATE EXT OF TIME 3</th>
											<td><div class="visible" style="display:block;"><?php echo $Date_Ext_Of_Time_3;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>			
											<th>DATE INDEX NUMBER PURCHASED </th>
											<td><div class="visible" style="display:block;"><?php echo $Date_Index_Number_Purchased;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>DEFENDANT'S DISCOVERY RECEIVED</th>
											<td><div class="visible" style="display:block;"><?php echo $Date_Ext_Of_Time_3;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
										</tr>
										<tr> 
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>			
											<th>DATE SUMMONS SENT TO COURT</th>
											<td><div class="visible" style="display:block;"><?php echo $Date_Summons_Sent_Court;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>DATE DISCOVERY CONF LETTER PRINTED</th>
											<td><div class="visible" style="display:block;"><?php echo $Date_Reply_To_Disc_Conf_Letter_Recd;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th> 			
											<th>DATE SUMMONS SERVED</th>
											<td><div class="visible" style="display:block;"><?php echo $Served_On_Date;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>STIPS SIGNED & RETURNED 1</th>
											<td><div class="visible" style="display:block;"><?php echo $stips_signed_and_returned;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th> 			
											<th>SERVED TO</th>
											<td><div class="visible" style="display:block;"><?php echo $Served_To;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
											<th><i class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>STIPS SIGNED & RETURNED 2</th>
											<td><div class="visible" style="display:block;"><?php echo $stips_signed_and_returned_2;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
										</tr>
										<tr> 
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>			
											<th>SUMMONS SERVE TIME</th>
											<td><div class="visible" style="display:block;"><?php echo $Served_On_Time;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>STIPS SIGNED & RETURNED 3</th>
											<td><div class="visible" style="display:block;"><?php echo $stips_signed_and_returned_3;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th> 	 			
											<th>DATE AFFIDAVIT FILED</th>
											<td><div class="visible" style="display:block;"><?php echo $Date_Afidavit_Filed;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>DATE SUMMONS CLOSED</th>
											<td><div class="visible" style="display:block;"><?php echo $Date_Closed;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th> 	 			
											<th>DATE ANSWER RCVD</th>
											<td><div class="visible" style="display:block;"><?php echo $Date_Answer_Received;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>AAA CONCILIATION DATE</th>
											<td><div class="visible" style="display:block;"><?php echo $AAA_Conciliation_Date;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>			
											<th>OUR DISCOVERY DEMAND</th>
											<td><div class="visible" style="display:block;"><?php echo $Our_Discovery_Demands;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>ARB AWARD DATE</th>
											<td><div class="visible" style="display:block;"><?php echo $Arb_Award_Date;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
										</tr>
										<tr>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>			
											<th>DATE DEMAND PRINTED</th>
											<td><div class="visible" style="display:block;"><?php echo $Date_Demands_Printed;?></div><div class="editHidden" style="display:none;">hiddqwqwqwqwqwwqqwqwqen</div></td>
											<th><input type="hidden" name="recordNo" value="1"><i title="Edit" class="fa fa-edit"></i><i title="Save" class="fa fa-save" style="display:none"></i></th>
											<th>  </th>
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
                                    <input type="hidden" name="notesAccidentDate"  class="form-control input-sm datepicker_recurring_start" value="">
								</div>
							</div>
							<div class="form-group form-horizontal col-lg-12">
								<label class="col-md-2 control-label">Type</label>
								<div class="col-md-6 radio">
									<label><input type="radio" class="horizontal" value="ACTIVITY" id="activity" name="notesType">ACTIVITY</label>
									<label><input type="radio" class="horizontal" value="CALENDAR" id="calendar" name="notesType">CALENDAR</label>
									<label><input type="radio" class="horizontal" value="GENERAL" id="general" name="notesType">GENERAL</label>
									<label><input type="radio" class="horizontal" value="POPUP" id="popup" name="notesType">POPUP</label>
									<label><input type="radio" class="horizontal" value="PROVIDER" id="provider" name="notesType">PROVIDER</label>
								</div>
							</div>
							<div class="form-group form-horizontal col-lg-12">
								<div class="col-md-1"><button type="submit" class="btn btn-primary">Add Notes</button></div>
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
                            <form id="addNotes_form" method="post">
							<div class="form-group form-horizontal col-lg-12">
								<h5 class="h4-title">Notes Details</h5>
									<div class="col-md-12">
										<table id="example2" class="table dataTable table-bordered table-striped">
											<thead>
											<tr>
												<th>Notes Desc.</th>
												<th>Editted By</th>
												<th>Date Editted</th>
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
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-2"><label class="control-label">CLAIM AMOUNT</label> </div>
								<div class="col-md-2"><label class="control-label">PAYMENTS</label> </div>
								<div class="col-md-2"><label class="control-label">BALANCE</label> </div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-2"><input type="text" id="" name="" class="form-control input-sm" ></div> 	 	
								<div class="col-md-2"><input type="text" id="" name="" class="form-control input-sm" ></div>
								<div class="col-md-2"><input type="text" id="" name=""  class="form-control input-sm" ></div>
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
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-2"></div>
								<div class="col-md-1"><label class="control-label col-md-12">INTEREST</label> </div>
								<div class="col-md-1"><input type="text" id="" name=""  class="form-control input-sm" ></div>
								<div class="col-md-1"><input type="text" id="" name=""  class="form-control input-sm" ></div>
								<div class="col-md-1"><label class="control-label col-md-12">START DATE</label> </div>
								<div class="col-md-1"><input type="text" id="" name=""  class="form-control input-sm" ></div>
								<div class="col-md-1"><label class="control-label col-md-12">END DATE</label> </div>
								<div class="col-md-1"><input type="text" id="" name=""  class="form-control input-sm" ></div>
							</div>
							<div class="form-group form-horizontal col-md-12">
								<div class="col-md-5"></div>
								<div class="col-md-2"><button>Calculate compound interest</button></div>
								<div class="col-md-2"><button>Calculate Simple interest</button></div>
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
								<div class="col-md-2"><button>Re-Calculate Amount</button></div>
								<div class="col-md-1"><button>Add Amount</button></div>
								<div class="col-md-1"><button>Reset Values</button></div>
							</div>
                            <div class="form-group form-horizontal col-md-12">
								<label class="col-md-2 control-label">SETTLED TYPE</label>
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
                                	<input type="text" id="" name=""  class="form-control input-sm" >
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Transaction Type</label>
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
                            	<label class="col-md-2 control-label">Transaction Status</label>
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
							<div class="form-group form-horizontal col-md-12">
                            	<h5 class="h4-title">Event Module</h5>
                            	<label class="col-md-2 control-label">User_Id:</label>
                                <div class="col-md-2">
                                	<input type="text" id="" name=""  class="form-control input-sm" >
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Case_Id:</label>
                                <div class="col-md-2">
                                	<input type="text" id="" name=""  class="form-control input-sm" >
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Event Date</label>
                                <div class="col-md-2">
                                	<input id="" name=""  class="form-control input-sm" >
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Event Type</label>
                                <div class="col-md-2">
                                	<input id="" name=""  class="form-control input-sm" >
                                </div>
                                <div class="col-md-4">
                                	<select class="form-control input-sm" id="" name="" required>
										<option selected="selected" value=""></option>
										<?php //foreach($InsuranceCompany_Name as $row){?>
										<option value="<?php //echo $row['InsuranceCompany_Id']; ?>"><?php //echo $row['InsuranceCompany_Name'];?> option</option>
										<?php // }?>
									</select>
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Event Status: </label>
                                <div class="col-md-2">
                                	<input id="" name=""  class="form-control input-sm" >
                                </div>
                                <div class="col-md-4">
                                	<select class="form-control input-sm" id="" name="" required>
										<option selected="selected" value=""></option>
										<?php //foreach($InsuranceCompany_Name as $row){?>
										<option value="<?php //echo $row['InsuranceCompany_Id']; ?>"><?php //echo $row['InsuranceCompany_Name'];?> option</option>
										<?php // }?>
									</select>
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Time</label>
                                <div class="col-md-2">
                                	<input id="" name=""  class="form-control input-sm" >
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Event Notes: </label>
                                <div class="col-md-2">
                                	<textarea rows="3"  id="memo" name="memo" class="form-control" ></textarea>
                                </div>
                            </div>
                            <div class="form-group form-horizontal col-md-12">
                            	<label class="col-md-2 control-label">Assigned To: </label>
                                <div class="col-md-2">
                                	<input id="" name=""  class="form-control input-sm" >
                                </div>
                                <div class="col-md-4">
                                	<select class="form-control input-sm" id="" name="" required>
										<option selected="selected" value=""></option>
										<?php //foreach($InsuranceCompany_Name as $row){?>
										<option value="<?php //echo $row['InsuranceCompany_Id']; ?>"><?php //echo $row['InsuranceCompany_Name'];?> option</option>
										<?php // }?>
									</select>
                                </div>
                            </div>
                            
                            
						</div><!-- End of panel-body tab-panel-->
						</div><!-- End hpanel -->
						</div><!-- End col-lg-12-->
					</div><!-- End row-->
				</div>
			</div>
		
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
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/sweetalert/lib/sweet-alert.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/toastr/build/toastr.min.js"></script>
    <!-- App scripts --> 
    <script src="<?php echo base_url();?>assets/scripts/homer.js"></script> 

<script>
	var str = '/casemanager/search/getNotes/<?php echo $Case_Id;?>';
	console.log("str: "+str);
	var t = $('#example1').dataTable( {
		"ajax": str,
		"iDisplayLength": 5,
    	"aLengthMenu": [5, 10, 20, 25, 50, "All"]
	});
	$('#example2').dataTable( {
		"ajax": str,
		"iDisplayLength": 10,
    	"aLengthMenu": [5, 10, 20, 25, 50, "All"]
	});
	function callSuccess() {
		swal({
			title: "Successfully submitted",
			type: "success"
		});
	}
	
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
	$('body').on('focus',".datepicker_recurring_start", function(){
		$(this).datepicker({
			"autoclose": true,
			"todayHighlight": true,
			"selectOtherMonths": true
		});
	});
	$("#addNotes_form, #addNotes_form2").submit(function(e){
		// setup some local variables
		var notesDescription = $(this).find("textarea").val();
		var notesType = $(this).find('input[name=notesType]:checked').val();
		var notesAccidentDate = $(this).find("input[name=notesAccidentDate]").val();
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
				 $('#example1').dataTable().fnAddData( [ notesDescription,"system",notesAccidentDate,notesType ] );
				callSuccess();
				$("#updateProviderInfo").css("display", "none");
			});
			e.preventDefault();	//STOP default action
	});
	$(".fa-edit").click(function(){
		$(this).parent().find(".fa-save").css("display", "block");
		$(this).css("display", "none");
		console.log("fa-edit");
		var parentTd = $(this).parent();
		var divs = $(parentTd).next().next();
		$(divs).find(".visible").css("display", "none");
		$(divs).find(".editHidden").css("display", "block");
	});
	//var tt = $("#providerId option:selected").text();
	//console.log("tt: "+tt);
	$(".fa-save").click(function(){
		$(this).parent().find(".fa-edit").css("display", "block");
		$(this).css("display", "none");
		
		var recordNo = $(this).parent().find("input[name=recordNo]").val();
		var editHidden = $(this).parent().next().next().find(".editHidden");
		var visible = $(this).parent().next().next().find(".visible");
		
		var x = document.getElementsByClassName("visible");
		if(recordNo == 1){
			x[0].innerHTML = $("#providerId option:selected").text();
		}else if(recordNo ==2){
			x[1].innerHTML = $("#caseStatusId option:selected").text();
		}else if(recordNo ==3){
			var InjuredParty_LastName = $(editHidden).find("input[name=InjuredParty_LastName]").val();
			var InjuredParty_FirstName = $(editHidden).find("input[name=InjuredParty_FirstName]").val();
   			x[2].innerHTML = InjuredParty_LastName+", "+InjuredParty_FirstName;
		}else if(recordNo ==4){
		}else if(recordNo ==5){
			var InsuredParty_LastName = $(editHidden).find("input[name=InsuredParty_LastName]").val();
			var InsuredParty_FirstName = $(editHidden).find("input[name=InsuredParty_FirstName]").val();
			x[4].innerHTML = InsuredParty_LastName+", "+InsuredParty_FirstName;
		}else if(recordNo ==6){
			var Ins_Claim_Number = $(editHidden).find("input[name=Ins_Claim_Number]").val();
			x[5].innerHTML = Ins_Claim_Number;
		}else if(recordNo ==7){
			var Policy_Number = $(editHidden).find("input[name=Policy_Number]").val();
			x[6].innerHTML = Policy_Number;
		}else if(recordNo ==8){
			var IndexOrAAA_Number = $(editHidden).find("input[name=IndexOrAAA_Number]").val();
			x[7].innerHTML = IndexOrAAA_Number;
		}else if(recordNo ==9){
			x[8].innerHTML = $("#insuranceCompanyId option:selected").text();
		}else if(recordNo ==10){
		}else if(recordNo ==11){
			var Attorney_FileNumber = $(editHidden).find("input[name=Attorney_FileNumber]").val();
			x[10].innerHTML = Attorney_FileNumber;
		}else if(recordNo ==12){
			x[11].innerHTML = $("#courtId option:selected").text();
		}else if(recordNo ==13){
			var Claim_Amount = $(editHidden).find("input[name=Claim_Amount]").val();
			x[12].innerHTML = Claim_Amount;
		}else if(recordNo ==14){
			var Paid_Amount = $(editHidden).find("input[name=Paid_Amount]").val();
			x[13].innerHTML = Paid_Amount;
		}else if(recordNo ==15){
		}else if(recordNo ==16){
			var Old_Case_Id = $(editHidden).find("input[name=Old_Case_Id]").val();
			x[15].innerHTML = Old_Case_Id;
		}else if(recordNo ==17){
			var Accident_Date = $(editHidden).find("input[name=Accident_Date]").val();
			x[16].innerHTML = Accident_Date;
		}else if(recordNo ==18){
			x[17].innerHTML = $("#adjusterId option:selected").text();
		}else if(recordNo ==19){
			x[18].innerHTML = $("#attorneyId option:selected").text();
		}
		
		$(editHidden).css("display", "none");
		$(visible).css("display", "block");
	});
	$("inpu[name=notesAccidentDate]").datepicker().datepicker("setDate", new Date());
	
/* Bind Case info By clicking Tab-2 */  /*----------------- Tab-2 ---------------------*/
	var x = document.getElementsByClassName("visible");
		$.ajax({
			type:'POST',
			url:"<?php echo base_url(); ?>search/getCaseInfo/<?php echo $Case_AutoId;?>",
			success:function(data){
				results = JSON.parse(data);
				var optionsAsString = "";
				for($i in results.CaseInfo){
					//optionsAsString += "<option value='" + results.Adjuster_Name[$i].Adjuster_Id + "'>" + results.Adjuster_Name[$i].Adjuster_LastName + " ," + results.Adjuster_Name[$i].Adjuster_FirstName + "</option>";
					console.log("suucess");
					console.log("FFF: "+results.CaseInfo[$i].Claim_Amount); 
					
					x[0].innerHTML = results.CaseInfo[$i].Provider_Name;
					x[2].innerHTML = results.CaseInfo[$i].InjuredParty_LastName +", "+results.CaseInfo[$i].InjuredParty_FirstName ;
					$("input[name=InjuredParty_LastName]").val(results.CaseInfo[$i].InjuredParty_LastName);
					$("input[name=InjuredParty_FirstName]").val(results.CaseInfo[$i].InjuredParty_FirstName);
					x[4].innerHTML = results.CaseInfo[$i].InsuredParty_LastName +", "+results.CaseInfo[$i].InsuredParty_FirstName ;
					$("input[name=InsuredParty_LastName]").val(results.CaseInfo[$i].InsuredParty_LastName);
					$("input[name=InsuredParty_FirstName]").val(results.CaseInfo[$i].InsuredParty_FirstName);
					
					x[5].innerHTML = results.CaseInfo[$i].Ins_Claim_Number;
					$("input[name=Ins_Claim_Number]").val(results.CaseInfo[$i].Ins_Claim_Number);
					
					x[6].innerHTML = results.CaseInfo[$i].Policy_Number;
					$("input[name=Policy_Number]").val(results.CaseInfo[$i].Policy_Number);
					
					x[7].innerHTML = results.CaseInfo[$i].IndexOrAAA_Number;
					$("input[name=IndexOrAAA_Number]").val(results.CaseInfo[$i].IndexOrAAA_Number);
					
					x[0].innerHTML = results.CaseInfo[$i].InsuranceCompany_Name;
					
					x[10].innerHTML = results.CaseInfo[$i].Attorney_FileNumber;
					$("input[name=Attorney_FileNumber]").val(results.CaseInfo[$i].Attorney_FileNumber);
					
					x[11].innerHTML = results.CaseInfo[$i].Court_Name;
					
					x[12].innerHTML = results.CaseInfo[$i].Claim_Amount;
					$("input[name=Claim_Amount]").val(results.CaseInfo[$i].Claim_Amount);
					
					x[13].innerHTML = results.CaseInfo[$i].Paid_Amount;
					$("input[name=Paid_Amount]").val(results.CaseInfo[$i].Paid_Amount);
					
					x[16].innerHTML = results.CaseInfo[$i].Accident_DateNoTimr;
					$("input[name=Accident_Date]").val(results.CaseInfo[$i].Accident_DateNoTimr);
					
					x[17].innerHTML = results.CaseInfo[$i].Adjuster_LastName+ ", "+results.CaseInfo[$i].Adjuster_FirstName;
					
					x[18].innerHTML = results.CaseInfo[$i].Attorney_Name;
				}
				
			},
			error: function(result){ console.log("error"); }
		
		});
/* *************************************************** */
	
	
</script>
<script>
	$('.dataentry').addClass('active');
	$('.addCaseInfo').addClass('active');
</script>
</body>
</html>