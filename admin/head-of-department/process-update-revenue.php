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

		if(isset($_POST['update_revenue'])){
			$email = $_SESSION['user_name'];
			$local_govt_id= $_POST['local_govt_id'];
			$source_id = $all_purpose->sanitizeInput($_POST['source_id']);
			$payer_name = $all_purpose->sanitizeInput($_POST['payer_name']);
			$payer_phone = $all_purpose->sanitizeInput($_POST['payer_phone']);
			$payer_address=$all_purpose->sanitizeInput($_POST['payer_address']);
			$reciept_number = $_POST['reciept_number'];
			
			$sourceDetails = $revSouceing->seeRevenueourceID($source_id);
			$ministry_name = $_POST['ministry_name'];
			$staff_number = $_POST['staff_number'];
			$staff_name = $_POST['staff_name'];
			$source_name = $sourceDetails['source_name'];
			$local_govt_name = $_POST['local_govt_name'];
			
			if($localRevenue->updateLocalGovtRevenue($reciept_number, $local_govt_id, $staff_number, $source_id, $payer_name, $payer_phone, $payer_address)){
				$action ="Updated $payer_name 's Payment For $source_name with the Reciept Number $reciept_number To $ministry_name Revenue Account";
        		$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = strtoupper("You Have Updated $payer_name 's Payment For $source_name with the Reciept Number $reciept_number To $ministry_name Revenue Account Successfully");
				$all_purpose->redirect("view-all-revenue.php");	
			}else{
				$return=$_POST['return'];
				$_SESSION['error']=strtoupper("Unable to Add $payer_name 's Payment For $source_name with the Reciept Number $reciept_number To $ministry_name Revenue Account at the moment, Please Try Again Later");
				$all_purpose->redirect("$return");	
			}
		}else{
			$return=$_POST['return'];
			$_SESSION['error'] = "Please Fill The Below Form To Add The Customer Revenue To $ministry_name Revenue Account";
			$all_purpose->redirect("$return");
		}

	}catch(PDOException $e){
		$return=$_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("$return");
	}
?>