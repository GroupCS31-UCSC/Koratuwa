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
    <br>

		<input type="submit" value="Submit" class="submitBtn" onclick="openPopup()">
	</form>
</div>

<!-- update popup -->
<div class="up-popup" id="popup">
  <div class="up-popup-content">
    <div class="up-popup-header">
		<i class="fa fa-thumbs-up" aria-hidden="true"></i>
    </div>
    <div class="up-popup-body">
      <h2>Cattle updated successfully</h2>
    </div>
  </div>
  <div class="up-popup-footer">
    <button class="up-popup-btn" onclick="closePopup()">OK</button>
  </div>
</div>

<script>
// Popup update
function openPopup(){
  document.getElementById("popup").classList.add("open-popup");
}
function closePopup(){
  document.getElementById("popup").classList.remove("open-popup");
}
</script>

<?php require APPROOT.'/views/include/footer.php'; ?>