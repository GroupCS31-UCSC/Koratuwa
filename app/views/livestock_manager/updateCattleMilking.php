<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/updateCattle.css">


<div class="form-container">
	<div class="form-header">
		<center><h1>Update Milk collect</h1></center>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Livestock_Manager/updateCattleMilking/<?php echo $data['milkId']; ?>" method="POST">
    <div class="form-input-title">Quantity</div>
    <input type="number" name="quantity" id="quantity" class="quantity" value="<?php echo $data['quantity'];?>" required>
	<br>
	<input type="submit" value="Submit" class="submitBtn">
  </form>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
