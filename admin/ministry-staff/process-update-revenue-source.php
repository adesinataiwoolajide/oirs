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

		if(isset($_POST['update-source'])){
			$email = $_SESSION['user_name'];
			$ministry_id= $all_purpose->sanitizeInput($_POST['ministry_id']);
			$sourcename = $all_purpose->sanitizeInput($_POST['source_name']);
			$revenue_amount = $all_purpose->sanitizeInput($_POST['revenue_amount']);
			$source_id = $_POST['source_id'];
			$source_name = strtoupper($sourcename);
			$minDetails = $minLocal->gettingMinistryIDDetails($ministry_id);
			$ministry_name = $minDetails['ministry_name'];
			
			
			if(!empty($revSouceing->updateRevenueSource($ministry_id, $source_name, $revenue_amount, $source_id))){
				$action ="Update $source_name In $ministry_name Revenue Source List";
        		$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = strtoupper("You Have Updated $source_name In $ministry_name Revenue Source List Successfully");
				$all_purpose->redirect("view-all-revenue-source.php");	
			}else{
				$return = $_POST['return'];
				$_SESSION['error']=strtoupper("Unable to Update $source_name In $ministry_name Revenue List at the moment, Please Try Again Later");
				$all_purpose->redirect($return);	
			}
		}else{
			$return = $_POST['return'];
			$_SESSION['error'] = "Please Fill The Below Form To Update The Revenue Details";
			$all_purpose->redirect($return);
		}

	}catch(PDOException $e){
		$return = $_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect($return);
	}
?>