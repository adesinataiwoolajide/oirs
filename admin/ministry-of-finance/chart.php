<?php
	require '../header.php';
    require '../ict-department/libs_dev/staff/staff_class.php';
    $staffBiodata = new staffBiodataIGR($db);
	require '../side-bar.php';
    //require 'libs_dev/staff/staff_class.php';
    require '../ict-department/libs_dev/local-ministry/local_ministry_class.php';
    require '../ict-department/libs_dev/revenue/revenue_class.php';
    $minLocal = new stateMinistry($db);
    $localMin = new localMinistry($db);
    $revSouceing = new sourcesOfRevenue($db);
   // $staffBiodata = new staffBiodataIGR($db);
    $staff_email  = $_SESSION['user_name'];
?>
<script type="text/javascript" src="../ict-department/libs_dev/fusioncharts/js/fusioncharts.js"></script>
<script type="text/javascript" src="../ict-department/libs_dev/fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>
<main class="app-content">
    <div class="app-title">
        <div>
	         <div>
                <h1 style="color: green"><i class="fa fa-building"></i></h1>
                <p style="color: blue"></p>
            </div>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            
            <li class="breadcrumb-item"><a href=""><i class="fa fa-cloud"></i> IGR Vault </a></li>
            <li class="breadcrumb-item"><a href=""><i class="fa fa-cloud"></i> View All IGR Vault </a></li>
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
            
            <div class="row">

                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="tile-body"><?php
                                $jsonArray=array();

                                $both = $db->prepare("SELECT sum(total_amount) AS total_value1 FROM vault WHERE bank_name='Wema Bank'");
        
                                $both->execute();
                                while($row3 = $both->fetch()){
                                    $new3 = "All Payments Made to Wema Bank";
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
                                    $new3 = "All Payments Made to First Bank";
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
                                   
                                    ?>
                                
                                <script>
                                FusionCharts.ready(function() {

                                  FusionCharts.register('theme', {
                                    name: 'fire',
                                    theme: {
                                      base: {
                                        chart: {
                                          paletteColors: '#FF4444, #FFBB33, #99CC00, #33B5E5, #AA66CC',
                                          baseFontColor: '#36474D',
                                          baseFont: 'Helvetica Neue,Arial',
                                          captionFontSize: '14',
                                          subcaptionFontSize: '14',
                                          subcaptionFontBold: '0',
                                          showBorder: '0',
                                          bgColor: '#ffffff',
                                          showShadow: '0',
                                          canvasBgColor: '#ffffff',
                                          canvasBorderAlpha: '0',
                                          useplotgradientcolor: '0',
                                          useRoundEdges: '0',
                                          showPlotBorder: '0',
                                          showAlternateHGridColor: '0',
                                          showAlternateVGridColor: '0',
                                          toolTipBorderThickness: '0',
                                          toolTipBgColor: '#99CC00',
                                          toolTipBgAlpha: '90',
                                          toolTipBorderRadius: '2',
                                          toolTipPadding: '5',
                                          legendBgAlpha: '0',
                                          legendBorderAlpha: '0',
                                          legendShadow: '0',
                                          legendItemFontSize: '10',
                                          divlineAlpha: '100',
                                          divlineColor: '#36474D',
                                          divlineThickness: '1',
                                          divLineIsDashed: '1',
                                          divLineDashLen: '1',
                                          divLineGapLen: '1',
                                          showHoverEffect: '1',
                                          valueFontSize: '11',
                                          showXAxisLine: '1',
                                          xAxisLineThickness: '1',
                                          xAxisLineColor: '#36474D'
                                        }
                                      },
                                      mscolumn2d: {
                                        chart: {
                                          valueFontColor: '#3B373A', //overwrite base value
                                          placeValuesInside: '1',
                                          rotateValues: '1'
                                        }
                                      }
                                    }
                                  });

                                  var revenueChart = new FusionCharts({
                                    type: 'mscolumn2d',
                                    renderAt: 'chart-container',
                                    width: '900',
                                    height: '400',
                                    dataFormat: 'json',
                                    dataSource: {
                                      "chart": {
                                        "caption": "Osun State Internal Revenue Service",
                                        "subCaption": "Harry's SuperMart",
                                        "xAxisname": "Bank Name",
                                        "yAxisName": "Revenues (In Naira)",
                                        // Use the custom theme registered
                                        "theme": "fusion"
                                      },
                                      "categories": [{
                                        "category": [{
                                          "label": "<?php echo "Yes" ?>"
                                        }, {
                                          "label": "Q2"
                                        }, {
                                          "label": "Q3"
                                        }]
                                      }],
                                      "dataset": [{
                                        "seriesname": "Current Year",
                                        "data": [{
                                          "value": "<?php echo $ARR['value'] ?>"
                                        }]
                                      }]
                                    }
                                  }).render();
                                });
                                </script> <?php  array_push($jsonArray, $ARR); } ?>
                                <div id="chart-container">
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?php require '../table-footer.php'; require '../alert.php'; ?>