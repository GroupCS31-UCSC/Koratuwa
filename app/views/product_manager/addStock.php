<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/addStock.css">
<?php require APPROOT.'/views/product_manager/pm_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->



<div class="form-container">

	<div class="form-header">
		<center><h1>Add new Product Batch</h1></center>
	</div>
	<br>  

	<form action="<?php echo URLROOT; ?>/Product_Manager/addStock/<?php echo $data['pId'] ?>" method="POST" enctype="multipart/form-data">
		<!--category name-->
	<!-- <div class="form-input-title">Product ID</div>
    <span class="form-invalid"><?php echo $data['pId_err']; ?></span>
	<label for="Select the Product"></label>
  
    <?php $values = $data?>
    <select name="pId" id="pId">
      <?php foreach($values as $product_id):?>
        <option value="<?=$product_id->product_id?>" name="pId"><?=$product_id->product_id?></option>
      <?php endforeach;?>
  </select> -->
    
    <div class="form-input-title">Product</div>
    <span class="form-invalid"><?php echo $data['pId_err']; ?></span>
    <input type="text" name="pId" id="pId" class="pId" value="<?php echo $data['pId'];?>" defaultValue="<?php echo $data['pId'];?>" disabled >

    <!--cost-->
    <div class="form-input-title">Quanitity</div>
    <span class="form-invalid"><?php echo $data['qty_err']; ?></span>
    <input type="number" min="100" name="qty" id="qty" class="qty" value="<?php echo $data['qty'];?>" >

    <!--price-->
    <div class="form-input-title">Manufactured Date</div>
    <span class="form-invalid"><?php echo $data['mfd_err']; ?></span>
    <input type="date" name="mfd" id="mfd" class="mfd" value="<?php echo $data['mfd']; ?>" >

    <!--ingredients-->
    <!-- <div class="form-input-title">Expiry Date</div>
    <span class="form-invalid"><?php echo $data['exp_err']; ?></span>
    <input type="date" name="exp" id="exp" class="exp" value="<?php echo $data['exp']; ?>"  > -->

   


		<br>
		<input type="submit" value="Submit" class="submitBtn" >


	</form>
  
  </div>


<?php require APPROOT.'/views/include/footer.php'; ?>
