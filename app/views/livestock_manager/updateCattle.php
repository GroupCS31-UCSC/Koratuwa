<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/updateCattle.css">



<div class="form-container">
	<div class="form-header">
		<center><h1>Update Cattle</h1></center>
	</div>
	<br>

	<form action="<?php echo URLROOT; ?>/Livestock_Manager/updateCattle/<?php echo $data['cowId']; ?>" method="POST">
		<!--breed-->
		<div class="form-input-title">Cow Breed</div>
    <span class="form-invalid"><?php echo $data['breed_err']; ?></span>
    <select class="breed" name="breed" id="breed" value="<?php echo $data['breed']; ?>">
      <option value="Jersey">Jersey (British breed)</option>
      <option value="Persian">Persian (Newzealend breed)</option>
      <option value="Sahiwal">Sahiwal (Indian breed)</option>
      <option value="Girlandor">Girlandor (Indian breed(new))</option>
      <option value="Other">Other</option>
    </select>

    <!--weight-->
		<div class="form-input-title">Weight(Kg)</div>
    <span class="form-invalid"><?php echo $data['weight_err']; ?></span>
		<input type="text" name="weight" id="weight" class="weight" value="<?php echo $data['weight']; ?>">

    <!--gender-->
		<div class="form-input-title">Gender</div>
    <span class="form-invalid"><?php echo $data['gender_err']; ?></span>
    <select class="gender" name="gender" id="gender" value="<?php echo $data['gender']; ?>">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>

    <!--dob-->
    <div class="form-input-title">Date of Birth</div>
    <span class="form-invalid"><?php echo $data['dob_err']; ?></span>
    <input type="date" name="dob" id="dob" class="dob" value="<?php echo $data['dob']; ?>">

    <!--health-->
    <div class="form-input-title">Health</div>
    <span class="form-invalid"><?php echo $data['health_err']; ?></span>
    <input type="text" name="health" id="health" class="health" value="<?php echo $data['health']; ?>">

		<br>
		<input type="submit" value="Submit" class="submitBtn">
	</form>


<?php require APPROOT.'/views/include/footer.php'; ?>