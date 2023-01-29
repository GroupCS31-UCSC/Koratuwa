<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/supplier/placeSupply.css">
<?php require APPROOT.'/views/supplier/supplier_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->


<div class="form-container">
<div class="form-header">
		<center><h1>Place Supply Order</h1></center>
	</div>
	<br>


			<form action="<?php echo URLROOT; ?>/Supplier/placeSupply" method="POST">
				<!--quantity-->
				<div class="form-input-title">Supply Quantity (LITER)</div>
				<span class="form-invalid"><?php echo $data['quantity_err']; ?></span>
				<input type="text" name="quantity" id="quantity" class="quantity" value="<?php echo $data['quantity']; ?>">

				<!--supply_date-->
				<div class="form-input-title">Supply Date</div>
				<span class="form-invalid"><?php echo $data['date_err']; ?></span>
				<input type="date" name="date" id="date" class="date" value="<?php echo $data['date']; ?>">

				<!--address-->
				<div class="form-input-title">Address</div>
				<span class="form-invalid"><?php echo $data['address_err']; ?></span>
				<input type="text" name="address" id="address" class="address" value="<?php echo $data['address']; ?>">

				<br>
				<input type="submit" value="Submit" class="submitBtn"><br>
			</form>

<?php require APPROOT.'/views/include/footer.php'; ?>
