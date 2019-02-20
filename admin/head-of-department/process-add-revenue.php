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

		if(isset($_POST['add_revenue'])){
			$email = $_SESSION['user_name'];
			$local_govt_id= $_POST['local_govt_id'];
			$source_id = $all_purpose->sanitizeInput($_POST['source_id']);
			$payer_name = $all_purpose->sanitizeInput($_POST['payer_name']);
			$payer_phone = $all_purpose->sanitizeInput($_POST['payer_phone']);
			$payer_address=$all_purpose->sanitizeInput($_POST['payer_address']);
			
			$sourceDetails = $revSouceing->seeRevenueourceID($source_id);
			$ministry_name = $_POST['ministry_name'];
			$staff_number = $_POST['staff_number'];
			$staff_name = $_POST['staff_name'];
			//$minDetails = $minLocal->gettingMinistryIDDetails($ministry_id);
			$source_name = $sourceDetails['source_name'];
			//$ministry_name = $minDetails['ministry_name'];
			$local_govt_name = $_POST['local_govt_name'];
			$cuting = substr($local_govt_name, 0, 3);
			$number_type = "Reciept Number";

			$month = date("m");
			$number_year = date("Y");
			$break = substr($number_year, 2,2);
			$category = $number_type;
			$year_employ = $number_year;

			$getting = $db->prepare("SELECT * FROM generated_numbers WHERE year_number=:number_year AND number_type=:number_type AND month=:month ORDER BY last_id DESC LIMIT 0,1");
    		$arrget= array(':number_year'=>$number_year, ':number_type'=>$number_type, ':month'=>$month);
    		$getting->execute($arrget);
    		if($getting->rowCount()==0){
				$new_number = 0;
				$adding = $new_number+1;
			}else{
				$see_last = $getting->fetch();
				$conf = $see_last['last_number'];
				$adding = $conf+1;
			}
			$code_name = "OS/$cuting/$month/$break/";
			if(strlen($adding)>2){
				$dot="";
			}else{
				$dot ="00";
			}
			$receipt_number =$code_name.$dot.$adding;
			$numbers = $dot.$adding;

			if(!empty($localRevenue->addingStaffRevenue($local_govt_id, $staff_number, $source_id, $payer_name, $payer_phone, $payer_address, $receipt_number))AND (!empty($staffBiodata->insertingTheLastNumber($category, $numbers, $year_employ, $month)))){
				$action ="Added $payer_name 's Payment For $source_name with the Reciept Number $receipt_number To $ministry_name Revenue Account ";
        		$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
				$_SESSION['success'] = strtoupper("You Have Added $payer_name 's Payment For $source_name with the Reciept Number $receipt_number To $ministry_name Revenue Account Successfully");
				$all_purpose->redirect("view-all-revenue.php");	
			}else{
				$_SESSION['error']=strtoupper("Unable to Add $payer_name 's Payment For $source_name To $ministry_name Revenue Account at the moment, Please Try Again Later");
				$all_purpose->redirect("add-revenue.php");	
			}
		}else{
			$_SESSION['error'] = "Please Fill The Below Form To Add The Customer Revenue To $ministry_name Revenue Account";
			$all_purpose->redirect("add-revenue.php");
		}

	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("add-revenue.php");
	}
?>