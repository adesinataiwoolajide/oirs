
<?php
    require '../header.php';
    require '../ict-department/libs_dev/staff/staff_class.php';
    $staffBiodata = new staffBiodataIGR($db);
    require '../side-bar.php';
    require '../ict-department/libs_dev/local-ministry/local_ministry_class.php';
    require '../ict-department/libs_dev/revenue/revenue_class.php';
    $minLocal = new stateMinistry($db);
    $localMin = new localMinistry($db);
    $revSouceing = new sourcesOfRevenue($db);
    $localRevenue = new localGovtAddRevenue($db);

    $staff_email  = $_SESSION['user_name'];
    $staffDetails = $staffBiodata->seestaff_biodataEmailDetails($staff_email);
    $staff_name = $staffDetails['staff_name'];
    $staff_number = $staffDetails['staff_number'];
    $ministry_id = $staffDetails['ministry_id'];
    $local_govt_id = $staffDetails['local_govt_id'];
    $localDetails = $localMin->gettingLocalGocyIDDetails($local_govt_id);
    //$revDet = $revSouceing->gettingMinistryRevenue($ministry_id);
    $minDetails = $minLocal->gettingMinistryIDDetails($ministry_id);
    $ministry_name = $minDetails['ministry_name'];
    $local_govt_name = $localDetails['local_govt_name'];
    $reciept_number = $_GET['customer_reciept_number'];
    $recieptDetails = $localRevenue->gettingRevenueReciept($reciept_number);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1 style="color: green"><i class="fa fa-th-list"></i> State of Osun Revenue </h1>
            <p style="color: blue">MINISTRY OF FINANCE REVENUE PAYMENT RECIEPT</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
        	<li class="breadcrumb-item active"><a href="print-reciept.php?customer_reciept_number=<?php echo $reciept_number?>"><i class="fa fa-print"></i> Print Reciept </a></li>
            <li class="breadcrumb-item active"><a href="view-all-revenue.php"><i class="fa fa-list"></i> View All Revenue </a></li>
            <li class="breadcrumb-item active"><a href="add-revenue.php"><i class="fa fa-plus"></i> Add Revenue</a></li>
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
                    $min=$db->prepare("SELECT * FROM state_revenue WHERE staff_number=:staff_number AND reciept_number=:reciept_number");
                    $minarr = array(':staff_number'=>$staff_number, ':reciept_number'=>$reciept_number);
                    $min->execute($minarr); ?>
                    <div align="center">
                    	<img src="../icons/iGRLogo.png" style="width: 100px; height: 100px;" align="center">  
			            <h1 style="color: green"><i class="fa fa-th-list"></i> OSUN STATE INLAND REVENUE SERVICE</h1>
			            <p style="color: blue">MINISTRY OF FINANCE REVENUE PAYMENT RECIEPT</p>
			        </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                    	<strong>
                    	<tbody>
                    		<tr>
                    			<td>Reciept Number </td>
                    			<td><?php echo $reciept_number ?></td>
                    		</tr>
                    	</tbody>
                    	<tbody>
                    		<tr>
                    			<td>Payment Purpose </td>
                    			<td><?php 
                    				$source_id = $recieptDetails['source_id'];
                                	$sourceDetails = $revSouceing->seeRevenueourceID($source_id); 
                                	echo $revenue_source_name= $sourceDetails['source_name']; ?>	
                                </td>
                    		</tr>
                    	</tbody>
                        <tbody>
                            <tr>
                                <td>Bank Name </td>
                                <td><?php echo $recieptDetails['bank_name']. " ". $recieptDetails['bank_branch']; ?></td>
                            </tr>
                        </tbody>
                    	<tbody>
                    		<tr>
                    			<td>Amount Paid </td>
                    			<td><?php echo "#". $sourceDetails['revenue_amount']; ?></td>
                    		</tr>
                    	</tbody>
                    	<tbody>
                    		<tr>
                    			<td>Payer's Name </td>
                    			<td><?php echo $recieptDetails['payer_name']; ?></td>
                    		</tr>
                    	</tbody>
                    	<tbody>
                    		<tr>
                    			<td>Payer's Phone Number </td>
                    			<td><?php echo $recieptDetails['payer_phone']; ?></td>
                    		</tr>
                    	</tbody>
                    	<tbody>
                    		<tr>
                    			<td>Payer's Address </td>
                    			<td><?php echo $recieptDetails['payer_address']; ?></td>
                    		</tr>
                    	</tbody>
                    	<tbody>
                    		<tr>
                    			<td>Time pf Payment </td>
                    			<td><?php echo $recieptDetails['time_added']; ?></td>
                    		</tr>
                    	</tbody>

                    	<tbody>
                    		<tr>
                    			<td>Staff In Charge </td>
                    			<td><?php echo $staff_name; ?></td>
                    		</tr>
                    	</tbody>
                    	<tbody>
                    		<tr>
                    			<td><p>Time Printed <?php echo date("d-m-Y") ?></p></td>
                    			<td>
									<img src="../icons/red-approved.gif" align="right" style="margin-top: -5px; width: 250px; height: 150px; margin-right: -10px;">
								</td>
                    		</tr>
                    	</tbody>
                    	</strong>
                    	
                    </table>
                    <div class="row d-print-none mt-2">
		                <div class="col-12 text-right">
		                	<a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print Reciept</a>
		                </div>
		            </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require '../table-footer.php'; require '../alert.php'; ?>