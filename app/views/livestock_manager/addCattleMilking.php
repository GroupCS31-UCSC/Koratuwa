<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/addCattle.css">


<div class="form-container">
	<div class="form-header">
		<center><h1>Add Milk collect</h1></center>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Livestock_Manager/addCattleMilking" method="POST" enctype="multipart/form-data
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

        <!-- Quantity -->
        <div class="form-input-title">Quantity</div>
        <span class="form-invalid"><?php echo $data[0]['quantity_err']; ?></span>
        <input type="number" name="quantity" id="vaccinationQuantity" class="quantity" value="<?php echo $data[0]['quantity'];?>" required>

        <!-- stall id -->
        <div class="form-input-title">Stall ID</div>
        <span class="form-invalid"><?php echo $data[0]['stallId_err']; ?></span>
        <label for="Select the stall id"></label>
        <?php $values = $data[1]?>
        <select name="stallId" id="stallId">
            <?php foreach($values as $stall_id):?>
                <option value="<?=$stall_id->stall_id?>" name="stallId"><?=$stall_id->stall_id?></option>
            <?php endforeach;?>
        </select>


        <!-- Note -->
        <!-- <div class="form-input-title">Remarks</div>
        <span class="form-invalid"><?php echo $data[0]['remarks_err']; ?></span>
        <input type="text" name="remarks" id="remarks" class="remarks" value="<?php echo $data[0]['remarks'];?>" required> -->
        
        
    
		<br>
		<input type="submit" value="Submit" class="submitBtn">
  </form>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
