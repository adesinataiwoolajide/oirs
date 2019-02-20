<?php
    require '../header.php';
    require '../side-bar.php';
    require 'libs_dev/local-ministry/local_ministry_class.php';
    $minLocal = new stateMinistry($db);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1 style="color: green"><i class="fa fa-th-list"></i> State of Osun Revenue Source List</h1>
            <p style="color: blue">List of All The Revenue Source List in Osun State</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="view-all-revenue-source.php"><i class="fa fa-list"></i> View All Revenue Source </a></li>
            <li class="breadcrumb-item active"><a href="add-revenue-source.php"><i class="fa fa-plus"></i> Add Revenue Source</a></li>
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
                    $min = $db->prepare("SELECT * FROM source_revenue ORDER BY source_name ASC");
                    $min->execute();
                    if($min->rowCount()==0){ ?>
                        <h5><p style="color: red"  align="center">The Revenue Source List is Empty, Please Click on Add Revenue Source To Add Revenue To The Minsitry Revenue List</p></h5><?php
                    }else{ ?>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Source Name</th>
                                    <th>Ministry Code</th>
                                    <th>Amount</th>
                                    <th>Ministry Logo</th>
                                    <th>OPT</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Source Name</th>
                                    <th>Ministry Code</th>
                                    <th>Amount</th>
                                    <th>Ministry Logo</th>
                                    <th>OPT</th>
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
                                        <td><?php echo $y ?></td>
                                        <td><?php echo $revenue_source_name= $see_ministry['source_name']; ?></td>
                                        <td><?php echo $minCode = $minDetails['ministry_code']; ?></td>
                                        <td><?php echo $ministrycode="#".$see_ministry['revenue_amount']; ?></td>
                                        <td>
                                            <img src="<?php echo 'ministry-logo/'.$minDetails['ministry_logo']; ?>" align="center" style="height:30px; width: 30px;">
                                        </td>
                                        <td>
                                            <a href="edit-revenue-source-details.php?revenue_source_name=<?php echo $revenue_source_name ?>&&ministry_code=<?php echo $minCode ?>&&revenue_source_id=<?php echo $revenue_source_id?>" class="btn btn-success" onclick="return(confirmToEdit());"><i class="fa fa-lg fa-fw fa-pencil"></i> 
                                            </a> 
                                            <a href="delete-revenue-source.php?revenue_source_name=<?php echo $revenue_source_name ?>&&ministry_code=<?php echo $minCode?>&&revenue_source_id=<?php echo $revenue_source_id?>&&ministry_id=<?php echo $ministry_id ?>" class="btn btn-danger" onclick="return(confirmToDelete());"><i class="fa fa-lg fa-fw fa-trash"></i> 
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