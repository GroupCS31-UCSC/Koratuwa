<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/addEmployees.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->


<div class="form-container">

	<div class="form-header">
		<center><h1>Add New Labour</h1></center>
	</div>
	<br>

	<form id="addForm" action="<?php echo URLROOT; ?>/Admin/addLabours" method="POST" enctype="multipart/form-data">

		<!--name-->
    <div class="feature">
      <div class="form-input-title">Name</div>
      <span class="form-invalid"><?php echo $data['name_err']; ?></span>
      <input type="text" name="name" id="name" class="name" autocomplete="off" value="<?php echo $data['name']; ?>">
    </div>

    <!--nic-->
    <div class="feature">
      <div class="form-input-title">NIC</div>
      <span class="form-invalid"><?php echo $data['nic_err']; ?></span>
      <input type="text" name="nic" id="nic" class="nic" autocomplete="off" value="<?php echo $data['nic']; ?>">
    </div>

    <!--contact no-->
    <div class="feature">
      <div class="form-input-title">Contact Number</div>
      <span class="form-invalid"><?php echo $data['tp_num_err']; ?></span>
      <input type="text" name="tp_num" id="tp_num" class="tp_num" autocomplete="off" value="<?php echo $data['tp_num']; ?>">
    </div>

    <!-- gender -->
    <div class="feature">
      <div class="form-input-title">Gender</div>

      <input type="radio" name="gender" id="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male"> Male
      <input type="radio" name="gender" id="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female"> Female

      <!-- <input type="radio" name="gender" id="gender" value="Male"> Male
      <input type="radio" name="gender" id="gender" value="Female"> Female -->
    </div>

    <!--address-->
    <div class="feature">
      <div class="form-input-title">Address</div>
      <input type="text" name="address" id="address" class="address" autocomplete="off" value="<?php echo $data['address']; ?>">
    </div>
    

	<br>
    <div class="feature">
      <!-- <input type="submit" value="Submit" class="submitBtn" onclick="adding(event)"> -->
      <input type="submit" value="Submit" class="submitBtn">

    </div>
    
	</form>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
