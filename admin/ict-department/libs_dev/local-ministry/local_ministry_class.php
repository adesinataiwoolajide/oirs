<?php
	class stateMinistry 
	{
		public $db;
		function __construct($db)
		{
			$this->db=$db;
		}

		public function generateMinistryCode($length = 6) {
			$lel = date("Y");
		    $characters = $lel;
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}

		public function addingMinistryName($ministry_name, $ministry_code, $ministry_logo)
		{
			try {
				$insertministry =$this->db->prepare("INSERT INTO ministry(ministry_name, ministry_code, ministry_logo)VALUES(:ministry_name, :ministry_code, :ministry_logo)");
				$arrInsMin = array(':ministry_name'=>$ministry_name, ':ministry_code'=>$ministry_code, ':ministry_logo'=>$ministry_logo);
				if(!empty($insertministry->execute($arrInsMin))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function checkExistingMinistry($ministry_name)
		{
			try {
				$checkingName = $this->db->prepare("SELECT * FROM ministry WHERE ministry_name=:ministry_name");
				$arrCheMin = array(':ministry_name'=>$ministry_name);
				$checkingName->execute($arrCheMin);
				if($checkingName->rowCount()>1){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function chekingTheMinstryImage($ministry_logo)
		{
			try {
				$cheImage = $this->db->prepare("SELECT * FROM ministry WHERE ministry_logo=:ministry_logo");
				$arrImage = array(':ministry_logo'=>$ministry_logo);
				$cheImage->execute($arrImage);
				if($cheImage->rowCount()>1){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function updateMinistryWithImage($ministry_name, $ministry_code, $ministry_logo)
		{
			try {
				$updatingMin=$this->db->prepare("UPDATE ministry SET ministry_name=:ministry_name, ministry_logo=:ministry_logo WHERE ministry_code=:ministry_code");
				$arrUpMin = array(':ministry_name'=>$ministry_name, ':ministry_logo'=>$ministry_logo, ':ministry_code'=>$ministry_code);
				if(!empty($updatingMin->execute($arrUpMin))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function updateMinistryWithOutImage($ministry_name, $ministry_code)
		{
			try {
				$updatingMin=$this->db->prepare("UPDATE ministry SET ministry_name=:ministry_name WHERE ministry_code=:ministry_code");
				$arrUpMin = array(':ministry_name'=>$ministry_name, ':ministry_code'=>$ministry_code);
				if(!empty($updatingMin->execute($arrUpMin))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function deleteTheMinistry($ministry_code)
		{
			try {
				$deleteTheMin = $this->db->prepare("DELETE FROM ministry WHERE ministry_code=:ministry_code");
				$arrDelMin = array(':ministry_code'=>$ministry_code);
				if(!empty($deleteTheMin->execute($arrDelMin))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingMinistryDetails($ministry_code)
		{
			try {
				$gettingMinistry = $this->db->prepare("SELECT * FROM ministry WHERE ministry_code=:ministry_code");
				$getMin = array(':ministry_code'=>$ministry_code);
				$gettingMinistry->execute($getMin);
				$gold = $gettingMinistry->fetch();
				return $gold;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingMinistryIDDetails($ministry_id)
		{
			try {
				$gettingMinistry = $this->db->prepare("SELECT * FROM ministry WHERE ministry_id=:ministry_id");
				$getMin = array(':ministry_id'=>$ministry_id);
				$gettingMinistry->execute($getMin);
				$gold = $gettingMinistry->fetch();
				return $gold;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}
	}

	class localMinistry extends stateMinistry{
		function __construct($db){
			parent::__construct($db);
		}

		public function generateLocalGovtCode($length = 4) {
			$lel = date("Y");
		    $characters = $lel;
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}

		public function addingLocalGovtName($local_govt_name, $local_govt_code)
		{
			try {
				$insertLocalGovt =$this->db->prepare("INSERT INTO local_govt(local_govt_name, local_govt_code)VALUES(:local_govt_name, :local_govt_code)");
				$arrInsLock = array(':local_govt_name'=>$local_govt_name, ':local_govt_code'=>$local_govt_code);
				if(!empty($insertLocalGovt->execute($arrInsLock))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function checkExistingLocalGovt($local_govt_name)
		{
			try {
				$checkingName = $this->db->prepare("SELECT * FROM local_govt WHERE local_govt_name=:local_govt_name");
				$arrCheMin = array(':local_govt_name'=>$local_govt_name);
				$checkingName->execute($arrCheMin);
				if($checkingName->rowCount()>1){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function updateLocalGovt($local_govt_name, $local_govt_code)
		{
			try {
				$updatingMin=$this->db->prepare("UPDATE local_govt SET local_govt_name=:local_govt_name WHERE local_govt_code=:local_govt_code");
				$arrUpMin = array(':local_govt_name'=>$local_govt_name, ':local_govt_code'=>$local_govt_code);
				if(!empty($updatingMin->execute($arrUpMin))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function deleteTheLovalGovt($local_govt_code)
		{
			try {
				$deleteTheLoc = $this->db->prepare("DELETE FROM local_govt WHERE local_govt_code=:local_govt_code");
				$arrDelLok = array(':local_govt_code'=>$local_govt_code);
				if(!empty($deleteTheLoc->execute($arrDelLok))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingLocalGocyDetails($local_govt_code)
		{
			try {
				$gettingMinistry = $this->db->prepare("SELECT * FROM local_govt WHERE local_govt_code=:local_govt_code");
				$getMin = array(':local_govt_code'=>$local_govt_code);
				$gettingMinistry->execute($getMin);
				$gold = $gettingMinistry->fetch();
				return $gold;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingLocalGocyIDDetails($local_govt_id)
		{
			try {
				$gettingMinistry = $this->db->prepare("SELECT * FROM local_govt WHERE local_govt_id=:local_govt_id");
				$getMin = array(':local_govt_id'=>$local_govt_id);
				$gettingMinistry->execute($getMin);
				$gold = $gettingMinistry->fetch();
				return $gold;
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
			}
		}

	}
?>