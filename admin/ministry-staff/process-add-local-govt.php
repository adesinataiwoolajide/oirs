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
			$govt_code = $localMin->generateLocalGovtCode(); 

			$local_govt_name = strtoupper($localname);
			$cut = substr($local_govt_name, 0, 3);
			$local_govt_code = "OSUN/LGA/$cut/$govt_code";
			if($localMin->checkExistingLocalGovt($local_govt_name)){
				$_SESSION['error'] = strtoupper("You Have Added $local_govt_name To The Local Government List Before");
				$all_purpose->redirect("add-local-govt.php");	
			}else{
				if(!empty($localMin->addingLocalGovtName($local_govt_name, $local_govt_code))){
					$action ="Added $local_govt_name with Local Goverment Code $local_govt_code To The Local Goverment List";
            		$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					$_SESSION['success'] = strtoupper("You Have Added $local_govt_name To The Local Goverment List Successfully");
					$all_purpose->redirect("view-all-local-govt.php");	
				}else{
					$_SESSION['error']=strtoupper("Unable to Add $local_govt_name To The Local Goverment List at the moment, Please Try Again Later");
					$all_purpose->redirect("add-local-govt.php");	
				}
			}
		}else{
			$_SESSION['error'] = "Please Fill The Below Form To Add Local Goverment Details";
			$all_purpose->redirect("add-local-govt.php");
		}

	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("add-local-govt.php");
	}