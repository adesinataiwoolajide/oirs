<?php
	require '../header.php';
    require '../ict-department/libs_dev/staff/staff_class.php';
    $staffBiodata = new staffBiodataIGR($db);
	require '../side-bar.php';
    //require 'libs_dev/staff/staff_class.php';
    require '../ict-department/libs_dev/local-ministry/local_ministry_class.php';
    require '../ict-department/libs_dev/revenue/revenue_class.php';
    $minLocal = new stateMinistry($db);
    $localMin = new localMinistry($db);
    $revSouceing = new sourcesOfRevenue($db);
   // $staffBiodata = new staffBiodataIGR($db);
    $staff_email  = $_SESSION['user_name'];
?>
<main class="app-content">
    <div class="app-title">
        <div>
	         <div>
                <h1 style="color: green"><i class="fa fa-building"></i> <?php echo $bank_name ?> Internal Revenue Vault</h1>
                <p style="color: blue"></p>
            </div>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            
            <li class="breadcrumb-item"><a href="view-bank-vault.php?bank_name=<?php echo $bank_name ?>"><i class="fa fa-cloud"></i> View All IGR Vault </a></li>
            
          	<li class="breadcrumb-item"><a href="./"><i class="fa fa-dashboard"></i> Home Page</a></li>
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
            
            <div class="row">

                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="tile-body"><?php
                                $vault = $db->prepare("SELECT * FROM vault ORDER BY vault_id DESC ");
                                //$arrAct = array(':bank_name'=>$bank_name);
                                $vault->execute();
                                if($vault->rowCount()==0){  ?>
                                    <p style="color: red" align="center">The IGR Vault is Empty</p><?php
                                }else{?>
                                    <table class="table table-hover table-bordered" id="sampleTable">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Bank Name</th>
                                                <th>Total Amount</th>
                                                <th>Purpose</th>
                                                <th>Time of Operation</th>
                                            </tr>
                                        </thead>
                                         <tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Bank Name</th>
                                                <th>Total Amount</th>
                                                <th>Purpose</th>
                                                <th>Time of Operation</th>
                                            </tr>
                                        </tfoot>
                                        <tbody><?php
                                            $num =1;
                                            while($see_vault = $vault->fetch()){ ?>
                                                <tr>
                                                    <td><?php echo $num; ?></td>
                                                    <td><?php echo $see_vault['bank_name']; ?></td>
                                                    <td>&#8358;<?php echo number_format($see_vault['total_amount']); ?></td>
                                                    <td><?php $source_id = $see_vault['source_id'];
                                                        $sourceDetails = $revSouceing->seeRevenueourceID($source_id);
                                                        echo $sourceDetails['source_name'] ?></td>
                                                    <td class="color-primary"><?php echo $see_vault['time_added']; ?></td>
                                                </tr><?php
                                                $num++;
                                            } ?>
                                            
                                        </tbody>
                                    </table><?php
                                } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?php require '../table-footer.php'; require '../alert.php'; ?>