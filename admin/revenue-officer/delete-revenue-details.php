<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require '../ict-department/libs_dev/staff/staff_class.php';
	require '../ict-department/libs_dev/local-ministry/local_ministry_class.php';
	require '../ict-department/libs_dev/revenue/revenue_class.php';
	try{
		$all_purpose = new all_purpose($db);
		$minLocal = new stateMinistry($db);
		$revSouceing = new sourcesOfRevenue($db);
		$localRevenue = new localGovtAddRevenue($db);
		$staffBiodata = new staffBiodataIGR($db);

		if(isset($_GET['customer_reciept_number'])){
			$email = $_SESSION['user_name'];
			
			$reciept_number = $_GET['customer_reciept_number'];
			$local_govt_name = $_GET['local_govt_name'];
			$ministry_name = $_GET['ministry_name'];

			$recieptDetails = $localRevenue->gettingRevenueReciept($reciept_number);
			$source_id = $recieptDetails['source_id'];
			$payer_name = $recieptDetails['payer_name'];
			$sourceDetails = $revSouceing->seeRevenueourceID($source_id);
			$source_name = $sourceDetails['source_name'];
			
			if($localRevenue->deleteLocalRev($reciept_number)){
				$action ="Deleted Payment Made by $payer_name with the Reciept Number $reciept_number for $source_name From $ministry_name Revenue Account";
        		$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = strtoupper("You Have Deleted Payment Made by $payer_name with the Reciept Number $reciept_number for $source_name From $ministry_name Revenue Account Successfully");
				$all_purpose->redirect("view-all-revenue.php");	
			}else{
				
				$_SESSION['error']=strtoupper("Unable to Deleted Payment Made by $payer_name with the Reciept Number $reciept_number for $source_name From $ministry_name Revenue Account at the moment, Please Try Again Later");
				$all_purpose->redirect("view-all-revenue.php");	
			}
		}else{
			
			$_SESSION['error'] = "Please Click on the Trash CAN to delete the Revenue Details";
			$all_purpose->redirect("view-all-revenue.php");
		}

	}catch(PDOException $e){
		
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("view-all-revenue.php");
	}
?>