<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/users/u_profile_dashboard.php'; ?>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/home.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/buttons.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/forms.css"> -->


<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/profile.css">

<!---------------------------------Supplier---------------------------------->
<?php if($_SESSION['user_type'] == 'Supplier') : ?>

    <?php foreach ($data['userProfile'] as $sup) : ?>

<!-- ===== ===== Body Main-Background ===== ===== -->
<span class="main_bg"><img src="<?php echo URLROOT; ?>/img/users/profileBg" alt=""></span>


        <!-- ===== ===== Main-Container ===== ===== -->
        <div class="container">

            <!-- ===== ===== Header/Navbar ===== ===== -->
            <header>
                <div class="brandLogo">
                    <figure><img alt="user photo" src="<?php echo URLROOT; ?>/img/logo.png" width="40px" height="40px"></figure>
                    
                    <span>Koratuwa Dairy Farm</span>
                </div>
            </header>


            <!-- ===== ===== User Main-Profile ===== ===== -->
            <section class="userProfile card">
                <div class="profile">
                    <figure><img  alt="user photo" src="<?php echo URLROOT; ?>/img/users/user.png"" width="250px" height="250px"></figure>
                </div>
            </section>


            <!-- ===== ===== Work & Skills Section ===== ===== -->
            <section class="work_skills card">

                <!-- ===== ===== Work Contaienr ===== ===== -->
                <div class="work">
                    <h1 class="heading">work</h1>
                    <div class="primary">
                        <h1>Spotify New York</h1>
                        <span>Primary</span>
                        <p>170 William Street <br> New York, NY 10038-212-315-51</p>
                    </div>

                    <div class="secondary">
                        <h1>Metropolitan <br> Museum</h1>
                        <span>Secondary</span>
                        <p>S34 E 65th Street <br> New York, NY 10651-78 156-187-60</p>
                    </div>
                </div>

                <!-- ===== ===== Skills Contaienr ===== ===== -->
                <!-- <div class="skills">
                    <h1 class="heading">Skills</h1>
                    <ul>
                        <li style="--i:0">Android</li>
                        <li style="--i:1">Web-Design</li>
                        <li style="--i:2">UI/UX</li>
                        <li style="--i:3">Video Editing</li>
                    </ul>
                </div> -->
            </section>


            <!-- ===== ===== User Details Sections ===== ===== -->
            <section class="userDetails card">
                <div class="userName">
                    <h1 class="name"><?php echo $sup->name; ?></h1>
                    <div class="map">
                        <i class="ri-map-pin-fill ri"></i>
                        <span>Horana</span>
                    </div>
                    <p>Milk Supplier</p>
                </div>

                <div class="rank">
                    <h1 class="heading">Total supply milk</h1>
                    <!-- <span data-number="<?php echo($data['ordSum']) ?>"></span> -->
                    <span>100L</span>
                    <div class="rating">
                        <i class="ri-star-fill rate"></i>
                        <i class="ri-star-fill rate"></i>
                        <i class="ri-star-fill rate"></i>
                        <i class="ri-star-fill rate"></i>
                        <i class="ri-star-fill rate underrate"></i>
                    </div>
                </div>

                <div class="btns">
                    <ul>
                        <li class="sendMsg active">
                            <i class="ri-chat-4-fill ri"></i>
                            <a href="<?php echo URLROOT; ?>/Users/sup_editProfile/<?php echo $sup->supplier_id; ?>">Edit Profile</a>
                        </li>

                        <li class="sendMsg active">
                            <i class="ri-check-fill ri"></i>
                            <a href="<?php echo URLROOT; ?>/Users/changePw/<?php echo $_SESSION['user_email']; ?>">Change Password</a>
                        </li>

                        <!-- <li class="sendMsg">
                            <a href="#">Report User</a>
                        </li> -->
                    </ul>
                </div>
            </section>


            <!-- ===== ===== Timeline & About Sections ===== ===== -->
            <section class="timeline_about card">
                <div class="tabs">
                    <ul>
                        <li class="timeline">
                            <i class="ri-eye-fill ri"></i>
                            <span>Timeline</span>
                        </li>

                        <li class="about active">
                            <i class="ri-user-3-fill ri"></i>
                            <span>About</span>
                        </li>
                    </ul>
                </div>

                <div class="contact_Info">
                    <h1 class="heading">Contact Information</h1>
                    <ul>
                        <li class="phone">
                            <h1 class="label">Phone:</h1>
                            <span class="info"><?php echo $sup->contact_number; ?></span>
                        </li>

                        <li class="address">
                            <h1 class="label">Address:</h1>
                            <span class="info"><?php echo $sup->address; ?></span>
                        </li>

                        <li class="email">
                            <h1 class="label">E-mail:</h1>
                            <span class="info"><?php echo $_SESSION['user_email']; ?></span>
                        </li>

                        <li class="site">
                            <h1 class="label">Site:</h1>
                            <span class="info">www.koratuwa.lk</span>
                        </li>
                    </ul>
                </div>

                <div class="basic_info">
                    <h1 class="heading">Basic Information</h1>
                    <ul>
                        <li class="birthday">
                            <h1 class="label">NIC:</h1>
                            <span class="info"><?php echo $sup->nic; ?></span>
                        </li>

                        <li class="sex">
                            <h1 class="label">Gender:</h1>
                            <span class="info">Male</span>
                        </li>
                    </ul>
                </div>
            </section>
        </div>







                    <!-- <a href="<?php echo URLROOT; ?>/Users/sup_editProfile/<?php echo $sup->supplier_id; ?>"><button class="follow">Edit Profile</button></a>
                    <a href="<?php echo URLROOT; ?>/Users/changePw/<?php echo $_SESSION['user_email']; ?>" class="sub-menu-link" class="sub-menu-link"><button class="message">Change Password</button></a> -->
     
            <!-- <ul>

                <li>User Id : <?php echo $sup->supplier_id; ?></li>
                <li>Full Name :<?php echo $sup->name; ?></li>
                <li>Nic :<?php echo $sup->nic; ?></li>
                <li>Address :<?php echo $sup->address; ?></li>
                <li>Contact Number :<?php echo $sup->contact_number; ?></li>
                <li>Email :<?php echo $_SESSION['user_email']; ?></li>
                <li>Image :<?php echo $sup->image; ?></li>

            </ul> -->


        <?php endforeach; ?>


<!------------------------Customer--------------------------------------------------->
    <?php elseif($_SESSION['user_type'] == 'Customer') : ?>

        <?php foreach ($data['userProfile'] as $cus) : ?>

        <li>User Id : <?php echo $cus->customer_id; ?></li>
        <li>Full Name :<?php echo $cus->name; ?></li>
        <li>Nic :<?php echo $cus->nic; ?></li>
        <li>Address :<?php echo $cus->address; ?></li>
        <li>Contact Number :<?php echo $cus->contact_number; ?></li>
        <li>Email :<?php echo $_SESSION['user_email']; ?></li>
        <li>Image :<?php echo $cus->image; ?></li>

        </ul>

        <?php endforeach; ?>

    <?php elseif($_SESSION['user_type'] == 'Admin') : ?>

        <?php foreach ($data['userProfile'] as $adm) : ?>

        <li>User Id : <?php echo $adm->admin_id; ?></li>
        <li>Full Name :<?php echo $adm->name; ?></li>
        <li>Nic :<?php echo $adm->nic; ?></li>
        <li>Address :<?php echo $adm->address; ?></li>
        <li>Contact Number :<?php echo $adm->contact_number; ?></li>
        <!-- <li>Date of Birth :<?php echo $adm->dob; ?></li> -->
        <li>Age :</li>
        <li>Gender :<?php echo $adm->gender; ?></li>
        <li>Email :<?php echo $_SESSION['user_email']; ?></li>
        <li>Image :<?php echo $adm->image; ?></li>
        <!-- <li>Salary :<?php echo $adm->salary; ?></li> -->

        </ul>

        <?php endforeach; ?>

    <!--------------------------for employees-------------------------------->
    <?php else: ?>  
        <?php foreach ($data['userProfile'] as $emp) : ?>
        

<!-- ===== ===== Body Main-Background ===== ===== -->
<span class="main_bg"><img src="<?php echo URLROOT; ?>/img/users/profileBg" alt=""></span>


        <!-- ===== ===== Main-Container ===== ===== -->
        <div class="container">

            <!-- ===== ===== Header/Navbar ===== ===== -->
            <header>
                <div class="brandLogo">
                    <figure><img alt="user photo" src="<?php echo URLROOT; ?>/img/koratuwa.png" width="60px" height="60px"></figure>
                    
                    <span>Koratuwa Dairy Farm</span>
                </div>
            </header>


            <!-- ===== ===== User Main-Profile ===== ===== -->
            <section class="userProfile card">
                <div class="profile">
                    <figure><img  alt="user photo" src="<?php echo URLROOT; ?>/img/users/user.png" width="250px" height="250px"></figure>
                </div>
            </section>


            <!-- ===== ===== Work & Skills Section ===== ===== -->
            <section class="work_skills card">

                <!-- ===== ===== Work Contaienr ===== ===== -->
                <div class="work">
                    <h1 class="heading">work</h1>
                    <div class="primary">
                        <h1>Spotify New York</h1>
                        <span>Primary</span>
                        <p>170 William Street <br> New York, NY 10038-212-315-51</p>
                    </div>

                    <div class="secondary">
                        <h1>Metropolitan <br> Museum</h1>
                        <span>Secondary</span>
                        <p>S34 E 65th Street <br> New York, NY 10651-78 156-187-60</p>
                    </div>
                </div>

         
            </section>


            <!-- ===== ===== User Details Sections ===== ===== -->
            <section class="userDetails card">
                <div class="userName">
                    <h1 class="name"><?php echo $emp->employee_name; ?></h1>
                    <div class="map">
                        <i class="ri-map-pin-fill ri"></i>
                        <!-- <span>Horana</span> -->
                    </div>
                    <p>Milk Supplier</p>
                </div>

                <div class="rank">
                    <h1 class="heading">Total supply milk</h1>
                    <span>100L</span>
                    <div class="rating">
                        <i class="ri-star-fill rate"></i>
                        <i class="ri-star-fill rate"></i>
                        <i class="ri-star-fill rate"></i>
                        <i class="ri-star-fill rate"></i>
                        <i class="ri-star-fill rate underrate"></i>
                    </div>
                </div>

                <div class="btns">
                    <ul>
                        <li class="sendMsg active">
                            <i class="ri-chat-4-fill ri"></i>
                            <a href="<?php echo URLROOT; ?>/Users/sup_editProfile/<?php echo $emp->employee_id; ?>">Edit Profile</a>
                        </li>

                        <li class="sendMsg active">
                            <i class="ri-check-fill ri"></i>
                            <a href="<?php echo URLROOT; ?>/Users/changePw/<?php echo $_SESSION['user_email']; ?>">Change Password</a>
                        </li>

                        <!-- <li class="sendMsg">
                            <a href="#">Report User</a>
                        </li> -->
                    </ul>
                </div>
            </section>


            <!-- ===== ===== Timeline & About Sections ===== ===== -->
            <section class="timeline_about card">
                <div class="tabs">
                    <ul>
                        <!-- <li class="timeline">
                            <i class="ri-eye-fill ri"></i>
                            <span>Timeline</span>
                        </li> -->

                        <li class="about active">
                            <i class="ri-user-3-fill ri"></i>
                            <span>About</span>
                        </li>
                    </ul>
                </div>

                <div class="contact_Info">
                    <h1 class="heading">Contact Information</h1>
                    <ul>
                        <li class="phone">
                            <h1 class="label">Phone:</h1>
                            <span class="info"><?php echo $emp->contact_number; ?></span>
                        </li>

                        <li class="address">
                            <h1 class="label">Address:</h1>
                            <span class="info"><?php echo $emp->address; ?></span>
                        </li>

                        <li class="email">
                            <h1 class="label">E-mail:</h1>
                            <span class="info"><?php echo $_SESSION['user_email']; ?></span>
                        </li>
                        

                        <li class="site">
                            <h1 class="label">Site:</h1>
                            <span class="info">www.koratuwa.lk</span>
                        </li>
                    </ul>
                </div>

                <div class="basic_info">
                    <h1 class="heading">Basic Information</h1>
                    <ul>
                        <li class="birthday">
                            <h1 class="label">NIC:</h1>
                            <span class="info"><?php echo $emp->nic; ?></span>
                        </li>

                        <li class="sex">
                            <h1 class="label">Gender:</h1>
                            <span class="info">Male</span>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
            
        
        <ul>
        <!-- <li>User Id : <?php echo $emp->employee_id; ?></li>
        <li>Full Name :<?php echo $emp->employee_name; ?></li>
        <li>Nic :<?php echo $emp->nic; ?></li>
        <li>Address :<?php echo $emp->address; ?></li>
        <li>Contact Number :<?php echo $emp->contact_number; ?></li>
        <li>Age :</li>
        <li>Gender :<?php echo $emp->gender; ?></li>
        <li>Email :<?php echo $_SESSION['user_email']; ?></li>
        <li>Image :<?php echo $emp->image; ?></li>
        <li>Service From :</li>
        <li>Service Time :</li>
        <li>Employment :<?php echo $emp->employment; ?></li> -->
        <!-- <li>Date of Birth :<?php echo $emp->dob; ?></li> -->
        <!-- <li>Salary :<?php echo $emp->salary; ?></li> -->

        </ul>

        <?php endforeach; ?>

    <?php endif; ?>




