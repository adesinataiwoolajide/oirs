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
          	<li class="breadcrumb-item active"><a href="group-local-govt.php"><i class="fa fa-list"></i> Group Local Government </a></li>
            <li class="breadcrumb-item active"><a href="group-ministries.php"><i class="fa fa-list"></i> Group Local Govt </a></li>
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
        $gettLocal = $db->prepare("SELECT * FROM local_govt ORDER BY local_govt_name ASC");
        $gettLocal->execute();
        if($gettLocal->rowCount()==0){ ?>
            <h4><p align="center" style="color: red">The Local Government List is Empty, Please Kindly Add Local Government to the Local Governement List</p></h4><?php

        }else{
            while($see_local = $gettLocal->fetch()){
                $code =$see_local['local_govt_code'];
                $local_govt_id = $see_local['local_govt_id']; ?>
                <div class="col-md-6 col-lg-4" onclick="location.href='view-local_govt-revenue.php?local_govt_code=<?php echo $code ?>&&local_govt_id=<?php echo $local_govt_id ?>';">
                    <div class="widget-small primary coloured-icon"><i class="icon fa fa-building fa-3x"></i>
                        <img src="../icons/iGRLogo.jpeg" style="width: 100px; height: 100px;" align="center">
                        <p><b><?php echo $see_local['local_govt_name']; ?></b></p> 
                    </div>
                </div><?php
            } 
        }?>
      
     </div>
</main>
<?php
	require '../footer.php';
?>