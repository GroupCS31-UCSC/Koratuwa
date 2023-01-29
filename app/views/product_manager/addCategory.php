<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/addCategory.css">
<?php require APPROOT.'/views/product_manager/pm_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->





<div class="form-container">

	<div class="form-header">
		<center><h1>Add new Product Category</h1></center>
	</div>
	<br>

	<form action="<?php echo URLROOT; ?>/Product_Manager/addCategory" method="POST" enctype="multipart/form-data">

		<!--category name-->
		<div class="form-input-title">Product Name</div>
    <span class="form-invalid"><?php echo $data['name_err']; ?></span>
		<input type="text" name="name" id="name" class="name" value="<?php echo $data['name']; ?>">

    <!--cost-->
    <div class="form-input-title">Estimated cost per unit</div>
    <span class="form-invalid"><?php echo $data['cost_err']; ?></span>
    <input type="text" name="cost" id="cost" class="cost" value="<?php echo $data['cost']; ?>">

    <!--price-->
    <div class="form-input-title">Selling price for a unit</div>
    <span class="form-invalid"><?php echo $data['price_err']; ?></span>
    <input type="text" name="price" id="price" class="price" value="<?php echo $data['price']; ?>">

    <!--ingredients-->
    <div class="form-input-title">Ingredients</div>
    <span class="form-invalid"><?php echo $data['ingredients_err']; ?></span>
    <input type="text" name="ingredients" id="ingredients" class="ingredients" value="<?php echo $data['ingredients']; ?>">

    <!--image-->
    <div class="form-input-title">Image</div>
    <span class="form-invalid"><?php echo $data['image_err']; ?></span>
    <input type="file" name="image" id="image" class="image" value="<?php echo $data['image']; ?>"><br>


		<br>
		<input type="submit" value="Submit" class="submitBtn">


	</form>
</div>

<?php require APPROOT.'/views/include/footer.php'; ?>
