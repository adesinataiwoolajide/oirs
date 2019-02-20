<?php
	
	class staffBiodataIGR 
	{
		public $db;
		function __construct($db)
		{
			$this->db=$db;
		}

		public function updateUserLoginDetails($user_id, $full_name, $staff_email, $password, $access){
			try{
				$update = $this->db->prepare("UPDATE admin_login SET full_name=:full_name, user_name=:staff_email, password=:password, access_level=:access WHERE user_id=:user_id");
				$arrD = array(':full_name'=>$full_name, ':password'=>$password, ':staff_email'=>$staff_email, ':user_id'=>$user_id, 
					':access'=>$access);
				if(!empty($update->execute($arrD))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
				return false;
			}
		}

		public function gettingStaffTypeDetails($type_id){
			try{
				$geting = $this->db->prepare("SELECT * FROM staff_type WHERE type_id =:type_id");
				$arr = array(':type_id'=>$type_id);
				$geting->execute($arr);
				$see = $geting->fetch();
				return $see;
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
				return false;
			}
		}

		public function gettingStaffCategoryDetails($category_id){
			try{
				$geting = $this->db->prepare("SELECT * FROM staff_category WHERE category_id =:category_id");
				$arr = array(':category_id'=>$category_id);
				$geting->execute($arr);
				$see = $geting->fetch();
				return $see;
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
				return false;
			}
		}

		public function gettingUserDetails($staff_email){
			try{
				$geting = $this->db->prepare("SELECT * FROM admin_login WHERE user_name =:staff_email");
				$arr = array(':staff_email'=>$staff_email);
				$geting->execute($arr);
				$see = $geting->fetch();
				return $see;
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
				return false;
			}
		}

		public function userRegistration($full_name, $eemail, $password, $access){
			try{
				$insert = $this->db->prepare("INSERT INTO admin_login(full_name, user_name, password, access_level) VALUES(:full_name, :eemail, :password, :access)");
				$arr = array(':full_name'=>$full_name, ':eemail'=>$eemail, ':password'=>$password, ':access'=>$access);
				if($insert->execute($arr)){
					return true;
				}else{
					return false;
				}

			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
				return false;
			}
		}

		public function insertingTheLastNumber($category, $numbers, $year_employ, $month)
		{
			try {
				$addNumber= $this->db->prepare("INSERT INTO generated_numbers(number_type, year_number, last_number, month)VALUES(:category, :year_employ, :numbers, :month)");
				$srrNum = array(':category'=>$category, ':numbers'=>$numbers, ':year_employ'=>$year_employ, ':month'=>$month);
				if(!empty($addNumber->execute($srrNum))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error']= $e->getMessage();
			}
		}

		public function checkExistencePhone($staff_phone)
		{
			try {
				$checkPhone=$this->db->prepare("SELECT * FROM staff_biodata WHERE staff_phone=:staff_phone");
				$arrCheck =array(':staff_phone'=>$staff_phone);
				$checkPhone->execute($arrCheck);
				if($checkPhone->rowCount()>0){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error']= $e->getMessage();
			}
		}

		public function checkExistenceEmil($staff_email)
		{
			try {
				$checkEmail=$this->db->prepare("SELECT * FROM staff_biodata WHERE staff_email=:staff_email");
				$arrCheck =array(':staff_email'=>$staff_email);
				$checkEmail->execute($arrCheck);
				if($checkEmail->rowCount()>0){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error']= $e->getMessage();
			}
		}

		public function seestaff_biodataDetails($staff_number)
		{
			try {
				$gettingstaff_biodataDetails = $this->db->prepare("SELECT * FROM staff_biodata WHERE staff_number=:staff_number");
				$arrGet = array(':staff_number'=>$staff_number);
				$gettingstaff_biodataDetails->execute($arrGet);
				$see_staff_biodata = $gettingstaff_biodataDetails->fetch();
				return $see_staff_biodata;
			} catch (PDOException $e) {
				$_SESSION['error']= $e->getMessage();
			}
		}

		public function seestaff_biodataEmailDetails($staff_email)
		{
			try {
				$gettingstaff_biodataDetails = $this->db->prepare("SELECT * FROM staff_biodata WHERE staff_email=:staff_email");
				$arrGet = array(':staff_email'=>$staff_email);
				$gettingstaff_biodataDetails->execute($arrGet);
				$see_staff_biodatao = $gettingstaff_biodataDetails->fetch();
				return $see_staff_biodatao;
			} catch (PDOException $e) {
				$_SESSION['error']= $e->getMessage();
			}
		}

		public function deleteLogin($staff_email){
			try{
				$delLog = $this->db->prepare("DELETE FROM admin_login WHERE user_name=:staff_email");
				$arrLod = array(':staff_email'=>$staff_email);
				if(!empty($delLog->execute($arrLod))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
				return false;
			}
		}

		public function checkingstaff_biodataLogin($staff_email){
			try{
				$checkLogin = $this->db->prepare("SELECT * FROM admin_login WHERE user_name=:staff_email");
				$arrLog = array(':staff_email'=>$staff_email);
				$checkLogin->execute($arrLog);
				if($checkLogin->rowCount()> 0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
				return false;
			}
		}

		public function deletestaff_biodataDetails($staff_number)
		{
			try {
				$deletestaff_biodata=$this->db->prepare("DELETE FROM staff_biodata WHERE staff_number=:staff_number");
				$arrDelete = array(':staff_number'=>$staff_number);
				if(!empty($deletestaff_biodata->execute($arrDelete))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error']= $e->getMessage();
			}
		}

		public function getstaffCategory($category_id)
		{
			try {
				$getType = $this->db->prepare("SELECT * FROM staff_category WHERE category_id=:category_id");
				$arrTy = array(':category_id'=>$category_id);
				$getType->execute($arrTy);
				$seeTy = $getType->fetch();
				return $seeTy;
			} catch (PDOException $e) {
				$_SESSION['error']= $e->getMessage();
			}
		}

		public function addingstaffBiodataDetails($staff_passport, $staff_name, $staff_number, $sex,$birth_date, $local_govt_id, $ministry_id, $year_of_employment, $category_id, $staff_email, $staff_phone, $state_origin, $staff_level, $type_id)
		{
			try {
				$insertNewStaff = $this->db->prepare("INSERT INTO staff_biodata(staff_passport, staff_name, staff_number, sex, birth_date, local_govt_id, ministry_id, year_of_employment, category_id, staff_email, staff_phone, state_origin, staff_level, type_id)VALUES(:staff_passport, :staff_name, :staff_number, :sex, :birth_date, :local_govt_id, :ministry_id, :year_of_employment, :category_id, :staff_email, :staff_phone, :state_origin, :staff_level, :type_id)");
				$arrinsertNewStaff=array(':staff_passport'=>$staff_passport, ':staff_name'=>$staff_name, ':staff_number'=>$staff_number, ':sex'=>$sex, ':birth_date'=>$birth_date, ':local_govt_id'=>$local_govt_id, ':ministry_id'=>$ministry_id, ':year_of_employment'=>$year_of_employment, ':category_id'=>$category_id, ':staff_email'=>$staff_email, ':staff_phone'=>$staff_phone, ':state_origin'=>$state_origin, ':staff_level'=>$staff_level, ':type_id'=>$type_id);
				if(!empty($insertNewStaff->execute($arrinsertNewStaff))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error']= $e->getMessage();
			}
		}

		public function updateStaffDetailsWithPassport($staff_passport, $staff_name, $staff_number, $sex,$birth_date, $local_govt_id, $ministry_id, $year_of_employment, $category_id, $staff_email, $staff_phone, $state_origin, $staff_level, $type_id)
		{
			try {
				$updateTheDetails = $this->db->prepare("UPDATE staff_biodata SET staff_name=:staff_name, sex=:sex, birth_date=:birth_date, local_govt_id=:local_govt_id, ministry_id=:ministry_id, year_of_employment=:year_of_employment, category_id=:category_id, staff_email=:staff_email, staff_phone=:staff_phone, state_origin=:state_origin, staff_level=:staff_level, type_id=:type_id WHERE staff_number=:staff_number");
				$arrUpdate= array(':staff_name'=>$staff_name, ':staff_number'=>$staff_number, ':sex'=>$sex, ':birth_date'=>$birth_date, ':local_govt_id'=>$local_govt_id, ':ministry_id'=>$ministry_id, ':year_of_employment'=>$year_of_employment, ':category_id'=>$category_id, ':staff_email'=>$staff_email, ':staff_phone'=>$staff_phone, ':state_origin'=>$state_origin, ':staff_level'=>$staff_level, ':type_id'=>$type_id);
				if(!empty($updateTheDetails->execute($arrUpdate))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error']= $e->getMessage();
			}
		}

		public function updateStaffDetailsWithOutPassport($staff_name, $staff_number, $sex,$birth_date, $local_govt_id, $ministry_id, $year_of_employment, $category_id, $staff_email, $staff_phone, $state_origin, $staff_level, $type_id)
		{
			try {
				$updateTheDetails = $this->db->prepare("UPDATE staff_biodata SET staff_name=:staff_name, sex=:sex, birth_date=:birth_date, local_govt_id=:local_govt_id, ministry_id=:ministry_id, year_of_employment=:year_of_employment, category_id=:category_id, staff_email=:staff_email, staff_phone=:staff_phone, state_origin=:state_origin, staff_level=:staff_level WHERE staff_number=:staff_number");
				$arrUpdate= array(':staff_name'=>$staff_name, ':staff_number'=>$staff_number, ':sex'=>$sex, ':birth_date'=>$birth_date, ':local_govt_id'=>$local_govt_id, ':ministry_id'=>$ministry_id, ':year_of_employment'=>$year_of_employment, ':category_id'=>$category_id, ':staff_email'=>$staff_email, ':staff_phone'=>$staff_phone, ':state_origin'=>$state_origin, ':staff_level'=>$staff_level, ':type_id'=>$type_id);
				if(!empty($updateTheDetails->execute($arrUpdate))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error']= $e->getMessage();
			}
		}
	}
?>