<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/addCattle.css">


<div class="form-container">
	<div class="form-header">
		<center><h1>Invoice</h1></center>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Cashier/generateInvoice" method="POST">
        <div class="form-input-title">Order ID</div>
        <input type="text" name="product_id" id="product_id" class="product_id" value="#">
		<div class="form-input-title">Customer ID</div>
        <input type="text" name="customer_name" id="customer_name" class="customer_name" value="#">
        <div class="form-input-title">Deliver or not</div>
        <select class="deliver" name="deliver" id="deliver" value="">
            <option value="deliver">Delivered</option>
            <option value="ndeliver">Not yet</option>
        </select>    
		<br>
		<input type="submit" value="Submit" class="submitBtn">
  </form>
</div>

<?php require APPROOT.'/views/include/footer.php'; ?>
