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
        <div class="form-input-title">Sale Id</div>
        <input type="text" disabled="disabled" name="Sale_id" id="Sale_id" class="Sale_id" value="">
        
        <div class="form-input-title">Customer Name</div>
        <input type="text" disabled="disabled" name="customer_name" id="customer_name" class="customer_name" value="">
		
        <div class="form-input-title">Products</div>
        <input type="text" disabled="disabled" name="products" id="products" class="products" value="">

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
