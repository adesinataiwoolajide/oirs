<?php
	require '../header.php';
  require '../ict-department/libs_dev/staff/staff_class.php';
    $staffBiodata = new staffBiodataIGR($db);
	require '../side-bar.php';
?>
<main class="app-content">
    <div class="app-title">
        <div>
	         <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          	<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          	<li class="breadcrumb-item"><a href="./">Home Page</a></li>
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
        <div class="col-md-6 col-lg-3" onclick="location.href='view-all-staffs.php';">
          	<div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
          		<img src="../icons/students.jpg" style="width: 100px; height: 100px;" align="center">
          		<p><b>Manage Staff</b></p> 
          	</div>
        </div>
        <div class="col-md-6 col-lg-3" onclick="location.href='view-all-ministries.php';">
          	<div class="widget-small info coloured-icon"><i class="icon fa fa-building fa-3x"></i>
          		<img src="../icons/unit.jpeg" style="width: 100px; height: 100px;" align="center"> 
          		<p><b>State Minis<br>tries</b></p> 
          	</div>
        </div>
        <div class="col-md-6 col-lg-3" onclick="location.href='view-all-local-govt.php';">
          	<div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
          		<img src="../icons/local.png" style="width: 100px; height: 100px;" align="center"> 
            	<p><b> Local Govt</b></p> 
	         </div>
	    </div>
        <div class="col-md-6 col-lg-3" onclick="location.href='view-all-revenue-source.php';">
          	<div class="widget-small danger coloured-icon"><i class="icon fa fa-calendar fa-3x"></i>
          		<img src="../icons/iGRLogo.jpeg" style="width: 100px; height: 100px;" align="center"> 
            	<p><b> Revenue Source</b></p> 
          	</div>
        </div>
        
	    
        <div class="col-md-6 col-lg-3">
          	<div class="widget-small danger coloured-icon"><i class="icon fa fa-list fa-3x"></i>
          		<img src="../icons/unnamed (1).png" style="width: 100px; height: 100px;" align="center"> 
            	<p><b>Daily Report</b></p>
          	</div>
        </div>
        <div class="col-md-6 col-lg-3">
          	<div class="widget-small primary coloured-icon"><i class="icon fa fa-plus fa-3x"></i>
          		<img src="../icons/unnamed (4).png" style="width: 100px; height: 100px;" align="center"> 
          		<p><b>Monthly Report</b></p>
          	</div>
        </div>
        <div class="col-md-6 col-lg-3">
          	<div class="widget-small info coloured-icon"><i class="icon fa fa-calendar fa-3x"></i>
          		<img src="../icons/events.png" style="width: 100px; height: 100px;" align="center"> 
            	<p><b>Yearly Report</b></p>
          	</div>
        </div>
        <div class="col-md-6 col-lg-3" onclick="location.href='my-details.php?staff_number=<?php echo $staff_number ?>';"> 
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-user fa-3x"></i>
              <img src="<?php echo '../ict-department/staff-passport/'.$staffDetails['staff_passport']; ?>" align="center" style="height:100px; width: 100px;">
              <p><b>My Details</b></p>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3" onclick="location.href='my-activities-log.php';">
          	<div class="widget-small info coloured-icon"><i class="icon fa fa-cloud fa-3x"></i>
          		<img src="../icons/images (211).png" style="width: 100px; height: 100px;" align="center"> 
          		<p><b>My Activity Log</b></p>
          	</div>
        </div>
        
     </div>
</main>
<?php
	require '../footer.php';
?>