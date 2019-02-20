<?php
	require '../header.php';
	require '../side-bar.php';
    require 'libs_dev/local-ministry/local_ministry_class.php';
    $minLocal = new stateMinistry($db);
    $ministry_code = $_GET['ministry_code'];
    $minDetails = $minLocal->gettingMinistryDetails($ministry_code)
?>
<main class="app-content">
    <div class="app-title">
        <div>
	         
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item active"><a href="edit-ministry-details.php?ministry_code=<?php echo $ministry_code ?>">Edit Ministry Details</a></li>
            <li class="breadcrumb-item active"><a href="add-ministry.php">Add Ministry </a></li>
          	<li class="breadcrumb-item"><a href="view-all-ministries.php">View Ministries </a></li>
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
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <h5><p align="center" style="color: green">PLEASE FILL THE DELOW FORM TO UPADATE <?php echo $minDetails['ministry_name'] ?> DETAILS</p></h5>
                        <form action="update-ministry-details.php" method="post" enctype="multipart/form-data">
                            <div class="col-lg-12" align="right">
                                <img src="<?php echo 'ministry-logo/'.$minDetails['ministry_logo']; ?>" align="center" style="height:50px; width: 50px;">
                                Ministry Logo
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1"><i class="fa fa-lg fa-fw fa-image"></i>Change Ministry Logo?</label>
                                    <input class="form-control" id="" type="file" name="image" required placeholder="Password">
                                    <span style="color: green">** This Field is Optional **</span>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-cloud"></i>Ministry Code</label>
                                    <input class="form-control" type="text" value="<?php echo $ministry_code?>" readonly placeholder="Enter The Ministry Name">
                                    <span style="color: pink">** This Field is Readonly **</span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-building"></i>Ministry Name</label>
                                    <input class="form-control" type="text" name="ministry_name" value="<?php echo $minDetails['ministry_name'] ?>" placeholder="Enter The Ministry Name">
                                    <span style="color: red">** This Field is Required **</span>
                                </div>
                            </div>
                            <input type="hidden" name="ministry_code" value="<?php echo $ministry_code ?>">
                            <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                            <input type="hidden" name="prev_name" value="<?php echo $minDetails['ministry_name']; ?>">
                            <div class="col-lg-12" align="center">
                                <button class="btn btn-success" name="update-ministry">UPADATE <?php echo $minDetails['ministry_name'] ?> DETAILS</button>
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