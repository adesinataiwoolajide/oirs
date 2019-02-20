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

    
    $both = $db->prepare("SELECT sum(total_amount) AS total_value1 FROM vault WHERE bank_name='Wema Bank'");
    
    $both->execute();
    while($row3 = $both->fetch()){
        $new3 = "Wema Bank";
        $sum3 = $row3['total_value1'];
        $ARR=array();
        $ARR['label'] = $new3;
        $ARR['value'] = $sum3;
        array_push($jsonArray, $ARR);
        ?><br \><?php
    }

    $both = $db->prepare("SELECT sum(total_amount) AS total_value2 FROM vault WHERE bank_name='First Bank'");
    
    $both->execute();
    while($row3 = $both->fetch()){
        $new3 = "First Bank";
        $sum3 = $row3['total_value2'];
        $ARR=array();
        $ARR['label'] = $new3;
        $ARR['value'] = $sum3;
        array_push($jsonArray, $ARR);
        ?><br \><?php
    }

    $both = $db->prepare("SELECT sum(total_amount) AS total_value3 FROM vault");
    
    $both->execute();
    while($row3 = $both->fetch()){
        $new3 = "Total Payments Made to both BankS";
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
            "caption" => "BANKS REVENUE CHARTS",
            "xAxisName" =>"CITIZENS PAYMENTS",
            "yAxisName" =>"AMOUNT PAID BY CITIZENS",
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
            <h1 style="color: green"><i class="fa fa-chart"></i> State of Osun Bank Revenue Chart</h1>
            <p style="color: blue"></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            
            <li class="breadcrumb-item active"><a href="bank-revenue-chart.php"><i class="fa fa-plus"></i> Bank Revenue Chart</a></li>
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
            
            <div class="tile">
                <div class="tile-body">
                    <?php
                    $columucharts = new FusionCharts("column3D", "Banks", 950, 350, "chartContainer", "json", $jasonData);
                    $columucharts-> render();?>
                  
                    <div  align="center" id="chartContainer" style="margin-top: -30px; margin-left: -15px; width: 300px; height: 200px">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
    require '../footer.php'; 
?>