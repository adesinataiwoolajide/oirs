<?php
	require '../header.php';
    require '../ict-department/libs_dev/staff/staff_class.php';
    $staffBiodata = new staffBiodataIGR($db);
	require '../side-bar.php';
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1 style="color: green"><i class="fa fa-plus"></i> Osun State Local Govt Form</h1>
            <p style="color: blue">State of Osun Local Government Biodata Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
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
                        <h3><p align="center" style="color: green">Please Fill The Below Form To Add A New Local Government </p></h3>
                        <form action="process-add-local-govt.php" method="post" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-building"></i> Local Government Name</label>
                                    <input class="form-control" name="local_govt_name" type="text" placeholder="Enter The Local Government Name">
                                    <span style="color: red">** This Field is Required **</span>
                                </div>
                            </div>
                            <div class="col-lg-12" align="right">
                                <button class="btn btn-success" name="add-local">ADD THE LOCAL GOVERMENT</button>
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