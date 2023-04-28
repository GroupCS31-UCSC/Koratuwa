<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/updateEmployees.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->



<div class="form-container">
  <div class="form-header">
		<center><h1>Update Employee</h1></center>
	</div>
 	<br>

  <form id="updateForm" action="<?php echo URLROOT; ?>/Admin/updateLabours/<?php echo $data['LId']; ?>" method="post" enctype="multipart/form-data">
  <!-- <form action="Admin/updateEmployees" method="post" onsubmit="return updateForm(this);"> -->

    <!--name-->
    <div class="feature">
      <div class="form-input-title">Employee Name</div>
      <span class="form-invalid"><?php echo $data['name_err']; ?></span>
      <input type="text" name="name" id="name" class="name" value="<?php echo $data['name']; ?>">
    </div>

    <!--nic-->
    <div class="feature">
      <div class="form-input-title">NIC</div>
      <span class="form-invalid"><?php echo $data['nic_err']; ?></span>
      <input type="text" name="nic" id="nic" class="nic" value="<?php echo $data['nic']; ?>">
    </div>

    <!--contact no-->
    <div class="feature">
      <div class="form-input-title">Contact Number</div>
      <span class="form-invalid"><?php echo $data['tp_num_err']; ?></span>
      <input type="number" name="tp_num" id="tp_num" class="tp_num" value="<?php echo $data['tp_num']; ?>">
    </div>

    <!-- gender -->
    <div class="feature">
      <input type="radio" name="gender" id="name" <?php if (isset($data['gender']) && $data['gender']=="Male") echo "checked";?> value="Male"> Male
      <input type="radio" name="gender" id="name" <?php if (isset($data['gender']) && $data['gender']=="Female") echo "checked";?> value="Female"> Female
    </div>

    <!--address-->
    <div class="feature">
      <div class="form-input-title">Address</div>
      <input type="text" name="address" id="address" class="address" value="<?php echo $data['address']; ?>">
    </div>

    <!-- <input type="submit" value="Update" class="submitBtn" onclick=""> -->
    <!-- <button class="submitBtn" onclick="updating(event)">UPDATE</button> -->
    <button class="submitBtn">UPDATE</button>

  </form>
</div>

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
