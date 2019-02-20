<?php
	require '../header.php';
	require '../side-bar.php';
?>
<main class="app-content">
    <div class="app-title">
        <div>
	        <h1 style="color: green"><i class="fa fa-th-plus"></i> Osun State Revenue Source Form</h1>
            <p style="color: blue">State of Osun Revenue Source Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item active"><a href="add-revenue-source.php"><i class="fa fa-plus"></i> Add Revenue Source</a></li>
          	<li class="breadcrumb-item"><a href="view-all-revenue-source.php"><i class="fa fa-list"></i> View Revenue Sources</a></li>
            <li class="breadcrumb-item active"><a href="ministry-revenue-source.php"><i class="fa fa-list"></i> Group by Ministry </a></li>
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
                        <h3><p align="center" style="color: green">Please Fill The Below Form To Add The Revenue Source </p></h3>
                        <form action="process-add-revenue-source.php" method="post" enctype="multipart/form-data">
                           
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-user"></i> Revenue Ministry</label>
                                    <select class="form-control"  name="ministry_id" required>
                                        <option value="">-- Select The Revnue Ministry --</option>
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
                                    <input class="form-control" type="text" name="source_name" placeholder="Enter The Revenue Name">
                                    <span style="color: red">** This Field is Required **</span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-cogs"></i> Revenue Amount</label>
                                    <input class="form-control" type="number" name="revenue_amount" placeholder="Enter The Revenue Amount">
                                    <span style="color: red">** This Field is Required **</span>
                                </div>
                            </div>
                            
                            <div class="col-lg-12" align="center">
                                <button class="btn btn-success" name="add-source">ADD THE REVENUE TO THE MINISTRY</button>
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