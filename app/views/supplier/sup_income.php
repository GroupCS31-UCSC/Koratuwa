<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/supplier/sup_income.css">
<?php require APPROOT.'/views/supplier/supplier_dashboard.php'; ?>

<div class="graphBox">

    <div class="box">
    <label><center>Income</center></label>
    <canvas id="income"></canvas>
    </div>
</div>

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/supplier.js"></script>