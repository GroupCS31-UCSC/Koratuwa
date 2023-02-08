
<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/mco_home.css">
<?php require APPROOT.'/views/milk_collection_officer/mco_dashboard.php'; ?>
<!--
 ______________________________________________________________________________________________________-->


<!--cards-->
<section class="cardBox">
  <div class="container">
    
    <div class="card">
      <div>
        <div class="cardName">Total Milk Collection(L.)</div>
        <div class="numbers">1548 L</div>
        <div class="day1">
          <div class="circle"></div><label>last 30 days</label>
        </div>
      </div>
    </div>

    <div class="card">
      <div>
        <div class="cardName">Total Suppliers</div>
        <div class="numbers">42</div>
        <div class="day2">
          <div class="circle"></div><label>last 30 days</label>
        </div>
      </div>
    </div>

    <div class="card">
      <div>
        <div class="cardName">Koratuwa Cattle</div>
        <div class="numbers">68</div>
        <div class="day3">
          <div class="circle"></div><label>last 30 days</label>
        </div>
      </div>
    </div>

    <div class="card">
      <div>
        <div class="cardName">Total Milk Sales</div>
        <div class="numbers">1245 L</div>
        <div class="day4">
          <div class="circle"></div><label>last 30 days</label>
        </div>
      </div>
    </div>

  </div>
</section>

<!--Add charts-->
<div class="graphBox">

  <div id="test" class="box">
    <label><center>Koratuwa milk vs Suppliers milk</center></label>
    <canvas id="milk"></canvas>
  </div>

  <div class="box">
    <label><center>Total Milk Collection</center></label>
    <canvas id="collection"></canvas>
  </div>


</div>
<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/mco.js"></script>



