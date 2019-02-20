<?php
	session_start();
	require("admin/connection/connection.php");
	require("admin/dev/general/all_purpose_class.php");
	 require 'admin/ict-department/libs_dev/local-ministry/local_ministry_class.php';
    require 'admin/ict-department/libs_dev/revenue/revenue_class.php';
    $minLocal = new stateMinistry($db);
    $localMin = new localMinistry($db);
    $revSouceing = new sourcesOfRevenue($db);
	try{
		$all_purpose = new all_purpose($db);
		if(isset($_POST['payment'])){
			$reciept_number = $all_purpose->sanitizeInput($_POST['reciept_number']);
			
			$check = $db->prepare("SELECT * FROM state_revenue WHERE reciept_number=:reciept_number");
			$arr = array(':reciept_number'=>$reciept_number);
			$check->execute($arr);
			if($check->rowCount()==0){
				$_SESSION['error'] = strtoupper("Ooos!!! $reciept_number Does Not Exist");
				$all_purpose->redirect("my-payment.php");	
			}else{
				while($see = $check->fetch()){
					$reciept_number = $see['reciept_number'];
					$all_purpose->redirect("payment-details.php?reciept_number=$reciept_number");
				}
			}
		}else{
			$_SESSION['error'] = "Please Fill The Below Form To Check Your Payment Details Details";
			$all_purpose->redirect("my-payment.php");
		}

	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("my-payment.php");
	}