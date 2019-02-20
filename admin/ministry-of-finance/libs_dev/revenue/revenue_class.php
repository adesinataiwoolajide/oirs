<?php
	class sourcesOfRevenue 
	{
		public $db;
		function __construct($db)
		{
			$this->db=$db;
		}

		public function insertRevenueSource($ministry_id, $source_name, $revenue_amount)
		{
			try {
				$addSourceRev = $this->db->prepare("INSERT INTO source_revenue(source_name, ministry_id, revenue_amount)VALUES(:source_name, :ministry_id, :revenue_amount)");
				$arrAddSo=array(':source_name'=>$source_name, ':ministry_id'=>$ministry_id, ':revenue_amount'=>$revenue_amount);
				if(!empty($addSourceRev->execute($arrAddSo))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
				return false;
			}
		}

		public function updateRevenueSource($ministry_id, $source_name, $revenue_amount, $source_id)
		{
			try {
				$updateTheSource = $this->db->prepare("UPDATE source_revenue SET source_name=:source_name, ministry_id=:ministry_id, revenue_amount=:revenue_amount WHERE source_id=:source_id");
				$arrUpSo=array(':source_name'=>$source_name, ':ministry_id'=>$ministry_id, ':revenue_amount'=>$revenue_amount, ':source_id'=>$source_id);
				if(!empty($updateTheSource->execute($arrUpSo))){
					return true;
				}else{
					return false;
				}

			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
				return false;
			}
		}

		public function checkRevenueource($source_name)
		{
			try {
				$checkRev= $this->db->prepare("SELECT * FROM source_revenue WHERE source_name=:source_name");
				$arrCheckRev = array(':source_name'=>$source_name);
				$checkRev->execute($arrCheckRev);
				if($checkRev->rowCount()==1){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
				return false;
			}
		}

		public function seeRevenueourceID($source_id)
		{
			try {
				$checkRev= $this->db->prepare("SELECT * FROM source_revenue WHERE source_id=:source_id");
				$arrCheckRev = array(':source_id'=>$source_id);
				$checkRev->execute($arrCheckRev);
				$roll = $checkRev->fetch();
				return $roll;
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
				return false;
			}
		}

		public function deteleRevenueSource($source_id)
		{
			try {
				$deleteRev = $this->db->prepare("DELETE FROM source_revenue WHERE source_id=:source_id");
				$arrDel = array(':source_id'=>$source_id);
				if(!empty($deleteRev->execute($arrDel))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
				return false;
			}
		}

		public function gettingMinistryRevenue($ministry_id)
		{
			try {
				$minRev = $this->db->prepare("SELECT * FROM source_revenue WHERE ministry_id=:ministry_id");
				$arrMinRev = array(':ministry_id'=>$ministry_id);
				$minRev->execute($arrMinRev);
				$seeMin = $minRev->fetch();
				return $seeMin;
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
				return false;
			}
		}

	}

	
	class localGovtAddRevenue extends sourcesOfRevenue
	{
		
		function __construct($db)
		{
			parent ::__construct($db);
		}

		public function addingStaffRevenue($local_govt_id, $staff_number, $source_id, $payer_name, $payer_phone, $payer_address, $receipt_number, $day, $month, $year, $bank_name, $bank_branch)
		{
			try {
				$addRenenue = $this->db->prepare("INSERT INTO state_revenue(local_govt_id, staff_number, source_id, payer_name, payer_phone, payer_address, reciept_number, today, rev_month, year, bank_name, bank_branch) VALUES(:local_govt_id, :staff_number, :source_id, :payer_name, :payer_phone, :payer_address, :receipt_number, :day, :month, :year, :bank_name, :bank_branch)");
				$arrAddRev = array(':local_govt_id'=>$local_govt_id, ':staff_number'=>$staff_number, ':source_id'=>$source_id, ':payer_name'=>$payer_name, ':payer_phone'=>$payer_phone, ':payer_address'=>$payer_address, ':receipt_number'=>$receipt_number, ':day'=>$day, ':month'=>$month, ':year'=>$year, ':bank_name'=>$bank_name, ':bank_branch'=>$bank_branch);
				if(!empty($addRenenue->execute($arrAddRev))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
				return false;
			}
		}

		public function updateLocalGovtRevenue($reciept_number, $local_govt_id, $staff_number, $source_id, $payer_name, $payer_phone, $payer_address)
		{
			try {
				$updateReve = $this->db->prepare("UPDATE state_revenue SET local_govt_id=:local_govt_id, source_id=:source_id, payer_name=:payer_name, payer_phone=:payer_phone, payer_address=:payer_address WHERE reciept_number=:reciept_number");
				$arrUpRev = array(':local_govt_id'=>$local_govt_id, ':source_id'=>$source_id, ':payer_name'=>$payer_name, 
					':payer_phone'=>$payer_phone, ':payer_address'=>$payer_address, ':reciept_number'=>$reciept_number);
				if(!empty($updateReve->execute($arrUpRev))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
			}
		}

		public function deleteLocalRev($reciept_number)
		{
			try {
				$deletingRev = $this->db->prepare("DELETE FROM state_revenue WHERE reciept_number=:reciept_number");
				$arrDelRev = array(':reciept_number'=>$reciept_number);
				if(!empty($deletingRev->execute($arrDelRev))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
				return false;
			}
		}

		public function gettingLocalGovtIDRevSource($local_govt_id)
		{
			try {
				$gettingLocal = $this->db->prepare("SELECT * FROM state_revenue WHERE local_govt_id=:local_govt_id");
				$arrGetLco= array(':local_govt_id'=>$local_govt_id);
				$gettingLocal->execute($arrGetLco);
				$roko = $gettingLocal->fetch();
				return $roko;
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
			}
		}

		public function checkLocalGovtIDRev($local_govt_id)
		{
			try {
				$chekLocal = $this->db->prepare("SELECT * FROM state_revenue WHERE local_govt_id=:local_govt_id");
				$arrCHeLco= array(':local_govt_id'=>$local_govt_id);
				$chekLocal->execute($arrCHeLco);
				if($chekLocal->rowCount()==0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
			}
		}

		public function gettingStaffRevenue($staff_number)
		{
			try {
				$gettingStaffRe = $this->db->prepare("SELECT * FROM state_revenue WHERE staff_number=:staff_number");
				$arrGetSTa= array(':staff_number'=>$staff_number);
				$gettingStaffRe->execute($arrGetSTa);
				$rokol = $gettingStaffRe->fetch();
				return $rokol;
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
			}
		}

		public function gettingRevenueReciept($reciept_number)
		{
			try {
				$gettingRec = $this->db->prepare("SELECT * FROM state_revenue WHERE reciept_number=:reciept_number");
				$arrGetC= array(':reciept_number'=>$reciept_number);
				$gettingRec->execute($arrGetC);
				$rokolo = $gettingRec->fetch();
				return $rokolo;
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
			}
		}

		public function checkSTaffRev($staff_number)
		{
			try {
				$chekSta = $this->db->prepare("SELECT * FROM state_revenue WHERE staff_number=:staff_number");
				$arrCHeSta= array(':staff_number'=>$staff_number);
				$chekSta->execute($arrCHeSta);
				if($chekSta->rowCount()==0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error']= $e->getMessage();
			}
		}

	}
?>