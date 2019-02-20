<?php
	include("../header.php");
	include("../side-bar.php");
?>
<div class="content-wrap">
<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 p-r-0 title-margin-right">
                <div class="page-header">
                    <div class="page-title">
                        <h1>Hello, <?php echo $_SESSION['name']; ?> Welcome To The Super Admin Panel
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <?php
                if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
                    <div class="alert alert-info" align="center">
                        <button class="close" data-dismiss="alert">
                            <i class="ace-icon fa fa-times"></i>
                        </button>
                     <?php include("../includes/feed-back.php"); ?>
                    </div><?php 
                }  ?>
            </div>
            <p>
                <li class="breadcrumb-item">
                    <a href="./">
                        <i class="ti-pencil-alt"></i> <b> Home Page </b>
                    </a>
                </li>
            </p>
            
        </div>
        <!-- /# row -->
        <section id="main-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text"> Numbers of Local Govt</div><?php
                                 $stu1= $db->prepare("SELECT count(local_govt_id) as total_act FROM local_govt ");
                                $stu1->execute();
                               
                               while($roe1 = $stu1->fetch()){ 
                                $hiss1 = $roe1['total_act']; ?>
                                    <div class="stat-digit"><?php echo $hiss1; ?></div><?php
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text"> Numbers of Ministry</div><?php
                                 $stu1= $db->prepare("SELECT count(ministry_id) as total_act FROM ministry ");
                                $stu1->execute();
                               
                               while($roe1 = $stu1->fetch()){ 
                                $hiss1 = $roe1['total_act']; ?>
                                    <div class="stat-digit"><?php echo $hiss1; ?></div><?php
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text"> Numbers of Local Govt</div><?php
                                 $stu1= $db->prepare("SELECT count(local_govt_id) as total_act FROM local_govt ");
                                $stu1->execute();
                               
                               while($roe1 = $stu1->fetch()){ 
                                $hiss1 = $roe1['total_act']; ?>
                                    <div class="stat-digit"><?php echo $hiss1; ?></div><?php
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text"> Numbers of Ministry</div><?php
                                 $stu1= $db->prepare("SELECT count(ministry_id) as total_act FROM ministry ");
                                $stu1->execute();
                               
                               while($roe1 = $stu1->fetch()){ 
                                $hiss1 = $roe1['total_act']; ?>
                                    <div class="stat-digit"><?php echo $hiss1; ?></div><?php
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">

                    <div class="card" onclick="location.href='view-all-staff.php';">
                        <div align="center">
                            <img src="../icons/staff.jpg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Hospital Staff</p>
                        </div>         
                    </div>                            
                </div>

                <div class="col-md-3">
                    <div class="card" onclick="location.href='view-all-wards.php';">
                        <div align="center">
                            <img src="../icons/unit.jpeg" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Hospital Ward</p>
                        </div>         
                    </div>                            
                </div>

                <div class="col-md-3">
                    <div class="card" onclick="location.href='view-staff-transfer.php';">
                        <div align="center">
                            <img src="../icons/transfer.png" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Staff Transfer</p>
                        </div>         
                    </div>                            
                </div>

                <div class="col-md-3">
                    <div class="card" onclick="location.href='view-staff-transfer.php';">
                        <div align="center">
                            <img src="../icons/transfer.png" style="width: 100px; height: 100px;" align="center">                    
                            <p align="center">Staff Transfer</p>
                        </div>         
                    </div>                            
                </div>

               
                

                <div class="col-lg-3" onclick="location.href='';">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Referral</div>
                                <div class="stat-digit">2,781</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" onclick="location.href='';">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Referral</div>
                                <div class="stat-digit">2,781</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" onclick="location.href='';">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Referral</div>
                                <div class="stat-digit">2,781</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" onclick="location.href='';">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Referral</div>
                                <div class="stat-digit">2,781</div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    </div>
<?php

	include("../footer.php");
?>