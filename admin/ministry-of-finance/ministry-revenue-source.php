<?php
	require '../header.php';
    require 'libs_dev/staff/staff_class.php';
    $staffBiodata = new staffBiodataIGR($db);
	require '../side-bar.php';
?>
<main class="app-content">
    <div class="app-title">
        <div>
	         <h1 style="color: green"><i class="fa fa-th-list"></i> State of Osun Ministry Revenue Source</h1>
            <p style="color: blue">List of All The Ministries in Osun State</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item active"><a href="ministry-revenue-source.php"><i class="fa fa-list"></i> View By Ministry </a></li>
             <li class="breadcrumb-item active"><a href="view-all-revenue-source.php"><i class="fa fa-list"></i> View All Revenue Source </a></li>
            <li class="breadcrumb-item active"><a href="add-revenue-source.php"><i class="fa fa-plus"></i> Add Revenue Source</a></li>
          	<li class="breadcrumb-item"><a href="./"><i class="fa fa-home fa-lg"></i> Home Page</a></li>
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
        $mini = $db->prepare("SELECT * FROM ministry ORDER BY ministry_name ASC");
        $mini->execute();
        if($mini->rowCount() ==0){ ?>
            <h5><p style="color: red"  align="center">The Ministry List is Empty, Please Click on Add Ministry To Add Ministry To The Minsitry List</p></h5><?php
        }else{
            while($see_mini = $mini->fetch()){ 
                $ministry_code = $see_mini['ministry_code']; 
                $ministry_id = $see_mini['ministry_id']; ?>
                <div class="col-lg-4">
                    <div class="card" onclick="location.href='see_ministry_revenue_source.php?ministry_name=<?php echo $see_mini['ministry_name']?>&&ministry_code=<?php echo $ministry_code ?>&&ministry_id=<?php echo $ministry_id ?>';">
                        <div align="center">
                            <img src="<?php echo 'ministry-logo/'.$see_mini['ministry_logo']; ?>" align="center" style="height:100px; width: 100px;">  <?php
                            $min = substr($see_mini['ministry_name'], 0,40);   
                            ?>             
                            <p><?php echo $min ?></b></p> 
                        </div>         
                    </div>                            
                </div><?php
            }
        }?>

     </div>
</main>
<?php
	require '../footer.php';
?>