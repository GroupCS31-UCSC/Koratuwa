<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/styles.css">
<!-- ______________________________________________________________________________________________________-->
<div class="full-container">
<div class="navigation active">
<!-- <div class="back">
      <a href="#"><i class="fa-solid fa-chevron-left"></i></a>
    </div> -->
    <ul>
      <li>
        <a href="#">
          <span class="icon"><img class="img-logo" src="<?php echo URLROOT; ?>/img/koratuwa.png" alt="logo"></span>
          <!--<span class="title" style="font-size:160%;">KORATUWA</span>-->
        </a>
      </li><br><br><br>
      <li>
        <a href="<?php echo URLROOT; ?>/Product_Manager/pmHome">
          <span class="icon"><i class="fa-solid fa-gauge"></i></span>
          <span class="title"> Dashboard</span>
        </a>
      </li>
      <li>
        <a href="<?php echo URLROOT; ?>/Product_Manager/productCategories">
          <span class="icon"><i class="fa-solid fa-boxes-stacked"></i></span>
          <span class="title"> Product Categories</span>
        </a>
      </li>
      <li>
      <a href="<?php echo URLROOT; ?>/Product_Manager/addStock">
          <span class="icon"><i class="fa-solid fa-cubes-stacked"></i></span>
          <span class="title">Product Stocks</span>
        </a>
      </li>
      <li>
      <a href="<?php echo URLROOT; ?>/Product_Manager/analyze">
          <span class="icon"><i class="fa-solid fa-chart-simple"></i></span>
          <span class="title">Product Analysis</span>
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
                    <li><a href=""><i class="fas fa-bell"></i></a></li>
                    <li><div class="img-user"><img src="<?php echo URLROOT; ?>/img/users/dew.jpg" alt="user"></div></li>
                    <li><a href=""><?php echo $_SESSION['user_name']; ?></a></li>
                </ul>
                <div class="dropdown">
                    <i class="fas fa-chevron-down"></i>
                    <div class="sub-menu-wrap">
                        <div class="sub-menu">
                            <div class="dropdown-content">
                                <div class="user-info">
                                    <span><img src="<?php echo URLROOT; ?>/public/img/users/dew.jpg" alt=""></span>                    
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