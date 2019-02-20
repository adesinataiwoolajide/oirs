<?php
	require '../header.php';
    require 'libs_dev/staff/staff_class.php';
    $staffBiodata = new staffBiodataIGR($db);
	require '../side-bar.php';
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1 style="color: green"><i class="fa fa-th-list"></i> State of Osun Local Government</h1>
            <p style="color: blue">List of All The Local Government in Osun State</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          	<li class="breadcrumb-item active"><a href="group-ministries.php"><i class="fa fa-list"></i> Group Ministries </a></li>
            <li class="breadcrumb-item active"><a href="group-local-govt.php"><i class="fa fa-list"></i> Group Local Government </a></li>
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
        </div><?php
        $gettLocal = $db->prepare("SELECT * FROM ministry ORDER BY ministry_name ASC");
        $gettLocal->execute();
        if($gettLocal->rowCount()==0){ ?>
            <h4><p align="center" style="color: red">The Minsitry List is Empty, Please Kindly Add Ministry to the Ministry List</p></h4><?php

        }else{
            while($see_local = $gettLocal->fetch()){  
                $code =$see_local['ministry_code'];
                $ministry_id = $see_local['ministry_id']; ?>
                <div class="col-md-6 col-lg-4" onclick="location.href='view-ministries-revenue.php?ministry_code=<?php echo $code ?>&&ministry_id=<?php echo $ministry_id ?>';">
                    <div class="widget-small primary coloured-icon"><i class="icon fa fa-cogs fa-3x"></i>
                        <img src="<?php echo 'ministry-logo/'.$see_local['ministry_logo']; ?>" style="width: 100px; height: 100px;" align="center">
                        <p><b><?php echo $see_local['ministry_name']; ?></b></p> 
                    </div>
                </div><?php
            } 
        }?>
      
     </div>
</main>
<?php
	require '../footer.php';
?>