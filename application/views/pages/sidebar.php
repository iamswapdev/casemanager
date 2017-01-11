<?php
	$Admin = false;$AdminPrivilege = false;$Search = false;$Master = false;$Dataentry = false;$WorkArea = false;$DataentryWorkarea = false;$FileInsert = false;$WorkFlowReport = false;$Calendar = false;$Workdesk_M = false;$Workdesk_S = false;$Financials_M = false;$Financials_S = false;$Reports = false;$RapidFunds = false;$Contacts = false;
	
	foreach($Assigned_Menus as $row){
		if($row['MenuId'] == 1){ $Admin = true; } if($row['MenuId'] == 8){ $AdminPrivilege = true; } if($row['MenuId'] == 3){ $Search = true; }
		if($row['MenuId'] == 2){ $Master = true; } if($row['MenuId'] == 9){ $Dataentry = true; } if($row['MenuId'] == 4){ $WorkArea = true; }
		if($row['MenuId'] == 12){ $DataentryWorkarea = true; } if($row['MenuId'] == 13){ $FileInsert = true; } if($row['MenuId'] == 14){ $WorkFlowReport = true; }
		if($row['MenuId'] == 15){ $Calendar = true; } if($row['MenuId'] == 5){ $Workdesk_M = true; } if($row['MenuId'] == 20){ $Workdesk_S = true; }
		if($row['MenuId'] == 6){ $Financials_M = true; } if($row['MenuId'] == 16){ $Financials_S = true; } if($row['MenuId'] == 17){ $Reports = true; }
		if($row['MenuId'] == 18){ $RapidFunds = true; } if($row['MenuId'] == 22){ $Contacts = true; }
	}

?>

<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="<?php echo base_url(); ?>search/advancedsearch">
                <img src="<?php echo base_url();?>assets/images/images (1).jpg" class="img-circle m-b" alt="logo">
            </a>

            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase"></span>

                <?php /*?><!--<div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <small class="text-muted">Founder of App <b class="caret"></b></small>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="analytics.html">Analytics</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url();?>admin/destroy">Logout</a></li>
                    </ul>
                </div>--><?php */?>


                <!--<div id="sparkline1" class="small-chart m-t-sm"></div>
                <div>
                    <h4 class="font-extra-bold m-b-xs">
                        $260 104,200
                    </h4>
                    <small class="text-muted">Your income from the last year in sales product X.</small>
                </div>-->
            </div>
        </div>

        <ul class="nav" id="side-menu">
        	<?php if($Admin){?>
            <li class="adminprivilege">
                <a href="#"><span class="nav-label">Admin</span><span class="fa arrow"></span> </a>
                <?php if($AdminPrivilege){?>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url();?>adminprivilege/manageusers">Admin Privileges</a></li>
                </ul>
                <?php  } ?>
            </li>
            <?php  } ?>
            <?php if($Search){?>
            <li class="search">
                <a href="<?php echo base_url();?>search/advancedsearch"><span class="nav-label">Search</span><span class="fa arrow"></span> </a>
            </li>
            <?php  } ?>
            <?php if($Master){?>
            <li class="dataentry">
                <a href="#"><span class="nav-label">Master</span><span class="fa arrow"></span> </a>
                <?php if($Dataentry){?>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url();?>dataentry/addcase">Data Entry</a></li>
                </ul>
                <?php } ?>
            </li>
            <?php  } ?>
            <?php if($WorkArea){?>
             <li class="workarea">
                <a href="#"><span class="nav-label">Work Area</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                	<?php if($DataentryWorkarea){ ?>
                    <li><a href="<?php echo base_url();?>workarea/dataentryworkarea">Data Entry(Case Entry Only)</a></li>
                    <?php } ?>
					<?php if($FileInsert){ ?>
                    <li><a href="<?php echo base_url();?>workarea/fileinsert">File Insert</a></li>
                    <?php } ?>
					<?php if($WorkFlowReport){ ?>
                    <li><a href="<?php echo base_url();?>workarea/workflowreport">WorkFlow Report</a></li>
                    <?php } ?>
					<?php if($Calendar){ ?>
                    <li><a href="<?php echo base_url();?>workarea/calendar">Calendar</a></li>
                	<?php } ?>
                </ul>
            </li>
            <?php  } ?>
            <?php if($Workdesk_M){?>
            <li class="workdesk">
                <a href="#"><span class="nav-label">WorkDesk</span><span class="fa arrow"></span> </a>
                <?php if($Workdesk_S){ ?>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url();?>workdesk/workdesks">WorkDesk</a></li>
                </ul>
                <?php } ?>
            </li>
            <?php  } ?>
            <?php if($Financials_M){ ?>
             <li class="financials">
                <a href="#"><span class="nav-label">Financials</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <?php if($Financials_S){?><li>
                    <a href="<?php echo base_url();?>financials/financial">Financial</a></li>
					<?php  } ?>
                    <?php if($Reports){ ?>
                    <li><a class="view-reports" href="<?php echo base_url();?>financials/reports">Reports</a></li>
                    <?php  } ?>
					<?php if($RapidFunds){?>
                    <li><a href="<?php echo base_url();?>financials/rapidfunds">Rapid Funds</a></li>
					<?php  } ?>
                </ul>
            </li>
            <?php  } ?>
            <?php if($Contacts){?>
             <li>
                	<a href="<?php echo base_url();?>admin/contacts"><span class="nav-label">Contacts</span><span class="fa arrow"></span> </a> 
            </li> 
            <?php  } ?>  
            <li>
                <a href="<?php echo base_url();?>admin/logout"><span class="nav-label">Logoff</span><span class="fa arrow"></span> </a>
            </li>        
      
        </ul>
    </div>
</aside>