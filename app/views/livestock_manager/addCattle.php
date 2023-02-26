<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/addCattle.css">

<div class="form-container">
	<div class="form-header">
		<h3>Add Cattle</h3>
	</div>
	<form action="<?php echo URLROOT; ?>/Livestock_Manager/addCattle" method="POST">
    <div class="form-input-title">Date of birth</div>
    <span class="form-invalid"><?php echo $data['dob_err']; ?></span>
    <input type="date" name="dob" id="dob" class="dob" value="<?php echo $data['dob']; ?>">
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
    <label for="other">Other:</label>
    <input type="text" name="other" id="other" class="other" value="">
    <div class="form-input-title">Gender</div>
    <span class="form-invalid"><?php echo $data['gender_err']; ?></span>
    <select class="gender" name="gender" id="gender" value="<?php echo $data['gender']; ?>">
      <option value="Select">Select</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
    <div class="form-input-title">Weight</div>
    <span class="form-invalid"><?php echo $data['weight_err']; ?></span>
    <input type="text" name="weight" id="weight" class="weight" value="<?php echo $data['weight']; ?>">
    <div class="form-input-title">Height</div>
    <span class="form-invalid"><?php echo $data['height_err']; ?></span>
    <input type="text" name="height" id="height" class="height" value="<?php echo $data['height']; ?>">
    <div class="form-input-title">Health</div>
    <span class="form-invalid"><?php echo $data['health_err']; ?></span>
    <select class="health" name="health" id="health" value="<?php echo $data['health']; ?>">
      <option value="Select">Select</option>
      <option value="Good">Good</option>
      <option value="Bad">Bad</option>
    </select>
    <div class="form-input-title">Method</div>
    <span class="form-invalid"><?php echo $data['method_err']; ?></span>
    <select class="method" name="method" id="method" value="<?php echo $data['method']; ?>">
      <option value="Select">Select</option>
      <option value="Buy">Buy</option>
      <option value="Birth">Birth</option>
    </select>
    

		<br>
		<input type="submit" value="Submit" class="submit-btn">
  </form>
  <br>
</div>
    



<?php require APPROOT.'/views/include/footer.php'; ?>
