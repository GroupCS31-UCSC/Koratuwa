<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/addCategory.css">
<?php require APPROOT.'/views/product_manager/pm_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->





<div class="form-container">

	<div class="form-header">
		<center><h1>Add new Product Stock</h1></center>
	</div>
	<br>

	<form action="<?php echo URLROOT; ?>/Product_Manager/addStock" method="POST" enctype="multipart/form-data">

<?php
    $conn=mysqli_connect('localhost','root','','koratuwa');
    $query="SELECT product_id FROM product_category";
    $result_set=mysqli_query($conn,$query);
    $product_list='';
    while($result=mysqli_fetch_assoc($result_set)){
    $product_list.="<option value=\"{result['product_id']}\">{$result['product_id']}</option>";
    }
?>
		<!--category name-->
	<div class="form-input-title">Product ID</div>
    <span class="form-invalid"><?php echo $data['pId_err']; ?></span>
	<label for="Select the Product"></label>
    <select class="pId" name="pId" id="pId" value="<?php echo $data['pId']; ?>">
        <?php echo $product_list;?>
    </select>

    <!--cost-->
    <div class="form-input-title">Quanitity</div>
    <span class="form-invalid"><?php echo $data['qty_err']; ?></span>
    <input type="number" name="qty" id="qty" class="qty" value="<?php echo $data['qty']; ?>">

    <!--price-->
    <div class="form-input-title">Manufactured Date</div>
    <span class="form-invalid"><?php echo $data['mfd_err']; ?></span>
    <input type="date" name="mfd" id="mfd" class="mfd" value="<?php echo $data['mfd']; ?>">

    <!--ingredients-->
    <div class="form-input-title">Expiry Date</div>
    <span class="form-invalid"><?php echo $data['exp_err']; ?></span>
    <input type="date" name="exp" id="exp" class="exp" value="<?php echo $data['exp']; ?>">

   


		<br>
		<input type="submit" value="Submit" class="submitBtn">


	</form>
</div>

<?php require APPROOT.'/views/include/footer.php'; ?>
