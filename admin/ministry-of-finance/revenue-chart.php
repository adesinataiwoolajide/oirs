<?php
    require '../header.php';
    require '../ict-department/libs_dev/staff/staff_class.php';
    $staffBiodata = new staffBiodataIGR($db);
    require '../side-bar.php';
    require '../ict-department/libs_dev/local-ministry/local_ministry_class.php';
    require '../ict-department/libs_dev/revenue/revenue_class.php';
    include("../ict-department/fusioncharts.php");
    $minLocal = new stateMinistry($db);
    $localMin = new localMinistry($db);
    $revSouceing = new sourcesOfRevenue($db);

    $jsonArray=array();

    $staff_email  = $_SESSION['user_name'];
    $staffDetails = $staffBiodata->seestaff_biodataEmailDetails($staff_email);
    $staff_name = $staffDetails['staff_name'];
    $staff_number = $staffDetails['staff_number'];
    $ministry_id = $staffDetails['ministry_id'];
    $local_govt_id = $staffDetails['local_govt_id'];
    $localDetails = $localMin->gettingLocalGocyIDDetails($local_govt_id);
    //$revDet = $revSouceing->gettingMinistryRevenue($ministry_id);
    $minDetails = $minLocal->gettingMinistryIDDetails($ministry_id);
    $ministry_name = $minDetails['ministry_name'];
    $local_govt_name = $localDetails['local_govt_name'];

    $mini = $db->prepare("SELECT * FROM source_revenue WHERE ministry_id=:ministry_id");
    $arrMin = array(':ministry_id'=>$ministry_id);
    $mini->execute($arrMin);

    // while($se_mini = $mini->fetch()){ 
    //     $source_id = $se_mini['source_id'];
    //     $amount = $se_mini['revenue_amount'];

    //     $both = $db->prepare("SELECT sum(source_id) AS total_revenue FROM source_revenue WHERE local_govt_id=:local_govt_id ");
    //     $arrBoth = array(':local_govt_id'=>$local_govt_id);
    //     $both->execute($arrBoth);
    //     while($row3 = $both->fetch()){
    //         $new3 = "All Payments Amount";
    //         $sum3 = $row3['total_revenue'];
    //         $ARR=array();
    //         $ARR['label'] = $new3;
    //         $ARR['value'] = $sum3;
    //         array_push($jsonArray, $ARR);
    //         ?><br \><?php
    //     }

        $both = $db->prepare("SELECT sum(revenue_id) AS total_value3 FROM state_revenue");
        //$arrBoth = array(':local_govt_id'=>$local_govt_id);
        $both->execute();
        while($row3 = $both->fetch()){
            $new3 = "All Payments Amount";
            $sum3 = $row3['total_value3'];
            $ARR=array();
            $ARR['label'] = $new3;
            $ARR['value'] = $sum3;
            array_push($jsonArray, $ARR);
            ?><br \><?php
        }
   // }

    $arrs=array(
        "chart" => array(
            "caption" => "$local_govt_name REVENUE CHARTS",
            "xAxisName" =>"CUSTOMERS PAYMENTS",
            "yAxisName" =>"AMOUNT PAID BY CUSTOMERS",
            "theme" =>"zune",
                ));
    $arrs['data']=$jsonArray;
    $jasonData = json_encode($arrs);
?>
<script type="text/javascript" src="../ict-department/libs_dev/fusioncharts/js/fusioncharts.js"></script>
<script type="text/javascript" src="../ict-department/libs_dev/fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1 style="color: green"><i class="fa fa-th-list"></i> State of Osun Revenue List</h1>
            <p style="color: blue"><?php echo $local_govt_name ?> CITIZEN REVENUE LIST</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="view-local-govt-revenue.php"><i class="fa fa-list"></i> <?php echo $local_govt_name ?> REVENUE </a></li>
            <li class="breadcrumb-item active"><a href="view-all-revenue.php"><i class="fa fa-list"></i> View All Revenue </a></li>
            <li class="breadcrumb-item active"><a href="add-revenue.php"><i class="fa fa-plus"></i> Add Revenue</a></li>
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
            <div class="">
                <?php
                    
                    $columucharts = new FusionCharts("column3D", "$local_govt_name", 1030, 450, "chartContainer", "json", $jasonData);
                    $columucharts-> render();
                  ?>
                    <div  align="center" id="chartContainer" style="margin-top: -30px; margin-left: -15px; width: 500px; height: 200px">
                        
                    </div>
            </div>
        </div>
    </div>
</main>

<?php 
    require '../footer.php'; 
?>