<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/local-ministry/local_ministry_class.php';
	require 'libs_dev/revenue/revenue_class.php';
	try{
		$all_purpose = new all_purpose($db);
		$minLocal = new stateMinistry($db);
		$revSouceing = new sourcesOfRevenue($db);

		if(isset($_GET['revenue_source_id'])){
			$email = $_SESSION['user_name'];
			$source_id= $_GET['revenue_source_id'];
			$revenue_source_name = $_GET['revenue_source_name'];
			$ministry_code = $_GET['ministry_code'];
			$ministry_id = $_GET['ministry_id'];
			$revDet =$revSouceing->seeRevenueourceID($source_id);
			$minDetails = $minLocal->gettingMinistryIDDetails($ministry_id);
			$ministry_name = $minDetails['ministry_name'];
			
			
			if(!empty($revSouceing->deteleRevenueSource($source_id))){
				$action ="Deleted $revenue_source_name From $ministry_name Revenue Source List";
        		$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success']=strtoupper("You Have Deleted $revenue_source_name From $ministry_name Revenue Source List Successfully");
				$all_purpose->redirect("view-all-revenue-source.php");	
			}else{
				$_SESSION['error']=strtoupper("Unable to Delete $revenue_source_name From $ministry_name Revenue Source List at the moment, Please Try Again Later");
				$all_purpose->redirect("view-all-revenue-source.php");	
			}
		}else{
			$_SESSION['error'] = "Please Click On The Trash Icon to Delete The Revenue Source";
			$all_purpose->redirect("view-all-revenue-source.php");
		}

	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("view-all-revenue-source.php");
	}
?>