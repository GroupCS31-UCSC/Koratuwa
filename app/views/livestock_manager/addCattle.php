<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/addCattle.css">

<div class="form-container">
	<div class="form-header">
  <center><h1>Add Cattle</h1></center>
	</div>
	<form action="<?php echo URLROOT; ?>/Livestock_Manager/addCattle" method="POST">
  <!-- <input type="" name="stallId" value="<?php echo $data['stallId']; ?>"> -->
    <!-- dob -->
    <div class="form-input-title">Date of birth</div>
    <span class="form-invalid"><?php echo $data['dob_err']; ?></span>
    <input type="date" name="dob" id="dob" class="dob" value="<?php echo $data['dob']; ?>">
    <!-- Breed -->
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
    <!-- If select other -->
    <div id="other-input" style="display:none;">
    <label for="other">Other:</label>
    <input type="text" name="other" id="other" class="other" value="">
    </div>
    <!-- Gender -->
    <div class="form-input-title">Gender</div>
    <span class="form-invalid"><?php echo $data['gender_err']; ?></span>
    <select class="gender" name="gender" id="gender" value="<?php echo $data['gender']; ?>">
      <option value="Select">Select</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>

    <!-- If select Female -->
    <!-- milking -->
    <div class="form-input-title" id="milking-input" style="display:none;">Milking</div>
    <span class="form-invalid"><?php echo $data['milking_err']; ?></span>
    <select class="milking" name="milking" id="milking" value="<?php echo $data['milking']; ?>" style="display:none;">
      <option value="No">No</option>
      <option value="Yes">Yes</option>
    </select>

    <!-- Method -->
    <div class="form-input-title">Method</div>
    <span class="form-invalid"><?php echo $data['method_err']; ?></span>
    <select class="method" name="method" id="method" value="<?php echo $data['method']; ?>">
      <option value="Select">Select</option>
      <option value="Buy">Buy</option>
      <option value="Birth">Birth</option>
    </select>
    <!-- If select buy -->
    <div id="price-input" style="display:none;">
    <label for="price">Price:</label>
    <input type="text" name="price" id="price" class="price" value="">
    </div>
    <!-- stall no -->
    <div class="form-input-title">Stall Id</div>
    <span class="form-invalid"><?php echo $data['stallId_err']; ?></span>
    <select class="stallId" name="stallId" id="stallId" value="<?php echo $data['stallId']; ?>">
      <option value="Select">Select</option>
      <option value="STALL1">1</option>
      <option value="STALL2">2</option>
      <option value="STALL3">3</option>
      <option value="STALL4">4</option>
    </select>
  </form>
  <button type="submit" class="submitBtn" onclick="openPopup()">
  Submit
  </button>

  <br>
</div>

<!-- Add popup -->
<div class="add-popup" id="popup">
  <div class="add-popup-content">
    <div class="add-popup-header">
      <i class="fa fa-check-circle" aria-hidden="true"></i>
    </div>
    <div class="add-popup-body">
      <h2>Cattle added successfully</h2>
    </div>
  </div>
  <div class="add-popup-footer">
    <button class="add-popup-btn" onclick="closePopup()">OK</button>
  </div>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/lm.js"></script>

<script>
var breedSelect = document.getElementById('breed');
var methodSelect = document.getElementById('method');
var otherInput = document.getElementById('other-input');
var priceInput = document.getElementById('price-input');

breedSelect.addEventListener('change', function() {

  if (breedSelect.value == 'Other') {
    otherInput.style.display = 'block';
  } else {
    otherInput.style.display = 'none';
  }
});

methodSelect.addEventListener('change', function() {
  if (methodSelect.value == 'Buy') {
    priceInput.style.display = 'block';
  } else {
    priceInput.style.display = 'none';
  }
});

var genderSelect = document.getElementById('gender');
var milkingInput = document.getElementById('milking-input');
var milkingSelect = document.getElementById('milking');

genderSelect.addEventListener('change', function() {
  if (genderSelect.value == 'Female') {
    milkingInput.style.display = 'block';
    milkingSelect.style.display = 'block';
  } else {
    milkingInput.style.display = 'none';
    milkingSelect.style.display = 'none';
  }
});


// Popup add
function openPopup(){
  // e.preventDefault();
  window.location.href = "<?php echo URLROOT; ?>/Livestock_Manager/viewCattle";
  document.getElementById("popup").classList.add("open-popup");
  
}
function closePopup(){
  document.getElementById("popup").classList.remove("open-popup");
  // window.location.href = "<?php echo URLROOT; ?>/Livestock_Manager/viewCattle";
}

</script>