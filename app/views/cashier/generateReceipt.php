<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/addCattle.css">


<div class="form-container">
	<div class="form-header">
		<center><h1>Receipt</h1></center>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Cashier/generateInvoice" method="POST">
        <div class="form-input-title">Order ID</div>
        <input type="text" name="product_id" id="product_id" class="product_id" value="#">
		<div class="form-input-title">Customer ID</div>
        <input type="text" name="customer_id" id="customer_id" class="customer_id" value="#">
        <div class="form-input-title">Payment</div>
        <input type="text" name="payment" id="payment" class="payment" value="#">
		<br>
		<input type="submit" value="Generate" class="submitBtn">
  </form>
</div>

<?php require APPROOT.'/views/include/footer.php'; ?>
