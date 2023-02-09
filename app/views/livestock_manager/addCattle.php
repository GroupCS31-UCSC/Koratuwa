<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/addCattle.css">


<div class="form-container">
	<div class="form-header">
		<center><h1>Add New Cattle</h1></center>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Livestock_Manager/addCattle" method="POST">
		<!--breed-->
		<div class="form-input-title">Cow Breed</div>
    <span class="form-invalid"><?php echo $data['breed_err']; ?></span>
    <select class="breed" name="breed" id="breed" value="<?php echo $data['breed']; ?>">
      <option value="Select">Select</option>
      <option value="Jersey">Jersey (British breed)</option>
      <option value="Persian">Persian (Newzealend breed)</option>
      <option value="Sahiwal">Sahiwal (Indian breed)</option>
      <option value="Girlandor">Girlandor (Indian breed(new))</option>
      <option value="Other">Other</option>
    </select>

    <!--dob-->
    <div class="form-input-title">Date of Birth</div>
    <span class="form-invalid"><?php echo $data['dob_err']; ?></span>
    <input type="date" name="dob" id="dob" class="dob" value="<?php echo $data['dob']; ?>">

    <!--gender-->
		<div class="form-input-title">Gender</div>
    <span class="form-invalid"><?php echo $data['gender_err']; ?></span>
    <select class="gender" name="gender" id="gender" value="<?php echo $data['gender']; ?>">
      <option value="Select">Select</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>

    <!--weight-->
		<div class="form-input-title">Weight(Kg)</div>
    <span class="form-invalid"><?php echo $data['weight_err']; ?></span>
		<input type="text" name="weight" id="weight" class="weight" value="<?php echo $data['weight']; ?>">

    <!-- purpose -->
    <div class="form-input-title">Purpose</div>
    <span class="form-invalid"><?php echo $data['purpose_err']; ?></span>
    <select class="purpose" name="purpose" id="purpose" value="<?php echo $data['purpose']; ?>">
      <option value="Select">Select</option>
      <option value="Milk">For Milking</option>
      <option value="Meat">For Meat</option>
      <option value="Beeding">For Breeding</option>
    </select>
    
		<br>
		<input type="submit" value="Submit" class="submitBtn">
  </form>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
