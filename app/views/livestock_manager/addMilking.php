<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/addCattle.css">


<div class="form-container">
	<div class="form-header">
		<center><h1>Add Vaccination</h1></center>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Livestock_Manager/addVaccination" method="POST" enctype="multipart/form-data
    ">
        <!-- Cow Id -->
        <div class="form-input-title">COW ID</div>
        <span class="form-invalid"><?php echo $data[0]['cowId_err']; ?></span>
        <label for="Select the Cattle"></label>
        <?php $values = $data[1]?>
        <select name="cowId" id="cowId">
            <?php foreach($values as $cow_id):?>
                <option value="<?=$cow_id->cow_id?>" name="cowId"><?=$cow_id->cow_id?></option>
            <?php endforeach;?>
        </select>

        <!-- Vaccination -->
        <div class="form-input-title">Vaccination Type</div>
        <span class="form-invalid"><?php echo $data[0]['vaccinationType_err']; ?></span>
        <label for="Select the Vaccination"></label>
        <!-- <?php $values = $data[2]?>  -->
        <select name="vaccinationType" id="vaccinationType">
            <!-- <?php foreach($values as $vaccination_type):?>
                <option value="<?=$vaccination_type->vaccination_type?>" name="vaccinationType"><?=$vaccination_type->vaccination_type?></option>
            <?php endforeach;?> -->
            <option value="Vaccination 1" name="vaccinationType">Vaccination 1</option>
            <option value="Vaccination 2" name="vaccinationType">Vaccination 2</option>
            <option value="Vaccination 3" name="vaccinationType">Vaccination 3</option>
        </select>

        <!-- Quantity -->
        <div class="form-input-title">Quantity</div>
        <span class="form-invalid"><?php echo $data[0]['vaccinationQuantity_err']; ?></span>
        <input type="number" name="vaccinationQuantity" id="vaccinationQuantity" class="vaccinationQuantity" value="<?php echo $data[0]['vaccinationQuantity'];?>" required>

        <!-- Note -->
        <div class="form-input-title">Note</div>
        <span class="form-invalid"><?php echo $data[0]['note_err']; ?></span>
        <input type="text" name="note" id="note" class="note" value="<?php echo $data[0]['note'];?>" required>
        
        
    
		<br>
		<input type="submit" value="Submit" class="submitBtn">
  </form>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
