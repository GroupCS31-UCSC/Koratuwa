<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/addCattle.css">


<div class="form-container">
	<div class="form-header">
		<center><h1>Update status</h1></center>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Cashier/updateOrderStatus" method="POST">
        <!-- Product Id -->
        <div class="form-input-title">Product Id</div>
        <input type="text" name="product_id" id="product_id" class="product_id" value="#">
		<!--Customer name-->
		<div class="form-input-title">Order status</div>
        <select name="orderStatus" id="orderStatus">
            <option value="Pending">Pending</option>
            <option value="Processing">Processing</option>
            <option value="Delivered">Delivered</option>
        </select>
    
		<br>
		<input type="submit" value="Submit" class="submitBtn">
  </form>
</div>

<?php require APPROOT.'/views/include/footer.php'; ?>
