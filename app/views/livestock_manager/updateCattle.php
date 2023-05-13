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
      <option value="Jersey" <?php if(isset($data['breed']) && $data['breed'] == "Jersey") echo "selected";?>>Jersey (British breed)</option>
      <option value="Persian" <? if(isset($data['Persian']) && $data['breed']=="Persian") echo "selected";?>>Persian (Newzealend breed)</option>
      <option value="Sahiwal" <?php if(isset($data['Sahiwal']) && $data['breed']=="Sahiwel")?>>Sahiwal (Indian breed)</option>
      <option value="Girlandor" <?php if(isset($data['Girlandor']) && $data['breed']=="Girlandor")?>>Girlandor (Indian breed(new))</option>
    </select>
    <!-- milking -->
    <div class="form-input-title">Milking</div>
    <span class="form-invalid"><?php echo $data['milking_err']; ?></span>
    <select class="milking" name="milking" id="milking" value="<?php echo $data['milking']; ?>">
      <option value="Yes" <?php if(isset($data['Yes']) && $data['milking']=="Yes")?>>Yes</option>
      <option value="No" <?php if(isset($data['No']) && $data['milking']=="No")?>>No</option>
    </select>

    <!-- stall -->
    <div class="form-input-title">Stall Id</div>
    <span class="form-invalid"><?php echo $data['stallId_err']; ?></span>
    <select class="stallId" name="stallId" id="stallId" value="<?php echo $data['stallId']; ?>">
      <option value="STALL1" <?php if(isset($data['STALL1']) && $data['stallId']=="STALL1")?>>1</option>
      <option value="STALL2" <?php if(isset($data['STALL2']) && $data['stallId']=="STALL2")?>>2</option>
      <option value="STALL3"  <?php if(isset($data['STALL3']) && $data['stallId']=="STALL3")?>>3</option>
      <option value="STALL4"  <?php if(isset($data['STALL4']) && $data['stallId']=="STALL4")?>>4</option>
    </select>
    <br>

		<input type="submit" value="Submit" class="submitBtn">
	</form>
</div>

<?php require APPROOT.'/views/include/footer.php'; ?>