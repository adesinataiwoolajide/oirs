<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/local-ministry/local_ministry_class.php';
	try{
		$all_purpose = new all_purpose($db);
		$localMin = new localMinistry($db);

		if(isset($_GET['local_govt_code'])){
			$email = $_SESSION['user_name'];
			$local_govt_code = $_GET['local_govt_code'];
			$local_govt_name = $_GET['local_govt_name'];
			
			if(!empty($localMin->deleteTheLovalGovt($local_govt_code))){
				$action ="Deleted $local_govt_name with The Code Number $local_govt_code From To The Local Goverment List";
        		$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = strtoupper("You Have Deleted $local_govt_name with The Code Number $local_govt_code From To The Local Goverment List Successfully");
				$all_purpose->redirect("view-all-local-govt.php");	
			}else{
				$_SESSION['error']=strtoupper("Unable to Delete $local_govt_name From The Local Goverment List at the moment, Please Try Again Later");
				$all_purpose->redirect("view-all-local-govt.php");	
			}
		}else{
			$_SESSION['error'] = "Please Click On The Trash Icon To Delete The Local Goverment Details";
			$all_purpose->redirect("view-all-local-govt.php");
		}

	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("view-all-local-govt.php");
	}