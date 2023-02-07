<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/cashier_home.css">


<!--cards-->
<session class="cardBox">
  <div class="container">
    <div class="card">
      <div>
        <div class="cardName">Online Sales</div>
        <div class="numbers">100</div>
      </div>
    </div>
    <div class="card">
      <div>
        <div class="cardName">Onsite Sales</div>
        <div class="numbers">30</div>
      </div>
    </div>
  </div>
  
</session>


<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/cashier.js"></script>
