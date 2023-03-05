<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/addCategory.css">
<?php require APPROOT.'/views/product_manager/pm_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->





<div class="form-container">

	<div class="form-header">
		<center><h1>Add new Product</h1></center>
	</div>
	<br>

	<form action="<?php echo URLROOT; ?>/Product_Manager/addCategory" method="POST" enctype="multipart/form-data">

		<!--category name-->
		<div class="form-input-title">Product Name</div>
    <span class="form-invalid"><?php echo $data['name_err']; ?></span>
		<input type="text" name="name" id="name" class="name" value="<?php echo $data['name']; ?>">

    <div class="form-input-title">Size of a pack</div>
    <span class="form-invalid"><?php echo $data['size_err']; ?></span>
    <input type="text" name="size" id="size" class="size" value="<?php echo $data['size']; ?>"> 

    <!--price-->
    <div class="form-input-title">Selling price for a unit</div>
    <span class="form-invalid"><?php echo $data['price_err']; ?></span>
    <input type="number" min="1" step="any" name="price" id="price" class="price" value="<?php echo $data['price']; ?>">

    <!--ingredients-->
    <div class="form-input-title">Ingredients</div>
    <span class="form-invalid"><?php echo $data['ingredients_err']; ?></span>
    <input type="text" name="ingredients" id="ingredients" class="ingredients" value="<?php echo $data['ingredients']; ?>">
  
    <div class="form-input-title">Expiry Duration(In Days)</div>
    <span class="form-invalid"><?php echo $data['duration_err']; ?></span>
    <input type="number" min="0" name="duration" id="duration" class="duration" value="0" defaultValue="0">

    <div class="form-input-title">Expiry Duration(In Months)</div>
    <span class="form-invalid"><?php echo $data['duration_months_err']; ?></span>
    <input type="number" min="0" name="duration_months" id="duration_months" class="duration_months" value="0" defaultValue="0">

    <!--image-->
    <div class="form-input-title">Image</div>
    <span class="form-invalid"><?php echo $data['image_err']; ?></span>
    <input type="file" name="image" id="image" class="image" value="<?php echo $data['image']; ?>"><br>


		<br>
		<input type="submit" value="Submit" class="submitBtn">


	</form>
</div>

<?php require APPROOT.'/views/include/footer.php'; ?>
