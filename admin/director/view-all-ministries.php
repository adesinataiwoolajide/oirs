<?php
    require '../header.php';
    require '../ict-department/libs_dev/staff/staff_class.php';
   $staffBiodata = new staffBiodataIGR($db);
    require '../side-bar.php';
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1 style="color: green"><i class="fa fa-th-list"></i> State of Osun Ministries</h1>
            <p style="color: blue">List of All The Ministries in Osun State</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="view-all-ministries.php"><i class="fa fa-list"></i> View Ministries </a></li>
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
                <div class="tile-body"><?php
                    $min = $db->prepare("SELECT * FROM ministry ORDER BY ministry_name ASC");
                    $min->execute();
                    if($min->rowCount()==0){ ?>
                        <h5><p style="color: red"  align="center">The Ministry List is Empty, Please Click on Add Ministry To Add Ministry To The Minsitry List</p></h5><?php
                    }else{ ?>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <div>
                                <h1 style="color: green"><i class="fa fa-th-list"></i> State of Osun Ministries</h1>
                                <p style="color: blue">List of All The Ministries in Osun State</p>
                            </div>
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Ministry Name</th>
                                    <th>Ministry Code</th>
                                    <th>Ministry Logo</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Ministry Name</th>
                                    <th>Ministry Code</th>
                                    <th>Ministry Logo</th> 
                                </tr>
                            </tfoot>
                            <tbody><?php
                                $y=1;
                                while($see_ministry = $min->fetch()){ ?>
                                    <tr>
                                        <td><?php echo $y ?>
                                            
                                        </td>
                                        <td><?php echo $name= $see_ministry['ministry_name']; ?></td>
                                        <td><?php echo $ministry_code= $see_ministry['ministry_code']; ?></td>
                                        <td><img src="<?php echo '../ict-department/ministry-logo/'.$see_ministry['ministry_logo']; ?>" align="center" style="height:30px; width: 30px;"></td>
                                        
                                    </tr><?php
                                    $y++;
                                } ?>
                            </tbody>
                            
                        </table>
                        <div class="row d-print-none mt-2">
                            <div class="col-12 text-right">
                                <a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print Ministries List</a>
                            </div>
                        </div><?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function confirmToDelete(){
        return confirm("Click Okay to Delete Ministry Details and Cancel to Stop");
    }
</script>

<script>
    function confirmToEdit(){
        return confirm("Click okay to Edit Ministry and Cancel to Stop");
    }
</script>    
<?php require '../table-footer.php'; require '../alert.php'; ?>