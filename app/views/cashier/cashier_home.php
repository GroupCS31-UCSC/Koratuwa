<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/cashier_home.css">


<!--cards-->
<!-- <session class="cardBox">
  <div class="container">
    <div class="card">
      <div>
        <div class="cardName">Online Orders</div>
        <div class="numbers">100</div>
        <div class="day"><div class="circle"></div><label for="">Pending</label></div>
      </div>
    </div>
    <div class="card">
      <div>
        <div class="cardName">Online Orders</div>
        <div class="numbers">30</div>
        <div class="day"><div class="circle"></div><label for="">Delivered</label></div>
      </div>
    </div>
    <div class="card">
      <div>
        <div class="cardName">Online Orders</div>
        <div class="numbers">90</div>
        <div class="day">
          <div class="circle"></div>
          <label for="">Processing</label>
        </div>
      </div>
    </div>
    <div class="card">
      <div>
        <div class="cardName">Onsite Sales</div>
        <div class="numbers">30</div>
        <div class="day"><div class="circle"></div><label for="">For Today</label></div>
      </div>
    </div>
  </div>
  
</session> -->


<div class="container">
  <div class="report-area">
    <h3>Shortcut Report</h3>
    <a href="#profitReport">
      View Report
    </a>
  </div>

  <div class="cardBox">
    <div class="card">
      <div>
        <div class="cardName">Opening Balance</div>
        <div class="numbers">24575</div>
      </div>
    </div>
    <div class="card">
      <div>
        <div class="cardName">Today's Transection</div>
        <div class="numbers">5786</div>
      </div>
    </div>
    <div class="card">
      <div>
        <div class="cardName">Today's Expense</div>
        <div class="numbers">57575</div>
      </div>
    </div>
    <div class="card">
      <div>
        <div class="cardName">Today's Net Salary</div>
        <div class="numbers">24575</div>
      </div>
    </div>
  </div>
</div>
<div class="graphBox">
  <div class="box">
    <label><center>Orders</center></label>
    <canvas id="order"></canvas>
  </div>

  <div class="box">
    <label><center>Percentages of sales</center></label>
    <canvas id="type"></canvas>
  </div>

</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/cashier.js"></script>
