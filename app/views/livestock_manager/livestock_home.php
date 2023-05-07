<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/livestock_home.css">

<?php foreach ($data['cattle_count'] as $cattleCount) : ?>

<!--cards-->
<session class="cardBox">
  <!-- Total cattles -->
  <div class="container">
    <div class="totCattle">
      <div>
        <div class="cardName">Total Cattle</div><br>
        <!-- <div class="numbers"></div> -->
        <div class="numbers"><?php echo $cattleCount; ?></div>
      </div>
    </div>
    <div class="card">
      <div>
        <div class="cardName">Stall:01-Milk collection(L.)</div>
        <div class="numbers">100</div>
      </div>
    </div>
    <div class="card">
      <div>
        <div class="cardName">Stall:02-Milk collection(L.)</div>
        <div class="numbers">120</div>
      </div>
    </div>
    <div class="card">
    <div>
      <div class="cardName">Stall:03-Milk collection(L.)</div>
      <div class="numbers">130</div>
    </div>
  </div>
  <div class="card">
    <div>
      <div class="cardName">Stall:04-Milk collection(L.)</div>
      <div class="numbers">100</div>
    </div>
</div> 
<?php endforeach; ?>
</session>

<!--Add charts-->
<div class="graphBox">
  <div class="box">
  <label><center>Milk collection</center></label>
  <!-- Filters -->
  <div class="filter">
  <div class="date-input">
    <label for="fromDate">From:</label>
    <input type="date" id="fromDate" name="fromDate">
  </div>
  <div class="date-input">
    <label for="toDate">To:</label>
    <input type="date" id="toDate" name="toDate">
  </div>
</div>


  
    <canvas id="milkCollect"></canvas>
  </div>
  <div class="box">
    <label><center>Milking cattle</center></label>
    <canvas id="mCattle"></canvas>
  </div>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/lm.js"></script>
