<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/local-ministry/local_ministry_class.php';
	try{
		$all_purpose = new all_purpose($db);
		$localMin = new localMinistry($db);

		if(isset($_POST['add-local'])){
			$email = $_SESSION['user_name'];
			$localname = $all_purpose->sanitizeInput($_POST['local_govt_name']);
			
			$local_govt_name = strtoupper($localname);
			$local_govt_code = $_POST['local_govt_code'];
			$prev_name = $_POST['prev_name'];
			
			if(!empty($localMin->updateLocalGovt($local_govt_name, $local_govt_code))){
				$action ="Updated The Local Goverment Name From $prev_name To $local_govt_name";
        		$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = strtoupper("You Have Updated The Local Goverment Details From $prev_name to $local_govt_name Successfully");
				$all_purpose->redirect("view-all-local-govt.php");	
			}else{
				$return = $_POST['return'];
				$_SESSION['error']=strtoupper("Unable to Add $local_govt_name To The Local Goverment List at the moment, Please Try Again Later");
				$all_purpose->redirect("$return");	
			}

		}else{
			$return = $_POST['return'];
			$_SESSION['error'] = "Please Fill The Below Form Update The Local Goverment Details";
			$all_purpose->redirect("$return");
		}

	}catch(PDOException $e){
		$return = $_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("$return");
	}