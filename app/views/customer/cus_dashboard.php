<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/customer/styles.css">
<!--
 ______________________________________________________________________________________________________-->

<div class="full-container">
    <div class="topnavbar">
        <div class="home">
            <a href="<?php echo URLROOT; ?>/Customer/customerHome"><img alt="user photo" src="<?php echo URLROOT; ?>/img/koratuwa.png" width="80px" height="80px"></a>
        </div>
        <div class="topmenu">
            <ul>
                <li><a href="<?php echo URLROOT; ?>/Customer/cart"><i title="Add Cart" class="fa-solid fa-cart-shopping" ></i></a></li>
                <li><a href="<?php echo URLROOT; ?>/Customer/Orders"><i title="Orders" class="fa-solid fa-gift"></i></a></li>
                <li><a onclick="showNoti()"><i class="fas fa-bell" id="notifyBell"></i><span class="notifyBadge"></span></a></li>
                <li><div class="img-user"><img src="<?php echo URLROOT; ?>/img/users/user.png" alt="user"></div></li>
                <li><a href=""><?php echo $_SESSION['user_name']; ?></a></li>
            </ul>
            <div class="dropdown">
                <i class="fas fa-chevron-down"></i>
                <div class="sub-menu-wrap">
                    <div class="sub-menu">
                        <div class="dropdown-content">
                            <div class="user-info">
                                <span><img src="<?php echo URLROOT; ?>/public/img/users/user.png" alt=""></span> 
                            </div>
                            <hr>
                            <a href="<?php echo URLROOT; ?>/Users/userProfile/<?php echo $_SESSION['user_id']; ?>" class="sub-menu-link">
                                <i class="fa-solid fa-user"></i>
                                <p>View Profile</p>
                            </a>   
                            <a href="<?php echo URLROOT; ?>/Users/changePw/<?php echo $_SESSION['user_email']; ?>" class="sub-menu-link" class="sub-menu-link">
                                <i class="fa-solid fa-lock"></i>
                                <p>Change Password</p>
                            </a>
                            <a href="<?php echo URLROOT; ?>/Users/u_home" class="sub-menu-link">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <p>Log out</p>
                            </a>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </div>


