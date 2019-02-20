<?php
    if(!isset($_SESSION['id'])){
        $_SESSION['error']="Please Login with your Details to Access the System";
       // header("Location: .././");
    }
    require("connection/connection.php");
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="">
        <!-- Twitter meta-->
        
        <title>OSUN STATE IGR</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class="app sidebar-mini rtl">
    <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="./"><img src="../icons/iGRLogo.png" style="width: 50px; height: 50px;" align="center"> </a>
          <!-- Sidebar toggle button-->
          <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
          <!-- Navbar Right Menu-->
            <ul class="app-nav">
            
                <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i><?php echo $_SESSION['name'] ?></a>
                    <ul class="dropdown-menu settings-menu dropdown-menu-right">
                        
                        <li><a class="dropdown-item" href="../log-out.php"><i class="fa fa-lock fa-lg"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </header>