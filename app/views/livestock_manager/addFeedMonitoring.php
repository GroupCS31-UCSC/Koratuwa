<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/addCattle.css">


<div class="form-container">
	<div class="form-header">
		<center><h1>Add Feed record</h1></center>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Livestock_Manager/addFeedMonitoring" method="POST">
        <div class="form-input-title">Stall ID</div>
        <span class="form-invalid"><?php echo $data['stallId_err']; ?></span>
        <label for="Select the stall no"></label>
        <select name="stallId" id="stallId" value="<?php echo $data['stallId']; ?>">
            <option value="stall1">Stall 01</option>
            <option value="stall2">Stall 02</option>
            <option value="stall3">Stall 03</option>
            <option value="stall4">Stall 04</option>
        </select>
        
        <div class="form-input-title">Solid (Kg)</div>
        <span class="form-invalid"><?php echo $data['solid_err']; ?></span>
        <input type="number" name="solid" id="solid" class="solid" value="<?php echo $data['solid'];?>" required>

		<div class="form-input-title">Liquid (L)</div>
        <span class="form-invalid"><?php echo $data['liquid_err']; ?></span>
        <input type="number" name="liquid" id="liquid" class="liquid" value="<?php echo $data['liquid'];?>" required>
      
        <div class="form-input-title">Remarks</div>
        <span class="form-invalid"><?php echo $data['remarks_err']; ?></span>
        <input type="text" name="remarks" id="remarks" class="remarks" value="<?php echo $data['remarks'];?>" required>
    
		<br>
		<input type="submit" value="Submit" class="submitBtn">
  </form>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
