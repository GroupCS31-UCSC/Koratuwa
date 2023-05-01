<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/users/u_profile_dashboard.php'; ?>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/home.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/buttons.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/forms.css"> -->


<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/profile.css">


<?php if($_SESSION['user_type'] == 'Supplier') : ?>
<div class="container_profile">
    <?php foreach ($data['userProfile'] as $sup) : ?>



        <div class="center">
            <div class="container">
                <div class="left">
                    <div class="photo">
                    <div class="circle"></div>   
                    <div class="circle2"></div> 
                    <img alt="user photo" src="<?php echo URLROOT; ?>/img/users/user.png">
                    </div>     
                    <div class="title__contain">
                    <div class="username"><?php echo $sup->name; ?></div>
                    <div class="title">Milk Supplier</div>
                    </div>
                    <button class="follow">Edit Profile</button>
                    <a href="<?php echo URLROOT; ?>/Users/changePw/<?php echo $_SESSION['user_email']; ?>" class="sub-menu-link" class="sub-menu-link"><button class="message">Change Password</button></a>
                </div>
                <div class="right">
                    <div class="rightbox">
                    <span class="large">512</span>
                    <span class="small">Posts</span>
                    </div>
                    <div class="rightbox">
                    <span class="large">1234</span>
                    <span class="small">Likes</span>
                    </div>
                    <div class="rightbox">
                    <span class="large">241</span>
                    <span class="small">Followers</span>
                    </div>
                </div>
            </div>
        </div>

    <div class="center">        
            <ul>

                <li>User Id : <?php echo $sup->supplier_id; ?></li>
                <li>Full Name :<?php echo $sup->name; ?></li>
                <li>Nic :<?php echo $sup->nic; ?></li>
                <li>Address :<?php echo $sup->address; ?></li>
                <li>Contact Number :<?php echo $sup->contact_number; ?></li>
                <li>Email :<?php echo $_SESSION['user_email']; ?></li>
                <li>Image :<?php echo $sup->image; ?></li>

            </ul>
    </div>
        <?php endforeach; ?>
</div>


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

    <!-- for employees -->
    <?php else: ?>  
        <?php foreach ($data['userProfile'] as $emp) : ?>

        <li>User Id : <?php echo $emp->employee_id; ?></li>
        <li>Full Name :<?php echo $emp->employee_name; ?></li>
        <li>Nic :<?php echo $emp->nic; ?></li>
        <li>Address :<?php echo $emp->address; ?></li>
        <li>Contact Number :<?php echo $emp->contact_number; ?></li>
        <!-- <li>Date of Birth :<?php echo $emp->dob; ?></li> -->
        <li>Age :</li>
        <li>Gender :<?php echo $emp->gender; ?></li>
        <li>Email :<?php echo $_SESSION['user_email']; ?></li>
        <li>Image :<?php echo $emp->image; ?></li>
        <!-- <li>Salary :<?php echo $emp->salary; ?></li> -->
        <li>Service From :</li>
        <li>Service Time :</li>
        <li>Employment :<?php echo $emp->employment; ?></li>

        </ul>

        <?php endforeach; ?>

    <?php endif; ?>




<?php require APPROOT.'/views/include/footer.php'; ?>
