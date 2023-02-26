<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/updateEmployees.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->



<div class="form-container">
  <div class="form-header">
		<center><h1>Update Employee</h1></center>
	</div>
 	<br>

  <form id="updateForm" action="<?php echo URLROOT; ?>/Admin/updateEmployees/<?php echo $data['email']; ?>" method="post" enctype="multipart/form-data">
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
      <input type="radio" name="gender" id="name" <?php if (isset($data['gender']) && $data['gender']=="Male") echo "checked";?> value="<?php echo $data['gender']; ?>"> Male
      <input type="radio" name="gender" id="name" <?php if (isset($data['gender']) && $data['gender']=="Female") echo "checked";?> value="<?php echo $data['gender']; ?>"> Female
    </div>

    <!--address-->
    <div class="feature">
      <div class="form-input-title">Address</div>
      <input type="text" name="address" id="address" class="address" value="<?php echo $data['address']; ?>">
    </div>

		<!--employment-->
    <div class="feature">
      <div class="form-input-title">Employment</div>
      <span class="form-invalid"><?php echo $data['employment_err']; ?></span>
      <select class="employment" name="employment" id="employment" value="<?php echo $data['employment']; ?>">
        <option value="Product Manager" <?php if (isset($data['employment']) && $data['employment']=="Product Manager") echo "selected";?> >Product Manager</option>
        <option value="Livestock Manager" <?php if (isset($data['employment']) && $data['employment']=="Livestock Manager") echo "selected";?> >Livestock Manager</option>
        <option value="Milk Collection Officer" <?php if (isset($data['employment']) && $data['employment']=="Milk Collection Officer") echo "selected";?> >Milk Collection Officer</option>
        <option value="Financial Manager" <?php if (isset($data['employment']) && $data['employment']=="Financial Manager") echo "selected";?> >Financial Manager</option>
        <option value="Cashier" <?php if (isset($data['employment']) && $data['employment']=="Cashier") echo "selected";?> >Cashier</option>
      </select>
    </div>

    <!--image-->
    <div class="feature">
      <div class="form-input-title">Image</div>
      <input type="file" name="image" id="image" class="image" value="<?php echo $data['image']; ?>"><br>
    </div>

    <!-- <input type="submit" value="Update" class="submitBtn" onclick=""> -->
    <!-- <button class="submitBtn" onclick="updating(event)">UPDATE</button> -->
    <button class="submitBtn">UPDATE</button>

  </form>
</div>

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
