<?php
    require '../header.php';
    require '../ict-department/libs_dev/staff/staff_class.php';
    $staffBiodata = new staffBiodataIGR($db);
    require '../side-bar.php';
    require '../ict-department/libs_dev/revenue/revenue_class.php';
    require '../ict-department/libs_dev/local-ministry/local_ministry_class.php';
    $minLocal = new stateMinistry($db);
    $revSouceing = new sourcesOfRevenue($db);
    $ministry_name = $_GET['ministry_name'];
    $ministry_code = $_GET['ministry_code'];
    $ministry_id = $_GET['ministry_id'];

    $check = $db->prepare("SELECT * FROM source_revenue WHERE ministry_id=:ministry_id");
    $arrChe= array(':ministry_id'=>$ministry_id);
    $check->execute($arrChe);
    if($check->rowCount()==0){
        $_SESSION['error'] =  strtoupper("$ministry_name". " Revenue Source List is Empty <br> Please Click on Add Revenue Source To Add  to The Ministry Revenue Source List");?>
        <script>window.location=("ministry-revenue-source.php")</script><?php
    }else{?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h6 style="color: green"><i class="fa fa-th-list"></i> <?php echo strtoupper("$ministry_name". "Revenue Source List"); ?></h6>
                    <p style="color: blue"><?php echo $ministry_name ?></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item active"><a href="see_ministry_revenue_source.php?ministry_name=<?php echo $ministry_name?>&&ministry_code=<?php echo $ministry_code ?>&&ministry_id=<?php echo $ministry_id ?>"><i class="fa fa-list"></i> View Ministry Rev Source </a></li>
                     <li class="breadcrumb-item active"><a href="ministry-revenue-source.php"><i class="fa fa-list"></i> Group by Ministry </a></li>
                    <li class="breadcrumb-item active"><a href="view-all-revenue-source.php"><i class="fa fa-list"></i> View All Revenue Source </a></li>
                    
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
                            
                            <table class="table table-hover table-bordered" id="sampleTable">
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
                                    while($see_ministry = $check->fetch()){
                                        
                                        $revenue_source_id = $see_ministry['source_id'];
                                        $source_id = $revenue_source_id;
                                        $revDet =$revSouceing->seeRevenueourceID($source_id);
                                        $minDetails = $minLocal->gettingMinistryIDDetails($ministry_id); ?>
                                        <tr>
                                            <td><?php echo $y ?></td>
                                            <td><?php echo $revenue_source_name= $see_ministry['source_name']; ?></td>
                                            <td><?php echo $ministry_code; ?></td>
                                            <td><?php echo $ministrycode="#".$see_ministry['revenue_amount']; ?></td>
                                            <td>
                                                <img src="<?php echo '../ict-department/ministry-logo/'.$minDetails['ministry_logo']; ?>" align="center" style="height:30px; width: 30px;">
                                            </td>
                                            
                                        </tr><?php
                                        $y++;
                                    } ?>
                                </tbody>
                            </table>
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
        <?php require '../table-footer.php'; 
        require '../alert.php';
    } 
?>