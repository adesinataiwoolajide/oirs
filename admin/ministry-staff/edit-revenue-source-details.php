<?php
	require '../header.php';
	require '../side-bar.php';require 'libs_dev/local-ministry/local_ministry_class.php';
    require 'libs_dev/revenue/revenue_class.php';
    $minLocal = new stateMinistry($db);
    $revSouceing = new sourcesOfRevenue($db);
    $source_name = $_GET['revenue_source_name'];
    $ministry_code = $_GET['ministry_code'];
    $source_id = $_GET['revenue_source_id'];
    $revDet =$revSouceing->seeRevenueourceID($source_id);
    $ministry_id = $revDet['ministry_id'];
    $miniName = $minLocal->gettingMinistryIDDetails($ministry_id);
    $ministry_name = $miniName['ministry_name'];
?>
<main class="app-content">
    <div class="app-title">
        <div>
	         
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item active"><a href="edit-revenue-source-details.php?source_name=<?php echo $source_name ?>&&ministry_code=<?php echo $ministry_code ?>"><i class="fa fa-pencil"></i> Edit Revenue Source</a></li>
            <li class="breadcrumb-item"><a href="add-revenue-source.php"><i class="fa fa-plus"></i> Add Revenue Source</a></li>
          	<li class="breadcrumb-item"><a href="view-all-revenue-source.php"><i class="fa fa-list"></i> View Revenue Sources</a></li>
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
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <h3><p align="center" style="color: green">Please Fill The Below Form To Updates The Revenue Source </p></h3>
                        <form action="process-update-revenue-source.php" method="post" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-user"></i> Revenue Ministry</label>
                                    <select class="form-control"  name="ministry_id" required>
                                        <option value="<?php echo $ministry_id ?>"><?php echo $ministry_name ?></option>
                                        <option value=""></option><?php
                                        $local = $db->prepare("SELECT * FROM ministry ORDER BY ministry_name");
                                        $local->execute();
                                        while($see_local = $local->fetch()){ ?>
                                            <option value="<?php echo $see_local['ministry_id']; ?>"><?php echo $see_local['ministry_name']; ?>
                                            </option><?php 
                                        } ?>
                                    </select>
                                    <span style="color: red">** This Field is Required **</span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-building"></i> Revenue Name</label>
                                    <input class="form-control" type="text" name="source_name" value="<?php echo $source_name ?>" placeholder="Enter The Revenue Name">
                                    <span style="color: red">** This Field is Required **</span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-cogs"></i> Revenue Amount</label>
                                    <input class="form-control" type="number" name="revenue_amount" value="<?php echo $revDet['revenue_amount'] ?>" placeholder="Enter The Revenue Amount">
                                    <span style="color: red">** This Field is Required **</span>
                                </div>
                            </div>
                            <input type="hidden" name="source_id" value="<?php echo $source_id ?>">
                            <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                            
                            <div class="col-lg-12" align="center">
                                <button class="btn btn-success" name="update-source">UPDATE THE REVENUE DETAILS</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
     </div>
</main>
<?php
	require '../footer.php';
?>