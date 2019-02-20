<?php
    require '../header.php';
    require '../side-bar.php';
    require 'libs_dev/local-ministry/local_ministry_class.php';
    $minstryDetails = new stateMinistry($db);
    $localDetails = new localMinistry($db);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1 style="color: green"><i class="fa fa-th-list"></i> State of Osun Staff </h1>
            <p style="color: blue">List of All The Civil Servants in Osun State</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="view-all-staffs.php">View All Staff </a></li>
            <li class="breadcrumb-item active"><a href="add-staff-biodata.php">Add Staff </a></li>
            
            <li class="breadcrumb-item"><a href="./">Home Page</a></li>
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
                    $min = $db->prepare("SELECT * FROM staff_biodata ORDER BY staff_name ASC");
                    $min->execute();
                    if($min->rowCount()==0){ ?>
                        <h5><p style="color: red" align="center">The Staff List is Empty, Please Click on Add Staff To Add Staff To The Staff List</p></h5><?php
                    }else{ ?>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Passport</th>
                                    <th>Staff Name</th>
                                    <th>Staff Number</th>
                                    <th>Staff E-Mail</th>
                                    <th>Local Govt</th>
                                    <th>Ministry</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Passport</th>
                                    <th>Staff Name</th>
                                    <th>Staff Number</th>
                                    <th>Staff E-Mail</th>
                                    <th>Local Govt</th>
                                    <th>Ministry</th>
                                    <th>Operations</th>
                                </tr>
                            </tfoot>
                            <tbody><?php
                                $y=1;
                                while($see_Staff = $min->fetch()){ ?>
                                    <tr>
                                        <td><?php echo $y ?></td>
                                        <td><?php echo $name= $see_Staff['staff_name']; ?></td>
                                        <td><?php echo $staff_number= $see_Staff['staff_number']; ?></td>
                                        <td><img src="<?php echo 'staff-passport/'.$see_Staff['staff_passport']; ?>" align="center" style="height:30px; width: 30px;"></td>
                                        <td><?php echo $see_Staff['staff_email']; ?></td>
                                        <td><?php $local_govt_id= $see_Staff['local_govt_id']; 
                                            $depo = $localDetails->gettingLocalGocyIDDetails($local_govt_id); 
                                            echo $depo['local_govt_name']; ?></td>
                                        <td><?php $ministry_id = $see_Staff['ministry_id']; 
                                            $sola= $minstryDetails->gettingMinistryIDDetails($ministry_id); 
                                            echo $sola['ministry_name']; ?></td>
                                        <td>
                                            <a href="staff-details.php?staff_number=<?php echo $staff_number ?>"  onclick="return(confirmToEdit());"><i class="fa fa-lg fa-fw fa-user"></i>  </a>
                                            <a href="edit-staff-details.php?staff_number=<?php echo $staff_number ?>"  onclick="return(isConfirm());"><i class="fa fa-lg fa-fw fa-pencil"></i></a> 
                                            <a href="delete-Staff.php?staff_number=<?php echo $staff_number ?>&&Staff_name=<?php echo $name; ?>"  onclick="return(confirmToDelete());"><i class="fa fa-lg fa-fw fa-trash"></i> </a>
                                        </td>
                                    </tr><?php
                                    $y++;
                                } ?>
                            </tbody>
                        </table><?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function confirmToDelete(){
        return confirm("Click Okay to Delete Staff Details and Cancel to Stop");
    }
</script>

<script>
    function confirmToEdit(){
        return confirm("Click okay to Edit Staff and Cancel to Stop");
    }
</script>    
<?php require '../table-footer.php'; require '../alert.php'; ?>