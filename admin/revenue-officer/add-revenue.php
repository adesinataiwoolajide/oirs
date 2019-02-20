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
    $revDet = $revSouceing->gettingMinistryRevenue($ministry_id);
    $minDetails = $minLocal->gettingMinistryIDDetails($ministry_id);
    $ministry_name = $minDetails['ministry_name'];
    $local_govt_name = $localDetails['local_govt_name'];
    

    $local = $db->prepare("SELECT * FROM source_revenue ORDER BY source_name ASC");
    //$arrLocal = array(':ministry_id'=>$ministry_id);
    $local->execute();
    // if($local->rowCount()==0){ ?>
    //     <p style="color: red" align="center">Please Contact The Ministry</p><?php
    // }else{
    ?>
        <main class="app-content">
            <div class="app-title">
                <div>
        	        <h1 style="color: green"><i class="fa fa-plus"></i> Osun State Revenue Form</h1>
                    <p style="color: blue"> CITIZEN REVENUE FORM</p>
                </div>
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item active"><a href="add-revenue.php"><i class="fa fa-plus"></i> Add Revenue</a></li>
                  	<li class="breadcrumb-item"><a href="view-all-revenue.php"><i class="fa fa-list"></i> View Revenue</a></li>
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
                        <h3><p align="center" style="color: green">Please Fill The Below Form To Add A New Revenue </p></h3>
                        <form action="process-add-revenue.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="tile">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-user"></i> Staff Name</label>
                                            <input class="form-control"  type="text" name="" value="<?php echo strtoupper("$staff_name"). " $staff_number" ?>" placeholder="Enter The Staff Name" readonly>
                                            <span style="color: pink">** This Field is Readonly **</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-id-badge"></i> Staff Ministry</label>
                                            <input class="form-control"  type="text" name="" value="<?php echo $ministry_name ?>" placeholder="Enter The Staff Name" readonly>
                                            <span style="color: pink">** This Field is Readonly **</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-cogs"></i> Revenue Category</label>
                                            <select class="form-control"  name="source_id" required>
                                                <option value="">-- Select The Revnue Type --</option>
                                                <option value=""></option><?php
                                                while($see_local = $local->fetch()){ ?>
                                                    <option value="<?php echo $see_local['source_id']; ?>"><?php echo $see_local['source_name']. " #" .$see_local['revenue_amount']; ?>
                                                    </option><?php 
                                                } ?>
                                            </select>
                                            <span style="color: red">** This Field is Required **</span>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-user"></i> Bank Name</label>
                                            <select class="form-control"  name="bank_name" required>
                                                <option value="">-- Select The Bank Name --</option>
                                                <option value=""></option>
                                                <option value="First Bank">First Bank</option>
                                                <option value="Wema Bank">Wema Bank</option>
                                            </select> 
                                            <span style="color: red">** This Field is Required **</span>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="tile">
                                        <div class="tile-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-user"></i> Bank Branch</label>
                                                <input class="form-control" type="text" name="branch_name" required placeholder="Enter The Branch Name">
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-user"></i> Payer Name</label>
                                                <input class="form-control" type="text" name="payer_name" required placeholder="Enter The Revenue Name">
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-phone"></i> Payer Phone Number</label>
                                                <input class="form-control" type="number" name="payer_phone" required placeholder="Enter The Revenue Name">
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                            <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-building"></i> Payer Address</label>
                                                <textarea class="form-control" name="payer_address" required></textarea>
                                                <span style="color: red">** This Field is Required **</span>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="ministry_name" value="<?php echo $ministry_name ?>">
                                <input type="hidden" name="staff_number" value="<?php echo $staff_number ?>">
                                <input type="hidden" name="staff_name" value="<?php echo $staff_name ?>">
                                <input type="hidden" name="local_govt_name" value="<?php echo $local_govt_name ?>">
                                <input type="hidden" name="local_govt_id" value="<?php echo $local_govt_id ?>">
                                <div class="col-lg-12">
                                    <div class="tile">
                                        <div class="row">
                                            <div class="col-lg-12" align="center">
                                                <button class="btn btn-success" name="add_revenue">ADD THE REVENUE DETAILS</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>   
                    </div>
             </div>
        </main>
        <?php
        	require '../footer.php';
    //}
        ?>