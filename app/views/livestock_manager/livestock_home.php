<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/livestock_home.css">


<!--cards-->
<div class="cardBox">
  <!-- Total cattles -->
  <div class="card">
    <div>
      <div class="cardName">Total Cattle</div>
      <div class="numbers">200</div>
    </div>
  </div>
  <div class="card">
    <div>
      <div class="cardName">Total Female Cattle</div>
      <div class="numbers">150</div>
    </div>
  </div>
  <div class="card">
    <div>
      <div class="cardName">Total Male Cattle</div>
      <div class="numbers">30</div>
    </div>
  </div>
  <div class="card">
    <div>
      <div class="cardName">Total Calf</div>
      <div class="numbers">20</div>
    </div>
  </div>
</div>

<!--Add charts-->
<div class="graphBox">
  <div class="box">
  <label><center>Cattle</center></label>
    <canvas id="cattle"></canvas>
  </div>
  <div class="box">
    <label><center>Milking cattle</center></label>
    <canvas id="pCattle"></canvas>
  </div>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>