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
            <h1 style="color: green"><i class="fa fa-th-list"></i> State of Osun Revenue Source List</h1>
            <p style="color: blue"><?php echo $local_govt_name ?> CITIZEN REVENUE FORM</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="view-all-revenue.php"><i class="fa fa-list"></i> View All Revenue Source </a></li>
            <li class="breadcrumb-item active"><a href="add-revenue.php"><i class="fa fa-plus"></i> Add Revenue Source</a></li>
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
                    $min = $db->prepare("SELECT * FROM state_revenue ORDER BY source_id ASC");
                    $min->execute();
                    if($min->rowCount()==0){ ?>
                        <h5><p style="color: red"  align="center">The Revenue Source List is Empty, Please Click on Add Revenue Source To Add Revenue To The Minsitry Revenue List</p></h5><?php
                    }else{ ?>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Source Name</th>
                                    <th>Local Govt Code</th>
                                    <th>Amount</th>
                                    <th>Receipt Number</th>
                                    <th>Payer Name</th>
                                    <th>Payer Phone</th>
                                    <th>Payer Addres</th>
                                    <th>OPT</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Source Name</th>
                                    <th>Local Govt Code</th>
                                    <th>Amount</th>
                                    <th>Receipt Number</th>
                                    <th>Payer Name</th>
                                    <th>Payer Phone</th>
                                    <th>Payer Addres</th>
                                    <th>OPT</th>
                                </tr>
                            </tfoot>
                            <tbody><?php
                                $y=1;
                                while($see_ministry = $min->fetch()){
                                    $staff_number = $see_ministry['staff_number'];
                                    $source_id = $see_ministry['source_id'];
                                    $sourceDetails = $revSouceing->seeRevenueourceID($source_id);
                                    // $minDetails = $minLocal->gettingMinistryIDDetails($ministry_id);
                                    // $ministry_name = $minDetails['ministry_name'];
                                    //$revenue_source_id = $see_ministry['source_id']; ?>
                                    <tr>
                                        <td><?php echo $y ?></td>
                                        <td><?php echo $revenue_source_name= $sourceDetails['source_name']; ?></td>
                                        <td><?php echo $local_govt_name ?></td>
                                        <td><?php echo "#".$minDetails['revenue_amount']; ?></td>
                                        <td><?php echo $see_ministry['reciept_number']; ?></td>
                                        <td><?php echo $see_ministry['payer_name']; ?></td>
                                        <td><?php echo $see_ministry['payer_phone']; ?></td>
                                        <td><?php echo $see_ministry['payer_address']; ?></td>
                                        
                                        <td>
                                            <a href="edit-revenue-source-details.php" class="btn btn-success" onclick="return(confirmToEdit());"><i class="fa fa-lg fa-fw fa-pencil"></i> 
                                            </a> 
                                            <a href="delete-revenue-source.php" class="btn btn-danger" onclick="return(confirmToDelete());"><i class="fa fa-lg fa-fw fa-trash"></i> 
                                            </a>
                                        </td>
                                    </tr><?php
                                    $y++;
                                } ?>
                            </tbody>
                        </table><?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function confirmToDelete(){
        return confirm("Click Okay to Delete Revenue Details and Cancel to Stop");
    }
</script>

<script>
    function confirmToEdit(){
        return confirm("Click okay to Edit Revenue and Cancel to Stop");
    }
</script>    
<?php require '../table-footer.php'; require '../alert.php'; ?>