<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/addCattle.css">


<div class="form-container">
	<div class="form-header">
		<h3>Basic Information</h3>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Livestock_Manager/addCattle" method="POST">
    <div class="dob-breed">
      <div class="dob">
        <div class="form-input-title">Date of Birth</div>
        <span class="form-invalid"><?php echo $data['dob_err']; ?></span>
        <input type="date" name="dob" id="dob" class="dob" value="<?php echo $data['dob']; ?>">
      </div>
      <div class="breed">
		    <div class="form-input-title">Breed</div>
        <span class="form-invalid"><?php echo $data['breed_err']; ?></span>
        <select class="breed" name="breed" id="breed" value="<?php echo $data['breed']; ?>">
          <option value="--Select--">Select</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>
    </div>
		<!--type-->
		<div class="form-input-title">Cow Type</div>
    <span class="form-invalid"><?php echo $data['type_err']; ?></span>
    <select class="type" name="type" id="type" value="<?php echo $data['type']; ?>">
      <option value="--Select--">Select</option>
      <option value="Jersey">Jersey (British breed)</option>
      <option value="Persian">Persian (Newzealend breed)</option>
      <option value="Sahiwal">Sahiwal (Indian breed)</option>
      <option value="Girlandor">Girlandor (Indian breed(new))</option>
      <option value="Other">Other</option>
    </select>
    <label for="other">Other:</label>
    <input type="text" name="other" id="other" class="other" value="">
    <div class="buying">
      <div class="date">
        <div class="form-input-title">Buy Date</div>
        <span class="form-invalid"><?php echo $data['buyDate_err']; ?></span>
        <input type="date" name="buy_date" id="buy_date" class="buy_date" value="<?php echo $data['buyDate']; ?>">
      </div>
      <div class="price">
        <div class="form-input-title">Buy Price</div>
        <span class="form-invalid"><?php echo $data['buyPrice_err']; ?></span>
        <input type="text" name="buy_price" id="buy_price" class="buy_price" value="<?php echo $data['buyPrice']; ?>">
      </div>
    </div>
    <div class="weight-height">
      <div class="weight">
        <div class="form-input-title">Weight(kg)</div>
        <span class="form-invalid"><?php echo $data['weight_err']; ?></span>
        <input type="text" name="weight" id="weight" class="weight" value="<?php echo $data['weight']; ?>">
      </div>
      <div class="height">
        <div class="form-input-title">Height(INCH)</div>
        <span class="form-invalid"><?php echo $data['height_err']; ?></span>
        <input type="text" name="height" id="height" class="height" value="<?php echo $data['height']; ?>">
      </div>
    </div>    
    <div class="pregnancy">
      <div class="status">
        <div class="form-input-title">Pregnant Status</div>
        <span class="form-invalid"><?php echo $data['pregnantStatus_err']; ?></span>
        <select class="pregnant_status" name="pregnant_status" id="pregnant_status" value="<?php echo $data['pregnantStatus']; ?>">
          <option value="Not Pregnant">No</option>
          <option value="Pregnant">Yes</option>
        </select>
      </div>
      <div class="npregnant">
        <div class="form-input-title">No of Pregnant</div>
        <span class="form-invalid"><?php echo $data['noOfPregnant_err']; ?></span>
        <input type="text" name="no_of_pregnant" id="no_of_pregnant" class="no_of_pregnant" value="<?php echo $data['noOfPregnant']; ?>">
      </div>
    </div>
    <div class="next-milk">
      <div class="next">
        <div class="form-input-title">Next Pregnant Date</div>
        <span class="form-invalid"><?php echo $data['nextPregnant_err']; ?></span>
        <input type="date" name="next_pregnant" id="next_pregnant" class="next_pregnant" value="<?php echo $data['nextPregnant']; ?>">
      </div>
      <div class="milk">
        <div class="form-input-title">Milk Per Day(LTR)</div>
        <span class="form-invalid"><?php echo $data['milkPerDay_err']; ?></span>
        <input type="text" name="milk_per_day" id="milk_per_day" class="milk_per_day" value="<?php echo $data['milkPerDay']; ?>">
      </div>
    </div>
    <!-- <div class="vaccination">
        //previeous vaccination done---yes or no
        <div class="form-input-title">Previous Vaccination Done</div>
        <span class="form-invalid"><?php echo $data['vaccination_err']; ?></span>
        <select class="vaccination" name="vaccination" id="vaccination" value="<?php echo $data['vaccination']; ?>">
          <option value="No">No</option>
          <option value="Yes">Yes</option>
        </select>
        //if yes then select them
        list of vaccination
        <div class="form-input-title">Vaccination</div>
        <span class="form-invalid"><?php echo $data['vaccination_err']; ?></span>
        <li><input type="checkbox" name="vaccination[]" value="BDV">BDV</li>
        <li><input type="checkbox" name="vaccination[]" value="BVD">BVD</li>
        <li><input type="checkbox" name="vaccination[]" value="Hepatitis B">Hepatitis B</li>
        <li><input type="checkbox" name="vaccination[]" value="Other">Other</li>

    </div> -->
		<br>
		<input type="submit" value="Submit" class="submitBtn">
  </form>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
