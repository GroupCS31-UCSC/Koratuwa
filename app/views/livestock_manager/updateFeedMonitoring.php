<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/addCattle.css">


<div class="form-container">
	<div class="form-header">
		<center><h1>Update Feed record</h1></center>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Livestock_Manager/updateFeedMonitoring" method="POST">
        <!-- Cow Id -->
        <div class="form-input-title">COW ID</div>
        <input type="text" name="cow_id" id="cow_id" class="cow_id" value="#">

        <!-- Feed item -->
        <div class="form-input-title">Feed Item</div>
        <input type="text" name="feed_item" id="feed_item" class="feed_item" value="#">
        
		<!--Quantity-->
		<div class="form-input-title">Quantity</div>
        <input type="text" name="quantity" id="quantity" class="quantity" value="#">
        
        <!--remarks-->
        <div class="form-input-title">Remarks</div>
        <input type="text" name="remarks" id="remarks" class="remarks" value="#">
    
		<br>
		<input type="submit" value="Submit" class="submitBtn">
  </form>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
