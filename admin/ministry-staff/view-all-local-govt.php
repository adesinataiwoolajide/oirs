<?php
    require '../header.php';
    require '../side-bar.php';
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1 style="color: green"><i class="fa fa-th-list"></i> State of Osun Local Government Areas</h1>
            <p style="color: blue">List of All The Local Government Area in Osun State</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="view-all-local-govt.php"><i class="fa fa-list"></i> View Local Govt </a></li>
            <li class="breadcrumb-item "><a href="add-local-govt.php"><i class="fa fa-plus"></i> Add Local Govt </a></li>
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
                    $min = $db->prepare("SELECT * FROM local_govt ORDER BY local_govt_name ASC");
                    $min->execute();
                    if($min->rowCount()==0){ ?>
                        <h5><p style="color: red">The Local Government List is Empty, Please Click on Add Local Government To Add Local Government To The Minsitry List</p></h5><?php
                    }else{ ?>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Local Govt Name</th>
                                    <th>Local Govt Code</th>
                                    <th>OPT</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Local Govt Name</th>
                                    <th>Local Govt Code</th>
                                    <th>OPT</th>
                                </tr>
                            </tfoot>
                            <tbody><?php
                                $y=1;
                                while($see_Local =$min->fetch()){ ?>
                                    <tr>
                                        <td><?php echo $y ?></td>
                                        <td><?php echo $name = $see_Local['local_govt_name']; ?></td>
                                        <td><?php echo $code =$see_Local['local_govt_code']; ?></td>
                                        <td>
                                            <a href="edit-local-government.php?local_govt_code=<?php echo $code ?>" class="btn btn-success" onclick="return(confirmToEdit());"><i class="fa fa-lg fa-fw fa-pencil"></i> </a> 
                                            <a href="delete-local-govt.php?local_govt_code=<?php echo $code ?>&&local_govt_name=<?php echo $name ?>" class="btn btn-danger" onclick="return(confirmToDelete());"><i class="fa fa-lg fa-fw fa-trash"></i> </a></td>
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
        return confirm("Click Okay to Delete Local Government Details and Cancel to Stop");
    }
</script>

<script>
    function confirmToEdit(){
        return confirm("Click okay to Edit Local Government and Cancel to Stop");
    }
</script>    
<?php require '../table-footer.php'; require '../alert.php'; ?>