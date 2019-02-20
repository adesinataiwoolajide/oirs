<?php
	require '../header.php';
    require '../ict-department/libs_dev/staff/staff_class.php';
    $staffBiodata = new staffBiodataIGR($db);
	require '../side-bar.php';
?>
<main class="app-content">
    <div class="app-title">
        <div>
	         <h1 style="color: green"><i class="fa fa-plus"></i> Osun State Ministry Form</h1>
            <p style="color: blue">State of Osun Ministry Biodata Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item active"><a href="add-ministry.php"><i class="fa fa-plus"></i> Add Ministry </a></li>
          	<li class="breadcrumb-item"><a href="view-all-ministries.php"><i class="fa fa-list"></i> View Ministries </a></li>
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
                        <h3><p align="center" style="color: green">Please Fill The Below Form To Add A New Ministry </p></h3>
                        <form action="process-add-ministry.php" method="post" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1"><i class="fa fa-lg fa-fw fa-image"></i>Ministry Logo</label>
                                    <input class="form-control" id="" type="file" name="image" required placeholder="Password">
                                    <span style="color: red">** This Field is Required **</span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-building"></i>Ministry Name</label>
                                    <input class="form-control" type="text" name="ministry_name" placeholder="Enter The Ministry Name">
                                    <span style="color: red">** This Field is Required **</span>
                                </div>
                            </div>
                            
                            <div class="col-lg-12" align="center">
                                <button class="btn btn-success" name="add-ministry">ADD THE MINISTRY TO THE STATE MINISTRY LIST</button>
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