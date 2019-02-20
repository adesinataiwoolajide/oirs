<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/local-ministry/local_ministry_class.php';
	try{
		$all_purpose = new all_purpose($db);
		$minLocal = new stateMinistry($db);

		$dir = "ministry-logo/";
	    $file_name = $_FILES['image']['name'];
	    $file_size =$_FILES['image']['size'];
	    $file_tmp =$_FILES['image']['tmp_name'];
	    $file_type=$_FILES['image']['type'];
	    $file_ext = pathinfo($file_name);
	    $ext = $file_ext['extension'];
	    $extensions= array("jpeg","jpg","png", "JPEG", "JPG", "PNG");
	    
	    if(!(in_array($ext,$extensions))){
	    	$_SESSION['error']="Image Extension not allowed, Please choose a JPEG or PNG file.";
	        $all_purpose->redirect("add-ministry.php");	
     	}
		if($file_size > 2097152){
          	$_SESSION['error'] = 'File size must be not greater than 2 MB';
          	$all_purpose->redirect("add-ministry.php");	
    	}else{
			if(isset($_POST['add-ministry'])){
				$email = $_SESSION['user_name'];
				$ministryname = $all_purpose->sanitizeInput($_POST['ministry_name']);
				$code = $minLocal->generateMinistryCode();
				$ministry_code = "OSUN/MIN/".$code;
				$ministry_name = strtoupper($ministryname);
				$ministry_logo = $file_name;

				if($minLocal->checkExistingMinistry($ministry_name)){
					$_SESSION['error'] = strtoupper("You Have Added $ministry_name To The Ministry List Before");
					$all_purpose->redirect("add-ministry.php");	

				}elseif($minLocal->chekingTheMinstryImage($ministry_logo)){
					$_SESSION['error'] = strtoupper("The Selected Image is Already In Use By Another Ministry <br> Please Rename The Image or Choose Another Image For $ministry_name");
					$all_purpose->redirect("add-ministry.php");
				}else{
					$move= move_uploaded_file($file_tmp, $dir.$file_name);
					if(!empty($minLocal->addingMinistryName($ministry_name, $ministry_code, $ministry_logo))){
						$action ="Added $ministry_name with Ministry Code $ministry_code To The Ministry List";
                		$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
						$_SESSION['success'] = strtoupper("You Have Added $ministry_name To The Ministry List Successfully");
						$all_purpose->redirect("view-all-ministries.php");	
					}else{
						$_SESSION['error']=strtoupper("Unable to Add $ministryname To The Ministry List at the moment, Please Try Again Later");
						$all_purpose->redirect("add-ministry.php");	
					}
				}
			}else{
				$_SESSION['error'] = "Please Fill The Below Form To Add Ministry Details";
				$all_purpose->redirect("add-ministry.php");
			}

		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("add-ministry.php");
	}