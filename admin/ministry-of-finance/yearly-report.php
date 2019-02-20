<?php
    require '../header.php';
    require 'libs_dev/staff/staff_class.php';
    $staffBiodata = new staffBiodataIGR($db);
    $staff_email = $_SESSION['user_name'];
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
            <h1 style="color: green"><i class="fa fa-th-list"></i> State of Osun Revenue Report</h1>
            <p style="color: blue"></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="daily-report.php"><i class="fa fa-calendar"></i> Daily Report  </a></li>
            <li class="breadcrumb-item active"><a href="monthly-report.php"><i class="fa fa-calendar"></i> Monthly Report  </a></li>
            <li class="breadcrumb-item active"><a href="yearly-report.php"><i class="fa fa-calendar"></i> Yearly Report  </a></li>
            <li class="breadcrumb-item active"><a href="view-all-revenue.php"><i class="fa fa-calendar"></i> View All Revenue  </a></li>
            
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
                <div class="tile-body"><?php
                    $year = date("Y");
                    $min = $db->prepare("SELECT * FROM state_revenue WHERE year=:year ORDER BY revenue_id desc");
                    $arrMin = array(':year'=>$year);
                    $min->execute($arrMin);
                    if($min->rowCount()==0){ ?>
                        <h5><p style="color: red"  align="center">The Revenue Report For Year <?php echo date("Y") ?> is Empty</p></h5><?php
                    }else{ ?>
                        <div align="center">
                            <h1 style="color: green"><i class="fa fa-th-list"></i> State of Osun Revenue  Report</h1>
                            <p style="color: blue">OSUN STATE REVENUE REPORT FOR <?php echo date("Y"); ?></p>
                        </div>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Source Name</th>
                                    <th>Amount</th>
                                    <th>Receipt Number</th>
                                    <th>Payer Name</th>
                                    <th>Payer Phone</th>
                                    <th>Payer Addres</th>
                                    <th>Time Paid</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Source Name</th>
                                    <th>Amount</th>
                                    <th>Receipt Number</th>
                                    <th>Payer Name</th>
                                    <th>Payer Phone</th>
                                    <th>Payer Addres</th>
                                    <th>Time Paid</th>
                                </tr>
                            </tfoot>
                            <tbody><?php
                                $y=1;
                                
                                while($see_report = $min->fetch()){ 
                                    $staff_number = $see_report['staff_number'];
                                    $source_id = $see_report['source_id'];
                                    $local_govt_id = $see_report['local_govt_id'];
                                    $localDetails = $localMin->gettingLocalGocyIDDetails($local_govt_id);
                                    $sourceDetails = $revSouceing->seeRevenueourceID($source_id);
                                    $ministry_id = $sourceDetails['ministry_id'];
                                    $minDetails = $minLocal->gettingMinistryIDDetails($ministry_id);
                                    $local_govt_code = $localDetails['local_govt_code'];
                                    // $ministry_name = $minDetails['ministry_name'];
                                    //$revenue_source_id = $see_ministry['source_id']; ?>
                                    <tr>
                                        <td><?php echo $y ?>
                                            
                                        </td>
                                        <td><?php echo $revenue_source_name= $sourceDetails['source_name']; ?></td>
                                        <td>&#8358;<?php echo number_format($sourceDetails['revenue_amount'])?></td>
                                        <td><?php echo $see_report['reciept_number']; ?></td>
                                        <td><?php echo $see_report['payer_name']; ?></td>
                                        <td><?php echo $see_report['payer_phone']; ?></td>
                                        <td><?php echo $see_report['payer_address']; ?></td>
                                        <td><?php echo $see_report['time_added']; ?></td>
                                    </tr><?php
                                    $y++;
                                }
                                 ?>
                            </tbody>
                        </table>
                        <div class="row d-print-none mt-2">
                            <div class="col-12 text-right">
                                <a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print Revenue Report</a>
                            </div>
                        </div><?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</main>
 
<?php 
require '../table-footer.php'; 
require '../alert.php'; ?>