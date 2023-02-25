<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/customer/styles.css">
<!--
 ______________________________________________________________________________________________________-->

<nav class="top-bar">
    <ul>
        <li><img src="<?php echo URLROOT; ?>/img/koratuwa.png" alt="logo" alt=""></li>  
        <li><div class="bell"><a href=""><i class="fas fa-bell"></i></a></div></li>
        <li><div class="img-user"><img src="<?php echo URLROOT; ?>/img/users/sasindu.jpg" alt="user"></div></li>
        <li><div class="username"><a href=""><?php echo $_SESSION['user_name']; ?></a></div></li>
        <li>
            <div class="dropdown">
                <i class="fas fa-chevron-down"></i>
                <div class="sub-menu-wrap">
                    <div class="sub-menu">
                        <div class="dropdown-content">
                            <div class="user-info">
                                <span><img src="<?php echo URLROOT; ?>/public/img/users/sasindu.jpg" alt=""></span>                    
                            </div>
                            <hr>
                            <a href="<?php echo URLROOT; ?>/Users/userProfile/<?php echo $_SESSION['user_id']; ?>" class="sub-menu-link">
                                <i class="fa-solid fa-user"></i>
                                <p>View Profile</p>
                            </a>   
                            <a href="#" class="sub-menu-link">
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
      </li>
    </ul>
</nav>





 <?php require APPROOT.'/views/include/footer.php'; ?>