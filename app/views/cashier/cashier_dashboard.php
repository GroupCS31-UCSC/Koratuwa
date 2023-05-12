<?php require APPROOT . '/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/styles.css">



<div class="full-container">
  <!--Dashboard-->
  <div class="navigation active">
    <ul>
      <li>
        <a href="#">
          <span class="icon"><img class="img-logo" src="<?php echo URLROOT; ?>/img/koratuwa.png" alt="logo"></span>
        </a>
      </li><br><br><br>
      <li>
        <a href="<?php echo URLROOT; ?>/Cashier/cashierHome">
          <span class="icon"><i class="fa fa-money" aria-hidden="true"></i></i></span>
          <span class="title"> Add Sale</span>
        </a>
      </li>
      <li>
        <a href="<?php echo URLROOT; ?>/Cashier/viewOnsiteSale">
          <span class="icon"><i class="fa-solid fa-scale-balanced"></i></span>
          <span class="title">Onsite Sales</span>
        </a>
      </li>
      <li>
        <a href="<?php echo URLROOT; ?>/Cashier/viewCustomerOrders">
          <span class="icon"><i class="fa fa-cart-plus"></i></span>
          <span class="title">Customer Orders</span>
        </a>
      </li>
    </ul>
  </div>

  <!--main-->
  <div class="main active">
  <!--top nav bar-->
    <div class="topnavbar">
      <div class="toggle">
        <i class="fas fa-bars"></i>
      </div>
    <div class="topmenu">
      <ul>
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

<script src="<?php echo URLROOT; ?>/js/dashboard.js"></script>
