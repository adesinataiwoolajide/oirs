<?php
	class registration{
		private $db;

		function __construct($db){
			$this->db= $db;
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
				echo $e->getMessage();
				return false;
			}
		}

		public function checkDoublePassport($file_name){
			try{
				$checkPass = $this->db->prepare("SELECT * FROM passports WHERE passport_url=:file_name");
				$arrChc = array(':file_name'=>$file_name);
				$checkPass->execute($arrChc);
				if($checkPass->rowCount()>0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function addingUserPassport($eemail, $file_name){
			try{
				$insert = $this->db->prepare("INSERT INTO passports(email, passport_url)VALUES(:eemail, :file_name)");
				$arr = array(':eemail'=>$eemail, ':file_name'=>$file_name);
				$result = $insert->execute($arr);
				if($result){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function gettingRole($access){
			if($access ==1){ ?>
				<p style="color: green"> Admin </p><?php
			}else{ ?>
				<p style="color: red"> Not yet an Admin </p><?php
			}
		}

		public function gettingUserImages($users){
			try{
				$sel = $this->db->prepare("SELECT * FROM passports 	WHERE email=:users");
				$arr = array(':users'=>$users);
				$sel->execute($arr);
				$dev = $sel->fetch();
				return $dev;
				
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}

		}
		public function viewUsers($query){
			$display = $this->db->prepare($query);
			$display->execute();
			if($display->rowCount()==0){ ?>
				<p style="color: red">You have not added any user. Click <a href="add-user.php">to add users</a></p><?php
			}else{
				?>
                <thead align="center">
                    <tr>
                        
                        <th style="color: black;">S/N</th>
                        <th style="color: black;">User Images</th>
                        <th style="color: black;">Full Name</th>
                        <th style="color: black;">Email</th>
                        <th style="color: black;">User Role</th>
                        <th style="color: black;">Time Registered</th>
                        <th style="color: black;">Action</th> 
                    </tr>
                </thead><?php

				$y =1;
				while($details = $display->fetch()){
					$user_id = $details['user_id'];
					$users = $details['user_name']; ?>
					<tr>
						<td><?php echo $y; ?></td>
						<?php echo $image = $this->gettingUserImages($users); ?>
						<td><?php echo $name = $details['full_name']; ?></td>
						<td><?php echo $use =  $details['user_name']; ?></td>
						<td><?php $access = $details['access_level']; 
							$see = $this->gettingRole($access); ?></td>
						<td><?php echo  $details['time_registered']; ?></td>
						<td data-value="1">
		              		<span class="label bg-success" title="Active">
		              			<a href="edit-user-profile.php?user_email=<?php echo $use; ?>" onclick="return(confirmToEdit());">Edit
										
								</a>
							</span>
							<span class="label bg-danger" title="Active">
		              			<a href="delete-user-details.php?user_email=<?php echo $use;  ?>" onclick="return(confirmToDelete());">Delete	
								</a>
							</span>
						</td>
					</tr><?php
					$y++;
				}?>
				</table>
		        <?php
			} 
			
		}

		public function checkingUserExistence($users){
			try{
				$real = $this->db->prepare("SELECT * FROM admin_login WHERE user_name=:users");
				$att = array(':users'=>$users);
				$real->execute($att);
				if($real->rowCount() >0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		public function gettingUserDetails($users){
			try{
				$geting = $this->db->prepare("SELECT * FROM admin_login WHERE user_name =:users");
				$arr = array(':users'=>$users);
				$geting->execute($arr);
				$see = $geting->fetch();
				return $see;
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function gettingPassportDetails($users){
			try{
				$getting = $this->db->prepare("SELECT * FROM passports WHERE email =:users");
				$arr = array(':users'=>$users);
				$getting->execute($arr);
				$dee = $getting->fetch();
				return $dee;
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function viewAllUsers($query){
			$display = $this->db->prepare($query);
			$display->execute();
			if($display->rowCount()==0){ ?>
				<p style="color: red">You have not added any User. Click <a href="add-user.php">to add users</a></p><?php
			}else{
				?>
                <table id="customers2" class="table datatable">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Passport</th>
                            <th>Full Name</th>
                            <th>User Name </th>
                            <th>User Type</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S/N</th>
                            <th>Passport</th>
                            <th>Full Name</th>
                            <th>User Name </th>
                            <th>User Type</th>
                            <th>Operation</th>
                        </tr>
                    </tfoot>
                    <tbody><?php
                    	$user=$this->db->prepare("SELECT * FROM admin_login ORDER BY full_name ASC");
                    	$user->execute();
                    	$y=1;
                    	while($hope = $user->fetch()){ 
                    		$users = $hope['user_name']; 
                    		$devo = $this->gettingPassportDetails($users);?>
	                    	<tr>
	                    		<td><?php echo $y; ?></td>
	                    		<td><img src="<?php echo "../staffimages/".$devo['passport_url'];  ?>" style="width: 50px; height: 50px;"></td>
	                    		<td><?php echo $name = $hope['full_name']; ?></td>
	                    		<td><?php echo $users; ?></td>
	                    		<td><?php $access = $hope['access_level']; 
	                    			$jok=$this->userRole($access); ?>	
	                    		</td>
	                    		<td>
	                    			<a href="edit-user-details.php?user_name=<?php echo $users; ?>" class="btn btn-success pull-left" onclick="return(confirmToEdit());"><i class="glyphicon glyphicon-pencil"></i>Edit Details</a>
	                    			<a href="delete-user-details.php?user_name=<?php echo $users; ?>&&user_id=<?php echo $hope['user_id']; ?>&pass_id=<?php echo $devo['pass_id']; ?>" class="btn btn-danger pull-right" onclick="return(confirmToDelete());"><i class="glyphicon glyphicon-trash"></i>Delete Details
	                                	</a>
	                    		</td>
	                    	</tr><?php $y++;
	                    } ?>
                    </tbody> 
				</table>
		        <?php
			} 
			
		}
		public function userRole($access){
			
			if($access == 1){ ?>
				<p style="color: green"> Administrator</p><?php
			}elseif($access == 2){?>
				<p style="color: green">Burser</p><?php
			}elseif($access == 3){?>
				<p style="color: green">Librarian</p><?php
			}elseif($access == 4){?>
				<p style="color: green">Teacher</p><?php
			}elseif($access == 5){?>
				<p style="color: green">Admission Officer</p><?php
			}elseif($access == 6){?>
				<p style="color: green">Librarian</p><?php
			}else{?>
				<p style="color: red">Un-Activated User</p><?php
			}
		}


		public function updateUserdetailsWithoutPic($user_id, $full_name, $eemail, $password, $access){
			try{
				$update = $this->db->prepare("UPDATE admin_login SET full_name=:full_name, user_name=:eemail, password=:password, access_level=:access WHERE user_id=:user_id");
				$arr = array(':full_name'=>$full_name, ':password'=>$password, ':eemail'=>$eemail, ':user_id'=>$user_id, ':access'=>$access);
				$result = $update->execute($arr);
				if(!empty($result)){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function updateUserdetailsID($user_id, $full_name, $access){
			try{
				$update = $this->db->prepare("UPDATE admin_login SET full_name=:full_name, access_level=:access WHERE user_id=:user_id");
				$arr = array(':full_name'=>$full_name, ':user_id'=>$user_id, ':access'=>$access);
				$result = $update->execute($arr);
				if(!empty($result)){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function updatingUserPassport($eemail, $file_name, $pass_id){
			try{
				$update = $this->db->prepare("UPDATE passports SET email=:eemail, passport_url=:file_name WHERE pass_id=:pass_id");
				$arr = array(':eemail'=>$eemail, ':file_name'=>$file_name, ':pass_id'=>$pass_id);
				if($update->execute($arr)){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}


		public function updatingWithoutUserPassport($staff_email, $pass_id){
			try{
				$updte = $this->db->prepare("UPDATE passports SET email=:staff_email WHERE pass_id=:pass_id");
				$arrH = array(':staff_email'=>$staff_email, ':pass_id'=>$pass_id);
				if(!empty($updte->execute($arrH))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function deleteUserPassport($pass_id){
			try{
				$delPass = $this->db->prepare("DELETE FROM passports WHERE pass_id=:pass_id");
				$arrOp = array(':pass_id'=>$pass_id);
				if(!empty($delPass->execute($arrOp))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function seeAccess($eemail){
			try{
				$check = $this->db->prepare("SELECT * FROM admin_login WHERE user_name =:eemail");
				$arr = array(':eemail'=>$eemail);
				$check->execute($arr);
				$see = $check->fetch();
				return $see;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function forgetPassword($email){
			try{
				$select = $this->db->prepare("SELECT * FROM admin_login WHERE user_name=:email");
				$arr = array(':email'=>$email);
				$select->execute($arr);
				if($select->rowCount()==0){
					$_SESSION['error'] = $email." ". "does not exist";
					header("Location: forget-password.php");
					die();
				}else{
					$disp = $select->fetch();
					return $disp;
				} 
			}catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function deleteAdmin($user_id){
			try{
				$delete = $this->db->prepare("DELETE FROM admin_login WHERE user_id=:user_id");
				$aro = array(':user_id'=>$user_id);
				if(!empty($delete->execute($aro))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		
		
	}
?>