<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/add_collection.css">
<?php require APPROOT.'/views/milk_collection_officer/mco_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->


<div class="form-container">

	<div class="form-header">
		<center><h1>Add New Collection</h1></center>
	</div>
	<br>

	<form id="addForm" action="<?php echo URLROOT; ?>/Milk_Collection_Officer/addCollection" method="POST">

    <div class="feature">
      <div class="form-input-title">Cow Id</div>
      <span class="form-invalid"><?php echo $data['cowId_err']; ?></span>
      <input type="text" name="cowId" id="cowId" class="cowId" autocomplete="off" value="<?php echo $data['cowId']; ?>">
    </div>

    <div class="feature">
      <div class="form-input-title">Quantity</div>
      <span class="form-invalid"><?php echo $data['quantity_err']; ?></span>
      <input type="text" name="quantity" id="quantity" class="quantity" autocomplete="off" value="<?php echo $data['quantity']; ?>">
    </div>

    <!--nic-->
    <div class="feature">
      <div class="form-input-title">Date</div>
      <span class="form-invalid"><?php echo $data['date_err']; ?></span>
      <input type="date" name="date" id="date" class="date" autocomplete="off" value="<?php echo $data['date']; ?>">
    </div>

    <!--contact no-->
    <div class="feature">
      <div class="form-input-title">Time</div>
      <span class="form-invalid"><?php echo $data['time_err']; ?></span>
      <input type="time" name="time" id="time" class="time" autocomplete="off" value="<?php echo $data['time']; ?>">
    </div>

    <!--address-->
    <div class="feature">
      <div class="form-input-title">Remarks</div>
      <span class="form-invalid"><?php echo $data['remarks_err']; ?></span>
      <input type="text" name="remarks" id="remarks" class="remarks" autocomplete="off" value="<?php echo $data['remarks']; ?>">
    </div>

		<br>
    <div class="feature">
      <input type="submit" value="Submit" class="submitBtn" onclick="adding(event)">
    </div>
    
	</form>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/mco.js"></script>
