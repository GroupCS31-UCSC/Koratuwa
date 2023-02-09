<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/addSale.css">


<div class="form-container">
	<div class="form-header">
		<center><h1>Add New Sale</h1></center>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Cashier/addSale" method="POST">
        <!-- Product Id -->
        <div class="form-input-title">Sale Id</div>
        <input type="text" name="sale_id" id="sale_id" class="sale_id" value="" disabled="disabled">

        <!-- products -->
        <div class="form-input-title">Products</div>
        <select name="products" id="products">
            <option value="Fresh milk">Fresh Milk</option>
            <option value="Flavourd milk">Flavord milk</option>
            <option value="Yogurt">Yogurt</option>
        </select>
        <div class="form-input-title">Quantity</div>
        <input type="text" name="quantity" id="quantity" class="quantity" value="">

        <!-- Sales income -->
        <div class="form-input-title">Sales income</div>
        <input type="text" disabled="disabled" name="sales_income" id="sales_income" class="sales_income" value="">

		<!--Customer name-->
		<div class="form-input-title">Customer Name</div>
        <input type="text" name="customer_name" id="customer_name" class="customer_name" value="">
        
        <!--Contact no-->
        <div class="form-input-title">Contact no</div>
        <input type="text" name="contact_no" id="contact_no" class="contact_no" value="">
    
		<br>
		<input type="submit" value="Submit" class="submitBtn">
  </form>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
