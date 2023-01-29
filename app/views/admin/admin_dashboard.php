<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/styles.css">
<script type='text/javascript' src='<?php echo URLROOT; ?>/public/js/dashboard.js'></script>
<!--
 ______________________________________________________________________________________________________-->

<div class="container">
  
  <div class="navigation active">
    
    <ul>
      <li>
        <a href="#">
          <span class="icon"><img class="img-logo" src="<?php echo URLROOT; ?>/img/koratuwa.png" alt="logo"></span>
          <!--<span class="title" style="font-size:160%;">KORATUWA</span>-->
        </a>
      </li><br><br><br>
      <li>
        <a href="<?php echo URLROOT; ?>/Admin/landingPage">
          <span class="icon"><i class="fa-solid fa-gauge"></i></span>
          <span class="title"> Dashboard</span>
        </a>
      </li>
      <li>
        <a href="<?php echo URLROOT; ?>/Admin/viewEmployees">
        <span class="icon"><i class="fa-solid fa-people-group"></i></span>
        <span class="title"> Employees</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="icon"><i class="fa-solid fa-cow"></i></span>
          <span class="title">Livestock</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="icon"><i class="fa-solid fa-glass-water"></i></span>
          <span class="title">Milk Collection</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="icon"><i class="fa-solid fa-cheese"></i></span>
          <span class="title">Production</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="icon"><i class="fa-solid fa-cart-shopping"></i></span>
          <span class="title">Customers</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="icon"><i class="fa-solid fa-truck"></i></span>
          <span class="title">Suppliers</span>
        </a>
      </li>
    </ul>
  </div>

  <div class="main active">
    <!--top nav bar-->
    <div class="topnavbar">
      <div class="toggle">
        <i class="fas fa-bars"></i>
      </div>
      <div class="topmenu">
        <ul>
          <li><a href=""><i class="fas fa-bell"></i></a></li>
          <li><div class="img-user"><img src="<?php echo URLROOT; ?>/img/apsara.jpg" alt="user"></div></li>
          <li><a href=""><?php echo $_SESSION['user_name']; ?></a></li>
        </ul>
        <div class="dropdown">
                    <i class="fas fa-chevron-down"></i>
                    <!-- <ion-icon name="chevron-down-outline"></ion-icon> -->
                    <div class="sub-menu-wrap">
                        <div class="sub-menu">
                            <div class="dropdown-content">
                                <div class="user-info">
                                    <span><img src="<?php echo URLROOT; ?>/public/img/apsara.jpg" alt=""></span>                    
                                </div>
                                <hr>
                                <a href="#" class="sub-menu-link">
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
            </div>
        </div>


