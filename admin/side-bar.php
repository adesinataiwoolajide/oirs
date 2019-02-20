<?php  
    $staff_email = $_SESSION['user_name'];
    $staffDetails = $staffBiodata->seestaff_biodataEmailDetails($staff_email);
    $staff_name = $_SESSION['name'];
    $staff_number = $staffDetails['staff_number'];
    $access = $_SESSION['access'];
?>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user" align="center"><img src="<?php echo '../ict-department/staff-passport/'.$staffDetails['staff_passport']; ?>" align="" style="height:100px; width: 100px; margin-left: 50px;">
            <p></p>
        </div>

        <ul class="app-menu">
            <li><a class="app-menu__item active" href="./"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Home Page</span></a></li><?php
            if($access ==1){ ?>
                <li class="treeview"><a class="app-menu__item" href="" data-toggle="treeview"><i class="app-menu__icon fa fa-users">  </i> <span class="app-menu__label"> Manage Staff</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add-staff-biodata.php"><i class="fa fa-plus"></i> Add Staff</a></li>
                        <li><a class="treeview-item" href="view-all-staffs.php"><i class="fa fa-list"></i> View Staff</a></li>
                        <li><a class="treeview-item" href=""><i class="fa fa-list"></i> Group by Ministry</a></li>
                    </ul>
                </li>
                <li class="treeview"><a class="app-menu__item" href="" data-toggle="treeview"><i class="app-menu__icon fa fa-building">    </i> <span class="app-menu__label"> Manage Ministry</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add-ministry.php"><i class="fa fa-plus"></i>  Add Ministry</a></li>
                        <li><a class="treeview-item" href="view-all-ministries.php"><i class="fa fa-list"></i>  View Ministries</a></li>
                    </ul>
                </li>
                
                <li class="treeview"><a class="app-menu__item" href="" data-toggle="treeview"><i class="app-menu__icon fa fa-sitemap">    </i> <span class="app-menu__label"> Revenue Source</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add-revenue-source.php"><i class="fa fa-plus"></i> Add Revenue Source</a></li>
                        <li><a class="treeview-item" href="view-all-revenue-source.php"><i class="fa fa-list"></i> View All Source</a></li>
                    </ul>
                </li>
                <li class="treeview"><a class="app-menu__item" href="" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop">    </i> <span class="app-menu__label"> Manage Revenue</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                       
                        <li><a class="treeview-item" href="group-ministries.php"><i class="fa fa-list"></i>  Group By Ministry</a></li>
                        <li><a class="treeview-item" href="view-all-revenue.php"><i class="fa fa-list"></i>  View All</a></li>
                    </ul>
                </li>
                <li class="treeview"><a class="app-menu__item" href="" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop">    </i> <span class="app-menu__label"> Revenue Chart</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                       
                        <li><a class="treeview-item" href="bank-revenue-chart.php"><i class="fa fa-plus"></i> Bank Chart</a></li>
                    </ul>
                </li>
                <li class="treeview"><a class="app-menu__item" href="" data-toggle="treeview"><i class="app-menu__icon fa fa-calendar">    </i> <span class="app-menu__label"> Manage Report</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="daily-report.php"><i class="fa fa-calendar"></i>  Daily Report</a></li>
                        <li><a class="treeview-item" href="monthly-report.php"><i class="fa fa-calendar"></i>  Monthly Report</a></li>
                        <li><a class="treeview-item" href="yearly-report.php"><i class="fa fa-calendar"></i>  Yearly Report</a></li>
                        <li><a class="treeview-item" href="yearly-report.php"><i class="fa fa-calendar"></i>  View All Report</a></li>
                    </ul>
                </li>
                
                <li><a class="treeview-item" href="staff-activities-log.php"><i class="icon fa fa-cloud"></i> Staff Activities</a></li><?php
            }elseif($access ==2){ ?>
                <li class="treeview"><a class="app-menu__item" href="" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop">    </i> <span class="app-menu__label"> Manage Staff</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add-staff.php"><i class="fa fa-plus"></i> Add Staff</a></li>
                        <li><a class="treeview-item" href="view-all-staff.php"><i class="fa fa-list"></i> View Staff</a></li>
                    </ul>
                </li>
                <li class="treeview"><a class="app-menu__item" href="" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop">    </i> <span class="app-menu__label"> Manage Revenue</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add-revenue.php"><i class="fa fa-plus"></i> Add Revenue</a></li>
                        <li><a class="treeview-item" href="view-all-revenue.php"><i class="fa fa-plus"></i> View All Revenue</a></li>
                        <li><a class="treeview-item" href="view-local-govt-revenue.php"><i class="fa fa-plus"></i> Local Govt Revenue</a></li>
                    </ul>
                </li>
                <li class="treeview"><a class="app-menu__item" href="" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop">    </i> <span class="app-menu__label"> Manage Report</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href=""><i class="fa fa-plus"></i> Daily Report</a></li>
                        <li><a class="treeview-item" href=""><i class="fa fa-list"></i>  Monthly Report</a></li>
                        <li><a class="treeview-item" href=""><i class="fa fa-list"></i>  Yearly Report</a></li>
                    </ul>
                </li>
                <?php
                       
            }elseif ($access ==3) { ?>

                <li class="treeview"><a class="app-menu__item" href="" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop">    </i> <span class="app-menu__label"> Manage Revenue</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><i class="fa fa-plus"></i><a class="treeview-item" href="add-revenue.php"> Add Revenue</a></li>
                        <li><i class="fa fa-list"></i><a class="treeview-item" href="view-all-revenue.php"> View All Revenue</a></li>
                        
                    </ul>
                </li>
                <li class="treeview"><a class="app-menu__item" href="" data-toggle="treeview"><i class="app-menu__icon fa fa-book"></i> <span class="app-menu__label"> Manage Report</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><i class="fa fa-ist"></i><a class="treeview-item" href="daily-report.php">Daily Report</a></li>
                        <li><i class="fa fa-list"></i><a class="treeview-item" href="monthly-report.php">Monthly Report</a></li>
                        <li><i class="fa fa-list"></i><a class="treeview-item" href="yearly-report.php"> Yearly Report</a></li>
                        <li><i class="fa fa-list"></i><a class="treeview-item" href="view-all-revenue.php">View All Report</a></li>
                    </ul>
                </li>
                
                <li class="treeview"><a class="app-menu__item" href="" data-toggle="treeview"><i class="app-menu__icon fa fa-list">    </i> <span class="app-menu__label"> Revenue Chart</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="bank-revenue-chart.php"><i class="fa fa-plus"></i> Bank Chart</a></li>
                    </ul>
                </li>
                <li><a class="treeview-item" href="view-all-ministries.php"><i class="app-menu__icon fa fa-building"></i> <span class="app-menu__label"> MMinistries</span> </a></li><?php

            }else{ ?>
                <li><a class="treeview-item" href="../log-out.php"><i class="icon fa fa-lock"></i> Log Out</a></li><?php
            } ?>  

            <li><a class="treeview-item" href="my-details.php?staff_number=<?php echo $staff_number ?>"><i class="icon fa fa-user"></i> <span> My Details</span> </a></li>
            
            <li><a class="treeview-item" href="my-activities-log.php"><i class="icon fa fa-cloud"></i> <span> My Activities Log</span></a></li>
            <li><a class="treeview-item" href="../log-out.php"> <i class="icon fa fa-lock"></i> Log Out</a></li></a></li>
         </ul>
    </aside>