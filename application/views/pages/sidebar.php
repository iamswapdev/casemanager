<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="<?php echo base_url();?>admin/dashboard">
                <img src="<?php echo base_url();?>assets/images/profile.jpg" class="img-circle m-b" alt="logo">
            </a>

            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">Robert Razer</span>

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
            <li>
                <a href="#"><span class="nav-label">Admin</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url();?>adminprivilege">Admin Privileges</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">Search</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url();?>admin/search">Search</a></li>
                    <li><a href="<?php echo base_url();?>admin/advancedsearch">Advanced Search</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">Master</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url();?>admin/dataentry">Data Entry</a></li>
                </ul>
            </li>
             <li>
                <a href="#"><span class="nav-label">Work Area</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url();?>admin/caseinformation">Case Information</a></li>
                    <li><a href="<?php echo base_url();?>admin/dataentry_workarea">Data Entry(Case Entry Only)</a></li>
                    <li><a href="<?php echo base_url();?>admin/fileinsert">File Insert</a></li>
                    <li><a href="<?php echo base_url();?>admin/workflowreport">WorkFlow Report</a></li>
                    <li><a href="<?php echo base_url();?>admin/calendar">Calendar</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">WorkDesk</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url();?>admin/workdesk">WorkDesk</a></li>
                </ul>
            </li>
             <li>
                <a href="#"><span class="nav-label">Financials</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url();?>admin/financials">Financials</a></li>
                    <li><a href="<?php echo base_url();?>admin/reports">Reports</a></li>
                    <li><a href="<?php echo base_url();?>admin/rapidfunds">Rapid Funds</a></li>
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