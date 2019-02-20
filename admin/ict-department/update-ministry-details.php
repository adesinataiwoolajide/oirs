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

		if(isset($_POST['update-ministry'])){
			$email = $_SESSION['user_name'];
			$ministryname = $all_purpose->sanitizeInput($_POST['ministry_name']);
			$code = $minLocal->generateMinistryCode();
			$ministry_code = $_POST['ministry_code'];
			$prev_name = $_POST['prev_name'];
			$ministry_name = strtoupper($ministryname);
			$ministry_logo = $file_name;

			if(empty($ministry_logo)){
				if($minLocal->updateMinistryWithOutImage($ministry_name, $ministry_code)){
					$action ="Updated The Ministry Name From $prev_name To $ministry_name";
					$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					$_SESSION['success']="You Have Updated The Ministry Name From $prev_name To $ministry_name Successfully";
			        $all_purpose->redirect("view-all-ministries.php");
				}else{
					$return = $_POST['return'];
			    	$_SESSION['error']="Unable to Update The Ministry Details At The Moment, Please Try Again Later";
			        $all_purpose->redirect("$return");
				}
			}else{
				$ext=$file_ext['extension'];
				$extensions= array("jpeg","jpg","png", "JPEG", "JPG", "PNG");
			    $move= move_uploaded_file($file_tmp, $dir.$file_name);
			    if(!(in_array($ext,$extensions))){
			    	$return = $_POST['return'];
			    	$_SESSION['error']="Image Extension not allowed, Please choose a JPEG or PNG file.";
			        $all_purpose->redirect("$return");	
		     	}
				if($file_size > 2097152){
					$return = $_POST['return'];
		          	$_SESSION['error'] = 'File size must be not greater than 2 MB';
		          	$all_purpose->redirect("$return");	
		    	}else{	
		    		if($minLocal->updateMinistryWithImage($ministry_name, $ministry_code, $ministry_logo)){
						$action ="Updated The Ministry Name From $prev_name To $ministry_name Details And Changed The Ministry Logo";
						$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
						$_SESSION['success'] = "You Have Updated The Ministry Name From $prev_name To $ministry_name Details And Changed The Ministry Logo Successfully";
						$all_purpose->redirect("view-all-ministries.php");
					}else{
						$return = $_POST['return'];
				    	$_SESSION['error']="Unable to Update The Ministry Details and Change The Ministry Logo At The Moment, Please Try Again Later";
				        $all_purpose->redirect("$return");
					}
		    	}
			}
	
		}else{
			$return = $_POST['return'];
			$_SESSION['error'] = "Please Fill The Below Form To Update The Ministry Details";
			$all_purpose->redirect("$return");
		}

	}catch(PDOException $e){
		$return = $_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("$return");
	}