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
            <p style="color: blue">LIST OF ALL REVENUE SOURCE IN <?php echo $ministry_name ?></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="view-all-revenue-source.php"><i class="fa fa-list"></i> View All Revenue Source </a></li>
            
            <li class="breadcrumb-item active"><a href="ministry-revenue-source.php"><i class="fa fa-list"></i> Group by Ministry </a></li>
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
                    $min =$db->prepare("SELECT * FROM source_revenue WHERE ministry_id=:ministry_id ORDER BY source_name ASC");
                    $arrM = array(':ministry_id'=>$ministry_id);
                    $min->execute($arrM);
                    if($min->rowCount()==0){ ?>
                        <h5><p style="color: red"  align="center">The Revenue Source List is for <?php echo $ministry_name ?>  is Empty, Please Contact The Ministry For more Information</p></h5><?php
                    }else{ ?>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <div align="center">
                                <h1 style="color: green"><i class="fa fa-th-list"></i> State of Osun Revenue Source List</h1>
                                <p style="color: blue">LIST OF ALL REVENUE SOURCE FOR <?php echo $ministry_name ?></p>
                            </div>
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Source Name</th>
                                    <th>Ministry Code</th>
                                    <th>Amount</th>
                                    <th>Ministry Logo</th>
                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Source Name</th>
                                    <th>Ministry Code</th>
                                    <th>Amount</th>
                                    <th>Ministry Logo</th>
                                    
                                </tr>
                            </tfoot>
                            <tbody><?php
                                $y=1;
                                while($see_ministry = $min->fetch()){
                                    $ministry_id = $see_ministry['ministry_id'];
                                    $minDetails = $minLocal->gettingMinistryIDDetails($ministry_id);
                                    $ministry_name = $minDetails['ministry_name'];
                                    $revenue_source_id = $see_ministry['source_id']; ?>
                                    <tr>
                                        <td><?php echo $y ?>
                                            
                                        </td>
                                        <td><?php echo $revenue_source_name= $see_ministry['source_name']; ?></td>
                                        <td><?php echo $minCode = $minDetails['ministry_code']; ?></td>
                                        <td><?php echo $ministrycode="#".$see_ministry['revenue_amount']; ?></td>
                                        <td>
                                            <img src="<?php echo '../ict-department/ministry-logo/'.$minDetails['ministry_logo']; ?>" align="center" style="height:30px; width: 30px;">
                                        </td>
                                        
                                    </tr><?php
                                    $y++;
                                } ?>
                            </tbody>
                        </table>
                        <div class="row d-print-none mt-2">
                            <div class="col-12 text-right">
                                <a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print Revenue Source</a>
                            </div>
                        </div><?php
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