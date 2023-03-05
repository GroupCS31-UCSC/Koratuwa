<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/styles.css">


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
        <a href="<?php echo URLROOT; ?>/Livestock_Manager/livestockHome">
          <span class="icon"><i class="fa-solid fa-gauge"></i></span>
          <span class="title"> Dashboard</span>
        </a>
      </li>
      <li>
        <!-- Cattle -->
        <a href="<?php echo URLROOT; ?>/Livestock_Manager/viewCattle">
          <span class="icon"><i class="fas fa-cow"></i></span>
          <span class="title">Cattle</span>
        </a>
      </li>
      <li>
        <a href="<?php echo URLROOT; ?>/Livestock_Manager/viewFeedMonitoring">
          <span class="icon"><i class="fa-solid fa-leaf"></i></span>
          <span class="title">Feed Monitoring</span>
        </a>
      </li>
      <li>
        <a href="<?php echo URLROOT; ?>/Livestock_Manager/viewCattleMilking">
          <span class="icon"><i class="fa-solid fa-blender"></i></span>
          <span class="title">Milking</span>
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

