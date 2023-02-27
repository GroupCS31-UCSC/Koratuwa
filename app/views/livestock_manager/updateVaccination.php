<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/addCattle.css">


<div class="form-container">
	<div class="form-header">
		<center><h1>Update Vaccination</h1></center>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Livestock_Manager/updateVaccination" method="POST">
    <div class="form-input-title">Vaccination Type</div>
    <!-- <span class="form-invalid"><?php echo $data['vaccinationType_err']; ?></span> -->
    <label for="Select the Vaccination"></label>
    <select name="vaccinationType" id="vaccinationType">
      <option value="Vaccination 1" name="vaccinationType">Vaccination 1</option>
      <option value="Vaccination 2" name="vaccinationType">Vaccination 2</option>
      <option value="Vaccination 3" name="vaccinationType">Vaccination 3</option>
    </select>

    <!-- Quantity -->
    <div class="form-input-title">Quantity</div>
    <!-- <span class="form-invalid"><?php echo $data['vaccinationQuantity_err']; ?></span> -->
    <input type="number" name="vaccinationQuantity" id="vaccinationQuantity" class="vaccinationQuantity" value="<?php echo $data['vaccinationQuantity'];?>" required>

    <!-- Note -->
    <div class="form-input-title">Note</div>
    <!-- <span class="form-invalid"><?php echo $data['note_err']; ?></span> -->
    <input type="text" name="note" id="note" class="note" value="" required>
    
		<br>
		<input type="submit" value="Submit" class="submitBtn">
  </form>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
