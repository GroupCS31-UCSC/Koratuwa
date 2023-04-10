<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/addSale.css">


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
          <span class="icon"><i class="fa-solid fa-gauge"></i></span>
          <span class="title"> Dashboard</span>
        </a>
      </li>
      <li>
        
        <a href="<?php echo URLROOT; ?>/Cashier/viewSale">

          <span class="icon"><i class="fa-solid fa-scale-balanced"></i></span>
          <span class="title">Onside Sales</span>
        </a>
      </li>
      <li>
        <!-- Customer orders -->
        <a href="<?php echo URLROOT; ?>/Cashier/viewCustomerOrders">
          <span class="icon"><i class="fa-brands fa-joget"></i></span>
          <span class="title">Online Sales</span>
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
        <li><a href="" onclick="openSaleModel()"><i class="fa-solid fa-scale-balanced" id="sale"></i></a></li>
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
    <div class="model fade in" id="sale" tabindex="-1">
  <div class="model-dialog">
    <div class="model-content">
      <div class="model-header">
        <button type="button" class="close" onclick="closeSaleModel()" ><span aria-hidden="true">×</span></button>
        <h4 class="Model-title">Add Sale</h4>
      </div>
      <div class="model-body">
      <table>
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Prize</th>
          <th>Action</th>
        </tr>
        <tr>
          <td>Fresh milk</td>
          <td><a href=""><button>+</button></a>03<a href=""><button>-</button></a></td>
          <td>300</td>
          <td>
            <a href="<?php echo URLROOT; ?>/Cashier/deleteSale"><button class="deleteBtn">X</button></a>
          </td>
        </tr>
        <tr>
          <td>Yogurt</td>
          <td><a href=""><button>+</button></a>02<a href=""><button>-</button></a></td>
          <td>300</td>
          <td>
            <a href="<?php echo URLROOT; ?>/Cashier/deleteSale"><button class="deleteBtn">X</button></a>
          </td>
        </tr>
      </table>
      </div>
    </div>
  </div>
  <div class="modal-footer"></div>
</div>

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/dashboard.js"></script>

<script>
  function openSaleModel(){
    document.getElementById('sale').classList.add('open-model');
  }
  function closeSaleModel(){
    document.getElementById('sale').classList.remove('open-model');
  }

</script>