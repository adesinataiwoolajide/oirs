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
        <div class="row"><?php
            $bank = $db->prepare("SELECT DISTINCT bank_name, sum(total_amount) as new_amount FROM vault WHERE bank_name='Wema Bank' ");
            $bank->execute();
            while($see_bank = $bank->fetch()){ ?>
                <div class="col-md-3" style="margin-bottom: 15px;">
                    <div class="card">
                        <div align="center"><?php 
                            if($see_bank['bank_name'] == "Wema Bank"){ ?>
                                <img src="admin/icons/wema.png" style="width: 200px; height: 100px;" align="center"><?php
                            }else{ ?>
                                <img src="admin/icons/FirstBank.png" style="width: 200px; height: 100px;" align="center"><?php     
                            } ?>
                                                
                            <p><b>&#8358;<?php echo  number_format($see_bank['new_amount'] )?></b></p> 
                        </div>         
                    </div>                            
                </div><?php
            } ?>

            <?php 
            $bank = $db->prepare("SELECT DISTINCT bank_name, sum(total_amount) as new_amount FROM vault WHERE bank_name='First Bank' ");
            $bank->execute();
            while($see_bank = $bank->fetch()){ ?>
                <div class="col-md-3" style="margin-bottom: 15px;">
                    <div class="card">
                        <div align="center"><?php 
                            if($see_bank['bank_name'] == "Wema Bank"){ ?>
                                <img src="admin/icons/wema.png" style="width: 200px; height: 100px;" align="center"><?php
                            }else{ ?>
                                <img src="admin/icons/FirstBank.png" style="width: 200px; height: 100px;" align="center"><?php     
                            } ?>
                                                
                            <p>&#8358;<b><?php echo  number_format($see_bank['new_amount'] )?></b></p> 
                        </div>         
                    </div>                            
                </div><?php
            } ?>

            <?php 
            $bank = $db->prepare("SELECT sum(total_amount) as new_amount FROM vault ");
            $bank->execute();
            while($see_bank = $bank->fetch()){ ?>
                <div class="col-md-3" style="margin-bottom: 15px;">
                    <div class="card">
                        <div align="center">
                            <img src="admin/icons/vault.png" style="width: 150px; height: 100px;" align="center">   
                                                
                            <p>&#8358;<b><?php echo  number_format($see_bank['new_amount'] )?></b></p> 
                        </div>         
                    </div>                            
                </div><?php
            } ?>

             <div class="col-md-3" style="margin-bottom: 15px;">
                <div class="card" onclick="location.href='bank-revenue-chart.php';">
                    <div align="center">
                        <img src="admin//icons/chart.png" style="width: 150px; height: 100px;" align="center">                    
                        <p><b>IGR Chart</b></p> 
                    </div>         
                </div>                            
            </div>

             <div class="col-md-3" style="margin-bottom: 15px;">
            <div class="card" onclick="location.href='daily-report.php';">
                <div align="center">
                    <img src="admin/icons/daily.png" style="width: 100px; height: 100px;" align="center">                    
                    <p><b>Daily Report</b></p> 
                </div>         
            </div>                            
        </div>

        <div class="col-md-3" style="margin-bottom: 15px;">
            <div class="card" onclick="location.href='monthly-report.php';">
                <div align="center">
                    <img src="admin/icons/monthly.jpg" style="width: 100px; height: 100px;" align="center">                    
                    <p><b>Monthly Report</b></p> 
                </div>         
            </div>                            
        </div>

        <div class="col-md-3" style="margin-bottom: 15px;">
            <div class="card" onclick="location.href='yearly-report.php';">
                <div align="center">
                    <img src="admin/icons/yearly.png" style="width: 100px; height: 100px;" align="center">                    
                    <p><b>Yearly Report</b></p> 
                </div>         
            </div>                            
        </div>
         <div class="col-md-3" style="margin-bottom: 15px;">
            <div class="card" onclick="location.href='my-payment.php';">
                <div align="center">
                    <img src="admin/icons/monthly.jpg" style="width: 100px; height: 100px;" align="center">                    
                    <p><b>Track My Payment</b></p> 
                </div>         
            </div>                            
        </div>

       
        </div>
    </main>
<?php
    require 'admin/footer.php';
?>