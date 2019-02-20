<?php
    require '../header.php';
    require 'libs_dev/staff/staff_class.php';
    $staffBiodata = new staffBiodataIGR($db);
    require '../side-bar.php';
    require '../ict-department/libs_dev/local-ministry/local_ministry_class.php';
    require '../ict-department/libs_dev/revenue/revenue_class.php';
    $minLocal = new stateMinistry($db);
    $localMin = new localMinistry($db);
    $revSouceing = new sourcesOfRevenue($db);
    $staff_email  = $_SESSION['user_name'];
    $ministry_code = $_GET['ministry_code'];
    $ministry_id = $_GET['ministry_id'];

    $minDetails = $minLocal->gettingMinistryIDDetails($ministry_id);
    $ministry_name = $minDetails['ministry_name'];

    $check = $db->prepare("SELECT * FROM source_revenue WHERE ministry_id=:ministry_id");
    $arrCheck = array(':ministry_id'=>$ministry_id);
    $check->execute($arrCheck); ?>
    
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1 style="color: green"><i class="fa fa-th-list"></i> State of Osun Ministry IGR</h1>
                <p style="color: blue"><?php echo $ministry_name ?> INTERNAL GENERATED REVENUE</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="view-ministries-revenue.php?ministry_code=<?php echo $ministry_code ?>&&ministry_id=<?php echo $ministry_id ?>"><i class="fa fa-list"></i> <?php echo $ministry_name. " IGR" ?></a></li>
                <li class="breadcrumb-item active"><a href="group-ministries.php"><i class="fa fa-list"></i> Group Minsitries </a></li>
                
                <li class="breadcrumb-item active"><a href="view-all-revenue.php"><i class="fa fa-list"></i> View All Revenue </a></li>
                <li class="breadcrumb-item"><a href="./"><i class="fa fa-dashboard"></i> Home Page</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
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
                <div class="tile">
                    <div class="tile-body">
                        <div align="center">
                            <h1 style="color: green"><i class="fa fa-th-list"></i> State of Osun Ministry IGR</h1>
                            <p style="color: blue"><?php echo $ministry_name ?> INTERNAL GENERATED REVENUE </p>
                        </div> <?php
                        if($check->rowCount() == 0){
                            $_SESSION['error'] = "NO REVENUE SOURCE WAS ALLOCATED TO $ministry_name<BR> PLEASE ADD REVENUE SOURCE FOR THE MINISTRY"; ?>
                            <script>
                                window.location=("group-ministries.php");
                            </script><?php
                            
                        }else{ 
                            while($see_details = $check->fetch()){
                                $source_id = $see_details['source_id']; 
                                $min = $db->prepare("SELECT * FROM state_revenue WHERE source_id=:source_id");
                                $arrSo = array(':source_id'=>$source_id);
                                $min->execute($arrSo);
                                if($min->rowCount()==0){ 
                                    $_SESSION['error']="$ministry_name INTERNAL GENERATED REVENUE LIST IS EMPTY";?> 
                                    <script>
                                        window.location=("group-ministries.php");
                                    </script><?php
                                }else{ ?>
                                    
                                    <table class="table table-hover table-bordered" id="sampleTable">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Source Name</th>
                                                <th>Bank Name</th>
                                                <th>Bank Branch</th>
                                                <th>Amount</th>
                                                <th>Receipt Number</th>
                                                <th>Payer Name</th>
                                                <th>Payer Phone</th>
                                                <th>Payer Addres</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Source Name</th>
                                                <th>Bank Name</th>
                                                <th>Bank Branch</th>
                                                <th>Amount</th>
                                                <th>Receipt Number</th>
                                                <th>Payer Name</th>
                                                <th>Payer Phone</th>
                                                <th>Payer Addres</th>
                                            </tr>
                                        </tfoot>
                                        <tbody><?php
                                            $y=1;
                                            while($see_ministry = $min->fetch()){
                                                $staff_number = $see_ministry['staff_number'];
                                                $source_id = $see_ministry['source_id'];
                                                $sourceDetails = $revSouceing->seeRevenueourceID($source_id);
                                                $ministry_id = $sourceDetails['ministry_id'];
                                                $local_govt_id = $see_ministry['local_govt_id'];
                                                $localDetails = $localMin->gettingLocalGocyIDDetails($local_govt_id);
                                                $local_govt_name = $localDetails['local_govt_name'];
                                                $local_govt_code = $localDetails['local_govt_code'];
                                                 ?>
                                                <tr>
                                                    <td><?php echo $y ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?php echo $revenue_source_name= $sourceDetails['source_name']; ?></td>
                                                    
                                                    <td><?php echo "#".$sourceDetails['revenue_amount']; ?></td>
                                                    <td><?php echo $see_ministry['reciept_number']; ?></td>
                                                    <td><?php echo $see_ministry['payer_name']; ?></td>
                                                    <td><?php echo $see_ministry['payer_phone']; ?></td>
                                                    <td><?php echo $see_ministry['payer_address']; ?></td>
                                                </tr><?php
                                                $y++;
                                            } ?>
                                        </tbody>
                                    </table>
                                    <?php
                                }
                            }
                        } ?>
                    </div>
                    <div class="row d-print-none mt-2">
                                        <div class="col-12 text-right">
                                            <a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print Revenue List</a>
                                        </div>
                                    </div>
                </div>
            </div>
        </div>
    </main><?php 
require '../table-footer.php'; 
require '../alert.php'; 
?>