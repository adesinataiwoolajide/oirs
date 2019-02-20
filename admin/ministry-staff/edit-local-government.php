<?php
	require '../header.php';
	require '../side-bar.php';
    require 'libs_dev/local-ministry/local_ministry_class.php';
    $localMin = new localMinistry($db);
    $local_govt_code = $_GET['local_govt_code'];
    $localDetails =$localMin->gettingLocalGocyDetails($local_govt_code)
?>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item active"><a href="edit-local-government.php?local_govt_code=<?php echo $local_govt_code ?>"><i class="fa fa-pencil"></i> Edit Local Government </a></li>
            <li class="breadcrumb-item active"><a href="add-local-govt.php"><i class="fa fa-plus"></i> Add Local Government </a></li>
          	<li class="breadcrumb-item"><a href="view-all-local-govt.php"><i class="fa fa-list"></i> View Local Governments </a></li>
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
                        <h5><p align="center" style="color: green">PLEASE FILL THE DELOW FORM TO UPADATE <?php echo $localDetails['local_govt_name'] ?> DETAILS </p></h5>
                        <form action="update-local-govt-details.php" method="post" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-cloud"></i> Local Government Code</label>
                                    <input class="form-control" name="local_govt_name" type="text" value="<?php echo $local_govt_code ?>" required>
                                    <span style="color: pink">** This Field is Readonly **</span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-building"></i> Local Government Name</label>
                                    <input class="form-control" name="local_govt_name" type="text" value="<?php echo $name= $localDetails['local_govt_name'] ?>" placeholder="Enter The Local Government Name">
                                    <span style="color: red">** This Field is Required **</span>
                                </div>
                            </div>
                            <input type="hidden" name="local_govt_code" value="<?php echo $local_govt_code ?>">
                            <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                            <input type="hidden" name="prev_name" value="<?php echo $name ?>">
                            <div class="col-lg-12" align="center">
                                <button class="btn btn-success" name="add-local">UPDATE <?php echo $name ?> DETAILS</button>
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