<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/addCategory.css">
<?php require APPROOT.'/views/financial_manager/fm_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->





<div class="form-container">

	<div class="form-header">
		<center><h1>Edit Expense Record</h1></center>
	</div>
	<br>

	<form action="<?php echo URLROOT; ?>/Financial_Manager/updateExpense" method="POST" enctype="multipart/form-data">

		<!--category name-->
	<div class="form-input-title">Date</div>
    <span class="form-invalid"><?php echo $data['dat_err']; ?></span>
	<input type="date" name="dat" id="dat" class="dat" value="<?php echo $data['dat']; ?>">

    <!--cost-->
    <div class="form-input-title">Description</div>
    <span class="form-invalid"><?php echo $data['des_err']; ?></span>
    <input type="text" name="des" id="des" class="des" value="<?php echo $data['des']; ?>">

    <!--price-->
    <div class="form-input-title">Vendor</div>
    <span class="form-invalid"><?php echo $data['ven_err']; ?></span>
    <input type="text" name="ven" id="ven" class="ven" value="<?php echo $data['ven']; ?>">

    <!--ingredients-->
    <div class="form-input-title">Amount</div>
    <span class="form-invalid"><?php echo $data['amo_err']; ?></span>
    <input type="number" name="amo" id="amo" class="amo" value="<?php echo $data['amo']; ?>">



		<br>
		<input type="submit" value="Update" class="submitBtn">


	</form>
</div>

<?php require APPROOT.'/views/include/footer.php'; ?>