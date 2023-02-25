<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/analyze.css">
<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/product_manager/pm_dashboard.php'; ?>

<div class="cardWrapper">
<div class="cardBox">
  <div class="card">
    <div>
      <div class="cardName">Feedback</div>
        <div class="numbers">6</div>
          <div class="day1">
            <div class="circle"></div><label>last 30 days</label>
          </div> 
        </div>
      </div>


      <div class="card">
    <div>
      <div class="cardName">Feedback</div>
        <div class="numbers">6</div>
          <div class="day1">
            <div class="circle"></div><label>last 30 days</label>
          </div> 
        </div>
      </div>

      <div class="card">
    <div>
      <div class="cardName">Feedback</div>
        <div class="numbers">6</div>
          <div class="day1">
            <div class="circle"></div><label>last 30 days</label>
          </div> 
        </div>
      </div>
</div>
</div>
<div class="graphBox">

      <div class="box">
        <label><center>Total Production</center></label>
        <canvas id="ch1"></canvas>
      </div>
</div>











<?php require APPROOT.'/views/include/footer.php'; ?>