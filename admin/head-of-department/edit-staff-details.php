<?php
	require '../header.php';
	require '../side-bar.php';
    //require 'libs_dev/staff/staff_class.php';
    require 'libs_dev/local-ministry/local_ministry_class.php';
    $minstryDetails = new stateMinistry($db);
    $localDetails = new localMinistry($db);
    //$staffBiodata = new staffBiodataIGR($db);
    $staff_number = $_GET['staff_number'];
    $staffDetails = $staffBiodata->seestaff_biodataDetails($staff_number);
    $staff_email = $staffDetails['staff_email'];
    $staff_name = $staffDetails['staff_name'];
    $depa = $staffBiodata->gettingUserDetails($staff_email);
?>
<main class="app-content">
    <div class="app-title">
        <div>
	         <div>
                <h1 style="color: green"><i class="fa fa-pencil"></i> State of Osun Staff Biodata Update Form</h1>
            </div>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item active"><a href="edit-staff-details.php?staff_number=<?php echo $staff_number ?>"><i class="fa fa-pencil"></i> Edit <?php echo $staff_name ?> Details </a></li>
            <li class="breadcrumb-item active"><a href="staff-details.php?staff_number=<?php echo $staff_number ?>"><i class="fa fa-user"></i> View <?php echo $staff_name ?> Details </a></li>
            <li class="breadcrumb-item active"><a href="add-staff-biodata.php"><i class="fa fa-plus"></i>Add Staff </a></li>
            <li class="breadcrumb-item"><a href="./"><i class="fa fa-dashboard"></i> Home Page</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
                <div class="alert alert-info" align="center">
                    <button class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                 <?php include("../includes/feed-back.php"); ?>
                </div><?php 
            }  ?>
        </div>
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <h3><p align="center" style="color: green">Please Fill The Below Form To Update The Staff Details </p></h3>
                    </div>
                </div>
            </div>
            <form action="update-staff-details.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tile">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Change Staff Passport?</label>
                                <input class="form-control" id="" type="file" name="image" placeholder="Password">
                                <span style="color: red">** This Field is Required **</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Staff Name</label>
                                <input class="form-control"  type="text" name="staff_name" value="<?php echo $staff_name ?>" placeholder="Enter The Staff Name" required="">
                                <span style="color: red">** This Field is Required **</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Staff E-Mail</label>
                                <input class="form-control"  type="email" value="<?php echo $staffDetails['staff_email'] ?>"  placeholder="Enter The Staff E-Mail" readonly>
                                <input type="hidden" name="staff_email" value="<?php echo $staffDetails['staff_email'] ?>">
                                <span style="color: red">** This Field is Required **</span>
                            </div>
                        
                            <div class="form-group">
                                <label for="exampleInputEmail1">Staff Phone Number</label>
                                <input class="form-control"  type="number" name="staff_phone" value="<?php echo $staffDetails['staff_phone'] ?>"  placeholder="Enter The Staff Phone Number" required="">
                                <span style="color: red">** This Field is Required **</span>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date of Birth</label>
                                <input class="form-control" type="date" name="birth_date" value="<?php echo $staffDetails['birth_date'] ?>" placeholder="" required="">
                                <span style="color: red">** This Field is Required **</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Staff Sex</label>
                                <select class="form-control"  name="sex" required>
                                    <option value="<?php echo $staffDetails['sex'] ?>"><?php echo $staffDetails['sex'] ?></option>
                                    <option value=""></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <span style="color: red">** This Field is Required **</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="tile">
                            <div class="tile-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Year of Employment</label><?php
                                        $early = 2000;
                                        $current = date("Y");
                                        print '<select class ="form-control" required name ="year_employ">';?>
                                        <option value="<?php echo $staffDetails['year_of_employment'] ?>"><?php echo $staffDetails['year_of_employment'] ?></option>
                                        <option value=""></option><?php
                                        foreach(range($current, $early) as $i){
                                            print'<option value=" '.$i.'"'.($i === $current ? '"' : '').'>'.$i.'</option>';
                                        }
                                        print '</select>';?>  
                                    <span style="color: red">** This Field is Required **</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">State of Origin</label>
                                    <select class="form-control"  name="state_origin" required>
                                        <option value="<?php echo $staffDetails['state_origin'] ?>"><?php echo $staffDetails['state_origin'] ?></option>
                                        <option value=""></option>
                                        <option value="Abuja FCT">Abuja FCT</option>
                                        <option value="Abia">Abia State</option>
                                        <option value="Adamawa">Adamawa State</option>
                                          <option value="Akwa Ibom">Akwa Ibom State</option>
                                          <option value="Anambra">Anambra State</option>
                                          <option value="Bauchi">Bauchi State</option>
                                          <option value="Bayelsa">Bayelsa State</option>
                                          <option value="Benue">Benue State</option>
                                          <option value="Borno">Borno State</option>
                                          <option value="Cross River">Cross River State</option>
                                          <option value="Delta">Delta State</option>
                                          <option value="Ebonyi">Ebonyi State</option>
                                          <option value="Edo">Edo State</option>
                                          <option value="Ekiti">Ekiti State</option>
                                          <option value="Enugu">Enugu State</option>
                                          <option value="Gombe">Gombe State</option>
                                          <option value="Imo">Imo State</option>
                                          <option value="Jigawa">Jigawa State</option>
                                          <option value="Kaduna">Kaduna State</option>
                                          <option value="Kano">Kano State</option>
                                          <option value="Katsina">Katsina State</option>
                                          <option value="Kebbi">Kebbi State</option>
                                          <option value="Kogi">Kogi State</option>
                                          <option value="Kwara">Kwara State</option>
                                          <option value="Lagos">Lagos State</option>
                                          <option value="Nassarawa">Nassarawa State</option>
                                          <option value="Niger">Niger State</option>
                                          <option value="Ogun">Ogun State</option>
                                          <option value="Ondo">Ondo State</option>
                                          <option value="Osun">Osun State</option>
                                          <option value="Oyo">Oyo State</option>
                                          <option value="Plateau">Plateau State</option>
                                          <option value="Rivers">Rivers State</option>
                                          <option value="Sokoto">Sokoto State</option>
                                          <option value="Taraba">Taraba State</option>
                                          <option value="Yobe">Yobe State</option>
                                          <option value="Zamfara">Zamfara State</option>
                                        <option value="Outside Nigeria">Outside Nigeria</option>
                                    </select>
                                    <span style="color: red">** This Field is Required **</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Staff Ministry</label>
                                    <select class="form-control"  name="ministry_id" required><?php
                                        $ministry_id = $staffDetails['ministry_id']; 
                                        $sola= $minstryDetails->gettingMinistryIDDetails($ministry_id); 
                                             ?>
                                        <option value="<?php echo $ministry_id ?>"><?php echo $sola['ministry_name']; ?></option>
                                        <option value=""></option><?php
                                        $local = $db->prepare("SELECT * FROM ministry ORDER BY ministry_name");
                                        $local->execute();
                                        while($see_local = $local->fetch()){ ?>
                                            <option value="<?php echo $see_local['ministry_id']; ?>"><?php echo $see_local['ministry_name']; ?>
                                            </option><?php 
                                        } ?>
                                    </select>
                                    <span style="color: red">** This Field is Required **</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Staff Local Govt</label>
                                    <select class="form-control"  name="local_govt_id" required>
                                        <?php 
                                        $local_govt_id= $staffDetails['local_govt_id']; 
                                        $depo = $localDetails->gettingLocalGocyIDDetails($local_govt_id); 
                                        ?>
                                        <option value="<?php echo $local_govt_id ?>"><?php echo $depo['local_govt_name']; ?></option>
                                        <option value=""></option><?php
                                        $local = $db->prepare("SELECT * FROM local_govt ORDER BY local_govt_name");
                                        $local->execute();
                                        while($see_local = $local->fetch()){ ?>
                                            <option value="<?php echo $see_local['local_govt_id']; ?>"><?php echo $see_local['local_govt_name']; ?>
                                            </option><?php 
                                        } ?>
                                    </select>
                                    <span style="color: red">** This Field is Required **</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Staff Category</label>
                                    <select class="form-control"  name="category_id" required><?php
                                        $category_id = $staffDetails['category_id'];
                                        $gope = $staffBiodata->gettingStaffCategoryDetails($category_id); ?>
                                        <option value="<?php echo $category_id ?>"><?php echo $gope['category_name']; ?></option>
                                        <option value=""></option><?php
                                        $local = $db->prepare("SELECT * FROM staff_category ORDER BY category_name");
                                        $local->execute();
                                        while($see_local = $local->fetch()){ ?>
                                            <option value="<?php echo $see_local['category_id']; ?>"><?php echo $see_local['category_name']; ?>
                                            </option><?php 
                                        } ?>
                                    </select>
                                    <span style="color: red">** This Field is Required **</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Staff Level</label>
                                   <select class="form-control"  name="staff_level" required>
                                        <option value="<?php echo $staffDetails['staff_level'] ?>"><?php echo $staffDetails['staff_level'] ?></option>
                                        <option value=""></option>
                                        <option value="1 Level">1 Level</option>
                                        <option value="2 Level">2 Level</option>
                                        <option value="3 Level">3 Level</option>
                                        <option value="4 Level">4 Level</option>
                                        <option value="5 Level">5 Level</option>
                                        <option value="6 Level">6 Level</option>
                                        <option value="7 Level">7 Level</option>
                                        <option value="8 Level">8 Level</option>
                                        <option value="9 Level">9 Level</option>
                                        <option value="10 Level">10 Level</option>
                                        <option value="11 Level">11 Level</option>
                                        <option value="12 Level">12 Level</option>
                                    </select>
                                    <span style="color: red">** This Field is Required **</span>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-12">
                        <div class="tile">
                            <div class="row">
                                <div class="col-lg-12" align="center">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Staff Type</label>
                                        <select class="form-control"  name="type_id" required>
                                            <?php 
                                            $type_id = $staffDetails['type_id'];
                                            $klove=$staffBiodata->gettingStaffTypeDetails($type_id); ?>
                                            <option value="<?php echo $type_id ?>"><?php echo $klove['type_name']; ?></option>
                                            <option value=""></option><?php
                                            $local = $db->prepare("SELECT * FROM staff_type ORDER BY type_name ASC");
                                            $local->execute();
                                            while($see_local = $local->fetch()){ ?>
                                                <option value="<?php echo $see_local['type_id']; ?>"><?php echo $see_local['type_name']; ?>
                                                </option><?php 
                                            } ?>
                                        </select>
                                        <span style="color: red">** This Field is Required **</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="staff_number" value="<?php echo $staff_number ?>">
                    <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                    <input type="hidden" name="user_id" value="<?php echo $depa['user_id']; ?>">
                    <div class="col-lg-12">
                        <div class="tile">
                            <div class="row">
                                <div class="col-lg-12" align="center">
                                    <button class="btn btn-success" name="update_staff">UPDATE <?php echo strtoupper($staff_name) ?> BIODATA DETAILS</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
         </div>
    </div>
</main>
<?php
	require '../footer.php';
?>