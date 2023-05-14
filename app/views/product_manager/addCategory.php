<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/addCategory.css">
<script src="<?php echo URLROOT; ?>/js/pm.js"></script>
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
 <div class="form-input-container">
  <div class="form-input-wrapper">
     <div class="form-input-container">
     <div class="form-input-wrapper"><label>Cow's Milk</label>  </div>
     <div class="form-input-wrapper"> <input type ="checkbox" name = "ingredients[]" value = "Cow's Milk"><br></div>
</div>
<div class="form-input-container">
<div class="form-input-wrapper"><label>Sugar</label>  </div>
<div class="form-input-wrapper"><input type ="checkbox" name = "ingredients[]" value = "Sugar"><br></div>
</div>
<div class="form-input-container">
<div class="form-input-wrapper"><label>Water</label>  </div>
<div class="form-input-wrapper"><input type ="checkbox" name = "ingredients[]" value = "Water"><br></div>
     </div>
  </div>
     <div class="form-input-wrapper">
    <div class="form-input-container">
    <div class="form-input-wrapper"><label>Natural Flavours</label>  </div>
    <div class="form-input-wrapper"><input type ="checkbox" name = "ingredients[]" value = "Natural Flavours"><br></div>
    </div>
    <div class="form-input-container">
    <div class="form-input-wrapper"><label>Artificial Flavours</label>  </div>
    <div class="form-input-wrapper"><input type ="checkbox" name = "ingredients[]" value = "Artificial Flavours"><br></div>
    </div>
    <div class="form-input-container">
    <div class="form-input-wrapper"><label>Food Colouring</label>  </div>
    <div class="form-input-wrapper"><input type ="checkbox" name = "ingredients[]" value = "Food Colouring"><br></div>
    </div>
     </div>
     </div>

  <br>
  Expiry Duration
    <div class="form-input-container">
    
    <div class="form-input-wrapper">


    <div class="form-input-title">Months</div>
    <span class="form-invalid"><?php echo $data['duration_months_err']; ?></span>
    <input type="number" min="0" name="duration_months" id="duration_months" class="duration_months" value="0" defaultValue="0">

    </div>

    <div class="form-input-wrapper">
    
    <div class="form-input-title">Days</div>
    <span class="form-invalid"><?php echo $data['duration_err']; ?></span>
    <input type="number" min="0" name="duration" id="duration" class="duration" value="0" defaultValue="0">

    </div>

    </div>




    <!--image-->
    <div class="form-input-title">Image</div>
    <span class="form-invalid"><?php echo $data['image_err']; ?></span>
    <input type="file" name="image" id="image" class="image" value="<?php echo $data['image']; ?>"><br>


		<br>
    <div class="container">
		<input type="submit" value="Submit" class="submitBtn">
    <!-- <div class="popup" id="popup">
    <img class="img" src="<?php echo URLROOT; ?>/img/tick.png" alt="logo"></span>
    <p>Your details have been added sucessfully.</p>
    <button type="button" onclick="closePopup()">OK </button>
  
  </div>
   -->
  </div>

	</form>
</div>
<!-- <script>
let popup=document.getElementById("popup");
function openPopup()
{
  popup.classList.add("open-popup");
}

function closePopup()
{
  popup.classList.remove("open-popup");
}

</script> -->
<?php require APPROOT.'/views/include/footer.php'; ?>
