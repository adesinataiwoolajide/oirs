<?php 
    require_once 'header.php';
    require_once 'side-bar.php';
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
                     <?php include("admin/includes/feed-back.php"); ?>
                    </div><?php 
                }  ?>
            </div>
            <div class="col-md-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3><p align="center" style="color: green">Please Enter Your Reciept Number Below </p></h3>
                            <form action="payment.php" method="post" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><i class="fa fa-lg fa-fw fa-book"></i>Reciept Number</label>
                                        <input class="form-control" type="text" name="reciept_number" placeholder="Enter The Ministry Name">
                                        <span style="color: red">** This Field is Required **</span>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12" align="center">
                                    <button class="btn btn-success" name="payment">GET PAYMENT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
    require 'admin/footer.php';
?>