<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/supplier/sup_income.css">
<?php require APPROOT.'/views/supplier/supplier_dashboard.php'; ?>

<section>
<main>
        <h1>Income Report</h1>
        <div class="income-container">
            <div class="income-item">
                <h2>January</h2>
                <p>$5,000</p>
            </div>
            <div class="income-item">
                <h2>February</h2>
                <p>$7,000</p>
            </div>
            <div class="income-item">
                <h2>March</h2>
                <p>$10,000</p>
            </div>
            <div class="income-item">
                <h2>April</h2>
                <p>$8,000</p>
            </div>
            <div class="income-item">
                <h2>May</h2>
                <p>$12,000</p>
            </div>
            <div class="income-item">
                <h2>June</h2>
                <p>$15,000</p>
            </div>
        </div>
    </main>

</section>
<!-- <section>
    <div class="graphBox">

        <div class="box">
        <label><center>Income</center></label>
        <canvas id="income"></canvas>
        </div>
    </div>
</section> -->
<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/supplier.js"></script>