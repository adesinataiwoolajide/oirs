<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/local-ministry/local_ministry_class.php';
	try{
		$all_purpose = new all_purpose($db);
		$minLocal = new stateMinistry($db);

		if(isset($_GET['ministry_code'])){
			$email = $_SESSION['user_name'];
			$ministry_code = $_GET['ministry_code'];
			$ministry_name = $_GET['ministry_name'];
			
			if(!empty($minLocal->deleteTheMinistry($ministry_code))){
				$action ="Deleted $ministry_name with The Code Number $ministry_code From To The Ministry List";
        		$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = strtoupper("You Have Deleted $ministry_name with The Code Number $ministry_code From To The Ministry List Successfully");
				$all_purpose->redirect("view-all-ministries.php");	
			}else{
				$_SESSION['error']=strtoupper("Unable to Delete $ministry_name From The Ministry List at the moment, Please Try Again Later");
				$all_purpose->redirect("view-all-ministries.php");	
			}
		}else{
			$_SESSION['error'] = "Please Click On The Trash Icon To Delete The Ministry Details";
			$all_purpose->redirect("view-all-ministries.php");
		}

	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("view-all-ministries.php");
	}