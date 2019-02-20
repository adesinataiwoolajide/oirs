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

		if(isset($_POST['add-source'])){
			$email = $_SESSION['user_name'];
			$ministry_id= $all_purpose->sanitizeInput($_POST['ministry_id']);
			$sourcename = $all_purpose->sanitizeInput($_POST['source_name']);
			$revenue_amount = $all_purpose->sanitizeInput($_POST['revenue_amount']);
			$source_name = strtoupper($sourcename);
			$minDetails = $minLocal->gettingMinistryIDDetails($ministry_id);
			$ministry_name = $minDetails['ministry_name'];
			
			if($revSouceing->checkRevenueource($source_name)){
				$_SESSION['error'] = strtoupper("You Have Added $source_name To $ministry_name Revenue List Before");
				$all_purpose->redirect("add-revenue-source.php");	
			}else{
				if(!empty($revSouceing->insertRevenueSource($ministry_id, $source_name, $revenue_amount))){
					$action ="Added $source_name To $ministry_name Revenue List";
            		$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					$_SESSION['success'] = strtoupper("You Have Added $source_name To $ministry_name Revenue List Successfully");
					$all_purpose->redirect("view-all-revenue-source.php");	
				}else{
					$_SESSION['error']=strtoupper("Unable to Add $source_name To $ministry_name Revenue List at the moment, Please Try Again Later");
					$all_purpose->redirect("add-revenue-source.php");	
				}
			}
		}else{
			$_SESSION['error'] = "Please Fill The Below Form To Add Revenue Source Details";
			$all_purpose->redirect("add-revenue-source.php");
		}

	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("add-revenue-source.php");
	}
?>