<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="<?php echo base_url();?>index">
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
                        <li><a href="<?php echo base_url();?>login_controller/destroy">Logout</a></li>
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
                    <li><a href="<?php echo base_url();?>">Admin Privileges</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">Master</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="panels.html">Data Entry</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">Search</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="panels.html">Search</a></li>
                    <li><a href="panels.html">Advanced Search</a></li>
                </ul>
            </li>
             <li>
                <a href="#"><span class="nav-label">Work Area</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="panels.html">Case Information</a></li>
                    <li><a href="panels.html">Data Entry(Case Entry Only)</a></li>
                    <li><a href="panels.html">File Insert</a></li>
                    <li><a href="panels.html">WorkFlow Report</a></li>
                    <li><a href="panels.html">Calendar</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">WorkDesk</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="panels.html">WorkDesk</a></li>
                </ul>
            </li>
             <li>
                <a href="#"><span class="nav-label">Financials</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="panels.html">Financials</a></li>
                    <li><a href="panels.html">Reports</a></li>
                    <li><a href="panels.html">Rapid Funds</a></li>
                </ul>
            </li>
             <li>
                <a href="<?php echo base_url();?>login_controller/contacts"><span class="nav-label">Contacts</span><span class="fa arrow"></span> </a>
            </li>   
            <li>
                <a href="<?php echo base_url();?>login_controller/logout"><span class="nav-label">Logoff</span><span class="fa arrow"></span> </a>
            </li>        
      
        </ul>
    </div>
</aside>