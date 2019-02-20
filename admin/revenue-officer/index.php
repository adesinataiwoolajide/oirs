<?php
	require '../header.php';
    require '../ict-department/libs_dev/staff/staff_class.php';
    $staffBiodata = new staffBiodataIGR($db);
	require '../side-bar.php';
    require '../ict-department/libs_dev/local-ministry/local_ministry_class.php';
    require '../ict-department/libs_dev/revenue/revenue_class.php';
    $minLocal = new stateMinistry($db);
    $localMin = new localMinistry($db);
    $revSouceing = new sourcesOfRevenue($db);
    $staff_email  = $_SESSION['user_name'];
    $staffDetails = $staffBiodata->seestaff_biodataEmailDetails($staff_email);
    $staff_name = $staffDetails['staff_name'];
    $staff_number = $staffDetails['staff_number'];
    $ministry_id = $staffDetails['ministry_id'];
    $local_govt_id = $staffDetails['local_govt_id'];
    $localDetails = $localMin->gettingLocalGocyIDDetails($local_govt_id);
    //$revDet = $revSouceing->gettingMinistryRevenue($ministry_id);
    $minDetails = $minLocal->gettingMinistryIDDetails($ministry_id);
    $ministry_name = $minDetails['ministry_name'];
    $local_govt_name = $localDetails['local_govt_name'];
?>
<main class="app-content">
    <div class="app-title">
        <div>
	         <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
	         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          	<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          	<li class="breadcrumb-item"><a href="./">Home Page</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
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
        <div class="col-md-12">
            <?php
            if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
                <div class="alert alert-info" align="center">
                    <button class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                 <?php include("../includes/feed-back.php"); ?>
                </div><?php 
            }  ?>
        </div><?php 
        $bank = $db->prepare("SELECT DISTINCT bank_name, sum(total_amount) as new_amount FROM vault WHERE bank_name='Wema Bank' ");
        $bank->execute();
        while($see_bank = $bank->fetch()){ ?>
            <div class="col-md-3" style="margin-bottom: 15px;">
                <div class="card" onclick="location.href='bank-vault.php?bank_name=<?php echo $see_bank['bank_name'] ?>';">
                    <div align="center"><?php 
                        if($see_bank['bank_name'] == "Wema Bank"){ ?>
                            <img src="../icons/wema.png" style="width: 200px; height: 100px;" align="center"><?php
                        }else{ ?>
                            <img src="../icons/FirstBank.png" style="width: 200px; height: 100px;" align="center"><?php     
                        } ?>
                                            
                        <a href="bank-vault.php?bank_name=<?php echo $see_bank['bank_name'] ?>"><p>&#8358;<b><?php echo  number_format($see_bank['new_amount'] )?></b></p> </a>
                    </div>         
                </div>                            
            </div><?php
        } ?>

        <?php 
        $bank = $db->prepare("SELECT DISTINCT bank_name, sum(total_amount) as new_amount FROM vault WHERE bank_name='First Bank' ");
        $bank->execute();
        while($see_bank = $bank->fetch()){ ?>
            <div class="col-md-3" style="margin-bottom: 15px;">
                <div class="card" onclick="location.href='bank-vault.php?bank_name=<?php echo $see_bank['bank_name'] ?>';">
                    <div align="center"><?php 
                        if($see_bank['bank_name'] == "Wema Bank"){ ?>
                            <img src="../icons/wema.png" style="width: 200px; height: 100px;" align="center"><?php
                        }else{ ?>
                            <img src="../icons/FirstBank.png" style="width: 200px; height: 100px;" align="center"><?php     
                        } ?>
                                            
                        <a href="bank-vault.php?bank_name=<?php echo $see_bank['bank_name'] ?>"><p>&#8358;<b><?php echo  number_format($see_bank['new_amount'] )?></b></p> </a>
                    </div>         
                </div>                            
            </div><?php
        } ?>

        <?php 
        $bank = $db->prepare("SELECT sum(total_amount) as new_amount FROM vault ");
        $bank->execute();
        while($see_bank = $bank->fetch()){ ?>
            <div class="col-md-3" style="margin-bottom: 15px;">
                <div class="card" onclick="location.href='view-bank-vault.php">
                    <div align="center">
                        <img src="../icons/vault.png" style="width: 150px; height: 100px;" align="center">   
                                            
                        <a href="view-bank-vault.php"><p>&#8358;<b><?php echo  number_format($see_bank['new_amount'] )?></b></p> </a>
                    </div>         
                </div>                            
            </div><?php
        } ?>
        <div class="col-md-3" style="margin-bottom: 15px;">
            <div class="card" onclick="location.href='view-all-ministries.php';">
                <div align="center">
                    <img src="../icons/brand.jpg" style="width: 100px; height: 100px;" align="center">                    
                    <p><b>Manage Ministry</b></p> 
                </div>         
            </div>                            
        </div>
        <div class="col-md-3" style="margin-bottom: 15px;">
            <div class="card" onclick="location.href='view-all-revenue-source.php';">
                <div align="center">
                    <img src="../icons/source.png" style="width: 100px; height: 100px;" align="center">                    
                    <p><b>Revenue Source</b></p> 
                </div>         
            </div>                            
        </div>

        <div class="col-md-3" style="margin-bottom: 15px;">
            <div class="card" onclick="location.href='daily-report.php';">
                <div align="center">
                    <img src="../icons/daily.png" style="width: 100px; height: 100px;" align="center">                    
                    <p><b>Daily Report</b></p> 
                </div>         
            </div>                            
        </div>

        <div class="col-md-3" style="margin-bottom: 15px;">
            <div class="card" onclick="location.href='monthly-report.php';">
                <div align="center">
                    <img src="../icons/monthly.jpg" style="width: 100px; height: 100px;" align="center">                    
                    <p><b>Monthly Report</b></p> 
                </div>         
            </div>                            
        </div>

        <div class="col-md-3" style="margin-bottom: 15px;">
            <div class="card" onclick="location.href='yearly-report.php';">
                <div align="center">
                    <img src="../icons/yearly.png" style="width: 100px; height: 100px;" align="center">                    
                    <p><b>Yearly Report</b></p> 
                </div>         
            </div>                            
        </div>
        <div class="col-md-3" style="margin-bottom: 15px;">
            <div class="card" onclick="location.href='bank-revenue-chart.php';">
                <div align="center">
                    <img src="../icons/chart.png" style="width: 150px; height: 100px;" align="center">                    
                    <p><b>IGR Chart</b></p> 
                </div>         
            </div>                            
        </div>
        <div class="col-md-3" style="margin-bottom: 15px;">
            <div class="card" onclick="location.href='my-details.php?staff_number=<?php echo $staff_number ?>';">
                <div align="center">
                    <img src="<?php echo '../ict-department/staff-passport/'.$staffDetails['staff_passport']; ?>" style="width: 100px; height: 100px;" align="center">                    
                    <p><b>My Details</b></p> 
                </div>         
            </div>                            
        </div>

        <div class="col-md-3" style="margin-bottom: 15px;">
            <div class="card" onclick="location.href='view-all-revenue.php';">
                <div align="center">
                    <img src="<?php echo '../ict-department/staff-passport/'.$staffDetails['staff_passport']; ?>" style="width: 100px; height: 100px;" align="center">                    
                    <p><b>Manage Revenue</b></p> 
                </div>         
            </div>                            
        </div>
        <div class="col-md-3" style="margin-bottom: 15px;">
            <div class="card" onclick="location.href='my-activities-log.php';">
                <div align="center">
                    <img src="../icons/images (211).png" style="width: 100px; height: 100px;" align="center">                    
                    <p><b>My Activities Log</b></p> 
                </div>         
            </div>                            
        </div>
        
     </div>
</main>
<?php
	require '../footer.php';
?>