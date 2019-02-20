<?php
    $access = $_SESSION['access'];
?>
<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="./"><img src="../icons/iGRLogo.jpeg" style="height: 100px;" align="center"></a></div>
                    <li class="label">Admin Panel</li>
                    <li><a href="./"><i class="ti-home"></i> Home Page </a></li><?php
                    if($access ==1){ ?>
                        <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Manage Staff <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="add-staff.php"><i class="ti-plus"></i>Add Staff</a></li>
                                <li><a href="view-all-staff.php"><i class="ti-list"></i>View Staff</a></li>
                                
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-shield"></i> Local Govt <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href=""><i class="ti-plus"></i>Add Local Govt</a></li>
                                <li><a href=""><i class="ti-list"></i>View Local Govt</a></li>
                                <li><a href=""><i class="ti-list"></i>Manage Local Govt</a></li>
                            </ul>
                        </li>

                        <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Manage Ministry <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href=""><i class="ti-plus"></i>Add Ministry</a></li>
                                <li><a href=""><i class="ti-list"></i>View Minitries</a></li>
                                <li><a href=""><i class="ti-list"></i>Manage Ministry</a></li>
                            </ul>
                        </li>

                        <li><a class="sidebar-sub-toggle"><i class="ti-id-badge"></i> Manage Revenue <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href=""><i class="ti-plus"></i>Add Ministry</a></li>
                                <li><a href=""><i class="ti-list"></i>View All Revenue</a></li>
                                <li><a href=""><i class="ti-list"></i>Group Local Govt</a></li>
                            </ul>
                        </li>

                        <li><a class="sidebar-sub-toggle"><i class="ti-id-badge"></i> Manage Report <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href=""><i class="ti-list"></i>Group By Ministry</a></li>
                                <li><a href=""><i class="ti-list"></i>Group By Local Govt</a></li>
                                <li><a href=""><i class="ti-list"></i>View All Report</a></li>
                            </ul>
                        </li>
                        
                        <li><a href="site-history.php"><i class="ti-cloud-up"></i>Staff Activity Log </a></li><?php
                    }elseif($access ==2){ 
                        
                    }elseif ($access ==3) { 

                    }elseif($access ==4){ 

                    }?>  
                    <li><a href="my-activities-log.php"><i class="ti-cloud-down"></i>My Activity Log </a></li>
                    
                    <li><a href="../log-out.php"><i class="ti-power-off"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <ul>
                            <li class="header-icon dib"><span class="user-avatar"><?php echo $_SESSION['name']; ?> <i class="ti-angle-down f-s-10"></i></span>
                                <div class="drop-down dropdown-profile">
                                    
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li><a href="my-profile.php"><i class="ti-user"></i> <span>Profile</span></a></li>
                                            <li><a href="../log-out.php"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>