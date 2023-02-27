<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/addCattle.css">


<div class="form-container">
	<div class="form-header">
		<center><h1>Update Feed record</h1></center>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Livestock_Manager/updateFeedMonitoring" method="POST" enctype="multipart/form-data
    ">
        <!-- Feed item -->
        <div class="form-input-title">Feed Item</div>
        <span class="form-invalid"><?php echo $data[0]['feedItem_err']; ?></span>
        <label for="Select the Feed Item"></label>
        
        <select name="feedItem" id="feedItem">            
            <option value="Grass" name="feedItem">Grass</option>
            <option value="Water" name="feedItem">Water</option>
            <option value="Salt" name="feedItem">Salt</option>
        </select>

		<!--Quantity-->
		<div class="form-input-title">Quantity</div>
        <span class="form-invalid"><?php echo $data[0]['feedQuantity_err']; ?></span>
        <input type="number" name="feedQuantity" id="feedQuantity" class="feedQuantity" value="<?php echo $data[0]['feedQuantity'];?>" required>
        
        <!--Note-->
        <div class="form-input-title">Note</div>
        <span class="form-invalid"><?php echo $data[0]['note_err']; ?></span>
        <input type="text" name="note" id="note" class="note" value="<?php echo $data[0]['note'];?>" required>
    
		<br>
		<input type="submit" value="Submit" class="submitBtn">
  </form>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
