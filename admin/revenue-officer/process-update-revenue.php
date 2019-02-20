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
			$prev_source = $_POST['prev_source'];
			$preDetails = $revSouceing->seePrevRevenueourceID($prev_source);
			$prev_amount = $preDetails['revenue_amount'];
			$revenue_amount = $sourceDetails['revenue_amount'];
			$ministry_name = $_POST['ministry_name'];
			$staff_number = $_POST['staff_number'];
			$staff_name = $_POST['staff_name'];
			$source_name = $sourceDetails['source_name'];
			$local_govt_name = $_POST['local_govt_name'];

			$bank_name = $_POST['bank_name'];
			$bank_branch = $_POST['branch_name'];
			
			$bank = $db->prepare("SELECT * FROM vault WHERE bank_name=:bank_name AND source_id=:source_id ORDER by vault_id DESC LIMIT 0,1");
			$ba = array(':bank_name'=>$bank_name, ':source_id'=>$source_id);
			$bank->execute($ba);
			if($bank->rowCount() == 0){
				$new_balance = $revenue_amount;
				$nev = $localRevenue->addPaymentFault($bank_name, $new_balance, $source_id);
			}else{
				$see_bal = $bank->fetch();
				$befo = $see_bal['total_amount'];
				$pre = $befo - $prev_amount;
				$new_balance = $pre + $revenue_amount;
				$vault_id = $see_bal['vault_id'];
				$hope = $localRevenue->updateVault($bank_name, $new_balance, $source_id, $vault_id);
			}
			
			if($localRevenue->updateLocalGovtRevenue($reciept_number, $local_govt_id, $staff_number, $source_id, $payer_name, $payer_phone, $payer_address, $bank_name, $bank_branch)){
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