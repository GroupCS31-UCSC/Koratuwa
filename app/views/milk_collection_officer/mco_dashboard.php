<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/styles.css">
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
        <a href="<?php echo URLROOT; ?>/Milk_Collection_Officer/mcoHome">
          <span class="icon"><i class="fa-solid fa-gauge"></i></span>
          <span class="title">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="<?php echo URLROOT; ?>/Milk_Collection_Officer/viewMilkCollection">
        <span class="icon"><i class="fa-solid fa-blender"></i></span>
        <span class="title">Milk Collection</span>
        </a>
      </li>
      <li>
        <a href="<?php echo URLROOT; ?>/Milk_Collection_Officer/viewFarmMilkCollection">
          <span class="icon"><i class="fa-solid fa-cow"></i></span>
          <span class="title">Koratuwa Milk</span>
        </a>
      </li>
      <li>
        <a href="<?php echo URLROOT; ?>/Milk_Collection_Officer/viewSupplyMilkCollection">
          <span class="icon"><i class="fa-solid fa-glass-water"></i></span>
          <span class="title">Supplier Milk</span>
        </a>
      </li>
      <li>
        <a href="<?php echo URLROOT; ?>/Milk_Collection_Officer/viewSupplyOrderDetails">
          <span class="icon"><i class="fa-solid fa-truck-droplet"></i></span>
          <span class="title">Supply Orders</span>
        </a>
      </li>
      <li>
        <a href="<?php echo URLROOT; ?>/Milk_Collection_Officer/viewSuppliers">
          <span class="icon"><i class="fa-solid fa-user-group"></i></span>
          <span class="title">Suppliers</span>
        </a>
      </li>
      <li>
        <a href="<?php echo URLROOT; ?>/Milk_Collection_Officer/viewAnalysis">
          <span class="icon"><i class="fa-solid fa-chart-line"></i></span>
          <span class="title">Analysis</span>
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
          <li><div class="img-user"><img src="<?php echo URLROOT; ?>/img/users/user.png" alt="user"></div></li>
          <li><a href=""><?php echo $_SESSION['user_name']; ?></a></li>
        </ul>
        <div class="dropdown">
                    <i class="fas fa-chevron-down"></i>
                    <!-- <ion-icon name="chevron-down-outline"></ion-icon> -->
                    <div class="sub-menu-wrap">
                        <div class="sub-menu">
                            <div class="dropdown-content">
                                <div class="user-info">
                                    <span><img src="<?php echo URLROOT; ?>/public/img/users/apsara.jpg" alt=""></span>                    
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


<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/dashboard.js"></script>