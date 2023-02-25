<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/addCattle.css">

<div class="form-container">
	<div class="form-header">
		<h3>Basic Information</h3>
	</div>
	<form action="<?php echo URLROOT; ?>/Livestock_Manager/addCattle" method="POST">
    <div class="dob-breed">
      <div class="dob">
        <div class="form-input-title">Date of Birth</div>
        <span class="form-invalid"><?php echo $data['dob_err']; ?></span>
        <input type="date" name="dob" id="dob" class="dob" value="<?php echo $data['dob']; ?>">
      </div>
      <div class="breed">
		    <div class="form-input-title">Gender</div>
        <span class="form-invalid"><?php echo $data['gender_err']; ?></span>
        <select class="breed" name="gender" id="gender" value="<?php echo $data['gender']; ?>">
          <option value="--Select--">Select</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>
    </div>
		<!--type-->
		<div class="form-input-title">Cow Breed</div>
    <span class="form-invalid"><?php echo $data['breed_err']; ?></span>
    <select class="type" name="breed" id="breed" value="<?php echo $data['breed']; ?>">
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
        <div class="form-input-title">Reg Date</div>
        <span class="form-invalid"><?php echo $data['regDate_err']; ?></span>
        <input type="date" name="reg_date" id="reg_date" class="reg_date" value="<?php echo $data['regDate']; ?>">
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
        <div class="form-input-title">Health</div>
        <span class="form-invalid"><?php echo $data['health_err']; ?></span>
        <input type="text" name="health" id="health" class="health" value="<?php echo $data['health']; ?>">
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
    <!-- <div class="form-header">
		  <h3>Vaccination Previously done</h3>
	  </div>
	  <form action="<?php echo URLROOT; ?>/Livestock_Manager/addVaccination" method="POST"> -->
      <!-- <div class="vac-row">
        <div class="col-md-4">
          <label class="checkbox-inline">
            <input type="checkbox" name="vaccines[]" value="1">
            BDV - ( 60 Days )
          </label>
        </div>
        <div class="col-md-4">
          <label class="checkbox-inline">
            <input type="checkbox" name="vaccines[]" value="2">
            BVD - ( 90 Days )
          </label>
        </div>
        <div class="col-md-4">
          <label class="checkbox-inline">
            <input type="checkbox" name="vaccines[]" value="3">
            PI3 - ( 120 Days )
          </label>
        </div>
        <div class="col-md-4">
          <label class="checkbox-inline">
            <input type="checkbox" name="vaccines[]" value="4">
            BRSV - ( 365 Days )
          </label>
        </div>
        <div class="col-md-4">
          <label class="checkbox-inline">
            <input type="checkbox" name="vaccines[]" value="6">
            Vitamin A - ( 60 Days )
          </label>
        </div>
        <div class="col-md-4">
          <label class="checkbox-inline">
            <input type="checkbox" name="vaccines[]" value="7">
            Anthrax - ( 120 Days )
          </label>
        </div>
      </div>
    </form> -->
		<br>
		<input type="submit" value="Submit" class="submit-btn">
  </form>
  <br>
</div>
    



<?php require APPROOT.'/views/include/footer.php'; ?>
