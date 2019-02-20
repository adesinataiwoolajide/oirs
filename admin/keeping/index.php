<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OSUN STATE INTERNAL GENERATED REVENUE</title>

    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-success">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        
                        <?php
                        if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
                            <div class="alert alert-info" align="center">
                                <button class="close" data-dismiss="alert">
                                    <i class="ace-icon fa fa-times"></i>
                                </button>
                             <?php include("includes/feed-back.php"); ?>
                            </div><?php 
                        }  ?>
                        <div class="login-form">
                            <div class="col-lg-12" align="center">
                               <a href="./"> <img src="icons/iGRLogo.jpeg" style="height: 100px;" align="center"></a>
                            </div>
                            
                            <form action="process-login.php" class="form-horizontal" method="post">
                                <div class="form-group">
                                    <label><i class="ti-id-badge"></i> User Name</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Your User Name (E-MAIL)">
                                </div>
                                <div class="form-group">
                                    <label><i class="ti-lock"></i> Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Please Enter Your Password">
                                </div>
                                
                                <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">LOGIN TO ACCESS THE SYSTEM</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>