<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/financial_manager/fm_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/financial_manager/revenues.css">





<div class="row">
  <div class="column left" style="background-color:#aaa;">
    <h2>ONLINE REVENUES</h2>
    <p>Some text..</p>
  </div>
  <div class="column middle" >
    <h2>TOTAL</h2>
   
    <div class="box">
        <label><center>Number of Productions</center></label>
        <canvas id="ch2"></canvas>
      </div>

  </div>
  <div class="column right" style="background-color:#ccc;">
    <h2>ONSITE REVENUES</h2>
    <p>Some text..</p>
  </div>
</div>






<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/fm.js"></script>

