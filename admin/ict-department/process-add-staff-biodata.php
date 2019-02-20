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
	    $ext = $file_ext['extension'];
	    $extensions= array("jpeg","jpg","png", "JPEG", "JPG", "PNG");

	    if(!(in_array($ext,$extensions))){
	    	$_SESSION['error']="Image Extension not allowed, Please choose a JPEG or PNG file.";
	        $all_purpose->redirect("add-staff-biodata.php");	
     	}elseif($file_size > 2097152){
          	$_SESSION['error'] = 'File size must be not greater than 2 MB';
          	$all_purpose->redirect("add-staff-biodata.php");	
    	}else{

			if(isset($_POST['add_Staff'])){
				$email = $_SESSION['user_name'];
				$staff_passport = $file_name;
				$staff_name = $all_purpose->sanitizeInput($_POST['staff_name']);
				$sex = $all_purpose->sanitizeInput($_POST['sex']);
				$birth_date = $all_purpose->sanitizeInput($_POST['birth_date']);
				$local_govt_id = $all_purpose->sanitizeInput($_POST['local_govt_id']);
				$ministry_id = $all_purpose->sanitizeInput($_POST['ministry_id']);
				$year_of_employment = $all_purpose->sanitizeInput($_POST['year_employ']);
				$category_id = $all_purpose->sanitizeInput($_POST['category_id']);
				$staff_email = $all_purpose->sanitizeInput($_POST['staff_email']);
				$staff_phone = $all_purpose->sanitizeInput($_POST['staff_phone']);
				$state_origin = $all_purpose->sanitizeInput($_POST['state_origin']);
				$staff_level = $all_purpose->sanitizeInput($_POST['staff_level']);
				$type_id =  $all_purpose->sanitizeInput($_POST['type_id']);
				$number_type="Staff Number";
				$category= $number_type;
				$break = substr($year_of_employment, 2,2);
				$year_employ = $year_of_employment;
				$full_name = $staff_name;
				$eemail= $staff_email;
				$password = sha1($staff_email);
				$access = $type_id;

				$getting = $db->prepare("SELECT * FROM generated_numbers WHERE year_number=:year_of_employment AND number_type=:number_type ORDER BY last_id DESC LIMIT 0,1");
	    		$arrget= array(':year_of_employment'=>$year_of_employment, ':number_type'=>$number_type);
	    		$getting->execute($arrget);
	    		if($getting->rowCount()==0){
					$new_number =0;
					$adding = $new_number+1;
				}else{
					$see_last = $getting->fetch();
					$conf = $see_last['last_number'];
					$adding = $conf+1;
				}
				$state_name = "OS/$break";
				$staff_number =$state_name."/00".$adding;
				$numbers = "00".$adding;
				$month = date("m");
				
				if($staffBiodata->checkExistencePhone($staff_phone)){
					$_SESSION['error'] = strtoupper("This Phone Number $staff_phone is in use by another staff");
					$all_purpose->redirect("add-staff-biodata.php");	
				}elseif($staffBiodata->checkExistenceEmil($staff_email)){
					$_SESSION['error'] = strtoupper("This E-Mail $staff_email is in use by another staff");
					$all_purpose->redirect("add-staff-biodata.php");
				}else{
					$move= move_uploaded_file($file_tmp, $dir.$file_name);
					if(!empty($staffBiodata->addingstaffBiodataDetails($staff_passport, $staff_name, $staff_number, $sex,$birth_date, $local_govt_id, $ministry_id, $year_of_employment, $category_id, $staff_email, $staff_phone, $state_origin, $staff_level, $type_id))AND (!empty($staffBiodata->insertingTheLastNumber($category, $numbers, $year_employ, $month))) 
						AND (!empty($staffBiodata->userRegistration($full_name, $eemail, $password, $access)))){
						$action ="Added $staff_name with The staff number $staff_number to the staff List";
	            		$his = $all_purpose->getUserDetailsandAddActivity($email, $action);
						$_SESSION['success'] = strtoupper("You Have Added $staff_name with The staff number $staff_number to the staff Successfully");
						$all_purpose->redirect("view-all-staffs.php");	
					}else{
						$_SESSION['error']=strtoupper("Unable to Add $staff_name at the moment, Please Try Again Later");
						//$all_purpose->redirect("add-staff-biodata.php");	
					}
				}
			}else{
				$_SESSION['error'] = "Please Fill The Below Form To Add The Staff Details";
				$all_purpose->redirect("add-staff-biodata.php");
			}
		}

	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("add-staff-biodata.php");
	}