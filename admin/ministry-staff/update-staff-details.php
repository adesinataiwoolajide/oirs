<?php
	session_start();
	require("../connection/connection.php");
	require("../dev/general/all_purpose_class.php");
	require 'libs_dev/staff/staff_class.php';
	try{
		$all_purpose = new all_purpose($db);
		$staffBiodata = new staffBiodataIGR($db);
		$dir = "staff-passport/";
	    $file_name = $_FILES['image']['name'];
	    $file_size =$_FILES['image']['size'];
	    $file_tmp =$_FILES['image']['tmp_name'];
	    $file_type=$_FILES['image']['type'];
	    $file_ext = pathinfo($file_name);

		if(isset($_POST['update_staff'])){
			$email = $_SESSION['user_name'];
			$staff_passport = $file_name;
			$staff_name = $all_purpose->sanitizeInput($_POST['staff_name']);
			$sex = $all_purpose->sanitizeInput($_POST['sex']);
			$birth_date = $all_purpose->sanitizeInput($_POST['birth_date']);
			$local_govt_id = $all_purpose->sanitizeInput($_POST['local_govt_id']);
			$ministry_id = $all_purpose->sanitizeInput($_POST['ministry_id']);
			$year_of_employment = $all_purpose->sanitizeInput($_POST['year_employ']);
			$category_id = $all_purpose->sanitizeInput($_POST['category_id']);
			$staff_email = $_POST['staff_email'];
			$staff_phone = $all_purpose->sanitizeInput($_POST['staff_phone']);
			$state_origin= $all_purpose->sanitizeInput($_POST['state_origin']);
			$staff_level = $all_purpose->sanitizeInput($_POST['staff_level']);
			$type_id =  $all_purpose->sanitizeInput($_POST['type_id']);
			$staff_number = $_POST['staff_number'];
			$user_id = $_POST['user_id'];
			$full_name = $staff_name;
			$eemail= $staff_email;
			$password = sha1($staff_email);
			$user_id = $_POST['user_id'];
			$access = $type_id;
			if (empty($file_name)) {
				$updateTheDetails = $db->prepare("UPDATE staff_biodata SET staff_name=:staff_name, sex=:sex, birth_date=:birth_date, local_govt_id=:local_govt_id, ministry_id=:ministry_id, year_of_employment=:year_of_employment, category_id=:category_id, staff_email=:staff_email, staff_phone=:staff_phone, state_origin=:state_origin, staff_level=:staff_level, type_id=:type_id WHERE staff_number=:staff_number");
				$arrUpdate= array(':staff_name'=>$staff_name, ':staff_number'=>$staff_number, ':sex'=>$sex, ':birth_date'=>$birth_date, ':local_govt_id'=>$local_govt_id, ':ministry_id'=>$ministry_id, ':year_of_employment'=>$year_of_employment, ':category_id'=>$category_id, ':staff_email'=>$staff_email, ':staff_phone'=>$staff_phone, ':state_origin'=>$state_origin, ':staff_level'=>$staff_level, ':type_id'=>$type_id);

				$update = $db->prepare("UPDATE admin_login SET full_name=:full_name, user_name=:staff_email, password=:password, access_level=:access WHERE user_id=:user_id");
				$arrD = array(':full_name'=>$full_name, ':password'=>$password, ':staff_email'=>$staff_email, ':user_id'=>$user_id, 
					':access'=>$access);
				if(!empty($updateTheDetails->execute($arrUpdate)) AND (!empty($update->execute($arrD)))){
				//if(($staffBiodata->updateStaffDetailsWithOutPassport($staff_name, $staff_number, $sex,$birth_date, $local_govt_id, $ministry_id, $year_of_employment, $category_id, $staff_email, $staff_phone, $state_origin, $staff_level, $type_id))AND($staffBiodata->updateUserLoginDetails($user_id, $full_name, $staff_email, $password, $access))){
					$action ="Updated $staff_number Details";
					$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
					$_SESSION['success']="You Have Updated $staff_name Details Updated Successfully";
					$all_purpose->redirect("staff-details.php?staff_number=$staff_number");
				}else{
					$return = $_POST['return'];
			    	$_SESSION['error']="Unable to Update The Staff Details At The Moment, Please Try Again Later";
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
		    		$updateTheDetails = $db->prepare("UPDATE staff_biodata SET staff_passport=:staff_passport, staff_name=:staff_name, sex=:sex, birth_date=:birth_date, local_govt_id=:local_govt_id, ministry_id=:ministry_id, year_of_employment=:year_of_employment, category_id=:category_id, staff_email=:staff_email, staff_phone=:staff_phone, state_origin=:state_origin, staff_level=:staff_level, type_id=:type_id WHERE staff_number=:staff_number");
					$arrUpdate= array(':staff_passport'=>$staff_passport, ':staff_name'=>$staff_name, ':staff_number'=>$staff_number, ':sex'=>$sex, ':birth_date'=>$birth_date, ':local_govt_id'=>$local_govt_id, ':ministry_id'=>$ministry_id, ':year_of_employment'=>$year_of_employment, ':category_id'=>$category_id, ':staff_email'=>$staff_email, ':staff_phone'=>$staff_phone, ':state_origin'=>$state_origin, ':staff_level'=>$staff_level, ':type_id'=>$type_id);

					$update = $db->prepare("UPDATE admin_login SET full_name=:full_name, user_name=:staff_email, password=:password, access_level=:access WHERE user_id=:user_id");
					$arrD = array(':full_name'=>$full_name, ':password'=>$password, ':staff_email'=>$staff_email, ':user_id'=>$user_id, 
						':access'=>$access);
					if(!empty($updateTheDetails->execute($arrUpdate)) AND (!empty($update->execute($arrD)))){
		    		//if(($staffBiodata->updateStaffDetailsWithPassport($staff_passport, $staff_name, $staff_number, $sex,$birth_date, $local_govt_id, $ministry_id, $year_of_employment, $category_id, $staff_email, $staff_phone, $state_origin, $staff_level, $type_id) AND ($staffBiodata->updateUserLoginDetails($user_id, $full_name, $staff_email, $password, $access)))){
		    			$action ="Updated $staff_number Details and Changed The Staff Passport";
						$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
						$_SESSION['success'] = "You Have Updated $staff_name Details And Changed The Staff Passport Successfully";
						$all_purpose->redirect("staff-details.php?staff_number=$staff_number");
					}else{
						$return = $_POST['return'];
				    	$_SESSION['error']="Unable to Update The Staff Details and Change The Staff Passport At The Moment, Please Try Again Later";
				        $all_purpose->redirect("$return");
					}
		    	}
			}	
		}else{
			$return = $_POST['return'];
			$_SESSION['error'] = "Please Fill The Below Form To Add The Staff Details";
			$all_purpose->redirect("$return");
		}
	}catch(PDOException $e){
		$return = $_POST['return'];
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("$return");
	}