<?php
	require '../header.php';
    require '../ict-department/libs_dev/staff/staff_class.php';
    $staffBiodata = new staffBiodataIGR($db);
	require '../side-bar.php';
    require '../ict-department/libs_dev/local-ministry/local_ministry_class.php';
    $minstryDetails = new stateMinistry($db);
    $localDetails = new localMinistry($db);
    $staffemail = $_SESSION['user_name'];
    $staff_number = $_GET['staff_number'];
    $staffDetails = $staffBiodata->seestaff_biodataDetails($staff_number);
    $staff_name = $staffDetails['staff_name'];
?>
<main class="app-content">
    <div class="app-title">
        <div>
	         <div>
                <h1 style="color: green"><i class="fa fa-user"></i> Staff Biodata Form</h1>
            </div>
        </div>
        <ul class="app-breadcrumb breadcrumb">
             <li class="breadcrumb-item active"><a href="staff-details.php?staff_number=<?php echo $staff_number ?>"><i class="fa fa-user"></i> View <?php echo $staff_name ?> Details </a></li>
            
          	<li class="breadcrumb-item"><a href="view-all-staffs.php"><i class="fa fa-list"></i> View All Staff </a></li>
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
                        <h3><p align="center" style="color: green">Please Preview <?php echo $staff_name ?> Biodata Details Below </p></h3>
                    </div>
                </div>
            </div>
            <form action="process-add-staff-biodata.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-2">
                        <div class="tile">
                            <img src="<?php echo '../ict-department/staff-passport/'.$staffDetails['staff_passport']; ?>" align="center" style="height:100px; width: 100px;">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="tile">
                            <div class="tile-body">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <b>
                                    <tbody>
                                        <tr>
                                            <td>Staff Name</td>
                                            <td><?php echo $staff_name ?></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>Staff Number</td>
                                            <td><?php echo $staff_number; ?></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>Staff E-Mail</td>
                                            <td><?php echo $staff_email= $staffDetails['staff_email'] ?></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>Staff Phone Number</td>
                                            <td><?php echo $staffDetails['staff_phone'] ?></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>Gender</td>
                                            <td><?php echo $staffDetails['sex'] ?></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>Date of Birth</td>
                                            <td><?php echo $staffDetails['birth_date'] ?></td>
                                        </tr>
                                    </tbody></b>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="tile">
                            <div class="tile-body">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <tbody>
                                        <tr>
                                            <td>Year of Employment</td>
                                            <td><?php echo $staffDetails['year_of_employment'] ?></td>
                                        </tr>
                                    </tbody>
                                    
                                    <tbody>
                                        <tr>
                                            <td>State of Origin</td>
                                            <td><?php echo $staffDetails['state_origin'] ?></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>Staff Level</td>
                                            <td><?php echo $staffDetails['staff_level'] ?></td>
                                        </tr>
                                    </tbody>
                                    
                                    <tbody>
                                        <tr>
                                            <td>Ministry</td>
                                            <td><?php $ministry_id = $staffDetails['ministry_id']; 
                                            $sola= $minstryDetails->gettingMinistryIDDetails($ministry_id); 
                                            echo $sola['ministry_name']; ?></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>Local Government</td>
                                            <td><?php $local_govt_id= $staffDetails['local_govt_id']; 
                                            $depo = $localDetails->gettingLocalGocyIDDetails($local_govt_id); 
                                            echo $depo['local_govt_name']; ?></td>
                                        </tr>
                                    </tbody>
                                    
                                </table>
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
?>