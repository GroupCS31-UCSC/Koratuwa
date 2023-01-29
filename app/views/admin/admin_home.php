<?php 
if($_SESSION['user_email']){?>
<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/admin_home.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php'; ?>
<!--
 ______________________________________________________________________________________________________-->


    <!--cards-->
    <div class="cardBox">

      <div class="card">
        <div>
          <div class="cardName">Total Income(Rs.)</div>
          <div class="numbers">320362</div>
          <div class="day1">
            <div class="circle"></div><label>last 30 days</label>
          </div>
        </div>
      </div>

      <div class="card">
        <div>
          <div class="cardName">Total Expenses(Rs.)</div>
          <div class="numbers">120062</div>
          <div class="day2">
            <div class="circle"></div><label>last 30 days</label>
          </div>
        </div>
      </div>

      <div class="card">
        <div>
          <div class="cardName">Total Profit(Rs.)</div>
          <div class="numbers">200300</div>
          <div class="day3">
            <div class="circle"></div><label>last 30 days</label>
          </div>
        </div>
      </div>

      <div class="card">
        <div>
          <div class="cardName">Total Milk Collection(L.)</div>
          <div class="numbers">3,504</div>
          <div class="day4">
            <div class="circle"></div><label>last 30 days</label>
          </div>
        </div>
      </div>

    </div>

    <!--Add charts-->
    <div class="graphBox">

      <div class="box">
        <label><center>Total Profit</center></label>
        <canvas id="earning"></canvas>
      </div>

      <div class="box">
        <label><center>Profit by Productions</center></label>
        <canvas id="profit"></canvas>
      </div>

    </div>



<!--
<script type="text/javascript" href="<?php echo URLROOT; ?>/public/js/myChart.js">

</script>
-->
<?php require APPROOT.'/views/include/footer.php'; ?>

<?php } else {
  redirect('Users/login');}?>
