<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/updateCattle.css">


<div class="form-container">
	<div class="form-header">
		<center><h1>Update Cattle</h1></center>
	</div>
	<br>

	<form action="<?php echo URLROOT; ?>/Livestock_Manager/updateCattle/<?php echo $data['cowId']; ?>" method="POST">
    <div class="form-input-title">Breed</div>
    <span class="form-invalid"><?php echo $data['breed_err']; ?></span>
    <select class="breed" name="breed" id="breed" value="<?php echo $data['breed']; ?>">
      <option value="Select">Select</option>
      <option value="Jersey">Jersey (British breed)</option>
      <option value="Persian">Persian (Newzealend breed)</option>
      <option value="Sahiwal">Sahiwal (Indian breed)</option>
      <option value="Girlandor">Girlandor (Indian breed(new))</option>
      <option value="Other">Other</option>
    </select>
    <!-- milking -->
    <div class="form-input-title">Milking</div>
    <span class="form-invalid"><?php echo $data['milking_err']; ?></span>
    <select class="milking" name="milking" id="milking" value="<?php echo $data['milking']; ?>">
      <option value="Select">Select</option>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
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