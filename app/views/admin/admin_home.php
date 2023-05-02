
<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/admin_home.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php'; ?>
<!--
 ______________________________________________________________________________________________________-->


<!--cards-->
<section class="cardBox">

    <div class="card">
      <div>
        <div class="cardbg"><img class="img" src="<?php echo URLROOT; ?>/img/supplier/sup_home.jpg" alt="no"></div>
        <div class="cardName">Total Income(Rs.)</div>
        <div class="value">320362</div>
        <div class="day1">
          <div class="circle"></div><label>last 30 days</label><i class="fa-solid fa-filter"></i>
        </div>
      </div>
    </div>

    <div class="card">
      <div>
      <div class="cardbg"><img class="img" src="<?php echo URLROOT; ?>/img/supplier/sup_home.jpg" alt="no"></div>
        <div class="cardName">Total Expenses(Rs.)</div>
        <div class="value">120062</div>
        <div class="day2">
          <div class="circle"></div><label>last 30 days</label><i class="fa-solid fa-filter"></i>
        </div>
      </div>
    </div>

    <div class="card">
      <div>
      <div class="cardbg"><img class="img" src="<?php echo URLROOT; ?>/img/supplier/sup_home.jpg" alt="no"></div>
        <div class="cardName">Total Profit(Rs.)</div>
        <div class="value">200300</div>
        <div class="day3">
          <div class="circle"></div><label>last 30 days</label><i class="fa-solid fa-filter"></i>
        </div>
      </div>
    </div>

    <div class="card">
      <div>
      <div class="cardbg"><img class="img" src="<?php echo URLROOT; ?>/img/supplier/sup_home.jpg" alt="no"></div>
        <div class="cardName">Total Cattle</div>
        <div class="value">3,504</div>
        <div class="day4">
          <div class="circle"></div><label>last 30 days</label><i class="fa-solid fa-filter"></i>
        </div>
      </div>
    </div>

    <div class="card">
      <div>
      <div class="cardbg"><img class="img" src="<?php echo URLROOT; ?>/img/supplier/sup_home.jpg" alt="no"></div>
        <div class="cardName">Total Milk Collection(L.)</div>
        <div class="value">3,504</div>
        <div class="day4">
          <div class="circle"></div><label>last 30 days</label><i class="fa-solid fa-filter"></i>
        </div>
      </div>
    </div>

    <!-- <div class="card">
      <div>
      <div class="cardbg"><img class="img" src="<?php echo URLROOT; ?>/img/supplier/sup_home.jpg" alt="no"></div>
        <div class="cardName">Total Employees</div>
        <div class="value">3,504</div>
        <div class="day4">
          <div class="circle"></div><label>last 30 days</label><i class="fa-solid fa-filter"></i>
        </div>
      </div>
    </div> -->

    <!-- <div class="card">
      <div>
      <div class="cardbg"><img class="img" src="<?php echo URLROOT; ?>/img/supplier/sup_home.jpg" alt="no"></div>
        <div class="cardName">Total Supply Orders</div>
        <div class="value">3,504</div>
        <div class="day4">
          <div class="circle"></div><label>last 30 days</label><i class="fa-solid fa-filter"></i>
        </div>
      </div>
    </div> -->

    
    <!-- financial condition -->

</section>

<!--Add charts-->
<section class="graphBox">

  <div class="box">
    <label><center>Total Profit of Last 6 Months</center></label>
    <canvas id="earning"></canvas>
  </div>

  <div id="test" class="box">
    <label><center>Profit by Productions</center></label>
    <canvas id="profit"></canvas>
  </div>

</section>



<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>

