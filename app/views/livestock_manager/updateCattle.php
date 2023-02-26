<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/updateCattle.css">


<div class="form-container">
	<div class="form-header">
		<center><h1>Update Cattle</h1></center>
	</div>
	<br>

	<form action="<?php echo URLROOT; ?>/Livestock_Manager/updateCattle/<?php echo $data['cowId']; ?>" method="POST">
    <div class="form-input-title">Weight</div>
    <span class="form-invalid"><?php echo $data['weight_err']; ?></span>
    <input type="text" name="weight" id="weight" class="weight" value="<?php echo $data['weight']; ?>">
    <div class="form-input-title">Height</div>
    <span class="form-invalid"><?php echo $data['height_err']; ?></span>
    <input type="text" name="height" id="height" class="height" value="<?php echo $data['height']; ?>">
    <!-- line -->
		<!-- <br>
    <hr> -->
    <!-- pregnant status -->
    <!-- <div class="form-input-title">Pregnant Status</div>
    <span class="form-invalid"><?php echo $data['pregnant_err']; ?></span>
    <select name="pregnant" id="pregnant" class="pregnant">
      <option value="0" <?php if($data['pregnant'] == 0) echo 'selected'; ?>>Not Pregnant</option>
      <option value="1" <?php if($data['pregnant'] == 1) echo 'selected'; ?>>Pregnant</option>
    </select> -->
    <!-- if click not pregnant don't show below if yes show pregnant date -->
    
    <br>

		<input type="submit" value="Submit" class="submit-btn">
	</form>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>