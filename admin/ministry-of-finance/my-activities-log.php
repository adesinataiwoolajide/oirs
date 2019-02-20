<?php
    require '../header.php';
    require 'libs_dev/staff/staff_class.php';
    $staffBiodata = new staffBiodataIGR($db);
    require '../side-bar.php';
    require 'libs_dev/local-ministry/local_ministry_class.php';
    $minstryDetails = new stateMinistry($db);
    $localDetails = new localMinistry($db);
    $staff_email  = $_SESSION['user_name'];
    $staffDetails = $staffBiodata->seestaff_biodataEmailDetails($staff_email);
    $staff_name = $staffDetails['staff_name'];
    $staff_number = $staffDetails['staff_number'];
?>
<main class="app-content">
    <div class="app-title">
        <div>
             <div>
                <h1 style="color: green"><i class="fa fa-user"></i> Staff Activity</h1>
                <p style="color: blue"><?php echo $staff_name ?> Activities Log</p>
            </div>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            
            <li class="breadcrumb-item"><a href="my-activities-log.php"><i class="fa fa-cloud"></i> <?php echo $staff_name ?> Activities Log </a></li>
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
                        <h3><p align="center" style="color: green"> <?php echo $staff_name ?> Please Preview Your Activities Log Below </p></h3>
                    </div>
                </div>
            </div>
            
            <div class="row">

                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="tile-body"><?php
                                $staff_activity = $db->prepare("SELECT * FROM activity WHERE user_details=:staff_email ORDER BY act_id DESC ");
                                $arrAct = array(':staff_email'=>$staff_email);
                                $staff_activity->execute($arrAct);
                                if($staff_activity->rowCount()==0){  ?>
                                    <p style="color: red" align="center"><?php echo $staff_name; ?> No Activity Was Found For </p><?php
                                }else{?>
                                    <table class="table table-hover table-bordered" id="sampleTable">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Activities</th>
                                                <th>Time of Operation</th>
                                            </tr>
                                        </thead>
                                         <tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Activities</th>
                                                <th>Time of Operation</th>
                                            </tr>
                                        </tfoot>
                                        <tbody><?php
                                            $num =1;
                                            while($see_staff_act = $staff_activity->fetch()){ ?>
                                                <tr>
                                                    <td><?php echo $num; ?></td>
                                                    <td><?php echo $see_staff_act['action']; ?></td>
                                                    <td class="color-primary"><?php echo $see_staff_act['time_added']; ?></td>
                                                </tr><?php
                                                $num++;
                                            } ?>
                                            
                                        </tbody>
                                    </table><?php
                                } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?php require '../table-footer.php'; require '../alert.php'; ?>